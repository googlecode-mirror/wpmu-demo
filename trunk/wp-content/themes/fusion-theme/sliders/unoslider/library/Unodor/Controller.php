<?php

class Unodor_Controller{
	
	public $view;
	public $controller;
	private $_rendered = false;
	
	public function __construct(){
		require_once UNOSLIDER_BASE.'/library/Unodor/View.php';
		$this->view = new Unodor_View;
	}
	
	public function render($file){
		$controller = $this->get_controller();
		$this->view->render($file, $controller);
		
		$this->_rendered = true;
	}
	
	public function render_ajax($file){
		$controller = $this->get_controller();
		$this->view->render_ajax($file, $controller);
		
		$this->_rendered = true;
	}
	
	public function get_controller(){
		if(is_array($this->controller)){
			return $this->controller[$_GET['page']];
		}else{
			return $this->controller;
		}
	}
	
	public function __call($action, $args){
		if(isset($_GET['action'])) $action = $_GET['action'];

		if(method_exists($this, $action . '_action')){
			call_user_func(array($this, $action . '_action'));
			
			if(isset($_GET['_r']))
				$this->view->disable();
			
			if(!$this->_rendered)
				$this->render($action);
				
		}else{
			wp_die('<strong>ERROR: </strong> Action "' . $action . '_action" does not exist in "'.get_class($this).'"');
		}
	}

	// validate nonce
	protected function _validate(){
		$nonce = $_POST['nonce'];
		
		if ( ! wp_verify_nonce( $nonce, 'unoslider_nonce' ) ) die ( 'Busted!');

		if ( current_user_can( 'edit_theme_options' ) ) {
			return true;
		}
		
		return false;
	}
	
}