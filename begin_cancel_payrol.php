<?php include('Connections/fundmaster.php'); 
$date_month=$_GET['date_month']; 
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>
<script src="jquery.js"></script>
<script type="text/javascript" src="jquery-ui.min.js"></script>
<link rel="stylesheet" type="text/css" media="screen" href="jquery-ui.css">
<script type="text/javascript">
$(function() {
    $('.date-picker').datepicker( {
        changeMonth: true,
        changeYear: true,
        showButtonPanel: true,
        dateFormat: 'MM yy',
        onClose: function(dateText, inst) {
            var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
            var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
            $(this).datepicker('setDate', new Date(year, month, 1));
        }
    });
});


function confirmDelete()
{
    return confirm("Are you sure you want to cancel?");
}




</script>
<style>
.ui-datepicker-calendar {
    display: none;
    }
</style>
<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>


<body>

	<div id="page-wrap">

		<?php include ('header.php') ?>
		
		<div id="zone-bar" class="br-5">
          <?php include ('topmenu.php') ?>
		</div>

		<?php require_once('includes/payslipsubmenu.php');  ?>
		
		<h3>:: Cancel Generated Payroll</h3>
         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
			<div id="cont-left" class="br-5">
<form name="emp" id="emp" action="process_cancel_payroll.php" method="post">			
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
    <td width="19%" align="right"><strong>Select Staff</strong><font color="#FF0000">*</font></td>
    <td width="23%"><select name="emp_id">
	                  <option>------------------Select--------------------</option>
								  <?php
								  
								  $query1="select * from employees where status='0'";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->emp_id;?>"><?php echo $rows1->emp_firstname.' '.$rows1->emp_middle_name.''.$rows1->emp_lastname; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
								  
								  
								  
								  
								  
								  ?>
								  </select></td>
    <td width="40%" rowspan="6" valign="top"><div id='emp_errorloc' class='error_strings'></div></td>
  </tr>
	
	<tr height="20">
    <td bgcolor="" width="20%">&nbsp;</td>
    <td width="20%" align="right"><strong>Select Month And Year </strong><font color="#FF0000">*</font></td>
    <td width="15%"><input name="date_month" id="date_month" class="date-picker" size="40" /></td>
    <td width="20%" rowspan="3" align="left" valign="top"></td>
	<td></td>
  </tr>
  
<tr height="50">
    <td>&nbsp;</td>
    <td></td>
    <td><input type="submit" name="submit" Value="Cancel Payroll" onClick="return confirmDelete();">&nbsp;&nbsp;&nbsp;<input type="reset"  Value="Cancel"></td>
    </tr>
	
	
	
  
   <tr>
    
    <td colspan="4" valign="top" align="center">

	
    <td>&nbsp;</td>
	
 
	<td>&nbsp;</td>
  </tr>
  
  
	
	
</table>

</form>

<SCRIPT language="JavaScript">
 var frmvalidator  = new Validator("emp");
 frmvalidator.EnableOnPageErrorDisplaySingleBox();
 frmvalidator.EnableMsgsTogether();
 frmvalidator.addValidation("emp_id","dontselect=0",">>Please select staff");
 frmvalidator.addValidation("date_month","req",">>Please select month");

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