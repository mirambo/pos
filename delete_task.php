<?php
include ('includes/session.php');
include('Connections/fundmaster.php');

$booking_id=$_GET['booking_id'];
$job_card_id=$_GET['job_card_id'];
$job_card_task_id=$_GET['job_card_task_id'];



$sql= "delete from job_card_task where job_card_task_id='$job_card_task_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


$sqlauditsav= "insert into audit_trails values('','$user_id',NOW(),'Deleted Job Card Task from the system')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error()); 

header ("Location:home.php?locationreportc=locationreportc&booking_id=$booking_id&job_card_id=$job_card_id&deletetaskconfirm=1");






mysql_close($cnn);


?>


