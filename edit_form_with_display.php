<?php
#include connection
include('includes/session.php');
include('Connections/fundmaster.php');

//////////////////////////////////////////////////////////////////////////////////////////////// Peter Section

//functioning editing donors
function edit_donor($donor_name,$donor_desc,$user_id)
{

$unit_id=$_GET['unit_id'];

$donor_name=mysql_real_escape_string($_POST['donor_name']);
$donor_desc=mysql_real_escape_string($_POST['donor_desc']);


 
$sqlupdt= "UPDATE units SET unit_name='$donor_name',unit_desc='$donor_desc' WHERE unit_id='$unit_id'";
$resultsupdt= mysql_query($sqlupdt) or die ("Error $sqlupdt.".mysql_error());

$sqlauditsav= "insert into audit_trails values('','$user_id',NOW(),'Update vehicle make into the system ')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());

header ("Location:home.php?edituniversity=edituniversity&unit_id=$unit_id&editsuccess=1");


mysql_close($cnn);

}
// code for editing edit project
function edit_project($customer_name,$contact_person,$address,$town,$email,$phone,$user_id)
{
$customer_id=$_GET['customer_id'];
$customer_name=mysql_real_escape_string($_POST['customer_name']);
$contact_person=mysql_real_escape_string($_POST['contact_person']);
$address=mysql_real_escape_string($_POST['address']);
$town=mysql_real_escape_string($_POST['town']);
$email=mysql_real_escape_string($_POST['email']);
$phone=mysql_real_escape_string($_POST['phone']);
$pin=mysql_real_escape_string($_POST['pin']);

 
$sqlupdt= "UPDATE customer SET customer_name ='$customer_name',contact_person='$contact_person',address='$address',
town='$town',email='$email',phone='$phone',pin='$pin' WHERE customer_id='$customer_id'";
$resultsupdt= mysql_query($sqlupdt) or die ("Error $sqlupdt.".mysql_error());

$sql= "update clients set c_name='$customer_name', c_address='$address',c_paddress='$address',c_phone='$phone',c_email='$email'
,contact_person='$contact_person',c_town='$town', pin='$pin', monthly_statement='$allow_add',statement_date='$date_sent' where client_id='$customer_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sqlauditsav= "insert into audit_trails values('','$user_id',NOW(),'Update customer $customer_name details into the system ')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());


header ("Location:home.php?editproject=editproject&customer_id=$customer_id&editsuccess=1");


mysql_close($cnn);
}


function edit_labour_task($cat_name,$unit_id,$cat_desc,$user_id)
{
$service_item_id=$_GET['service_item_id'];
$cat_name=mysql_real_escape_string($_POST['cat_name']);
$unit_id=mysql_real_escape_string($_POST['unit_id']);
$cat_desc=mysql_real_escape_string($_POST['cat_desc']);

 
$sqlupdt= "UPDATE service_item SET service_item_name ='$cat_name',unit_id='$unit_id',service_item_desc='$cat_desc' WHERE service_item_id='$service_item_id'";
$resultsupdt= mysql_query($sqlupdt) or die ("Error $sqlupdt.".mysql_error());

$sqlauditsav= "insert into audit_trails values('','$user_id',NOW(),'Update labour service_item $cat_name details into the system ')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());


header ("Location:home.php?edit_task=edit_task&service_item_id=$service_item_id&editsuccess=1");


mysql_close($cnn);
}


function edit_engine_range($min_capacity,$max_capacity,$user_id)
{
$engine_range_id=$_GET['engine_range_id'];
$min_capacity=mysql_real_escape_string($_POST['min_capacity']);
$max_capacity=mysql_real_escape_string($_POST['max_capacity']);

 
$sqlupdt= "UPDATE engine_range SET max_capacity ='$max_capacity',min_capacity='$min_capacity' WHERE engine_range_id='$engine_range_id'";
$resultsupdt= mysql_query($sqlupdt) or die ("Error $sqlupdt.".mysql_error());

$sqlauditsav= "insert into audit_trails values('','$user_id',NOW(),'Update engine range details into the system ')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());


header ("Location:home.php?editworkpermitrenewals=editworkpermitrenewals&engine_range_id=$engine_range_id&editsuccess=1");


mysql_close($cnn);
}







function edit_sub_project($cat_name,$cat_desc,$user_id)
{
$cat_id=$_GET['cat_id'];
$cat_name=mysql_real_escape_string($_POST['cat_name']);
$cat_desc=mysql_real_escape_string($_POST['cat_desc']);

 
$sqlupdt= "UPDATE items_category SET cat_name='$cat_name',cat_desc='$cat_desc' WHERE cat_id='$cat_id'";
$resultsupdt= mysql_query($sqlupdt) or die ("Error $sqlupdt.".mysql_error());

$sqlupdt= "UPDATE product_categories SET cat_name='$cat_name',cat_desc='$cat_desc' WHERE cat_id='$cat_id'";
$resultsupdt= mysql_query($sqlupdt) or die ("Error $sqlupdt.".mysql_error());

$sqlauditsav= "insert into audit_trails values('','$user_id',NOW(),'Update item category $cat_name details into the system ')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());


header ("Location:home.php?editsubproject=editsubproject&cat_id=$cat_id&editsuccess=1");


mysql_close($cnn);
}
//code for editing competency
function edit_competency($cont_person,$phone,$telephone,$email,$fax,$street,$building,$address,$town,$user_id)
{
$id=$_GET['contacts_id'];
$cont_person=mysql_real_escape_string($_POST['cont_person']);
$phone=mysql_real_escape_string($_POST['phone']);
$telephone=mysql_real_escape_string($_POST['telephone']);
$email=mysql_real_escape_string($_POST['email']);
$pin=mysql_real_escape_string($_POST['pin']);
$fax=mysql_real_escape_string($_POST['fax']);
$street=mysql_real_escape_string($_POST['street']);
$building=mysql_real_escape_string($_POST['building']);
$address=mysql_real_escape_string($_POST['address']);

$invoice_terms=mysql_real_escape_string($_POST['invoice_terms']);
$job_card_terms=mysql_real_escape_string($_POST['job_card_terms']);
$quotation_terms=mysql_real_escape_string($_POST['quotation_terms']);
$credit_note_terms=mysql_real_escape_string($_POST['credit_note_terms']);
$receipt_terms=mysql_real_escape_string($_POST['receipt_terms']);
$company_description=mysql_real_escape_string($_POST['company_description']);
$lpo_terms=mysql_real_escape_string($_POST['lpo_terms']);




$sql= "UPDATE company_contacts SET cont_person='$cont_person',
phone='$phone',telephone='$telephone',email='$email',pin='$pin',fax='$fax',
street='$street',building='$building',
address='$address',
invoice_terms='$invoice_terms',
job_card_terms='$job_card_terms',
quotation_terms='$quotation_terms',
credit_note_terms='$credit_note_terms',
receipt_terms='$receipt_terms',
company_description='$company_description',
lpo_terms='$lpo_terms',
town='$town' 
where contacts_id='$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sqlauditsav= "insert into audit_trails values('','$user_id',NOW(),'Updated Company Contact Details')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());



header ("Location:home.php?editcompetency=editcompetency&contacts_id=$id&editsuccess=1");


mysql_close($cnn);

}

//////////////////////////////////////////////////////////////////////////////////////////////// End Of Peter Section

//////////////////////////////////////////////////////////////////////////////////////////////// Griffins Section

function editcountry ($country_code,$country_name)
{

$country_id=$_GET['country_id'];
$country_code=mysql_real_escape_string($_POST['country_code']);
$country_name=mysql_real_escape_string($_POST['country_name']);



 
$sqlupdt= "UPDATE nrc_country SET country_code ='$country_code',country_name='$country_name' WHERE country_id='$country_id'";
$resultsupdt= mysql_query($sqlupdt) or die ("Error $sqlupdt.".mysql_error());



header ("Location:home.php?editcountry=editcountry&country_id=$country_id&editsuccess=1");


mysql_close($cnn);

}

function editarea ($cat_name,$unit_id,$cat_desc,$user_id)
{

$costing_item_id=$_GET['costing_item_id'];
$cat_name=mysql_real_escape_string($_POST['cat_name']);
$unit_id=mysql_real_escape_string($_POST['unit_id']);
$cat_desc=mysql_real_escape_string($_POST['cat_desc']);

 
$sqlupdt= "UPDATE costing_item SET costing_item_name ='$cat_name',costing_unit_id='$unit_id',costing_item_desc='$cat_desc' WHERE costing_item_id='$costing_item_id'";
$resultsupdt= mysql_query($sqlupdt) or die ("Error $sqlupdt.".mysql_error());

$sqlauditsav= "insert into audit_trails values('','$user_id',NOW(),'Update costing $cat_name details into the system ')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());

header ("Location:home.php?editarea=editarea&costing_item_id=$costing_item_id&editsuccess=1");


mysql_close($cnn);

}


function editlocation ($booking_date,$customer_name,$contact_person,$address,$town,$email,$phone,$reg_no,$make,$model,$chasis_no,$engine_range_id,$engine,$trim_code,$odometer,$fuel_tank,$user_id)
{

$booking_id=$_GET['booking_id'];
$jq=$_GET['jq'];
$job_card_id=$_GET['job_card_id'];
$customer_id=mysql_real_escape_string($_POST['customer_id']);
$booking_date=mysql_real_escape_string($_POST['booking_date']);
$customer_name=mysql_real_escape_string($_POST['customer_name']);
$contact_person=mysql_real_escape_string($_POST['contact_person']);
$address=mysql_real_escape_string($_POST['address']);
$town=mysql_real_escape_string($_POST['town']);
$email=mysql_real_escape_string($_POST['email']);
$phone=mysql_real_escape_string($_POST['phone']);
$reg_no=mysql_real_escape_string($_POST['reg_no']);
$phone=mysql_real_escape_string($_POST['phone']);
$make=mysql_real_escape_string($_POST['make']);
$model=mysql_real_escape_string($_POST['model']);
$chasis_no=mysql_real_escape_string($_POST['chasis_no']);
$engine=mysql_real_escape_string($_POST['engine']);
$engine_range_id=mysql_real_escape_string($_POST['engine_range_id']);
$trim_code=mysql_real_escape_string($_POST['trim_code']);
$odometer=mysql_real_escape_string($_POST['odometer']);
$fuel_tank=mysql_real_escape_string($_POST['fuel_tank']);
//$phone=mysql_real_escape_string($_POST['loc_desc']);

$sqlupdt= "UPDATE customer SET customer_name ='$customer_name',contact_person='$contact_person',address='$address',
town='$town',email='$email',phone='$phone' WHERE customer_id='$customer_id'";
$resultsupdt= mysql_query($sqlupdt) or die ("Error $sqlupdt.".mysql_error());

 
$sqlupdt= "UPDATE bookings SET reg_no='$reg_no',vehicle_make='$make',vehicle_model='$model',chasis_no='$chasis_no',
engine='$engine',engine_range_id='$engine_range_id',trim_code='$trim_code',odometer='$odometer',fuel_tank='$fuel_tank',booking_date='$booking_date' 
WHERE booking_id='$booking_id'";
$resultsupdt= mysql_query($sqlupdt) or die ("Error $sqlupdt.".mysql_error());


$sqlauditsav= "insert into audit_trails values('','$user_id',NOW(),'Update a booking for $customer_name of vehicle $reg_no into the system')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());


if ($jq==1)
{
header ("Location:home.php?locationreportc=locationreportc&booking_id=$booking_id&job_card_id=$job_card_id");
}
else
{

header ("Location:home.php?editlocation=editlocation&booking_id=$booking_id&editsuccess=1");
}

mysql_close($cnn);

}


// edit settlement

function editsettlement ($area,$location,$set_code,$set_name,$set_desc)
{

$settlement_id=$_GET['settlement_id'];
$area=mysql_real_escape_string($_POST['area']);
$location=mysql_real_escape_string($_POST['location']);
$set_code=mysql_real_escape_string($_POST['set_code']);
$set_name=mysql_real_escape_string($_POST['set_name']);
$set_desc=mysql_real_escape_string($_POST['set_desc']);

 
$sqlupdt= "UPDATE nrc_settlement SET area_id='$area', location_id='$location',settlement_code='$set_code',settlement_name='$set_name',
settlement_desc='$set_desc' WHERE settlement_id='$settlement_id'";
$resultsupdt= mysql_query($sqlupdt) or die ("Error $sqlupdt.".mysql_error());



header ("Location:home.php?editsettlements=editsettlements&settlement_id=$settlement_id&editsuccess=1");


mysql_close($cnn);

}

//edit set template
function edit_set_template ($cat_id,$item_name,$item_code,$reorder_level,$item_value,$item_sp,$item_desc,$user_id)
{
$item_id=$_GET['item_id'];
$cat_id=mysql_real_escape_string($_POST['cat_id']);
$item_name=mysql_real_escape_string($_POST['item_name']);
$item_code=mysql_real_escape_string($_POST['item_code']);
$reorder_level=mysql_real_escape_string($_POST['reorder_level']);
$item_value=mysql_real_escape_string($_POST['item_value']);
$item_sp=mysql_real_escape_string($_POST['item_sp']);
$item_desc=mysql_real_escape_string($_POST['item_desc']);
$pack_size="Pieces";
$curr_rate=1;
$currency_code=6;

 
$sqlupdt= "UPDATE items SET cat_id='$cat_id',item_name='$item_name',item_code='$item_code',reorder_level='$reorder_level',
curr_bp='$item_value',curr_sp='$item_sp',description='$item_desc' WHERE item_id='$item_id'";
$resultsupdt= mysql_query($sqlupdt) or die ("Error $sqlupdt.".mysql_error());

$sql= "update products set cat_id='$cat_id',product_name='$item_name',prod_code='$item_code',pack_size='$pack_size',weight='$weight',
reorder_level='$reorder_level',curr_sp='$item_sp',curr_bp='$item_value',exchange_rate='$curr_rate',currency_code='$currency_code' where product_id='$item_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sqlauditsav= "insert into audit_trails values('','$user_id',NOW(),'Updated a item $item_name details')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());

header ("Location:home.php?setuptemplate=setuptemplate&item_id=$item_id&editsuccess=1");


mysql_close($cnn);

}

//edit submisssion period
function edit_period($cat_id,$item_id,$item_name,$quant_rec,$date_received,$comments,$user_id)
{

$received_stock_id=$_GET['received_stock_id'];
$cat_id=mysql_real_escape_string($_POST['cat_id']);
$item_id=mysql_real_escape_string($_POST['item_id']);
$quant_rec=mysql_real_escape_string($_POST['quant_rec']);
$date_received=mysql_real_escape_string($_POST['date_received']);
$comments=mysql_real_escape_string($_POST['comments']);
 
$sqlupdt= "UPDATE received_stock SET item_id='$item_id',quant_rec='$quant_rec',date_received='$date_received', comments='$comments' 
WHERE received_stock_id='$received_stock_id'";
$resultsupdt= mysql_query($sqlupdt) or die ("Error $sqlupdt.".mysql_error());


header ("Location:home.php?edit_submission_period=edit_submission_period&received_stock_id=$received_stock_id&editsuccess=1");


mysql_close($cnn);

}


//edit history










?>


