<?php
include('Connections/fundmaster.php');
require_once('includes/session.php'); 
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$order_code=mysql_real_escape_string($_POST['order_code']);
$received_stock_id=mysql_real_escape_string($_POST['received_stock_id']);
$advance_margin=mysql_real_escape_string($_POST['advance_margin']);
$item_id=mysql_real_escape_string($_POST['item_id']);






$id=$_GET['curr_id'];



$sql= "update received_stock SET advance_margin='$advance_margin' where received_stock_id='$received_stock_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'edited advance margin')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());



header ("Location:receive_stock_to_warehouse.php?success=1&order_code_id=$order_code");



mysql_close($cnn);


?>


