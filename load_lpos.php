<?php 
include('Connections/fundmaster.php');

$invoice_id = $_GET['customer_id'];

$farmer_id= $_GET['farmer_id'];


if ($invoice_id==39)
{
	
	

	
}
else
{
	
	if ($farmer_id!='')
	{
		
		$farmer_id = $_GET['farmer_id'];	
		
		?>

<table width="60%"  class="table1" border="0" align="center">
 <tr bgcolor="#C0D7E5" height="30"><td colspan="7" align="center"><strong>Allocate payments to the following orders</strong></td></tr>
 
 
   <tr style="background:url(images/description.gif);" height="30" >
 <td width="10%"><div align="center"><strong>LPO No.</strong></td>
    <td width="15%"><div align="center"><strong>GRN No.</strong></td>
    <td width="15%"><div align="center"><strong>Date Generated</strong></td>
	<td width="15%"><div align="center"><strong>Amount Ordered</strong></td>
	<td width="10%"><div align="center"><strong>Rate</strong></td>
	<td width="20%"><div align="center"><strong>Amount Ordered (Tshs)</strong></td>
	<td width="20%"><div align="center"><strong>Select</strong></td>
	
	</tr>
<?php


$query_parent33 = mysql_query("SELECT * FROM order_code_get,currency where order_code_get.currency=currency.curr_id and 
farmer_id='$farmer_id' 
order by order_code_id desc") or die("Query failed: ".mysql_error());


if ($num_rowsd=mysql_num_rows($query_parent33)>0)
{

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
	
$order_code= $row33['order_code_id'];

$sqlts="SELECT SUM(vendor_prc*quantity+order_vat_value) as task_totals FROM purchase_order,order_code_get 
WHERE order_code_get.order_code_id=purchase_order.order_code AND  purchase_order.order_code='$order_code'";
$resultsts= mysql_query($sqlts) or die ("Error $sqlts.".mysql_error());
$rowsts=mysql_fetch_object($resultsts);
						 
$task_totals=$rowsts->task_totals;	

$sqlts2="SELECT SUM(order_amount_received) as ttl_payment from supplier_payments_code,supplier_payments WHERE 
supplier_payments_code.supplier_payment_code_id=supplier_payments.supplier_payment_code_id AND 
supplier_payments.order_code_id='$order_code'";
$resultsts2= mysql_query($sqlts2) or die ("Error $sqlts2.".mysql_error());
$rowsts2=mysql_fetch_object($resultsts2);

$ttl_payment=$rowsts2->ttl_payment;

$inv_balance_round=number_format($task_totals-$ttl_payment,2);	

$inv_balance=$task_totals-$ttl_payment;	
	
if ($inv_balance_round<=0)
	{
		
		
	}
	else
	{ 
	
	
	?>
	

	
	<td><?php echo $row33['lpo_no']; ?></td>
	<td><?php echo $row33['ref_no']; ?></td>
	<td><?php echo $row33['date_generated']; ?></td>
<td align="right">
	<?php
	echo $row33['curr_name']; 
	include ('lpo_value.php');

	?>
	
	</td>
		<td align="right"><?php echo number_format($curr_rate=$row33['curr_rate'],2);?></td>
		<td align="right"><strong><?php 
	//echo number_format($lpo_ttl_kshs=$curr_rate*$lpo_ttl,2);
	//echo number_format($rows->curr_rate,2);
	
	?></strong>
	
	<input type="text" value="<?php echo $inv_balance; ?>" required name="order_amount_received[<?php echo $order_code; ?>]">
	</td>
	
	<td align="center"><input type="checkbox"  name="order_code_id[<?php echo $order_code; ?>]" value="<?php echo $order_code;?>"></td>

	
	
	



</tr>

<?php 
}

} 
}
else
{
	?>
	<tr height="30"><td colspan="7" align="center"><font color="#ff0000">No orders found</font></td></tr>
	
	<?php
	
	
}

?>			  
</table>		
		
		<?php
	
	
	
		
		
	}
	else
	{

?>

 <table width="60%"  class="table1" border="0" align="center">
 <tr bgcolor="#C0D7E5" height="30"><td colspan="7" align="center"><strong>Allocate payments to the following orders</strong></td></tr>
 
 
   <tr style="background:url(images/description.gif);" height="30" >
 <td width="10%"><div align="center"><strong>LPO No.</strong></td>
    <td width="15%"><div align="center"><strong>Ref No.</strong></td>
    <td width="15%"><div align="center"><strong>Date Generated</strong></td>
	<td width="15%"><div align="center"><strong>Amount Ordered</strong></td>
	<td width="10%"><div align="center"><strong>Rate</strong></td>
	<td width="20%"><div align="center"><strong>Amount Ordered (Tshs)</strong></td>
	<td width="20%"><div align="center"><strong>Select</strong></td>
	
	</tr>
<?php


$query_parent33 = mysql_query("SELECT * FROM order_code_get,currency where order_code_get.currency=currency.curr_id and 
supplier_id='$invoice_id' 
order by order_code_id desc") or die("Query failed: ".mysql_error());


if ($num_rowsd=mysql_num_rows($query_parent33)>0)
{

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
	
$order_code= $row33['order_code_id'];

$sqlts="SELECT SUM(vendor_prc*quantity+order_vat_value) as task_totals from purchase_order where order_code='$order_code'";
$resultsts= mysql_query($sqlts) or die ("Error $sqlts.".mysql_error());
$rowsts=mysql_fetch_object($resultsts);
						 
$task_totals=$rowsts->task_totals;	

$sqlts2="SELECT SUM(order_amount_received) as ttl_payment from supplier_payments where order_code_id='$order_code'";
$resultsts2= mysql_query($sqlts2) or die ("Error $sqlts2.".mysql_error());
$rowsts2=mysql_fetch_object($resultsts2);

$ttl_payment=$rowsts2->ttl_payment;

$inv_balance_round=number_format($task_totals-$ttl_payment,2);	
$inv_balance=$task_totals-$ttl_payment;	
	
if ($inv_balance_round<=0)
	{
		
		
	}
	else
	{ 
	
	
	?>
	

	
	<td><?php echo $row33['lpo_no']; ?></td>
	<td><?php echo $row33['ref_no']; ?></td>
	<td><?php echo $row33['date_generated']; ?></td>
<td align="right">
	<?php
	echo $row33['curr_name']; 
	include ('lpo_value.php');

	?>
	
	</td>
		<td align="right"><?php echo number_format($curr_rate=$row33['curr_rate'],2);?></td>
		<td align="right"><strong><?php 
	//echo number_format($lpo_ttl_kshs=$curr_rate*$lpo_ttl,2);
	//echo number_format($rows->curr_rate,2);
	
	?></strong>
	
	<input type="text" value="<?php echo $inv_balance; ?>" required name="order_amount_received[<?php echo $order_code; ?>]">
	</td>
	
	<td align="center"><input type="checkbox"  name="order_code_id[<?php echo $order_code; ?>]" value="<?php echo $order_code;?>"></td>

	
	
	



</tr>

<?php 
}

} 
}
else
{
	?>
	<tr height="30"><td colspan="7" align="center"><font color="#ff0000">No orders found</font></td></tr>
	
	<?php
	
	
}

?>			  
</table>

<?php 
}
}
?>
