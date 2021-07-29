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




<body>

	<div id="page-wrap">

		<?php include ('header.php') ?>
		
		<div id="zone-bar" class="br-5">
          <?php include ('topmenu.php') ?>
		</div>
		
		
		
		<?php require_once('includes/prodsubmenu.php');  ?>
		
		<h3>:: List of All Products</h3>
         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
			<div id="cont-left-full" class="br-5">
			
			
			
			
<form name="filter" method="post" action="">				
			
<table width="100%" border="0">
  <tr bgcolor="#FFFFCC">
   
    <td colspan="12" height="30" align="center"> 
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
	<tr align="center" height="40">
	<td colspan="13" bgcolor="#FFFFCC" height="20" align="center" ><strong>Filter By Product Category</strong>
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
								  
								  </select>&nbsp;&nbsp;&nbsp;
								  	<strong>Or By Product Name : </strong><input type="text" name="prod_name" size="40">  
								  &nbsp;&nbsp;&nbsp;
								  <input type="submit" name="generate" value="Filter">
								  
							
								  
								  
								  
								  
								  
								  
								  </td>
	
    </tr>
	
	<tr bgcolor="#FFFFCC">
	
   
    <td colspan="13" height="30" align="right"><font size="+1">
	
	<?php 
	if (isset($_POST['generate']))
	{
$cat_id=$_POST['prod_cat'];
$prod_name=$_POST['prod_name'];
	}
	?>
	
	<a href="print_products.php?cat_id=<?php echo $cat_id;?>&product_name=<?php echo $prod_name;  ?>" title="Export To Word"><img src="images/word.png" style="margin-right:30px;"/> </a>
	
	
	
	</td>
	</tr>
  
    <tr style="background:url(images/description.gif);" height="30" >
    <td width="550"><div align="center"><strong>Product Name</strong></td>
    <td width="550"><div align="center"><strong>Category</strong></td>
	<td width="400"><div align="center"><strong>Product Code</strong></td>
	<td width="400"><div align="center"><strong>Pack Size</strong></td>
	<td width="400"><div align="center"><strong>Weight(Kgs)</strong></td>
	<td width="400"><div align="center"><strong>Re-order Level</strong></td>
	<td width="400"><div align="center"><strong>Selling Price (Kshs)</strong></td>
	<td width="400"><div align="center"><strong>Prod. Value</strong></td>
	<td width="400"><div align="center"><strong>Exch. Rate</strong></td>
	<td width="400"><div align="center"><strong>Prod. Value (Kshs)</strong></td>
    <td width="100" ><div align="center"><strong>Edit</strong></td>
    <td width="100"><div align="center"><strong>Delete</strong></td>
    </tr>
  
  
  <?php 		
if (!isset($_POST['generate']))
{
		
$sql="select products.pack_size,products.product_name,products.product_id,prod_code,products.pack_size,products.weight,products.reorder_level,products.curr_sp,
products.curr_bp,products.exchange_rate,products.currency_code,product_categories.cat_name,currency.curr_name from currency,products,product_categories
where products.cat_id=product_categories.cat_id and products.currency_code=currency.curr_id order by product_categories.cat_name asc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
else
{
$cat_id=$_POST['prod_cat'];
$prod_name=$_POST['prod_name'];
if ($cat_id!='0' && $prod_name=='')
{
$sql="select products.pack_size,products.product_name,products.product_id,prod_code,products.pack_size,products.weight,products.reorder_level,products.curr_sp,
products.curr_bp,products.exchange_rate,products.currency_code,product_categories.cat_name,currency.curr_name from currency,products,product_categories
where products.cat_id=product_categories.cat_id and products.currency_code=currency.curr_id AND product_categories.cat_id='$cat_id' order by product_categories.cat_name asc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}

elseif ($cat_id=='0' && $prod_name!='')
{
$sql="select products.pack_size,products.product_name,products.product_id,prod_code,products.pack_size,products.weight,products.reorder_level,products.curr_sp,
products.curr_bp,products.exchange_rate,products.currency_code,product_categories.cat_name,currency.curr_name from currency,products,product_categories
where products.cat_id=product_categories.cat_id and products.currency_code=currency.curr_id AND products.product_name LIKE '%$prod_name%' order by product_categories.cat_name asc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}

elseif ($cat_id!='0' && $prod_name!='')
{
$sql="select products.pack_size,products.product_name,products.product_id,prod_code,products.pack_size,products.weight,products.reorder_level,products.curr_sp,
products.curr_bp,products.exchange_rate,products.currency_code,product_categories.cat_name,currency.curr_name from currency,products,product_categories
where products.cat_id=product_categories.cat_id and products.currency_code=currency.curr_id AND product_categories.cat_id='$cat_id' AND products.product_name LIKE '%$prod_name%' order by product_categories.cat_name asc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}




else
{
$sql="select products.pack_size,products.product_name,products.product_id,prod_code,products.pack_size,products.weight,products.reorder_level,products.curr_sp,
products.curr_bp,products.exchange_rate,products.currency_code,product_categories.cat_name,currency.curr_name from currency,products,product_categories
where products.cat_id=product_categories.cat_id and products.currency_code=currency.curr_id order by product_categories.cat_name asc";
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
  
    <td><?php echo $rows->product_name;?></td>
    <td><?php echo $rows->cat_name;?></td>
	 <td><?php echo $rows->prod_code;?></td>
   
	<td><?php echo $rows->pack_size;?></td>
	<td><?php echo $rows->weight;?></td>
	<td><?php echo $rows->reorder_level;?></td>
	<td align="right"><strong><?php echo number_format($rows->curr_sp,2);?></strong></td>
	<td align="right"><?php 
	$currency_code=$rows->currency_code;
	/*if ($currency_code!='2')
 {
 echo "<blink ><font color='#ff0000'>Change to USD</font></blink>";
 }
	*/
	
	echo $rows->curr_name.' '.number_format($curr_bp=$rows->curr_bp,2);?></td>
	<td align="right"><?php echo number_format($exchange_rate=$rows->exchange_rate,2);?></td>
	<td align="right"><strong><?php 
	echo number_format($bp_kshs=$curr_bp*$exchange_rate,2);
	
	
	;?></strong></td>
	
    <td align="center"><a href="edit_prod.php?product_id=<?php echo $rows->product_id; ?>&curr_id=<?php echo $rows->currency_code; ?>"><img src="images/edit.png"></a></td>
    <td align="center"><a href="delete_prod.php?product_id=<?php echo $rows->product_id; ?>" onClick="return confirmDelete();"> <img src="images/delete.png"></a></td>
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