<?php
#include connection
include ('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$released_item_id=$_GET['released_item_id'];
$all=$_GET['all'];
$view=$_GET['view'];
$cs=$_GET['cs'];
$requisition_id=mysql_real_escape_string($_POST['requisition_id']);
$prod=mysql_real_escape_string($_POST['prod']);
$qnty_rec=mysql_real_escape_string($_POST['qnty_rec']);
$delivery_date=mysql_real_escape_string($_POST['delivery_date']);
$rec_person=mysql_real_escape_string($_POST['rec_person']);

$sql= "update released_item set 
 	item_id='$prod', 
 	released_quantity='$qnty_rec', 
 	date_released='$delivery_date',
 	receiving_person='$rec_person'
 	

where released_item_id='$released_item_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'Updated released items from the store')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());

if ($all==1)
{
header ("Location:view_all_released_items.php?editconfirm=1");
}
else
{

header ("Location:release_items_from_store.php?requisition_id=$requisition_id");

}


								  


mysql_close($cnn);


?>


