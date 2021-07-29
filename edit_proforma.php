<?php 
include('includes/session.php'); 
include('Connections/fundmaster.php'); 
$order_code=$_GET['sales_id'];

$q=$_GET['q'];


if ($q==1)
{
$sqllpdet="select * FROM customer,quote WHERE quote.customer_id=customer.customer_id AND quote.sales_id='$order_code'";
$resultslpdet= mysql_query($sqllpdet) or die ("Error $sqllpdet.".mysql_error());
$rowsrec=mysql_fetch_object($resultslpdet);	
	
}
else
{
$sqllpdet="select * FROM customer,proforma WHERE proforma.customer_id=customer.customer_id AND proforma.sales_id='$order_code'";
$resultslpdet= mysql_query($sqllpdet) or die ("Error $sqllpdet.".mysql_error());
$rowsrec=mysql_fetch_object($resultslpdet);
}

$shop_id=$rowsrec->shop_id;

$queryshp="select * from account where account_id='$shop_id'";
$resultshp=mysql_query($queryshp) or die ("Error: $queryshp.".mysql_error());								  
$rowshp=mysql_fetch_object($resultshp);
$shop_name=$rowshp->account_name;


$supplier_id=$rowsrec->customer_id;
$supplier_name=$rowsrec->customer_name;
$shipper_id=$rowsrec->shipper_id;
$lpo_no=$rowsrec->sales_id;
$discount=$rowsrec->discount;
$vat=$rowsrec->vat;
$sales_rep=$rowsrec->sales_rep;
$comments=$rowsrec->general_remarks;
$order_date=$rowsrec->sale_date;
$order_no=$rowsrec->order_no;
$delivery_address=$rowsrec->delivery_address;
$delivered_by=$rowsrec->delivered_by;
$sale_type=$rowsrec->sale_type;


$queryshp="select * from users where user_id='$sales_rep'";
$resultshp=mysql_query($queryshp) or die ("Error: $queryshp.".mysql_error());								  
$rowshp=mysql_fetch_object($resultshp);
$sales_rep_name=$rowshp->f_name;



$sqlrec="SELECT * FROM invoice_payments WHERE sales_id='$order_code' and receipt_no=''";
$resultsrec= mysql_query($sqlrec) or die ("Error $sqlrec.".mysql_error());	
$rowsrec=mysql_fetch_object($resultsrec);
$mop=$rowsrec->mop;
$amnt_rec=$rowsrec->amount_received;

$querymop="select * from mop where mop_id='$mop'";
$resultsmop=mysql_query($querymop) or die ("Error: $querymop.".mysql_error());								  
$rowsmop=mysql_fetch_object($resultsmop);
$mop_name=$rowsmop->mop_name;



?>

<script type="text/javascript"> 
function confirmSave()
{
    return confirm("Are you sure want to save?");
}
</script>

<script src="jquery.min.js"></script>
<script type="text/javascript"> 
$(document).ready(function () {
            $('#mop').change(function () {			
			
                if (this.value == "1") {
                    $('#Cash').show();
                } else {
                    $('#Cash').hide();
                }				
				
				if (this.value == "2") {
                    $('#Cheque').show();
                } else {
                    $('#Cheque').hide();
                }
				
				if (this.value == "3") {
                    $('#Transfer').show();
                } else {
                    $('#Transfer').hide();
                }
				
				if (this.value == "4") {
                    $('#mpesa').show();
                } else {
                    $('#mpesa').hide();
                }

            });
        });


</script>
<script type="text/javascript" src="jquery.js"/>
<script type="text/javascript">
    $(document).ready(function() {
     
    $("#customer_id").change(function() {
    //$(this).after('<div id="loader"><img src="loader.gif" alt="loading subcategory" /></div>');
    $.get('load_delivery.php?parent_cat=' + $(this).val(), function(data) {
    $("#sub_cat").html(data);
       $('#loader').slideUp(200, function() {
    $(this).remove();
    });
    });
    });
	
	
    
    });
	
    </script>

<form name="start_invoice" action="process_edit_proforma.php?order_code=<?php echo $order_code;?>&q=<?php echo $q; ?>" method="post">	
<table width="100%" border="0">
   <tr height="20" bgcolor="#C0D7E5">

    <td width="15%" valign="top" align="right">

	Select Customer

	<font color="#FF0000"></font></td>
    
	
	
	<td width="15%" valign="top">
	
	<select name="client_id" id="customer_id">
	
	
	
<option value="<?php echo $supplier_id; ?>"><?php echo $supplier_name?></option>
								  
								  
								  
								  <?php
								  
								  $query1="select * from customer order by customer_name asc";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->customer_id; ?>"><?php echo $rows1->customer_name; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
								  
								  
								  
								  
								  
								  ?>
								  
								  </select> 
	
	</td>
	
	
	
	
	
	
	
	
	<td width="15%" valign="top" align="center">
	Discount(%)<input type="text" name="discount" size="5" value="<?php echo $discount  ?>" />
	</td>
    
	
	
	<td width="15%" valign="top">
	<input type="hidden" name="orig_shop_id" value="<?php echo $shop_id; ?>">
	VAT
							   
							   <?php  
	if ($vat!=0)
        {
	?>
      <input type="radio" name="vat" value="1" checked>Yes
	  <input type="radio" name="vat" value="0">No
	  <?php 
	  }
	  else
	  {?>
	  
	  <input type="radio" name="vat" value="1">Yes
	  <input type="radio" name="vat" value="0" checked>No
	  
	  <?php 
	  }
	  
	  ?>
	
	
	</td>
	
	
	
	
	
	
	
	
	
	
	
    <td width="15%" valign="top">Date : <input type="textbox" size="10" name="date_from" value="<?php echo $order_date; ?>">	</td>
    <td width="10%" valign="top"></td>
								  <td valign="top" width="10%"><font color="#FF0000"></font></td>
								  <td valign="top" width="15%">
								  
								
								  
								  </td>
								  
  </tr>

	
	<tr height="20" bgcolor="#FFFFCC">

    <td valign="top">
	
	</td>
    <td valign="top">
	
							   
							   </td>
	
							  
							  
							   <td valign="top" width="20%" colspan="2" align="center">Terms</br><textarea name="comments" cols="30" rows="3"><?php echo $comments; ?></textarea></td>
			
							   <td></td>
							   <td></td>
							   
    </tr>
	
	<tr height="40" bgcolor="#C0D7E5" id="Cheque" style="display:none">

    <td colspan="8">Enter Cheque No:<font color="#FF0000"></font><input type="text" name="cheque_no" size="20" 
	
	<?php 
	if ($mop==2)
	{
	?>
	value="<?php echo $rowsrec->ref_no; ?>" 
	<?php
	}
	else
	{
	
	
	}

	?>
	/>
	Cheque Bank Name<font color="#FF0000"></font>
	<input type="text" name="cheq_drawer" size="20" 
	<?php 
	if ($mop==2)
	{
	?>	
	value="<?php echo $rowsrec->client_bank;?>"
	
	<?php
	}
	else
	{
	
	
	}

	?>
	
	/>
	Date Drawn
	<input type="text" name="date_drawn" size="20" id="date_drawn" readonly="readonly" 
	
	<?php 
	if ($mop==2)
	{
	?>
	value="<?php echo $rowsrec->date_paid;?>"
	<?php
	}
	else
	{
	
	
	}

	?>
	
	/><input name="DateFormats" id="DateFormats" disabled value="dd/mm/yyyy" type="hidden"></td>
								  
							   
    </tr>
	
	<tr height="40" bgcolor="#C0D7E5" id="Transfer" style="display:none">

    <td colspan="8">Transaction Code:<font color="#FF0000"></font>
	<input type="text" name="transaction_code" size="20" 
	<?php 
	if ($mop==3)
	{
	?>
	value="<?php echo $rowsrec->ref_no; ?>" 
	<?php 
	}
	else
	{
	
	
	}
	
	
	
	?>
	/>
	Client Bank<font color="#FF0000"></font>
	<input type="text" name="client_bank" size="20" 
	<?php 
	if ($mop==3)
	{
	?>
	
	value="<?php echo $rowsrec->client_bank;?>" 
	<?php 
	}
	else
	{
	
	
	}
	
	
	
	?>
	
	/>
	Date Transfered
	<input type="text" name="date_trans" size="20" id="date_trans" 
	
	<?php 
	if ($mop==3)
	{
	?>
	value="<?php echo $rowsrec->date_paid;?>" 
	<?php 
	}
	else
	{
	
	
	}
	
	
	
	?>
	
	/><input name="DateFormats" id="DateFormats" disabled value="dd/mm/yyyy" type="hidden">
	Our Bank<select name="our_bank" style="width:140px;">
	<?php 
	$our_bank=$rowsrec->our_bank;
	if ($mop==3)
	{
	
$sqlbnko="SELECT * FROM banks where bank_id='$our_bank'";
$resultsbnko= mysql_query($sqlbnko) or die ("Error $sqlbnko.".mysql_error()); 
$rowsbnko=mysql_fetch_object($resultsbnko);
	
	?>
	
	
	                  <option value="<?php echo $our_bank=$rowsrec->our_bank;?>"><?php echo $rowsbnko->bank_name; ?></option>
					  
					  <?php 
					  
					}
else
{?>

 <option value="0">Select....</option>
<?php 
}					
					  
					  ?>
								  
										  
                                    <?php 
$sqlbnk="SELECT * FROM banks order by bank_name asc";
$resultsbnk= mysql_query($sqlbnk) or die ("Error $sqlbnk.".mysql_error()); 
if (mysql_num_rows($resultsbnk) > 0)
{
						while ($rowsbnk=mysql_fetch_object($resultsbnk))
							{						
								?>  
										  
                                    <option value="<?php echo $rowsbnk->bank_id;?>"><?php echo $rowsbnk->bank_name.' ('.$rowsbnk->account_name.')';?></option>
									<?php
									}
									}
									

									?>
									
                               </select>
							   
    </tr>	
	
	<tr height="40" bgcolor="#C0D7E5" id="Cash" style="display:none">

    <td colspan="8">Enter Reference No:<font color="#FF0000"></font>
	<input type="text" name="ref_no" size="20" 
	<?php 

	if ($mop==1)
	{ 
	?> 
	value="<?php echo $rowsrec->ref_no;?>"
	<?php 
	}
	else
	{
	
	
	}
	
	?>
	
	/>
								 
							   
    </tr>
	
	<tr bgcolor="#FFFFCC" height="40" id="mpesa" style="display:none">
                <td colspan="8">Enter Reference No:<font color="#FF0000"></font>
				<input type="text" name="ref_no" size="20"  />Date Paid<input type="text" name="m_date_paid" size="40" id="m_date_paid" readonly="readonly" /><input name="DateFormats" id="DateFormats" disabled value="dd/mm/yyyy" type="hidden"></td>
								
            </tr>
	  
	 
 
  
  

 

	
	

  <tr height="15" bgcolor="#FFFFCC">


    <td colspan="6" align="center"><input onClick="return confirmSave();" type="submit" name="submit" value="Update Transaction">&nbsp;<input type="reset" value="Cancel"></td>
   

   
 

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