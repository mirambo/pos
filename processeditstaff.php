<?php
#include connection
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
//$user_group_id=mysql_real_escape_string($_POST['user_group_id']);

$sqllpo= "insert into history_id_gen VALUES('')";
$resultslpo= mysql_query($sqllpo) or die ("Error $sqllpo.".mysql_error());

$sqlh="SELECT * FROM history_id_gen order by history_id desc limit 1";
$resultsh= mysql_query($sqlh) or die ("Error $sqlh.".mysql_error());
$rowsh=mysql_fetch_object($resultsh);
$history_id=$rowsh->history_id;


$data_id=$_GET['emp_id'];
//echo $form_no=$_POST['form_no'];

foreach($_POST['form_id'] as $row=>$form_id)
{   
	//$user_group_id=mysql_real_escape_string($_POST['user_group_id']);
echo $response=mysql_real_escape_string($_POST['form_id'][$row]);
echo $form_no=mysql_real_escape_string($_POST['form_no'][$row]);


$sqlhist="INSERT INTO hr_form_logs_history VALUES('','$form_no','$data_id','$history_id','$response')" or die(mysql_error());
$resultshist= mysql_query($sqlhist) or die ("Error $sqlhist.".mysql_error());




$sql3="SELECT * FROM hr_form_logs WHERE form_id='$form_no'";
$results3= mysql_query($sql3) or die ("Error $sql3.".mysql_error());
$numrows3=mysql_num_rows($results3);
 

 if ($numrows3==0)
 {
$sqln="INSERT INTO hr_form_logs VALUES('','$form_no','$data_id','$response')" or die(mysql_error());
$resultsn= mysql_query($sqln) or die ("Error $sqln.".mysql_error());
 }
else
{

$sql3="update hr_form_logs set response='$response' where data_id='$data_id' and form_id='$form_no'";
$results3= mysql_query($sql3) or die ("Error $sql3.".mysql_error());
}
	
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

header ("Location:home.php?editstaff=editstaff&emp_id=$data_id&editconfirm=1");
//}
//}








mysql_close($cnn);


?>


