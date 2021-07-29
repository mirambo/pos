<?php 
include ('includes/session.php');
include('Connections/fundmaster.php');
?>
<title>SIPET South Sudan - Information Management System</title>
<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>
<script type="text/javascript" src="calender/calendar.js"></script>
<script type="text/javascript" src="calender/lang/calendar-en.js"></script>
<script type="text/javascript" src="calender/calendar-setup.js"></script>
<link rel="stylesheet" href="csspr.css" type="text/css" />

<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>

<style type="text/css">

@import url(calender/calendar-win2k-1.css);

</style>

<style type="text/css">
.table
{
border-collapse:collapse;
}
.table td, tr
{
border:1px solid black;
padding:3px;
}
</style>


<body onload="window.print();">
<table width="100%" border="0">

<tr height="40"> <td colspan="24" align="center"><img src="<?php echo $base_url; ?>images/logoeaco.jpg"></td></tr>
<tr height="40"> <td colspan="24" align="center"><H2>SIPET ENGINEERING & CONSULTANCY SERVICES CO. LIMITED</H2></td></tr>

<tr height="40"> <td colspan="24" align="center"><H2>General Expertriate Payroll Report In South Sudanese Pounds</H2></td></tr>







 <tr  style="background:url(images/description.gif);" height="30">
    <tr  style="background:url(images/description.gif);" height="30">
    <td align="center" width="30%"><strong><p>Staff Name</p></strong></td>
    <td align="center" width="30%"><strong><p>Month</p></strong></td>
    <td align="center" width="30%"><strong><p>Staff No</p></strong></td>
    <td align="center" width="180"><strong><p>Dept./Project</p></strong></td>
    <td align="center" width="80"><strong><p>Exchange Rate<br/>(From USD to SSP)</p></strong></td>
	<td align="center" width="100"><strong><p>Grade</p></strong></td>
	<td align="center" width="100"><strong><p>Net Pay Standard(SSP)</p></strong></td>
	<td align="center" width="100"><strong><p>Working Days</p></strong></td>
	<td align="center" width="100"><strong><p>Vacation Days</strong></td>
	<td align="center" width="100"><strong><p>Vacation Amount</strong></td>
	<td align="center" width="100"><strong><p>Overtime(Hrs)<br/></p></strong></td>
	<td align="center" width="100"><strong><p>Overtime Amount(SSP)</p></strong></td>	
    <td width="100" align="center"><strong><p>Basic Salary (SSP)</p></strong></td>
    <td width="100" align="center"><strong><p>Safety Allowance(SSP)</p></strong></td>
	<td width="100" align="center"><strong><p>Regional Allowance(SSP)</p></strong></td>
	<!--<td width="100" align="center"><strong><p>Housing</p></strong></td>
	<td width="120" align="center"><strong><p>Clothing</p></strong></td>-->
	<td width="120" align="center"><strong><p>Other Payment (SSP)</p></strong></td>
    <td width="120" align="center"><strong><p>Gross Pay (SSP)</p></strong></td>
	<td width="120" align="center"><strong><p>Other Deductions</p></strong></td>
	<!--<td width="120" align="center"><strong><p>COM SIC(17%)</p></strong></td>-->
	<td width="120" align="center"><strong><p>Income Tax Rate(%)</p></strong></td>
	<td width="120" align="center"><strong><p>Income Tax</p></strong></td>
	<td width="120" align="center"><strong><p>Total Deductions</p></strong></td>	
	<td width="120" align="center"><strong><p>Net Pay</p></strong></td>
	
	
	
    
    </tr>
	
	
	


<?php
if (!isset($_POST['generate']))
{
$sqlpayrol="SELECT employees.employee_no,employees.emp_fname,employees.emp_mname,employees.emp_lname,employees.joining_date,departments.department_name,salary_details.grade,
payrol_expbasic_log.emp_id,payrol_expbasic_log.payrol_basic_log_id,payrol_expbasic_log.payment_month,payrol_expbasic_log.net_pay_stnd,payrol_expbasic_log.working_days,payrol_expbasic_log.overtime1,
payrol_expbasic_log.basic_salary,payrol_expbasic_log.tax,payrol_expbasic_log.tax_percentage,payrol_expbasic_log.vacation_days,payrol_expbasic_log.safety_allowance,payrol_expbasic_log.regional_allowance,
payrol_expbasic_log.overtime_amnt1,payrol_expbasic_log.otherpayment,payrol_expbasic_log.other_deductions,payrol_expbasic_log.vacation_amount,payrol_expbasic_log.curr_rate FROM employees,payrol_expbasic_log,
salary_details,departments WHERE employees.department_id=departments.department_id and salary_details.emp_id=employees.emp_id AND payrol_expbasic_log.emp_id=employees.emp_id order by payrol_expbasic_log.payment_month desc , employees.employee_no asc  "; 
$resultspayrol= mysql_query($sqlpayrol) or die ("Error $sqlpayrol.".mysql_error());
}
else
{
$staff=$_POST['staff'];
$date_from=$_POST['date_from'];
$date_to=$_POST['date_to'];
$old_date_from = strtotime($date_from);
$old_date_to = strtotime($date_to);
$date_from1 = date('Y-m-d', $old_date_from); 
$date_to1 = date('Y-m-d', $old_date_to);

if ($date_from!='' && $date_to!='' && $staff==0)
{
$sqlpayrol="SELECT employees.employee_no,employees.emp_fname,employees.emp_mname,employees.emp_lname,employees.joining_date,departments.department_name,salary_details.grade,
payrol_expbasic_log.emp_id,payrol_expbasic_log.payrol_basic_log_id,payrol_expbasic_log.payment_month,payrol_expbasic_log.net_pay_stnd,payrol_expbasic_log.working_days,payrol_expbasic_log.overtime1,
payrol_expbasic_log.basic_salary,payrol_expbasic_log.tax,payrol_expbasic_log.tax_percentage,payrol_expbasic_log.vacation_days,payrol_expbasic_log.safety_allowance,payrol_expbasic_log.regional_allowance,
payrol_expbasic_log.overtime_amnt1,payrol_expbasic_log.otherpayment,payrol_expbasic_log.other_deductions,payrol_expbasic_log.vacation_amount,payrol_expbasic_log.curr_rate FROM employees,payrol_expbasic_log,
salary_details,departments WHERE employees.department_id=departments.department_id and salary_details.emp_id=employees.emp_id AND payrol_expbasic_log.emp_id=employees.emp_id AND payrol_expbasic_log.date_paid BETWEEN '$date_from1' AND '$date_to1' order by payrol_expbasic_log.payment_month desc , employees.employee_no asc  "; 
$resultspayrol= mysql_query($sqlpayrol) or die ("Error $sqlpayrol.".mysql_error());

}
elseif ($date_from=='' && $date_to=='' && $staff!=0)
{
$sqlpayrol="SELECT employees.employee_no,employees.emp_fname,employees.emp_mname,employees.emp_lname,employees.joining_date,departments.department_name,salary_details.grade,
payrol_expbasic_log.emp_id,payrol_expbasic_log.payrol_basic_log_id,payrol_expbasic_log.payment_month,payrol_expbasic_log.net_pay_stnd,payrol_expbasic_log.working_days,payrol_expbasic_log.overtime1,
payrol_expbasic_log.basic_salary,payrol_expbasic_log.tax,payrol_expbasic_log.tax_percentage,payrol_expbasic_log.vacation_days,payrol_expbasic_log.safety_allowance,payrol_expbasic_log.regional_allowance,
payrol_expbasic_log.overtime_amnt1,payrol_expbasic_log.otherpayment,payrol_expbasic_log.other_deductions,payrol_expbasic_log.vacation_amount,payrol_expbasic_log.curr_rate FROM employees,payrol_expbasic_log,
salary_details,departments WHERE employees.department_id=departments.department_id and salary_details.emp_id=employees.emp_id AND payrol_expbasic_log.emp_id=employees.emp_id AND payrol_expbasic_log.emp_id='$staff' order by payrol_expbasic_log.payment_month desc , employees.employee_no asc  "; 
$resultspayrol= mysql_query($sqlpayrol) or die ("Error $sqlpayrol.".mysql_error());

}
elseif ($date_from!='' && $date_to!='' && $staff!=0)
{
$sqlpayrol="SELECT employees.employee_no,employees.emp_fname,employees.emp_mname,employees.emp_lname,employees.joining_date,departments.department_name,salary_details.grade,
payrol_expbasic_log.emp_id,payrol_expbasic_log.payrol_basic_log_id,payrol_expbasic_log.payment_month,payrol_expbasic_log.net_pay_stnd,payrol_expbasic_log.working_days,payrol_expbasic_log.overtime1,
payrol_expbasic_log.basic_salary,payrol_expbasic_log.tax,payrol_expbasic_log.tax_percentage,payrol_expbasic_log.vacation_days,payrol_expbasic_log.safety_allowance,payrol_expbasic_log.regional_allowance,
payrol_expbasic_log.overtime_amnt1,payrol_expbasic_log.otherpayment,payrol_expbasic_log.other_deductions,payrol_expbasic_log.vacation_amount,payrol_expbasic_log.curr_rate FROM employees,payrol_expbasic_log,
salary_details,departments WHERE employees.department_id=departments.department_id and salary_details.emp_id=employees.emp_id AND payrol_expbasic_log.emp_id=employees.emp_id AND payrol_expbasic_log.date_paid BETWEEN '$date_from1' AND '$date_to1' AND payrol_expbasic_log.emp_id='$staff' order by payrol_expbasic_log.payment_month desc , employees.employee_no asc  "; 
$resultspayrol= mysql_query($sqlpayrol) or die ("Error $sqlpayrol.".mysql_error());


}
else
{
$sqlpayrol="SELECT employees.employee_no,employees.emp_fname,employees.emp_mname,employees.emp_lname,employees.joining_date,departments.department_name,salary_details.grade,
payrol_expbasic_log.emp_id,payrol_expbasic_log.payrol_basic_log_id,payrol_expbasic_log.payment_month,payrol_expbasic_log.net_pay_stnd,payrol_expbasic_log.working_days,payrol_expbasic_log.overtime1,
payrol_expbasic_log.basic_salary,payrol_expbasic_log.tax,payrol_expbasic_log.tax_percentage,payrol_expbasic_log.vacation_days,payrol_expbasic_log.safety_allowance,payrol_expbasic_log.regional_allowance,
payrol_expbasic_log.overtime_amnt1,payrol_expbasic_log.otherpayment,payrol_expbasic_log.other_deductions,payrol_expbasic_log.vacation_amount,payrol_expbasic_log.curr_rate FROM employees,payrol_expbasic_log,
salary_details,departments WHERE employees.department_id=departments.department_id and salary_details.emp_id=employees.emp_id AND payrol_expbasic_log.emp_id=employees.emp_id order by payrol_expbasic_log.payment_month desc , employees.employee_no asc  "; 
$resultspayrol= mysql_query($sqlpayrol) or die ("Error $sqlpayrol.".mysql_error());


}


}
if (mysql_num_rows($resultspayrol) > 0)
						  {
							  $RowCounter=0;
							  while ($rows=mysql_fetch_object($resultspayrol))
							  { 
							  
							  $RowCounter++;
							  if($RowCounter % 2==0)
{
echo '<tr bgcolor="#C0D7E5" height="25">';
}
else 
{
echo '<tr bgcolor="#FFFFCC" height="25" >';
}
 
 $emp_id=$rows->emp_id;
 ?>
	 
 <td><?php echo $rows->emp_fname.' '.$rows->emp_mname.' '.$rows->emp_lname;?></td> 
 <td><?php echo $rows->payment_month;?></td>
 <td><?php echo $rows->employee_no;?></td>
 <td align="left"><?php echo $rows->department_name;?></td>
 <td align="right"><?php echo $curr_rate=$rows->curr_rate;?></td>
 <td align="center"><?php echo $rows->grade;?></td>
 <td align="right"><?php echo number_format($basic_pay=$rows->net_pay_stnd*$curr_rate,2);?></td>
<td align="center"><?php echo $working_days=$rows->working_days;?></td>
<td align="center"><?php echo $vacation_days=$rows->vacation_days;?></td>
<td align="right"><?php echo number_format($vacation_amount=$rows->vacation_amount*$curr_rate,2);?></td>
<td align="center"><?php echo $overtime1=$rows->overtime1;?></td>
<td align="right"><?php echo number_format($overtime_amnt1=$rows->overtime_amnt1*$curr_rate,2);?></td>
<td align="right"><?php echo number_format($basic_salary=$rows->basic_salary*$curr_rate,2);?></td>
<td align="right"><?php echo number_format($safety_allowance=$rows->safety_allowance*$curr_rate,2);?></td>
<td align="right"><?php echo number_format($regional_allowance=$rows->regional_allowance*$curr_rate,2);?></td>
<td align="right"><?php echo number_format($otherpayment=$rows->otherpayment*$curr_rate,2);?></td>

<td align="right"><strong><?php echo number_format($ttl_gross_pay=$basic_salary+$vacation_amount+$overtime_amnt1+$safety_allowance+$regional_allowance+$otherpayment,2);?><strong></td>
<td align="right"><?php echo number_format($other_deductions=$rows->other_deductions*$curr_rate,2);?></td>
<td align="right"><?php echo number_format($tax_percentage=$rows->tax_percentage*$curr_rate,2);?></td>
<td align="right"><?php echo number_format($tax=$rows->tax*$curr_rate,2);?></td>
<td align="right"><strong><?php echo number_format($ttl_ded=$other_deductions*$curr_rate+$tax,2);?></strong></td>


<td align="right"><strong><font color="#ff0000"><?php echo number_format($net_pay=$ttl_gross_pay-$ttl_ded,2); ?></font></strong></td>

 
 
 
 
 
 </tr>
 
 <?php
 $grnd_basic_pay= $grnd_basic_pay+$basic_pay;
 $grnd_working_days=$grnd_working_days+$working_days;
 $grnd_overtime1=$grnd_overtime1+$overtime1;
 $grnd_overtime_amnt1=$grnd_overtime_amnt1+$overtime_amnt1;
 $grnd_vacation_days=$grnd_vacation_days+$vacation_days;
 $grnd_vacation_amount=$grnd_vacation_amount+$vacation_amount;
 $grnd_basic_salary=$grnd_basic_salary+$basic_salary;
 $grnd_ttl_over_time=$grnd_ttl_over_time+$ttl_over_time;
 $grnd_safety_allowance=$grnd_safety_allowance+$safety_allowance;
 $grnd_regional_allowance=$grnd_regional_allowance+$regional_allowance;
 $grnd_otherpayment=$grnd_otherpayment+$otherpayment;
 //$grnd_otherpayment=$grnd_otherpayment+$otherpayment;
 $grnd_ttl_gross_pay=$grnd_ttl_gross_pay+$ttl_gross_pay;
 $grnd_other_deductions=$grnd_other_deductions+$other_deductions;
 $grnd_taxable_income=$grnd_taxable_income+$taxable_income;
 $grnd_tax=$grnd_tax+$tax;
 $grnd_ttl_ded=$grnd_ttl_ded+$ttl_ded;
 $grnd_comp_sic=$grnd_comp_sic+$comp_sic;
 $grnd_net_pay=$grnd_net_pay+$net_pay;
 }
 
 
 
 
 ?>
 <tr  height="20">
    <td align="center" width="30%"><strong>Grand Totals</strong></td>
    <td align="center" width="30%"><strong></strong></td>
    <td align="center" width="30%"><strong></strong></td>
    <td align="center" width="180"><strong></strong></td>
    <td align="center" width="180"><strong></strong></td>
    <!--<td align="center" width="80"><strong><p>Joinning Date</p></strong></td>-->
	<td align="center" width="100"><strong></strong></td>
	<td align="right" width="100"><strong><?php echo number_format($grnd_basic_pay,2); ?></strong></td>
	<td align="center" width="100"><strong><?php echo $grnd_working_days; ?></strong></td>
	<td align="center" width="100"><strong><?php echo  $grnd_vacation_days; ?></strong></td>
	<td align="right" width="100"><strong><?php echo number_format($grnd_vacation_amount,2); ?></strong></td>
	<td align="center" width="100"><strong><strong><?php echo $grnd_overtime1; ?></strong></td>
	<td width="100" align="right"><strong><?php echo number_format( $grnd_overtime_amnt1,2); ?></strong></td>
    <!--<td width="100" align="right"><strong><?php echo number_format($grnd_basic_salary,2); ?></strong></td>-->
    <td width="100" align="right"><strong><?php echo number_format($grnd_basic_salary,2); ?><strong></strong></td>
	<td width="100" align="right"><strong><?php echo number_format($grnd_safety_allowance,2); ?></strong></td>
	<td width="100" align="right"><strong><?php echo number_format($grnd_regional_allowance,2); ?></strong></td>
	<!--<td width="120" align="right"><strong><?php echo number_format($grnd_otherpayment,2); ?></strong></td>-->
	<td width="120" align="right"><strong><?php echo number_format($grnd_otherpayment,2); ?></strong></td>
    <td width="120" align="right"><strong><?php echo number_format($grnd_ttl_gross_pay,2); ?></strong></td>
	<td width="120" align="right"><strong><?php echo number_format($grnd_other_deductions,2); ?></strong></td>

	<td width="120" align="right"><strong><?php //echo number_format($grnd_tax,2); ?></strong></td>
	<td width="120" align="right"><strong><?php echo number_format($grnd_tax,2); ?></strong></td>
	<td width="120" align="right"><strong><?php echo number_format($grnd_ttl_ded,2); ?></strong></td>
	<td width="120" align="center"><font size="+1" color="#ff0000"><strong><?php echo number_format($grnd_net_pay,2); ?></strong></font></td>
	
	
	
    
    </tr>
 
 <?php 

 }


 ?>

</table>
</div>
<SCRIPT src="js/superTables.js" 
type=text/javascript></SCRIPT>

<SCRIPT type=text/javascript>
//<![CDATA[

(function() {
	var mySt = new superTable("demoTable", {
		cssSkin : "sSky",
		fixedCols : 1,
		headerRows : 1,
		onStart : function () {
			this.start = new Date();
		},
		onFinish : function () {
			document.getElementById("testDiv").innerHTML += "Finished...<br>" + ((new Date()) - this.start) + "ms.<br>";
		}
	});
})();

//]]>
</SCRIPT>
</form>