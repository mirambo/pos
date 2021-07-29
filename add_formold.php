<?php
#include connection
include('includes/session.php');
include('Connections/fundmaster.php');

//////////////////////////////////////////////////////////////////////////////////////////////// Peter Section
//functioning for adding donors
function add_donor($donor_code,$donor_name,$contact_person,$country,$postal_address,$phone,$email,$website,$donor_desc)
{
$donor_code=mysql_real_escape_string($_POST['donor_code']);
$donor_name=mysql_real_escape_string($_POST['donor_name']);
$contact_person=mysql_real_escape_string($_POST['contact_person']);
$country=mysql_real_escape_string($_POST['country']);
$town=mysql_real_escape_string($_POST['town']);
$postal_address=mysql_real_escape_string($_POST['postal_address']);
$phone=mysql_real_escape_string($_POST['phone']);
$email=mysql_real_escape_string($_POST['email']);
$website=mysql_real_escape_string($_POST['website']);
$donor_desc=mysql_real_escape_string($_POST['donor_desc']);

$sqlprof= "SELECT * from nrc_donor where donor_name='$donor_name' OR donor_code='$donor_name'";
$resultsprof= mysql_query($sqlprof) or die ("Error $sqlpo.".mysql_error());
$rowsprof=mysql_num_rows($resultsprof);

if ($rowsprof>0)
{
header ("Location:home.php?newunivesity=newunivesity&recordexist=1");
}
else
{
$sqllpo= "insert into nrc_donor VALUES('','$donor_code','$donor_name','$contact_person','$country','$town','$postal_address','$phone','$email','$website','$donor_desc')";
$resultslpo= mysql_query($sqllpo) or die ("Error $sqllpo.".mysql_error());



$sqlprofd= "SELECT * from nrc_donor order by donor_id desc limit 1";
$resultsprofd= mysql_query($sqlprofd) or die ("Error $sqlpod.".mysql_error());
$rowsprofd=mysql_fetch_object($resultsprofd);
$latest_donor_id=$rowsprofd->donor_id;


foreach($_POST['project_id'] as $row=>$ProjectId)
{

    $project_id=mysql_real_escape_string($ProjectId);
	$latest_donor_id=$rowsprofd->donor_id;

    
//    $paxcur = $pax - $row;

$sql3="INSERT INTO nrc_donor_details VALUES('', '$latest_donor_id', '$project_id')" or die(mysql_error());
$results3= mysql_query($sql3) or die ("Error $sql3.".mysql_error());

}









header ("Location:home.php?newunivesity=newunivesity&addconfirm=1");
}
//mysql_close($cnn);

}


function assign_projectdonor($donor_id)
{


//assigning projects to donors
foreach($_POST['project_id'] as $row=>$ProjectID)
{

    $project_id=mysql_real_escape_string($ProjectID);
	$donor_id=mysql_real_escape_string($_POST['donor_id']);

    
//    $paxcur = $pax - $row;


$sqlprof= "SELECT * from nrc_donorvsproject where donor_id='$donor_id' AND project_id='$project_id'";
$resultsprof= mysql_query($sqlprof) or die ("Error $sqlpo.".mysql_error());
$rowsprof=mysql_num_rows($resultsprof);

if ($rowsprof>0)
{
header ("Location:home.php?projectdonor=projectdonor&recordexist=1");
}
else
{

$sql3="INSERT INTO nrc_donorvsproject VALUES('', '$project_id','$donor_id')" or die(mysql_error());
$results3= mysql_query($sql3) or die ("Error $sql3.".mysql_error());

header ("Location:home.php?projectdonor=projectdonor&addconfirm=1");
}

}
}
//functioning for adding projects
function add_project($project_code,$project_name,$start_date,$end_date,$project_desc,$status)
{
$project_code=mysql_real_escape_string($_POST['project_code']);
$project_name=mysql_real_escape_string($_POST['project_name']);
$start_date=mysql_real_escape_string($_POST['start_date']);
$end_date=mysql_real_escape_string($_POST['end_date']);
$project_desc=mysql_real_escape_string($_POST['project_desc']);
$status=mysql_real_escape_string($_POST['status']);
$area_id=mysql_real_escape_string($_POST['area_id']);
$country_id=mysql_real_escape_string($_POST['country_id']);

$sqlprof= "SELECT * from nrc_project where project_name='$project_name' OR project_code='$project_code'";
$resultsprof= mysql_query($sqlprof) or die ("Error $sqlpo.".mysql_error());
$rowsprof=mysql_num_rows($resultsprof);

if ($rowsprof>0)
{
header ("Location:home.php?addproject=addproject&recordexist=1");
}
else
{
$sqllpo= "insert into nrc_project VALUES('','$project_code','$project_name','$start_date','$end_date','$project_desc','$status')";
$resultslpo= mysql_query($sqllpo) or die ("Error $sqllpo.".mysql_error());

/*

$sqlprofd= "SELECT * from nrc_project order by project_id desc limit 1";
$resultsprofd= mysql_query($sqlprofd) or die ("Error $sqlpod.".mysql_error());
$rowsprofd=mysql_fetch_object($resultsprofd);
$latest_project_id=$rowsprofd->project_id;


foreach($_POST['country_id'] as $row=>$CountryID)
{

    $country_id=mysql_real_escape_string($CountryID);
	$latest_project_id=$rowsprofd->project_id;

    
//    $paxcur = $pax - $row;

$sql3="INSERT INTO nrc_projectvscountry VALUES('', '$latest_project_id', '$country_id')" or die(mysql_error());
$results3= mysql_query($sql3) or die ("Error $sql3.".mysql_error());

}
foreach($_POST['area_id'] as $row=>$AreaID)
{

    $area_id=mysql_real_escape_string($AreaID);
	$latest_project_id=$rowsprofd->project_id;

    
//    $paxcur = $pax - $row;

$sql3="INSERT INTO nrc_projectvsarea VALUES('', '$latest_project_id', '$area_id')" or die(mysql_error());
$results3= mysql_query($sql3) or die ("Error $sql3.".mysql_error());

}
foreach($_POST['location_id'] as $row=>$LocationID)
{

    $location_id=mysql_real_escape_string($LocationID);
	$latest_project_id=$rowsprofd->project_id;

    
//    $paxcur = $pax - $row;

$sql4="INSERT INTO nrc_projectvslocation VALUES('', '$latest_project_id', '$location_id')" or die(mysql_error());
$results4= mysql_query($sql4) or die ("Error $sql4.".mysql_error());

}
foreach($_POST['settlement_id'] as $row=>$SettlementID)
{

    $settlement_id=mysql_real_escape_string($SettlementID);
	$latest_project_id=$rowsprofd->project_id;

    
//    $paxcur = $pax - $row;

$sql5="INSERT INTO nrc_projectvssettlement VALUES('', '$latest_project_id', '$settlement_id')" or die(mysql_error());
$results5= mysql_query($sql5) or die ("Error $sql5.".mysql_error());

}

*/

header ("Location:home.php?addproject=addproject&addconfirm=1");
}
//mysql_close($cnn);

}
function addcompetency($cc_code,$cc_name,$cc_desc)
{
$cc_code=mysql_real_escape_string($_POST['cc_code']);
$cc_name=mysql_real_escape_string($_POST['cc_name']);
$cc_desc=mysql_real_escape_string($_POST['cc_desc']);


$sqllpo="insert into nrc_cc VALUES('','$cc_code','$cc_name','$cc_desc')";
$resultslpo=mysql_query($sqllpo) or die ("Error $sqllpo.".mysql_error());

header ("Location:home.php?addcompetency=addcompetency&addconfirm=1");


mysql_close($cnn);

}
// code for adding sub-project
//functioning for adding projects
function add_sub_project($sub_project_code,$project_id,$sub_project_name,$start_date,$end_date,$sub_project_desc)
{
$sub_project_code=mysql_real_escape_string($_POST['sub_project_code']);
$sub_project_name=mysql_real_escape_string($_POST['sub_project_name']);
$start_date=mysql_real_escape_string($_POST['start_date']);
$end_date=mysql_real_escape_string($_POST['end_date']);
$sub_project_desc=mysql_real_escape_string($_POST['sub_project_desc']);
$project_id=mysql_real_escape_string($_POST['project_id']);

$sqlprof= "SELECT * from nrc_sub_project where sub_project_name='$sub_project_name' OR sub_project_code='$sub_project_code'";
$resultsprof= mysql_query($sqlprof) or die ("Error $sqlpo.".mysql_error());
$rowsprof=mysql_num_rows($resultsprof);

if ($rowsprof>0)
{
header ("Location:home.php?addsubproject=addsubproject&recordexist=1");
}
else
{
$sqllpo= "insert into nrc_sub_project VALUES('','$project_id','$sub_project_code','$sub_project_name','$start_date','$end_date','$sub_project_desc')";
$resultslpo= mysql_query($sqllpo) or die ("Error $sqllpo.".mysql_error());


/*
$sqlprofd= "SELECT * from nrc_sub_project order by sub_project_id desc limit 1";
$resultsprofd= mysql_query($sqlprofd) or die ("Error $sqlpod.".mysql_error());
$rowsprofd=mysql_fetch_object($resultsprofd);
$latest_sub_project_id=$rowsprofd->sub_project_id;


foreach($_POST['country_id'] as $row=>$CountryID)
{

    $country_id=mysql_real_escape_string($CountryID);
	$latest_sub_project_id=$rowsprofd->sub_project_id;

    
//    $paxcur = $pax - $row;

$sql3="INSERT INTO nrc_subprojectvscountry VALUES('','$project_id','$latest_sub_project_id', '$country_id')" or die(mysql_error());
$results3= mysql_query($sql3) or die ("Error $sql3.".mysql_error());

} 

foreach($_POST['area_id'] as $row=>$AreaID)
{

    $area_id=mysql_real_escape_string($AreaID);
	$latest_sub_project_id=$rowsprofd->sub_project_id;

    
//    $paxcur = $pax - $row;

$sql3="INSERT INTO nrc_subprojectvsarea VALUES('','$project_id','$latest_sub_project_id', '$area_id')" or die(mysql_error());
$results3= mysql_query($sql3) or die ("Error $sql3.".mysql_error());

} 
foreach($_POST['location_id'] as $row=>$LocationID)
{

    $location_id=mysql_real_escape_string($LocationID);
	$latest_sub_project_id=$rowsprofd->sub_project_id;

    
//    $paxcur = $pax - $row;

$sql4="INSERT INTO nrc_subprojectvslocation VALUES('','$project_id', '$latest_sub_project_id', '$location_id')" or die(mysql_error());
$results4= mysql_query($sql4) or die ("Error $sql4.".mysql_error());

}
foreach($_POST['settlement_id'] as $row=>$SettlementID)
{

    $settlement_id=mysql_real_escape_string($SettlementID);
	$latest_sub_project_id=$rowsprofd->sub_project_id;

    
//    $paxcur = $pax - $row;

$sql5="INSERT INTO nrc_subprojectvssettlement VALUES('','$project_id', '$latest_sub_project_id', '$settlement_id')" or die(mysql_error());
$results5= mysql_query($sql5) or die ("Error $sql5.".mysql_error());

}

*/
header ("Location:home.php?addsubproject=addsubproject&addconfirm=1");
}
//mysql_close($cnn);

}

//////////////////////////////////////////////////////////////////////////////////////////////// End Of Peter Section


//////////////////////////////////////////////////////////////////////////////////////////////// Griffins Section

//function for adding country
function addcountry ($country_code,$country_name)
{
$country_code=mysql_real_escape_string($_POST['country_code']);
$country_name=mysql_real_escape_string($_POST['country_name']);


$sqllpo="insert into nrc_country VALUES('','$country_code','$country_name')";
$resultslpo=mysql_query($sqllpo) or die ("Error $sqllpo.".mysql_error());

header ("Location:home.php?viewhrforms=viewhrforms&addconfirm=1");


mysql_close($cnn);

}

//function for adding area
function addarea ($country,$area_code,$area_name,$area_desc)
{
$country=mysql_real_escape_string($_POST['country']);
$area_code=mysql_real_escape_string($_POST['area_code']);
$area_name=mysql_real_escape_string($_POST['area_name']);
$area_desc=mysql_real_escape_string($_POST['area_desc']);


$sqllpo="insert into nrc_area VALUES('','$country','$area_code','$area_name','$area_desc')";
$resultslpo=mysql_query($sqllpo) or die ("Error $sqllpo.".mysql_error());

header ("Location:home.php?newsponsor=newsponsor&addconfirm=1");


mysql_close($cnn);

}




//function for adding location
function add_location ($country,$area,$loc_code,$loc_name,$loc_desc)
{
$country=mysql_real_escape_string($_POST['country']);
$area=mysql_real_escape_string($_POST['area']);
$loc_code=mysql_real_escape_string($_POST['loc_code']);
$loc_name=mysql_real_escape_string($_POST['loc_name']);
$loc_desc=mysql_real_escape_string($_POST['loc_desc']);


$sqllpo="insert into nrc_location VALUES('','$country','$area','$loc_code','$loc_name','$loc_desc')";
$resultslpo=mysql_query($sqllpo) or die ("Error $sqllpo.".mysql_error());

header ("Location:home.php?perdm=perdm&addconfirm=1");


mysql_close($cnn);

}


//function for adding settlement
function add_settlement ($area,$location,$set_code,$set_name,$set_desc)
{
$area=mysql_real_escape_string($_POST['area']);
$location=mysql_real_escape_string($_POST['location']);
$set_code=mysql_real_escape_string($_POST['set_code']);
$set_name=mysql_real_escape_string($_POST['set_name']);
$set_desc=mysql_real_escape_string($_POST['set_desc']);


$sqllpo="insert into nrc_settlement VALUES('','$area','$location','$set_code','$set_name','$set_desc')";
$resultslpo=mysql_query($sqllpo) or die ("Error $sqllpo.".mysql_error());

header ("Location:home.php?initiateproject=initiateproject&addconfirm=1");


mysql_close($cnn);

}

function add_period($period_from,$period_to,$description,$status)
{
$period_from=mysql_real_escape_string($_POST['period_from']);
$period_to=mysql_real_escape_string($_POST['period_to']);
$description=mysql_real_escape_string($_POST['description']);
$status=mysql_real_escape_string($_POST['status']);


$sqllpo="insert into nrc_report_period VALUES('','$period_from','$period_to','$description','','','$status')";
$resultslpo=mysql_query($sqllpo) or die ("Error $sqllpo.".mysql_error());

header ("Location:home.php?submission_period=submission_period&addconfirm=1");


mysql_close($cnn);

}


////////////////test
function add_test($project_id,$sub_project_id,$cc_id,$location_id,$activity,$target,$target_male,$target_female)
{
$sub_project_id=$_GET['subproject_id'];
$location_id=mysql_real_escape_string($_POST['location_id']);

$query1="SELECT * from nrc_location where location_id=$location_id ";
$results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
$rows1=mysql_fetch_object($results1);

$country_id=$rows1->country_id;
$area_id=$rows1->area_id;


$cc_id=mysql_real_escape_string($_POST['cc_id']);
$project_id=mysql_real_escape_string($_POST['project_id']);

foreach($_POST['activity'] as $row=>$Activity)
{

$activity=mysql_real_escape_string($Activity);
$target=mysql_real_escape_string($_POST['target'][$row]);
$target_male=mysql_real_escape_string($_POST['target_male'][$row]);
$target_female=mysql_real_escape_string($_POST['target_female'][$row]);
    
//    $paxcur = $pax - $row;

$sql3="INSERT INTO nrc_set_template VALUES('','$location_id','$area_id','$country_id','$cc_id','$project_id','$sub_project_id','$activity','$target','$target_male','$target_female')" or die(mysql_error());
$results3= mysql_query($sql3) or die ("Error $sql3.".mysql_error());

}




header ("Location:home.php?setuptemplate=setuptemplate&addconfirm=1&subproject_id=$sub_project_id");
}
//mysql_close($cnn);

//}

////////////////Replicate template
function replicate_template($project_id,$sub_proj_id,$cc_id,$location_id,$activity,$target,$target_male,$target_female)
{
//$sub_proj_id=$_POST['sub_proj_id'];

$sub_proj_id=mysql_real_escape_string($_POST['txtsub_project_id']);
$location_id=mysql_real_escape_string($_POST['location_id']);

$query1="SELECT * from nrc_location where location_id=$location_id ";
$results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
$rows1=mysql_fetch_object($results1);

$country_id=$rows1->country_id;
$area_id=$rows1->area_id;
$cc_id=mysql_real_escape_string($_POST['cc_id']);
$project_id=mysql_real_escape_string($_POST['project_id']);

foreach($_POST['activity'] as $row=>$Activity)
{

$activity=mysql_real_escape_string($Activity);
$target=mysql_real_escape_string($_POST['target'][$row]);
$target_male=mysql_real_escape_string($_POST['target_male'][$row]);
$target_female=mysql_real_escape_string($_POST['target_female'][$row]);
    
//    $paxcur = $pax - $row;

$sql3="INSERT INTO nrc_set_template VALUES('','$location_id','$area_id','$country_id','$cc_id','$project_id','$sub_proj_id','$activity','$target','$target_male','$target_female')" or die(mysql_error());
$results3= mysql_query($sql3) or die ("Error $sql3.".mysql_error());

}




header ("Location:home.php?replicatesetuptemplate=replicatesetuptemplate&addconfirm=1&sub_proj_id=$sub_proj_id");
}


function assign_project($project_id)
{

//$project_id=$;
$sqlaloc="INSERT INTO alloc VALUES('')" or die(mysql_error());
$resultsaloc=mysql_query($sqlaloc) or die ("Error $sqlaloc.".mysql_error());
$rowsalloc=mysql_fetch_object($resultsaloc);

$sqlprofd= "SELECT * from alloc order by alloc_id desc limit 1";
$resultsprofd= mysql_query($sqlprofd) or die ("Error $sqlpod.".mysql_error());
$rowsprofd=mysql_fetch_object($resultsprofd);
$latest_alloc_id=$rowsprofd->alloc_id;


foreach($_POST['country_id'] as $row=>$CountryID)
{

    $country_id=mysql_real_escape_string($CountryID);
	$latest_project_id=mysql_real_escape_string($_POST['project_id']);

    
//    $paxcur = $pax - $row;


$sqlprof= "SELECT * from nrc_projectvscountry where country_id='$country_id' AND project_id='$latest_project_id'";
$resultsprof= mysql_query($sqlprof) or die ("Error $sqlpo.".mysql_error());
$rowsprof=mysql_num_rows($resultsprof);

if ($rowsprof>0)
{
header ("Location:home.php?assignproject=assignproject&recordexist=1");
}
else
{




$sql3="INSERT INTO nrc_projectvscountry VALUES('', '$latest_project_id','$latest_alloc_id', '$country_id')" or die(mysql_error());
$results3= mysql_query($sql3) or die ("Error $sql3.".mysql_error());

header ("Location:home.php?assignprojectarea=assignprojectarea&latest_alloc_id=$latest_alloc_id&project_id=$latest_project_id");
}

}
}


function assign_project_area($project_id)
{

//$project_id=$;


foreach($_POST['area_id'] as $row=>$AreaID)
{

    $area_id=mysql_real_escape_string($AreaID);
	$latest_project_id=mysql_real_escape_string($_POST['project_id']);
	$latest_alloc_id=mysql_real_escape_string($_POST['alloc_id']);

$sqlprof= "SELECT * from nrc_projectvsarea where area_id='$area_id' AND project_id='$latest_project_id'";
$resultsprof= mysql_query($sqlprof) or die ("Error $sqlpo.".mysql_error());
$rowsprof=mysql_num_rows($resultsprof);

if ($rowsprof>0)
{
header ("Location:home.php?assignprojectarea=assignprojectarea&latest_alloc_id=$latest_alloc_id&project_id=$latest_project_id&recordexist=1");
}
else
{
    
//    $paxcur = $pax - $row;

$sql3="INSERT INTO nrc_projectvsarea VALUES('', '$latest_project_id','$latest_alloc_id', '$area_id')" or die(mysql_error());
$results3= mysql_query($sql3) or die ("Error $sql3.".mysql_error());

header ("Location:home.php?assignprojectlocation=assignprojectlocation&latest_alloc_id=$latest_alloc_id&project_id=$latest_project_id");
}
}

}


function assign_project_location($project_id)
{

//$project_id=$;


foreach($_POST['location_id'] as $row=>$LocationID)
{

    $location_id=mysql_real_escape_string($LocationID);
	$latest_project_id=mysql_real_escape_string($_POST['project_id']);
	$latest_alloc_id=mysql_real_escape_string($_POST['alloc_id']);

$sqlprof= "SELECT * from nrc_projectvslocation where location_id='$location_id' AND project_id='$latest_project_id'";
$resultsprof= mysql_query($sqlprof) or die ("Error $sqlpo.".mysql_error());
$rowsprof=mysql_num_rows($resultsprof);

if ($rowsprof>0)
{
header ("Location:home.php?assignprojectlocation=assignprojectlocation&latest_alloc_id=$latest_alloc_id&project_id=$latest_project_id&recordexist=1");
}
else
{    
//    $paxcur = $pax - $row;

$sql3="INSERT INTO nrc_projectvslocation VALUES('', '$latest_project_id','$latest_alloc_id', '$location_id')" or die(mysql_error());
$results3= mysql_query($sql3) or die ("Error $sql3.".mysql_error());

header ("Location:home.php?assignprojectsettlement=assignprojectsettlement&latest_alloc_id=$latest_alloc_id&project_id=$latest_project_id");
}

}
}

function assign_project_settlement($project_id)
{

//$project_id=$;


foreach($_POST['settlement_id'] as $row=>$SettlementID)
{

    $settlement_id=mysql_real_escape_string($SettlementID);
	$latest_project_id=mysql_real_escape_string($_POST['project_id']);
	$latest_alloc_id=mysql_real_escape_string($_POST['alloc_id']);

$sqlprof= "SELECT * from nrc_projectvssettlement where settlement_id='$settlement_id' AND project_id='$latest_project_id'";
$resultsprof= mysql_query($sqlprof) or die ("Error $sqlpo.".mysql_error());
$rowsprof=mysql_num_rows($resultsprof);

if ($rowsprof>0)
{
header ("Location:home.php?assignprojectsettlement=assignprojectsettlement&latest_alloc_id=$latest_alloc_id&project_id=$latest_project_id&recordexist=1");
}
else
{  
    
$sql3="INSERT INTO nrc_projectvssettlement VALUES('','$latest_project_id','$latest_alloc_id','$settlement_id')" or die(mysql_error());
$results3= mysql_query($sql3) or die ("Error $sql3.".mysql_error());


header ("Location:home.php?assignprojectend=assignprojectend&addconfirm=1");
}
}

}

//assigning sub projects to countries
function assign_sub_project($sub_project_id)
{

//$sub_project_id=$;
$sqlaloc="INSERT INTO alloc VALUES('')" or die(mysql_error());
$resultsaloc=mysql_query($sqlaloc) or die ("Error $sqlaloc.".mysql_error());
$rowsalloc=mysql_fetch_object($resultsaloc);

$sqlprofd= "SELECT * from alloc order by alloc_id desc limit 1";
$resultsprofd= mysql_query($sqlprofd) or die ("Error $sqlpod.".mysql_error());
$rowsprofd=mysql_fetch_object($resultsprofd);
$latest_alloc_id=$rowsprofd->alloc_id;


$latest_sub_project_id=mysql_real_escape_string($_POST['sub_project_id']);


$sqlproj= "SELECT * from nrc_sub_project where sub_project_id='$latest_sub_project_id'";
$resultsproj= mysql_query($sqlproj) or die ("Error $sqlproj.".mysql_error());
$rowsproj=mysql_fetch_object($resultsproj);
$project_id=$rowsproj->project_id;




foreach($_POST['country_id'] as $row=>$CountryID)
{

    $country_id=mysql_real_escape_string($CountryID);
	$latest_sub_project_id=mysql_real_escape_string($_POST['sub_project_id']);
	
	
	

    
//    $paxcur = $pax - $row;


$sqlprof= "SELECT * from nrc_subprojectvscountry where country_id='$country_id' AND sub_project_id='$latest_sub_project_id'";
$resultsprof= mysql_query($sqlprof) or die ("Error $sqlpo.".mysql_error());
$rowsprof=mysql_num_rows($resultsprof);

if ($rowsprof>0)
{
header ("Location:home.php?assignsubproject=assignsubproject&recordexist=1");
}
else
{




$sql3="INSERT INTO nrc_subprojectvscountry VALUES('', '$project_id','$latest_sub_project_id','$latest_alloc_id', '$country_id')" or die(mysql_error());
$results3= mysql_query($sql3) or die ("Error $sql3.".mysql_error());

header ("Location:home.php?assignsubprojectarea=assignsubprojectarea&latest_alloc_id=$latest_alloc_id&sub_project_id=$latest_sub_project_id");
}

}
}


function assign_sub_project_area($sub_project_id)
{

//$sub_project_id=$;

$latest_alloc_id=mysql_real_escape_string($_POST['alloc_id']);
$latest_sub_project_id=mysql_real_escape_string($_POST['sub_project_id']);


$sqlproj= "SELECT * from nrc_sub_project where sub_project_id='$latest_sub_project_id'";
$resultsproj= mysql_query($sqlproj) or die ("Error $sqlproj.".mysql_error());
$rowsproj=mysql_fetch_object($resultsproj);
$project_id=$rowsproj->project_id;




foreach($_POST['area_id'] as $row=>$AreaID)
{

    $area_id=mysql_real_escape_string($AreaID);
	$latest_sub_project_id=mysql_real_escape_string($_POST['sub_project_id']);
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

}
}



function assign_sub_project_location($sub_project_id)
{

//$sub_project_id=$;



$latest_sub_project_id=mysql_real_escape_string($_POST['sub_project_id']);


$sqlproj= "SELECT * from nrc_sub_project where sub_project_id='$latest_sub_project_id'";
$resultsproj= mysql_query($sqlproj) or die ("Error $sqlproj.".mysql_error());
$rowsproj=mysql_fetch_object($resultsproj);
$project_id=$rowsproj->project_id;




foreach($_POST['location_id'] as $row=>$LocationID)
{

    $location_id=mysql_real_escape_string($LocationID);
	$latest_sub_project_id=mysql_real_escape_string($_POST['sub_project_id']);
	$latest_alloc_id=mysql_real_escape_string($_POST['alloc_id']);
	
	
	

    
//    $paxcur = $pax - $row;


$sqlprof= "SELECT * from nrc_subprojectvslocation where location_id='$location_id' AND sub_project_id='$latest_sub_project_id'";
$resultsprof= mysql_query($sqlprof) or die ("Error $sqlpo.".mysql_error());
$rowsprof=mysql_num_rows($resultsprof);

if ($rowsprof>0)
{
header ("Location:home.php?assignsubprojectlocation=assignsubprojectlocation&latest_alloc_id=$latest_alloc_id&sub_project_id=$latest_sub_project_id&recordexist=1");
}
else
{




$sql3="INSERT INTO nrc_subprojectvslocation VALUES('', '$project_id','$latest_sub_project_id','$latest_alloc_id', '$location_id')" or die(mysql_error());
$results3= mysql_query($sql3) or die ("Error $sql3.".mysql_error());

header ("Location:home.php?assignsubprojectsettlement=assignsubprojectsettlement&latest_alloc_id=$latest_alloc_id&sub_project_id=$latest_sub_project_id");
}

}
}

//assign sub projects to settlement
function assign_sub_project_settlement($sub_project_id)
{

//$sub_project_id=$;



$latest_sub_project_id=mysql_real_escape_string($_POST['sub_project_id']);


$sqlproj= "SELECT * from nrc_sub_project where sub_project_id='$latest_sub_project_id'";
$resultsproj= mysql_query($sqlproj) or die ("Error $sqlproj.".mysql_error());
$rowsproj=mysql_fetch_object($resultsproj);
$project_id=$rowsproj->project_id;




foreach($_POST['settlement_id'] as $row=>$settlementID)
{

    $settlement_id=mysql_real_escape_string($settlementID);
	$latest_sub_project_id=mysql_real_escape_string($_POST['sub_project_id']);
	$latest_alloc_id=mysql_real_escape_string($_POST['alloc_id']);
	
	
	

    
//    $paxcur = $pax - $row;


$sqlprof= "SELECT * from nrc_subprojectvssettlement where settlement_id='$settlement_id' AND sub_project_id='$latest_sub_project_id'";
$resultsprof= mysql_query($sqlprof) or die ("Error $sqlpo.".mysql_error());
$rowsprof=mysql_num_rows($resultsprof);

if ($rowsprof>0)
{
header ("Location:home.php?assignsubprojectsettlement=assignsubprojectsettlement&latest_alloc_id=$latest_alloc_id&sub_project_id=$latest_sub_project_id&recordexist=1");
}
else
{




$sql3="INSERT INTO nrc_subprojectvssettlement VALUES('', '$project_id','$latest_sub_project_id','$latest_alloc_id', '$settlement_id')" or die(mysql_error());
$results3= mysql_query($sql3) or die ("Error $sql3.".mysql_error());

header ("Location:home.php?assignsubprojectend=assignsubprojectend&addconfirm=1");
}

}
}


/*




foreach($_POST['area_id'] as $row=>$AreaID)
{

    $area_id=mysql_real_escape_string($AreaID);
	$latest_project_id=mysql_real_escape_string($_POST['project_id']);

    
//    $paxcur = $pax - $row;

$sql3="INSERT INTO nrc_projectvsarea VALUES('', '$latest_project_id', '$area_id')" or die(mysql_error());
$results3= mysql_query($sql3) or die ("Error $sql3.".mysql_error());

}
foreach($_POST['location_id'] as $row=>$LocationID)
{

    $location_id=mysql_real_escape_string($LocationID);
	$latest_project_id=mysql_real_escape_string($_POST['project_id']);

    
//    $paxcur = $pax - $row;

$sql4="INSERT INTO nrc_projectvslocation VALUES('', '$latest_project_id', '$location_id')" or die(mysql_error());
$results4= mysql_query($sql4) or die ("Error $sql4.".mysql_error());

}
foreach($_POST['settlement_id'] as $row=>$SettlementID)
{

    $settlement_id=mysql_real_escape_string($SettlementID);
	$latest_project_id=mysql_real_escape_string($_POST['project_id']);

    
//    $paxcur = $pax - $row;

$sql5="INSERT INTO nrc_projectvssettlement VALUES('', '$latest_project_id', '$settlement_id')" or die(mysql_error());
$results5= mysql_query($sql5) or die ("Error $sql5.".mysql_error());

}

header ("Location:home.php?assignproject=assignproject&addconfirm=1");

//mysql_close($cnn);

}
*/





function add_biweekly($project_id,$sub_project_id,$set_template_id,$settlement_id,$trans_date,$report_period_id,$bi_achieved,$bi_male,$bi_female,$narration,$user_id,$sess_location_id,$sess_area_id,$sess_country_id)

{


$project_id=mysql_real_escape_string($_POST['project_id']);
$settlement_id=mysql_real_escape_string($_POST['settlement_id']);
$report_period_id=mysql_real_escape_string($_POST['report_period_id']);
$sub_project_id=mysql_real_escape_string($_POST['sub_project_id']);
$trans_date=date('Y-m-d');

foreach($_POST['bi_male'] as $row=>$Bi_male)
{
$bi_male=mysql_real_escape_string($Bi_male);
$bi_achieved=mysql_real_escape_string($_POST['bi_achieved'][$row]);
$bi_female=mysql_real_escape_string($_POST['bi_female'][$row]);
$narration=mysql_real_escape_string($_POST['narration'][$row]);
$set_template_id=mysql_real_escape_string($_POST['set_template_id'][$row]);



    
//    $paxcur = $pax - $row;

$sql3="INSERT INTO nrc_biweekly VALUES('','$set_template_id','$settlement_id','$project_id','$sub_project_id','$report_period_id','$trans_date','$bi_achieved',
'$bi_male','$bi_female','$narration','$user_id','$sess_location_id','$sess_area_id','$sess_country_id')" or die(mysql_error());
$results3= mysql_query($sql3) or die ("Error $sql3.".mysql_error());

}




header ("Location:home.php?submit_biweekly=submit_biweekly&addconfirm=1");
}







?>


