<?php
#include connection
include('Connections/fundmaster.php');
include('includes/session.php');

$sql="SELECT * FROM order_code_get where status='0' order by order_code_id asc LIMIT 1";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
$rows=mysql_fetch_object($results);
$order_code_id=$rows->order_code_id;

if ($order_code_id=='')
{
//$originatingpage="home.php?viewcountries=viewcountries";
?>
<script type="text/javascript">
alert('All the LPO have been approved successfuly');
window.location = "view_approved_lpo.php";

</script>

<?php
}
else
{
header ("Location:view_lpo_trans.php?order_code=$order_code_id&approved=1");

}









mysql_close($cnn);


?>


