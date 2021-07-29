<?php
#include connection
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$income_from=mysql_real_escape_string($_POST['income_from']);
$income_to=mysql_real_escape_string($_POST['income_to']);
$contribution_amount=mysql_real_escape_string($_POST['contribution_amount']);



$queryprof="select * from  nhif_block where nhif_max='$income_to' and nhif_min='$income_from'  and   nhif_amount='$contribution_amount'";
$resultsprof=mysql_query($queryprof) or die ("Error: $queryprof.".mysql_error());
								  
//$rowsprof=mysql_fetch_object($resultsprof);

$numrowscomp=mysql_num_rows($resultsprof);
 
 //$f_namecomp=$rowsprof->f_name;
 //$l_namecomp=$rowsprof->l_name;
 //$emailcomp=$rowsprof->email;
 //$usernamecomp=$rowsprof->username;


//echo $u_pwrd;

//echo $u_cpwrd;

//echo $cus_fname;

//$realdob= dateconvert($dob, 1);
//$realdob = date('Y-m-d', strtotime($dob));
if ($numrowscomp>0)

{

header ("Location:add_nhif.php? recordexist=1");

}

elseif ($income_from>$income_to)
{

header ("Location:add_nhif.php? abnormal=1");

}

else 

{



$sql= "insert into nhif_block values ('','$income_to','$income_from','$contribution_amount')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());






header ("Location:add_nhif.php? addnhifconfirm=1");

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


