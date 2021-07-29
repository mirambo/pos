<?php

if ($sess_allow_view==0)
{
include ('includes/restricted.php');
}
else
{
 ?><?php
if(isset($_GET['subDELETEsettlement']))
  { 
$settlement_id=$_GET['settlement_id'];
 delete_settlement($settlement_id);
  }
  
 
?>

<script type="text/javascript"> 

function confirmDelete()
{
    return confirm("Are you sure you want to delete?");
}

</script>


<form name="search" method="post" action=""> 
<table width="100%" border="0">
  <tr bgcolor="#FFFFCC">
   
    <td colspan="11" height="30" align="center"> 
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
	<tr height="30" bgcolor="#FFFFCC">
   

    <td width="23%" colspan="11" align="center">   <strong>Filter By Category<font color="#FF0000">* </font></strong>
	<select name="cat_id" style="width:200px;"><option value="0">Select-------------------------------</option>
								  <?php
								  
								  $query1="select * from items_category order by cat_name asc";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->cat_id; ?>"><?php echo $rows1->cat_name; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
								  
								  
								  
								  
								  
								  ?>
								  
								  </select>
								  
								  
								  <strong>Or By Sub Category Name<font color="#FF0000">* </font>
								  
				 <input type="text" name="settlement_name" size="40" />				  
								  
<input type="submit" name="generate" value="Generate">								  
								  
								  </td>
    
  </tr>
  
  <tr  style="background:url(images/description.gif);" height="30" >
     <td width="30%"><div align="center"><strong>Item Sub Category</strong></td>
    <td width="30%"><div align="center"><strong>Item Category</strong></td>

    <td width="100" ><div align="center"><strong>Edit</strong></td>
    <td width="100"><div align="center"><strong>Delete</strong></td>
    </tr>
  
  <?php 
  
  if (!isset($_POST['generate']))
{
 
$querydc="select * from items_sub_category,items_category WHERE items_category.cat_id=items_sub_category.cat_id order by sub_cat_name asc";
$resultsdc= mysql_query($querydc) or die ("Error $querydc.".mysql_error());
}
else
{

$cat_id=$_POST['cat_id'];
$item_name=$_POST['settlement_name'];


$querydc= "select * from items_sub_category,items_category";
    $conditions = array();
    if($cat_id!=0) 
	
	{
	
    $conditions[] = "items_sub_category.cat_id='$cat_id'";
	
    }
	
	    if($item_name!='') 
	
	{
	
    $conditions[] = "items_sub_category.sub_cat_name LIKE '%$item_name%'";
	
    }
	

    if (count($conditions) > 0) {
      $querydc .= " WHERE " . implode(' AND ', $conditions)." AND items_category.cat_id=items_sub_category.cat_id order by sub_cat_name asc";
    }
	else
	{	
	
$querydc="select * from items_sub_category,items_category WHERE items_category.cat_id=items_sub_category.cat_id order by sub_cat_name asc";
$resultsdc= mysql_query($querydc) or die ("Error $querydc.".mysql_error());

	}

    $resultsdc = mysql_query($querydc) or die ("Error $querydc.".mysql_error());


}
  
  
  
  
  
  



if (mysql_num_rows($resultsdc) > 0)
						  {
							  $RowCounter=0;
							  while ($rows=mysql_fetch_object($resultsdc))
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
      <td colspan="1">
		
	<?php echo $rows->sub_cat_name ;?>
	
	
	</td>
    <td valign="top"><?php echo $rows->cat_name;?></td>
    <td valign="top" align="center"><a href="home.php?viewhrforms=viewhrforms&sub_cat_id=<?php echo $rows->sub_cat_id; ?>"><img src="images/edit.png"></a></td>
    <td valign="top" align="center"><a onclick="return confirmDelete();" href="delete_sub_cat.php?sub_cat_id=<?php echo $rows->sub_cat_id; ?>"><img src="images/delete.png"></a></td>

    
    </tr>
  <?php 
  
  }
  
  }
  
  else
  {
	  ?>
  <tr bgcolor="#FFFFCC">
   
    <td colspan="5" height="30" align="center"> 
	<font color="#ff0000"><strong>No Results found!!</strong></font>
	
	</td>
	
    </tr>
<?php

}
  
  
  ?> 
  
  
  
  
  
  
</table>
</form>
 <?php }?>