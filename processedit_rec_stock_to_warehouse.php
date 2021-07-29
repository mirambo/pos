<?php
#include connection
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form

//Check redudancy
$purchase_order_id=$_GET['purchase_order_id'];

//$prod=mysql_real_escape_string($_POST['prod']);
$supplier_id=mysql_real_escape_string($_POST['supplier_id']);
$order_code=mysql_real_escape_string($_POST['order_code']);
$qnty_rec=mysql_real_escape_string($_POST['qnty_rec']);
$delivery_date=mysql_real_escape_string($_POST['delivery_date']);
$expiry_date=mysql_real_escape_string($_POST['expiry_date']);
$lpo_no=$_GET['lpo_no'];
$product_id=$_GET['product_id'];
$received_stock_id=$_GET['received_stock_id'];

$sql3="UPDATE received_stock SET quantity_rec='$qnty_rec' ,delivery_date='$delivery_date',expiry_date='$expiry_date' where received_stock_id='$received_stock_id'";
$results3= mysql_query($sql3) or die ("Error $sql3.".mysql_error());

//header ("Location:edit_receive_stock_to_warehouse.php?updateconfirm=1&lpo_no=$lpo_no&supplier_id=$supplier_id&order_code=$order_code&qnty_ordered=$qnty_orderedbck&purchase_order_id=$purchase_order_id&product_id=$product_id&received_stock_id=$received_stock_id");
?>
<script type="text/javascript">
alert('Record Saved Successfuly');
//window.location = "begin_order.php";
window.location = "<?php echo $_SERVER['HTTP_REFERER']; ?>";
</script>
<?php
//}

mysql_close($cnn);


?>


