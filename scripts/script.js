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
