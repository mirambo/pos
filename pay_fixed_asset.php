<?php include('Connections/fundmaster.php'); 
$id=$_GET['fixed_asset_id'];
//$amount_paid=$_GET['amount_paid'];
//$balance=$_GET['balance'];
?>
<html xmlns="http://www.w3.org/1999/xhtml">

<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>
<script type="text/javascript" src="calender/calendar.js"></script>
<script type="text/javascript" src="calender/lang/calendar-en.js"></script>
<script type="text/javascript" src="calender/calendar-setup.js"></script>

<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>

<script type="text/javascript">
function confirmEdit()
{
return confirm("Are sure you want to save changes?");

}
</script>

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
		
		
		
		<?php require_once('includes/fixedassetsubmenu.php');
		
		$sql="select fixed_assets.fixed_asset_id,fixed_assets.fixed_asset_name,fixed_assets.date_purchased,fixed_assets.currency,fixed_assets.curr_rate,
fixed_assets.value,fixed_assets.quantity,fixed_assets.date_recorded,currency.curr_name from fixed_assets,currency where fixed_assets.currency=currency.curr_id and fixed_assets.fixed_asset_id='$id'";
		$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
		$rows=mysql_fetch_object($results);
		
		
		
		?>
		
		<h3>:: Paying for Asset : <?php echo $rows->fixed_asset_name;?>
		Bought On: <?php echo $rows->date_purchased;?>
		
		</h3>
         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
			<div id="cont-left" class="br-5">
<form name="new_user_group" action="processpayfixedasset.php?fixed_asset_id=<?php echo $id; ?>" method="post">			
			<table width="100%" border="0">
  <tr height="30" bgcolor="#ffff99">
    <td width="18%">&nbsp;</td>
	<td colspan="3" height="30"><?php

if ($_GET['addconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#339900 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#339900" >Asset Payment Created Successfully!!</font></strong></p></div>';

if ($_GET['recordexist']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! the record exist</font></strong></p></div>';
?></td>
    </tr>
  <!--<tr >
    <td bgcolor="">&nbsp;</td>
    <td width="19%">Enter Asset Name <font color="#FF0000">*</font></td>
    <td width="23%"><input type="text" size="41" name="asset_name"></td>
    <td width="40%" rowspan="4" valign="top"><div id='new_user_group_errorloc' class='error_strings'></div></td>
  </tr>
  <tr height="30">
    <td>&nbsp;</td>
    <td>Enter Purchase Date<font color="#FF0000">*</font></td>
    <td><input type="text" name="purchase_date" size="41" id="purchase_date" readonly="readonly" /></td>
    </tr>-->
	<tr height="30" bgcolor="#C0D7E5">
    <td>&nbsp;</td>
    <td width="200">Fixed Asset Value (SSP)<font color="#FF0000">*</font></td>
    <td><strong><?php 
	
	echo number_format($value=$rows->value*$rows->quantity*$rows->curr_rate,2);
	
	?></strong>
  <td width="40%" rowspan="6" valign="top"><div id='new_user_group_errorloc' class='error_strings'></div></td>
	
	</td>
    </tr>
	<tr height="30" bgcolor="#ffff99">
    <td>&nbsp;</td>
    <td>Amount Paid (SSP)<font color="#FF0000">*</font></td>
    <td><strong><?php //echo number_format($amnt_paid_curr=$amount_paid/$rows->curr_rate,2);
	
$amnt_paid_curr=0;	
$sqlp="select * from fixed_assets_payments where fixed_asset_id='$id'";
$resultsp= mysql_query($sqlp) or die ("Error $sqlp.".mysql_error());
if (mysql_num_rows($resultsp) > 0)
{
while ($rowsp=mysql_fetch_object($resultsp))
		{
		 $curr_ratefp=$rowsp->curr_rate;
		 $amount_paid=$curr_ratefp*$rowsp->amount_received;
		 $amnt_paid_curr=$amnt_paid_curr+$amount_paid;
		
		}
		echo number_format($amnt_paid_curr,2);
//echo number_format($ttl_cash1,2);

}
	
	?></strong>
	<input type="hidden" size="41" name="curr_rateddddd" value="<?php echo $rows->curr_rate;?>">
	<input type="hidden" size="41" name="amount_already_paid" value="<?php echo $amount_paid?>">
	
	</td>
    </tr>
	<tr height="30" bgcolor="#C0D7E5">
    <td>&nbsp;</td>
    <td>Balance To be Paid (SSP)<font color="#FF0000">*</font></td>
    <td><strong><?php echo number_format($balance_curr=$value-$amnt_paid_curr,2);?></strong>
	<input type="hidden" size="41" name="balance" value="<?php echo $balance;?>">
	
	</td>
    </tr>
	    <tr height="30" bgcolor="#ffff99">
    <td bgcolor="">&nbsp;</td>
    <td width="19%">Date Paid:<font color="#FF0000">*</font></td>
    <td width="23%"><input type="text" name="date_paid" size="40" id="date_paid" readonly="readonly" /></td>
    </tr>
	<tr height="30" bgcolor="#ffff99">
    <td>&nbsp;</td>
    <td>Enter Amount Paid <font color="#FF0000">*</font></td>
    <td><input type="text" size="41" name="amount_paid"></td>
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
	<tr height="30" bgcolor="#ffff99">
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
	<tr height="40" bgcolor="#C0D7E5" id="Cheque" style="display:none">

    <td colspan="8">Enter Cheque No:<font color="#FF0000"></font><input type="text" name="cheque_no" size="20" />
	Cheque Bank Name<font color="#FF0000"></font>
	<input type="text" name="cheq_drawer" size="20" />
	Date Drawn
	<input type="text" name="date_drawn" size="20" id="date_drawn" readonly="readonly" /><input name="DateFormats" id="DateFormats" disabled value="dd/mm/yyyy" type="hidden"></td>
								  
							   
    </tr>
	
	<tr height="40" bgcolor="#C0D7E5" id="Transfer" style="display:none">

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
	
	<tr height="40" bgcolor="#C0D7E5" id="Cash" style="display:none">

    <td colspan="4">Enter Reference No:<font color="#FF0000"></font>
	<input type="text" name="ref_no" size="20" />
								 
							   
    </tr>
	
	<tr bgcolor="#FFFFCC" height="40" id="mpesa" style="display:none">
                <td colspan="8">Enter Reference No:<font color="#FF0000"></font>
				<input type="text" name="ref_no" size="20" />Date Paid<input type="text" name="m_date_paid" size="40" id="m_date_paid" readonly="readonly" /><input name="DateFormats" id="DateFormats" disabled value="dd/mm/yyyy" type="hidden"></td>
								
            </tr>
  
  
  <tr height="30" bgcolor="#ffff99">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="submit" onClick="return confirmEdit();" name="submit" value="Save">&nbsp;&nbsp;<input type="reset" value="Cancel"></td>
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
 var frmvalidator  = new Validator("new_user_group");
 frmvalidator.EnableOnPageErrorDisplaySingleBox();
 frmvalidator.EnableMsgsTogether();
frmvalidator.addValidation("amount_paid","req",">>Please enter the amount paid"); 
 frmvalidator.addValidation("currency","dontselect=0",">>Select currency");
 frmvalidator.addValidation("date_paid","req",">>Please enter the date paid");
 frmvalidator.addValidation("mop","dontselect=0",">>Select mode of payment");
 frmvalidator.addValidation("curr_rate","req",">>Enter enter exchange rate");

 
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