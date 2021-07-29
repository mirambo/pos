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
   
    <td colspan="12" height="30" align="center"> 
	<?php

if ($_GET['updateuserconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:550px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >User Updated Successfully!!</font></strong></p></div>';
?> 

<?php 

if ($_GET['delconfirm']==1)
echo "<p align='center'><strong><font color='#FF0000'>Record Deleted!!</font></strong></p>";
?>
	
	</td>
	
    </tr>
	
	<tr bgcolor="#FFFFCC"><td colspan="12" align="right"><a href="printcpd.php" target="_blank"><img src="images/print_icon.gif" title="Print"></a> &nbsp; <a href="printcpdcsv.php"><img src="images/excel.png" title="Export to Excell"></a> &nbsp; <a href="printcpdword.php"><img src="images/word.png" title="Export to Word"></a></td></tr>
  
  <tr  style="background:url(images/description.gif);" height="30" >
    <td align="center" width="150"><strong>Per Hour Charges</strong></td>
    <td align="center" width="100"><strong>Currency</strong></td>
    <td align="center" width="100"><strong>Exchange Rate</strong></td>
	<td width="50" align="center"><strong>Edit</strong></td>
	<td width="50" align="center"><strong>Delete</strong></td>
    
    </tr>
  
  <?php 
 
$sql="SELECT per_hour_charge.per_hour_charge_value,per_hour_charge.per_hour_charge_id,per_hour_charge.curr_rate,currency.curr_name,currency.curr_initials FROM per_hour_charge,currency
 where per_hour_charge.curr_id=currency.curr_id";
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
  
    <td align="center"><?php echo $rows->per_hour_charge_value;?></td>
    <td align="center"><?php echo $rows->curr_initials;?></td>
	<td align="center"><?php echo $rows->curr_rate;?></td>
	<td align="center"><a href="home.php?editcpd=editcpd&per_hour_charge_id=<?php echo $rows->per_hour_charge_id; ?>"><img src="images/edit.png"></a></td>
	<td align="center"><a href="delete_cpd.php?per_hour_charge_id=<?php echo $rows->per_hour_charge_id; ?>" onClick="return confirmDelete();"><img src="images/delete.png"></td>

   
    </tr>
  <?php 
  
  $ttl_part=$ttl_part+$rows->total_part;
  $ttl_male_part=$ttl_male_part+$rows->male_part;
  $ttl_female_part=$ttl_female_part+$rows->female_part;
  }
  ?>
  
   
  
  <?php
  
  }
  
  else 
  
  {
  ?>
  
  <tr><td colspan="5" align="center"><font color="#ff0000"><strong>No Results</strong></font></td></tr>
  
  <?php 
  
  
  }
  
  
  ?>
</table>



