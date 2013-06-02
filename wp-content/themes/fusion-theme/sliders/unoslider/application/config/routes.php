<?php
require_once UNOSLIDER_BASE . '/library/Unodor/Router.php';

$main_menu = Unodor_Router::add_menu('unoslider', 'UnoSlider', 'UnoSlider Slides', array('controller' => 'unoslider', 'action' => 'index'), 'edit_theme_options');
Unodor_Router::add_submenu($main_menu, 'unoslider', 'All Sliders', 'UnoSlider Slides', array('controller' => 'unoslider', 'action' => 'index'), 'edit_theme_options');
Unodor_Router::add_submenu($main_menu, 'unoslider-new', 'New slider', 'UnoSlider New', array('controller' => 'unoslider', 'action' => 'new'), 'edit_theme_options');
Unodor_Router::add_submenu($main_menu, 'unoslider-css', 'Custom CSS', 'Edit Custom CSS', array('controller' => 'css', 'action' => 'index'), 'edit_theme_options');

Unodor_Router::add_ajax('unoslider', 'save');	//ok
Unodor_Router::add_ajax('unoslider', 'preview'); //ok
Unodor_Router::add_ajax('preset', 'preview');	//ok
Unodor_Router::add_ajax('preset', 'save'); // ok
Unodor_Router::add_ajax('preset', 'destroy');	// ok
Unodor_Router::add_ajax('preset', 'get'); // ok
Unodor_Router::add_ajax('preset', 'get_list'); //ok
Unodor_Router::add_ajax('preset', 'editor');	//ok

// Advanced options
Unodor_Router::add_ajax('advanced', 'index');
Unodor_Router::add_ajax('advanced', 'inline_html');