<?php
#include connection
include('includes/session.php');
include('Connections/fundmaster.php');

$id=$_GET['id'];

#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$station_name=mysql_real_escape_string($_POST['station_name']);
$default_ded_amount=mysql_real_escape_string($_POST['default_ded_amount']);
$sort_order=mysql_real_escape_string($_POST['sort_order']);

if ($id=='')
{

$sql= "INSERT INTO deduction_logs set 
deduction_log_name='$station_name',
sort_order='$sort_order',
default_deduction_amount='$default_ded_amount'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


$sqlauditsav= "insert into audit_trails values('','$user_id',NOW(),'Created a deduction type $station_name into the system ')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());

}
else
{
	
$sql= "update deduction_logs set 
deduction_log_name='$station_name',
sort_order='$sort_order',
default_deduction_amount='$default_ded_amount' 
where deduction_log_id='$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'Edited deduction type details')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());

	
}


?>
<script type="text/javascript">
alert('Record Saved successfuly');
//window.location = "begin_order.php";
window.location = "home.php?deductions=deductions";
</script>
<?php


mysql_close($cnn);


?>


