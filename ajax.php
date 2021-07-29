<?php
require_once 'config.php';
if($_POST['type'] == 'country_table'){
	$row_num = $_POST['row_num'];
	$name = $_POST['name_startsWith'];
	$query = "SELECT * FROM items where item_section='S' and item_name LIKE '%".strtoupper($name)."%'";
	$result = mysqli_query($con, $query);
	$data = array();
	while ($row = mysqli_fetch_assoc($result)) {
	$name = $row['item_name'].'|'.$row['item_id'].'|'.$row['curr_bp'].'|'.$row['item_code'].'|'.$row_num;
		array_push($data, $name);	
	}	
	echo json_encode($data);
}

?>