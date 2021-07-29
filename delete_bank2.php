<?php
include ('includes/session.php');
include('Connections/fundmaster.php');

$id=$_GET['bank_id'];
$employee_id=$_GET['employee_id'];

$hod="SELECT * FROM hs_hr_employee WHERE emp_number='$employee_id'";
$resulthod=mysql_query($hod) or die ("Error $hod.".mysql_error());
$rows=mysql_fetch_object($resulthod);

$emp_name=$rows->emp_firstname.' '.$rows->emp_father_name.' '.$rows->emp_lastname.' '.$rows->emp_fourth_name;
	



/* $qr_confirm23d="SELECT * from user_group_submodule WHERE sub_module_id='$sub_module_id' and `delete`='D' and user_group_id='$user_group_id'";
$qr_res23d=mysql_query($qr_confirm23d) or die ('Error : $qr_confirm23d.' .mysql_error());
$num_rows23d=mysql_num_rows($qr_res23d);  */
if ($num_rows23d==5678890) 
{ 

?>
									
									
<script type="text/javascript">
alert('Sorry Not Allowed To Perfom this task'); 
window.location = "<?php echo $_SERVER['HTTP_REFERER']; ?>";
</script>
<?php

}
else
{
	
	
	
$sql2="INSERT INTO audit_trails SET 
user_id='$user_id',
date_of_event='$to',
action='Deleted bank details for employee $emp_name from the system'";
$results2= mysql_query($sql2) or die ("Error $sql2.".mysql_error());
	
	

$sql= "delete from employee_bank_details where bank_details_id='$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


?>
<script type="text/javascript">
alert('Record Deleted Saved!!');
window.location = "<?php echo $_SERVER['HTTP_REFERER']; ?>";
//window.location = "home.php?add_user_group&sub_module_id=<?php echo $sub_module_id; ?>&id=<?php echo $id; ?>";
</script> 
<?php
//header ("Location:view_user_groups.php? deleteconfirm=1");
}



mysql_close($cnn);


?>


