<?php 
$f_name=$_GET['f_name'];	
$l_name=$_GET['l_name'];	
$usergroup=$_GET['usergroup'];
$email=$_GET['email'];	
$username=$_GET['username'];

?>
<?php include('Connections/fundmaster.php'); ?>

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

		<?php require_once('includes/expensessubmenu.php');  ?>
		
		<h3>:: Reconcile Bank Statement (Statement From the Bank)</h3>
         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
			<div id="cont-left" class="br-5">
<form name="emp" id="emp" action="process_reconcile_bank_statement.php" method="post">			
			<table width="100%" border="0">
 <tr height="20">
    <td width="15%">&nbsp;</td>
	<td colspan="6" height="30" align="center"><?php

if ($_GET['delconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:500px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ff0000" >Payroll For '.$date_month. ' Cancelled Successfuly</div>';
?>

<?

if ($_GET['staffonsite']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! Current staff are on site. New Staff should report from'.$period_to.'</font></strong></p></div>';
?>

<?php

if ($_GET['recordexist']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! the user is existing</font></strong></p></div>';
?></td>
    </tr>
	
	<tr height="20">
    <td bgcolor="" width="20%">&nbsp;</td>
    <td width="20%" align="right"><strong>Select Bank Account</strong><font color="#FF0000">*</font></td>
    <td width="15%"><select name="bank">
	                  <option>------------------Select--------------------</option>
								  
										  
                                    <?php 
$sqlcurr="SELECT * FROM banks order by bank_name asc";
$resultscurr= mysql_query($sqlcurr) or die ("Error $sqlcurr.".mysql_error()); 
if (mysql_num_rows($resultscurr) > 0)
{
						while ($rowscurr=mysql_fetch_object($resultscurr))
							{						
								?>  
										  
                                    <option value="<?php echo $rowscurr->bank_id;?>"><?php echo $rowscurr->bank_name.' ('.$rowscurr->account_name.')';?></option>
									<?php
									}
									}
									

									?>
									
                               </select></td>
    <td width="20%" rowspan="5" align="left" valign="top"><div id='emp_errorloc' class='error_strings'></div></td>
	<td></td>
  </tr>
   <tr height="20">
    <td>&nbsp;</td>
    
    <td align="right" ><strong>Period From:</strong><font color="#FF0000">*</font></td>
    <td><input type="text" name="date_from" size="40" id="date_from" readonly="readonly" /><input name="DateFormats" id="DateFormats" disabled value="dd/mm/yyyy" type="hidden"></td>
    </tr>
	
<tr height="20">
    <td>&nbsp;</td>
    
    <td align="right" ><strong>Period To:</strong><font color="#FF0000">*</font></td>
    <td><input type="text" name="date_to" size="40" id="date_to" readonly="readonly" /><input name="DateFormats" id="DateFormats" disabled value="dd/mm/yyyy" type="hidden"></td>
    </tr>	
	
	<tr height="20">
    <td>&nbsp;</td>
    
    <td align="right" ><strong>Enter Statement Balance:</strong><font color="#FF0000">*</font></td>
    <td><input type="text" name="balance" size="40" /></td>
    </tr>
	<tr height="20">
    <td>&nbsp;</td>
    <td align="right"><strong>Select Currency</strong><font color="#FF0000">*</font></td>
    <td >
	<select name="currency">
	                  <option>------------------Select--------------------</option>
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
  
<tr height="50">
    <td>&nbsp;</td>
    <td></td>
    <td><input type="submit" name="submit" Value="Proceed!!">&nbsp;&nbsp;&nbsp;<input type="reset"  Value="Cancel"></td>
    </tr>
	
	
	
  
   <tr>
    
    <td colspan="4" valign="top" align="center">

	
    <td>&nbsp;</td>
	
 
	<td>&nbsp;</td>
  </tr>
  
  
	
	
</table>

</form>
<script type="text/javascript">
  Calendar.setup(
    {
      inputField  : "date_from",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "date_from"       // ID of the button
    }
  );
  
  Calendar.setup(
    {
      inputField  : "date_to",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "date_to"       // ID of the button
    }
  );
  
  
  
  </script>

<SCRIPT language="JavaScript">
 var frmvalidator  = new Validator("emp");
 frmvalidator.EnableOnPageErrorDisplaySingleBox();
 frmvalidator.EnableMsgsTogether();
 frmvalidator.addValidation("bank","dontselect=0",">>Please select bank account");
 frmvalidator.addValidation("date_from","req",">>Please period from");
 frmvalidator.addValidation("date_to","req",">>Please period to");
 frmvalidator.addValidation("balance","req",">>Please statement balance");
 frmvalidator.addValidation("currency","dontselect=0",">>Please select currency");

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