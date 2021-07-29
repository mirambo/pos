<?php
#include connection
include ('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$quotation_id=mysql_real_escape_string($_POST['quotation_id']);
//$task_name=mysql_real_escape_string($_POST['task_name']);
//$task_cost=mysql_real_escape_string($_POST['task_cost']);
$convert=mysql_real_escape_string($_POST['convert']);

$queryind="SELECT * from quotation where quotation_id='$quotation_id'";
$resultsind=mysql_query($queryind) or die ("Error: $queryind.".mysql_error());
$rowsind=mysql_fetch_object($resultsind);
$currency=$rowsind->currency;
$curr_rate=$rowsind->curr_rate;

$booking_id=mysql_real_escape_string($_POST['booking_id']);

$task_cost=mysql_real_escape_string($_POST['task_cost']);

$task_name1=mysql_real_escape_string($_POST['task_name']);

$sqllpo= "insert into task VALUES('','$task_name1','')";
$resultslpo= mysql_query($sqllpo) or die ("Error $sqllpo.".mysql_error());


$sqllbc="SELECT * FROM  task order by task_id desc limit 1";
$resultslbc= mysql_query($sqllbc) or die ("Error $sqllbc.".mysql_error());
$rowslbc=mysql_fetch_object($resultslbc);
$task_name=$rowslbc->task_id;

$sqllpo="insert into quotation_task VALUES('','$booking_id','$quotation_id','$task_name','$flat_rate_hrs','$flat_rate_cost','$task_cost','$currency','$curr_rate','$user_id',NOW(),'0')";
$resultslpo=mysql_query($sqllpo) or die ("Error $sqllpo.".mysql_error());

$sqlauditsav= "insert into audit_trails values('','$user_id',NOW(),'Added more quotation tasks ($task_name) into the system')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());


if ($convert==1)
{
header ("Location:home.php?viewlocation=viewlocation&booking_id=$booking_id&quotation_id=$quotation_id&addtaskconfirm=1&convert=$convert");
}
else
{

header ("Location:home.php?submit_biweekly=submit_biweekly&booking_id=$booking_id&quotation_id=$quotation_id&addtaskconfirm=1");
}



mysql_close($cnn);

?>


