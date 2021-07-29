<?php
$invoice_id=$_GET['invoice_id'];
$get_invoice_ttl=$_GET['invoice_ttl'];
	
$sqlred="SELECT SUM(amount_received) as ttl_amnt_rec FROM subcon_invoice_payments where invoice_id='$invoice_id'";
$resultsred= mysql_query($sqlred) or die ("Error $sqlred.".mysql_error());
$rowsfyid=mysql_fetch_object($resultsred);

$amnt_paid=$rowsfyid->ttl_amnt_rec;	
	
$get_bal=$get_invoice_ttl-$amnt_paid;

	?>

 <script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>
 <Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>
<form name="rec_inv_pay" action="process_invoice_payment.php?invoice_id=<?php echo $invoice_id; ?>" method="post">	
<?php 
$sql="select subcon_invoices.invoice_id,subcon_invoices.invoice_no,subcon_invoices.date_generated,subcon_invoices.invoice_ttl,subcon_invoices.project_id,subcon_invoices.month_generated,
clients.c_name,projects.client_id from subcon_invoices,clients,projects where subcon_invoices.project_id=projects.project_id and projects.client_id=clients.client_id AND subcon_invoices.invoice_id='$invoice_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
/*$sql="SELECT * from invoices where invoice_id='$invoice_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());*/

$rows=mysql_fetch_object($results);


?>
		
<table width="100%" border="0">
  <tr bgcolor="#ffff99">
    <td width="18%">&nbsp;</td>
	<td colspan="3" height="30"><?php

if ($_GET['invoice_payment_confirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Payment Received successfully!!</font></strong></p></div>';


if ($_GET['abnormal']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! Amount Received Cant be higher than the balance</font></strong></p></div>';

?>

<?php

if ($_GET['recordexist']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! the record exist</font></strong></p></div>';
?></td>
    </tr>
	<tr height="30" bgcolor="#C0D7E5">
    <td >&nbsp;</td>
    <td width="19%"><strong>Invoice Number : </strong></td>
    <td width="23%"><?php echo $rows->invoice_no;?></td>
    <td width="40%" rowspan="8" valign="center">
	<div id='rec_inv_pay_errorloc' class='error_strings'></div>
	</td>
  </tr>
	
  
  
  <tr height="30" bgcolor="#ffff99">
    <td bgcolor="">&nbsp;</td>
    <td width="19%"><strong>Client Name : </strong></td>
    <td width="23%"><?php echo $rows->c_name;?><input type="hidden" size="41" name="client_id" value="<?php  echo $rows->client_id; ?>">
	                                                  <input type="hidden" size="41" name="month_generated" value="<?php   echo $rows->month_generated; ?>">
													  <input type="hidden" size="41" name="invoice_no" value="<?php   echo $rows->invoice_no; ?>">
													  <input type="hidden" size="41" name="bal" value="<?php   echo $get_bal; ?>">
													  <input type="hidden" size="41" name="amnt_rec_sofar" value="<?php echo $amnt_paid; ?>">
													  <input type="hidden" size="41" name="project_id" value="<?php echo $rows->project_id; ?>">
	
	</td>
    </tr>
  
  <tr height="30" bgcolor="#C0D7E5">
    <td bgcolor="">&nbsp;</td>
    <td width="19%" ><strong>Amount Invoiced (USD): </strong></td>
    <td width="23%" align="right"><strong><?php echo number_format($invoice_ttl=$rows->invoice_ttl,2);?></strong>
	
	
	</td>
    
  </tr>
  
  <tr height="30" bgcolor="#ffff99">
    <td bgcolor="">&nbsp;</td>
    <td width="19%"><strong>Amount Paid (USD):</strong></td>
    <td width="23%" align="right"><strong>
	<?php 
	echo number_format($amnt_paid=$rowsfyid->ttl_amnt_rec,2);	
	
	?>
	
	</strong>
	
	
	</td>
    
  </tr>
  
  <tr height="30" bgcolor="#C0D7E5">
    <td bgcolor="">&nbsp;</td>
    <td width="19%"><strong>Balance To Be Cleared (USD): </strong></td>
    <td width="23%" align="right"><strong><?php 
	$get_bal=$invoice_ttl-$amnt_paid;
	
	echo number_format($get_bal,2);
	
	?></strong></td>
    
  </tr>
  
  <tr height="30" bgcolor="#ffff99">
    <td bgcolor="">&nbsp;</td>
    <td width="19%">Enter Amount Received (USD):<font color="#FF0000">*</font></td>
    <td width="23%"><input type="text" size="41" name="amnt_paid" value="<?php echo $get_amnt_paid; ?>" ></td>
    </tr>
  
  <tr height="30" bgcolor="#C0D7E5">
    <td bgcolor="">&nbsp;</td>
    <td width="19%">Enter Mode Of Payment<font color="#FF0000">*</font></td>
    <td width="23%"><select name="mop">
	
	<option>-------------------------Select--------------------</option>
	<option value="Cash">Cash</option>
	<option value="Cheque">Cheque</option>
	<option value="Electronic Transfer">Electronic Transfer</option>
	
	
	
	</select>
	
	
	</td>
   
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
    <td><input type="submit" name="submit" value="Save">&nbsp;&nbsp;<input type="reset" value="Cancel"></td>
 
  </tr>
  <tr bgcolor="#ffff99" height="30">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
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
  frmvalidator.addValidation("amnt_paid","req",">>Please enter the amount received");
 frmvalidator.addValidation("mop","dontselect=0",">>Please select mode of payment");
 
 
 
 
  </SCRIPT>