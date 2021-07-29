<?php
 include('Connections/fundmaster.php');
     
 $parent_cat = $_GET['parent_cat'];
	
$qr_confirm23a="SELECT employee_id from hs_hr_employee WHERE emp_number='$parent_cat'";
$qr_res23a=mysql_query($qr_confirm23a) or die ('Error : $qr_confirm23a.' .mysql_error());
$rows23a=mysql_fetch_object($qr_res23a);	

$rows23a->principle_amount;
?>
<input type="text" size="41" readonly value="<?php echo $rows23a->employee_id; ?>">
 