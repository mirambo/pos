<?php
include('Connections/fundmaster.php');
require_once('includes/session.php'); 
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$benefit_name=mysql_real_escape_string($_POST['benefit_name']);
$benefit_amount=mysql_real_escape_string($_POST['benefit_amount']);


$id=$_GET['benefit_id'];



$sql= "update benefits set benefit_name='$benefit_name',benefit_amount='$benefit_amount' where benefit_id='$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'edited benefits $benefit_name')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());



header ("Location:edit_benefits.php?benefit_id=$id&updateconfirm=1");

mysql_close($cnn);


?>


