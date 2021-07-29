<?php
require_once('includes/session.php'); 
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$major_term=mysql_real_escape_string($_POST['major_term']);
$minor_term=mysql_real_escape_string($_POST['minor_term']);

$id=$_GET['minor_terminology_id'];

$sql= "update minor_terminologies set terminology_id='$major_term', minor_terminology_name='$minor_term' where minor_terminology_id='$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'edited Minor accounting terminologies details for $accounting_term')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());


header ("Location:edit_account_term_category.php?minor_terminology_id=$id&updateconfirm=1");


mysql_close($cnn);


?>