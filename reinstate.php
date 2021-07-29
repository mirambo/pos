<?php
#include connection
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
//$u_fname=mysql_real_escape_string($_POST['u_fname']);
//$u_lname=mysql_real_escape_string($_POST['u_lname']);
//$u_email=mysql_real_escape_string($_POST['u_email']);
//$dept=mysql_real_escape_string($_POST['dept']);
//$u_name=mysql_real_escape_string($_POST['u_pwrd']);
//$u_pwrd=mysql_real_escape_string($_POST['u_pwrd']);
//$u_cwrd=mysql_real_escape_string($_POST['u_cwrd']);


$emp_id=$_GET['emp_id'];





$sqlstch="update employees set terminate='0'  where emp_id='$emp_id'";
$resultsstch= mysql_query($sqlstch) or die ("Error $sqlstch.".mysql_error());

$sqlstch="update users set suspend ='0'  where emp_id='$emp_id'";
$resultsstch= mysql_query($sqlstch) or die ("Error $sqlstch.".mysql_error());


//echo $cus_fname;

//$realdob= dateconvert($dob, 1);
//$realdob = date('Y-m-d', strtotime($dob));


//$sql= "insert into users values('','$u_fname','$u_lname','$u_email','$dept','$u_name','$u_pwrd','1')";
//$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


header ("Location:home.php?viewpostgraduate=viewpostgraduate");










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

//}
mysql_close($cnn);


?>


