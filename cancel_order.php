<?php
#include connection
require_once('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form

$order_code=$_GET['order_code'];

$sqlrec="select order_code_get.lpo_no,order_code_get.shipper_id,order_code_get.lpo_no,order_code_get.supplier_id,order_code_get.order_code_id,order_code_get.freight_charge,order_code_get.comments,
order_code_get.currency,order_code_get.curr_rate,currency.curr_name,mop.mop_name,shippers.shipper_name,order_code_get.supplier_id,suppliers.supplier_name
FROM mop,shippers,currency,suppliers,order_code_get WHERE order_code_get.mop_id=mop.mop_id AND shippers.shipper_id=order_code_get.shipper_id AND 
order_code_get.currency=currency.curr_id AND order_code_get.supplier_id=suppliers.supplier_id AND order_code_get.order_code_id='$order_code'";
$resultsrec= mysql_query($sqlrec) or die ("Error $sqlrec.".mysql_error());	
$rowsrec=mysql_fetch_object($resultsrec);

$lpo_no=$rowsrec->lpo_no;
$currency=$rowsrec->currency;
$curr_rate=$rowsrec->curr_rate;
$supplier_id=$rowsrec->supplier_id;

$sqlspm="select * from supplier_transactions where order_code='po$order_code'";
$resultsspm= mysql_query($sqlspm) or die ("Error $sqlspm.".mysql_error());
$rowsspm=mysql_fetch_object($resultsspm);	
	
echo number_format($grndttl_lpo=$rowsspm->amount,2);


$reasons=mysql_real_escape_string($_POST['reasons']);

$sql= "insert into cancelled_lpo values('','$lpo_no','$order_code','$reasons','0')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


$querycancelprod="UPDATE purchase_order set status='1' where order_code='$order_code'";
$resultscancelprod=mysql_query($querycancelprod) or die ("Error: $querycancelprod.".mysql_error());

$querycancelprod="UPDATE order_code_get set status='1' where order_code_id='$order_code'";
$resultscancelprod=mysql_query($querycancelprod) or die ("Error: $querycancelprod.".mysql_error());




$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'Canceled Purchase Order $lpo_no')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());



header ("Location:home.php?post_farmers_order");






mysql_close($cnn);


?>


