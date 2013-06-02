<?php

class Unodor_Model{
	protected $table;
	protected $wpdb;

	public function __construct() {
		global $wpdb;
		$this->wpdb = $wpdb;
		$this->table = $wpdb->prefix . $this->table;
	}
	
	public function select(){
		
	}
	
	public function get_one($id, $fields = '*'){
		$return = $this->wpdb->get_row( "SELECT ".$fields." FROM " . $this->table . " WHERE id = " . $id);
		return $return;
	}

	public function get_list($ids, $fields = '*'){
		$return = $this->wpdb->get_results( "SELECT ".$fields." FROM " . $this->table . " WHERE id IN (" . implode(',', $ids) . ")");
		return $return;
	}

	public function get_all($fields = '*'){
		$return = $this->wpdb->get_results( "SELECT ".$fields." FROM " . $this->table);
		return $return;
	}
	
	public function save(){
		
	}
	
	public function insert($data){
		$this->wpdb->insert( $this->table, $data );
		
		return $this->wpdb->insert_id;
	}
	
	public function update($id, $data){
		$result =  $this->wpdb->update( $this->table, $data, array('id' => $id));

		return $result;
	}
	
	public function delete($id){
		$this->wpdb->query(
			"
			DELETE FROM $this->table 
			WHERE id = '$id'
			"
		);
	}
	
	public function insert_id(){
		$this->wpdb->insert_id;
	}

}