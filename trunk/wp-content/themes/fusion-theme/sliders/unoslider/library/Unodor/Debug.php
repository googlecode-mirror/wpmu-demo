<?php

class Unodor_Debug{
	public static function dump($data){
		if(!is_string($data)){
			echo '<pre>';
			print_r($data);
			echo '</pre>';
		}else{
			echo 'DEBUG: ' . $data;
		}
	}
}

function d($data, $brs = 0){
	for($i = 0; $i < $brs; $i++){
		print '<br>';
	}
	Unodor_Debug::dump($data);
}