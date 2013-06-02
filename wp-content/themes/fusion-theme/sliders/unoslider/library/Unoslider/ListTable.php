<?php

require_once UNOSLIDER_BASE . '/library/Unodor/ListTable.php';

class Unoslider_ListTable extends Unodor_ListTable {

	// 'slug' => array(sorted_col?, sorted_by_default?)
	protected $_columns = array(
		'Title' => array('title', false),
		'Size' => array('size', false),
		'Theme' => array('theme', false),
		'Shortcode' => array('id', true),
		'Function' => array('id', false)
	);

	protected $_table = 'unoslider';
	protected $_perpage = 10;
	protected $_cols = 'id, title, size, theme';

	public function __construct(){
		parent::__construct();
	}

	public function column_title($item){
		$actions = array(
			'clone' => sprintf('<a href="?page=%s&action=%s&id=%s&_r=1">Duplicate</a>', $_REQUEST['page'], 'clone', $item['id']),
			'delete' => sprintf('<a href="?page=%s&action=%s&id=%s&_r=1">Delete</a>', $_REQUEST['page'], 'delete', $item['id']),
		);
		
		//Return the title contents
		return sprintf('<a href="?page=%4$s&action=%5$s&id=%2$s">%1$s</a> <span style="color:silver">(id:%2$s)</span>%3$s', $item['title'], $item['id'], $this->row_actions($actions), 'unoslider-new', 'new');
	}

	public function column_size($item){
		$size = unserialize($item['size']);
		return sprintf('%1$sx%2$s', $size['width'], $size['height']);
	}

	public function column_theme($item){
		return $item['theme'];
	}

	public function column_shortcode($item){
		return sprintf('<code>[unoslider id="%1$s"]</code>', $item['id']);
	}

	public function column_function($item){
		return sprintf('<code>unoslider(%1$s)</code>', $item['id']);
	}
}