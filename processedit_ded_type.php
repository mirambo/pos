<?php
include('Connections/fundmaster.php');
require_once('includes/session.php'); 
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$station_name=mysql_real_escape_string($_POST['station_name']);

$default_ded_amount=mysql_real_escape_string($_POST['default_ded_amount']);

$id=$_GET['deduction_type_id'];



$sql= "update deduction_logs set deduction_log_name='$station_name',default_deduction_amount='$default_ded_amount' where deduction_log_id='$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'Edited deduction type details')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());



header ("Location:edit_deduction_type.php?deduction_type_id=$id&updateconfirm=1");

mysql_close($cnn);


?>


