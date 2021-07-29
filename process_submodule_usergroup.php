<?php
#include connection
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form

//$timesheet_date=mysql_real_escape_string($_POST['timesheet_date']);
$user=mysql_real_escape_string($_POST['user']);
$module=mysql_real_escape_string($_POST['module']);
//$user=mysql_real_escape_string($_POST['user']);





foreach($_POST['outlet'] as $row=>$Outlet)
{





    //$benefit_name=mysql_real_escape_string($BenefitName);
     $outlet=mysql_real_escape_string($Outlet);
    //$benefit_amount=mysql_real_escape_string($_POST['benefit_amount'][$row]);
	$timesheet_date=mysql_real_escape_string($_POST['timesheet_date']);
  $user=mysql_real_escape_string($_POST['user']);
	$route=mysql_real_escape_string($_POST['route']);
	
	//check redundancy
/*$queryprof="select * from user_group_submodule where user_group_id='$user' AND sub_module_id='$outlet'";
$resultsprof=mysql_query($queryprof) or die ("Error: $queryprof.".mysql_error());
$numrowscomp=mysql_num_rows($resultsprof);



if ($numrowscomp>0)

{

//header ("Location:home.php?stafftimesheet=stafftimesheet&recordexist=1");
header ("Location:home.php?prepostgraduate=prepostgraduate&module=$route&recordexist=1");


}*/

$queryprof="select * from user_group_submodule where user_group_id='$user' AND sub_module_id='$outlet'";
$resultsprof=mysql_query($queryprof) or die ("Error: $queryprof.".mysql_error());
$numrowscomp=mysql_num_rows($resultsprof);

if ($numrowscomp>0)
{

//header ("Location:home.php?stafftimesheet=stafftimesheet&assigned=1");
header ("Location:home.php?usergroupsm=usergroupsm&module=$route&assigned=1");

}

/*$queryprof3="select * from route_visit where area_id='$area'  AND user_id='$user'";
$resultsprof3=mysql_query($queryprof3) or die ("Error: $queryprof3.".mysql_error());
$numrowscomp3=mysql_num_rows($resultsprof3);

if ($numrowscomp3>0)
{

header ("Location:home.php?stafftimesheet=stafftimesheet&areamanagerassigned=1");

}*/


else
{
	
    
$sql3="INSERT INTO user_group_submodule VALUES('','$user','$outlet','0')" or die(mysql_error());
$results3= mysql_query($sql3) or die ("Error $sql3.".mysql_error());
/*
$queryprof3="select * from user_group_submodule ORDER BY user_group_sub_module_id desc limit 1";
$resultsprof3=mysql_query($queryprof3) or die ("Error: $queryprof3.".mysql_error());
$numrowscomp3=mysql_num_rows($resultsprof3);
$numrowscomp=mysql_fetch_object($resultsprof3);
echo $idd2=$numrowscomp->user_group_sub_module_id;
*/


//header ("Location:home.php?usergroupsm=usergroupsm&addconfirm=1");

?>
<script type="text/javascript">
alert('Record Saved successfuly');
//window.location = "view_received_stock.php";
window.location = "<?php echo $_SERVER['HTTP_REFERER']; ?>";
</script>
<?php
}
}

mysql_close($cnn);


?>


