<?php
#include connection
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form

//Check redudancy
$lpo_nobck=$_GET['lpo_nobck'];
$lpo_nobck=$_GET['lpo_nobck'];
$qnty_orderedbck=$_GET['qnty_orderedbck'];


foreach($_POST['qnty_stock_rec'] as $row=>$Qnty_Stock_Rec)
{

$qnty_stock_rec=mysql_real_escape_string($Qnty_Stock_Rec);
$product_id=mysql_real_escape_string($_POST['product_id'][$row]);
$purchase_order_id=mysql_real_escape_string($_POST['purchase_order_id'][$row]);
$supplier_id=mysql_real_escape_string($_POST['supplier_id'][$row]);
$order_code=mysql_real_escape_string($_POST['order_code'][$row]);
$deliv_year=mysql_real_escape_string($_POST['deliv_year'][$row]);
$deliv_month=mysql_real_escape_string($_POST['deliv_month'][$row]);
$deliv_day=mysql_real_escape_string($_POST['deliv_day'][$row]);
$exp_year=mysql_real_escape_string($_POST['exp_year'][$row]);
$exp_month=mysql_real_escape_string($_POST['exp_month'][$row]);
$exp_day=mysql_real_escape_string($_POST['exp_day'][$row]);
$status='1'[$row]
$lpo_nobck=$_GET['lpo_nobck'];
$lpo_nobck=$_GET['lpo_nobck'];
$qnty_orderedbck=$_GET['qnty_orderedbck'];




$sqlred="SELECT * from 	received_stock where purchase_order_id='$purchase_order_id'  and product_id='$product_id' AND supplier_id='$supplier_id' AND order_code='$order_code' 
and deliv_year='$deliv_year' AND deliv_month='$deliv_month' AND deliv_day='$deliv_day' AND exp_year='$exp_year' AND exp_month='$exp_month' AND exp_day='$exp_day''";
$resultsred= mysql_query($sqlred) or die ("Error $sqlred.".mysql_error());

$rowsred=mysql_num_rows($resultsred);
if ($rowsred>0)
{
header ("Location:receive_stock_to_warehouse.php?exist=1&lpo_no=$lpo_nobck&supplier_id=$supplier_id&order_code=$order_code&qnty_ordered=$qnty_orderedbck");
}

else
{


$sql3="INSERT INTO received_stock VALUES('', '$purchase_order_id', '$product_id','$supplier_id', '$qnty_stock_rec','$deliv_year','$deliv_year','$deliv_month',
'$deliv_day','$exp_year','$exp_month','$exp_day','$status')";
$results3= mysql_query($sql3) or die ("Error $sql3.".mysql_error());





//header ("Location:receive_stock_to_warehouse.php?success=1&lpo_no=$lpo_nobck&supplier_id=$supplier_id&order_code=$order_code&qnty_ordered=$qnty_orderedbck");
?>
<script type="text/javascript">
alert('Record Saved successfuly');
//window.location = "begin_order.php";
window.location = "<?php echo $_SERVER['HTTP_REFERER']; ?>";
</script>
<?php
}

}

mysql_close($cnn);


?>


