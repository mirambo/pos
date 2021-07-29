<?php
include('holidays.php');
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
		<select name="task_name"><option value="0">Select...........................</option><?php $query1="select * from task order by task_name asc"; $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error()); if (mysql_num_rows($results1)>0) { while ($rows1=mysql_fetch_object($results1)) { ?> <option value="<?php echo $rows1->task_id; ?>"><?php echo $rows1->task_name; ?> </option> <?php  } } ?></select>

<strong>Date From</strong><input type="text" name="date_from" size="20" id="date_from" readonly="readonly" />

<strong>Date To</strong><input type="text" name="date_to" size="20" id="date_to" readonly="readonly" />		
			
			
			<input type="submit" name="generate" value="Search">
	<!--<a href="home.php?perdm=perdm"><img src="images/newcar.png" style="margin-top:5px; margin-left:20px;"></a>-->
	</td>
	
    </tr>




	
  
  <tr  style="background:url(images/description.gif);" height="30" >
    <td align="center" width="100"><strong>Job Card No</strong></td>
    <!--<td align="center" width="150"><strong>Make and Model</strong></td>
    <td align="center" width="120"><strong>Reg. No / Engine</strong></td>-->
    <td align="center" width="220"><strong>Task Name</strong></td>
    <td align="center" width="220"><strong>Technician</strong></td>
    <td align="center" width="220"><strong>Date Begun</strong></td>
    <td align="center" width="220"><strong>Completion Date</strong></td>
	<td align="center" width="100"><strong>Total Working Days Taken</strong></td>
	<td align="center" width="100"><strong>Availlable Hrs</strong></td>
    <td align="center" width="150"><strong>Time Taken (Hrs)</strong></td>
    <td align="center" width="150"><strong>LU (%)</strong></td>


    
    </tr>
	 <?php 
	 $ttl_flat_rate=0;
if ($user_group_id==15)
{
if (!isset($_POST['generate']))
{
  
$sql="SELECT * FROM job_card_task,bookings,job_card_clock where job_card_task.booking_id=bookings.booking_id 
AND job_card_clock.job_card_task_id=job_card_task.job_card_task_id AND job_card_task.finished_status='1' AND job_card_clock.clock_type='fin'
order by date_clocked desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
else
{
//$client_id=$_POST['client_id'];
$technician_id=$_POST['technician_id'];
$task_name=$_POST['task_name'];
$date_from=$_POST['date_from'];
$date_to=$_POST['date_to'];

if ($technician_id!='0' && $task_name=='0' && $date_from=='' && $date_to=='')
{
$sql="SELECT * FROM job_card_task,bookings,job_card_clock where job_card_task.booking_id=bookings.booking_id 
AND job_card_clock.job_card_task_id=job_card_task.job_card_task_id AND job_card_task.finished_status='1' AND 
job_card_task.technician_id='$technician_id' AND job_card_clock.clock_type='fin' order by date_clocked desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


}
elseif ($technician_id=='0' && $task_name!='0' && $date_from=='' && $date_to=='')
{
$sql="SELECT * FROM job_card_task,bookings,job_card_clock where job_card_task.booking_id=bookings.booking_id 
AND job_card_clock.job_card_task_id=job_card_task.job_card_task_id AND job_card_task.finished_status='1' AND 
job_card_task.task_id='$task_name' AND job_card_clock.clock_type='fin' order by date_clocked desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}

elseif ($technician_id=='0' && $task_name=='0' && $date_from!='' && $date_to!='')
{
$sql="SELECT * FROM job_card_task,bookings,job_card_clock where job_card_task.booking_id=bookings.booking_id 
AND job_card_clock.job_card_task_id=job_card_task.job_card_task_id AND job_card_task.finished_status='1' AND 
job_card_clock.date_clocked >='$date_from' AND job_card_clock.date_clocked <='$date_to' AND 
job_card_clock.clock_type='fin' order by date_clocked desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}

elseif ($technician_id!='0' && $task_name!='0' && $date_from=='' && $date_to=='')
{
$sql="SELECT * FROM job_card_task,bookings,job_card_clock where job_card_task.booking_id=bookings.booking_id 
AND job_card_clock.job_card_task_id=job_card_task.job_card_task_id AND job_card_task.finished_status='1' AND 
job_card_task.task_id='$task_name' AND job_card_task.technician_id='$technician_id' AND job_card_clock.clock_type='fin' 
order by date_clocked desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}

elseif ($technician_id!='0' && $task_name=='0' && $date_from!='' && $date_to!='')
{
$sql="SELECT * FROM job_card_task,bookings,job_card_clock where job_card_task.booking_id=bookings.booking_id 
AND job_card_clock.job_card_task_id=job_card_task.job_card_task_id AND job_card_task.finished_status='1'
 AND job_card_task.technician_id='$technician_id' AND job_card_clock.date_clocked >='$date_from' AND 
 job_card_clock.date_clocked <='$date_to' AND job_card_clock.clock_type='fin' order by date_clocked desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}

elseif ($technician_id=='0' && $task_name!='0' && $date_from!='' && $date_to!='')
{
$sql="SELECT * FROM job_card_task,bookings,job_card_clock where job_card_task.booking_id=bookings.booking_id 
AND job_card_clock.job_card_task_id=job_card_task.job_card_task_id AND job_card_task.finished_status='1'
 AND job_card_task.task_id='$task_name' AND job_card_clock.date_clocked >='$date_from' AND 
 job_card_clock.date_clocked <='$date_to' AND job_card_clock.clock_type='fin' order by date_clocked desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}
else
{
$sql="SELECT * FROM job_card_task,bookings,job_card_clock where job_card_task.booking_id=bookings.booking_id 
AND job_card_clock.job_card_task_id=job_card_task.job_card_task_id AND job_card_task.finished_status='1' AND job_card_clock.clock_type='fin'
order by date_clocked desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}


}
}
else
{

if (!isset($_POST['generate']))
{
  
$sql="SELECT * FROM job_card_task where finished_status='1' AND job_card_task.technician_id='$user_id' order by date_generated desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
else
{
//$client_id=$_POST['client_id'];
$reg_no=$_POST['reg_no'];
$task_name=$_POST['task_name'];

if ($reg_no!='' && $task_name=='')
{
$sql="SELECT * FROM job_card_task,bookings where job_card_task.booking_id=bookings.booking_id AND finished_status='1' AND job_card_task.technician_id='$user_id' AND 
bookings.reg_no LIKE '%$reg_no%' order by date_generated desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


}
if ($reg_no=='' && $task_name!='')
{
$sql="SELECT * FROM job_card_task.task where job_card_task.task_id=task.task_id AND finished_status='1' AND job_card_task.technician_id='$user_id' AND 
task.task_name LIKE '%$task_name%' order by job_card_task.date_generated desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}


else
{
$sql="SELECT * FROM job_card_task where finished_status='1' AND job_card_task.technician_id='$user_id' order by date_generated desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}


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
  
    <td ><?php echo $rows->job_card_id;
	
	$booking_id=$rows->booking_id;
	
	
$sqlc="SELECT * FROM bookings,customer WHERE bookings.customer_id=customer.customer_id AND bookings.booking_id='$booking_id'";
$resultsc= mysql_query($sqlc) or die ("Error $sqlc.".mysql_error());
$rowsc=mysql_fetch_object($resultsc);
	
	
	?></td>
   <!-- <td ><?php echo $rowsc->vehicle_make .' - '.$rowsc->vehicle_model; ;?></td>
    <td ><?php echo $rowsc->reg_no.' - '.$rowsc->engine;?></td>-->
    <td ><?php 
	 $task_id=$rows->task_id;
 $sqlt="SELECT * FROM task where task_id='$task_id'";
$resultst= mysql_query($sqlt) or die ("Error $sqlt.".mysql_error());
$rowst=mysql_fetch_object($resultst);

echo $rowst->task_name;	
	?></td>
    <td >	<?php 
 $technician_id=$rows->technician_id;
	
$sqlcs="SELECT * FROM users where user_id='$technician_id'";
$resultscs= mysql_query($sqlcs) or die ("Error $sqlcs.".mysql_error());
$rowscs=mysql_fetch_object($resultscs);
echo $rowscs->f_name;
	
	?>
	</td>
	<td align="center">
	<?php 
$job_card_task_id=$rows->job_card_task_id;
$querycl23="select * from job_card_clock where job_card_task_id='$job_card_task_id' and clock_type='inn'";
$resultscl23=mysql_query($querycl23) or die ("Error: $querycl23.".mysql_error());
$rowscl23=mysql_fetch_object($resultscl23);
 echo $time_clocked_in=$rowscl23->date_clocked;
	
	
	?></td>
	<td align="center">
	<?php 
	$job_card_task_id=$rows->job_card_task_id;
$querycl2="select * from job_card_clock where job_card_task_id='$job_card_task_id' and clock_type='fin'";
$resultscl2=mysql_query($querycl2) or die ("Error: $querycl2.".mysql_error());
$rowscl2=mysql_fetch_object($resultscl2);
 echo $time_clocked_out=$rowscl2->date_clocked;






	
	?></td>
	<td align="center">
	<?php 
$holidays=array(" "," "," ");

echo number_format($working_days=getWorkingDays($time_clocked_in,$time_clocked_out,$holidays),2);
	?>
	
	</td>
	<td align="center">
<?php 
echo number_format($avail_hrs=$working_days*8.25,2);
?>	
	</td>
		<td align="center">
	<?php 
$query3="select SUM(out_period) as ttl_period from job_card_clock where job_card_task_id='$job_card_task_id' group by job_card_task_id";
$results3=mysql_query($query3) or die ("Error: $query3.".mysql_error());
$rows3=mysql_fetch_object($results3);
$period_taken=$rows3->ttl_period;

//total idle time
$query5="select SUM(resume_period) as ttl_resume from job_card_clock where job_card_task_id='$job_card_task_id' group by job_card_task_id";
$results5=mysql_query($query5) or die ("Error: $query5.".mysql_error());
$rows5=mysql_fetch_object($results5);
$idle_time=$rows5->ttl_resume;

echo number_format($timen_taken=$period_taken-$idle_time,2);
	
	?>
	
	</td>
	
	<td align="center">
	<?php 
	echo number_format($lur=$timen_taken/$avail_hrs*100,2);
	
	?>
	</td>
   
	
   
    </tr>
  <?php 
  $ttl_avail_hrs=$ttl_avail_hrs+$avail_hrs;
  $ttl_time_taken=$ttl_time_taken+$timen_taken;
  $ttl_working_days=$ttl_working_days+$working_days;
  }?>
  <tr height="30" bgcolor="#FFFFCC">
  <td colspan="5">Grand Labour Utilization</td>
  <td align="center"><strong><?php echo   number_format($ttl_working_days,2);?></strong></td>
  <td align="center"><strong><?php echo  number_format($ttl_avail_hrs,2);?></strong></td>
  <td align="center"><strong><?php echo  number_format($ttl_time_taken,2);?></strong></td>

  <td align="center"><strong><font size="+1" color="#ff0000"><?php 
  echo number_format($work_lru=$ttl_time_taken/$ttl_avail_hrs*100,2).' %';
  
  ?></strong></td>

  </tr>
  
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
 Calendar.setup(
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
  ); 
  
  
  
  </script> 

   <?php }?>
