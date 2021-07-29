<?php
#include connection
include ('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form

$latest_sub_project_id=mysql_real_escape_string($_POST['sub_project_id']);

$sqlproj= "SELECT * from nrc_sub_project where sub_project_id='$latest_sub_project_id'";
$resultsproj= mysql_query($sqlproj) or die ("Error $sqlproj.".mysql_error());
$rowsproj=mysql_fetch_object($resultsproj);
$project_id=$rowsproj->project_id;



$location_id=mysql_real_escape_string($_POST['location_id']);

$sqlprof= "SELECT * from nrc_subprojectvslocation where location_id='$location_id' AND sub_project_id='$latest_sub_project_id'";
$resultsprof= mysql_query($sqlprof) or die ("Error $sqlpo.".mysql_error());
$rowsprof=mysql_num_rows($resultsprof);

if ($rowsprof>0)
{
header ("Location:home.php?viewsubprojectlocation=viewsubprojectlocation&recordexist=1");
}
else
{
 
$sql3="INSERT INTO nrc_subprojectvslocation VALUES('', '$project_id','$latest_sub_project_id','$latest_alloc_id', '$location_id')" or die(mysql_error());
$results3= mysql_query($sql3) or die ("Error $sql3.".mysql_error());

header ("Location:home.php?viewsubprojectlocation=viewsubprojectlocation");

}



mysql_close($cnn);

?>


