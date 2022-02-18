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

jQuery(document).ready(function ($) {
    $("#dropdown-toggled").click(function (e) {
        e.preventDefault();
        var icon = $('.material-icons-sidebar-dropdown');
        $("#dropdown-toggled").toggleClass("show");
        icon.toggleClass('show');
        if (icon.hasClass('show')) {
            icon.text('expand_less').fadeTo("slow", 0.2);
        } else {
            icon.text('expand_more').fadeTo("slow", 1);
        }
    });
})

/* When the user clicks on the button, toggle between hiding and showing the dropdown content */
function sidebarDropDown() {
    document.getElementById("sidebar-dropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function (event) {
    if (!event.target.matches('.dropbtn')) {
        var dropdowns = document.getElementsByClassName("dropdown-content");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
            }
        }
    }
}