<?php
#include connection
include ('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$task_id=mysql_real_escape_string($_POST['task_id']);
$engine_range_id=mysql_real_escape_string($_POST['engine_range_id']);
$flat_rate_hrs=mysql_real_escape_string($_POST['flat_rate_hrs']);
$flat_rate_cost=mysql_real_escape_string($_POST['flat_rate_cost']);

 
$sqlupdt= "UPDATE labour_cost_matrix SET 
flat_rate_hrs='$flat_rate_hrs',
flat_rate_cost='$flat_rate_cost'


WHERE task_id='$task_id' AND engine_range_id='$engine_range_id'";
$resultsupdt= mysql_query($sqlupdt) or die ("Error $sqlupdt.".mysql_error());

$sqlauditsav= "insert into audit_trails values('','$user_id',NOW(),'Update labour matrix details into the system')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());

header ("Location:home.php?viewreneworkpermit2=viewreneworkpermit2&editconfirm=1");




mysql_close($cnn);

?>


