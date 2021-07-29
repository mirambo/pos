<?php 
    include('Connections/fundmaster.php');


$order_code= $_GET['invoice_id'];

$sqlts="SELECT SUM(vendor_prc*quantity) as task_totals from purchase_order where order_code='$order_code'";
$resultsts= mysql_query($sqlts) or die ("Error $sqlts.".mysql_error());
$rowsts=mysql_fetch_object($resultsts);
						 
$task_totals=$rowsts->task_totals;	

$sqlts2="SELECT SUM(amount_received) as ttl_payment from supplier_payments where order_code_id='$order_code'";
$resultsts2= mysql_query($sqlts2) or die ("Error $sqlts2.".mysql_error());
$rowsts2=mysql_fetch_object($resultsts2);

$ttl_payment=$rowsts2->ttl_payment;

$inv_balance=$task_totals-$ttl_payment;
?>
<input type="text" name="amount" value="<?php echo $inv_balance; ?>" size="20">

