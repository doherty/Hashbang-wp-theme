/**
* Stylesheet toggle variation on styleswitch stylesheet switcher.
* Built on jQuery.
* Under an CC Attribution, Share Alike License.
* By Kelvin Luck ( http://www.kelvinluck.com/ )
**/
(function($) {
    // Local vars for toggle
    var availableStylesheets = [];
    var activeStylesheetIndex = 0;

    // To switch to a specific named stylesheet
    $.stylesheetSwitch = function(styleName) {
        $('link[@rel*=style][title]').each(
            function(i) {
                this.disabled = true;
                if (this.getAttribute('title') == styleName) {
                    this.disabled = false;
                    activeStylesheetIndex = i;
                }
            }
        );
        createCookie('style', styleName, 365);
    };

    // To initialise the stylesheet
    $.stylesheetInit = function() {
        $('link[rel*=style][title]').each(
            function(i) {
                availableStylesheets.push(this.getAttribute('title'));
            }
        );
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
        date.setTime(date.getTime()+(days*24*60*60*1000));
        var expires = "; expires="+date.toGMTString();
    }
    else var expires = "";
    document.cookie = name+"="+value+expires+"; path=/";
}
function readCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for(var i=0;i < ca.length;i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1,c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
    }
    return null;
}
function eraseCookie(name) {
    createCookie(name,"",-1);
}
// /cookie functions

// main
$(function(){
    // Accordion
    $("h2.contentheader").disableSelection();
    $("h2.menuheader").disableSelection();
    $("#maincol.accordion")
        .accordion({ header: "h2.contentheader", autoHeight: false, collapsible: true, animated: "easeInOutQuad", active: false })
        .disableSelection();
    $("#menu")
        .accordion({ header: "h2.menuheader",    autoHeight: false, collapsible: true, animated: "easeInOutQuad", active: false })
        .disableSelection();

    $.stylesheetInit();
    $('.styleswitch')
        .bind('click', function(e) { $.stylesheetSwitch(this.getAttribute('rel')); return false; });
});
