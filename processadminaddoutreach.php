<?php
#include connection
include ('includes/session.php');
include('Connections/fundmaster.php');
 
 $original_bunch_id=$_GET['original_bunch_id'];
 $period_to_orig=$_GET['period_to'];
 $block_id=mysql_real_escape_string($_POST['block_id']);
 $client_id=mysql_real_escape_string($_POST['client_id']);
 $emp_id=mysql_real_escape_string($_POST['emp_id']);
 $period_from=mysql_real_escape_string($_POST['period_from']);
 $period_to=mysql_real_escape_string($_POST['period_to']);

if ($period_from > $period_to)
{
header ("Location:home.php?recorddata=recorddata&wrongdate=1&original_bunch_id=$original_bunch_id&period_to=$period_to");
}
elseif($period_to_orig>$period_from)
{
header ("Location:home.php?recorddata=recorddata&staffonsite=1&original_bunch_id=$original_bunch_id&period_to=$period_to");
}
else
{
$sql= "insert into bunch values ('','$client_id','$block_id','$emp_id','$period_from','$period_to',NOW(),'0')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sqlupdt= "UPDATE employees SET status='1' where emp_id='$emp_id'";
$resultsupdt= mysql_query($sqlupdt) or die ("Error $sqlupdt.".mysql_error());

$sqlupdtc= "UPDATE clients SET status='1' where client_id='$client_id'";
$resultsupdtc= mysql_query($sqlupdtc) or die ("Error $sqlupdtc.".mysql_error());



$sqlsel="select * from bunch order by bunch_id desc limit 1";
$resultssel= mysql_query($sqlsel) or die ("Error $sqlsel.".mysql_error());
$rowssel=mysql_fetch_object($resultssel);

$bunch_id=$rowssel->bunch_id;


header ("Location:home.php?adminoutreach2=adminoutreach2&bunch_id=$bunch_id&original_bunch_id=$original_bunch_id");
}
mysql_close($cnn);


?>






