<?php
#include connection
include ('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form

$latest_project_id=mysql_real_escape_string($_POST['project_id']);
$settlement_id=mysql_real_escape_string($_POST['settlement_id']);

$sqlprof= "SELECT * from nrc_projectvssettlement where settlement_id='$settlement_id' AND project_id='$latest_project_id'";
$resultsprof= mysql_query($sqlprof) or die ("Error $sqlpo.".mysql_error());
$rowsprof=mysql_num_rows($resultsprof);

if ($rowsprof>0)
{
header ("settlement:home.php?viewprojectsettlement=viewprojectsettlement&recordexist=1");
}
else
{
 
$sql3="INSERT INTO nrc_projectvssettlement VALUES('', '$latest_project_id','$latest_alloc_id', '$settlement_id')" or die(mysql_error());
$results3= mysql_query($sql3) or die ("Error $sql3.".mysql_error());

header ("Location:home.php?viewprojectsettlement=viewprojectsettlement");

}



mysql_close($cnn);

?>


