<?php
#include connection
include ('includes/session.php');
include('Connections/fundmaster.php');

$id=$_GET['invoice_payment_id'];
$cr_transaction_code="crclntpay".$id;
$dr_transaction_code="drclntpay".$id;

$approve=$_GET['approve'];

$sqlsp="select * FROM suppliers,mop,supplier_payments,currency where supplier_payments.mop=mop.mop_id and supplier_payments.supplier_id=suppliers.supplier_id and supplier_payments.currency_code=currency.curr_id AND supplier_payment_id='$id'";
$resultssp= mysql_query($sqlsp) or die ("Error $sqlsp.".mysql_error());
$rowsp=mysql_fetch_object($resultssp);
$client=$rowsp->supplier_name;

$sales_code_id=$rowsp->order_code_id;

$sql= "delete from supplier_payments where supplier_payment_id='$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


$sql= "delete from supplier_transactions where transaction_code='suppay$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


$sql= "delete from chart_transactions where transaction_code='$cr_transaction_code'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());



$sql= "delete from chart_transactions where transaction_code='$dr_transaction_code'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'Deleted supplier payment/Client Payments made to $client')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());


header ("Location:view_stock_payments.php?deleteconfirm=1&approve=$approve");




mysql_close($cnn);


?>


