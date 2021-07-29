<?php
include('Connections/fundmaster.php');  
$loan_received_id=$_GET['loan_received_id'];	

$sql="SELECT * FROM loan_received WHERE loan_received_id='$loan_received_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
$rows=mysql_fetch_object($results);

$mop=$rows->mop;
$our_bank=$rows->our_bank;
$sqlcurr1="SELECT * FROM mop where mop_id='$mop'";
$resultscurr1= mysql_query($sqlcurr1) or die ("Error $sqlcurr.".mysql_error()); 
$rowscurr1=mysql_fetch_object($resultscurr1);
$mop_name=$rowscurr1->mop_name;


$sqlcurr12="SELECT * FROM banks where bank_id='$our_bank'";
$resultscurr12= mysql_query($sqlcurr12) or die ("Error $sqlcurr12.".mysql_error()); 
$rowscurr12=mysql_fetch_object($resultscurr12);
$bank_name=$rowscurr12->bank_name.' ('.$rowscurr12->account_name.')';
?>

<script src="jquery.min.js"></script>
<html xmlns="http://www.w3.org/1999/xhtml">
<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>
<script type="text/javascript" src="calender/calendar.js"></script>
<script type="text/javascript" src="calender/lang/calendar-en.js"></script>
<script type="text/javascript" src="calender/calendar-setup.js"></script>
<script type="text/javascript"> 

function confirmDelete()
{
    return confirm("Are you sure you want to save?");
}

</script>
<style type="text/css">

@import url(calender/calendar-win2k-1.css);

</style>
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

<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>

<body>

	<div id="page-wrap">

		<?php include ('header.php') ?>
		
		<div id="zone-bar" class="br-5">
          <?php include ('topmenu.php') ?>
		</div>

		<?php require_once('includes/loanrecsubmenu.php');  ?>
		
		<h3>:: Record Loan Received</h3>				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
			<div id="cont-left" class="br-5">
<form name="new_supplier" action="processeditloanrec.php?loan_received_id=<?php echo $loan_received_id; ?>" method="post">			
			<table width="100%" border="0">
  <tr >
    <td width="18%">&nbsp;</td>
	<td colspan="3" height="30"><?php

if ($_GET['updateconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#339900 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#339900" >Loan Updated Successfully!!</font></strong></p></div>';
?>

<?php

if ($_GET['passwordmissmatchconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry Password do not match!!</font></strong></p></div>';
?>

<?php

if ($_GET['recordexist']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! the customer is existing</font></strong></p></div>';
?></td>
    </tr>
  <tr height="20">
    <td bgcolor="">&nbsp;</td>
    <td width="19%">Lender's Name <font color="#FF0000">*</font></td>
    <td width="23%"><input type="text" size="41" name="l_name" value="<?php echo $rows->lenders_name;?>"></td>
    <td width="40%" rowspan="6" valign="top"><div id='new_supplier_errorloc' class='error_strings'></div></td>
  </tr>
  
	
	<tr height="20">
    <td>&nbsp;</td>
    <td>Lender's Postal Address</td>
    <td><input type="text" size="41" name="l_address" value="<?php echo $rows->lenders_address;?>"></td>
    </tr>
	
	
	<tr height="20">
    <td>&nbsp;</td>
    <td>Lender's Phone Number<font color="#FF0000">*</font></td>
    <td><input type="text" size="41" name="l_phone" value="<?php echo $rows->lenders_phone;?>"></td>
    </tr>
	<tr height="20">
    <td>&nbsp;</td>
    <td>Lender's Email Address<font color="#FF0000">*</font></td>
    <td><input type="text" size="41" name="l_email" value="<?php echo $rows->lenders_email;?>"></td>
    </tr>

	<tr height="20">
    <td>&nbsp;</td>
    <td>Lender's Town</td>
    <td><input type="text" size="41" name="l_town" value="<?php echo $rows->lenders_town;?>"></td>
    </tr>
	 <tr height="20">
    <td>&nbsp;</td>
    <td>Enter Date Borrowed <font color="#FF0000">*</font></td>
    <td><input type="text" name="date_deposited" size="40" id="date_deposited" readonly="readonly" value="<?php echo $rows->date_drawn;?>"/></td>
    </tr>
	
	<tr height="20">
    <td>&nbsp;</td>
    <td>Loan Amount <font color="#FF0000">*</font></td>
    <td><input type="text" size="41" name="l_amount" value="<?php echo $rows->loan_amount;?>"></td>
    </tr>
	<?php 
    
$currency=$rows->currency_code;
$sqlcurr="SELECT * FROM currency where curr_id='$currency'";
$resultscurr= mysql_query($sqlcurr) or die ("Error $sqlcurr.".mysql_error()); 
$rowscurr=mysql_fetch_object($resultscurr);
 $rowscurr->curr_name;	
 

	?>
	<tr height="20">
    <td>&nbsp;</td>
    <td>Currency<font color="#FF0000">*</font></td>
    <td><select name="currency">
	                  <option value="<?php echo $currency=$rows->currency_code; ?>"><?php echo $rowscurr->curr_name; ?></option>
								  
										  
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
    <td>Exchange Exchange Rate <font color="#FF0000">*</font></td>
    <td><input type="text" size="41" name="curr_rate" value="<?php echo $rows->curr_rate;?>"></td>
    </tr>
	
	<tr height="20">
    <td>&nbsp;</td>
    <td>Mode Of Payment<font color="#FF0000">*</font></td>
    <td><select id="mop" name="mop">
	                  <option value="<?php echo $mop;?>"><?php echo $mop_name; ?></option>
								  
										  
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
	<tr height="40" bgcolor="#FFFFCC" id="Cheque" 
	
	<?php 
	if ($mop==2)
	{
	?>
	style="display:true"
	<?php 
	}
	else
	{
	?>
	style="display:none"
	<?php
	}
	?>
	>

    <td colspan="8">Enter Cheque No:<font color="#FF0000"></font><input type="text" name="cheque_no" size="20" value="<?php echo $rows->cheque_no;?>" />
	Cheque Bank Name<font color="#FF0000"></font>
	<input type="text" name="cheq_drawer" size="20" value="<?php echo $rows->client_bank; ?>"/>
	Date Drawn
	<input type="text" name="date_drawn" size="20" id="date_drawn" value="<?php echo $rows->date_drawn; ?>" readonly="readonly" /><input name="DateFormats" id="DateFormats" disabled value="dd/mm/yyyy" type="hidden"></td>
								  
							   
    </tr>
	
	<tr height="40" bgcolor="#FFFFCC" id="Transfer" 	
	
<?php 
	if ($mop==3)
	{
	?>
	style="display:true"
	<?php 
	}
	else
	{
	?>
	style="display:none"
	<?php
	}
	?>
	>
	
	
	
	


    <td colspan="4">Transaction Code:<font color="#FF0000"></font>
	<input type="text" name="transaction_code" size="20" value="<?php echo $rows->ref_no; ?>"/>
	Client Bank<font color="#FF0000"></font>
	<input type="text" name="client_bank" size="20" value="<?php echo $rows->client_bank; ?>"/>
	Date Transfered
	<input type="text" name="date_trans" size="20" id="date_trans" value="<?php echo $rows->date_drawn; ?>" readonly="readonly" /><input name="DateFormats" id="DateFormats" disabled value="dd/mm/yyyy" type="hidden">
	Our Bank<select name="our_bank" style="width:140px;">
	                  <option value="<?php echo $our_bank ?>"><?php echo $bank_name; ?></option>
								  
										  
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
	
	<tr height="40" bgcolor="#FFFFCC" id="Cash" <?php 
	if ($mop==1)
	{
	?>
	style="display:true"
	<?php 
	}
	else
	{
	?>
	style="display:none"
	<?php
	}
	?>
	>

    <td colspan="4">Enter Reference No:<font color="#FF0000"></font>
	<input type="text" name="ref_no" size="20" value="<?php echo $rows->ref_no; ?>"/>
	Date Paid
	<input type="text" name="date_paid" size="40" id="date_paid" readonly="readonly" value="<?php echo $rows->date_drawn;?>" /><input name="DateFormats" id="DateFormats" disabled value="dd/mm/yyyy" type="hidden">
								 
							   
    </tr>
	
	<tr bgcolor="#FFFFCC" height="40" id="mpesa" <?php 
	if ($mop==4)
	{
	?>
	style="display:true"
	<?php 
	}
	else
	{
	?>
	style="display:none"
	<?php
	}
	?>
	>
                <td colspan="8">Enter Reference No:<font color="#FF0000"></font>
				</td>
								
            </tr>
	<tr height="20">
    <td>&nbsp;</td>
    <td>Repayment Period<font color="#FF0000">*</font></td>
    <td>Years<select name="period_years">
	
	
	<option value="<?php echo $rows->period_years;?>"><?php echo $rows->period_years;?></option>
	
	<option value="N/A">0</option>
	<option value="1">1</option>
	<option value="2">2</option>
	<option value="3">3</option>
	<option value="4">4</option>
	<option value="5">5</option>
	<option value="6">6</option>
	<option value="7">7</option>
	<option value="8">8</option>
	<option value="9">9</option>
	<option value="10">10</option>
	
	
	
	</select>Months
	
	<select name="period_months">
	<option value="<?php echo $rows->period_months;?>"><?php echo $rows->period_months;?></option>
	<option value="N/A">0</option>
	<option value="1">1</option>
	<option value="2">2</option>
	<option value="3">3</option>
	<option value="4">4</option>
	<option value="5">5</option>
	<option value="6">6</option>
	<option value="7">7</option>
	<option value="8">8</option>
	<option value="9">9</option>
	<option value="10">10</option>
	<option value="11">11</option>

	</select></td>
    </tr>
	
  
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="submit" name="submit" onClick="return confirmDelete();" value="Update">&nbsp;&nbsp;<input type="reset" value="Cancel"></td>
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
      inputField  : "date_deposited",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "date_deposited"       // ID of the button
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
      inputField  : "date_drawn",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "date_drawn"       // ID of the button
    }
  );
     /*
  Calendar.setup(
    {
      inputField  : "m_date_paid",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "m_date_paid"       // ID of the button
    }
  ); */
  
  
  </script>
<SCRIPT language="JavaScript">
 /* var frmvalidator  = new Validator("new_supplier");
 frmvalidator.EnableOnPageErrorDisplaySingleBox();
 frmvalidator.EnableMsgsTogether();
 frmvalidator.addValidation("l_name","req",">>Please enter lenders name");
 frmvalidator.addValidation("l_phone","req",">>Please enter phone number");
 frmvalidator.addValidation("l_email","req",">>Please enter email address");
 frmvalidator.addValidation("l_email","email",">>Please enter valid email address");
 frmvalidator.addValidation("l_amount","req",">>Please enter loan amount");
 frmvalidator.addValidation("currency","dontselect=0",">>Select the currency");
 frmvalidator.addValidation("period_years","dontselect=0",">>Select the years");
 frmvalidator.addValidation("period_months","dontselect=0",">>Select the months"); */

 
 
 
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