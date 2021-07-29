<?php
#include connection
require_once('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
//$updt_uname=mysql_real_escape_string($_POST['updt_uname']);
//$updt_pword=mysql_real_escape_string($_POST['updt_pword']);
$id=$_GET['purchase_order_id'];
$order_code=$_GET['order_code'];
$view=$_GET['view'];


$sqlrec2="select * FROM order_code_get WHERE order_code_id='$order_code'";
$resultsrec2= mysql_query($sqlrec2) or die ("Error $sqlrec2.".mysql_error());	
$rowsrec2=mysql_fetch_object($resultsrec2);

$approved_status=$rowsrec2->status;


if ($approved_status==2)
{
?>
<script type="text/javascript">
alert('SORRY THIS ORDER HAS BEEN APPROVED IT CANNOT BE ADJUSTED');
//window.location = "home.php?initiateproject=initiateproject&sub_module_id=<?php echo $sub_module_id; ?>";
window.location = "<?php echo $_SERVER['HTTP_REFERER']; ?>";
</script>

<?php	
		
	
}

else
{


$sql= "delete from purchase_order where purchase_order_id='$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'Deleted a purchase order transaction')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());



if ($view==1)
{
header ("Location:view_lpo_trans.php?order_code=$order_code");
}
else
{
header ("Location:begin_order.php?order_code=$order_code");
}


}

mysql_close($cnn);


?>


