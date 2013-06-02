<?php
require_once UNOSLIDER_BASE . '/library/Unodor/Controller.php';

class Css_Controller extends Unodor_Controller{

	public function index_action(){
		$id = isset($_GET['id']) ? $_GET['id'] : 'custom/custom';

		$css_file = UNOSLIDER_BASE.'/public/stylesheets/'.$id.'.css';

		$css = file_get_contents($css_file);

		if(!is_writable($css_file)){
			$this->view->notice = 'File <strong>"'.$css_file.'"</strong> is not writable.';
		}

		$this->view->css = $css;

		$this->view->title = array('title' => 'Edit CSS - '.$id . '.css');

		$themes = array(
			'custom/custom'	=> array('title' => 'Custom CSS', 'desc' => 'The custom css styles'),
			'custom/styles'	=> array('title' => 'Animated layers Styles', 'desc' => 'The animated layers styles'),
			'custom/theme'	=> array('title' => 'Custom Theme', 'desc' => 'The custom theme')
		);

		$this->view->name = $id . '.css';
		$this->view->themes = $themes;
	}

	// save edited css file
	public function save_action(){
		$id = isset($_GET['id']) ? $_GET['id'] : 'custom/custom';

		$theme_css = get_option('unoslider_css_theme');
		$theme_admin = get_option('unoslider_css_admin');
		$theme_wp = get_option('unoslider_css_wp');

		if(!empty($theme_css)) unlink(UNOSLIDER_BASE.$theme_css.'.css');
		if(!empty($theme_admin)) unlink(UNOSLIDER_BASE.$theme_admin.'.css');
		if(!empty($theme_wp)) unlink(UNOSLIDER_BASE.$theme_wp.'.css');

		// update edited css file
		file_put_contents(UNOSLIDER_BASE.'/public/stylesheets/'.$id.'.css', stripslashes($_POST['css_code']));
	}
}