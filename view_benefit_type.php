<?php 
 include ('top_grid_includes.php'); 
?>	

<script type="text/javascript"> 

function confirmDelete()
{
    return confirm("Are you sure you want to delete item?");
}

</script>
	
	<table width="99%" border="0" align="center" bgcolor="#9AD7AF" class="display nowrap" style="border-radius:5px;" id="example">	

    <thead>

  
  <tr  style="background:url(images/description.gif);" height="30" >
    <td><div align="center"><strong>No</strong></td>
    <td><div align="center"><strong>Allowance Name</strong></td>
	 <td><div align="center"><strong>Allowance Amount</strong></td>
	 <td><div align="center"><strong>Sort Order</strong></td>
   <td width="100" ><div align="center"><strong>Edit</strong></td>
    <!--<td width="100"><div align="center"><strong>Delete</strong></td>-->
    </tr>
	
	</thead>
  
  <?php 
  
$sql="select * from benefit_logs order by benefit_log_name asc";
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
echo '<tr bgcolor="#FFFFCC" height="25">';
}
 
 
 ?>
  
    <td><?php echo $count=$count+1;?></td>
    <td><?php echo $rows->benefit_log_name;?></td>
	<td align="center"><?php echo number_format($rows->default_benefit_amount,2);?></td>
	<td align="center"><?php echo $rows->sort_order;?></td>
  
    <td align="center"><a href="home.php?add_allowance=add_allowance&sub_module_id=<?php echo $sub_module_id; ?>&id=<?php echo $rows->benefit_log_id; ?>"><img src="images/edit.png"></a></td>
    <!--<td align="center"><a href="delete_benefit_type.php?benefit_type_id=<?php echo $rows->benefit_log_id; ?>" onClick="return confirmDelete();"><img src="images/delete.png"></a></td>-->
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
		
			

			
			
			
					
		