<?php
include('Connections/fundmaster.php');
include('includes/session.php');
$purchase_order_id=$_GET['purchase_order_id'];
$supplier_id=$_GET['supplier_id'];
$qnty_expired=$_GET['qnty_expired'];
$product_id=$_GET['product_id'];


$sql="insert into expired_stock values('','$product_id','$purchase_order_id','$supplier_id','$qnty_expired',NOW())";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

header ("Location:view_prod_condition.php? addexpconfirm=1");



 ?>
