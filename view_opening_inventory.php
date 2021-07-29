<?php include('Connections/fundmaster.php'); 
$product_id=$_GET['product_id'];
$order_code_id=$_GET['order_code_id'];
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
		
		
		
				<?php require_once('includes/warehousesubmenu.php');  ?>
		
		<h3>::Opening Stock</h3>
         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
			<div id="cont-left-full" class="br-5">
			
			
			
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
	<td colspan="13" bgcolor="#FFFFCC" height="20" align="center" >	<strong>Search By Product Name : </strong><input type="text" name="prod_name" size="40">  
								  &nbsp;&nbsp;&nbsp;
								  <input type="submit" name="generate" value="Filter">
								  
							
								  
								  
								  
								  
								  
								  
								  </td>
	
    </tr>
	

	
	
	
  
    <tr style="background:url(images/description.gif);" height="30" >
	<td width="7%"><div align="center"><strong>Product Code</strong></td>
    <td width="20%"><div align="center"><strong>Product Name</strong></td>
	<td width="10%"><div align="center"><strong>Date Recorded</strong></td>
<td width="9%"><div align="center"><strong>Qty Received</strong></td>
<td width="9%"><div align="center"><strong>Delivery Date</strong></td>
<td width="9%"><div align="center"><strong>Expiry Date</strong></td>
<td width="9%"><div align="center"><strong>Edit</strong></td>
	<td width="8%"><div align="center"><strong>Delete</strong></td>


    </tr>
  
  <?php 
  
if (!isset($_POST['generate']))
{  
  
$sql="select products.product_id,products.product_name,products.pack_size,products.prod_code,products.exchange_rate,products.reorder_level,products.pack_size,products.weight,
received_stock.delivery_date,received_stock.expiry_date,received_stock.received_stock_id,received_stock.date_received,received_stock.quantity_rec,received_stock.product_id,received_stock.order_code_id from products, received_stock 
where products.product_id=received_stock.product_id and received_stock.order_code_id='0' ORDER BY received_stock.date_received desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
else
{
$prod_name=$_POST['prod_name'];

if ($prod_name!='')
{
$sql="select products.product_id,products.product_name,products.pack_size,products.prod_code,products.exchange_rate,products.reorder_level,products.pack_size,products.weight,
received_stock.delivery_date,received_stock.expiry_date,received_stock.received_stock_id,received_stock.date_received,received_stock.quantity_rec,received_stock.product_id,received_stock.order_code_id from products, received_stock 
where products.product_id=received_stock.product_id and received_stock.order_code_id='0' AND products.product_name LIKE '%$prod_name%' ORDER BY received_stock.date_received desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}

else
{
$sql="select products.product_id,products.product_name,products.pack_size,products.prod_code,products.exchange_rate,products.reorder_level,products.pack_size,products.weight,
received_stock.delivery_date,received_stock.expiry_date,received_stock.received_stock_id,received_stock.date_received,received_stock.quantity_rec,received_stock.product_id,received_stock.order_code_id from products, received_stock 
where products.product_id=received_stock.product_id and received_stock.order_code_id='0' ORDER BY received_stock.date_received desc";
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
  <td><?php echo $rows->prod_code;?></td>
    <td><?php echo $rows->product_name.'('.$rows->pack_size.')';?></td>
	<td><?php echo $rows->date_received;?></td>


    <td align="center">
	
	<?php echo 	$rec_prod=$rows->quantity_rec;
	
    
	
	
	
	
	?></td>
	

	
	

	
	<td align="center"><?php echo $bp=$rows->expiry_date;?></td>
	<td align="center"><?php echo $bp=$rows->delivery_date;?></td>
	<td align="center"><a rel="facebox" href="edit_received_stock_product.php?received_stock_id=<?php echo $rows->received_stock_id; ?>&order_code_id=<?php echo $order_code_id; ?>"><img src="images/edit.png"></a></td>
    <td align="center"><a href="delete_received_stock_product.php?received_stock_id=<?php echo $rows->received_stock_id; ?>&order_code_id=<?php echo $order_code_id; ?>" onClick="return confirmDelete();"><img src="images/delete.png"></a></td>
    
	
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

	<!--<td width="200"><div align="center"><strong><font size="+1"><?php echo number_format($grnt_amnt,2); ?></font></strong></td>
	<td width="200"><div align="center"><strong></strong></td>
    <td width="100" ><div align="center"><strong>Edit</strong></td>
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