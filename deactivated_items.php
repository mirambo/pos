<?php

if ($sess_allow_view==0)
{
include ('includes/restricted.php');
}
else
{
 ?><?php
 $client_id=$_POST['client_id'];
$item_name=$_POST['item_name'];
$item_code=$_POST['item_code'];
 
 
 
if(isset($_GET['subDELETEDitem']))
  { 
$item_id=$_GET['item_id'];
delete_item($item_id,$user_id);
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
    return confirm("Are you sure you want to activate this item?");
}

</script>

<?php include ('row_color.php'); ?>
 <form name="search" method="post" action="">  
<table width="100%" border="0" id="example">
  <tr bgcolor="#FFFFCC">
   
    <td  height="30"  colspan="11" align="center" valign="top">
	<strong>Search Item
    </strong>
    
								  
							  
    
    
	

	
	
	<input type="text" name="item_name" size="30" />
	
	
	
	
	
	<input type="submit" name="generate" value="Search">
	<!--
<a target="_blank" style="float:right; margin-right:200px; font-weight:bold; font-size:13px; color:#000000" href="print_list_items.php">Print</a>						  

-->
	</td>
	
    </tr>


  <tr  style="background:url(images/description.gif);" height="30" >
  
    <td align="center" width="150"><strong>Item Code</strong></td>  
    <td align="center" width="150"><strong>Item Name</strong></td>  
    <td align="center" width="150"><strong>Item Category</strong></td>	
    <td align="center" width="150"><strong>Item Sub Category</strong></td>	
    <td align="center" width="150"><strong>Reorder Level</strong></td>
    <td align="center" width="150"><strong>Item Value (Buying Price)</strong></td>
    <td align="center" width="150"><strong>Item Selling Price</strong></td>
    <td align="center" width="150"><strong>Opening Bal</strong></td>
    <td align="center" width="150"><strong>Descrition</strong></td>
   <!--<td align="center" width="150"><strong>Item Descrition</strong></td>-->
    <td align="center" width="100"><strong>Edit</strong></td>
	<td align="center" width="150"><strong>Activate</strong></td>

    
    </tr>
  
  <?php 
 if (!isset($_POST['generate']))
{ 
$sql="SELECT * FROM suspended_items,items_category WHERE suspended_items.cat_id=items_category.cat_id  order by item_name asc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
else
{

$item_name=$_POST['item_name'];


if ( $item_name!='')
{
$sql="SELECT * FROM suspended_items where item_name LIKE '%$item_name%' order by item_name asc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}

else
{
$sql="SELECT * FROM suspended_items order by item_name asc";
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
echo '<tr bgcolor="#C0D7E5" height="25" onmouseover="ChangeColor(this, true);" 
              onmouseout="ChangeColor(this, false);">';
}
else 
{
echo '<tr bgcolor="#FFFFCC" height="25" onmouseover="ChangeColor(this, true);" 
              onmouseout="ChangeColor(this, false);">';
}
 
 
 ?>
  
   <td><?php echo $rows->item_code;?></td>
   <td><a href="view_stock_card.php?item_id=<?php echo $item_id=$rows->item_id;?>"><?php echo $rows->item_name;?></a></td>
   <td><?php echo $rows->cat_name;?></td>
   <td><?php $sub_cat_id=$rows->sub_cat_id;
 $query_valc = mysql_query("SELECT sub_cat_name FROM items_sub_category WHERE sub_cat_id ='$sub_cat_id'");
$row_valc = mysql_fetch_array($query_valc);
   echo $row_valc['sub_cat_name']; 
   ?></td>

    <td><?php echo $rows->reorder_level;?></td>
    <td align="right"><?php echo number_format($rows->curr_bp,2);?></td>
    <td align="right"><?php echo number_format($rows->curr_sp,2);?></td>
	    <td align="right">
		
<?php echo number_format($rows->opening_balance,0);?>		
		
		</td>
    


    <td><?php echo $rows->description;?></td>
    
	<td align="center">
	
	<?php if ($sess_allow_edit==1) 
	{
	?>
	
	<a  href="home.php?setuptemplate=setuptemplate&item_id=<?php echo $rows->item_id; ?>"><?php
	echo $redit;

	?></a>
	
	<?php
		}
	else
	{ 
	echo $med;
	
	}?>
	
	</td>
    <td align="center">
	<?php if ($sess_allow_delete==1) 
	{
	
	?>
	<a href="activate_item.php?item_id=<?php echo $rows->item_id; ?>"  onClick="return confirmDelete();"><?php
	echo $rdelete;

	?></a>
	<?php
		}
	else
	{ 
	echo $me;
	
	}
	
	?>
	
	</td>
	
   
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

   </div> 
</table>
</form>

 <?php }?>
