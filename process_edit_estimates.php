<?php
#include connection
include ('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$estimates_id=mysql_real_escape_string($_POST['estimates_id']);
$booking_id=mysql_real_escape_string($_POST['booking_id']);
$quantity=mysql_real_escape_string($_POST['quantity']);
$curr_sp=mysql_real_escape_string($_POST['curr_sp']);
$vat=mysql_real_escape_string($_POST['vat']);
$discount=mysql_real_escape_string($_POST['discount']);
$item_id=mysql_real_escape_string($_POST['item_id']);

$sqlprofd="SELECT * from items where item_id='$item_id'";
$resultsprofd= mysql_query($sqlprofd) or die ("Error $sqlpod.".mysql_error());
$rowsprofd=mysql_fetch_object($resultsprofd);
//$curr_sp=$rowsprofd->curr_sp;

$discount_value=($discount/100)*$quantity*$curr_sp;

if ($vat==1)
{
$cal_amnt=$quantity*$curr_sp-$discount_value;
$vat_value=0.16*$cal_amnt;

}
else
{

$vat_value=0;
}

 
$sqlupdt= "UPDATE estimates SET 
item_id='$item_id',
quantity='$quantity',
curr_sp='$curr_sp',
discout='$discount',
discount_value='$discount_value',
vat='$vat',
vat_value='$vat_value'

 WHERE estimates_id='$estimates_id'";
$resultsupdt= mysql_query($sqlupdt) or die ("Error $sqlupdt.".mysql_error());





header ("Location:home.php?areareport=areareport&booking_id=$booking_id&editsuccess=1");






mysql_close($cnn);

?>


