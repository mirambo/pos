<?php
#include connection
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$sub_contractor=mysql_real_escape_string($_POST['sub_contractor']);
$subcon_date=mysql_real_escape_string($_POST['subcon_date']);
$project=mysql_real_escape_string($_POST['project']);
$project_manager=mysql_real_escape_string($_POST['project_manager']);



foreach($_POST['staff'] as $row=>$staff)

{   $project_manager=mysql_real_escape_string($_POST['project_manager']);
	$sub_contractor=mysql_real_escape_string($_POST['sub_contractor']);
	$subcon_date=mysql_real_escape_string($_POST['subcon_date']);
    $project=mysql_real_escape_string($_POST['project']);
    $staff=mysql_real_escape_string($staff);
    $job_loc=mysql_real_escape_string($_POST['job_loc'][$row]);
	$segment=mysql_real_escape_string($_POST['segment'][$row]);
    
//    $paxcur = $pax - $row;

$sql3="INSERT INTO assigned_subcon_staff VALUES('', '$project','$sub_contractor','$subcon_date',' $project_manager', '$staff', '$job_loc','$segment','0')" or die(mysql_error());
$results3= mysql_query($sql3) or die ("Error $sql3.".mysql_error());


$sqldt="UPDATE omstaff SET status='1' where omstaff_id='$staff'";
$resultsdt= mysql_query($sqldt) or die ("Error $sqldt.".mysql_error());

}


/*$sqlp="UPDATE projects SET status='1' where project_id='$project'";
$resultsp= mysql_query($sqlp) or die ("Error $sqlp.".mysql_error());


$sqlp="UPDATE employees SET status='1' where emp_id='$project_manager'";
$resultsp= mysql_query($sqlp) or die ("Error $sqlp.".mysql_error());*/



header ("Location:home.php?assingomstaff=assingomstaff&addconfirm=1");






mysql_close($cnn);


?>


