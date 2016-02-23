var DEBUG = true;

$(function () {
    if((navigator.userAgent.match(/Macintosh/i) != null && navigator.userAgent.match(/Macintosh/i).length > 0) || (navigator.userAgent.match(/Windows/i) != null && navigator.userAgent.match(/Windows/i).length > 0)) {
        $('#desktopOverlay').show();
        $('body').css('overflow', 'hidden');
    } else {
        $('body').css('overflow', 'auto');
    }

    orientationChange();

    $(window).on("orientationchange", function () {
        orientationChange();
    });

    $('.submitBtn').click(function(e){
        $submit = $(this);
        e.preventDefault(); // prevent the form from being submitted until we say so
        $('#loadingOverlay').css('display', 'block');
        $('#loadingOverlay').animate({
            opacity: 1
        }, 1000, function(){
            setTimeout(submitForm, 4000);
        });
    });

    var nav_overlay_flag = false;
    $('.navbar-toggle').click(function(e){
        if(!nav_overlay_flag) {
            $('.nav_overlay').css({
                'display': 'block',
                'z-index': '1029'
            });
            nav_overlay_flag = true;
        } else {
            $('.nav_overlay').css({
                'display': 'none',
                'z-index': '0'
            });
            nav_overlay_flag = false;
        }
    });

    $('.popup').click(function(e){
        var classCheck = $(this)[0].classList;
        setTimeout(function(){
            $('.popup_overlay').css({
                'display': 'block',
                'z-index': '9000'
            });
            if(classCheck.contains('otherGroup')) {
                $('.diffGroupPopup').css('display', 'block');
            }
        }, 500);
    });

    $('.popup_overlay').click(function(e){
        $(this).css({
            'display': 'none',
            'z-index': '0'
        });
        $('.closePopup').css('display', 'none');
    });

    $('.nav_overlay').click(function(e){
        if(nav_overlay_flag) {
            $('.navbar-toggle').click();
        }
    });

    var ink, d, x, y;
    $(".ripplelink").click(function(e){
        if($(this).find(".ink").length == 0){
            $(this).prepend("<span class='ink'></span>");
        }

        ink = $(this).find(".ink");
        ink.removeClass("animate");

        if(!ink.height() && !ink.width()){
            d = Math.max($(this).outerWidth(), $(this).outerHeight());
            ink.css({height: d, width: d});
        }

        x = e.pageX - $(this).offset().left - ink.width()/2;
        y = e.pageY - $(this).offset().top - ink.height()/2;

        ink.css({top: y+'px', left: x+'px'}).addClass("animate");
    });
});


function submitForm(){
    $('form').submit();
}


function orientationChange() {
    switch (window.orientation) {
    case 0:
        $('#orientationOverlay').hide();
        $('body').css('overflow', 'auto');
        break;
    default:
        (DEBUG) ? $('#orientationOverlay').hide() : $('#orientationOverlay').show();
        $('body').css('overflow', 'hidden');
        break;
    }
}
