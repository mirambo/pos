<?php
#include connection
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form

$emp_id=$_GET['emp_id'];
$emp_no=mysql_real_escape_string($_POST['emp_no']);
$f_name=mysql_real_escape_string($_POST['f_name']);
$m_name=mysql_real_escape_string($_POST['m_name']);
$l_name=mysql_real_escape_string($_POST['l_name']);
$dept=mysql_real_escape_string($_POST['dept']);
$job_title=mysql_real_escape_string($_POST['job_title']);
$gender=mysql_real_escape_string($_POST['gender']);
$dob=mysql_real_escape_string($_POST['dob']);
$nationality=mysql_real_escape_string($_POST['nationality']);
$fjob=mysql_real_escape_string($_POST['fjob']);
$date_joined=mysql_real_escape_string($_POST['date_joined']);
$work_place=mysql_real_escape_string($_POST['work_place']);
//$staff_type=mysql_real_escape_string($_POST['staff_type']);
$emp_type=mysql_real_escape_string($_POST['emp_type']);
$religion=mysql_real_escape_string($_POST['religion']);
$marital_status=mysql_real_escape_string($_POST['marital_status']);
$height=mysql_real_escape_string($_POST['height']);
$weight=mysql_real_escape_string($_POST['weight']);
$blood_group=mysql_real_escape_string($_POST['blood_group']);
$pob=mysql_real_escape_string($_POST['pob']);

$file = $_FILES ['file'];
$name1 = $file ['name'];
$type = $file ['type'];
$size = $file ['size'];
$tmppath = $file ['tmp_name']; 


move_uploaded_file ($tmppath, 'photos/'.$name1);//image is a folder in which you will save image



/*$sql= "insert into employees values('','$emp_no','$f_name','$m_name','$l_name','$dept','$job_title','$gender','$dob','$nationality',
'$fjob','$date_joined','$work_place','$staff_type','$emp_type','$marital_status','$religion','$height','$weight','$blood_group','$pob','$name1','0')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());*/

$sql= "update employees set 
employee_no='$emp_no',
emp_fname='$f_name',
emp_mname='$m_name',
emp_lname='$l_name',
department_id='$dept',
title='$job_title',
gender='$gender',
dob='$dob',
nationality='$nationality',
begining_date_of_first_job='$fjob',
joining_date='$date_joined',
work_place='$work_place',
employment_type='$emp_type',
marital_status='$marital_status',
religion='$religion',
height='$height',
weight='$weight',
blood_group='$blood_group',
place_of_birth='$pob'

where emp_id='$emp_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


$sqlauditsav= "insert into audit_trails values('','2',NOW(),'Created a new employee by the name $f_name $m_name $l_name into the system')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());


$querylatelpo="select * from employees order by emp_id desc limit 1";
$resultslatelpo=mysql_query($querylatelpo) or die ("Error: $querylatelpo.".mysql_error());
$rowslatelpo=mysql_fetch_object($resultslatelpo);

$latest_emp_id=$rowslatelpo->emp_id;


header ("Location:home.php?passport=passport&emp_id=$latest_emp_id");




mysql_close($cnn);


?>


