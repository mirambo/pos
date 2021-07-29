<?php
include ('includes/session.php');
include('Connections/fundmaster.php');

$booking_id=$_GET['booking_id'];
$job_card_id=$_GET['job_card_id'];
$job_card_item_id=$_GET['job_card_item_id'];



$sql= "delete from released_item where released_item_id='$job_card_item_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


$sqlauditsav= "insert into audit_trails values('','$user_id',NOW(),'Deleted Job Card Item from the system')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error()); 

header ("Location:home.php?locationreportc=locationreportc&booking_id=$booking_id&job_card_id=$job_card_id&deletepartconfirm=1");






mysql_close($cnn);


?>


