<?php
include('Connections/fundmaster.php');
require_once('includes/session.php'); 
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$received_stock_id=$_GET['received_stock_id'];
$order_code_id=$_GET['order_code_id'];

$sqltemp="select * from items,received_stock,received_stock_code
where items.item_id=received_stock.product_id and received_stock_code.stock_code_id=received_stock.stock_code_id 
AND received_stock.received_stock_id='$received_stock_id'";
$resultstemp=mysql_query($sqltemp) or die ("Error : $sqltemp.".mysql_error());
$rowstemp=mysql_fetch_object($resultstemp);
$prod_name=$rowstemp->item_name;


$sql= "DELETE  FROM received_stock where received_stock_id='$received_stock_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


$sql1= "DELETE FROM item_transactions where transaction_code='recitem$received_stock_id'";
$results1= mysql_query($sql1) or die ("Error $sql1.".mysql_error());


$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'Deleted a received $prod_name  from the warehouse')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());



//header ("Location:receive_stock_to_warehouse.php?order_code_id=$order_code_id");

?>
<script type="text/javascript">
alert('Record Deleted successfuly');
//window.location = "begin_order.php";
window.location = "<?php echo $_SERVER['HTTP_REFERER']; ?>";
</script>
<?php




mysql_close($cnn);


?>


