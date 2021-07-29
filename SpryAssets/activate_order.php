<?php
#include connection
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$lpo_id=$_GET['lpo_id'];
$order_code=$_GET['order_code'];


$querycancel="UPDATE lpo set status='1' where lpo_id='$lpo_id'";
$resultscancel=mysql_query($querycancel) or die ("Error: $querycancel.".mysql_error());

$querycancelprod="UPDATE purchase_order set status='1' where order_code='$order_code'";
$resultscancelprod=mysql_query($querycancelprod) or die ("Error: $querycancelprod.".mysql_error());
								  

header ("Location:confirmed_orders.php? activateorderconfirm=1");






mysql_close($cnn);


?>


