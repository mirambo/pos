<?php
#include connection
include ('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$sales_id=mysql_real_escape_string($_POST['sales_id']);
$item_quantity=mysql_real_escape_string($_POST['item_quantity']);
$price=mysql_real_escape_string($_POST['price']);
$part_id=mysql_real_escape_string($_POST['part_id']);


/* $sqlproj= "SELECT * from items where item_id='$part_id'";
$resultsproj= mysql_query($sqlproj) or die ("Error $sqlproj.".mysql_error());
$rowsproj=mysql_fetch_object($resultsproj);
$unit_price=$rowsproj->curr_sp; */

$quantity=mysql_real_escape_string($_POST['item_quantity']);


 
$sql= "insert into sales_item values('','$sales_id','$incharge','$part_id','$item_quantity','$price','$user_id',NOW(),'0')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sqlauditsav= "insert into audit_trails values('','$user_id',NOW(),'Added sales items into the system')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());

//header ("Location:generate_invoice.php?sales_id=$sales_id&addpartconfirm=1");

?>
<script type="text/javascript">
alert('Record Added successfuly');
//window.location = "begin_order.php";
window.location = "<?php echo $_SERVER['HTTP_REFERER']; ?>";
</script>
<?php




mysql_close($cnn);

?>


