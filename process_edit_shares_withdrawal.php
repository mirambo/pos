<?php
#include connection
include ('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$id=$_GET['shares_withdrawal_id'];
$client_id=mysql_real_escape_string($_POST['client']);
$amount=mysql_real_escape_string($_POST['amount']);
$desc=mysql_real_escape_string($_POST['desc']);
$currency=mysql_real_escape_string($_POST['currency']);
$curr_rate=mysql_real_escape_string($_POST['curr_rate']);

$queryprod="select * from currency where curr_id='$currency'";
$resultsprod=mysql_query($queryprod) or die ("Error: $queryprod.".mysql_error());
$rowsprod=mysql_fetch_object($resultsprod);
$curr_rate=$rowsprod->curr_rate;

$queryprodsup="select * from shares where shares_id='$client_id'";
$resultsprodsup=mysql_query($queryprodsup) or die ("Error: $queryprodsup.".mysql_error());
$rowsprodsup=mysql_fetch_object($resultsprodsup);
$supplier=$rowsprodsup->share_holder_name;

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

$amount_paid_kshs=$amount*$curr_rate;

if ($mop==2)
{
$sql= "update shares_withdrawal SET
shareholder_id='$client_id',
amount_received='$amount',
decription='$desc',
currency_code='$currency',
curr_rate='$curr_rate',
mop='$mop',
ref_no='$cheque_no',
client_bank='$cheq_drawer',
our_bank='$our_bank',
date_paid='$date_drawn'
where shares_withdrawal_id='$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
elseif ($mop==3) //transfer
{

//echo "machine";
$sql= "update shares_withdrawal SET
shareholder_id='$client_id',
amount_received='$amount',
decription='$desc',
currency_code='$currency',
curr_rate='$curr_rate',
mop='$mop',
ref_no='$transaction_code',
client_bank='$client_bank',
our_bank='$our_bank',
date_paid='$date_trans'
where shares_withdrawal_id='$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}

elseif ($mop==1 || $mop==4) 
{
$sql= "update shares_withdrawal SET
shareholder_id='$client_id',
amount_received='$amount',
decription='$desc',
currency_code='$currency',
curr_rate='$curr_rate',
mop='$mop',
ref_no='$ref_no',
client_bank='$client_bank',
our_bank='$our_bank',
date_paid='$date_paid'

where shares_withdrawal_id='$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}

//get receipt no
$sqlrp="SELECT receipt_no from shares_withdrawal WHERE shares_withdrawal_id='$id'";
$resultsrp= mysql_query($sqlrp) or die ("Error $sqlrp.".mysql_error());
$rowsrp=mysql_fetch_object($resultsrp);
$receipt_no=$rowsrp->receipt_no;

//$transaction_descinv='Supplier Payments Receipt: '.$receipt_no;
$transaction_desc='Shares Withrawal By : '.$supplier;


$sqlupd="UPDATE shareholder_transactions SET shareholder_id='$client_id', amount='-$amount',currency='$currency',curr_rate='$curr_rate' 
WHERE order_code='shwd$id'";
$resultsupd=mysql_query($sqlupd) or die ("Error $sqlupd.".mysql_error());


$sqltranslg= "UPDATE cash_ledger SET 
transactions='$transaction_desc',
amount='-$amount',
credit='$amount',
currency_code='$currency',
curr_rate='$curr_rate'

WHERE sales_code='shwd$id'";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());

$sqltranslg= "UPDATE shares_ledger SET 
transactions='$transaction_desc',
amount='-$amount',
debit='$amount',
currency_code='$currency',
curr_rate='$curr_rate'

WHERE order_code='shwd$id'";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());






$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'Edited Shareholder withdrawal for $supplier')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());



header ("Location:edit_shares_withdrawal.php?shares_withdrawal_id=$id&updateconfirm=1");

						  


mysql_close($cnn);


?>


