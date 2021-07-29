<?php
#include connection
include('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form


$client=mysql_real_escape_string($_POST['client']);
$amount=mysql_real_escape_string($_POST['amount']);
$currency=6;

$queryprod="select * from currency where curr_id='$currency'";
$resultsprod=mysql_query($queryprod) or die ("Error: $queryprod.".mysql_error());
$rowsprod=mysql_fetch_object($resultsprod);
$curr_rate=$rowsprod->curr_rate;
//$curr_rate=mysql_real_escape_string($_POST['curr_rate']);
$bal_type=mysql_real_escape_string($_POST['bal_type']);
$desc=mysql_real_escape_string($_POST['desc']);
$transaction="Balance Adjustment";

$sqllpdet="select * from employees where emp_id='$client'";
$resultslpdet= mysql_query($sqllpdet) or die ("Error $sqllpdet.".mysql_error());
$rows=mysql_fetch_object($resultslpdet);
$client_name=$rows->emp_firstname;
 

if ($bal_type==0)
{
$transactionr="Balance Adjustment(Reduction), Reason:".$desc;
$sqltrans= "insert into staff_transactions values('','$client','0','$transactionr','-$amount','$currency','$curr_rate',NOW())";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());
}
elseif($bal_type==1)
{
$transactioni="Balance Adjustment (Increment), Reason:".$desc;
$sqltrans= "insert into staff_transactions values('','$client','0','$transactioni','$amount','$currency','$curr_rate',NOW())";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());

}
else
{

}

$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'Adjusted Statement Balance for Staff $client_name')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());






header ("Location:adjust_employees_op.php? addconfirm=1");






mysql_close($cnn);


?>


