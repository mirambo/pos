<?php 
 include ('top_grid_includes.php'); 
?>	
<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>

<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>

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

if ($_GET['deleteconfirm']==1)
echo "<p align='center'><strong><font color='#FF0000'>Record Deleted!!</font></strong></p>";
?>
	
	</td>
	
    </tr>
		<table width="99%" border="0" align="center" bgcolor="#9AD7AF" class="display nowrap" style="border-radius:5px;" id="example">	

    <thead>
  
  <tr  style="background:url(images/description.gif);" height="30" >
    <td><div align="center"><strong> Deduction Name</strong></td>
    <td><div align="center"><strong> Default Deduction Amount</strong></td>
    <td><div align="center"><strong> Sort Order</strong></td>
   <td width="100" ><div align="center"><strong>Edit</strong></td>
    <!--<td width="100"><div align="center"><strong>Delete</strong></td>-->
    </tr>
	
	</thead>
  
  <?php 
  
$sql="select * from deduction_logs order by deduction_log_name asc";
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
  
    <td><?php echo $rows->deduction_log_name;?></td>
    <td align="center"><?php echo number_format($rows->default_deduction_amount,2);?></td>
    <td align="center"><?php echo $rows->sort_order;?></td>
    <td align="center"><a href="home.php?add_deductions=add_deductions&id=<?php echo $rows->deduction_log_id; ?>"><img src="images/edit.png"></a></td>
    <!--<td align="center"><a href="delete_deduction_type.php?deduction_type_id=<?php echo $rows->deduction_log_id; ?>" onClick="return confirmDelete();"><img src="images/delete.png"></a></td>-->
    </tr>
  <?php 
  
  }
  
  
  }
  
  else
  {
  
  ?>
  
  
  <tr bgcolor="#FFFFCC">
   
    <td colspan="9" height="30" align="center"> 
	<font color="#ff0000">No Results found!!</font>
	
	</td>
	
    </tr>
	
	<?
  
  }
  ?>
</table>
		
			

			
			
			
					
			 