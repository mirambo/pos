<?php
#include connection
include('includes/session.php');
include('Connections/fundmaster.php');



$supplier_id=mysql_real_escape_string($_POST['supplier_id']);
$account_to_credit=mysql_real_escape_string($_POST['credit_account_id']);

$query1="select * from suppliers where supplier_id='$supplier_id'";
$results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
$rows1=mysql_fetch_object($results1);
$supp_name=$rows1->supplier_name;


$stock_code_id=$_GET['order_code_id'];
//$order_code=$_GET['order_code_id'];


$queryod="select * from order_code_get,receive_stock where receive_stock.order_code_id=order_code_get.order_code_id AND  received_stock.order_code_id='$stock_code_id'";
$resultsod=mysql_query($queryod) or die ("Error: $queryod.".mysql_error());
$rowsod=mysql_fetch_object($resultsod);
$currency=$rowsod->currency;
$curr_rate=$rowsod->curr_rate;
$order_code_id=$rowsod->order_code_id;

$sales_date=mysql_real_escape_string($_POST['delivery_date']);

$item_cost=mysql_real_escape_string($_POST['ttl_cost']);


$orderdate = explode('-', $sales_date);
$year  = $orderdate[0];
$month = $orderdate[1];
$day   = $orderdate[2];
//$dr_transaction_code="dritrec".$po_id;
$cr_transaction_code="critrec".$stock_code_id;
$memo2='Received Items To Store';


$sqlprof="select * from chart_transactions where transaction_code='$cr_transaction_code'";
$resultsprof=mysql_query($sqlprof) or die ("Error $sqlprof.".mysql_error());
$numrowsprof=mysql_num_rows($resultsprof);

if ($numrowsprof>0)	
{
	
	
	
	
	
$sqltrans="UPDATE chart_transactions SET 
account_type_id='$account_to_credit',
transaction_section='STOCKREC',
amount='$item_cost',
credit='$item_cost',
currency='$currency',
curr_rate='$curr_rate' WHERE transaction_code='$cr_transaction_code'";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());	
	
	
}
else
{


$sqltrans="INSERT INTO chart_transactions SET 
account_type_id='$account_to_credit',
transaction_section='STOCKREC',
memo='$memo2',
amount='$item_cost',
credit='$item_cost',
currency='$currency',
curr_rate='$curr_rate',
transaction_date='$sales_date',
transaction_datetime_recorded='$todate',
transaction_code='$cr_transaction_code',
transaction_user_id='$user_id',
l_day='$day',
l_month='$month',
l_year='$year'";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());	
	
	
}





foreach($_POST['prod'] as $row3=>$Prod)
{

$cost_amount=mysql_real_escape_string($_POST['cost_amount'][$row3]);
$account_to_debit=mysql_real_escape_string($_POST['debit_account_id'][$row3]);
$purchase_order_id=mysql_real_escape_string($_POST['purchase_order_id'][$row3]);



$dr_transaction_code="dritrec".$purchase_order_id;

$memo2='Received Items To Store';


$sqlprof="select * from chart_transactions where transaction_code='$dr_transaction_code'";
$resultsprof=mysql_query($sqlprof) or die ("Error $sqlprof.".mysql_error());
$numrowsprof=mysql_num_rows($resultsprof);

if ($numrowsprof>0)	
{
	
$sqltrans="UPDATE chart_transactions SET 
account_type_id='$account_to_debit',
transaction_section='STOCKREC',
amount='$cost_amount',
debit='$cost_amount',
currency='$currency',
curr_rate='$curr_rate',
transaction_date='$sales_date',
where transaction_code='$dr_transaction_code'";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error()); 
	
}
else
{


$sqltrans="INSERT INTO chart_transactions SET 
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
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());	
	
	
}	



}






	



$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'Received $qnty_rec $product_name into the warehouse')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());




?>
<script type="text/javascript">
alert('Record Saved Successfuly');
window.location = "receive_stock.php";
//window.location = "<?php echo $_SERVER['HTTP_REFERER']; ?>";
</script>
<?php

mysql_close($cnn);


?>


