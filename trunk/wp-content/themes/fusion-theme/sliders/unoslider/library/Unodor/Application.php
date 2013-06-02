<?php

require_once UNOSLIDER_BASE . '/library/Unodor/Debug.php';

class Unodor_Application{
	
	public function run(){
		$this	->load_config_files()
					->register_menu()
					->register_ajax()
					->register_menu()
					->admin_init_methods()
					->wp_init_methods();
	}
	
	private function admin_init_methods(){
		if(is_admin()){
			foreach(get_class_methods($this) as $method) {
				if(preg_match('/^init_admin_[a-z]/', $method)){
					call_user_func(array($this, $method));
				}
			}
		}

		return $this;
	}
	
	private function wp_init_methods(){
		if(!is_admin()){
			foreach(get_class_methods($this) as $method) {
				if(preg_match('/^init_wp_[a-z]/', $method)){
					call_user_func(array($this, $method));
				}
			}
		}
		
		return $this;
	}

	private function init_admin_bar(){
		if(is_admin()){
			add_action('wp_before_admin_bar_render', array(&$this, 'admin_bar'));
		}
	}
	
	private function register_ajax(){
		//TODO: rozdelit na admin a wp
		Unodor_Router::register_ajax();
		return $this;
	}
	
	private function register_menu(){
		add_action('admin_menu', array('Unodor_Router', 'register_menu'));
		return $this;
	}
	
	private function load_config_files(){
		foreach (glob(UNOSLIDER_BASE . "/application/config/*.php") as $filename){
			require_once $filename;
		}
		return $this;
	}

	protected function _combine_js($filename, $scripts){
		$handle = '';

		$base = UNOSLIDER_BASE.'/public/javascripts/';
		$path = UNOSLIDER_PATH.'public/javascripts/';

		@chmod($base, 0755);

		// enqueue all the scripts one by one
		if(!is_writable($base) OR UNOSLIDER_ENV == 'development'){

			foreach ($scripts as $script => $dependency) {
				wp_enqueue_script('unoslider_'.$script, $path.$script, $dependency, UNOSLIDER_VERSION);
				$handle = 'unoslider_'.$script;
			}

		// combine and enqueue the combined file
		}else{

			$combined_output = '';
			$combine_flag = false;
			$dependencies = array();

			foreach ($scripts as $script => $dependency) {

				// combine only if the file does not exists
				if (!file_exists($base.$filename.'.js')){
					$combined_output .= file_get_contents($path.$script) . "\n";
					$combine_flag = true;
				}

				$dependencies = array_merge($dependencies, $dependency);
			}

			// create a new, combined file
			if ($combine_flag){
				file_put_contents($base.$filename.'.js', $combined_output);
			}

			// enqueue combined file
			wp_enqueue_script('unoslider_'.$filename, $path.$filename.'.js', array_unique($dependencies), UNOSLIDER_VERSION);

			$handle = 'unoslider_'.$filename;
		}

		// return handle for wp_localize_script
		return $handle;
	}

	protected function _combine_css($files, $output_file_name, $path){

		// try to make the stylesheets folder writable
		@chmod(UNOSLIDER_BASE.$path, 0755);

		// enqueue all the styles one by one
		if(!is_writable(UNOSLIDER_BASE.$path) OR UNOSLIDER_ENV == 'development'){
			foreach($files as $file){
				wp_enqueue_style('unoslider_'.$file, $file, false, UNOSLIDER_VERSION);
			}

		// combine and enqueue the combined files
		}else{
			$combined_output = '';
			// combine only if the file does not exists
			if (!file_exists(UNOSLIDER_BASE.$path.$output_file_name.'.css')){
				foreach($files as $file){
					$combined_output .= file_get_contents($file) . "\n";
				}
				file_put_contents(UNOSLIDER_BASE.$path.$output_file_name.'.css', $combined_output);
			}

			wp_enqueue_style('unoslider_'.$output_file_name, UNOSLIDER_PATH.$path.$output_file_name.'.css', false, UNOSLIDER_VERSION);
		}
	}
}