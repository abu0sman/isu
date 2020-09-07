# isu
Insert, select, update string creator for SQL

void_reference_string() - функция, формирующая справочный запрос, для оформления страницы и паджинейшна.

	Использование функции выглядит так:
	$reference = void_reference_string('rp_objects', $key_value);
 
	На вход функции подается: 
	rp_objects - наименование таблицы БД.
	$key_value - ассоциативный массив, который содержит значения полей которые надо учитывать в запросе. 

void_select()
	Использование функции выглядит так: 
	$sql_select = void_select($query_reference, $pstart, $count_on_page);
	
	где:$query_reference - Это справочный запрос полученный на выходе из void_reference_string(),
		$pstart - Номер первой записи на странице
		$count_on_page - Желаемое количество записей отображаемых на странице


void_insert()
	Использование функции выглядит так:
	$sql_insert = void_insert($table, $keyz, $valuez);	
	
	где: $table - Название таблицы БД
	$keyz - массив ключей
	$valuez - массив значений
	
