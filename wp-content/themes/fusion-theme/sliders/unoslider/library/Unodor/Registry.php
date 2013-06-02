<?php

class Unodor_Registry{
	
	private static $_data = array();

	public static function get($key){
		return self::$_data[$key];
	}
	
	public static function set($key, $value){
		self::$_data[$key] = $value;
	}
	
}