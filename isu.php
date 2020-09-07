<?php
// SELECT
function void_reference(){
	$additive[] = "SELECT * FROM `". func_get_args()[0] ."`";
	if (!empty(func_get_args()[1])){
		$additive[] = ' WHERE ';
		$kv_array = func_get_args()[1];
		
		foreach ($kv_array as $current_var => $vkey){
			$additive[] = $current_var ." ". $vkey;
			$additive[] = " AND ";
		}
		array_pop($additive);
	}
	$additive[] = ' ORDER BY `order` ASC';
	$additive[] = ';';
	$string_additive = '';
	foreach($additive as $current){
		$string_additive = $string_additive . $current;
	}
	return $string_additive; 	
}

function void_select(){
	$query = func_get_args()[0];
	$start_order_on_page = func_get_args()[1];
	$count_on_page = func_get_args()[2];
	
	$r_query = str_replace(";", " LIMIT $start_order_on_page, $count_on_page;", $query);
	return $r_query;
}

// INSERT
function void_insert(){
	$additive[] = "INSERT INTO `" . func_get_args()[0] . "` (";
	
	$col_key = func_get_args()[1];
	$col_value = func_get_args()[2];

	foreach ($col_key as $current_key){
		$additive[] = '`' . $current_key . '`';
		$additive[] = ',';
	}
	array_pop ($additive);
	$additive[] = ')';
	$additive[] = ' VALUES (';
	
	foreach ($col_value as $current_value){
		$additive[] = "'" . $current_value . "'";
		$additive[] = ',';
	}
	array_pop ($additive);
	$additive[] = ');';
	
	$string_additive = '';
	foreach($additive as $current)
		$string_additive = $string_additive . $current;
	
	return $string_additive;
}

//UPDATE
function void_update(){
	$additive[] = "UPDATE `" . func_get_args()[0] . "` SET ";
	 
	$id = func_get_args()[1];
	$col_key = func_get_args()[2];
	$col_value = func_get_args()[3];

	$counts = count($col_key);
	for ($i=0; $i<$counts; $i++){
		$additive[] = "`" . $col_key[$i] . "`='" . $col_value[$i] . "'";
		$additive[] = ',';
	}
	array_pop ($additive);
	$additive[] = " WHERE id=$id;";
	
	$string_additive = '';
	foreach($additive as $current)
		$string_additive = $string_additive . $current;

	return $string_additive;
}
?>