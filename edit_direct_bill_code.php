<?php 
include('Connections/fundmaster.php'); 
$order_code=$_GET['order_code'];
echo $view=$_GET['view'];
$sqlrec="SELECT * FROM order_code_get WHERE order_code_id='$order_code'";
$resultsrec= mysql_query($sqlrec) or die ("Error $sqlrec.".mysql_error());	
$rowsrec=mysql_fetch_object($resultsrec);
 $supplier_id=$rowsrec->supplier_id;
$querytcsp="select * from suppliers where supplier_id='$supplier_id'";
$resultstcsp=mysql_query($querytcsp) or die ("Error: $querytc.".mysql_error());								  
$rowstcsp=mysql_fetch_object($resultstcsp);
$supplier_name=$rowstcsp->supplier_name;
$order_date=$rowsrec->date_generated;
$comments=$rowsrec->comments;


$shipper_id=$rowsrec->shipper_id;
$lpo_no=$rowsrec->lpo_no;
$currency=$rowsrec->currency;

$querytcs="select * from currency where curr_id='$currency'";
$resultstcs=mysql_query($querytcs) or die ("Error: $querytc.".mysql_error());								  
$rowstcs=mysql_fetch_object($resultstcs);
$curr_name=$rowstcs->curr_name;
$curr_rate=$rowsrec->curr_rate;
$status=$rowsrec->status;
?>

<script type="text/javascript"> 
function confirmSave()
{
    return confirm("Are you sure want to save?");
}
</script>

<form name="start_invoice" action="process_edit_direct_bill_code.php?order_code=<?php echo $order_code;?>&view=<?php echo $view ?>" method="post">	
<table width="100%" border="0">
   <tr height="20" bgcolor="#C0D7E5">

    <td width="15%" valign="top">Select Supplier<font color="#FF0000"></font></td>
    <td width="15%" valign="top">
	
	<select name="sup">
	
<option value="<?php echo $supplier_id; ?>"><?php echo $supplier_name?></option>
								  <?php
								  
								  $query1="select * from suppliers";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->supplier_id; ?>"><?php echo $rows1->supplier_name; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
								  
								  
								  
								  
								  
								  ?>
								  
								  </select> <!--<a href="add_supplier.php?newsup=newsup">New Supplier</a>-->
	
	</td>
    <td width="10%" valign="top"><font color="#FF0000"></font></td>
    <td width="10%" valign="top"></td>
								  <td valign="top" width="10%">Order Date<font color="#FF0000"></font></td>
								  <td valign="top" width="15%">
								  <input type="textbox" size="10" name="date_from" value="<?php echo $order_date; ?>">	
								
								  
								  </td>
								  
  </tr>

	
	<tr height="20" bgcolor="#FFFFCC">

    <td valign="top">Currency<font color="#FF0000"></font></td>
    <td valign="top"><select name="currency">
<option value="<?php echo $currency; ?>"><?php echo $curr_name;?></option>
								  
										  
                                    <?php 
$sqlcurr="SELECT * FROM currency order by curr_name asc";
$resultscurr= mysql_query($sqlcurr) or die ("Error $sqlcurr.".mysql_error()); 
if (mysql_num_rows($resultscurr) > 0)
{
						while ($rowscurr=mysql_fetch_object($resultscurr))
							{						
								?>  
										  
                                    <option value="<?php echo $rowscurr->curr_id;?>"><?php echo $rowscurr->curr_name;?></option>
									<?php
									}
									}
									

									?>
									
                               </select>
							   
							   
					<br/>
Exchange Rate (To SSP) : <input type="textbox" size="10" name="curr_rate" value="<?php echo $curr_rate; ?>">					
							   
							   </td>
							   <td valign="top"><font color="#FF0000"></font></td>
							   <td valign="top"></td>
							   <td valign="top">Comments</td>
							   <td><textarea name="comments" cols="30" rows="5"><?php echo $comments; ?></textarea></td>
							   
    </tr>
	  
	 
 
  
  

 

	
	

  <tr height="15" bgcolor="#FFFFCC">

    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2" align="center"><input onClick="return confirmSave();" type="submit" name="submit" value="Update Transaction">&nbsp;<input type="reset" value="Cancel"></td>
   
    <td>&nbsp;</td>
    <td>&nbsp;</td>
   
 

  </tr>
  
  
  <tr height="90" bgcolor="#FFFFCC">

    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2"><div id='start_invoice_errorloc' class='error_strings'></div></td>
   
    <td>&nbsp;</td>
    <td>&nbsp;</td>
   
 

  </tr>		
	</table>		

</form>