<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>
<script type="text/javascript" src="calender/calendar.js"></script>
<script type="text/javascript" src="calender/lang/calendar-en.js"></script>
<script type="text/javascript" src="calender/calendar-setup.js"></script>
<script language="javascript" type="text/javascript" src="datetimepicker.js"></script>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/superTables.css" rel="stylesheet" type="text/css" />

<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>

<style type="text/css">

p
{
margin-right:10px;
margin-left:10px;
font-size:11px;


}

@import url(calender/calendar-win2k-1.css);

</style>
<script type="text/javascript"> 

function confirmDelete()
{
    return confirm("Are you sure want to delete?");
}

</script>
<form name="emp" action="" method="post">
<table width="100%">
<tr bgcolor="#FFFFCC"><td colspan="17" align="right">
<a href="printsubspeciality2.php" target="_blank"><img src="images/print_icon.gif" title="Print"></a> 
&nbsp; <a href="printsubspecialitycsv2.php"><img src="images/excel.png" title="Export to Excell"></a> 
&nbsp; <a href="printsubspecialityword2.php"><img src="images/word.png" title="Export to Word"></a></td></tr>
<tr bgcolor="#FFFFCC" height="30">
   
    <td colspan="17" height="20" align="center"> 
	<font color="#ff0000" size="+1"><strong>:::Expertriate Payroll Report In US Dollars</strong></font>
	
	</td></tr>
	<tr height="30" bgcolor="#FFFFCC">
    <td bgcolor="" width="20%" colspan="17" align="center">
   <strong>Date
    From</strong>
    
    <!--<input type="text" name="date_from" size="10" id="date_from" readonly="readonly" /><input name="DateFormats" id="DateFormats" disabled value="dd/mm/yyyy" type="hidden">-->
	<input id="date_from" type="text" size="30" name="date_from"><a href="javascript:NewCal('date_from','ddmmyyyy')"><img src="images/calendar.gif" width="16" height="16" border="0" alt="Pick a date"></a>
    <strong>To</strong>
    <!--<input type="text" name="date_to" size="10" id="date_to" readonly="readonly" /><input name="DateFormats" id="DateFormats" disabled value="dd/mm/yyyy" type="hidden">-->
	<input id="date_to" type="text" size="30" name="date_to" ><a href="javascript:NewCal('date_to','ddmmyyyy')"><img src="images/calendar.gif" width="16" height="16" border="0" alt="Pick a date"></a>
	<strong>
	
	Or By Staff
	<select name="staff">
	<option value="0">Select........................................................</option>
								  <?php
								  
								  
								  $query1="select * from employees where staff_type='2' order by emp_fname asc";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->emp_id; ?>"><?php echo $rows1->emp_fname.' '.$rows1->emp_mname.' '.$rows1->emp_lname; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }






							
								  
								  ?>
								  
								  </select> <input type="submit" name="generate" value="Generate">
	</td>
  </tr>
</table>
<DIV class=fakeContainer>
<table width="100%" border="0" class=demoTable id=demoTable>
  <tr  style="background:url(images/description.gif);" height="30">
    <td align="center" width="30%"><strong><p>Staff Name</p></strong></td>
    <td align="center" width="30%"><strong><p>Month</p></strong></td>
    <td align="center" width="30%"><strong><p>Staff No</p></strong></td>
    <td align="center" width="180"><strong><p>Dept./Project</p></strong></td>
    <!--<td align="center" width="80"><strong><p>Joinning Date</p></strong></td>-->
	<td align="center" width="100"><strong><p>Grade</p></strong></td>
	<td align="center" width="100"><strong><p>Net Pay Standard(USD)</p></strong></td>
	<td align="center" width="100"><strong><p>Working Days</p></strong></td>
	<td align="center" width="100"><strong><p>Vacation Days</strong></td>
	<td align="center" width="100"><strong><p>Vacation Amount</strong></td>
	<td align="center" width="100"><strong><p>Overtime(Hrs)<br/></p></strong></td>
	<td align="center" width="100"><strong><p>Overtime Amount(USD)</p></strong></td>	
    <td width="100" align="center"><strong><p>Basic Salary (USD)</p></strong></td>
    <td width="100" align="center"><strong><p>Safety Allowance(USD)</p></strong></td>
	<td width="100" align="center"><strong><p>Regional Allowance(USD)</p></strong></td>
	<!--<td width="100" align="center"><strong><p>Housing</p></strong></td>
	<td width="120" align="center"><strong><p>Clothing</p></strong></td>-->
	<td width="120" align="center"><strong><p>Other Payment (USD)</p></strong></td>
    <td width="120" align="center"><strong><p>Gross Pay (USD)</p></strong></td>
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
 <!--<td><?php echo $rows->joining_date;?></td-->
 <td align="center"><?php echo $rows->grade;?></td>
 <td align="right"><?php echo number_format($basic_pay=$rows->net_pay_stnd,2);?></td>
<td align="center"><?php echo $working_days=$rows->working_days;?></td>
<td align="center"><?php echo $vacation_days=$rows->vacation_days;?></td>
<td align="right"><?php echo number_format($vacation_amount=$rows->vacation_amount,2);?></td>
<td align="center"><?php echo $overtime1=$rows->overtime1;?></td>
<td align="right"><?php echo number_format($overtime_amnt1=$rows->overtime_amnt1,2);?></td>
<td align="right"><?php echo number_format($basic_salary=$rows->basic_salary,2);?></td>
<td align="right"><?php echo number_format($safety_allowance=$rows->safety_allowance,2);?></td>
<td align="right"><?php echo number_format($regional_allowance=$rows->regional_allowance,2);?></td>
<td align="right"><?php echo number_format($otherpayment=$rows->otherpayment,2);?></td>

<td align="right"><strong><?php echo number_format($ttl_gross_pay=$basic_salary+$vacation_amount+$overtime_amnt1+$safety_allowance+$regional_allowance+$otherpayment,2);?><strong></td>
<td align="right"><?php echo number_format($other_deductions=$rows->other_deductions,2);?></td>
<td align="right"><?php echo number_format($tax_percentage=$rows->tax_percentage,2);?></td>
<td align="right"><?php echo number_format($tax=$rows->tax,2);?></td>
<td align="right"><strong><?php echo number_format($ttl_ded=$other_deductions+$tax,2);?></strong></td>


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



