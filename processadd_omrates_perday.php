<?php
#include connection
 include ('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$omjob_title_id=mysql_real_escape_string($_POST['omjob_title_id']);
$job_cat_id=mysql_real_escape_string($_POST['job_cat_id']);
$amount=mysql_real_escape_string($_POST['amount']);



$queryprof="select * from omper_day_rates where omjob_title_id='$omjob_title_id' AND job_cat_id='$job_cat_id'";
$resultsprof=mysql_query($queryprof) or die ("Error: $queryprof.".mysql_error());

$numrowscomp=mysql_num_rows($resultsprof);

if ($numrowscomp>0)

{

header ("Location:home.php?omrates=omrates&recordexist=1");

}

else 
{

$sql= "insert into omper_day_rates values ('','$omjob_title_id','$job_cat_id','$amount','')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


header ("Location:home.php?omrates=omrates&addconfirm=1");

}




mysql_close($cnn);


?>


