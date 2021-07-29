<?php
#include connection
include ('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$id=$_GET['incurred_prepaid_expenses_id'];
$id2=$_GET['prepaid_expenses_id'];

$amount=mysql_real_escape_string($_POST['amount']);


 
$sqlupdt= "UPDATE incurred_prepaid_expenses SET amount_incurred='$amount' WHERE incurred_prepaid_expenses_id='$id'";
$resultsupdt= mysql_query($sqlupdt) or die ("Error $sqlupdt.".mysql_error());

$sqltranslg= "UPDATE salary_expenses_ledger SET 
amount='-$amount',
debit='$amount',
currency_code='6',
curr_rate='1'

WHERE order_code='incurprepexp$id'";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());

$sqltranslg= "UPDATE prepaid_expenses_ledger SET 
amount='-$amount',
credit='$amount',
currency_code='6',
curr_rate='1'

WHERE order_code='incurprepexp$id'";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());



header ("Location:view_incurred_prepaid_expenses.php?prepaid_expenses_id=$id2&editsuccess=1");


mysql_close($cnn);

?>


