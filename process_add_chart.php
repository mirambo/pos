<?php
#include connection
 include ('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$id=$_GET['id'];
$account_group=mysql_real_escape_string($_POST['account_group']);
$main_account_code=mysql_real_escape_string($_POST['main_account_code']);
$sub_account_code=mysql_real_escape_string($_POST['sub_account_code']);
$account_name=mysql_real_escape_string($_POST['account_name']);

$account_code=$main_account_code.'-'.$sub_account_code;

$bal_type=mysql_real_escape_string($_POST['bal_type']);
$desc=mysql_real_escape_string($_POST['desc']);



if ($id=='')
	
{

$queryprof="select * from account_type where main_account_code='$account_code' and sub_account_code='$sub_account_code'";
$resultsprof=mysql_query($queryprof) or die ("Error: $queryprof.".mysql_error());


$numrowscomp=mysql_num_rows($resultsprof);

if ($numrowscomp>0)

{

?>
<script type="text/javascript">
alert('Sorry!! Record Exist');
window.location = "<?php echo $_SERVER['HTTP_REFERER']; ?>";
</script>
<?php

}

else 
{



$sql="INSERT INTO account_type SET
account_cat_id='$account_group',
account_type_name='$account_name',
account_type_desc='$desc',
account_code='$account_code',
main_account_code='$main_account_code',
sub_account_code='$sub_account_code',
balance_type='$bal_type'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


?>
<script type="text/javascript">
alert('Record Saved successfuly');
window.location = "<?php echo $_SERVER['HTTP_REFERER']; ?>";
</script>
<?php

}
	}
	else
	{
		
$queryprof="select * from account_type where main_account_code='$account_code' and sub_account_code='$sub_account_code'";
$resultsprof=mysql_query($queryprof) or die ("Error: $queryprof.".mysql_error());


$numrowscomp=mysql_num_rows($resultsprof);

if ($numrowscomp>0)

{
	?>
<script type="text/javascript">
alert('Sorry!! Record Exist');
window.location = "<?php echo $_SERVER['HTTP_REFERER']; ?>";
</script>
<?php
	
}
else
{
		
$sql= "UPDATE account_type SET
account_cat_id='$account_group',
account_type_name='$account_name',
account_type_desc='$desc',
account_code='$account_code',
main_account_code='$main_account_code',
sub_account_code='$sub_account_code',
balance_type='$bal_type' WHERE account_type_id='$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());		
		
		
	?>
<script type="text/javascript">
alert('Record Saved successfuly');
//window.location = "begin_order.php";
window.location = "home.php?chart=chart&sub_module_id=<?php echo $sub_module_id; ?>";
</script>
<?php	
}	
		
		
		
		
		
		
	}



mysql_close($cnn);


?>


