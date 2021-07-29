<?php
#include connection
include('Connections/fundmaster.php');
include('includes/session.php');
session_start(); 
$received_order_code_id=$_SESSION['received_order_code_id'];
$prod=mysql_real_escape_string($_POST['prod']);
$qnty_rec=mysql_real_escape_string($_POST['qnty_rec']);
$unit=mysql_real_escape_string($_POST['unit']);



$sql3="INSERT INTO received_stock VALUES('', '$received_order_code_id','$prod','$qnty_rec','$unit','1',NOW())";
$results3= mysql_query($sql3) or die ("Error $sql3.".mysql_error());



$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'Received products into the warehouse')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());

header ("Location:receive_stock2.php");



mysql_close($cnn);


?>


