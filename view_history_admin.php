<?php 
include('includes/session.php'); 
include('Connections/fundmaster.php'); 
$set_template_id=$_GET['set_template_id'];


?>
<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<script src="lib/jquery.js" type="text/javascript"></script>
<script src="src/facebox.js" type="text/javascript"></script>
  <script type="text/javascript">
	jQuery(document).ready(function($) {
	  $('a[rel*=facebox]').facebox({
		loadingImage : 'src/loading.gif',
		closeImage   : 'src/closelabel.png'
	  })
	})
  </script>
  <script type="text/javascript"> 

function confirmDelete()
{
    return confirm("Are you sure you want to delete?");
}

</script>
<form name="start_invoice" action="process_edit_sales_code.php?sales_code_id=<?php echo $sales_code_id;?>&view=<?php echo $view ?>" method="post">	
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
<td><strong>Edit</strong></td>
<td><strong>Delete</strong></td>
</tr>
<?php
$sqlsact="SELECT * FROM nrc_location,nrc_biweekly,users where nrc_biweekly.record_location_id=nrc_location.location_id and users.user_id=nrc_biweekly.user_id
and nrc_biweekly.set_template_id='$set_template_id'";
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
<td align="center"><?php echo $rowsact->bi_male; ?></strong></td>
<td align="center"><?php echo $rowsact->bi_female; ?></strong></td>
<td align="center"><?php echo $rowsact->bi_achieved; ?></strong></td>
<td align="center"><?php echo $rowsact->narrative; ?></strong></td>
<td align="center"><a rel="facebox" href="edit_history_admin.php?bi_weekly_id=<?php echo $rowsact->bi_weekly_id?>"> <img src="images/edit.png"></a></td>
<td align="center"><a href="delete_history_admin.php?bi_weekly_id=<?php echo $rowsact->bi_weekly_id?>" onClick="return confirmDelete();"> <img src="images/delete.png"></td>



</tr>
<?php 
}

}


?>


</table>		

</form>