<?php
#include connection
include ('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$job_card_id=mysql_real_escape_string($_POST['job_card_id']);
$booking_id=mysql_real_escape_string($_POST['booking_id']);


$task_name1=mysql_real_escape_string($_POST['task_name']);

$sqllpo= "insert into task VALUES('','$task_name1','')";
$resultslpo= mysql_query($sqllpo) or die ("Error $sqllpo.".mysql_error());


$sqllbc="SELECT * FROM  task order by task_id desc limit 1";
$resultslbc= mysql_query($sqllbc) or die ("Error $sqllbc.".mysql_error());
$rowslbc=mysql_fetch_object($resultslbc);
$task_name=$rowslbc->task_id;



//$task_name=mysql_real_escape_string($_POST['task_name']);
$technician_id=mysql_real_escape_string($_POST['technician_id']);

$query1="SELECT * from bookings where booking_id=$booking_id";
$results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
$rows1=mysql_fetch_object($results1);


/*$engine_range_id=$rows1->engine_range_id;

$sqlcs="SELECT * FROM labour_cost_matrix where task_id='$task_name' AND engine_range_id='$engine_range_id'";
$resultscs= mysql_query($sqlcs) or die ("Error $sqlcs.".mysql_error());
$rowscs=mysql_fetch_object($resultscs);
$flat_rate_hrs=$rowscs->flat_rate_hrs;

$sqllbc="SELECT * FROM  flat_rate_cost order by flat_rate_cost_id desc limit 1";
$resultslbc= mysql_query($sqllbc) or die ("Error $sqllbc.".mysql_error());
$rowslbc=mysql_fetch_object($resultslbc);
$flat_rate_cost=$rowslbc->flat_rate_cost_amount;*/

$task_cost=mysql_real_escape_string($_POST['task_cost']);
$currency=6;

$queryprod="select * from currency where curr_id='$currency'";
$resultsprod=mysql_query($queryprod) or die ("Error: $queryprod.".mysql_error());
$rowsprod=mysql_fetch_object($resultsprod);
$curr_rate=$rowsprod->curr_rate;
 

$sqllpo="insert into job_card_task VALUES('','$booking_id','$job_card_id','$task_name',
'$flat_rate_hrs','$technician_id','$flat_rate_cost','$task_cost','$currency','$curr_rate','$user_id',NOW(),'0','0','0','0')";
$resultslpo=mysql_query($sqllpo) or die ("Error $sqllpo.".mysql_error());

$sqlauditsav= "insert into audit_trails values('','$user_id',NOW(),'Added more job card tasks ($task_name) into the system')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());

header ("Location:home.php?locationreportc=locationreportc&booking_id=$booking_id&job_card_id=$job_card_id&addtaskconfirm=1");




mysql_close($cnn);

?>


