<?php 
$id=$_GET['payrol_basic_log_batch_id'];

$sql="SELECT employees.employee_no,employees.emp_fname,employees.emp_mname,employees.emp_lname,employees.joining_date,departments.department_name,salary_details.grade,
payrol_basic_log_batch.emp_id,payrol_basic_log_batch.payrol_basic_log_batch_id,payrol_basic_log_batch.payment_month,payrol_basic_log_batch.basic_pay,payrol_basic_log_batch.working_days,payrol_basic_log_batch.overtime1,payrol_basic_log_batch.overtime2,
payrol_basic_log_batch.gross_pay,payrol_basic_log_batch.cola,payrol_basic_log_batch.emp_sic_rate,payrol_basic_log_batch.housing,payrol_basic_log_batch.clothing,payrol_basic_log_batch.comp_sic_rate,payrol_basic_log_batch.taxable_income,payrol_basic_log_batch.tax,payrol_basic_log_batch.comp_sic_rate,
payrol_basic_log_batch.overtime_amnt1,payrol_basic_log_batch.otherpayment,payrol_basic_log_batch.overtime_amnt2,payrol_basic_log_batch.curr_rate FROM employees,payrol_basic_log_batch,
salary_details,departments WHERE employees.department_id=departments.department_id and salary_details.emp_id=employees.emp_id AND payrol_basic_log_batch.emp_id=employees.emp_id and payrol_basic_log_batch.payrol_basic_log_batch_id='$id' order by payrol_basic_log_batch.payment_month desc , employees.employee_no asc  "; 
$results= mysql_query($sql) or die ("Error $sqlpayrol.".mysql_error());
$rows=mysql_fetch_object($results);
?>
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



<form name="new_supplier" action="processeditpayroll.php?payrol_basic_log_batch_id=<?php echo $id; ?>&basic_pay=<?php echo $basic_pay=$rows->basic_pay;?>" method="post">			
			<table width="100%" border="0">
			
			<tr height="20" bgcolor="#FFFFCC">
    
	<td colspan="7" height="30" align="center"><strong><font size="+1">
Update Payroll Details for : <font color="#ff0000">
<?php
echo $rows->emp_fname.' '.$rows->emp_mname.' '.$rows->emp_lname;

?>
</font>
Employee Number : <font color="#ff0000"><?php echo $rows->employee_no;?></font>

</td> 
    </tr>
  <tr >
    <td width="18%">&nbsp;</td>
	<td colspan="3" height="30"><?php

if ($_GET['editconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:400px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ff0000" >Recorded Updated Successfully!!</font></strong></p></div>';
?>

<?php

if ($_GET['passwordmissmatchconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry Password do not match!!</font></strong></p></div>';
?>

<?php

if ($_GET['recordexist']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! the user is existing</font></strong></p></div>';



?></td>
    </tr>
 
  
	
	
	<tr height="20">
    <td>&nbsp;</td>
    <td width="15%">Working Days<font color="#FF0000">*</font></td>
    <td><input type="text" size="41" name="working_days" value="<?php echo $rows->working_days;?>"></td>
	<td width="40%" rowspan="6" valign="top"><div id='new_supplier_errorloc' class='error_strings'></div></td>
    </tr>
	
	
	<tr height="20">
    <td>&nbsp;</td>
    <td>Overtime Weekdays (Hrs)<font color="#FF0000">*</font></td>
    <td><input type="text" size="41" name="ot_week_days" value="<?php echo $rows->overtime1;?>"></td>
    </tr>
	<tr height="20">
    <td>&nbsp;</td>
    <td>Overtime Weekends(Hrs)<font color="#FF0000">*</font></td>
    <td><input type="text" size="41" name="ot_weekends" value="<?php echo $rows->overtime2;?>"></td>
    </tr>
	
	<tr height="20">
    <td>&nbsp;</td>
    <td>Other Payments (USD)</td>
    <td><input type="text" size="41" name="other_payments" value="<?php echo $rows->otherpayment;?>" ></td>
    </tr>
	
	
	
	
	
  
  <tr>
	
	
	
  
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="submit" name="submit" value="Update Record">&nbsp;&nbsp;<input type="reset" value="Cancel"></td>
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
  <tr>
    <td>&nbsp;</td>
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
 frmvalidator.addValidation("ben_fname","req",">>Please enter beneficiary name");
 frmvalidator.addValidation("gender","dontselect=0",">>Please select gender");
 frmvalidator.addValidation("nationality","req",">>Please enter nationality");
 frmvalidator.addValidation("university","dontselect=0",">>Please select host institute");
 frmvalidator.addValidation("start_date","req",">>Please enter start date");  
 frmvalidator.addValidation("comp_date","req",">>Please enter completion date");
 <!--frmvalidator.addValidation("spec","req",">>Please enter speciality");-->
  <!--frmvalidator.addValidation("phone","req",">>Please enter phone");-->
 frmvalidator.addValidation("email","req",">>Please enter email address");
 frmvalidator.addValidation("email","email",">>Please enter valid email");
 frmvalidator.addValidation("sponsor1","req",">>Please enter sponsor 1");
 
 
 
 
  </SCRIPT>