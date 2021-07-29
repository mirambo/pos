<?php
include('Connections/fundmaster.php');
require_once('includes/session.php'); 
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$account=mysql_real_escape_string($_POST['account']);
$client=mysql_real_escape_string($_POST['client']);
$amount=mysql_real_escape_string($_POST['amount']);

$id=$_GET['opening_balance_id'];

$sql= "update inventory_ledger set amount='$account', client_id='$client',amount='$amount' where opening_balance_id='$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'edited opening balance details for details for $account')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());


header ("Location:edit_opening_balance.php?opening_balance_id=$id&updateconfirm=1");


mysql_close($cnn);


?>