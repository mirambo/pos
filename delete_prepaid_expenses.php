<?php
#include connection
include ('includes/session.php');
include('Connections/fundmaster.php');

$id=$_GET['prepaid_expenses_id'];

$sql= "delete from prepaid_expenses where prepaid_expenses_id='$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

//$sql= "delete from shippers_transactions where transaction_code='tcp$id'";
//$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sql= "delete from cash_ledger where sales_code='prepexp$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sql= "delete from prepaid_expenses_ledger where order_code='prepexp$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sql= "delete from bank_ledger where sales_code='prepexp$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sql= "delete from bank_statement where sales_code='prepexp$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'Deleted expenses payments details')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());





header ("Location:view_prepaid_expenses.php? deleteconfirm=1");






mysql_close($cnn);


?>


