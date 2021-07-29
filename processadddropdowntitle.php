<?php
#include connection
 include ('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$title_name=mysql_real_escape_string($_POST['title_name']);


$queryprof="select * from dropdown_titles where dropdown_title_name='$title_name'";
$resultsprof=mysql_query($queryprof) or die ("Error: $queryprof.".mysql_error());


$numrowscomp=mysql_num_rows($resultsprof);

if ($numrowscomp>0)

{

header ("Location:home.php?dropdowntitle=dropdowntitle&recordexist=1");

}

else 

{



$sql= "insert into dropdown_titles values ('','$title_name')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


header ("Location:home.php?dropdowntitle=dropdowntitle&addconfirm=1");


}

mysql_close($cnn);


?>


