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
//$client_id=mysql_real_escape_string($_POST['supplier_id']);
$farmer_id=mysql_real_escape_string($_POST['farmer_id']);
$amount=mysql_real_escape_string($_POST['amount']);
$comments=mysql_real_escape_string($_POST['comments']);
$currency=mysql_real_escape_string($_POST['currency']);
$curr_rate=mysql_real_escape_string($_POST['curr_rate']);
$mop=mysql_real_escape_string($_POST['mop']);
$cheque_no=mysql_real_escape_string($_POST['cheque_no']);



$sqlst1="SELECT * FROM  farmers where farmer_id='$farmer_id'";
$resultst1= mysql_query($sqlst1) or die ("Error $sqlst1.".mysql_error());	
$rowst1=mysql_fetch_object($resultst1);	
$farmer_name=mysql_real_escape_string($rowst1->farmer_name);



if ($id=='')
{
	
$sql2= "INSERT INTO farmers_advance_payments SET
farmer_id='$farmer_id',
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
$supplier_payments_code_id=mysql_insert_id();	

$dr_transaction_code='dr-advfarmpay'.$supplier_payments_code_id;
$cr_transaction_code='cr-advfarmpay'.$supplier_payments_code_id;

$transaction_code2='advfarmpay'.$supplier_payments_code_id;


$orderdate = explode('-', $date_paid);
$year  = $orderdate[0];
$month = $orderdate[1];
$day   = $orderdate[2];


////$transaction='Ref no '.$cheque_no.' paid to supplier '.$c_name.' <i>'.$comments.'</i>';




//$transaction2='Farmer Advance Payment <a href="pay_supplier.php?invoice_payment_id='.$latest_id2.'&invoice_no='.$invoice_no.'"> for order no : '.$invoice_no.'</a> paid to supplier '.$c_name.' (Farmer : '.$farmer_name.' )';	
$transaction2='Farmer Advance Payment (Farmer : '.$farmer_name.' ) Ref: '.$cheque_no;	
$memo2=$transaction2;
$sqltransc="INSERT INTO supplier_transactions SET 
supplier_id='39',
farmer_id='$farmer_id',
transaction='$transaction2',
order_code='$order_code_id',
amount='-$amount',
currency='$currency',
curr_rate='$curr_rate',
transaction_date='$date_paid',
transaction_code='$transaction_code2'";
$resultstransc=mysql_query($sqltransc) or die ("Error $sqltransc.".mysql_error());

/////////////credit bank with the lampsome amount reduce bank balance.
//Credit account

$sqlemp_det2c="select * from account_type where account_type_id='$account_to_credit'";
$resultsemp_det2c= mysql_query($sqlemp_det2c) or die ("Error $sqlemp_det2c.".mysql_error());
$rowsemp_det2c=mysql_fetch_object($resultsemp_det2c);

$bal_type2c=$rowsemp_det2c->balance_type;

if ($bal_type2c=='C')
{
	
	$acc_journal_amountc=$amount;
	
}
else
{
	
	$acc_journal_amountc='-'.$amount;
	
}








$sqltrans2="INSERT INTO chart_transactions SET 
account_type_id='$account_to_credit',
transaction_section='FRMADVPY',
memo='$memo2',
amount='$acc_journal_amountc',
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
//Debit account
$sqlemp_det2d="select * from account_type where account_type_id='$account_to_debit'";
$resultsemp_det2d= mysql_query($sqlemp_det2d) or die ("Error $sqlemp_det2d.".mysql_error());
$rowsemp_det2d=mysql_fetch_object($resultsemp_det2d);

$bal_type2d=$rowsemp_det2d->balance_type;

if ($bal_type2d=='D')
{
	
	$acc_journal_amountd=$amount;
	
}
else
{
	
	$acc_journal_amountd='-'.$amount;
	
}



$sqltrans="INSERT INTO chart_transactions SET 
account_type_id='$account_to_debit',
transaction_section='FRMADVPY',
memo='$memo2',
amount='$acc_journal_amountd',
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
alert('Record Saved Successfuly!! Posting No : <?php echo $supplier_payments_code_id; ?>');

window.location = "home.php?farmers_advances";
</script>
<?php
}
else
{
	
$sql2= "UPDATE farmers_advance_payments SET
farmer_id='$farmer_id',
amount_received='$amount',
description='$comments',
cheque_no='$cheque_no',
currency_code='$currency',
curr_rate='$curr_rate',
account_to_credit='$account_to_credit',
account_to_debit='$account_to_debit',
mop='$mop',
date_paid='$date_paid' WHERE farmers_advance_payment_id='$id'";
$results2= mysql_query($sql2) or die ("Error $sql2.".mysql_error());

$supplier_payments_code_id=$id;

$dr_transaction_code='dr-advfarmpay'.$supplier_payments_code_id;
$cr_transaction_code='cr-advfarmpay'.$supplier_payments_code_id;

$transaction_code2='advfarmpay'.$supplier_payments_code_id;



$orderdate = explode('-', $date_paid);
$year  = $orderdate[0];
$month = $orderdate[1];
$day   = $orderdate[2];


////$transaction='Ref no '.$cheque_no.' paid to supplier '.$c_name.' <i>'.$comments.'</i>';




//$transaction2='Farmer Advance Payment <a href="pay_supplier.php?invoice_payment_id='.$latest_id2.'&invoice_no='.$invoice_no.'"> for order no : '.$invoice_no.'</a> paid to supplier '.$c_name.' (Farmer : '.$farmer_name.' )';	
$transaction2='Farmer Advance Payment (Farmer : '.$farmer_name.' ) Ref: '.$cheque_no;	
$memo2=$transaction2;
$sqltransc="UPDATE supplier_transactions SET 
supplier_id='39',
farmer_id='$farmer_id',
transaction='$transaction2',
order_code='$order_code_id',
amount='-$amount',
currency='$currency',
curr_rate='$curr_rate',
transaction_date='$date_paid' WHERE
transaction_code='$transaction_code2'";
$resultstransc=mysql_query($sqltransc) or die ("Error $sqltransc.".mysql_error());


//Credit account

$sqlemp_det2c="select * from account_type where account_type_id='$account_to_credit'";
$resultsemp_det2c= mysql_query($sqlemp_det2c) or die ("Error $sqlemp_det2c.".mysql_error());
$rowsemp_det2c=mysql_fetch_object($resultsemp_det2c);

$bal_type2c=$rowsemp_det2c->balance_type;

if ($bal_type2c=='C')
{
	
	$acc_journal_amountc=$amount;
	
}
else
{
	
	$acc_journal_amountc='-'.$amount;
	
}

$sqltrans2="UPDATE chart_transactions SET 
account_type_id='$account_to_credit',
transaction_section='FRMADVPY',
memo='$memo2',
amount='$acc_journal_amountc',
credit='$amount',
currency='$currency',
curr_rate='$curr_rate',
transaction_date='$date_paid',
transaction_code='$cr_transaction_code',
l_day='$day',
l_month='$month',
l_year='$year' WHERE transaction_code='$cr_transaction_code'";
$resultstrans2=mysql_query($sqltrans2) or die ("Error $sqltrans2.".mysql_error());


//Debit account
$sqlemp_det2d="select * from account_type where account_type_id='$account_to_debit'";
$resultsemp_det2d= mysql_query($sqlemp_det2d) or die ("Error $sqlemp_det2d.".mysql_error());
$rowsemp_det2d=mysql_fetch_object($resultsemp_det2d);

$bal_type2d=$rowsemp_det2d->balance_type;

if ($bal_type2d=='D')
{
	
	$acc_journal_amountd=$amount;
	
}
else
{
	
	$acc_journal_amountd='-'.$amount;
	
}



$sqltrans="UPDATE chart_transactions SET 
account_type_id='$account_to_debit',
transaction_section='FRMADVPY',
memo='$memo2',
amount='$acc_journal_amountd',
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
alert('Record Updated Successfuly Posting No : <?php echo $supplier_payments_code_id; ?>');
window.location = "home.php?view_farmers_advances";
</script>
<?php
}
	


mysql_close($cnn);


?>


