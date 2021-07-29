<?php
#include connection
include('Connections/fundmaster.php');
include('includes/session.php');
$employee_id=$_GET['employee_id'];
$prof_id=$_GET['prof_id'];

#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
//$user_group_id=mysql_real_escape_string($_POST['user_group_id']);
$certification=mysql_real_escape_string($_POST['certification']);
$venue=mysql_real_escape_string($_POST['venue']);
$sdate=mysql_real_escape_string($_POST['sdate']);
$edate=mysql_real_escape_string($_POST['edate']);




$random = substr( md5(rand()), 0, 7);



$upload_file=$_FILES["attachlisence"]["name"];
$temp_name=$_FILES["attachlisence"]["tmp_name"];
$filepath2="uploads/staff_photo/";



$f_name=$random.''.$upload_file;

$payrollfile_url=$filepath2.''.$upload_file;

if ($temp_name=='')
{
	
$filepath='';	
}

else
{
	
$filepath=$payrollfile_url;
	
	
}


move_uploaded_file($temp_name, $filepath);

if($prof_id!='')

{
	
if ($temp_name=='')	
{
	
$sql="UPDATE employee_professional_details SET 
employee_id='$employee_id',
certification_name='$certification',
venue='$venue',
sdate='$sdate',
edate='$edate'
WHERE employee_id='$employee_id' AND prof_id='$prof_id'";


$results3= mysql_query($sql) or die ("Error $sql.".mysql_error());	
}
else
	{
		
$sql="UPDATE employee_professional_details SET 
employee_id='$employee_id',
certification_name='$certification',
venue='$venue',
sdate='$sdate',
edate='$edate',
attachment='$filepath'
WHERE employee_id='$employee_id' AND prof_id='$prof_id'";

 //or die(mysql_error("could not insert"));

$results3= mysql_query($sql) or die ("Error $sql.".mysql_error());	
		
		
	}
	
}


else

{
$sql="INSERT into employee_professional_details SET 
employee_id='$employee_id',
certification_name='$certification',
venue='$venue',
sdate='$sdate',
edate='$edate',
attachment='$filepath'";

 //or die(mysql_error("could not insert"));

$results3= mysql_query($sql) or die ("Error $sql.".mysql_error());


$skill_id=mysql_insert_id(); 
 
}
?>
<script type="text/javascript">
alert('Record Saved Successfully');

window.location = "home.php?add_employee=add_employee&sub_module_id=<?php echo $sub_module_id ?>&qt=12&employee_id=<?php echo $employee_id;  ?>";

</script>

<?php






mysql_close($cnn);

?>


