<?php
include('Connections/fundmaster.php');
require_once('includes/session.php'); 
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form

$id=$_GET['credit_note_id'];
$sales_code=$_GET['sales_code'];
$credit_note_no=$_GET['credit_note_no'];
$amount_to_refund=$_GET['amount_to_refund'];

$sql= "update credit_notes set refund_amount='$amount_to_refund' where credit_note_id='$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


$sqltrans= "insert into client_transactions values('','$client_id','$sales_code','Refund for credit note $credit_note_no','$amount_to_refund',NOW())";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());

$sqlaccpay4= "insert into cash_ledger values('','Refund for credit note $credit_note_no','-$amount_to_refund','','$amount_to_refund','6','1',NOW())";
$resultsaccpay4=mysql_query($sqlaccpay4) or die ("Error $sqlaccpay4.".mysql_error());

$sqlaccpay3= "insert into accounts_payables_ledger values('','Refund for credit note $credit_note_no','-$amount_to_refund','$amount_to_refund','','6','1',NOW(),'')";
$resultsaccpay3=mysql_query($sqlaccpay3) or die ("Error $sqlaccpay3.".mysql_error());

$sqlgenled1= "insert into general_ledger values('','Cash Refund for credit note $credit_note_no','-$amount_to_refund','','-$amount_to_refund','6','1',NOW(),'')";
$resultsgenled1=mysql_query($sqlgenled1) or die ("Error $sqlgenled1.".mysql_error());

$sqlgenled2= "insert into general_ledger values('','A/C Payables Refund for credit note $credit_note_no','$amount_to_refund','$amount_to_refund','','6','1',NOW(),'')";
$resultsgenled2=mysql_query($sqlgenled2) or die ("Error $sqlgenled2.".mysql_error());


$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'edited accounting terminologies details for $accounting_term')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());


header ("Location:view_sales_returns.php?updateconfirm=1");


mysql_close($cnn);


?>