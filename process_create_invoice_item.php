<?php
include('includes/session.php');
include('Connections/fundmaster.php');
$booking_id=mysql_real_escape_string($_POST['booking_id']);
$job_card_id=mysql_real_escape_string($_POST['job_card_id']);
$invoice_id=mysql_real_escape_string($_POST['invoice_id']);
$cat_id=mysql_real_escape_string($_POST['cat_id']);
$item_name=mysql_real_escape_string($_POST['item_name']);
$item_code=mysql_real_escape_string($_POST['item_code']);
$quantity=mysql_real_escape_string($_POST['item_quantity']);
$reorder_level=mysql_real_escape_string($_POST['reorder_level']);
$item_value=mysql_real_escape_string($_POST['item_value']);
$unit_price=mysql_real_escape_string($_POST['item_sp']);
$item_desc=mysql_real_escape_string($_POST['item_desc']);
$pack_size='Pieces';

$sqlprof= "SELECT * from items where item_code='$item_code'";
$resultsprof= mysql_query($sqlprof) or die ("Error $sqlpo.".mysql_error());
$rowsprof=mysql_num_rows($resultsprof);

if ($rowsprof>0)
{
header ("Location:home.php?viewsubprojectlocation=viewsubprojectlocation&booking_id=$booking_id&job_card_id=$job_card_id&invoice_id=$invoice_id&recordexist=1");
}
else
{

$sql3="INSERT INTO items VALUES('','$cat_id','$item_name','$item_code','$pack_size','$reorder_level','$item_value','$item_sp','$item_desc','')" or die(mysql_error());
$results3= mysql_query($sql3) or die ("Error $sql3.".mysql_error());

$sql= "insert into products values ('','$cat_id','$item_name','$item_code','$pack_size','$weight','$reorder_level','$item_sp','$item_value','6','1','')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


$sqlprofi= "SELECT * from items order by item_id desc limit 1";
$resultsprofi= mysql_query($sqlprofi) or die ("Error $sqlprofi.".mysql_error());
$rowsprofi=mysql_fetch_object($resultsprofi);

$part_id=$rowsprofi->item_id;

$sql3="INSERT INTO released_item VALUES('','$booking_id','$job_card_id','$requisition_id','$part_id','$quantity','$delivery_date',
'$rec_person','0','0',NOW())";
$results3=mysql_query($sql3) or die ("Error $sql3.".mysql_error());


$sqlauditsav= "insert into audit_trails values('','$user_id',NOW(),'Created an item $item_name into the system')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());


header ("Location:home.php?viewsubprojectlocation=viewsubprojectlocation&booking_id=$booking_id&job_card_id=$job_card_id&invoice_id=$invoice_id&addconfirm=1");
}

?>