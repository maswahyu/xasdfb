$(function() {
    function t(t) {
        return t.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")
    }
    _c_auth && $.ajax({
        type: "GET",
        url: "/get-point-details"
    }).done(function(o) {
        0 == o.error && (
            $("#loyalty_point").html(t(o.data.total_point)),
            $("#loyalty_point2").html(t(o.data.total_point))
            )
    }), _c_auth || $.ajax({
        type: "GET",
        url: "https://" + _c_url + "?controller=profile&action=check-login",
        xhrFields: {
            withCredentials: !0
        }
    }).done(function(t) {
        0 == t.error && (window.location.href = "/member/login")
    }), _c_auth && $.ajax({
        type: "GET",
        url: "/get-user-details"
    }).done(function(o) {
        if (0 == o.error && o.profilePicture) {
            $("#avatar-desktop").attr('src', "https://" + _c_url + "" + o.profilePicture.path + "" + o.profilePicture.filename)
            $("#avatar-mobile").attr('src', "https://" + _c_url + "" + o.profilePicture.path + "" + o.profilePicture.filename)
            $("#avatar-mobile2").attr('src', "https://" + _c_url + "" + o.profilePicture.path + "" + o.profilePicture.filename)
        }
    })
});