<?php
if(isset($_GET['subDELETELocation']))
  { 
$location_id=$_GET['location_id'];
delete_location($location_id);
  }
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

<table width="100%" border="0">
  <tr bgcolor="#FFFFCC">
   
    <td colspan="2" height="30" align="center"> 
	<?php

if ($_GET['updateuserconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:550px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >User Updated Successfully!!</font></strong></p></div>';
?> 

<?php 

if ($_GET['delete']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:550px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Record Deleted Successfully!!</font></strong></p></div>';
?>
	
	</td>
	
    </tr>
  
  


 <?php 
  
$sqlsec="SELECT * FROM nrc_area order by area_name asc";
$resultssec= mysql_query($sqlsec) or die ("Error $sqlsec.".mysql_error());
  
 if (mysql_num_rows($resultssec) > 0)
						  {
						
							  while ($rowssec=mysql_fetch_object($resultssec))
							  { ?>	
	
	
	<tr><td>
<table width="100%" border="0">
  <tr   height="30" > 

  <td colspan="4"><h4>Area Name : <?php echo $rowssec->area_name; ?> </h4></td>

  
  
  </tr>	
  
  <tr bgcolor="#ccc" height="30" >
  
    <td align="center" width="150"><strong>Location Name</strong></td>
    <td align="center" width="150"><strong>Location Code</strong></td>
    <td align="center" width="100"><strong>Edit</strong></td>
	<td align="center" width="150"><strong>Delete</strong></td>    
    </tr>
  
  
  
  <?php 
  
$id=$rowssec->area_id;
 
$sql="SELECT nrc_location.location_name,nrc_location.location_id,nrc_location.location_code,nrc_area.area_name 
FROM nrc_area,nrc_location WHERE nrc_location.location_id=nrc_area.area_id and nrc_location.area_id='$id'";
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
  
   
    <td><?php echo $rows->location_name;?></td>
    <td><?php echo $rows->location_code;?></td>
	<td align="center"><a href="home.php?editlocation=editlocation&location_id=<?php echo $rows->location_id;?>"><img src="images/edit.png"></a></td>
    <td align="center">
	<?php if ($sess_allow_delete==1) 
	{
	?>
	<a href="home.php?viewlocation=viewlocation&subDELETELocation&location_id=<?php echo $rows->location_id; ?>"  onClick="return confirmDelete();"><?php
	echo $rdelete;

	?></a>
	<?php
		}
	else
	{ 
	echo $me;
	
	}?></td>
	
   
    </tr>

  <?php 
  
  }
  
  }
  
  else 
  
  {
  ?>
  
  <tr><td colspan="5" align="center"><font color="#ff0000"><strong>No Location In this Area!!</strong></font></td></tr>
  
  <?php 
  
  
  }
  
  
  ?>
  
  </table>
   </td></tr>	 
  
  <?php 
  }}
  
  ?>
  
  
  
  
  
</table>



