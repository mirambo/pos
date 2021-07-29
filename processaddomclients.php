<?php
#include connection
 include ('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$c_name=mysql_real_escape_string($_POST['c_name']);
$c_address=mysql_real_escape_string($_POST['c_address']);
$c_town=mysql_real_escape_string($_POST['c_town']);
$cp_address=mysql_real_escape_string($_POST['cp_address']);
$telephone=mysql_real_escape_string($_POST['telephone']);
$email=mysql_real_escape_string($_POST['email']);
$contact_person=mysql_real_escape_string($_POST['contact_person']);

$queryprof="select * from omclients where c_name='$c_name'";
$resultsprof=mysql_query($queryprof) or die ("Error: $queryprof.".mysql_error());


$numrowscomp=mysql_num_rows($resultsprof);

if ($numrowscomp>0)

{

header ("Location:home.php?omclients=omclients&recordexist=1");

}

else 
{

$sql= "insert omclients values ('','$c_name','$c_address','$c_town','$cp_address','$telephone','$contact_person','$email',NOW(),'0')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());



header ("Location:home.php?omclients=omclients&addconfirm=1");

}



mysql_close($cnn);


?>


