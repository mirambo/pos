<?php
include('Connections/fundmaster.php');
$order_code=$_GET['order_code'];
$purchase_order_id=$_GET['stock_transfer_id'];
$view=$_GET['view'];
$sqltemp="select * FROM stock_transfer_items,items WHERE stock_transfer_items.item_id=items.item_id AND stock_transfer_items.stock_transfer_item_id='$purchase_order_id'";
$resultstemp=mysql_query($sqltemp) or die ("Error : $sqltemp.".mysql_error());
$rowstemp=mysql_fetch_object($resultstemp);

 $rowstemp->item_id;

?>


<form name="gen_order" action="processedit_stock_transfer_items.php?purchase_order_id=<?php echo $purchase_order_id;?>&view=<?php echo $view; ?>&order_code=<?php echo $order_code; ?>" method="post">			
<table width="100%" border="0">
    
  <tr>
    <td>&nbsp;</td>
    <td><!--Select Product Category--></td>
    <td><!--<select name="prod_cat" id="prod_cat" onChange="reload(this.form)">
	<?php
	
	$querycat="select * from product_categories where cat_id='$id'";
	$resultscat=mysql_query($querycat) or die ("Error: $querycat.".mysql_error());
	$rowscat=mysql_fetch_object($resultscat);
	
	if ($id=='')
	{


	?>
	<option>-------------------Select-----------------------</option>
								  <?php
								  
     }
	 
	 else 
	 
	 { ?>
	 <option><?php echo $rowscat->cat_name; ?></option>
	 <?php 
	 
	 }
								  
								  $query1="select * from product_categories";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->cat_id; ?>"><?php echo $rows1->cat_name; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
								  
								  
								  
								  
								  
								  ?>
								  
								  </select>--></td>
    <td>Select Product</td>
    <td>
	<select name="prod" style="width:200px;">
	

	<option value="<?php echo $rowstemp->item_id;?>"><?php echo $rowstemp->item_name.' ('.$rowstemp->item_code.')'; ?></option>
								  <?php
								  
								  $query1="select * from items order by item_name asc";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->item_id; ?>"><?php echo $rows1->item_name; ?>    (<?php echo $rows1->item_code; ?>)</option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
								  
								  
								  
								  
								  
								  ?>
								  
								  </select></td>
    <td></td>
    <td rowspan="3"></td>
    
  </tr>
   <tr>
    <td>&nbsp;</td>
    <td></td>
    <td>
	
	
	
	</td>
    <td>Enter Quantity</td>
    <td colspan="2"><input type="text" name="qnty" size="20" value="<?php echo $rowstemp->transfer_quantity;?>"></td>
    
   
    
  </tr>

 
  
  
 
  
  <tr height="50">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2"><input type="submit" name="submit" value="Update Transaction">&nbsp;<input type="reset" value="Cancel"></td>
   
    <td>&nbsp;</td>
    <td>&nbsp;</td>
   
    <td ></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  
 
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>

</form>
