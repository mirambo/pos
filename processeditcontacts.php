<?php
#include connection
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$emp_id=$_GET['emp_id'];
$ssmob1=mysql_real_escape_string($_POST['ssmob1']);
$ssmob2=mysql_real_escape_string($_POST['ssmob2']);
$comob1=mysql_real_escape_string($_POST['comob1']);
$comob2=mysql_real_escape_string($_POST['comob2']);

$sstel1=mysql_real_escape_string($_POST['sstel1']);
$sstel2=mysql_real_escape_string($_POST['sstel2']);
$cotel1=mysql_real_escape_string($_POST['cotel1']);
$cotel2=mysql_real_escape_string($_POST['cotel2']);

$office_email1=mysql_real_escape_string($_POST['office_email1']);
$office_email2=mysql_real_escape_string($_POST['office_email2']);
$private_email1=mysql_real_escape_string($_POST['private_email1']);
$private_email2=mysql_real_escape_string($_POST['private_email2']);

$queryprof="select * from staff_contacts where emp_id='$emp_id'";
$resultsprof=mysql_query($queryprof) or die ("Error: $queryprof.".mysql_error());
								 

$numrowscomp=mysql_num_rows($resultsprof);

if ($numrowscomp>0)

{

$sql= "update staff_contacts set 
ssmob1='$ssmob1',
ssmob2='$ssmob2',
comob1='$comob1',
comob2='$comob2',
sstel1='$sstel1',
sstel2='$sstel2',
cotel1='$cotel1',
cotel2='$cotel2',
office_email1='$office_email1',
office_email2='$office_email2',
private_email1='$private_email1',
private_email2='$private_email2'


where emp_id='$emp_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());




}
else
{

$sql= "insert into staff_contacts values('','$emp_id','$ssmob1','$ssmob2','$comob1','$comob2','$sstel1','$sstel2','$cotel1','$cotel2',
'$office_email1','$office_email2','$private_email1','$private_email2','0')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}


header ("Location:home.php?viewcontdet=viewcontdet&emp_id=$emp_id&editconfirm=1");




mysql_close($cnn);


?>


