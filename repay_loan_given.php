<?php include('Connections/fundmaster.php'); 

$id=$_GET['loan_given_id'];
$get_amnt_rec=$_GET['loan_paid'];
$get_bal=$_GET['loan_bal'];

$get_sales_rep=$_GET['sales_rep'];

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
		
		
		
<?php require_once('includes/loangivensubmenu.php');  ?>
		
		<h3>:: Receive Loan Repayment</h3>
         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
			<div id="cont-left" class="br-5">
<form name="rec_inv_pay" action="process_repay_loan_given.php?loan_given_id=<?php echo $id; ?>" method="post">	
<?php 
$sql="select loan_given.loan_given_id,loan_given.date_recorded,loan_given.loan_amount,loan_given.lenders_name,
loan_given.curr_rate,loan_given.currency_code,currency.curr_name from loan_given ,currency where 
loan_given.currency_code=currency.curr_id and loan_given.loan_given_id='$id'";
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

	
  
  
  <tr height="30" bgcolor="#ffff99">
    <td bgcolor="">&nbsp;</td>
    <td width="20%"><strong>Lender's Name : </strong></td>
    <td width="23%"><?php echo $rows->lenders_name;?>
	                                                  
													 
													  
													  <input type="hidden" size="41" name="bal" value="<?php echo $get_bal; ?>">
													  <input type="hidden" size="41" name="currency_code" value="<?php   echo $rows->currency_code; ?>">
													  <input type="hidden" size="41" name="curr_rate" value="<?php   echo $rows->curr_rate; ?>">
													  <input type="hidden" size="41" name="amnt_rec_sofar" value="<?php echo $get_amnt_rec; ?>">
													  <input type="hidden" size="41" name="lender_name" value="<?php echo $rows->lenders_name; ?>">
	
	</td>
	 <td width="40%" rowspan="8" valign="center"><div id='rec_inv_pay_errorloc' class='error_strings'></div></td>
    </tr>
  
  <tr height="30" bgcolor="#C0D7E5">
    <td bgcolor="">&nbsp;</td>
    <td width="19%" ><strong>Amount Lent (<?php echo $rows->curr_name; ?>): </strong></td>
    <td width="23%" align="right"><strong><?php echo number_format($rows->loan_amount,2);?></strong>
	
	
	</td>
    
  </tr>
  
  <tr height="30" bgcolor="#ffff99">
    <td bgcolor="">&nbsp;</td>
    <td width="19%"><strong>Amount Paid (<?php echo $rows->curr_name; ?>): </strong></td>
    <td width="23%" align="right"><strong><?php 
	
	if ($get_amnt_rec=='')
	
	{
	
	echo number_format(0,2);
	
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
    <td width="19%"><strong>Balance To Be Cleared (<?php echo $rows->curr_name; ?>): </strong></td>
    <td width="23%" align="right"><strong><?php 
	
	
	echo number_format($get_bal,2);
	
	?></strong></td>
    
  </tr>
  
  <tr height="30" bgcolor="#ffff99">
    <td bgcolor="">&nbsp;</td>
    <td width="19%">Enter Amount Received (<?php echo $rows->curr_name; ?>):<font color="#FF0000">*</font></td>
    <td width="23%"><input type="text" size="41" name="amnt_paid"></td>
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