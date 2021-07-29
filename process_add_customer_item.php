<?php
#include connection
include ('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$job_card_id=mysql_real_escape_string($_POST['job_card_id']);
$booking_id=mysql_real_escape_string($_POST['booking_id']);
$customer_item=mysql_real_escape_string($_POST['customer_item_name']);


 
$sqlupdt= "insert into customer_item VALUES('','$booking_id','$job_card_id','$customer_item','$user_id',NOW(),'0')";
$resultsupdt= mysql_query($sqlupdt) or die ("Error $sqlupdt.".mysql_error());

$sqlauditsav= "insert into audit_trails values('','$user_id',NOW(),'Added More customer belonging ($customer_item_name) into the system')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());

header ("Location:home.php?locationreportc=locationreportc&booking_id=$booking_id&job_card_id=$job_card_id&addbelongconfirm=1");




mysql_close($cnn);

?>


