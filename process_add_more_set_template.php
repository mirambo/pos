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
$location_id=mysql_real_escape_string($_POST['location_id']);
$query1="SELECT * from nrc_location where location_id=$location_id ";
$results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
$rows1=mysql_fetch_object($results1);

$country_id=$rows1->country_id;
$area_id=$rows1->area_id;

$cc_id=mysql_real_escape_string($_POST['cc_id']);
$sub_project_id=mysql_real_escape_string($_POST['sub_project_id']);
$project_id=mysql_real_escape_string($_POST['project_id']);
$set_template_id=mysql_real_escape_string($_POST['set_template_id']);

 
$sql3="INSERT INTO nrc_set_template VALUES('','$location_id','$area_id','$country_id','$cc_id','$project_id','$sub_project_id','$activity','$target','$target_male','$target_female')" or die(mysql_error());
$results3= mysql_query($sql3) or die ("Error $sql3.".mysql_error());



header ("Location:home.php?viewsetuptemplate=viewsetuptemplate&location_id=$location_id&cc_id=$cc_id&sub_project_id=$sub_project_id&editsuccess=1");






mysql_close($cnn);

?>


