<?php
#include connection
include ('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$rec_order_code=$_GET['rec_order_code'];

$received_stock_id=$_GET['received_stock_id'];
$view=$_GET['view'];
$cs=$_GET['cs'];
$prod=mysql_real_escape_string($_POST['prod']);
$qnty_rec=mysql_real_escape_string($_POST['qnty_rec']);
$delivery_date=mysql_real_escape_string($_POST['delivery_date']);
$expiry_date=mysql_real_escape_string($_POST['expiry_date']);

$sql= "update received_stock set 
 	product_id='$prod', 
 	quantity_rec='$qnty_rec', 
 	delivery_date='$delivery_date',
 	expiry_date='$expiry_date'
 	
 	

where received_stock_id='$received_stock_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'Updated received stock transactions details')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());





//header ("Location:view_received_stock_transactions.php");
?>
<!--<script type="text/javascript">
alert('Record Updated successfuly');
//window.location = "begin_order.php";
window.location = "<?php echo $_SERVER['HTTP_REFERER']; ?>";
</script>-->
<?php




								  


mysql_close($cnn);


?>


