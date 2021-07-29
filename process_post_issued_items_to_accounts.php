<?php
#include connection
include('includes/session.php');
include('Connections/fundmaster.php');

$order_code=$_GET['order_code'];

$account_to_credit=mysql_real_escape_string($_POST['credit_account_id']);

$query1="select * from suppliers where supplier_id='$supplier_id'";
$results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
$rows1=mysql_fetch_object($results1);
$supp_name=$rows1->supplier_name;


$stock_code_id=$_GET['order_code'];

$sqlrec="SELECT * FROM requisition WHERE requisition_id='$order_code'";
$resultsrec= mysql_query($sqlrec) or die ("Error $sqlrec.".mysql_error());	
$rowsrec=mysql_fetch_object($resultsrec);

$currency=7;
$curr_rate=1;
$requisition_no=$rowsrec->requisition_no;
$ref_no=$rowsrec->ref_no;

$sales_date=mysql_real_escape_string($_POST['delivery_date']);

$item_cost=mysql_real_escape_string($_POST['ttl_item_value']);


$orderdate = explode('-', $sales_date);
$year  = $orderdate[0];
$month = $orderdate[1];
$day   = $orderdate[2];
//$dr_transaction_code="dritrec".$po_id;
$cr_transaction_code="cr_issditm".$stock_code_id;
$memo2='Issued items from store through <a href="create_requisition.php?order_code='.$order_code.'">requsition no '.$requisition_no.' ref no '.$ref_no.'</a>';


$sqltrans="INSERT INTO account_issued_stock_code SET 
order_code_id='$order_code_id',
stock_code_id='$stock_code_id',
currency='$currency',
curr_rate='$curr_rate',
posted_date='$sales_date',
account_to_credit='$account_to_credit',
amount_credited='$item_cost',
posted_by='$user_id',
datetime_posted='$day'";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());	

$account_stock_code_id=mysql_insert_id();

///////////////////stock control account account
/* $sqltransx="INSERT INTO chart_transactions SET 
account_type_id='$account_to_credit',
transaction_section='ITEMISSUED',
memo='$memo2',
amount='-$item_cost',
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
$resultstransx=mysql_query($sqltransx) or die ("Error $sqltransx.".mysql_error()); */	




/////////////////post to cost of production account


foreach($_POST['prod'] as $row3=>$Prod)
{

$cost_amount=mysql_real_escape_string($_POST['item_value'][$row3]);
$qnty_rec=mysql_real_escape_string($_POST['qnty_rec'][$row3]);
$prod=mysql_real_escape_string($_POST['prod'][$row3]);
$account_to_debit=mysql_real_escape_string($_POST['debit_account_id'][$row3]);
$account_to_credit=mysql_real_escape_string($_POST['credit_account_id'][$row3]);
$purchase_order_id=mysql_real_escape_string($_POST['requsition_item_id'][$row3]);

$query1p="select * from items where item_id='$prod'";
$results1p=mysql_query($query1p) or die ("Error: $query1p.".mysql_error());
$rows1p=mysql_fetch_object($results1p);
$item_name=$rows1p->item_name;


$ttl_cost=$qnty_rec*$cost_amount;

$dr_transaction_code="dr_issditm".$purchase_order_id;
$cr_transaction_code="cr_issditm".$purchase_order_id;

$memo2='Issued items <i>'.$item_name.'</i> from store through <a href="create_requisition.php?order_code='.$order_code.'">requisition no <strong>'.$requisition_no.', ref no '.$ref_no.'</a></strong>';


$sqltrans2="INSERT INTO account_issued_stock SET 
account_stock_code_id='$account_stock_code_id',
account_to_debit='$account_to_debit',
account_to_credit='$account_to_credit',
requisition_id='$stock_code_id',
issued_stock_id='$purchase_order_id',
quantity_issued='$qnty_rec',
requisition_item_id='$purchase_order_id',
issued_item_id='$prod',
amount_debited='$ttl_cost'";
$resultstrans2=mysql_query($sqltrans2) or die ("Error $sqltrans2.".mysql_error());	



///////////////////post to cost of sales
//account to debit
$dr_transaction_code='';
$sqltransx="INSERT INTO chart_transactions SET 
account_type_id='$account_to_debit',
transaction_section='STOCKREC',
memo='$memo2',
amount='$ttl_cost',
debit='$ttl_cost',
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



///////////////////account to credit
$dr_transaction_code='';
$sqltransx="INSERT INTO chart_transactions SET 
account_type_id='$account_to_credit',
transaction_section='STOCKREC',
memo='$memo2',
amount='-$ttl_cost',
credit='$ttl_cost',
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
	
}


$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'Issued $qnty_rec $product_name from the store')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());




?>
<script type="text/javascript">
alert('Record Saved Successfuly');
window.location = "home.php?post_issued_items=post_issued_items";
//window.location = "<?php echo $_SERVER['HTTP_REFERER']; ?>";
</script>
<?php

mysql_close($cnn);


?>


