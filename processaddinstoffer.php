<?php
#include connection
 include ('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$project_name=mysql_real_escape_string($_POST['project_name']);
$project_code=mysql_real_escape_string($_POST['project_code']);
$desc=mysql_real_escape_string($_POST['desc']);
$donor=mysql_real_escape_string($_POST['donor']);
$start_date=mysql_real_escape_string($_POST['start_date']);
$end_date=mysql_real_escape_string($_POST['end_date']);


$sql= "insert into projects values ('','$donor','$project_code','$project_name','$desc','$start_date','$end_date','0')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());






header ("Location:home.php?newinstitute=newinstitute&addinstofferconfirm=1");



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


