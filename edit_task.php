<?php 
include('includes/session.php');
include('Connections/fundmaster.php');
include ('functions.php'); 
include ('edit_form.php'); 
$booking_id=$_GET['booking_id'];
$job_card_id=$_GET['job_card_id'];
$job_card_task_id=$_GET['job_card_task_id'];

$sql="SELECT * from job_card_task,task where job_card_task.task_id=task.task_id AND job_card_task.job_card_task_id='$job_card_task_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
$rows=mysql_fetch_object($results);



?>
<form name="new_machine_category" action="process_edit_task.php" method="post">			
<table width="100%" border="1" class="table1" id="tbl1">

  
	<input type="hidden" size="41" name="job_card_id" value="<?php echo $job_card_id;?>">
	<input type="hidden" size="41" name="booking_id" value="<?php echo $booking_id;?>">
	<input type="hidden" size="41" name="job_card_task_id" value="<?php echo $job_card_task_id;?>">

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
	<td width="100" align="right"><strong>Task Name : </strong></td>
	<td width="100"><!--<select name="task_name"><option value="<?php echo $rows->task_id;?>"><?php echo $rows->task_name;?></option><?php $query1="select * from task order by task_name asc"; $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error()); if (mysql_num_rows($results1)>0) { while ($rows1=mysql_fetch_object($results1)) { ?> <option value="<?php echo $rows1->task_id; ?>"><?php echo $rows1->task_name; ?> </option> <?php  } } ?></select>-->
	
	
	<input type="text" name="task_name" size="40" value="<?php echo $rows->task_name; ?>">
	<input type="hidden" name="task_id" size="20" value="<?php echo $rows->task_id; ?>">
	
	
	</td>

  </tr>
  <tr style="background:url(images/description.gif);" height="20" >
	<td width="100" align="right"><strong>Assign Technician : </strong></td>
	<td width="100">
	<?PHP 
	$technician_id=$rows->technician_id;
$sqltst="SELECT * from users where user_id='$technician_id'";
$resultstst= mysql_query($sqltst) or die ("Error $sqltst.".mysql_error());
$rowstst=mysql_fetch_object($resultstst);
	?>
	
	<select name="technician_id" >
	<option value="<?php echo $technician_id=$rows->technician_id;?>"><?php echo $rowstst->f_name;?></option>
	<?php 
	$query1="select * from users where user_group_id='30' order by f_name asc"; 
	$results1=mysql_query($query1) or die ("Error: $query1.".mysql_error()); if (mysql_num_rows($results1)>0) 
	{ 
	while ($rows1=mysql_fetch_object($results1)) 
	{ 
	?> <option value="<?php echo $rows1->user_id; ?>"><?php echo $rows1->f_name; ?> </option> 
	<?php  } } 
	?>
	</select></td>

  </tr>
  
   <tr style="background:url(images/description.gif);" height="20" >
	<td width="100" align="right"><strong>Task Cost : </strong></td>
	<td width="100"><input type="text" name="task_cost" size="40" value="<?php echo $rows->task_cost; ?>"></td>

  </tr>
  
	
	
	
  
  
  
  <tr height="40">
    <td align="center" colspan="2"><input type="submit" name="submit" value="Update">&nbsp;&nbsp;<input type="reset" value="Cancel"></td>    
  </tr>
 
</table>


</form>



			
			
			
			