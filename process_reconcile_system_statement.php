<?php
#include connection
include('Connections/fundmaster.php');
include('includes/session.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$bank=mysql_real_escape_string($_POST['bank']);
$date_from=mysql_real_escape_string($_POST['date_from']);
$date_to=mysql_real_escape_string($_POST['date_to']);
$date_done=date('Y-m-d');

$queryprod="insert into reconciliation_code value ('')";
$resultsprod=mysql_query($queryprod) or die ("Error: $queryprod.".mysql_error());


$query="select * from reconciliation_code order by reconciliation_code_id desc limit 1";
$results=mysql_query($query) or die ("Error: $query.".mysql_error());
$rows=mysql_fetch_object($results);
$rec_id=$rows->reconciliation_code_id;

//include ('cum_system_bank_balance.php');

header ("Location:reconcile_system_balance.php?bank_id=$bank&date_from=$date_from&date_to=$date_to&rec_id=$rec_id");

mysql_close($cnn);


?>


