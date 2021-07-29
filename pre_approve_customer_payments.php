<?php
#include connection
include('Connections/fundmaster.php');

$sql="SELECT * FROM invoice_payments where status='0' order by invoice_payment_id asc LIMIT 1";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
$rows=mysql_fetch_object($results);
$invoice_payment_id=$rows->invoice_payment_id;

if ($invoice_payment_id=='')
{
//$originatingpage="home.php?viewcountries=viewcountries";
?>
<script type="text/javascript">
alert('All the customer payments have been approved successfuly');
window.location = "view_approved_client_payments.php";

</script>

<?php
}
else
{
header ("Location:approve_payment2.php?invoice_payment_id=$invoice_payment_id");

}









mysql_close($cnn);


?>


