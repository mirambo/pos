<?php
#include connection
include ('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$bi_male=mysql_real_escape_string($_POST['bi_male']);
$bi_female=mysql_real_escape_string($_POST['bi_female']);
$bi_achived=mysql_real_escape_string($_POST['bi_achived']);
$narration=mysql_real_escape_string($_POST['narration']);
$bi_weekly_id=$_GET['bi_weekly_id'];

 
$sqlupdt= "UPDATE nrc_biweekly SET bi_male='$bi_male',
bi_female='$bi_female',bi_achieved='$bi_achived', narrative='$narration' WHERE bi_weekly_id='$bi_weekly_id'";
$resultsupdt= mysql_query($sqlupdt) or die ("Error $sqlupdt.".mysql_error());



header ("Location:home.php?countryreport=countryreport");






mysql_close($cnn);

?>


