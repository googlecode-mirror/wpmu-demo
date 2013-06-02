<?php
require_once UNOSLIDER_BASE . '/library/Unodor/Controller.php';

class Preset_Controller extends Unodor_Controller{

	public function save_action(){
		if ( $this->_validate() ) {
			require_once UNOSLIDER_BASE . '/application/models/unoslider_presets.php';
			$model = new Unoslider_Presets_Model;

			$data = array(
				'title' => $_POST['title'],
				'animation' => serialize($_POST['animation']),
				'block' => serialize($_POST['block'])
			);

			if(empty($_POST['id'])){
				$id = $model->insert($data);
				
				$success = $id === 0 ? false : true;
				$response = json_encode( array( 'success' => $success, 'id' => $id ) );
			}else{
				$result = $model->update($_POST['id'], $data);

				$success = $result === false ? false : true;
				$response = json_encode( array( 'success' => $success) );
			}

			if(!$success) header('HTTP/1.1 403 Forbidden');
			header( "Content-Type: application/json" );
			echo $response;
		}

		exit;
	}

	public function get_action(){
		require_once UNOSLIDER_BASE . '/application/models/unoslider_presets.php';
		$model = new Unoslider_Presets_Model;

		$data = $model->get_one($_GET['id']);

		$response = json_encode( array( 'animation' => unserialize($data->animation), 'block' => unserialize($data->block), 'title' => $data->title ) );

		header( "Content-Type: application/json" );
		echo $response;

		exit;
	}

	public function get_list_action(){
		require_once UNOSLIDER_BASE . '/application/models/unoslider_presets.php';
		$model = new Unoslider_Presets_Model;
		if(!empty($_GET['id'])){
			$presets = $model->get_list($_GET['id']);
	
			$response = array();
			foreach($presets as $preset){
				$response[] = array( 'animation' => unserialize($preset->animation), 'block' => unserialize($preset->block), 'id' => $preset->id );
			}
	
			header( "Content-Type: application/json" );
			echo json_encode($response);
		}
		exit;
	}

	public function destroy_action(){
		if ( $this->_validate() ) {
			require_once UNOSLIDER_BASE . '/application/models/unoslider_presets.php';
			$model = new Unoslider_Presets_Model;

			$model->delete($_POST['id']);
			$response = json_encode( array( 'success' => true ) );

			header( "Content-Type: application/json" );
			echo $response;
		}

		exit;
	}

	public function preview_action(){
		require_once UNOSLIDER_BASE . '/application/models/unoslider_presets.php';
		$model = new Unoslider_Presets_Model;

		if($_GET['preset_id'] != $_GET['preset_name']){
			$data = $model->get_one($_GET['preset_id']);
			$this->view->response = json_encode( array( 'animation' => unserialize($data->animation), 'block' => unserialize($data->block), 'title' => $data->title ) );
		}else{
			$this->view->response = json_encode( $_GET['preset_id'] );
		}


		$this->render_ajax('preview');

		exit;
	}

	public function editor_action(){
		$this->view->transitions = 	array(
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

		$this->view->patterns = array(
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

		$this->render_ajax('editor');

		exit;
	}

}