<?php
#include connection
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$id=$_GET['custom_clearance_id'];
$desc=mysql_real_escape_string($_POST['desc']);
$amount=mysql_real_escape_string($_POST['amount']);
$currency=mysql_real_escape_string($_POST['currency']);
$mop=mysql_real_escape_string($_POST['mop']);

$querycr="select curr_rate from currency where curr_id='$currency'";
$resultscr=mysql_query($querycr) or die ("Error: $querycr.".mysql_error());							  
$rowscr=mysql_fetch_object($resultscr);
$curr_rate=$rowscr->curr_rate;


$sql= "update custom_clearance set description='$desc',curr_id='$currency',curr_rate='$curr_rate',amount='$amount',mop='$mop' where custom_clearance_id='$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sql= "update cash_ledger set amount='-$amount', credit='$amount' ,currency_code='$currency',curr_rate='$curr_rate' where transactions LIKE '%Cash Custom clearance Paid on $desc%'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sql= "update custom_clearance_ledger set amount='$amount', debit='$amount' ,currency_code='$currency',curr_rate='$curr_rate' where transactions LIKE '%$desc%'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'edited custom_clearance details by the description $desc')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());



header ("Location:edit_custom_clearance.php?updateconfirm=1&custom_clearance_id=$id");

								  


mysql_close($cnn);


?>


