$(function () {
  function setCookie(cname, cvalue, extime) {
    var d = new Date();
    d.setTime(d.getTime() + (extime * 60 * 1000));
    var expires = "expires=" + d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
  }

  function getCookie(cname) {
      var name = cname + "=";
      var ca = document.cookie.split(';');
      for (var i = 0; i < ca.length; i++) {
      var c = ca[i];
      while (c.charAt(0) == ' ') {
          c = c.substring(1);
      }
      if (c.indexOf(name) == 0) {
          return c.substring(name.length, c.length);
      }
      }
      return "";
  }

  function checkCookie() {
      var cookiestatus = getCookie("lazonegamebtn");
      if (cookiestatus != "active") {
          return false;
      } else {
          return true;
      }
  }

  if(!checkCookie()){ //cookie does not exist
      // alert('cookie does not exist');
      $('.floating-game-btn').addClass('is-shown');

      $('.floating-game-btn .btn-close').on('click', function () {
          $('.floating-game-btn').css('transition', 'opacity 0.5s ease-in');
          $('.floating-game-btn').removeClass('is-shown'); //hide button

          //alert('set cookie');
          setCookie('lazonegamebtn', 'active', 10); // hidden for the next 10 minutes
      })
  } else { // increase cookie time
      //alert('cookie exists');
      setCookie('lazonegamebtn', 'active', 10); // hidden for the next 10 minutes
  }

});