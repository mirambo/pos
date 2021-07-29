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
	<strong>Search By Vehicle Registration No : 
    </strong>

<input type="text" name="reg_no" size="40" /><strong>Or By Task Name:</strong>
		<input type="text" name="task_name" size="40" />
			<input type="submit" name="generate" value="Search">
	<!--<a href="home.php?perdm=perdm"><img src="images/newcar.png" style="margin-top:5px; margin-left:20px;"></a>-->
	</td>
	
    </tr>




	
  
  <tr  style="background:url(images/description.gif);" height="30" >
    <td align="center" width="100"><strong>Job Card No</strong></td>
    <td align="center" width="150"><strong>Make and Model</strong></td>
    <td align="center" width="120"><strong>Reg. No / Engine</strong></td>
    <td align="center" width="220"><strong>Task Name</strong></td>
    <td align="center" width="220"><strong>Technician</strong></td>
	<td align="center" width="200"><strong>Flat Rate Time (Hrs)</strong></td>
    <td align="center" width="150"><strong>Time Taken (Hrs)</strong></td>


    
    </tr>
	 <?php 
if ($user_group_id==15)
{
if (!isset($_POST['generate']))
{
  
$sql="SELECT * FROM job_card_task where finished_status='1' order by date_generated desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
else
{
//$client_id=$_POST['client_id'];
$reg_no=$_POST['reg_no'];
$task_name=$_POST['task_name'];

if ($reg_no!='' && $task_name=='')
{
$sql="SELECT * FROM job_card_task,bookings where job_card_task.booking_id=bookings.booking_id AND finished_status='1' AND 
bookings.reg_no LIKE '%$reg_nod%' order by date_generated desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


}
if ($reg_no=='' && $task_name!='')
{
$sql="SELECT * FROM job_card_task.task where job_card_task.task_id=task.task_id AND finished_status='1' AND 
task.task_name LIKE '%$task_name%' order by job_card_task.date_generated desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}


else
{
$sql="SELECT * FROM job_card_task where finished_status='1' order by date_generated desc";
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
$engine_range_id=$rowsc->engine_range_id;
$task_id=$rows->task_id;

						  $sqlcs1="SELECT * FROM labour_cost_matrix where task_id='$task_id' AND engine_range_id='$engine_range_id'";
						  $resultscs1= mysql_query($sqlcs1) or die ("Error $sqlcs1.".mysql_error());
						  $rowscs1=mysql_fetch_object($resultscs1);
	echo $rowscs1->flat_rate_hrs;
	?>
	
	</td>
		<td align="center">
	<?php 
$job_card_task_id=$rows->job_card_task_id;

/* $querycl="select * from job_card_clock where job_card_task_id='$job_card_task_id' and clock_type='inn'";
$resultscl=mysql_query($querycl) or die ("Error: $querycl.".mysql_error());
$rowscl=mysql_fetch_object($resultscl);
$time_clocked_id=$rowscl->date_clocked;

$querycl2="select * from job_card_clock where job_card_task_id='$job_card_task_id' and clock_type='fin'";
$resultscl2=mysql_query($querycl2) or die ("Error: $querycl2.".mysql_error());
$rowscl2=mysql_fetch_object($resultscl2);
$time_clocked_out=$rowscl2->date_clocked;	


//total_time
$fulldate_hour_start= $time_clocked_id;
$fulldate_hour_end= $time_clocked_out;
 
 $difference = strtotime( $fulldate_hour_end .' UTC' ) - strtotime( $fulldate_hour_start .' UTC');
 $period_taken = floor( $difference / 3600 ) .'.' .gmdate( 'i', $difference ); */
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
   
	
   
    </tr>
  <?php 
  
  }
   
  
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
 /*  Calendar.setup(
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
  ); */
  
  
  
  </script> 

   <?php }?>
