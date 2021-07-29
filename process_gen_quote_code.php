<?php
#include connection
include('Connections/fundmaster.php');

$get_client_id=mysql_real_escape_string($_POST['client']); 
$sales_rep=mysql_real_escape_string($_POST['sales_rep']);
$currency=mysql_real_escape_string($_POST['currency']);
$payment_terms=mysql_real_escape_string($_POST['payment_terms']);
$delivery_terms=mysql_real_escape_string($_POST['delivery_terms']);


//echo $sales_rep;

$sql= "insert into quote_code_gen values('')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

session_start();
$_SESSION['get_client_id']=$get_client_id;
$_SESSION['sale_rep']=$sales_rep;
$_SESSION['currency']=$currency;
$_SESSION['payment_terms']=$payment_terms;
$_SESSION['delivery_terms']=$delivery_terms;



$queryprof="select * from quote_code_gen order by qoute_code_id desc limit 1";
$resultsprof=mysql_query($queryprof) or die ("Error: $queryprof.".mysql_error());
								  
$rowsprof=mysql_fetch_object($resultsprof);

$quote_code=$rowsprof->qoute_code_id;
$_SESSION['quote_code']=$quote_code;

$sqltrunc = "TRUNCATE TABLE temp_quote";
$resultstrunc=mysql_query($sqltrunc) or die ("Error: $sqltrunc.".mysql_error());
 


header ("Location:generate_quote.php");



mysql_close($cnn);


?>


