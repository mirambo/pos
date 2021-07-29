<?php
#include connection
include ('includes/session.php');
include('Connections/fundmaster.php');

$id=$_GET['transport_charges_id'];

$sql= "delete from transport_charges where transport_charges_id='$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sql= "delete from shippers_transactions where order_code='tcp$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sql= "delete from cash_ledger where sales_code='tcp$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sql= "delete from accounts_payables_ledger where order_code='tcp$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sql= "delete from bank_ledger where sales_code='tcp$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sql= "delete from bank_statement where sales_code='tcp$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'Deleted transport payments details')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());





header ("Location:view_transport_payments.php? deleteconfirm=1");






mysql_close($cnn);


?>


