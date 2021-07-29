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



<form name="new_supplier" action="processpayslip.php" method="post">			
			<table width="100%" border="0">
			<tr height="20" bgcolor="#FFFFCC">
    
	<td colspan="7" height="30" align="center"><strong><font size="+1" color="#ff0000">Kindly Update Employee Payroll Details Before Generating Payslips...</strong></font>
</td> 
    </tr>
	<tr >
    <td width="18%">&nbsp;</td>

	<td colspan="4" height="30"><?php
	
	$current_month=$_GET['current_month'];

if ($_GET['success']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:400px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ff0000" >All Payslips for '.$current_month.' Generated Successfully!!</font></strong></p></div>';
?>

<?php

if ($_GET['abnormal']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! Salaries for '.$current_month.' not yet processed</font></strong></p></div>';
?>

<?php

if ($_GET['exist']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! Payslips for '.$current_month.' already generated</font></strong></p></div>';
?></td>
 <td width="18%">&nbsp;</td>
    </tr>
	<tr height="30">
 
    <td bgcolor="">&nbsp;</td>
    <td width="9%" align="right"><strong>Select Pay Slip Month&nbsp;&nbsp;</strong></td>
    <td width="23%"><input name="date_month" id="date_month" class="date-picker" size="40" />

	</td>
	    <td width="23%"><div id='new_supplier_errorloc' class='error_strings'></div>

	</td>
    <td width="40%" rowspan="8" valign="top"></td>
  </tr>
  
  <tr height="20">

    <td width="19%"></td>
    <td width="23%"></td>
    <td width="23%"><input type="submit" name="submit" value="Generate Payslips">	</td>
    <td width="40%" rowspan="8" valign="top"></td>
  </tr>
 
	
	
  
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
   
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    
  </tr>
</table>

</form>



<SCRIPT language="JavaScript">
 var frmvalidator  = new Validator("new_supplier");
 frmvalidator.EnableOnPageErrorDisplaySingleBox();
 frmvalidator.EnableMsgsTogether();
 frmvalidator.addValidation("date_month","req",">>Please select payslip month");


 
  
 
 
  </SCRIPT>