<?php
#include connection
 include ('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$university=mysql_real_escape_string($_POST['university']);
$country=mysql_real_escape_string($_POST['country']);
$date=mysql_real_escape_string($_POST['date']);
$venue=mysql_real_escape_string($_POST['venue']);
$topic=mysql_real_escape_string($_POST['topic']);
$total_part=mysql_real_escape_string($_POST['total_part']);
$male_part=mysql_real_escape_string($_POST['male_part']);
$female_part=mysql_real_escape_string($_POST['female_part']);
$facillitator=mysql_real_escape_string($_POST['facillitator']);
$sponsor1=mysql_real_escape_string($_POST['sponsor1']);
$sponsor2=mysql_real_escape_string($_POST['sponsor2']);
$sponsor3=mysql_real_escape_string($_POST['sponsor3']);
$remarks=mysql_real_escape_string($_POST['remarks']);







$sql= "insert cdp values ('','$university','$user_id','$country','$date','$venue','$topic','$total_part','$male_part','$female_part','$facillitator','$sponsor1','$sponsor2','$sponsor3','$remarks',NOW())";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());






header ("Location:home.php?addcpdreport=addcpdreport&addcdpconfirm=1");

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


