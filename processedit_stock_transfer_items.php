<?php
require_once('includes/session.php'); 
include('Connections/fundmaster.php');

#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$order_code=$_GET['order_code'];
$view=$_GET['view'];
$id=$_GET['purchase_order_id'];
$prod=mysql_real_escape_string($_POST['prod']);
$description=mysql_real_escape_string($_POST['description']);
$foc=mysql_real_escape_string($_POST['foc']);
$qnty=mysql_real_escape_string($_POST['qnty']);
$vend_price=mysql_real_escape_string($_POST['vend_price']);


$queryprof="select * from sales_returns where sales_returns_id='$order_code'";
$resultsprof=mysql_query($queryprof) or die ("Error: $queryprof.".mysql_error());								  
$rowsprof=mysql_fetch_object($resultsprof);
$currency=$rowsprof->currency;
$curr_rate=$rowsprof->curr_rate;

$query11="select * from products where product_id='$prod'";
$results11=mysql_query($query11) or die ("Error: $query11.".mysql_error());
$rows11=mysql_fetch_object($results11);

$product_name=$rows11->product_name;
$pack_size=$rows11->pack_size;



$grndttl=$qnty*$vend_price;


$sql1= "update stock_transfer_items set item_id='$prod',
transfer_quantity='$qnty' where stock_transfer_item_id='$id'";
$results1= mysql_query($sql1) or die ("Error $sql1.".mysql_error());


$trans="Sales returns $product_name ($pack_size)";


/* $sqlupd="UPDATE inventory_ledger SET amount='$grndttl',debit='$grndttl',currency_code='$currency',curr_rate='$curr_rate' WHERE order_code='srt$id'";
$resultsupd=mysql_query($sqlupd) or die ("Error $sqlupd.".mysql_error());

$sqlupd="UPDATE item_transactions SET transaction='$trans', quantity='$qnty' WHERE transaction_code='srt$id'";
$resultsupd=mysql_query($sqlupd) or die ("Error $sqlupd.".mysql_error()); */


$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'Updates Stock Transfer Items Transactions')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());




header ("Location:begin_stock_transfer.php?order_code=$order_code");


mysql_close($cnn);



?>


