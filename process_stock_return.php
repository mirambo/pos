<?php
#include connection
include('includes/session.php');
include('Connections/fundmaster.php');

/*$sqltrunc = "DELETE FROM temp_stock_returns";
$resultstrunc=mysql_query($sqltrunc) or die ("Error: $sqltrunc.".mysql_error());*/

$qnty_ret=mysql_real_escape_string($_POST['qnty_ret']);
$lpo_no=mysql_real_escape_string($_POST['lpo_no']);
$qnty_ordered=mysql_real_escape_string($_POST['qnty_ordered']);
$product_id=mysql_real_escape_string($_POST['prod']);
$order_code=mysql_real_escape_string($_POST['order_code']);
//$amount_paid=mysql_real_escape_string($_POST['amount_paid']);
$reason=mysql_real_escape_string($_POST['reason']);
$amount_paid=$_GET['amount_paid'];

//check redudnacy

$sql33="SELECT * from stockreturns_code_gen where order_code='$order_code'";
$results33= mysql_query($sql33) or die ("Error $sql33.".mysql_error());
$numrows33=mysql_num_rows($results33);

if ($numrows33>0)
{

$sql6="SELECT * from stockreturns_code_gen order by stockreturn_code_gen_id  desc limit 1";
$results6= mysql_query($sql6) or die ("Error $sql6.".mysql_error());
$rows6=mysql_fetch_object($results6);

$lat_code=$rows6->stockreturn_code_gen_id;

}
else
{


$sql="INSERT INTO stockreturns_code_gen VALUES ('','$order_code') ";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


$sql6="SELECT * from stockreturns_code_gen order by stockreturn_code_gen_id  desc limit 1";
$results6= mysql_query($sql6) or die ("Error $sql6.".mysql_error());
$rows6=mysql_fetch_object($results6);

$lat_code=$rows6->stockreturn_code_gen_id;

}



$sql1="select products.product_name,products.pack_size,products.prod_code,received_stock.quantity_rec,
received_stock.product_id from products,received_stock where received_stock.product_id=products.product_id 
and received_stock.order_code_id='$order_code' AND received_stock.product_id='$product_id'";
$results1= mysql_query($sql1) or die ("Error $sql1.".mysql_error());
$rows1=mysql_fetch_object($results1);

$product_code=$rows1->product_code;
$product_name=$rows1->product_name;
$purchase_order_id=$rows1->purchase_order_id;
$vendor_price=$rows1->vendor_prc;
$currency=$rows1->currency_code;
$supplier_id=$rows1->supplier_id;
$quant_ordered=$rows1->quantity_rec;


$sqlcurr="select * from currency where curr_id='$currency'";
$resultscurr= mysql_query($sqlcurr) or die ("Error $sqlcurr.".mysql_error());
$rowcurr=mysql_fetch_object($resultscurr);
$curr_name=$rowcurr->curr_name;

$curr_rate=$rowcurr->curr_rate;

//check greater



//check redudancy
$sqlred="SELECT * from 	stock_returns where purchase_order_id='$purchase_order_id' and product_id='$product_id' AND supplier_id='$supplier_id' AND order_code='$order_code' 
and purchase_order_id='$purchase_order_id' and vendor_price='$vendor_price' and stock_return_quantity='$qnty_ret'";
$resultsred= mysql_query($sqlred) or die ("Error $sqlred.".mysql_error());

$rowsred=mysql_num_rows($resultsred);
if ($rowsred>20000)
{
header ("Location:return_stock.php?exist=1&lpo_no=$lpo_no&supplier_id=$supplier_id&order_code=$order_code&qnty_ordered=$qnty_ordered&currency=$currency&print=1&stock_return_code=$lat_code&amount_paid=$amount_paid");
}

elseif ($qnty_ret>$quant_ordered)
{
header ("Location:return_stock.php?abnormal=1&lpo_no=$lpo_no&supplier_id=$supplier_id&order_code=$order_code&qnty_ordered=$qnty_ordered&currency=$currency&print=1&stock_return_code=$lat_code&amount_paid=$amount_paid");


}
else
{


$sql3="INSERT INTO stock_returns VALUES('','$product_code','$purchase_order_id',' $product_id','$vendor_price','$currency','$curr_rate','$supplier_id','$lat_code','$order_code','$user_id','$qnty_ret','$reason',NOW())";
$results3= mysql_query($sql3) or die ("Error $sql3.".mysql_error());

$sqlupd="select stock_returns_id from stock_returns order by stock_returns_id desc limit 1";
$resultsupd= mysql_query($sqlupd) or die ("Error $sqlupd.".mysql_error());
$rowsupd=mysql_fetch_object($resultsupd);
$stock_returns_id=$rowsupd->stock_returns_id;

$sql3="INSERT INTO temp_stock_returns VALUES('','$stock_returns_id','$product_code','$purchase_order_id','$product_id','$vendor_price','$currency','$curr_rate','$supplier_id','$lat_code','$order_code','$user_id','$qnty_ret','$reason',NOW())";
$results3= mysql_query($sql3) or die ("Error $sql3.".mysql_error());

$amount=$qnty_ret*$vendor_price;

$sqlaccpay="insert into inventory_ledger values('','Returned $qnty_ret $product_name to supplier','-$amount','','$amount','$currency','$curr_rate',NOW(),'$sales_code')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());



header ("Location:return_stock.php?success=1&lpo_no=$lpo_no&supplier_id=$supplier_id&order_code=$order_code&qnty_ordered=$qnty_ordered&currency=$currency&print=1&stock_return_code=$lat_code&amount_paid=$amount_paid");
//header ("Location:pre_debit_note.php?stock_return_code=$lat_code");

}

mysql_close($cnn);


?>


