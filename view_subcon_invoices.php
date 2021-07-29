<?php $client_id=$_GET['client_id']; 
$year=date('m-Y');

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
  <tr bgcolor="#FFFFCC" height="40">
   
    <td colspan="13" height="30" align="center"><font size="+1"><strong>List of All Subcontractor's Invoices Recorded
	</strong></font>
	</td>
	
	<!--<tr bgcolor="#FFFFCC"><td colspan="13" align="right"><a href="printsubspeciality.php" target="_blank"><img src="images/print_icon.gif" title="Print"></a> &nbsp; <a href="printsubspecialitycsv.php"><img src="images/excel.png" title="Export to Excell"></a> &nbsp; <a href="printsubspecialityword.php"><img src="images/word.png" title="Export to Word"></a></td></tr>-->
	
    </tr>
	
  
  <tr  style="background:url(images/description.gif);" height="30">
    <td align="center" width="150"><strong>Invoice No</strong></td>
	<td align="center" width="100"><strong>Month Generated</strong></td>
    <td align="center" width="200"><strong>Project</strong></td>
    <td align="center" width="80"><strong>Term of Payment.</strong></td>
	<td align="center" width="100"><strong>Days Spent</strong></td>
	<td width="100" align="center"><strong>Man Hours Amount</strong></td>
    <td width="100" align="center"><strong>Visa Chrgs (USD)</strong></td>
	<td width="100" align="center"><strong>Per DEM (USD)</strong></td>
	<td width="100" align="center"><strong>Flight Chrgs (USD)</strong></td>
	<td width="100" align="center"><strong>Other Chrgs (USD)</strong></td>
	<td width="120" align="center"><strong>Invoiced Amnt(USD)</strong></td>
	<td width="50" align="center"><strong>Edit</strong></td>
	<td width="50" align="center"><strong>Delete</strong></td>
	
    
    
<!--<tr bgcolor="#00CC33" height="25"><td colspan="13"><font color="#ffffff"size="+1"><strong>Genaral Staff</strong></td></tr>-->
<?php 
$sql="SELECT * FROM subcon_invoices order by date_generated desc";
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
	echo $rows->invoice_no;
	
	?></td>
  <td><?php echo $rows->month_generated; ?></td>
  <td><?php $project_id=$rows->project_id;
  $querysup="SELECT operations.operation_id, operations.operation_name,clients.c_name,projects.period_from,projects.period_to,projects.contract_no,projects.project_id
  FROM operations,clients,projects where projects.operation_id=operations.operation_id AND projects.client_id=clients.client_id AND projects.project_id='$project_id'";
$resultssup=mysql_query($querysup) or die ("Error: $querysup.".mysql_error());
$rowssupp=mysql_fetch_object($resultssup);

  
  echo $rowssupp->c_name.' - '. $rowssupp->operation_name;
  
  ?></td>
  <td><?php echo $tom=$rows->tom;?></td>
  <td align="center"><?php 
  echo $days_spent =$rows->days_spent;
  
   
  ?></td>
  <td align="right"><strong><?php echo number_format($rate_amount=$rows->manhours_amount,2);?></strong></td>
  <td align="right"><?php echo number_format($visa_charge=250,2);?></td>
  <td align="right"><?php echo number_format($per_dem=$rows->per_dem,2);?></td>

  <td align="right"><?php echo number_format($flight_charges=$rows->flight_charges,2); ?></td>
  <td align="right"><?php echo number_format($other_charges=$rows->other_charges,2); ?></td>
  <td align="right"><strong>
  <?php 
 echo number_format($perstaff_ttl=$rows->invoice_ttl,2);
  
  
  ?>
  
  </strong>
  </td>
  
  <td align="center"><a href="home.php?edituniversity=edituniversity&block_id=<?php echo $rows->block_id; ?>"><img src="images/edit.png"></a></td>
   <td align="center"><a href="deleteuniversity.php?block_id=<?php echo $rows->block_id; ?>"  onClick="return confirmDelete();"><img src="images/delete.png"></a></td>
  
 
  
  
  
  </tr>
  
  <?php
  
  $grnd_days_spent=$grnd_days_spent+$days_spent;
  $grnd_rate_amount=$grnd_rate_amount+$rate_amount;
  $grnd_visa_charge=$grnd_visa_charge+$visa_charge;
  $grnd_per_dem=$grnd_per_dem+$per_dem;
  $grnd_flight_charges=$grnd_flight_charges+$flight_charges;
  $grnd_perstaff_ttl=$grnd_perstaff_ttl+$perstaff_ttl;
  $contract_no=$rows->contract_no;
  
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
 <td></td>
  <td align="right"><font size="+1" color="#ff0000"><strong><?php echo number_format($grnd_perstaff_ttl,2);
 ;
  ?></strong></font></td>
 <td></td>
 <td></td>
  
  </tr>
  
 
  
 
</table>



