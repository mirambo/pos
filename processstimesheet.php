<?php
#include connection
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$project_id=mysql_real_escape_string($_POST['project_id']);
$timesheet_date=mysql_real_escape_string($_POST['timesheet_date']);



$queryprof="select * from staff_timesheet where project_id='$project_id' AND timesheet_date='$timesheet_date'";
$resultsprof=mysql_query($queryprof) or die ("Error: $queryprof.".mysql_error());
$numrowscomp=mysql_num_rows($resultsprof);



if ($numrowscomp>0)

{

header ("Location:home.php?stafftimesheet=stafftimesheet&recordexist=1");

}


else
{

foreach($_POST['staff'] as $row=>$staff)
{   
    $timesheet_date=mysql_real_escape_string($_POST['timesheet_date']);
    $project_id=mysql_real_escape_string($_POST['project_id']);
    $staff=mysql_real_escape_string($staff);
    $time_sheet=mysql_real_escape_string($_POST['time_sheet'][$row]);
	
    


$sql3="INSERT INTO staff_timesheet VALUES('', '$staff','$project_id','$timesheet_date','$time_sheet',NOW(),'0')" or die(mysql_error());
$results3= mysql_query($sql3) or die ("Error $sql3.".mysql_error());


}

}


header ("Location:home.php?stafftimesheet=stafftimesheet&addconfirm=1");






mysql_close($cnn);


?>


