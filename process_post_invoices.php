<?php
#include connection
include('includes/session.php');
include('Connections/fundmaster.php');

$sales_id=$_GET['sales_id'];
$id=$_GET['id'];

$account_to_debit=mysql_real_escape_string($_POST['debit_account_id']);

$day=date( 'Y-m-d H:i:s', time());
$todate=date( 'Y-m-d', time());

/* $query1="select * from customer where supplier_id='$supplier_id'";
$results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
$rows1=mysql_fetch_object($results1);
$supp_name=$rows1->supplier_name; */


//$stock_code_id=$_GET['order_code'];

$sqlrec="SELECT * FROM sales WHERE sales_id='$sales_id'";
$resultsrec= mysql_query($sqlrec) or die ("Error $sqlrec.".mysql_error());	
$rowsrec=mysql_fetch_object($resultsrec);

$currency=$rowsrec->currency;
$curr_rate=$rowsrec->curr_rate;
$invoice_no=$rowsrec->invoice_no;
$ref_no=$rowsrec->order_no;
$customer_id=$rowsrec->customer_id;

$sales_date=mysql_real_escape_string($_POST['sales_date']);
$ref_no2=mysql_real_escape_string($_POST['ref_no2']);
$curr_rate2=mysql_real_escape_string($_POST['curr_rate2']);

$invoice_amount=mysql_real_escape_string($_POST['invoice_amount']);


$orderdate = explode('-', $sales_date);
$year  = $orderdate[0];
$month = $orderdate[1];
$day   = $orderdate[2];
//$dr_transaction_code="dritrec".$po_id;



if ($id!='')
{
	
$curr_rate=$curr_rate2;	
	
$dr_transaction_code="dr_inv".$id;
	
$sqltrans="UPDATE account_invoice_code SET 
currency='$currency',
curr_rate='$curr_rate',
posted_date='$sales_date',
account_to_debit='$account_to_debit',
amount_debited='$invoice_amount' WHERE account_invoice_code_id='$id'";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());	

//////////update sales date incase of the date
$sqlrec22="UPDATE sales SET sale_date='$sales_date',order_no='$ref_no2',curr_rate='$curr_rate' WHERE sales_id='$sales_id'";
$resultsrec22= mysql_query($sqlrec22) or die ("Error $sqlrec22.".mysql_error());	


$sqltranst="UPDATE customer_transactions SET 
transaction_date='$sales_date',
curr_rate='$curr_rate',
amount='$invoice_amount'
WHERE transaction_code='$dr_transaction_code'";
$resultstranst=mysql_query($sqltranst) or die ("Error $sqltranst.".mysql_error());


$sqltransx="UPDATE chart_transactions SET 
account_type_id='$account_to_debit',
amount='$invoice_amount',
debit='$invoice_amount',
transaction_date='$sales_date'
WHERE transaction_code='$dr_transaction_code'";
$resultstransx=mysql_query($sqltransx) or die ("Error $sqltransx.".mysql_error());	



foreach($_POST['sales_item_id'] as $row3=>$Sales_item_id)
{

$cost_amount=mysql_real_escape_string($_POST['item_amount'][$row3]);
$vat_amount=mysql_real_escape_string($_POST['vat_amount'][$row3]);
$item_id=mysql_real_escape_string($_POST['item_id'][$row3]);
$account_to_credit=mysql_real_escape_string($_POST['credit_account_id'][$row3]);
$sales_item_id=mysql_real_escape_string($_POST['sales_item_id'][$row3]);
$account_invoice_id=mysql_real_escape_string($_POST['account_invoice_id'][$row3]);


$query1p="select * from items where item_id='$item_id'";
$results1p=mysql_query($query1p) or die ("Error: $query1p.".mysql_error());
$rows1p=mysql_fetch_object($results1p);
$item_name=mysql_real_escape_string($rows1p->item_name);


//$ttl_cost=$qnty_rec*$cost_amount;

$cr_transaction_code="cr_invc_itm".$sales_item_id;

$memo22='Invoice Item <i>'.$item_name.'</i> for invoice no <strong>'.$invoice_no.' , Ref No : '.$ref_no.'</strong>';

$memo22='Invoice Item <i>'.$item_name.'</i> for <a href="generate_invoice.php?sales_id='.$sales_id.'">Invoice No:'.$invoice_no.'</a>, Ref No : '.$ref_no;


$sqltrans2="UPDATE account_invoice SET 
account_to_credit='$account_to_credit',
amount_credited='$cost_amount' WHERE account_invoice_id='$account_invoice_id'";
$resultstrans2=mysql_query($sqltrans2) or die ("Error $sqltrans2.".mysql_error());	


$sqltrans26="UPDATE invoices_vat SET 
vat_amount='$vat_amount' WHERE invoice_id='$sales_id'";
$resultstrans26=mysql_query($sqltrans26) or die ("Error $sqltrans26.".mysql_error());	



///////////////////post stock account

$sqltransx="UPDATE chart_transactions SET 
account_type_id='$account_to_credit',
memo='$memo22',
amount='$cost_amount',
credit='$cost_amount',
currency='$currency',
curr_rate='$curr_rate',
transaction_date='$sales_date',
l_day='$day',
l_month='$month',
l_year='$year' WHERE transaction_code='$cr_transaction_code'";
$resultstransx=mysql_query($sqltransx) or die ("Error $sqltransx.".mysql_error());	
	
}



?>
<script type="text/javascript">
alert('Record Updated Successfuly');
window.location = "home.php?view_post_invoices";
//window.location = "<?php echo $_SERVER['HTTP_REFERER']; ?>";
</script>
<?php







	
}
else
	
	{




$sqltrans="INSERT INTO account_invoice_code SET 
invoice_id='$sales_id',
currency='$currency',
curr_rate='$curr_rate',
posted_date='$sales_date',
account_to_debit='$account_to_debit',
amount_debited='$invoice_amount',
posted_by='$user_id',
datetime_posted='$day'";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());	

$account_invoice_code_id=mysql_insert_id();

$dr_transaction_code="dr_inv".$account_invoice_code_id;
//$memo2='Sales Invoice No : '.$invoice_no.', Ref No : '.$ref_no;
$memo2='Sales Invoice No : <a href="generate_invoice.php?sales_id='.$sales_id.'">Invoice No:'.$invoice_no.'</a>, Ref No : '.$ref_no;

///////////////////sales ledger control
$sqltransx="INSERT INTO chart_transactions SET 
account_type_id='$account_to_debit',
transaction_section='INVC',
memo='$memo2',
amount='$invoice_amount',
debit='$invoice_amount',
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




/////////////////post to stock account ie reduce stock.


foreach($_POST['sales_item_id'] as $row3=>$Sales_item_id)
{

$cost_amount=mysql_real_escape_string($_POST['item_amount'][$row3]);
$vat_amount=mysql_real_escape_string($_POST['vat_amount'][$row3]);
$item_id=mysql_real_escape_string($_POST['item_id'][$row3]);
$account_to_credit=mysql_real_escape_string($_POST['credit_account_id'][$row3]);
$sales_item_id=mysql_real_escape_string($_POST['sales_item_id'][$row3]);

$query1p="select * from items where item_id='$item_id'";
$results1p=mysql_query($query1p) or die ("Error: $query1p.".mysql_error());
$rows1p=mysql_fetch_object($results1p);
$item_name=mysql_real_escape_string($rows1p->item_name);


//$ttl_cost=$qnty_rec*$cost_amount;

$cr_transaction_code="cr_invc_itm".$sales_item_id;

$memo22='Invoice Item <i>'.$item_name.'</i> for invoice no <strong>'.$invoice_no.' , Ref No : '.$ref_no.'</strong>';

$memo22='Invoice Item <i>'.$item_name.'</i> for <a href="generate_invoice.php?sales_id='.$sales_id.'">Invoice No:'.$invoice_no.'</a>, Ref No : '.$ref_no;


$sqltrans2="INSERT INTO account_invoice SET 
account_invoice_code_id='$account_invoice_code_id',
account_to_credit='$account_to_credit',
invoice_id='$sales_id',
sales_item_id='$sales_item_id',
amount_credited='$cost_amount'";
$resultstrans2=mysql_query($sqltrans2) or die ("Error $sqltrans2.".mysql_error());	


$sqltrans26="INSERT INTO invoices_vat SET 
vat_amount='$vat_amount',
invoice_id='$sales_id',
date_recorded='$sales_date',
datetime_recorded='$day',
currency='$currency',
curr_rate='$curr_rate',
sales_item_id='$sales_item_id'";
$resultstrans26=mysql_query($sqltrans26) or die ("Error $sqltrans26.".mysql_error());	



///////////////////post stock account

$sqltransx="INSERT INTO chart_transactions SET 
account_type_id='$account_to_credit',
transaction_section='INVCITM',
memo='$memo22',
amount='$cost_amount',
credit='$cost_amount',
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


$sql23= "update sales SET 
posted='1' where sales_id='$sales_id'";
$results23=mysql_query($sql23) or die ("Error $sql23.".mysql_error()); 


//$memo2='Sales Invoice No : <a href="generate_invoice.php?sales_id='.$sales_id.'">Invoice No:'.$invoice_no.'</a>, Ref No : '.$ref_no;


$sqltranst="INSERT INTO customer_transactions SET 
customer_id='$customer_id',
transaction_date='$sales_date',
amount='$invoice_amount',
currency='$currency',
curr_rate='$curr_rate',
sales_id='$sales_id',
region_id='$region_id',
shop_id='$salesrep_id',
transaction_code='$dr_transaction_code',
transaction='$memo2'";
$resultstranst=mysql_query($sqltranst) or die ("Error $sqltranst.".mysql_error());








$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'Posted Invoice No $invoice_no, Ref No : $ref_no to accounts')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());


?>
<script type="text/javascript">
alert('Record Saved Successfuly');
window.location = "home.php?post_invoices";
//window.location = "<?php echo $_SERVER['HTTP_REFERER']; ?>";
</script>
<?php

mysql_close($cnn);

}
?>


