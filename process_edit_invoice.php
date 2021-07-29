<?php
#include connection
include ('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$approve=$_GET['approve'];
$invoice_id=mysql_real_escape_string($_POST['invoice_id']);
$job_card_id=mysql_real_escape_string($_POST['job_card_id']);
$booking_id=mysql_real_escape_string($_POST['booking_id']);
$terms=mysql_real_escape_string($_POST['terms']);
$currency=6;
$invoice_date=mysql_real_escape_string($_POST['date_from']);
$discount=mysql_real_escape_string($_POST['discount']);
$vat=mysql_real_escape_string($_POST['vat']);

$queryprod="select * from currency where curr_id='$currency'";
$resultsprod=mysql_query($queryprod) or die ("Error: $queryprod.".mysql_error());
$rowsprod=mysql_fetch_object($resultsprod);
$curr_rate=$rowsprod->curr_rate;
 
$sqlupdt= "UPDATE invoice SET 
invoice_date='$invoice_date',
currency='$currency', 
terms='$terms',
curr_rate='$curr_rate',
discount_perc='$discount',
vat='$vat'


WHERE invoice_id='$invoice_id'";
$resultsupdt= mysql_query($sqlupdt) or die ("Error $sqlupdt.".mysql_error());

$sqlauditsav= "insert into audit_trails values('','$user_id',NOW(),'Update invoice details details into the system')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());

if ($approve==1)
{
header ("Location:home.php?chart=chart&booking_id=$booking_id&invoice_id=$invoice_id&job_card_id=$job_card_id&editjobcardconfirm=1");
}
else
{

header ("Location:home.php?viewsubprojectlocation=viewsubprojectlocation&booking_id=$booking_id&invoice_id=$invoice_id&job_card_id=$job_card_id&editjobcardconfirm=1");

}


mysql_close($cnn);

?>


