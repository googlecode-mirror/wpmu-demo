<?php

/* Shortcodes
================================================== */

function uds_clear_autop($content){

    $content = str_ireplace('<p>', '', $content);
    $content = str_ireplace('</p>', '', $content);
    $content = str_ireplace('<br />', '', $content);
    return $content;
}
add_filter('uds_shortcode_out_filter', 'uds_clear_autop');

/* headings
================================================== */
function h1($atts, $content=null){
	return '<h1>'.do_shortcode($content).'</h1>';
}
function h2($atts, $content=null){
	return '<h2>'.do_shortcode($content).'</h2>';
}
function h3($atts, $content=null){
	return '<h3>'.do_shortcode($content).'</h3>';
}
function h4($atts, $content=null){
	return '<h4>'.do_shortcode($content).'</h4>';
}
function h5($atts, $content=null){
	return '<h5>'.do_shortcode($content).'</h5>';
}
function h6($atts, $content=null){
	return '<h6>'.do_shortcode($content).'</h6>';
}
add_shortcode('h1', 'h1');
add_shortcode('h2', 'h2');
add_shortcode('h3', 'h3');
add_shortcode('h4', 'h4');
add_shortcode('h5', 'h5');
add_shortcode('h6', 'h6');

/* code, pre
================================================== */
function code($atts, $content=null){
	return '<code>'.do_shortcode($content).'</code>';
}
add_shortcode('code', 'code');

function pre($atts, $content=null){
	return '<pre>'.do_shortcode($content).'</pre>';
}
add_shortcode('pre', 'pre');

/* blockquote
================================================== */
function blockquote($atts, $content=null){
	return '<blockquote>'.do_shortcode($content).'</blockquote>';
}
add_shortcode('blockquote', 'blockquote');

/* hr
================================================== */
function hr($atts, $content=null){
	return '<hr/>';
}
add_shortcode('hr', 'hr');

/* column 1/4
================================================== */
function one_fourth_first($atts, $content=null){
	return '<div class="four columns alpha">' .do_shortcode($content). '</div>';
}
function one_fourth($atts, $content=null){
	return '<div class="four columns">'.do_shortcode($content).'</div>';
}
function one_fourth_last($atts, $content=null){
	return '<div class="four columns omega">'.do_shortcode($content).'</div><div class="clearfix" ></div>';
}
add_shortcode('one_fourth_first', 'one_fourth_first');
add_shortcode('one_fourth', 'one_fourth');
add_shortcode('one_fourth_last', 'one_fourth_last');

/* column 1/3
================================================== */
function one_third_first($atts, $content=null){
	return '<div class="one-third column alpha">' .do_shortcode($content). '</div>';
}
function one_third($atts, $content=null){
	return '<div class="one-third column">'.do_shortcode($content).'</div>';
}
function one_third_last($atts, $content=null){
	return '<div class="one-third column omega">'.do_shortcode($content).'</div><div class="clearfix" ></div>';
}
add_shortcode('one_third_first', 'one_third_first');
add_shortcode('one_third', 'one_third');
add_shortcode('one_third_last', 'one_third_last');

/* column 1/2
================================================== */
function one_half_first($atts, $content=null){
	return '<div class="eight columns alpha">' .do_shortcode($content). '</div>';
}
function one_half($atts, $content=null){
	return '<div class="eight columns">'.do_shortcode($content).'</div>';
}
function one_half_last($atts, $content=null){
	return '<div class="eight columns omega">'.do_shortcode($content).'</div><div class="clearfix" ></div>';
}
add_shortcode('one_half_first', 'one_half_first');
add_shortcode('one_half', 'one_half');
add_shortcode('one_half_last', 'one_half_last');

/* column 2/3
================================================== */

function two_thirds_first($atts, $content=null){
	return '<div class="two-thirds column alpha">' .do_shortcode($content). '</div>';
}
function two_thirds_last($atts, $content=null){
	return '<div class="two-thirds column omega">'.do_shortcode($content).'</div><div class="clearfix" ></div>';
}
add_shortcode('two_thirds_first', 'two_thirds_first');
add_shortcode('two_thirds_last', 'two_thirds_last');

/* column 3/4
================================================== */
function three_fourths_first($atts, $content=null){
	return '<div class="twelve columns alpha">' .do_shortcode($content). '</div>';
}
function three_fourths_last($atts, $content=null){
	return '<div class="twelve columns omega">'.do_shortcode($content).'</div><div class="clearfix" ></div>';
}
add_shortcode('three_fourths_first', 'three_fourths_first');
add_shortcode('three_fourths_last', 'three_fourths_last');


/* lists (bullet)
================================================== */
function lists($atts, $content=null){
	extract(shortcode_atts(array(
							'type' => 'bullet'
							),$atts));
	return'<div class="lists-' . $type . '">'.do_shortcode($content).'</div>';
}
add_shortcode('lists', 'lists');

/* infoboxes
================================================== */
function box_info($atts, $content=null){
	return '<div class="box info">'.do_shortcode($content).'</div>';
}
function box_help($atts, $content=null){
	return '<div class="box help">'.do_shortcode($content).'</div>';
}
function box_check($atts, $content=null){
	return '<div class="box check">'.do_shortcode($content).'</div>';
}
function box_warning($atts, $content=null){
	return '<div class="box warning">'.do_shortcode($content).'</div>';
}
function box_stop($atts, $content=null){
	return '<div class="box stop">'.do_shortcode($content).'</div>';
}
add_shortcode('box_info', 'box_info');
add_shortcode('box_help', 'box_help');
add_shortcode('box_check', 'box_check');
add_shortcode('box_warning', 'box_warning');
add_shortcode('box_stop', 'box_stop');

/* toggle_box, toogle
================================================== */
function toggle_box( $atts, $content = null ) {
	
    extract(shortcode_atts(array(), $atts));

	$out = '';	
	$out .= "<div class=\"ui-toggle\">".do_shortcode($content)."</div>";
	
    return $out;
	
}

add_shortcode('toggle_box', 'toggle_box');

function toggle( $atts, $content = null ) {
	
    extract(shortcode_atts(array(
		'title'    	 => 'Title goes here',
    ), $atts));

	$out = '';
	
	$out .= "<h3><a href=\"#\">".$title."</a></h3><div><p>".do_shortcode($content)."</p></div>";
	
    return $out;
	
}

add_shortcode('toggle', 'toggle');

/* accordion_box, accordion
================================================== */
function accordion_box( $atts, $content = null ) {
	
    extract(shortcode_atts(array(), $atts));

	$out = '';	
	$out .= "<div class=\"ui-accordion\">".do_shortcode($content)."</div>";
	
    return $out;
	
}

add_shortcode('accordion_box', 'accordion_box');

function accordion( $atts, $content = null ) {
	
    extract(shortcode_atts(array(
		'title'    	 => 'Title goes here',
    ), $atts));

	$out = '';
	
	$out .= "<h3><a href=\"#\">".$title."</a></h3><div><p>".do_shortcode($content)."</p></div>";
	
    return $out;
	
}

add_shortcode('accordion', 'accordion');

/* tabs tab
================================================== */
function tabs( $atts, $content = null ) {
	extract(shortcode_atts(array(
    ), $atts));
	
	global $counter_1;
	global $counter_2;
	
	$counter_1++;
	$counter_2++;
	
	$out .= '<div class="ui-tabs">';
	$out .= '<ul>';
	$count = 1;
	foreach ($atts as $tab) {
		$out .= '<li><a title="' .$tab. '" href="#tab-' . $counter_1 . '">' .$tab. '</a></li>';
		$counter_1++;
		$count++;
	}
	$out .= '</ul>';

	$out .= do_shortcode($content) .'</div>';
	
	return $out;
	
}
add_shortcode('tabs', 'tabs');

function tab( $atts, $content = null ) {
	extract(shortcode_atts(array(
    ), $atts));
	
	global $counter_2;
	
	$out .= '<div id="tab-' . $counter_2 . '"><p>' . do_shortcode($content) .'</p></div>';
	$counter_2++;
	
	return $out;
}
add_shortcode('tab', 'tab');

/* dropcap, dropcap1, dropcap2
================================================== */
function dropcap($atts, $content=null){
	return '<span class="dropcap">'.do_shortcode($content).'</span>';
}
add_shortcode('dropcap', 'dropcap');

function dropcap1($atts, $content=null){
	return '<span class="dropcap1">'.do_shortcode($content).'</span>';
}
add_shortcode('dropcap1', 'dropcap1');

function dropcap2($atts, $content=null){
	return '<span class="dropcap2">'.do_shortcode($content).'</span>';
}
add_shortcode('dropcap2', 'dropcap2');


/* button small, medium, large, (style1, style2, style3, style4, style5)
================================================== */
function link_button($atts, $content=null){
	extract(shortcode_atts( array( 
							'href' => '#',
							'target' => '_self',
							'size' => '', //small_button, medium_button, large_button
							'style' => '', //style1, style2, style3, style4, style5
                            'icon' => '', // info, alert, android, download, iphone
							), $atts ));
							
    if($size == 'small') {$size = 'small_button';};
    if($size == 'medium') {$size = 'medium_button';};
    if($size == 'large') {$size = 'large_button';};
	if($icon == 'info') {$icon = '<span class="icon"></span>'; $icon_symbol = 'info';};
    if($icon == 'alert') {$icon = '<span class="icon"></span>'; $icon_symbol = 'alert';};
    if($icon == 'android') {$icon = '<span class="icon"></span>'; $icon_symbol = 'android';};
    if($icon == 'download') {$icon = '<span class="icon"></span>'; $icon_symbol = 'download';};
    if($icon == 'iphone') {$icon = '<span class="icon"></span>'; $icon_symbol = 'iphone';};
	return '<a href="'.$href.'" target="'.$target.'" class="'.$size.' '.$style.' '.$icon_symbol.'">'.$icon.''.do_shortcode($content).'</a>';
}
add_shortcode('link_button', 'link_button');

/* pricing table
================================================== */
function pricing_table( $atts, $content = null ) {
    extract(shortcode_atts(array(
    ), $atts));
	$out = '';
    return $out;
}
add_shortcode('pricing_table', 'pricing_table');
?>