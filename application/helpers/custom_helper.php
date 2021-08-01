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

	function flatten_array($multidimensional_array, $filter_empty_array = true)
	{
		$obj = new RecursiveIteratorIterator(new RecursiveArrayIterator($multidimensional_array));
		if ($filter_empty_array) {
			return array_filter(iterator_to_array($obj, false));
		} else {
			return iterator_to_array($obj, false);
		}
	}
?>