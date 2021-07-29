<?php
#include connection
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$emp_no=mysql_real_escape_string($_POST['emp_no']);
$nat_id=mysql_real_escape_string($_POST['nat_id']);
$f_name=mysql_real_escape_string($_POST['f_name']);
$m_name=mysql_real_escape_string($_POST['m_name']);
$l_name=mysql_real_escape_string($_POST['l_name']);
$phone=mysql_real_escape_string($_POST['phone']);
$email=mysql_real_escape_string($_POST['email']);
$pin_no=mysql_real_escape_string($_POST['pin_no']);
$town=mysql_real_escape_string($_POST['town']);
$marital_status=mysql_real_escape_string($_POST['marital_status']);
$nationality=mysql_real_escape_string($_POST['nationality']);
$dob=mysql_real_escape_string($_POST['dob']);
$gender=mysql_real_escape_string($_POST['gender']);
$nhif_no=mysql_real_escape_string($_POST['nhif_no']);
$nssf_no=mysql_real_escape_string($_POST['nssf_no']);
$job_title=mysql_real_escape_string($_POST['job_title']);
$job_email=mysql_real_escape_string($_POST['job_email']);
$kin=mysql_real_escape_string($_POST['kin']);
$kin_phone=mysql_real_escape_string($_POST['kin_phone']);

$em_status=mysql_real_escape_string($_POST['em_status']);
$dept=mysql_real_escape_string($_POST['section']);
$date_joined=mysql_real_escape_string($_POST['date_joined']);
$bank_name=mysql_real_escape_string($_POST['bank_name']);
$bank_branch=mysql_real_escape_string($_POST['bank_branch']);
$bank_account=mysql_real_escape_string($_POST['bank_account']);
$bank_account_no=mysql_real_escape_string($_POST['bank_account_no']);



$basic_sal=mysql_real_escape_string($_POST['basic_sal']);



$sql= "insert into employees values('','$emp_no','$nat_id','$f_name','$m_name','$l_name','$phone','$email','$pin_no','$town',
'$marital_status','$nationality','$dob','$gender','$nhif_no','$nssf_no','$job_title','$job_email
','$kin','$kin_phone','$em_status','$dept','$date_joined','$bank_name','$bank_branch','$bank_account','$bank_account_no','0','$basic_sal')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sqlauditsav= "insert into audit_trail values('','2',NOW(),'Created a new employee by the name $f_name $m_name $l_name into the system')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());


header ("Location:add_employee.php? addempconfirm=1");




mysql_close($cnn);


?>


