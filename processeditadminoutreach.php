<?php
#include connection
include ('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
 $outreach_record_id=$_GET['outreach_record_id'];
 $diagnosis_id=$_GET['diagnosis_id'];
 $university=mysql_real_escape_string($_POST['university']);
 $date_from=mysql_real_escape_string($_POST['date_from']);
 $date_to=mysql_real_escape_string($_POST['date_to']);
 $outreach_loc=mysql_real_escape_string($_POST['outreach_loc']);
 $fuc_male=mysql_real_escape_string($_POST['fuc_male']);
 $fuc_female=mysql_real_escape_string($_POST['fuc_female']);
 $res_male=mysql_real_escape_string($_POST['res_male']);
 $res_female=mysql_real_escape_string($_POST['res_female']);
 $pat_male=mysql_real_escape_string($_POST['pat_male']);
 $pat_female=mysql_real_escape_string($_POST['pat_female']);
 $pat_child=mysql_real_escape_string($_POST['pat_child']);
 $disease_id=mysql_real_escape_string($_POST['disease']);
 $total_pat=mysql_real_escape_string($_POST['total_pat']);
 $male_pat=mysql_real_escape_string($_POST['male_pat']);
 $female_pat=mysql_real_escape_string($_POST['female_pat']);
 $child_pat=mysql_real_escape_string($_POST['child_pat']);
 $remarks=mysql_real_escape_string($_POST['remarks']);
 
 

$sqlupdt= "UPDATE outreach_record SET institution_id='$university',date_from='$date_from',date_to='$date_to',location='$outreach_loc',fac_male='$fuc_male',fac_female='$fuc_female',
res_male='$res_male',res_female='$res_female',pat_male='$pat_male',pat_female='$pat_female',pat_child='$pat_child' where outreach_record_id='$outreach_record_id'";
$resultsupdt= mysql_query($sqlupdt) or die ("Error $sqlupdt.".mysql_error());


$sqlupdtd= "UPDATE diagnosis SET disease_id='$disease_id',total_pat='$total_pat',male_pat='$male_pat',female_pat='$female_pat',child_pat='$child_pat',remarks='$remarks' where diagnosis_id='$diagnosis_id'";
$resultsupdtd= mysql_query($sqlupdtd) or die ("Error $sqlupdtd.".mysql_error());

header ("Location:home.php?admineditoutreach=admineditoutreach&editconfirm=1&outreach_record_id=$outreach_record_id");


mysql_close($cnn);

?>


