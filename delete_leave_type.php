<?php
#include connection
include('Connections/fundmaster.php');
include('includes/session.php');
$employee_id=$_GET['employee_id'];
$id=$_GET['leave_id'];
$sql3="DELETE FROM hs_hr_leavetype WHERE leave_type_id='$id'";
$results3= mysql_query($sql3) or die ("Error $sql3.".mysql_error());
?>
<script type="text/javascript">
alert('Record Deleted Successfully');

window.location = "home.php?view_leave_type=view_leave_type&sub_module_id=<?php echo $sub_module_id; ?>&leave_id=<?php echo $id?>";
//window.location = "home.php?addquest1=addquest1&sub_module_id=<?php echo $sub_module_id ?>&qt=<?php echo $question_type_id;?>&form_id=<?php echo $form_id; ?>&par_id=<?php echo $parameter_id; ?>";
</script>

<?php






mysql_close($cnn);


?>


