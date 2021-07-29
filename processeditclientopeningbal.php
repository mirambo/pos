<?php
#include connection
include('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$id=$_GET['client_id'];



$client=mysql_real_escape_string($_POST['client']);
$amountx=mysql_real_escape_string($_POST['amount']);
$currency=mysql_real_escape_string($_POST['currency']);
//$curr_rate=mysql_real_escape_string($_POST['curr_rate']);
$bal_type=mysql_real_escape_string($_POST['bal_type']);
$transaction="Opening Balance";

$querycr="select curr_rate from currency where curr_id='6'";
$resultscr=mysql_query($querycr) or die ("Error: $querycr.".mysql_error());							  
$rowscr=mysql_fetch_object($resultscr);
$curr_rate=$rowscr->curr_rate;

$amount=$amountx*$curr_rate;

//$sqltrans= "insert into client_transactions values('','$client','0','$transaction','$amount',NOW())";
//$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());

$sql= "update client_transactions set amount='$amountx' where client_id='$id' and transaction='$transaction'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


$querycr="select amount from client_transactions where amount='6'";
$resultscr=mysql_query($querycr) or die ("Error: $querycr.".mysql_error());							  
$rowscr=mysql_fetch_object($resultscr);
$curr_rate=$rowscr->curr_rate;


/*$sql= "update accounts_receivables_ledger set amount='$amountx' where client_id='$id' and transaction='$transaction'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());*/


/*$sqlaccpay= "insert into accounts_receivables_ledger values('','Client Opening Balance','$amountx','$amountx','','$currency','$curr_rate',NOW(),'')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());

$sqllpo= "insert into invoices values('','','$amountx','$amountx','$currency','$curr_rate','$client','','','',NOW(),'1','1')";
$resultslpo= mysql_query($sqllpo) or die ("Error $sqllpo.".mysql_error());*/

header ("Location:edit_client_op.php?client_id=$id&editconfirm=1");





mysql_close($cnn);


?>


