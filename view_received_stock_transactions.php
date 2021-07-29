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

<body>

	<div id="page-wrap">

		<?php include ('header.php') ?>
		
		<div id="zone-bar" class="br-5">
          <?php include ('topmenu.php') ?>
		</div>
		
		
		
		<?php require_once('includes/warehousesubmenu.php');  ?>
		
		<h3>::Received Stock Transaction Details</h3>
         
				
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
								  
								  </select>&nbsp;&nbsp;&nbsp;
								  
								  <strong>Or By Product Name : </strong><input type="text" name="prod_name" size="40">  
								  &nbsp;&nbsp;&nbsp;
								  
								  
								  
								  <input type="submit" name="generate" value="Filter">
								  
								  </td>
	
    </tr>
	
	
	
  
    <tr style="background:url(images/description.gif);" height="30" >
	<td width="7%"><div align="center"><strong>Product Code</strong></td>
    <td width="20%"><div align="center"><strong>Product Name</strong></td>
	<td width="5%"><div align="center"><strong>Pack Size</strong></td>
    <td width="9%"><div align="center"><strong>Qty Received</strong></td>
	<td width="15%"><div align="center"><strong>Supplier</strong></td>
	<td width="8%"><div align="center"><strong>Date Delivered</strong></td>
    <td width="10%" ><div align="center"><strong>LPO No</strong></td>
    <td width="10%" ><div align="center"><strong>Edit</strong></td>
    <td width="10%" ><div align="center"><strong>Delete</strong></td>
    </tr>
  
  <?php 
  
  if (!isset($_POST['generate']))
{
  
$sql="select lpo.lpo_no,suppliers.supplier_name,products.curr_bp,products.product_id,products.product_name,products.prod_code,products.exchange_rate,products.reorder_level,received_stock.quantity_rec,
products.pack_size,products.weight,received_stock.delivery_date,received_stock.received_stock_id,received_stock.expiry_date,received_stock.purchase_order_id,received_stock.order_code from lpo,suppliers,products, received_stock 
where lpo.order_code=received_stock.order_code and products.product_id=received_stock.product_id and suppliers.supplier_id=received_stock.supplier_id and received_stock.order_code!='0' ORDER BY received_stock.received_stock_id desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
else
{
$cat_id=$_POST['prod_cat'];
$prod_name=$_POST['prod_name'];

if ($cat_id!='0' && $prod_name=='')
{
$sql="select lpo.lpo_no,suppliers.supplier_name,products.curr_bp,products.product_id,products.product_name,products.prod_code,products.exchange_rate,products.reorder_level,received_stock.quantity_rec,
products.pack_size,products.weight,received_stock.delivery_date,received_stock.received_stock_id,received_stock.expiry_date,received_stock.purchase_order_id,received_stock.order_code from lpo,suppliers,products, received_stock 
where lpo.order_code=received_stock.order_code and products.product_id=received_stock.product_id and suppliers.supplier_id=received_stock.supplier_id and received_stock.order_code!='0' 
AND products.cat_id='$cat_id' ORDER BY received_stock.received_stock_id desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}
elseif ($cat_id=='0' && $prod_name!='')
{
$sql="select lpo.lpo_no,suppliers.supplier_name,products.curr_bp,products.product_id,products.product_name,products.prod_code,products.exchange_rate,products.reorder_level,received_stock.quantity_rec,
products.pack_size,products.weight,received_stock.delivery_date,received_stock.received_stock_id,received_stock.expiry_date,received_stock.purchase_order_id,received_stock.order_code from lpo,suppliers,products, received_stock 
where lpo.order_code=received_stock.order_code and products.product_id=received_stock.product_id and suppliers.supplier_id=received_stock.supplier_id and received_stock.order_code!='0' 
AND products.product_name LIKE '%$prod_name%' ORDER BY received_stock.received_stock_id desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}
elseif ($cat_id!='0' && $prod_name!='')
{
$sql="select lpo.lpo_no,suppliers.supplier_name,products.curr_bp,products.product_id,products.product_name,products.prod_code,products.exchange_rate,products.reorder_level,received_stock.quantity_rec,
products.pack_size,products.weight,received_stock.delivery_date,received_stock.received_stock_id,received_stock.expiry_date,received_stock.purchase_order_id,received_stock.order_code from lpo,suppliers,products, received_stock 
where lpo.order_code=received_stock.order_code and products.product_id=received_stock.product_id and suppliers.supplier_id=received_stock.supplier_id and received_stock.order_code!='0' 
AND products.product_name LIKE '%$prod_name%' AND products.cat_id='$cat_id' ORDER BY received_stock.received_stock_id desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}
else
{
$sql="select lpo.lpo_no,suppliers.supplier_name,products.curr_bp,products.product_id,products.product_name,products.prod_code,products.exchange_rate,products.reorder_level,received_stock.quantity_rec,
products.pack_size,products.weight,received_stock.delivery_date,received_stock.received_stock_id,received_stock.expiry_date,received_stock.purchase_order_id,received_stock.order_code from lpo,suppliers,products, received_stock 
where lpo.order_code=received_stock.order_code and products.product_id=received_stock.product_id and suppliers.supplier_id=received_stock.supplier_id and received_stock.order_code!='0' ORDER BY received_stock.received_stock_id desc";
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
    <td><?php echo $rows->product_name;?></td>
	<td><?php echo $rows->pack_size;?></td>


    <td align="center">
	
	<?php 
	echo 	$rec_prod=$rows->quantity_rec;
	
    
	
	
	
	
	?></td>
	

	
	

	<td><?php echo $bp=$rows->supplier_name;?></td>
	<td align="center"><?php echo $rows->delivery_date;?></td>
	<td align="center"><?php echo $rows->lpo_no;?></td>
	<td align="center"><a rel="facebox" href="edit_received_stock.php?received_stock_id=<?php echo $rows->received_stock_id;?>&view=2"><img src="images/edit.png"></a></td>										  
<td align="center"><a href="delete_received_stock.php?received_stock_id=<?php echo $rows2->received_stock_id; ?>&view=2&rec_order_code=<?php echo $received_order_code_id; ?>" onClick="return confirmDelete();"><img src="images/delete.png"></a></td>	
</tr>
  <?php 
  $grnt_amnt_ttl_cost=$grnt_amnt_ttl_cost+$ttl_cost;
  $ttl_stock=$ttl_stock+$avail_prod;
  }
  ?>
  <tr bgcolor="#FFFFCC" height="30">
    <td width="400"><div align="center"><strong></strong></td>
	<td width="300"><div align="center"><strong></strong></td>
	<td width="300"><div align="center"><strong></strong></td>
	<td width="300"><div align="center"><strong></strong></td>

	
	<td width="300"><div align="center"></td>
	<td width="300"><div align="center"></td>
	<td width="300"><div align="center"></td>
	<td width="300"><div align="center"></td>
<td width="300"><div align="right"><strong><?php //echo number_format($grnt_amnt_ttl_cost,2);?></strong></td>
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