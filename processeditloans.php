<?php
include('Connections/fundmaster.php');
require_once('includes/session.php'); 
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$loan_type=mysql_real_escape_string($_POST['loan_type']);
$loan_amount=mysql_real_escape_string($_POST['loan_amount']);


$id=$_GET['loan_id'];



$sql= "update loans set loan_name='$loan_type', default_amount='$loan_amount' where loan_id='$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'edited loan type $loan_type')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());



header ("Location:edit_loan_type.php?loan_id=$id&updateconfirm=1");

mysql_close($cnn);


?>