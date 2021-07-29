<?php
#include connection
include('Connections/fundmaster.php');
include('includes/session.php');
$employee_id=$_GET['employee_id'];
$edu_id=$_GET['edu_id'];
//var_dump($edu_id); 
//var_dump($employee_id); die();
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
//$user_group_id=mysql_real_escape_string($_POST['user_group_id']);
$qualification=mysql_real_escape_string($_POST['qualification']);
$institution=mysql_real_escape_string($_POST['institution']);
$major=mysql_real_escape_string($_POST['major']);
$grade=mysql_real_escape_string($_POST['grade']);
$sdate=mysql_real_escape_string($_POST['sdate']);
$enddate=mysql_real_escape_string($_POST['enddate']);
$upload_file=$_FILES["certfile"][ "name" ];
$temp_name=$_FILES["certfile"]["tmp_name"];

if ($temp_name=="")
{
	
$imgpath="";	
}
else
{
$imgpath="uploads/staff_photo/".$upload_file;
	
}
move_uploaded_file($temp_name, $imgpath);	


if($edu_id!='')
{
	
	if ($temp_name=="")
	{
$sql="UPDATE employee_education_details SET 
employee_id='$employee_id',
qualification='$qualification',
institution='$institution',
specialization='$major',
score='$grade',
start_date='$sdate',
to_date='$enddate' WHERE education_details_id='$edu_id'";
 //or die(mysql_error("could not insert"));

$results3= mysql_query($sql) or die ("Error $sql.".mysql_error());

	}
	else
	{
	
$sql="UPDATE employee_education_details SET 
employee_id='$employee_id',
qualification='$qualification',
institution='$institution',
specialization='$major',
score='$grade',
start_date='$sdate',
to_date='$enddate',
attachment='$imgpath' where education_details_id='$edu_id'";
 

$results3= mysql_query($sql) or die ("Error $sql.".mysql_error());	
}
}
else
{
$sql="INSERT into employee_education_details SET 
employee_id='$employee_id',
qualification='$qualification',
institution='$institution',
specialization='$major',
score='$grade',
start_date='$sdate',
to_date='$enddate',
attachment='$imgpath'";


$results3= mysql_query($sql) or die ("Error $sql.".mysql_error());


$education_details_id=mysql_insert_id(); 
} 

//header ("Location:home.php?add_employee&sub_module_id=$sub_module_id&qt=9&employee_id=$employee_id");

?>
<script type="text/javascript">
alert('Education Details Saved Successfully');
window.location = "home.php?add_employee&sub_module_id=<?php echo $sub_module_id ?>&qt=9&employee_id=<?php echo $employee_id;  ?>";

</script>

<?php

mysql_close($cnn);

?>


