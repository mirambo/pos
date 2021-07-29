<?php include('Connections/fundmaster.php'); 

$lpo_no=$_GET['lpo_no'];
$supplier_id=$_GET['supplier_id'];
$order_code=$_GET['order_code'];
$qnty_ordered=$_GET['qnty_ordered']; //Amoutn Received so far dispalyed incase of arbnormal amount
$currency=$_GET['currency'];
$amnt=$_GET['amnt'];
$amnt_paid_sofar=$_GET['amnt_paid_sofar'];
$sqlcurr="select * from currency where curr_id='$currency'";
$resultscurr= mysql_query($sqlcurr) or die ("Error $sqlcurr.".mysql_error());
$rowcurr=mysql_fetch_object($resultscurr);
$curr_name=$rowcurr->curr_name;
$curr_rate=$rowcurr->curr_rate;

$s_id=$_GET['stock_payment_id'];
$receipt_no=$_GET['receipt_no'];

$sqlsp="select suppliers.supplier_name,stock_payments.amnt_paid,stock_payments.receipt_no,stock_payments.stock_payments_id,stock_payments.mop,
stock_payments.cheque_no,stock_payments.ref_no,stock_payments.client_bank,stock_payments.our_bank,
stock_payments.date_drawn,stock_payments.date_paid,stock_payments.status,
stock_payments.currency,stock_payments.exchange_rate,currency.curr_name FROM stock_payments,suppliers,currency where 
stock_payments.supplier_id=suppliers.supplier_id AND stock_payments.currency=currency.curr_id AND stock_payments.stock_payments_id='$s_id'";
$resultssp= mysql_query($sqlsp) or die ("Error $sqlsp.".mysql_error());
$rowssp=mysql_fetch_object($resultssp);



//after redudancy


//echo pow(8, 2);


?>

<html xmlns="http://www.w3.org/1999/xhtml">

<!--<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>-->
<script type="text/javascript" src="calender/calendar.js"></script>
<script type="text/javascript" src="calender/lang/calendar-en.js"></script>
<script type="text/javascript" src="calender/calendar-setup.js"></script>

<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>

<style type="text/css">

@import url(calender/calendar-win2k-1.css);

</style>

<body>

	<div id="page-wrap">

		<?php include ('header.php') ?>
		
		<div id="zone-bar" class="br-5">
          <?php include ('topmenu.php') ?>
		</div>
<?php require_once('includes/stocksubmenu.php');  ?>
		
		<h3>:: Recording Payments for Stock Ordered</h3>
         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
			<div id="cont-left" class="br-5">
<form name="rec_inv_pay" action="process_edit_stockpayments.php?stock_payment_id=<?php echo $s_id;?>&receipt_no=<?php echo $receipt_no; ?>" method="post">	
<?php 
$sql="select * from suppliers where supplier_id='$supplier_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$rows=mysql_fetch_object($results);


?>
		
<table width="100%" border="0">
  <tr bgcolor="#ffff99">
    <td width="18%">&nbsp;</td>
	<td colspan="3" height="30"><?php

if ($_GET['updateconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Payment Recorded Updated successfully!!</font></strong></p></div>';


if ($_GET['abnormal']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! Amount Paid to supplier cant be higher than the cost of stock</font></strong></p></div>';

?>

<?php

if ($_GET['recordexist']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! the record exist</font></strong></p></div>';
?></td>
    </tr>
	<!--<tr height="30" bgcolor="#C0D7E5">
    <td >&nbsp;</td>
    <td width="19%"><strong>LPO Number : </strong></td>
    <td width="23%"><?php echo $lpo_no; ?></td>
    <td width="40%" rowspan="10" valign="center">
		
	<div id='rec_inv_pay_errorloc' class='error_strings'></div>
	
	
	</td>
  </tr>-->
	
  
  
  <tr height="30" bgcolor="#ffff99">
    <td bgcolor="">&nbsp;</td>
    <td width="19%"><strong>Supplier Name: </strong></td>
    <td width="23%"><?php echo $rowssp->supplier_name;?>
	<!--<input type="hidden" size="41" name="supplier_id" value="<?php  echo $supplier_id; ?>">
	                                                  <input type="hidden" size="41" name="order_code" value="<?php   echo $order_code; ?>">
													  <input type="hidden" size="41" name="lpo_no" value="<?php   echo $lpo_no; ?>">
													   <input type="hidden" size="41" name="currency" value="<?php   echo $currency; ?>">
													   <input type="hidden" size="41" name="curr_rate" value="<?php   echo $curr_rate; ?>">
													   <input type="hidden" size="41" name="cost_of_stock" value="<?php echo $amnt; ?>">
													   <input type="hidden" size="41" name="amnt_paid_sofar" value="<?php echo $amnt_paid_sofar; ?>">-->
	
	</td>
    </tr>
  
 <!-- <tr height="30" bgcolor="#C0D7E5">
    <td bgcolor="">&nbsp;</td>
    <td width="19%" ><strong>Cost of Stock Ordered : </strong></td>
    <td width="23%" align="right"><strong><?php echo $curr_name.' '.number_format($amnt,2);?></strong>
	
	
	</td>
    
  </tr>
  
  <tr height="30" bgcolor="#ffff99">
    <td bgcolor="">&nbsp;</td>
    <td width="19%"><strong>Amount Paid : </strong></td>
    <td width="23%" align="right"><strong><?php 
	
	
	
	echo $curr_name.' '.number_format($amnt_paid_sofar,2);
	
	

	?></strong>
	
	
	</td>
    
  </tr>
  
  <tr height="30" bgcolor="#C0D7E5">
    <td bgcolor="">&nbsp;</td>
    <td width="19%"><strong>Balance To Be Cleared : </strong></td>
    <td width="23%" align="right"><strong>
	<?php 
	
	$bal=$amnt-$amnt_paid_sofar;
	
	echo $curr_name.' '.number_format($bal,2);
	
	
	
	?>
	 <input type="hidden" size="41" name="balance" value="<?php echo $bal; ?>">
	</strong></td>
    
  </tr>-->
  
  <tr height="30" bgcolor="#ffff99">
    <td bgcolor="">&nbsp;</td>
    <td width="19%">Amount Paid to supplier(<?php echo $curr_name=$rowssp->curr_name; ?>)<font color="#FF0000">*</font></td>
    <td width="23%"><input type="text" size="41" name="amnt_paid_to_supplier" value="<?php echo $rowssp->amnt_paid; ?>"></td>
  </tr>
  <tr height="20">
    <td>&nbsp;</td>
    <td>Select Currency<font color="#FF0000">*</font></td>
    <td>
	<select name="currency">
	
	 <option value="<?php echo $rowssp->currency;?>"><?php echo $rowssp->curr_name;?></option>
	
	                
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
							   </td>
    </tr>
	
	
	<!--<tr height="30" bgcolor="#ffff99">
    <td bgcolor="">&nbsp;</td>
    <td width="19%">Update Exchange Rate From<strong>(<?php echo $curr_name=$rowssp->curr_name; ?>)</strong> To <strong>(Kshs.)</strong><font color="#FF0000">*</font></td>
    <td width="23%"><input type="text" size="41" name="curr_rate" value="<?php echo $curr_rate=$rowssp->exchange_rate; ?>"></td>
    </tr>-->
  <!--<tr height="30" bgcolor="#ffff99">
    <td bgcolor="">&nbsp;</td>
    <td width="19%">Exchange Rate (<?php echo $curr_name; ?> To Kshs.)<font color="#FF0000">*</font></td>
    <td width="23%"><input type="text" size="41" name="exchange_rate"></td>
    </tr>-->
  <tr height="30" bgcolor="#C0D7E5">
    <td bgcolor="">&nbsp;</td>
    <td width="19%">Enter Mode Of Payment<font color="#FF0000">*</font></td>
    <td width="23%"><select name="mop">
	
	<option value="<?php echo $mop=$rowssp->mop;?>"><?php echo $rowssp->mop;?></option>
	
	<option value="Cash">Cash</option>
	<option value="Cheque">Cheque</option>
	<option value="Electronic Transfer">Electronic Transfer</option>
	
	
	
	</select>
	
	
	</td>
   
  </tr>
   <tr bgcolor="#ffff99">
   <td bgcolor="">&nbsp;</td>
   <td colspan="2" align="center"><strong>Cheque Details (If Paid Via Cheque)</strong></td></tr>
 </tr>
   <tr height="20">
    <td bgcolor="">&nbsp;</td>
    <td width="19%" valign="top">Enter Cheque No <font color="#FF0000">*</font></td>
    <td width="23%"><input type="text" name="cheque_no" size="40"
	<?php 
	if ($mop!='Cheque')
	{
	?>
	
	<?php
	}
	else
	{?>
	value="<?php echo $rowssp->cheque_no;?>" 
	<?php
	}
	?>
	/></td>
    <td width="40%"  valign="top"></td>
  </tr>
  <?php
$bank_id=$rowssp->our_bank;
$sqlemp_det="select * from banks where bank_id='$bank_id'";
$resultsemp_det= mysql_query($sqlemp_det) or die ("Error $sqlemp_det.".mysql_error());
$rowsemp_det=mysql_fetch_object($resultsemp_det);

 ?> 
  
  <tr height="20">
    <td>&nbsp;</td>
    <td>Cheque Drawer (Bank Cheque)<font color="#FF0000">*</font></td>
    <td><select name="cheq_drawer">
	<?php 
	if ($mop=='Cheque')
	{
	?>
	
	 <option value="<?php echo $rowsemp_det->bank_id;?>"><?php echo $rowsemp_det->bank_name.' ('.$rowsemp_det->account_name.')';?></option>
	<?php
	}
	else
	{?>
	 <option>------------------Select--------------------</option>
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
									
                               </select></td>
    </tr>
   <tr height="20">
    <td>&nbsp;</td>
    <td>Date Drawn<font color="#FF0000"></font></td>
    <td><input type="text" name="date_drawn" size="40" id="date_drawn" readonly="readonly"
<?php 
	if ($mop=='Cheque')
	{
	?>
	value="<?php echo $rowssp->date_drawn;?>"
	<?php
	}
	else
	{?>
	
	<?php
	}
	?>

	/><input name="DateFormats" id="DateFormats" disabled value="dd/mm/yyyy" type="hidden"></td>
    </tr>
<tr bgcolor="#ffff99">
   <td bgcolor="">&nbsp;</td>
   <td colspan="2" align="center"><strong>Bank Transfer Details (If paid Via Bank Transfer)</strong></td></tr>
  </tr>
   <tr height="20">
    <td bgcolor="">&nbsp;</td>
    <td width="19%" valign="top">Enter Refference No <font color="#FF0000">*</font></td>
    <td width="23%"><input type="text" name="ref_no" size="40" 
	<?php 
	if ($mop=='Electronic ' || $mop=='Electronic Transfer')
	{
	?>
	
	value="<?php echo $rowssp->ref_no;?>" 
	<?php
	}
	else
	{?>
	
	<?php
	}
	?>
	
	/></td>
    <td width="40%"  valign="top"></td>
  </tr>
  <tr height="20">
    <td bgcolor="">&nbsp;</td>
    <td width="21%" valign="top">Enter Client Bank<font color="#FF0000">*</font></td>
    <td width="23%"><input type="text" name="dep_bank" size="40" 
	
	<?php 
	if ($mop=='Electronic ' || $mop=='Electronic Transfer')
	{
	?>	
	value="<?php echo $rowssp->client_bank;?>" 
	<?php
	}
	else
	{
	?>
	
	<?php
	}
	?>
	
	
	/></td>
    
  </tr>
  <tr height="20">
    <td>&nbsp;</td>
    <td>Select Bank Trasfered From<font color="#FF0000">*</font></td>
    <td><select name="trans_src_bank">
	                  <?php 
if ($mop=='Electronic ' || $mop=='Electronic Transfer')
	{
	?>
	
	 <option value="<?php echo $rowsemp_det->bank_id;?>"><?php echo $rowsemp_det->bank_name.' ('.$rowsemp_det->account_name.')';?></option>
	<?php
	}
	else
	{?>
	 <option>------------------Select--------------------</option>
	<?php
	}
	
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
									
                               </select></td>
    </tr>
   <tr height="20">
    <td>&nbsp;</td>
    <td>Date Transfered<font color="#FF0000"></font></td>
    <td><input type="text" name="date_trans" size="40" id="date_trans" readonly="readonly"
<?php 
if ($mop=='Electronic ' || $mop=='Electronic Transfer')
	{
	?>
	value="<?php echo $rowssp->date_drawn;?>"
	<?php
	}
	else
	{?>
	
	<?php
	}
	?>

	/><input name="DateFormats" id="DateFormats" disabled value="dd/mm/yyyy" type="hidden"></td>
    </tr>	
  
  
   <!--<tr height="30" bgcolor="#ffff99">
    <td bgcolor="">&nbsp;</td>
    <td width="19%">Enter Expiry Date <font color="#FF0000">*</font></td>
    <td width="23%"><input type="text" name="exp_date" size="30" id="exp_date" readonly="readonly" /></td>
    </tr>
<tr height="30">
    <td>&nbsp;</td>
    <td>Batch Number</td>
    <td><textarea rows="5" cols="30" name="mach_cat_desc"></textarea></td>
    </tr>-->
  
  <tr bgcolor="#C0D7E5" height="30">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="submit" name="submit" value="Update">&nbsp;&nbsp;<input type="reset" value="Cancel"></td>
 
  </tr>
  <tr bgcolor="#ffff99" height="30">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  
  </tr>
  
</table>

</form>

<SCRIPT language="JavaScript">
 var frmvalidator  = new Validator("rec_inv_pay");
 frmvalidator.EnableOnPageErrorDisplaySingleBox();
 frmvalidator.EnableMsgsTogether();
 frmvalidator.addValidation("amnt_paid_to_supplier","req",">>Please enter the amount paid to supplier");
 frmvalidator.addValidation("amnt_paid_to_supplier","numeric","Amount paid must be number and without comma");
 frmvalidator.addValidation("mop","dontselect=0",">>Please select mode of payment");
 
  </SCRIPT>
<script type="text/javascript">
  Calendar.setup(
    {
      inputField  : "date_drawn",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "date_drawn"       // ID of the button
    }
  );
  
  Calendar.setup(
    {
      inputField  : "date_trans",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "date_trans"       // ID of the button
    }
  );
  
  
  
  </script>
			
			
			
					
			  </div>
				
				<div id="cont-right" class="br-5">
					
				</div>
			
			
			</div>
			
			
				
				
				
				
					<div class="clear"></div>
				</div>
				<div class="clear"></div>
			</div>
			<div id="footer">
			<?php include ('footer.php'); ?>
		</div>
		</div>
		
		
		
	</div>
	
</body>

</html>