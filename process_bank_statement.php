<?php
#include connection
include('Connections/fundmaster.php');
include('includes/session.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$bank=mysql_real_escape_string($_POST['bank']);


header ("Location:view_bank_statement.php?bank_id=$bank");





mysql_close($cnn);


?>


