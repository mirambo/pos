<?php 
include ('includes/session.php');
include('Connections/fundmaster.php');
$date_month=$_GET['payment_month'];

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

<tr height="40"> <td colspan="16" align="center"><img src="images/logolpo.png" width="300" height="80"></td></tr>
<tr height="40"> <td colspan="16" align="center"><H2>MOTORZONE AUTO REPAIR WORKSHOP</H2></td></tr>
<tr bgcolor="#FFFFCC">
   
    <td colspan="9" height="30" align="center">
<H2>Job Progress Report</H2>
	
	</td>
	
    </tr>
<tr  style="background:url(images/description.gif);" height="30" >
    <td align="center" width="100"><strong>Job Card No</strong></td>
    <td align="center" width="150"><strong>Make and Model</strong></td>
    <td align="center" width="120"><strong>Reg. No / Engine</strong></td>
    <td align="center" width="220"><strong>Task Name</strong></td>
    <td align="center" width="220"><strong>Technician</strong></td>
	<td align="center" width="200"><strong>Status</strong></td>

	
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

<!--<table width="80%" border="0" align="center">
<tr height="20"><td></td><td></td><td></td><td></td></tr>
<tr height="30"><td><strong>Prepared By :</strong></td><td>----------------------------------------------</td><td><strong>Checked By:</strong></td><td>----------------------------------------------</td><td><strong>Authorized By :</strong></td><td>----------------------------------------------</td></tr>

<tr height="30"><td><strong>Designation :<strong></td><td>----------------------------------------------</td><td><strong>Designation :</strong></td><td>----------------------------------------------</td><td><strong>Designation :</strong></td><td>----------------------------------------------</td></tr>

<tr height="30"><td><strong>Signature :<strong></td><td>----------------------------------------------</td><td><strong>Signature :</strong></td><td>----------------------------------------------</td><td><strong>Signature :</strong></td><td>----------------------------------------------</td></tr>
<tr height="30"><td><strong>Date:<strong></td><td>----------------------------------------------</td><td><strong>Date: </strong></td><td>----------------------------------------------</td><td><strong>Date:</strong></td><td>----------------------------------------------</td></tr>

<tr height="20"><td></td><td></td><td></td><td></td></tr>







</table>-->
</body>


