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


$sql= "delete from purchase_returns_items where purchase_returns_items_id='$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sql= "delete from inventory_ledger where order_code='prt$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sql= "delete from item_transactions where transaction_code='prt$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'Deleted a purchase return item transaction')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());




header ("Location:record_purchase_returns.php?order_code=$order_code");





mysql_close($cnn);


?>


