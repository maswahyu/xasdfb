require('dotenv').config({path: __dirname + '/.env'})
var app = require('express')();
var server = require('http').Server(app);
var io = require('socket.io')(server);
var fs = require('fs');
var mysql = require('mysql');
var Filter = require('bad-words-plus');
var filter = new Filter();
var profanityWords;

// database config
const conn = mysql.createConnection({
    host: process.env['DB_HOST'],
    user: process.env['DB_USERNAME'],
    password: process.env['DB_PASSWORD'],
    database: process.env['DB_DATABASE']
});

// connect to database
conn.connect((err) => {
    if(err) throw err;

    console.log('Mysql Connected');
});
console.log('STARTING LAZONE CHAT SERVER');
server.listen(3000);
console.log('Listening on port 3000');

fs.readFile('blocked-words.txt', 'utf8', function(error, data) {
  if (error) { throw error };
  profanityWords = data.toString();
  profanityWords = profanityWords.replace(/(\r\n|\n|\r)/gm, ';');
  profanityWords = profanityWords.split(';');
  console.log('Loaded bad words', profanityWords);
  filter.addWords(...profanityWords);
});

app.get('/', function(request, response) {
  response.sendFile(__dirname + '/index.html');
});

io.on('connect', function(socket) {
  // var query = socket.handshake.query;
  // var streamId = query.streamId;
  var streamId, user;

  /* USER JOIN */
  socket.on('chat.join', function(data, callback) {
    streamId = data.streamId;
    user = data.user;
    socket.join(streamId);
    user_id = null;
    if(data.reJoin == false) {
        /*INSERT AUDIENCE LOG*/
        let sql = "INSERT INTO log_audience_event (sso_id, audience_as, event_stream_id, event_name, created_at) VALUES (?)";
        let date = new Date();
        let dateString = date.getFullYear() + '-' + date.getMonth() + '-' + date.getDate() + ' ' + date.getHours() + ':' + date.getMinutes() + ':' + date.getSeconds();
        // data
        let dataSql = [
            [
                user.id,
                user.name,
                data.eventId,
                data.eventName,
                dateString
            ]
        ]
        // execute query
        let query = conn.query(sql, dataSql, (err, result) => {
            // dont throw in production
            if(err) {
                if(process.env['APP_ENV'] == 'local') {
                    throw err;
                } else {
                    console.log(err);
                    return;
                }
            }
        });
    }


    console.log(data.user.name+' ['+data.user.phone+'] joined to '+streamId);
    callback({joined: true});
  });

  /* USER LEAVE */
  socket.on('chat.leave', function(data, callback) {
    streamId = data.streamId;
    user = data.user;
    socket.leave(streamId);
    console.log(data.user.name+' ['+data.user.phone+'] leaving '+streamId);
    callback({joined: false});
  });

  /* USER DISCONNECTED */
  /*socket.on('disconnect', function() {
    if (streamId !== null && user != null) {
      socket.to(streamId).emit('chat.message', {
        user: null,
        type: 'notification',
        message: user.name + ' has disconnected.'
      });
    }
  });*/

  /* MESSAGE RECEIVED */
  socket.on('chat.message', function(data) {
    message = filterUrl(data.message);
    filteredMessage = filter.clean(data.message);

    // broadcast to room
    io.to(streamId).emit('chat.message', {
      id: 0,
      user: user,
      type: 'message',
      message: filteredMessage,
    });

    let date = new Date();
    let dateString = date.getFullYear() + '-' + date.getMonth() + '-' + date.getDate() + ' ' + date.getHours() + ':' + date.getMinutes() + ':' + date.getSeconds();
    let dataSql = [
        [
            data.eventId,
            data.message,
            data.timestamp,
            data.name,
            dateString
        ]
    ];
    let sql = "INSERT INTO audience_chat_history (event_stream_id, message, timestamp_from_event, name, created_at) VALUES(?)";
    // execute query
    let query = conn.query(sql, dataSql, (err, result, user_id) => {
        // dont throw in production
        console.log(err);
        if(err) {
            if(process.env['APP_ENV'] == 'local') {
                throw err;
            } else {
                console.log(err);
                return;
            }
        }
        user_id =  result.insertId;
    });
    console.log(user.name+' ['+user.phone+'] said: '+message);
  });
});

function filterUrl(message) {
  var regex = new RegExp(/^(https?|chrome|ftps?):\/\/.?[^\s$.?#].[^\s]*$/gm)
  var words = message.split(' ');

  for (var i = words.length - 1; i >= 0; i--) {
    if (regex.test(words[i])) {
      words[i] = '<link>';
    }
  }

  return words.join(' ');
}
