<?php
#include connection
include ('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$type=$_GET['type'];
$customer_name=mysql_real_escape_string($_POST['customer_name']);

$queryprof="select * from  expenses_categories where expense_category_name='$customer_name'";
$resultsprof=mysql_query($queryprof) or die ("Error: $queryprof.".mysql_error());
								  

$numrowscomp=mysql_num_rows($resultsprof);

if ($numrowscomp>0 && $type=='')

{
header ("Location:add_expenses.php?exist=1");

}

elseif ($numrowscomp>0 && $type!='')

{

header ("Location:add_prepaid_expenses.php?exist=1");

}


else
{
$sql= "insert into expenses_categories values ('','$customer_name','$term_desc')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());



if ($type!='')
{
//header ("Location:add_prepaid_expenses.php?confirm=1");
?>
<script type="text/javascript">
alert('Record Saved successfuly');
//window.location = "begin_order.php";
window.location = "<?php echo $_SERVER['HTTP_REFERER']; ?>";
</script>
<?php
}
else
{
header ("Location:add_expenses.php?exist=1");

}


}








mysql_close($cnn);

?>


