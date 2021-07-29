<?php
#include connection
 include ('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$operation=mysql_real_escape_string($_POST['operation']);
$client=mysql_real_escape_string($_POST['client']);
$period_from=mysql_real_escape_string($_POST['period_from']);
$period_to=mysql_real_escape_string($_POST['period_to']);
$contract_no=mysql_real_escape_string($_POST['contract_no']);

$queryprof="select * from projects where operation_id='$operation' AND client_id='$client'";
$resultsprof=mysql_query($queryprof) or die ("Error: $queryprof.".mysql_error());
echo $numrowscomp=mysql_num_rows($resultsprof);



if ($numrowscomp>0)

{

header ("Location:home.php?initiateproject=initiateproject&recordexist=1");

}


else
{


$sql= "insert projects values ('','$operation','$client','$period_from','$period_to','$contract_no',NOW(),'0')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sqlauditsav= "insert into audit_trails values('','$user_id',NOW(),'Added a project from the system')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());

header ("Location:home.php?initiateproject=initiateproject&addconfirm=1");

}


mysql_close($cnn);


?>


