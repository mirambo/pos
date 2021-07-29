<?php
#include connection
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$emp_id=$_GET['emp_id'];
$contract_type=mysql_real_escape_string($_POST['contract_type']);
$term_type=mysql_real_escape_string($_POST['term_type']);
$begin_date=mysql_real_escape_string($_POST['begin_date']);
$termination_date=mysql_real_escape_string($_POST['termination_date']);
$probation_time=mysql_real_escape_string($_POST['probation_time']);
$cont_remarks=mysql_real_escape_string($_POST['cont_remarks']);

$queryprof="select * from staff_contract where emp_id='$emp_id'";
$resultsprof=mysql_query($queryprof) or die ("Error: $queryprof.".mysql_error());
								 

$numrowscomp=mysql_num_rows($resultsprof);

if ($numrowscomp>0)

{

$sql= "update staff_contract set 
contract_type='$contract_type',
term_type='$term_type',
begin_date='$begin_date',
termination_date='$termination_date',
probation_time='$probation_time',
contract_remarks='$cont_remarks'

where emp_id='$emp_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());




}
else
{

$sql= "insert into staff_contract values('','$emp_id','$contract_type','$term_type','$begin_date','$termination_date','$probation_time','$cont_remarks','0')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}


header ("Location:home.php?viewempcontract=viewempcontract&emp_id=$emp_id&editconfirm=1");




mysql_close($cnn);


?>


