<?php
include('Connections/fundmaster.php');
$supplier_id=$_GET['supplier_id'];
$rfq_code=$_GET['rfq_code'];
$temp_rfq_id=$_GET['temp_rfq_id'];
$view=$_GET['view'];
$sqltemp="select temp_rfq.temp_rfq_id,temp_rfq.quantity,temp_rfq.product_code,products.product_name, products.pack_size from temp_rfq, products where 
temp_rfq.product_id=products.product_id and temp_rfq.temp_rfq_id='$temp_rfq_id'";
$resultstemp=mysql_query($sqltemp) or die ("Error : $sqltemp.".mysql_error());
$rowstemp=mysql_fetch_object($resultstemp);

?>


<form name="gen_order" action="processeditrfqtrans.php?temp_rfq_id=<?php echo $temp_rfq_id;?>&view=<?php echo $view; ?>&rfq_code=<?php echo $rfq_code; ?>&supplier_id=<?php echo $supplier_id ?>" method="post">			
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
	<select name="prod">
	

	<option value="<?php echo $rowstemp->product_id;?>"><?php echo $rowstemp->product_name; ?></option>
								  <?php
								  
								  $query1="select * from products order by product_name asc";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->product_id; ?>"><?php echo $rows1->product_name; ?>    (<?php echo $rows1->pack_size; ?>)</option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
								  
								  
								  
								  
								  
								  ?>
								  
								  </select></td>
    <td><!--Product Description--></td>
    <td rowspan="3"><!--<textarea name="description" cols="30" rows="5"><?php echo $rowstemp->description;?></textarea>--></td>
    
  </tr>
   <tr>
    <td>&nbsp;</td>
    <td><!--F.O.C Applicable?--></td>
    <td>
	<!--<?php  $vendor_prc=$rowstemp->vendor_prc; 
	if ($vendor_prc=='F.O.C')
        {
	?>
      <input type="radio" name="foc" value="1" checked>Yes
	  <input type="radio" name="foc" value="0">No
	  <?php 
	  }
	  else
	  {?>
	  
	  <input type="radio" name="foc" value="1">Yes
	  <input type="radio" name="foc" value="0" checked>No
	  
	  <?php 
	  }
	  
	  ?>-->
	
	
	</td>
    <td><!--Enter Quantity--></td>
    <td colspan="2"><input type="text" name="qnty" size="20" value="<?php echo $rowstemp->quantity;?>"> <!--Unit Price (<?php echo $curr_name ?>)<input type="text" name="vend_price" size="20" value="<?php echo $vendor_prc; ?>"></td>
    
   
    
  </tr>
 
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
<td colspan="2" align="center"><input type="submit" name="submit" value="&nbsp;&nbsp;&nbsp;Save Transaction&nbsp;&nbsp;&nbsp;">&nbsp;<!--<input type="reset" value="Cancel">--></td>
   <!-- 
    
   
    <td>&nbsp;</td>
-->
   
    

  </tr>
  
 
  <tr height="40">
    <td>&nbsp;</td>
	<td>&nbsp;</td>
    <td colspan="3"><div id='gen_order_errorloc' class='error_strings'></div;</td>
 
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    
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
