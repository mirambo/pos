<?php
#include connection
include('Connections/fundmaster.php');
include('includes/session.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$employee_id=$_GET['employee_id'];


$qr_confirm23a="SELECT * from hs_hr_employee WHERE emp_number='$employee_id'";
$qr_res23a=mysql_query($qr_confirm23a) or die ('Error : $qr_confirm23a.' .mysql_error());
$rows23a=mysql_fetch_object($qr_res23a);
$nat_id=$rows23a->emp_other_id;

$emp_name=$rows23a->emp_firstname.' '.$rows23a->emp_father_name.' '.$rows23a->emp_lastname.' '.$rows23a->emp_fourth_name;

$emp_number=$rows23a->employee_id;

$password=md5(1234);



$kin=$_GET['id'];
//var_dump($id); die();
$region=mysql_real_escape_string($_POST['region_id']);
$county=mysql_real_escape_string($_POST['county_id']);
$subcounty=mysql_real_escape_string($_POST['sub_county_id']);
$section_id=mysql_real_escape_string($_POST['section_id']);
$neigh_id=mysql_real_escape_string($_POST['neigh_id']);
$street_id=mysql_real_escape_string($_POST['street_id']);
$mobile=mysql_real_escape_string($_POST['mobile']);
$alternative_mobile=mysql_real_escape_string($_POST['alternative_mobile']);
$per_address=mysql_real_escape_string($_POST['per_address']);
$po_address=mysql_real_escape_string($_POST['po_address']);
$po_code=mysql_real_escape_string($_POST['po_code']);
$city=mysql_real_escape_string($_POST['city']);
$oemail=mysql_real_escape_string($_POST['oemail']);
$pemail=mysql_real_escape_string($_POST['pemail']);


$sqld="SELECT * FROM employee_contacts where employee_id='$employee_id'";
$resultsd= mysql_query($sqld) or die ("Error $sqld.".mysql_error());
$rowsd=mysql_num_rows($resultsd);
$rowsdt=mysql_fetch_object($resultsd);


$personal_mail=$rowsdt->personal_mail;



if ($rowsd>0)
{

$sql33="UPDATE employee_contacts SET 
region_id='$region',
county_id='$county',
sub_county_id='$subcounty',
employee_id='$employee_id',
neigh_id='$neigh_id',
street_id='$street_id',
section_id='$section_id',
mobile_no='$mobile',
alternative_mobile_no='$alternative_mobile',
permanent_address='$per_address',
postal_address='$po_address',
postal_code='$po_code',
city='$city',
office_mail='$oemail',
personal_mail='$pemail' WHERE employee_id='$employee_id'";
 //or die(mysql_error("could not insert"));

$results33= mysql_query($sql33) or die ("Error $sql33.".mysql_error());	



$sql2="INSERT INTO audit_trails SET 
user_id='$user_id',
date_of_event='$to',
action='Updated contact details of employee $emp_name, Employee No : $emp_number'";
$results2= mysql_query($sql2) or die ("Error $sql2.".mysql_error());


	
}
else
	
	{

$sql="INSERT into employee_contacts SET 
region_id='$region',
county_id='$county',
sub_county_id='$subcounty',
employee_id='$employee_id',
neigh_id='$neigh_id',
street_id='$street_id',
section_id='$section_id',
mobile_no='$mobile',
alternative_mobile_no='$alternative_mobile',
permanent_address='$per_address',
postal_address='$po_address',
postal_code='$po_code',
city='$city',
office_mail='$oemail',
personal_mail='$pemail'";
 //or die(mysql_error("could not insert"));

$results3= mysql_query($sql) or die ("Error $sql.".mysql_error());



$sql2="INSERT INTO audit_trails SET 
user_id='$user_id',
date_of_event='$to',
action='Added contact details of employee $emp_name, Employee No : $emp_number'";
$results2= mysql_query($sql2) or die ("Error $sql2.".mysql_error());




	}

	
	

/* 	
$sqld2="SELECT * FROM users where employee_id='$employee_id'";
$resultsd2= mysql_query($sqld2) or die ("Error $sqld2.".mysql_error());
$rowsd2=mysql_num_rows($resultsd2);	

if ($rowsd2>0)
{
	
echo 'true';
	
$sql= "UPDATE users SET 
email='$personal_mail' WHERE employee_id='$employee_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());	
	
	
}

else
{
	
$sql= "INSERT INTO users SET 
user_group_id='54',
employee_id='$employee_id',
email='$personal_mail',
username='$nat_id',
password='$password',
suspend='1'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());	
	
}	 */
	
//header ("Location:home.php?add_employee&qt=2&employee_id=$employee_id&success&sub_module_id=$sub_module_id");
 ?>
<script type="text/javascript">
alert('Record Saved Successfully');

window.location = "home.php?add_employee&sub_module_id=<?php echo $sub_module_id ?>&qt=2&employee_id=<?php echo $employee_id;  ?>";

</script>

<?php 






mysql_close($cnn);

?>


