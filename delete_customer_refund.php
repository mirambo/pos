<?php
#include connection
include('Connections/fundmaster.php');
include ('includes/session.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
//$updt_uname=mysql_real_escape_string($_POST['updt_uname']);
//$updt_pword=mysql_real_escape_string($_POST['updt_pword']);
$id=$_GET['supplier_refund_id'];
$expenses_desc=$_GET['expense_desc'];


$sql= "delete from customer_refund where customer_refund_id='$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sql= "delete from customer_transactions where transaction_code='srf$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sql= "delete from cash_ledger where sales_code='srf$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sql= "delete from accounts_receivables_ledger where sales_code='srf$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sql= "delete from bank_ledger where sales_code='srf$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sql= "delete from bank_statement where sales_code='srf$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'Deleted supplier refund payments details')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());

header ("Location:view_customer_refund.php? deleteconfirm=1");





mysql_close($cnn);


?>


