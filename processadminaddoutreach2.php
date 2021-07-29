<?php
#include connection
include ('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
 $prev_bunch_id=$_GET['original_bunch_id'];
 $bunch_id=$_GET['bunch_id'];
 $local_based_office=mysql_real_escape_string($_POST['local_based_office']);
 $expertriate_office=mysql_real_escape_string($_POST['expertriate_office']);
 $local_based_field=mysql_real_escape_string($_POST['local_based_field']);
 $expertriate_field=mysql_real_escape_string($_POST['expertriate_field']);
 
 

$queryprof="select * from assigned_staff where bunch_id='$bunch_id' and emp_id='$local_based_office' and 
emp_id='$expertriate_office' and emp_id='$local_based_field' AND emp_id='$expertriate_field'";
$resultsprof=mysql_query($queryprof) or die ("Error: $queryprof.".mysql_error());
								  
$rowsprof=mysql_fetch_object($resultsprof);

$numrowscomp=mysql_num_rows($resultsprof);
 
 //$f_namecomp=$rowsprof->f_name;
 //$l_namecomp=$rowsprof->l_name;
 $emailcomp=$rowsprof->email;
 //$usernamecomp=$rowsprof->username;


if ($numrowscomp>0)

{

 header ("Location:home.php?adminoutreach2=adminoutreach2&bunch_id=$bunch_id&exist=1");

}

else
{
 

$sql= "insert into assigned_staff values ('','$prev_bunch_id','$bunch_id','$local_based_office','0')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sql= "insert into assigned_staff values ('','$prev_bunch_id','$bunch_id','$expertriate_office','0')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sql= "insert into assigned_staff values ('','$prev_bunch_id','$bunch_id','$local_based_field','0')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sql= "insert into assigned_staff values ('','$prev_bunch_id','$bunch_id','$expertriate_field','0')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

//if replacement



$sqlupdt= "UPDATE employees SET status='1' where emp_id='$local_based_office'";
$resultsupdt= mysql_query($sqlupdt) or die ("Error $sqlupdt.".mysql_error());

$sqlupdt= "UPDATE employees SET status='1' where emp_id='$expertriate_office'";
$resultsupdt= mysql_query($sqlupdt) or die ("Error $sqlupdt.".mysql_error());

$sqlupdt= "UPDATE employees SET status='1' where emp_id='$local_based_field'";
$resultsupdt= mysql_query($sqlupdt) or die ("Error $sqlupdt.".mysql_error());

$sqlupdt= "UPDATE employees SET status='1' where emp_id='$expertriate_field'";
$resultsupdt= mysql_query($sqlupdt) or die ("Error $sqlupdt.".mysql_error());

if ($prev_bunch_id!='')
{
$sql= "insert into temp_assigned_staff values ('','$prev_bunch_id','$bunch_id','$local_based_office','0')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sql= "insert into temp_assigned_staff values ('','$prev_bunch_id','$bunch_id','$expertriate_office','0')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sql= "insert into temp_assigned_staff values ('','$prev_bunch_id','$bunch_id','$local_based_field','0')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sql= "insert into temp_assigned_staff values ('','$prev_bunch_id','$bunch_id','$expertriate_field','0')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


$sqlupdtb= "UPDATE assigned_staff SET status='r' where bunch_id='$prev_bunch_id'";
$resultsupdtb= mysql_query($sqlupdtb) or die ("Error $sqlupdtb.".mysql_error());


}

header ("Location:home.php?adminoutreach2=adminoutreach2&addoutreachconfirm=1&bunch_id=$bunch_id");

}


mysql_close($cnn);

?>


