<?php
include('Connections/fundmaster.php');
require_once('includes/session.php'); 
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$station_name=mysql_real_escape_string($_POST['station_name']);
$default_ben_amount=mysql_real_escape_string($_POST['default_ben_amount']);

$id=$_GET['benefit_type_id'];



$sql= "update benefit_logs set benefit_log_name='$station_name',default_benefit_amount='$default_ben_amount' where benefit_log_id='$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'Edited benefit type details')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());



header ("Location:edit_benefit_type.php?benefit_type_id=$id&updateconfirm=1");

mysql_close($cnn);


?>


