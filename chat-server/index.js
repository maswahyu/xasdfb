var app = require('express')();
var server = require('http').Server(app);
var io = require('socket.io')(server);
var fs = require('fs');
var Filter = require('bad-words-plus');
var filter = new Filter();
var profanityWords;

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
  socket.on('chat.message', function(message) {
    message = filterUrl(message);
    message = filter.clean(message);

    // broadcast to room
    io.to(streamId).emit('chat.message', {
      id: 0,
      user: user,
      type: 'message',
      message: message,
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
