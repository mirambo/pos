<?php
#include connection
include('Connections/fundmaster.php');
include('includes/session.php');
$employee_id=$_GET['employee_id'];
$skill_id=$_GET['skill_id'];

#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
//$user_group_id=mysql_real_escape_string($_POST['user_group_id']);
$skill=mysql_real_escape_string($_POST['skill']);
$yoe=mysql_real_escape_string($_POST['yoe']);
$comments=mysql_real_escape_string($_POST['comments']);

$upload_file=$_FILES["attachcert"][ "name" ];
$temp_name=$_FILES["attachcert"]["tmp_name"];


if ($temp_name=='')
{
	
$filepath='';	
}
else{
	
	
	$filepath="uploads/staff_photo/".$upload_file;
	
}


move_uploaded_file($temp_name, $filepath);

if($skill_id!='')
{
	
if ($filepath=='')	
{
	
$sql="UPDATE emplloyee_skills_details SET 
employee_id='$employee_id',
skill_id='$skill',
years_of_experience='$yoe',
comments='$comments'
WHERE id='$skill_id'";

$results3= mysql_query($sql) or die ("Error $sql.".mysql_error());

}
else
{	
	
$sql="UPDATE emplloyee_skills_details SET 
employee_id='$employee_id',
skill_id='$skill',
years_of_experience='$yoe',
comments='$comments',
attachment='$filepath'
WHERE id='$skill_id'";


$results3= mysql_query($sql) or die ("Error $sql.".mysql_error());	
}

}
else{
	
	
$sql="INSERT into emplloyee_skills_details SET 
employee_id='$employee_id',
skill_id='$skill',
attachment='$filepath',
years_of_experience='$yoe',
comments='$comments'";

 //or die(mysql_error("could not insert"));

$results3= mysql_query($sql) or die ("Error $sql.".mysql_error());


echo $skills_id=mysql_insert_id(); 



 
}

//header ("Location:home.php?add_employee&sub_module_id=$sub_module_id&qt=11&employee_id=$employee_id&success&skill_id=$skill_id");
 ?>
<script type="text/javascript">
alert('Personal Details Saved Successfully');

window.location = "home.php?add_employee&sub_module_id=<?php echo $sub_module_id ?>&employee_id=<?php echo $employee_id;  ?>&qt=11&skill_id=<?php echo $skill_id; ?>";

</script>

<?php






mysql_close($cnn);

?>


