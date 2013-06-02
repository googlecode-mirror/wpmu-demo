<?php
$portfolio_meta_boxes = 
array(

"lightbox" => array(
"name" => "lightbox",
"type" => "checkbox",
"std" => "",
"description" => "check to display content in a lightbox on the front page",
"title" => "Lightbox"),

"link-url" => array(
"name" => "link-url",
"type" => "input",
"std" => "",
"description" => "URL for the link",
"title" => "Link-URL"),

"video-url" => array(
"name" => "video-url",
"type" => "input",
"std" => "",
"description" => "enter the video URL [youtube or vimeo]",
"title" => "Video URL"),

"comments" => array(
"name" => "comments",
"type" => "checkbox",
"std" => "",
"description" => "check to disable facebook comments",
"title" => "Comments"),

"details" => array(
"name" => "details",
"type" => "textarea",
"std" => "
your_text1||your_text2
your_text1||<a href='#'>your_link2</a>",
"description" => "enter your item's details, shortcode format - your_text1||your_text2 ",
"title" => "Details"),

"share" => array(
"name" => "share",
"type" => "checkbox",
"std" => "",
"description" => "check to disable share buttons",
"title" => "Share Buttons"),

);

/* meta_boxes
================================================== */
function portfolio_meta_boxes() {
global $post, $portfolio_meta_boxes;
	
	foreach($portfolio_meta_boxes as $meta_box) {
		
		echo'<input type="hidden" name="'.$meta_box['name'].'_noncename" id="'.$meta_box['name'].'_noncename" value="'.wp_create_nonce( plugin_basename(__FILE__) ).'" />';
		
		echo'<div style="display:block;"><h4 style="display:inline-block;">'.$meta_box['title'].'</h4>';
        if($meta_box['description']){
           echo'<p style="font-size:90%;display:inline-block;">&nbsp;('.$meta_box['description'].')</p></div>'; 
        }else{
           echo'</div>'; 
        }
		
		if( $meta_box['type'] == "input" ) { 
		
			$meta_box_value = get_post_meta($post->ID, $meta_box['name'].'_value', true);
		
			if($meta_box_value == "")
				$meta_box_value = $meta_box['std'];
		
			echo'<input type="text" name="'.$meta_box['name'].'_value" value="'.$meta_box_value.'" style="width:90%"/><br />';
		
        } elseif ( $meta_box['type'] == "textarea" ) {
		  
			$meta_box_value = get_post_meta($post->ID, $meta_box['name'].'_value', true);
		
			echo'<textarea rows="4" type="text" name="'.$meta_box['name'].'_value" style="width:90%">' . htmlspecialchars( $meta_box_value ) . '</textarea><br />';
             
        } elseif ( $meta_box['type'] == "checkbox" ) {
		  
            $meta_box_value = get_post_meta($post->ID, $meta_box['name'].'_value', true);
          
			if($meta_box_value == '1'){ $checked = "checked=\"checked\""; }else{ $checked = "";} 
			echo 	'<input type="checkbox" name="' . $meta_box[ 'name' ] . '_value" value="1" ' . $checked . ' />';
	
		}
        
	}

}

/* enable meta_boxes
================================================== */
function create_portfolio_meta_box() {
global $theme_name, $portfolio_meta_boxes;
	if (function_exists('add_meta_box') ) {
	add_meta_box( 'new-meta-boxes', __('Post Options', GETTEXT_DOMAIN), 'portfolio_meta_boxes', 'portfolio', 'normal', 'high' );
	}
}

/* update meta_boxes
================================================== */
function save_portfolio_postdata( $post_id ) {
	global $post, $portfolio_meta_boxes;  
		foreach($portfolio_meta_boxes as $meta_box) {  
 
		if ( !wp_verify_nonce( $_POST[$meta_box['name'].'_noncename'], plugin_basename(__FILE__) )) {  
		return $post_id;  
		}  
	
	if ( 'page' == $_POST['post_type'] ) {  
	if ( !current_user_can( 'edit_page', $post_id ))  
	return $post_id;  
	} else {  
	if ( !current_user_can( 'edit_post', $post_id ))  
	return $post_id;  
	}  
	
	$data = $_POST[$meta_box['name'].'_value'];  
	
	if(get_post_meta($post_id, $meta_box['name'].'_value') == "")  
	add_post_meta($post_id, $meta_box['name'].'_value', $data, true);  
	elseif($data != get_post_meta($post_id, $meta_box['name'].'_value', true))  
	update_post_meta($post_id, $meta_box['name'].'_value', $data);  
	elseif($data == "")  
	delete_post_meta($post_id, $meta_box['name'].'_value', get_post_meta($post_id, $meta_box['name'].'_value', true));  
	}
	
}
add_action('admin_menu', 'create_portfolio_meta_box');
add_action('save_post', 'save_portfolio_postdata');
?>