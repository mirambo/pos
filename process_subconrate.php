<?php
#include connection
 include ('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
//$sub_contractor=mysql_real_escape_string($_POST['sub_contractor']);
$omjob_title_id=mysql_real_escape_string($_POST['omjob_title_id']);
$staff_type=mysql_real_escape_string($_POST['staff_type']);
$amount=mysql_real_escape_string($_POST['amount']);


$queryprof="select * from subcon_rates where omjob_title_id='$omjob_title_id' AND job_cat_id='$staff_type'";
$resultsprof=mysql_query($queryprof) or die ("Error: $queryprof.".mysql_error());

$numrowscomp=mysql_num_rows($resultsprof);

if ($numrowscomp>0)

{

header ("Location:home.php?subconrate=subconrate&recordexist=1");

}

else 
{

$sql= "insert into subcon_rates values ('','$sub_contractor','$omjob_title_id','$staff_type','$amount','')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


header ("Location:home.php?subconrate=subconrate&addconfirm=1");

}




mysql_close($cnn);


?>


