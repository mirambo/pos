<?php
include('Connections/fundmaster.php');

$current_month=mysql_real_escape_string($_POST['date_month']);


$sqlprof="SELECT * FROM pay_slips WHERE month_printed='$current_month'";
$resultsprof= mysql_query($sqlprof) or die ("Error $sqlprof.".mysql_error());
$num_rowsprof=mysql_num_rows($resultsprof);

$sqlprof2="SELECT * FROM payrol_basic_log_batch WHERE payment_month='$current_month'";
$resultsprof2= mysql_query($sqlprof2) or die ("Error $sqlprof.".mysql_error());
$num_rowsprof2=mysql_num_rows($resultsprof2);

if ($num_rowsprof>0)
{

header ("Location:home.php?bnprocesspayroll=bnprocesspayroll&exist=1&current_month=$current_month");

}
elseif ($num_rowsprof2==0)
{

header ("Location:home.php?bnprocesspayroll=bnprocesspayroll&abnormal=1&current_month=$current_month");

}

else
{

$sql="SELECT * FROM payrol_basic_log_batch WHERE payment_month='$current_month'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
	

if ($num_rows=mysql_num_rows($results) > 0)
						  {
							  while ($rows=mysql_fetch_object($results))
							  { ?>
							  
						<tr><td><?php 
						
						$emp_id=$rows->emp_id; 
						$payrol_basic_log_batch_id=$rows->payrol_basic_log_batch_id;
						
						$year=date('Y');
$tempnum=$payrol_basic_log_batch_id;
	if($tempnum < 10)
            {
              $payslip_no = "SPTPS000".$tempnum."/".$year;
			   //echo $newnum;   
			  
			  
            } else if($tempnum < 100) 
			{
             $payslip_no = "SPTPS00".$tempnum."/".$year;
			 
                
			 
			 //echo $newnum;
            } else 
			{ 
			$payslip_no= "SPTPS".$tempnum."/".$year; 
			   
			
			//echo $newnum;
			}
						
		$payslip_no;

$gloss_salary=$rows->basic_pay;
//allowances
$overtime_weekdays=$rows->overtime_amnt1;
$overtime_weekends=$rows->overtime_amnt2;
$other_payments=$rows->otherpayment;
$cola=$rows->cola;
$housing=$rows->housing;
$clothing=$rows->clothing;

$allowances=$overtime_weekdays+$overtime_weekends+$other_payments+$cola+$housing+$clothing;	

//deductions
$tax=$rows->tax;
$emp_sic=$rows->emp_sic_rate;

$deductions=$tax+$emp_sic;

$date_printed=date('Y-m-d');

$net_sal=$rows->net_salary;
						
						
						?></td>
						
						
						<td>
					<?php
$sqllpo= "insert into pay_slips VALUES('','$payslip_no','$payrol_basic_log_batch_id','$emp_id','$gloss_salary','$allowances','$deductions','$net_sal',NOW(),'$date_printed','$current_month')";
$resultslpo= mysql_query($sqllpo) or die ("Error $sqllpo.".mysql_error());

					?>	
						
						
						</td><tr/>
							 
							 <?php
}

}



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
header ("Location:home.php?bnprocesspayroll=bnprocesspayroll&success=1&current_month=$current_month");
							  }
							  ?>








