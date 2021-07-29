<?php
include('Connections/fundmaster.php');
$sales_item_id=$_GET['sales_item_id'];
$sales_id=$_GET['sales_id'];
//$purchase_order_id=$_GET['purchase_order_id'];
$view=$_GET['view'];
$cash=$_GET['cash'];
$sqltemp="select * FROM sales_item,items WHERE sales_item.item_id=items.item_id AND 
sales_item.sales_item_id='$sales_item_id'";
$resultstemp=mysql_query($sqltemp) or die ("Error : $sqltemp.".mysql_error());
$rowstemp=mysql_fetch_object($resultstemp);

$sqlrec="select * FROM sales WHERE sales_id='$sales_id'";
$resultsrec= mysql_query($sqlrec) or die ("Error $sqlrec.".mysql_error());	
$rowsrec=mysql_fetch_object($resultsrec);
$posted=$rowsrec->posted;



if ($posted==1)
{
?>

 <script language="Javascript">

 function redirectToFB(){
            window.opener.location.href="generate_invoice.php?sales_id=<?php echo $sales_id; ?>";
            setTimeout("self.close()", 100);
        }

    </script>


	</br></br>
<p align="center" style="height:50px;" ><input type="submit" name="submit" value="SORRY!! THIS INVOICE HAS BEEN POSTED. CANNOT BE ADJUSTED" OnClick="redirectToFB()" style="background:#ff0000; top:50px; font-size:14px; color:#ffffff; font-weight:bold; width:auto; height:30px; border-radius:5px;"></p>
</BR>
<p align="center" style="height:50px;" >
<a href="generate_invoice.php?sales_id=<?php echo $sales_id; ?>" style="background:#2E3192; padding-left:30px; padding-right:30px; padding-top:5px; padding-bottom:5px; top:50px; font-size:14px; color:#ffffff; font-weight:bold; width:100px; height:30px; border-radius:5px;">OK</a>



<?php	
	
}

else
{

?>


<form name="gen_order" action="processeditsales_item.php?sales_item_id=<?php echo $sales_item_id;?>&view=<?php echo $view; ?>&sales_id=<?php echo $sales_id; ?>&cash=<?php echo $cash ?>" method="post">			
<table width="100%" border="0">
    
  <tr>
    <td>&nbsp;</td>
    <td></td>
    <td></td>
    <td>Select Item</td>
    <td>
	<select name="prod" style="width:200px;">
	

	<option value="<?php echo $rowstemp->item_id;?>"><?php echo $rowstemp->item_name; ?></option>
								  <!--<?php
								  
								  $query1="select * from items order by item_name asc";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->item_id; ?>"><?php echo $rows1->item_name; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
								  
								  
								  
								  
								  
								  ?>-->
								  
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
    <td colspan="2"><input type="text" name="qnty" size="20" value="<?php echo $rowstemp->item_quantity;?>"></td>
    
   
    
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td></td>
    <td>
	
	
	
	</td>
 
    <td >Unit Price </td>
	
	
	<td><input type="text" name="vend_price" size="20" readonly value="<?php echo $vendor_prc=$rowstemp->item_cost;?>"></td>
    
   
    
  </tr>
  
    <!--<tr>
    <td>&nbsp;</td>
    <td></td>
    <td>
	
	
	
	</td>
 
    <td >Discount (Kshs.)</td>
	
	
	<td><input type="text" name="item_disc" size="20" value="<?php echo $item_disc=$rowstemp->shop_id;?>"></td>
    
   
    
  </tr>-->
 
  
  
 
  
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

<?php 
}
?>
