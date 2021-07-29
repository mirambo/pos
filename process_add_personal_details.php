<?php
#include connection
include('Connections/fundmaster.php');
include('includes/session.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
//$user_group_id=mysql_real_escape_string($_POST['user_group_id']);
$employee_id=$_GET['employee_id'];
$payroll_no=mysql_real_escape_string($_POST['payroll_no']);
$employee_number=mysql_real_escape_string($_POST['employee_number']);
$emp_f_name=mysql_real_escape_string($_POST['emp_f_name']);
$emp_father_name=mysql_real_escape_string($_POST['emp_father_name']);
$emp_mother_name=mysql_real_escape_string($_POST['emp_mother_name']);
$emp_fourth_name=mysql_real_escape_string($_POST['emp_fourth_name']);
$emp_surname=mysql_real_escape_string($_POST['emp_surname']);

$emp_o_name=mysql_real_escape_string($_POST['emp_o_name']);
$emp_dob=mysql_real_escape_string($_POST['dob']);
$emp_yob=mysql_real_escape_string($_POST['yob']);
$place_of_birth=mysql_real_escape_string($_POST['place_of_birth']);
$birthcert=mysql_real_escape_string($_POST['birthcert']);
$verify_birth_cert=mysql_real_escape_string($_POST['verify_birth_cert']);

$nationality=mysql_real_escape_string($_POST['nationality']);
$health_condition=mysql_real_escape_string($_POST['health_condition']);
$blood_group=mysql_real_escape_string($_POST['blood_group']);
$id_no=mysql_real_escape_string($_POST['id_no']);
$verify_id=mysql_real_escape_string($_POST['verify_id']);
$title=mysql_real_escape_string($_POST['title']);
$gender=mysql_real_escape_string($_POST['gender']);
$religion=mysql_real_escape_string($_POST['religion']);

$kra_pin=mysql_real_escape_string($_POST['kra']);
$emp_kra_pin_verified=mysql_real_escape_string($_POST['emp_kra_pin_verified']);
$nssf_verified=mysql_real_escape_string($_POST['nssf_verified']);
$kracopy=mysql_real_escape_string($_POST['kracopy']);
$nssf_no=mysql_real_escape_string($_POST['nssf']);
$nssf_copy=mysql_real_escape_string($_POST['nssf_copy']);
$nhif_no=mysql_real_escape_string($_POST['nhif']);
$nhif_copy=mysql_real_escape_string($_POST['nhifcopy']);
$marital_status=mysql_real_escape_string($_POST['marital_status']);
$ethnicity=mysql_real_escape_string($_POST['ethinicity']);
$disabled=mysql_real_escape_string($_POST['disabled']);
$disabled_details=mysql_real_escape_string($_POST['disabled_details']);

$to=date('Y-m-d H:i:s', time());


	


if ($employee_id!='')
{
	
$sql3p="UPDATE hs_hr_employee SET 
emp_firstname='$emp_f_name',
emp_lastname='$emp_surname',
emp_father_name='$emp_father_name',
emp_mother_name='$emp_mother_name',
emp_fourth_name='$emp_fourth_name',
employee_id='$employee_number',
blood_group='$blood_group',
health_condition='$health_condition',
emp_birthday='$emp_dob',
emp_yob='$emp_yob',
place_of_birth='$place_of_birth',
birth_cert_no='$birthcert',
birth_cert_verified='$verify_birth_cert',
nation_code='$nationality',
emp_other_id='$id_no',
id_verified='$verify_id',
emp_kra_pin_verified='$emp_kra_pin_verified',
title='$title',
emp_gender='$gender',
religion='$religion',
emp_kra_pin='$kra_pin',
nssf_no='$nssf_no',
nhif_no='$nhif_no',
nssf_verified='$nssf_verified',
ethnicity='$ethnicity',
emp_marital_status='$marital_status',
disability='$disabled' 
WHERE emp_number='$employee_id'" or die(mysql_error());
$results3p= mysql_query($sql3p) or die ("Error $sql3p.".mysql_error());

$people_id=$employee_id;


$sqln= "select employee_id,day_created,month_created FROM hs_hr_employee WHERE emp_number='$employee_id'";
$resultsn=mysql_query($sqln) or die ("Error: $sqln.".mysql_error());	
$rowsusern=mysql_fetch_array($resultsn);





$leo_day=$rowsusern['day_created'];
$leo_month=$rowsusern['month_created'];
	
	
	if ($gender=='Male')
{
	
	$gender_code='9';
}

if ($gender=='Female')
{
	$gender_code='5';
	
}



if($people_id < 10)
            {
              $lpo_no = "000".$people_id;
              //$lpo_no = $client_abrev.'/'.$month."/0000".$people_id;
			   //echo $newnum;
			  
			  
            } 
			
			else if($people_id < 100) 
			{
             $lpo_no = "00".$people_id;
			 
			 //echo $newnum;
            } 
			
			else if($people_id < 1000) 
			{
             $lpo_no = "0".$people_id;
			 
			 //echo $newnum;
            }

			else if ($people_id < 10000) 
			{
             $lpo_no = $people_id;
			 
			 //echo $newnum;
            }
			
			
			



$parent_people_code=$leo_day.''.$leo_month.''.$gender_code.''.$lpo_no;





/* $sql2pd="UPDATE hs_hr_employee SET 
employee_id='$parent_people_code' WHERE emp_number='$people_id'";
$results2pd= mysql_query($sql2pd) or die ("Error $sql2pd.".mysql_error());
 */

$sql2dt="INSERT INTO audit_trails SET 
user_id='$user_id',
date_of_event='$to',
action='Updated employee $emp_f_name $emp_father_name $emp_surname $emp_forth_name of Employee No : $parent_people_code'";
$results2dt= mysql_query($sql2dt) or die ("Error $sql2dt.".mysql_error());

	
}
else
{
	
echo $leo_day=date('d' , time());
$leo_month=date('m' , time());

$sql3="INSERT into hs_hr_employee SET 

emp_firstname='$emp_f_name',
emp_lastname='$emp_surname',
emp_father_name='$emp_father_name',
emp_mother_name='$emp_mother_name',
emp_fourth_name='$emp_fourth_name',
employee_id='$employee_number',
blood_group='$blood_group',
health_condition='$health_condition',
emp_birthday='$emp_dob',
emp_yob='$emp_yob',
place_of_birth='$place_of_birth',
birth_cert_no='$birthcert',
birth_cert_verified='$verify_birth_cert',
nation_code='$nationality',
emp_other_id='$id_no',
id_verified='$verify_id',
emp_kra_pin_verified='$emp_kra_pin_verified',
title='$title',
emp_gender='$gender',
religion='$religion',
emp_kra_pin='$kra_pin',
nssf_no='$nssf_no',
nhif_no='$nhif_no',
nssf_verified='$nssf_verified',
ethnicity='$ethnicity',
day_created='$leo_day',
month_created='$leo_month',
emp_marital_status='$marital_status',
disability='$disabled'" or die(mysql_error());
$results3= mysql_query($sql3) or die ("Error $sql3.".mysql_error());

$employee_id=mysql_insert_id(); 

$people_id=$employee_id;


	
	
	if ($gender=='Male')
{
	
	$gender_code='9';
}

if ($gender=='Female')
{
	$gender_code='5';
	
}



if($people_id < 10)
            {
              $lpo_no = "000".$people_id;
              //$lpo_no = $client_abrev.'/'.$month."/0000".$people_id;
			   //echo $newnum;
			  
			  
            } 
			
			else if($people_id < 100) 
			{
             $lpo_no = "00".$people_id;
			 
			 //echo $newnum;
            } 
			
			else if($people_id < 1000) 
			{
             $lpo_no = "0".$people_id;
			 
			 //echo $newnum;
            }

			else if ($people_id < 10000) 
			{
             $lpo_no = $people_id;
			 
			 //echo $newnum;
            }
			
			
			



$parent_people_code=$leo_day.''.$leo_month.''.$gender_code.''.$lpo_no;





/* $sql2pd="UPDATE hs_hr_employee SET 
employee_id='$parent_people_code' WHERE emp_number='$people_id'";
$results2pd= mysql_query($sql2pd) or die ("Error $sql2pd.".mysql_error()); */


$sql2dt="INSERT INTO audit_trails SET 
user_id='$user_id',
sub_module_id='$sub_module_id',
date_of_event='$to',
action='Added employee $emp_f_name $emp_father_name $emp_surname $emp_forth_name of Employee No : $parent_people_code'";
$results2dt= mysql_query($sql2dt) or die ("Error $sql2dt.".mysql_error());
}


//////////////////spouses
foreach($_POST['sname'] as $row=>$sname)
{   
	//$sub_cat=mysql_real_escape_string($_POST['sub_cat']);

    $sname=mysql_real_escape_string($_POST['sname'][$row]);
    $sid=mysql_real_escape_string($_POST['sid'][$row]);
    $spouce_cover=mysql_real_escape_string($_POST['spouce_cover'][$row]);


if ($sname=='')
{
	
	
}
else
{
	
$sql2= "insert into employee_spouses SET 
employee_id='$employee_id',
spouse_name='$sname',
spouse_id_no='$sid',
medical_covered='$spouce_cover'";
$results2=mysql_query($sql2) or die ("Error $sql2.".mysql_error());
}
}


	
	

	
	
//header ("Location:home.php?add_employee&sub_module_id=$sub_module_id&qt=1&employee_id=$employee_id&surrccessrrr");

?>
<script type="text/javascript">
alert('Record Saved Successfully');

window.location = "home.php?add_employee&sub_module_id=<?php echo $sub_module_id ?>&qt=1&employee_id=<?php echo $employee_id;  ?>";
//window.location = "home.php?addquest1=addquest1&sub_module_id=<?php echo $sub_module_id ?>&qt=<?php echo $question_type_id;?>&form_id=<?php echo $form_id; ?>&par_id=<?php echo $parameter_id; ?>";
</script>

<?php



mysql_close($cnn);


?>


