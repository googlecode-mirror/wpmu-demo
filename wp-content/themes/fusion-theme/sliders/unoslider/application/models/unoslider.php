<?php
require_once UNOSLIDER_BASE . '/library/Unodor/Model.php';

class Unoslider_Model extends Unodor_Model{	
	protected $table = 'unoslider';

	public function duplicate($id){
		$this->wpdb->query(
			"
			INSERT INTO $this->table (title, size, theme, slides, options, links, tooltip, perslide, layers, presets)
			SELECT title, size, theme, slides, options, links, tooltip, perslide, layers, presets
			FROM $this->table
			WHERE id = '$id'
			"
		);
	}
	
}