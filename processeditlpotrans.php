<?php
require_once('includes/session.php'); 
include('Connections/fundmaster.php');

#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$order_code=$_GET['order_code'];
$view=$_GET['view'];
$id=$_GET['purchase_order_id'];
$prod=mysql_real_escape_string($_POST['prod']);
$description=mysql_real_escape_string($_POST['description']);
$foc=mysql_real_escape_string($_POST['foc']);
$qnty=mysql_real_escape_string($_POST['qnty']);
$vend_price=mysql_real_escape_string($_POST['vend_price']);




$sql1= "update purchase_order set product_id='$prod',description='$description',quantity='$qnty',vendor_prc='$vend_price' where purchase_order_id='$id'";
$results1= mysql_query($sql1) or die ("Error $sql1.".mysql_error());




$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'Updates LPO Transactions')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());



if ($view==1)
{
//header ("Location:begin_order.php?order_code=$order_code");

?>
<script type="text/javascript">
alert('Record Saved successfuly');
//window.location = "begin_order.php";
window.location = "begin_order.php?order_code=<?php echo $order_code; ?>";
</script>
<?php


}
else
{
//header ("Location:begin_order.php?order_code=$order_code");
?>
<script type="text/javascript">
alert('Record Saved successfuly');
//window.location = "begin_order.php";
window.location = "begin_order.php?order_code=<?php echo $order_code; ?>";
</script>
<?php
}

mysql_close($cnn);



?>


