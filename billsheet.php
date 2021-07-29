<?php 
include ('includes/session.php');
include('Connections/fundmaster.php');
 $client_id=$_GET['client_id']; 
?>
<title>SIPET Southern Sudan Information Management System</title>
<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>
<script type="text/javascript" src="calender/calendar.js"></script>
<script type="text/javascript" src="calender/lang/calendar-en.js"></script>
<script type="text/javascript" src="calender/calendar-setup.js"></script>
<link rel="stylesheet" href="csspr.css" type="text/css" />

<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>
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

<style type="text/css">

@import url(calender/calendar-win2k-1.css);

</style>
<script type="text/javascript"> 

function confirmDelete()
{
    return confirm("Are you sure want to delete?");
}

</script>
<table width="100%" border="0">

<tr height="40"> <td colspan="13" align="center"><img src="images/logoeaco.jpg"></td></tr>
<tr height="30"> <td colspan="13" align="center"><H2>SIPET INFORMATION MANAGEMENT SYSTEM</H2></td></tr>
<tr height="30"> <td colspan="13" align="center"><H2>Bill Sheet for Client :<?php
	$querycl="SELECT * FROM clients where client_id='$client_id'";
	$resultscl=mysql_query($querycl) or die ("Error: $querycl.".mysql_error());
	$rowscl=mysql_fetch_object($resultscl);
	
	echo $rowscl->c_name;
?></H2></td></tr>



</table>

<table width="100%" border="0" class="table">
  
	
  
  <tr  style="background:url(images/description.gif);" height="30">
    <td align="center" width="180"><strong>Staff Name</strong></td>
    <td align="center" width="180"><strong>Category</strong></td>
    <td align="center" width="80"><strong>Block</strong></td>
	<td align="center" width="100"><strong>Rate Per Hr(USD)</strong></td>
	<td align="center" width="100"><strong>Hours Per Day</strong></td>
	<td align="center" width="100"><strong>Project Period (Days)</strong></td>
	<td align="center" width="100"><strong>Days Spent</strong></td>
	<td align="center" width="100"><strong>Days Remaining</strong></td>
    <td width="100" align="center"><strong>Total Amount(USD)</strong></td>
    <td width="100" align="center"><strong>Visa Fees (USD)</strong></td>
	<td width="100" align="center"><strong>Per DM (USD)</strong></td>
	<td width="100" align="center"><strong>Flight Charges (USD)</strong></td>
	<td width="120" align="center"><strong>Grand Total(USD)</strong></td>
	
    
    </tr>
	<tr bgcolor="#00CC33" height="25"><td colspan="13"><font color="#ffffff"size="+1"><strong>Project Managers</strong></td></tr>
	
	<?php 
	 $curr_date=date('Y-m-d');
	 $grnd_ttl_pdm1=0;
	$sql_pm="SELECT bunch.project_manager_id, employees.emp_firstname, employees.emp_middle_name,employees.emp_lastname,
	employees.job_title_id,employees.job_cat_id,job_category.job_cat_name,job_titles.job_title_name,blocks.block_name,bunch.bunch_id,bunch.project_manager_id,bunch.period_from,bunch.period_to 
	FROM employees,bunch,job_titles,blocks,job_category where employees.job_cat_id=job_category.job_cat_id and bunch.block_id=blocks.block_id 
	AND employees.job_title_id=job_titles.job_title_id AND bunch.client_id='$client_id' AND employees.emp_id=bunch.project_manager_id AND bunch.period_from<=CURDATE()";
	$results_pm=mysql_query($sql_pm) or die ("Error: $sql_pm".mysql_error());
	
	if (mysql_num_rows($results_pm) > 0)
						  {
							  $RowCounter=0;
							  while ($rows_pm=mysql_fetch_object($results_pm))
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
 
 <td><?php 	
	echo $rows_pm->emp_firstname.' '.$rows_pm->emp_middle_name.' '.$rows_pm->emp_lastname;
	
	?></td> 
	<td><?php echo $job_title_name=$rows_pm->job_title_name.'('.$job_title_name=$rows_pm->job_cat_name.')';?></td> 
	<td align="center"><?php echo $block_name=$rows_pm->block_name;?></td>
	<td align="right"><?php
	$sql_rate="SELECT per_hour_charge_value from per_hour_charge order by per_hour_charge_id desc limit 1";
	$results_rate= mysql_query($sql_rate) or die ("Error $sql_rate.".mysql_error());
	$rows_rate=mysql_fetch_object($results_rate);
	
	echo number_format($per_hour_charge_value=$rows_rate->per_hour_charge_value,2);

	
	?></td> 
	<td align="center"><?php 
	
	$sql_day="SELECT man_hours_value from man_hours order by man_hours_id desc limit 1";
	$results_day= mysql_query($sql_day) or die ("Error $sql_day.".mysql_error());
	$rows_day=mysql_fetch_object($results_day);
	
	echo $man_hours_value=$rows_day->man_hours_value;
	
	
	
	?></td> 
	<td align="center"><?php 
	
 $period_frompm=$rows_pm->period_from;
 $period_topm=$rows_pm->period_to;
	
	

	
$period_from_stringpm= strtotime ($period_frompm);	
$period_to_stringpm= strtotime ($period_topm);

$period_secpm=$period_to_stringpm-$period_from_stringpm;

$period_dayspm=$period_secpm/86400;
	
	echo $period_dayspm;
	
	
	?></td>
    <td align="center"><?php
	
	/**/

$curr_datepm=date('Y-m-d');
	$curr_date_stringpm= strtotime ($curr_datepm);	
	
$seconds_spentpm=$curr_date_stringpm-$period_from_stringpm;
$days_spentpm=$seconds_spentpm/86400;

if ($seconds_spentpm<0)
{
echo 'Yet Started..';
}
elseif ($days_spentmp>$period_dayspm)
{
echo "Staff Offsite";
}

else
{
echo $days_spentpm;

}

	?>
	
	</td> 
    <td align="center"><?php 
	$curr_datepm=date('Y-m-d');
	$curr_date_stringpm= strtotime ($curr_datepm);	
	
$seconds_spentpm=$curr_date_stringpm-$period_from_stringpm;

$days_remainingpm=$period_dayspm-$days_spentpm;
if ($days_remainingpm<0)
{
echo "0";
}

elseif ($days_remainingpm>$period_dayspm)
{
echo $period_dayspm;
}
else
{
echo $days_remainingpm;
}?></td> 
	<td align="right"><?php 
	
	if ($days_spentpm<0)
	{
	
	
	echo number_format($ttl_amountpm=$per_hour_charge_value*$man_hours_value*0,2);
	
	}
	else
	{
	echo number_format($ttl_amountpm=$per_hour_charge_value*$man_hours_value*$days_spentpm,2);
	
	}
	
	
	?></td>
	<td></td> 
	<td align="right"><?php
	$job_cat_idpm=$rows_pm->job_cat_id;
	
	if ($job_cat_idpm==2)
	{	
	$sql_dmpm="SELECT per_dm_charge_value from per_dm_charges order by per_dm_charge_id desc limit 1";
	$results_dmpm= mysql_query($sql_dmpm) or die ("Error $sql_dmpm.".mysql_error());
	$rows_dmpm=mysql_fetch_object($results_dmpm);
	
	echo number_format($per_dm_charge_valuepm=$rows_dmpm->per_dm_charge_value,2);
	
	}
	else
	{
	echo "-";
	
	}



	?></td> 
	<td align="right"><?php echo number_format($flight_chargespm=300,2); ?></td>
  <td align="right"><strong><?php 
	
	if ($job_cat_idpm==2)
	{
	
	$grnd_ttlpm=$ttl_amountpm+$per_dm_charge_valuepm+$flight_chargespm;
	
	echo number_format($grnd_ttlpm,2); 
	
	}
	else
	{
	$grnd_ttlpm=$ttl_amountpm+$flight_chargespm;
	echo number_format($grnd_ttlpm,2);
	}
	
	?></strong></td>
 </tr>
 <?php
  $supper_grnd_ttl1=$supper_grnd_ttl1+$grnd_ttlpm;
  $grnd_ttl_pdm1=$grnd_ttl_pdm1+$per_dm_charge_valuepm;
 }
 ?>
 <tr bgcolor="#FFFFCC" height="30"><td><strong>Project Managers Totals</td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td align="right"><strong><?php echo number_format($grnd_ttl_pdm1,2);?></strong></td>
  <td></td>
  <td align="right"><font size="+1"><strong><?php echo number_format($supper_grnd_ttl1,2);
 ;
  ?></strong></font></td>
  </tr>
 
 <?php 
 

 
 }
 else 
  
  {
  ?>
  
  <tr><td colspan="8" align="center"><font color="#ff0000"><strong>No Results</strong></font></td></tr>
  
  <?php 
  
  
  }
	
	?>
 
 
	
	<tr bgcolor="#00CC33" height="25"><td colspan="13"><font color="#ffffff"size="+1"><strong>Genaral Staff</strong></td></tr>
  
  <?php 

 $curr_date=date('Y-m-d');

 $grnd_ttl_pdm=0;
$sql="SELECT employees.department,employees.emp_firstname,employees.emp_id,employees.emp_middle_name,employees.emp_lastname,employees.job_cat_id,job_category.job_cat_name
 ,blocks.block_name,bunch.period_from,bunch.period_to,bunch.bunch_id,bunch.project_manager_id,clients.c_name,assigned_staff.status,assigned_staff.emp_id as ass_emp_id FROM employees,job_category,assigned_staff,bunch,blocks,clients where 
 employees.job_cat_id=job_category.job_cat_id AND assigned_staff.emp_id=employees.emp_id AND assigned_staff.bunch_id=bunch.bunch_id AND 
 bunch.block_id=blocks.block_id AND clients.client_id=bunch.client_id and bunch.period_to<='$curr_date' AND bunch.period_from<bunch.period_to
AND assigned_staff.previous_bunch_id='0' and assigned_staff.bunch_id!='' AND bunch.client_id='$client_id' order by blocks.block_name,assigned_staff.assigned_staff_id asc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


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
  
    <td><?php 	
	echo $rows->emp_firstname.' '.$rows->emp_middle_name.' '.$rows->emp_lastname;
	
	?></td>
    <td ><?php 
	
	echo $dept=$rows->department.' '.$job_cat_name=$rows->job_cat_name;
	
	?></td>
	<td align="center">
	
	<?php echo $rows->block_name;

	
	?></td>
	<td align="right">
	
	<?php $sql_rate="SELECT per_hour_charge_value from per_hour_charge order by per_hour_charge_id desc limit 1";
	$results_rate= mysql_query($sql_rate) or die ("Error $sql_rate.".mysql_error());
	$rows_rate=mysql_fetch_object($results_rate);
	
	echo number_format($per_hour_charge_value=$rows_rate->per_hour_charge_value,2);

	
	?></td>
	<td align="center"><?php 
	
	$sql_day="SELECT man_hours_value from man_hours order by man_hours_id desc limit 1";
	$results_day= mysql_query($sql_day) or die ("Error $sql_day.".mysql_error());
	$rows_day=mysql_fetch_object($results_day);
	
	echo $man_hours_value=$rows_day->man_hours_value;
	
	
	
	?></td>
	<td align="center"><strong><?php 
	
 $period_from=$rows->period_from;
 $period_to=$rows->period_to;
	
	

	
$period_from_string= strtotime ($period_from);	
$period_to_string= strtotime ($period_to);

$period_sec=$period_to_string-$period_from_string;

$period_days=$period_sec/86400;
	
	echo $period_days;
	
	
	?></strong></td>
	<td align="center"><strong><font color="#009900"><?php
	
	/**/

$curr_date=date('Y-m-d');
	$curr_date_string= strtotime ($curr_date);	
	
$seconds_spent=$curr_date_string-$period_from_string;
$days_spent=$seconds_spent/86400;

if ($seconds_spent<0)
{
echo 'Yet Started..';
}
elseif ($days_spent>$period_days)
{
echo "Staff Offsite";
}

else
{
echo $days_spent;

}

	?></font></strong></td>
	
	<td align="center"><strong><font color="#ff0000">
	<?php 
	$curr_date=date('Y-m-d');
	$curr_date_string= strtotime ($curr_date);	
	
$seconds_spent=$curr_date_string-$period_from_string;

$days_remaining=$period_days-$days_spent;
if ($days_remaining<0)
{
echo "0";
}

elseif ($days_remaining>$period_days)
{
echo $period_days;
}
else
{
echo $days_remaining;
}?>
	
	</font></strong></td>
	
	<td align="right"><?php 
	
	if ($days_spent<0)
	{
	
	
	echo number_format($ttl_amount=$per_hour_charge_value*$man_hours_value*0,2);
	
	}
	else
	{
	echo number_format($ttl_amount=$per_hour_charge_value*$man_hours_value*$days_spent,2);
	
	}
	
	
	?></td>
	<td align="center"><?php 
	

	
	
	?></td>
	<td align="right"><?php
	$job_cat_id=$rows->job_cat_id;

	
	if ($job_cat_id==2)
	{	
	
	$sql_dm="SELECT per_dm_charge_value as pdmv from per_dm_charges order by per_dm_charge_id desc limit 1";
	$results_dm= mysql_query($sql_dm) or die ("Error $sql_dm.".mysql_error());
	$rows_dm=mysql_fetch_object($results_dm);
	
	echo number_format($per_dm_charge_value=$rows_dm->pdmv,2);
	}
	else
	{
	echo "-";
	
	}



	?></td>
	<td align="right" ><?php echo number_format($flight_charges=300,2); ?></td>
	<td align="right"><strong><?php 
	
	if ($job_cat_id==2)
	{
	
	$grnd_ttl=$ttl_amount+$per_dm_charge_value+$flight_charges;
	
	echo number_format($grnd_ttl,2); 
	
	}
	else
	{
	$grnd_ttl=$ttl_amount+$flight_charges;
	echo number_format($grnd_ttl,2);
	}
	
	?></strong></td>
    </tr>
  <?php 
  $supper_grnd_ttl=$supper_grnd_ttl+$grnd_ttl;
  $grnd_ttl_pdm=$grnd_ttl_pdm+$per_dm_charge_value;

  }
  
  ?>
  <tr bgcolor="#FFFFCC" height="30"><td><strong>General Staff Totals</td>  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td align="right"><strong><font "size="+1"><?php echo number_format($supper_grnd_ttl,2); ?></font></strong></td>
  
  </tr>
  <tr bgcolor="#FFFFCC" height="30"><td><font color="#ff0000" size="+1"><strong>Grand Totals</strong></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td align="right"><strong><?php echo number_format($grnd_ttl_pdm,2);?></strong></td>
  <td></td>
  <td align="right"><font size="+1" color="#ff0000"><strong><?php echo number_format($supper_grnd_ttl1+$supper_grnd_ttl,2);
 ;
  ?></strong></font></td>
  </tr>
  
  <?php 
  
  
  
  }
  
  else 
  
  {
  ?>
  
  <tr><td colspan="8" align="center"><font color="#ff0000"><strong>No Results</strong></font></td></tr>
  
  <?php 
  
  
  }
  
  
  ?>
  
 
</table>







