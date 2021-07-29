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
<a href="printsubspecialityssp.php" target="_blank"><img src="images/print_icon.gif" title="Print"></a> 
&nbsp; <a href="printsubspecialitysspcsv.php"><img src="images/excel.png" title="Export to Excell"></a> 
&nbsp; <a href="printsubspecialitysspword.php"><img src="images/word.png" title="Export to Word"></a></td></tr>
<tr bgcolor="#FFFFCC" height="30">
   
    <td colspan="17" height="20" align="center"> 
	<font color="#ff0000" size="+1"><strong>:::National Payroll Report In Southern Sudanese Pounds</strong></font>
	
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
								  
								  
								  $query1="select * from employees where staff_type='1' order by emp_fname asc";
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
    <td align="center" width="80"><strong><p>Exchange Rate<br/>(From USD to SSP)</p></strong></td>
	<td align="center" width="100"><strong><p>Grade</p></strong></td>
	<td align="center" width="100"><strong><p>Gross Salary</p></strong></td>
	<td align="center" width="100"><strong><p>Working Days</p></strong></td>
	<td align="center" width="100"><strong><p>Overtime Hrs<br/>(Week Days)</p></strong></td>
	<td align="center" width="100"><strong><p>Overtime Amount<br/>(Week Days) </p></strong></td>
	<td align="center" width="100"><strong><p>Overtime Hrs<br/>(Weekends)</strong></td>
	<td align="center" width="100"><strong><p>Overtime Amount<br/>(Weekends)</strong></td>
    <td width="100" align="center"><strong><p>Basic Salary</p></strong></td>
    <td width="100" align="center"><strong><p>Overtime Amount </p></strong></td>
	<td width="100" align="center"><strong><p>COLA</p></strong></td>
	<td width="100" align="center"><strong><p>Housing</p></strong></td>
	<td width="120" align="center"><strong><p>Clothing</p></strong></td>
	<td width="120" align="center"><strong><p>Other Payment</p></strong></td>
    <td width="120" align="center"><strong><p>Gross Pay</p></strong></td>
	<td width="120" align="center"><strong><p>EMP SIC(8%)</p></strong></td>
	<td width="120" align="center"><strong><p>Taxable Amount</p></strong></td>
	<td width="120" align="center"><strong><p>P.I.T.</p></strong></td>
	<td width="120" align="center"><strong><p>Total Deductions</p></strong></td>
	<td width="120" align="center"><strong><p>COM SIC(17%)</p></strong></td>
	<td width="120" align="center"><strong><p>Net Pay</p></strong></td>
	
	
	
    
    </tr>
	
	
<?php

if (!isset($_POST['generate']))
{

$sqlpayrol="SELECT employees.employee_no,employees.emp_fname,employees.emp_mname,employees.emp_lname,employees.joining_date,departments.department_name,salary_details.grade,
payrol_basic_log.emp_id,payrol_basic_log.payrol_basic_log_id,payrol_basic_log.payment_month,payrol_basic_log.basic_pay,payrol_basic_log.working_days,payrol_basic_log.overtime1,payrol_basic_log.overtime2,
payrol_basic_log.gross_pay,payrol_basic_log.taxable_income,payrol_basic_log.tax,payrol_basic_log.comp_sic_rate,
payrol_basic_log.overtime_amnt1,payrol_basic_log.otherpayment,payrol_basic_log.overtime_amnt2,payrol_basic_log.curr_rate FROM employees,payrol_basic_log,
salary_details,departments WHERE employees.department_id=departments.department_id and salary_details.emp_id=employees.emp_id AND payrol_basic_log.emp_id=employees.emp_id order by payrol_basic_log.payment_month desc , employees.employee_no asc  "; 
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
payrol_basic_log.emp_id,payrol_basic_log.payrol_basic_log_id,payrol_basic_log.payment_month,payrol_basic_log.basic_pay,payrol_basic_log.working_days,payrol_basic_log.overtime1,payrol_basic_log.overtime2,
payrol_basic_log.gross_pay,payrol_basic_log.taxable_income,payrol_basic_log.tax,payrol_basic_log.comp_sic_rate,
payrol_basic_log.overtime_amnt1,payrol_basic_log.otherpayment,payrol_basic_log.overtime_amnt2,payrol_basic_log.curr_rate FROM employees,payrol_basic_log,
salary_details,departments WHERE employees.department_id=departments.department_id and salary_details.emp_id=employees.emp_id AND payrol_basic_log.emp_id=employees.emp_id AND payrol_basic_log.date_paid BETWEEN '$date_from1' AND '$date_to1' order by payrol_basic_log.payment_month desc , employees.employee_no asc  "; 
$resultspayrol= mysql_query($sqlpayrol) or die ("Error $sqlpayrol.".mysql_error());


}
elseif ($date_from=='' && $date_to=='' && $staff!=0)
{

$sqlpayrol="SELECT employees.employee_no,employees.emp_fname,employees.emp_mname,employees.emp_lname,employees.joining_date,departments.department_name,salary_details.grade,
payrol_basic_log.emp_id,payrol_basic_log.payrol_basic_log_id,payrol_basic_log.payment_month,payrol_basic_log.basic_pay,payrol_basic_log.working_days,payrol_basic_log.overtime1,payrol_basic_log.overtime2,
payrol_basic_log.gross_pay,payrol_basic_log.taxable_income,payrol_basic_log.tax,payrol_basic_log.comp_sic_rate,
payrol_basic_log.overtime_amnt1,payrol_basic_log.otherpayment,payrol_basic_log.overtime_amnt2,payrol_basic_log.curr_rate FROM employees,payrol_basic_log,
salary_details,departments WHERE employees.department_id=departments.department_id and salary_details.emp_id=employees.emp_id AND payrol_basic_log.emp_id=employees.emp_id AND payrol_basic_log.emp_id='$staff' order by payrol_basic_log.payment_month desc , employees.employee_no asc  "; 
$resultspayrol= mysql_query($sqlpayrol) or die ("Error $sqlpayrol.".mysql_error());

}
elseif ($date_from!='' && $date_to!='' && $staff!=0)
{
$sqlpayrol="SELECT employees.employee_no,employees.emp_fname,employees.emp_mname,employees.emp_lname,employees.joining_date,departments.department_name,salary_details.grade,
payrol_basic_log.emp_id,payrol_basic_log.payrol_basic_log_id,payrol_basic_log.payment_month,payrol_basic_log.basic_pay,payrol_basic_log.working_days,payrol_basic_log.overtime1,payrol_basic_log.overtime2,
payrol_basic_log.gross_pay,payrol_basic_log.taxable_income,payrol_basic_log.tax,payrol_basic_log.comp_sic_rate,
payrol_basic_log.overtime_amnt1,payrol_basic_log.otherpayment,payrol_basic_log.overtime_amnt2,payrol_basic_log.curr_rate FROM employees,payrol_basic_log,
salary_details,departments WHERE employees.department_id=departments.department_id and salary_details.emp_id=employees.emp_id AND payrol_basic_log.emp_id=employees.emp_id AND payrol_basic_log.date_paid BETWEEN '$date_from1' AND '$date_to1' AND payrol_basic_log.emp_id='$staff' order by payrol_basic_log.payment_month desc , employees.employee_no asc  "; 
$resultspayrol= mysql_query($sqlpayrol) or die ("Error $sqlpayrol.".mysql_error());

}
else
{

$sqlpayrol="SELECT employees.employee_no,employees.emp_fname,employees.emp_mname,employees.emp_lname,employees.joining_date,departments.department_name,salary_details.grade,
payrol_basic_log.emp_id,payrol_basic_log.payrol_basic_log_id,payrol_basic_log.payment_month,payrol_basic_log.basic_pay,payrol_basic_log.working_days,payrol_basic_log.overtime1,payrol_basic_log.overtime2,
payrol_basic_log.gross_pay,payrol_basic_log.taxable_income,payrol_basic_log.tax,payrol_basic_log.comp_sic_rate,
payrol_basic_log.overtime_amnt1,payrol_basic_log.otherpayment,payrol_basic_log.overtime_amnt2,payrol_basic_log.curr_rate FROM employees,payrol_basic_log,
salary_details,departments WHERE employees.department_id=departments.department_id and salary_details.emp_id=employees.emp_id AND payrol_basic_log.emp_id=employees.emp_id order by payrol_basic_log.payment_month desc , employees.employee_no asc  "; 
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
 <td ><?php echo $rows->department_name;?></td>
 <td><?php echo $curr_rate=$rows->curr_rate;?></td>
 <td align="center"><?php echo $rows->grade;?></td>
 <td align="right"><?php echo number_format($basic_pay=$rows->basic_pay*$curr_rate,2);?></td>
<td align="center"><?php echo $working_days=$rows->working_days;?></td>
<td align="center"><?php echo $overtime1=$rows->overtime1;?></td>
<td align="right"><?php echo number_format($overtime_amnt1=$rows->overtime_amnt1*$curr_rate,2);?></td>
<td align="center"><?php echo $overtime2=$rows->overtime2;?></td>
<td align="right"><?php echo number_format($overtime_amnt2=$rows->overtime_amnt2*$curr_rate,2);?></td>
<td align="right"><strong><?php echo number_format($gross_pay=$rows->gross_pay*$curr_rate,2);?></strong></td>
<td align="right"><strong><?php 
echo number_format($ttl_over_time=$overtime_amnt1+$overtime_amnt2,2);

//echo $rows->overtime2;

?></strong></td>
<td align="right"><?php 

$emp_id=$rows->emp_id;

$payrol_basic_log=$rows->payrol_basic_log_id;

$sqlcola="SELECT * FROM benefit_log where emp_id='$emp_id' AND banefit_name LIKE '%COLA%' AND payrol_basic_log_id='$payrol_basic_log'";
$resultscola=mysql_query($sqlcola) or die ("Error $sqlcola.".mysql_error());
$rowscola=mysql_fetch_object($resultscola);
echo number_format($cola=$rowscola->benefit_amount*$curr_rate,2);


?></td>
<td align="right"><?php 


$sqlhse="SELECT * FROM benefit_log where emp_id='$emp_id' AND banefit_name LIKE '%Housing%' AND payrol_basic_log_id='$payrol_basic_log'";
$resultshse=mysql_query($sqlhse) or die ("Error $sqlhse.".mysql_error());
$rowshse=mysql_fetch_object($resultshse);
echo number_format($hse=$rowshse->benefit_amount*$curr_rate,2);


?></td>
<td align="right"><?php 


$sqlcloth="SELECT * FROM benefit_log where emp_id='$emp_id' AND banefit_name LIKE '%Cloth%' AND payrol_basic_log_id='$payrol_basic_log'";
$resultscloth=mysql_query($sqlcloth) or die ("Error $sqlcloth.".mysql_error());
$rowscloth=mysql_fetch_object($resultscloth);
echo number_format($cloth=$rowscloth->benefit_amount*$curr_rate,2);


?></td>
<td align="right"><?php echo number_format($otherpayment=$rows->otherpayment*$curr_rate,2);?></td>
<td align="right"><strong><?php 
echo number_format($ttl_gross_pay=$gross_pay+$ttl_over_time+$cola+$hse+$cloth+$otherpayment,2);

?></strong></td>
<td align="right"><?php

$emp_id=$rows->emp_id;

$sqlsic="SELECT * FROM deduction_logs where emp_id='$emp_id'";
$resultssic= mysql_query($sqlsic) or die ("Error $sqlsic.".mysql_error());
$rowssic=mysql_fetch_object($resultssic);


echo number_format($deduction_amount=$rowssic->deduction_amount*$curr_rate,2);




?></td>
<td align="right"><?php echo number_format($taxable_income=$rows->taxable_income*$curr_rate,2);?></td>
<td align="right"><?php echo number_format($tax=$rows->tax*$curr_rate,2);?></td>
<td align="right"><strong><?php echo number_format($ttl_ded=$deduction_amount+$tax,2); ?></strong></td>
<td align="right"><?php $comp_sic_rate=$rows->comp_sic_rate;

echo number_format($comp_sic=$ttl_gross_pay*$comp_sic_rate,2);



?></td>

<td align="right"><strong><font color="#ff0000"><?php echo number_format($net_pay=$ttl_gross_pay-$deduction_amount,2); ?></font></strong></td>

 
 
 
 
 
 </tr>
 
 <?php
 $grnd_basic_pay= $grnd_basic_pay+$basic_pay;
 $grnd_working_days=$grnd_working_days+$working_days;
 $grnd_overtime1=$grnd_overtime1+$overtime1;
 $grnd_overtime_amnt1=$grnd_overtime_amnt1+$overtime_amnt1;
 $grnd_overtime2=$grnd_overtime2+$overtime2;
 $grnd_overtime_amnt2=$grnd_overtime_amnt2+$overtime_amnt2;
 $grnd_gross_pay=$grnd_gross_pay+$gross_pay;
 $grnd_ttl_over_time=$grnd_ttl_over_time+$ttl_over_time;
 $grnd_cola=$grnd_cola+$cola;
 $grnd_hse=$grnd_hse+$hse;
 $grnd_cloth=$grnd_cloth+$cloth;
 $grnd_otherpayment=$grnd_otherpayment+$otherpayment;
 $grnd_ttl_gross_pay=$grnd_ttl_gross_pay+$ttl_gross_pay;
 $grnd_deduction_amount=$grnd_deduction_amount+$deduction_amount;
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
    <td align="center" width="80"><strong><p></p></strong></td>
	<td align="center" width="100"><strong></strong></td>
	<td align="right" width="100"><strong><?php echo number_format($grnd_basic_pay,2); ?></strong></td>
	<td align="center" width="100"><strong><?php echo $grnd_working_days; ?></strong></td>
	<td align="center" width="100"><strong><?php echo  $grnd_overtime1; ?></strong></td>
	<td align="right" width="100"><strong><?php echo number_format($grnd_overtime_amnt1,2); ?></strong></td>
	<td align="center" width="100"><strong><strong><?php echo  $grnd_overtime2; ?></strong></td>
	<td width="100" align="right"><strong><?php echo number_format($grnd_overtime_amnt2,2); ?></strong></td>
    <td width="100" align="right"><strong><?php echo number_format($grnd_ttl_over_time2,2); ?></strong></td>
    <td width="100" align="center"><?php //echo number_format($grnd_gross_pay,2); ?></strong></td>
	<td width="100" align="right"><strong><?php echo number_format($grnd_cola,2); ?></strong></td>
	<td width="100" align="right"><strong><?php echo number_format($grnd_hse,2); ?></strong></td>
	<td width="120" align="right"><strong><?php echo number_format($grnd_cloth,2); ?></strong></td>
	<td width="120" align="right"><strong><?php echo number_format($grnd_otherpayment,2); ?></strong></td>
    <td width="120" align="right"><strong><?php echo number_format($grnd_ttl_gross_pay,2); ?></strong></td>
	<td width="120" align="right"><strong><?php echo number_format($grnd_deduction_amount,2); ?></strong></td>
	<td width="120" align="right"><strong><?php echo number_format($grnd_taxable_income,2); ?></strong></td>
	<td width="120" align="right"><strong><?php echo number_format($grnd_tax,2); ?></strong></td>
	<td width="120" align="right"><strong><?php echo number_format($grnd_ttl_ded,2); ?></strong></td>
	<td width="120" align="right"><strong><?php echo number_format($grnd_comp_sic,2); ?></strong></td>
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



