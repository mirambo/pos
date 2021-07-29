<?php
#include connection
include ('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$quotation_id=mysql_real_escape_string($_POST['quotation_id']);
$booking_id=mysql_real_escape_string($_POST['booking_id']);
$quotation_item_id=mysql_real_escape_string($_POST['quotation_item_id']);
$part_id=mysql_real_escape_string($_POST['part_id']);
$convert=mysql_real_escape_string($_POST['convert']);
$unit_price_org=mysql_real_escape_string($_POST['price']);
//$unit_price_org=$rowsproj->curr_sp;


$sqlproj= "SELECT * from items where item_id='$part_id'";
$resultsproj= mysql_query($sqlproj) or die ("Error $sqlproj.".mysql_error());
$rowsproj=mysql_fetch_object($resultsproj);
//$unit_price_org=$rowsproj->curr_sp;

$item_quantity=mysql_real_escape_string($_POST['item_quantity']);


 
$sqlupdt= "UPDATE quotation_item SET item_id='$part_id',
item_quantity='$item_quantity', 
item_cost='$unit_price_org'
WHERE quotation_item_id='$quotation_item_id'";
$resultsupdt= mysql_query($sqlupdt) or die ("Error $sqlupdt.".mysql_error());


$sqlupdt2= "UPDATE items SET curr_sp='$unit_price_org'
WHERE item_id='$part_id'";
$resultsupdt2=mysql_query($sqlupdt2) or die ("Error $sqlupdt2.".mysql_error());



$sqlauditsav= "insert into audit_trails values('','$user_id',NOW(),'Update a quotation parts details into the system')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());

if ($convert==1)
{
header ("Location:home.php?viewlocation=viewlocation&booking_id=$booking_id&quotation_id=$quotation_id&editaskconfirm=1&convert=$convert");

}
else
{
header ("Location:home.php?submit_biweekly=submit_biweekly&booking_id=$booking_id&quotation_id=$quotation_id&editpartconfirm=1");
}



mysql_close($cnn);

?>


