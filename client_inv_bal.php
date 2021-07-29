<?php 
    include('Connections/fundmaster.php');
//basic invoice details
//$invoice_id=90;
//$invoice_ttl=0;

$sales_id= $_GET['invoice_id'];

$sqlts="SELECT SUM((item_cost*item_quantity)+vat_value) as task_totals from sales_item where sales_id='$sales_id'";
$resultsts= mysql_query($sqlts) or die ("Error $sqlts.".mysql_error());
$rowsts=mysql_fetch_object($resultsts);
						 
$task_totals=$rowsts->task_totals;	

$sqlts2="SELECT SUM(amount_received) as ttl_payment from invoice_payments where sales_id='$sales_id'";
$resultsts2= mysql_query($sqlts2) or die ("Error $sqlts2.".mysql_error());
$rowsts2=mysql_fetch_object($resultsts2);

$ttl_payment=$rowsts2->ttl_payment;

$inv_balance=$task_totals-$ttl_payment;
?>
<input type="text" required name="amount" size="20" value="<?php echo $inv_balance;  ?>">

