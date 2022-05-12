/* Custom Toggle sidebar */
jQuery(document).ready(function ($) {
    $("#menu-toggle").click(function (e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
        var icon = $('.material-icons-toggle');
        icon.toggleClass('open');
        if (icon.hasClass('open')) {
            icon.text('view_sidebar');
        } else {
            icon.text('more_vert');
        }
    });
})

/* Show password */
function changeVisibility() {
    var show = document.getElementById("password");
    if(show.type === "password"){ 
        show.type = "text";
    } else { 
        show.type ="password";
    }
}

/* Login show password */
jQuery(document).ready(function ($) {
    $("#login-btn").click(function (e) {
        e.preventDefault();
        var icon = $('.material-login');
        icon.toggleClass('open');
        if (icon.hasClass('open')) {
            icon.text('visibility');
        } else {
            icon.text('visibility_off');
        }
    });
})