<?php
#include connection
include ('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form

$latest_project_id=mysql_real_escape_string($_POST['project_id']);
$location_id=mysql_real_escape_string($_POST['location_id']);

$sqlprof= "SELECT * from nrc_projectvslocation where location_id='$location_id' AND project_id='$latest_project_id'";
$resultsprof= mysql_query($sqlprof) or die ("Error $sqlpo.".mysql_error());
$rowsprof=mysql_num_rows($resultsprof);

if ($rowsprof>0)
{
header ("Location:home.php?viewprojectlocation=viewprojectlocation&recordexist=1");
}
else
{
 
$sql3="INSERT INTO nrc_projectvslocation VALUES('', '$latest_project_id','$latest_alloc_id', '$location_id')" or die(mysql_error());
$results3= mysql_query($sql3) or die ("Error $sql3.".mysql_error());

header ("Location:home.php?viewprojectlocation=viewprojectlocation");

}



mysql_close($cnn);

?>


