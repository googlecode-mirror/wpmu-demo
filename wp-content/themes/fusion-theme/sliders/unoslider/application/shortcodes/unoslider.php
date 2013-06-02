<?php

require_once UNOSLIDER_BASE . '/library/Unodor/Shortcode.php';
class Unoslider_Shortcode extends Unodor_Shortcode{
	
	public function init($attr){
		if(isset($attr['id'])){
			$this->_prepare($attr['id']);

			return $this->render('unoslider');
		}
	}

	private function _prepare($id){
		require_once UNOSLIDER_BASE . '/application/models/unoslider.php';
		require_once UNOSLIDER_BASE . '/application/models/unoslider_presets.php';
		$model = new Unoslider_Model;
		$presets_model = new Unoslider_Presets_Model;
		$custom_presets = array();
		
		$slider = $model->get_one($id, 'id, title, size, theme, slides, options, links, tooltip, layers, perslide, presets');

		if(!empty($slider)){
			$raw_presets = unserialize($slider->presets);
	
			if(!empty($raw_presets)){
				$presets_ids = array_filter(array_map('map', $raw_presets), 'strlen');
	
				if(!empty($presets_ids)){
					$custom_presets = $presets_model->get_list($presets_ids);
				}
	
				$build_preset_object = array();
	
				foreach($raw_presets as $preset){
					if(is_int($preset['id'])){
						foreach ($custom_presets as $custom_preset) {
							if($preset['id'] == $custom_preset->id){
								$build_preset_object[] = array( 'animation' => unserialize($custom_preset->animation), 'block' => unserialize($custom_preset->block), 'id' => $custom_preset->id );
							}
						}
					}else{
						$build_preset_object[] = $preset['name'];
					}
				}
			}
		}


		if($slider){		
				
			$size = unserialize($slider->size);
			$slides = unserialize($slider->slides);
			$perslide = unserialize($slider->perslide);
			$options = unserialize($slider->options);
			$links = unserialize($slider->links);
			$tooltips = unserialize($slider->tooltip);
			$layers = unserialize($slider->layers);

			$navigation_ex = explode(',', $options['navigation']['autohide']);

			$navigation = "[";
			foreach($navigation_ex as $nav){
				$navigation .= ",'".$nav."'";
			}

			$navigation .= ']';

			if(!empty($raw_presets)) $this->view->presets = json_encode($build_preset_object);

			$this->view->options = $options;
			$this->view->navigation = $navigation;
			$this->view->slides = $slides;
			$this->view->links = $links;
			$this->view->tooltips = $tooltips;
			$this->view->layers = $layers;
			$this->view->perslide = $perslide;
			$this->view->width = $size['width'];
			$this->view->height = $size['height'];
			$this->view->theme = $slider->theme;
			//$this->view->title = $title;
			$this->view->id = $id;

			$this->view->enable();
		}else{
			$this->view->disable();
		}
	}

}

	function map($item){
		if(is_int($item['id'])){
			return $item['id'];			
		}
	}

function unoslider($id){
	$shortcode = new Unoslider_Shortcode;
	return $shortcode->init(array('id' => $id));
}