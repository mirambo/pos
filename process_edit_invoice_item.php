<?php
#include connection
include ('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$invoice_id=mysql_real_escape_string($_POST['invoice_id']);
$job_card_id=mysql_real_escape_string($_POST['job_card_id']);
$booking_id=mysql_real_escape_string($_POST['booking_id']);
$invoice_item_id=mysql_real_escape_string($_POST['invoice_item_id']);
$part_id=mysql_real_escape_string($_POST['part_id']);
//$convert=mysql_real_escape_string($_POST['convert']);
$unit_price_org=mysql_real_escape_string($_POST['price']);


$sqlproj= "SELECT * from items where item_id='$part_id'";
$resultsproj= mysql_query($sqlproj) or die ("Error $sqlproj.".mysql_error());
$rowsproj=mysql_fetch_object($resultsproj);
//$unit_price_org=$rowsproj->curr_sp;

$item_quantity=mysql_real_escape_string($_POST['item_quantity']);


 
$sqlupdt= "UPDATE released_item SET item_id='$part_id',
released_quantity='$item_quantity'
WHERE released_item_id='$invoice_item_id'";
$resultsupdt= mysql_query($sqlupdt) or die ("Error $sqlupdt.".mysql_error());

$sqlupdt2= "UPDATE items SET curr_sp='$unit_price_org'
WHERE item_id='$part_id'";
$resultsupdt2=mysql_query($sqlupdt2) or die ("Error $sqlupdt2.".mysql_error());



$sqlauditsav= "insert into audit_trails values('','$user_id',NOW(),'Update a invoice parts details into the system')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());

if ($convert==1)
{
header ("Location:home.php?viewlocation=viewlocation&booking_id=$booking_id&invoice_id=$invoice_id&job_card_id=$job_card_id&editaskconfirm=1&convert=$convert");

}
else
{
header ("Location:home.php?viewsubprojectlocation=viewsubprojectlocation&booking_id=$booking_id&invoice_id=$invoice_id&job_card_id=$job_card_id&editpartconfirm=1");
}



mysql_close($cnn);

?>


