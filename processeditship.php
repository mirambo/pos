<?php
include('Connections/fundmaster.php');
require_once('includes/session.php'); 
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$agent_name=mysql_real_escape_string($_POST['agent_name']);
$address=mysql_real_escape_string($_POST['address']);
$town=mysql_real_escape_string($_POST['town']);
$phone=mysql_real_escape_string($_POST['phone']);
$email=mysql_real_escape_string($_POST['email']);

$id=$_GET['shipper_id'];

$sql= "update shippers set shipper_name='$agent_name', address='$address',town='$town',phone='$phone',email='$email' where shipper_id='$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'edited shipper details for $agent_name')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());



header ("Location:edit_ship.php?shipper_id=$id&updateconfirm=1");

mysql_close($cnn);


?>