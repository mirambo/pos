<?php include('Connections/fundmaster.php'); 

$id=$_GET['loan_received_id'];

?>

<html xmlns="http://www.w3.org/1999/xhtml">

<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>
<script type="text/javascript" src="calender/calendar.js"></script>
<script type="text/javascript" src="calender/lang/calendar-en.js"></script>
<script type="text/javascript" src="calender/calendar-setup.js"></script>
<script type="text/javascript"> 

function confirmDelete()
{
    return confirm("Are you sure you want save?");
}

</script>

<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>

<style type="text/css">

@import url(calender/calendar-win2k-1.css);

</style>
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

<body>

	<div id="page-wrap">

		<?php include ('header.php') ?>
		
		<div id="zone-bar" class="br-5">
          <?php include ('topmenu.php') ?>
		</div>
		
		
		
<?php require_once('includes/loanrecsubmenu.php');  ?>
		
		<h3>:: Repay Loan</h3>
         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
			<div id="cont-left" class="br-5">
<form name="rec_inv_pay" action="process_repay_loan.php?loan_received_id=<?php echo $id; ?>" method="post">	

		
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

$sql="select * from loan_received,currency where 
loan_received.currency_code=currency.curr_id and loan_received.loan_received_id='$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
$rows=mysql_fetch_object($results);
$curr_rate=$rows->curr_rate;
$ttl_loan=$rows->loan_amount*$curr_rate;

?></td>
    </tr>

	
  
  
  <tr height="30" bgcolor="#ffff99">
    <td bgcolor="">&nbsp;</td>
    <td width="20%"><strong>Lender's Name : </strong></td>
    <td width="23%"><?php echo $rows->lenders_name;?>
	                                                  
													 
													  
													 
	
	</td>
	 <td width="40%" rowspan="8" valign="center"><div id='rec_inv_pay_errorloc' class='error_strings'></div></td>
    </tr>
  
  <tr height="30" bgcolor="#C0D7E5">
    <td bgcolor="">&nbsp;</td>
    <td width="19%" ><strong>Amount Lent (<?php //echo $rows->curr_name; ?>SSP): </strong></td>
    <td width="23%" align="right"><strong>

	
	<?php 
echo number_format($ttl_loan,2);


?>
	
	
	

	
	
	</strong>
	
	
	</td>
    
  </tr>
  
  <tr height="30" bgcolor="#ffff99">
    <td bgcolor="">&nbsp;</td>
    <td width="19%"><strong>Amount Paid (<?php //echo $rows->curr_name; ?>SSP): </strong></td>
    <td width="23%" align="right"><strong><?php 
	
$sqlrec="select * from loan_repayments,currency where 
loan_repayments.currency_code=currency.curr_id and loan_repayments.loan_received_id='$id'";
$resultsrec= mysql_query($sqlrec) or die ("Error $sqlrec.".mysql_error());
//$rows=mysql_fetch_object($results);

if (mysql_num_rows($resultsrec) > 0)
						  {
							  $RowCounter=0;
							  while ($rowsrec=mysql_fetch_object($resultsrec))
							  { 
							  $repaid_amount=$rowsrec->amount_received;
							  $curr_rate=$rowsrec->curr_rate;
							  
							  $repaid_loan_kshs=$repaid_amount*$curr_rate;
							  $ttl_loan_repaid=$ttl_loan_repaid+$repaid_loan_kshs;
							  
							  }
							  
							  }
							  echo number_format($ttl_loan_repaid,2);
	

	?></strong>
	
	
	</td>
    
  </tr>
  
  <tr height="30" bgcolor="#C0D7E5">
    <td bgcolor="">&nbsp;</td>
    <td width="19%"><strong>Balance To Be Cleared (<?php //echo $rows->curr_name; ?>SSP): </strong></td>
    <td width="23%" align="right"><strong><?php 
	
	$get_bal=$ttl_loan-$ttl_loan_repaid;
	echo number_format($get_bal,2);
	
	?></strong></td>
    
  </tr>
    <tr height="30" bgcolor="#ffff99">
    <td bgcolor="">&nbsp;</td>
    <td width="19%">Date Paid:<font color="#FF0000">*</font></td>
    <td width="23%"><input type="text" name="date_paid" size="40" id="date_paid" readonly="readonly" /></td>
    </tr>
  
  
  
  
  
  <tr height="30" bgcolor="#ffff99">
    <td bgcolor="">&nbsp;</td>
    <td width="19%">Enter Amount Received:<font color="#FF0000">*</font></td>
    <td width="23%"><input type="text" size="41" name="amnt_paid"></td>
    </tr>
  
  <tr height="30" bgcolor="#C0D7E5">
    <td>&nbsp;</td>
    <td>Currency<font color="#FF0000">*</font></td>
    <td><select name="currency">
	                  <option value="0">------------------Select--------------------</option>
								  
										  
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
									
                               </select></td>
    </tr>
	
	<tr height="20">
    <td>&nbsp;</td>
    <td>Current Exchange Rate <font color="#FF0000">*</font></td>
    <td><input type="text" size="41" name="curr_rate"></td>
    </tr>
	<tr height="30" bgcolor="#ffff99">
    <td>&nbsp;</td>
    <td>Mode Of Payment<font color="#FF0000">*</font></td>
    <td><select id="mop" name="mop">
	                  <option value="0">Select----------------</option>
								  
										  
                                    <?php 
$sqlmop="SELECT * FROM mop order by mop_name asc";
$resultsmop= mysql_query($sqlmop) or die ("Error $sqlmop.".mysql_error()); 
if (mysql_num_rows($resultsmop) > 0)
{
						while ($rowsmop=mysql_fetch_object($resultsmop))
							{						
								?>  
										  
                                    <option value="<?php echo $mop_id=$rowsmop->mop_id;?>"><?php echo $rowsmop->mop_name;?></option>
									<?php
									}
									}
									

									?>
									
                               </select></td>
    </tr>
	<tr height="40" bgcolor="#FFFFCC" id="Cheque" style="display:none">

    <td colspan="8">Enter Cheque No:<font color="#FF0000"></font><input type="text" name="cheque_no" size="20" />
	Cheque Bank Name<font color="#FF0000"></font>
	<input type="text" name="cheq_drawer" size="20" />
	Date Drawn
	<input type="text" name="date_drawn" size="20" id="date_drawn" readonly="readonly" /><input name="DateFormats" id="DateFormats" disabled value="dd/mm/yyyy" type="hidden"></td>
								  
							   
    </tr>
	
	<tr height="40" bgcolor="#FFFFCC" id="Transfer" style="display:none">

    <td colspan="4">Transaction Code:<font color="#FF0000"></font>
	<input type="text" name="transaction_code" size="20" />
	Client Bank<font color="#FF0000"></font>
	<input type="text" name="client_bank" size="20" />
	Date Transfered
	<input type="text" name="date_trans" size="20" id="date_trans" readonly="readonly" /><input name="DateFormats" id="DateFormats" disabled value="dd/mm/yyyy" type="hidden">
	Our Bank<select name="our_bank" style="width:140px;">
	                  <option value="0">Select....</option>
								  
										  
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
	
	<tr height="40" bgcolor="#FFFFCC" id="Cash" style="display:none">

    <td colspan="4">Enter Reference No:<font color="#FF0000"></font>
	<input type="text" name="ref_no" size="20" />
							 
							   
    </tr>
	
	<tr bgcolor="#FFFFCC" height="40" id="mpesa" style="display:none">
                <td colspan="8">Enter Reference No:<font color="#FF0000"></font>
				<input type="text" name="mref_no" size="20" />Date Paid<input type="text" name="m_date_paid" size="40" id="m_date_paid" readonly="readonly" /><input name="DateFormats" id="DateFormats" disabled value="dd/mm/yyyy" type="hidden"></td>
								
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
    <td> <input type="hidden" size="41" name="bal" value="<?php echo $get_bal; ?>">
													  
													  <input type="hidden" size="41" name="amnt_rec_sofar" value="<?php echo $ttl_loan_repaid; ?>">
													  <input type="hidden" size="41" name="lender_name" value="<?php echo $rows->lenders_name; ?>"></td>
    <td>&nbsp;</td>
    <td><input type="submit" onClick="return confirmDelete();" name="submit" value="Save">&nbsp;&nbsp;<input type="reset" value="Cancel"></td>
 
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
  Calendar.setup(
    {
      inputField  : "date_paid",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "date_paid"       // ID of the button
    }
  );
  
  Calendar.setup(
    {
      inputField  : "m_date_paid",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "m_date_paid"       // ID of the button
    }
  );
  
  
  </script>


<SCRIPT language="JavaScript">
 var frmvalidator  = new Validator("rec_inv_pay");
 frmvalidator.EnableOnPageErrorDisplaySingleBox();
 frmvalidator.EnableMsgsTogether();
  frmvalidator.addValidation("amnt_paid","req","Please enter the amount received");
  frmvalidator.addValidation("currency","dontselect=0","Please select currency");
  frmvalidator.addValidation("curr_rate","req","Please enter exchange rate");
  frmvalidator.addValidation("date_paid","req","Please enter date paid");
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