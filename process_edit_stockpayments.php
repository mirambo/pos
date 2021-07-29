<?php
#include connection
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$id=$_GET['stock_payment_id'];
$receipt_no=$_GET['receipt_no'];
$amnt_paid_to_supplier=mysql_real_escape_string($_POST['amnt_paid_to_supplier']);
//$curr_rate=mysql_real_escape_string($_POST['curr_rate']);
$currency=mysql_real_escape_string($_POST['currency']);
$mop=mysql_real_escape_string($_POST['mop']);
$cheque_no=mysql_real_escape_string($_POST['cheque_no']);
$cheq_drawer=mysql_real_escape_string($_POST['cheq_drawer']);
$date_drawn=mysql_real_escape_string($_POST['date_drawn']);
$ref_no=mysql_real_escape_string($_POST['ref_no']);
$trans_src_bank=mysql_real_escape_string($_POST['trans_src_bank']);
$dep_bank=mysql_real_escape_string($_POST['dep_bank']);
$date_trans=mysql_real_escape_string($_POST['date_trans']);


$querycr="select curr_rate from currency where curr_id='$currency'";
$resultscr=mysql_query($querycr) or die ("Error: $querycr.".mysql_error());							  
$rowscr=mysql_fetch_object($resultscr);
$curr_rate=$rowscr->curr_rate;

if ($mop=='Cheque')
{
$sql= "update stock_payments set 
amnt_paid='$amnt_paid_to_supplier',
currency='$currency',
exchange_rate='$curr_rate',
mop='$mop',
cheque_no='$cheque_no',
ref_no='$ref_no',
client_bank='$dep_bank',
our_bank='$cheq_drawer',
date_drawn='$date_drawn' 
where stock_payments_id='$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}

elseif ($mop=='Electronic ' || $mop=='Electronic Transfer') 
{
$sql= "update stock_payments set 
amnt_paid='$amnt_paid_to_supplier',
currency='$currency',
exchange_rate='$curr_rate',
mop='$mop',
ref_no='$ref_no',
client_bank='$dep_bank',
our_bank='$trans_src_bank',
date_drawn='$date_trans'
where stock_payments_id='$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


}
elseif ($mop=='Cash ' || $mop=='Cash') 
{
$sql= "update stock_payments set 
amnt_paid='$amnt_paid_to_supplier',
currency='$currency',
exchange_rate='$curr_rate',
mop='$mop',
ref_no='$ref_no',
client_bank='$dep_bank',
our_bank='$trans_src_bank',
date_drawn='$date_trans'
where stock_payments_id='$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


}

$transaction_desc="PO payment Receipt No:".$receipt_no;

/*$sqltrans= "insert into supplier_transactions values('','$supplier_id','$order_code','$transaction_desc','$currency','$curr_rate_now','-$amnt_paid_to_supplier',NOW())";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());*/

$sql= "update supplier_transactions set 
currency='$currency',
curr_rate='$curr_rate',
amount='-$amnt_paid_to_supplier'
where transaction LIKE '%$transaction_desc%'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


$sql= "update cash_ledger set 
currency_code='$currency',
curr_rate='$curr_rate',
amount='-$amnt_paid_to_supplier',
credit='$amnt_paid_to_supplier'
where transactions LIKE '%$transaction_desc%'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


$sql= "update accounts_payables_ledger set 
currency_code='$currency',
curr_rate='$curr_rate',
amount='-$amnt_paid_to_supplier',
debit='$amnt_paid_to_supplier'
where transactions LIKE '%$transaction_desc%'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


$sql= "update supplier_receipt set 
mop='$mop',
cheque_no='$cheque_no',
currency_code='$currency',
curr_rate='$curr_rate',
amnt_rec='$amnt_paid_to_supplier'

where receipt_no='$receipt_no'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());



/*$sqltransw= "insert into cash_ledger values('','$transaction_desc','-$amnt_paid_to_supplier','','$amnt_paid_to_supplier','$currency','$curr_rate_now',NOW())";
$resultstransw=mysql_query($sqltransw) or die ("Error $sqltransw.".mysql_error());

$sqlgenled= "insert into general_ledger values('','$transaction_desc','$amnt_paid_to_supplier','$amnt_paid_to_supplier','','$currency','$curr_rate_now',NOW(),'')";
$resultsgenled=mysql_query($sqlgenled) or die ("Error $sqlgenled.".mysql_error());

$sqlgenled= "insert into general_ledger values('','$transaction_desc','-$amnt_paid_to_supplier','','$amnt_paid_to_supplier','$currency','$curr_rate_now',NOW(),'')";
$resultsgenled=mysql_query($sqlgenled) or die ("Error $sqlgenled.".mysql_error());

$sqlaccpay= "insert into accounts_payables_ledger values('','$transaction_desc','-$amnt_paid_to_supplier','$amnt_paid_to_supplier','','$currency','$curr_rate_now',NOW(),'')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());


$sql= "update expenses_receipts set description='$desc', currency_code='$currency',curr_rate='$curr_rate',amnt_rec='$amount',mop='$mop' where description LIKE '%$desc%'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sql= "update cash_ledger set amount='-$amount', credit='$amount' ,currency_code='$currency',curr_rate='$curr_rate' where transactions LIKE '%Cash Expenses Paid on $desc%'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sql= "update salary_expenses_ledger set amount='$amount', debit='$amount' ,currency_code='$currency',curr_rate='$curr_rate' where transactions LIKE '%$desc%'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'edited expenses details by the description $desc')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());*/



header ("Location:edit_stock_payments.php?stock_payment_id=$id&receipt_no=$receipt_no&updateconfirm=1");

								  


mysql_close($cnn);


?>


