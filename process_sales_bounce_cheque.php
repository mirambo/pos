<?php
include('Connections/fundmaster.php');
require_once('includes/session.php'); 
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form

//$receipt_no=mysql_real_escape_string($_POST['receipt_no']);
$invoice_payments_id=$_GET['invoice_payments_id'];

$sqlbn="select mop.mop_name,clients.c_name,invoice_payments.amount_received,invoice_payments.receipt_no,invoice_payments.invoice_payment_id,invoice_payments.mop,invoice_payments.ref_no,invoice_payments.client_bank,
invoice_payments.our_bank,invoice_payments.date_paid,invoice_payments.client_id,invoice_payments.receipt_no,invoice_payments.date_received,invoice_payments.status,currency.curr_name,
invoice_payments.currency_code,invoice_payments.curr_rate,invoice_payments.amount_received FROM mop,clients,invoice_payments,currency where 
invoice_payments.mop=mop.mop_id and invoice_payments.client_id=clients.client_id AND invoice_payments.currency_code=currency.curr_id AND invoice_payments.invoice_payment_id='$invoice_payments_id'";
$resultsbn= mysql_query($sqlbn) or die ("Error $sqlbn.".mysql_error());
$rowsbn=mysql_fetch_object($resultsbn);


$bank_charges=mysql_real_escape_string($_POST['bank_charges']);
$amount_bounced=$rowsbn->amount_received;
$curr_rate=$rowsbn->curr_rate;
$currency=$rowsbn->currency_code;
$client_amount=$amount_bounced*$curr_rate;
$client_id=$rowsbn->client_id;
$cheque_no=$rowsbn->ref_no;

$sql= "insert into sales_bounced_cheques values ('','$invoice_payments_id','$amount_bounced','$bank_charges','$currency','$curr_rate',NOW(),'')";
$results=mysql_query($sql) or die ("Error $sql.".mysql_error());

$sqluprec_no="UPDATE invoice_payments set status='1' where invoice_payment_id='$invoice_payments_id'";
$resultsuprec_no= mysql_query($sqluprec_no) or die ("Error $sqluprec_no.".mysql_error());


$sqltrans= "insert into client_transactions values('','$client_id','bc$invoice_payments_id','Bounced Cheque No:$cheque_no','$client_amount',NOW())";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());

$sqltrans= "insert into client_transactions values('','$client_id','bcc$invoice_payments_id','Bounced Cheque No:$cheque_no Penalty Charges','$bank_charges',NOW())";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());

$sqlaccpay4= "insert into cash_ledger values('','Bounced Cheque No: $cheque_no','bc$invoice_payments_id','-$amount_bounced',' ','$amount_bounced','$currency','$curr_rate',NOW())";
$resultsaccpay4=mysql_query($sqlaccpay4) or die ("Error $sqlaccpay4.".mysql_error());

$sqlaccpay3= "insert into accounts_receivables_ledger values('','Bounced Cheque No: $cheque_no','$amount_bounced','$amount_bounced','','$currency','$curr_rate',NOW(),'bc$invoice_payments_id')";
$resultsaccpay3=mysql_query($sqlaccpay3) or die ("Error $sqlaccpay3.".mysql_error());

/*$sqlgenled1= "insert into general_ledger values('','Bounced Cheque No:$cheque_no','-$amount_bounced','','$amount_bounced','6','1',NOW(),'')";
$resultsgenled1=mysql_query($sqlgenled1) or die ("Error $sqlgenled1.".mysql_error());

$sqlgenled2= "insert into general_ledger values('','A/C Receivables Bounced Cheque No: $cheque_no','$amount_bounced','$amount_bounced ','','$currency','$curr_rate',NOW(),'')";
$resultsgenled2=mysql_query($sqlgenled2) or die ("Error $sqlgenled2.".mysql_error());*/


//recording bank charges expenses
/*$sqlaccpay4= "insert into cash_ledger values('','Bank charges for Bounced Cheque No: $cheque_no','-$bank_charges',' ','$bank_charges','$currency','$curr_rate',NOW())";
$resultsaccpay4=mysql_query($sqlaccpay4) or die ("Error $sqlaccpay4.".mysql_error());

$sqlaccpay4= "insert into salary_expenses_ledger values('','Bank charges for Bounced Cheque No: $cheque_no','$bank_charges','$bank_charges','','$currency','$curr_rate',NOW())";
$resultsaccpay4=mysql_query($sqlaccpay4) or die ("Error $sqlaccpay4.".mysql_error());

$sqlgenled1= "insert into general_ledger values('','Back charges for Bounced Cheque No:$cheque_no','-$bank_charges','','$bank_charges','6','1',NOW(),'')";
$resultsgenled1=mysql_query($sqlgenled1) or die ("Error $sqlgenled1.".mysql_error());

$sqlgenled2= "insert into general_ledger values('','Bank Charges Expense for Bounced Cheque No: $cheque_no','$bank_charges','$bank_charges','','$currency','$curr_rate',NOW(),'')";
$resultsgenled2=mysql_query($sqlgenled2) or die ("Error $sqlgenled2.".mysql_error());*/


$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'Recorded Bounced Cheque No: $cheque_no')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());


header ("Location:view_invoice_payments.php");


mysql_close($cnn);


?>