<?php
#include connection
include('Connections/fundmaster.php');
include('includes/session.php');
$id=$_GET['id'];
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$account_to_credit=mysql_real_escape_string($_POST['credit_account_id']);
$account_to_debit=mysql_real_escape_string($_POST['debit_account_id']);
$date_paid=mysql_real_escape_string($_POST['date_paid']);
$amount=mysql_real_escape_string($_POST['amount']);
$comments=mysql_real_escape_string($_POST['comments']);
$currency=mysql_real_escape_string($_POST['currency']);
$curr_rate=mysql_real_escape_string($_POST['curr_rate']);
$mop=mysql_real_escape_string($_POST['mop']);
$cheque_no=mysql_real_escape_string($_POST['cheque_no']);



if ($id=='')
{
	
$sql2= "INSERT INTO cheque_received SET
recorded_by='$user_id',
amount='$amount',
comments='$comments',
ref_no='$cheque_no',
currency='$currency',
curr_rate='$curr_rate',
account_to_credit='$account_to_credit',
account_to_debit='$account_to_debit',
trans_type='PAID',
mop='$mop',
date_recorded='$date_paid',
datetime_recorded='$todate'";
$results2= mysql_query($sql2) or die ("Error $sql2.".mysql_error());

$customer_payments_code_id=mysql_insert_id();	

//$transaction_code='ccrec'.$customer_payments_code_id;


$orderdate = explode('-', $date_paid);
$year  = $orderdate[0];
$month = $orderdate[1];
$day   = $orderdate[2];


$cr_transaction_code="crccpaid".$customer_payments_code_id;
$dr_transaction_code="drccpaid".$customer_payments_code_id;


$memo2='Cash or Cheque paid, reference no '.$cheque_no.' ('.$comments.')';



/////////////credit obank
//Credit bank
$sqltrans2="INSERT INTO chart_transactions SET 
account_type_id='$account_to_credit',
transaction_section='CCPAID',
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


//debit selected account

$sql34c="select * FROM account_type where account_type_id='$account_to_debit'";
$results34c= mysql_query($sql34c) or die ("Error $sql34c.".mysql_error());
$rows34c=mysql_fetch_object($results34c);
echo $bal_type=$rows34c->balance_type;


if ($bal_type=='D')
{
	
	$amountx=$amount;
}
else
{
	
	$amountx=-$amount;
	
}
$sqltrans="INSERT INTO chart_transactions SET 
account_type_id='$account_to_debit',
transaction_section='CCPAID',
memo='$memo2',
amount='$amountx',
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


?>
<script type="text/javascript">
alert('Record Saved Successfuly. Posting No <?php echo $customer_payments_code_id; ?>');
window.location = "home.php?view_pay_cheque_payment";
</script>
<?php
}
/////updates
else
{
	
	
$sql2= "UPDATE cheque_received SET
amount='$amount',
comments='$comments',
ref_no='$cheque_no',
currency='$currency',
trans_type='PAID',
curr_rate='$curr_rate',
account_to_credit='$account_to_credit',
account_to_debit='$account_to_debit',
mop='$mop',
date_recorded='$date_paid' WHERE cheque_received_id='$id'";
$results2= mysql_query($sql2) or die ("Error $sql2.".mysql_error());

$customer_payments_code_id=$id;	

$transaction_code='ccrec'.$customer_payments_code_id;


$orderdate = explode('-', $date_paid);
$year  = $orderdate[0];
$month = $orderdate[1];
$day   = $orderdate[2];

$cr_transaction_code="crccpaid".$id;
$dr_transaction_code="drccpaid".$id;


$memo2='Cash or Cheque paid, reference no '.$cheque_no.' ('.$comments.')';





//Credit bank

$sqltrans2="UPDATE chart_transactions SET 
account_type_id='$account_to_credit',
transaction_section='CCPAID',
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



//debit account selected
$sql34c="select * FROM account_type where account_type_id='$account_to_debit'";
$results34c= mysql_query($sql34c) or die ("Error $sql34c.".mysql_error());
$rows34c=mysql_fetch_object($results34c);
echo $bal_type=$rows34c->balance_type;


if ($bal_type=='D')
{
	
	$amountx=$amount;
}
else
{
	
	$amountx=-$amount;
	
}
$sqltrans="UPDATE chart_transactions SET 
account_type_id='$account_to_debit',
transaction_section='CCPAID',
memo='$memo2',
amount='$amountx',
debit='$amount',
currency='$currency',
curr_rate='$curr_rate',
transaction_date='$date_paid',
l_day='$day',
l_month='$month',
l_year='$year' WHERE transaction_code='$dr_transaction_code'";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());
		

?>
<script type="text/javascript">
alert('Record Updated Successfuly Posting No <?php echo $customer_payments_code_id; ?>');

window.location = "home.php?view_pay_cheque_payment";
</script>
<?php
}
	
	
	
mysql_close($cnn);


?>


