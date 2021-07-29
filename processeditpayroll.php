<?php
#include connection
include('includes/session.php');
include('Connections/fundmaster.php');

#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$id=$_GET['payrol_basic_log_batch_id'];

$sqlprof2="SELECT * FROM payrol_basic_log_batch WHERE payrol_basic_log_batch_id='$id'";
$resultsprof2= mysql_query($sqlprof2) or die ("Error $sqlprof.".mysql_error());
$num_rowsprof2=mysql_fetch_object($resultsprof2);

$tax=$num_rowsprof2->tax;
$emp_sic=$num_rowsprof2->emp_sic_rate;


$other_payments=$num_rowsprof2->otherpayment;
$cola=$num_rowsprof2->cola;
$housing=$num_rowsprof2->housing;
$clothing=$num_rowsprof2->clothing;




$basic_pay=$_GET['basic_pay'];
$working_days=mysql_real_escape_string($_POST['working_days']);
$ot_week_days=mysql_real_escape_string($_POST['ot_week_days']);
$ot_weekends=mysql_real_escape_string($_POST['ot_weekends']);
$other_payments=mysql_real_escape_string($_POST['other_payments']);

							$gross_pay=0.54*$basic_pay;
							$pay_per_day=$gross_pay/$working_days;
							$pay_per_hour=$pay_per_day/8;

							$overtime_amnt_week_days=($ot_week_days*$pay_per_hour)*1.5;
							$overtime_amnt_week_ends=($ot_weekends*$pay_per_hour)*2;

$allowances=$overtime_amnt_week_days+$overtime_amnt_week_ends+$other_payments+$cola+$housing+$clothing;	
$deductions=$tax+$emp_sic;

$net_sal=$gross_pay+$allowances-$deductions;


$sql= "update payrol_basic_log_batch set 
working_days='$working_days',
overtime1='$ot_week_days',
overtime_amnt1='$overtime_amnt_week_days',
overtime2='$ot_weekends',
overtime_amnt2='$overtime_amnt_week_ends' ,
otherpayment='$other_payments' ,
net_salary='$net_sal'

where payrol_basic_log_batch_id='$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());



$sqlauditsav= "insert into audit_trails values('','$user_id',NOW(),'Updated payroll details')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());



header ("Location:home.php?editpayroll=editpayroll&payrol_basic_log_batch_id=$id&editconfirm=1");


mysql_close($cnn);


?>


