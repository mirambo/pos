<?php
#include connection
include ('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$id=$_GET['form_field_id'];
$form_section=mysql_real_escape_string($_POST['form_section']);
$field_name=mysql_real_escape_string($_POST['field_name']);
$form_type=mysql_real_escape_string($_POST['form_type']);
$sort_order=mysql_real_escape_string($_POST['sort_order']);


 
$sqlupdt= "UPDATE form_fields SET form_section_id ='$form_section',	form_field_name='$field_name',form_field_type='$form_type',sort_order='$sort_order' WHERE form_field_id='$id'";
$resultsupdt= mysql_query($sqlupdt) or die ("Error $sqlupdt.".mysql_error());



header ("Location:home.php?editformfields=editformfields&form_field_id=$id&editsuccess=1");


mysql_close($cnn);

?>


