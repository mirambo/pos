<?php
#include connection
include ('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$sale_type=mysql_real_escape_string($_POST['sale_type']);
$customer_id=mysql_real_escape_string($_POST['customer_id']);
$start_date=mysql_real_escape_string($_POST['start_date']);
$end_date=mysql_real_escape_string($_POST['end_date']);
$job_card_id=mysql_real_escape_string($_POST['job_card_id']);
$discount=mysql_real_escape_string($_POST['discount']);
$technician_id=mysql_real_escape_string($_POST['technician_id']);
$gen_remarks=mysql_real_escape_string($_POST['gen_remarks']);
$currency=mysql_real_escape_string($_POST['currency']);
$curr_rate=mysql_real_escape_string($_POST['curr_rate']);


 
$sqlupdt= "UPDATE job_cards SET 
general_remarks='$gen_remarks',
discount='$discount',
customer_id='$customer_id',
start_date='$start_date',
end_date='$end_date',
sale_type='$sale_type',
technician_id='$technician_id',
currency='$currency',
curr_rate='$curr_rate' 
WHERE job_card_id='$job_card_id'";
$resultsupdt= mysql_query($sqlupdt) or die ("Error $sqlupdt.".mysql_error());



$sqlauditsav= "insert into audit_trails values('','$user_id',NOW(),'Update a job card details before approval into the system')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());

header ("Location:home.php?submit_biweekly2=submit_biweekly2&job_card_id=$job_card_id&editjobcardconfirm=1");




mysql_close($cnn);

?>


