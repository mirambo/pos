<?php 
    include('Connections/fundmaster.php');
//basic invoice details
//$invoice_id=90;
//$invoice_ttl=0;

 $invoice_id = $_GET['customer_id'];
 
 ?>

 <table width="60%"  class="table1" border="0" align="center">
 <tr bgcolor="#C0D7E5" height="30"><td colspan="7" align="center"><strong>Allocate payments to the following Invoices</strong></td></tr>
 
 
   <tr style="background:url(images/description.gif);" height="30" >
 <td width="10%"><div align="center"><strong>Invoice No.</strong></td>
    <td width="15%"><div align="center"><strong>Ref No.</strong></td>
    <td width="15%"><div align="center"><strong>Date Generated</strong></td>
	<td width="15%"><div align="center"><strong>Invoice Amount</strong></td>
	<td width="20%"><div align="center"><strong>Enter Amount</strong></td>
	<td width="20%"><div align="center"><strong>Select</strong></td>
	
	</tr>
<?php

 
 
 
	$query_parent33 = mysql_query("SELECT * FROM sales,currency where sales.currency=currency.curr_id and sales.customer_id='$invoice_id' 
	AND sale_type='cr' 
	and canceled_status='0'order by sales_id desc") or die("Query failed: ".mysql_error());

	while($row33 = mysql_fetch_array($query_parent33))
	{
		
		$RowCounter++;
							  if($RowCounter % 2==0)
{
echo '<tr bgcolor="#C0D7E5" height="25">';
}
else 
{
echo '<tr bgcolor="#FFFFCC" height="25" >';
}
		
		
$sales_id=$row33['sales_id'];

$job_card_id=$sales_id;
	
$sqlts="SELECT SUM((item_cost*item_quantity)+vat_value) as task_totals from sales_item where sales_id='$sales_id'";
$resultsts= mysql_query($sqlts) or die ("Error $sqlts.".mysql_error());
$rowsts=mysql_fetch_object($resultsts);
						 
$task_totals=$rowsts->task_totals;		


$sqlts2="SELECT SUM(invoice_amount_received) as ttl_payment from customer_payments where sales_id='$sales_id'";
$resultsts2= mysql_query($sqlts2) or die ("Error $sqlts2.".mysql_error());
$rowsts2=mysql_fetch_object($resultsts2);

$ttl_payment=$rowsts2->ttl_payment;

$inv_balance_round=number_format($task_totals-$ttl_payment,0);
$inv_balance=$task_totals-$ttl_payment;
		
		
if ($inv_balance_round<=0)
	{
		
		
	}
	
	else
	{
		
	
	
	?>
	
   <td><?php echo $row33['invoice_no']; ?></td>
	<td><?php echo $row33['order_no']; ?></td>
	<td><?php echo $row33['sale_date']; ?></td>
<td align="right">
	<?php
	echo $row33['curr_name'].'  '; 
	echo ' ';
	
	include ('invoice_value.php');

	?>
	
	</td>

		<td align="right"><strong><?php 
	//echo number_format($lpo_ttl_kshs=$curr_rate*$lpo_ttl,2);
	//echo number_format($rows->curr_rate,2);
	
	?></strong>
	
	<input type="text" value="<?php echo $inv_balance; ?>" required name="order_amount_received[<?php echo $sales_id; ?>]">
	</td>
	
	<td align="center"><input type="checkbox"  name="sales_id[<?php echo $sales_id; ?>]" value="<?php echo $sales_id;?>"></td>

	
	
	



</tr>
	
	
	
    <?php 
	
	} 
	
	}
	?>			  

