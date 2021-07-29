<?php
#include connection
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$emp_id=mysql_real_escape_string($_POST['emp_id']);
$country=mysql_real_escape_string($_POST['country']);
$dep_town=mysql_real_escape_string($_POST['dep_town']);
$dep_date=mysql_real_escape_string($_POST['dep_date']);
$dest_town=mysql_real_escape_string($_POST['dest_town']);
$arrive_date=mysql_real_escape_string($_POST['arrive_date']);
$ret_date=mysql_real_escape_string($_POST['ret_date']);
$flight_comp=mysql_real_escape_string($_POST['flight_comp']);
$flight_no=mysql_real_escape_string($_POST['flight_no']);
$flight_cost=mysql_real_escape_string($_POST['flight_cost']);
$remarks=mysql_real_escape_string($_POST['remarks']);



$sql= "insert into airtickets values('','$emp_id','$country','$dep_town','$dep_date','$dest_town','$arrive_date','$ret_date',
'$flight_comp','$flight_no','$flight_cost','$remarks','0',NOW())";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sqlauditsav= "insert into audit_trails values('','2',NOW(),'Processed Air Ticket')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());


$querylatelpo="select * from employees order by emp_id desc limit 1";
$resultslatelpo=mysql_query($querylatelpo) or die ("Error: $querylatelpo.".mysql_error());
$rowslatelpo=mysql_fetch_object($resultslatelpo);

$latest_emp_id=$rowslatelpo->emp_id;


header ("Location:home.php?processinterflight=processinterflight&addempconfirm=1");




mysql_close($cnn);


?>


