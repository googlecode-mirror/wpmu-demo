<?php

class Unodor_Shortcode{

	public $view;

	public function __construct(){
		require_once UNOSLIDER_BASE.'/library/Unodor/View.php';
		$this->view = new Unodor_View;
	}
	
	public function add($name){
		require_once UNOSLIDER_BASE . '/application/shortcodes/'.$name.'.php';
		$uc_name = ucfirst($name).'_Shortcode';
		$shortcode = new $uc_name;
		
		add_shortcode($name, array($shortcode, 'init'), 10, 1);
	}

	public function render($file){
		return $this->view->render_shortcode($file);
	}
}