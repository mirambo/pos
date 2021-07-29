<?php
#include connection
include ('includes/session.php');
include('Connections/fundmaster.php');
$new=$_GET['new'];


$customer_name=mysql_real_escape_string($_POST['customer_name']);
$contact_person=mysql_real_escape_string($_POST['contact_person']);
$address=mysql_real_escape_string($_POST['address']);
$town=mysql_real_escape_string($_POST['town']);
$email=mysql_real_escape_string($_POST['email']);
$phone=mysql_real_escape_string($_POST['phone']);
$pin=mysql_real_escape_string($_POST['pin']);

$sqlprof= "SELECT * from customer where customer_name='$customer_name'";
$resultsprof= mysql_query($sqlprof) or die ("Error $sqlpo.".mysql_error());
$rowsprof=mysql_num_rows($resultsprof);

if ($rowsprof>0)
{
header ("Location:home.php?addproject=addproject&recordexist=1");
}
else
{

$sqllpo1= "insert into customer VALUES('','$customer_name','$contact_person','$address','$town','$email','$phone','$pin','$incharge')";
$resultslpo1= mysql_query($sqllpo1) or die ("Error $sqllpo1.".mysql_error());

$sql= "insert into clients values('', '$customer_name', '$address', '$town', '$c_street','$address',
 '$phone','$c_telephone','$pin','$incharge','$contact_person','$email','$allow_add','$date_sent',NOW())";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


$sqlauditsav= "insert into audit_trails values('','$user_id',NOW(),'Created a customer $customer_name into the system')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());

if ($new==1)
{
//header ("Location:begin_cash_sales.php");
?>
<script type="text/javascript">
alert('Record Added successfuly');
//window.location = "begin_order.php";
window.location = "<?php echo $_SERVER['HTTP_REFERER']; ?>";
</script>
<?php
}
else
{
//echo "$incharge";
//header ("Location:home.php?addproject=addproject&addconfirm=1");
?>
<script type="text/javascript">
alert('Record Added successfuly');
//window.location = "begin_order.php";
window.location = "<?php echo $_SERVER['HTTP_REFERER']; ?>";
</script>
<?php
}
}
mysql_close($cnn);


?>


