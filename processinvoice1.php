<?php
#include connection
 include ('includes/session.php');
include('Connections/fundmaster.php');

$client_id=mysql_real_escape_string($_POST['client_id']);



header ("Location:home.php?invoice2=invoice2&client_id=$client_id");
mysql_close($cnn);
/*}



*/
?>


