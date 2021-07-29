<?php
#include connection
 include ('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$section_name=mysql_real_escape_string($_POST['section_name']);
$sort_order=mysql_real_escape_string($_POST['sort_order']);
//$curr_rate=mysql_real_escape_string($_POST['curr_rate']);

$queryprof="select * from form_sections where form_section_name='$section_name'";
$resultsprof=mysql_query($queryprof) or die ("Error: $queryprof.".mysql_error());


$numrowscomp=mysql_num_rows($resultsprof);

if ($numrowscomp>0)

{

header ("Location:home.php?addformsections=addformsections&recordexist=1");

}

else 

{



$sql= "insert into form_sections values ('','$section_name','$sort_order')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


header ("Location:home.php?addformsections=addformsections&addconfirm=1");


}

mysql_close($cnn);


?>


