<?php
#include connection
include ('includes/session.php');
include('Connections/fundmaster.php');
$order_code=mysql_real_escape_string($_POST['order_code']);

$queryprof="select * from stock_transfer where stock_transfer_id='$order_code'";
$resultsprof=mysql_query($queryprof) or die ("Error: $queryprof.".mysql_error());								  
$rowsprof=mysql_fetch_object($resultsprof);
$date_from=$rowsprof->transfer_date;
$incharge=$rowsprof->shop_id;
//$date_from=$rowsprof->date_generated;



//$booking_id=mysql_real_escape_string($_POST['booking_id']);
$part_id=mysql_real_escape_string($_POST['part_id']);

$query11="select * from products where product_id='$part_id'";
$results11=mysql_query($query11) or die ("Error: $query11.".mysql_error());
$rows11=mysql_fetch_object($results11);

$product_name=$rows11->product_name;
$pack_size=$rows11->pack_size;

$quantity=mysql_real_escape_string($_POST['item_quantity']);
$price=mysql_real_escape_string($_POST['price']);

$purchase_cost=$price*$quantity;
 
$sql= "insert into stock_transfer_items values('','$order_code','$part_id','$quantity','$date_from','0',NOW(),'$user_id','$incharge')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


/*
$sql3="INSERT INTO received_stock VALUES('','$order_code', '$part_id','$quantity','$currency','$curr_rate','$date_from',
'$expiry_date','1',NOW())";
$results3=mysql_query($sql3) or die ("Error $sql3.".mysql_error());


$querylatelpo="select * from purchase_order order by purchase_order_id desc limit 1";
$resultslatelpo=mysql_query($querylatelpo) or die ("Error: $querylatelpo.".mysql_error());
$rowslatelpo=mysql_fetch_object($resultslatelpo);

$latest_pr_id=$rowslatelpo->purchase_order_id;



 $sqlaccpay="insert into inventory_ledger values('','Direct order $quantity $product_name ($pack_size)','$purchase_cost','$purchase_cost','','$currency','$curr_rate',NOW(),'dro$latest_pr_id')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());

$sqltrans= "insert into item_transactions values('','$part_id','Direct Order $quantity $product_name ($pack_size)','$quantity',NOW(),'dro$latest_pr_id','')";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error()); */

$sqlauditsav= "insert into audit_trails values('','$user_id',NOW(),'Added more stock transfer items into the system')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());

header ("Location:begin_stock_transfer.php?order_code=$order_code&addpartconfirm=1");




mysql_close($cnn);

?>


