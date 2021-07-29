 <tr height="30" bgcolor="#C0D7E5">
    <td width="10%" colspan="3">Opening Stock</td>
    
	<td width="2%"><div align="right">

  <?php 
  if ($date_from=='' && $date_to=='')
  
  {
$sql="select products.curr_bp,products.product_id,products.product_name,products.prod_code,products.exchange_rate,products.reorder_level,SUM(received_stock.quantity_rec) as ttl_quant,
products.pack_size,products.weight,received_stock.delivery_date,received_stock.expiry_date,received_stock.purchase_order_id,received_stock.order_code from products, received_stock 
where products.product_id=received_stock.product_id and received_stock.order_code='0' group by received_stock.product_id ORDER BY products.product_name asc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
  }
  else
  {
$sql="select products.curr_bp,products.product_id,products.product_name,products.prod_code,products.exchange_rate,products.reorder_level,SUM(received_stock.quantity_rec) as ttl_quant,
products.pack_size,products.weight,received_stock.delivery_date,received_stock.expiry_date,received_stock.purchase_order_id,received_stock.order_code from products, received_stock 
where products.product_id=received_stock.product_id and received_stock.order_code='0'AND received_stock.date_received BETWEEN '$date_from' AND '$date_to' group by received_stock.product_id ORDER BY products.product_name asc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}

if (mysql_num_rows($results) > 0)
						  {
							  $RowCounter=0;
							  while ($rows=mysql_fetch_object($results))
							  { 
							  
							  
 
 ?>
 



	
	<?php 	$rec_prod=$rows->ttl_quant;
	
    $prod_id=$rows->product_id;
	$purchase_order_id=$rows->purchase_order_id;
	
	$sqlsold="select SUM(sales.quantity) as ttl_sold_prod from sales where sales.product_id='$prod_id' and date_generated BETWEEN '$date_from' AND '$date_to'";
	$resultssold= mysql_query($sqlsold) or die ("Error $sqlsold.".mysql_error());
	$rowsold=mysql_fetch_object($resultssold);
	
$sold_prod=$rowsold->ttl_sold_prod;
	
	
	
$sqlprodcashsold="select SUM(cash_sales.quantity) as ttl_cash_sold_prod from cash_sales where cash_sales.product_id='$prod_id' and date_generated BETWEEN '$date_from' AND '$date_to'";
$resultsprodcashsold= mysql_query($sqlprodcashsold) or die ("Error $sqlprodcashsold.".mysql_error());
$rowprodcashsold=mysql_fetch_object($resultsprodcashsold);


$prod_cash_sold=$rowprodcashsold->ttl_cash_sold_prod;
	
	
	
	
	?>
	

	
	

<?php $bp=$rows->curr_bp;?>
<?php  number_format($curr_rate=$rows->exchange_rate,2);?>

<?php 
	
	
	
	
	
	number_format($ttl_cost=$rec_prod*$bp*$curr_rate,2);
	
	
	
	
	?>
	
	
	
	

  <?php 
  $grnt_amnt_ttl_cost=$grnt_amnt_ttl_cost+$ttl_cost;
  $ttl_stock=$ttl_stock+$avail_prod;
  }
  ?>
  
<?php //echo number_format($grnt_amnt_ttl_cost,2);?>
	
 
  
  
  <?php 
  
  
  }
  
  ?>
  
  </td>
  
 <td width="2%" colspan="2"></td>
