<?php
include('Connections/fundmaster.php');
$order_code_id=$_GET['order_code_id'];
$received_stock_id=$_GET['received_stock_id'];
$view=$_GET['view'];
$sqltemp="select * from items, received_stock 
where items.item_id=received_stock.product_id  AND received_stock.received_stock_id='$received_stock_id'";
$resultstemp=mysql_query($sqltemp) or die ("Error : $sqltemp.".mysql_error());
$rowstemp=mysql_fetch_object($resultstemp);
?>
<form name="gen_order" action="process_edit_received_stock_product.php?received_stock_id=<?php echo $received_stock_id;?>&order_code_id=<?php echo $order_code_id; ?>" method="post">			
<table width="100%" border="0">
  
  <tr>
    <td width="20%">&nbsp;</td>
    
    <td>Select Product</td>
    <td>
	<select name="prod">
	

	<option value="<?php echo $rowstemp->item_id;?>"><?php echo $rowstemp->item_name; ?></option>
	<!--<?php 
$sqltemp1="select * from items order by item_name asc";
$resultstemp1=mysql_query($sqltemp1) or die ("Error : $sqltemp1.".mysql_error());
while ($rowsemp1=mysql_fetch_object($resultstemp1))
{
?>
<option value="<?php echo $rowsemp1->item_id;?>"><?php echo $rowsemp1->item_name; ?></option>

<?php	
	
}
?>	-->							 
								  
								  </select></td>
								  
								  <td></td>
   
    
  
 
  
  
 
 
  </tr>
  <tr>
    <td width="20%">&nbsp;</td>
    
    <td>Quantity Received</td>
    <td>
	<input type="text" size="41" name="qnty_rec" value="<?php echo $rowstemp->quantity_rec;?>">
	<input type="hidden" size="41" name="orig_qnty_rec" value="<?php echo $rowstemp->quantity_rec;?>">

	
	
	</td>
								  
								  <td></td>
   
    
  
 
  
  
 
 
  </tr>
  
  <tr>
    <td width="20%">&nbsp;</td>
    
    <td>Delivery Date</td>
    <td><input type="text" name="delivery_date" size="41"  value="<?php echo $rowstemp->delivery_date;?>"/></td>
								  
								  <td></td>
   
    
  
 
  
  
 
 
  </tr>
  
 
  <tr height="50">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    
    <td colspan="2"><input type="submit" name="submit" value="Update Transaction">&nbsp;<input type="reset" value="Cancel"></td>
   
    
  </tr>
  
 
  
</table>

</form>
