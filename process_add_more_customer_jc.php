<?php
#include connection
include ('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$type=$_GET['type'];



$customer_name=mysql_real_escape_string($_POST['customer_name']);


$sqlprof= "SELECT * from customer where customer_name='$customer_name'";
$resultsprof= mysql_query($sqlprof) or die ("Error $sqlpo.".mysql_error());
$rowsprof=mysql_num_rows($resultsprof);

if ($rowsprof>0)
{
header ("Location:generate_invoice.php?recordexist=1");
}
else
{

$sqlupdt= "INSERT INTO customer (customer_name) VALUES('$customer_name')";
$resultsupdt= mysql_query($sqlupdt) or die ("Error $sqlupdt.".mysql_error());

$sqlupdt2= "INSERT INTO clients (c_name) VALUES('$customer_name')";
$resultsupdt2= mysql_query($sqlupdt2) or die ("Error $sqlupdt2.".mysql_error());

$queryempno="select * from customer order by  customer_id desc limit 1";
$resultsempno=mysql_query($queryempno) or die ("Error: $queryempno.".mysql_error());	
$rows=mysql_fetch_object($resultsempno);							  
$customer_id=$rows->customer_id;

session_start();
$_SESSION['new_id']=$customer_id;
echo $sess_new_id=$_SESSION['new_id'];


$sqlauditsav= "insert into audit_trails values('','$user_id',NOW(),'Added more customer into the system')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());



header ("Location:home.php?viewcountries=viewcountries&new_id=$customer_id");

}

mysql_close($cnn);

?>


