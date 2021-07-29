<?php
#include connection
include ('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$job_card_id=mysql_real_escape_string($_POST['job_card_id']);
$booking_id=mysql_real_escape_string($_POST['booking_id']);
$job_card_task_id=mysql_real_escape_string($_POST['job_card_task_id']);
$task_id=mysql_real_escape_string($_POST['task_id']);
$task_name=mysql_real_escape_string($_POST['task_name']);
$task_cost=mysql_real_escape_string($_POST['task_cost']);

$technician_id=mysql_real_escape_string($_POST['technician_id']);
//$task_cost=mysql_real_escape_string($_POST['task_cost']);

$query1="SELECT * from bookings where booking_id=$booking_id";
$results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
$rows1=mysql_fetch_object($results1);


$engine_range_id=$rows1->engine_range_id;

/*$sqlcs="SELECT * FROM labour_cost_matrix where task_id='$task_name' AND engine_range_id='$engine_range_id'";
$resultscs= mysql_query($sqlcs) or die ("Error $sqlcs.".mysql_error());
$rowscs=mysql_fetch_object($resultscs);
$flat_rate_hrs=$rowscs->flat_rate_hrs;

$sqllbc="SELECT * FROM  flat_rate_cost order by flat_rate_cost_id desc limit 1";
$resultslbc= mysql_query($sqllbc) or die ("Error $sqllbc.".mysql_error());
$rowslbc=mysql_fetch_object($resultslbc);
$flat_rate_cost=$rowslbc->flat_rate_cost_amount;*/

$currency=6;
 
$sqlupdt= "UPDATE job_card_task SET task_id='$task_id',
task_cost='$task_cost', 
flat_rate_cost='$flat_rate_cost', 
task_time='$flat_rate_hrs',
technician_id='$technician_id'
WHERE job_card_task_id='$job_card_task_id'";
$resultsupdt= mysql_query($sqlupdt) or die ("Error $sqlupdt.".mysql_error());


$sqlupdt= "UPDATE task SET task_name='$task_name' where task_id='$task_id'";
$resultsupdt= mysql_query($sqlupdt) or die ("Error $sqlupdt.".mysql_error());



$sqlauditsav= "insert into audit_trails values('','$user_id',NOW(),'Update a preliminary job card task ($task_name) into the system')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());

header ("Location:home.php?locationreportc=locationreportc&booking_id=$booking_id&job_card_id=$job_card_id&editaskconfirm=1");




mysql_close($cnn);

?>


