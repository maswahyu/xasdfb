$(function(){_c_auth&&$.ajax({type:"GET",url:"https://"+_c_url+"?controller=profile&action=get-user-details",data:{email:_c_email},xhrFields:{withCredentials:!0}}).done(function(t){0==t.error&&$("#loyalty_point").html(t.data.total_point.toString().replace(/\B(?=(\d{3})+(?!\d))/g,"."))}),_c_auth||$.ajax({type:"GET",url:"https://"+_c_url+"?controller=profile&action=check-login",xhrFields:{withCredentials:!0}}).done(function(t){0==t.error&&(window.location.href="/member/login")})});