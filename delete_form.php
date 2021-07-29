<?php
#include connection
include('Connections/fundmaster.php');
include('includes/session.php');


// code for deleting donors

//////////////////////////////////////////////////////////////////////////////////////////////// Peter Section
$vehicle_make_id=$_GET['vehicle_make_id'];
function delete_donor($vehicle_make_id,$user_id)
{
$sql= "delete from units  where unit_id='$vehicle_make_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


$sqlauditsav= "insert into audit_trails values('','$user_id',NOW(),'Deleted a unit from the system')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());


header ("Location:home.php?viewuniversity=viewuniversity&deleteuniversityconfirm=1");

mysql_close($cnn);
}

//delete submission period
$submission_period_id=$_GET['submission_period_id'];
function delete_period($submission_period_id)
{
$sql= "delete from nrc_report_period where period_id='$submission_period_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

header ("Location:home.php?view_submission_period=view_submission_period&deleteuniversityconfirm=1");

mysql_close($cnn);
}



//deassign project from donor
function delete_donor_project($donor_id)
{



foreach($_POST['donor_id'] as $row=>$donor_id)
{   

	
$donor_id=mysql_real_escape_string($_POST['donor_id'][$row]);
$project_id=mysql_real_escape_string($_POST['project_id'][$row]);
	
    
//  Check Redudancy

$sql= "delete from nrc_donorvsproject where donor_id='$donor_id' AND project_id='$project_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

header ("donor:home.php?viewprojectdonor=viewprojectdonor");

}

mysql_close($cnn);
}










// code for deleting project
$customer_id=$_GET['customer_id'];
function delete_project($customer_id,$user_id)
{
// delete from projects table
$sql= "delete from customer where customer_id='$customer_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sql= "delete from ledger_transactions where transaction_code='custop$customer_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sql= "delete from customer_transactions where transaction_code='custop$customer_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sqlauditsav= "insert into audit_trails values('','$user_id',NOW(),'Deleted a customer from the system')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());


header ("Location:home.php?viewproject=viewproject&deleteprojectconfirm=1");

mysql_close($cnn);
}
$cc_id=$_GET['cc_id'];
function delete_competency($cc_id)
{
$sql= "delete from nrc_cc  where cc_id='$cc_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());




header ("Location:home.php?viewcompetency=viewcompetency&deletecompetencyconfirm=1");

mysql_close($cnn);
}
$cat_id=$_GET['cat_id'];
function delete_subproject($cat_id,$user_id)
{
// delete from projects table
$sql= "delete from items_category where cat_id='$cat_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sql= "delete from product_categories where cat_id='$cat_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
// delete associated records in subprojectvsarea table

$sqlauditsav= "insert into audit_trails values('','$user_id',NOW(),'Deleted item category $cat_name details into the system ')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());

header ("Location:home.php?viewsubproject=viewsubproject&deleteconfirm=1");

mysql_close($cnn);
}


$service_item_id=$_GET['service_item_id'];
function delete_labour_task($service_item_id,$user_id)
{
// delete from projects table
$sql= "delete from shop where shop_id='$service_item_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sqlauditsav= "insert into audit_trails values('','$user_id',NOW(),'Deleted shop from the system ')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());


header ("Location:home.php?settlementreport=settlementreport&deleteconfirm=1");

mysql_close($cnn);
}

$engine_range_id=$_GET['engine_range_id'];
function delete_engine_range($engine_range_id)
{
// delete from projects table
$sql= "delete from engine_range where engine_range_id='$engine_range_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sqlauditsav= "insert into audit_trails values('','$user_id',NOW(),'Deleted engine range from the system ')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());


header ("Location:home.php?viewworkpermitrenewals=viewworkpermitrenewals&deleteconfirm=1");

mysql_close($cnn);
}

//////////////////////////////////////////////////////////////////////////////////////////////// End Of Peter Section


//////////////////////////////////////////////////////////////////////////////////////////////// Griffins Section


$estimates_id=$_GET['estimates_id'];
$booking_id=$_GET['booking_id'];
function delete_country($estimates_id,$booking_id,$user_id)
{
$sql= "delete from estimates where estimates_id='$estimates_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


header ("Location:home.php?areareport=areareport&booking_id=$booking_id&delete=1");

mysql_close($cnn);
}






function delete_area($costing_item_id)
{
$costing_item_id=$_GET['costing_item_id'];
//echo $vehicle_model_id;
$sql= "delete from costing_item where costing_item_id='$costing_item_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


header ("Location:home.php?viewprojectdonor=viewprojectdonor&delete=1");

mysql_close($cnn);
}



// delete locations
$booking_id=$_GET['booking_id'];
function delete_location($booking_id,$user_id)
{
$sql= "delete from bookings where booking_id='$booking_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sqlauditsav= "insert into audit_trails values('','$user_id',NOW(),'Deleted a booking from the system')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());

header ("Location:home.php?viewhrforms=viewhrforms&delete=1");

mysql_close($cnn);
}


// delete settlement

function delete_settlement($invoice_id,$booking_id,$user_id)
{

$invoice_id=$_GET['invoice_id'];
$booking_id=$_GET['booking_id'];

$sql= "delete from invoices where invoice_id='$invoice_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sqlupdt= "UPDATE job_cards SET invoice_status='0' WHERE booking_id='$booking_id'";
$resultsupdt= mysql_query($sqlupdt) or die ("Error $sqlupdt.".mysql_error());

$sqlauditsav= "insert into audit_trails values('','$user_id',NOW(),'deleted an invoice invoice no:$invoice_id from the system')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());


header ("Location:home.php?view_submission_period=view_submission_period&booking_id=$booking_id&delete=1&view=1");

mysql_close($cnn);
}

$item_id=$_GET['item_id'];

function delete_item($item_id,$user_id)
{
$sql= "delete from items where item_id='$item_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sql= "delete from ledger_transactions where transaction_code='itemop$item_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sql= "delete from item_transactions where transaction_code='itemop$item_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());



$sqlauditsav= "insert into audit_trails values('','$user_id',NOW(),'deleted an item from the system')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());


header ("Location:home.php?viewsetuptemplate=viewsetuptemplate&delete=1");

mysql_close($cnn);
}

//delete ccountry from project
function delete_country_project($job_card_id,$booking_id,$user_id)
{
$job_card_id=$_GET['job_card_id'];	
$booking_id=$_GET['booking_id'];	
    
//  Check Redudancy

$sql= "delete from job_cards where job_card_id='$job_card_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sqlupdt= "UPDATE estimates SET inventory_status='0',job_card_status='0' WHERE booking_id='$booking_id'";
$resultsupdt= mysql_query($sqlupdt) or die ("Error $sqlupdt.".mysql_error());


$sqlauditsav= "insert into audit_trails values('','$user_id',NOW(),'Deleted an a job card no $booking_id from the system')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());

header ("Location:home.php?locationreportc=locationreportc&booking_id=$booking_id&job_card_id=$job_card_id&delete=1");

}

mysql_close($cnn);





//delete area from project
function delete_area_project($area_id)
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
function delete_location_project($location_id)
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






function delete_settlement_project($settlement_id)
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



function delete_country_sub_project($country_id)
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



function delete_area_sub_project($received_stock_id)
{




	
    
//  Check Redudancy

$sql= "delete from received_stock where received_stock_id='$received_stock_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

header ("Location:home.php?viewsubprojectarea=viewsubprojectarea&delete=1");


mysql_close($cnn);
}


function delete_location_sub_project($location_id)
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

function delete_settlement_sub_project($settlement_id)
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


