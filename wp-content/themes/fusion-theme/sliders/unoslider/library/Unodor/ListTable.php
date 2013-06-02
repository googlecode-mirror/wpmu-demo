<?php

if(!class_exists('WP_List_Table')){
	require_once(ABSPATH . 'wp-admin/includes/class-wp-list-table.php');
}

class Unodor_ListTable extends WP_List_Table {

	protected $_cols = '*';
	protected $_perpage = 10;
	
	public function __construct(){
		parent::__construct();
	}
			
	public function column_default($item, $column_name){
		switch($column_name){
			default:
				return print_r($item, true); //Show the whole array for troubleshooting purposes
		}
	}

	public function get_columns(){
		$columns = array();
		foreach($this->_columns as $key => $val){
			$columns[str_replace(' ', '_', strtolower($key))] = $key;
		}

		return $columns;
	}

	public function get_sortable_columns() {
		$sortable_columns = array();
		foreach($this->_columns as $key => $val){
			if($val[0] == true)
				$sortable_columns[str_replace(' ', '_', strtolower($key))] = array($val[0], $val[1]);
		}

		return $sortable_columns;
	}
	
	public function prepare_items() {
		global $wpdb, $_wp_column_headers;
		$screen = get_current_screen();

		$query = 'SELECT '. $this->_cols .' FROM ' . $wpdb->prefix . $this->_table;

		$orderby = !empty($_GET["orderby"]) ? mysql_real_escape_string($_GET["orderby"]) : 'ASC';
		$order = !empty($_GET["order"]) ? mysql_real_escape_string($_GET["order"]) : '';
		if(!empty($orderby) & !empty($order)){ $query.=' ORDER BY '.$orderby.' '.$order; }

		$totalitems = $wpdb->query($query);
		$paged = !empty($_GET["paged"]) ? mysql_real_escape_string($_GET["paged"]) : '';

		if(empty($paged) || !is_numeric($paged) || $paged<=0 ){ $paged=1; }
		$totalpages = ceil($totalitems/$this->_perpage);
		if(!empty($paged) && !empty($this->_perpage)){
			$offset=($paged-1)*$this->_perpage;
			$query.=' LIMIT '.(int)$offset.','.(int)$this->_perpage;
		}

		$this->set_pagination_args( array(
			"total_items" => $totalitems,
			"total_pages" => $totalpages,
			"per_page" => $this->_perpage,
		) );

		$columns = $this->get_columns();
		$hidden = array();
		$sortable = $this->get_sortable_columns();
		$this->_column_headers = array($columns, $hidden, $sortable);

		return $this->items = $wpdb->get_results($query, ARRAY_A);
	}
	
}