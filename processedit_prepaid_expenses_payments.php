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

$queryfx="SELECT * FROM prepaid_expenses,expenses_categories,prepaid_expenses_payments,currency WHERE 
prepaid_expenses.exp_cat_id=expenses_categories.exp_cat_id and prepaid_expenses_payments.currency_code=currency.curr_id 
AND prepaid_expenses_payments.prepaid_expenses_payments_id='$id'";
$resultsfx=mysql_query($queryfx) or die ("Error: $queryfx.".mysql_error());
								  
$rowsfx=mysql_fetch_object($resultsfx);
$exp_cat_name=$rowsfx->expense_category_name;

$mop=mysql_real_escape_string($_POST['mop']);

$cheque_no=mysql_real_escape_string($_POST['cheque_no']);
$cheq_drawer=mysql_real_escape_string($_POST['cheq_drawer']);
$date_drawn=mysql_real_escape_string($_POST['date_drawn']);
$ref_no=mysql_real_escape_string($_POST['ref_no']);
$date_paid=mysql_real_escape_string($_POST['date_paid']);
$date_paid=mysql_real_escape_string($_POST['date_paid']);
$transaction_code=mysql_real_escape_string($_POST['transaction_code']);
$client_bank=mysql_real_escape_string($_POST['client_bank']);
$our_bank=mysql_real_escape_string($_POST['our_bank']);
$date_trans=mysql_real_escape_string($_POST['date_trans']);



$amount_paid_kshs=$amount*$curr_rate;


$sql= "update prepaid_expenses_payments SET
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
where prepaid_expenses_payments_id='$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


$transaction_descinv='Incurr Prepaid Expenses: '.$exp_cat_name;
$transaction_desclg='Incurr Prepaid Expenses '.($exp_cat_name).' through Bank Transfer. Ref No : '.$transaction_code;
$transaction_descch='Incurr Prepaid Expenses '.($exp_cat_name).' through Cheque. Ref No : '.$cheque_no;
$transaction_desccas='Incurr Prepaid Expenses '.($exp_cat_name).' through Cash. Ref No : '.$ref_no;

$sqltranslg= "UPDATE prepaid_expenses_ledger SET 
transactions='$transaction_descinv',
amount='-$amount',
credit='$amount',
currency_code='$currency',
date_recorded='$date_paid',
curr_rate='$curr_rate'
WHERE order_code='prepay$id'";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());



$sqltranslg= "UPDATE salary_expenses_ledger SET 
transactions='$transaction_descinv',
amount='$amount',
debit='$amount',
currency_code='$currency',
date_recorded='$date_paid',
curr_rate='$curr_rate'
WHERE order_code='prepay$id'";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());





$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'edited fixed_assets_payments payments details')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());



header ("Location:edit_prepaid_expenses_payments.php?fixed_asset_repayment_id=$id&updateconfirm=1");

						  


mysql_close($cnn);


?>


