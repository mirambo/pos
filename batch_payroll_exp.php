<?php
#include connection
 include ('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form


//$current_month=mysql_real_escape_string($_POST['date_month']);	
$current_month=(Date("F Y"));	



$sql="select employees.emp_id,salary_details.gross_pay from employees, salary_details where employees.emp_id=salary_details.emp_id AND employees.staff_type='2'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
$num_rows=mysql_num_rows($results);



if ($num_rows=mysql_num_rows($results) > 0)
						  {
							  while ($rows=mysql_fetch_object($results))
							  { ?>
							  
						<tr>
							 
							 <td><?php 
							 
							 $net_pay=$rows->gross_pay;
							 $emp_id=$rows->emp_id; 
							$curr_rate=2.9995;
							//$current_month=mysql_real_escape_string($_POST['date_month']);
							$current_month=(Date("F Y"));
							$basic_salary=0.5*$net_pay;
							//$working_days=mysql_real_escape_string($_POST['working_days']);
							$working_days=30;
							//$vacation_days=mysql_real_escape_string($_POST['vacation_days']);
							$vacation_days=13;
							//calculation of vacation salary

							if ($working_days==30 || $working_days==31)
							{
							$vacation_amount=0;
							}

							else
							{
							$vacation_amount=(0.5*$vacation_days*$net_pay)/30;
							}
							
							
							
							//$overtime1=mysql_real_escape_string($_POST['overtime1']);
							$overtime1=13;
							
							//calculation of overtime
								if ($net_pay<=5500 && $net_pay>0)
								{
								$overtime_amnt1=$overtime1*20;
								}
								if ($net_pay>5500 && $net_pay<=7500)
								{
								$overtime_amnt1=$overtime1*25;
								}

								if ($net_pay>7500)
								{
								$overtime_amnt1=$overtime1*30;
								}
								
								//calculation of safety allowance
							if ($working_days==30 || $working_days==31)
							{
							$safety_allowance=0.3*$net_pay;
							}

							else
							{
							$safety_allowance=(0.3*$working_days*$net_pay)/30;
							}
							
							//calculation of regional allowance
							if ($working_days==30 || $working_days==31)
							{
							$regional_allowance=0.2*$net_pay;
							}

							else
							{
							$regional_allowance=(0.2*$working_days*$net_pay)/30;
							}
							
												
							//$other_payment=mysql_real_escape_string($_POST['other_payment']);
							$other_payment=3900;
							$other_deductions=1400;
							
							
							//calculation of tax
$gross_pay_usd=$basic_salary+$vacation_amount+$safety_allowance+$regional_allowance+$overtime_amnt1+$other_payment;

$net_pay_usd=$gross_pay_usd-$other_deductions;

$net_pay_ssp=$net_pay_usd*$curr_rate;

//determine percentage

if ($net_pay_ssp<=300)
{
$tax_rate=0;
$tax=0;

}
if ($net_pay_ssp<=4530)
{
$tax_rate=0.1;
$tax=($net_pay_ssp-300)*$tax_rate;
}
if ($net_pay_ssp>4530)
{
$tax_rate=0.15;
$tax=($net_pay_ssp-300)*$tax_rate;
}

$tax_usd=$tax/$curr_rate;


//gross pay ssp
//echo $other_deductions*$curr_rate
$gross_deduction=$other_deductions+$tax_usd;

$gross_pay_ssp=$net_pay_ssp+($other_deductions*$curr_rate)+$tax;


$gross_pay2=$gross_pay_ssp/$curr_rate;


$sqlpay= "insert into payrol_expbasic_log values('','$emp_id','$net_pay','$curr_rate','$basic_salary','$working_days','$vacation_days',
'$vacation_amount','$overtime1','$overtime_amnt1','$safety_allowance','$regional_allowance','$other_payment','$tax_rate','$tax_usd','$other_deductions',NOW(),'$current_month','0')";
$resultspay= mysql_query($sqlpay) or die ("Error $sqlpay.".mysql_error());
							
							
							
							
							
							
							
							
							
							 
/*$sqlx= "insert into payrol_basic_log_batch values ('','$emp_id','$basic_pay','$curr_rate','$gross_pay','$working_days','$overtime_week_days',
'$overtime_amnt_week_days','$overtime_week_ends','$overtime_amnt_week_ends','$other_payments','$cola','$housing','$clothing','$taxable_income','$pit_usd',
'$comp_sic_rate','$emp_sic_rate',NOW(),'$current_month','')";
$resultsx= mysql_query($sqlx) or die ("Error $sqlx.".mysql_error());*/
							 
							 
							 
							 ?></td>
							 
							
							 
							 
							 </tr>
							  

							  
							  
							  
							  <?php
							  
							  }
							  
							  }
							  


 ?>








