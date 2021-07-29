<?php
include('Connections/fundmaster.php');
$sales_item_id=$_GET['sales_item_id'];
$sales_id=$_GET['sales_id'];
//$purchase_order_id=$_GET['purchase_order_id'];
$q=$_GET['q'];
$cash=$_GET['cash'];


if ($q==1)
{
$sqltemp="select * FROM quote_item,items WHERE quote_item.item_id=items.item_id AND 
quote_item.sales_item_id='$sales_item_id'";
$resultstemp=mysql_query($sqltemp) or die ("Error : $sqltemp.".mysql_error());	
	
}
else
{
$sqltemp="select * FROM proforma_item,items WHERE proforma_item.item_id=items.item_id AND 
proforma_item.sales_item_id='$sales_item_id'";
$resultstemp=mysql_query($sqltemp) or die ("Error : $sqltemp.".mysql_error());
}
$rowstemp=mysql_fetch_object($resultstemp);

?>


<form name="gen_order" action="processeditproforma_item.php?sales_item_id=<?php echo $sales_item_id;?>&q=<?php echo $q; ?>&sales_id=<?php echo $sales_id; ?>&cash=<?php echo $cash ?>" method="post">			
<table width="100%" border="0">
    
  <tr>
    <td>&nbsp;</td>
    <td></td>
    <td></td>
    <td>Select Item</td>
    <td>
	<select name="prod" style="width:200px;">
	

	<option value="<?php echo $rowstemp->item_id;?>"><?php echo $rowstemp->item_name; ?></option>
								  <?php
								  
								  $query1="select * from items order by item_name asc";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->item_id; ?>"><?php echo $rows1->item_name; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
								  
								  
								  
								  
								  
								  ?>
								  
								  </select></td>
    <td></td>
    <td rowspan="3"></td>
    
  </tr>
   
   
   <?php 
  if ($q==1)
  {
	  
	  
  }
  else
  {
  ?> 
    
   
   <tr>
    <td>&nbsp;</td>
    <td></td>
    <td>
	
	
	
	</td>
    <td>Enter Quantity</td>
    <td colspan="2"><input type="text" name="qnty" size="20" value="<?php echo $rowstemp->item_quantity;?>"></td>
    
   
    
  </tr>
  <?php 
  
  }
  ?>
  <tr>
    <td>&nbsp;</td>
    <td></td>
    <td>
	
	
	
	</td>
 
    <td >Unit Price </td>
	
	
	<td><input type="text" name="vend_price" size="20" value="<?php echo $vendor_prc=$rowstemp->item_cost;?>"></td>
    
   
    
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
