<?php
#include connection
require_once('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
//$updt_uname=mysql_real_escape_string($_POST['updt_uname']);
//$updt_pword=mysql_real_escape_string($_POST['updt_pword']);
$id=$_GET['purchase_order_id'];
$order_code=$_GET['order_code'];
$view=$_GET['view'];

$querylatelpo="select * from purchase_order where purchase_order_id='$id'";
$resultslatelpo=mysql_query($querylatelpo) or die ("Error: $querylatelpo.".mysql_error());
$rowslatelpo=mysql_fetch_object($resultslatelpo);

$prod=$rowslatelpo->product_id;



$sql= "delete from purchase_order where purchase_order_id='$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sql= "delete from received_stock where order_code_id='$order_code' and product_id='$prod'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sql= "delete from item_transactions where transaction_code='dro$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sql= "delete from inventory_ledger where order_code='dro$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());






$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'Deleted a direct purchase order item transaction')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());




header ("Location:begin_invoice.php?order_code=$order_code");





mysql_close($cnn);


?>


