<?php
include('Connections/fundmaster.php');
require_once('includes/session.php'); 
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$accounting_term=mysql_real_escape_string($_POST['accounting_term']);
$term_desc=mysql_real_escape_string($_POST['term_desc']);

$id=$_GET['terminology_id'];

$sql= "update accounting_terminologies set terminology_name='$accounting_term', terminology_desc='$term_desc' where terminology_id='$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'edited accounting terminologies details for $accounting_term')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());


header ("Location:edit_account_term.php?terminology_id=$id&updateconfirm=1");


mysql_close($cnn);


?>