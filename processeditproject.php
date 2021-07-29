<?php
include('Connections/fundmaster.php');
require_once('includes/session.php'); 
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$operation=mysql_real_escape_string($_POST['operation']);
$client=mysql_real_escape_string($_POST['client']);
$period_from=mysql_real_escape_string($_POST['period_from']);
$period_to=mysql_real_escape_string($_POST['period_to']);
$contract_no=mysql_real_escape_string($_POST['contract_no']);

$project_id=$_GET['project_id']; 

$sql= "update projects set 
operation_id='$operation',
client_id='$client',
period_from='$period_from',
period_to='$period_to', 
contract_no='$contract_no'

where project_id='$project_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


$sqlauditsav= "insert into audit_trails values('','$user_id',NOW(),'Updated Project Details')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());


header ("Location:home.php?editproject=editproject&project_id=$project_id&updateconfirm=1");


mysql_close($cnn);


?>