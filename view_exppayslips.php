
<form name="filter" method="post" action=""> 			
<table width="100%" border="0">
  <tr bgcolor="#FFFFCC">
   
    <td colspan="8" height="30" align="center"> 
	<?php
	
	$invoice_no=$_GET['invoice_no'];

if ($_GET['invoice_payment_confirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:550px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Payment Received successfully for the Invoice number' ;?> <?php echo $invoice_no;?> <?php echo '</font></strong></p></div>';
?> 

<?php 

if ($_GET['deletemachcatconfirm']==1)
echo "<p align='center'><strong><font color='#FF0000'>Record Deleted!!</font></strong></p>";
?>
	
	</td>
	
    </tr>
	
   <tr style="background:url(images/description.gif);" height="30" >
    <td width="200"><div align="center"><strong>Payslip No.</strong></td>
    <td width="300"><div align="center"><strong>Month</strong></td>
	<td width="100"><div align="center"><strong>Employees Name</strong></td>
<td width="300"><div align="center"><strong>Gross Salary(USD)</strong></td>
<td width="300"><div align="center"><strong>Total Deductions(USD)</strong></td>
<td width="300"><div align="center"><strong>Net Salary(USD)</strong></td>
<td width="300"><div align="center"><strong>Print Payslip in USD</strong></td>
<td width="300"><div align="center"><strong>Print Payslip in SSP</strong></td>

    </tr>
  
  <?php 
  $user_id;
 
$sqlx="select employees.emp_id FROM users,employees WHERE users.emp_id=employees.emp_id AND users.user_id='$user_id'";
$resultsx= mysql_query($sqlx) or die ("Error $sqlx.".mysql_error());
$rowsx=mysql_fetch_object($resultsx);

$emp_id=$rowsx->emp_id;
  
  
 if ($user_group_id==2)
 { 
  
$sql="SELECT exp_pay_slips.payslip_no,exp_pay_slips.payslip_no,exp_pay_slips.gross_salary,exp_pay_slips.ttl_deductions,payrol_expbasic_log.curr_rate,
payrol_expbasic_log.working_days,payrol_expbasic_log.date_paid,exp_pay_slips.net_salary,exp_pay_slips.date_printed,exp_pay_slips.date_printed2,
exp_pay_slips.month_printed,employees.emp_id,employees.emp_fname,employees.emp_mname,employees.emp_lname 
FROM payrol_expbasic_log,exp_pay_slips,employees where exp_pay_slips.emp_id=employees.emp_id AND 
payrol_expbasic_log.payrol_basic_log_id=exp_pay_slips.payrol_basic_log_id and employees.emp_id='$emp_id' ORDER BY exp_pay_slips.date_printed DESC";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
else
{
$sql="SELECT exp_pay_slips.payslip_no,exp_pay_slips.payslip_no,exp_pay_slips.gross_salary,exp_pay_slips.ttl_deductions,payrol_expbasic_log.curr_rate,
payrol_expbasic_log.working_days,payrol_expbasic_log.date_paid,exp_pay_slips.net_salary,exp_pay_slips.date_printed,exp_pay_slips.date_printed2,
exp_pay_slips.month_printed,employees.emp_id,employees.emp_fname,employees.emp_mname,employees.emp_lname 
FROM payrol_expbasic_log,exp_pay_slips,employees where exp_pay_slips.emp_id=employees.emp_id AND 
payrol_expbasic_log.payrol_basic_log_id=exp_pay_slips.payrol_basic_log_id ORDER BY exp_pay_slips.date_printed DESC";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}

if (mysql_num_rows($results) > 0)
						  {
							  $RowCounter=0;
							  while ($rows=mysql_fetch_object($results))
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
  
    <td><?php echo $slip_no=$rows->payslip_no;?></a></td>
    <td><?php echo $rows->month_printed;?></td>
	<td><?php echo $rows->emp_fname.' '.$rows->emp_mname.' '.$rows->emp_lname;?></td>
	<td align="right"><?php echo number_format($rows->gross_salary,2);?></td>
	<td align="right"><?php echo number_format($rows->ttl_deductions,2);?></td>
	<td align="right"><?php echo number_format($rows->net_salary,2);?></td>
	 <td width="200"><div align="center"><a href="print_exppayslip.php?emp_id=<?php echo $emp_id; ?>&slip_no=<? echo $slip_no?>&date_gen=<?php 
	echo $rows->date_paid;?>&month_gen=<?php echo $rows->month_printed;?>&working_days=<?php echo $rows->working_days; ?>" target="_blank">Print PaySlip in USD</a></td>
	<td width="200"><div align="center"><a href="print_exppayslipssp.php?emp_id=<?php echo $emp_id; ?>&slip_no=<? echo $slip_no?>&date_gen=<?php 
	echo $rows->date_paid;?>&month_gen=<?php echo $rows->month_printed;?>&curr_rate=<?php echo $rows->curr_rate;?>&working_days=<?php echo $rows->working_days; ?>" target="_blank">Print PaySlip in SSP</a></td>
    </tr>
	
 <?php 
 $grnd_net_sal=$grnd_net_sal+$rows->net_salary;
 $grnd_gross_sal=$grnd_gross_sal+$rows->gross_salary;
 $grnd_ded=$grnd_ded+$rows->ttl_deductions;
 }
 
 ?>
 
   <tr height="30" bgcolor="#FFFFCC">
    <td width="200"><div align="center"><strong></strong></td>
    <td width="300"><div align="center"><strong></strong></td>
	<td width="300"><div align="center"><strong>Grand Total</strong></td>
	<td width="200"><div align="right"><strong><?php 
	echo number_format($grnd_gross_sal,2);
	
	
	?></td>
	
	<td width="200"><div align="right"><strong><?php 
	echo number_format($grnd_ded,2);
	
	
	
	
	
	
	?></td>
	<td width="200"><div align="right"><strong><font size="+1" color="#ff0000"><?php 
	echo number_format($grnd_net_sal,2);
	
	
	?></font></strong></td>
	<td width="200"><div align="center"><strong></strong></td>
	<td width="200"><div align="center"><strong></strong></td>

    </tr>
  <?php
  
} 
  else
  {
  
  ?>
  
  
  <tr bgcolor="#FFFFCC">
   
    <td colspan="9" height="30" align="center"> 
	<font color="#ff0000">No Results found!!</font>
	
	</td>
	
    </tr>
	
	<?
  
  }
  ?>
</table>
</form>



