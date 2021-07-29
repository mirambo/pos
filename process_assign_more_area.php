<?php
#include connection
include ('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form

$latest_project_id=mysql_real_escape_string($_POST['project_id']);
$area_id=mysql_real_escape_string($_POST['area_id']);

$sqlprof= "SELECT * from nrc_projectvsarea where area_id='$area_id' AND project_id='$latest_project_id'";
$resultsprof= mysql_query($sqlprof) or die ("Error $sqlpo.".mysql_error());
$rowsprof=mysql_num_rows($resultsprof);

if ($rowsprof>0)
{
header ("Location:home.php?viewprojectarea=viewprojectarea&recordexist=1");
}
else
{
 
$sql3="INSERT INTO nrc_projectvsarea VALUES('', '$latest_project_id','$latest_alloc_id', '$area_id')" or die(mysql_error());
$results3= mysql_query($sql3) or die ("Error $sql3.".mysql_error());

header ("Location:home.php?viewprojectarea=viewprojectarea");

}



mysql_close($cnn);

?>


