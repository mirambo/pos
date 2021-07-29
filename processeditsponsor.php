<?php
#include connection
include ('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$p=$_GET['p'];
$x=$_GET['x'];
$curr_name=mysql_real_escape_string($_POST['curr_name']);
$curr_initials=mysql_real_escape_string($_POST['curr_initials']);
$curr_rate=mysql_real_escape_string($_POST['curr_rate']);

$id=$_GET['curr_id'];

/*$sql= "update currency set curr_name='$curr_name',curr_initials='$curr_initials',curr_rate='$curr_rate' where curr_id='$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());*/

$sql= "insert into currency values ('','$curr_name','$curr_initials','$curr_rate',NOW())";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());



if ($p==1)
{
header ("Location:home.php?bnprocesspayroll=bnprocesspayroll");
}
elseif($x==1)
{
header ("Location:home.php?bnprocessexppayroll=bnprocessexppayroll");
}
else
{
header ("Location:home.php?editsponsor=editsponsor&curr_id=$id&editsponsorconfirm=1");

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


