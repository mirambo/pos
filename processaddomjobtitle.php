<?php
#include connection
 include ('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$job_title_name=mysql_real_escape_string($_POST['job_title_name']);



$queryprof="select * from omjob_titles where omjob_title_name='$job_title_name'";
$resultsprof=mysql_query($queryprof) or die ("Error: $queryprof.".mysql_error());

$numrowscomp=mysql_num_rows($resultsprof);

if ($numrowscomp>0)

{

header ("Location:home.php?omjobtitles=omjobtitles&recordexist=1");

}

else 
{



$sql= "insert into omjob_titles values ('','$job_title_name','0')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());






header ("Location:home.php?omjobtitles=omjobtitles&addconfirm=1");

}

//$results=mysql_query($sql) or die ("Error: $sql.".mysql_error());
//echo $results;
//$count=mysql_num_rows($results);
//echo $count;
/*if (==1)
{
session_start();
$_SESSION['admin']= $adminusern;
/*
session_register("myusername");
session_register("mypassword");*/
/*header("Location:membersarea.php");
}
else
{*/
//header ("Location:adduser.php? createuserconfirm=1");
//echo "<p align='center'><font color='#FF0000' size='-1'>Wrong Username and Password.</font></p>";


mysql_close($cnn);


?>


