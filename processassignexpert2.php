<?php
#include connection
include ('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
 $job_cat_id=$_GET['job_cat_id'];
 $prev_bunch_id=$_GET['original_bunch_id'];
 $om_bunch_id=$_GET['om_bunch_id'];
 $omstaff_id=mysql_real_escape_string($_POST['omstaff_id']);
 $omjob_title_id=mysql_real_escape_string($_POST['omjob_title_id']);

 
 



$sql= "insert into om_assigned_staff values ('','$prev_om_bunch_id','$om_bunch_id','$omstaff_id','$omjob_title_id','0')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sqlupdt= "UPDATE omstaff SET status='1' where omstaff_id='$omstaff_id'";
$resultsupdt= mysql_query($sqlupdt) or die ("Error $sqlupdt.".mysql_error());

//if replacement




/*
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


}*/

header ("Location:home.php?assignexperts2=assignexperts2&addconfirm=1&job_cat_id=$job_cat_id&om_bunch_id=$om_bunch_id&original_om_bunch_id=$prev_bunch_id");




mysql_close($cnn);

?>


