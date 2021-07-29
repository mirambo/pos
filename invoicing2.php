<?php $client_id=$_GET['client_id']; 
$year=date('m-Y');
$exp_month=date('Y-m');

$current_month=date('F-Y');

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
    return confirm("Are you sure want to delete?");
}

</script>

<table width="100%" border="0">
  <tr bgcolor="#FFFFCC">
   
    <td colspan="13" height="30" align="center"><strong>Generate Invoice for Client :
	<font color="#ff0000"><?php
	$querycl="SELECT * FROM clients where client_id='$client_id'";
	$resultscl=mysql_query($querycl) or die ("Error: $querycl.".mysql_error());
	$rowscl=mysql_fetch_object($resultscl);
	
	echo $rowscl->c_name;
?></font>
	For The Month : <font color="#ff0000"><?php echo $current_month; ?></font></strong>
	</td>
	
	<tr bgcolor="#FFFFCC"><td colspan="13" align="right"><!--<a href="printsubspeciality.php" target="_blank"><img src="images/print_icon.gif" title="Print"></a> &nbsp; <a href="printsubspecialitycsv.php"><img src="images/excel.png" title="Export to Excell"></a> &nbsp; <a href="printsubspecialityword.php"><img src="images/word.png" title="Export to Word"></a>--></td></tr>
	
    </tr>
	
  
  <tr  style="background:url(images/description.gif);" height="30">
    <td align="center" width="180"><strong>Staff Name</strong></td>
    <td align="center" width="180"><strong>Title</strong></td>
    <td align="center" width="80"><strong>Staff Type</strong></td>
	<td align="center" width="100"><strong>Rate Per Day(USD)</strong></td>
	<!--<td align="center" width="100"><strong>Hours Per Day</strong></td>-->
	<!--<td align="center" width="100"><strong>Project Period (Days)</strong></td>-->
	<td align="center" width="100"><strong>Days Spent</strong></td>
	<!--<td align="center" width="100"><strong>Days Remaining</strong></td>-->
    <td width="100" align="center"><strong>Total Amount(USD)</strong></td>
    <td width="100" align="center"><strong>Visa Fees (USD)</strong></td>
	<td width="100" align="center"><strong>Per DEM (USD)</strong></td>
	<td width="100" align="center"><strong>Flight Charges (USD)</strong></td>
	<td width="120" align="center"><strong>Grand Total(USD)</strong></td>
	
    
    
<!--<tr bgcolor="#00CC33" height="25"><td colspan="13"><font color="#ffffff"size="+1"><strong>Genaral Staff</strong></td></tr>-->
<?php 
$sql="SELECT projects.project_id,projects.contract_no,assigned_staffold.project_manager,operations.operation_name,clients.c_name,employees.emp_id,employees.staff_type,employees.emp_fname,employees.emp_mname,
employees.emp_lname,omjob_titles.omjob_title_name,omjob_titles.omjob_title_id,job_category.job_cat_name,job_category.job_cat_id,assigned_staffold.assigned_staff_id,assigned_staffold.entry_date,assigned_staffold.exit_date,assigned_staffold.work_place,assigned_staffold.status,assigned_staffold.segment,assigned_staffold.staff FROM operations, projects,
assigned_staffold,employees,clients,omjob_titles,job_category WHERE job_category.job_cat_id=employees.staff_type AND omjob_titles.omjob_title_id=employees.title AND projects.client_id=clients.client_id AND assigned_staffold.project_id=projects.project_id AND  operations.operation_id=projects.operation_id AND assigned_staffold.project_id=projects.project_id 
and assigned_staffold.status!='3' and clients.client_id='$client_id' and employees.emp_id=assigned_staffold.staff order by clients.c_name asc";
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
	echo $rows->emp_fname.' '.$rows->emp_mname.' '.$rows->emp_lname;
	
	?></td>
  <td><?php echo $rows->omjob_title_name; ?></td>
  <td><?php echo $rows->job_cat_name;?></td>
  <td align="right"><?php $job_cat_id=$rows->job_cat_id;
            $omjob_title_id=$rows->omjob_title_id;
			
	$queryst="select * FROM omper_day_rates WHERE omjob_title_id='$omjob_title_id' AND job_cat_id='$job_cat_id'";
	$resultsst=mysql_query($queryst) or die ("Error: $queryst.".mysql_error());
	$rowssst=mysql_fetch_object($resultsst);
	echo number_format($per_day_rate=$rowssst->amount,2);
	

?></td>
  <td align="center">
<?php 

$emp_id=$rows->emp_id;
$sqlts="SELECT * from staff_timesheet where staff='$emp_id' AND timesheet_mark='X' AND timesheet_date LIKE '%$exp_month%'";
$resultsts= mysql_query($sqlts) or die ("Error $sqlts.".mysql_error());
echo $days_spent=mysql_num_rows($resultsts);
/*$period_from=$rows->entry_date;
$period_to=$rows->exit_date;
  
$period_from_string= strtotime($period_from);	
$period_to_string= strtotime($period_to);

$period_sec=$period_to_string-$period_from_string;

$period_days=$period_sec/86400;


$curr_date=date('Y-m-d');
$curr_date_string= strtotime ($curr_date);	
	
$seconds_spent=$curr_date_string-$period_from_string;
echo $days_spent=$seconds_spent/86400; */

  ?></td>
  <td align="right"><strong><?php echo number_format($rate_amount=$per_day_rate*$days_spent,2);?></strong></td>
  <td align="right">
  <?php 
  //echo number_format($visa_charge=250,2);
  $emp_id=$rows->emp_id;
  $sqlvisa="SELECT * from renewed_visas where emp_id='$emp_id' AND date_recorded LIKE '%$exp_month%'";
  $resultsvisa= mysql_query($sqlvisa) or die ("Error $sqlvisa.".mysql_error());
  $rowsvisa=mysql_fetch_object($resultsvisa);
  $currency=$rowsvisa->currency;
  $curr_rate=$rowsvisa->curr_rate;
  $visa_emp_id=$rowsvisa->emp_id;
 
if ($visa_emp_id==$emp_id)
 {
  if ($currency==2)
  {
  echo number_format($visa_charge=$rowsvisa->charges,2);
  }
  if ($currency==4)
  {
  $visa_new_exp=$rowsvisa->charges;
  
  echo number_format($visa_charge=$visa_new_exp/$curr_rate,2);
  
  }
 }
else
{

echo number_format($visa_charge=0,2);

} 
  //echo $visa_new_exp_usd;
  
  
  
  
  ?>
  </td>
  <td align="right"><?php $work_place=$rows->work_place;
echo $days_spent;
    $sql_dmpm="SELECT per_dm_charge_value from per_dm_charges";
	$results_dmpm= mysql_query($sql_dmpm) or die ("Error $sql_dmpm.".mysql_error());
	$rows_dmpm=mysql_fetch_object($results_dmpm);
	
	
	



  ?></td>

  <td align="right">
    <?php 
  //echo number_format($flight_charges=300,2); 
 
  //echo number_format($visa_charge=250,2);
  $emp_id=$rows->emp_id;
  $sqlnattick="SELECT * from natairtickets where emp_id='$emp_id' AND date_recorded LIKE '%$exp_month%'";
  $resultsnattick= mysql_query($sqlnattick) or die ("Error $sqlnattick.".mysql_error());
  $rowsnattick=mysql_fetch_object($resultsnattick);
  echo $currencynat=$rowsnattick->currency;
  $curr_ratenat=$rowsnattick->curr_rate;
  $nat_emp_id=$rowsnattick->emp_id;
 
if ($nat_emp_id==$emp_id)
 {
  
  echo number_format($flight_charges=$rowsnattick->flight_cost,2);
  
 }
else
{

echo number_format($flight_charges=0,2);

} 
  //echo $visa_new_exp_usd;
  
  
  
  
  ?> 
  </td>
  <td align="right"><strong>
  <?php 
 echo number_format($perstaff_ttl=$rate_amount+$visa_charge+$per_dem+$flight_charges,2);
  
  
  ?>
  
  </strong>
  </td></tr>
  
  <?php
  
  $grnd_days_spent=$grnd_days_spent+$days_spent;
  $grnd_rate_amount=$grnd_rate_amount+$rate_amount;
  $grnd_visa_charge=$grnd_visa_charge+$visa_charge;
  $grnd_per_dem=$grnd_per_dem+$per_dem;
  $grnd_flight_charges=$grnd_flight_charges+$flight_charges;
  $grnd_perstaff_ttl=$grnd_perstaff_ttl+$perstaff_ttl;
  $contract_no=$rows->contract_no;
  $project_id=$rows->project_id;
  
}


}
else
{ 
?>
<tr bgcolor="#FFFFCC" height="30"><td colspan="12" align="center"><strong><font color="#ff0000">No results found!!</font></td></tr>
<?php
}

?>
 
  <tr bgcolor="#FFFFCC" height="30"><td><font color="#ff0000" size="+1"><strong>Grand Totals</strong></td>
  
  <td></td>
  <td></td>

  <td></td>
  <td align="center"><strong><?php echo $grnd_days_spent;?></strong></td>
  <td align="right"><strong><?php echo number_format($grnd_rate_amount,2);?></strong></td>
  <td align="right"><strong><?php echo number_format($grnd_visa_charge,2);?><strong></td>
  <td align="right"><strong><?php echo number_format($grnd_per_dem,2);?></strong></td>
<td align="right"><strong><?php echo number_format($grnd_flight_charges,2);?></strong></td>
  <td align="right"><font size="+1" color="#ff0000"><strong><?php echo number_format($grnd_perstaff_ttl,2);
 ;
  ?></strong></font></td>
  </tr>
  <tr bgcolor="#FFFFCC">
  <td colspan="6" align="center"><p><!--Print Bill Sheet</p><a href="pre_billsheet.php?client_id=<?php echo $client_id;?>&bunch_id=<?php echo $bunch_id; ?>&billsheet_amount=<?php echo $ttl_supper_ttl;?>" target="_blank"><img src="images/print_icon.gif" title="Print"></a> &nbsp; <a href="printsubspecialitycsv.php"><img src="images/excel.png" title="Export to Excell"></a> &nbsp; <a href="printsubspecialityword.php"><img src="images/word.png" title="Export to Word"></a>--></td>
  <td colspan="7" align="center"><p>Print Invoice</p><a href="pre_invoice.php?client_id=<?php echo $client_id;?>&invoice_amount=
  <?php echo $grnd_perstaff_ttl;?>&ttl_days=<?php echo $grnd_days_spent; ?>&manhours_charges=<?php echo $grnd_rate_amount; ?>&visa_charges=<?php echo $grnd_visa_charge;?>&per_dm=<?php echo $grnd_per_dem;?>&flight_charges=<?php echo $grnd_flight_charges;?>&contract_no=<?php echo $contract_no;?>
  &project_id=<?php echo $project_id; ?>
  
  
  " target="_blank">
  <img src="images/print_icon.gif" title="Print"></a> &nbsp; 
  
  <!--<a href="pre_invoicecsv.php?client_id=<?php echo $client_id;?>&invoice_amount=
  <?php echo $grnd_perstaff_ttl;?>&ttl_days=<?php echo $grnd_days_spent; ?>&manhours_charges=<?php echo $grnd_rate_amount; ?>&visa_charges=<?php echo $grnd_visa_charge;?>&per_dm=<?php echo $grnd_per_dem;?>&flight_charges=<?php echo $grnd_flight_charges;?>&contract_no=<?php echo $contract_no;?>
  
  
  "><img src="images/excel.png" title="Export to Excell"></a> -->&nbsp; 
  <a href="pre_invoiceword.php?client_id=<?php echo $client_id;?>&invoice_amount=<?php echo $grnd_perstaff_ttl;?>
  &ttl_days=<?php echo $grnd_days_spent; ?>&manhours_charges=<?php echo $grnd_rate_amount; ?>
  &visa_charges=<?php echo $grnd_visa_charge;?>&per_dm=<?php echo $grnd_per_dem;?>&flight_charges=<?php echo $grnd_flight_charges;?>
  &contract_no=<?php echo $contract_no;?>&project_id=<?php echo $project_id;?>"><img src="images/word.png" title="Export to Word"></a></td>
  </tr>
 
  
 
</table>



