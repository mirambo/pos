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
   

    <td width="23%" colspan="8" align="center">  <strong>Filter By Item Category<font color="#FF0000">* </font></strong>
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
    <td align="center" width="150"><strong>Category Name</strong></td>
    <td align="center" width="150"><strong>Quantity Received</strong></td>
    <td align="center" width="150"><strong>Date Received</strong></td>
   
    <td align="center" width="150"><strong>Comments</strong></td>
	 <td align="center" width="150"><strong>Recorded By</strong></td>
    <td align="center" width="100"><strong>Edit</strong></td>
	<td align="center" width="150"><strong>Delete</strong></td>

    
    </tr>
  
  <?php 
  
    if ($user_group_id==15)
{
 if (!isset($_POST['generate']))
{  

$sql="SELECT * from received_stock,items,items_category WHERE received_stock.item_id=items.item_id 
AND items_category.cat_id=items.cat_id order by items.item_name asc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
else
{
$country_id=$_POST['country_id'];
$area_name=$_POST['area_name'];

if ($country_id!=0 && $area_name=='')
{
$sql="SELECT * from received_stock,items,items_category WHERE received_stock.item_id=items.item_id 
AND items_category.cat_id=items.cat_id AND items_category.cat_id='$country_id' order by items.item_name asc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
elseif ($country_id==0 && $area_name!='')
{
$sql="SELECT * from received_stock,items,items_category WHERE received_stock.item_id=items.item_id 
AND items_category.cat_id=items.cat_id AND items.item_name LIKE '%$area_name%' order by items.item_name asc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
elseif ($country_id!=0 && $area_name!='')
{
$sql="SELECT * from received_stock,items,items_category WHERE received_stock.item_id=items.item_id 
AND items_category.cat_id=items.cat_id AND items_category.cat_id='$country_id' AND items.item_name LIKE '%$area_name%' order by items.item_name asc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}

else
{
$sql="SELECT * from received_stock,items,items_category WHERE received_stock.item_id=items.item_id 
AND items_category.cat_id=items.cat_id order by items.item_name asc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}


}
}
else
{
if (!isset($_POST['generate']))
{  

$sql="SELECT * from received_stock,items,items_category WHERE received_stock.item_id=items.item_id 
AND items_category.cat_id=items.cat_id AND user_id='$user_id' order by items.item_name asc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
else
{
$country_id=$_POST['country_id'];
$area_name=$_POST['area_name'];

if ($country_id!=0 && $area_name=='')
{
$sql="SELECT * from received_stock,items,items_category WHERE received_stock.item_id=items.item_id 
AND items_category.cat_id=items.cat_id AND items_category.cat_id='$country_id' AND user_id='$user_id'  order by items.item_name asc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
elseif ($country_id==0 && $area_name!='')
{
$sql="SELECT * from received_stock,items,items_category WHERE received_stock.item_id=items.item_id 
AND items_category.cat_id=items.cat_id AND user_id='$user_id' AND items.item_name LIKE '%$area_name%' order by items.item_name asc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
elseif ($country_id!=0 && $area_name!='')
{
$sql="SELECT * from received_stock,items,items_category WHERE received_stock.item_id=items.item_id 
AND items_category.cat_id=items.cat_id AND user_id='$user_id' AND items_category.cat_id='$country_id' AND items.item_name LIKE '%$area_name%' order by items.item_name asc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}

else
{
$sql="SELECT * from received_stock,items,items_category WHERE received_stock.item_id=items.item_id 
AND items_category.cat_id=items.cat_id AND user_id='$user_id' order by items.item_name asc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}


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
    <td><?php echo $rows->cat_name;?></td>
    <td align="right"><?php echo number_format($rows->quant_rec,0);?></td>
    <td align="center"><?php echo $rows->date_received;?></td>
    <td><?php echo $rows->comments;?></td>
<td><i><font size="-2">
	<?php $staff=$rows->user_id;
$sqlst="SELECT * FROM  users where user_id='$staff'";
$resultst= mysql_query($sqlst) or die ("Error $sqlst.".mysql_error());	
$rowst=mysql_fetch_object($resultst);	
echo $rowst->f_name;
	?>
	
	</font></i></td>
	<td align="center">
	  	<?php if ($sess_allow_edit==1) 
	{
	?>	
	<a href="home.php?edit_submission_period=edit_submission_period&received_stock_id=<?php echo $rows->received_stock_id; ?>"><?php
	echo $redit;

	?></a>
	
	<?php
		}
	else
	{ 
	echo $med;
	
	}?></td>
    <td align="center">
	<?php if ($sess_allow_delete==1) 
	{
	?>
	<a href="home.php?viewsubprojectarea=viewsubprojectarea&subDELETEArea&received_stock_id=<?php echo $rows->received_stock_id; ?>"  onClick="return confirmDelete();"><?php
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
