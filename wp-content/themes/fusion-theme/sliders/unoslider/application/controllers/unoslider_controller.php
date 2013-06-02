<?php
require_once UNOSLIDER_BASE . '/library/Unodor/Controller.php';

class Unoslider_Controller extends Unodor_Controller{

	public function index_action(){
		global $page, $status, $s;
		
		require_once UNOSLIDER_BASE.'/library/Unoslider/ListTable.php';
		$list_table = new Unoslider_ListTable;
		$list_table->prepare_items();

		$this->view->list_table = $list_table;
		
		$this->view->title = array('title' => 'UnoSlider Sliders', 'page' => 'unoslider-new', 'link' => 'Add New Slider');
	}

	// slider editor
	public function new_action(){
		$title = array('title' => 'Create New Slider', 'page' => 'unoslider', 'link' => 'Back');
		$name = '';
		$width = 960;
		$height = 350;
		$slides = '';
		$presets = null;

		$transitions = 	array(
			'grow' => array('topleft', 'topright', 'bottomleft', 'bottomright'),
			'swap' => array('top', 'right', 'bottom', 'left'),
			'stretch' => array('center', 'vertical', 'horizontal', 'alternate'),
			'squeeze' => array('center', 'vertical', 'horizontal', 'alternate'),
			'shrink' => array('topleft', 'topright', 'bottomleft', 'bottomright'),
			'slide_in' => array('top', 'right', 'bottom', 'left', 'alternate_vertical', 'alternate_horizontal'),
			'slide_out' => array('top', 'right', 'bottom', 'left', 'alternate_vertical', 'alternate_horizontal'),
			'drop' => array('topleft', 'topright', 'bottomleft', 'bottomright', 'top', 'right', 'bottom', 'left', 'alternate_vertical', 'alternate_horizontal'),
			'appear' => array('topleft', 'topright', 'bottomleft', 'bottomright', 'top', 'right', 'bottom', 'left', 'alternate_vertical', 'alternate_horizontal'),
			'flash' => array(),
			'fade' => array()
		);

		$patterns = array(
			'horizontal' => array('top', 'bottom', 'topleft', 'topright', 'bottomleft', 'bottomright'),
			'vertical' => array('left', 'right', 'topleft', 'topright', 'bottomleft', 'bottomright'),
			'diagonal' => array('topleft', 'topright', 'bottomleft', 'bottomright'),
			'random' => array(),
			'spiral' => array('topleft', 'topright', 'bottomleft', 'bottomright'),
			'horizontal_zigzag' => array('topleft', 'topright', 'bottomleft', 'bottomright'),
			'vertical_zigzag' => array('topleft', 'topright', 'bottomleft', 'bottomright'),
			'chess' => array(),
			'explode' => array('center', 'top', 'right', 'bottom', 'left'),
			'implode' => array('center', 'top', 'right', 'bottom', 'left')
		);

		$themes = array(
            'fusion' => 'Fusion',
			'basic' => 'Basic',
			'elegant' => 'Elegant',
			'inline' => 'Inline',
			'light' => 'Light',
			'minimalist' => 'Minimalist',
			'modern' => 'Modern',
			'panel' => 'Panel',
			'ribbon' => 'Ribbon',
			'slick' => 'Slick',
			'smooth' => 'Smooth',
			'square' => 'Square',
			'text' => 'Text',
			'custom' => 'Custom'
		);

		$options = $this->_default_options();

		$this->_custom_presets();

		$this->view->empty_navigation = false;
		$this->view->empty_slideshow = false;

		$tooltips = '';
		$layers = '';
		$links = '';
		$preset = '';
		$theme = '';

		if(isset($_GET['id'])){
			require_once UNOSLIDER_BASE . '/application/models/unoslider.php';
			$model = new Unoslider_Model;

			$old_navigation = $options['navigation'];
			$old_slideshow = $options['slideshow'];
			
			$data = $model->get_one($_GET['id'], 'id, title, size, theme, slides, options, links, tooltip, layers, presets');
			$size = unserialize($data->size);
			$slides = unserialize($data->slides);
			$options = unserialize($data->options);
			$tooltips = unserialize($data->tooltip);
			$layers = unserialize($data->layers);
			$links = unserialize($data->links);
			$preset = unserialize($data->presets);
			$theme = $data->theme;

			if(empty($options['navigation'])){ 
				$options['navigation'] = $old_navigation; 
				$this->view->empty_navigation = true;
			}

			if(empty($options['slideshow'])){ 
				$options['slideshow'] = $old_slideshow; 
				$this->view->empty_slideshow = true;
			}

			$title['title'] = 'Edit slider';
			$width = $size['width'];
			$height = $size['height'];
			$name = $data->title;
		}

		$this->view->options = $options;
		$this->view->tooltips = $tooltips;
		$this->view->layers = $layers;
		$this->view->links = $links;
		$this->view->presets = $preset;
		$this->view->themes = $themes;
		$this->view->theme = $theme;
		$this->view->patterns = $patterns;
		$this->view->transitions = $transitions;
		$this->view->navigation = explode(',', $options['navigation']['autohide']);
		$this->view->slides = $slides;
		$this->view->name = $name;
		$this->view->width = $width;
		$this->view->height = $height;
		$this->view->title = $title;
	}

	public function edit_action(){
		$this->view->title = array('title' => 'Edit Slider', 'page' => 'unoslider', 'link' => 'Back');

		$this->view->options = $this->_default_options();

		$this->render('new');
	}

	public function save_action(){
		if ( $this->_validate() ) {
			require_once UNOSLIDER_BASE . '/application/models/unoslider.php';
			$model = new Unoslider_Model;

			$layers = array();
			if(isset($_POST['layers'])){
				foreach($_POST['layers'] as $layer){
					$layers[] = json_decode(stripslashes($layer), true);
				}
			}

			$presets = null;
			if(isset($_POST['undr_presets'])){
				foreach($_POST['undr_presets'] as $preset){
					$presets[] = json_decode(stripslashes($preset), true);
				}
				$presets = serialize($presets);
			}

			$data = array(
				'title' => empty($_POST['undr_title']) ? 'Unnamed Slider' : $_POST['undr_title'],
				'size' => serialize(array('width' => $_POST['width'], 'height' => $_POST['height'])),
				'theme' => $_POST['undr_theme'],
				'slides' => serialize($_POST['slide_data']),
				'links' => serialize(array('href' => $_POST['imglink'], 'target' => $_POST['linktarget'])),
				'tooltip' => serialize($_POST['tooltip']),
				'layers' => serialize($layers),
				'presets' => $presets,

				'options' => serialize(array(
					'scale' => isset($_POST['undr_scale']) ? true : false, 
					'responsive' => isset($_POST['undr_responsive']) ? true : false,
					'responsive_layers' => isset($_POST['undr_responsive_layers']) ? true : false,
					'mobile' => isset($_POST['undr_mobile']) ? true : false,
					'touch' => isset($_POST['undr_touch']) ? true : false,
					'indicator' => !isset($_POST['undr_indicator']) ? false : array('autohide' => isset($_POST['undr_indicator_autohide']) ? true : false),
					'navigation' => !isset($_POST['undr_navigation']) ? false : array(
						'autohide' => !isset($_POST['undr_navigation_autohide']) ? false : implode(',', $_POST['undr_navigation_autohide']), 
						'play' => $_POST['undr_play'],
						'stop' => $_POST['undr_pause'],
						'next' => $_POST['undr_next'],
						'prev' => $_POST['undr_prev']
					),
					'slideshow' => !isset($_POST['undr_slideshow']) ? false : array(
						'speed' => $_POST['undr_slideshow_speed'],
						'autostart' => isset($_POST['undr_slideshow_autostart']) ? true : false,
						'timer' => isset($_POST['undr_slideshow_timer']) ? true : false,
						'hoverPause' => isset($_POST['undr_slideshow_hoverPause']) ? true : false,
						'continuous' => isset($_POST['undr_slideshow_continuous']) ? true : false,
						'infinite' => isset($_POST['undr_slideshow_infinite']) ? true : false
					),
					'block' => array(
						'vertical' => $_POST['undr_block_vertical'],
						'horizontal' => $_POST['undr_block_horizontal']
					),
					'animation' => array(
						'speed' => $_POST['undr_animation_speed'],
						'delay' => $_POST['undr_animation_delay'],
						'transition' => $_POST['undr_transition'],
						'variation' => isset($_POST['undr_variation']) ? $_POST['undr_variation'] : '',
						'pattern' => $_POST['undr_pattern'],
						'direction' => isset($_POST['undr_direction']) ? $_POST['undr_direction'] : ''
					),
					'presets_order' => isset($_POST['undr_presets_order']) ? true : false
				))
			);
			
			if(empty($_POST['id'])){	// Create				
				$id = $model->insert($data);

				$success = $id === 0 ? false : true;
				$response = json_encode( array( 'success' => $success, 'last_id' => $id ) );
				
			}else{// Edit				
				$result = $model->update($_POST['id'], $data);

				$success = $result === false ? false : true;
				$response = json_encode( array( 'success' => $success) );
			}
			
			// response output
			if(!$success) header('HTTP/1.1 403 Forbidden');
			header( "Content-Type: application/json" );
			echo $response;
		}
		
		exit;	
	}

	// clone slider
	public function clone_action(){
		$this->view->disable();
		require_once UNOSLIDER_BASE . '/application/models/unoslider.php';
		$model = new Unoslider_Model;
		
		$id = $model->duplicate($_GET['id']);
	}
	
	// remove slider
	public function delete_action(){
		require_once UNOSLIDER_BASE . '/application/models/unoslider.php';
		$model = new Unoslider_Model;
		
		$id = $model->delete($_GET['id']);
	}

	// preview slider
	public function preview_action(){
		$this->render_ajax('preview');

		exit;
	}

	private function _default_options(){
		return array(
			'scale' => true,
			'responsive' => true,
			'responsive_layers' => false,
			'mobile' => true,
			'touch' => true,
			'presets_order' => false,
			'indicator' => array(
				'autohide' => false
			),
			'navigation' => array(
				'autohide' => 'play,pause',
				'play' => 'Play',
				'stop' => 'Pause',
				'next' => 'Next',
				'prev' => 'Previous'
			),
			'slideshow' => array(
				'speed' => 1,
				'autostart' => true,
				'timer' => true,
				'hoverPause' => true,
				'continuous' => true,
				'infinite' => true
			),
			'block' => array(
				'vertical' => 9,
				'horizontal' => 3
			),
			'animation' => array(
				'speed' => 500,
				'delay' => 50,
				'transition' => 'grow',
				'variation' => 'topleft',
				'pattern' => 'diagonal',
				'direction' => 'topleft'
			)
		);
	}

	private function _custom_presets(){
		require_once UNOSLIDER_BASE . '/application/models/unoslider_presets.php';
		$model = new Unoslider_Presets_Model;

		$presets = $model->get_all('id, title, animation, block');

		$custom_presets = array();
		foreach($presets as $id => $preset){
			$custom_presets[$id]['id'] = $preset->id;
			$custom_presets[$id]['name'] = $preset->title;
			$custom_presets[$id]['animation'] = unserialize($preset->animation);
			$custom_presets[$id]['block'] = unserialize($preset->block);
		}

		$this->view->custom_presets = htmlspecialchars(json_encode($custom_presets));
	}
}