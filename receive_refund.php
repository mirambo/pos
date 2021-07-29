<?php
include('Connections/fundmaster.php');
require_once('includes/session.php'); 
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form

$id=$_GET['debit_note_id'];
$supplier_id=$_GET['supplier_id'];
$order_code=$_GET['order_code'];
$debit_note_no=$_GET['debit_note_no'];
$amount_to_refund=$_GET['amount_to_refunded'];
$currency=$_GET['currency'];
$curr_rate=$_GET['curr_rate'];

$sql= "update debit_notes set refund_amount='$amount_to_refund' where debit_note_id='$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


$sqltrans= "insert into supplier_transactions values('','$supplier_id','$order_code','Refund for debit note $debit_note_no','$currency','$curr_rate','$amount_to_refund',NOW())";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());

$sqlaccpay4= "insert into cash_ledger values('','Refund for credit note $debit_note_no','$amount_to_refund','$amount_to_refund','','$currency','$curr_rate',NOW())";
$resultsaccpay4=mysql_query($sqlaccpay4) or die ("Error $sqlaccpay4.".mysql_error());

$sqlaccpay3= "insert into accounts_receivables_ledger values('','Refund for debit note $debit_note_no','-$amount_to_refund','','$amount_to_refund','$currency','$curr_rate',NOW(),'')";
$resultsaccpay3=mysql_query($sqlaccpay3) or die ("Error $sqlaccpay3.".mysql_error());

$sqlgenled1= "insert into general_ledger values('','Cash Refund for debit note $debit_note_no','$amount_to_refund','$amount_to_refund','','6','1',NOW(),'')";
$resultsgenled1=mysql_query($sqlgenled1) or die ("Error $sqlgenled1.".mysql_error());

$sqlgenled2= "insert into general_ledger values('','A/C Receivables Refund for debit note $debit_note_no','-$amount_to_refund',' ','$amount_to_refund','$currency','$curr_rate',NOW(),'')";
$resultsgenled2=mysql_query($sqlgenled2) or die ("Error $sqlgenled2.".mysql_error());


$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'Received Refund for debit note $debit_note_no')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());


header ("Location:view_debit_notes.php?updateconfirm=1");


mysql_close($cnn);


?>