<?php
#include connection
 include ('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$id=$_GET['id'];


$leave=mysql_real_escape_string($_POST['leave']);
$days=mysql_real_escape_string($_POST['no_of_days']);
$days_nature=mysql_real_escape_string($_POST['days']);
$app_gender=mysql_real_escape_string($_POST['app_gender']);


if ($id!='')
{
	
$sql= "UPDATE hs_hr_leavetype SET 
leave_type_name='$leave',
app_gender='$app_gender',
no_of_days='$days',
nature_of_days='$days_nature' WHERE leave_type_id='$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sqlauditsav= "insert into audit_trails values('','$user_id',NOW(),'Updated leave type $leave')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());
?>
<script type="text/javascript">
alert('Leave Type Updated Successfully');
window.location = "<?php echo $_SERVER['HTTP_REFERER']; ?>";
</script> 

<?php
	
	
	
}
else
{

$sql= "insert into hs_hr_leavetype SET 
leave_type_name='$leave',
app_gender='$app_gender',
no_of_days='$days',
nature_of_days='$days_nature'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sqlauditsav= "insert into audit_trails values('','$user_id',NOW(),'Created a form $form_name')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());


?>
<script type="text/javascript">
alert('Leave Type Created Successfully');
window.location = "<?php echo $_SERVER['HTTP_REFERER']; ?>";
</script> 

<?php
}
mysql_close($cnn);


?>


