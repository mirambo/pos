<?php
#include connection
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$emp_id=$_GET['emp_id'];

$english=mysql_real_escape_string($_POST['english']);
$arabic=mysql_real_escape_string($_POST['arabic']);
$chinese=mysql_real_escape_string($_POST['chinese']);
$other_langauges=mysql_real_escape_string($_POST['other_langauges']);

$word=mysql_real_escape_string($_POST['excel']);
$excel=mysql_real_escape_string($_POST['excel']);
$other_language=mysql_real_escape_string($_POST['other_language']);
$other_comp_skills=mysql_real_escape_string($_POST['other_comp_skills']);






$sql= "insert into skills_profile values('','$emp_id','$english','$arabic','$chinese','$other_langauges','$word','$excel','$other_comp_skills','0')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sqlauditsav= "insert into audit_trails values('','2',NOW(),'Created a new employee by the name $f_name $m_name $l_name into the system')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());




header ("Location:home.php?prize=prize&emp_id=$emp_id");




mysql_close($cnn);


?>


