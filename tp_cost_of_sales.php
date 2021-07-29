
<?php include('Connections/fundmaster.php'); ?>
<tr height="30" bgcolor="#FFFFCC" >
    <td width="10%" colspan="4">Cost Of Googs Sold</td>
    
	
  
  <?php 
 
$sql="select products.pack_size,products.curr_bp,products.curr_sp,products.product_id,products.product_name,products.prod_code,products.exchange_rate,products.reorder_level,SUM(received_stock.quantity_rec) as ttl_quant,
products.weight,received_stock.delivery_date,received_stock.expiry_date,received_stock.purchase_order_id,received_stock.order_code from product_categories,products,received_stock 
where products.cat_id=product_categories.cat_id AND products.product_id=received_stock.product_id group by received_stock.product_id ORDER BY product_categories.cat_name asc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


if (mysql_num_rows($results) > 0)
						  {
							  $RowCounter=0;
							  while ($rows=mysql_fetch_object($results))
							  { 
							  
							  
 
	$curr_sp=$rows->curr_sp; 
	$curr_rate=$rows->exchange_rate; ?>
	

  
	
	<?php 	$rec_prod=$rows->ttl_quant;
	$curr_bp=$rows->curr_bp;
	$curr_sp=$rows->curr_sp;
	
    $prod_id=$rows->product_id;
	$purchase_order_id=$rows->purchase_order_id;
	
	$sqlsold="select SUM(sales.quantity) as ttl_sold_prod from sales where sales.product_id='$prod_id' AND status='1'";
	$resultssold= mysql_query($sqlsold) or die ("Error $sqlsold.".mysql_error());
	$rowsold=mysql_fetch_object($resultssold);
	
$sold_prod=$rowsold->ttl_sold_prod;

$cred_sales=$sold_prod*$curr_bp*$curr_rate;
	
	
	
$sqlprodcashsold="select SUM(cash_sales.quantity) as ttl_cash_sold_prod from cash_sales where cash_sales.product_id='$prod_id' AND status='1'";
$resultsprodcashsold= mysql_query($sqlprodcashsold) or die ("Error $sqlprodcashsold.".mysql_error());
$rowprodcashsold=mysql_fetch_object($resultsprodcashsold);


$prod_cash_sold=$rowprodcashsold->ttl_cash_sold_prod;
$cash_sales=$prod_cash_sold*$curr_bp*$curr_rate;


$sqlret="select SUM(sales_returns.sales_return_quantity ) as ttl_sales_ret from sales_returns where sales_returns.product_id='$prod_id'";
$resultsret= mysql_query($sqlret) or die ("Error $sqlret.".mysql_error());
$rowsret=mysql_fetch_object($resultsret);

$prod_ret=$rowsret->ttl_sales_ret;
	

	
	
	?><?php number_format($all_sold_prod=$sold_prod+$prod_cash_sold,0);
	$ttl_cost_of_sales=$cred_sales+$cash_sales;
	
	
	?><?php number_format($prod_ret,0);?>
	<?php 
$prod_id=$rows->product_id;	
$sqlstockret="select SUM(stock_returns.stock_return_quantity) as ttl_stock_ret from stock_returns where stock_returns.product_id='$prod_id'";
$resultsstockret= mysql_query($sqlstockret) or die ("Error $sqlstockret.".mysql_error());
$rowsstockret=mysql_fetch_object($resultsstockret);

$stock_ret=$rowsstockret->ttl_stock_ret;	
	number_format($stock_ret,0);
	
	
	
	
	?><?php $avail_prod=$rec_prod-$all_sold_prod+$prod_ret-$stock_ret;//echo $rows->curr_bp;?>
	<?php $bp=$rows->curr_bp;?>
	<?php number_format($curr_rate=$rows->exchange_rate,2);?>

<?php 
	
	
	
	
	
	number_format($ttl_cost=$avail_prod*$bp*$curr_rate,2);
	
	
	
	
	?>
	
	
	
	
	
	
	<?php 
	$purchase_order_id=$rows->purchase_order_id;
    $order_code=$rows->order_code;
	
	$sqlxx="select purchase_order.product_id,purchase_order.currency_code,purchase_order.curr_rate,suppliers.supplier_name,purchase_order.purchase_order_id,purchase_order.quantity,purchase_order.vendor_prc,products.curr_bp,products.product_id,products.product_name,
products.prod_code,products.reorder_level,received_stock.quantity_rec,received_stock.supplier_id,products.pack_size,products.weight,received_stock.delivery_date,received_stock.expiry_date from purchase_order,products,suppliers, received_stock 
where purchase_order.supplier_id=suppliers.supplier_id and products.product_id=received_stock.product_id AND purchase_order.product_id=received_stock.product_id and purchase_order.order_code=received_stock.order_code and purchase_order.order_code='$order_code' and purchase_order.purchase_order_id='$purchase_order_id'";
$resultsxx= mysql_query($sqlxx) or die ("Error $sqlxx.".mysql_error());
$rowsxx=mysql_fetch_object($resultsxx);

number_format($v_price=$rowsxx->vendor_prc,2);
$curr_rate=$rowsxx->curr_rate;
	//echo $curr_bp=$rows->curr_bp;?>
	<?php
	
$reorder_level=$rows->reorder_level;
	
	
	?>
  
	
	<?php 
	
	
	if ($reorder_level>=$avail_prod)
	
	{
	
	
	
	}
	
	
	?>
	
	
	
  <?php 
  $grnt_amnt_ttl_cost=$grnt_amnt_ttl_cost+$ttl_cost;
  $ttl_stock=$ttl_stock+$avail_prod;
  $ttl_qnty_sold=$ttl_qnty_sold+$all_sold_prod;
  $cost_of_sales=$cost_of_sales+$ttl_cost_of_sales;
  }
  ?>
  

	
  
  
  <?php 
  
  
  }
  
  else
  {
  
  ?>
  
  
 
  
	
	<?
  
  }
  ?>

  
  

	
	

    <td width="2%" colspan="2" align="right"> <strong><?php echo number_format($cost_of_sales,2); ?></strong></td>
    
</tr>