<?php
require_once('includes/session.php');
include('Connections/fundmaster.php');

$sales_id=$_GET['service_item_id'];
$sales_item_id=$_GET['sales_item_id'];
$view=$_GET['view'];
$cash=$_GET['cash'];


$sql= "delete from customer_region where region_id='$sales_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'Deleted a region from the system')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());

?>
<script type="text/javascript">
alert('Record Deleted Successfuly');
window.location = "<?php echo $_SERVER['HTTP_REFERER']; ?>";
</script>

<?php

mysql_close($cnn);


?>


