$(document).ready(function() {
    $('.menu-toggle').click(function() {
        $(this).toggleClass('clicked');
        $('nav.menu').toggleClass('showing');
        $('body').toggleClass('fixed');
    });
    $('.flexslider').flexslider({
        animation: "slide"
    });
});