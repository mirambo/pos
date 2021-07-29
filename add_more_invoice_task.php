<?php 
include('includes/session.php');
include('Connections/fundmaster.php');
include ('functions.php'); 
include ('edit_form.php'); 
$booking_id=$_GET['booking_id'];
$invoice_id=$_GET['invoice_id'];
$job_card_id=$_GET['job_card_id'];
$convert=$_GET['convert'];


?>
<form name="new_machine_category" action="process_add_invoice_task.php" method="post">			
<table width="100%" border="1" class="table1" id="tbl1">

  
	<input type="hidden" size="41" name="invoice_id" value="<?php echo $invoice_id;?>">
	<input type="hidden" size="41" name="job_card_id" value="<?php echo $job_card_id;?>">
	<input type="hidden" size="41" name="booking_id" value="<?php echo $booking_id;?>">
	<input type="hidden" size="41" name="convert" value="<?php echo $convert;?>">
	

	<td colspan="2" height="30"><?php

if ($_GET['addbenefitsconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#339900 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#339900" >Benefit Type Added Successfully!!</font></strong></p></div>';
?>

<?php

if ($_GET['recordexist']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! the record exist</font></strong></p></div>';
?></td>
    </tr>

	
	<tr  align="center">	
	

	<td colspan="2"><strong>Task Detail</strong></td>  
  </tr>
   <tr style="background:url(images/description.gif);" height="20" >
	<td width="100" align="right"><strong>Task Name : </strong></td>
	<td width="100"><input type="text" name="task_name" size="40"></td>

  </tr>
  <tr style="background:url(images/description.gif);" height="20" >
	<td width="100" align="right"><strong>Amount : </strong></td>
	<td width="100"><input type="text" name="task_cost" size="20"></td>

  </tr>
   <tr style="background:url(images/description.gif);" height="20" >
	<td width="100" align="right"><strong>Task Remarks : </strong></td>
	<td width="100"><strong><input type="text" name="task_remarks" size="50"></strong></td>

  </tr>
  
	
	
	
  
  
  
  <tr height="40">
    <td align="center" colspan="2"><input type="submit" name="submit" value="Save Task Details"></td>    
  </tr>
 
</table>


</form>



			
			
			
			