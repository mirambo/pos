<?php
#include connection
include ('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$id=$_GET['fixed_assets_payments_id'];
//$client_id=mysql_real_escape_string($_POST['client']);
$amount=mysql_real_escape_string($_POST['amount']);
$desc=mysql_real_escape_string($_POST['desc']);
$currency=mysql_real_escape_string($_POST['currency']);
$curr_rate=mysql_real_escape_string($_POST['curr_rate']);

$queryprod="select * from fixed_assets where fixed_asset_id='$id'";
$resultsprod=mysql_query($queryprod) or die ("Error: $queryprod.".mysql_error());
$rowsprod=mysql_fetch_object($resultsprod);
$exp_cat_name=$rowsprod->fixed_asset_name;

$mop=mysql_real_escape_string($_POST['mop']);

$cheque_no=mysql_real_escape_string($_POST['cheque_no']);
$cheq_drawer=mysql_real_escape_string($_POST['cheq_drawer']);
$date_drawn=mysql_real_escape_string($_POST['date_drawn']);
$ref_no=mysql_real_escape_string($_POST['ref_no']);
$date_paid=mysql_real_escape_string($_POST['date_paid']);
//$date_paid=mysql_real_escape_string($_POST['date_paid']);
$transaction_code=mysql_real_escape_string($_POST['transaction_code']);
$client_bank=mysql_real_escape_string($_POST['client_bank']);
$our_bank=mysql_real_escape_string($_POST['our_bank']);
$date_trans=mysql_real_escape_string($_POST['date_trans']);



$amount_paid_kshs=$amount*$curr_rate;

if ($mop==2)//cheque
{
$sql= "update fixed_assets_payments SET
amount_received='$amount',
decription='$desc',
currency_code='$currency',
curr_rate='$curr_rate',
mop='$mop',
ref_no='',
cheque_no='$cheque_no',
client_bank='$cheq_drawer',
our_bank='',
date_paid='$date_paid'
where fixed_asset_repayment_id='$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
elseif ($mop==3) //transfer
{

//echo "machine";
$sql= "update fixed_assets_payments SET
amount_received='$amount',
decription='$desc',
currency_code='$currency',
curr_rate='$curr_rate',
mop='$mop',
cheque_no='',
ref_no='$transaction_code',
client_bank='$client_bank',
our_bank='$our_bank',
date_paid='$date_paid'
where fixed_asset_repayment_id='$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}

elseif ($mop==1)//cash 
{
$sql= "update fixed_assets_payments SET
amount_received='$amount',
decription='$desc',
currency_code='$currency',
curr_rate='$curr_rate',
mop='$mop',
ref_no='$ref_no',
cheque_no='',
client_bank='$client_bank',
our_bank='$our_bank',
date_paid='$date_paid'

where fixed_asset_repayment_id='$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}

elseif ($mop==4)//mpesa
{
$sql= "update fixed_assets_payments SET
amount_received='$amount',
decription='$desc',
currency_code='$currency',
curr_rate='$curr_rate',
mop='$mop',
ref_no='$ref_no',
client_bank='',
our_bank='',
date_paid='$date_paid'

where fixed_asset_repayment_id='$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}

$transaction_descinv='Fixed Asset Payment: ('.$exp_cat_name.')';
$transaction_desclg='Fixed Asset Payment ('.$exp_cat_name.') through Bank Transfer. Ref No : '.$transaction_code;
$transaction_descch='Fixed Asset Payment ('.$exp_cat_name.') through Cheque. Cheque No : '.$cheque_no;
$transaction_desccas='Fixed Asset Payment ('.$exp_cat_name.') through Cash. Ref No : '.$ref_no;


if ($mop==2)//cheque
{

$sqltranslg= "UPDATE bank_ledger SET 
transactions='$transaction_descch',
amount='-$amount',
credit='$amount',
currency_code='$currency',
date_recorded='$date_paid',
curr_rate='$curr_rate'

WHERE sales_code='fxdap$id'";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());


$sqltranslg= "UPDATE bank_statement SET 
transactions='$transaction_descch',
amount='-$amount',
credit='$amount',
mop='$mop',
bank_id='$our_bank',
currency_code='$currency',
date_recorded='$date_paid',
curr_rate='$curr_rate'

WHERE sales_code='fxdap$id'";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());

$sqltranslg= "UPDATE accounts_payables_ledger SET 
transactions='$transaction_descch',
amount='-$amount',
debit='$amount',
currency_code='$currency',
date_recorded='$date_paid',
curr_rate='$curr_rate'
WHERE order_code='fxdap$id'";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());

}

if ($mop==3)//Electronic
{

$sqltranslg= "UPDATE bank_ledger SET 
transactions='$transaction_desclg',
amount='-$amount',
credit='$amount',
currency_code='$currency',
date_recorded='$date_paid',
curr_rate='$curr_rate'

WHERE sales_code='fxdap$id'";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());



$sqltranslg= "UPDATE bank_statement SET 
transactions='$transaction_desclg',
amount='-$amount',
credit='$amount',
mop='$mop',
bank_id='$our_bank',
currency_code='$currency',
date_recorded='$date_paid',
curr_rate='$curr_rate'

WHERE sales_code='fxdap$id'";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());


$sqltranslg= "UPDATE accounts_payables_ledger SET 
transactions='$transaction_desclg',
amount='-$amount',
debit='$amount',
currency_code='$currency',
date_recorded='$date_paid',
curr_rate='$curr_rate'
WHERE order_code='fxdap$id'";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());

}

if ($mop==1 || $mop==4)//cash
{
$sqltranslg= "UPDATE cash_ledger SET 
transactions='$transaction_desccas',
amount='-$amount',
credit='$amount',
currency_code='$currency',
date_recorded='$date_paid',
curr_rate='$curr_rate'
WHERE sales_code='fxdap$id'";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());


$sqltranslg= "UPDATE accounts_payables_ledger SET 
transactions='$transaction_desccas',
amount='-$amount',
debit='$amount',
currency_code='$currency',
date_recorded='$date_paid',
curr_rate='$curr_rate'
WHERE order_code='fxdap$id'";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());


}






$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'edited fixed_assets_payments payments details')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());



header ("Location:edit_fixed_assets_payments.php?fixed_asset_repayment_id=$id&updateconfirm=1");

						  


mysql_close($cnn);


?>


