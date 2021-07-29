<?php
include ('includes/session.php');
include('Connections/fundmaster.php');

$booking_id=$_GET['booking_id'];
$invoice_id=$_GET['invoice_id'];
$invoice_item_id=$_GET['invoice_item_id'];



$sql= "delete from invoice_item where invoice_item_id='$invoice_item_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


$sqlauditsav= "insert into audit_trails values('','$user_id',NOW(),'Deleted Invoice Item from the system')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error()); 

header ("Location:home.php?viewsubprojectlocation=viewsubprojectlocation&booking_id=$booking_id&invoice_id=$invoice_id&deletepartconfirm=1");






mysql_close($cnn);


?>


