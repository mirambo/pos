<?php
include ('includes/session.php');
include('Connections/fundmaster.php');

$booking_id=$_GET['booking_id'];
$quotation_id=$_GET['quotation_id'];
$quotation_task_id=$_GET['quotation_task_id'];
$convert=$_GET['convert'];


$sql= "delete from quotation_task where quotation_task_id='$quotation_task_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


$sqlauditsav= "insert into audit_trails values('','$user_id',NOW(),'Deleted Quotation Task from the system')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error()); 

if ($convert==1)
{
header ("Location:home.php?viewlocation=viewlocation&booking_id=$booking_id&quotation_id=$quotation_id&editaskconfirm=1&convert=1");

}
else
{
header ("Location:home.php?submit_biweekly=submit_biweekly&booking_id=$booking_id&quotation_id=$quotation_id&deletetaskconfirm=1");

}




mysql_close($cnn);


?>


