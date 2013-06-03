<?php

add_action('init','of_options');

if (!function_exists('of_options')) {
function of_options(){
	
// VARIABLES
$themename = get_theme_data(STYLESHEETPATH . '/style.css');
$themename = $themename['Name'];
$shortname = "corbiz";

// Populate OptionsFramework option in array for use in theme
global $of_options;
$of_options = get_option('of_options');

$GLOBALS['template_path'] = OF_DIRECTORY;

//Access the WordPress Categories via an Array
$of_categories = array();  
$of_categories_obj = get_categories('hide_empty=0');
foreach ($of_categories_obj as $of_cat) {
  $of_categories[$of_cat->cat_ID] = $of_cat->cat_name;
}    
//$categories_tmp = array_unshift($of_categories, "Select a category:");    


$of_product_categories = array();
$product_categories = get_categories('taxonomy=product_category&orderby=ID&title_li=&hide_empty=0');
foreach ($product_categories as $product_category) { 
  $of_product_categories[$product_category->cat_ID] = $product_category->cat_name;
}

$of_slide_categories = array();
$slideshow_categories = get_categories('taxonomy=slideshow_category&orderby=ID&title_li=&hide_empty=0');
foreach ($slideshow_categories as $slide_category) { 
  $of_slide_categories[$slide_category->cat_ID] = $slide_category->cat_name;
}


//Access the WordPress Pages via an Array
$of_pages = array();
$of_pages_obj = get_pages('parent=0');
foreach ($of_pages_obj as $of_page) {
  $of_pages[$of_page->ID] = $of_page->post_title; 
}
//$of_pages_tmp = array_unshift($of_pages, "Select a page:");       

// Image Alignment radio box
$options_thumb_align = array("alignleft" => "Left","alignright" => "Right","aligncenter" => "Center"); 

// Image Links to Options
$options_image_link_to = array("image" => "The Image","post" => "The Post"); 

//Testing 
$options_select = array("one","two","three","four","five"); 
$options_radio = array("one" => "One","two" => "Two","three" => "Three","four" => "Four","five" => "Five"); 

//Stylesheets Reader
$alt_stylesheet_path = OF_FILEPATH . '/styles/';
$alt_stylesheets = array();

if ( is_dir($alt_stylesheet_path) ) {
    if ($alt_stylesheet_dir = opendir($alt_stylesheet_path) ) { 
        while ( ($alt_stylesheet_file = readdir($alt_stylesheet_dir)) !== false ) {
            if(stristr($alt_stylesheet_file, ".css") !== false) {
                $alt_stylesheets[] = $alt_stylesheet_file;
            }
        }    
    }
}

/* Get Cufon fonts into a drop-down list */
$cufonts = array();
if(is_dir(TEMPLATEPATH . "/js/fonts/")) {
	if($open_dirs = opendir(TEMPLATEPATH . "/js/fonts")) {
		while(($cufontfonts = readdir($open_dirs)) !== false) {
			if(stristr($cufontfonts, ".js") !== false) {
				$cufonts[] = $cufontfonts;
			}
		}
	}
}
$cufonts_dropdown = $cufonts;

//More Options
$uploads_arr = wp_upload_dir();
$all_uploads_path = $uploads_arr['path'];
$all_uploads = get_option('of_uploads');
$other_entries = array("Select a number:","1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19");
$body_repeat = array("no-repeat","repeat-x","repeat-y","repeat");
$body_pos = array("top left","top center","top right","center left","center center","center right","bottom left","bottom center","bottom right");
    
$slide_effects = array("sliceDown","sliceDownLeft","sliceUp","sliceUpLeft","sliceUpDown","sliceUpDownLeft","fold","fade","random","slideInRight","slideInLeft","boxRandom","boxRain","boxRainReverse","boxRainGrow","boxRainGrowReverse");
$skitter_slide_effects = array("cube", "cubeRandom", "block", "cubeStop", "cubeHide", "cubeSize", "horizontal", "showBars", "showBarsRandom", "tube", "fade", "fadeFour", "paralell", "blind", "blindHeight", "blindWidth", "directionTop", "directionBottom", "directionRight", "directionLeft", "cubeStopRandom", "cubeSpread", "cubeJelly", "glassCube", "glassBlock", "circles", "circlesInside", "circlesRotate", "cubeShow", "upBars", "downBars", "hideBars", "swapBars", "swapBarsBack", "random", "randomSmart");

// Set the Options Array
$options = array();


$options[] = array( "name" => "General Settings",
                    "icon" => "general",
                    "type" => "heading");

$options[] = array( "type" => "info",
                    "std" => "General settings for your site that will be used in general pages");

$options[] = array( "name" => "Custom Main Logo",
					"desc" => "Upload a logo for your theme, or specify the image address of your online logo. (http://yoursite.com/logo.png)",
					"id" => $shortname."_logo",
					"std" => "",
					"type" => "upload");
                
$options[] = array( "name" => "Custom Favicon",
					"desc" => "Upload a 16px x 16px Png/Gif image that will represent your website's favicon.",
					"id" => $shortname."_custom_favicon",
					"std" => "",
					"type" => "upload"); 
					
$options[] = array( "name" => "Tracking Code",
					"desc" => "Paste your Google Analytics (or other) tracking code here. This will be added into the footer template of your theme.",
					"id" => $shortname."_google_analytics",
					"std" => "",
					"type" => "textarea");                       
                                       
$options[] = array( "name" => "404 Text",
					"desc" => "Enter your 404 (Page Not Found) Text here.",
					"id" => $shortname."_404_text",
					"std" => "",
					"type" => "textarea");         


$options[] = array( "name" => "Footer Text",
					"desc" => "Enter your site copyright here.",
					"id" => $shortname."_footer_text",
					"std" => "",
					"type" => "textarea");
          
$options[] = array( "name" => "Pages &amp; Categories",
                    "icon" => "page_cat",
                    "type" => "heading");

$options[] = array( "name" => "Enable Breadcrumb navigation?",
					"desc" => "Please check this option if you want to enable breadcrumb navigation.",
					"id" => $shortname."_enable_breadcrumb",
					"std" => "true",
					"type" => "checkbox");	
          					
$options[] = array( "name" => "Your Testimonial Category",
					"desc" => "Select your Testimonial category.",
					"id" => $shortname."_testimonial_cat",
					"std" => "",
					"type" => "select",
					"options" => $of_categories);

$options[] = array( "name" => "Your Team Category",
					"desc" => "Select your Team category.",
					"id" => $shortname."_team_cat",
					"std" => "",
					"type" => "select",
					"options" => $of_categories);

$options[] = array( "name" => "Enable child pages menu in sidebar?",
					"desc" => "Please check this option if you want to show the child pages of your main page at the sidebar.",
					"id" => $shortname."_enable_child_sidebar",
					"std" => "false",
					"type" => "checkbox");			
          				
$options[] = array( "name" => "Homepage Settings",
                    "icon" => "homepage",
                    "type" => "heading");
					       
$options[] = array( "type" => "info",
                    "std" => "4 columns Site features for homepage");
                    
$options[] = array( "name" => "Title for Homepage features box #1",
					"desc" => "Enter your title for homepage features box #1",
					"id" => $shortname."_featuresbox_title1",
					"std" => "",
					"type" => "text");
					
$options[] = array( "name" => "Custom URL for Homepage features box #1",
					"desc" => "Enter your custom URL for homepage features box #1",
					"id" => $shortname."_featuresbox_desturl1",
					"std" => "",
					"type" => "text"); 
					
$options[] = array( "name" => "Icon for Homepage features box #1",
					"desc" => "Enter your icon url for homepage features box #1, recommended size 32x32px",
					"id" => $shortname."_featuresbox_image1",
					"std" => "",
					"type" => "upload");
              
$options[] = array( "name" => "Short Description for Homepage features box #1",
					"desc" => "Enter your brief short description for homepage features box #1",
					"id" => $shortname."_featuresbox_desc1",
					"std" => "",
					"type" => "textarea");  

$options[] = array( "name" => "Title for Homepage features box #2",
					"desc" => "Enter your title for homepage features box #2",
					"id" => $shortname."_featuresbox_title2",
					"std" => "",
					"type" => "text");
					
$options[] = array( "name" => "Custom URL for Homepage features box #2",
					"desc" => "Enter your custom URL for homepage features box #2",
					"id" => $shortname."_featuresbox_desturl2",
					"std" => "",
					"type" => "text"); 
					
$options[] = array( "name" => "Icon for Homepage features box #2",
					"desc" => "Enter your icon url for homepage features box #2, recommended size 32x32px",
					"id" => $shortname."_featuresbox_image2",
					"std" => "",
					"type" => "upload");
              
$options[] = array( "name" => "Short Description for Homepage features box #2",
					"desc" => "Enter your brief short description for homepage features box #2",
					"id" => $shortname."_featuresbox_desc2",
					"std" => "",
					"type" => "textarea");  
                 
$options[] = array( "name" => "Title for Homepage features box #3",
					"desc" => "Enter your title for homepage features box #3",
					"id" => $shortname."_featuresbox_title3",
					"std" => "",
					"type" => "text");
					
$options[] = array( "name" => "Custom URL for Homepage features box #3",
					"desc" => "Enter your custom URL for homepage features box #3",
					"id" => $shortname."_featuresbox_desturl3",
					"std" => "",
					"type" => "text"); 
					
$options[] = array( "name" => "Icon for Homepage features box #3",
					"desc" => "Enter your icon url for homepage features box #3, recommended size 32x32px",
					"id" => $shortname."_featuresbox_image3",
					"std" => "",
					"type" => "upload");
              
$options[] = array( "name" => "Short Description for Homepage features box #3",
					"desc" => "Enter your brief short description for homepage features box #3",
					"id" => $shortname."_featuresbox_desc3",
					"std" => "",
					"type" => "textarea");  

$options[] = array( "name" => "Title for Homepage features box #4",
					"desc" => "Enter your title for homepage features box #4",
					"id" => $shortname."_featuresbox_title4",
					"std" => "",
					"type" => "text");
					
$options[] = array( "name" => "Custom URL for Homepage features box #4",
					"desc" => "Enter your custom URL for homepage features box #4",
					"id" => $shortname."_featuresbox_desturl4",
					"std" => "",
					"type" => "text"); 
					
$options[] = array( "name" => "Icon for Homepage features box #4",
					"desc" => "Enter your icon url for homepage features box #4, recommended size 32x32px",
					"id" => $shortname."_featuresbox_image4",
					"std" => "",
					"type" => "upload");
              
$options[] = array( "name" => "Short Description for Homepage features box #4",
					"desc" => "Enter your brief short description for homepage features box #4",
					"id" => $shortname."_featuresbox_desc4",
					"std" => "",
					"type" => "textarea");  
          															
$options[] = array( "name" => "Slideshow Setting",
                    "icon" => "slideshow",
                    "type" => "heading");

$options[] = array( "name" => "Slide Categories",
					"desc" => "Please choose the slide category for the homepage slideshow",
					"id" => $shortname."_slideshow_cat",
					"std" => "",
					"type" => "select",
					"options" => $of_slide_categories);
          
$options[] = array( "name" => "Slideshow Items Order",
					"desc" => "Select your order parameter for slideshow items.",
					"id" => $shortname."_slideshow_order",
					"std" => "date",
					"type" => "select",
					"options" => array("author","date","title","modified","menu_order","parent","ID","rand"));				                                                    
          
$options[] = array( "type" => "info",
                    "std" => "Nivo Slider Settings");
                    
$options[]	= array(	"name" => "Transition Types",
    			"desc" => "Please select transition types for your slideshow translation effect.",
    			"id" => $shortname."_nivo_transition",
    			"type" => "select",
          "options" => $slide_effects);
          
$options[]	= array(	"name" => "Slide Slice Number",
    			"desc" => "Please enter number of slices for slideshow.",
          "std" => "15",
    			"id" => $shortname."_nivo_slices",
    			"type" => "text");

$options[]	= array(	"name" => "Slide transition speed",
    			"desc" => "Please enter speed time for transation (in milliseconds).",
    			"id" => $shortname."_nivo_animspeed",
          "std" => "500",
    			"type" => "text");

$options[]	= array(	"name" => "Slide Paused Time",
    			"desc" => "The duration between each slide transition (in milliseconds).",
    			"id" => $shortname."_nivo_pausespeed",
          "std" => "3000",
    			"type" => "text");

$options[] = array( "name" => "Enable Direction Navigation?",
					"desc" => "if false, will hide 'next' and 'prev' control",
					"id" => $shortname."_nivo_directionNav",
					"std" => "true",
					"type" => "select",
					"options" => array("true","false"));

$options[] = array( "name" => "Hide Direction Navigation button on hover?",
					"desc" => "Only show direction navigation button on hover",
					"id" => $shortname."_nivo_directionNavHide",
					"std" => "true",
					"type" => "select",
					"options" => array("true","false"));

$options[] = array( "name" => "Enable control Navigation (dot navigation)?",
					"desc" => "if false, will hide dot navigation control",
					"id" => $shortname."_nivo_controlNav",
					"std" => "true",
					"type" => "select",
					"options" => array("true","false"));					

$options[] = array( "name" => "Enable Caption?",
					"desc" => "enable caption in slide image",
					"id" => $shortname."_nivo_caption",
					"std" => "true",
					"type" => "select",
					"options" => array("true","false"));	

$options[] = array( "name" => "Disable Image Permalink?",
					"desc" => "disable custom permalink for slideshow images",
					"id" => $shortname."_nivo_disable_permalink",
					"std" => "false",
					"type" => "select",
					"options" => array("true","false"));	
          				
$options[] = array( "type" => "info",
                    "std" => "Kwicks Slider Settings");
          
$options[]	= array(	"name" => "Slide speed",
    			"desc" => "Please enter transation speed (in milliseconds).",
    			"id" => $shortname."_kwicks_speed",
          "std" => "600",
    			"type" => "text");					

$options[] = array( "name" => "Disable Caption?",
					"desc" => "disable caption in slide image",
					"id" => $shortname."_kwicks_caption",
					"std" => "false",
					"type" => "select",
					"options" => array("true","false"));	

$options[] = array( "type" => "info",
                    "std" => "Skitter Slider Settings");
                    
$options[]	= array(	"name" => "Transition Types",
    			"desc" => "Please select transition types for your slideshow translation effect.",
    			"id" => $shortname."_skitter_transition",
    			"type" => "select",
          "options" => $skitter_slide_effects);

$options[]	= array(	"name" => "Slide transition speed",
    			"desc" => "Please enter speed time for transation (in milliseconds).",
    			"id" => $shortname."_skitter_interval",
          "std" => "3000",
    			"type" => "text");
          
$options[] = array( "name" => "Enable Caption?",
					"desc" => "enable caption in slide image",
					"id" => $shortname."_skitter_caption",
					"std" => "true",
					"type" => "select",
					"options" => array("true","false"));	

$options[] = array( "name" => "Disable Image Permalink?",
					"desc" => "disable custom permalink for slideshow images",
					"id" => $shortname."_skitter_disable_permalink",
					"std" => "false",
					"type" => "select",
					"options" => array("true","false"));	

$options[] = array( "type" => "info",
                    "std" => "Anything Slider Settings");
          
$options[]	= array(	"name" => "Slide speed",
    			"desc" => "Please enter transation speed (in milliseconds).",
    			"id" => $shortname."_anything_speed",
          "std" => "3000",
    			"type" => "text");					

$options[] = array( "type" => "info",
                    "std" => "Static Slideshow settings");

$options[] = array( "name" => "Image/Video url source for Static slideshow",
					"desc" => "Please enter your image/video url for static slideshow, eg. http://imediapixel.com/uploads/2010/01/slideshow.jpg or http://www.youtube.com/watch?v=VKP1t3gQ_o0 or http://vimeo.com/2074812",
					"id" => $shortname."_static_slideshow_source",
					"std" => "",
					"type" => "text");
          					
$options[] = array( "name" => "Products Options",
          "icon" => "product",
					"type" => "heading"); 	   
					
$options[] = array( "name" => "Currency Sign",
					"desc" => "Please enter your currency sign here, you can add your currency html special character, for detail please visit <a href='http://webdesign.about.com/od/localization/l/blhtmlcodes-cur.htm'>http://webdesign.about.com/od/localization/l/blhtmlcodes-cur.htm</a> in Numerical Code column",
					"id" => $shortname."_currency",
					"std" => "&#36;",
					"type" => "text");

$options[] = array( "name" => "Billing Cycle",
					"desc" => "Please enter your billig cycle",
					"id" => $shortname."_billing_cycle",
					"std" => "monthly",
					"type" => "select",
          "options" => array("none","month","year")
          );
          
$options[] = array( "name" => "Product Items Order",
					"desc" => "Select your order parameter for portfolio items.",
					"id" => $shortname."_product_order",
					"std" => "",
					"type" => "select",
					"options" => array("author","date","title","modified","menu_order","parent","ID","rand"));				                                                    

$options[] = array( "name" => "Buy Now text",
					"desc" => "Please enter your custom text for order button, eg. Order now / Buy Now",
					"id" => $shortname."_product_button_text",
					"std" => "",
					"type" => "text");  
                           
$options[] = array( "name" => "Blog Options",
          "icon" => "blog",
					"type" => "heading"); 	   

$options[] = array( "name" => "Your Blog page",
					"desc" => "Select your blog page.",
					"id" => $shortname."_blog_page",
					"std" => "",
					"type" => "select",
					"options" => $of_pages);

$options[] = array( "name" => "Blog Categories",
					"desc" => "Please check the categories that you want to include in Blog page.",
					"id" => $shortname."_blog_categories",
					"std" => "",
					"type" => "multicheck",
					"options" => $of_categories);				  
					
$options[] = array( "name" => "Excerpt number",
					"desc" => "Please enter your number for blog post excerpt.",
					"id" => $shortname."_blog_text_num",
					"std" => "",
					"type" => "text");  
					
$options[] = array( "name" => "Blog Items Order",
					"desc" => "Select your order parameter for blog items.",
					"id" => $shortname."_blog_order",
					"std" => "",
					"type" => "select",
					"options" => array("author","date","title","modified","menu_order","parent","ID","rand"));				                                                    
                                         
$options[] = array( "name" => "Number items to display per page",
					"desc" => "Please enter your number to display your Blog items per page.",
					"id" => $shortname."_blog_items_num",
					"std" => "",
					"type" => "text");  
										
$options[] = array( "name" => "Disable Authorbox?",
					"desc" => "Please check this option if you want to hide authorbox in actual post.",
					"id" => $shortname."_author_box",
					"std" => "false",
					"type" => "checkbox");						
                                     
$options[] = array( "name" => "Disable Posts Comment?",
					"desc" => "Please check this option if you want to hide posts comment section in actual post.",
					"id" => $shortname."_disable_comment",
					"std" => "false",
					"type" => "checkbox");	
                                                                                                      
$options[] = array( "name" => "Styling Options",
          "icon" => "styling",
					"type" => "heading");
$url_shadow=  get_stylesheet_directory_uri() . '/images/shadow/';
$options[] = array( "name" => "Shadow style",
					"desc" => "Please select one of available shadow style as your default shadow for your slideshow and page heading section.",
					"id" => $shortname."_heading_shadow",
					"std" => "",
					"type" => "images",
					"options" => array(
            'shadow1.png' => $url_shadow . 'shadow1.png',
						'shadow2.png' => $url_shadow . 'shadow2.png',
						'shadow3.png' => $url_shadow . 'shadow3.png',
            'shadow4.png' => $url_shadow . 'shadow4.png',
            'shadow5.png' => $url_shadow . 'shadow5.png',
						'shadow6.png' => $url_shadow . 'shadow6.png',
						'shadow7.png' => $url_shadow . 'shadow7.png',
            'shadow8.png' => $url_shadow . 'shadow8.png',
            'shadow9.png' => $url_shadow . 'shadow9.png'
            ));
            
$options[] = array( "type" => "info",
                    "std" => "Custom background pattern, color and image");
                    
$url_bgcolor =  get_stylesheet_directory_uri() . '/admin/images/bgcolor/';
$options[] = array( "name" => "Predefined Skins",
					"desc" => "Please select one of predefined skins as your default skin.",
					"id" => $shortname."_predefined_skins",
					"std" => "",
					"type" => "images",
					"options" => array(
            '#6da000' => $url_bgcolor . 'green.png',
						'#20a9dc' => $url_bgcolor . 'blue.png',
						'#C4703C' => $url_bgcolor . 'brown.png',
            '#333333' => $url_bgcolor . 'dark.png',
            '#354b7c' => $url_bgcolor . 'blue-maroon.png',
            '#888888' => $url_bgcolor . 'grey.png',
            '#f59028' => $url_bgcolor . 'orange.png',
						'#993966' => $url_bgcolor . 'pink.png',
            '#8e40a2' => $url_bgcolor . 'purple.png',
            '#b83037' => $url_bgcolor . 'red.png'
            ));
					
$options[] = array( "name" => "Custom Background Color",
					"desc" => "please define your body background color with this option",
					"id" => $shortname."_custom_color",
					"std" => "",
					"type" => "color"); 

$url_bgpattern =  get_stylesheet_directory_uri() . '/images/pattern/';
$options[] = array( "name" => "Pattern",
					"desc" => "Please select of one of patterns as your default background pattern.",
					"id" => $shortname."_bg_pattern",
					"std" => "",
					"type" => "images",
					"options" => array(
            'transparent-grid1.png' => $url_bgpattern . 'transparent-grid1.png',
            'transparent-grid2.png' => $url_bgpattern . 'transparent-grid2.png',
            'transparent-grid3.png' => $url_bgpattern . 'transparent-grid3.png',
            'transparent-grid4.png' => $url_bgpattern . 'transparent-grid4.png',
            'transparent-grid5.png' => $url_bgpattern . 'transparent-grid5.png',
            'transparent-grid6.png' => $url_bgpattern . 'transparent-grid6.png',
            'transparent-minimalist1.png' => $url_bgpattern . 'transparent-minimalist1.png',
            'transparent-minimalist2.png' => $url_bgpattern . 'transparent-minimalist2.png',
            'transparent-minimalist3.png' => $url_bgpattern . 'transparent-minimalist3.png',
            'transparent-minimalist4.png' => $url_bgpattern . 'transparent-minimalist4.png',
            'transparent-minimalist5.png' => $url_bgpattern . 'transparent-minimalist5.png',
            'transparent-minimalist6.png' => $url_bgpattern . 'transparent-minimalist6.png',
            'transparent-minimalist7.png' => $url_bgpattern . 'transparent-minimalist7.png',
            'transparent-minimalist8.png' => $url_bgpattern . 'transparent-minimalist8.png',
            'transparent-minimalist9.png' => $url_bgpattern . 'transparent-minimalist9.png',
            'transparent-minimalist10.png' => $url_bgpattern . 'transparent-minimalist10.png',
            'transparent-minimalist11.png' => $url_bgpattern . 'transparent-minimalist11.png',
            'transparent-minimalist12.png' => $url_bgpattern . 'transparent-minimalist12.png',
            'transparent-1.png' => $url_bgpattern . 'transparent-1.png',
            'transparent-2.png' => $url_bgpattern . 'transparent-2.png',
            'transparent-4.png' => $url_bgpattern . 'transparent-4.png',
            'transparent-5.png' => $url_bgpattern . 'transparent-5.png',
            'transparent-checkered_pattern.png' => $url_bgpattern . 'transparent-checkered_pattern.png',
            'transparent-dice1.png' => $url_bgpattern . 'transparent-dice1.png',
            'transparent-dice2.png' => $url_bgpattern . 'transparent-dice2.png',
            'transparent-flower1.png' => $url_bgpattern . 'transparent-flower1.png',
            'transparent-flower2.png' => $url_bgpattern . 'transparent-flower2.png',
            'transparent-flower5.png' => $url_bgpattern . 'transparent-flower5.png',
            'transparent-flower6.png' => $url_bgpattern . 'transparent-flower6.png',
            'transparent-flower7.png' => $url_bgpattern . 'transparent-flower7.png',
            'transparent-flower8.png' => $url_bgpattern . 'transparent-flower8.png',
            'transparent-flower9.png' => $url_bgpattern . 'transparent-flower9.png',
            'transparent-flower10.png' => $url_bgpattern . 'transparent-flower10.png',
            'transparent-flower11.png' => $url_bgpattern . 'transparent-flower11.png',
            'transparent-flower12.png' => $url_bgpattern . 'transparent-flower12.png',
            'transparent-flower13.png' => $url_bgpattern . 'transparent-flower13.png',
            'transparent-flower14.png' => $url_bgpattern . 'transparent-flower14.png',
            'transparent-flower15.png' => $url_bgpattern . 'transparent-flower15.png',
            'transparent-flower16.png' => $url_bgpattern . 'transparent-flower16.png',
            'transparent-pixelite' => $url_bgpattern . 'transparent-pixelite.png',
            'argyle.png' => $url_bgpattern . 'argyle.png',
            'batthern.png' => $url_bgpattern . 'batthern.png',
            'black_linen_v2.png' => $url_bgpattern . 'black_linen_v2.png',
            'carbon_fibre.png' => $url_bgpattern . 'carbon_fibre.png',
            'crissXcross.png' => $url_bgpattern . 'crissXcross.png',
            'cubes.png' => $url_bgpattern . 'cubes.png',
            'dark_geometric.png' => $url_bgpattern . 'dark_geometric.png',
            'dark_mosaic.png' => $url_bgpattern . 'dark_mosaic.png',
            'dark_stripes.png' => $url_bgpattern . 'dark_stripes.png',
            'dark_wood.png' => $url_bgpattern . 'dark_wood.png',
            'darth_stripe.png' => $url_bgpattern . 'darth_stripe.png',
            'diagmonds.png' => $url_bgpattern . 'diagmonds.png',
            'fake_brick.png' => $url_bgpattern . 'fake_brick.png',
            'ghost-tile.gif' => $url_bgpattern . 'ghost-tile.gif',
            'gold_scale.png' => $url_bgpattern . 'gold_scale.png',
            'graphy.png' => $url_bgpattern . 'graphy.png',
            'gridme.png' => $url_bgpattern . 'gridme.png',
            'leather-black.png' => $url_bgpattern . 'leather-black.png',
            'leather-white.png' => $url_bgpattern . 'leather-white.png',
            'padded.png' => $url_bgpattern . 'padded.png',
            'pinstripe.png' => $url_bgpattern . 'pinstripe.png',
            'sand-blossom.gif' => $url_bgpattern . 'sand-blossom.gif',
            'struckaxiom.png' => $url_bgpattern . 'struckaxiom.png',
            'subtle-wood.gif' => $url_bgpattern . 'subtle-wood.gif',
            'tasky_pattern.png' => $url_bgpattern . 'tasky_pattern.png',
            'tileable_wood_texture.png' => $url_bgpattern . 'tileable_wood_texture.png',
            'triangles.png' => $url_bgpattern . 'triangles.png',
            'washi.png' => $url_bgpattern . 'washi.png',
            'padded.png' => $url_bgpattern . 'padded.png',
            'whitediamond.png' => $url_bgpattern . 'whitediamond.png',
            'winchester-walls.gif' => $url_bgpattern . 'winchester-walls.gif',
            'wood1.png' => $url_bgpattern . 'wood1.png',
            'wood2.png' => $url_bgpattern . 'wood2.png',
            'wood3.png' => $url_bgpattern . 'wood3.png',
            'wood4.png' => $url_bgpattern . 'wood4.png',
            'wood5.png' => $url_bgpattern . 'wood5.png'
          ));

$options[] = array( "type" => "info",
                    "std" => "Background Image");

$options[] = array( "name" => "Enable Full Size Background Image?",
					"desc" => "Please check this option if you want to use custom background image.",
					"id" => $shortname."_enable_bgimage",
					"std" => "false",
					"type" => "checkbox");	
          
$options[] = array( "name" => "Full Size Background Image URL",
					"desc" => "Upload your full size background image url here.",
					"id" => $shortname."_bgimage",
					"std" => "",
					"type" => "upload"); 

$options[] = array( "name" => "Full Size Background Image Position",
					"desc" => "Select your default full size background image position.",
					"id" => $shortname."_bgimage_position",
					"std" => "center top",
					"type" => "select",
					"options" => array("left top","left center","left bottom","right top","right center","right bottom","center top","center center","center bottom"));

$options[] = array( "type" => "info",
                    "std" => "Cufon font");
                    
$options[] = array( "name" => "Cufon Font",
					"desc" => "Select your default cufon font.",
					"id" => $shortname."_cufon_font",
					"std" => "",
					"type" => "select",
					"options" => $cufonts);

										
$options[] = array( "name" => "Disable Cufon?",
					"desc" => "Please check this option if you want to disable cufon feature.",
					"id" => $shortname."_disable_cufon",
					"std" => "false",
					"type" => "checkbox");		

$options[] = array( "type" => "info",
                    "std" => "Body text color, size and font family");
                    
$options[] = array( "name" => "Body Text Typograpy",
					"desc" => "Please set this option if you want to use your custom styling for body text paragraph",
					"id" => $shortname."_custom_body_text",
					"std" => array('size' => '12','unit' => 'em','face' => 'Arial','color' => '#787878'),
					"type" => "typography");
					 					
$options[] = array( "type" => "info",
                    "std" => "Custom css code box");
                    
$options[] = array( "name" => "Custom CSS",
          "desc" => "Quickly add some CSS to your theme by adding it to this block.",
          "id" => $shortname."_custom_css",
          "std" => "",
          "type" => "textarea");
          
$options[] = array( "name" => "Contact Info",
          "icon" => "contact",
					"type" => "heading");      
          
$options[] = 	array(	"name" => "Latitude",
			"desc" => "Enter your latitude here, for quick search your latitude, please visit <a href='http://itouchmap.com/latlong.html'>http://itouchmap.com/latlong.html</a>",
			"id" => $shortname."_info_latitude",
			"type" => "text");

$options[] = 	array(	"name" => "Longitude",
			"desc" => "Enter your longitude here, for quick search your longitude, <a href='http://itouchmap.com/latlong.html'>http://itouchmap.com/latlong.html</a>",
			"id" => $shortname."_info_longitude",
			"type" => "text");
      
					
$options[] = array( "name" => "Your main office addess",
					"desc" => "Please add your main office address here.",
					"id" => $shortname."_info_address",
					"std" => "",
					"type" => "textarea");    

$options[] = array( "name" => "Phone nubmer",
					"desc" => "Please add your phone number here.",
					"id" => $shortname."_info_phone",
					"std" => "",
					"type" => "text");    

$options[] = array( "name" => "FAX nubmer",
					"desc" => "Please add your FAX number here.",
					"id" => $shortname."_info_fax",
					"std" => "",
					"type" => "text");

$options[] = array( "name" => "E-mail Address",
					"desc" => "Please add your e-mail address here.",
					"id" => $shortname."_info_email",
					"std" => "",
					"type" => "text");
          
$options[] = array( "name" => "Website",
					"desc" => "Please add your website address here with http:// prefix.",
					"id" => $shortname."_info_website",
					"std" => "",
					"type" => "text");

$options[] = array( "type" => "info",
            "std" => "Social Links Profile");
           	  
$options[] = array( "name" => "Linkedin",
					"desc" => "Please add your linkedin profile URL here.",
					"id" => $shortname."_linkedin_url",
					"std" => "",
					"type" => "text");                                    

$options[] = array( "name" => "Twitter",
					"desc" => "Please add your Twitter ID here.",
					"id" => $shortname."_twitter_id",
					"std" => "",
					"type" => "text");             
                             		
$options[] = array( "name" => "Facebook",
					"desc" => "Please add your Facebook profile URL here.",
					"id" => $shortname."_facebook_url",
					"std" => "",
					"type" => "text"); 

$options[] = array( "name" => "Flickr",
					"desc" => "Please add your Flickr ID here, use <a href=\"http://www.idgettr.com\">IDGettr</a> to find it.",
					"id" => $shortname."_flickr_id",
					"std" => "",
					"type" => "text");

$options[] = array( "type" => "info",
            "std" => "Success Message");
            
$options[] = 	array(	"name" => "Sucess Message",
			"desc" => "Please enter the success message for contact form when email successfully sent.",
      "id" => $shortname."_success_msg",
      "std" => "",
      "type" => "textarea");	
/*
$options[] = array( "type" => "info",
            "std" => "Additional Themeforest Information");
            
$options[] = 	array(	"name" => "Themeforest Username",
			"desc" => "Please enter your themeforest username, will be used for theme update notification",
      "id" => $shortname."_themeforest_username",
      "std" => "",
      "type" => "text");
      	
$options[] = 	array(	"name" => "Themeforest API Key",
			"desc" => "Please enter themeforest API key, this can be found at your themeforest account profile.",
      "id" => $shortname."_themeforest_api_key",
      "std" => "",
      "type" => "text");      
*/
update_option('of_template',$options); 					  
update_option('of_themename',$themename);   
update_option('of_shortname',$shortname);

}
}
?>
