<?php include('Connections/fundmaster.php'); 
$next_emp_id=$_GET['emp_id'];
$next=$_GET['next'];
?>

<html xmlns="http://www.w3.org/1999/xhtml">

<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>


<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>
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
</script>
<style>
.ui-datepicker-calendar {
    display: none;
    }
</style>
<body>

	<div id="page-wrap">

		<?php include ('header.php') ?>
		
		<div id="zone-bar" class="br-5">
          <?php include ('topmenu.php') ?>
		</div>

		<?php require_once('includes/payslipsubmenu.php');  ?>
		
		<h3>:: Begin To Process The Payroll</h3>
         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
			<div id="cont-left" class="br-5">
<!--<form name="start_invoice" action="confirm_payroll.php" method="post">--->		
<form name="start_invoice" action="pre_process_payroll.php" method="post">	
			<table width="100%" border="0">
  <tr >
    <td width="18%">&nbsp;</td>
	<td colspan="3" height="30"><?php

if ($_GET['updateconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#339900 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#339900" >Payroll Processed Successfully!!</font></strong></p></div>';
?>

<?php

if ($_GET['passwordmissmatchconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry Password do not match!!</font></strong></p></div>';
?>

<?php

if ($_GET['recordexist']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! Payroll For This Month for This Sraff Has been proccesed</font></strong></p></div>';
?></td>
    </tr>
  <!--<tr height="20">
    <td bgcolor="">&nbsp;</td>
    <td width="19%">Select Staff<font color="#FF0000">*</font></td>
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
    
  </tr>-->
  
    <tr height="20">
    <td width="5%">&nbsp;</td>
    <td width="20%">Select Month<font color="#FF0000">*</font></td>
    <td bgcolor>
	<input name="current_month" id="current_month" class="date-picker" size="40" />
	
	
	</td>
	<td width="40%" rowspan="6" valign="top"><div id='start_invoice_errorloc' class='error_strings'></div></td>
    <!--<td width="30%">Middle Name</td>
    <td width="5%"><input type="text" size="41" name="m_name" value="<?php echo $rowsemp_det->emp_middle_name;?> "></td>
    <td width="100%" rowspan="10" valign="top"><div id='new_userq_errorloc' class='error_strings'></div></td>-->
  </tr>
	
	<!--<tr height="20">
    <td>&nbsp;</td>
    <td width="20%">Enter Exit Date<font color="#FF0000">*</font></td>
    <td><input type="text" name="exit_date" size="40" id="exit_date" readonly="readonly" /><input name="DateFormats" id="DateFormats" disabled value="dd/mm/yyyy" type="hidden"></td>
							    <td width="40%" rowspan="6" valign="top"><div id='new_user_errorloc' class='error_strings'></div></td>
    </tr>-->
	
<?php 
$sqlcomm="select * from employees where status='0' order by emp_id asc";
$resultscomm= mysql_query($sqlcomm) or die ("Error $sqlcomm.".mysql_error());
if (mysql_num_rows($resultscomm) > 0)
						  {
						  while ($rowscomm=mysql_fetch_object($resultscomm))
							  { 

?>	
	
   <input type="checkbox" name="emp_id[]" value="<?php echo $rowscomm->emp_id;?>" checked style="display:none;"></td>
    
	<?php 
	
	}}
	
	
	?>
	
  <tr height="30">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="submit" name="submit" value="Next>>">&nbsp;&nbsp;</td>
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

 frmvalidator.addValidation("current_month","req",">>Please month");
 
 
 
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