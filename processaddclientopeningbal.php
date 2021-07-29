<?php
#include connection
include('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form

$date_paid=mysql_real_escape_string($_POST['date_paid']);
$client=mysql_real_escape_string($_POST['client']);
$amountx=mysql_real_escape_string($_POST['amount']);
$currency=mysql_real_escape_string($_POST['currency']);
$curr_rate=mysql_real_escape_string($_POST['curr_rate']);
$bal_type=mysql_real_escape_string($_POST['bal_type']);
$transaction="Opening Balance";

$querycr="select * from customer where customer_id='$client'";
$resultscr=mysql_query($querycr) or die ("Error: $querycr.".mysql_error());							  
$rowscr=mysql_fetch_object($resultscr);
$customer_name=$rowscr->customer_name;

$amount=$amountx*$curr_rate;

$transaction_desc="Opening Balance for Customer : ".$customer_name;

$queryprof="select * from  customer_transactions where transaction='$transaction' AND customer_id='$client'";
$resultsprof=mysql_query($queryprof) or die ("Error: $queryprof.".mysql_error());
$rowsprof=mysql_fetch_object($resultsprof);

$numrowscomp=mysql_num_rows($resultsprof);

if ($numrowscomp>0)

{

header ("Location:add_client_opening_balance.php? recordexist=1");

}

else 

{


$sqltrans= "insert into customer_transactions values('','$client','$transaction','$amount','','opbal$client','$incharge','0','0')";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());

$sqlaccpay= "insert into accounts_receivables_ledger values('','$transaction_desc','$amountx','$amountx','','$currency','$curr_rate','$date_paid','opbal$client','','','')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());

$sqlaccpay= "insert into cash_ledger values('','$transaction_desc','-$amountx','','$amountx','$currency','$curr_rate','$date_paid','opbal$client','','','')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());


header ("Location:add_client_opening_balance.php? addconfirm=1");

}









mysql_close($cnn);


?>


