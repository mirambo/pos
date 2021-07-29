<?php
if ($sess_allow_view==0)
{
include ('includes/restricted.php');
}
else
{
 ?>

<?php
$received_stock_id=$_GET['received_stock_id'];
if (isset($_GET['subDELETEArea']))
{
delete_area_sub_project($received_stock_id);
}



 ?><?php //echo $sub_project_id=$_GET['sub_project_id'];?>

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
   

    <td width="23%" colspan="9" align="center">  <strong>Filter By Item Category<font color="#FF0000">* </font></strong>
	<select name="country_id"><option value="0">Select..........................................................</option>
								  <?php
								  
								  $query1="select * from items_category order by cat_name asc";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->cat_id;?>"><?php echo $rows1->cat_name; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
									  
									  
								  
								  
								  
								  
								  
								  ?></select>
								  
								  
								  <strong>Or By Item Name<font color="#FF0000">* </font>
								  
				 <input type="text" name="area_name" size="40" />				  
								  
<input type="submit" name="generate" value="Generate">								  
								  
								  </td>
    
  </tr>
  
  <tr  style="background:url(images/description.gif);" height="30" >
    <td align="center" width="150"><strong>Item Name</strong></td>
    <td align="center" width="150"><strong>Item Code</strong></td>
    <td align="center" width="150"><strong>Quantity Received</strong></td>
    <td align="center" width="150"><strong>Quantity Sold</strong></td>
    <td align="center" width="150"><strong>Quantity Availlable</strong></td>
    <td align="center" width="150"><strong>Item Value (Kshs)</strong></td>
    <td align="center" width="150"><strong>Total Value (Kshs) </strong></td>
    <td align="center" width="100"><strong>Reorder Level</strong></td>
	<td align="center" width="150"><strong>Reorder Alert</strong></td>

    
    </tr>
  
  <?php 
 if (!isset($_POST['generate']))
{  

$sql="SELECT SUM(received_stock.quant_rec) as sum_stock,items.item_id,items.item_name,items.item_code,items.reorder_level,items.curr_bp
 from received_stock,items,items_category WHERE items_category.cat_id=items.cat_id AND received_stock.item_id=items.item_id group by received_stock.item_id order by items.item_name asc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
else
{
$country_id=$_POST['country_id'];
$area_name=$_POST['area_name'];

if ($country_id!=0 && $area_name=='')
{
$sql="SELECT SUM(received_stock.quant_rec) as sum_stock,items.item_id,items.item_name,items.item_code,items.reorder_level,items.curr_bp
 from received_stock,items,items_category WHERE items_category.cat_id=items.cat_id AND received_stock.item_id=items.item_id 
  AND items_category.cat_id='$country_id' group by received_stock.item_id order by items.item_name asc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
elseif ($country_id==0 && $area_name!='')
{
$sql="SELECT SUM(received_stock.quant_rec) as sum_stock,items.item_id,items.item_name,items.item_code,items.reorder_level,items.curr_bp
 from received_stock,items,items_category WHERE items_category.cat_id=items.cat_id AND received_stock.item_id=items.item_id AND items.item_name
 LIKE '%$area_name%' order by items.item_name asc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
elseif ($country_id!=0 && $area_name!='')
{
$sql="SELECT SUM(received_stock.quant_rec) as sum_stock,items.item_id,items.item_name,items.item_code,items.reorder_level,items.curr_bp
 from received_stock,items,items_category WHERE items_category.cat_id=items.cat_id AND received_stock.item_id=items.item_id AND items.item_name
 LIKE '%$area_name%' AND items_category.cat_id='$country_id' order by items.item_name asc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}

else
{
$sql="SELECT SUM(received_stock.quant_rec) as sum_stock,items.item_id,items.item_name,items.item_code,items.reorder_level,items.curr_bp
 from received_stock,items,items_category WHERE items_category.cat_id=items.cat_id AND received_stock.item_id=items.item_id group by received_stock.item_id order by items.item_name asc";
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
  
    <td><?php echo $rows->item_name;?></td>
    <td><?php echo $rows->item_code;?></td>
    <td align="right"><?php echo number_format($rec_stock=$rows->sum_stock,0);?></td>
    <td align="right">	
	<?php //echo $quant_sold=0;
	$item_id=$rows->item_id;
	
$sqlit="SELECT SUM(quantity)as ttl_sold from estimates WHERE item_id='$item_id' AND inventory_status='1'";
$resultsit= mysql_query($sqlit) or die ("Error $sqlit.".mysql_error());
$rowsit=mysql_fetch_object($resultsit);
echo $quant_sold=$rowsit->ttl_sold;
	
	?>
	
	</td>
    <td align="right"><strong><font color='#ff0000'><?php echo number_format($quant_avail=$rec_stock-$quant_sold,0);?></font></strong></td>
    <td align="right"><?php echo number_format($curr_bp=$rows->curr_bp,2);?></td>
    <td align="right" ><strong><?php echo number_format($ttl_value=$quant_avail*$curr_bp,2);?></strong></td>
	<td align="center"><?php echo number_format($reorder_level=$rows->reorder_level,0);?></td>
    <td align="center">
	<?php 
	
	if ($quant_avail<$reorder_level)
	{
	echo "<strong><font color='#ff0000'>Reorder Now...</font></strong>";
	
	}
	else
	{
	
	}
	
	?></td>
	
   
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
