<?php
#include connection
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$emp_id=$_GET['emp_id'];
$english=mysql_real_escape_string($_POST['english']);
$arabic=mysql_real_escape_string($_POST['arabic']);
$chinese=mysql_real_escape_string($_POST['chinese']);
$word=mysql_real_escape_string($_POST['excel']);
$excel=mysql_real_escape_string($_POST['excel']);
$other_language=mysql_real_escape_string($_POST['other_language']);
$other_comp_skills=mysql_real_escape_string($_POST['other_comp_skills']);



$queryprof="select * from skills_profile where emp_id='$emp_id'";
$resultsprof=mysql_query($queryprof) or die ("Error: $queryprof.".mysql_error());
								 

$numrowscomp=mysql_num_rows($resultsprof);

if ($numrowscomp>0)

{

$sql= "update skills_profile set 
english='$english',
arabic='$arabic',
chinese='$chinese',
other_languages='$other_language',
word='$word',
excel='$excel',
other_comp_skills='$other_comp_skills'


where emp_id='$emp_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());




}
else
{

$sql= "insert into skills_profile values('','$emp_id','$english','$arabic','$chinese','$other_langauges','$word','$excel','$other_comp_skills','0')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}


header ("Location:home.php?viewskillprofile=viewskillprofile&emp_id=$emp_id&editconfirm=1");




mysql_close($cnn);


?>


