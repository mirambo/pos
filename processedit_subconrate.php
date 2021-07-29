<?php
#include connection
include ('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$omjobtitle_id=$_GET['omjobtitle_id'];

$exp_staff_rate=mysql_real_escape_string($_POST['exp_staff_rate']);
$nat_staff_rate=mysql_real_escape_string($_POST['nat_staff_rate']);


$sqlupdt= "UPDATE subcon_rates SET amount='$exp_staff_rate' WHERE omjob_title_id='$omjobtitle_id' AND job_cat_id='2'";
$resultsupdt= mysql_query($sqlupdt) or die ("Error $sqlupdt.".mysql_error());

$sqlupdt= "UPDATE subcon_rates SET amount='$nat_staff_rate' WHERE omjob_title_id='$omjobtitle_id' AND job_cat_id='1'";
$resultsupdt= mysql_query($sqlupdt) or die ("Error $sqlupdt.".mysql_error());

$sqlauditsav= "insert into audit_trails values('','$user_id',NOW(),'Updated subcontractors rate in the system')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());

header ("Location:home.php?editsubconrate=editsubconrate&omjobtitle_id=$omjobtitle_id&editconfirm=1");


mysql_close($cnn);

?>


