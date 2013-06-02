<?php

class Unodor_View{
	
	private $_content;
	private $_disabled = false;
	private $file;
	private $controller;

	public function __construct(){
		require_once UNOSLIDER_BASE . '/application/helpers.php';
	}

	public function partial($file, $locals){
		$filename = UNOSLIDER_BASE.'/application/views/partials/'.$file.'.phtml';

		foreach($locals as $key => $value){
			$$key = $value;
		}

		if (file_exists($filename)) {
			ob_start();
				require $filename;
				$this->_content = ob_get_contents();
			ob_clean();
		}else{
			wp_die('<strong>ERROR: </strong>File "' . $file . '.phtml" does not exist');
		}
		return $this->_content;
	}
	
	public function render($file, $controller){
		if(!$this->_disabled){
			$this->file = $file;
			$this->controller = $controller;
		
			$filename = UNOSLIDER_BASE.'/application/views/layouts/application.phtml';
			require_once $filename;
		}
	}

	public function render_ajax($file, $controller){
		$this->file = $file;		
		$this->controller = $controller;

		print $this->render_view($file, $controller);
	}
	
	private function render_view($file, $controller){
		$filename = UNOSLIDER_BASE.'/application/views/'.$controller.'/'.$file.'.phtml';

		if (file_exists($filename)) {
			ob_start();
				require_once $filename;
				$this->_content = ob_get_contents();
			ob_clean();
		}else{
			wp_die('<strong>ERROR: </strong>File "' . $file . '.phtml" does not exist');
		}
		
		return $this->_content;
	}

	public function render_shortcode($file){
		if(!$this->_disabled){
			$filename = UNOSLIDER_BASE.'/application/views/shortcode/'.$file.'.phtml';
			if (file_exists($filename)) {
				ob_start();
					include $filename;
					$this->_content = ob_get_contents();
				ob_end_clean();
			}else{
				wp_die('<strong>ERROR: </strong>File "' . $file . '.phtml" does not exist');
			}
			return $this->_content;
		}
	}
	
	public function content(){
		return $this->render_view($this->file, $this->controller);
	}
	
	public function disable($layout_only = false){
		if($layout_only){
			
		}else{
			$this->_disabled = true;
		}
	}

	public function enable(){
		$this->_disabled = false;
	}
	
}