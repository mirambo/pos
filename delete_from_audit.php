<?php
#include connection
include('Connections/fundmaster.php');
include('includes/session.php');


// code for deleting donors

//////////////////////////////////////////////////////////////////////////////////////////////// Peter Section
$donor_id=$_GET['donor_id'];
function delete_donor($donor_id,$user_id)
{
$sql= "delete from nrc_donor  where donor_id='$donor_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
$sql2= "delete from nrc_donor_details  where donor_id='$donor_id'";
$results2= mysql_query($sql2) or die ("Error $sql2.".mysql_error());

$sqlauditsav= "insert into audit_trails values('','$user_id',NOW(),'Deleted a donor from the system')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());


header ("Location:home.php?viewuniversity=viewuniversity&deleteuniversityconfirm=1");

mysql_close($cnn);
}

//delete submission period
$submission_period_id=$_GET['submission_period_id'];
function delete_period($submission_period_id,$user_id)
{
$sql= "delete from nrc_report_period where period_id='$submission_period_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

header ("Location:home.php?view_submission_period=view_submission_period&deleteuniversityconfirm=1");

mysql_close($cnn);
}



//deassign project from donor
function delete_donor_project($donor_id,$user_id)
{



foreach($_POST['donor_id'] as $row=>$donor_id)
{   

	
$donor_id=mysql_real_escape_string($_POST['donor_id'][$row]);
$project_id=mysql_real_escape_string($_POST['project_id'][$row]);
	
    
//  Check Redudancy

$sql= "delete from nrc_donorvsproject where donor_id='$donor_id' AND project_id='$project_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sqlauditsav= "insert into audit_trails values('','$user_id',NOW(),'Deleted a donor from the system')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());

header ("donor:home.php?viewprojectdonor=viewprojectdonor");

}

mysql_close($cnn);
}










// code for deleting project
$project_id=$_GET['project_id'];
function delete_project($project_id,$user_id)
{
// delete from projects table
$sql= "delete from nrc_project  where project_id='$project_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
// delete associated records in projectvsarea table
$sql2= "delete from nrc_projectvsarea  where project_id='$project_id'";
$results2= mysql_query($sql2) or die ("Error $sql2.".mysql_error());
//delete associated records from project vs location
$sql3= "delete from nrc_projectvslocation  where project_id='$project_id'";
$results3= mysql_query($sql3) or die ("Error $sql3.".mysql_error());
//delete associated records in projectvssettlement
$sql4= "delete from nrc_projectvssettlement  where project_id='$project_id'";
$results4= mysql_query($sql4) or die ("Error $sql4.".mysql_error());



header ("Location:home.php?viewproject=viewproject&deleteprojectconfirm=1");

mysql_close($cnn);
}
$cc_id=$_GET['cc_id'];
function delete_competency($cc_id,$user_id)
{
$sql= "delete from nrc_cc  where cc_id='$cc_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());




header ("Location:home.php?viewcompetency=viewcompetency&deletecompetencyconfirm=1");

mysql_close($cnn);
}
$sub_project_id=$_GET['sub_project_id'];
function delete_subproject($sub_project_id,$user_id)
{
// delete from projects table
$sql= "delete from nrc_sub_project  where sub_project_id='$sub_project_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
// delete associated records in subprojectvsarea table
$sql2= "delete from nrc_subprojectvsarea  where sub_project_id='$sub_project_id'";
$results2= mysql_query($sql2) or die ("Error $sql2.".mysql_error());
//delete associated records from project vs location
$sql3= "delete from nrc_subprojectvslocation  where sub_project_id='$sub_project_id'";
$results3= mysql_query($sql3) or die ("Error $sql3.".mysql_error());
//delete associated records in projectvssettlement
$sql4= "delete from nrc_subprojectvssettlement  where sub_project_id='$sub_project_id'";
$results4= mysql_query($sql4) or die ("Error $sql4.".mysql_error());



header ("Location:home.php?viewsubproject=viewsubproject&deletesubprojectconfirm=1");

mysql_close($cnn);
}

//////////////////////////////////////////////////////////////////////////////////////////////// End Of Peter Section


//////////////////////////////////////////////////////////////////////////////////////////////// Griffins Section


$country_id=$_GET['country_id'];
function delete_country($country_id,$user_id)
{
$sql= "delete from nrc_country where country_id='$country_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


header ("Location:home.php?viewcountries=viewcountries&delete=1");

mysql_close($cnn);
}




$area_id=$_GET['area_id'];
function delete_area($area_id,$user_id)
{
$sql= "delete from nrc_area where area_id='$area_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


header ("Location:home.php?viewsponsor=viewsponsor&delete=1");

mysql_close($cnn);
}



// delete locations
$location_id=$_GET['location_id'];
function delete_location($location_id,$user_id)
{
$sql= "delete from nrc_location where location_id='$location_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


header ("Location:home.php?viewlocation=viewlocation&delete=1");

mysql_close($cnn);
}


// delete settlement
$settlement_id=$_GET['settlement_id'];
function delete_settlement($settlement_id,$user_id)
{
$sql= "delete from nrc_settlement where settlement_id='$settlement_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


header ("Location:home.php?viewsettlements=viewsettlements&delete=1");

mysql_close($cnn);
}

//delete ccountry from project
function delete_country_project($country_id,$user_id)
{



foreach($_POST['country_id'] as $row=>$country_id)
{   

	
$country_id=mysql_real_escape_string($_POST['country_id'][$row]);
$project_id=mysql_real_escape_string($_POST['project_id'][$row]);
	
    
//  Check Redudancy

$sql= "delete from nrc_projectvscountry where country_id='$country_id' AND project_id='$project_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

header ("Location:home.php?viewprojectcountry=viewprojectcountry");

}

mysql_close($cnn);
}




//delete area from project
function delete_area_project($area_id,$user_id)
{



foreach($_POST['area_id'] as $row=>$area_id)
{   

	
$area_id=mysql_real_escape_string($_POST['area_id'][$row]);
$project_id=mysql_real_escape_string($_POST['project_id'][$row]);
	
    
//  Check Redudancy

$sql= "delete from nrc_projectvsarea where area_id='$area_id' AND project_id='$project_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

header ("Location:home.php?viewprojectarea=viewprojectarea");

}

mysql_close($cnn);
}


//delete location from project
function delete_location_project($location_id,$user_id)
{



foreach($_POST['location_id'] as $row=>$location_id)
{   

	
$location_id=mysql_real_escape_string($_POST['location_id'][$row]);
$project_id=mysql_real_escape_string($_POST['project_id'][$row]);
	
    
//  Check Redudancy

$sql= "delete from nrc_projectvslocation where location_id='$location_id' AND project_id='$project_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

header ("Location:home.php?viewprojectlocation=viewprojectlocation");

}

mysql_close($cnn);
}






function delete_settlement_project($settlement_id,$user_id)
{



foreach($_POST['settlement_id'] as $row=>$settlement_id)
{   

	
$settlement_id=mysql_real_escape_string($_POST['settlement_id'][$row]);
$project_id=mysql_real_escape_string($_POST['project_id'][$row]);
	
    
//  Check Redudancy

$sql= "delete from nrc_projectvssettlement where settlement_id='$settlement_id' AND project_id='$project_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

header ("Location:home.php?viewprojectsettlement=viewprojectsettlement");

}

mysql_close($cnn);
}



function delete_country_sub_project($country_id,$user_id)
{



foreach($_POST['country_id'] as $row=>$country_id)
{   

	
$country_id=mysql_real_escape_string($_POST['country_id'][$row]);
$sub_project_id=mysql_real_escape_string($_POST['sub_project_id'][$row]);
	
    
//  Check Redudancy

$sql= "delete from nrc_subprojectvscountry where country_id='$country_id' AND sub_project_id='$sub_project_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

header ("Location:home.php?viewsubprojectcountry=viewsubprojectcountry");

}

mysql_close($cnn);
}



function delete_area_sub_project($area_id,$user_id)
{



foreach($_POST['area_id'] as $row=>$area_id)
{   

	
$area_id=mysql_real_escape_string($_POST['area_id'][$row]);
$sub_project_id=mysql_real_escape_string($_POST['sub_project_id'][$row]);
	
    
//  Check Redudancy

$sql= "delete from nrc_subprojectvsarea where area_id='$area_id' AND sub_project_id='$sub_project_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

header ("Location:home.php?viewsubprojectarea=viewsubprojectarea");

}

mysql_close($cnn);
}


function delete_location_sub_project($location_id,$user_id)
{



foreach($_POST['location_id'] as $row=>$location_id)
{   

	
$location_id=mysql_real_escape_string($_POST['location_id'][$row]);
$sub_project_id=mysql_real_escape_string($_POST['sub_project_id'][$row]);
	
    
//  Check Redudancy

$sql= "delete from nrc_subprojectvslocation where location_id='$location_id' AND sub_project_id='$sub_project_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

header ("Location:home.php?viewsubprojectlocation=viewsubprojectlocation");

}

mysql_close($cnn);
}

function delete_settlement_sub_project($settlement_id,$user_id)
{



foreach($_POST['settlement_id'] as $row=>$settlement_id)
{   

	
$settlement_id=mysql_real_escape_string($_POST['settlement_id'][$row]);
$sub_project_id=mysql_real_escape_string($_POST['sub_project_id'][$row]);
	
    
//  Check Redudancy

$sql= "delete from nrc_subprojectvssettlement where settlement_id='$settlement_id' AND sub_project_id='$sub_project_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

header ("Location:home.php?viewsubprojectsettlement=viewsubprojectsettlement");

}

mysql_close($cnn);
}


//////////////////////////////////////////////////////////////////////////////////////////////// End Griffins Section
?>


