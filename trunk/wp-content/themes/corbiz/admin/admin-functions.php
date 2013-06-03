<?php

/*-----------------------------------------------------------------------------------*/
/* Head Hook
/*-----------------------------------------------------------------------------------*/

function of_head() { do_action( 'of_head' ); }

/*-----------------------------------------------------------------------------------*/
/* Add default options after activation */
/*-----------------------------------------------------------------------------------*/
if (is_admin() && isset($_GET['activated'] ) && $pagenow == "themes.php" ) {
	//Call action that sets
	add_action('admin_head','of_option_setup');
}

function of_option_setup(){

	//Update EMPTY options
	$of_array = array();
	add_option('of_options',$of_array);

	$template = get_option('of_template');
	$saved_options = get_option('of_options');
	
	foreach($template as $option) {
		if($option['type'] != 'heading'){
			if (isset($option['id'])) {
			   $id = $option['id'];
			}
			if (isset($option['std'])) {
			   $std = $option['std'];
			}
			$db_option = get_option($id);
			if(empty($db_option)){
				if(is_array($option['type'])) {
					foreach($option['type'] as $child){
						$c_id = $child['id'];
						$c_std = $child['std'];
						update_option($c_id,$c_std);
						$of_array[$c_id] = $c_std; 
					}
				} else {
					update_option($id,$std);
					$of_array[$id] = $std;
				}
			}
			else { //So just store the old values over again.
				$of_array[$id] = $db_option;
			}
		}
	}
	update_option('of_options',$of_array);
}

/*-----------------------------------------------------------------------------------*/
/* Admin Backend */
/*-----------------------------------------------------------------------------------*/
function optionsframework_admin_head() { 
	
	//Tweaked the message on theme activate
	?>
    <script type="text/javascript">
    jQuery(function(){
	  var message = '<p>This theme comes with an <a href="<?php echo admin_url('admin.php?page=optionsframework'); ?>">options panel</a> to configure settings. This theme also supports widgets, please visit the <a href="<?php echo admin_url('widgets.php'); ?>">widgets settings page</a> to configure them.</p>';
    	jQuery('.themes-php #message2').html(message);
    
    });
    </script>
    <?php
}


if(is_admin()){
  add_action('admin_head', 'optionsframework_admin_head'); 
	add_action('admin_init', 'add_admin_scripts');
}


function add_admin_scripts() {
  wp_enqueue_script( 'shortcodes', get_template_directory_uri() . '/admin/tinymce/shortcodelocalization.js');
	wp_localize_script( 'shortcodes', 'objectL10n', array(
  'columns_title' => __('Columns','corbiz'),
  'columns_inner_title' => __('Inner Columns','corbiz'),
  'elements_title' => __('Elements','corbiz'),
  'list_title' => __('List Style','corbiz'),
  'onefourth_title' => __('One Fourth','corbiz'),
  'onefourth_last_title' => __('One Fourth Last','corbiz'),
  'onethird_title' => __('One Third','corbiz'),
  'onethird_last_title' => __('One Third Last','corbiz'),
  'onehalf_title' => __('One Half','corbiz'),
  'onehalf_last_title' => __('One Half Last','corbiz'),
  'twothird_title' => __('Two Third','corbiz'),
  'threefourth_title' => __('Three Fourth','corbiz'),
  'onefifth_title' => __('One Fifth','corbiz'),
  'onefifth_last_title' => __('One Fifth Last','corbiz'),
  'onefourth_inner_title' => __('One Fourth','corbiz'),
  'onefourth_inner_last_title' => __('One Fourth Last','corbiz'),
  'onethird_inner_title' => __('One Third Inner','corbiz'),
  'onethird_inner_last_title' => __('One Third Inner Last','corbiz'),
  'onehalf_inner_title' => __('One Half  Inner','corbiz'),
  'onehalf_inner_last_title' => __('One Half Inner Last','corbiz'),
  'twothird_inner_title' => __('Two Third Inner ','corbiz'),
  'twothird_inner_last_title' => __('Two Third Inner Last','corbiz'),
  'threefourth_inner_title' => __('Three Fourth Inner ','corbiz'),
  'threefourth_inner_last_title' => __('Three Fourth Inner Last','corbiz'),
  'dropcap_title' => __('Dropcap','corbiz'),
  'pullquote_left_title' => __('Pullquote Left','corbiz'),
  'pullquote_right_title' => __('Pullquote Right','corbiz'),
  'divider_title' => __('Divider','corbiz'),
  'spacer_title' => __('Spacer','corbiz'),
  'tabs_title' => __('Tabs','corbiz'),
  'toggle_title' => __('Toggle','corbiz'),
  'image_title' => __('Image','corbiz'),
  'testimonial_title' => __('Testimonial Block','corbiz'),
  'gmap_title' => __('Google Map','corbiz'),
  'youtube_title' => __('Youtube','corbiz'),
  'vimeo_title' => __('Vimeo','corbiz'),
  'button_title' => __('Buttons','corbiz'),
  'bulletlist_title' => __('Bullet List','corbiz'),
  'starlist_title' => __('Star List','corbiz'),
  'arrowlist_title' => __('Arrow List','corbiz'),
  'itemlist_title' => __('Item List','corbiz'),
  'checklist_title' => __('Check List','corbiz'),
  'infobox_title' => __('Info Box','corbiz'),
  'successbox_title' => __('Success Box','corbiz'),
  'warningbox_title' => __('Warning Box','corbiz'),
  'errorbox_title' => __('Error Box','corbiz'),
  'slideshow_title' => __('Slideshow','corbiz'),
  'roundaboutslider_title' => __('Roundabout Slider','corbiz'),
  'nivoslider_title' => __('Nivo Slider','corbiz'),
  'kwicksslider_title' => __('Kwicks Slider','corbiz'),
  'bxslider_title' => __('BXslider','corbiz'),
  'portfolio_title' => __('Portfolio','corbiz'),
  'portfolio_2col_title' => __('Portfolio 2 Columns','corbiz'),
  'portfolio_3col_title' => __('Portfolio 3 Columns','corbiz'),
  'portfolio_4col_title' => __('Portfolio 4 Columns','corbiz'),
  'portfolio_5col_title' => __('Portfolio 5 Columns','corbiz'),
  'blog_title' => __('Blog','corbiz'),
  'pricing_title' => __('Pricing Table','corbiz'),
  'pricing_3col_title' => __('Pricing 3 Columns','corbiz'),
  'pricing_4col_title' => __('Pricing 4 Columns','corbiz'),
  'pricing_5col_title' => __('Pricing 5 Columns','corbiz'),
  'spacer_title' => __('Spacer','corbiz'),
  'headingtext_title' => __('Heading Text','corbiz'),
  'centertext_title' => __('Center Text','corbiz'),
  'divider_title' => __('Divider / Line','corbiz'),
  'slogan_title' => __('Slogan','corbiz'),
  'latestnews_title' => __('Latest News (Widget)','corbiz'),
  'pagelist_title' => __('Pages List','corbiz'),
  'postlist_title' => __('Posts List ','corbiz'),
  'bloglist_title' => __('Blog List ','corbiz'),
  'content_title' => __('Content','corbiz')
	));

}

	
	
?>