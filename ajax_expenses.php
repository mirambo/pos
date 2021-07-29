<?php
/*
Site : http:www.smarttutorials.net
Author :muni
*/
require_once 'config2.php';
if($_POST['type'] == 'country_table'){
	$row_num = $_POST['row_num'];
	$name = $_POST['name_startsWith'];
	$query = "SELECT * FROM account_type where (account_type_name LIKE '%".strtoupper($name)."%' OR account_code LIKE '%".strtoupper($name)."%')";
	$result = mysqli_query($con, $query);
	$data = array();
	while ($row = mysqli_fetch_assoc($result)) {
	$name = $row['account_code'].' - '.$row['account_type_name'].'|'.$row['account_type_id'].'|'.$row['curr_sp'].'|'.$row['item_code'].'|'.$row_num;
		array_push($data, $name);	
	}	
	echo json_encode($data);
}


