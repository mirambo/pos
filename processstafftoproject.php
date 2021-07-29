<?php
#include connection
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$project=mysql_real_escape_string($_POST['project']);
$project_manager=mysql_real_escape_string($_POST['project_manager']);
$start_date=mysql_real_escape_string($_POST['start_date']);
$end_date=mysql_real_escape_string($_POST['end_date']);




foreach($_POST['staff'] as $row=>$staff)
{   
	$start_date=mysql_real_escape_string($_POST['start_date']);
	$end_date=mysql_real_escape_string($_POST['end_date']);
	$project_manager=mysql_real_escape_string($_POST['project_manager']);
    $project=mysql_real_escape_string($_POST['project']);
    $staff=mysql_real_escape_string($staff);
    $job_loc=mysql_real_escape_string($_POST['job_loc'][$row]);
	$segment=mysql_real_escape_string($_POST['segment'][$row]);
    
//  $paxcur = $pax - $row;

$sql3="INSERT INTO assigned_staffold VALUES('', '$project', ' $project_manager','$start_date','$end_date', '$staff', '$job_loc','$segment','0')" or die(mysql_error());
$results3= mysql_query($sql3) or die ("Error $sql3.".mysql_error());


$sqldt="UPDATE employees SET status='1' where emp_id='$staff'";
$resultsdt= mysql_query($sqldt) or die ("Error $sqldt.".mysql_error());

}


$sqlp="UPDATE projects SET status='1' where project_id='$project'";
$resultsp= mysql_query($sqlp) or die ("Error $sqlp.".mysql_error());


$sqlp="UPDATE employees SET status='1' where emp_id='$project_manager'";
$resultsp= mysql_query($sqlp) or die ("Error $sqlp.".mysql_error());



header ("Location:home.php?stafftoprojects=stafftoprojects&addconfirm=1");






mysql_close($cnn);


?>


