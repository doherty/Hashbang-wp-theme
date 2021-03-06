(function($) {
    $.stylesheetSwitch = function(style_name) {
        $('#skin').attr('href', function(i, old) {
            return old.replace( /\/\w+\.css$/, '/' + style_name + '.css' );
        });
        createCookie('style', style_name, 365);
    };

    // To remember your last selection
    $.stylesheetInit = function() {
        var c = readCookie('style');
        if (c) {
            $.stylesheetSwitch(c);
        }
    };
})(jQuery);

// cookie functions http://www.quirksmode.org/js/cookies.html
function createCookie(name,value,days) {
    if (days) {
        var date = new Date();
        date.setTime( date.getTime() + (days*24*60*60*1000) );
        var expires = '; expires=' + date.toGMTString();
    }
    else var expires = '';
    document.cookie = name + '=' + value + expires + '; path=/';
}
function readCookie(name) {
    var nameEQ = name + '=';
    var ca = document.cookie.split(';');
    for(var i=0;i < ca.length;i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1,c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
    }
    return null;
}
function eraseCookie(name) {
    createCookie(name, '', -1);
}
// /cookie functions

// main
$(function(){
    // Accordion
    $('h2.contentheader').disableSelection();
    $('h2.menuheader').disableSelection();
    $('#maincol.accordion')
        .accordion({ header: 'h2.contentheader', heightStyle: 'content', collapsible: true, animate: 'easeInOutQuad', active: false })
        .disableSelection();
    $("#menu")
        .accordion({ header: 'h2.menuheader',    heightStyle: 'content', collapsible: true, animate: 'easeInOutQuad', active: false })
        .disableSelection();

    $.stylesheetInit();
    $('.styleswitch').on('click', function() { $.stylesheetSwitch(this.getAttribute('title')); });
});
