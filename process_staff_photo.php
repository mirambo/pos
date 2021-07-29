<?php
#include connection
include('Connections/fundmaster.php');
include('includes/session.php');
$to=date( 'Y-m-d H:i:s', time());
$emp_id=$_GET['employee_id'];


$valid_formats = array("jpg", "png", "gif", "zip", "bmp");
$max_file_size = 1024*100; //100 kb
$path = "staff_photo/"; // Upload directory


	// Loop $_FILES to exeicute all files
foreach ($_FILES['file']['name'] as $f => $name) {     
	    


$f_size=$_FILES['file']['size'][$f];	


$f_size=$_FILES['file']['size'][$f];			
	
$random = substr( md5(rand()), 0, 7);

$f_name=$random.''.$_FILES['file']['name'][$f];


if ($f_size==0)
	
	{
		
		
	}
else
{


move_uploaded_file($_FILES["file"]["tmp_name"][$f], $path.$f_name);

		
$sql22= "UPDATE hs_hr_employee SET 

photo='$f_name'

WHERE emp_number='$emp_id'";
$results22=mysql_query($sql22) or die ("Error $sql22.".mysql_error());
	        
	    }
	}

		


//header ("Location:home.php?add_employee&sub_module_id=$sub_module_id&qt=14&employee_id=$emp_id&success");



 ?>
<script type="text/javascript">
alert('Photo Uploaded Successfully');

window.location = "<?php echo $_SERVER['HTTP_REFERER']; ?>";

</script>

<?php 
mysql_close($cnn);
?>


