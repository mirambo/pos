<?php
#include connection
include('includes/session.php');
include('Connections/fundmaster.php');

$id=$_GET['id'];

$supplier_id=mysql_real_escape_string($_POST['supplier_id']);
$account_to_credit=mysql_real_escape_string($_POST['credit_account_id']);

$query1="select * from suppliers where supplier_id='$supplier_id'";
$results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
$rows1=mysql_fetch_object($results1);
$supp_name=$rows1->supplier_name;


$stock_code_id=$_GET['order_code_id'];



$queryod="select * from order_code_get,received_stock where received_stock.order_code_id=order_code_get.order_code_id 
AND  received_stock.stock_code_id='$stock_code_id'";
$resultsod=mysql_query($queryod) or die ("Error: $queryod.".mysql_error());
$rowsod=mysql_fetch_object($resultsod);
$currency=$rowsod->currency;
$curr_rate=$rowsod->curr_rate;
$order_code_id=$rowsod->order_code_id;
$lpo_no=$rowsod->lpo_no;
$ref_no=$rowsod->ref_no;

$sales_date=mysql_real_escape_string($_POST['delivery_date']);

$ttl_order_value=mysql_real_escape_string($_POST['ttl_order_value']);
$grand_order_value=mysql_real_escape_string($_POST['grand_order_value']);
//$cost_amount=mysql_real_escape_string($_POST['ttl_order_value']);


$orderdate = explode('-', $sales_date);
$year  = $orderdate[0];
$month = $orderdate[1];
$day   = $orderdate[2];
//$dr_transaction_code="dritrec".$po_id;
$cr_transaction_code="critrec".$stock_code_id;
//$memo4='Received Items To Store';

$memo2='Received items for <a href="begin_order.php?order_code='.$order_code_id.'">order no: '.$lpo_no.', Ref No: '.$ref_no.'</a>  to the store';



if ($id!='')
{
	
$sqltrans="UPDATE account_received_stock_code SET 
posted_date='$sales_date',
account_to_credit='$account_to_credit',
amount_credited='$ttl_order_value' where account_stock_code_id='$id'";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());	

$account_stock_code_id=$id;

/////////purchase gmv amount without vat
$sqltransx="UPDATE chart_transactions SET 
account_type_id='$account_to_credit',
memo='$memo2',
amount='$ttl_order_value',
credit='$ttl_order_value',
currency='$currency',
curr_rate='$curr_rate',
transaction_date='$sales_date',
l_day='$day',
l_month='$month',
l_year='$year' WHERE transaction_code='$cr_transaction_code'";
$resultstransx=mysql_query($sqltransx) or die ("Error $sqltransx.".mysql_error());	



foreach($_POST['prod'] as $row3=>$Prod)
{

$cost_amount=mysql_real_escape_string($_POST['cost_amount'][$row3]);
$vat_value=mysql_real_escape_string($_POST['vat_value'][$row3]);
$account_to_debit=mysql_real_escape_string($_POST['debit_account_id'][$row3]);
$received_stock_id=mysql_real_escape_string($_POST['received_stock_id'][$row3]);
$account_stock_id=mysql_real_escape_string($_POST['account_stock_id'][$row3]);
//$purchase_order_id=mysql_real_escape_string($_POST['purchase_order_id'][$row3]);
$item_id=mysql_real_escape_string($_POST['item_id'][$row3]);

$query13="select * from items where item_id='$item_id'";
$results13=mysql_query($query13) or die ("Error: $query13.".mysql_error());
$rows13=mysql_fetch_object($results13);
$item_name=mysql_real_escape_string($rows13->item_name);

$dr_transaction_code="dritrec".$received_stock_id;

$memo2='Received Item '.$item_name.', for <a href="begin_order.php?order_code='.$order_code_id.'">order no: '.$lpo_no.', Ref No: '.$ref_no.'</a>  To Store';
$memo2v='VAT on Received Item '.$item_name.', for <a href="begin_order.php?order_code='.$order_code_id.'">order no: '.$lpo_no.', Ref No: '.$ref_no.'</a>  To Store';


$sqltrans2="UPDATE account_received_stock SET 
account_to_debit='$account_to_debit',
amount_debited='$cost_amount' WHERE account_stock_id='$account_stock_id'";
$resultstrans2=mysql_query($sqltrans2) or die ("Error $sqltrans2.".mysql_error());	



//////////////debit stock
$sqltransx="UPDATE chart_transactions SET 
account_type_id='$account_to_debit',
memo='$memo2',
amount='$cost_amount',
debit='$cost_amount',
currency='$currency',
curr_rate='$curr_rate',
transaction_date='$sales_date',
l_day='$day',
l_month='$month',
l_year='$year' WHERE transaction_code='$dr_transaction_code'";
$resultstransx=mysql_query($sqltransx) or die ("Error $sqltransx.".mysql_error());	




/* $sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'Received $qnty_rec $product_name into the store')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error()); */
	
}









?>
<script type="text/javascript">
alert('Record Updated Successfuly');
window.location = "view_account_received_items.php";
//window.location = "<?php echo $_SERVER['HTTP_REFERER']; ?>";
</script>
<?php
	
	
	
}
else
{

$sqltrans="INSERT INTO account_received_stock_code SET 
order_code_id='$order_code_id',
stock_code_id='$stock_code_id',
currency='$currency',
curr_rate='$curr_rate',
posted_date='$sales_date',
account_to_credit='$account_to_credit',
amount_credited='$ttl_order_value',
posted_by='$user_id',
datetime_posted='$day'";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());	

$account_stock_code_id=mysql_insert_id();

/////////purchase gmv amount without vat
$sqltransx="INSERT INTO chart_transactions SET 
account_type_id='$account_to_credit',
transaction_section='STOCKREC',
memo='$memo2',
amount='$ttl_order_value',
credit='$ttl_order_value',
currency='$currency',
curr_rate='$curr_rate',
transaction_date='$sales_date',
transaction_datetime_recorded='$todate',
transaction_code='$cr_transaction_code',
transaction_user_id='$user_id',
l_day='$day',
l_month='$month',
l_year='$year'";
$resultstransx=mysql_query($sqltransx) or die ("Error $sqltransx.".mysql_error());	


foreach($_POST['prod'] as $row3=>$Prod)
{

$cost_amount=mysql_real_escape_string($_POST['cost_amount'][$row3]);
$vat_value=mysql_real_escape_string($_POST['vat_value'][$row3]);
$account_to_debit=mysql_real_escape_string($_POST['debit_account_id'][$row3]);
$received_stock_id=mysql_real_escape_string($_POST['received_stock_id'][$row3]);
//$purchase_order_id=mysql_real_escape_string($_POST['purchase_order_id'][$row3]);
$item_id=mysql_real_escape_string($_POST['item_id'][$row3]);

$query13="select * from items where item_id='$item_id'";
$results13=mysql_query($query13) or die ("Error: $query13.".mysql_error());
$rows13=mysql_fetch_object($results13);
$item_name=mysql_real_escape_string($rows13->item_name);

$dr_transaction_code="dritrec".$received_stock_id;

$memo2='Received Item '.$item_name.', for <a href="begin_order.php?order_code='.$order_code_id.'">order no: '.$lpo_no.', Ref No: '.$ref_no.'</a>  To Store';
$memo2v='VAT on Received Item '.$item_name.', for <a href="begin_order.php?order_code='.$order_code_id.'">order no: '.$lpo_no.', Ref No: '.$ref_no.'</a>  To Store';


$sqltrans2="INSERT INTO account_received_stock SET 
account_stock_code_id='$account_stock_code_id',
account_to_debit='$account_to_debit',
received_stock_id='$received_stock_id',
amount_debited='$cost_amount'";
$resultstrans2=mysql_query($sqltrans2) or die ("Error $sqltrans2.".mysql_error());	

/* //vat tranaction

if ($vat_value==0 || $vat_value=='')
{
	
	
}
else
{
$sqltrans23="INSERT INTO account_received_stock SET 
account_stock_code_id='$account_stock_code_id',
account_to_debit='69',
received_stock_id='$purchase_order_id',
amount_debited='$vat_value'";
$resultstrans23=mysql_query($sqltrans23) or die ("Error $sqltrans23.".mysql_error());	
} */

//////////////debit stock
$sqltransx="INSERT INTO chart_transactions SET 
account_type_id='$account_to_debit',
transaction_section='STOCKREC',
memo='$memo2',
amount='$cost_amount',
debit='$cost_amount',
currency='$currency',
curr_rate='$curr_rate',
transaction_date='$sales_date',
transaction_datetime_recorded='$todate',
transaction_code='$dr_transaction_code',
transaction_user_id='$user_id',
l_day='$day',
l_month='$month',
l_year='$year'";
$resultstransx=mysql_query($sqltransx) or die ("Error $sqltransx.".mysql_error());	


/* //////////////debit VAT account
$dr_transaction_code_vat="dritrecvat".$received_stock_id;
$sqltransx="INSERT INTO chart_transactions SET 
account_type_id='69',
transaction_section='STOCKREC',
memo='$memo2v',
amount='$vat_value',
debit='$vat_value',
currency='$currency',
curr_rate='$curr_rate',
transaction_date='$sales_date',
transaction_datetime_recorded='$todate',
transaction_code='$dr_transaction_code_vat',
transaction_user_id='$user_id',
l_day='$day',
l_month='$month',
l_year='$year'";
$resultstransx=mysql_query($sqltransx) or die ("Error $sqltransx.".mysql_error()); */

$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'Received $qnty_rec $product_name into the store')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());
	
}







?>
<script type="text/javascript">
alert('Record Saved Successfuly');
window.location = "account_received_items.php";
//window.location = "<?php echo $_SERVER['HTTP_REFERER']; ?>";
</script>
<?php
}
mysql_close($cnn);


?>


