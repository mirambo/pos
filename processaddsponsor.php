<?php
#include connection
 include ('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$curr_name=mysql_real_escape_string($_POST['curr_name']);
$curr_initials=mysql_real_escape_string($_POST['curr_initials']);
//$curr_rate=mysql_real_escape_string($_POST['curr_rate']);

$queryprof="select * from area where area_name='$curr_name' AND area_code='$curr_initials'";
$resultsprof=mysql_query($queryprof) or die ("Error: $queryprof.".mysql_error());


$numrowscomp=mysql_num_rows($resultsprof);

if ($numrowscomp>0)

{

header ("Location:home.php?newsponsor=newsponsor&recordexist=1");

}

else 

{



$sql= "insert into area values ('','$curr_name','$curr_initials','0')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());






header ("Location:home.php?newsponsor=newsponsor&addsponsorconfirm=1");

}

mysql_close($cnn);


?>


