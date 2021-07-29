<?php
if(isset($_GET['subDELETEArea']))
  { 
$area_id=$_GET['area_id'];
delete_area($area_id);
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
<form name="search" method="post" action=""> 
<table width="100%" border="0">
  <tr bgcolor="#FFFFCC">
   
    <td colspan="9" height="30" align="center"> 
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
	<tr height="30" bgcolor="#FFFFCC">
   

    <td width="23%" colspan="6" align="center">   <strong>Filter By Country<font color="#FF0000">* </font></strong>
	<select name="country_id"><option value="0">Select..........................................................</option>
								  <?php
								  
								  $query1="select * from nrc_country order by country_name asc";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->country_id;?>"><?php echo $rows1->country_name; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
									  
									  
								  
								  
								  
								  
								  
								  ?></select>
								  
								  
								  <strong>Or By Area Name<font color="#FF0000">* </font>
								  
				 <input type="text" name="area_name" size="40" />				  
								  
<input type="submit" name="generate" value="Generate">								  
								  
								  </td>
    
  </tr>
  
  <tr  style="background:url(images/description.gif);" height="30" >
    <td align="center" width="150"><strong>Country Name</strong></td>
    <td align="center" width="150"><strong>Area Name</strong></td>
    <td align="center" width="150"><strong>Area Code</strong></td>
    <td align="center" width="100"><strong>Edit</strong></td>
	<td align="center" width="150"><strong>Delete</strong></td>

    
    </tr>
  
  <?php 
 if (!isset($_POST['generate']))
{  
  
 
$sql="SELECT nrc_area.area_name,nrc_area.area_id,nrc_area.area_code,nrc_country.country_name FROM nrc_country,nrc_area WHERE nrc_area.country_id=nrc_country.country_id";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
else
{
$country_id=$_POST['country_id'];
$area_name=$_POST['area_name'];

if ($country_id!=0 && $area_name=='')
{
$sql="SELECT nrc_area.area_name,nrc_area.area_id,nrc_area.area_code,nrc_country.country_name FROM 
nrc_country,nrc_area WHERE nrc_area.country_id=nrc_country.country_id AND nrc_area.country_id='$country_id' order by nrc_area.area_name asc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
elseif ($country_id==0 && $area_name!='')
{
$sql="SELECT nrc_area.area_name,nrc_area.area_id,nrc_area.area_code,nrc_country.country_name FROM 
nrc_country,nrc_area WHERE nrc_area.country_id=nrc_country.country_id AND nrc_area.area_name LIKE '%$area_name%' order by nrc_area.area_name asc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
elseif ($country_id!=0 && $area_name!='')
{
$sql="SELECT nrc_area.area_name,nrc_area.area_id,nrc_area.area_code,nrc_country.country_name FROM 
nrc_country,nrc_area WHERE nrc_area.country_id=nrc_country.country_id AND nrc_area.country_id='$country_id' AND nrc_area.area_name LIKE '%$area_name%' order by nrc_area.area_name asc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}

else
{
$sql="SELECT nrc_area.area_name,nrc_area.area_id,nrc_area.area_code,nrc_country.country_name FROM nrc_country,nrc_area WHERE nrc_area.country_id=nrc_country.country_id";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}


}

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
  
    <td><?php echo $rows->country_name;?></td>
    <td><?php echo $rows->area_name;?></td>
    <td><?php echo $rows->area_code;?></td>
	<td align="center"><a href="home.php?editarea=editarea&area_id=<?php echo $rows->area_id; ?>"><img src="images/edit.png"></a></td>
    <td align="center">
	<?php if ($sess_allow_delete==1) 
	{
	?>
	<a href="home.php?viewsponsor=viewsponsor&subDELETEArea&area_id=<?php echo $rows->area_id; ?>"  onClick="return confirmDelete();"><?php
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
  
  <tr><td colspan="8" align="center"><font color="#ff0000"><strong>No Results</strong></font></td></tr>
  
  <?php 
  
  
  }
  
  
  ?>
</table>

</form>

