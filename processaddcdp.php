<?php
#include connection
 include ('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$currency=mysql_real_escape_string($_POST['currency']);

$sqlcurr="select * from currency where curr_id='$currency'";
$resultscurr= mysql_query($sqlcurr) or die ("Error $sqlcurr.".mysql_error());
$rowcurr=mysql_fetch_object($resultscurr);
$curr_rate=$rowcurr->curr_rate;


$per_hour_charge=mysql_real_escape_string($_POST['per_hour_charge']);

$queryprof="select * from per_hour_charge where per_hour_charge_value='$per_hour_charge' and curr_id='$currency'";
$resultsprof=mysql_query($queryprof) or die ("Error: $queryprof.".mysql_error());


$numrowscomp=mysql_num_rows($resultsprof);

if ($numrowscomp>0)

{

header ("Location:home.php?cdp=cdp&recordexist=1");

}

else 
{

$sql= "insert into per_hour_charge values ('','$currency','$curr_rate','$per_hour_charge')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());



header ("Location:home.php?cdp=cdp&addcdpconfirm=1");

}

mysql_close($cnn);


?>


