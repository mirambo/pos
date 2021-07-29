<?php
#include connection
include ('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$type=$_GET['type'];
$customer_name=mysql_real_escape_string($_POST['customer_name']);

$sqlupdt= "INSERT INTO customer (customer_name) VALUES('$customer_name')";
$resultsupdt= mysql_query($sqlupdt) or die ("Error $sqlupdt.".mysql_error());

$sqlupdt2= "INSERT INTO clients (c_name) VALUES('$customer_name')";
$resultsupdt2= mysql_query($sqlupdt2) or die ("Error $sqlupdt2.".mysql_error());

$queryempno="select * from customer order by  customer_id desc limit 1";
$resultsempno=mysql_query($queryempno) or die ("Error: $queryempno.".mysql_error());	
$rows=mysql_fetch_object($resultsempno);							  
$customer_id=$rows->customer_id;

session_start();
$_SESSION['new_id']=$customer_id;
echo $sess_new_id=$_SESSION['new_id'];


$sqlauditsav= "insert into audit_trails values('','$user_id',NOW(),'Added more customer into the system')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());


if ($type=='jc')
{
//header ("Location:home.php?viewcountries=viewcountries&new_id=$customer_id");
?>
<script type="text/javascript">
alert('Record Saved successfuly');
//window.location = "begin_order.php";
window.location = "home.php?viewcountries=viewcountries&new_id=<?php echo $customer_id ?>";
</script>
<?php
}
else
{

//header ("Location:home.php?submit_biweekly=submit_biweekly&new_id=$customer_id");
?>
<script type="text/javascript">
alert('Record Updated successfuly');
//window.location = "begin_order.php";
window.location = "home.php?submit_biweekly=submit_biweekly&new_id=<?php echo $customer_id ?>";
</script>
<?php
}



mysql_close($cnn);

?>


