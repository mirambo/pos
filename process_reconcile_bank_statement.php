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
$balance=mysql_real_escape_string($_POST['balance']);
$currency=mysql_real_escape_string($_POST['currency']);

$queryprod="select * from currency where curr_id='$currency'";
$resultsprod=mysql_query($queryprod) or die ("Error: $queryprod.".mysql_error());
$rowsprod=mysql_fetch_object($resultsprod);
$curr_rate=$rowsprod->curr_rate;

$out_balance=$balance*$curr_rate;

header ("Location:reconcile_bank_balance.php?bank_id=$bank&date_from=$date_from&date_to=$date_to&date_done=$date_done&out_balance=$out_balance&currency=$currency&curr_rate=$curr_rate");

mysql_close($cnn);


?>


