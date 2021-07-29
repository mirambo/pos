<?php 
include('Connections/fundmaster.php');

$invoice_id = $_GET['customer_id'];
$query_parent33 = mysql_query("SELECT * FROM order_code_get where supplier_id='$invoice_id' order by order_code_id desc") or die("Query failed: ".mysql_error());
echo "<option value='0'>Select Order.............</option>";

while($row33 = mysql_fetch_array($query_parent33))
{
	
$order_code= $row33['order_code_id'];

$sqlts="SELECT SUM(vendor_prc*quantity) as task_totals from purchase_order where order_code='$order_code'";
$resultsts= mysql_query($sqlts) or die ("Error $sqlts.".mysql_error());
$rowsts=mysql_fetch_object($resultsts);
						 
$task_totals=$rowsts->task_totals;	

$sqlts2="SELECT SUM(amount_received) as ttl_payment from supplier_payments where order_code_id='$order_code'";
$resultsts2= mysql_query($sqlts2) or die ("Error $sqlts2.".mysql_error());
$rowsts2=mysql_fetch_object($resultsts2);

$ttl_payment=$rowsts2->ttl_payment;

$inv_balance=$task_totals-$ttl_payment;	
	
	if ($inv_balance<=0)
	{
		
		
	}
	else
	{
	
	
	?>
<option value="<?php echo $row33['order_code_id']; ?>"><?php echo $row33['ref_no'].' - '.$row33['lpo_no']; ?></option>

<?php 
	}

} 

?>			  

