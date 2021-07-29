<?php
#include connection
include ('includes/session.php');
include('Connections/fundmaster.php');
$pci=$_GET['pci'];
$payroll_month=mysql_real_escape_string($_POST['month']); 
$payroll_year=mysql_real_escape_string($_POST['year']); 
$employee_id=mysql_real_escape_string($_POST['employee_id']); 

$query1="select * from hs_hr_employee WHERE emp_number='$employee_id'";
$results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
$rows1=mysql_fetch_object($results1);

$emp_name=$rows1->emp_firstname.' '.$rows1->emp_father_name.' '.$rows1->emp_lastname;
$emp_num=$rows1->employee_id;


$bonus=mysql_real_escape_string($_POST['bonus']); 
$days_worked=mysql_real_escape_string($_POST['days_worked']);

$sql3x="select * from specific_daily_rate";
$results3x= mysql_query($sql3x) or die ("Error $sql3x.".mysql_error());
$rows3x=mysql_fetch_object($results3x);

$daily_rate=$rows3x->rate_amount;

$basic_pay=$days_worked*$daily_rate;

$normal_ot=mysql_real_escape_string($_POST['normal_ot']);
$holiday_ot=mysql_real_escape_string($_POST['holiday_ot']);
//$staff_nssf_amount=mysql_real_escape_string($_POST['nssf_amount']);
//$nhif_amount=mysql_real_escape_string($_POST['nhif_amount']);
//$sdl_amount=0.01*$basic_pay;

//$working_days=22;
$pay_per_day=$daily_rate;
//$days_absent_amount=$pay_per_day*$days_absent;
/////////////OT
//Normal
$hours_per_day=8;
$normal_ot_constant=1.5;
$holiday_ot_constant=2.0;
$pay_per_hour=$pay_per_day/$hours_per_day;
$normal_ot_amount=$pay_per_hour*$normal_ot*$normal_ot_constant;
//Holiday
$holiday_ot_amount=$pay_per_hour*$holiday_ot*$holiday_ot_constant;
//////////////////////nssf calculations
///10% of the gross income. (Basic bay and all allowances)
foreach($_POST['benefit_log_id'] as $row=>$Prod)
{

$benefit_log_id=mysql_real_escape_string($_POST['benefit_log_id'][$row]);
$benefit_amount=mysql_real_escape_string($_POST['benefit_amount'][$row]);
$ttl_benefits=$ttl_benefits+$benefit_amount;


}

echo $ttl_benefits;

$gross_pay=$ttl_benefits+$basic_pay+$holiday_ot_amount+$normal_ot_amount+$bonus;

$staff_nssf_amount=$gross_pay*0.1;
$employer_nssf_amount=$gross_pay*0.1;
$nhif_amount=$basic_pay*0.03;


$month=$payroll_month;


if ($month=='Jan')
{
	$mm='01';
	
}

if ($month=='Feb')
{
	$mm='02';
	
}
if ($month=='Mar')
{
	$mm='03';
	
}

if ($month=='Apr')
{
	$mm='04';
	
}
if ($month=='May')
{
	$mm='05';
	
}
if ($month=='Jun')
{
	$mm='06';
	
}
if ($month=='Jul')
{
	$mm='07';
	
}

if ($month=='Aug')
{
	$mm='08';
	
}
if ($month=='Sep')
{
	$mm='09';
	
}
if ($month=='Oct')
{
	$mm='10';
	
}
if ($month=='Nov')
{
	$mm='11';
	
}

if ($month=='Dec')
{
	$mm='12';
	
}


////Tax block
//tax = basci pay and all allowance then deduct the nssf to get the taxable income.
//////total benefits



$ttl_benefits;

$taxable_income=$gross_pay-$staff_nssf_amount;


if ($taxable_income>=0 && $taxable_income <=170000)
{
	
	$paye=0;
	
}
elseif ($taxable_income>170000 && $taxable_income <=360000)
{
	
	$base_shill_tax=0;
	$extra_perc=9;
	$extra_amount=$taxable_income-170000;
	$extra_tax=$extra_amount*$extra_perc/100;
	
	$paye=$extra_tax+$base_shill_tax;

	
}


elseif ($taxable_income>360000 && $taxable_income <=540000)
{
	
	$base_shill_tax=17100;
	$extra_perc=20;
	$extra_amount=$taxable_income-360000;
	$extra_tax=$extra_amount*$extra_perc/100;
	
   $paye=$extra_tax+$base_shill_tax;

	
}


elseif ($taxable_income>540000 && $taxable_income <=720000)
{
	
	$base_shill_tax=53100;
	$extra_perc=25;
	$extra_amount=$taxable_income-540000;
	$extra_tax=$extra_amount*$extra_perc/100;
	
	$paye=$extra_tax+$base_shill_tax;

	
}

elseif ($taxable_income > 720000)
{
	
	$base_shill_tax=98100;
	$extra_perc=30;
	$extra_amount=$taxable_income-720000;
	$extra_tax=$extra_amount*$extra_perc/100;
	
	$paye=$extra_tax+$base_shill_tax;

	
}

$paye;

if ($pci!='')
{
	
	
$sql= "UPDATE payroll_code SET 
employee_id='$employee_id',
bonus='$bonus',
basic_pay='$basic_pay',
days_worked='$days_worked',
specific_daily_rate_amount='$pay_per_day',
days_worked_amount='$basic_pay',
normal_ot='$normal_ot',
normal_ot_amount='$normal_ot_amount',
holiday_ot='$holiday_ot',
holiday_ot_amount='$holiday_ot_amount',
nhif_amount='$nhif_amount',
paye_amount='$paye',
staff_nssf_amount='$staff_nssf_amount',
employer_nssf_amount='$employer_nssf_amount',
payroll_month='$payroll_month',
payroll_month_value='$mm',
payroll_year='$payroll_year' WHERE payroll_code_id='$pci'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

	
///////////////update Benefits and allowances


$sqldela= "DELETE from benefits where payroll_code_id='$pci'";
$resultsdela= mysql_query($sqldela) or die ("Error $sqldela.".mysql_error());





foreach($_POST['benefit_log_id'] as $row=>$Prod)
{

$benefit_log_id=mysql_real_escape_string($_POST['benefit_log_id'][$row]);
$benefit_amount=mysql_real_escape_string($_POST['benefit_amount'][$row]);

if ($benefit_amount=='' || $benefit_amount==0)
{
	
	
}
else
{


$sql2= "INSERT INTO benefits SET 
payroll_code_id='$pci',
benefit_log_id='$benefit_log_id',
benefit_amount='$benefit_amount'";
$results2= mysql_query($sql2) or die ("Error $sql2.".mysql_error());

}
}



//////////////UPDATE DEDUCTIONS
$sqldeld= "DELETE FROM deductions where payroll_code_id='$pci'";
$resultsdeld= mysql_query($sqldeld) or die ("Error $sqldeld.".mysql_error());


foreach($_POST['deduction_log_id'] as $row=>$Prod)
{

$deduction_log_id=mysql_real_escape_string($_POST['deduction_log_id'][$row]);
$deduction_amount=mysql_real_escape_string($_POST['deduction_amount'][$row]);

if ($deduction_amount=='' || $deduction_amount==0)
{
	
	
}
else
{
$sql2= "INSERT INTO deductions SET 
payroll_code_id='$pci',
deduction_log_id='$deduction_log_id',
deduction_amount='$deduction_amount'";
$results2= mysql_query($sql2) or die ("Error $sql2.".mysql_error());
}

}	
	
	
	
	
	?>
<script type="text/javascript">
alert('Payroll for employee <?php echo $emp_num; ?>-<?php echo $emp_name; ?> Updated Successfuly');
window.location = "home.php?post_payroll_spec=post_payroll_spec&sub_module_id=<?php echo $sub_module_id; ?>&payroll_code_id=<?php echo $pci; ?>";
</script>

<?php
	
	
}
else
{
	
	$sqldx="SELECT * FROM payroll_code where employee_id='$employee_id' AND payroll_month='$payroll_month' AND payroll_year='$payroll_year'";
$resultsdx= mysql_query($sqldx) or die ("Error $sqldx.".mysql_error());
$rowsdx=mysql_num_rows($resultsdx);

if ($rowsdx>0)
{	

?>
<script type="text/javascript">
alert('SORRY!! PAYROLL FOR EMPLOYEE <?php echo $emp_num; ?> - <?php echo $emp_name; ?> HAS ALREADY BEEN PROCESSED');
window.location = "home.php?post_payroll_spec=post_payroll_spec";
</script>

<?php

}


else
{
	
$sql= "INSERT INTO payroll_code SET 
employee_id='$employee_id',
bonus='$bonus',
days_worked='$days_worked',
specific_daily_rate_amount='$daily_rate',
basic_pay='$basic_pay',
days_worked_amount='$basic_pay',
normal_ot='$normal_ot',
normal_ot_amount='$normal_ot_amount',
holiday_ot='$holiday_ot',
holiday_ot_amount='$holiday_ot_amount',
nhif_amount='$nhif_amount',
paye_amount='$paye',
staff_nssf_amount='$staff_nssf_amount',
employer_nssf_amount='$employer_nssf_amount',
payroll_month='$payroll_month',
payroll_month_value='$mm',
payroll_year='$payroll_year',
recorded_by='$user_id',
payroll_type='S',
date_recorded='$to',
datetime_recorded='$todate'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
$payroll_code_id=mysql_insert_id();


$tempnum=$payroll_code_id;
//$month=date('M');
//$month = date("M",strtotime($date_from));

if($tempnum < 10)
            {
              $lpo_no = "MFPR000".$tempnum;
             
			  
			  
            } 
			
			else if($tempnum < 100) 
			{
             $lpo_no = "MFPR00".$tempnum;
			 
			 //echo $newnum;
            } 
			
			else if($tempnum < 1000) 
			{
             $lpo_no = "MFPR0".$tempnum;
			 
			 //echo $newnum;
            }
			
						else if($tempnum < 10000) 
			{
             $lpo_no = "MFPR".$tempnum;
			 
			 //echo $newnum;
            }
			
			
			else 
			{ 
			$lpo_no =$tempnum;
			
			//echo $newnum;
			}

$sqllpono="UPDATE payroll_code set payroll_no='$lpo_no' where payroll_code_id='$payroll_code_id'";
$resultslpono= mysql_query($sqllpono) or die ("Error $sqllpono.".mysql_error());




///////////////Benefits and allowances
foreach($_POST['benefit_log_id'] as $row=>$Prod)
{

$benefit_log_id=mysql_real_escape_string($_POST['benefit_log_id'][$row]);
$benefit_amount=mysql_real_escape_string($_POST['benefit_amount'][$row]);

if ($benefit_amount=='' || $benefit_amount==0)
{
	
	
}
else
{


$sql2= "INSERT INTO benefits SET 
payroll_code_id='$payroll_code_id',
benefit_log_id='$benefit_log_id',
benefit_amount='$benefit_amount'";
$results2= mysql_query($sql2) or die ("Error $sql2.".mysql_error());

}
}

foreach($_POST['deduction_log_id'] as $row=>$Prod)
{

$deduction_log_id=mysql_real_escape_string($_POST['deduction_log_id'][$row]);
$deduction_amount=mysql_real_escape_string($_POST['deduction_amount'][$row]);

if ($deduction_amount=='' || $deduction_amount==0)
{
	
	
}
else
{
$sql2= "INSERT INTO deductions SET 
payroll_code_id='$payroll_code_id',
deduction_log_id='$deduction_log_id',
deduction_amount='$deduction_amount'";
$results2= mysql_query($sql2) or die ("Error $sql2.".mysql_error());
}

}

$rowx = $emp_num;
$getNext = mysql_query("select * from hs_hr_employee,employee_job_details WHERE 
hs_hr_employee.emp_number=employee_job_details.employee_id AND employee_job_details.terms_of_service='1' 
ORDER BY hs_hr_employee.employee_id desc limit LIMIT ".$emp_num.", 1");
$next = mysql_fetch_assoc($getNext);

echo $nextLink = $rowx+1;

?>
<script type="text/javascript">
alert('Payroll for employee <?php echo $emp_name ?> Saved Successfuly');
//window.location = "home.php?post_payroll_spec=post_payroll_spec";
window.location = "home.php?post_payroll_spec=post_payroll_spec&nen=<?php echo $nextLink; ?>&prc=<?php echo $payroll_code_id;  ?>";
</script>

<?php
}


}
mysql_close($cnn);



?>


