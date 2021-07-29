<?php
#include connection
 include ('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
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


$queryprof="select * from omstaff where f_name='$f_name' AND m_name='$m_name' AND l_name='$l_name'";
$resultsprof=mysql_query($queryprof) or die ("Error: $queryprof.".mysql_error());


$numrowscomp=mysql_num_rows($resultsprof);

if ($numrowscomp>0)

{

header ("Location:home.php?omstaff=omstaff&recordexist=1");

}

else 
{

$sql= "insert omstaff values ('','$sub_contractor','$f_name','$m_name','$l_name','$telephone','$email','$nationality','$gender','$job_title','$job_cat','$work_place','0',NOW())";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());



header ("Location:home.php?omstaff=omstaff&addconfirm=1");

}



mysql_close($cnn);


?>


