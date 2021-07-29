<?php
#include connection
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
//$user_group_id=mysql_real_escape_string($_POST['user_group_id']);

$sqllpo= "insert into data_id_gen VALUES('')";
$resultslpo= mysql_query($sqllpo) or die ("Error $sqllpo.".mysql_error());

$sql="SELECT * FROM data_id_gen order by data_id desc limit 1";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
$rows=mysql_fetch_object($results);
$data_id=$rows->data_id;

$file = $_FILES ['file'];
$name1 = $file ['name'];
$type = $file ['type'];
$size = $file ['size'];
$tmppath = $file ['tmp_name']; 


move_uploaded_file ($tmppath, 'photos/'.$name1);//image is a folder in which you will save image






echo $form_no=$_POST['form_no'];

foreach($_POST['form_id'] as $row=>$form_id)
{   
	//$user_group_id=mysql_real_escape_string($_POST['user_group_id']);
$response=mysql_real_escape_string($_POST['form_id'][$row]);
$form_no=mysql_real_escape_string($_POST['form_no'][$row]);




$sql3="INSERT INTO hr_form_logs VALUES('','$form_no','$data_id','$response')" or die(mysql_error());
$results3= mysql_query($sql3) or die ("Error $sql3.".mysql_error());
	
}

/*foreach($_POST['module_id'] as $row=>$module_id)
{   
	$user_group_id=mysql_real_escape_string($_POST['user_group_id']);
    $module_id=mysql_real_escape_string($_POST['module_id'][$row]);
	
    
//  Check Redudancy

/*$queryprof="select * from user_group_module where user_group_id='$user_group_id' AND module_id='$module_id'";
$resultsprof=mysql_query($queryprof) or die ("Error: $queryprof.".mysql_error());


$numrowscomp=mysql_num_rows($resultsprof);

if ($numrowscomp>0)

{

header ("Location:home.php?modulesusergroup=modulesusergroup&recordexist=1");

}
else
{*/
//$sql3="INSERT INTO user_group_module VALUES('','$user_group_id','$module_id','0')" or die(mysql_error());
//$results3= mysql_query($sql3) or die ("Error $sql3.".mysql_error());

header ("Location:home.php?newstaff=newstaff&addconfirm=1");
//}
//}








mysql_close($cnn);


?>


