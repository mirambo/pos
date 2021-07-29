<?php
$payroll_code_id=$_GET['payroll_code_id'];

/* $qr_confirm23a="SELECT * from user_group_submodule WHERE sub_module_id='$sub_module_id' and `add`='A' and user_group_id='$user_group_id'";
$qr_res23a=mysql_query($qr_confirm23a) or die ('Error : $qr_confirm23a.' .mysql_error());
$num_rows23a=mysql_num_rows($qr_res23a); 
if ($num_rows23a==0) 
{ 
include ('includes/restricted.php');
}
else
{ */

	
/* $queryop = "SELECT * FROM applied_loans,members,loan_types where applied_loans.member_id=members.member_id 
and applied_loans.loan_type_id=loan_types.loan_type_id AND applied_loan_id='$loan_id'";
$results= mysql_query($queryop) or die ("Error $queryop.".mysql_error());	
$rows=mysql_fetch_object($results);

$guarantor1=$rows->guarantor1;
$guarantor2=$rows->guarantor2;

$queryopg1 = "SELECT member_fname FROM members where member_id='$guarantor1'";
$resultsg1= mysql_query($queryopg1) or die ("Error $queryopg1.".mysql_error());	
$rowsg1=mysql_fetch_object($resultsg1);


$guarantor1_name=$rowsg1->member_fname;


$queryopg2 = "SELECT member_fname FROM members where member_id='$guarantor2'";
$resultsg2= mysql_query($queryopg2) or die ("Error $queryopg2.".mysql_error());	
$rowsg2=mysql_fetch_object($resultsg2);


$guarantor2_name=$rowsg2->member_fname;


$member_id=$rows->member_id;
$queryopg2s = "SELECT SUM(amount) as acc_dep FROM subscriptions where member_id='$member_id'";
$resultsg2s= mysql_query($queryopg2s) or die ("Error $queryopg2s.".mysql_error());	
$rowsg2s=mysql_fetch_object($resultsg2s);

	
	$acc_dep=$rowsg2s->acc_dep;	 */
	
	
	
	
	
$queryopr ="SELECT * FROM payroll_code,hs_hr_employee where payroll_code.employee_id=hs_hr_employee.emp_number 
AND payroll_code.payroll_code_id='$payroll_code_id'";
$resultsr= mysql_query($queryopr) or die ("Error $queryopr.".mysql_error());	
$rowsr=mysql_fetch_object($resultsr);

$rowsr->emp_father_name;
$rowsr->employee_id;
	
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
<form name="emp" action="process_employee_payroll_specific.php?sub_module_id=<?php echo $sub_module_id; ?>&id=<?php echo $employee_id; ?>&pci=<?php echo $payroll_code_id; ?>" method="post">			
<table width="60%" border="0" align="center" bgcolor="#ffffcc" style="border-radius:5px;">
 
	  <tr height="25" >

  <td colspan="6" bgcolor="#04648C" align="center"><font color="#fff"><strong>Employee Payroll Details</strong></font></td>
  
  
  </tr>

  <tr height="20">
    <td width="10%">&nbsp;</td>
    <td width="10%" align="right"><strong>Employee Name : </strong><font color="#FF0000"></font></td>
    <td width="20%"><?php echo $rowsr->emp_firstname.' '.$rowsr->emp_father_name.' '.$rowsr->emp_lastname; ?></td>
    <td width="10%" align="right"><strong>Payroll Month : </strong></td>
    <td width="10%"><?php echo $rowsr->payroll_month.'-'.$rowsr->payroll_year; ?></td>
    <td width="10%"></td>
     <!--<td width="40%" rowspan="7" valign="top"><div id='new_supplier_errorloc' class='error_strings'></div></td>-->
  </tr>
  <tr height="20">
    <td bgcolor="">&nbsp;</td>
    <td width="1%" align="right"><strong>Employee Number : </strong><font color="#FF0000"></font></td>
    <td width="10%"><?php echo $rowsr->employee_id;?></td>
    <td width="10%" align="right"><strong>Payslip No : </strong></td>
    <td width="10%"><?php echo $rowsr->payroll_no;?></td>
    <td width="10%"></td>
  </tr>
  
    
  
  </table>
  
  <table width="60%" border="0" align="center" bgcolor="#fff" class="display nowrap" style="border-radius:5px;" id="example">	
<tr><td colspan="5"><h3>Basic Details</h3></td></tr>

 
 
   <tr  height="30" bgcolor="#ccc">
 <td width="10%"><strong></strong></td>
 <td width="10%">Basic Salary</td>
 

 
 
 
 <td width="25%" align=""><?php echo number_format($basic_pay=$rowsr->basic_pay,2); ?></td>
 </tr>
 
    <tr  height="30" bgcolor="#ccc">
 <td width="10%"><strong></strong></td>
 <td width="10%">Overtime</td>
 

 
 
 
 <td width="25%" align=""><strong>Normal (<?php echo $rowsr->normal_ot; ?>hrs)</strong> <?php echo number_format($normal_ot_amount=$rowsr->normal_ot_amount,2); ?>,
 
<strong>Holiday(<?php echo $rowsr->holiday_ot; ?>hrs): </strong><?php echo number_format($holiday_ot_amount=$rowsr->holiday_ot_amount,2); ?><strong> Total : </strong><?php echo number_format($ttl_ot=$normal_ot_amount+$holiday_ot_amount,2);  ?></td>
 </tr>

 

 </table>
 
 
 <table width="60%" border="0" align="center" bgcolor="#fff" class="display nowrap" style="border-radius:5px;" id="example">	
<tr><td colspan="5"><h3>Allowances</h3></td></tr>

	<tr>
 
 
 <?php 

  
$sql="select * from benefit_logs,benefits where benefits.benefit_log_id=benefit_logs.benefit_log_id and benefits.payroll_code_id='$payroll_code_id' order by sort_order";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


if (mysql_num_rows($results) > 0)
						  {
							  
							  while ($rows=mysql_fetch_object($results))
							  {
 
 
 $benefit_log_id=$rows->benefit_log_id;
 ?>

 <tr  height="30" bgcolor="#ccc">
 <td width="10%"><strong></strong></td>
 <td width="10%"><?php echo $rows->benefit_log_name; ?>

 
 </td>
 

 
 
 
 
 <td width="25%" align=""><?php echo number_format($benefit_amount=$rows->benefit_amount,2); 
 
 $ttl_benefits=$ttl_benefits+$benefit_amount;
 
 
 
 ?></td>
 </tr>
 <?php 
 
						  }
						  
						  }
 ?>
 
 <tr height="30">
 <td></td>
 <td><strong>Totals Allowances</strong></td>
 <td align="right"><strong><?php echo number_format($ttl_benefits,2);?></strong></td>
 
 </tr>
 
  <tr height="30" bgcolor="#ffffcc">
 <td></td>
 <td><strong>Gross Pay <strong></td>
 <td align="right"><strong><?php echo number_format($gross_pay=$basic_pay+$ttl_ot+$ttl_benefits,2);?></strong></td>
 
 </tr>
 
 

 </table>
 
 <table width="60%" border="0" align="center" bgcolor="#fff" class="display nowrap" style="border-radius:5px;" id="example">	
<tr><td colspan="5"><h3>Deductions</h3></td></tr>

  
 
   <tr bgcolor="#ccc" height="30">
 <td></td>
 <td>Absentism</td>
 <td><strong>Days Absent:</strong> <?php echo number_format($rowsr->days_absent,0); ?>,
 
<strong> Days Absent Deductions: </strong><?php echo number_format($days_absent_amount=$rowsr->days_absent_amount,2); ?>
 
 
 
 </td>
 
 </tr>
 
 <tr bgcolor="#ccc" height="30">
 <td></td>
 <td>N.S.S.F</td>
 <td><strong>Employee Contrib.:</strong> <?php echo number_format($staff_nssf_amount=$rowsr->staff_nssf_amount,2); ?>,
 
<strong> Employer Contrib.: </strong><?php echo number_format($rowsr->employer_nssf_amount,2); ?>
 
 
 
 </td>
 
 </tr>
 
 
   <tr bgcolor="#ccc" height="30">
 <td></td>
 <td>P.A.Y.E</td>
 <td>
 <strong>Tax : </strong><?php echo number_format($paye=$rowsr->paye_amount,2); ?>, 
 
 (<strong>Taxable Income : </strong><?php echo number_format($ti=$gross_pay-$staff_nssf_amount,2); ?>)
 
 
 
 </td>
 
 </tr>

	
<tr bgcolor="#ccc" height="30">
 <td></td>
 <td>N.H.I.F</td>
 <td><?php echo number_format($nhif_amount=$rowsr->nhif_amount,2); ?></td>
 
 </tr>


 <?php
$sql="select * from deduction_logs,deductions WHERE deductions.deduction_log_id=deduction_logs.deduction_log_id 
and deductions.payroll_code_id='$payroll_code_id' order by sort_order";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


if (mysql_num_rows($results) > 0)
						  {
							  
							  while ($rows=mysql_fetch_object($results))
							  {
 
 
 $deduction_log_id=$rows->deduction_log_id;
 ?>

 <tr  height="30" bgcolor="#ccc">
 <td width="10%"><strong></strong></td>
 <td width="10%"><?php echo $rows->deduction_log_name; ?>
 
 
 </td>
 
 
 <td width="25%" align=""><?php echo number_format($deduction_amount=$rows->deduction_amount,2); 
 
 
  $ttl_deductions=$ttl_deductions+$deduction_amount;
 ?></td>
 </tr>
 <?php 
 
						  }
						  
						  }
 ?>
 
 <tr height="30">
 <td></td>
 <td><strong>Totals Deductions</strong></td>
 <td align="right"><strong><?php echo number_format($all_deductions=$ttl_deductions+$nhif_amount+$paye+$staff_nssf_amount+$days_absent_amount,2);?></strong></td>
 
 </tr>
 
<tr height="30" bgcolor="#ffffcc">
 <td></td>
 <td><strong><font size='' color="#">Net Value</font></td>
 <td align="right"><strong><?php echo number_format($net_pay=$gross_pay-$all_deductions,2);
 

 
 
 ?></strong></td>
 
 </tr>
   <tr height="30" bgcolor="#ffffcc">
 <td></td>
 <td><strong>Round Off</td>
 <td align="right"><?php

$round_off_value=salary_round_off();


 number_format($net_pay=$gross_pay-$all_deductions,2);
 
 
$number=number_format($net_payr=ceil(($net_pay) / $round_off_value) * $round_off_value,2);
echo number_format($round_up=$net_payr-$net_pay,2);

 ?></td>
 
 </tr>
 
   <tr height="30" bgcolor="#ffffcc">
 <td></td>
 <td><strong><font size='' color="#"><strong>Net Pay</font></strong></td>
 <td align="right"><font size='+1' color="#ff0000"><strong><?php number_format($net_pay=$gross_pay-$all_deductions,2);
 
 
$number=number_format($net_payr=ceil(($net_pay) / $round_off_value) * $round_off_value,2);

number_format($round_up=$net_payr-$net_pay,2);


echo number_format($net_payr,2);
 

 ?></strong></font></td>
 
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
