<?php
#include connection
include ('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form

$service_item_id=mysql_real_escape_string($_POST['service_item_id']);
$job_card_item_id=mysql_real_escape_string($_POST['job_card_item_id']);
$job_card_id=mysql_real_escape_string($_POST['job_card_id']);
$service_desc=mysql_real_escape_string($_POST['remarks']);
$start_from=mysql_real_escape_string($_POST['start_from']);
$quantity=mysql_real_escape_string($_POST['quantity']);
$unit_cost=mysql_real_escape_string($_POST['unit_cost']);





 
$sqlupdt= "UPDATE job_card_task SET 
service_item_id='$service_item_id',
description='$service_desc',
start_from='$start_from',
quantity='$quantity',
unit_cost='$unit_cost'


WHERE job_card_task_id='$job_card_item_id'";
$resultsupdt= mysql_query($sqlupdt) or die ("Error $sqlupdt.".mysql_error());




$sqlauditsav= "insert into audit_trails values('','$user_id',NOW(),'Update a preliminary job card parts details into the system')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());

header ("Location:home.php?submit_biweekly2=submit_biweekly2&job_card_id=$job_card_id&editpartconfirm=1");




mysql_close($cnn);

?>


