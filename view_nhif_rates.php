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

<table width="100%" border="0">
  <tr bgcolor="#FFFFCC">
   
    <td colspan="9" height="30" align="center"> 
	<?php

if ($_GET['updateuserconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:550px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >User Updated Successfully!!</font></strong></p></div>';
?> 

<?php 

if ($_GET['deleteuniversityconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:550px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Record Deleted Successfully!!</font></strong></p></div>';
?>
	
	</td>
	
    </tr>
  
  <tr  style="background:url(images/description.gif);" height="30" >
    <td width="200"><div align="center"><strong>Employer SIC Rate (%)</strong></td>
    <td width="100" ><div align="center"><strong>Employee SIC Rate (%)</strong></td>
    <td width="100" ><div align="center"><strong>Edit</strong></td>
    <!--<td width="100"><div align="center"><strong>Delete</strong></td>-->
    </tr>
  
  <?php 
 
$sql="SELECT * FROM sic_rate order by sic_rate_id desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
$rows=mysql_fetch_object($results);

/*if (mysql_num_rows($results) > 0)
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
 */
 
 ?>
  
   <tr bgcolor="#FFFFCC" height="25" >
    <td align="center"><?php echo $rows->sic_employer;?></td>
    <td align="center"><?php echo $rows->sic_employee ;?></td>
    <td align="center"><a href="home.php?editsic=editsic&sic_rate_id=<?php echo $rows->sic_rate_id; ?>"><img src="images/edit.png"></a></td>
    <!--<td align="center"><a href="delete_nhif.php?sic_rate_id=<?php echo $rows->sic_rate_id; ?>" onClick="return confirmDelete();"><img src="images/delete.png"></a></td>-->
    </tr>
<tr  style="background:url(images/description.gif);" height="30" >
    <td align="center" colspan="4"><strong><font color="#ff0000">View History</font></td>
 
    </tr>
	<?php 
 
$sqlh="SELECT * FROM sic_rate order by sic_rate_id desc";
$resultsh= mysql_query($sqlh) or die ("Error $sqlh.".mysql_error());
$rowsh=mysql_fetch_object($resultsh);

if (mysql_num_rows($resultsh) > 0)
						  {
							  $RowCounter=0;
							  while ($rowsh=mysql_fetch_object($results))
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
 
  <td align="center"><?php echo $rowsh->sic_employer;?></td>
    <td align="center"><?php echo $rowsh->sic_employee ;?></td>
    <td align="center"><a href="home.php?editsic=editsic&sic_rate_id=<?php echo $rowsh->sic_rate_id; ?>"><!--<img src="images/edit.png">--></a></td>
    <!--<td align="center"><a href="delete_nhif.php?sic_rate_id=<?php echo $rowsh->sic_rate_id; ?>" onClick="return confirmDelete();"><img src="images/delete.png"></a></td>-->
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



