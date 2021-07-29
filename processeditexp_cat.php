<?php
include('Connections/fundmaster.php');
require_once('includes/session.php'); 
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$accounting_term=mysql_real_escape_string($_POST['accounting_term']);
$term_desc=mysql_real_escape_string($_POST['term_desc']);

$id=$_GET['exp_cat_id'];

$sql= "update expenses_categories set expense_category_name='$accounting_term', expense_category_desc='$term_desc' where exp_cat_id='$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'edited expenses category details for $accounting_term')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());


//header ("Location:edit_expense_cat.php?exp_cat_id=$id&updateconfirm=1");

?>
<script type="text/javascript">
alert('Record Updated successfuly');
//window.location = "begin_order.php";
window.location = "<?php echo $_SERVER['HTTP_REFERER']; ?>";
</script>
<?php
mysql_close($cnn);


?>