<?php

class Helper {
	
	public static function pre($x){
		echo '<pre>';
		print_r($x);
		echo '</pre>';
		return $x;
	}

}