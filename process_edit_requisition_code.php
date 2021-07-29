<?php
#include connection
include ('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$requisition_id=$_GET['order_code'];
$sup=mysql_real_escape_string($_POST['sup']);
$requisition_date=mysql_real_escape_string($_POST['date_from']);
$comments=mysql_real_escape_string($_POST['comments']);
$ref_no=mysql_real_escape_string($_POST['ref_no']);



 
$sqlupdt= "UPDATE requisition SET 
date_generated='$requisition_date',
comments='$comments',
ref_no='$ref_no',
requested_by='$sup'

WHERE requisition_id='$requisition_id'";
$resultsupdt= mysql_query($sqlupdt) or die ("Error $sqlupdt.".mysql_error());

$sqlauditsav= "insert into audit_trails values('','$user_id',NOW(),'Update requisition details details into the system')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());

?>
<script type="text/javascript">
alert('Record Saved Successfuly');
window.location = "create_requisition.php?order_code=<?php echo $requisition_id; ?>";
</script> 

<?php

//header ("Location:create_requisition.php?order_code=$requisition_id");




mysql_close($cnn);

?>


