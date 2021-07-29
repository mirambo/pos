<?php
 include('Connections/fundmaster.php');
     
 $parent_cat = $_GET['parent_cat'];
	
$qr_confirm23a="SELECT basic_pay FROM employee_job_details where employee_id='$parent_cat'";
$qr_res23a=mysql_query($qr_confirm23a) or die ('Error : $qr_confirm23a.' .mysql_error());
$rows23a=mysql_fetch_object($qr_res23a);

$basic_pay=$rows23a->basic_pay;

$nhif_amount=$basic_pay*0.03;


?>
<input type="text" readonly size="41"   value="<?php echo number_format($nhif_amount,2); ?>">3%
<input type="hidden" readonly size="41" name="nhif_amount"  value="<?php echo $nhif_amount; ?>">