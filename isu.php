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
	$bdditive[] = '';
	
	$arrayi = func_get_args()[1];
	
	foreach ($arrayi as $current_key => $current_val){
		$additive[] = '`' . $current_key . '`';
		$additive[] = ',';
		
		$bdditive[] = "'" . $current_val . "'";
		$bdditive[] = ',';
	}
	array_pop ($additive);
	array_pop ($bdditive);
	
	$additive[] = ') VALUES (';	
	$bdditive[] = ');';
	
	$string_additive = '';
	
	foreach($additive as $current)
		$string_additive = $string_additive . $current;
	
	foreach($bdditive as $current)
		$string_additive = $string_additive . $current;
	
	return $string_additive;
}

//UPDATE
function void_update(){
	$additive[] = "UPDATE `" . func_get_args()[0] . "` SET ";
	 
	$id = func_get_args()[1];
	$arrayu = func_get_args()[2];
	foreach ($arrayu as $current_key => $current_val){
		$additive[] = "`" . $current_key . "`='" . $current_val . "'";
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