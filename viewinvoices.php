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
  <tr bgcolor="#FFFFCC">
   
    <td colspan="13" height="30" align="center"><strong>List of Invoices Generated
	</strong>
	</td>
	
	<!--<tr bgcolor="#FFFFCC"><td colspan="13" align="right"><a href="printsubspeciality.php" target="_blank"><img src="images/print_icon.gif" title="Print"></a> &nbsp; <a href="printsubspecialitycsv.php"><img src="images/excel.png" title="Export to Excell"></a> &nbsp; <a href="printsubspecialityword.php"><img src="images/word.png" title="Export to Word"></a></td></tr>-->
	
    </tr>
	
  
  <tr  style="background:url(images/description.gif);" height="30">
    <td align="center" width="150"><strong>Invoice No</strong></td>
	<td align="center" width="100"><strong>Month Generated</strong></td>
    <td align="center" width="200"><strong>Client</strong></td>
    <td align="center" width="80"><strong>Contract No.</strong></td>
	<td align="center" width="100"><strong>Days Spent</strong></td>
	<td width="100" align="center"><strong>Man Hours Amount</strong></td>
    <td width="100" align="center"><strong>Visa Charges (USD)</strong></td>
	<td width="100" align="center"><strong>Per DEM (USD)</strong></td>
	<td width="100" align="center"><strong>Flight Charges (USD)</strong></td>
	<td width="120" align="center"><strong>Grand Total(USD)</strong></td>
	<td width="7%" align="center" colspan="2"><strong>Print</strong></td>
	
	
    
    
<!--<tr bgcolor="#00CC33" height="25"><td colspan="13"><font color="#ffffff"size="+1"><strong>Genaral Staff</strong></td></tr>-->
<?php 
$sql="SELECT * FROM invoices order by date_generated desc";
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
	echo $invoice_no=$rows->invoice_no;
	
	?></td>
  <td><?php echo $month_generated=$rows->month_generated; ?></td>
  <td><?php $client_id=$rows->client_id;
  $querysup="select * from clients where client_id ='$client_id'";
$resultssup=mysql_query($querysup) or die ("Error: $querysup.".mysql_error());
$rowssupp=mysql_fetch_object($resultssup);
  echo $rowssupp->c_name;
  
  ?></td>
  <td><?php echo $contract_no=$rows->contract_no;?></td>
  <td align="center"><?php 
  echo $days_spent =$rows->days_spent;
  
   
  ?></td>
  <td align="right"><strong><?php echo number_format($rate_amount=$rows->manhours_amount,2);?></strong></td>
  <td align="right"><?php echo number_format($visa_charge=$rows->visa_charges,2);?></td>
  <td align="right"><?php echo number_format($per_dem=$rows->per_dem,2);?></td>

  <td align="right"><?php echo number_format($flight_charges=$rows->flight_charges,2); ?></td>
  <td align="right"><strong>
  <?php 
 echo number_format($perstaff_ttl=$rate_amount+$visa_charge+$per_dem+$flight_charges,2);
  
  
  ?>
  
  </strong>
  </td>
  
  <td align="center"><a href="saved_invoice.php?contract_no=<?php echo $contract_no;?>&client_id=<?php echo $client_id;?>
  &invoice_no=<?php echo $invoice_no;?>&invoice_amount=<?php echo $perstaff_ttl;?>&ttl_days=<?php echo $days_spent;?>
  &manhours_charges=<?php echo $rate_amount;?>&visa_charges=<?php echo $visa_charge;?>&per_dm=<?php echo $per_dem; ?>
  &flight_charges=<?php echo $flight_charges;?>&date_generated=<?php echo $date_generated=$rows->date_generated;?>
  &month_generated=<?php echo $month_generated;?>&get_user_id=<?php echo $rows->user_id; ?>" target="_blank"><img src="images/print_icon.gif"></a></td>
  
  <td align="center"><a href="saved_invoice_word.php?contract_no=<?php echo $contract_no;?>&client_id=<?php echo $client_id;?>
  &invoice_no=<?php echo $invoice_no;?>&invoice_amount=<?php echo $perstaff_ttl;?>&ttl_days=<?php echo $days_spent;?>
  &manhours_charges=<?php echo $rate_amount;?>&visa_charges=<?php echo $visa_charge;?>&per_dm=<?php echo $per_dem; ?>
  &flight_charges=<?php echo $flight_charges;?>&date_generated=<?php echo $date_generated=$rows->date_generated;?>
  &month_generated=<?php echo $month_generated;?>&get_user_id=<?php echo $rows->user_id;?>"><img src="images/word.png"></a></td>
  
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
  <td align="right"><font size="+1" color="#ff0000"><strong><?php echo number_format($grnd_perstaff_ttl,2);
 ;
  ?></strong></font></td>
  <td></td>
  
  </tr>
  
 
  
 
</table>



