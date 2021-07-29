<?php include('Connections/fundmaster.php'); ?>

<html xmlns="http://www.w3.org/1999/xhtml">

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


<?php include ('row_color.php'); ?>



<body>

	<div id="page-wrap">

		<?php include ('header.php') ?>
		
		<div id="zone-bar" class="br-5">
          <?php include ('topmenu.php') ?>
		</div>
		
		
		
		<?php require_once('includes/station_submenu.php');  ?>
		
		<h3>:: List of All Working Staions</h3>
         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
			<div id="cont-left-full" class="br-5">
			
			
			
			
			
			
<table width="100%" border="0" id="example">
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
  
  <tr  style="background:url(images/description.gif);" height="30" >
    <td><div align="center"><strong>Account Name</strong></td>
    <td><div align="center"><strong>Sort Order</strong></td>
    <td><div align="center"><strong>Account Description</strong></td>
    <td><div align="center"><strong>Account Category</strong></td>
    <td><div align="center"><strong>Account Type</strong></td>
    <td><div align="center"><strong>Balance</strong></td>
   <td width="100" ><div align="center"><strong>Edit</strong></td>
    <td width="100"><div align="center"><strong>Delete</strong></td>
    </tr>
  
  <?php 
  
$sql="select * from account order by account_name asc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


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
 
 
 $account_id=$rows->account_id; 
 
 ?>
  
    <td><?php echo $rows->account_name;?></td>
    <td><?php echo $rows->sort_order;?></td>
    <td><?php echo $rows->description;?></td>
   
  
	 <td><?php $id=$rows->account_cat_id;
	
$sql2="select * from account_category where account_cat_id='$id'";
$results2= mysql_query($sql2) or die ("Error $sql2.".mysql_error());
$rows2=mysql_fetch_object($results2);
echo $rows2->account_cat_name;
	
	?></td>
	<td><?php $id2=$rows->account_type_id;
	
$sql22="select * from account_type where account_type_id='$id2'";
$results22= mysql_query($sql22) or die ("Error $sql22.".mysql_error());
$rows22=mysql_fetch_object($results22);
echo $rows22->account_type_name;
	
	?></td>
    <td align="right" onClick="document.location.href='view_ledger.php?account_id=<?php echo $account_id=$rows->account_id;?>'">
	
	<?php 
	
	include('account_balance.php');
	
	?>
	
	
	
	
	</td>
  
    <td align="center"><a href="edit_station.php?account_id=<?php echo $rows->account_id; ?>"><img src="images/edit.png"></a></td>
    <td align="center"><a href="delete_station.php?account_id=<?php echo $rows->account_id; ?>" onClick="return confirmDelete();"><img src="images/delete.png"></a></td>
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