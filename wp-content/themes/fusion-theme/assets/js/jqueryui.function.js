	$(function() {
		$( ".ui-tabs" ).tabs();
    	$( ".ui-toggle" ).accordion({
    	  autoHeight: false,
    	  collapsible: true,
          active: false,
    	});
        if(screen.width < 500 || 
        navigator.userAgent.match(/Android/i) || 
        navigator.userAgent.match(/webOS/i) || 
        navigator.userAgent.match(/iPhone/i) || 
        navigator.userAgent.match(/iPod/i)){
            var mobileFix = false;
        }else{
            var mobileFix = true;
        }
    	$( ".ui-accordion" ).accordion({
    	   autoHeight: mobileFix,
    	});
	});