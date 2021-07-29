<?php
#include connection
include ('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$invoice_id=mysql_real_escape_string($_POST['invoice_id']);
$job_card_id=mysql_real_escape_string($_POST['job_card_id']);
$booking_id=mysql_real_escape_string($_POST['booking_id']);
$task_name=mysql_real_escape_string($_POST['task_name']);
//$task_cost=mysql_real_escape_string($_POST['task_cost']);
$task_remarks=mysql_real_escape_string($_POST['task_remarks']);
//$convert=mysql_real_escape_string($_POST['convert']);

$query1="SELECT * from bookings where booking_id=$booking_id";
$results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
$rows1=mysql_fetch_object($results1);


$engine_range_id=$rows1->engine_range_id;

$task_name1=mysql_real_escape_string($_POST['task_name']);

$sqllpo= "insert into task VALUES('','$task_name1','')";
$resultslpo= mysql_query($sqllpo) or die ("Error $sqllpo.".mysql_error());


$sqllbc="SELECT * FROM  task order by task_id desc limit 1";
$resultslbc= mysql_query($sqllbc) or die ("Error $sqllbc.".mysql_error());
$rowslbc=mysql_fetch_object($resultslbc);
$task_name=$rowslbc->task_id;

$task_cost=mysql_real_escape_string($_POST['task_cost']);

$currency=6;

$queryprod="select * from currency where curr_id='$currency'";
$resultsprod=mysql_query($queryprod) or die ("Error: $queryprod.".mysql_error());
$rowsprod=mysql_fetch_object($resultsprod);
$curr_rate=$rowsprod->curr_rate;


 
$sqlupdt= "insert into invoice_task VALUES('','$booking_id','','$invoice_id','$task_name','$task_cost','$task_remarks','6','1','$user_id',NOW(),'0')";
$resultsupdt= mysql_query($sqlupdt) or die ("Error $sqlupdt.".mysql_error());

$sqlauditsav= "insert into audit_trails values('','$user_id',NOW(),'Added more invoice tasks ($task_name) into the system')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());


if ($convert==1)
{
header ("Location:home.php?viewlocation=viewlocation&booking_id=$booking_id&invoice_id=$invoice_id&job_card_id=$job_card_id&addtaskconfirm=1");
}
else
{

header ("Location:home.php?viewsubprojectlocation=viewsubprojectlocation&booking_id=$booking_id&invoice_id=$invoice_id&&job_card_id=$job_card_id&addtaskconfirm=1");
}



mysql_close($cnn);

?>


