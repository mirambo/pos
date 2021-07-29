<?php
include('includes/session.php');
include('Connections/fundmaster.php');


$flat_rate_cost=mysql_real_escape_string($_POST['flat_rate_cost']);




$sql= "insert into flat_rate_cost values ('','$flat_rate_cost')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'Update the flat rate cost')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());

header ("Location:home.php?subconinvoicestoclient=subconinvoicestoclient&updateconfirm=1");






mysql_close($cnn);


?>


