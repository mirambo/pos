<?php
#include connection
include ('includes/session.php');
include('Connections/fundmaster.php');
 $job_cat_id=$_GET['job_cat_id'];
 $original_bunch_id=$_GET['original_bunch_id'];
 $period_to_orig=$_GET['period_to'];
 $client_id=mysql_real_escape_string($_POST['client_id']);
 $consultant_id=mysql_real_escape_string($_POST['consultant_id']);
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
$sql= "insert into om_bunch values ('','$job_cat_id','$client_id','$consultant_id','$period_from','$period_to',NOW(),'0')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

/*$sqlupdt= "UPDATE employees SET status='1' where emp_id='$emp_id'";
$resultsupdt= mysql_query($sqlupdt) or die ("Error $sqlupdt.".mysql_error());

$sqlupdtc= "UPDATE clients SET status='1' where client_id='$client_id'";
$resultsupdtc= mysql_query($sqlupdtc) or die ("Error $sqlupdtc.".mysql_error());
*/




$sqlsel="select * from om_bunch order by om_bunch_id desc limit 1";
$resultssel= mysql_query($sqlsel) or die ("Error $sqlsel.".mysql_error());
$rowssel=mysql_fetch_object($resultssel);

$om_bunch_id=$rowssel->om_bunch_id;


header ("Location:home.php?assignexperts2=assignexperts2&job_cat_id=$job_cat_id&om_bunch_id=$om_bunch_id&original_om_bunch_id=$original_om_bunch_id");
}
mysql_close($cnn);


?>






