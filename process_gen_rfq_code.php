<?php
#include connection
include('Connections/fundmaster.php');

$get_sup_id=mysql_real_escape_string($_POST['sel_sup']); 


$sql= "insert into rfq_code_get values('')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

session_start();
$_SESSION['get_sup_id']=$get_sup_id;


$queryprof="select * from rfq_code_get order by rfq_code_id desc limit 1";
$resultsprof=mysql_query($queryprof) or die ("Error: $queryprof.".mysql_error());
								  
$rowsprof=mysql_fetch_object($resultsprof);

$rfq_code_id=$rowsprof->rfq_code_id;
$_SESSION['rfq_code_id']=$rfq_code_id;

$sqltrunc = "TRUNCATE TABLE temp_rfq";
$resultstrunc=mysql_query($sqltrunc) or die ("Error: $sqltrunc.".mysql_error());

 


header ("Location:generate_rfq.php");



mysql_close($cnn);


?>


