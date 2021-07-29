<?php
#include connection
 include ('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$omstaff_id=$_GET['omstaff_id'];
$sub_contractor=mysql_real_escape_string($_POST['sub_contractor']);
$f_name=mysql_real_escape_string($_POST['f_name']);
$m_name=mysql_real_escape_string($_POST['m_name']);
$l_name=mysql_real_escape_string($_POST['l_name']);
$nationality=mysql_real_escape_string($_POST['nationality']);
$gender=mysql_real_escape_string($_POST['gender']);
$telephone=mysql_real_escape_string($_POST['telephone']);
$email=mysql_real_escape_string($_POST['email']);
$job_title=mysql_real_escape_string($_POST['job_title']);
$job_cat=mysql_real_escape_string($_POST['job_cat']);
$work_place=mysql_real_escape_string($_POST['work_place']);


$sql= "update omstaff set 
consultant_id='$sub_contractor',
f_name='$f_name',
m_name='$m_name',
l_name='$l_name',
telephone='$telephone',
email='$email',
nationality='$nationality',
gender='$gender',
job_title_id='$job_title',
job_cat_id='$job_cat',
work_place_id='$work_place'

where omstaff_id='$omstaff_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


header ("Location:home.php?editomstaff=editomstaff&omstaff_id=$omstaff_id&editconfirm=1");





mysql_close($cnn);


?>


