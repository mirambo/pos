<?php
#include connection
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
//$updt_uname=mysql_real_escape_string($_POST['updt_uname']);
//$updt_pword=mysql_real_escape_string($_POST['updt_pword']);
$id=$_GET['shipper_id'];





$sql= "delete from shippers where shipper_id='$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());



header ("Location:view_ship.php? deleteconfirm=1");



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


