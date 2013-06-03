  jQuery(document).ready(function($) {
    
    if ($.browser.msie && $.browser.version < 7) return; // Don't execute code if it's IE6 or below cause it doesn't support it.
    
      $(".fade").fadeTo(1, 1);
      $(".fade").hover(
        function () {
          $(this).fadeTo("fast", 0.6);
        },
        function () {
          $(this).fadeTo("slow", 1);
        }
      ); 
      
    $(".img-lightbox").fadeTo(1, 1);
      $(".img-lightbox").hover(
        function () {
          $('.fade').fadeTo("fast", 0.6);
        },
        function () {
          $('.fade').fadeTo("slow", 1);
        }
      ); 
      
	
    /* initialize prettyphoto */
    $("a[rel^='prettyPhoto']").prettyPhoto({
  		theme: 'light_rounded',
      social_tools: false,
      deeplinking: false
    });
    

	$(".toggle_title").toggle(
		function(){
			$(this).addClass('toggle_active');
			$(this).siblings('.toggle_content').slideDown("fast");
		},
		function(){
			$(this).removeClass('toggle_active');
			$(this).siblings('.toggle_content').slideUp("fast");
		}
	);

	$(".tabs_container").each(function(){
		$("ul.tabs",this).tabs("div.panes > div", {tabs:'li',effect: 'fade', fadeOutSpeed: -400});
	});
	$(".mini_tabs_container").each(function(){
		$("ul.mini_tabs",this).tabs("div.panes > div", {tabs:'li',effect: 'fade', fadeOutSpeed: -400});
	});
	$.tools.tabs.addEffect("slide", function(i, done) {
		this.getPanes().slideUp();
		this.getPanes().eq(i).slideDown(function()  {
			done.call();
		});
	});
  
  /* Contact Form Processing */  
  $('#buttonsend').click( function() {
	
		var name    = $('#contactname').val();
		var subject = $('#contactsubject').val();
		var email   = $('#contactemail').val();
		var message = $('#contactmessage').val();
		var siteurl = $('#siteurl').val();
		var sendto = $('#sendto').val();		
		
		$('.contact-loading').fadeIn('fast');
		
		if (name != "" && subject != "" && email != "" && message != "")
			{

				$.ajax(
					{
						url: siteurl+'/sendemail.php',
						type: 'POST',
						data: "name=" + name + "&subject=" + subject + "&email=" + email + "&message=" + message+ "&sendto=" + sendto,
						success: function(result) 
						{
							$('.loading').fadeOut('fast');
							if(result == "email_error") {
								$('#contactemail').next('.require').text(' !');
							} else {
								$('#contactname, #contactsubject, #contactemail, #contactmessage').val("");
								$('.success-message').show().fadeOut(8000, function(){ $(this).remove(); });	
							}
						}
					}
				);
				return false;
				
			} 
		else 
			{
				$('.contact-loading').fadeOut('fast');
				if(name == "") $('#contactname').css({"border":"1px solid #FF7878"}).next('.require').text(' !');
				if(subject == "") $('#contactsubject').css({"border":"1px solid #FF7878"}).next('.require').text(' !');
				if(email == "" ) $('#contactemail').css({"border":"1px solid #FF7878"}).next('.require').text(' !');
				if(message == "") $('#contactmessage').css({"border":"1px solid #FF7878"}).next('.require').text(' !');
				return false;
			}
	});
	
		$('#contactname, #contactsubject, #contactemail,#contactmessage').focus(function(){
			$(this).css({"border":"1px solid #eaeaea"}).next('.require').text(' *');
		});
     
	});	
	
  
