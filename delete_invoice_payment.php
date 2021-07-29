<?php
#include connection
include ('includes/session.php');
include('Connections/fundmaster.php');

$id=$_GET['invoice_payment_id'];
$cr_transaction_code="crclntpay".$id;
$dr_transaction_code="drclntpay".$id;

$approve=$_GET['approve'];

$sqlsp="select * FROM customer,mop,invoice_payments,
currency where invoice_payments.mop=mop.mop_id and invoice_payments.customer_id=customer.customer_id  
AND  invoice_payments.currency_code=currency.curr_id AND invoice_payments.invoice_payment_id='$id'";
$resultssp= mysql_query($sqlsp) or die ("Error $sqlsp.".mysql_error());
$rowsp=mysql_fetch_object($resultssp);
$client=$rowsp->customer_name;

$sales_code_id=$rowsp->sales_id;

$sql= "delete from invoice_payments where invoice_payment_id='$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


$sql= "delete from customer_transactions where transaction_code='clntpay$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


$sql= "delete from chart_transactions where transaction_code='$cr_transaction_code'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());



$sql= "delete from chart_transactions where transaction_code='$dr_transaction_code'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());










$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'Deleted Invoice payment/Client Payments received from $client')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());


header ("Location:view_invoice_payments.php?deleteconfirm=1&approve=$approve");




mysql_close($cnn);


?>


