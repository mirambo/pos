<?php
#include connection
 include ('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form

$inst_orig=mysql_real_escape_string($_POST['inst_orig']);
$ben_fname=mysql_real_escape_string($_POST['ben_fname']);
$gender=mysql_real_escape_string($_POST['gender']);
$nationality=mysql_real_escape_string($_POST['nationality']);
$university=mysql_real_escape_string($_POST['university']);
$start_date=mysql_real_escape_string($_POST['start_date']);
$comp_date=mysql_real_escape_string($_POST['comp_date']);
$spec=mysql_real_escape_string($_POST['spec']);
$phone=mysql_real_escape_string($_POST['phone']);
$email=mysql_real_escape_string($_POST['email']);
$sponsor1=mysql_real_escape_string($_POST['sponsor1']);
$sponsor2=mysql_real_escape_string($_POST['sponsor2']);
$sponsor3=mysql_real_escape_string($_POST['sponsor3']);
$remarks=mysql_real_escape_string($_POST['remarks']);


$sql= "insert sub_speciality values ('','$inst_orig','$user_id','$ben_fname','$gender','$nationality','$university','$start_date','$comp_date','$spec','$phone','$email','$sponsor1','$sponsor2','$sponsor3','$remarks',NOW())";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());






header ("Location:home.php?addsubspecialityreport=addsubspecialityreport&addsubconfirm=1");

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


