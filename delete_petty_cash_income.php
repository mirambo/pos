<?php
#include connection
include ('includes/session.php');
include('Connections/fundmaster.php');

$id=$_GET['petty_cash_income_id'];

$sql= "delete from petty_cash_income where petty_cash_income_id='$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sql= "delete from petty_cash_ledger where order_code='petinc$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sql= "delete from cash_ledger where sales_code='petinc$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sql= "delete from misc_expenses_ledger where order_code='petinc$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());




$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'Deleted petty cash income')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());





header ("Location:view_petty_cash_income.php? deleteconfirm=1");






mysql_close($cnn);


?>


