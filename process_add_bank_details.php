<?php
#include connection
include('Connections/fundmaster.php');
include('includes/session.php');
$employee_id=$_GET['employee_id'];
$bank_id=$_GET['bank_id'];

$bank_name=mysql_real_escape_string($_POST['bank_name']);
$branch=mysql_real_escape_string($_POST['branch']);
$accountno=mysql_real_escape_string($_POST['accountno']);
/////////////////employee atm copy
$valid_formats = array("jpg", "png", "gif", "zip", "bmp");
$max_file_size = 1024*100; //100 kb
$atm_copy_path = "uploads/staff_photo/"; // Upload directory

$random = substr( md5(rand()), 0, 7);	
$upload_file=$random.''.$_FILES["atm"][ "name" ];

$temp_name=$_FILES["atm"]["tmp_name"];



if ($temp_name=="")
{
	
$filepath="";	
}
else
{

$filepath=$atm_copy_path.''.$upload_file;


}









move_uploaded_file($temp_name, $filepath);






















if($bank_id!='')
{
	
if ($filepath=='')	
{
	
$sql="UPDATE employee_bank_details SET 
employee_id='$employee_id',
bank_id='$bank_name',
branch_id='$branch',
account_no='$accountno'
WHERE bank_details_id='$bank_id'" or die(mysql_error());

 //or die(mysql_error("could not insert"));

$results3= mysql_query($sql) or die ("Error $sql.".mysql_error());
	
	
}
else
{
	
$sql="UPDATE employee_bank_details SET 
employee_id='$employee_id',
bank_id='$bank_name',
branch_id='$branch',
account_no='$accountno',
atm_copy='$filepath'
WHERE bank_details_id='$bank_id'" or die(mysql_error());

 //or die(mysql_error("could not insert"));

$results3= mysql_query($sql) or die ("Error $sql.".mysql_error());	
}	

//header ("Location:home.php?add_employee&sub_module_id=$sub_module_id&qt=10&employee_id=$employee_id&success=1");	
?>
<script type="text/javascript">
alert('Personal Details Saved Successfully');

window.location = "home.php?add_employee=add_employee&sub_module_id=<?php echo $sub_module_id ?>&qt=10&employee_id=<?php echo $employee_id;  ?>&bank_id=<?php echo $bank_id; ?>";

</script>

<?php

}
else{
//var_dump($filepath); die();

$queryprof="select * from employee_bank_details where employee_id='$employee_id'";
$resultsprof=mysql_query($queryprof) or die ("Error: $queryprof.".mysql_error());
$numrowscomp=mysql_num_rows($resultsprof);

if ($numrowscomp>0)

{
	?>
	<script type="text/javascript">
alert('Sorry!! employee can only have one bank details');

window.location = "<?php echo $_SERVER['HTTP_REFERER']; ?>";

</script>
	<?php
	
}
else
{

$sql="INSERT into employee_bank_details SET 
employee_id='$employee_id',
bank_id='$bank_name',
branch_id='$branch',
account_no='$accountno',
atm_copy='$filepath'";
 //or die(mysql_error("could not insert"));

$results3= mysql_query($sql) or die ("Error $sql.".mysql_error());


$bank_details_id=mysql_insert_id(); 

//header ("Location:home.php?add_employee&sub_module_id=$sub_module_id&qt=10&employee_id=$employee_id&success=1");	

}

}

?>
<script type="text/javascript">
alert('Personal Details Saved Successfully');

window.location = "home.php?add_employee=add_employee&sub_module_id=<?php echo $sub_module_id ?>&qt=10&employee_id=<?php echo $employee_id;  ?>&bank_id=<?php echo $bank_id; ?>";

</script>

<?php






mysql_close($cnn);

?>


