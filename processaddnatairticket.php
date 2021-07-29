<?php
#include connection
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$emp_id=mysql_real_escape_string($_POST['emp_id']);
//$country=mysql_real_escape_string($_POST['country']);
$dep_town=mysql_real_escape_string($_POST['dep_town']);
$dep_date=mysql_real_escape_string($_POST['dep_date']);
$dest_town=mysql_real_escape_string($_POST['dest_town']);
$arrive_date=mysql_real_escape_string($_POST['arrive_date']);
$ret_date=mysql_real_escape_string($_POST['ret_date']);
$flight_comp=mysql_real_escape_string($_POST['flight_comp']);
$flight_no=mysql_real_escape_string($_POST['flight_no']);
$flight_cost=mysql_real_escape_string($_POST['flight_cost']);
$remarks=mysql_real_escape_string($_POST['remarks']);


$sqlemp="select * from employees where emp_id='$emp_id'";
$resultsemp= mysql_query($sqlemp) or die ("Error $sqlemp.".mysql_error());
$rowsemp=mysql_fetch_object($resultsemp);
$emp_fname=$rowsemp->emp_fname;
$emp_lname=$rowsemp->emp_lname;


$currency=2;
$sqlcurr="select * from currency where curr_id='2'";
$resultscurr= mysql_query($sqlcurr) or die ("Error $sqlcurr.".mysql_error());
$rowcurr=mysql_fetch_object($resultscurr);
$curr_rate=$rowcurr->curr_rate;



$sql= "insert into natairtickets values('','$emp_id','$dep_town','$dep_date','$dest_town','$arrive_date','$ret_date',
'$flight_comp','$flight_no','$flight_cost','$remarks','0',NOW())";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sqlauditsav= "insert into audit_trails values('','2',NOW(),'Processed National Air Ticket')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());


$sqlss="INSERT INTO expenses_ledger VALUES('','Air Ticket for $emp_fname $emp_lname','$flight_cost','$flight_cost', '','$currency','$curr_rate',NOW())";
$resultsss= mysql_query($sqlss) or die ("Error $sqlss.".mysql_error());

$sqlgenled= "insert into general_ledger values('','Air Ticket Fee for $emp_fname $emp_lname','-$flight_cost','','$flight_cost','$currency','$curr_rate',NOW(),'')";
$resultsgenled=mysql_query($sqlgenled) or die ("Error $sqlgenled.".mysql_error());

$sqlgenled= "insert into general_ledger values('','Air Ticket for $emp_fname $emp_lname','$flight_cost','$flight_cost','','$currency','$curr_rate',NOW(),'')";
$resultsgenled=mysql_query($sqlgenled) or die ("Error $sqlgenled.".mysql_error());

$sqlgenled= "insert into cash_ledger values('','Air Ticket for $emp_fname $emp_lname','-$flight_cost','','$flight_cost','$currency','$curr_rate',NOW())";
$resultsgenled=mysql_query($sqlgenled) or die ("Error $sqlgenled.".mysql_error());

/*$querylatelpo="select * from employees order by emp_id desc limit 1";
$resultslatelpo=mysql_query($querylatelpo) or die ("Error: $querylatelpo.".mysql_error());
$rowslatelpo=mysql_fetch_object($resultslatelpo);

$latest_emp_id=$rowslatelpo->emp_id;*/


header ("Location:home.php?processnatflight=processnatflight&addempconfirm=1");




mysql_close($cnn);


?>


