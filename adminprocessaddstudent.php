<?php
#include connection
 include ('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$university=mysql_real_escape_string($_POST['university']);
$stud_fname=mysql_real_escape_string($_POST['stud_fname']);
$gender=mysql_real_escape_string($_POST['gender']);
$nationality=mysql_real_escape_string($_POST['nationality']);
$adm_year=mysql_real_escape_string($_POST['adm_year']);
$comp_year=mysql_real_escape_string($_POST['comp_year']);
$sponsor1=mysql_real_escape_string($_POST['sponsor1']);
$sponsor2=mysql_real_escape_string($_POST['sponsor2']);
$sponsor3=mysql_real_escape_string($_POST['sponsor3']);
$phone=mysql_real_escape_string($_POST['phone']);
$email=mysql_real_escape_string($_POST['email']);
$remarks=mysql_real_escape_string($_POST['remarks']);


$sql= "insert into post_grad_scholarship values ('','$university','$user_id','$stud_fname','$gender','$nationality','$adm_year','$comp_year','$sponsor1','$sponsor2','$sponsor3','$phone','$email','$remarks',NOW())";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());






header ("Location:home.php?addpostgraduatereport=addpostgraduatereport&addstudentconfirm=1");

//}

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


