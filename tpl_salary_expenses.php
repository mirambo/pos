
<tr height="30" bgcolor="#C0D7E5">
    <td width="10%" colspan="3">Salaries</td>
    
	<td width="2%"><div align="right">
  <?php 
 if ($date_from=='' && $date_to=='')
 {  
  
$sql="SELECT exp_pay_slips.payslip_no,exp_pay_slips.payslip_no,exp_pay_slips.gross_salary,exp_pay_slips.ttl_deductions,payrol_expbasic_log.curr_rate,
payrol_expbasic_log.working_days,payrol_expbasic_log.date_paid,exp_pay_slips.net_salary,exp_pay_slips.date_printed,exp_pay_slips.date_printed2,
exp_pay_slips.month_printed,employees.emp_id,employees.emp_fname,employees.emp_mname,employees.emp_lname 
FROM payrol_expbasic_log,exp_pay_slips,employees where exp_pay_slips.emp_id=employees.emp_id AND 
payrol_expbasic_log.payrol_basic_log_id=exp_pay_slips.payrol_basic_log_id ORDER BY exp_pay_slips.date_printed DESC";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
else
{
$sql="SELECT exp_pay_slips.payslip_no,exp_pay_slips.payslip_no,exp_pay_slips.gross_salary,exp_pay_slips.ttl_deductions,payrol_expbasic_log.curr_rate,
payrol_expbasic_log.working_days,payrol_expbasic_log.date_paid,exp_pay_slips.net_salary,exp_pay_slips.date_printed,exp_pay_slips.date_printed2,
exp_pay_slips.month_printed,employees.emp_id,employees.emp_fname,employees.emp_mname,employees.emp_lname 
FROM payrol_expbasic_log,exp_pay_slips,employees where exp_pay_slips.emp_id=employees.emp_id AND 
payrol_expbasic_log.payrol_basic_log_id=exp_pay_slips.payrol_basic_log_id AND exp_pay_slips.date_printed BETWEEN '$date_from' AND '$date_to' ORDER BY exp_pay_slips.date_printed DESC";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}

if (mysql_num_rows($results) > 0)
						  {
							  $RowCounter=0;
							  while ($rows=mysql_fetch_object($results))
							  { 
							  
							  $RowCounter++;
							  if($RowCounter % 2==0)

 
 $emp_id=$rows->emp_id;
number_format($rows->net_salary,2);
	 
	

 $grnd_net_sal=$grnd_net_sal+$rows->net_salary;

 }
number_format($grnd_net_sal,2);
  
  }
  
  
 // national payslips
 
 

   if ($date_from=='' && $date_to=='')
 { 
$sql2="SELECT pay_slips.payslip_no,pay_slips.payslip_no,pay_slips.gross_salary,pay_slips.ttl_deductions,payrol_basic_log.curr_rate,
payrol_basic_log.working_days,payrol_basic_log.date_paid,pay_slips.net_salary,pay_slips.date_printed,pay_slips.date_printed2,
pay_slips.month_printed,employees.emp_id,employees.emp_fname,employees.emp_mname,employees.emp_lname 
FROM payrol_basic_log,pay_slips,employees where pay_slips.emp_id=employees.emp_id AND 
payrol_basic_log.payrol_basic_log_id=pay_slips.payrol_basic_log_id ORDER BY pay_slips.date_printed DESC";
$results2= mysql_query($sql2) or die ("Error $sql2.".mysql_error());
}
else
{
$sql2="SELECT pay_slips.payslip_no,pay_slips.payslip_no,pay_slips.gross_salary,pay_slips.ttl_deductions,payrol_basic_log.curr_rate,
payrol_basic_log.working_days,payrol_basic_log.date_paid,pay_slips.net_salary,pay_slips.date_printed,pay_slips.date_printed2,
pay_slips.month_printed,employees.emp_id,employees.emp_fname,employees.emp_mname,employees.emp_lname 
FROM payrol_basic_log,pay_slips,employees where pay_slips.emp_id=employees.emp_id AND 
payrol_basic_log.payrol_basic_log_id=pay_slips.payrol_basic_log_id AND pay_slips.date_printed BETWEEN '$date_from' AND '$date_to' ORDER BY pay_slips.date_printed DESC";
$results2= mysql_query($sql2) or die ("Error $sql2.".mysql_error());


}

if (mysql_num_rows($results2) > 0)
						  {
							  $RowCounter=0;
							  while ($rows2=mysql_fetch_object($results2))
							  { 
							  
							  $RowCounter++;
							  if($RowCounter % 2==0)

 
 $emp_id=$rows2->emp_id;
 ?>
  
  <?php number_format($rows2->net_salary,2);?>
	 
	
 <?php 
 $grnd_net_sal2=$grnd_net_sal2+$rows2->net_salary;
 
 }
 
  
} 
  
 echo number_format($all_salaries=$grnd_net_sal2+$grnd_net_sal,2);
  
  
  ?>
  
  
  
  

  
  
  
  
  
</td>
    <td width="2%" colspan="2"></td>
    
</tr>