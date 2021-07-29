<?php
include('Connections/fundmaster.php');
require_once('includes/session.php'); 
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$released_item_id=$_GET['released_item_id'];
$requisition_id=$_GET['requisition_id'];
$all=$_GET['all'];


$sql= "DELETE  FROM released_item where released_item_id='$released_item_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());



$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'Deleted a released item from the system')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());

if ($all==1)
{
header ("Location:view_all_released_items.php?deleteconfirm=1");
}
else
{
header ("Location:release_items_from_store.php?requisition_id=$requisition_id");
}

mysql_close($cnn);


?>


