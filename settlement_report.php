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
$service_item_id=$_GET['service_item_id'];
delete_labour_task($service_item_id,$user_id);
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
    return confirm("So Are you sure you want to delete this region?");
}

</script>

<?php    include ('top_grid_includes.php'); ?>
 <form name="search" method="post" action=""> 
	<table width="99%" border="0" align="center" bgcolor="#9AD7AF" class="display nowrap" style="border-radius:5px;" id="example">	

    <thead>

  


  <tr  style="background:url(images/description.gif);" height="30" >
   <td align="center" width="50"><strong>No</strong></td>
   <td align="center" width="150"><strong>Department Code</strong></td>
   <td align="center" width="150"><strong>Department Name</strong></td>
    <td align="center" width="200"><strong>Description</strong></td>  
    <td align="center" width="100"><strong>Edit</strong></td>
	<td align="center" width="150"><strong>Delete</strong></td>

    
    </tr>
		</thead>
  
  <?php 
  if (!isset($_POST['generate']))
{ 
 
$sql="SELECT * FROM customer_region order by region_name asc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
else
{
$project_name=$_POST['project_name'];

if ($project_name!='')
{
$sql="SELECT * FROM customer_region where region_name LIKE '%$project_name%' order by region_name asc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}

else
{
$sql="SELECT * FROM customer_region order by region_name asc";
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
  

    <td><?php echo $count=$count+1;?></td>
    <td><?php echo $rows->region_code;?></td>
    <td><?php echo $rows->region_name;?></td>
   
    <td><?php echo $rows->region_desc;?></td>
    <td align="center">
<?php if ($sess_allow_edit==1) 
	{
	?>	
	<a href="home.php?edit_task=edit_task&service_item_id=<?php echo $service_item_id=$rows->region_id; ?>"><?php
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
	
	?>
	
	<a href="delete_regions.php?service_item_id=<?php echo $rows->region_id; ?>"  onClick="return confirmDelete();"><?php
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
  <?php 
}
?>

