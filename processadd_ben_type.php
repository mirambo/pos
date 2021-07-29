<?php
#include connection
include('includes/session.php');
include('Connections/fundmaster.php');
$id=$_GET['id'];

#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$station_name=mysql_real_escape_string($_POST['station_name']);
$sort_order=mysql_real_escape_string($_POST['sort_order']);
$default_ben_amount=mysql_real_escape_string($_POST['default_ben_amount']);


if ($id=='')
{
	
	
$sql= "insert into benefit_logs set

benefit_log_name='$station_name',
sort_order='$sort_order',
default_benefit_amount='$default_ben_amount'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


$sqlauditsav= "insert into audit_trails values('','$user_id',NOW(),'Created a benefit type $station_name into the system ')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());
	
	
}
else
{
	
$sql= "update benefit_logs set 
benefit_log_name='$station_name',
sort_order='$sort_order',
default_benefit_amount='$default_ben_amount' 
where benefit_log_id='$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'Edited benefit type details')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());


}


//header ("Location:add_benefit_type.php? addnhifconfirm=1");

?>
<script type="text/javascript">
alert('Record Saved successfuly');
//window.location = "begin_order.php";
window.location = "home.php?allowance=allowance";
</script>
<?php


mysql_close($cnn);


?>


