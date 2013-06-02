<?php

require_once UNOSLIDER_BASE . '/library/Unodor/Application.php';

class Unoslider extends Unodor_Application{

	public function init_admin_script(){
		add_action('admin_enqueue_scripts', array(&$this, '_admin_scripts'), 10, 1);
		add_action('admin_enqueue_scripts', array(&$this, '_admin_styles'), 10, 1);
	}

	public function init_wp_script(){
		add_action('wp_enqueue_scripts', array(&$this, '_wp_scripts'), 10, 1);
		add_action('wp_enqueue_scripts', array(&$this, '_wp_styles'), 10, 1);
	}

	public function admin_bar(){		
		global $wp_admin_bar;
		if (is_super_admin() && is_admin_bar_showing()){
			$wp_admin_bar -> add_menu(array(
				'parent' => 'new-content',
				'id'		=> 'unoslider',
					'title' => __('UnoSlider', 'unoslider'),
				'href' => admin_url('admin.php?page=unoslider-new')
			));
		}
	}
	
	public function init_wp_shortcode(){
		require_once UNOSLIDER_BASE . '/library/Unodor/Shortcode.php';

		$shortcode = new Unodor_Shortcode();
		$shortcode->add('unoslider');
	}

	public function init_admin_uploader_text(){
		add_filter( 'gettext', array(&$this, 'change_insert_into_post'), null, 2 );
	}

	public function _admin_scripts($page){
		require_once UNOSLIDER_BASE . '/library/Unodor/Registry.php';

		$plugin_pages = Unodor_Registry::get('plugin_pages');
		
		if(in_array($page, $plugin_pages)){
			wp_enqueue_script('unosldier_js', UNOSLIDER_PATH.'public/javascripts/unoslider.js', array('jquery'), UNOSLIDER_VERSION);

			$handle = $this->_combine_js('combined', array(
				'jquery.colorbox-min.js' => array('jquery'),
				'plugins.js' => array('jquery'),
				'codemirror.js' => array('jquery'),
				'tabs.js' => array('jquery'),
				'tooltip.js' => array('jquery'),
				'admin.js' => array('jquery-ui-core', 'jquery-ui-sortable', 'jquery-ui-draggable', 'jquery-ui-resizable', 'media-upload', 'thickbox')
			));

			wp_localize_script($handle, 'unoslider', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ), 'nonce' => wp_create_nonce( 'unoslider_nonce' ), 'abspath' =>  UNOSLIDER_PATH) );		
			wp_enqueue_script('jquery-form');
		}
	}
	
	public function _admin_styles($page){
		require_once UNOSLIDER_BASE . '/library/Unodor/Registry.php';

		$plugin_pages = Unodor_Registry::get('plugin_pages');
		
		if(in_array($page, $plugin_pages)){

			$css_files = array(
				UNOSLIDER_PATH.'public/stylesheets/default/unoslider.css',
				UNOSLIDER_PATH.'public/stylesheets/default/admin.css',
				UNOSLIDER_PATH.'public/stylesheets/default/styles.css',
				UNOSLIDER_PATH.'public/stylesheets/custom/custom.css',
				UNOSLIDER_PATH.'public/stylesheets/custom/styles.css'
			);

			$themes = array(
                UNOSLIDER_PATH.'public/stylesheets/default/themes/fusion/theme.css',
				UNOSLIDER_PATH.'public/stylesheets/default/themes/basic/theme.css',
				UNOSLIDER_PATH.'public/stylesheets/default/themes/elegant/theme.css',
				UNOSLIDER_PATH.'public/stylesheets/default/themes/inline/theme.css',
				UNOSLIDER_PATH.'public/stylesheets/default/themes/light/theme.css',
				UNOSLIDER_PATH.'public/stylesheets/default/themes/minimalist/theme.css',
				UNOSLIDER_PATH.'public/stylesheets/default/themes/modern/theme.css',
				UNOSLIDER_PATH.'public/stylesheets/default/themes/panel/theme.css',
				UNOSLIDER_PATH.'public/stylesheets/default/themes/ribbon/theme.css',
				UNOSLIDER_PATH.'public/stylesheets/default/themes/slick/theme.css',
				UNOSLIDER_PATH.'public/stylesheets/default/themes/smooth/theme.css',
				UNOSLIDER_PATH.'public/stylesheets/default/themes/square/theme.css',
				UNOSLIDER_PATH.'public/stylesheets/default/themes/text/theme.css',
				UNOSLIDER_PATH.'public/stylesheets/custom/theme.css'
			);

			$this->_combine_css($css_files,'unoslider_admin', '/public/stylesheets/default/');
			$this->_combine_css($themes, 'themes', '/public/stylesheets/default/themes/all/');

			update_option('unoslider_css_admin', '/public/stylesheets/default/unoslider_admin');
			update_option('unoslider_css_theme', '/public/stylesheets/default/themes/all/themes');

			wp_enqueue_style('thickbox');
		}
	}

	public function _wp_scripts($page){
		wp_enqueue_script('unoslider_js', UNOSLIDER_PATH.'public/javascripts/unoslider.js', array('jquery'), UNOSLIDER_VERSION);
	}	

	public function _wp_styles($page){
		$css_files = array(
			UNOSLIDER_PATH.'public/stylesheets/default/unoslider.css',
			UNOSLIDER_PATH.'public/stylesheets/default/styles.css',
			UNOSLIDER_PATH.'public/stylesheets/custom/custom.css',
			UNOSLIDER_PATH.'public/stylesheets/custom/styles.css'
		);
		
		$themes = array(
            UNOSLIDER_PATH.'public/stylesheets/default/themes/fusion/theme.css',
			UNOSLIDER_PATH.'public/stylesheets/default/themes/basic/theme.css',
			UNOSLIDER_PATH.'public/stylesheets/default/themes/elegant/theme.css',
			UNOSLIDER_PATH.'public/stylesheets/default/themes/inline/theme.css',
			UNOSLIDER_PATH.'public/stylesheets/default/themes/light/theme.css',
			UNOSLIDER_PATH.'public/stylesheets/default/themes/minimalist/theme.css',
			UNOSLIDER_PATH.'public/stylesheets/default/themes/modern/theme.css',
			UNOSLIDER_PATH.'public/stylesheets/default/themes/panel/theme.css',
			UNOSLIDER_PATH.'public/stylesheets/default/themes/ribbon/theme.css',
			UNOSLIDER_PATH.'public/stylesheets/default/themes/slick/theme.css',
			UNOSLIDER_PATH.'public/stylesheets/default/themes/smooth/theme.css',
			UNOSLIDER_PATH.'public/stylesheets/default/themes/square/theme.css',
			UNOSLIDER_PATH.'public/stylesheets/default/themes/text/theme.css',
			UNOSLIDER_PATH.'public/stylesheets/custom/theme.css'
		);

		$this->_combine_css($css_files,'unoslider_frontend', '/public/stylesheets/default/');
		$this->_combine_css($themes, 'themes', '/public/stylesheets/default/themes/all/');
		
		update_option('unoslider_css_wp', '/public/stylesheets/default/unoslider_frontend');
		update_option('unoslider_css_theme', '/public/stylesheets/default/themes/all/themes');
	}
		
	public function change_insert_into_post( $translation, $original ) {
		if( !isset( $_REQUEST['from'] ) )
			return $translation;

		if( $_REQUEST['from'] == 'unoslider' && $original == 'Insert into Post' )
			return 'Add to slider';

		return $translation;
	}
	
	public static function activate(){
		global $wpdb;
		
		$unoslider_table_name = $wpdb->prefix . "unoslider";
		$presets_table_name = $wpdb->prefix . "unoslider_presets";
		
		$unoslider_sql = "CREATE TABLE " . $unoslider_table_name . "(
			`id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY ,
			`title` VARCHAR( 255 ) NOT NULL ,
			`size` VARCHAR( 255 ) NOT NULL ,
			`theme` VARCHAR( 100 ) NOT NULL ,
			`slides` TEXT NOT NULL,
			`layers` TEXT NOT NULL,
			`options` TEXT NOT NULL,
			`links` TEXT NOT NULL,
			`tooltip` TEXT NOT NULL,
			`presets` TEXT NOT NULL,
			`perslide` TEXT NULL
			);";

		$presets_sql = "CREATE TABLE " . $presets_table_name . "(
			`id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY ,
			`title` VARCHAR( 255 ) NOT NULL,
			`animation` TEXT NOT NULL,
			`block` TEXT NOT NULL
			);";
					
		require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
		
		// add_option('my_plugin_db_version', $this->db_version);
    
		dbDelta($unoslider_sql);
		dbDelta($presets_sql);
	}
	
	public static function deactivate(){

	}
	
	public static function uninstall(){
    global $wpdb;
		
		$table_name = $wpdb->prefix . "unoslider";
		$presets_table_name = $wpdb->prefix . "unoslider_presets";
    	
    $sql = "DROP TABLE " . $table_name . ";";
    $presets_sql = "DROP TABLE " . $presets_table_name . ";";
    
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php'); 
		$wpdb->query($sql);
		$wpdb->query($presets_sql);
	}
}