<?php
#include connection
include('Connections/fundmaster.php');
include('includes/session.php');
include('vat_calc.php');
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
$vat_status=mysql_real_escape_string($_POST['vat']);

if ($vat_status==0)
{
	
$vat_value=0;	
}
else
{

$vat_value=$amount*$vat_perc;	
	
}

$ttl_amount=$amount+$vat_value;






$sqlrec="SELECT * FROM suppliers WHERE supplier_id='$client_id'";
$resultsrec= mysql_query($sqlrec) or die ("Error $sqlrec.".mysql_error());	
$rowsrec=mysql_fetch_object($resultsrec);

$c_name=mysql_real_escape_string($rowsrec->sup_code).' '.mysql_real_escape_string($rowsrec->supplier_name);



if ($id=='')
{
	
$sql2= "INSERT INTO purchases_debit_journal SET
supplier_id='$client_id',
recorded_by='$user_id',
amount_received='$amount',
vat='$vat_status',
vat_value='$vat_value',
description='$comments',
cheque_no='$cheque_no',
currency_code='$currency',
curr_rate='$curr_rate',
account_to_credit='$account_to_credit',
account_to_debit='$account_to_debit',
mop='$mop',
journal_type='DRT',
date_paid='$date_paid',
date_received='$todate'";
$results2= mysql_query($sql2) or die ("Error $sql2.".mysql_error());

$customer_payments_code_id=mysql_insert_id();	

$transaction_code='prcdbtjn'.$customer_payments_code_id;




$orderdate = explode('-', $date_paid);
$year  = $orderdate[0];
$month = $orderdate[1];
$day   = $orderdate[2];

$cr_transaction_code="crprcdbtjn".$customer_payments_code_id;
$dr_transaction_code="drprcdbtjn".$customer_payments_code_id;
$cr_vat_transaction_code="crvatprccrtjn".$customer_payments_code_id;




//$transaction='Lampsum amount of ref no '.$cheque_no.' to pay for multiple customer invoice from customer '.$c_name;
$transaction='Purchases Debit Journal entry of ref no '.$cheque_no.' <i>('.$comments.')</i> for supplier '.$c_name;
$transaction_vat='VAT on Purchases Debit Journal entry of ref no '.$cheque_no.' <i>('.$comments.')</i> for supplier '.$c_name;


//customer statement

$sqltransc="INSERT INTO supplier_transactions SET 
supplier_id='$client_id',
transaction='$transaction',
amount='$ttl_amount',
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
	
	$amountx=$ttl_amount;
}
else
{
	
	$amountx=-$ttl_amount;
	
}


$sqltrans2="INSERT INTO chart_transactions SET 
account_type_id='$account_to_debit',
transaction_section='PRCDJRNL',
memo='$memo2',
amount='$amountx',
debit='$ttl_amount',
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
//credit account selected ie the currency loss 
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
transaction_section='PRCDJRNL',
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

//////////////////credit the vat asset account
$sqltrans2="INSERT INTO chart_transactions SET 
account_type_id='69',
transaction_section='PRCCJRNL',
memo='$transaction_vat',
amount='$vat_value',
debit='$vat_value',
currency='$currency',
curr_rate='$curr_rate',
transaction_date='$date_paid',
transaction_datetime_recorded='$todate',
transaction_code='$cr_vat_transaction_code',
transaction_user_id='$user_id',
l_day='$day',
l_month='$month',
l_year='$year'";
$resultstrans2=mysql_query($sqltrans2) or die ("Error $sqltrans2.".mysql_error());


?>
<script type="text/javascript">
alert('Record Saved Successfuly');

window.location = "home.php?view_purchases_debit_journal";
</script>
<?php
}



/////updates
else
{
	
	
	
$sql2= "UPDATE purchases_debit_journal SET
supplier_id='$client_id',
amount_received='$amount',
vat='$vat_status',
vat_value='$vat_value',
description='$comments',
cheque_no='$cheque_no',
currency_code='$currency',
curr_rate='$curr_rate',
journal_type='DRT',
account_to_credit='$account_to_credit',
account_to_debit='$account_to_debit',
mop='$mop',
date_paid='$date_paid' WHERE purchases_debit_journal_id='$id'";
$results2= mysql_query($sql2) or die ("Error $sql2.".mysql_error());

$customer_payments_code_id=$id;	

$transaction_code='prcdbtjn'.$customer_payments_code_id;


$orderdate = explode('-', $date_paid);
$year  = $orderdate[0];
$month = $orderdate[1];
$day   = $orderdate[2];

$cr_transaction_code="crprcdbtjn".$customer_payments_code_id;
$dr_transaction_code="drprcdbtjn".$customer_payments_code_id;
$cr_vat_transaction_code="crvatprccrtjn".$customer_payments_code_id;




//$transaction='Lampsum amount of ref no '.$cheque_no.' to pay for multiple customer invoice from customer '.$c_name;
$transaction='Purchases Debit Journal entry of ref no '.$cheque_no.' <i>('.$comments.')</i> for supplier '.$c_name;
$transaction_vat='VAT on Purchases Debit Journal entry of ref no '.$cheque_no.' <i>('.$comments.')</i> for supplier '.$c_name;


//customer statement
$sqltransc="UPDATE supplier_transactions SET 
supplier_id='$client_id',
transaction='$transaction',
amount='$ttl_amount',
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
	
	$amountx=$ttl_amount;
}
else
{
	
	$amountx=-$ttl_amount;
	
}


$sqltrans2="UPDATE chart_transactions SET 
account_type_id='$account_to_debit',
transaction_section='PRCDJRNL',
memo='$memo2',
amount='$amountx',
debit='$ttl_amount',
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
transaction_section='PRCDJRNL',
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



//////////////////credit the vat asset account
$sqltrans2="UPDATE chart_transactions SET 
account_type_id='69',
transaction_section='PRCCJRNL',
memo='$transaction_vat',
amount='$vat_value',
debit='$vat_value',
currency='$currency',
curr_rate='$curr_rate',
transaction_date='$date_paid',
l_day='$day',
l_month='$month',
l_year='$year' WHERE transaction_code='$cr_vat_transaction_code'";
$resultstrans2=mysql_query($sqltrans2) or die ("Error $sqltrans2.".mysql_error());
		
?>
<script type="text/javascript">
alert('Record Updated Successfuly');

window.location = "home.php?view_purchases_debit_journal";
</script>
<?php
}

mysql_close($cnn);


?>


