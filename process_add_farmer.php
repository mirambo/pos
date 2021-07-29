<?php
#include connection
include ('includes/session.php');
include('Connections/fundmaster.php');
$new=$_GET['new'];
$id=$_GET['id'];
$customer_name=mysql_real_escape_string($_POST['customer_name']);
$customer_code=mysql_real_escape_string($_POST['farmer_code']);


$email=mysql_real_escape_string($_POST['email']);
$phone=mysql_real_escape_string($_POST['phone']);
$region=mysql_real_escape_string($_POST['region']);

if ($id=='')
{
 
$sqlupdt= "INSERT INTO farmers SET 
farmer_name ='$customer_name',
farmer_code ='$customer_code',
supplier_id ='39',
farmer_region_id='$region',
email='$email',
phone='$phone'";
$resultsupdt= mysql_query($sqlupdt) or die ("Error $sqlupdt.".mysql_error());





$sqlauditsav= "insert into audit_trails values('','$user_id',NOW(),'Created farmer $customer_name details into the system ')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());

?>
<script type="text/javascript">
alert('Record Saved Successfuly');
//window.location = "home.php?initiateproject=initiateproject&sub_module_id=<?php echo $sub_module_id; ?>";
window.location = "home.php?farmers";
</script>
<?php

}
else
{
	
$sqlupdt= "UPDATE farmers SET 
farmer_name ='$customer_name',
farmer_code ='$customer_code',
supplier_id ='39',
farmer_region_id='$region',
email='$email',
phone='$phone' WHERE farmer_id='$id'";
$resultsupdt= mysql_query($sqlupdt) or die ("Error $sqlupdt.".mysql_error());





$sqlauditsav= "insert into audit_trails values('','$user_id',NOW(),'Updated farmer $customer_name details into the system ')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());
	
	
	?>
<script type="text/javascript">
alert('Updated Saved Successfuly');
//window.location = "home.php?initiateproject=initiateproject&sub_module_id=<?php echo $sub_module_id; ?>";
window.location = "home.php?farmers";
</script>
<?php
	
	
	
}
//header ("Location:home.php?editproject=editproject&customer_id=$customer_id&editsuccess=1");




mysql_close($cnn);




?>


