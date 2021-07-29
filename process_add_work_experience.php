<?php
#include connection
include('Connections/fundmaster.php');
include('includes/session.php');
$employee_id=$_GET['employee_id'];
$work_id=$_GET['work_id'];
//var_dump($work_id); die();
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
//$user_group_id=mysql_real_escape_string($_POST['user_group_id']);
$employer_name=mysql_real_escape_string($_POST['employer_name']);
$employer_address=mysql_real_escape_string($_POST['employer_address']);
$post_held=mysql_real_escape_string($_POST['post_held']);
$duration_years=mysql_real_escape_string($_POST['duration_year']);
$duration_months=mysql_real_escape_string($_POST['duration_months']);
$period_from=mysql_real_escape_string($_POST['period_from']);
$period_to=mysql_real_escape_string($_POST['period_to']);
$todate_nature=mysql_real_escape_string($_POST['todate_nature']);
$terms=mysql_real_escape_string($_POST['terms']);

if($work_id!='')
{
$sql3="UPDATE employee_work_experience_details SET 
employee_id='$employee_id',
employer_name='$employer_name',
employer_address='$employer_address',
post_held='$post_held',
duration_years='$duration_years',
duration_months='$duration_months',
todate_nature='$todate_nature',
period_from='$period_from',
period_to='$period_to',
terms='$terms' WHERE work_experience_id='$work_id'";


$results3= mysql_query($sql3) or die ("Error $sql3.".mysql_error());	




/////////////////last pay certificate copy
$valid_formats = array("jpg", "png", "gif", "zip", "bmp");
$max_file_size = 1024*100; //100 kb
$payrollfile_path = "uploads/staff_photo/"; // Upload directory
// Loop $_FILES to exeicute all files
foreach ($_FILES['appointment_letter']['name'] as $f => $name)
{     
	    
$random = substr( md5(rand()), 0, 7);

$f_name=$random.''.$_FILES['appointment_letter']['name'][$f];







$f_size=$_FILES['appointment_letter']['size'][$f];	

if ($f_size==0)
	
	{
	$payrollfile_url='';	
		
	}
else
{
$payrollfile_url=$payrollfile_path.''.$f_name;

move_uploaded_file($_FILES["appointment_letter"]["tmp_name"][$f], $payrollfile_path.$f_name);

		
$sql22= "UPDATE employee_work_experience_details SET 

appointment_letter_url='$payrollfile_url'

WHERE work_experience_id='$work_id'";
$results22=mysql_query($sql22) or die ("Error $sql22.".mysql_error()); 
	        
	    }
	}









}
else{
//insert into db
$sql3="INSERT into employee_work_experience_details SET 
employee_id='$employee_id',
employer_name='$employer_name',
employer_address='$employer_address',
post_held='$post_held',
duration_years='$duration_years',
duration_months='$duration_months',
todate_nature='$todate_nature',
period_from='$period_from',
period_to='$period_to',
terms='$terms'";

$results3= mysql_query($sql3) or die ("Error $sql3.".mysql_error());

$work_experience_id=mysql_insert_id(); 

/////////////////last pay certificate copy
$valid_formats = array("jpg", "png", "gif", "zip", "bmp");
$max_file_size = 1024*100; //100 kb
$payrollfile_path = "uploads/staff_photo/"; // Upload directory
// Loop $_FILES to exeicute all files
foreach ($_FILES['appointment_letter']['name'] as $f => $name)
{     
	    
$random = substr( md5(rand()), 0, 7);

$f_name=$random.''.$_FILES['appointment_letter']['name'][$f];



$payrollfile_url=$payrollfile_path.''.$f_name;



$f_size=$_FILES['appointment_letter']['size'][$f];	

if ($f_size==0)
	
	{
		
		
	}
else
{


move_uploaded_file($_FILES["appointment_letter"]["tmp_name"][$f], $payrollfile_path.$f_name);

		
$sql22= "UPDATE employee_work_experience_details SET 

appointment_letter_url='$payrollfile_url'

WHERE work_experience_id='$work_experience_id'";
$results22=mysql_query($sql22) or die ("Error $sql22.".mysql_error()); 
	        
	    }
	}



}


//header ("Location:home.php?add_employee&sub_module_id=$sub_module_id&qt=8&employee_id=$employee_id&success");


 ?>
<script type="text/javascript">
alert('Work Experience Details Saved Successfully');

window.location = "home.php?add_employee&sub_module_id=$sub_module_id&qt=8&employee_id=<?php echo $employee_id;  ?>";
//window.location = "home.php?addquest1=addquest1&sub_module_id=<?php echo $sub_module_id ?>&qt=<?php echo $question_type_id;?>&form_id=<?php echo $form_id; ?>&par_id=<?php echo $parameter_id; ?>";
</script>

<?php 






mysql_close($cnn);


?>


