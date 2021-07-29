<?php include('Connections/fundmaster.php'); ?>

<html xmlns="http://www.w3.org/1999/xhtml">

<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>
<script type="text/javascript" src="calender/calendar.js"></script>
<script type="text/javascript" src="calender/lang/calendar-en.js"></script>
<script type="text/javascript" src="calender/calendar-setup.js"></script>
<style type="text/css">

@import url(calender/calendar-win2k-1.css);

</style>
<script type="text/javascript"> 

function confirmDelete()
{
    return confirm("Ensure Staff Balance is up to date before terminating the staff. Want to proceed and terminate the staff?");
}




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

		<?php require_once('includes/employeessubmenu.php');  ?>
		
		<h3>:: Terminate Staff From The Company</h3>
         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
			<div id="cont-left" class="br-5">
<form name="start_invoice" action="terminate_staff2.php" method="post">			
			<table width="100%" border="0">
  <tr >
    <td width="18%">&nbsp;</td>
	<td colspan="3" height="30"><?php

if ($_GET['addconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#339900 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#339900" >Staff Terminated Successfully!!</font></strong></p></div>';
?>

<?php

if ($_GET['passwordmissmatchconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry Password do not match!!</font></strong></p></div>';
?>

<?php

if ($_GET['recordexist']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! the record exists</font></strong></p></div>';
?></td>
    </tr>
  <tr height="20">
    <td bgcolor="">&nbsp;</td>
    <td width="19%">Select Staff To Be Terminated<font color="#FF0000">*</font></td>
    <td width="23%"><select name="emp_id"><option value="0">-------------------Select-----------------------</option>
								  <?php
								  
								  $query1="select * from employees order by emp_firstname asc";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->emp_id; ?>"><?php echo $rows1->emp_firstname; ?> <?php echo $rows1->emp_middle_name; ?> <?php echo $rows1->emp_lastname; ?> </option>
                                    
                                
										  
										<?php  
									 }
									  
									  
									  }
								  
								  
								  
								  
								  
								  ?>
								  
								 
								  
								  </select></td>
    <td width="40%" rowspan="6" valign="top"><div id='start_invoice_errorloc' class='error_strings'></div></td>
  </tr>
  
  <!--<tr height="20">
    <td>&nbsp;</td>
    <td width="20%">Select Mode Of Exit<font color="#FF0000">*</font></td>
    <td>
	<select name="exit_mode">				  
										  
                                    
	<option value="0">-------------------Select-----------------------</option>
	<option value="1">Full Transfer Of Shares Only</option>
	<option value="2">Partial Transfer and Withdrawal</option>
	<option value="3">Full Withdrawal of Shares</option>

								  
									
                               </select></td>
							    <td width="40%" rowspan="6" valign="top"><div id='new_user_errorloc' class='error_strings'></div></td>
    </tr>-->
	
	<tr height="20">
    <td>&nbsp;</td>
    <td width="20%">Enter Termination Date<font color="#FF0000">*</font></td>
    <td><input type="text" name="exit_date" size="40" id="exit_date" readonly="readonly" /><input name="DateFormats" id="DateFormats" disabled value="dd/mm/yyyy" type="hidden"></td>
							    <td width="40%" rowspan="6" valign="top"><div id='new_user_errorloc' class='error_strings'></div></td>
    </tr>
  
	
	
  <tr height="30">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="submit" name="submit" value="Next>>" onClick="return confirmDelete();">&nbsp;&nbsp;</td>
    <td></td>
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

<SCRIPT language="JavaScript">
 var frmvalidator  = new Validator("start_invoice");
 frmvalidator.EnableOnPageErrorDisplaySingleBox();
 frmvalidator.EnableMsgsTogether();

 frmvalidator.addValidation("shareholderid","dontselect=0",">>Please select share holder");
 frmvalidator.addValidation("exit_mode","dontselect=0",">>Please select mode of exit");
 frmvalidator.addValidation("exit_date","req",">>Please enter date of exit");
 
 
 
  </SCRIPT>

  
<script type="text/javascript">
  Calendar.setup(
    {
      inputField  : "exit_date",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "exit_date"       // ID of the button
    }
  );
    
  
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