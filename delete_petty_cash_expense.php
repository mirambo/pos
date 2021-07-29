<?php
#include connection
include ('includes/session.php');
include('Connections/fundmaster.php');

$id=$_GET['petty_cash_expense_id'];

$sql= "delete from petty_cash_expense where petty_cash_expense_id='$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sql= "delete from petty_cash_ledger where order_code='petexp$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());




$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'Deleted petty cash expenses')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());





header ("Location:view_petty_cash_expenses.php? deleteconfirm=1");






mysql_close($cnn);


?>


