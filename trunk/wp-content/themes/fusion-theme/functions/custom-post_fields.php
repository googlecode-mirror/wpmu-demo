<?php
$post_meta_boxes = 
array(

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

);

/* meta_boxes
================================================== */
function post_meta_boxes() {
global $post, $post_meta_boxes;
	
	foreach($post_meta_boxes as $meta_box) {
		
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
			
		}
        
	}

}

/* enable meta_boxes
================================================== */
function create_post_meta_box() {
global $theme_name, $post_meta_boxes;
	if (function_exists('add_meta_box') ) {
	add_meta_box( 'new-meta-boxes', __('Post Format', GETTEXT_DOMAIN), 'post_meta_boxes', 'post', 'normal', 'high' );
	}
}

/* update meta_boxes
================================================== */
function save_post_postdata( $post_id ) {
	global $post, $post_meta_boxes;  
		foreach($post_meta_boxes as $meta_box) {  
 
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
add_action('admin_menu', 'create_post_meta_box');
add_action('save_post', 'save_post_postdata');
?>