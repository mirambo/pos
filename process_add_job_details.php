<?php
#include connection
include('Connections/fundmaster.php');
include('includes/session.php');
$employee_id=$_GET['employee_id'];
$to=date( 'Y-m-d H:i:s', time());
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
//$user_group_id=mysql_real_escape_string($_POST['user_group_id']);
$job_title=mysql_real_escape_string($_POST['job_title']);
$grade=mysql_real_escape_string($_POST['grade']);
$directorate=mysql_real_escape_string($_POST['directorate']);
$department=mysql_real_escape_string($_POST['department']);
$orig_department=mysql_real_escape_string($_POST['orig_dep']);
$section=mysql_real_escape_string($_POST['section']);
$branch=mysql_real_escape_string($_POST['branch']);
$sub_branch=mysql_real_escape_string($_POST['sub_branch']);

$query5="SELECT * FROM departments WHERE DId='$orig_department'";
$query5results=mysql_query($query5) or die(mysql_error());
$query5rows=mysql_fetch_array($query5results);
$depto= $query5rows['Department'];

$query52="SELECT * FROM departments WHERE DId='$department'";
$query5results2=mysql_query($query52) or die(mysql_error());
$query5rows2=mysql_fetch_array($query5results2);
$dept= $query5rows2['Department'];

$orig_department=mysql_real_escape_string($_POST['orig_department']);
//$section=mysql_real_escape_string($_POST['section']);
$dofa=mysql_real_escape_string($_POST['dofa']);
$doca=mysql_real_escape_string($_POST['doca']);
$exp_date=mysql_real_escape_string($_POST['exp_date']);
$terms_and_service=mysql_real_escape_string($_POST['terms_and_service']);
$basic_pay=mysql_real_escape_string($_POST['basic_pay']);
$exp_date=mysql_real_escape_string($_POST['exp_date']);
$overtime=mysql_real_escape_string($_POST['overtime']);
$decree_date=mysql_real_escape_string($_POST['dod']);
$decree_number=mysql_real_escape_string($_POST['number_of_decree']);
/* $overtime=$_REQUEST['overtime'];
$p = implode(',',$overtime);
// for each value
for($i = 0;count($overtime)<$i;$i++)
{
    
    // put insert query and value of selected price
    $p = $overtime[$i];
} */
//var_dump($p); die();
$duties=mysql_real_escape_string($_POST['duties']);

//insert into db


$sqld="SELECT * FROM employee_job_details where employee_id='$employee_id'";
$resultsd= mysql_query($sqld) or die ("Error $sqld.".mysql_error());
$rowsd=mysql_num_rows($resultsd);

if ($rowsd>0)
{
	
$sql3="UPDATE employee_job_details SET 
employee_id='$employee_id',
job_title='$job_title',
pay_grade='$grade',
directorate_id='$directorate',
department='$department',
section='$section',
branch_id='$branch',
sub_branch_id='$sub_branch',
date_of_first_appointment='$dofa',
date_of_current_appointment='$doca',
terms_of_service='$terms_and_service',
basic_pay='$basic_pay',
overtime='$overtime',
exp_date='$exp_date',
decree_date='$decree_date',
decree_number='$decree_number',
job_duties='$duties'

WHERE employee_id='$employee_id'";

$results3= mysql_query($sql3) or die ("Error $sql3.".mysql_error());


$sqlaccpay1= "UPDATE petty_cash_ledger1 SET 
transaction_date='$doca' WHERE order_code='apnt$employee_id'";
$resultsaccpay1=mysql_query($sqlaccpay1) or die ("Error $sqlaccpay1.".mysql_error());


$job_group=mysql_real_escape_string($_POST['job_group']);
$orig_job_group=mysql_real_escape_string($_POST['orig_job_group']);

$query4="SELECT * FROM hs_hr_job_spec WHERE jobspec_id='$job_group'";
$query4results=mysql_query($query4) or die(mysql_error());
$query4rows=mysql_fetch_array($query4results);
$job_group_name= $query4rows['jobspec_name'];

$query42="SELECT * FROM hs_hr_job_spec WHERE jobspec_id='$orig_job_group'";
$query4results2=mysql_query($query42) or die(mysql_error());
$query4rows2=mysql_fetch_array($query4results2);
$job_group_name2= $query4rows2['jobspec_name'];

if ($job_group==$orig_job_group)
{
	
	
}
else
{
	
	
if 	($orig_job_group>$job_group)
{
$sqlaccpay= "insert into petty_cash_ledger1 values('','Demotion from job group $job_group_name2 to $job_group_name','Demotion','$employee_id','$to','prom$employee_id')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());	
	
}
else
{

$sqlaccpay= "insert into petty_cash_ledger1 values('','Promotion from job group $job_group_name2 to $job_group_name','Promotion','$employee_id','$to','prom$employee_id')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());
}
}
///////////transfer

if ($orig_department==$department)
{
	
	
}
else
{
	
	


$sqlaccpay= "insert into petty_cash_ledger1 values('','Transfer from department $depto to $dept','Transfer','$employee_id','NOW()','prom$employee_id')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());

}









}
else
{
	
$sql3="INSERT INTO employee_job_details SET 
employee_id='$employee_id',
job_title='$job_title',
pay_grade='$grade',
directorate_id='$directorate',
department='$department',
section='$section',
branch_id='$branch',
sub_branch_id='$sub_branch',
date_of_first_appointment='$dofa',
date_of_current_appointment='$doca',
terms_of_service='$terms_and_service',
basic_pay='$basic_pay',
overtime='$p',
exp_date='$exp_date',
decree_date='$decree_date',
decree_number='$decree_number',
job_duties='$duties'";

$results3= mysql_query($sql3) or die ("Error $sql3.".mysql_error());	

$sqlaccpay= "insert into petty_cash_ledger1 values('','$transaction_desc','Appointment','$employee_id','$doca','apnt$employee_id')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());


$sqlaccpay= "insert into petty_cash_ledger1 values('','$transaction_desc','Appointment','$employee_id','$doca','apnt$employee_id')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());
	
	
}

//////upload decree





$valid_formats = array("jpg", "png", "gif", "zip", "bmp");
$max_file_size = 1024*100; //100 kb
$payrollfile_path = "decree_uploads/"; // Upload directory
// Loop $_FILES to exeicute all files
foreach ($_FILES['attachdecree']['name'] as $f => $name)
{     
	    
$random = substr( md5(rand()), 0, 7);

$f_name=$random.''.$_FILES['attachdecree']['name'][$f];



$payrollfile_url=$payrollfile_path.''.$f_name;



$f_size=$_FILES['attachdecree']['size'][$f];	

if ($f_size==0)
	
	{
		
		
	}
else
{


move_uploaded_file($_FILES["attachdecree"]["tmp_name"][$f], $payrollfile_path.$f_name);

		
$sql22= "UPDATE employee_job_details SET 

decree_url='$payrollfile_url'

WHERE employee_id='$employee_id'";
$results22=mysql_query($sql22) or die ("Error $sql22.".mysql_error()); 
	        
	    }
	}








//header ("Location:home.php?add_employee&sub_module_id=$sub_module_id&qt=7&employee_id=$employee_id&success");

?>
<script type="text/javascript">
alert('Record Saved Successfully');

window.location = "home.php?add_employee&sub_module_id=<?php echo $sub_module_id ?>&qt=7&employee_id=<?php echo $employee_id;  ?>";
//window.location = "home.php?addquest1=addquest1&sub_module_id=<?php echo $sub_module_id ?>&qt=<?php echo $question_type_id;?>&form_id=<?php echo $form_id; ?>&par_id=<?php echo $parameter_id; ?>";
</script>

<?php 






mysql_close($cnn);


?>


