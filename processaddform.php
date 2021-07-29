<?php
#include connection
include('includes/session.php');
include('Connections/fundmaster.php');

#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$form_name=mysql_real_escape_string($_POST['form_name']);
$form_type=mysql_real_escape_string($_POST['form_type']);
$sort_order=mysql_real_escape_string($_POST['sort_order']);


$sqllpo= "insert into forms VALUES('','$form_name','$form_type','$sort_order')";
$resultslpo= mysql_query($sqllpo) or die ("Error $sqllpo.".mysql_error());






//header ("Location:home.php?income=income&addconfirm=1");



//}




mysql_close($cnn);


?>


