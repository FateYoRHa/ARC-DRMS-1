/* Custom Toggle sidebar */
jQuery(document).ready(function ($) {
    $("#menu-toggle").click(function (e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
        var icon = $('.material-icons-toggle');
        icon.toggleClass('open');
        if (icon.hasClass('open')) {
            icon.text('\uf114');
        } else {
            icon.text('\ue5d4');
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
            icon.text('\ue8f5');
        } else {
            icon.text('\ue8f4');
        }
    });
})