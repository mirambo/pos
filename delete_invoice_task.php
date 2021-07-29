<?php
include ('includes/session.php');
include('Connections/fundmaster.php');

$booking_id=$_GET['booking_id'];
$job_card_id=$_GET['job_card_id'];
$invoice_id=$_GET['invoice_id'];
$invoice_task_id=$_GET['invoice_task_id'];



$sql= "delete from invoice_task where invoice_task_id='$invoice_task_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


$sqlauditsav= "insert into audit_trails values('','$user_id',NOW(),'Deleted Invoice Task from the system')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error()); 

header ("Location:home.php?viewsubprojectlocation=viewsubprojectlocation&booking_id=$booking_id&invoice_id=$invoice_id&job_card_id=$job_card_id&deletepartconfirm=1");






mysql_close($cnn);


?>


