<?php
#include connection
include('Connections/fundmaster.php');
include('includes/session.php');
$id=$_GET['id'];
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$account_to_credit=mysql_real_escape_string($_POST['credit_account_id']);
$account_to_debit=mysql_real_escape_string($_POST['debit_account_id']);
$sales_code_id=mysql_real_escape_string($_POST['invoice_id']);

$sqlrecv="SELECT * FROM sales WHERE sales_id='$sales_code_id'";
$resultsrecv= mysql_query($sqlrecv) or die ("Error $sqlrecv.".mysql_error());	
$rowsrecv=mysql_fetch_object($resultsrecv);
$invoice_no=$rowsrecv->invoice_no;

$date_paid=mysql_real_escape_string($_POST['date_paid']);
$client_id=mysql_real_escape_string($_POST['customer_id']);

$amount=mysql_real_escape_string($_POST['amount']);
$desc=mysql_real_escape_string($_POST['desc']);
$currency=mysql_real_escape_string($_POST['currency']);
$curr_rate=mysql_real_escape_string($_POST['curr_rate']);
$mop=mysql_real_escape_string($_POST['mop']);
$desc=mysql_real_escape_string($_POST['desc']);

$sqlrec="SELECT * FROM customer WHERE customer_id='$client_id'";
$resultsrec= mysql_query($sqlrec) or die ("Error $sqlrec.".mysql_error());	
$rowsrec=mysql_fetch_object($resultsrec);

$c_name=mysql_real_escape_string($rowsrec->customer_name);



if ($id=='')
{


$sql= "INSERT INTO invoice_payments SET
customer_id='$client_id',
sales_id='$sales_code_id',
recorded_by='$user_id',
amount_received='$amount',
description='$desc',
currency_code='$currency',
curr_rate='$curr_rate',
account_to_credit='$account_to_credit',
account_to_debit='$account_to_debit',
mop='$mop',
date_paid='$date_paid',
date_received='$todate'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
$latest_id2=mysql_insert_id();
$transaction_code='clntpay'.$latest_id2;



$orderdate = explode('-', $date_paid);
$year  = $orderdate[0];
$month = $orderdate[1];
$day   = $orderdate[2];
$cr_transaction_code="crclntpay".$latest_id2;
$dr_transaction_code="drclntpay".$latest_id2;


$transaction='Customer payment for <a href="edit_invoice_payment.php?invoice_payment_id='.$latest_id2.'&invoice_no='.$invoice_no.'"> Invoice No : '.$invoice_no.'</a> Received from customer '.$c_name;
$memo2=$transaction;

//customer statement

$sqltransc="INSERT INTO customer_transactions SET 
customer_id='$client_id',
transaction='$transaction',
sales_id='$sales_code_id',
amount='-$amount',
currency='$currency',
curr_rate='$curr_rate',
transaction_date='$date_paid',
transaction_code='$transaction_code'";
$resultstransc=mysql_query($sqltransc) or die ("Error $sqltransc.".mysql_error());







//insert into books
//Debit account
$sqltrans="INSERT INTO chart_transactions SET 
account_type_id='$account_to_debit',
transaction_section='CLNTPAY',
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


//Credit account
$sqltrans2="INSERT INTO chart_transactions SET 
account_type_id='$account_to_credit',
transaction_section='CLNTPAY',
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

//header ("Location:receive_client_payment.php?addconfirm=1&invoice_payment_id=$latest_id");
?>
<script type="text/javascript">
alert('Record Saved Successfuly');
//window.location = "home.php?initiateproject=initiateproject&sub_module_id=<?php echo $sub_module_id; ?>";
window.location = "<?php echo $_SERVER['HTTP_REFERER']; ?>";
</script>
<?php
}






/////updates
else
{
	
$sql= "UPDATE invoice_payments SET
customer_id='$client_id',
sales_id='$sales_code_id',
amount_received='$amount',
description='$desc',
currency_code='$currency',
curr_rate='$curr_rate',
account_to_credit='$account_to_credit',
account_to_debit='$account_to_debit',
mop='$mop',
date_paid='$date_paid' WHERE invoice_payment_id='$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
$latest_id2=$id;
$transaction_code='clntpay'.$latest_id2;



$orderdate = explode('-', $date_paid);
$year  = $orderdate[0];
$month = $orderdate[1];
$day   = $orderdate[2];
$cr_transaction_code="crclntpay".$latest_id2;
$dr_transaction_code="drclntpay".$latest_id2;


$transaction='Customer payment for <a href="edit_invoice_payment.php?invoice_payment_id='.$latest_id2.'&invoice_no='.$invoice_no.'"> Invoice No : '.$invoice_no.'</a> Received from customer '.$c_name;
$memo2=$transaction;

//customer statement

$sqltransc=" UPDATE customer_transactions SET 
customer_id='$client_id',
transaction='$transaction',
sales_id='$sales_code_id',
amount='-$amount',
currency='$currency',
curr_rate='$curr_rate',
transaction_date='$date_paid' WHERE transaction_code='$transaction_code'";
$resultstransc=mysql_query($sqltransc) or die ("Error $sqltransc.".mysql_error());







//insert into books
//Debit account
$sqltrans="UPDATE chart_transactions SET 
account_type_id='$account_to_debit',
transaction_section='CLNTPAY',
memo='$memo2',
amount='$amount',
debit='$amount',
currency='$currency',
curr_rate='$curr_rate',
transaction_date='$date_paid',
transaction_user_id='$user_id',
l_day='$day',
l_month='$month',
l_year='$year' WHERE transaction_code='$dr_transaction_code'";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());


//Credit account
$sqltrans2="UPDATE chart_transactions SET 
account_type_id='$account_to_credit',
transaction_section='CLNTPAY',
memo='$memo2',
amount='-$amount',
credit='$amount',
currency='$currency',
curr_rate='$curr_rate',
transaction_date='$date_paid',
transaction_code='$cr_transaction_code',
l_day='$day',
l_month='$month',
l_year='$year' WHERE transaction_code='$cr_transaction_code'";
$resultstrans2=mysql_query($sqltrans2) or die ("Error $sqltrans2.".mysql_error());

//header ("Location:receive_client_payment.php?addconfirm=1&invoice_payment_id=$latest_id");
?>
<script type="text/javascript">
alert('Record Saved Successfuly');
//window.location = "home.php?initiateproject=initiateproject&sub_module_id=<?php echo $sub_module_id; ?>";
window.location = "<?php echo $_SERVER['HTTP_REFERER']; ?>";
</script>
<?php
	
	
	
	
}

mysql_close($cnn);


?>


