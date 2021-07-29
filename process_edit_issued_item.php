<?php
#include connection
include ('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$issued_item_id=$_GET['issued_item_id'];
$all=$_GET['all'];
$view=$_GET['view'];
$cs=$_GET['cs'];
$requisition_id=mysql_real_escape_string($_POST['requisition_id']);
$prod=mysql_real_escape_string($_POST['prod']);
$qnty_rec=mysql_real_escape_string($_POST['qnty_rec']);
$delivery_date=mysql_real_escape_string($_POST['delivery_date']);
$rec_person=mysql_real_escape_string($_POST['rec_person']);

$sql= "update issued_items set 
 	quantity_issued='$qnty_rec'
 
WHERE issued_item_id='$issued_item_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'Updated issued items from the store')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());

//header ("Location:view_issued_items.php");

?>
<script type="text/javascript">
alert('Record Saved Successfuly');
window.location = "view_issued_items.php?sub_module_id=<?php echo $sub_module_id; ?>";
//window.location = "<?php echo $_SERVER['HTTP_REFERER']; ?>";
</script>
<?php

/* if ($all==1)
{
header ("Location:view_all_released_items.php?editconfirm=1");
}
else
{

header ("Location:release_items_from_store.php?requisition_id=$requisition_id");

} */


								  


mysql_close($cnn);


?>


