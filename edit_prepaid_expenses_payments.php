<?php include('Connections/fundmaster.php'); 
$id=$_GET['fixed_asset_repayment_id'];
		$sql="SELECT * FROM prepaid_expenses,expenses_categories,prepaid_expenses_payments,currency WHERE 
prepaid_expenses.exp_cat_id=expenses_categories.exp_cat_id and prepaid_expenses_payments.currency_code=currency.curr_id 
 AND prepaid_expenses_payments.prepaid_expenses_payments_id='$id'";
		$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
		$rows=mysql_fetch_object($results);
$bank_id=$rows->our_bank;
$sqlemp_det="select * from banks where bank_id='$bank_id'";
$resultsemp_det= mysql_query($sqlemp_det) or die ("Error $sqlemp_det.".mysql_error());
$rowsemp_det=mysql_fetch_object($resultsemp_det);
$bank_name=$rowsemp_det->bank_name;
$account_name=$rowsemp_det->account_name;
		
?>


<html xmlns="http://www.w3.org/1999/xhtml">

<!--<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>-->
<script type="text/javascript" src="calender/calendar.js"></script>
<script type="text/javascript" src="calender/lang/calendar-en.js"></script>
<script type="text/javascript" src="calender/calendar-setup.js"></script>
<style type="text/css">

@import url(calender/calendar-win2k-1.css);

</style>

<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>

<script type="text/javascript"> 

function confirmDelete()
{
    return confirm("Are you sure you want to save changes?");
}


</script>

<body>

	<div id="page-wrap">

		<?php include ('header.php') ?>
		
		<div id="zone-bar" class="br-5">
          <?php include ('topmenu.php') ?>
		</div>

<?php require_once('includes/prepaidexpensessubmenu.php');  ?>
		
		<h3>:: Update Prepaid Expenses Payments Details</h3>
         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
			<div id="cont-left-full" class="br-5">
<form name="gen_order" action="processedit_prepaid_expenses_payments.php?fixed_assets_payments_id=<?php echo $id;?>" method="post">			
			<table width="100%" border="0">
  <tr height="30" bgcolor="#FFFFCC">

  
    <td colspan="9" align="center">

<?php

if ($_GET['updateconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Details Updated successfully!!</font></strong></p></div>';

if ($_GET['editsuccess']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Order Updated successfully!!</font></strong></p></div>';

?>

<?php

if ($_GET['deleteconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Order Deleted Successfully</font></strong></p></div>';
?></td>
 
	


  </tr>
  
  
  
  <tr height="20" bgcolor="#C0D7E5">

    <td width="15%" valign="top">Date Paid</td>
    <td width="15%" valign="top">
	
	<input type="text" name="date_paid" size="40" id="date_paid" readonly="readonly" value="<?php echo $rows->date_paid;?>"/>
	
	</td>
	<td valign="top" width="10%">Amount Paid<font color="#FF0000"></font></td>
	<td valign="top" width="10%"><input type="text" name="amount" size="40" value="<?php echo $rows->amount_received; ?>"></td>
    <td valign="top" width="10%">Select Currency<font color="#FF0000"></font></td>
    <td valign="top" colspan="3"><select name="currency">
	                  <option value="<?php echo $rows->currency_code;?>"><?php echo $rows->curr_name;?></option>
								  
										  
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
							   
Exchange Rate To(SSP)<input type="text" name="curr_rate" size="10" value="<?php echo $rows->curr_rate; ?>">							   							   
							   
							   </td>
								  
								  
								
								  
								  
  </tr>
 
 
  
   

  <tr height="55" bgcolor="#FFFFCC">

    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2" align="center"><input type="submit" onClick="return confirmDelete();" name="submit" value="Save Transaction">&nbsp;<input type="reset" value="Cancel"></td>
   
    <td>&nbsp;</td>
    <td>&nbsp;</td>
   <td></td>
								  <td></td>
 

  </tr>
  
  
  <tr height="90" bgcolor="#FFFFCC">

    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2"><div id='gen_order_errorloc' class='error_strings'></div></td>
   
    <td>&nbsp;</td>
    <td>&nbsp;</td>
   <td></td>
								  <td></td>
 

  </tr>
  
 
  
</table>

</form>

<script type="text/javascript">
  
  Calendar.setup(
    {
      inputField  : "date_paid",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "date_paid"       // ID of the button
    }
  );
  
  
  </script>

<SCRIPT language="JavaScript">
 var frmvalidator  = new Validator("gen_order");
 frmvalidator.EnableOnPageErrorDisplaySingleBox();
 frmvalidator.EnableMsgsTogether();

 frmvalidator.addValidation("client","dontselect=0",">>Please select client");
 frmvalidator.addValidation("amount","req",">>Please enter amount received");
 frmvalidator.addValidation("currency","dontselect=0",">>Please select currency");
 frmvalidator.addValidation("mop","dontselect=0",">>Please select mode of payment");


  
 
 
 
  </SCRIPT>

			
			
			
					
			  </div>
				
				<!--<div id="cont-right" class="br-5">
					
				</div>-->
			
			
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