<?php include('Connections/fundmaster.php'); ?>

<html xmlns="http://www.w3.org/1999/xhtml">

<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>

<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>


<script type="text/javascript"> 

function confirmDelete()
{
    return confirm("Are you sure want to delete?");
}

</script>

<body>

	<div id="page-wrap">

		<?php include ('header.php') ?>
		
		<div id="zone-bar" class="br-5">
          <?php include ('topmenu.php') ?>
		</div>
		
		
		
		<?php require_once('includes/module_submenu.php');  ?>
		
		<h3>:: List of All User Group into the System</h3>
         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
			<div id="cont-left-full" class="br-5">
 <form name="search" method="post" action="">  			
		<table width="100%" border="0">
  <tr bgcolor="#FFFFCC">
   
    <td colspan="9" height="30" align="center"> 
	<?php

if ($_GET['updateuserconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:550px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Updated Successfully!!</font></strong></p></div>';
?> 

<?php 

if ($_GET['deleteconfirm']==1)
echo "<p align='center'><strong><font color='#FF0000'>Record Deleted!!</font></strong></p>";
?>
	
	</td>
	
    </tr>
	<tr bgcolor="#FFFFCC">
   
    <td  height="30"  colspan="10" align="center">
	<strong>Search Sub Module - Enter Sub Module Name: 
    </strong>
    
    
    <input type="text" name="sub_module" size="40" />
	
	<input type="submit" name="generate" value="Search"></td>
	
    </tr>
  
  <tr  style="background:url(images/description.gif);" height="30" >
    <td align="center" width="150"><strong>Module Name</strong></td>
    <td align="center" width="150"><strong>Sub Module Name</strong></td>
    <td align="center" width="150"><strong>Navigation / Link</strong></td>
    <td align="center" width="150"><strong>Description</strong></td>
	<td align="center" width="100"><strong>Sort Order</strong></td>
	<td align="center" width="50"><strong>Edit</strong></td>
	<!--<td align="center" width="50"><strong>Delete</strong></td>-->

    
    </tr>
  
  <?php 
  
  if (!isset($_POST['generate']))
{  
 
$sql="SELECT modules.module_name,sub_module.module_id,sub_module.sub_module_id,sub_module.sub_module_name, sub_module.sort_order,
sub_module.sublink,sub_module.sublink,sub_module.description FROM modules,sub_module where modules.module_id=sub_module.module_id  order by sub_module.sort_order asc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}
else
{
$sub_module=$_POST['sub_module'];
if ($sub_module!='')
{
$sql="SELECT modules.module_name,sub_module.module_id,sub_module.sub_module_id,sub_module.sub_module_name, sub_module.sort_order,
sub_module.sublink,sub_module.sublink,sub_module.description FROM modules,sub_module where modules.module_id=sub_module.module_id  AND sub_module.sub_module_name LIKE '%$sub_module%'order by sub_module.sort_order asc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}

else
{

$sql="SELECT modules.module_name,sub_module.module_id,sub_module.sub_module_id,sub_module.sub_module_name, sub_module.sort_order,
sub_module.sublink,sub_module.sublink,sub_module.description FROM modules,sub_module where modules.module_id=sub_module.module_id  order by sub_module.sort_order asc";
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
  
    <td ><?php echo $rows->module_name;?></td>
    <td ><?php echo $rows->sub_module_name;?></td>
    <td ><?php echo $rows->sublink;?></td>
    <td ><?php echo $rows->description;?></td>
    <td align="center"><?php echo $rows->sort_order;?></td>
	<td align="center"><a href="edit_sub_module.php?sub_module_id=<?php echo $rows->sub_module_id; ?>"><img src="images/edit.png"></a></td>
    <!--<td align="center"><a href="delete_group.php?man_hours_id=<?php echo $rows->man_hours_id; ?>"  onClick="return confirmDelete();"><img src="images/delete.png"></a></td>-->
	
   
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
			


		
			

			
			
			
					
			  </div>
				
				
			
			
			</div>
			
			
				
				
				
				
					<div class="clear"></div>
				</div>
				<div class="clear"></div>
			</div>
			<div id="footer">
			<?php include ('footer.php'); ?>
		</div>
		</div>
		
		
		
	</div>
	
</body>

</html>