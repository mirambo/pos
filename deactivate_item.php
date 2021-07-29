<?php
require_once('includes/session.php');
include('Connections/fundmaster.php');

$sales_id=$_GET['item_id'];
$sales_item_id=$_GET['sales_item_id'];
$view=$_GET['view'];
$cash=$_GET['cash'];


$sql1= "INSERT INTO suspended_items SELECT * FROM items where item_id='$sales_id'";
$results1= mysql_query($sql1) or die ("Error $sql1.".mysql_error());


if ($results1)
{

$sql2= "delete from items where item_id='$sales_id'";
$results2= mysql_query($sql2) or die ("Error $sql2.".mysql_error());

?>
									
									
							<script type="text/javascript">
alert('Items Deactivated Successfully');
window.location = "<?php echo $_SERVER['HTTP_REFERER']; ?>";
</script>
<?php

}


$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'deactivated an item from the system')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());

?>
<script type="text/javascript">
alert('Item Deactivated Successfuly');
window.location = "<?php echo $_SERVER['HTTP_REFERER']; ?>";
</script>

<?php

mysql_close($cnn);


?>


