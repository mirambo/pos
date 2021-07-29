<?php
#include connection
include ('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$post_grad_scholarship_id=$_GET['post_grad_scholarship_id'];
$university=mysql_real_escape_string($_POST['university']);
$stud_fname=mysql_real_escape_string($_POST['stud_fname']);
$gender=mysql_real_escape_string($_POST['gender']);
$nationality=mysql_real_escape_string($_POST['nationality']);
$adm_year=mysql_real_escape_string($_POST['adm_year']);
$comp_year=mysql_real_escape_string($_POST['comp_year']);
$sponsor1=mysql_real_escape_string($_POST['sponsor1']);
$sponsor2=mysql_real_escape_string($_POST['sponsor2']);
$sponsor3=mysql_real_escape_string($_POST['sponsor3']);
$phone=mysql_real_escape_string($_POST['phone']);
$email=mysql_real_escape_string($_POST['email']);
$remarks=mysql_real_escape_string($_POST['remarks']);
 


$sqlupdt= "UPDATE post_grad_scholarship SET institution_id='$university', full_name='$stud_fname',gender='$gender',nationality='$nationality',admin_year='$adm_year',comp_year='$comp_year',
sponsor1='$sponsor1',sponsor2 ='$sponsor2',sponsor3='$sponsor3',phone='$phone',email='$email',remarks='$remarks' where post_grad_scholarship_id='$post_grad_scholarship_id'";
$resultsupdt= mysql_query($sqlupdt) or die ("Error $sqlupdt.".mysql_error());



header ("Location:home.php?admineditpostgraduate=admineditpostgraduate&post_grad_scholarship_id=$post_grad_scholarship_id&editsuccess=1");


mysql_close($cnn);

?>


