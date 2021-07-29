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
$client_id=mysql_real_escape_string($_POST['supplier_id']);
$farmer_id=mysql_real_escape_string($_POST['farmer_id']);
$amount=mysql_real_escape_string($_POST['amount']);
$comments=mysql_real_escape_string($_POST['comments']);
$currency=mysql_real_escape_string($_POST['currency']);
$curr_rate=mysql_real_escape_string($_POST['curr_rate']);
$mop=mysql_real_escape_string($_POST['mop']);
$cheque_no=mysql_real_escape_string($_POST['cheque_no']);

$sqlrec="SELECT * FROM suppliers WHERE supplier_id='$client_id'";
$resultsrec= mysql_query($sqlrec) or die ("Error $sqlrec.".mysql_error());	
$rowsrec=mysql_fetch_object($resultsrec);

$c_name=mysql_real_escape_string($rowsrec->supplier_name);


$sqlst1="SELECT * FROM  farmers where farmer_id='$farmer_id'";
$resultst1= mysql_query($sqlst1) or die ("Error $sqlst1.".mysql_error());	
$rowst1=mysql_fetch_object($resultst1);	
$farmer_name=mysql_real_escape_string($rowst1->farmer_name);



if ($id=='')
{
	
$sql2= "INSERT INTO supplier_payments_code SET
supplier_id='$client_id',
farmer_id='$farmer_id',
order_code_id='$order_code_id',
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

$transaction_code='advsuppay'.$supplier_payments_code_id;


$orderdate = explode('-', $date_paid);
$year  = $orderdate[0];
$month = $orderdate[1];
$day   = $orderdate[2];

$cr_transaction_code="crlmpsuppay".$supplier_payments_code_id;
$dr_transaction_code="drlmpsuppay".$supplier_payments_code_id;



//$transaction='Advance Payment made to supplier supplier '.$c_name;

if ($farmer_id=='' || $farmer_id==0)
{
$transaction='Ref no '.$cheque_no.' paid to supplier '.$c_name.' <i>'.$comments.'</i>';
}
else
{
	
	$transaction='Ref no '.$cheque_no.' (Farmer : '.$farmer_name.') '.$comments.'';
	
}


$memo2=$transaction;

/////////////credit bank with the lampsome amount reduce bank balance.
//Credit account
$sqltrans2="INSERT INTO chart_transactions SET 
account_type_id='$account_to_credit',
transaction_section='LMPSUPPY',
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
//Debit account
$sqltrans="INSERT INTO chart_transactions SET 
account_type_id='$account_to_debit',
transaction_section='LMPSUPPY',
memo='$memo2',
amount='-$amount',
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



	
	
foreach($_POST['order_code_id'] as $row3=>$Order_Code_Id)

{
	
$order_code_id=mysql_real_escape_string($_POST['order_code_id'][$row3]);	

$sqlrecv="SELECT * FROM order_code_get WHERE order_code_id='$order_code_id'";
$resultsrecv= mysql_query($sqlrecv) or die ("Error $sqlrecv.".mysql_error());	
$rowsrecv=mysql_fetch_object($resultsrecv);
$invoice_no=$rowsrecv->lpo_no;


echo '</br>';

$order_amount_received=mysql_real_escape_string($_POST['order_amount_received'][$row3]);	


$ttl_order_amount=$ttl_order_amount+$order_amount_received;


$sql= "INSERT INTO supplier_payments SET
order_code_id='$order_code_id',
supplier_payment_code_id='$supplier_payments_code_id',
order_amount_received='$order_amount_received'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
$latest_id2=mysql_insert_id();

$transaction_code2='suppay'.$latest_id2;


$orderdate = explode('-', $date_paid);
$year  = $orderdate[0];
$month = $orderdate[1];
$day   = $orderdate[2];

$dr_transaction_code2="drsuppay".$latest_id2;
//$memo2="Payment from customers";
if ($farmer_id=='' || $farmer_id==0)
{
$transaction2='Supplier Payment <a href="pay_supplier.php?invoice_payment_id='.$latest_id2.'&invoice_no='.$invoice_no.'"> for order no : '.$invoice_no.'</a> paid to supplier '.$c_name;
}
else
{

$transaction2='Farmer Payment <a href="pay_supplier.php?invoice_payment_id='.$latest_id2.'&invoice_no='.$invoice_no.'"> for order no : '.$invoice_no.'</a> paid to supplier '.$c_name.' (Farmer : '.$farmer_name.' )';	
	
}
$memo22=$transaction2;

//customer statement

$sqltransc="INSERT INTO supplier_transactions SET 
supplier_id='$client_id',
farmer_id='$farmer_id',
transaction='$transaction2',
order_code='$order_code_id',
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
	
///////////advance to supplier payment
$sqltransc="INSERT INTO supplier_transactions SET 
supplier_id='$client_id',
farmer_id='$farmer_id',
transaction='$transaction',
amount='-$advance_payment2',
currency='$currency',
curr_rate='$curr_rate',
transaction_date='$date_paid',
transaction_code='$transaction_code'";
$resultstransc=mysql_query($sqltransc) or die ("Error $sqltransc.".mysql_error());	
	
	
	
}

	

?>
<script type="text/javascript">
alert('Record Saved Successfuly!! Posting No : <?php echo $supplier_payments_code_id; ?>');

window.location = "home.php?view_pay_supplier";
</script>
<?php
}



/////updates
else
{
	
	
	
	
$sql2= "UPDATE supplier_payments_code SET
supplier_id='$client_id',
farmer_id='$farmer_id',
order_code_id='$order_code_id',
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
date_received='$todate' WHERE supplier_payment_code_id='$id'";
$results2= mysql_query($sql2) or die ("Error $sql2.".mysql_error());

$supplier_payments_code_id=$id;	

$transaction_code='advsuppay'.$supplier_payments_code_id;


$orderdate = explode('-', $date_paid);
$year  = $orderdate[0];
$month = $orderdate[1];
$day   = $orderdate[2];

$cr_transaction_code="crlmpsuppay".$supplier_payments_code_id;
$dr_transaction_code="drlmpsuppay".$supplier_payments_code_id;

//$transaction='Advance Payment made to supplier supplier '.$c_name;

//$transaction='Advance Payment of ref no '.$cheque_no.' paid to supplier '.$c_name;

if ($farmer_id=='' || $farmer_id==0)
{
$transaction='Advance Payment of ref no '.$cheque_no.' paid to supplier '.$c_name.' <i>'.$comments.'</i>';
}
else
{
	
	$transaction='Advance Payment of ref no '.$cheque_no.' paid to supplier '.$c_name.' (Farmer : '.$farmer_name.') '.$comments.'';
	
}
$memo2=$transaction;

/////////////credit bank with the lampsome amount reduce bank balance.
//Credit account
$sqltrans2="UPDATE chart_transactions SET 
account_type_id='$account_to_credit',
transaction_section='LMPSUPPY',
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
transaction_section='LMPSUPPY',
memo='$memo2',
amount='-$amount',
debit='$amount',
currency='$currency',
curr_rate='$curr_rate',
transaction_date='$date_paid',
l_day='$day',
l_month='$month',
l_year='$year' WHERE transaction_code='$dr_transaction_code'";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());



	
	
foreach($_POST['order_code_id'] as $row3=>$Order_Code_Id)

{
	

echo $order_code_id=mysql_real_escape_string($_POST['order_code_id'][$row3]);	
echo $supplier_payment_id=mysql_real_escape_string($_POST['supplier_payment_id'][$row3]);	



if ($supplier_payment_id!='')
{
	
$sqlrecv="SELECT * FROM order_code_get WHERE order_code_id='$order_code_id'";
$resultsrecv= mysql_query($sqlrecv) or die ("Error $sqlrecv.".mysql_error());	
$rowsrecv=mysql_fetch_object($resultsrecv);
$invoice_no=$rowsrecv->lpo_no;


echo '</br>';

$order_amount_received=mysql_real_escape_string($_POST['order_amount_received'][$row3]);

$ttl_order_amount=$ttl_order_amount+$order_amount_received;


$sql= "UPDATE supplier_payments SET
order_code_id='$order_code_id',
supplier_payment_code_id='$supplier_payments_code_id',
order_amount_received='$order_amount_received' WHERE supplier_payment_id='$supplier_payment_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
$latest_id2=$supplier_payment_id;

$transaction_code2='suppay'.$latest_id2;


$orderdate = explode('-', $date_paid);
$year  = $orderdate[0];
$month = $orderdate[1];
$day   = $orderdate[2];

$dr_transaction_code2="drsuppay".$latest_id2;
//$memo2="Payment from customers";
if ($farmer_id=='' || $farmer_id==0)
{
$transaction2='Supplier Payment <a href="pay_supplier.php?invoice_payment_id='.$latest_id2.'&invoice_no='.$invoice_no.'"> for order no : '.$invoice_no.'</a> paid to supplier '.$c_name;
}
else
{

$transaction2='Supplier Payment <a href="pay_supplier.php?invoice_payment_id='.$latest_id2.'&invoice_no='.$invoice_no.'"> for order no : '.$invoice_no.'</a> paid to supplier '.$c_name.' (Farmer : '.$farmer_name.') '.$comments.'';
	
	
	
}

$memo22=$transaction2;

//customer statement

$sqltransc="UPDATE supplier_transactions SET 
supplier_id='$client_id',
farmer_id='$farmer_id',
transaction='$transaction2',
order_code='$order_code_id',
amount='-$order_amount_received',
currency='$currency',
curr_rate='$curr_rate',
transaction_date='$date_paid' WHERE transaction_code='$transaction_code2'";
$resultstransc=mysql_query($sqltransc) or die ("Error $sqltransc.".mysql_error());
	
	
	
}

else
{

$sqlrecv="SELECT * FROM order_code_get WHERE order_code_id='$order_code_id'";
$resultsrecv= mysql_query($sqlrecv) or die ("Error $sqlrecv.".mysql_error());	
$rowsrecv=mysql_fetch_object($resultsrecv);
$invoice_no=$rowsrecv->lpo_no;


echo '</br>';

$order_amount_received=mysql_real_escape_string($_POST['order_amount_received'][$row3]);	

$ttl_order_amount=$ttl_order_amount+$order_amount_received;


$sql= "INSERT INTO supplier_payments SET
order_code_id='$order_code_id',
supplier_payment_code_id='$supplier_payments_code_id',
order_amount_received='$order_amount_received'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
$latest_id2=mysql_insert_id();

$transaction_code2='suppay'.$latest_id2;


$orderdate = explode('-', $date_paid);
$year  = $orderdate[0];
$month = $orderdate[1];
$day   = $orderdate[2];

$dr_transaction_code2="drsuppay".$latest_id2;
//$memo2="Payment from customers";

if ($farmer_id=='' || $farmer_id==0)
{
$transaction2='Supplier Payment <a href="pay_supplier.php?invoice_payment_id='.$latest_id2.'&invoice_no='.$invoice_no.'"> for order no : '.$invoice_no.'</a> paid to supplier '.$c_name;
}
else
{

$transaction2='Supplier Payment <a href="pay_supplier.php?invoice_payment_id='.$latest_id2.'&invoice_no='.$invoice_no.'"> for order no : '.$invoice_no.'</a> paid to supplier '.$c_name.' (Farmer : '.$farmer_name.') '.$comments.'';
	
	
	
}


$memo22=$transaction2;

//customer statement

$sqltransc="INSERT INTO supplier_transactions SET 
supplier_id='$client_id',
farmer_id='$farmer_id',
transaction='$transaction2',
order_code='$order_code_id',
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

$sqldl= "delete from supplier_transactions where transaction_code='$transaction_code'";
$resultsdl= mysql_query($sqldl) or die ("Error $sqldl.".mysql_error());

if ($resultsdl)
{

if ($advance_payment2<=0)
{


	
	
	
}
else
{
$sqltransc="INSERT INTO supplier_transactions SET 
supplier_id='$client_id',
farmer_id='$farmer_id',
transaction='$transaction',
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
alert('Record Updated Successfuly Posting No : <?php echo $supplier_payments_code_id; ?>');
window.location = "home.php?view_pay_supplier";
</script>
<?php
}
	
	
	
	
	
	
	
	


mysql_close($cnn);


?>


