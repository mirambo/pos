<?php
#include connection
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
$emp_id=$_GET['emp_id'];
$net_pay=mysql_real_escape_string($_POST['net_pay']);
$working_days=mysql_real_escape_string($_POST['working_days']);
$vacation_days=mysql_real_escape_string($_POST['vacation_days']);

//$basic_salary=mysql_real_escape_string($_POST['basic_salary']);
$overtime1=mysql_real_escape_string($_POST['overtime1']);
$other_payment=mysql_real_escape_string($_POST['other_payment']);
$other_deductions=mysql_real_escape_string($_POST['other_deductions']);
$curr_rate=mysql_real_escape_string($_POST['curr_rate']);
$current_month=(Date("F Y"));
$gen_date=(Date("d-m-Y")); 
$gen_month=(Date("F Y"));

$currency=2;
$sqlcurr="select * from currency where curr_id='2'";
$resultscurr= mysql_query($sqlcurr) or die ("Error $sqlcurr.".mysql_error());
$rowcurr=mysql_fetch_object($resultscurr);
//$curr_rate=$rowcurr->curr_rate;

$sqlemp="select * from employees where emp_id='$emp_id'";
$resultsemp= mysql_query($sqlemp) or die ("Error $sqlemp.".mysql_error());
$rowsemp=mysql_fetch_object($resultsemp);
$emp_fname=$rowsemp->emp_fname;
$emp_lname=$rowsemp->emp_lname;


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

//calculation of basic salary

if ($working_days==30 || $working_days==31)
{
$basic_salary=0.5*$net_pay;
}
else
{
$basic_salary=(0.5*$working_days*$net_pay)/30;
}


//calculation of vacation salary

if ($working_days==30 || $working_days==31)
{
$vacation_amount=0;
}

else
{
$vacation_amount=(0.5*$vacation_days*$net_pay)/30;
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




//







//echo $paye;


$sqlred="select * from payrol_expbasic_log order by payrol_basic_log_id desc limit 1";
$resultsred= mysql_query($sqlred) or die ("Error $sqlred.".mysql_error());
$rowsred=mysql_fetch_object($resultsred);
$datedb = $rowsred->date_paid;
$lat_payrol_basic_log= $rowsred->payrol_basic_log_id;

//echo $datedb;


$sqlredday="select * from payrol_expbasic_log where payment_month='$current_month' AND emp_id=$emp_id";
$resultsredday= mysql_query($sqlredday) or die ("Error $sqlredday.".mysql_error());
$rowsredday=mysql_fetch_object($resultsredday);
$numrowsredday=mysql_num_rows($resultsredday);





//echo $monthcurr;
//Prevent Redundancy in preparing the payroll
if ( $numrowsredday>0)
{

header ("Location:home.php?processexppayroll2=processexppayroll2&recordexist=1&emp_id=$emp_id&curr_rate=$curr_rate");

}
else 
{

$sqlpay= "insert into payrol_expbasic_log values('','$emp_id','$net_pay','$curr_rate','$basic_salary','$working_days','$vacation_days',
'$vacation_amount','$overtime1','$overtime_amnt1','$safety_allowance','$regional_allowance','$other_payment','$tax_rate','$tax_usd','$other_deductions',NOW(),'$current_month','0')";
$resultspay= mysql_query($sqlpay) or die ("Error $sqlpay.".mysql_error());

$sqlbasic_id="select * from payrol_expbasic_log order by payrol_basic_log_id desc limit 1";
$resultsbasic_id= mysql_query($sqlred) or die ("Error $sqlbasic_id.".mysql_error());
$rowsbasic_id=mysql_fetch_object($resultsbasic_id);
$payrol_basic_log=$rowsbasic_id->payrol_basic_log_id;

$year=date('Y');
$tempnum=$payrol_basic_log;
	if($tempnum < 10)
            {
              $payslip_no = "SPTEX000".$tempnum."/".$year;
			   //echo $newnum;   
			  
			  
            } else if($tempnum < 100) 
			{
             $payslip_no = "SPTEX00".$tempnum."/".$year;
			 
                
			 
			 //echo $newnum;
            } else 
			{ 
			$payslip_no= "SPTEX".$tempnum."/".$year; 
			   
			
			//echo $newnum;
			}
			
			
$sqlred="select * from exp_pay_slips where emp_id='$emp_id' AND month_printed='$current_month'";
$resultsred= mysql_query($sqlred) or die ("Error $sqlred.".mysql_error());
$rowsred=mysql_fetch_object($resultsred);
$numrowsred=mysql_num_rows($resultsred);

if ($numrowsred>0)

{


}

else
{

$sqllpo= "insert into exp_pay_slips VALUES('','$payslip_no','$payrol_basic_log','$emp_id','$gross_pay2','$gross_deduction','$net_pay_usd',NOW(),'$gen_date','$gen_month')";
$resultslpo= mysql_query($sqllpo) or die ("Error $sqllpo.".mysql_error());



$sqlss="INSERT INTO expenses_ledger VALUES('','Salary for exp $emp_fname $emp_lname for month $gen_month','$net_pay_usd','$net_pay_usd', '','$currency','$curr_rate',NOW())";
$resultsss= mysql_query($sqlss) or die ("Error $sqlss.".mysql_error());

/*$sqlgenled= "insert into general_ledger values('','Salary for $emp_fname $emp_lname for month $gen_month','-$net_sal','','$net_sal','$currency','$curr_rate',NOW(),'')";
$resultsgenled=mysql_query($sqlgenled) or die ("Error $sqlgenled.".mysql_error());

$sqlgenled= "insert into general_ledger values('','$transaction_desc2','$net_sal','$net_sal','','$currency','$curr_rate',NOW(),'')";
$resultsgenled=mysql_query($sqlgenled) or die ("Error $sqlgenled.".mysql_error());*/

$sqlgenled= "insert into cash_ledger values('','Salary for exp $emp_fname $emp_lname for month $gen_month','-$net_pay_usd','','$net_pay_usd','$currency','$curr_rate',NOW())";
$resultsgenled=mysql_query($sqlgenled) or die ("Error $sqlgenled.".mysql_error());




}

$next_emp_id=$emp_id+1;

$sqlcn="select * from employees where emp_id='$next_emp_id' AND staff_type='2'";
$resultscn= mysql_query($sqlcn) or die ("Error $sqlcn.".mysql_error());
$rowssn=mysql_num_rows($resultscn);
$rowsnemp_id=mysql_fetch_object($resultscn);
$realnext_emp=$rowsnemp_id->emp_id;

if ($rowssn>0)
{
header ("Location:home.php?processexppayroll2=processexppayroll2&emp_id=$next_emp_id&curr_rate=$curr_rate&n");
}
else
{
//$next_emp_idn=$next_emp_id+1;
//SELECT * FROM foo WHERE id > 4 ORDER BY id LIMIT 1;
$sqlnxt="select * from employees where staff_type='2' AND emp_id >'$next_emp_id' ORDER BY emp_id LIMIT 1";
$resultsnxt= mysql_query($sqlnxt) or die ("Error $sqlnxt.".mysql_error());
$rowsnxtemp_id=mysql_fetch_object($resultsnxt);
$next_emp_idn=$rowsnxtemp_id->emp_id;

header ("Location:home.php?processexppayroll2=processexppayroll2&emp_id=$next_emp_idn&curr_rate=$curr_rate&nn");
}




}

mysql_close($cnn);


?>


