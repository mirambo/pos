<?php
#include connection
include ('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$job_cat_name=mysql_real_escape_string($_POST['job_cat_name']); 


$id=$_GET['job_cat_id'];

$sql= "update job_category set job_cat_name='$job_cat_name' where job_cat_id='$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

header ("Location:home.php?editinstoffer=editinstoffer&job_cat_id=$id&editinstofferconfirm=1");

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


