<?php
if ($sess_allow_view==0)
{
include ('includes/restricted.php');
}
else
{
 ?>
<?php
if(isset($_GET['subDELETELocation']))
  { 
$booking_id=$_GET['booking_id'];
delete_location($booking_id,$user_id);
  }
$cat=$_GET['cat'];
?>
<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>
<script type="text/javascript" src="calender/calendar.js"></script>
<script type="text/javascript" src="calender/lang/calendar-en.js"></script>
<script type="text/javascript" src="calender/calendar-setup.js"></script>

<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>

<style type="text/css">

@import url(calender/calendar-win2k-1.css);

</style>
<script type="text/javascript"> 

function confirmDelete()
{
    return confirm("Are you sure you want to resume task?");
}

</script>

<!--<SCRIPT language="javascript">
function reload(form)
{
var val=form.cat_id.options[form.cat_id.options.selectedIndex].value;
self.location='home.php?viewcountries=viewcountries&cat=' + val ;

}

</script>-->
 <form name="search" method="post" action="">  
<table width="100%" border="0">
  <tr bgcolor="#FFFFCC">
   
    <td colspan="10" height="30" align="center"> 
	<?php

if ($_GET['addconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:550px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Clocked In Successfully!!</font></strong></p></div>';


if ($_GET['stopconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:550px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Job Card Stopped Successfully!!</font></strong></p></div>';

if ($_GET['resumeconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:550px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Job Card Resumed Successfully!!</font></strong></p></div>';


if ($_GET['outconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:550px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Job Card Clocked Out Successfully!!</font></strong></p></div>';


?> 

<?php 

if ($_GET['delete']==1)
echo "<p align='center'><strong><font color='#FF0000'>Record Deleted!!</font></strong></p>";
?>
	
	</td>
	
    </tr>
<tr bgcolor="#FFFFCC">
   
    <td  height="30"  colspan="10" align="center" valign="top">
	

 <strong>Search By Technician : 
    </strong>
<select name="technician_id"><option value="0">Select..................................</option><?php $query1="select * from users where user_group_id='30' order by f_name asc"; $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error()); if (mysql_num_rows($results1)>0) { while ($rows1=mysql_fetch_object($results1)) { ?> <option value="<?php echo $rows1->user_id; ?>"><?php echo $rows1->f_name; ?> </option> <?php  } } ?></select><strong>Or By Task Name:</strong>
	
 <strong>Search By Task : 
    </strong>		
		<select name="task_name"><option value="0">Select...........................</option><?php $query1="select * from task order by task_name asc"; $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error()); if (mysql_num_rows($results1)>0) { while ($rows1=mysql_fetch_object($results1)) { ?> <option value="<?php echo $rows1->task_id; ?>"><?php echo $rows1->task_name; ?> </option> <?php  } } ?></select>

<!--<strong>Date From</strong><input type="text" name="date_from" size="20" id="date_from" readonly="readonly" />

<strong>Date To</strong><input type="text" name="date_to" size="20" id="date_to" readonly="readonly" />	-->	
			
			
			<input type="submit" name="generate" value="Search">
	<a href="print_progress_report.php" target="_blank" style="float:right; margin-right:10px;">Print Job Card Progress Report</a>
	</td>
	
    </tr>




	
  
  <tr  style="background:url(images/description.gif);" height="30" >
    <td align="center" width="100"><strong>Job Card No</strong></td>
    <td align="center" width="150"><strong>Make and Model</strong></td>
    <td align="center" width="120"><strong>Reg. No / Engine</strong></td>
    <td align="center" width="220"><strong>Task Name</strong></td>
    <td align="center" width="220"><strong>Technician</strong></td>
	<td align="center" width="200"><strong>Status</strong></td>
    <td align="center" width="220"><strong>Date</strong></td>
	
   <!-- <td align="center" width="150"><strong>Time Taken (Hrs)</strong></td>
    <td align="center" width="150"><strong>Efficiency (%)</strong></td>-->


    
    </tr>
	 <?php 
$ttl_flat_rate=0;

if (!isset($_POST['generate']))
{
  
$sql="SELECT * FROM job_cards order by date_generated desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
else
{
//$client_id=$_POST['client_id'];
$technician_id=$_POST['technician_id'];
$task_name=$_POST['task_name'];


if ($technician_id!='0' && $task_name=='0')
{
$sql="SELECT * FROM job_card_task,bookings,job_card_clock where job_card_task.booking_id=bookings.booking_id 
AND job_card_clock.job_card_task_id=job_card_task.job_card_task_id AND job_card_task.technician_id='$technician_id' 
GROUP BY job_card_clock.job_card_task_id order by date_clocked desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}
elseif ($technician_id=='0' && $task_name!='0')
{

$sql="SELECT * FROM job_card_task,bookings,job_card_clock where job_card_task.booking_id=bookings.booking_id 
AND job_card_clock.job_card_task_id=job_card_task.job_card_task_id AND job_card_task.task_id='$task_name' 
GROUP BY job_card_clock.job_card_task_id order by date_clocked desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}

elseif ($technician_id!='0' && $task_name!='0')
{
$sql="SELECT * FROM job_card_task,bookings,job_card_clock where job_card_task.booking_id=bookings.booking_id 
AND job_card_clock.job_card_task_id=job_card_task.job_card_task_id AND job_card_task.technician_id='$technician_id' AND job_card_task.task_id='$task_name' 
GROUP BY job_card_clock.job_card_task_id order by date_clocked desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}

else
{
$sql="SELECT * FROM job_card_task,bookings,job_card_clock where job_card_task.booking_id=bookings.booking_id 
AND job_card_clock.job_card_task_id=job_card_task.job_card_task_id GROUP BY job_card_clock.job_card_task_id order by date_clocked desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}


}





if (mysql_num_rows($results) > 0)
						  {
							  $RowCounter=0;
							  while ($rows=mysql_fetch_object($results))
							  { 
							  
							  $RowCounter++;
							  if($RowCounter % 2==0)
{
echo '<tr bgcolor="#C0D7E5" height="25">';
}
else 
{
echo '<tr bgcolor="#FFFFCC" height="25" >';
}
 
?>
  
    <td ><?php echo $job_card_id=$rows->job_card_id;
	
	$booking_id=$rows->booking_id;
	$job_card_task_id=$rows->job_card_task_id;
	
$sqlc="SELECT * FROM bookings,customer WHERE bookings.customer_id=customer.customer_id AND bookings.booking_id='$booking_id'";
$resultsc= mysql_query($sqlc) or die ("Error $sqlc.".mysql_error());
$rowsc=mysql_fetch_object($resultsc);
	
	
	?></td>
    <td ><?php echo $rowsc->vehicle_make .' - '.$rowsc->vehicle_model; ;?></td>
    <td ><?php echo $rowsc->reg_no.' - '.$rowsc->engine;?></td>
    <td >
	<ol>
	<?php 
	 $task_id=$rows->task_id;
	 
 $sqlt="SELECT * FROM job_card_task,task where job_card_task.task_id=task.task_id and job_card_task.job_card_id='$job_card_id'";
$resultst= mysql_query($sqlt) or die ("Error $sqlt.".mysql_error());




if (mysql_num_rows($resultst) > 0)
						  {
							 
							  while ($rowst=mysql_fetch_object($resultst))
							  {
							   echo '<li>'.$rowst->task_name.'<li/>';	
							  }
							  
							  }



















//$rowst=mysql_fetch_object($resultst);

	?>	
	</ol>
	</td>
    <td >	<?php 
 	 
$sqlt="SELECT * FROM job_card_task,users where job_card_task.technician_id=users.user_id and job_card_task.job_card_id='$job_card_id' GROUP BY job_card_task.technician_id order by users.f_name desc";
$resultst= mysql_query($sqlt) or die ("Error $sqlt.".mysql_error());




if (mysql_num_rows($resultst) > 0)
						  {
							 
							  while ($rowst=mysql_fetch_object($resultst))
							  {
							   echo '<li>'.$rowst->f_name.'<li/>';	
							  }
							  
							  }



















//$rowst=mysql_fetch_object($resultst);

	?>	
	</ol>

	</td>
	<td align="center">
	<?php 
	 $in_status=$rows->closed_status;
if ($in_status==1)
	
{?>
<span style="color:#ff0000; font-weight:bold;">Completed</span>
<?php 
}
else
{

?>
<span style="color:#009933; font-weight:bold;">In Progress..</span>
<?php 
}
	?>
	
	
	</td>
	<td align="center">
	<?php 
	echo $date_dones;

	
	
	?></td>

		
	
	
   
	
   
    </tr>
  <?php 
  $ttl_flat_rate=$ttl_flat_rate+$flat_rate_hrs;
  $ttl_time_taken=$ttl_time_taken+$timen_taken;
  }?>
  <!--<tr height="30" bgcolor="#FFFFCC">
  <td colspan="4">Workshop Efficiency</td>
  <td align="center"><strong><?php echo  $ttl_flat_rate;?></strong></td>
  <td align="center"><strong><?php echo  $ttl_time_taken;?></strong></td>

  <td align="center"><strong><font size="+1" color="#ff0000"><?php 
  echo number_format($work_shop_eff=$ttl_flat_rate/$ttl_time_taken*100,2).' %';
  
  ?></strong></td>

  </tr>-->
  
  <?php
   
  
  }
  
  else 
  
  {
  ?>
  
  <tr height="30" bgcolor="#FFFFCC"><td colspan="9" align="center"><font color="#ff0000"><strong>Sorry!! No Results found</strong></font></td></tr>
  
  <?php 
  
  
  }
  
  
  ?>
</table>
</form>

<script type="text/javascript">
 /* Calendar.setup(
    {
      inputField  : "date_from",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "date_from"       // ID of the button
    }
  );
  
  Calendar.setup(
    {
      inputField  : "date_to",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "date_to"       // ID of the button
    }
  );  */
  
  
  
  </script> 

   <?php }?>
