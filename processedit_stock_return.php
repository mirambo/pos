<?php
#include connection
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form

//Check redudancy
$purchase_order_id=$_GET['purchase_order_id'];

//$prod=mysql_real_escape_string($_POST['prod']);
$supplier_id=mysql_real_escape_string($_POST['supplier_id']);
$order_code=mysql_real_escape_string($_POST['order_code']);
$qnty_ret=mysql_real_escape_string($_POST['qnty_ret']);
$reason=mysql_real_escape_string($_POST['reason']);

$lpo_no=$_GET['lpo_no'];
$product_id=$_GET['product_id'];
$stock_returns_id=$_GET['stock_returns_id'];

$sql3="UPDATE stock_returns SET stock_return_quantity='$qnty_ret' ,reason='$reason' where stock_returns_id='$stock_returns_id'";
$results3= mysql_query($sql3) or die ("Error $sql3.".mysql_error());

$sql3="UPDATE temp_stock_returns SET stock_return_quantity='$qnty_ret' ,reason='$reason' where stock_returns_id='$stock_returns_id'";
$results3= mysql_query($sql3) or die ("Error $sql3.".mysql_error());

header ("Location:edit_return_stock.php?updateconfirm=1&lpo_no=$lpo_no&supplier_id=$supplier_id&order_code=$order_code&qnty_ordered=$qnty_orderedbck&purchase_order_id=$purchase_order_id&product_id=$product_id&stock_returns_id=$stock_returns_id");

//}

mysql_close($cnn);


?>


