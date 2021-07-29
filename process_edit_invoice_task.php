<?php
#include connection
include ('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$invoice_id=mysql_real_escape_string($_POST['invoice_id']);
$booking_id=mysql_real_escape_string($_POST['booking_id']);
$job_card_id=mysql_real_escape_string($_POST['job_card_id']);
$invoice_task_id=mysql_real_escape_string($_POST['invoice_task_id']);
$task_name=mysql_real_escape_string($_POST['task_name']);
$task_id=mysql_real_escape_string($_POST['task_id']);
$task_remarks=mysql_real_escape_string($_POST['task_remarks']);
//$task_cost=mysql_real_escape_string($_POST['task_cost']);
$convert=mysql_real_escape_string($_POST['convert']);


$query1="SELECT * from bookings where booking_id=$booking_id";
$results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
$rows1=mysql_fetch_object($results1);


$engine_range_id=$rows1->engine_range_id;

/*$sqlupdt= "UPDATE invoice_task SET task_id='$task_id',
task_cost='$task_cost', 
flat_rate_cost='$flat_rate_cost', 
task_time='$flat_rate_hrs',
technician_id='$technician_id'
WHERE job_card_task_id='$job_card_task_id'";
$resultsupdt= mysql_query($sqlupdt) or die ("Error $sqlupdt.".mysql_error());*/


$sqlupdt= "UPDATE task SET task_name='$task_name' where task_id='$task_id'";
$resultsupdt= mysql_query($sqlupdt) or die ("Error $sqlupdt.".mysql_error());
$currency=6;

$queryprod="select * from currency where curr_id='$currency'";
$resultsprod=mysql_query($queryprod) or die ("Error: $queryprod.".mysql_error());
$rowsprod=mysql_fetch_object($resultsprod);
$curr_rate=$rowsprod->curr_rate;


 
$sqlupdt= "UPDATE invoice_task SET 
task_name='$task_id',
task_cost='$task_cost',
task_remarks='$task_remarks' 
WHERE invoice_task_id='$invoice_task_id'";
$resultsupdt= mysql_query($sqlupdt) or die ("Error $sqlupdt.".mysql_error());

$sqlauditsav= "insert into audit_trails values('','$user_id',NOW(),'Update a invoice task ($task_name) into the system')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());


if ($convert==1)
{
header ("Location:home.php?viewlocation=viewlocation&booking_id=$booking_id&invoice_id=$invoice_id&editaskconfirm=1&convert=$convert");

}
else
{
header ("Location:home.php?viewsubprojectlocation=viewsubprojectlocation&booking_id=$booking_id&invoice_id=$invoice_id&job_card_id=$job_card_id&editaskconfirm=1");
}



mysql_close($cnn);

?>


