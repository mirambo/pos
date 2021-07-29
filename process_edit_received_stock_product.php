<?php
include('Connections/fundmaster.php');
require_once('includes/session.php'); 
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$received_stock_id=$_GET['received_stock_id'];


$sqltemp="select * from items,received_stock 
where items.item_id=received_stock.product_id AND received_stock.received_stock_id='$received_stock_id'";
$resultstemp=mysql_query($sqltemp) or die ("Error : $sqltemp.".mysql_error());
$rowstemp=mysql_fetch_object($resultstemp);


$order_code_id=$_GET['order_code_id'];


$queryod="select * from order_code_get where order_code_id='$order_code_id'";
$resultsod=mysql_query($queryod) or die ("Error: $queryod.".mysql_error());
$rowsod=mysql_fetch_object($resultsod);
$shop_id=$rowsod->shop_id;
$currency=$rowsod->currency;
$curr_rate=$rowsod->curr_rate;
$order_no_lpo=$rowsod->lpo_no;
$ref_no_order=$rowsod->ref_no;




$prod=mysql_real_escape_string($_POST['prod']);
$delivery_date=mysql_real_escape_string($_POST['delivery_date']);
$expiry_date=mysql_real_escape_string($_POST['expiry_date']);

$qnty_rec=mysql_real_escape_string($_POST['qnty_rec']);

$orig_qnty_rec=mysql_real_escape_string($_POST['orig_qnty_rec']);


$query11="select * from items where item_id='$prod'";
$results11=mysql_query($query11) or die ("Error: $query11.".mysql_error());
$rows11=mysql_fetch_object($results11);

$product_name=$rows11->item_name;
$pack_size=$rows11->pack_size;





$sql= "update received_stock set product_id='$prod', quantity_rec='$qnty_rec',delivery_date='$delivery_date',expiry_date='$expiry_date' 
where received_stock_id='$received_stock_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


$latest_id=$received_stock_id;
$date_dep=$delivery_date;


$account_id_dr=7;



$account_id_cr=3;


//$memo="Received ".$qnty_rec." ".$item_name." into the store from supplier";

$memo='Received <a href="begin_order.php?order_code='.$order_code_id.'">'.$qnty_rec.' '.$product_name.' of LPO No: '.$order_no_lpo.' Ref No : '.$ref_no_order.'</a> into the store';

$amount=$purchase_cost;
/* $currency=6;
$curr_rate=1; */

$orderdate = explode('-', $date_dep);
$year  = $orderdate[0];
$month = $orderdate[1];
$day   = $orderdate[2];
$transaction_code="recitem".$received_stock_id;

// item transactions

$sqltranslg="UPDATE item_transactions SET
memo='$memo', 
quantity='$qnty_rec',
transaction_date='$date_dep',
l_day='$day',
l_month='$month',
l_year='$year'

WHERE transaction_code='$transaction_code'";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());





$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'Updated details of received $product_name ($pack_size) to the warehouse transaction')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());



/* 

$desc='Recorded '.$qnty_rec.' '.$product_name.' ('.$pack_size.') as opening balance';

$sqltranslg= "UPDATE inventory_ledger SET 

amount='$purchase_cost',
debit='$purchase_cost',
currency_code='$currency',
curr_rate='$curr_rate'

WHERE order_code='recp$received_stock_id'";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());


$sqltranslg= "UPDATE pending_purchases_ledger SET
 
amount='-$purchase_cost',
credit='$purchase_cost',
currency_code='$currency',
curr_rate='$curr_rate'

WHERE order_code='recp$received_stock_id'";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());

$sqltranslg= "UPDATE purchases_ledger SET
 
amount='$purchase_cost',
debit='$purchase_cost',
currency_code='$currency',
curr_rate='$curr_rate'

WHERE order_code='recp$received_stock_id'";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());

$sqltranslg= "UPDATE item_transactions SET
 
quantity='$qnty_rec',
transaction_date='$delivery_date'

WHERE transaction_code='recp$received_stock_id'";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error()); */

//header ("Location:receive_stock_to_warehouse.php?order_code_id=$order_code_id");

?>
<script type="text/javascript">
alert('Record Updated successfuly');
//window.location = "begin_order.php";
window.location = "<?php echo $_SERVER['HTTP_REFERER']; ?>";
</script>
<?php

mysql_close($cnn);

?>


