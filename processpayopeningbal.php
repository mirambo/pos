<?php
#include connection
include('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$id=$_GET['client_id'];

$amount_paid=mysql_real_escape_string($_POST['amount_paid']);
$amount_already_paid=mysql_real_escape_string($_POST['amount_already_paid']);
$balance=mysql_real_escape_string($_POST['balance']);




$queryfx="select * from clients where client_id='$id'";
$resultsfx=mysql_query($queryfx) or die ("Error: $queryfx.".mysql_error());
								  
$rowsfx=mysql_fetch_object($resultsfx);
$client_name=$rowsfx->c_name;


$sqlfp= "insert into client_opening_bal_payment values ('','$id','-$amount_paid',NOW(),'')";
$resultsfp= mysql_query($sqlfp) or die ("Error $sqlfp.".mysql_error());

$sqltrans= "insert into client_transactions values('','$id','','Opening Bal Payment','-$amount_paid',NOW())";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());


$sqltrans= "insert into cash_ledger values('','Payment for client $client_name Opening Bal','$amount_paid','$amount_paid','','6','1',NOW())";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());

$sqlgenled= "insert into general_ledger values('','Accounts Receivables Client $client_name Opening Bal Payment','-$amount_paid','','$amount_paid','6','1',NOW(),'')";
$resultsgenled=mysql_query($sqlgenled) or die ("Error $sqlgenled.".mysql_error());

$sqlgenled= "insert into general_ledger values('','Cash (Client $client_name Opening Bal Payment )','$amount_paid','$amount_paid','','6','1',NOW(),'')";
$resultsgenled=mysql_query($sqlgenled) or die ("Error $sqlgenled.".mysql_error());

$sqlaccpay= "insert into accounts_receivables_ledger values('','Client $client_name Opening Bal Payment','-$amount_paid','','$amount_paid','6','1',NOW(),'')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());





header ("Location:client_statement.php?client_id=$id");




mysql_close($cnn);


?>


