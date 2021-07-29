<?php

include('includes/session.php');
include('Connections/fundmaster.php');

$id=$_GET['id'];



$sql= "delete from cheque_received_code where cheque_received_code_id='$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sql= "delete from cheque_received where cheque_received_code_id='$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


$sql2="INSERT INTO audit_trails SET 
user_id='$user_id',
date_of_event='$to',
action='Delete cheque/cash payment posting no : $id'";
$results2= mysql_query($sql2) or die ("Error $sql2.".mysql_error());


?>
<script type="text/javascript">
alert('Record Deleted Successfuly');
window.location = "<?php echo $_SERVER['HTTP_REFERER']; ?>";
</script> 

<?php


//header ("Location:view_supplier.php? deleteconfirm=1");





mysql_close($cnn);


?>


