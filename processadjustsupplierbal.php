<?php
#include connection
include('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form

$date_paid=mysql_real_escape_string($_POST['date_paid']);
$client=mysql_real_escape_string($_POST['supplier']);
$amountx=mysql_real_escape_string($_POST['amount']);
$currency=mysql_real_escape_string($_POST['currency']);
$curr_rate=mysql_real_escape_string($_POST['curr_rate']);
$bal_type=mysql_real_escape_string($_POST['bal_type']);
$desc=mysql_real_escape_string($_POST['desc']);
$transaction="Balance Adjustment";

$amount=$amountx*$curr_rate;

$querycr="select * from suppliers where supplier_id='$client'";
$resultscr=mysql_query($querycr) or die ("Error: $querycr.".mysql_error());							  
$rowscr=mysql_fetch_object($resultscr);
$customer_name=$rowscr->supplier_name;

$transactionr="Balance Adjustment(Reduction), Reason:".$desc;
$transactionr1="Balance Adjustment(Reduction), for supplier ".$client_name." Reason:".$desc;
$transactioni="Balance Adjustment (Increment), Reason:".$desc;
$transactioni1="Balance Adjustment(Increment), for supplier ".$client_name." Reason:".$desc;


if ($bal_type==0)
{


$sqltrans= "insert into supplier_transactions values('','$client','opbal$client','$transactionr','$currency','$curr_rate','-$amountx','$date_paid')";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());

$sqlaccpay= "insert into accounts_payables_ledger values('','$transactionr1','-$amountx','$amountx','','$currency','$curr_rate','$date_paid','adjbal$client','','','')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());

$sqlaccpay= "insert into cash_ledger values('','$transactionr1','-$amountx','','$amountx','$currency','$curr_rate','$date_paid','adjbal$client','','','')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());



}
elseif($bal_type==1)
{


$sqltrans= "insert into supplier_transactions values('','$client','opbal$client','$transactioni','$currency','$curr_rate','$amountx','$date_paid')";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());

$sqlaccpay= "insert into accounts_payables_ledger values('','$transactioni1','$amountx','','$amountx','$currency','$curr_rate','$date_paid','adjbal$client','','','')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());

$sqlaccpay= "insert into cash_ledger values('','$transactioni1','$amountx','$amountx','','$currency','$curr_rate','$date_paid','adjbal$client','','','')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());


}
else
{

}

$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'Adjusted Statement Balance for supplier $client_name')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());



header ("Location:adjust_supplier_opening_balance.php? addconfirm=1");






mysql_close($cnn);


?>


