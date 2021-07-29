<?php
#include connection
include ('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$requisition_id=mysql_real_escape_string($_POST['requisition_id']);
$job_card_id=mysql_real_escape_string($_POST['job_card_id']);
/* 
$query12="SELECT * from job_cards where job_card_id=$job_card_id";
$results12=mysql_query($query12) or die ("Error: $query12.".mysql_error());
$rows12=mysql_fetch_object($results12);
$booking_id=$rows12->booking_id; */

$requisition_item_id=mysql_real_escape_string($_POST['requisition_item_id']);
$requisition_date=mysql_real_escape_string($_POST['start_date']);
$end_date=mysql_real_escape_string($_POST['end_date']);
$remarks=mysql_real_escape_string($_POST['remarks']);


 
$sqlupdt= "UPDATE requisition SET 
requisition_date='$requisition_date',

remarks='$remarks'

WHERE requisition_id='$requisition_id'";
$resultsupdt= mysql_query($sqlupdt) or die ("Error $sqlupdt.".mysql_error());

$sqlauditsav= "insert into audit_trails values('','$user_id',NOW(),'Update requisition details details into the system')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());

header ("Location:home.php?viewhrforms=viewhrforms&requisition_id=$requisition_id&&editjobcardconfirm=1");




mysql_close($cnn);

?>


