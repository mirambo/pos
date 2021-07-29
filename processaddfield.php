<?php
#include connection
 include ('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$form_section=mysql_real_escape_string($_POST['form_section']);
$field_name=mysql_real_escape_string($_POST['field_name']);
$form_type=mysql_real_escape_string($_POST['form_type']);
$sort_order=mysql_real_escape_string($_POST['sort_order']);

$queryprof="select * from form_fields where form_field_name='$form_section' AND form_field_type='$form_type'";
$resultsprof=mysql_query($queryprof) or die ("Error: $queryprof.".mysql_error());


$numrowscomp=mysql_num_rows($resultsprof);

if ($numrowscomp>0)

{

header ("Location:home.php?addformfields=addformfields&recordexist=1");

}

else 

{



$sql= "insert into form_fields values ('','$form_section','$field_name','$form_type','$sort_order','')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


header ("Location:home.php?addformfields=addformfields&addconfirm=1");


}

mysql_close($cnn);


?>


