<?php
#include connection
 include ('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$form_field=mysql_real_escape_string($_POST['form_field']);
$dropdown_name=mysql_real_escape_string($_POST['dropdown_name']);


$queryprof="select * from drop_down where form_field_id='$form_field' AND dropdown_name='$dropdown_name'";
$resultsprof=mysql_query($queryprof) or die ("Error: $queryprof.".mysql_error());


$numrowscomp=mysql_num_rows($resultsprof);

if ($numrowscomp>0)

{

header ("Location:home.php?adddropdown=adddropdown&recordexist=1");

}

else 

{



$sql= "insert into drop_down values ('','$form_field','$dropdown_name')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


header ("Location:home.php?adddropdown=adddropdown&addconfirm=1");


}

mysql_close($cnn);


?>


