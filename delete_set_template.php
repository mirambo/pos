<?php
#include connection
include ('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$activity=mysql_real_escape_string($_POST['activity']);
$target_male=mysql_real_escape_string($_POST['target_male']);
$target_female=mysql_real_escape_string($_POST['target_female']);
$target=mysql_real_escape_string($_POST['target']);
$location_id=$_GET['location_id'];
$cc_id=$_GET['cc_id'];
$sub_project_id=$_GET['sub_project_id'];
$set_template_id=$_GET['set_template_id'];

 
$sqlupdt= "DELETE FROM nrc_set_template WHERE set_template_id='$set_template_id'";
$resultsupdt= mysql_query($sqlupdt) or die ("Error $sqlupdt.".mysql_error());



header ("Location:home.php?viewsetuptemplate=viewsetuptemplate&location_id=$location_id&cc_id=$cc_id&sub_project_id=$sub_project_id&editsuccess=1");






mysql_close($cnn);

?>


