<?php
#include connection
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$id=$_GET['petty_cash_income_id'];
$desc=mysql_real_escape_string($_POST['desc']);
$amount=mysql_real_escape_string($_POST['amount']);



$sql= "update petty_cash_income set description='$desc', amount='$amount' where petty_cash_income_id='$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sql= "update cash_ledger set amount='-$amount', credit='$amount'  where sales_code='petinc$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sql= "update misc_expenses_ledger set amount='$amount', debit='$amount'  where order_code='petinc$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sql= "update petty_cash_ledger set money_out='$amount',transactions='$desc' where order_code='petinc$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'Edited petty cash income $desc')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());



header ("Location:edit_petty_cash_income.php?updateconfirm=1&petty_cash_income_id=$id");

								  


mysql_close($cnn);


?>


