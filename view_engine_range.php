<?php
if ($sess_allow_view==0)
{
include ('includes/restricted.php');
}
else
{
 ?><?php
if(isset($_GET['subDELETESubProject']))
  { 
$engine_range_id=$_GET['engine_range_id'];
delete_engine_range($engine_range_id);
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

if ($_GET['deleteconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:550px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Record Deleted Successfully!!</font></strong></p></div>';
?>
	
	</td>
	
    </tr>
  <!--<tr bgcolor="#FFFFCC">
   
    <td  height="30"  colspan="12" align="center">
	<strong>Search By Category Name: <input type="text" name="project_name" size="40" /> 
	
	
	<input type="submit" name="generate" value="Search"></td>
	
    </tr>-->
  <tr  style="background:url(images/description.gif);" height="30" >
 
    <td align="center" width="150"><strong>Minimum Capacity (cc)</strong></td>
    <td align="center" width="200"><strong>Maximum Capacity (cc)</strong></td>
    <td align="center" width="100"><strong>Edit</strong></td>
	<td align="center" width="150"><strong>Delete</strong></td>

    
    </tr>
  
  <?php 

 
$sql="SELECT * FROM engine_range order by engine_range_id asc";
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
  

    <td align="center"><?php echo $rows->min_capacity;?></td>
    <td align="center"><?php echo $rows->max_capacity;?></td>
    <td align="center">
<?php if ($sess_allow_edit==1) 
	{
	?>	
	<a href="home.php?editworkpermitrenewals=editworkpermitrenewals&engine_range_id=<?php echo $engine_range_id=$rows->engine_range_id; ?>"><?php
	echo $redit;

	?></a>
	
	<?php
		}
	else
	{ 
	echo $med;
	
	}?>


   <td align="center">
	<?php if ($sess_allow_delete==1) 
	{
	
 $cat_id=$rows->cat_id;

$querysup="select * from items where cat_id ='$cat_id'";
$resultssup=mysql_query($querysup) or die ("Error: $querysup.".mysql_error());
$rowssupp=mysql_num_rows($resultssup);

if ($rowssupp>0)
	{
	
	}
	else
	{
	
	?>
	
	<a href="home.php?viewworkpermitrenewals=viewworkpermitrenewals&subDELETESubProject&engine_range_id=<?php echo $rows->engine_range_id; ?>"  onClick="return confirmDelete();"><?php
	echo $rdelete;

	
	?></a>
	<?php
	}
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
  <?php 
}
?>

