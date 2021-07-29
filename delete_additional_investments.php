<?php
#include connection
include ('includes/session.php');
include('Connections/fundmaster.php');

$id=$_GET['additional_investments_id'];


$sql= "delete from additional_investments where additional_investments_id='$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sql= "delete from shareholder_transactions where order_code='addinv$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sql= "delete from cash_ledger where sales_code='addinv$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sql= "delete from bank_ledger where sales_code='addinv$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sql= "delete from bank_statement where sales_code='addinv$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sql= "delete from shares_ledger where order_code='addinv$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'Deleted Additional Investments')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());


header ("Location:view_additional_investments.php? deleteconfirm=1");






mysql_close($cnn);


?>


