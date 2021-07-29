<?php
#include connection
include('Connections/fundmaster.php');
include('includes/session.php');
$id=$_GET['id'];
$employee_id=$_GET['employee_id'];
$sql3="DELETE FROM employee_dependant_details WHERE dependant_id=$id";
$results3= mysql_query($sql3) or die ("Error $sql3.".mysql_error());
?>
<script type="text/javascript">
//alert('Dependant Details Saved Successfully');

window.location = "home.php?add_employee=add_employee&sub_module_id=<?php echo $sub_module_id ?>&qt=4&employee_id=<?php echo $employee_id;  ?>&success";
//window.location = "home.php?addquest1=addquest1&sub_module_id=<?php echo $sub_module_id ?>&qt=<?php echo $question_type_id;?>&form_id=<?php echo $form_id; ?>&par_id=<?php echo $parameter_id; ?>";
</script>

<?php






mysql_close($cnn);


?>


