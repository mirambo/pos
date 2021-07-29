<?php
#include connection
include('Connections/fundmaster.php');
include('includes/session.php');
$employee_id=$_GET['employee_id'];
$dep_id=$_GET['dep_id'];
//var_dump($employee_id); die();	
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
//$user_group_id=mysql_real_escape_string($_POST['user_group_id']);
$name=mysql_real_escape_string($_POST['dependant_name']);
$relationship=mysql_real_escape_string($_POST['relationship']);
$attach_type=mysql_real_escape_string($_POST['attach_type']);
$dep_non_child_cover=mysql_real_escape_string($_POST['dep_non_child_cover']);






if ($dep_id!='')
{
	
	//var_dump($name); die();
/////////////////employee atm copy
$valid_formats = array("jpg", "png", "gif", "zip", "bmp");
$max_file_size = 1024*100; //100 kb
$atm_copy_path = "dependants_copies/"; // Upload directory
$upload_file=$_FILES["myfile"][ "name" ];
$temp_name=$_FILES["myfile"]["tmp_name"];



if ($temp_name=='')
{
$filepath="";	
move_uploaded_file($temp_name, $filepath);

$sql3="UPDATE employee_dependant_details SET 
dependant_name='$name',
relationship='$relationship',
attachment_type='$attach_type',
covered='$dep_non_child_cover'

WHERE dependant_id='$dep_id'";

//var_dump($sql3); die();
$results3= mysql_query($sql3) or die ("Error $sql3.".mysql_error());

}
else
{
$filepath="dependants_copies/".$upload_file;
move_uploaded_file($temp_name, $filepath);

$sql3="UPDATE employee_dependant_details SET 
dependant_name='$name',
relationship='$relationship',
attachment_type='$attach_type',
covered='$dep_non_child_cover',
attach_copy='$filepath'

WHERE dependant_id='$dep_id'";

//var_dump($sql3); die();
$results3= mysql_query($sql3) or die ("Error $sql3.".mysql_error());	
	
}


	


?>
<script type="text/javascript">
alert('Record Saved Successfully');
window.location = "home.php?add_employee=add_employee&sub_module_id=<?php echo $sub_module_id ?>&qt=4&employee_id=<?php echo $employee_id;?>&id=<?php echo $dep_id; ?>";
//window.location = "home.php?addquest1=addquest1&sub_module_id=<?php echo $sub_module_id ?>&qt=<?php echo $question_type_id;?>&form_id=<?php echo $form_id; ?>&par_id=<?php echo $parameter_id; ?>";
</script>

<?php
		
}
else
{

//var_dump($name); die();
/////////////////employee atm copy
$valid_formats = array("jpg", "png", "gif", "zip", "bmp");
$max_file_size = 1024*100; //100 kb
$atm_copy_path = "dependants_copies/"; // Upload directory
$upload_file=$_FILES["myfile"][ "name" ];
$temp_name=$_FILES["myfile"]["tmp_name"];

if ($temp_name=='')
{
$filepath="";	
}
else
{
$filepath="dependants_copies/".$upload_file;	

}

move_uploaded_file($temp_name, $filepath);
//die();
//insert into db
//$employee_id=1;
$type="dependants";

$sqld="SELECT * FROM employee_dependant_details where employee_id='$employee_id' and covered='YES'";
$resultsd= mysql_query($sqld) or die ("Error $sqld.".mysql_error());
$rowsd=mysql_num_rows($resultsd);

if ($rowsd>=4)
{
	
$sql3="INSERT into employee_dependant_details SET 
employee_id='$employee_id',
dependance_type='$type',
dependant_name='$name',
relationship='$relationship',
attachment_type='$attach_type',
covered='NO',
attach_copy='$filepath'";
//var_dump($sql3); die();
$results3= mysql_query($sql3) or die ("Error $sql3.".mysql_error());

$dependant_id=mysql_insert_id();
?>
<script type="text/javascript">

alert('Maximum number of covered dependants are 4');

window.location = "home.php?users=users&sub_module_id=<?php echo $sub_module_id ?>&qt=4&employee_id=<?php echo $employee_id;  ?>";
//window.location = "home.php?addquest1=addquest1&sub_module_id=<?php echo $sub_module_id ?>&qt=<?php echo $question_type_id;?>&form_id=<?php echo $form_id; ?>&par_id=<?php echo $parameter_id; ?>";
</script>


<?php
	
}
else
{

$sql3="INSERT into employee_dependant_details SET 
employee_id='$employee_id',
dependance_type='$type',
dependant_name='$name',
relationship='$relationship',
attachment_type='$attach_type',
covered='$dep_non_child_cover',
attach_copy='$filepath'";
//var_dump($sql3); die();
$results3= mysql_query($sql3) or die ("Error $sql3.".mysql_error());

$dependant_id=mysql_insert_id(); 
}

?>
<script type="text/javascript">
alert('Record Saved Successfully');

window.location = "home.php?add_employee=add_employee&sub_module_id=<?php echo $sub_module_id ?>&qt=4&employee_id=<?php echo $employee_id;?>";
//window.location = "home.php?addquest1=addquest1&sub_module_id=<?php echo $sub_module_id ?>&qt=<?php echo $question_type_id;?>&form_id=<?php echo $form_id; ?>&par_id=<?php echo $parameter_id; ?>";
</script>

<?php
}





mysql_close($cnn);


?>


