<?php
#include connection
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
//$updt_uname=mysql_real_escape_string($_POST['updt_uname']);
//$updt_pword=mysql_real_escape_string($_POST['updt_pword']);
$benefit_id=$_GET['benefit_id'];
$payroll_id=$_GET['payroll_id'];
$emp_id=$_GET['emp_id'];
$current_month=$_GET['current_month'];
$approve=$_GET['approve'];




$sql= "delete from benefits where benefit_id='$benefit_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

if ($approve==1)
{
header ("Location:approve_payslip.php?payroll_id=$payroll_id&approve=1");
}
else
{

header ("Location:payroll_details.php?emp_id=$emp_id&current_month=$current_month&payroll_id=$payroll_id");

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


