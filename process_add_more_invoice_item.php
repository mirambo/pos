<?php
#include connection
include ('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$invoice_id=mysql_real_escape_string($_POST['invoice_id']);
$job_card_id=mysql_real_escape_string($_POST['job_card_id']);
$booking_id=mysql_real_escape_string($_POST['booking_id']);
$part_id=mysql_real_escape_string($_POST['part_id']);
//$convert=mysql_real_escape_string($_POST['convert']);


$sqlproj= "SELECT * from items where item_id='$part_id'";
$resultsproj= mysql_query($sqlproj) or die ("Error $sqlproj.".mysql_error());
$rowsproj=mysql_fetch_object($resultsproj);
$unit_price=$rowsproj->curr_sp;

$quantity=mysql_real_escape_string($_POST['item_quantity']);


$sqlproj= "SELECT * from items where item_id='$part_id'";
$resultsproj= mysql_query($sqlproj) or die ("Error $sqlproj.".mysql_error());
$rowsproj=mysql_fetch_object($resultsproj);
$unit_price=$rowsproj->curr_sp;

$quantity=mysql_real_escape_string($_POST['item_quantity']);


 
$sqlupdt= "INSERT INTO released_item VALUES('','$booking_id','$job_card_id','$requisition_id','$part_id','$quantity','$delivery_date',
'$rec_person','0','0',NOW())";
$resultsupdt= mysql_query($sqlupdt) or die ("Error $sqlupdt.".mysql_error());


 
/*$sqlupdt= "insert into invoice_item VALUES('','$booking_id','','$invoice_id','$part_id','$quantity','$unit_price','6','1','$user_id',NOW(),'0')";
$resultsupdt= mysql_query($sqlupdt) or die ("Error $sqlupdt.".mysql_error());*/

$sqlauditsav= "insert into audit_trails values('','$user_id',NOW(),'Added more job card parts details into the system')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());

if ($convert==1)
{
header ("Location:home.php?viewlocation=viewlocation&booking_id=$booking_id&invoice_id=$invoice_id&job_card_id=$job_card_id&addpartconfirm=1&convert=1");
}
else
{

header ("Location:home.php?viewsubprojectlocation=viewsubprojectlocation&booking_id=$booking_id&invoice_id=$invoice_id&job_card_id=$job_card_id&addpartconfirm=1");

}


mysql_close($cnn);

?>


