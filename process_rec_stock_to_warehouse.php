<?php
#include connection
include('Connections/fundmaster.php');
include('includes/session.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form

//Check redudancy
$prod=mysql_real_escape_string($_POST['prod']);
$supplier_id=mysql_real_escape_string($_POST['supplier_id']);
$order_code_id=$_GET['order_code_id'];
$qnty_rec=mysql_real_escape_string($_POST['qnty_rec']);
$delivery_date=mysql_real_escape_string($_POST['delivery_date']);
$expiry_date=mysql_real_escape_string($_POST['expiry_date']);

$sqlredx="select order_code_get.lpo_no,order_code_get.currency,order_code_get.curr_rate,purchase_order.purchase_order_id,purchase_order.quantity,purchase_order.description,
purchase_order.order_code,purchase_order.product_id,purchase_order.vendor_prc,products.product_name,products.prod_code,products.pack_size 
FROM purchase_order,products,order_code_get WHERE purchase_order.order_code=order_code_get.order_code_id AND purchase_order.product_id=products.product_id AND purchase_order.product_id='$prod' 
AND purchase_order.order_code='$order_code_id'";
$resultsredx= mysql_query($sqlredx) or die ("Error $sqlredx.".mysql_error());
$rowsredx=mysql_fetch_object($resultsredx);
$lpo_no=$rowsredx->lpo_no;
$purchase_order_id=$rowsredx->purchase_order_id;
$qnty_ordered=$rowsredx->quantity;


$sqlredx="select order_code_get.lpo_no,order_code_get.currency,order_code_get.curr_rate,purchase_order.purchase_order_id,purchase_order.quantity,purchase_order.description,
purchase_order.order_code,purchase_order.product_id,purchase_order.vendor_prc,products.product_name,products.prod_code,products.pack_size 
FROM purchase_order,products,order_code_get WHERE purchase_order.order_code=order_code_get.order_code_id AND purchase_order.product_id=products.product_id AND purchase_order.product_id='$prod' 
AND purchase_order.order_code='$order_code_id'";
$resultsredx= mysql_query($sqlredx) or die ("Error $sqlredx.".mysql_error());
$rowsredx=mysql_fetch_object($resultsredx);
$lpo_no=$rowsredx->lpo_no;
$purchase_order_id=$rowsredx->purchase_order_id;
$qnty_ordered=$rowsredx->quantity;
$curr_rate=$rowsredx->curr_rate;
$currency=$rowsredx->currency;


//vendor price at point of order
$sqlvp="select purchase_order.purchase_order_id,purchase_order.quantity,purchase_order.vendor_prc,purchase_order.vendor_prc,purchase_order.description,
purchase_order.order_code,purchase_order.product_id,products.product_name,products.prod_code,products.pack_size FROM purchase_order,products 
WHERE purchase_order.product_id=products.product_id AND purchase_order.order_code='$order_code_id' AND purchase_order.product_id='$prod'";
$resultsvp= mysql_query($sqlvp) or die ("Error $sqlvp.".mysql_error());
$rowsvp=mysql_fetch_object($resultsvp);
$vendor_prc=$rowsvp->vendor_prc;




$query11="select * from products where product_id='$prod'";
$results11=mysql_query($query11) or die ("Error: $query11.".mysql_error());
$rows11=mysql_fetch_object($results11);

$product_name=$rows11->product_name;
$pack_size=$rows11->pack_size;
//$vendor_prc=$rows11->curr_bp;
//$currency=$rows11->currency_code;
//$curr_rate=$rows11->exchange_rate;
$purchase_cost=$vendor_prc*$qnty_rec;


//redudancy
$queryred="select * from received_stock where product_id='$prod' and order_code_id='$order_code_id'";
$resultsred=mysql_query($queryred) or die ("Error: $queryred.".mysql_error());
$rowsred=mysql_num_rows($resultsred);
/*
if ($rowsred>0)
{
header ("Location:receive_stock_to_warehouse.php?exist=1&order_code_id=$order_code_id&qnty_ordered=$qnty_ordered");

}*/

if($qnty_ordered<$qnty_rec)
{
header ("Location:receive_stock_to_warehouse.php?abnormal=1&order_code_id=$order_code_id&qnty_ordered=$qnty_ordered");
}

else
{
$sql3="INSERT INTO received_stock VALUES('','$order_code_id', '$prod','$qnty_rec','$currency','$curr_rate','$delivery_date',
'$expiry_date','1',NOW())";
$results3=mysql_query($sql3) or die ("Error $sql3.".mysql_error());


$querylatelpo="select * from received_stock order by received_stock_id desc limit 1";
$resultslatelpo=mysql_query($querylatelpo) or die ("Error: $querylatelpo.".mysql_error());
$rowslatelpo=mysql_fetch_object($resultslatelpo);

$latest_received_stock_id=$rowslatelpo->received_stock_id;


$sqlaccpay="insert into inventory_ledger values('','Received $qnty_rec $product_name ($pack_size) into the warehouse','$purchase_cost','$purchase_cost','','$currency','$curr_rate',NOW(),'recp$latest_received_stock_id')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());

$sqltrans= "insert into item_transactions values('','$prod','Received $qnty_rec $product_name ($pack_size) of LPO No: $lpo_no into the warehouse','$qnty_rec',NOW(),'recp$latest_received_stock_id','')";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());

$sqlaccpay= "insert into pending_purchases_ledger values('','Received $qnty_rec $product_name ($pack_size) into the warehouse','-$purchase_cost','','$purchase_cost','$currency','$curr_rate',NOW(),'recp$latest_received_stock_id')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());

$sqlaccpay= "insert into purchases_ledger values('','Received $qnty_rec $product_name ($pack_size) into the warehouse','$purchase_cost','$purchase_cost','','$currency','$curr_rate',NOW(),'recp$latest_received_stock_id')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());


$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'Received $qnty_rec $product_name ($pack_size) into the warehous')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());

//header ("Location:receive_stock_to_warehouse.php?success=1&order_code_id=$order_code_id&qnty_ordered=$qnty_ordered");
?>
<script type="text/javascript">
alert('Record Saved successfuly');
//window.location = "begin_order.php";
window.location = "<?php echo $_SERVER['HTTP_REFERER']; ?>";
</script>
<?php

}

mysql_close($cnn);


?>


