<?php
#include connection
include ('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$id=$_GET['invoice_payment_id'];
//$client_id=mysql_real_escape_string($_POST['client']);
$exp_cat_id=mysql_real_escape_string($_POST['exp_cat_id']);
$amount=mysql_real_escape_string($_POST['amount']);
$desc=mysql_real_escape_string($_POST['desc']);
$currency=mysql_real_escape_string($_POST['currency']);
$curr_rate=mysql_real_escape_string($_POST['curr_rate']);

$sqlrec="SELECT * FROM suppliers WHERE supplier_id='$exp_cat_id'";
$resultsrec= mysql_query($sqlrec) or die ("Error $sqlrec.".mysql_error());	
$rowsrec=mysql_fetch_object($resultsrec);
$exp_cat_name=$rowsrec->supplier_name;

/* $queryprod="select * from currency where curr_id='$currency'";
$resultsprod=mysql_query($queryprod) or die ("Error: $queryprod.".mysql_error());
$rowsprod=mysql_fetch_object($resultsprod);
$curr_rate=$rowsprod->curr_rate; */

$mop=mysql_real_escape_string($_POST['mop']);

$cheque_no=mysql_real_escape_string($_POST['cheque_no']);
$cheq_drawer=mysql_real_escape_string($_POST['cheq_drawer']);
$date_drawn=mysql_real_escape_string($_POST['date_drawn']);
$ref_no=mysql_real_escape_string($_POST['ref_no']);
$date_paid=mysql_real_escape_string($_POST['date_paid']);
$transaction_code=mysql_real_escape_string($_POST['transaction_code']);
$client_bank=mysql_real_escape_string($_POST['client_bank']);
$our_bank=mysql_real_escape_string($_POST['our_bank']);
$date_trans=mysql_real_escape_string($_POST['date_trans']);



if ($mop==2)
{
$sql= "update supplier_refund SET
supplier_id='$exp_cat_id',
amount_received='$amount',
decription='$desc',
currency_code='$currency',
curr_rate='$curr_rate',
mop='$mop',
ref_no='$cheque_no',
client_bank='$cheq_drawer',
our_bank='$our_bank',
date_paid='$date_paid'
where supplier_refund_id='$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
elseif ($mop==3) //transfer
{

//echo "machine";
$sql= "update supplier_refund SET
supplier_id='$exp_cat_id',
amount_received='$amount',
decription='$desc',
currency_code='$currency',
curr_rate='$curr_rate',
mop='$mop',
ref_no='$transaction_code',
client_bank='$client_bank',
our_bank='$our_bank',
date_paid='$date_paid'
where supplier_refund_id='$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}

elseif ($mop==1 || $mop==4) 
{
$sql= "update supplier_refund SET
supplier_id='$exp_cat_id',
amount_received='$amount',
decription='$desc',
currency_code='$currency',
curr_rate='$curr_rate',
mop='$mop',
ref_no='$ref_no',
client_bank='$client_bank',
our_bank='$our_bank',
date_paid='$date_paid'

where supplier_refund_id='$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}

//$transaction_desclg='Sales receipt against Receipt No:'.$receipt_no;
//$transaction_desc='Receipt No:'.$receipt_no;

//$sqltrans= "UPDATE shippers_transactions SET shipper_id='$client_id',unit_transport_charges='-$amount',currency='$currency',curr_rate='$curr_rate' WHERE transaction_code='tcp$id'";
//$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());

$transaction_descinv='Supplier Refund: '.$exp_cat_name;
$transaction_desclg='Supplier Refund : '.($exp_cat_name).' through Bank Transfer. Ref No : '.$transaction_code;
$transaction_descch='Supplier Refund : '.($exp_cat_name).' through Cheque. Cheque No : '.$cheque_no;
$transaction_desccas='Supplier Refund : '.($exp_cat_name).' through Cash. Ref No : '.$ref_no;

$amount_paid_kshs=$amount*$curr_rate;




if ($mop==1 || $mop==4)
{
$sqltranslg= "UPDATE cash_ledger SET 
transactions='$transaction_desccas',
amount='$amount',
debit='$amount',
currency_code='$currency',
date_recorded='$date_paid',
curr_rate='$curr_rate'

WHERE sales_code='srf$id'";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());

$sqltrans="update supplier_transactions SET 
supplier_id='$exp_cat_id',
currency='$currency',
date_recorded='$date_paid',
curr_rate='$curr_rate',
amount='$amount',
transaction='$transaction_desccas'
where order_code='srf$id'";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());


$sqltranslg= "UPDATE accounts_payables_ledger SET
transactions='$transaction_desccas',
amount='$amount',
credit='$amount',
currency_code='$currency',
date_recorded='$date_paid',
curr_rate='$curr_rate'

WHERE order_code='srf$id'";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());

}



if ($mop==3)
{
$sqltranslg= "UPDATE bank_ledger SET 
transactions='$transaction_descbs',
amount='$amount',
debit='$amount',
currency_code='$currency',
date_recorded='$date_paid',
curr_rate='$curr_rate'

WHERE sales_code='srf$id'";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());

$sqltrans="update supplier_transactions SET 
supplier_id='$exp_cat_id',
currency_code='$currency',
date_recorded='$date_paid',
curr_rate='$curr_rate',
amount='$amount',
transaction='$transaction_descbs'
where order_code='srf$id'";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());


$sqltranslg= "UPDATE accounts_payables_ledger SET
transactions='$transaction_descbs',
amount='$amount',
credit='$amount',
currency_code='$currency',
date_recorded='$date_paid',
curr_rate='$curr_rate'

WHERE order_code='srf$id'";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());



$sqltranslg= "UPDATE bank_statement SET 
transactions='$transaction_descbs',
amount='-$amount',
credit='$amount',
mop='$mop',
bank_id='$our_bank',
currency_code='$currency',
date_recorded='$date_paid',
curr_rate='$curr_rate'

WHERE sales_code='srf$id'";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());
}
elseif ($mop==2)
{

$sqltranslg= "UPDATE bank_ledger SET 
transactions='$transaction_descbs',
amount='$amount',
debit='$amount',
currency_code='$currency',
date_recorded='$date_paid',
curr_rate='$curr_rate'

WHERE sales_code='srf$id'";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());

$sqltrans="update supplier_transactions SET 
supplier_id='$exp_cat_id',
currency_code='$currency',
curr_rate='$curr_rate',
date_recorded='$date_paid',
amount='$amount',
transaction='$transaction_descbs'
where order_code='srf$id'";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());


$sqltranslg= "UPDATE accounts_payables_ledger SET
transactions='$transaction_descbs',
amount='$amount',
credit='$amount',
currency_code='$currency',
curr_rate='$curr_rate'

WHERE order_code='srf$id'";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());



$sqltranslg= "UPDATE bank_statement SET 
transactions='$transaction_descbs',
amount='-$amount',
credit='$amount',
mop='$mop',
bank_id='$our_bank',
currency_code='$currency',
date_recorded='$date_paid',
curr_rate='$curr_rate'

WHERE sales_code='srf$id'";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());





}

$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'edited supplier refund payments details')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());



header ("Location:edit_supplier_refund.php?supplier_refund_id=$id&updateconfirm=1");

						  


mysql_close($cnn);


?>


