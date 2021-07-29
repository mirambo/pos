<?php
include('Connections/fundmaster.php');
require_once('includes/session.php'); 
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$savings_type=mysql_real_escape_string($_POST['savings_type']);
$savings_amount=mysql_real_escape_string($_POST['savings_amount']);


$id=$_GET['savings_id'];



$sql= "update savings set savings_name='$savings_type', savings_amount='$savings_amount' where savings_id='$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'edited savings type $savings_type')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());



header ("Location:edit_savings.php?savings_id=$id&updateconfirm=1");

mysql_close($cnn);


?>