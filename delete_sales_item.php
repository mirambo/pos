<?php
#include connection
require_once('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
//$updt_uname=mysql_real_escape_string($_POST['updt_uname']);
//$updt_pword=mysql_real_escape_string($_POST['updt_pword']);
$sales_id=$_GET['sales_id'];
$sales_item_id=$_GET['sales_item_id'];
$view=$_GET['view'];
$cash=$_GET['cash'];

$sqlrec="select * FROM sales WHERE sales_id='$sales_id'";
$resultsrec= mysql_query($sqlrec) or die ("Error $sqlrec.".mysql_error());	
$rowsrec=mysql_fetch_object($resultsrec);
$posted=$rowsrec->posted;



if ($posted==1)
{
?>

<script type="text/javascript">
alert('SORRY!! THIS INVOICE HAS BEEN POSTED. CANNOT BE ADJUSTED');
//window.location = "home.php?initiateproject=initiateproject&sub_module_id=<?php echo $sub_module_id; ?>";
window.location = "<?php echo $_SERVER['HTTP_REFERER']; ?>";
</script>

 


<?php	
	
}

else
{


$sql= "delete from sales_item where sales_item_id='$sales_item_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sql1= "DELETE FROM inventory_ledger where order_code='sls$sales_item_id'";
$results1= mysql_query($sql1) or die ("Error $sql1.".mysql_error());

$sql1= "DELETE FROM item_transactions where transaction_code='sls$sales_item_id'";
$results1= mysql_query($sql1) or die ("Error $sql1.".mysql_error());


$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'Deleted a sales item from the system')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());



?>
<script type="text/javascript">
alert('Sales Items Deleted Successfuly');
//window.location = "home.php?initiateproject=initiateproject&sub_module_id=<?php echo $sub_module_id; ?>";
window.location = "<?php echo $_SERVER['HTTP_REFERER']; ?>";
</script>

<?php
}



mysql_close($cnn);


?>


