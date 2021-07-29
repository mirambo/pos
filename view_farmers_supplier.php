<?php 
include('Connections/fundmaster.php'); 
?>
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

<body>

	<div id="page-wrap">

		<?php include ('header.php') ?>
		
		<div id="zone-bar" class="br-5">
          <?php include ('topmenu.php') ?>
		</div>
		
		
		
		<?php require_once('includes/suppliersubmenu.php');  ?>
		
		<h3>:: List of All Farmers Suppliers</h3>
		
         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
			<div id="cont-left-full" class="br-5">
<?php include ('top_grid_includes.php');?>

			
				
	 <form name="search" method="post" action="">  		
<table width="100%" border="0">

  <tr bgcolor="#FFFFCC">
   
    <td colspan="10" height="30" align="center"> 
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
<tr bgcolor="#FFFFCC">
   
    <td  height="30"  colspan="10" align="center">
	<strong>Search Supplier - Enter Name: 
    </strong>
    
    
    <input type="text" name="supp_name" size="40" />
	
	<input type="submit" name="generate" value="Search"></td>
	
    </tr>	
	
  	<table  border="0" align="center" bgcolor="#9AD7AF" class="display nowrap" style="border-radius:5px; width:100%" id="example">	

    <thead>
  <tr  style="background:url(images/description.gif);" height="30" >
  <td align="center" width="100"><strong>Supplier Code</strong></td>
    <td align="center" width="200"><strong>Supplier Name</strong></td>
    <td align="center" width="160"><strong>Contact Person</strong></td>
	<td align="center"><strong>Country</strong></td>
    <td align="center" width="100"><strong>Postal Address</strong></td>
	<td align="center"><strong>Town</strong></td>
	<td align="center" width="150"><strong>Phone Number</strong></td>
    <td width="180" align="center"><strong>Email Address</strong></td>
    <td align="center"><strong>Edit</strong></td>
    <td align="center"><strong>Delete</strong></td>
    </tr>
	</thead>
  
  <?php 
 
$sql="SELECT * FROM suppliers where sup_type='F' order by supplier_id asc";
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
    <td><?php echo $rows->sup_code;?></td>
    <td><a href="home.php?farmers=farmers"><?php echo $rows->supplier_name;?></a></td>
    <td><?php echo $rows->cont_person;?></td>
	<td><?php echo $rows->country;?></td>
	<td><?php echo $rows->postal;?></td>
	<td><?php echo $rows->town;?></td>
	<td align="center">
	<?php echo $rows->phone;?>
    </td>
	
	<td><?php echo $rows->email;?></td>
	
    <td align="center"><a href="add_supplier.php?supplier_id=<?php echo $rows->supplier_id; ?>"><img src="images/edit.png"></a></td>
    <td align="center"><a href="delete_supplier.php?supplier_id=<?php echo $rows->supplier_id; ?>"  onClick="return confirmDelete();"><img src="images/delete.png"></a></td>
    </tr>
  <?php 
  
  }
  
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