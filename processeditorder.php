<?php
include('Connections/fundmaster.php');
require_once('includes/session.php'); 
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$id=$_GET['temp_purchase_order_id'];
$prod_code=mysql_real_escape_string($_POST['prod_code']);
$supplier_id=mysql_real_escape_string($_POST['supplier_id']);
$order_code=mysql_real_escape_string($_POST['order_code']);
$ship_agency=mysql_real_escape_string($_POST['ship_agency']);
$pay_term=mysql_real_escape_string($_POST['pay_term']);
$currency=mysql_real_escape_string($_POST['currency1']);
$prod_code=mysql_real_escape_string($_POST['prod_code']);
$qnty=mysql_real_escape_string($_POST['qnty']);
$vend_price=mysql_real_escape_string($_POST['vend_price']);

$queryprof="select product_id from temp_purchase_order where temp_purchase_order_id='$id' and quantity='$qnty'";
$resultsprof=mysql_query($queryprof) or die ("Error: $queryprof.".mysql_error());
$rowsprof=mysql_fetch_object($resultsprof);
$product_id=$rowsprof->product_id;



$sql= "update temp_purchase_order set quantity='$qnty',vendor_prc='$vend_price',product_code='$prod_code' where temp_purchase_order_id='$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sql1= "update purchase_order set quantity='$qnty',vendor_prc='$vend_price',product_code='$prod_code' where temp_purchase_order_id='$id'";
$results1= mysql_query($sql1) or die ("Error $sql1.".mysql_error());

$sqlpd="UPDATE products set curr_bp='$vend_price' where product_id='$product_id'";
$resultspd= mysql_query($sqlpd) or die ("Error $sqlpd.".mysql_error());


$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'Updated a purchase order transaction')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());



//header ("Location:generate_order.php?supplier_id=$supplier_id&order_code=$order_code&ship_agency=$ship_agency&pay_term=$pay_term&currency=$currency");


?>
<script type="text/javascript">
alert('Record Updated successfuly');
//window.location = "view_received_stock.php";
window.location = "<?php echo $_SERVER['HTTP_REFERER']; ?>";
</script>
<?php






mysql_close($cnn);


?>


