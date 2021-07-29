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
$desc=mysql_real_escape_string($_POST['desc']);
$transaction="Balance Adjustment";

$amount=$amountx*$curr_rate;

$sqllpdet="select * from customer where customer_id='$client'";
$resultslpdet= mysql_query($sqllpdet) or die ("Error $sqllpdet.".mysql_error());
$rows=mysql_fetch_object($resultslpdet);
$client_name=$rows->customer_name;

$transactionr="Balance Adjustment(Reduction), Reason:".$desc;
$transactionr1="Balance Adjustment(Reduction), for customer ".$client_name." Reason:".$desc;
$transactioni="Balance Adjustment (Increment), Reason:".$desc;
$transactioni1="Balance Adjustment(Increment), for customer ".$client_name." Reason:".$desc;

 

if ($bal_type==0)
{


$sqltrans= "insert into customer_transactions values('','$client','$transactionr','-$amount','$date_paid','adjopbal$client','0')";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());

$sqlaccpay= "insert into accounts_receivables_ledger values('','$transactionr1','-$amountx',' ','$amountx','$currency','$curr_rate','$date_paid','opbal$client','','','')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());

$sqlaccpay= "insert into cash_ledger values('','$transactionr1','$amountx','$amountx','','$currency','$curr_rate','$date_paid','opbal$client','','','')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());



}
elseif($bal_type==1)
{


$sqltrans= "insert into customer_transactions values('','$client','$transactioni','$amount','$date_paid','adjopbal$client','0')";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());

$sqlaccpay= "insert into accounts_receivables_ledger values('','$transactioni1','$amountx','$amountx','','$currency','$curr_rate','$date_paid','opbal$client','','','')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());

$sqlaccpay= "insert into cash_ledger values('','$transactioni1','-$amountx','','$amountx','$currency','$curr_rate','$date_paid','opbal$client','','','')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());

}
else
{

}

$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'Adjusted Statement Balance for client $client_name')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());



header ("Location:adjust_client_balance.php? addconfirm=1");






mysql_close($cnn);


?>


