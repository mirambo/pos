<?php
include('includes/session.php');
include('Connections/fundmaster.php');

echo $PoNumber=mysql_real_escape_string($_POST['nameddd']);

/*
foreach($_POST['area_id'] as $row=>$AreaID)
{

$area_id=mysql_real_escape_string($AreaID);
	
 $PoNumber=mysql_real_escape_string($_POST['PoNumber']);
	
$sqlsprojid= "SELECT * from nrc_sub_project where sub_project_name='$PoNumber'";
$resultssprojid=mysql_query($sqlsprojid) or die ("Error $sqlsprojid.".mysql_error());
$rowssprojid=mysql_fetch_object($resultssprojid);	
		
$latest_sub_project_id=$rowssprojid->sub_project_id;
$project_id=$rowssprojid->project_id;	


	//$latest_sub_project_id=mysql_real_escape_string($_POST['sub_project_id']);
$latest_alloc_id=mysql_real_escape_string($_POST['alloc_id']);
	
	
	

    
//    $paxcur = $pax - $row;


$sqlprof= "SELECT * from nrc_subprojectvsarea where area_id='$area_id' AND sub_project_id='$latest_sub_project_id'";
$resultsprof= mysql_query($sqlprof) or die ("Error $sqlpo.".mysql_error());
$rowsprof=mysql_num_rows($resultsprof);

if ($rowsprof>0)
{
header ("Location:home.php?assignsubprojectarea=assignsubprojectarea&latest_alloc_id=$latest_alloc_id&sub_project_id=$latest_sub_project_id&recordexist=1");
}
else
{




$sql3="INSERT INTO nrc_subprojectvsarea VALUES('', '$project_id','$latest_sub_project_id','$latest_alloc_id', '$area_id')" or die(mysql_error());
$results3= mysql_query($sql3) or die ("Error $sql3.".mysql_error());

header ("Location:home.php?assignsubprojectlocation=assignsubprojectlocation&latest_alloc_id=$latest_alloc_id&sub_project_id=$latest_sub_project_id");
}
*/
//}

?>