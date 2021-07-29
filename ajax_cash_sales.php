<?php
/*
Site : http:www.smarttutorials.net
Author :muni
*/
require_once 'config2.php';
if($_POST['type'] == 'country_table')
{
	$row_num = $_POST['row_num'];
	$name = $_POST['name_startsWith'];
	$query = "SELECT * FROM items WHERE item_section='I' AND item_name LIKE '%".strtoupper($name)."%'";
	$result = mysqli_query($con, $query);
	$data = array();
	while ($row = mysqli_fetch_assoc($result)) {
	$name = $row['item_name'].'|'.$row['item_id'].'|'.$row['curr_sp'].'|'.$row['item_code'].'|'.$row_num;
		array_push($data, $name);	
	}	
	echo json_encode($data);
}


if($_POST['type'] == 'country_table2')
{
	$row_num = $_POST['row_num'];
	$name = $_POST['name_startsWith'];
	$query = "SELECT * FROM accounts where account_name LIKE '%".strtoupper($name)."%'";
	$result = mysqli_query($con, $query);
	$data = array();
	while ($row = mysqli_fetch_assoc($result)) {
	$name = $row['account_name'].$row_num;
		array_push($data, $name);	
	}	
	echo json_encode($data);
}


