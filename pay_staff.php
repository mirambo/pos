<?php 
$emp_id=$_GET['emp_id'];	
$net_sal=$_GET['net_sal'];

?>

<?php include('Connections/fundmaster.php'); ?>

<html xmlns="http://www.w3.org/1999/xhtml">

<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>
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
    return confirm("Are you sure you want to delete?");
}


</script>

<body>

	<div id="page-wrap">

		<?php include ('header.php') ?>
		
		<div id="zone-bar" class="br-5">
          <?php include ('topmenu.php') ?>
		</div>

	<?php require_once('includes/payslipsubmenu.php');  ?>
		
		<h3>:: Salary Payment For :
		<?php $sqlemp_det="select * from employees where emp_id='$emp_id'";
$resultsemp_det= mysql_query($sqlemp_det) or die ("Error $sqlemp_det.".mysql_error());
$rowsemp_det=mysql_fetch_object($resultsemp_det);

echo $rowsemp_det->emp_firstname.' '.$rowsemp_det->emp_middle_name.' '.$rowsemp_det->emp_lastname;
?>
		
		</h3>
         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
			<div id="cont-left-full" class="br-5">
<form name="gen_order" action="process_pay_staff.php?emp_id=<?php echo $emp_id;?>&net_sal=<?php echo $net_sal; ?>" method="post">			
			<table width="100%" border="0">
  <tr height="30" bgcolor="#FFFFCC">

  
    <td colspan="9" align="center">
	<?php
	


if ($_GET['addconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:550px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Payment Received successfully!!</font></strong></p></div>';
?> 

</td>
 
  </tr>
  
   <tr height="30" bgcolor="#FFFFCC">

  
    <td colspan="9" align="center">
<strong>Total Net Salary: </strong> <?php echo number_format($net_sal,2); ?>

<strong>Total Salary Paid : </strong><?php 

$sqlsp="SELECT SUM(amount_received) as ttl_sal_paid from salary_payments WHERE emp_id='$emp_id'";
$resultsp= mysql_query($sqlsp) or die ("Error $sqlsp.".mysql_error());
$rowsp=mysql_fetch_object($resultsp);

echo number_format($ttl_sal_paid=$rowsp->ttl_sal_paid,2); ?>


<strong>Total Salary Balance (Unpaid) :</strong> 	

<?php echo number_format($bal_sal=$net_sal-$ttl_sal_paid,2); ?>
</td>
 
  </tr>
  
  
  
  <tr height="20" bgcolor="#C0D7E5">

    <td width="15%" valign="top"><!--Transport Agency<font color="#FF0000"></font>--></td>
    <td width="15%" valign="top">
	
	<!--<select name="client"><option value="0">Select..............................</option>
								  <?php
								  
								  $query1="select * from shippers";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->shipper_id; ?>"><?php echo $rows1->shipper_name; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
								  
								  
								  
								  
								  
								  ?>
								  
								  </select>-->
	
	</td>
	<td valign="top" width="15%">Amount Paid<font color="#FF0000"></font></td>
	<td valign="top" width="10%"><input type="text" name="amount" size="40"></td>
    <td valign="top" width="10%">Select Currency<font color="#FF0000"></font></td>
    <td valign="top"><select name="currency">
	                  <option value="0">Select--------------------------------------</option>
								  
										  
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
								  
								  
								<td valign="top" width="15%">  
								Mode Of Payment
								  
								  </td>
								  <td><select name="mop">
	                  <option value="0">------------------Select-----------------------</option>
								  
										  
                                    <?php 
$sqlmop="SELECT * FROM mop order by mop_name asc";
$resultsmop= mysql_query($sqlmop) or die ("Error $sqlmop.".mysql_error()); 
if (mysql_num_rows($resultsmop) > 0)
{
						while ($rowsmop=mysql_fetch_object($resultsmop))
							{						
								?>  
										  
                                    <option value="<?php echo $rowsmop->mop_id;?>"><?php echo $rowsmop->mop_name;?></option>
									<?php
									}
									}
									

									?>
									
                               </select></td>
								  
								  
  </tr>
  <tr><td colspan="8" height="20" bgcolor="#FFFFCC" align="center"><strong>Cheque Payment Details(If paid via cheque )</strong></td></tr>
	
	<tr height="20" bgcolor="#FFFFCC">

    <td valign="top">Enter Cheque No:<font color="#FF0000"></font></td>
    <td valign="top"><input type="text" name="cheque_no" size="20" /></td>
							   <td valign="top">Cheque Bank Name<font color="#FF0000"></font></td>
							   <td valign="top"><input type="text" name="cheq_drawer" size="40" /></td>
							   <td valign="top">Date Drawn</td>
							    <td><input type="text" name="date_drawn" size="40" id="date_drawn" readonly="readonly" /><input name="DateFormats" id="DateFormats" disabled value="dd/mm/yyyy" type="hidden"></td>
								  <td>Payment Description</td>
								  <td rowspan="4" valign="top"><textarea name="desc" rows="4" cols="23"></textarea></td>
							   
    </tr>
<tr><td colspan="8" height="20" bgcolor="#FFFFCC" align="center"><strong>Cash Payment Details(If paid via Cash Or Mpesa )</strong></td></tr>
	
	<tr height="20" bgcolor="#FFFFCC">

    <td>Enter Reference No:<font color="#FF0000"></font></td>
    <td valign="top"><input type="text" name="ref_no" size="20" /></td>
							   
							   <td >Date Paid</td>
							    <td><input type="text" name="date_paid" size="40" id="date_paid" readonly="readonly" /><input name="DateFormats" id="DateFormats" disabled value="dd/mm/yyyy" type="hidden"></td>
								 <td valign="top"><font color="#FF0000"></font></td>
							   <td valign="top"></td> <td></td>
								  <td></td>
							   
    </tr>	  
<tr><td colspan="8" height="20" bgcolor="#FFFFCC" align="center"><strong>Bank Transfer Payment Details(If paid via bank transfer )</strong></td></tr>
	
	<tr height="20" bgcolor="#FFFFCC">

    <td valign="top">Transaction Code:<font color="#FF0000"></font></td>
    <td valign="top"><input type="text" name="transaction_code" size="20" /></td>
							   <td valign="top">Client Bank<font color="#FF0000"></font></td>
							   <td valign="top"><input type="text" name="client_bank" size="40" /></td>
							   <td valign="top">Date Transfered</td>
							    <td><input type="text" name="date_trans" size="40" id="date_trans" readonly="readonly" /><input name="DateFormats" id="DateFormats" disabled value="dd/mm/yyyy" type="hidden"></td>
								  <td colspan="2">Our Bank<select name="our_bank">
	                  <option>------------------Select--------------------</option>
								  
										  
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
 
  
   

  <tr height="15" bgcolor="#FFFFCC">

    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2" align="center"><input type="submit" name="submit" value="Save Transaction">&nbsp;<input type="reset" value="Cancel"></td>
   
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
  
  
  </script>

<SCRIPT language="JavaScript">
 var frmvalidator  = new Validator("gen_order");
 frmvalidator.EnableOnPageErrorDisplaySingleBox();
 frmvalidator.EnableMsgsTogether();

 <!--frmvalidator.addValidation("client","dontselect=0",">>Please select transport agency");-->
 frmvalidator.addValidation("amount","req",">>Please enter amount paid");
 frmvalidator.addValidation("currency","dontselect=0",">>Please select currency");
 frmvalidator.addValidation("mop","dontselect=0",">>Please select mode of payment");
 frmvalidator.addValidation("desc","req",">>Please enter expense description");


  
 
 
 
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