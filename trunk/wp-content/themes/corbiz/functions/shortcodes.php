<?php

/* ======================================
   List Styles 
   ======================================*/
function imediapixel_checklist( $atts, $content = null ) {
	$content = str_replace('<ul>', '<ul class="checklist">', do_shortcode($content));
	return remove_wpautop($content);	
}
add_shortcode('checklist', 'imediapixel_checklist');

function imediapixel_itemlist( $atts, $content = null ) {
	$content = str_replace('<ul>', '<ul class="itemlist">', do_shortcode($content));
	return remove_wpautop($content);
	
}
add_shortcode('itemlist', 'imediapixel_itemlist');

function imediapixel_bulletlist( $atts, $content = null ) {
	$content = str_replace('<ul>', '<ul class="bulletlist">', do_shortcode($content));
	return remove_wpautop($content);
	
}
add_shortcode('bulletlist', 'imediapixel_bulletlist');

function imediapixel_arrowlist( $atts, $content = null ) {
	$content = str_replace('<ul>', '<ul class="arrowlist">', do_shortcode($content));
	return remove_wpautop($content);
	
}
add_shortcode('arrowlist', 'imediapixel_arrowlist');

function imediapixel_starlist( $atts, $content = null ) {
	$content = str_replace('<ul>', '<ul class="starlist">', do_shortcode($content));
	return remove_wpautop($content);
	
}
add_shortcode('starlist', 'imediapixel_starlist');

/* ======================================
   Messages Box
   ======================================*/
function imediapixel_warningbox( $atts, $content = null ) {
   return '<div class="warning">' . do_shortcode($content) . '</div>';
}
add_shortcode('warning', 'imediapixel_warningbox');


function imediapixel_infobox( $atts, $content = null ) {
   return '<div class="info">' . do_shortcode($content) . '</div>';
}
add_shortcode('info', 'imediapixel_infobox');

function imediapixel_successbox( $atts, $content = null ) {
   return '<div class="success">' . do_shortcode($content) . '</div>';
}
add_shortcode('success', 'imediapixel_successbox');

function imediapixel_errorbox( $atts, $content = null ) {
   return '<div class="error">' . do_shortcode($content) . '</div>';
}
add_shortcode('error', 'imediapixel_errorbox');

/* ======================================
   Pullquote
   ======================================*/

function imediapixel_pullquote_right( $atts, $content = null ) {
   return '<span class="pullquote_right">' . do_shortcode($content) . '</span>';
}
add_shortcode('pullquote_right', 'imediapixel_pullquote_right');


function imediapixel_pullquote_left( $atts, $content = null ) {
   return '<span class="pullquote_left">' . do_shortcode($content) . '</span>';
}
add_shortcode('pullquote_left', 'imediapixel_pullquote_left');

function imediapixel_quotebox( $atts, $content = null ) {
  return '<div class="content_quotebox"><h3>'.do_shortcode($content).'</h3></div>';
}
add_shortcode('quotebox', 'imediapixel_quotebox');

/* ======================================
   Center Text
   ======================================*/
function imediapixel_center_text( $atts, $content = null ) {
   return '<div class="center-text">' . do_shortcode($content) . '</div>';
}
add_shortcode('center_text', 'imediapixel_center_text');


/* ======================================
   Dropcap
   ======================================*/
function imediapixel_drop_cap( $atts, $content = null ) {
   return '<span class="dropcap">' . do_shortcode($content) . '</span>';
}
add_shortcode('dropcap', 'imediapixel_drop_cap');

/* ======================================
   Spacer
   ======================================*/
function imediapixel_spacer( $atts, $content = null ) {
  extract(shortcode_atts(array(
        'height'      => false,
    ), $atts));
  
	return '<div class="spacer" style="height:'.$height.'px;"></div>';	
}
add_shortcode('spacer', 'imediapixel_spacer');

function imediapixel_slogan_text( $atts, $content = null ) {
	$out = '<div id="slogan">'.do_shortcode($content).'</div>';
  return stripslashes($out);	
}
add_shortcode('slogan', 'imediapixel_slogan_text');

function imediapixel_testibox( $atts, $content = null ) {
	$out = '<div class="testiblock">'.do_shortcode($content).'</div>';
  return stripslashes($out);	
}
add_shortcode('testimonialbox', 'imediapixel_testibox');

/* ======================================
   Divider
   ======================================*/
function imediapixel_divider( $atts, $content = null ) {
   extract(shortcode_atts(array(
        'type'      => '',
    ), $atts));
  
  switch ($type) {
    case "line" : $class = "divider";break;
    case "shadow" : $class = "divider-shadow";break;
  }
	$out = '<div class="'.$class.'">' .do_shortcode($content). '</div>';
    
    return $out;
}
add_shortcode('divider', 'imediapixel_divider');



/* ======================================
   Highlight
   ======================================*/
function imediapixel_highlight_yellow( $atts, $content = null ) {
   return '<span class="highlight-yellow">' . do_shortcode($content) . '</span>';
}
add_shortcode('highlight_yellow', 'imediapixel_highlight_yellow');

function imediapixel_highlight_dark( $atts, $content = null ) {
   return '<span class="highlight-dark">' . do_shortcode($content) . '</span>';
}
add_shortcode('highlight_dark', 'imediapixel_highlight_dark');

function imediapixel_highlight_green( $atts, $content = null ) {
   return '<span class="highlight-green">' . do_shortcode($content) . '</span>';
}
add_shortcode('highlight_green', 'imediapixel_highlight_green');

function imediapixel_highlight_red( $atts, $content = null ) {
   return '<span class="highlight-red">' . do_shortcode($content) . '</span>';
}
add_shortcode('highlight_red', 'imediapixel_highlight_red');

/* ======================================
   Columns
   ======================================*/
function imediapixel_col_12( $atts, $content = null ) {
   return '<div class="col_12">' . do_shortcode($content) . '</div>';
}
add_shortcode('col_12', 'imediapixel_col_12');

function imediapixel_col_12_last( $atts, $content = null ) {
   return '<div class="col_12 last">' . do_shortcode($content) . '</div>';
}
add_shortcode('col_12_last', 'imediapixel_col_12_last');

function imediapixel_col_13( $atts, $content = null ) {
   return '<div class="col_13">' . do_shortcode($content) . '</div>';
}
add_shortcode('col_13', 'imediapixel_col_13');

function imediapixel_col_13_last( $atts, $content = null ) {
   return '<div class="col_13 last">' . do_shortcode($content) . '</div>';
}
add_shortcode('col_13_last', 'imediapixel_col_13_last');

function imediapixel_col_14( $atts, $content = null ) {
   return '<div class="col_14">' . do_shortcode($content) . '</div>';
}
add_shortcode('col_14', 'imediapixel_col_14');

function imediapixel_col_14_last( $atts, $content = null ) {
   return '<div class="col_14 last">' . do_shortcode($content) . '</div>';
}
add_shortcode('col_14_last', 'imediapixel_col_14_last');

function imediapixel_col_23( $atts, $content = null ) {
   return '<div class="col_23">' . do_shortcode($content) . '</div>';
}
add_shortcode('col_23', 'imediapixel_col_23');

function imediapixel_col_23_last( $atts, $content = null ) {
   return '<div class="col_23 last">' . do_shortcode($content) . '</div>';
}
add_shortcode('col_23_last', 'imediapixel_col_23_last');

function imediapixel_col_34($atts, $content = null ) {
   return '<div class="col_34">' . do_shortcode($content) . '</div>';
}
add_shortcode('col_34', 'imediapixel_col_34');

function imediapixel_col_34_last($atts, $content = null ) {
   return '<div class="col_34 last">' . do_shortcode($content) . '</div>';
}
add_shortcode('col_34_last', 'imediapixel_col_34_last');

/* ======================================
   Inner Columns
   ======================================*/
function imediapixel_col_12_inner( $atts, $content = null ) {
   return '<div class="col_12_inner">' . remove_wpautop($content) . '</div>';
}
add_shortcode('col_12_inner', 'imediapixel_col_12_inner');

function imediapixel_col_12_inner_last( $atts, $content = null ) {
   return '<div class="col_12_inner last">' . remove_wpautop($content) . '</div>';
}
add_shortcode('col_12_inner_last', 'imediapixel_col_12_inner_last');

function imediapixel_col_13_inner( $atts, $content = null ) {
   return '<div class="col_13_inner">' . remove_wpautop($content) . '</div>';
}
add_shortcode('col_13_inner', 'imediapixel_col_13_inner');

function imediapixel_col_13_inner_last( $atts, $content = null ) {
   return '<div class="col_13_inner last">' . remove_wpautop($content) . '</div>';
}
add_shortcode('col_13_inner_last', 'imediapixel_col_13_inner_last');

function imediapixel_col_14_inner( $atts, $content = null ) {
   return '<div class="col_14_inner">' . do_shortcode($content) . '</div>';
}
add_shortcode('col_14_inner', 'imediapixel_col_14_inner');

function imediapixel_col_24_inner( $atts, $content = null ) {
   return '<div class="col_24_inner">' . remove_wpautop($content) . '</div>';
}
add_shortcode('col_24_inner', 'imediapixel_col_24_inner');

function imediapixel_col_14_inner_last( $atts, $content = null ) {
   return '<div class="col_14_inner last">' . remove_wpautop($content) . '</div>';
}
add_shortcode('col_14_inner_last', 'imediapixel_col_14_inner_last');

function imediapixel_col_23_inner( $atts, $content = null ) {
   return '<div class="col_23_inner">' . remove_wpautop($content) . '</div>';
}
add_shortcode('col_23_inner', 'imediapixel_col_23_inner');

function imediapixel_col_23_inner_last( $atts, $content = null ) {
   return '<div class="col_23_inner last">' . remove_wpautop($content) . '</div>';
}
add_shortcode('col_23_inner_last', 'imediapixel_col_23_inner_last');

function imediapixel_col_34_inner($atts, $content = null ) {
   return '<div class="col_34_inner">' . remove_wpautop($content) . '</div>';
}
add_shortcode('col_34_inner', 'imediapixel_col_34_inner');

function imediapixel_col_34_inner_last($atts, $content = null ) {
   return '<div class="col_34_inner last">' . remove_wpautop($content) . '</div>';
}
add_shortcode('col_34_inner_last', 'imediapixel_col_34_inner_last');


/* ======================================
   Buttons 
   ======================================*/
function imediapixel_button( $atts, $content = null ) {
    extract(shortcode_atts(array(
        'link'      => '#',
        'color'     => '',
        'size'      => ''
    ), $atts));
  
  switch ($color) {
    case "green" :
      $color="buttongreen";
    break;
    case "red" :
      $color="buttonred";
    break;
    case "orange" :
      $color="buttonorange";
    break;
    case "blue" :
      $color="buttonblue";
    break;
    case "brown" :
      $color="buttonbrown";
    break;   
    case "dark" :
      $color="buttondark";
    break;   
    case "purple" :
      $color="buttonpurple";
    break;      
  }
  
	$out = "<a class=\"button $color\" href=\"" .$link. "\"><span>" .do_shortcode($content). "</span></a>";
    
    return '[raw]'.$out.'[/raw]';
}
add_shortcode('button', 'imediapixel_button');

/* ======================================
   Video
   ======================================*/
#### Vimeo eg http://vimeo.com/5363880 id="5363880"
function vimeo_code($atts,$content = null){

	extract(shortcode_atts(array(  
		"id" 		=> '',
		"width"		=> '', 
		"height" 	=> ''
	), $atts)); 
	 
	$data = "<object width='$width' height='$height' data='http://vimeo.com/moogaloop.swf?clip_id=$id&amp;server=vimeo.com&amp;autoplay=0&amps;loop=0' type='application/x-shockwave-flash'>
			<param name='allowfullscreen' value='true' />
			<param name='allowscriptaccess' value='always' />
			<param name='wmode' value='opaque'>
			<param name='movie' value='http://vimeo.com/moogaloop.swf?clip_id=$id&amp;server=vimeo.com' />
		</object>";
	return $data;
} 
add_shortcode("vimeo_video", "vimeo_code"); 

#### YouTube eg http://www.youtube.com/v/MWYi4_COZMU&hl=en&fs=1& id="MWYi4_COZMU&hl=en&fs=1&"
function youTube_code($atts,$content = null){

	extract(shortcode_atts(array(  
      "id" 		=> '',
  		"width"		=> '', 
  		"height" 	=> ''
		 ), $atts)); 
	 
	$data = "<object width='$width' height='$height' data='http://www.youtube.com/v/$id' type='application/x-shockwave-flash'>			
      <param name='allowfullscreen' value='true' />
			<param name='allowscriptaccess' value='always' />
			<param name='FlashVars' value='playerMode=embedded' />
			<param name='wmode' value='opaque'>
			<param name='movie' value='http://www.youtube.com/v/$id' />
		</object>";
	return $data;
} 
add_shortcode("youtube_video", "youTube_code");

/* ======================================
   Child pages list base on parent page
   ======================================*/
function imediapixel_pagelist_shortcode($atts,$content=null) {
  global $post;
  
  extract(shortcode_atts(array(
    "parent_page" => '',
    "num" => '',
    "orderby" => '',
    "image_style" => '',
    "image_align" => '',
    "image_size" => '',
    "column" => '',
    "fullwidth" => '',
    "readmore_text" => '',
    "text_limit" => '',
    "margin_bottom" => ''
  ),$atts));
  
  if ($orderby == "") $orderby = "date";
   
  return imediapixel_pagelist($parent_page,$num,$orderby,$image_style,$image_align,$image_size,$column,$fullwidth,$readmore_text,$text_limit,$margin_bottom);
}

add_shortcode('pagelist','imediapixel_pagelist_shortcode');

/* ======================================
   Post list base on category
   ======================================*/
function imediapixel_postlist_shortcode($atts,$content=null) {
  global $post;
  
  extract(shortcode_atts(array(
    "category" => '',
    "num" => '',
    "orderby" => '',
    "image_style" => '',
    "image_align" => '',
    "image_size" => '',
    "column" => '',
    "fullwidth" => '',
    "readmore_text" => '',
    "text_limit" => '',
    "margin_bottom" => ''
  ),$atts));
  
  return imediapixel_postslist($category,$num,$orderby,$image_style,$image_align,$image_size,$column,$fullwidth,$readmore_text,$text_limit,$margin_bottom);
}

add_shortcode('postlist','imediapixel_postlist_shortcode');

/* ======================================
   Blog list base on category
   ======================================*/
function imediapixel_bloglist_shortcode($atts,$content=null) {
  global $post;
  
  extract(shortcode_atts(array(
    "cat" => '',
    "num" => '',
    "orderby" => '',
    "nopaging" => ''
  ),$atts));
  
  return imediapixel_bloglist($cat,$num,$orderby,$nopaging);
}

add_shortcode('bloglist','imediapixel_bloglist_shortcode');

/* ======================================
   Latest Portfolio List
   ======================================*/
function imediapixel_portfolio_shortcode($atts,$content=null) {
  global $post;
  
  extract(shortcode_atts(array(
    "column" => '',
    "num" => '',
    "orderby" => '',
    "order" => '',
    "category"=>'',
    "description" =>'',
    'filter' => '',
    'text_limit' =>'',
    'readmore_text' => ''
  ),$atts));
  
  if ($text_limit =="") $text_limit = 20;
  return imediapixel_portfolio($column,$num,$orderby,$order,$category,$description,$filter,$text_limit,$readmore_text);
}

add_shortcode('portfolio','imediapixel_portfolio_shortcode');

/* ======================================
   Boxed 
   ======================================*/
function boxed_layout_shortcode($atts, $content = null, $code) {
  global $post;
  
  extract(shortcode_atts(array(
    "title" => '',
    "last" => ''
  ),$atts));
  
  return boxed_layout($title, $content,$last);
}

add_shortcode('boxed','boxed_layout_shortcode');

/* ======================================
   Google Map
   ======================================*/
function theme_shortcode_googlemap($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		"width" => false,
		"height" => '400',
		"address" => '',
		"latitude" => 0,
		"longitude" => 0,
		"zoom" => 14,
		"html" => '',
		"popup" => 'false',
		"controls" => 'false',
		'pancontrol' => 'true',
		'zoomcontrol' => 'true',
		'maptypecontrol' => 'true',
		'scalecontrol' => 'true',
		'streetviewcontrol' => 'true',
		'overviewmapcontrol' => 'true',
		"scrollwheel" => 'true',
		'doubleclickzoom' =>'true',
		"maptype" => 'ROADMAP',
		"marker" => 'true',
		'align' => false,
	), $atts));
	
	if($width){
		if(is_numeric($width)){
			$width = $width.'px';
		}
		$width = 'width:'.$width.';';
	}else{
		$width = '';
		$align = false;
	}
	if($height){
		if(is_numeric($height)){
			$height = $height.'px';
		}
		$height = 'height:'.$height.';';
	}else{
		$height = '';
	}
	
	wp_print_scripts( 'jquery-gmap');
	
	/* fix */
	$search  = array('G_NORMAL_MAP', 'G_SATELLITE_MAP', 'G_HYBRID_MAP', 'G_DEFAULT_MAP_TYPES', 'G_PHYSICAL_MAP');
	$replace = array('ROADMAP', 'SATELLITE', 'HYBRID', 'HYBRID', 'TERRAIN');
	$maptype = str_replace($search, $replace, $maptype);
	/* end fix */
	
	if($controls == 'true'){
		$controls = <<<HTML
{
	panControl: {$pancontrol},
	zoomControl: {$zoomcontrol},
	mapTypeControl: {$maptypecontrol},
	scaleControl: {$scalecontrol},
	streetViewControl: {$streetviewcontrol},
	overviewMapControl: {$overviewmapcontrol}
}
HTML;
	}
	
	$align = $align?' align'.$align:'';
	$id = rand(100,1000);
	if($marker != 'false'){
		return <<<HTML
<div id="google_map_{$id}" class="google_map{$align}" style="{$width}{$height}"></div>
[raw]
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">
jQuery(document).ready(function($) {
	var tabs = jQuery("#google_map_{$id}").parents('.tabs_container,.mini_tabs_container,.accordion');
	jQuery("#google_map_{$id}").bind('initGmap',function(){
		jQuery(this).gMap({
			zoom: {$zoom},
			markers:[{
				address: "{$address}",
				latitude: {$latitude},
				longitude: {$longitude},
				html: "{$html}",
				popup: {$popup}
			}],
			controls: {$controls},
			maptype: '{$maptype}',
			doubleclickzoom:{$doubleclickzoom},
			scrollwheel:{$scrollwheel}
		});
		jQuery(this).data("gMapInited",true);
	}).data("gMapInited",false);
	if(tabs.size()!=0){
		tabs.find('ul.tabs,ul.mini_tabs,.accordion').data("tabs").onClick(function(index) {
			this.getCurrentPane().find('.google_map').each(function(){
				if(jQuery(this).data("gMapInited")==false){
					jQuery(this).trigger('initGmap');
				}
			});
		});
	}else{
		jQuery("#google_map_{$id}").trigger('initGmap');
	}
});
</script>
[/raw]
HTML;
	}else{
return <<<HTML
<div id="google_map_{$id}" class="google_map{$align}" style="{$width}{$height}"></div>
[raw]
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">
jQuery(document).ready(function($) {
	var tabs = jQuery("#google_map_{$id}").parents('.tabs_container,.mini_tabs_container,.accordion');
	jQuery("#google_map_{$id}").bind('initGmap',function(){
		jQuery("#google_map_{$id}").gMap({
			zoom: {$zoom},
			latitude: {$latitude},
			longitude: {$longitude},
			address: "{$address}",
			controls: {$controls},
			maptype: '{$maptype}',
			doubleclickzoom:{$doubleclickzoom},
			scrollwheel:{$scrollwheel}
		});
		jQuery(this).data("gMapInited",true);
	}).data("gMapInited",false);
	if(tabs.size()!=0){
		tabs.find('ul.tabs,ul.mini_tabs,.accordion').data("tabs").onClick(function(index) {
			this.getCurrentPane().find('.google_map').each(function(){
				if(jQuery(this).data("gMapInited")==false){
					jQuery(this).trigger('initGmap');
				}
			});
		});
	}else{
		jQuery("#google_map_{$id}").trigger('initGmap');
	}
});
</script>
[/raw]
HTML;
	}
}

add_shortcode('gmap','theme_shortcode_googlemap');

function theme_shortcode_toggle($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'title' => false
	), $atts));
	return '<div class="toggle"><h5 class="toggle_title">' . $title . '</h5><div class="toggle_content"><p>' . do_shortcode(trim($content)) . '</p></div></div>';
}
add_shortcode('toggle', 'theme_shortcode_toggle');


/* Images */
function imediapixel_imagestyle( $atts, $content = null,$code ) {
    extract(shortcode_atts(array(
        'source'      => '#',
        'align' => '',
        'size' =>'',
        'image_style' =>'',
        'margin_bottom' => '',
        'lightbox' => ''
    ), $atts));
  
  if ($image_style =="") $image_style="rounded";
  
  switch ($align) {
    case "left" :
      $class_align="-left";
    break;
    case "right" :
      $class_align="-right";
    break;
    case "center" :
      $class_align="-center";
    break;
  }
  
  if ($image_style == "none")
  switch ($align) {
    case "left" :
      $class_align="alignleft";
    break;
    case "right" :
      $class_align="alignright";
    break;
    case "center" :
      $class_align="aligncenter";
    break;
  }
  switch ($size) {
    case "small" :
      $class_size ="-small";
    break;
    case "medium" :
      $class_size ="-medium";
    break;
    case "big" :
      $class_size ="-big";
    break;
  }
  
  $out = '';
  if ($image_style == "square") {
    $out .= '<div class="box-image'.$class_align.$class_size.'" style="margin-bottom:'.$margin_bottom.'px;">';
    if ($lightbox != "") {
      $out .= '<a href="'.$lightbox.'" rel="prettyPhoto" title="'.get_the_title().'">';
    }
    if ($size == "small") {
      $out .= '<img  src="'.get_template_directory_uri().'/timthumb.php?src='.$source.'&amp;h=60&amp;w=64&amp;zc=1" alt=""';
      if ($lightbox != "") {
        $out .= ' class="fade"'; 
      }
      $out .= '/>';
    } else if ($size == "medium") {
      $out .= '<img  src="'.get_template_directory_uri().'/timthumb.php?src='.$source.'&amp;h=108&amp;w=198&amp;zc=1" alt=""';
      if ($lightbox != "") {
        $out .= ' class="fade"'; 
      }
      $out .= '/>';
    } else  if ($size == "big"){
      $out .= '<img  src="'.get_template_directory_uri().'/timthumb.php?src='.$source.'&amp;h=138&amp;w=268&amp;zc=1" alt=""';
      if ($lightbox != "") {
        $out .= ' class="fade"'; 
      }
      $out .= '/>';
    } else {
      $out .= '<img  src="'.$source.'" alt=""';
      if ($lightbox != "") {
        $out .= ' class="fade"'; 
      }
      $out .= '/>';
    }
    if ($lightbox != "") {
      $out .= '</a>';
    }
    $out .= '</div>';
  } else if ($image_style == "rounded") {
      $out .= '<div class="rounded-image'.$class_align.$class_size.'" style="margin-bottom:'.$margin_bottom.'px;">';
    if ($size == "small") {
      $out .= '<img  src="'.get_template_directory_uri().'/timthumb.php?src='.$source.'&amp;h=80&amp;w=80&amp;zc=1" alt=""';
      if ($lightbox != "") {
        $out .= ' class="fade"'; 
      }
      $out .= '/>'; 
    } else if ($size == "medium") {
      $out .= '<img  src="'.get_template_directory_uri().'/timthumb.php?src='.$source.'&amp;h=120&amp;w=120&amp;zc=1" alt=""';
      if ($lightbox != "") {
        $out .= ' class="fade"'; 
      }
      $out .= '/>';
    } else if ($size == "big")  {
      $out .= '<img  src="'.get_template_directory_uri().'/timthumb.php?src='.$source.'&amp;h=165&amp;w=220&amp;zc=1" alt=""';
      if ($lightbox != "") {
        $out .= ' class="fade"'; 
      }
      $out .= '/>';
    } else {
      $out .= '<img  src="'.$source.'" alt="" />';
    }
    $out .= '<div class="overlay-rounded'.$class_size.'"></div>';
    if ($lightbox != "") {
      $out .= '<a href="'.$lightbox.'" rel="prettyPhoto" title="'.get_the_title().'" class="img-lightbox"></a>';
    }
    $out .= '</div>';
  } else {
    $out .= '<img  src="'.$source.'" alt="" class="'.$class_align.'" style="margin-bottom:'.$margin_bottom.'px;"';
      if ($lightbox != "") {
        $out .= 'class="fade"'; 
      }
      $out .= '/>';
  }
  
    
  return $out;
}
add_shortcode('image', 'imediapixel_imagestyle');

/* Tabs and Accordiaon */
function theme_shortcode_tabs($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'style' => false
	), $atts));
	
	if (!preg_match_all("/(.?)\[(tab)\b(.*?)(?:(\/))?\](?:(.+?)\[\/tab\])?(.?)/s", $content, $matches)) {
		return do_shortcode($content);
	} else {
		for($i = 0; $i < count($matches[0]); $i++) {
			$matches[3][$i] = shortcode_parse_atts($matches[3][$i]);
		}
		$output = '<div class="tabs-wrapper"><ul class="'.$code.'">';
		
		for($i = 0; $i < count($matches[0]); $i++) {
			$output .= '<li><a href="#">' . $matches[3][$i]['title'] . '</a></li>';
		}
		$output .= '</ul>';
		$output .= '<div class="panes">';
		for($i = 0; $i < count($matches[0]); $i++) {
			$output .= '<div class="pane">' . do_shortcode(trim($matches[5][$i])) . '</div>';
		}
		$output .= '</div></div>';
		
		return '<div class="'.$code.'_container">' . $output . '</div>';
	}
}
add_shortcode('tabs', 'theme_shortcode_tabs');
add_shortcode('mini_tabs', 'theme_shortcode_tabs');

function imediapixel_table_pricing_shortcode($atts, $content = null) {
  global $post;
  
  extract(shortcode_atts(array(
		'columns' => 3,
		'category' => ''
	), $atts));
  
  switch ($columns) {
    case "3" :
      $class_heading = "heading-3col";
      $class_column = "pricing-3col";
    break;
    case "4" :
      $class_heading = "heading-4col";
      $class_column = "pricing-4col";
      $class = "pricing-4col";
    break;
    case "5" :
      $class_heading = "heading-5col";
      $class_column = "pricing-5col";
    break;
  }
  
  $product_order = get_option('corbiz_product_order') ? get_option('corbiz_product_order') : "date";
  $product_cat = get_option('corbiz_product_cat');
  $currency = get_option('corbiz_currency');
  $billing_cycle = get_option('corbiz_billing_cycle');            
  $product_button_text = get_option('corbiz_product_button_text') ? get_option('corbiz_product_button_text') : "Order Now";
  
  query_posts(array( 'post_type' => 'product', 'showposts' => $columns,'orderby'=>$product_order,'product_category'=>$category,'order'=>'ASC'));
  
  ?>
    <?php
    $count_posts = wp_count_posts('product');
    $published_posts = $count_posts->publish;
    $out ='';
    $out .=' <div class="pricing-table">';
        $out .= '<ul>';
        $counter = 0; 
        while ( have_posts() ) : the_post();
        $counter++;
        $product_price = get_post_meta($post->ID,'_product_price',true);
          $out .= '<li class="heading-column '.$class_heading.' color'.$counter.'">';
            $out .= '<h3>'.get_the_title().'</h3>';
            $out .= '<h5>';
            $out .= $currency ? $currency : "&#36;";
            $out .= $product_price;
            if ($billing_cycle == "none") {
              $out .= ""; 
            } else {
              $out .= ' per '.$billing_cycle; 
            }
            $out .= '</h5>';
          $out .= '</li>';
        endwhile;
        $out .= '</ul>';  
        
        $out .= '<div class="clear"></div>';
        
        $out .= '<ul>';
        while ( have_posts() ) : the_post();
        $product_url = get_post_meta($post->ID,'_product_url',true);
        $product_feature = get_post_meta($post->ID,'_product_feature',true);
        $features_list = explode(",",$product_feature);
        $counter++;
          $out .= '<li class="pric-column '.$class_column;
          if ($counter%$columns==0) $out .= '-last';
          $out .= '">';
            $out .= '<ul class="feature-list">';
            foreach ($features_list as $flist) {
              $out .= '<li>'.$flist.'</li>';
            }
            $out .= '<li class="last">';
            $out .= '<a class="button" href="'.$product_url.'"><span>'.$product_button_text.'</span></a>';
            $out .= '</li>';
            $out .= '</ul>';  
      endwhile;wp_reset_query();
      $out .= '</ul>';  
  $out .= '</div>';
  
  return '[raw]'.$out.'[/raw]';
}

add_shortcode('pricing_table','imediapixel_table_pricing_shortcode');

/* ======================================
   Latest Portfolio List
   ======================================*/
function imediapixel_latestblog_shortcode($atts,$content=null) {
  global $post;
  
  extract(shortcode_atts(array(
    "cat" => '',
    "num" => '',
    "orderby" => '',
    "text_limit" => '',
    "image_style" => '',
    "margin_bottom" => ''
  ),$atts));
  
  $text_limit = $text_limit ? $text_limit : 12;
  
  return imediapixel_latestnews("",$cat,$num,$orderby,$text_limit,$image_style,$margin_bottom);
}

add_shortcode('latestnews','imediapixel_latestblog_shortcode');

?>