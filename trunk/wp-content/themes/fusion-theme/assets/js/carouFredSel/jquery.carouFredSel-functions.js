jQuery(document).ready(function() {

    carouFredSelSitemap();
    sidebarCarouFredSel();
    footerCarouFredSel();
	
});

function carouFredSelSitemap() {
    if(screen.width < 500 || 
    navigator.userAgent.match(/Android/i) || 
    navigator.userAgent.match(/webOS/i) || 
    navigator.userAgent.match(/iPhone/i) || 
    navigator.userAgent.match(/iPod/i)){
        var iTems = 1;
    }else{
        var iTems = 3;
    }
	$('.list_items-sitemap').carouFredSel({
        width   : "100%",
        align : 'left',
        //height   : "auto",
		circular: false,
		infinite: false,
		auto : false,
		pagination  : {
			container : '.pager-sitemap',
			items : iTems
		}
	});
}
function sidebarCarouFredSel() {
	$('.sidebar .sidebar_list_items').carouFredSel({
        width   : "100%",
        align : 'left',
        //height   : "auto",
		circular: false,
		infinite: false,
		auto : false,
		pagination  : {
			container : '.sidebar .pager',
			items : 1
		}
	});
}
function footerCarouFredSel() {
	$('#footer .sidebar_list_items').carouFredSel({
        width   : "100%",
        align : 'left',
        //height   : "auto",
		circular: false,
		infinite: false,
		auto : false,
		pagination  : {
			container : '#footer .pager',
			items : 1
		}
	});
}	
