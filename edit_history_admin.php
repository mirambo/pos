<?php 
include('includes/session.php'); 
include('Connections/fundmaster.php'); 
$bi_weekly_id=$_GET['bi_weekly_id'];

?>

<form name="start_invoice" action="process_edit_history.php?bi_weekly_id=<?php echo $bi_weekly_id;?>" method="post">	
<table width="100%" border="0">

<tr align="center">
<td><strong>Date Recorded</strong></td>
<td><strong>Entry Clerk</strong></td>
<td><strong>Period</strong></td>
<td><strong>Location</strong></td>
<td><strong>Male</strong></td>
<td><strong>Female</strong></strong></td>
<td><strong>Out Put Achieved</strong></strong></td>
<td><strong>Narration</strong></td>
<!--<td><strong>Edit</strong></td>
<td><strong>Delete</strong></td>-->
</tr>
<?php
$sqlsact="SELECT * FROM nrc_location,nrc_biweekly,users where nrc_biweekly.record_location_id=nrc_location.location_id and users.user_id=nrc_biweekly.user_id
and nrc_biweekly.bi_weekly_id='$bi_weekly_id'";
$resultsact=mysql_query($sqlsact) or die ("Error $sqlsact.".mysql_error());

if (mysql_num_rows($resultsact) > 0)
{
$RowCounter=0;
while ($rowsact=mysql_fetch_object($resultsact))
							  {
							  $RowCounter++;
							  if($RowCounter % 2==0)
							  {
echo '<tr bgcolor="#C0D7E5" height="25"  onmouseover="ChangeColor(this, true);" 
              onmouseout="ChangeColor(this, false);">';
}
else 
{
echo '<tr bgcolor="#FFFFCC" height="25"  onmouseover="ChangeColor(this, true);" 
              onmouseout="ChangeColor(this, false);" 
              >';
}
	?>
<td align="center"><?php echo $rowsact->trans_date; ?></td>
<td ><?php echo $rowsact->f_name; ?></td>
<td ><?php echo $rowsact->period_id; ?></td>
<td ><?php echo $rowsact->location_name; ?></td>
<td align="center"><input type="text" name="bi_male" value="<?php echo $rowsact->bi_male; ?>"></strong></td>
<td align="center"><input type="text" name="bi_female" value="<?php echo $rowsact->bi_female; ?>"></strong></td>
<td align="center"><input type="text" name="bi_achived" value="<?php echo $rowsact->bi_achieved; ?>"></td>
<td align="center"><textarea name="narration" cols="20" rows="2"><?php echo $rowsact->narrative; ?></textarea></td>


</tr>
<?php 
}
?>
<tr height="40"><td colspan="8" align="center">
<input type="submit" name="submit" value="Update">
<input type="hidden" name="edit_history" id="edit_history" value="1">


&nbsp;&nbsp;</td></tr>
<?php
}


?>


</table>		

</form>