<?php
#include connection
include ('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$sub_speciality_id=$_GET['sub_speciality_id'];
$orig_inst=mysql_real_escape_string($_POST['orig_inst']);
$ben_fname=mysql_real_escape_string($_POST['ben_fname']);
$gender=mysql_real_escape_string($_POST['gender']);
$nationality=mysql_real_escape_string($_POST['nationality']);
$university=mysql_real_escape_string($_POST['university']);
$start_date=mysql_real_escape_string($_POST['start_date']);
$comp_date=mysql_real_escape_string($_POST['comp_date']);
$spec=mysql_real_escape_string($_POST['spec']);
$phone=mysql_real_escape_string($_POST['phone']);
$email=mysql_real_escape_string($_POST['email']);
$sponsor1=mysql_real_escape_string($_POST['sponsor1']);
$sponsor2=mysql_real_escape_string($_POST['sponsor2']);
$sponsor3=mysql_real_escape_string($_POST['sponsor3']);
$remarks=mysql_real_escape_string($_POST['remarks']);
 
 

$sqlupdt= "UPDATE sub_speciality SET institution_id='$orig_inst',ben_fname='$ben_fname',gender='$gender',nationality='$nationality',university_id='$university',start_date='$start_date',comp_date='$comp_date',
subspecility_area='$spec',phone='$phone',email='$email',sponsor1='$sponsor1',sponsor2='$sponsor2',sponsor3='$sponsor3' ,remarks='$remarks' where sub_speciality_id='$sub_speciality_id'";
$resultsupdt= mysql_query($sqlupdt) or die ("Error $sqlupdt.".mysql_error());



header ("Location:home.php?home.php&admineditsubspeciality=admineditsubspeciality&sub_speciality_id=$sub_speciality_id&editsuccess=1");


mysql_close($cnn);

?>


