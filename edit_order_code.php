<?php 
include('Connections/fundmaster.php'); 
$order_code=$_GET['order_code'];
$view=$_GET['view'];
$cs=$_GET['cs'];
$show_approve=$_GET['show_approve'];




$sqllpdet="select * FROM mop,currency,suppliers,order_code_get WHERE order_code_get.mop_id=mop.mop_id AND 
order_code_get.currency=currency.curr_id AND order_code_get.supplier_id=suppliers.supplier_id AND 
order_code_get.order_code_id='$order_code'";
$resultslpdet= mysql_query($sqllpdet) or die ("Error $sqllpdet.".mysql_error());
$rowsrec=mysql_fetch_object($resultslpdet);
$supplier_id=$rowsrec->supplier_id;
$supplier_name=$rowsrec->supplier_name;
$lpo_no=$rowsrec->lpo_no;
$currency=$rowsrec->currency;
$curr_rate=$rowsrec->curr_rate;
$curr_name=$rowsrec->curr_name;
$freight_charge=$rowsrec->transport_cost;
$shipper_name=$rowsrec->shipper_name;
$shipper_id=$rowsrec->shipper_id;
$pay_terms=$rowsrec->mop_name;
$pay_term_id=$rowsrec->mop_id;
$comments=$rowsrec->comments;

$lpo_type=$rowsrec->freight_charge;

$approved_status=$rowsrec->status;


$farmer_id=$rowsrec->farmer_id;
$sqlst1="SELECT * FROM  farmers where farmer_id='$farmer_id'";
$resultst1= mysql_query($sqlst1) or die ("Error $sqlst1.".mysql_error());	
$rowst1=mysql_fetch_object($resultst1);	
$farmer_name=$rowst1->farmer_name;





if ($approved_status==3)
{
	
?>
<script type="text/javascript">
alert('SORRY THIS ORDER HAS BEEN APPROVED AND POSTED IT CANNOT BE ADJUSTED');
//window.location = "home.php?initiateproject=initiateproject&sub_module_id=<?php echo $sub_module_id; ?>";
window.location = "<?php echo $_SERVER['HTTP_REFERER']; ?>";
</script>

<?php	
	
}
else
	
	{




?>
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
     
    $("#parent_cat12").change(function() {
    //$(this).after('<div id="loader"><img src="loader.gif" alt="loading subcategory" /></div>');
    $.get('load_curr.php?parent_cat12=' + $(this).val(), function(data) {
    $("#sub_cat12").html(data);
       $('#loader').slideUp(200, function() {
    $(this).remove();
    });
    });
    });
	
	
    
    });
	
    </script>

<form name="start_invoice" action="process_edit_order_code.php?order_code=<?php echo $order_code;?>&view=<?php echo $view ?>&show_approve=<?php echo $show_approve; ?>" method="post">	
<table width="100%" border="0">
   <tr height="20" bgcolor="#C0D7E5">

    <td width="15%" valign="top" align="right">Select Supplier<font color="#FF0000"></font></td>
    <td width="15%" valign="top">
	
	<select name="sup" required>
	
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
    <td width="10%" valign="top"><?php if ($farmer_id==0) {} else { ?>Farmer Name: <?php } ?><font color="#FF0000"></font></td>
    <td width="10%" valign="top"><?php if ($farmer_id==0) {} else { ?><select style="width:200px;" name="farmer_id">
<option value="<?php echo $farmer_id; ?>"><?php echo $farmer_name?></option>
								  <?php
								  
								  $query1="select * from farmers order by farmer_name asc";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->farmer_id; ?>"><?php echo $rows1->farmer_name; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
								  
								  
								  
								  
								  
								  ?>
								  
								  </select>
								  <?php } ?>
								  
								  </td>
								  <td valign="top" width="10%">Mode Of Payment<font color="#FF0000"></font></td>
								  <td valign="top" width="15%"><select name="mop" required>
	                  <option value="<?php echo $pay_term_id; ?>"><?php echo $pay_terms?></option>
								  
										  
                                    <?php 
$sqlmop="SELECT * FROM mop order by mop_name asc";
$resultsmop= mysql_query($sqlmop) or die ("Error $sqlmop.".mysql_error()); 
if (mysql_num_rows($resultsmop) > 0)
{
						while ($rowsmop=mysql_fetch_object($resultsmop))
							{						
								?>  
										  
                                    <option value="<?php echo $rowsmop->mop_id;?>"><?php echo $rowsmop->mop_name;?></option>
									<?php
									}
									}
									

									?>
									
                               </select>
								  
								
								  
								  </td>
								  
  </tr>

	
	<tr height="20" bgcolor="#FFFFCC">

    <td valign="top" align="right">Currency<font color="#FF0000"></font>
	</br>
	</br>
	</br>
	
	Date : 
	
	</td>
    <td valign="top"><select name="currency" required id="parent_cat12" style="width:100px;">
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
							   
							<span id="sub_cat12">
							   Rate: <input type="text" required name="curr_rate" value="<?php echo $rowsrec->curr_rate;?>" size="5">
							   </span> 							   
							   
							   
	</br>
	</br>
	</br>						   
<input type="text" name="date_from" id="date_from" value="<?php echo $rowsrec->date_generated;?>" size="30" />							   
							   
							   
							   </td>
							   <td valign="top" colspan="2">Terms Of Payments<font color="#FF0000"></font></br>
							   <textarea name="payment_schedule" cols="40" rows="4"><?php echo $rowsrec->payment_schedule;?></textarea>
							   
				   
							   </td>
							   <td valign="top">Delivery Conditions</td>
							   <td><textarea name="comments" cols="30" rows="5"><?php echo $comments; ?></textarea></td>
							   
    </tr>
	
	
	
	<tr height="20" bgcolor="#FFFFCC">

    <td valign="top" align="right"></font>

	
	<!--Expiry Date : -->
	Ref No
	</td>
    <td valign="top">	
<input type="text" name="ref_no" value="<?php echo $rowsrec->ref_no;?>" size="30" />		
<!--<input type="text" name="date_to" placeholder="yyyy-mm-dd" value="<?php echo $rowsrec->lpo_expiry_date;?>" size="30" />	-->						   
							   
							   
							   </td>
							   <td valign="top" colspan="2"><font color="#FF0000"></font>
							   	
							   
				   
							   </td>
							   <td valign="top"></td>
							   <td></td>
							   
    </tr>
	  
	 
 
  
  

 

	
	

  <tr height="50" bgcolor="#FFFFCC">

    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2" align="center"><input type="submit" name="submit" value="Update Transaction">&nbsp;<input type="reset" value="Cancel"></td>
   
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


<script type="text/javascript">
  Calendar.setup(
    {
      inputField  : "date_from",         // ID of the input field
      ifFormat    : "%Y-%m-%d",    // the date format
      button      : "date_from"       // ID of the button
    }
  );
  
  
  /*Calendar.setup(
    {
      inputField  : "date_to",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "date_to"       // ID of the button
    }
  );
  */
  
  
  </script>
  
  <?php 

	}
?>
  
  