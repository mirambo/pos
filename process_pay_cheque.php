<?php
#include connection
include('includes/session.php');
include('Connections/fundmaster.php');

$id=$_GET['id'];

$date_from=mysql_real_escape_string($_POST['date_from']); 
$credit_account_id=mysql_real_escape_string($_POST['credit_account_id']); 
$shop_id=mysql_real_escape_string($_POST['shop_id']); 
$receipt_no=mysql_real_escape_string($_POST['receipt_no']); 
$mop_id=mysql_real_escape_string($_POST['mop']); 
$currency=mysql_real_escape_string($_POST['currency']);
$curr_rate=mysql_real_escape_string($_POST['curr_rate']);
$comments=mysql_real_escape_string($_POST['terms']);
$credit_amount=mysql_real_escape_string($_POST['credit_amount']);


if ($id!='')
{
	
$sqlxx = "UPDATE cheque_received_code SET 
trans_type='PAID',
account_to_credit='$credit_account_id',
credit_amount='$credit_amount',
currency='$currency',
curr_rate='$curr_rate',
ref_no='$receipt_no',
mop='$mop_id',
date_recorded='$date_from',
datetime_recorded='$todate',
comments='$comments' WHERE cheque_received_code_id='$id'";
$resultxx = mysql_query($sqlxx) or die ( mysql_error());	


$customer_payments_code_id=$id;	

//$transaction_code='ccrec'.$customer_payments_code_id;


$orderdate = explode('-', $date_from);
$year  = $orderdate[0];
$month = $orderdate[1];
$day   = $orderdate[2];


$cr_transaction_code="crccpaid".$customer_payments_code_id;
//$dr_transaction_code="drccpaid".$customer_payments_code_id;


//$memo2='Cash or Cheque paid, reference no '.$receipt_no.' ('.$comments.')';
$memo2='Cash or Cheque paid, <a href="pay_cheque_payment.php?id='.$customer_payments_code_id.'"> reference no '.$receipt_no.' ('.$comments.')</a>';

$sql34c="select * FROM account_type where account_type_id='$credit_account_id'";
$results34c= mysql_query($sql34c) or die ("Error $sql34c.".mysql_error());
$rows34c=mysql_fetch_object($results34c);
$bal_type=$rows34c->balance_type;


if ($bal_type=='C')
{
	
	$amountx=$credit_amount;
}
else
{
	
	$amountx=-$credit_amount;
	
}


$sqltrans2="UPDATE chart_transactions SET 
account_type_id='$credit_account_id',
transaction_section='CCPAID',
memo='$memo2',
amount='$amountx',
credit='$credit_amount',
currency='$currency',
curr_rate='$curr_rate',
transaction_date='$date_from',
transaction_datetime_recorded='$todate',
l_day='$day',
l_month='$month',
l_year='$year' 	WHERE transaction_code='$cr_transaction_code'";
$resultstrans2=mysql_query($sqltrans2) or die ("Error $sqltrans2.".mysql_error());



	



foreach($_POST['country_no'] as $row=>$Prod)
{

$prod=mysql_real_escape_string($_POST['country_no'][$row]);
$qnty=mysql_real_escape_string($_POST['country_code'][$row]);
$vend_price=mysql_real_escape_string($_POST['phone_code'][$row]);
$department_code=mysql_real_escape_string($_POST['department_code'][$row]);
$vat=mysql_real_escape_string($_POST['vat'][$row]);
echo $post_cheque_received_id=mysql_real_escape_string($_POST['cheque_received_id'][$row]);


$queryprofcv="select * from vat_settings";
$resultsprofcv=mysql_query($queryprofcv) or die ("Error: $queryprofcv.".mysql_error());
$rowsprofcv=mysql_fetch_object($resultsprofcv);
$vat_set_perc=$rowsprofcv->vat_setting_perc;
$vat_perc=$vat_set_perc/100;



if ($vat==1)
{
	
$vat_value=$vend_price*$vat_perc;	

$vat_account=69;
	
}
else
{

$vat_value=0;	
$vat_account=0;
	
}


$sqlxx = "UPDATE cheque_received SET 
account_to_debit='$prod',
vat='$vat',
vat_value='$vat_value',
vat_account='$vat_account',
debit_amount='$vend_price' WHERE cheque_received_id='$post_cheque_received_id'";
$resultxx = mysql_query($sqlxx) or die ( mysql_error());


if ($post_cheque_received_id!='')
{
	
	//////////update
$sql34c2="select * FROM account_type where account_type_id='$prod'";
$results34c2= mysql_query($sql34c2) or die ("Error $sql34c2.".mysql_error());
$rows34c2=mysql_fetch_object($results34c2);
$bal_type=$rows34c2->balance_type;


if ($bal_type=='D')
{
	
	$amountx2=$vend_price;
}
else
{
	
	$amountx2=-$vend_price;
	
}


$dr_transaction_code="drccpaid".$post_cheque_received_id;

$sqltrans="UPDATE chart_transactions SET 
account_type_id='$prod',
transaction_section='CCPAID',
memo='$memo2',
amount='$amountx2',
debit='$vend_price',
currency='$currency',
curr_rate='$curr_rate',
transaction_date='$date_from',

l_day='$day',
l_month='$month',
l_year='$year' WHERE transaction_code='$dr_transaction_code'";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());
////////////// update vat transaction
///

$vat_dr_transaction_code="drccpaidvat".$post_cheque_received_id;

$sqltrans="UPDATE chart_transactions SET 
account_type_id='$vat_account',
transaction_section='CCPAIDVAT',
memo='$memo2',
amount='$vat_value',
debit='$vat_value',
currency='$currency',
curr_rate='$curr_rate',
transaction_date='$date_from',
transaction_code='$vat_dr_transaction_code',
l_day='$day',
l_month='$month',
l_year='$year' WHERE transaction_code='$vat_dr_transaction_code'";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());


	
}
else
{

$sqlxx = "INSERT INTO cheque_received SET 
account_to_debit='$prod',
vat='$vat',
vat_value='$vat_value',
vat_account='$vat_account',
cheque_received_code_id='$id',
debit_amount='$vend_price'";
$resultxx = mysql_query($sqlxx) or die ( mysql_error());
$cheque_received_id=mysql_insert_id();

$dr_transaction_code="drccpaid".$cheque_received_id;

//debit selected account

$sql34c2="select * FROM account_type where account_type_id='$prod'";
$results34c2= mysql_query($sql34c2) or die ("Error $sql34c2.".mysql_error());
$rows34c2=mysql_fetch_object($results34c2);
$bal_type=$rows34c2->balance_type;


if ($bal_type=='D')
{
	
	$amountx2=$vend_price;
}
else
{
	
	$amountx2=-$vend_price;
	
}



$sqltrans="INSERT INTO chart_transactions SET 
account_type_id='$prod',
transaction_section='CCPAID',
memo='$memo2',
amount='$amountx2',
debit='$vend_price',
currency='$currency',
curr_rate='$curr_rate',
transaction_date='$date_from',
transaction_datetime_recorded='$todate',
transaction_code='$dr_transaction_code',
transaction_user_id='$user_id',
l_day='$day',
l_month='$month',
l_year='$year'";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());


$vat_dr_transaction_code="drccpaidvat".$post_cheque_received_id;

$sqltrans="INSERT INTO chart_transactions SET 
account_type_id='$vat_account',
transaction_section='CCPAIDVAT',
memo='$memo2',
amount='$vat_value',
debit='$vat_value',
currency='$currency',
curr_rate='$curr_rate',
transaction_date='$date_from',
transaction_datetime_recorded='$todate',
transaction_code='$vat_dr_transaction_code',
transaction_user_id='$user_id',
l_day='$day',
l_month='$month',
l_year='$year'";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());
}
}

?>
<script type="text/javascript">
alert('Record Updated Suvccessfuly. Posting No : <?php echo $id; ?>');
//window.location = "home.php?initiateproject=initiateproject&sub_module_id=<?php echo $sub_module_id; ?>";
window.location = "home.php?view_pay_cheque_payment";
</script>

<?php
	
	
}
else
{


$sqlxx = "INSERT INTO cheque_received_code SET 
trans_type='PAID',
account_to_credit='$credit_account_id',
credit_amount='$credit_amount',
currency='$currency',
curr_rate='$curr_rate',
ref_no='$receipt_no',
mop='$mop_id',
date_recorded='$date_from',
recorded_by='$user_id',
datetime_recorded='$todate',
comments='$comments'";
$resultxx = mysql_query($sqlxx) or die ( mysql_error());
$cheque_received_code=mysql_insert_id();

$customer_payments_code_id=$cheque_received_code;	

//$transaction_code='ccrec'.$customer_payments_code_id;


$orderdate = explode('-', $date_from);
$year  = $orderdate[0];
$month = $orderdate[1];
$day   = $orderdate[2];


$cr_transaction_code="crccpaid".$customer_payments_code_id;
//$dr_transaction_code="drccpaid".$customer_payments_code_id;


$memo2='Cash or Cheque paid, reference no <a href="pay_cheque_payment.php?id='.$customer_payments_code_id.'">'.$receipt_no.' ('.$comments.')</a>';

$sql34c="select * FROM account_type where account_type_id='$credit_account_id'";
$results34c= mysql_query($sql34c) or die ("Error $sql34c.".mysql_error());
$rows34c=mysql_fetch_object($results34c);
$bal_type=$rows34c->balance_type;


if ($bal_type=='C')
{
	
	$amountx=$credit_amount;
}
else
{
	
	$amountx=-$credit_amount;
	
}


$sqltrans2="INSERT INTO chart_transactions SET 
account_type_id='$credit_account_id',
transaction_section='CCPAID',
memo='$memo2',
amount='$amountx',
credit='$credit_amount',
currency='$currency',
curr_rate='$curr_rate',
transaction_date='$date_from',
transaction_datetime_recorded='$todate',
transaction_code='$cr_transaction_code',
transaction_user_id='$user_id',
l_day='$day',
l_month='$month',
l_year='$year'";
$resultstrans2=mysql_query($sqltrans2) or die ("Error $sqltrans2.".mysql_error());


foreach($_POST['country_no'] as $row=>$Prod)
{

$prod=mysql_real_escape_string($_POST['country_no'][$row]);
$qnty=mysql_real_escape_string($_POST['country_code'][$row]);
$vend_price=mysql_real_escape_string($_POST['phone_code'][$row]);
$department_code=mysql_real_escape_string($_POST['department_code'][$row]);
$vat=mysql_real_escape_string($_POST['vat'][$row]);


$queryprofcv="select * from vat_settings";
$resultsprofcv=mysql_query($queryprofcv) or die ("Error: $queryprofcv.".mysql_error());
$rowsprofcv=mysql_fetch_object($resultsprofcv);
$vat_set_perc=$rowsprofcv->vat_setting_perc;
$vat_perc=$vat_set_perc/100;



if ($vat==1)
{
	
$vat_value=$vend_price*$vat_perc;	

$vat_account=69;
	
}
else
{

$vat_value=0;	
$vat_account=0;
	
}

$sqlxx = "INSERT INTO cheque_received SET 
account_to_debit='$prod',
vat='$vat',
vat_value='$vat_value',
vat_account='$vat_account',
cheque_received_code_id='$cheque_received_code',
debit_amount='$vend_price'";
$resultxx = mysql_query($sqlxx) or die ( mysql_error());


$cheque_received_id=mysql_insert_id();

$dr_transaction_code="drccpaid".$cheque_received_id;

//debit selected account

$sql34c2="select * FROM account_type where account_type_id='$prod'";
$results34c2= mysql_query($sql34c2) or die ("Error $sql34c2.".mysql_error());
$rows34c2=mysql_fetch_object($results34c2);
echo $bal_type=$rows34c2->balance_type;


if ($bal_type=='D')
{
	
	$amountx2=$vend_price;
}
else
{
	
	$amountx2=-$vend_price;
	
}



$sqltrans="INSERT INTO chart_transactions SET 
account_type_id='$prod',
transaction_section='CCPAID',
memo='$memo2',
amount='$amountx2',
debit='$vend_price',
currency='$currency',
curr_rate='$curr_rate',
transaction_date='$date_from',
transaction_datetime_recorded='$todate',
transaction_code='$dr_transaction_code',
transaction_user_id='$user_id',
l_day='$day',
l_month='$month',
l_year='$year'";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());

/////////////////////////////// vat transaction
//debit vat transaction
$vat_dr_transaction_code="drccpaidvat".$cheque_received_id;

$sqltrans="INSERT INTO chart_transactions SET 
account_type_id='$vat_account',
transaction_section='CCPAIDVAT',
memo='$memo2',
amount='$vat_value',
debit='$vat_value',
currency='$currency',
curr_rate='$curr_rate',
transaction_date='$date_from',
transaction_datetime_recorded='$todate',
transaction_code='$vat_dr_transaction_code',
transaction_user_id='$user_id',
l_day='$day',
l_month='$month',
l_year='$year'";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());

}

?>
<script type="text/javascript">
alert('Record Saved Suvccessfuly. Posting No : <?php echo $cheque_received_code; ?>');
//window.location = "home.php?initiateproject=initiateproject&sub_module_id=<?php echo $sub_module_id; ?>";
window.location = "home.php?view_pay_cheque_payment";

</script>

<?php
}
mysql_close($cnn);


?>


