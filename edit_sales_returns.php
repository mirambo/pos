<?php 
include('includes/session.php'); 
include('Connections/fundmaster.php'); 
$order_code=$_GET['order_code'];
echo $view=$_GET['view'];
$cs=$_GET['cs'];
$sqllpdet="select * FROM mop,currency,customer,sales_returns WHERE sales_returns.mop_id=mop.mop_id AND 
sales_returns.currency=currency.curr_id AND sales_returns.customer_id=customer.customer_id AND sales_returns.sales_returns_id='$order_code'";
$resultslpdet= mysql_query($sqllpdet) or die ("Error $sqllpdet.".mysql_error());
$rowsrec=mysql_fetch_object($resultslpdet);
$supplier_id=$rowsrec->customer_id;
$supplier_name=$rowsrec->customer_name;
$shipper_id=$rowsrec->shipper_id;
$lpo_no=$rowsrec->credit_note_no;
$currency=$rowsrec->currency;
$curr_name=$rowsrec->curr_name;
$curr_rate=$rowsrec->curr_rate;
$freight_charge=$rowsrec->freight_charge;
$comments=$rowsrec->comments;
$order_date=$rowsrec->date_generated;

$shop_id=$rowsrec->shop_id;

$queryshp="select * from account where account_id='$shop_id'";
$resultshp=mysql_query($queryshp) or die ("Error: $queryshp.".mysql_error());								  
$rowshp=mysql_fetch_object($resultshp);
$shop_name=$rowshp->account_name;
?>

<script type="text/javascript"> 
function confirmSave()
{
    return confirm("Are you sure want to save?");
}
</script>

<form name="start_invoice" action="process_edit_sales_returns.php?order_code=<?php echo $order_code;?>&view=<?php echo $view ?>" method="post">	
<table width="100%" border="0">
   <tr height="20" bgcolor="#C0D7E5">

    <td width="15%" valign="top">Select Customer<font color="#FF0000"></font></td>
    <td width="15%" valign="top">
	
	<select name="sup">
	
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
								  
								  </select> <!--<a href="add_supplier.php?newsup=newsup">New Supplier</a>-->
	
	</td>
    <td width="10%" valign="top">Shop Name :</td>
    <td width="10%" valign="top"><select name="shop_id" >
	
<option value="<?php echo $shop_id; ?>"><?php echo $shop_name?></option>
								  <?php
								  
								 include ('choose_shop.php');
								 
								  
								  
								  ?>
								  
								  </select></td>
								  <td valign="top" width="10%">Sales Returns Date<font color="#FF0000"></font></td>
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