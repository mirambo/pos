<?php
include ('includes/session.php'); 
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form

$emp_id=$_GET['emp_id'];
$f_name=mysql_real_escape_string($_POST['f_name']);
$phone=mysql_real_escape_string($_POST['phone']);
$email=mysql_real_escape_string($_POST['email']);
$username=mysql_real_escape_string($_POST['username']);

$sqlauditsav= "insert into audit_trails values('','$user_id',NOW(),'Created a new employee by the name $f_name $m_name $l_name into the system')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());




//header ("Location:home.php?staffdet=staffdet&emp_id=$emp_id&editconfirm=1");

?>
<script type="text/javascript">
alert('Record Updated successfuly');
//window.location = "view_received_stock.php";
window.location = "<?php echo $_SERVER['HTTP_REFERER']; ?>";
</script>
<?php




mysql_close($cnn);


?>


