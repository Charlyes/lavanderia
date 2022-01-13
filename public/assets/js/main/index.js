var toggleMenu = true;
function menuClose() {
    $('.link-text').fadeOut();
    setTimeout(function(){
        $('#left-close').animate({left: 40});
        $('#left').animate({width: 40});
        $('#main').animate({width: $(window).width() - 40, left: 40},function(){
            $('#left-close-icon').removeClass('glyphicon-chevron-left').addClass('glyphicon-chevron-right');
        });
    },300);
}

function menuOpen() {
    $('#left-close').animate({left: '15%'});
    $('#left').animate({width: '15%'});
    $('#main').animate({width: '85%', left: '15%'},function(){
        $('.link-text').fadeIn();
        $('#left-close-icon').removeClass('glyphicon-chevron-right').addClass('glyphicon-chevron-left');
    });
}
$(document).ready(function () {
    adjustSite();
    $('#left-close').click(function () {
        if (toggleMenu) {
            toggleMenu = false;
            menuClose();
        } else {
            toggleMenu = true;
            menuOpen();
        }
    });
});
$(window).resize(function () {
    adjustSite();
});
function adjustSite() {
    $('#left, #main').height($(window).height());
//    if (toggleMenu) {
//        menuOpen();
//    } else {
//        menuClose();
//    }
    if ($(window).width() <= 768) {
        //se for mobile
        
    }
}