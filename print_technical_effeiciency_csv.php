<?php 
include ('includes/session.php');
include('Connections/fundmaster.php');
$date_month=$_GET['payment_month'];

header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment;Filename=Technical_Efficiency_Report.xlsx");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");

?>
<title>Safaricom - Outlet Visit Dashboard Report</title>
<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>
<script type="text/javascript" src="calender/calendar.js"></script>
<script type="text/javascript" src="calender/lang/calendar-en.js"></script>
<script type="text/javascript" src="calender/calendar-setup.js"></script>
<link rel="stylesheet" href="csspr.css" type="text/css" />



<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>

<style type="text/css">

@import url(calender/calendar-win2k-1.css);

</style>

<style type="text/css">
.table
{
border-collapse:collapse;
}
.table td, tr
{
border:1px solid black;
padding:3px;
}
</style>
<body onLoad="window.print();">
<table width="100%" border="0" class="table">


<tr height="40"> <td colspan="9" align="center"><H2>MY MECHANIC AUTO GARAGE LIMITED</H2></td></tr>
<tr bgcolor="#FFFFCC">
   
    <td colspan="9" height="30" align="center">
<H2>Technical Efficiency Report</H2>
	
	</td>
	
    </tr>

	
  <tr  style="background:url(images/description.gif);" height="30" >
    <td align="center" width="100"><strong>Job Card No</strong></td>
    <td align="center" width="150"><strong>Make and Model</strong></td>
    <td align="center" width="120"><strong>Reg. No / Engine</strong></td>
    <td align="center" width="220"><strong>Task Name</strong></td>
    <td align="center" width="220"><strong>Technician</strong></td>
    <td align="center" width="220"><strong>Completion Date</strong></td>
	<td align="center" width="200"><strong>Flat Rate Time (Hrs)</strong></td>
    <td align="center" width="150"><strong>Time Taken (Hrs)</strong></td>
    <td align="center" width="150"><strong>Efficiency (%)</strong></td>


    
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
    <td ><?php echo $rowsc->vehicle_make .' - '.$rowsc->vehicle_model; ;?></td>
    <td ><?php echo $rowsc->reg_no.' - '.$rowsc->engine;?></td>
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
$querycl2="select * from job_card_clock where job_card_task_id='$job_card_task_id' and clock_type='fin'";
$resultscl2=mysql_query($querycl2) or die ("Error: $querycl2.".mysql_error());
$rowscl2=mysql_fetch_object($resultscl2);
echo $time_clocked_out=$rowscl2->date_clocked;
	
	
	?></td>
	<td align="center">
	<?php 
$engine_range_id=$rowsc->engine_range_id;
$task_id=$rows->task_id;

						  $sqlcs1="SELECT * FROM labour_cost_matrix where task_id='$task_id' AND engine_range_id='$engine_range_id'";
						  $resultscs1= mysql_query($sqlcs1) or die ("Error $sqlcs1.".mysql_error());
						  $rowscs1=mysql_fetch_object($resultscs1);
	echo $flat_rate_hrs=$rowscs1->flat_rate_hrs;
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

echo $timen_taken=$period_taken-$idle_time;
	
	?>
	
	</td>
	
	<td align="center">
	<?php 
	echo number_format($efficiency=$flat_rate_hrs/$timen_taken*100,2);
	
	?>
	</td>
   
	
   
    </tr>
  <?php 
  $ttl_flat_rate=$ttl_flat_rate+$flat_rate_hrs;
  $ttl_time_taken=$ttl_time_taken+$timen_taken;
  }?>
  <tr height="30" bgcolor="#FFFFCC">
  <td colspan="6">Grand Efficiency</td>
  <td align="center"><strong><?php echo  $ttl_flat_rate;?></strong></td>
  <td align="center"><strong><?php echo  $ttl_time_taken;?></strong></td>

  <td align="center"><strong><font size="+1" color="#ff0000"><?php 
  echo number_format($work_shop_eff=$ttl_flat_rate/$ttl_time_taken*100,2).' %';
  
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


	
	</td>

<table width="80%" border="0" align="center">
<tr height="20"><td></td><td></td><td></td><td></td></tr>
<tr height="30"><td><strong>Prepared By :</strong></td><td>----------------------------------------------</td><td><strong>Checked By:</strong></td><td>----------------------------------------------</td><td><strong>Authorized By :</strong></td><td>----------------------------------------------</td></tr>

<tr height="30"><td><strong>Designation :<strong></td><td>----------------------------------------------</td><td><strong>Designation :</strong></td><td>----------------------------------------------</td><td><strong>Designation :</strong></td><td>----------------------------------------------</td></tr>

<tr height="30"><td><strong>Signature :<strong></td><td>----------------------------------------------</td><td><strong>Signature :</strong></td><td>----------------------------------------------</td><td><strong>Signature :</strong></td><td>----------------------------------------------</td></tr>
<tr height="30"><td><strong>Date:<strong></td><td>----------------------------------------------</td><td><strong>Date: </strong></td><td>----------------------------------------------</td><td><strong>Date:</strong></td><td>----------------------------------------------</td></tr>

<tr height="20"><td></td><td></td><td></td><td></td></tr>







</table>
</body>


