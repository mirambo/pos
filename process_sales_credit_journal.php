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
	
$sql2= "INSERT INTO sales_debit_journal SET
customer_id='$client_id',
recorded_by='$user_id',
amount_received='$amount',
description='$comments',
cheque_no='$cheque_no',
currency_code='$currency',
curr_rate='$curr_rate',
account_to_credit='$account_to_credit',
account_to_debit='$account_to_debit',
mop='$mop',
journal_type='CRD',
date_paid='$date_paid',
date_received='$todate'";
$results2= mysql_query($sql2) or die ("Error $sql2.".mysql_error());

$customer_payments_code_id=mysql_insert_id();	

$transaction_code='slcrtjn'.$customer_payments_code_id;




$orderdate = explode('-', $date_paid);
$year  = $orderdate[0];
$month = $orderdate[1];
$day   = $orderdate[2];

$cr_transaction_code="crslcrtjn".$customer_payments_code_id;
$dr_transaction_code="drslcrtjn".$customer_payments_code_id;




//$transaction='Lampsum amount of ref no '.$cheque_no.' to pay for multiple customer invoice from customer '.$c_name;
$transaction='Sales Credit Journal entry of ref no '.$cheque_no.' <i>('.$comments.')</i> for customer '.$c_name;


//customer statement

$sqltransc="INSERT INTO customer_transactions SET 
customer_id='$client_id',
transaction='$transaction',
sales_id='$sales_id',
amount='-$amount',
currency='$currency',
curr_rate='$curr_rate',
transaction_date='$date_paid',
transaction_code='$transaction_code'";
$resultstransc=mysql_query($sqltransc) or die ("Error $sqltransc.".mysql_error());

$memo2=$transaction;

/////////////credit bank with the lampsome amount reduce bank balance.
//Debit sales ldeger control

$sql34c="select * FROM account_type where account_type_id='$account_to_debit'";
$results34c= mysql_query($sql34c) or die ("Error $sql34c.".mysql_error());
$rows34c=mysql_fetch_object($results34c);
$bal_type=$rows34c->balance_type;


if ($bal_type=='D')
{
	
	$amountx=$amount;
}
else
{
	
	$amountx=-$amount;
	
}


$sqltrans2="INSERT INTO chart_transactions SET 
account_type_id='$account_to_debit',
transaction_section='SLCRJRNL',
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
$resultstrans2=mysql_query($sqltrans2) or die ("Error $sqltrans2.".mysql_error());



//debit purchase ledger control

//insert into books
//credit account selected bank
$sql34cy="select * FROM account_type where account_type_id='$account_to_credit'";
$results34cy= mysql_query($sql34cy) or die ("Error $sql34cy.".mysql_error());
$rows34cy=mysql_fetch_object($results34cy);
$bal_typey=$rows34cy->balance_type;


if ($bal_typey=='C')
{
	
	$amounty=$amount;
}
else
{
	
	$amounty=-$amount;
	
}

$sqltrans="INSERT INTO chart_transactions SET 
account_type_id='$account_to_credit',
transaction_section='SLCRJRNL',
memo='$memo2',
amount='$amounty',
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
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());

?>
<script type="text/javascript">
alert('Record Saved Successfuly');

window.location = "home.php?view_sales_credit_journal";
</script>
<?php
}



/////updates
else
{
	
	
	
$sql2= "UPDATE sales_debit_journal SET
customer_id='$client_id',
amount_received='$amount',
description='$comments',
cheque_no='$cheque_no',
currency_code='$currency',
curr_rate='$curr_rate',
account_to_credit='$account_to_credit',
account_to_debit='$account_to_debit',
mop='$mop',
journal_type='CRD',
date_paid='$date_paid' WHERE sales_debit_journal_id='$id'";
$results2= mysql_query($sql2) or die ("Error $sql2.".mysql_error());

$customer_payments_code_id=$id;	

$transaction_code='slcrtjn'.$customer_payments_code_id;


$orderdate = explode('-', $date_paid);
$year  = $orderdate[0];
$month = $orderdate[1];
$day   = $orderdate[2];

$cr_transaction_code="crslcrtjn".$customer_payments_code_id;
$dr_transaction_code="drslcrtjn".$customer_payments_code_id;




//$transaction='Lampsum amount of ref no '.$cheque_no.' to pay for multiple customer invoice from customer '.$c_name;
$transaction='Sales Credit Journal entry of ref no '.$cheque_no.' <i>('.$comments.')</i> for customer '.$c_name;


//customer statement
$sqltransc="UPDATE customer_transactions SET 
customer_id='$client_id',
transaction='$transaction',
sales_id='$sales_id',
amount='-$amount',
currency='$currency',
curr_rate='$curr_rate',
transaction_date='$date_paid' WHERE transaction_code='$transaction_code'";
$resultstransc=mysql_query($sqltransc) or die ("Error $sqltransc.".mysql_error());

$memo2=$transaction;

/////////////credit bank with the lampsome amount reduce bank balance.
//Debit sales ldeger control

$sql34c="select * FROM account_type where account_type_id='$account_to_debit'";
$results34c= mysql_query($sql34c) or die ("Error $sql34c.".mysql_error());
$rows34c=mysql_fetch_object($results34c);
$bal_type=$rows34c->balance_type;


if ($bal_type=='D')
{
	
	$amountx=$amount;
}
else
{
	
	$amountx=-$amount;
	
}


$sqltrans2="UPDATE chart_transactions SET 
account_type_id='$account_to_debit',
transaction_section='SLCRJRNL',
memo='$memo2',
amount='$amountx',
debit='$amount',
currency='$currency',
curr_rate='$curr_rate',
transaction_date='$date_paid',
l_day='$day',
l_month='$month',
l_year='$year' WHERE transaction_code='$dr_transaction_code'";
$resultstrans2=mysql_query($sqltrans2) or die ("Error $sqltrans2.".mysql_error());



//debit purchase ledger control

//insert into books
//credit account selected bank
$sql34cy="select * FROM account_type where account_type_id='$account_to_credit'";
$results34cy= mysql_query($sql34cy) or die ("Error $sql34cy.".mysql_error());
$rows34cy=mysql_fetch_object($results34cy);
$bal_typey=$rows34cy->balance_type;


if ($bal_typey=='C')
{
	
	$amounty=$amount;
}
else
{
	
	$amounty=-$amount;
	
}


$sqltrans="UPDATE chart_transactions SET 
account_type_id='$account_to_credit',
transaction_section='SLCRJRNL',
memo='$memo2',
amount='$amounty',
credit='$amount',
currency='$currency',
curr_rate='$curr_rate',
transaction_date='$date_paid',
transaction_datetime_recorded='$todate',
transaction_user_id='$user_id',
l_day='$day',
l_month='$month',
l_year='$year' WHERE transaction_code='$cr_transaction_code'";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());
		
	
?>
<script type="text/javascript">
alert('Record Updated Successfuly');

window.location = "home.php?view_sales_credit_journal";
</script>
<?php
}


mysql_close($cnn);


?>


