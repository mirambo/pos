<?php
#include connection
include('Connections/fundmaster.php');
include('includes/session.php');
$id=$_GET['id'];
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$account_to_credit=mysql_real_escape_string($_POST['credit_account_id']);
$account_to_debit=mysql_real_escape_string($_POST['debit_account_id']);
//$sales_code_id=mysql_real_escape_string($_POST['order_code_id']);

$date_paid=mysql_real_escape_string($_POST['date_paid']);
$client_id=mysql_real_escape_string($_POST['customer_id']);
$amount=mysql_real_escape_string($_POST['amount']);
$comments=mysql_real_escape_string($_POST['comments']);
$currency=mysql_real_escape_string($_POST['currency']);
$curr_rate=mysql_real_escape_string($_POST['curr_rate']);
$mop=mysql_real_escape_string($_POST['mop']);
$cheque_no=mysql_real_escape_string($_POST['cheque_no']);

$sqlrec="SELECT * FROM customer WHERE customer_id='$client_id'";
$resultsrec= mysql_query($sqlrec) or die ("Error $sqlrec.".mysql_error());	
$rowsrec=mysql_fetch_object($resultsrec);

$c_name=mysql_real_escape_string($rowsrec->customer_name);



if ($id=='')
{
	

$sql2= "INSERT INTO customer_payments_code SET
customer_id='$client_id',
sales_id='$sales_id',
recorded_by='$user_id',
amount_received='$amount',
description='$comments',
cheque_no='$cheque_no',
currency_code='$currency',
curr_rate='$curr_rate',
account_to_credit='$account_to_credit',
account_to_debit='$account_to_debit',
mop='$mop',
date_paid='$date_paid',
date_received='$todate'";
$results2= mysql_query($sql2) or die ("Error $sql2.".mysql_error());

$customer_payments_code_id=mysql_insert_id();	

$transaction_code='advclntpay'.$customer_payments_code_id;


$orderdate = explode('-', $date_paid);
$year  = $orderdate[0];
$month = $orderdate[1];
$day   = $orderdate[2];

$cr_transaction_code="crlmpclntpay".$customer_payments_code_id;
$dr_transaction_code="drlmpclntpay".$customer_payments_code_id;




//$transaction='Lampsum amount of ref no '.$cheque_no.' to pay for multiple customer invoice from customer '.$c_name;

$transaction='Advance Payment of ref no '.$cheque_no.' received from customer '.$c_name;




$memo2=$transaction;

/////////////credit bank with the lampsome amount reduce bank balance.
//Credit sales ledger control
$sqltrans2="INSERT INTO chart_transactions SET 
account_type_id='$account_to_credit',
transaction_section='LMPCLNTPY',
memo='$memo2',
amount='-$amount',
credit='$amount',
currency='$currency',
curr_rate='$curr_rate',
transaction_date='$date_paid',
transaction_datetime_recorded='$todate',
transaction_code='$cr_transaction_code',
transaction_user_id='$user_id',
l_day='$day',
l_month='$month',
l_year='$year'";
$resultstrans2=mysql_query($sqltrans2) or die ("Error $sqltrans2.".mysql_error());



//debit purchase ledger control

//insert into books
//Debit bank
$sqltrans="INSERT INTO chart_transactions SET 
account_type_id='$account_to_debit',
transaction_section='LMPCLNTPY',
memo='$memo2',
amount='$amount',
debit='$amount',
currency='$currency',
curr_rate='$curr_rate',
transaction_date='$date_paid',
transaction_datetime_recorded='$todate',
transaction_code='$dr_transaction_code',
transaction_user_id='$user_id',
l_day='$day',
l_month='$month',
l_year='$year'";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());

///////////advance to customer transaction payment
/* $sqltransc="INSERT INTO customer_transactions SET 
customer_id='$client_id',
transaction='$transaction',
sales_id='$sales_id',
amount='-$amount',
currency='$currency',
curr_rate='$curr_rate',
transaction_date='$date_paid',
transaction_code='$transaction_code'";
$resultstransc=mysql_query($sqltransc) or die ("Error $sqltransc.".mysql_error()); */

	
	
foreach($_POST['sales_id'] as $row3=>$Sales_Id)

{
	
$sales_id=mysql_real_escape_string($_POST['sales_id'][$row3]);	

$sqlrecv="SELECT * FROM sales WHERE sales_id='$sales_id'";
$resultsrecv= mysql_query($sqlrecv) or die ("Error $sqlrecv.".mysql_error());	
$rowsrecv=mysql_fetch_object($resultsrecv);
$invoice_no=$rowsrecv->invoice_no;
$invoice_ref_no=$rowsrecv->order_no;


echo '</br>';

echo $order_amount_received=mysql_real_escape_string($_POST['order_amount_received'][$row3]);	

$ttl_order_amount=$ttl_order_amount+$order_amount_received;


$sql= "INSERT INTO customer_payments SET
sales_id='$sales_id',
customer_payment_code_id='$customer_payments_code_id',
invoice_amount_received='$order_amount_received'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
$latest_id2=mysql_insert_id();

$transaction_code2='clientpay'.$latest_id2;


$orderdate = explode('-', $date_paid);
$year  = $orderdate[0];
$month = $orderdate[1];
$day   = $orderdate[2];

$dr_transaction_code2="drclntpay".$latest_id2;
//$memo2="Payment from customers";

$transaction2='Customer Payment <a href="receive_client_payment?id='.$customer_payments_code_id.'&invoice_no='.$invoice_no.'"> for invoice no : '.$invoice_no.',Invoice Ref No: '.$invoice_ref_no.', Payment Ref No : '.$cheque_no.'</a> received from customer '.$c_name;
$memo22=$transaction2;

//customer statement

$sqltransc="INSERT INTO customer_transactions SET 
customer_id='$client_id',
transaction='$transaction2',
sales_id='$sales_id',
amount='-$order_amount_received',
currency='$currency',
curr_rate='$curr_rate',
transaction_date='$date_paid',
transaction_code='$transaction_code2'";
$resultstransc=mysql_query($sqltransc) or die ("Error $sqltransc.".mysql_error());

}

$advance_payment2=$amount-$ttl_order_amount;


if ($advance_payment2<=0)
{


	
	
	
}
else
{
	
///////////advance to customer payment
$sqltransc="INSERT INTO customer_transactions SET 
customer_id='$client_id',
transaction='$transaction',
sales_id='$sales_id',
amount='-$advance_payment2',
currency='$currency',
curr_rate='$curr_rate',
transaction_date='$date_paid',
transaction_code='$transaction_code'";
$resultstransc=mysql_query($sqltransc) or die ("Error $sqltransc.".mysql_error());
	
	
	
}	

?>
<script type="text/javascript">
alert('Record Saved Successfuly');

window.location = "home.php?view_receive_client_payment";
</script>
<?php
}



/////updates
else
{
		
	
$sql2= "UPDATE customer_payments_code SET
customer_id='$client_id',
sales_id='$sales_id',
recorded_by='$user_id',
amount_received='$amount',
description='$comments',
cheque_no='$cheque_no',
currency_code='$currency',
curr_rate='$curr_rate',
account_to_credit='$account_to_credit',
account_to_debit='$account_to_debit',
mop='$mop',
date_paid='$date_paid',
date_received='$todate' WHERE customer_payment_code_id='$id'";
$results2= mysql_query($sql2) or die ("Error $sql2.".mysql_error());

$customer_payments_code_id=$id;	


$transaction_code='advclntpay'.$customer_payments_code_id;


$orderdate = explode('-', $date_paid);
$year  = $orderdate[0];
$month = $orderdate[1];
$day   = $orderdate[2];

$cr_transaction_code="crlmpclntpay".$customer_payments_code_id;
$dr_transaction_code="drlmpclntpay".$customer_payments_code_id;


//$transaction='Lampsum amount of ref no '.$cheque_no.' to pay for multiple customer invoice from customer '.$c_name;
$transaction='Advance Payment of ref no '.$cheque_no.' received from customer '.$c_name;



$memo2=$transaction;

/////////////credit sales ledger control
//Credit account
$sqltrans2="UPDATE chart_transactions SET 
account_type_id='$account_to_credit',
transaction_section='LMPCLNTPY',
memo='$memo2',
amount='-$amount',
credit='$amount',
currency='$currency',
curr_rate='$curr_rate',
transaction_date='$date_paid',
l_day='$day',
l_month='$month',
l_year='$year' WHERE transaction_code='$cr_transaction_code'";
$resultstrans2=mysql_query($sqltrans2) or die ("Error $sqltrans2.".mysql_error());



//debit purchase ledger control

//insert into books
//Debit account
$sqltrans="UPDATE chart_transactions SET 
account_type_id='$account_to_debit',
transaction_section='LMPCLNTPY',
memo='$memo2',
amount='$amount',
debit='$amount',
currency='$currency',
curr_rate='$curr_rate',
transaction_date='$date_paid',
l_day='$day',
l_month='$month',
l_year='$year' WHERE transaction_code='$dr_transaction_code'";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());

///////////advance to supplier payment
/* $sqltransc="UPDATE customer_transactions SET 
customer_id='$client_id',
transaction='$transaction',
amount='-$amount',
currency='$currency',
curr_rate='$curr_rate',
transaction_date='$date_paid'
WHERE transaction_code='$transaction_code'";
$resultstransc=mysql_query($sqltransc) or die ("Error $sqltransc.".mysql_error()); */

	
	
foreach($_POST['sales_id'] as $row3=>$Sales_Id)

{
	

echo $sales_id=mysql_real_escape_string($_POST['sales_id'][$row3]);	
echo $customer_payment_id=mysql_real_escape_string($_POST['customer_payment_id'][$row3]);	



if ($customer_payment_id!='')
{
	
$sqlrecv="SELECT * FROM sales WHERE sales_id='$sales_id'";
$resultsrecv= mysql_query($sqlrecv) or die ("Error $sqlrecv.".mysql_error());	
$rowsrecv=mysql_fetch_object($resultsrecv);

$invoice_no=$rowsrecv->invoice_no;
$invoice_ref_no=$rowsrecv->order_no;


echo '</br>';

$order_amount_received=mysql_real_escape_string($_POST['order_amount_received'][$row3]);	

$ttl_order_amount=$ttl_order_amount+$order_amount_received;


$sql="UPDATE customer_payments SET
sales_id='$sales_id',
customer_payment_code_id='$customer_payments_code_id',
invoice_amount_received='$order_amount_received' WHERE customer_payment_id='$customer_payment_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
$latest_id2=$customer_payment_id;

$transaction_code2='clntpay'.$latest_id2;


$orderdate = explode('-', $date_paid);
$year  = $orderdate[0];
$month = $orderdate[1];
$day   = $orderdate[2];

$dr_transaction_code2="drsclntpay".$latest_id2;
//$memo2="Payment from customers";

//$transaction2='Customer Payment <a href="receive_client_payment?id='.$customer_payments_code_id.'&invoice_no='.$invoice_no.'"> for invoice no : '.$invoice_no.'</a> received from customer '.$c_name;
$transaction2='Customer Payment <a href="receive_client_payment?id='.$customer_payments_code_id.'&invoice_no='.$invoice_no.'"> for invoice no : '.$invoice_no.',Invoice Ref No: '.$invoice_ref_no.', Payment Ref No : '.$cheque_no.'</a> received from customer '.$c_name;

$memo22=$transaction2;

//customer statement

$sqltransc="UPDATE customer_transactions SET 
customer_id='$client_id',
transaction='$transaction2',
sales_id='$sales_id',
amount='-$order_amount_received',
currency='$currency',
curr_rate='$curr_rate',
transaction_date='$date_paid' WHERE transaction_code='$transaction_code2'";
$resultstransc=mysql_query($sqltransc) or die ("Error $sqltransc.".mysql_error());
	
	
	
}

else
{

$sqlrecv="SELECT * FROM sales WHERE sales_id='$sales_id'";
$resultsrecv= mysql_query($sqlrecv) or die ("Error $sqlrecv.".mysql_error());	
$rowsrecv=mysql_fetch_object($resultsrecv);

$invoice_no=$rowsrecv->invoice_no;

$invoice_ref_no=$rowsrecv->order_no;


echo '</br>';

$order_amount_received=mysql_real_escape_string($_POST['order_amount_received'][$row3]);	

$ttl_order_amount=$ttl_order_amount+$order_amount_received;


$sql= "INSERT INTO customer_payments SET
sales_id='$sales_id',
customer_payment_code_id='$customer_payments_code_id',
invoice_amount_received='$order_amount_received'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
$latest_id2=mysql_insert_id();

$transaction_code2='clntpay'.$latest_id2;


$orderdate = explode('-', $date_paid);
$year  = $orderdate[0];
$month = $orderdate[1];
$day   = $orderdate[2];

$dr_transaction_code2="drclntpay".$latest_id2;
//$memo2="Payment from customers";

//$transaction2='Customer Payment <a href="receive_client_payment?id='.$customer_payments_code_id.'&invoice_no='.$invoice_no.'"> for invoice no : '.$invoice_no.'</a> received from customer '.$c_name;
$transaction2='Customer Payment <a href="receive_client_payment?id='.$customer_payments_code_id.'&invoice_no='.$invoice_no.'"> for invoice no : '.$invoice_no.',Invoice Ref No: '.$invoice_ref_no.', Payment Ref No : '.$cheque_no.'</a> received from customer '.$c_name;

$memo22=$transaction2;

//customer statement

$sqltransc="INSERT INTO customer_transactions SET 
customer_id='$client_id',
transaction='$transaction2',
sales_id='$sales_id',
amount='-$order_amount_received',
currency='$currency',
curr_rate='$curr_rate',
transaction_date='$date_paid',
transaction_code='$transaction_code'";
$resultstransc=mysql_query($sqltransc) or die ("Error $sqltransc.".mysql_error());
}
}	


$advance_payment2=$amount-$ttl_order_amount;

///////////advance to supplier payment

$sqldl= "delete from customer_transactions where transaction_code='$transaction_code'";
$resultsdl= mysql_query($sqldl) or die ("Error $sqldl.".mysql_error());

if ($resultsdl)
{

if ($advance_payment2<=0)
{


	
	
	
}
else
{
	
$sqltransc="INSERT INTO customer_transactions SET 
customer_id='$client_id',
transaction='$transaction',
sales_id='$sales_id',
amount='-$advance_payment2',
currency='$currency',
curr_rate='$curr_rate',
transaction_date='$date_paid',
transaction_code='$transaction_code'";
$resultstransc=mysql_query($sqltransc) or die ("Error $sqltransc.".mysql_error());

}

}

?>
<script type="text/javascript">
alert('Record Updated Successfuly');

window.location = "home.php?view_receive_client_payment";
</script>
<?php
}
	
	
	
	
	
	
	
	


mysql_close($cnn);


?>


