<?php include('Connections/fundmaster.php'); 
$product_id=$_GET['product_id'];
 $requisition_id=$_GET['requisition_id'];
?>

<html xmlns="http://www.w3.org/1999/xhtml">

<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>
<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<script src="lib/jquery.js" type="text/javascript"></script>
<script src="src/facebox.js" type="text/javascript"></script>
  <script type="text/javascript">
	jQuery(document).ready(function($) {
	  $('a[rel*=facebox]').facebox({
		loadingImage : 'src/loading.gif',
		closeImage   : 'src/closelabel.png'
	  })
	})
  </script>
<script src="js/application.js" type="text/javascript" charset="utf-8"></script>

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
		
		
		
		<?php require_once('includes/release_submenu.php'); ?>
		
		<h3>::Specific List Of Released Items From the Store</h3>
         
				
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
   
    <td colspan="11" height="30" align="center"> 
	<?php
	
$invoice_no=$_GET['invoice_no'];

if ($_GET['invoice_payment_confirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:550px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Payment Received successfully for the Invoice number' ;?> <?php echo $invoice_no;?> <?php echo '</font></strong></p></div>';
?> 

<?php 

if ($_GET['deletemachcatconfirm']==1)
echo "<p align='center'><strong><font color='#FF0000'>Record Deleted!!</font></strong></p>";
?>
	
	</td>
	
    </tr>
	
	<!--<tr align="center" height="40">
	<td colspan="11" bgcolor="#FFFFCC" height="20" align="center" ><strong>Filter By Product Category</strong>
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
	
    </tr>-->
	
	
	
  
    <tr style="background:url(images/description.gif);" height="30" >
	<td width="7%"><div align="center"><strong>Product Code</strong></td>
    <td width="20%"><div align="center"><strong>Product Name</strong></td>
	<td width="10%"><div align="center"><strong>Date Recorded</strong></td>
<td width="9%"><div align="center"><strong>Qty Released</strong></td>
<td width="9%"><div align="center"><strong>Release Date</strong></td>
<td width="9%"><div align="center"><strong>Receiving Person</strong></td>
<td width="9%"><div align="center"><strong>Edit</strong></td>
	<td width="8%"><div align="center"><strong>Delete</strong></td>


    </tr>
  
  <?php 
  
$sql="select * from released_item,items where released_item.item_id=items.item_id AND released_item.item_id='$product_id' and released_item.requisition_id='$requisition_id'";
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
  <td><?php echo $rows->item_code;?></td>
    <td><?php echo $rows->item_name.'('.$rows->pack_size.')';?></td>
	<td><?php echo $rows->date_recorded;?></td>


    <td align="center">
	
	<?php echo 	$rec_prod=$rows->released_quantity;
	
    
	
	
	
	
	?></td>
	

	
	

	
	
	<td align="center"><?php echo $bp=$rows->date_released;?></td>
	<td align="center"><?php echo $bp=$rows->receiving_person;?></td>
	<td align="center"><a rel="facebox" href="edit_released_item.php?released_item_id=<?php echo $rows->released_item_id; ?>&requisition_id=<?php echo $requisition_id; ?>"><img src="images/edit.png"></a></td>
    <td align="center"><a href="delete_released_item.php?released_item_id=<?php echo $rows->released_item_id; ?>&requisition_id=<?php echo $requisition_id; ?>" onClick="return confirmDelete();"><img src="images/delete.png"></a></td>
    
	
</tr>
  <?php 
$ttl_rec_prod=$ttl_rec_prod+$rec_prod;
  }
  ?>
  <tr bgcolor="#FFFFCC" height="30">
    <td width="400"><div align="center"><strong></strong></td>
	<td width="300"><div align="center"><strong></strong></td>
	<td width="300"><div align="center"><strong></strong></td>
	<td width="300"><div align="center"><strong><?php echo $ttl_rec_prod;?></strong></td>

	
	<td width="300"><div align="center"></td>
	<td width="300"><div align="center"></td>
	<td width="300"><div align="center"></td>
	<td width="300"><div align="center"></td>

    </tr>
  
  
  <?php 
  
  
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

$cat_id=$_POST['prod_cat'];
	
	if ($cat_id!='0')
	{
	?>			
<form name="filter" method="post" action="">							
<table width="100%" border="0">
  <tr bgcolor="#FFFFCC">
   
    <td colspan="11" height="30" align="center"> 
	<?php
	
$invoice_no=$_GET['invoice_no'];

if ($_GET['invoice_payment_confirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:550px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Payment Received successfully for the Invoice number' ;?> <?php echo $invoice_no;?> <?php echo '</font></strong></p></div>';
?> 

<?php 

if ($_GET['deletemachcatconfirm']==1)
echo "<p align='center'><strong><font color='#FF0000'>Record Deleted!!</font></strong></p>";
?>
	
	</td>
	
    </tr>
	
	<tr align="center" height="40">
	<td colspan="11" bgcolor="#FFFFCC" height="20" align="center" ><strong>Filter By Product Category</strong>
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
   
    <td colspan="11" height="30" align="center"><strong><font size="+1">Category : </font><font size="+1" color="#ff0000">
	<?php
	$querycat="select * from product_categories where cat_id='$cat_id'";
	$resultscat=mysql_query($querycat) or die ("Error: $querycat.".mysql_error());
	$rowsscat=mysql_fetch_object($resultscat);
	
	echo $rowsscat->cat_name;

?>
	</font></strong>
	</td><tr/>
	
	
	
  
    <tr style="background:url(images/description.gif);" height="30" >
	<td width="5%"><div align="center"><strong>Product Code</strong></td>
    <td width="400"><div align="center"><strong>Product Name</strong></td>
	<td width="300"><div align="center"><strong>Pack Size</strong></td>
	<td width="300"><div align="center"><strong>Weight</strong></td>
	<td width="300"><div align="center"><strong>Reorder Level</strong></td>
    <td width="300"><div align="center"><strong>Qty Received</strong></td>
	<td width="400"><div align="center"><strong>Qty Sold</strong></td>
	<!--<td width="400"><div align="center"><strong>Qty Sold Csh</strong></td>-->
	<td width="300"><div align="center"><strong>Qty Available</strong></td>

	<td width="200"><div align="center"><strong>Reorder Alert</strong></td>
    <!--<td width="100" ><div align="center"><strong>Edit</strong></td>
    <td width="100"><div align="center"><strong>Delete</strong></td>-->
    </tr>
  
  <?php 
  
$sql="select products.curr_bp,products.product_id,products.product_name,products.prod_code,products.reorder_level,SUM(received_stock.quantity_rec) as ttl_quant,
products.pack_size,products.weight,received_stock.delivery_date,received_stock.expiry_date,product_categories.cat_id from products,received_stock 
,product_categories where product_categories.cat_id=products.cat_id AND products.product_id=received_stock.product_id AND product_categories.cat_id='$cat_id' group by received_stock.product_id ORDER BY products.product_name asc";
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
	<td><?php echo $rows->pack_size;?></td>
	<td align="center"><?php echo $rows->weight;?></td>
	<td align="center"><?php echo $rows->reorder_level;?></td>
    <td align="center">
	
	<?php echo //number_format($rows->ttl_quant,0);
	$rec_prod=$rows->ttl_quant;
    $prod_id=$rows->product_id;
	
	$sqlsold="select SUM(sales.quantity) as ttl_sold_prod from sales where sales.product_id='$prod_id' AND status='1'";
	$resultssold= mysql_query($sqlsold) or die ("Error $sqlsold.".mysql_error());
	$rowsold=mysql_fetch_object($resultssold);
	
	$sold_prod=$rowsold->ttl_sold_prod;
	
	
$sqlprodcashsold="select SUM(cash_sales.quantity) as ttl_cash_sold_prod from cash_sales where cash_sales.product_id='$prod_id' AND status='1'";
$resultsprodcashsold= mysql_query($sqlprodcashsold) or die ("Error $sqlprodcashsold.".mysql_error());
$rowprodcashsold=mysql_fetch_object($resultsprodcashsold);

$prod_cash_sold=$rowprodcashsold->ttl_cash_sold_prod;

$ttl_sold_prod=$sold_prod+$prod_cash_sold;
	

	
	//echo $avail_prod; 
	
	
	
	
	?></td>
	
	<td align="center"><?php echo number_format($all_sold_prod=$sold_prod+$prod_cash_sold,0);?></td>
	<td align="center"><?php echo $avail_prod=$rec_prod-$all_sold_prod;//echo $rows->curr_bp;?></td>

  
	<td align="center">
	
	<?php 
	$reorder_level=$rows->reorder_level;
	
	if ($reorder_level>=$avail_prod)
	
	{
	
	echo "<blink><font color='#ff0000'>reorder now</font></blink>";
	
	}
	
	
	?>
	
	
	</td>
	
  
    </tr>
  <?php 
  $grnt_amnt=$grnt_amnt+$amnt;
  $ttl_stock=$ttl_stock+$avail_prod;
  }
  ?>
  <tr bgcolor="#FFFFCC" height="30">
    <td width="400"><div align="center"><strong></strong></td>
	<td width="300"><div align="center"><strong></strong></td>
	<td width="300"><div align="center"><strong></strong></td>
	<td width="300"><div align="center"><strong></strong></td>
    <td width="300"><div align="center"><strong></strong></td>
	<td width="400"><div align="center"><strong></strong></td>
	<td width="400"><div align="center"><strong></strong></td>
	<td width="300"><div align="center"></td>
	<td width="200"><div align="center"><strong></strong></td>
	
    <!--<td width="100" ><div align="center"><strong>Edit</strong></td>
    <td width="100"><div align="center"><strong>Delete</strong></td>-->
    </tr>
  
  
  <?php 
  
  
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
   
    <td colspan="11" height="30" align="center"> 
	<?php
	
$invoice_no=$_GET['invoice_no'];

if ($_GET['invoice_payment_confirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:550px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Payment Received successfully for the Invoice number' ;?> <?php echo $invoice_no;?> <?php echo '</font></strong></p></div>';
?> 

<?php 

if ($_GET['deletemachcatconfirm']==1)
echo "<p align='center'><strong><font color='#FF0000'>Record Deleted!!</font></strong></p>";
?>
	
	</td>
	
    </tr>
	
	<tr align="center" height="40">
	<td colspan="11" bgcolor="#FFFFCC" height="20" align="center" ><strong>Filter By Product Category</strong>
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
	
	
	
	
  
    <tr style="background:url(images/description.gif);" height="30" >
	<td width="5%"><div align="center"><strong>Product Code</strong></td>
    <td width="400"><div align="center"><strong>Product Name</strong></td>
	<td width="300"><div align="center"><strong>Pack Size</strong></td>
	<td width="300"><div align="center"><strong>Weight</strong></td>
	<td width="300"><div align="center"><strong>Reorder Level</strong></td>
    <td width="300"><div align="center"><strong>Qty Received</strong></td>
	<td width="400"><div align="center"><strong>Qty Sold</strong></td>
	<!--<td width="400"><div align="center"><strong>Qty Sold Csh</strong></td>-->
	<td width="300"><div align="center"><strong>Qty Available</strong></td>
	<td width="200"><div align="center"><strong>Reorder Alert</strong></td>
    <!--<td width="100" ><div align="center"><strong>Edit</strong></td>
    <td width="100"><div align="center"><strong>Delete</strong></td>-->
    </tr>
  
  <?php 
  
$sql="select products.curr_bp,products.product_id,products.product_name,products.prod_code,products.reorder_level,SUM(received_stock.quantity_rec) as ttl_quant,
products.pack_size,products.weight,received_stock.delivery_date,received_stock.expiry_date from products, received_stock 
where products.product_id=received_stock.product_id group by received_stock.product_id ORDER BY products.product_name asc";
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
	<td><?php echo $rows->pack_size;?></td>
	<td align="center"><?php echo $rows->weight;?></td>
	<td align="center"><?php echo $rows->reorder_level;?></td>
    <td align="center">
	
	<?php echo //number_format($rows->ttl_quant,0);
	$rec_prod=$rows->ttl_quant;
    $prod_id=$rows->product_id;
	
	$sqlsold="select SUM(sales.quantity) as ttl_sold_prod from sales where sales.product_id='$prod_id'";
	$resultssold= mysql_query($sqlsold) or die ("Error $sqlsold.".mysql_error());
	$rowsold=mysql_fetch_object($resultssold);
	
	$sold_prod=$rowsold->ttl_sold_prod;
	
	
$sqlprodcashsold="select SUM(cash_sales.quantity) as ttl_cash_sold_prod from cash_sales where cash_sales.product_id='$prod_id' group by cash_sales.product_id";
$resultsprodcashsold= mysql_query($sqlprodcashsold) or die ("Error $sqlprodcashsold.".mysql_error());
$rowprodcashsold=mysql_fetch_object($resultsprodcashsold);

$prod_cash_sold=$rowprodcashsold->ttl_cash_sold_prod;

$ttl_sold_prod=$sold_prod+$prod_cash_sold;
	

	
	//echo $avail_prod; 
	
	
	
	
	?></td>
	
	<td align="center"><?php echo number_format($all_sold_prod=$sold_prod+$prod_cash_sold,0);?></td>
	<td align="center"><?php echo $avail_prod=$rec_prod-$all_sold_prod;//echo $rows->curr_bp;?></td>
	
  
	<td align="center">
	
	<?php 
	$reorder_level=$rows->reorder_level;
	
	if ($reorder_level>=$avail_prod)
	
	{
	
	echo "<blink><font color='#ff0000'>reorder now</font></blink>";
	
	}
	
	
	?>
	
	
	</td>
	
  
    </tr>
  <?php 
  $grnt_amnt=$grnt_amnt+$amnt;
  $ttl_stock=$ttl_stock+$avail_prod;
  }
  ?>
  <tr bgcolor="#FFFFCC" height="30">
    <td width="400"><div align="center"><strong></strong></td>
	<td width="300"><div align="center"><strong></strong></td>
	<td width="300"><div align="center"><strong></strong></td>
	<td width="300"><div align="center"><strong></strong></td>
    <td width="300"><div align="center"><strong></strong></td>
	<td width="400"><div align="center"><strong></strong></td>
	<td width="400"><div align="center"><strong></strong></td>
	<td width="300"><div align="center"></td>
	<td width="200"><div align="center"><strong></strong></td>
	
    <!--<td width="100" ><div align="center"><strong>Edit</strong></td>
    <td width="100"><div align="center"><strong>Delete</strong></td>-->
    </tr>
  
  
  <?php 
  
  
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