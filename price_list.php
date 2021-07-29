<?php include('Connections/fundmaster.php'); 




// retrieve and show the data :)
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
		
		
		
		<?php require_once('includes/invoicessubmenu.php');  ?>
		
		<h3>:: Our Price List </h3>
		
		

         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
			<div id="cont-left-full" class="br-5">
			
			
			
<?php 		
if (!isset($_POST['generate']))
{
?>				
			
<form name="filter" method="post" action="">			
<table width="100%" border="0">
  <tr bgcolor="#FFFFCC">
   
    <td colspan="9" height="30" align="center"> 
	<?php

if ($_GET['updateuserconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:550px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >User Updated Successfully!!</font></strong></p></div>';
?> 

<?php 

if ($_GET['deletemachcatconfirm']==1)
echo "<p align='center'><strong><font color='#FF0000'>Record Deleted!!</font></strong></p>";
?>
	
	</td><tr/>
	
	 
	
	<tr align="center" height="40">
	<td colspan="9" bgcolor="#FFFFCC" height="20" align="center" ><strong>Filter By Product Category</strong>
	<select name="prod_cat">
	<option>-------------------Select-----------------------</option>
								  <?php
								  
								  $query1="select * from product_categories";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->cat_id;?>"><?php echo $rows1->cat_name; ?></option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
								  
								  
								  
								  
								  
								  ?>
								  
								  </select>&nbsp;&nbsp;&nbsp;<input type="submit" name="generate" value="Filter"></td>
	
    </tr>
	<tr bgcolor="#FFFFCC">
   
    <td colspan="5" height="30" align="right"><font size="+1"><a href="price_list_doc.php" title="Export To Word"><img src="images/word.png" style="margin-right:30px;"/></a>
	
	</td>
	</tr>
  
    <tr style="background:url(images/description.gif);" height="30" >
	 <td width="200" align="center"><strong>Product Code</strong></td>
    <td width="400"><div align="center"><strong><a href="?orderBy=product">Product Name</a></strong></td>
    <td width="400"><div align="center"><strong>Category</strong></td>
	<td width="400"><div align="center"><strong>Pack Size</strong></td>
	<!--<td width="400"><div align="center"><strong>Weight(Kgs)</strong></td>
	<td width="400"><div align="center"><strong>Re-order Level</strong></td>-->
	<td width="400"><div align="center"><strong>Price (Kshs)</strong></td>
	<!--<td width="400"><div align="center"><strong>Buying Price (Kshs)</strong></td>
    <td width="100" ><div align="center"><strong>Edit</strong></td>
    <td width="100"><div align="center"><strong>Delete</strong></td>-->
    </tr>
  
  <?php 
  
 $orderBy = array('products.product_name', 'description', 'recorded_date', 'added_date');

$order = 'products.product_name';
if (isset($_GET['orderBy']) && in_array($_GET['orderBy'], $orderBy)) {
    $order = $_GET['orderBy'];
}

  
$sql="select products.prod_code,products.product_name,products.pack_size,products.weight,products.reorder_level,products.curr_sp,products.curr_bp,product_categories.cat_name from products,product_categories where products.cat_id=product_categories.cat_id order by product_categories.cat_name asc";
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
  
    <td><?php echo $rows->prod_code;?></td>
    <td><?php echo $rows->product_name;?></td>
<td><?php echo $rows->cat_name;?></td>
	<td><?php echo $rows->pack_size;?></td>
	<!--<td><?php echo $rows->weight;?></td>-->
	
	<td align="right"><strong><?php echo number_format($rows->curr_sp,2);?></strong></td>
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
</form>		
	<?php 
	
	}
	else{
	
	$cat_id=$_POST['prod_cat'];
	
	if ($cat_id!='0')
	{
	
	?>				
			
<form name="filter" method="post" action="">			
<table width="100%" border="0">
 
	<tr bgcolor="#FFFFCC">
   
    <td colspan="9" height="30" align="center"> 
	<?php

if ($_GET['updateuserconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:550px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >User Updated Successfully!!</font></strong></p></div>';
?> 

<?php 

if ($_GET['deletemachcatconfirm']==1)
echo "<p align='center'><strong><font color='#FF0000'>Record Deleted!!</font></strong></p>";
?>
	
	</td><tr/>
	 
	
	<tr align="center" height="40">
	<td colspan="9" bgcolor="#FFFFCC" height="20" align="center" ><strong>Filter By Product Category</strong>
	<select name="prod_cat">
	<option value="0">-------------------Select-----------------------</option>
								  <?php
								  
								  $query1="select * from product_categories";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->cat_id;?>"><?php echo $rows1->cat_name; ?></option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
								  
								  
								  
								  
								  
								  ?>
								  
								  </select>&nbsp;&nbsp;&nbsp;<input type="submit" name="generate" value="Filter"></td>
	
    </tr>
	<tr bgcolor="#FFFFCC">
   
    <td colspan="5" height="30" align="right"><font size="+1"><a href="price_list_doc.php?cat_id=<?php echo $cat_id; ?>" title="Export To Word"><img src="images/word.png" style="margin-right:30px;"/></a>
	
	</td>
	</tr>
	 <tr bgcolor="#FFFFCC">
   
    <td colspan="9" height="30" align="center"><strong><font size="+1">Category : </font><font size="+1" color="#ff0000">
	<?php
	$querycat="select * from product_categories where cat_id='$cat_id'";
	$resultscat=mysql_query($querycat) or die ("Error: $querycat.".mysql_error());
	$rowsscat=mysql_fetch_object($resultscat);
	
	echo $rowsscat->cat_name;

?>
	</font></strong>
	</td><tr/>
  
    <tr bgcolor="#FF6600" height="30" >
    <td ><div align="center"><strong>Product Code</strong></td>
	<td ><div align="center"><strong>Product Name</strong></td>
	<td ><div align="center"><strong>Category</strong></td>
  	<td ><div align="center"><strong>Pack Size</strong></td>
	<!--<td ><div align="center"><strong>Weight(Kgs)</strong></td>-->	
	<td colspan="3"><div align="center"><strong>Price (Kshs)</strong></td>
	
    </tr>
  
  <?php 
  
$sql="select products.prod_code,products.product_name,products.pack_size,products.weight,products.reorder_level,products.curr_sp,products.curr_bp,
product_categories.cat_name from products,product_categories where products.cat_id=product_categories.cat_id AND products.cat_id='$cat_id' order 
by product_categories.cat_name desc";
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
  
  <td><?php echo $rows->prod_code;?></td>
    <td><?php echo $rows->product_name;?></td>
<td><?php echo $rows->cat_name;?></td>
	<td><?php echo $rows->pack_size;?></td>
	<!--<td><?php echo $rows->weight;?></td>-->
	
	<td align="right"><strong><?php echo number_format($rows->curr_sp,2);?></strong></td>
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
</form>		
	<?php
}
else
{
?>				
			
<form name="filter" method="post" action="">			
<table width="100%" border="0">
  <tr bgcolor="#FFFFCC">
   
    <td colspan="9" height="30" align="center"> 
	<?php

if ($_GET['updateuserconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:550px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >User Updated Successfully!!</font></strong></p></div>';
?> 

<?php 

if ($_GET['deletemachcatconfirm']==1)
echo "<p align='center'><strong><font color='#FF0000'>Record Deleted!!</font></strong></p>";
?>
	
	</td><tr/>
	
	 
	
	<tr align="center" height="40">
	<td colspan="9" bgcolor="#FFFFCC" height="20" align="center" ><strong>Filter By Product Category</strong>
	<select name="prod_cat">
	<option value="0">-------------------Select-----------------------</option>
								  <?php
								  
								  $query1="select * from product_categories";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->cat_id;?>"><?php echo $rows1->cat_name; ?></option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
								  
								  
								  
								  
								  
								  ?>
								  
								  </select>&nbsp;&nbsp;&nbsp;<input type="submit" name="generate" value="Filter"></td>
	
    </tr>
  <tr bgcolor="#FFFFCC">
   
    <td colspan="5" height="30" align="right"><font size="+1"><a href="price_list_doc.php" title="Export To Word"><img src="images/word.png" style="margin-right:30px;"/></a>
	
	</td>
	</tr>
    <tr bgcolor="#FF6600" height="30" >
    <td ><div align="center"><strong>Product Code</strong></td>
	<td ><div align="center"><strong>Product Name</strong></td>
	<td ><div align="center"><strong>Category</strong></td>
  	<td ><div align="center"><strong>Pack Size</strong></td>
	<!--<td ><div align="center"><strong>Weight(Kgs)</strong></td>-->	
	<td colspan="3"><div align="center"><strong>Price (Kshs)</strong></td>
	
    </tr>
  
  <?php 
  
$sql="select products.prod_code, products.product_name,products.pack_size,products.weight,products.reorder_level,products.curr_sp,products.curr_bp,
product_categories.cat_name from products,product_categories where products.cat_id=product_categories.cat_id order 
by product_categories.cat_name desc";
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
  
    <td><?php echo $rows->prod_code;?></td>
    <td><?php echo $rows->product_name;?></td>
<td><?php echo $rows->cat_name;?></td>
	<td><?php echo $rows->pack_size;?></td>
	<!--<td><?php echo $rows->weight;?></td>-->
	
	<td align="right"><strong><?php echo number_format($rows->curr_sp,2);?></strong></td>
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
</form>		
	<?php 





}	
	
	
	
	}
	
	
	
	?>		

			
			
			
					
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