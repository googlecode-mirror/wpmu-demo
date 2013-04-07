<?php
add_action('admin_init', 'ninja_forms_register_sidebar_layout_fields');

function ninja_forms_register_sidebar_layout_fields(){
	$args = array(
		'name' => 'Layout Elements',
		'page' => 'ninja-forms', 
		'tab' => 'field_settings',
		'display_function' => 'ninja_forms_sidebar_display_fields'
	);
	ninja_forms_register_sidebar('layout_fields', $args);
}