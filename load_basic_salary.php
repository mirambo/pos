 <?php
 include('Connections/fundmaster.php');
     
$parent_cat = $_GET['parent_cat'];
	
$qr_confirm23a="SELECT basic_pay FROM employee_job_details where employee_id='$parent_cat'";
$qr_res23a=mysql_query($qr_confirm23a) or die ('Error : $qr_confirm23a.' .mysql_error());
$rows23a=mysql_fetch_object($qr_res23a);	

?>
<input type="text" size="41" readonly value="<?php echo number_format($basic_salary=$rows23a->basic_pay,2); ?>">
<input type="hidden" size="41" name="basic_pay"  value="<?php echo $basic_salary=$rows23a->basic_pay; ?>">
 