<?php
include ('includes/session.php');
include('Connections/fundmaster.php');

$booking_id=$_GET['booking_id'];
$job_card_id=$_GET['job_card_id'];
$customer_item_id=$_GET['customer_item_id'];



$sql= "delete from customer_item where customer_item_id='$customer_item_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


$sqlauditsav= "insert into audit_trails values('','$user_id',NOW(),'Deleted a customer item from the job card')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error()); 

header ("Location:home.php?locationreportc=locationreportc&booking_id=$booking_id&job_card_id=$job_card_id&deletebelongconfirm=1");






mysql_close($cnn);


?>


