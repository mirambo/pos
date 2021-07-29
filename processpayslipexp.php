<?php
include('Connections/fundmaster.php');

//$current_month=mysql_real_escape_string($_POST['date_month']);
echo $current_month=date('F Y');

//expertriate payslips
$sqlexp="SELECT * FROM payrol_expbasic_log WHERE payment_month='$current_month'";
$resultsexp= mysql_query($sqlexp) or die ("Error $sqlexp.".mysql_error());

if ($num_rowsexp=mysql_num_rows($resultsexp) > 0)
						  {
							  while ($rowsexp=mysql_fetch_object($resultsexp))
							  { ?>
							  <tr>
							  <td><?php
							 $emp_idexp=$rowsexp->emp_id;
							
							$basic_pay=$rowsexp->net_pay_stnd;
							$payrol_expbasic_log=$rowsexp->payrol_basic_log_id;
							
							$year=date('Y');
$tempnum=$payrol_expbasic_log;
	if($tempnum < 10)
            {
              $payslip_noexp = "SPTEX000".$tempnum."/".$year;
			   //echo $newnum;   
			  
			  
            } else if($tempnum < 100) 
			{
             $payslip_noexp = "SPTEX00".$tempnum."/".$year;
			 
                
			 
			 //echo $newnum;
            } else 
			{ 
			$payslip_noexp= "SPTEX".$tempnum."/".$year; 
			}
			$other_deductions=$rowsexp->other_deductions;
			
			$tax_exp_usd=$rowsexp->tax;
			
			//all deductions
			$gross_deduction=$other_deductions+$tax_exp_usd;
			
			//all allownaces
			$vacation=$rowsexp->vacation_amount;
			$overtime=$rowsexp->overtime_amnt1;
			$safety=$rowsexp->safety_allowance;
			$regional=$rowsexp->regional_allowance;
			$otherpaymentexp=$rowsexp->otherpayment;
			
			$allowancesexp=$vacation+$overtime+$safety+$regional+$otherpaymentexp+$allowancesexp;
			
			$gross_salary_exp=$rowsexp->net_pay_stnd;
			
			$date_printed_exp=date('Y-m-d');
							
			
			

			
			
			   
			
			//echo $newnum;
			
							
							  ?></td>
							  <td>
							  <?php 
$sqllpo= "insert into exp_pay_slips VALUES('','$payslip_noexp','$payrol_expbasic_log','$emp_idexp','$gross_salary_exp','$allowancesexp',
'$gross_deduction','$basic_pay',NOW(),'$date_printed_exp','$current_month')";
$resultslpo= mysql_query($sqllpo) or die ("Error $sqllpo.".mysql_error());	  
							  
							  ?>
							  </td>
							  
							  </tr>
							  
							  
							  
							  
							  <?php 
							  }
							  
							  }
							  ?>










