<?php include('Connections/fundmaster.php'); 
$date_month=$_GET['date_month']; 
?>

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
    return confirm("Are you sure you want to close accounts?");
}

</script>

<body>

	<div id="page-wrap">

		<?php include ('header.php') ?>
		
		<div id="zone-bar" class="br-5">
          <?php include ('topmenu.php') ?>
		</div>

		<?php require_once('includes/closed_accounts_submenu.php');  ?>
		
		<h3>:: Close Financial Accounts</h3>
         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
			<div id="cont-left" class="br-5">
<form name="emp" id="emp" action="process_close_accounts.php" method="post">			
			<table width="100%" border="0">
 <tr height="20">
    <td width="15%">&nbsp;</td>
	<td colspan="6" height="30" align="center"><?php

if ($_GET['delconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:500px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ff0000" >Payroll Cancelled Successfuly</div>';
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
    <td bgcolor="">&nbsp;</td>
    <td width="19%" align="right"><strong>Select Closing Date</strong><font color="#FF0000">*</font></td>
    <td width="23%"><input type="text" name="date_from" size="40" id="date_from" readonly="readonly" /></td>
    <td width="40%" rowspan="6" valign="top"><div id='emp_errorloc' class='error_strings'>sasa</div></td>
  </tr>
	
	<tr height="20">
    <td bgcolor="" width="20%">&nbsp;</td>
    <td width="20%" align="right"><strong>Remarks </strong><font color="#FF0000"></font></td>
    <td width="15%"><textarea name="remarks" cols="43" rows="3"></textarea></td>
    <td width="20%" rowspan="3" align="left" valign="top"></td>
	<td></td>
  </tr>
  
<tr height="50">
    <td>&nbsp;</td>
    <td></td>
    <td><input type="submit" name="submit" Value="Proceed>>" onClick="return confirmDelete();">&nbsp;&nbsp;&nbsp;<input type="reset"  Value="Cancel"></td>
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
  
  

  
  </script>

<SCRIPT language="JavaScript">
 var frmvalidator  = new Validator("emp");
 frmvalidator.EnableOnPageErrorDisplaySingleBox();
 frmvalidator.EnableMsgsTogether();
 frmvalidator.addValidation("date_from","req",">>Please select closing date");

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