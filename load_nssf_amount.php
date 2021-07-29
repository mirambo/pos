<?php
 include('Connections/fundmaster.php');
     
 $parent_cat = $_GET['parent_cat'];
	
$qr_confirm23a="SELECT basic_pay FROM employee_job_details where employee_id='$parent_cat'";
$qr_res23a=mysql_query($qr_confirm23a) or die ('Error : $qr_confirm23a.' .mysql_error());
$rows23a=mysql_fetch_object($qr_res23a);

$basic_pay=$rows23a->basic_pay;

$nssf_amount=$basic_pay*0.1;


?>
<input type="text" readonly size="41"   value="<?php echo number_format($nssf_amount,2); ?>">10%
<input type="hidden" readonly size="41" name="nssf_amount"  value="<?php echo $nssf_amount; ?>">