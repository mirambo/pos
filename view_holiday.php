<?php 
/* $qr_confirm23v="SELECT * from user_group_submodule WHERE sub_module_id='$sub_module_id' and `view`='V' and user_group_id='$user_group_id'";
$qr_res23v=mysql_query($qr_confirm23v) or die ('Error : $qr_confirm23v.' .mysql_error());
$num_rows23v=mysql_num_rows($qr_res23v); */ 
if ($num_rows23v==6788880) 
{ 
include ('includes/restricted.php');
 }
else
{
	
	include ('top_grid_includes.php');

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
    return confirm("Are you sure you want to delete?");
}

</script>

<table width="98%" border="0" align="center" bgcolor="#9AD7AF" class="display nowrap" style="border-radius:5px;" id="example">	

    <thead>

  
  <tr  style="background:url(images/description.gif);" height="30" >
    <td align="center" width="150"><strong>No</strong></td>
    <td align="center" width="150"><strong>Holiday Name</strong></td>
    <td align="center" width="150"><strong>Holiday Date</strong></td>
    <td align="center" width="150"><strong>Holiday Nature</strong></td>
    <td align="center" width="150"><strong>Description</strong></td>
    <td align="center" width="100"><strong>Edit</strong></td>
	<td align="center" width="100"><strong>Delete</strong></td>

    
    </tr>
	</thead>

  
   <tbody>
  
  <?php 
 
//$sql="SELECT * FROM asset,asset_categories where asset.asset_category_id=asset_categories.exp_cat_id  order by expense_category_name asc";
$sql="SELECT * FROM hs_hr_holidays order by holiday_id asc";
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
  
    <td align="center"><?php echo $count=$count+1;?></td>
    <td ><?php echo $rows->holiday_name;?></td>
    <td ><?php echo $rows->holiday_date;?></td>
    <td ><?php echo $rows->holiday_nature;?></td>
    <td ><?php echo $rows->comments;?></td>
    <td align="center"><a href="home.php?edit_holiday=edit_holiday&id=<?php echo $rows->holiday_id; ?>&sub_module_id=<?php echo $sub_module_id; ?>"><img src="images/edit.png"></a></td>
    <td align="center"><a href="delete_holiday.php?id=<?php echo $rows->holiday_id; ?>&sub_module_id=<?php echo $sub_module_id; ?>"  onClick="return confirmDelete();"><img src="images/delete.png"></a></td>
	
   
    </tr>
  <?php 
  
  }
  
  }
  
  else 
  
  {
  ?>
  
  <tr><td colspan="8" align="center"><font color="#ff0000"><strong>No Results</strong></font></td></tr>
  
  <?php 
  
  
  }
  
  
  ?>
</table>

<?php 
}

?>

