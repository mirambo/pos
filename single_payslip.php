<?php 
$payroll_code_id=$rowsr->payroll_code_id;
$current_month=$p_month;
$sqlemp_det="SELECT *,hs_hr_employee.employee_id as emp_num FROM payroll_code,hs_hr_employee where 
payroll_code.employee_id=hs_hr_employee.emp_number AND payroll_code.payroll_code_id='$payroll_code_id'";
$resultsemp_det= mysql_query($sqlemp_det) or die ("Error $sqlemp_det.".mysql_error());
$rowsemp_det=mysql_fetch_object($resultsemp_det);

$payroll_type=$rowsemp_det->payroll_type;

?>
<div style="width:100%">
<div style="float:left;" style="width:100%; font-size:12px; font-weight:bold;"><strong><?php echo $rowscont->cont_person; ?></strong></div>
</br>
<div style="float:left;" style="width:100%; font-size:12px; font-weight:bold;"><strong>PAYSLIP</strong></div>

<div style="float:right;" style="width:100%; font-size:12px; font-weight:bold;"><strong>Month</strong>: <?php echo $rowsemp_det->payroll_month.', '.$rowsemp_det->payroll_year; ?></div></br>
<div style="float:left;" style="width:100%; font-size:12px; font-weight:bold;"><strong>Name : </strong><?php echo $rowsemp_det->emp_firstname.' '.$rowsemp_det->emp_middle_name.' '.$rowsemp_det->emp_lastname;  ?></div></br>
<div style="float:left;" style="width:100%; font-size:12px; font-weight:bold;"><strong>Employee No : </strong><?php echo $rowsemp_det->emp_num; ?></div></br>
<div style="float:left;" style="width:100%; font-size:12px; font-weight:bold;"><strong>Slip No : </strong><?php echo $rowsemp_det->payroll_no; ?></div>
</br>

<hr/>
<div style="float:;" style="width:100%; font-size:12px; font-weight:bold;"><strong>Basic Salary: </strong><span style="float:right;"><?php echo number_format($basic_pay=$rowsemp_det->basic_pay,2); ?></span></div></br>
<div style="float:left;" style="width:100%; font-size:12px; font-weight:bold;"><strong>Allowances and Bonus:</strong></div></br></br>
<div style="float:;" style="width:100%; font-size:12px; font-weight:bold;">Overtime : </strong><span style="float:right;"><?php 

$normal_ot_amount=$rowsemp_det->normal_ot_amount;

$holiday_ot_amount=$rowsemp_det->holiday_ot_amount;

echo number_format($ttl_ot=$normal_ot_amount+$holiday_ot_amount,2); ?></span></div></br>

<?php 

$ttl_benefits=0;
$sql="select * from benefit_logs,benefits where benefits.benefit_log_id=benefit_logs.benefit_log_id 
AND benefits.payroll_code_id='$payroll_code_id' order by sort_order";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


if (mysql_num_rows($results) > 0)
						  {
							  
							  while ($rows=mysql_fetch_object($results))
							  {
 
 
 $benefit_log_id=$rows->benefit_log_id;
 ?>
 <div style="float:;" style="width:100%; font-size:12px; font-weight:bold;"><?php echo $rows->benefit_log_name; ?> :<span style="float:right;"><?php echo number_format($benefit_amount=$rows->benefit_amount,2); 
 
 $ttl_benefits=$ttl_benefits+$benefit_amount+$ttl_ot;
 
 
 
 ?></span></div></br>

 <?php 
 
							  }
						  }
 
 ?>
</div>

<div style="float:;" style="width:100%; font-size:12px; font-weight:bold;"><strong>Total Allowances : </strong><span style="float:right; text-decoration-line: underline;  text-decoration-style: double;"><?php echo number_format($ttl_benefits,2); ?></span></div></br>
<div style="float:;" style="width:100%; font-size:12px; font-weight:bold;"><strong>Gross Pay : </strong><span style="float:right;"><span style="text-decoration-line: underline;
  text-decoration-style: double; font-weight:bold;font-size:12px;"><?php echo number_format($gross_pay=$basic_pay+$ttl_benefits,2); ?></span></div>
</br>
<div style="float:left;" style="width:100%; font-size:12px; font-weight:bold;"><strong>Deductions</strong></div></br></br>
<div style="float:;" style="width:100%; font-size:12px; font-weight:bold;">N.S.S.F : <span style="float:right;"><?php echo number_format($nssf_amount=$rowsemp_det->staff_nssf_amount,2); ?></span></div></br>
<div style="float:;" style="width:100%; font-size:12px; font-weight:bold;">N.H.I.F : <span style="float:right;"><?php echo number_format($nhif_amount=$rowsemp_det->nhif_amount,2); ?></span></div></br>
<div style="float:;" style="width:100%; font-size:12px; font-weight:bold;">P.A.Y.E : <span style="float:right;"><?php echo number_format($payee_amount=$rowsemp_det->paye_amount,2); ?></span></div></br>
<?php 
if ($payroll_type=='S')
{

?>
<div style="float:;" style="width:100%; font-size:12px; font-weight:bold;">Absentism : <span style="float:right;"><?php echo number_format($days_absent_amount=$rowsemp_det->days_absent_amount,2); ?></span></div></br>

<?php 

}
else
{
	
	
}

$ttl_deductions=0;
$sqld="select * from deduction_logs,deductions WHERE deductions.deduction_log_id=deduction_logs.deduction_log_id 
and deductions.payroll_code_id='$payroll_code_id' order by sort_order";
$resultsd= mysql_query($sqld) or die ("Error $sqld.".mysql_error());


if (mysql_num_rows($resultsd) > 0)
						  {
							  
							  while ($rowsd=mysql_fetch_object($resultsd))
							  {
 
 
 $deduction_log_id=$rowsd->deduction_log_id;
 ?>
 <div style="float:;" style="width:100%; font-size:12px; font-weight:bold;"><?php echo $rowsd->deduction_log_name; ?> :<span style="float:right;"><?php echo number_format($deduction_amount=$rowsd->deduction_amount,2); 
 
  $ttl_deductions=$ttl_deductions+$deduction_amount;
 
 
 
 ?></span></div></br>

 <?php 
 
							  }
							  
						  }
 
 ?>
<div style="float:;" style="width:100%; font-size:12px; font-weight:bold;"><strong>Total Deductions : </strong><span style="float:right; text-decoration-line: underline;  text-decoration-style: double;"><?php echo number_format($all_deductions=$ttl_deductions+$nssf_amount+$nhif_amount+$payee_amount+$days_absent_amount,2); ?></span></div></br>
<div style="float:;" style="width:100%; font-size:12px; font-weight:bold;"><strong>NET SALARY : </strong><span style="float:right;"><span style="text-decoration-line: underline;
  text-decoration-style: double; font-weight:bold;font-size:13px;"><?php echo number_format($net_pay=$gross_pay-$all_deductions,2); ?></span></div></br>


