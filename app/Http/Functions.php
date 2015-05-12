<?php

function pre($x){
	echo '<pre>';
	print_r($x);
	echo '</pre>';
	return $x;
}