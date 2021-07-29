<?php
require_once('includes/session.php'); 
include('Connections/fundmaster.php');

#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$sales_id=$_GET['sales_id'];


$sqltemp="select * FROM sales WHERE sales_id='$sales_id'";
$resultstemp=mysql_query($sqltemp) or die ("Error : $sqltemp.".mysql_error());
$rowstemp=mysql_fetch_object($resultstemp);

$lpo_no1=$rowstemp->invoice_no;


$view=$_GET['view'];
$cash=$_GET['cash'];
$sales_item_id=$_GET['sales_item_id'];
$latest_received_stock_id=$sales_item_id;

$sqltemp2="select * FROM sales_item WHERE sales_item_id='$sales_item_id'";
$resultstemp2=mysql_query($sqltemp2) or die ("Error : $sqltemp2.".mysql_error());
$rowstemp2=mysql_fetch_object($resultstemp2);

$curr_bp=$rowstemp2->item_bp;

$prod=mysql_real_escape_string($_POST['prod']);


$queryprofc="select * from items where item_id='$prod'";
$resultsprofc=mysql_query($queryprofc) or die ("Error: $queryprofc.".mysql_error());
$rowsprofc=mysql_fetch_object($resultsprofc);


$product_name=$rowsprofc->item_name;
$vat_status=$rowsprofc->vat_status;


$qnty=mysql_real_escape_string($_POST['qnty']);
$vend_price=mysql_real_escape_string($_POST['vend_price']);




$item_disc2=mysql_real_escape_string($_POST['item_disc']);


$price_cost=$vend_price*$qnty;
$purchase_cost=$curr_bp*$qnty;


//vat calculations
$queryprofcv="select * from vat_settings";
$resultsprofcv=mysql_query($queryprofcv) or die ("Error: $queryprofcv.".mysql_error());
$rowsprofcv=mysql_fetch_object($resultsprofcv);
$vat_set_perc=$rowsprofcv->vat_setting_perc;

$vat_perc=$vat_set_perc/100;

if ($vat_status==0)
{
	
$vat_value=0;	
}
else
{

$vat_value=$qnty*$vend_price*$vat_perc;	
	
}


$item_disc=$item_disc2/$price_cost*100;

if ($cash==1)
{
$memo2='Cash Sales <a href="generate_cash_sales.php?sales_id='.$sales_id.'">Receipt No:'.$lpo_no1.'</a> whose cost is '.$curr_bp.' each';
	
}
else
{

$memo2='Invoice Sales <a href="generate_invoice.php?sales_id='.$sales_id.'">Invoice No:'.$lpo_no1.'</a> whose cost is '.$curr_bp.' each';
}

$sql1= "update sales_item set item_id='$prod',item_quantity='$qnty',item_cost='$vend_price',vat_value='$vat_value', shop_id='$item_disc' where sales_item_id='$sales_item_id'";
$results1= mysql_query($sql1) or die ("Error $sql1.".mysql_error());

/* $sqlaccpay="update inventory_ledger values('','Sold $qnty $product_name though $memo2','-$purchase_cost','','$purchase_cost','$currency','$curr_rate','$date_from','sls$latest_received_stock_id','','','')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error()); */

/* $sqlaccpay="update inventory_ledger SET 
transactions='Sold $qnty $product_name though $memo2',
amount='-$purchase_cost',
credit='$purchase_cost'
where order_code='sls$latest_received_stock_id'";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());

$sqlaccpay= "insert into item_transactions values('','$latest_received_stock_id','Sold $qnty $product_name though $memo2','-$qnty','$date_from','$day','$month','$year','sls$latest_received_stock_id',
'$user_id','$shop_id','','')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());

$sqlaccpay="update item_transactions SET 
memo='Sold $qnty $product_name though $memo2',
quantity='-$qnty',
transaction_date='$date_from'
where transaction_code='sls$latest_received_stock_id'";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error()); */


$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'Updates Sales Items details')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());



?>
<script type="text/javascript">
alert('Record Updated Successfuly');
window.location = "<?php echo $_SERVER['HTTP_REFERER']; ?>";
</script>
<?php

mysql_close($cnn);



?>


