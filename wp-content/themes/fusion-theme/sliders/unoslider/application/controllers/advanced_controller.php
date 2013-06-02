<?php
require_once UNOSLIDER_BASE . '/library/Unodor/Controller.php';

class Advanced_Controller extends Unodor_Controller{

	public function index_action(){	
		$this->_layers_editor();

		$this->render_ajax('index');
			
		exit;
	}

	public function inline_html_action(){
		$this->render_ajax('inline_html');
			
		exit;
	}

	private function _layers_editor(){
		$css_file = file_get_contents(UNOSLIDER_BASE.'/public/stylesheets/custom/styles.css');
		$css_file .= file_get_contents(UNOSLIDER_BASE.'/public/stylesheets/default/styles.css');
		preg_match_all('/(\.unoslider_style_)[a-zA-Z_0-9\-]*/', $css_file, $matches);

		$styles = array();
		foreach($matches[0] as $class){
			$dotless = substr($class, 1);
			$name = explode('_', $dotless);
			$name = array_slice($name, 2);
			if($dotless != 'unoslider_style_new')
				$styles[$dotless] = ucwords(implode(' ', $name));
		}

		$this->view->styles = $styles;
	}
}