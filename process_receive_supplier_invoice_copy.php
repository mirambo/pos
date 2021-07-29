<?php
#include connection
include('Connections/fundmaster.php');
include('includes/session.php');
$id=$_GET['id'];
$order_code_id=$_GET['order_code_id'];
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$account_to_credit=mysql_real_escape_string($_POST['credit_account_id']);
$account_to_debit=mysql_real_escape_string($_POST['debit_account_id']);

$sqlrecv="select * FROM currency,suppliers,order_code_get WHERE order_code_get.currency=currency.curr_id
AND order_code_get.supplier_id=suppliers.supplier_id 
AND order_code_get.order_code_id='$order_code_id'";
$resultsrecv= mysql_query($sqlrecv) or die ("Error $sqlrecv.".mysql_error());	
$rowsrecv=mysql_fetch_object($resultsrecv);
$lpo_no=$rowsrecv->lpo_no;
$lpo_ref_no=$rowsrecv->ref_no;
$supplier_id=$rowsrecv->supplier_id;

$date_paid=mysql_real_escape_string($_POST['date_paid']);
//$supplier_id=mysql_real_escape_string($_POST['supplier_id']);
$ref_no=mysql_real_escape_string($_POST['ref_no']);
$comments=mysql_real_escape_string($_POST['comments']);
$ttl_cost=mysql_real_escape_string($_POST['ttl_cost']);
$ttl_vat_value=mysql_real_escape_string($_POST['ttl_vat_value']);
$ttl_order_value=mysql_real_escape_string($_POST['ttl_order_value']);
$desc=mysql_real_escape_string($_POST['desc']);
$currency=mysql_real_escape_string($_POST['currency']);
$curr_rate=mysql_real_escape_string($_POST['curr_rate']);
//$mop=mysql_real_escape_string($_POST['mop']);
if ($ttl_vat_value==0 || $ttl_vat_value=='')
{
$vat_account_id=0;	
}
else
{
$vat_account_id=69;
}

$supplier_name=mysql_real_escape_string($rowsrecv->supplier_name);



if ($id=='')
{


$sql= "INSERT INTO received_supplier_invoice SET
supplier_id='$supplier_id',
order_code_id='$order_code_id',
recorded_by='$user_id',
supplier_invoice_no='$ref_no',
ttl_cost='$ttl_cost',
ttl_vat='$ttl_vat_value',
ttl_order_amount='$ttl_order_value',
comments='$comments',
currency='$currency',
curr_rate='$curr_rate',
vat_account_id='$vat_account_id',
account_to_credit='$account_to_credit',
account_to_debit='$account_to_debit',
date_paid='$date_paid',
date_received='$todate'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
$latest_id2=mysql_insert_id();

$transaction_code='recsupinv'.$latest_id2;








$orderdate = explode('-', $date_paid);
$year  = $orderdate[0];
$month = $orderdate[1];
$day   = $orderdate[2];
$cr_transaction_code="crsuprecinv".$latest_id2;
$dr_transaction_code="drsuprecinv".$latest_id2;
$crvt_transaction_code="crvtsuprecinv".$latest_id2;


$memo2='Received Supplier Invoice of ref/invoice no '.$ref_no.' from supplier '.$supplier_name.' for order number <a href="begin_order.php?order_code='.$order_code_id.'">'.$lpo_no.' order ref no '.$lpo_ref_no.'</a>';
$memo3='VAT on Received Supplier Invoice of ref/invoice no '.$ref_no.' from supplier '.$supplier_name.' for <a href="begin_order.php?order_code='.$order_code_id.'">order number '.$lpo_no.' order ref no '.$lpo_ref_no.'</a>';

$transaction='Received Supplier Invoice of ref/invoice no '.$ref_no.' for <a href="begin_order.php?order_code='.$order_code_id.'">order number '.$lpo_no.' order ref no '.$lpo_ref_no.'</a>';


//customer statement

$sqltransc="INSERT INTO supplier_transactions SET 
supplier_id='$supplier_id',
transaction='$transaction',
order_code='$order_code_id',
amount='$ttl_order_value',
currency='$currency',
curr_rate='$curr_rate',
transaction_date='$date_paid',
transaction_code='$transaction_code'";
$resultstransc=mysql_query($sqltransc) or die ("Error $sqltransc.".mysql_error());



//debit GMV account
$sqltrans="INSERT INTO chart_transactions SET 
account_type_id='$account_to_debit',
transaction_section='RECSUPINV',
memo='$memo2',
amount='-$ttl_cost',
debit='$ttl_cost',
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


//Credit purchase ledger controll account
$sqltrans2="INSERT INTO chart_transactions SET 
account_type_id='$account_to_credit',
transaction_section='RECSUPINV',
memo='$memo2',
amount='$ttl_order_value',
credit='$ttl_order_value',
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


if ($ttl_vat_value!=0 || $ttl_vat_value!='')
{
	
	//Credit vat account
$sqltrans2="INSERT INTO chart_transactions SET 
account_type_id='$vat_account_id',
transaction_section='RECSUPINV',
memo='$memo3',
amount='$ttl_vat_value',
debit='$ttl_vat_value',
currency='$currency',
curr_rate='$curr_rate',
transaction_date='$date_paid',
transaction_datetime_recorded='$todate',
transaction_code='$crvt_transaction_code',
transaction_user_id='$user_id',
l_day='$day',
l_month='$month',
l_year='$year'";
$resultstrans2=mysql_query($sqltrans2) or die ("Error $sqltrans2.".mysql_error());
	
}
else
{
	
	
	
}



$sqlst="UPDATE order_code_get SET
status='3' WHERE order_code_id='$order_code_id'";
$resultst=mysql_query($sqlst) or die ("Error $sqlst.".mysql_error());


//header ("Location:receive_client_payment.php?addconfirm=1&invoice_payment_id=$latest_id");
?>
<script type="text/javascript">
alert('Record Saved Successfuly');
//window.location = "home.php?initiateproject=initiateproject&sub_module_id=<?php echo $sub_module_id; ?>";
window.location = "home.php?receive_supplier_invoice";
</script>
<?php
}



/////updates
else
{
	

$sql= "UPDATE received_supplier_invoice SET
supplier_id='$supplier_id',
supplier_invoice_no='$ref_no',
ttl_cost='$ttl_cost',
ttl_vat='$ttl_vat_value',
ttl_order_amount='$ttl_order_value',
comments='$comments',
currency='$currency',
curr_rate='$curr_rate',
vat_account_id='$vat_account_id',
account_to_credit='$account_to_credit',
account_to_debit='$account_to_debit',
date_paid='$date_paid',
date_received='$todate' WHERE received_supplier_invoice_id='$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
$latest_id2=$id;

$transaction_code='recsupinv'.$latest_id2;



$orderdate = explode('-', $date_paid);
$year  = $orderdate[0];
$month = $orderdate[1];
$day   = $orderdate[2];
$cr_transaction_code="crsuprecinv".$latest_id2;
$dr_transaction_code="drsuprecinv".$latest_id2;
$crvt_transaction_code="crvtsuprecinv".$latest_id2;


$memo2='Received Supplier Invoice of ref/invoice no '.$ref_no.' from supplier '.$supplier_name.' for order number <a href="begin_order.php?order_code='.$order_code_id.'">'.$lpo_no.' order ref no '.$lpo_ref_no.'</a>';
$memo3='VAT on Received Supplier Invoice of ref/invoice no '.$ref_no.' from supplier '.$supplier_name.' for <a href="begin_order.php?order_code='.$order_code_id.'">order number '.$lpo_no.' order ref no '.$lpo_ref_no.'</a>';

$transaction='Received Supplier Invoice of ref/invoice no '.$ref_no.' for <a href="begin_order.php?order_code='.$order_code_id.'">order number '.$lpo_no.' order ref no '.$lpo_ref_no.'</a>';


//customer statement

$sqltransc="UPDATE supplier_transactions SET 
supplier_id='$supplier_id',
transaction='$transaction',
order_code='$order_code_id',
amount='$ttl_order_value',
currency='$currency',
curr_rate='$curr_rate',
transaction_date='$date_paid' WHERE transaction_code='$transaction_code'";
$resultstransc=mysql_query($sqltransc) or die ("Error $sqltransc.".mysql_error());



//debit GMV account
$sqltrans="UPDATE chart_transactions SET 
account_type_id='$account_to_debit',
transaction_section='RECSUPINV',
memo='$memo2',
amount='-$ttl_cost',
debit='$ttl_cost',
currency='$currency',
curr_rate='$curr_rate',
transaction_date='$date_paid',
transaction_datetime_recorded='$todate',
transaction_user_id='$user_id',
l_day='$day',
l_month='$month',
l_year='$year' WHERE transaction_code='$dr_transaction_code'";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());


//Credit purchase ledger controll account
$sqltrans2="UPDATE chart_transactions SET 
account_type_id='$account_to_credit',
transaction_section='RECSUPINV',
memo='$memo2',
amount='$ttl_order_value',
credit='$ttl_order_value',
currency='$currency',
curr_rate='$curr_rate',
transaction_date='$date_paid',
transaction_datetime_recorded='$todate',
transaction_user_id='$user_id',
l_day='$day',
l_month='$month',
l_year='$year' WHERE transaction_code='$cr_transaction_code'";
$resultstrans2=mysql_query($sqltrans2) or die ("Error $sqltrans2.".mysql_error());


if ($ttl_vat_value!=0 || $ttl_vat_value!='')
{
	
	//Debit vat account
$sqltrans2="UPDATE chart_transactions SET 
account_type_id='$vat_account_id',
transaction_section='RECSUPINV',
memo='$memo3',
amount='$ttl_vat_value',
debit='$ttl_vat_value',
currency='$currency',
curr_rate='$curr_rate',
transaction_date='$date_paid',
transaction_datetime_recorded='$todate',
transaction_user_id='$user_id',
l_day='$day',
l_month='$month',
l_year='$year' WHERE transaction_code='$crvt_transaction_code'";
$resultstrans2=mysql_query($sqltrans2) or die ("Error $sqltrans2.".mysql_error());
	
}
else
{
	
	
	
}

$sqlst="UPDATE order_code_get SET
status='3' WHERE order_code_id='$order_code_id'";
$resultst=mysql_query($sqlst) or die ("Error $sqlst.".mysql_error());
//header ("Location:receive_client_payment.php?addconfirm=1&invoice_payment_id=$latest_id");
?>
<script type="text/javascript">
alert('Record Updated Successfuly');
//window.location = "home.php?initiateproject=initiateproject&sub_module_id=<?php echo $sub_module_id; ?>";
window.location = "home.php?view_received_supplier_invoice";
</script>
<?php
	

	
	
	
	
}

mysql_close($cnn);


?>


