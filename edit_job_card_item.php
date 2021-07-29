<?php 
include('includes/session.php');
include('Connections/fundmaster.php');
include ('functions.php'); 
include ('edit_form.php'); 
$booking_id=$_GET['booking_id'];
$job_card_id=$_GET['job_card_id'];
$job_card_item_id=$_GET['job_card_task_id'];

$sql="SELECT * from job_card_task where job_card_task_id='$job_card_item_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
$rows=mysql_fetch_object($results);

$service_item_id=$rows->service_item_id;


//$service_id=$rowsts->service_item_id;
$querytcs="select * from service_item where service_item_id='$service_item_id'";
$resultstcs=mysql_query($querytcs) or die ("Error: $querytc.".mysql_error());								  
$rowstcs=mysql_fetch_object($resultstcs);

$service_item_name=$rowstcs->service_item_name;



?>
<form name="new_machine_category" action="process_edit_job_card_item.php" method="post">			
<table width="100%" border="1" class="table1" id="tbl1">

  
	<input type="hidden" size="41" name="job_card_id" value="<?php echo $job_card_id;?>">
	<input type="hidden" size="41" name="booking_id" value="<?php echo $booking_id;?>">
	<input type="hidden" size="41" name="job_card_item_id" value="<?php echo $job_card_item_id;?>">

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
	

	<td colspan="2"><strong>Task Detail </strong></td>  
  </tr>
  <tr style="background:url(images/description.gif);" height="20" >
	<td width="100" align="right"><strong>Service Item : </strong></td>
	<td width="100"><select name="service_item_id"><option value="<?php echo  $rows->service_item_id;?>"><?php echo $service_item_name;?></option><?php $query1="select * from service_item order by service_item_name asc"; $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error()); if (mysql_num_rows($results1)>0) {while ($rows1=mysql_fetch_object($results1)) { ?>	<option value="<?php echo $rows1->service_item_id;?>"><?php echo $rows1->service_item_name; ?> </option><?php  }}?></select></td>

  </tr>
  <tr style="background:url(images/description.gif);" height="20" >
	<td width="100" align="right"><strong>Description : </strong></td>
	<td width="100"><strong><input type="text" name="remarks" value="<?php echo $rows->description;?>" size="50"></strong></td>

  </tr>
  
   <tr style="background:url(images/description.gif);" height="20" >
	<td width="100" align="right"><strong>Start From : </strong></td>
	<td width="100"><strong><input type="text" name="start_from" value="<?php echo $rows->start_from;?>" size="50"></strong></td>

  </tr>
  
   <tr style="background:url(images/description.gif);" height="20" >
	<td width="100" align="right"><strong>Quantity : </strong></td>
	<td width="100"><strong><input type="text" name="quantity" value="<?php echo $rows->quantity;?>" size="50"></strong></td>

  </tr>
  
   <tr style="background:url(images/description.gif);" height="20" >
	<td width="100" align="right"><strong>Unit Cost : </strong></td>
	<td width="100"><strong><input type="text" name="unit_cost" value="<?php echo $rows->unit_cost;?>" size="50"></strong></td>

  </tr>
  
	
	
	
  
  
  
  <tr height="40">
    <td align="center" colspan="2"><input type="submit" name="submit" value="Update">
	<input type="hidden" name="edit_set_template" id="edit_set_template" value="1">&nbsp;&nbsp;<input type="reset" value="Cancel"></td>    
  </tr>
 
</table>


</form>



			
			
			
			