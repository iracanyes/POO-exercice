/*menu de navigation*/
$(function () {
    var pull = $('.pull');
    menu = $('nav ul');
    menuHeight = menu.height();

    $(pull).on('click', function (e) {
        e.preventDefault();
        menu.slideToggle();
    });
    $(window).resize(function () {
        var w = $(window).width();
        if (w >= 480) {
            menu.removeAttr('style');
        }
    });
    /*slider*/
    $(window).load(function () {
        $('#slider').nivoSlider();
    });
});


	

