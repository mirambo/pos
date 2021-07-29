<?php
#include connection
include('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$emp_id=$_GET['employee_id'];
$f_name=mysql_real_escape_string($_POST['f_name']);
$m_name=mysql_real_escape_string($_POST['m_name']);
$l_name=mysql_real_escape_string($_POST['l_name']);
$phone=mysql_real_escape_string($_POST['phone']);
$emp_no=mysql_real_escape_string($_POST['emp_no']);
$pin_no=mysql_real_escape_string($_POST['pin_no']);
$town=mysql_real_escape_string($_POST['town']);
$nationality=mysql_real_escape_string($_POST['nationality']);
$dob=mysql_real_escape_string($_POST['dob']);
$gender=mysql_real_escape_string($_POST['gender']);
$marital_status=mysql_real_escape_string($_POST['marital_status']);
$nhif_no=mysql_real_escape_string($_POST['nhif_no']);
$nssf_no=mysql_real_escape_string($_POST['nssf_no']);
$job_title=mysql_real_escape_string($_POST['job_title']);
$kin=mysql_real_escape_string($_POST['kin']);
$kin_phone=mysql_real_escape_string($_POST['kin_phone']);
$em_status=mysql_real_escape_string($_POST['em_status']);
$dept=mysql_real_escape_string($_POST['station']);
$date_joined=mysql_real_escape_string($_POST['date_joined']);
$job_email=mysql_real_escape_string($_POST['job_email']);
$email=mysql_real_escape_string($_POST['email']);
$nat_id=mysql_real_escape_string($_POST['nat_id']);
$basic_sal=mysql_real_escape_string($_POST['basic_sal']);

$bank_name=mysql_real_escape_string($_POST['bank_name']);
$bank_branch=mysql_real_escape_string($_POST['bank_branch']);
$bank_account=mysql_real_escape_string($_POST['bank_account']);
$bank_account_no=mysql_real_escape_string($_POST['bank_account_no']);


//$queryprof="select * from users where f_name='$f_name' and l_name='$l_name' and email='$email' and username='$username'";
//$resultsprof=mysql_query($queryprof) or die ("Error: $queryprof.".mysql_error());
								  
//$rowsprof=mysql_fetch_object($resultsprof);

//$numrowscomp=mysql_num_rows($resultsprof);
 
 //$f_namecomp=$rowsprof->f_name;
 //$l_namecomp=$rowsprof->l_name;
 //$emailcomp=$rowsprof->email;
 //$usernamecomp=$rowsprof->username;

//if ($password!=$cpassword)

//{
	
 //header ("Location:add_user.php? passwordmissmatchconfirm=1&f_name=$f_name&l_name=$l_name&user_group=$user_group&email=$email&username=$username");
	
//}

//elseif ($numrowscomp>0)

//{

 //header ("Location:add_user.php? recordexist=1");

//}

//else 

//{

$sql= "update employees set employee_no='$emp_no',national_id='$nat_id',emp_firstname='$f_name',emp_middle_name='$m_name',
emp_lastname='$l_name',emp_phone='$phone',emp_email='$email',pin_no='$pin_no',town='$town',marital_status='$marital_status',
nationality='$nationality',dob='$dob',gender='$gender',nhif_no='$nhif_no',nssf_no='$nssf_no',job_title_id='$job_title',
job_email='$job_email',emp_status='$em_status',department='$dept',joined_date='$date_joined',
kin='$kin',
kin_phone='$kin_phone',
bank_name='$bank_name',
bank_branch='$bank_branch',
bank_account_name='$bank_account',
bank_account_number='$bank_account_no',

basic_sal='$basic_sal' where emp_id='$emp_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sqlauditsav= "insert into audit_trail values('','2',NOW(),'Edited employee details by the name $f_name $m_name $l_name')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());


header ("Location:employee_det.php? empeditconfirm=1&emp_id=$emp_id");



//}





/*$queryprof="select * from  user_groups where group_name='$group_name'";
$resultsprof=mysql_query($queryprof) or die ("Error: $queryprof.".mysql_error());
								  
//$rowsprof=mysql_fetch_object($resultsprof);

$numrowscomp=mysql_num_rows($resultsprof);*/
 
 //$f_namecomp=$rowsprof->f_name;
 //$l_namecomp=$rowsprof->l_name;
 //$emailcomp=$rowsprof->email;
 //$usernamecomp=$rowsprof->username;


//echo $u_pwrd;

//echo $u_cpwrd;

//echo $cus_fname;

//$realdob= dateconvert($dob, 1);
//$realdob = date('Y-m-d', strtotime($dob));
/*if ($numrowscomp>0)

{

header ("Location:add_user_groups.php? recordexist=1");

}

else 

{



$sql= "insert into user_groups values ('','$group_name','$group_desc','0')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());






header ("Location:add_user_groups.php? addgroupconfirm=1");

}
*/


mysql_close($cnn);


?>


