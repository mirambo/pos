<?php include('Connections/fundmaster.php'); 

$id=$_GET['invoice_id'];
$get_amnt_rec=$_GET['amnt_rec'];
$get_bal=$_GET['balance'];
$get_amnt_rec_sofar=$_GET['amnt_rec_sofar']; //Amoutn Received so far dispalyed incase of arbnormal amount
$get_sales_rep=$_GET['sales_rep'];
$get_amnt_paid=$_GET['amnt_paid'];
$get_mop=$_GET['mop'];
$get_change=$_GET['change'];

?>

<html xmlns="http://www.w3.org/1999/xhtml">

<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>
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
		
		
		
		<?php require_once('includes/baddebtssubmenu.php');  ?>
		
		<h3>:: Declare the balance Bad Debts</h3>
         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
			<div id="cont-left" class="br-5">
<form name="rec_inv_pay" action="process_doubtful_debts.php?invoice_id=<?php echo $id; ?>" method="post">	
<?php 
$sql="select invoices.invoice_id,invoices.invoice_no,invoices.date_generated,invoices.invoice_ttl,invoices.client_id,invoices.sales_code,
invoices.curr_rate,invoices.currency_code,currency.curr_name,clients.c_name from invoices,clients,currency where invoices.client_id=clients.client_id 
and invoices.currency_code=currency.curr_id and invoices.invoice_id='$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

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
	
	<!--<p align="right">
	<?php 
	//if ($get_change)
	//{ 
	?>
	
	<font size="+1">Amount To Be Paid:</font>
	<font size="+1" ><strong>
	<?php 
	//echo number_format($get_bal,2);
	
	?>
	</strong></font></br></br>
	
	<font size="+1">Amount Received:</font>
	<font size="+1" ><strong>
	<?php 
	//echo number_format($get_amnt_paid,2);
	
	?>
	</strong></font></br></br>
	
	<font size="+1">Balance Back to Client:</font>
	<font size="+2" color="#ff0000"><strong>
	<?php 
	//echo number_format($get_change,2);
	
	?>
	</strong></font></p>
	
	<?php 
	
	//}
	
	?>-->

	
	<div id='rec_inv_pay_errorloc' class='error_strings'></div>
	
	
	</td>
  </tr>
	
  
  
  <tr height="30" bgcolor="#ffff99">
    <td bgcolor="">&nbsp;</td>
    <td width="25%"><strong>Client Name : </strong></td>
    <td width="23%"><?php echo $rows->c_name;?><input type="hidden" size="41" name="client_id" value="<?php  echo $rows->client_id; ?>">
	                                                  <input type="hidden" size="41" name="sales_code" value="<?php   echo $rows->sales_code; ?>">
													  <input type="hidden" size="41" name="sales_rep" value="<?php   echo $get_sales_rep; ?>">
													  <input type="hidden" size="41" name="invoice_no" value="<?php   echo $rows->invoice_no; ?>">
													  <input type="hidden" size="41" name="bal" value="<?php   echo $get_bal; ?>">
													  <input type="hidden" size="41" name="currency_code" value="<?php   echo $rows->currency_code; ?>">
													  <input type="hidden" size="41" name="curr_rate" value="<?php   echo $rows->curr_rate; ?>">
													  <input type="hidden" size="41" name="amnt_rec_sofar" value="<?php echo $get_amnt_rec; ?>">
	
	</td>
    </tr>
  
  <tr height="30" bgcolor="#C0D7E5">
    <td bgcolor="">&nbsp;</td>
    <td width="19%" ><strong>Amount Invoiced (<?php echo $rows->curr_name; ?>): </strong></td>
    <td width="23%" align="right"><strong><?php echo number_format($rows->invoice_ttl,2);?></strong>
	
	
	</td>
    
  </tr>
  
  <tr height="30" bgcolor="#ffff99">
    <td bgcolor="">&nbsp;</td>
    <td width="19%"><strong>Amount Paid (<?php echo $rows->curr_name; ?>): </strong></td>
    <td width="23%" align="right"><strong><?php 
	
	if ($get_amnt_rec_sofar)
	
	{
	
	echo number_format($get_amnt_rec_sofar,2);
	
	}
	
	else
	
	{
	
	
	echo number_format($get_amnt_rec,2); 
	
	}

	?></strong>
	
	
	</td>
    
  </tr>
  
  <tr height="30" bgcolor="#C0D7E5">
    <td bgcolor="">&nbsp;</td>
    <td width="19%"><strong> Bad Debts Amount (<?php echo $rows->curr_name; ?>): </strong></td>
    <td width="23%" align="right"><strong><?php 
	
	
	echo number_format($get_bal,2);
	
	?></strong></td>
    
  </tr>
  
  <tr height="30" bgcolor="#ffff99">
    <td bgcolor="">&nbsp;</td>
    <td width="19%" valign="top">Enter Reason:<font color="#FF0000">*</font></td>
    <td width="23%"><textarea name="reason" cols="39" rows="5"></textarea></td>
    </tr>
  
  <!--<tr height="30" bgcolor="#C0D7E5">
    <td bgcolor="">&nbsp;</td>
    <td width="19%">Enter Mode Of Payment<font color="#FF0000">*</font></td>
    <td width="23%"><select name="mop">
	
	<option>-------------------------Select--------------------</option>
	<option value="Cash">Cash</option>
	<option value="Cheque">Cheque</option>
	<option value="Electronic Transfer">Electronic Transfer</option>
	
	
	
	</select>
	
	
	</td>
   
  </tr>-->
  
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
  frmvalidator.addValidation("amnt_paid","req","Please enter the amount received");
 frmvalidator.addValidation("mop","dontselect=0","Please select mode of payment");
 
 
 
 
  </SCRIPT>

			
			
			
					
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