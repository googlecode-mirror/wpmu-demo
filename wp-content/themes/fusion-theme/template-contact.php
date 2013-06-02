<?php
/*
Template Name: Contact Template
*/
?>
<?php 
//OptionTree Stuff
if ( function_exists( 'get_option_tree') ) {
	$theme_options = get_option('option_tree');
    /* Google Map Options
    ================================================== */
    $latitude = get_option_tree('latitude',$theme_options);
    $longitude = get_option_tree('longitude',$theme_options);
    $marker_icon = get_option_tree('marker_icon',$theme_options);
    $map_zoom = get_option_tree('map_zoom',$theme_options);
}
?>
<?php get_header(); ?>

        <div id="main_wrap">
            <div id="title">
                <div class="container">
            		<div class="sixteen columns">
            			<span class="wrap"><?php echo the_breadcrumb()?></span>
            		</div>
                </div><!-- container -->
            </div>
            <div id="main">
                <div class="container">
                    <?php if($latitude&&$longitude){?>
                    <div class="sixteen columns contact">
                        <div class="frame">
                            <div id="google-map"></div>
                            <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
                            <script>
                                var map;
                                var center = new google.maps.LatLng(<?php echo $latitude;?>,<?php echo $longitude;?>);
                                
                                function initialize() {
                                
                                  var roadAtlasStyles = []
                                
                                  var mapOptions = {
                                    zoom: <?php echo $map_zoom;?>,
                                    center: center,
                                    panControl: false,
                                    zoomControl: true,
                                    mapTypeControl: false,
                                    scaleControl: false,
                                    streetViewControl: false,
                                    overviewMapControl: false,
                                    mapTypeControlOptions: {
                                       mapTypeIds: [google.maps.MapTypeId.ROADMAP, 'map']
                                    }
                                  };
                                
                                  map = new google.maps.Map(document.getElementById("google-map"),
                                      mapOptions);
                                      
                                  var styledMapOptions = {
                                    name: "Map"
                                  };
                                
                                  var usRoadMapType = new google.maps.StyledMapType(
                                      roadAtlasStyles, styledMapOptions);
                                
                                  map.mapTypes.set('map', usRoadMapType);
                                  map.setMapTypeId('map');
                                  
                                    <?php if($marker_icon){?>
                                    var image = '<?php echo $marker_icon;?>';
                                    <?php }else{?>
                                    var image = '<?php echo get_bloginfo( 'template_url' ); ?>/assets/js/google_icon.png';
                                    <?php }?>
                                    
                                    var map_ = new google.maps.LatLng(<?php echo $latitude;?>,<?php echo $longitude;?>);
                                    var Marker = new google.maps.Marker({
                                        position: map_,
                                        map: map,
                                        icon: image
                                    });
                                
                                }
                            </script>
                        </div>
                    </div>
                    <?php }?>                
                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <div class="two-thirds column main-content">
                        <div class="content">
                            <?php the_content(); ?>
                        </div>
                        <div class="contact-form">
                            <h3><?php _e('Get in Touch', GETTEXT_DOMAIN); ?></h3>
                            <div class="result"><?php if($result) echo $result; ?></div>
                            <form name="contactform" id="form" method="post" class="contact" action="sendmail.php">
                                <fieldset>
                                    <input name="name1" id="name1" type="text" value="<?php echo $name1; ?><?php _e('Your Name*', GETTEXT_DOMAIN); ?>"/>
                                    <input name="email" id="email" type="text" value="<?php echo $email; ?><?php _e('Email*', GETTEXT_DOMAIN); ?>"/>
                                    <input name="website" id="website" type="text" value="<?php echo $website; ?><?php _e('Website', GETTEXT_DOMAIN); ?>"/>
                                    <textarea name="msg" id="msg" rows="8"><?php echo $msg; ?><?php _e('Your Commnet*', GETTEXT_DOMAIN); ?></textarea>
                                    <input type="hidden" name="browser_check" value="false" />
                                    <button name="submit" id="submit" type="submit"><span><?php _e('Submit a message', GETTEXT_DOMAIN); ?></span></button>
                                </fieldset>
                            </form>
                            <script type="text/javascript">
                        	document.contactform.browser_check.value = "true"; //sets the hidden input(browser_check) value as true if the javascript is enabled.
                        		
                            $("#submit").click(function(){
                    	 
                        		$('.result').html('<img src="<?php echo get_bloginfo( 'template_url' ); ?>/assets/images/preloader.gif" class="loading-img" alt="loader image">').fadeIn();
                        		var input_data = $('#form').serialize();
                        				$.ajax({
                        				   type: "POST",
                        				   url:  "<?php echo get_bloginfo( 'template_url' ); ?>/sendmail.php",
                        				   data: input_data,
                        				   success: function(msg){
                        					   $('.loading-img').remove(); //Removing the loader image because the validation is finished
                        					   $('<p>').html(msg).appendTo('div.result').hide().fadeIn('slow'); //Appending the output of the php validation in the html div
                        				   }					   
                        				});	
                        				
                        			return false;
                    			
                            });	
                        	</script>
                        </div>
                    </div>
                    <?php endwhile; else: ?>
                    <div class="two-thirds column main-content">
                        <p><?php _e('Sorry, no posts matched your criteria.', GETTEXT_DOMAIN); ?></p>
                    </div>
                    <?php endif; ?>
            		<div class="one-third column sidebar">
                    <?php get_sidebar(); ?>
            		</div>
                </div><!-- container -->
            </div>
        </div>
        
<?php get_footer(); ?>