<?php
#include connection
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
//$updt_uname=mysql_real_escape_string($_POST['updt_uname']);
//$updt_pword=mysql_real_escape_string($_POST['updt_pword']);
$id=$_GET['emp_id'];





$sql= "delete from employees where emp_id='$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());



header ("Location:view_employees.php?deleteconfirm=1");



mysql_close($cnn);


?>


