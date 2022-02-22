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