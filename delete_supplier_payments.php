<?php
#include connection
include ('includes/session.php');
include('Connections/fundmaster.php');

$id=$_GET['supplier_payments_id'];

$sqlsp="select * FROM mop,suppliers,supplier_payments,currency where 
supplier_payments.mop=mop.mop_id and supplier_payments.supplier_id=suppliers.supplier_id AND supplier_payments.currency_code=currency.curr_id
and  supplier_payments.supplier_payments_id='$id'";
$resultssp= mysql_query($sqlsp) or die ("Error $sqlsp.".mysql_error());
$rowsp=mysql_fetch_object($resultssp);
$supplier=$rowsp->supplier_name;



$sql= "delete from supplier_payments where supplier_payments_id='$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sql= "delete from supplier_transactions where order_code='supm$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sql= "delete from cash_ledger where sales_code='supm$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sql= "delete from accounts_payables_ledger where order_code='supm$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


$sql= "delete from bank_ledger where sales_code='supm$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sql= "delete from bank_statement where sales_code='supm$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'Deleted Supplier Payments Details made to $supplier')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());


header ("Location:view_stock_payments.php? deleteconfirm=1");






mysql_close($cnn);


?>


