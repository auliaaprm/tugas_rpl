<?php
	function printr($data){
		echo "<pre>";
		print_r($data);
		echo "</pre>";
	}

	function array_to_hash($key, $array) {
		$hash = array();
		foreach($array as $a) {
			$hash[$a[$key]] = $a;
		}
		return $hash;
	}
?>