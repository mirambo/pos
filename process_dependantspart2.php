<?php
#include connection
include('Connections/fundmaster.php');
include('includes/session.php');
$employee_id=$_GET['employee_id'];
$dep_id2=$_GET['dep_id2'];
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
//$user_group_id=mysql_real_escape_string($_POST['user_group_id']);
$name=mysql_real_escape_string($_POST['child_name']);
$dob=mysql_real_escape_string($_POST['dob']);
$attach_type=mysql_real_escape_string($_POST['attach_type']);
$dep_child_cover=mysql_real_escape_string($_POST['dep_child_cover']);

$valid_formats = array("jpg", "png", "gif", "zip", "bmp");
$max_file_size = 1024*100; //100 kb
$atm_copy_path = "dependants_copies/"; // Upload directory
$upload_file=$_FILES["attach"][ "name" ];
$temp_name=$_FILES["attach"]["tmp_name"];



if ($dep_id2!='')
{
	
if ($temp_name=='')
{
$filepath="";	
$sql3="UPDATE employee_dependant_details SET 
dependant_name='$name',
date_of_birth='$dob',
covered='$dep_child_cover',
attachment_type='$attach_type' where dependant_id='$dep_id2'";
//var_dump($sql3); die();
$results3= mysql_query($sql3) or die ("Error $sql3.".mysql_error());
}
else
{
$filepath="dependants_copies/".$upload_file;
	

move_uploaded_file($temp_name, $filepath);	
$sql3="UPDATE employee_dependant_details SET 
dependant_name='$name',
date_of_birth='$dob',
covered='$dep_child_cover',
attachment_type='$attach_type',
attach_copy='$filepath' where dependant_id='$dep_id2'";
//var_dump($sql3); die();
$results3= mysql_query($sql3) or die ("Error $sql3.".mysql_error());
}


?>
<script type="text/javascript">
alert('Record Saved Successfully');

window.location = "home.php?add_employee=add_employee&sub_module_id=<?php echo $sub_module_id ?>&qt=4&employee_id=<?php echo $employee_id;  ?>&id2=<?php echo $dep_id2; ?>";
//window.location = "home.php?addquest1=addquest1&sub_module_id=<?php echo $sub_module_id ?>&qt=<?php echo $question_type_id;?>&form_id=<?php echo $form_id; ?>&par_id=<?php echo $parameter_id; ?>";
</script>


<?php
	
}
else
{

//var_dump($name); die();
/////////////////employee atm copy
if ($temp_name=='')
{
$filepath="";	
}
else
{
$filepath="dependants_copies/".$upload_file;
	
}

move_uploaded_file($temp_name, $filepath);	
$type="children";

$sqld="SELECT * FROM employee_dependant_details where employee_id='$employee_id' and covered='YES'";
$resultsd= mysql_query($sqld) or die ("Error $sqld.".mysql_error());
$rowsd=mysql_num_rows($resultsd);

if ($rowsd>=4)
{
	
$sql3="INSERT into employee_dependant_details SET 
employee_id='$employee_id',
dependance_type='$type',
dependant_name='$name',
date_of_birth='$dob',
covered='NO',
attachment_type='$attach_type',
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
date_of_birth='$dob',
covered='$dep_child_cover',
attachment_type='$attach_type',
attach_copy='$filepath'";
//var_dump($sql3); die();
$results3= mysql_query($sql3) or die ("Error $sql3.".mysql_error());

$dependant_id=mysql_insert_id(); 

?>
<script type="text/javascript">
alert('Personal Details Saved Successfully');

window.location = "home.php?add_employee=add_employee&sub_module_id=<?php echo $sub_module_id ?>&qt=4&employee_id=<?php echo $employee_id;  ?>";
//window.location = "home.php?addquest1=addquest1&sub_module_id=<?php echo $sub_module_id ?>&qt=<?php echo $question_type_id;?>&form_id=<?php echo $form_id; ?>&par_id=<?php echo $parameter_id; ?>";
</script>


<?php

}
}

mysql_close($cnn);


?>


