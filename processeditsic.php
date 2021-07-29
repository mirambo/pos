<?php
#include connection
include ('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$sic_rate_id=$_GET['sic_rate_id'];

$employee_sic=mysql_real_escape_string($_POST['employee_sic']);
$employer_sic=mysql_real_escape_string($_POST['employer_sic']);

$sqlred= "select * from sic_rate where sic_employee='$employee_sic' and sic_employer='$employer_sic'";
$resultsred= mysql_query($sqlred) or die ("Error $sqlred.".mysql_error());
$numrowsred= mysql_num_rows($resultsred);

if ($numrowsred>0)
{

}
else
{

$sql= "insert into sic_rate values ('','$employee_sic','$employer_sic')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
 
/*$sqlupdt= "UPDATE sic_rate SET sic_employee ='$employee_sic',sic_employer='$employer_sic' WHERE sic_rate_id='$sic_rate_id'";
$resultsupdt= mysql_query($sqlupdt) or die ("Error $sqlupdt.".mysql_error());*/



header ("Location:home.php?editsic=editsic&sic_rate_id=$sic_rate_id&editsuccess=1");


mysql_close($cnn);

?>


