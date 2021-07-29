<?php

$payroll_code_id=$_GET['payroll_code_id'];

$prc=$_GET['prc'];

$next_employee_number=$_GET['nen'];
	
$queryopr="SELECT *,hs_hr_employee.employee_id as emp_num FROM payroll_code,hs_hr_employee where 
payroll_code.employee_id=hs_hr_employee.emp_number 
AND payroll_code.payroll_code_id='$payroll_code_id'";
$resultsr= mysql_query($queryopr) or die ("Error $queryopr.".mysql_error());	
$rowsr=mysql_fetch_object($resultsr);
echo $staff_number=$rowsr->emp_num;

$queryopr2="SELECT * FROM payroll_code WHERE payroll_code_id='$prc'";
$resultsr2= mysql_query($queryopr2) or die ("Error $queryopr2.".mysql_error());	
$rowsr2=mysql_fetch_object($resultsr2);




$rowsr->emp_father_name;
$employee_id=$rowsr->employee_id;


$query1n="select *,hs_hr_employee.employee_id as emp_num from hs_hr_employee,employee_job_details WHERE 
hs_hr_employee.emp_number=employee_job_details.employee_id AND hs_hr_employee.employee_id='$next_employee_number'";
$results1n=mysql_query($query1n) or die ("Error: $query1n.".mysql_error());
$rows1n=mysql_fetch_object($results1n);

$next_emp_name=$rows1n->emp_firstname.' '.$rows1n->emp_father_name.' '.$rows1n->emp_lastname;

if ($next_employee_number!='')

	{
		
	$staff_number=$next_employee_number;
		$basic_pay=$rows1n->basic_pay;
		
	}
	else
	{
		
		
		$basic_pay=$rowsr->basic_pay;
		echo $staff_number=$rowsr->emp_num;
		
		
		
	}

	//echo $staff_number;
 ?>
<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>
<script language="javaScript" src="gen_validatorv4.js"  type="text/javascript" xml:space="preserve"></script>

<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>



<script type="text/javascript" src="jquery.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
     
    $("#account_from").change(function() {
    //$(this).after('<div id="loader"><img src="loader.gif" alt="loading subcategory" /></div>');
    $.get('load_employee_number.php?parent_cat=' + $(this).val(), function(data) {
    $("#employee_number").html(data);
    $('#loader').slideUp(200, function() {
    $(this).remove();
    });
    });
    });
	
	 $("#account_from").change(function() {
  // $(this).after('<div id="loader"><img src="loader.gif" alt="loading subcategory" /></div>');
    $.get('load_basic_salary.php?parent_cat=' + $(this).val(), function(data2) {
    $("#basic_salary").html(data2);
    $('#loader').slideUp(200, function() {
    $(this).remove();
    });
    });
    });
	
	
    $("#account_from").change(function() {
  // $(this).after('<div id="loader"><img src="loader.gif" alt="loading subcategory" /></div>');
    $.get('load_nssf_amount.php?parent_cat=' + $(this).val(), function(data2) {
    $("#nssf_amount").html(data2);
    $('#loader').slideUp(200, function() {
    $(this).remove();
    });
    });
    });
	
	
	$("#account_from").change(function() {
  // $(this).after('<div id="loader"><img src="loader.gif" alt="loading subcategory" /></div>');
    $.get('load_nhif_amount.php?parent_cat=' + $(this).val(), function(data2) {
    $("#nhif_amount").html(data2);
    $('#loader').slideUp(200, function() {
    $(this).remove();
    });
    });
    });
	
	
	$("#loan_type").change(function() {
  // $(this).after('<div id="loader"><img src="loader.gif" alt="loading subcategory" /></div>');
    $.get('load_shares_values.php?parent_cat=' + $(this).val(), function(data2) {
    $("#shares_value").html(data2);
    $('#loader').slideUp(200, function() {
    $(this).remove();
    });
    });
    });
	
	
	$("#loan_type").change(function() {
  // $(this).after('<div id="loader"><img src="loader.gif" alt="loading subcategory" /></div>');
    $.get('load_orig.php?parent_cat=' + $(this).val(), function(data2) {
    $("#orig").html(data2);
    $('#loader').slideUp(200, function() {
    $(this).remove();
    });
    });
    });
	
	
	$("#loan_type").change(function() {
  // $(this).after('<div id="loader"><img src="loader.gif" alt="loading subcategory" /></div>');
    $.get('load_orig_perc.php?parent_cat=' + $(this).val(), function(data2) {
    $("#orig_perc").html(data2);
    $('#loader').slideUp(200, function() {
    $(this).remove();
    });
    });
    });
	
  $("#loan_type").change(function() {
  // $(this).after('<div id="loader"><img src="loader.gif" alt="loading subcategory" /></div>');
    $.get('load_pro.php?parent_cat=' + $(this).val(), function(data2) {
    $("#pro").html(data2);
    $('#loader').slideUp(200, function() {
    $(this).remove();
    });
    });
    });
	
	
	$("#loan_type").change(function() {
  // $(this).after('<div id="loader"><img src="loader.gif" alt="loading subcategory" /></div>');
    $.get('load_sche.php?parent_cat=' + $(this).val(), function(data2) {
    $("#sche").html(data2);
    $('#loader').slideUp(200, function() {
    $(this).remove();
    });
    });
    });
	
	
	$("#loan_type").change(function() {
  // $(this).after('<div id="loader"><img src="loader.gif" alt="loading subcategory" /></div>');
    $.get('load_sche_period.php?parent_cat=' + $(this).val(), function(data2) {
    $("#sche_period").html(data2);
    $('#loader').slideUp(200, function() {
    $(this).remove();
    });
    });
    });
	
	
	$("#loan_type").change(function() {
  // $(this).after('<div id="loader"><img src="loader.gif" alt="loading subcategory" /></div>');
    $.get('load_rep_day.php?parent_cat=' + $(this).val(), function(data2) {
    $("#sel_rep_day").html(data2);
    $('#loader').slideUp(200, function() {
    $(this).remove();
    });
    });
    });
	
		$("#loan_type").change(function() {
  // $(this).after('<div id="loader"><img src="loader.gif" alt="loading subcategory" /></div>');
    $.get('load_coll_perc.php?parent_cat=' + $(this).val(), function(data2) {
    $("#coll_perc").html(data2);
    $('#loader').slideUp(200, function() {
    $(this).remove();
    });
    });
    });
	
	
			$("#loan_type").change(function() {
  // $(this).after('<div id="loader"><img src="loader.gif" alt="loading subcategory" /></div>');
    $.get('load_coll_amount.php?parent_cat=' + $(this).val(), function(data2) {
    $("#coll_amount").html(data2);
    $('#loader').slideUp(200, function() {
    $(this).remove();
    });
    });
    });
		
	

	
	 
    
    });


    </script>
	
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

<?php 
include('select_search.php');
?>


	<script type="text/javascript" src="calender/calendar.js"></script>
<script type="text/javascript" src="calender/lang/calendar-en.js"></script>
<script type="text/javascript" src="calender/calendar-setup.js"></script>



<style type="text/css">

@import url(calender/calendar-win2k-1.css);

</style>
<form name="emp" action="process_employee_payroll.php?sub_module_id=<?php echo $sub_module_id; ?>&id=<?php echo $employee_id; ?>&pci=<?php echo $payroll_code_id; ?>" method="post">			
<table width="90%" border="0" align="center" bgcolor="#9AD7AF" style="border-radius:5px;">
 
	  <tr height="25" >
  <td colspan="" ></td>
  <td colspan="4" bgcolor="#04648C" align="center"><font color="#fff"><strong>Employee Payroll Details</strong></font></td>
  
  
  </tr>

  <tr height="20">
    <td width="10%">&nbsp;</td>
    <td width="10%">Select Employee Name<font color="#FF0000">*</font></td>
    <td width="10%">
	
	
	
	<select name="employee_id" required id="account_from" style="width:250px;">
	
	
	<?php


	if ($next_employee_number!='')

	{
		?>
		
<option value="<?php echo $rows1n->emp_number; ?>"><?php echo $rows1n->emp_num.' - '.$rows1n->emp_firstname.' '.$rows1n->emp_father_name.' '.$rows1n->emp_lastname; ?></option>
    
	<?php
		
		
	}
	else
	{







		?>
	
	
<option value="<?php echo $rowsr->emp_number; ?>"><?php echo $rowsr->emp_num.' - '.$rowsr->emp_firstname.' '.$rowsr->emp_father_name.' '.$rowsr->emp_lastname; ?></option>






								  <?php
								  
	}
	
	
		if ($next_employee_number!='')

	{
		
		
	}
	else
	{
		
								  
								  $query1="select *,hs_hr_employee.employee_id as staff_num from hs_hr_employee,employee_job_details WHERE 
								  hs_hr_employee.emp_number=employee_job_details.employee_id AND 
								  employee_job_details.terms_of_service='1' order by emp_firstname";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->emp_number; ?>"><?php echo $rows1->staff_num.' - '. $rows1->emp_firstname.' '.$rows1->emp_father_name.' '.$rows1->emp_lastname; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
								  
								  
	}							  
								  
								  
								  ?>
								  
								  </select></td>
    <td width="10%">Payroll Month</td>
    <td width="10%"><strong>Month : </strong>

	<select style="width:100px;" required name="month">
	
	
	<?php 
	if ($payroll_code_id=='')
	{
		
		if ($prc=='')
		{
	?>
		<option value="">Month..................</option>
		
		<?php

		}
else
{ ?>
	
		<option value="<?php echo $rowsr2->payroll_month; ?>"><?php echo $rowsr2->payroll_month; ?></option>	
	
<?php	
}




	
	}
else
{
	?>
		<option value="<?php echo $rowsr->payroll_month; ?>"><?php echo $rowsr->payroll_month; ?></option>
		
		<?php 	
	
	
}	
		
		?>
	 
	 <?php 
	 for ($m=1; $m<=12; $m++)

	{
     $month_val = date('M', mktime(0,0,0,$m, 1, date('Y')));
     $month2 = date('F', mktime(0,0,0,$m, 1, date('Y')));
	 
	 
	 				if ($prc=='')
		{
	 
	 
     ?>
	 <option value="<?php echo $month_val;?>"><?php echo $month2; ?></option>
	 
	 <?php
	 
	 
     }
	 else
	 {
		 
		 
		 
	 }
	}	 
	 ?>
	
	 
	 
	 </select>
	
	
	
	<strong>Year : </strong>
		
	<select style="width:80px;" name="year">
	<?php 
	if ($payroll_code_id=='')
	{
		
				if ($prc=='')
		{
	
	?>
		<option value="">Year..................</option>
		
		<?php 
		}
		else
		{
			?>
		<option value="<?php echo $rowsr2->payroll_year; ?>"><?php echo $rowsr2->payroll_year; ?></option>
		
		<?php	
			
			
			
		}
	}
else
{
	?>
		<option value="<?php echo $rowsr->payroll_year; ?>"><?php echo $rowsr->payroll_year; ?></option>
		
		<?php 	
	
	
}	
		
		?>
  <?php
   for($i = date("Y"); $i > date("Y")-10; $i--)
      {
		  
if ($prc=='')
		{
	   
	   ?>
   <option value="<?php echo $i ?>"><?php echo $i ?></option>
	 
	 <?php
	 
		}
		else
		{
			
			
		}
   }
  ?>
</select></td>
    <td width="10%"></td>
     <!--<td width="40%" rowspan="7" valign="top"><div id='new_supplier_errorloc' class='error_strings'></div></td>-->
  </tr>
  <tr height="20">
    <td bgcolor="">&nbsp;</td>
    <td width="1%">Employee Number<font color="#FF0000">*</font></td>
    <td width="10%"><span id="employee_number"><input readonly class="form-control" size="41" type='text'  value="<?php echo $staff_number;?>" name='phone_code'/><span></td>
    <td width="10%">Basic Salary<font color="#FF0000">*</font></td>
    <td width="10%"><span id="basic_salary"><input readonly class="form-control" size="41" type='text'  value="<?php echo $basic_pay;?>" name='basic_pay'/><span></td>
    <td width="10%"></td>
  </tr>
  
    <tr height="20">
    <td bgcolor="">&nbsp;</td>
    <td width="1%">Days Absent<font color="#FF0000">*</font></td>
    <td width="10%"><input  class="form-control" size="41" type='number'  required value="<?php echo $rowsr->days_absent; ?>" name="days_absent"/><span></td>
    <td width="10%">Overtime (Hrs)<font color="#FF0000">*</font></td>
    <td width="10%"><strong>Normal : </strong><input size="5" required value="<?php echo $rowsr->normal_ot; ?>" style="width:30%;" type="number" name="normal_ot"><strong> Holidays : </strong><input size="5" style="width:30%;" required value="<?php echo $rowsr->holiday_ot; ?>"  min="0" type="number" name="holiday_ot"></td>
    <td width="10%"></td>
  </tr>
  
  </table>
  
  <table width="60%" border="0" align="center" bgcolor="#fff" class="display nowrap" style="border-radius:5px;" id="example">	
<tr><td colspan="5"><h3>Allowances and Bonus</h3></td></tr>

	<tr>
 
 
 <?php 

  
$sql="select * from benefit_logs order by sort_order";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


if (mysql_num_rows($results) > 0)
						  {
							  
							  while ($rows=mysql_fetch_object($results))
							  {
 
 
 $benefit_log_id=$rows->benefit_log_id;
 ?>

 <tr  height="30" bgcolor="#ccc">
 <td width="10%"><strong></strong></td>
 <td width="10%"><strong><?php echo $rows->benefit_log_name; ?></strong>
 <input type="hidden" value="<?php echo $rows->benefit_log_id;?>" name="benefit_log_id[<?php echo $rows->benefit_log_id ?>]">
 
 </td>
 
 <?php 
 
$queryopg1 = "SELECT benefit_amount FROM benefits where benefit_log_id='$benefit_log_id' and payroll_code_id='$payroll_code_id'";
$resultsg1= mysql_query($queryopg1) or die ("Error $queryopg1.".mysql_error());	
$rowsg1=mysql_fetch_object($resultsg1);

$benefit_amount=$rowsg1->benefit_amount;
 
 ?>
 
 
 
 
 <td width="25%" align=""><input size="40" type="text" value="<?php echo $benefit_amount;  ?>" name="benefit_amount[<?php echo $rows->benefit_log_id; ?>]"></td>
 </tr>
 <?php 
 
						  }
						  
						  }
 ?>
 
 

 </table>
 
 <table width="60%" border="0" align="center" bgcolor="#fff" class="display nowrap" style="border-radius:5px;" id="example">	
<tr><td colspan="5"><h3>Deductions</h3></td></tr>



	
	<!-- <tr bgcolor="#ccc" height="30">
 <td></td>
 <td><strong>N.H.I.F</strong></td>
 <td><input size="40" type="text" name="nhif_amount" value="<?php echo $nhif_amount; ?>"></td>
 
 </tr>-->
 
  <!--<tr bgcolor="#ccc" height="30">
 <td></td>
 <td><strong>N.S.S.F</strong></td>
 <td><span id="nssf_amount"><input size="40" value="<?php echo $rowsr->staff_nssf_amount; ?>" type="text" name="nssf_amount"></span></td>
 
 </tr>
 
   <tr bgcolor="#ccc" height="30">
 <td></td>
 <td><strong>N.H.I.F</strong></td>
 <td><span id="nhif_amount"><input size="40" value="<?php echo $rowsr->nhif_amount; ?>" type="text" name="nhif_amount"></span></td>
 
 </tr>-->

 <?php
$sql="select * from deduction_logs order by sort_order";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


if (mysql_num_rows($results) > 0)
						  {
							  
							  while ($rows=mysql_fetch_object($results))
							  {
 
 
 $deduction_log_id=$rows->deduction_log_id;
 ?>

 <tr  height="30" bgcolor="#ccc">
 <td width="10%"><strong></strong></td>
 <td width="10%"><strong><?php echo $rows->deduction_log_name; ?></strong>
 <input type="hidden" value="<?php echo $rows->deduction_log_id;?>" name="deduction_log_id[<?php echo $rows->deduction_log_id; ?>]">
 
 </td>
 
  <?php 
 
$queryopg1d = "SELECT deduction_amount FROM deductions where deduction_log_id='$deduction_log_id' and payroll_code_id='$payroll_code_id'";
$resultsg1d= mysql_query($queryopg1d) or die ("Error $queryopg1.".mysql_error());	
$rowsg1d=mysql_fetch_object($resultsg1d);

$deduction_amount=$rowsg1d->deduction_amount;
 
 ?>
 <td width="25%" align=""><input size="40" type="text" value="<?php echo $deduction_amount; ?>" name="deduction_amount[<?php echo $rows->deduction_log_id; ?>]"></td>
 </tr>
 <?php 
 
						  }
						  
						  }
 ?>
 
 <!--<tr bgcolor="#ccc" height="30">
 <td></td>
 <td><strong>P.A.Y.E</strong></td>
 <td></td>
 
 </tr>-->

 </table>

  
   
  
  
    
	

	
    <table width="60%" border="0" align="center" bgcolor="#fff" class="display nowrap" style="border-radius:5px;" id="example">
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2" align="center"><input type="submit" name="submit" value="Save Payroll Details" style="background:#2E3192; font-size:14px; color:#ffffff; font-weight:bold; width:300px; height:30px; border-radius:5px;"></td>
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


<script>


$("#account_from").select2( {
	placeholder: "Select Employee",
	allowClear: true
	} );
	

	
	
</script>

		


<?php 
//}
?>
