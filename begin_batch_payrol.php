<?php 	
/*$sqlcurr="SELECT employees.emp_id,salary_details.gross_pay FROM employees,salary_details where salary_details.emp_id=employees.emp_id AND emp_id='1'";
$resultscurr= mysql_query($sqlcurr) or die ("Error $sqlcurr.".mysql_error());
$rowscurr=mysql_fetch_object($resultscurr); */

$sqlcurr="SELECT * FROM currency where  curr_initials LIKE '%SSP%'";
$resultscurr= mysql_query($sqlcurr) or die ("Error $sqlcurr.".mysql_error());
$rowscurr=mysql_fetch_object($resultscurr); 
$curr_rate=$rowscurr->curr_rate;


?>
<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>
<script type="text/javascript" src="calender/calendar.js"></script>
<script type="text/javascript" src="calender/lang/calendar-en.js"></script>
<script type="text/javascript" src="calender/calendar-setup.js"></script>
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

<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>

<style type="text/css">

@import url(calender/calendar-win2k-1.css);

</style>



<form name="new_supplier" action="batch_payroll.php" method="post">			
			<table width="100%" border="0">
			<tr height="20" bgcolor="#FFFFCC">
    
	<td colspan="7" height="30" align="center"><strong><font size="+1">

<?php

if ($_GET['addconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:30px; width:400px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#00CC33" >Payroll Processed Successfully!!</font></strong></p></div>';

if ($_GET['recordexist']==1)
echo '<div align="center" style="background: #FFCC33; height:30px; width:400px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ff0000" >Sorry Payroll Already Processed!!</font></strong></p></div>';



?>



</td> 
    </tr>
  <tr >
    <td width="18%">&nbsp;</td>
	<td colspan="3" height="30">

<!--<div align="center" style="background: #FFCC33; height:55px; width:600px; border:#FF0000 solid 1px; 
font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000">Client<strong><?php 

$querycl="SELECT * FROM clients where client_id='$client_id'";
	$resultscl=mysql_query($querycl) or die ("Error: $querycl.".mysql_error());
	$rowscl=mysql_fetch_object($resultscl);
	
	echo $rowscl->c_name;


?></strong>



 was invoiced last on <strong><?php echo $date_generated; ?></strong><br/><br/> Do you want to process <strong>another invoice for him?</strong></font></strong></p>

</div>-->
</td>
    </tr>
  
 
 
 <tr height="30">
    <td width="30%">&nbsp;</td>
    <td width="19%"><strong>Update Currency Rate (USD To SSP)</strong></td>
    <td width="23%"><input type="text" size="41" name="curr_rate" value="<?php echo $curr_rate; ?>">

	</td>
	    
    <td width="40%" rowspan="8" valign="top"><div id='new_supplier_errorloc' class='error_strings'></div></td>
	<td width="23%">

	</td>
  </tr>
  
  <tr height="30">
    <td bgcolor="">&nbsp;</td>
    <td width="19%"><strong>Select Payroll Month</strong></td>
    <td width="23%"><input name="date_month" id="date_month" class="date-picker" size="40" />

	</td>
	    <td width="23%">

	</td>
    <td width="40%" rowspan="8" valign="top"></td>
  </tr>
	
	
<tr>
    
    <td>&nbsp;</td> 
	
    <td rowspan="4" align="center" colspan="2"><input type="submit" name="submit" value="Process"></td>
  </tr>
  
  <!--<tr>
    
    <td>&nbsp;</td> 
	
    <td rowspan="4" align="center" colspan="2"><a href="home.php?processpayroll2=processpayroll2&emp_id=1&curr_rate=<?php echo $curr_rate; ?>"><img src="images/yes.jpg"></a></td>
  </tr>-->
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
 frmvalidator.addValidation("date_month","req",">>Please select payroll month");


 
  
 
 
  </SCRIPT>