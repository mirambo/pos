<?php
#include connection
include('Connections/fundmaster.php');

$sql="SELECT * FROM job_cards where approved_status='0' AND canceled_status='0' order by job_card_id asc LIMIT 1";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
$rows=mysql_fetch_object($results);
$job_card_id=$rows->job_card_id;

if ($job_card_id=='')
{
//$originatingpage="home.php?viewcountries=viewcountries";
?>
<script type="text/javascript">
alert('All the invoices have been approved successfuly');
window.location = "home.php?view_biweekly=view_biweekly";

</script>

<?php
}
else
{
header ("Location:home.php?submit_biweekly2=submit_biweekly2&job_card_id=$job_card_id");

}









mysql_close($cnn);


?>


