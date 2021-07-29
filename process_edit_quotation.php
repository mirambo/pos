<?php
#include connection
include ('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$quotation_id=mysql_real_escape_string($_POST['quotation_id']);
$booking_id=mysql_real_escape_string($_POST['booking_id']);
$terms=mysql_real_escape_string($_POST['terms']);
$currency=mysql_real_escape_string($_POST['currency']);
$quotation_date=mysql_real_escape_string($_POST['date_from']);
$discount=mysql_real_escape_string($_POST['discount']);
$vat=mysql_real_escape_string($_POST['vat']);

$queryprod="select * from currency where curr_id='$currency'";
$resultsprod=mysql_query($queryprod) or die ("Error: $queryprod.".mysql_error());
$rowsprod=mysql_fetch_object($resultsprod);
$curr_rate=$rowsprod->curr_rate;
 
$sqlupdt= "UPDATE quotation SET 
quotation_date='$quotation_date',
currency='$currency', 
terms='$terms',
curr_rate='$curr_rate',
discount_perc='$discount',
vat='$vat'


WHERE quotation_id='$quotation_id'";
$resultsupdt= mysql_query($sqlupdt) or die ("Error $sqlupdt.".mysql_error());

$sqlauditsav= "insert into audit_trails values('','$user_id',NOW(),'Update quotation details details into the system')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());

header ("Location:home.php?submit_biweekly=submit_biweekly&booking_id=$booking_id&quotation_id=$quotation_id&editjobcardconfirm=1");




mysql_close($cnn);

?>


