<?php include('Connections/fundmaster.php'); 

$id=$_GET['bad_debt_id'];

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
		
		<h3>:: Declare the Doubtful Debt Bad Debt</h3>
         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
			<div id="cont-left" class="br-5">
<form name="rec_inv_pay" action="process_recover_bad_debts.php?invoice_id=<?php echo $id; ?>" method="post">	
<?php 
$sql="select bad_debts.bad_debt_id,bad_debts.client_id,bad_debts.curr_rate,bad_debts.currency_code,bad_debts.date_received,invoices.invoice_no,invoices.invoice_id,
bad_debts.amount,bad_debts.sales_code, currency.curr_name,clients.c_name from bad_debts,clients,invoices,
currency where bad_debts.client_id=clients.client_id AND bad_debts.sales_code=invoices.sales_code AND  bad_debts.currency_code=currency.curr_id AND bad_debts.bad_debt_id='$id'";
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
													  <input type="hidden" size="41" name="invoice_no" value="<?php   echo $rows->invoice_no; ?>">
													  <input type="hidden" size="41" name="amount" value="<?php   echo $rows->amount; ?>">
													  <input type="hidden" size="41" name="currency_code" value="<?php echo $rows->currency_code; ?>">
													  <input type="hidden" size="41" name="curr_rate" value="<?php   echo $rows->curr_rate; ?>">
													 
	
	</td>
    </tr>
  
  <tr height="30" bgcolor="#C0D7E5">
    <td bgcolor="">&nbsp;</td>
    <td width="19%" ><strong>Amount to be Recovered (<?php echo $rows->curr_name; ?>): </strong></td>
    <td width="23%" align="right"><strong><?php echo number_format($rows->amount,2);?></strong>
	
	
	</td>
    
  </tr>
  
  
  
  <tr height="30" bgcolor="#ffff99">
    <td bgcolor="">&nbsp;</td>
    <td width="19%" valign="top">Enter Reason for Recovery:<font color="#FF0000">*</font></td>
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