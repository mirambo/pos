<?php 
include('includes/session.php');
include('Connections/fundmaster.php');
$id=$_GET['shareholder_id'];
$date_from=$_GET['date_from'];
$date_to=$_GET['date_to'];
$sqlcap="SELECT * FROM shares where shares_id='$id'";
$resultscap= mysql_query($sqlcap) or die ("Error $sqlcap.".mysql_error());
$rowscap=mysql_fetch_object($resultscap);
$shareholder=$rowscap->share_holder_name;



header("Content-Type: application/vnd.ms-word");
header("Content-Disposition: attachment;Filename=Warehouse_Stock.doc");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Shareholder Statement </title>
<link rel="stylesheet" type="text/css" href="<?php echo $base_url;?>style.css"/>

<!-- CSS goes in the document HEAD or added to your external stylesheet -->
<style type="text/css">
.table
{
border-collapse:collapse;
}
.table td, tr
{
border:1px solid black;
padding:3px;
}
</style>

<!-- Table goes in the document BODY -->


</head>

<body onload="window.print();">
 


<table width="100%" border="0" align="center" >
<?php 
  



$querycont="select * from company_contacts order by contacts_id desc limit 1";
$resultscont=mysql_query($querycont) or die ("Error: $querycont.".mysql_error());
$rowscont=mysql_fetch_object($resultscont);
  
  
  ?>
  <tr>
    <td colspan="7" align="right"><img src="<?php echo $base_url;?>images/logolpo.png" /></td>
  </tr>
  <tr>
    <td colspan="7"><div align="right"><?php echo $rowscont->building.' '.$rowscont->street; ?><!--Kigali Road, Jamia Plaza, 2nd Floor --></div></td>
  </tr>
   <tr>
    <td colspan="7"><div align="right">
    Mobile: <?php echo $rowscont->phone; ?></div></td>
  </tr>
  <tr>
    <td colspan="7"><div align="right">
    Telephone: <?php echo $rowscont->telephone; ?></div></td>
  </tr>
  <tr>
    <td colspan="7"><div align="right">Email : <?php echo $rowscont->email; ?></div></td>
  </tr>
  <tr>
    <td colspan="7"><div align="right">Website : www.briskdiagnostics.com</div></td>
  </tr>

  <tr height="30">
    <td colspan="7" bgcolor="#000033" align="center"><span style="font-size:17px; font-weight:bold; color: #FFFFFF;">INVENTORY STOCK REPORT</span>
	
	</td>
  </tr>


  <tr height="20">
 <td colspan="7"  align="center" ><hr/>

<!--<strong>Period From : <font color="#ff0000"><?php echo $date_from; ?></font> To :  <font color="#ff0000"><?php echo $date_to; ?></font> </strong>-->
<div style="float:left; height:30px; "><strong><font size="+1"> <?php echo $shareholder; ?></font></strong></div>
<div style="float:right;"><strong> Date Printed : <?php echo date('d F, Y')?></strong></div>
  </tr>
	
	
	<hr/>
	
	</td>
  </tr>

</table>
<table width="100%" border="0" align="center" class="table">
<tr style="background:url(images/description.gif);" height="30" >
	<td width="7%"><div align="center"><strong>Product Code</strong></td>
    <td width="18%"><div align="center"><strong>Product Name</strong></td>
	<td width="5%"><div align="center"><strong>Pack Size</strong></td>
	<!--<td width="300"><div align="center"><strong>Weight</strong></td>-->

    <td width="6%"><div align="center"><strong>Qty Recv</strong></td>
	<td width="6%"><div align="center"><strong>Qty Sold</strong></td>
	<td width="6%"><div align="center"><strong>Sales Ret</strong></td>
	<td width="6%"><div align="center"><strong>Purch Ret</strong></td>
	<td width="6%"><div align="center"><strong>Qty Avlb</strong></td>
	<td width="9%"><div align="center"><strong>BP (USD)</strong></td>
	<td width="8%"><div align="center"><strong>Ex. Rate</strong></td>
    <td width="10%" ><div align="center"><strong>BP (Kshs)</strong></td>
    <td width="7%"><div align="center"><strong>Reorder level  </strong></td>
    <!--<td width="16%"><div align="center"><strong>Alert Now</strong></td>-->
    </tr>
  
  <?php 
  
$sql="select products.pack_size,products.curr_bp,products.product_id,products.product_name,products.prod_code,products.exchange_rate,products.reorder_level,SUM(received_stock.quantity_rec) as ttl_quant,
products.weight,received_stock.delivery_date,received_stock.expiry_date,received_stock.purchase_order_id,received_stock.order_code from products,received_stock 
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
	<!--<td align="center"><?php echo $rows->weight;?></td>-->

    <td align="center">
	
	<?php echo 	$rec_prod=$rows->ttl_quant;
	
    $prod_id=$rows->product_id;
	$purchase_order_id=$rows->purchase_order_id;
	
	$sqlsold="select SUM(sales.quantity) as ttl_sold_prod from sales where sales.product_id='$prod_id'";
	$resultssold= mysql_query($sqlsold) or die ("Error $sqlsold.".mysql_error());
	$rowsold=mysql_fetch_object($resultssold);
	
$sold_prod=$rowsold->ttl_sold_prod;
	
	
	
$sqlprodcashsold="select SUM(cash_sales.quantity) as ttl_cash_sold_prod from cash_sales where cash_sales.product_id='$prod_id'";
$resultsprodcashsold= mysql_query($sqlprodcashsold) or die ("Error $sqlprodcashsold.".mysql_error());
$rowprodcashsold=mysql_fetch_object($resultsprodcashsold);


$prod_cash_sold=$rowprodcashsold->ttl_cash_sold_prod;


$sqlret="select SUM(sales_returns.sales_return_quantity ) as ttl_sales_ret from sales_returns where sales_returns.product_id='$prod_id'";
$resultsret= mysql_query($sqlret) or die ("Error $sqlret.".mysql_error());
$rowsret=mysql_fetch_object($resultsret);

$prod_ret=$rowsret->ttl_sales_ret;
	

	
	
	?></td>
	

	<td align="center"><?php echo number_format($all_sold_prod=$sold_prod+$prod_cash_sold,0);?></td>
	<td align="center"><?php echo number_format($prod_ret,0);?></td>
	<td align="center"><?php 
$prod_id=$rows->product_id;	
$sqlstockret="select SUM(stock_returns.stock_return_quantity) as ttl_stock_ret from stock_returns where stock_returns.product_id='$prod_id'";
$resultsstockret= mysql_query($sqlstockret) or die ("Error $sqlstockret.".mysql_error());
$rowsstockret=mysql_fetch_object($resultsstockret);

$stock_ret=$rowsstockret->ttl_stock_ret;	
	echo number_format($stock_ret,0);
	
	
	
	
	?></td>
	<td align="center"><?php echo $avail_prod=$rec_prod-$all_sold_prod+$prod_ret-$stock_ret;//echo $rows->curr_bp;?></td>
	<td align="center"><?php echo $bp=$rows->curr_bp;?></td>
	<td align="right"><?php echo number_format($curr_rate=$rows->exchange_rate,2);?></td>

	<td align="right"><?php 
	
	
	
	
	
	echo number_format($ttl_cost=$avail_prod*$bp*$curr_rate,2);
	
	
	
	
	?>
	
	
	
	
	
	</td>
	<!--<td align="center"><strong><?php //echo $avail_prod;?><?php 
	$purchase_order_id=$rows->purchase_order_id;
    $order_code=$rows->order_code;
	
	$sqlxx="select purchase_order.product_id,purchase_order.currency_code,purchase_order.curr_rate,suppliers.supplier_name,purchase_order.purchase_order_id,purchase_order.quantity,purchase_order.vendor_prc,products.curr_bp,products.product_id,products.product_name,
products.prod_code,products.reorder_level,received_stock.quantity_rec,received_stock.supplier_id,products.pack_size,products.weight,received_stock.delivery_date,received_stock.expiry_date from purchase_order,products,suppliers, received_stock 
where purchase_order.supplier_id=suppliers.supplier_id and products.product_id=received_stock.product_id AND purchase_order.product_id=received_stock.product_id and purchase_order.order_code=received_stock.order_code and purchase_order.order_code='$order_code' and purchase_order.purchase_order_id='$purchase_order_id'";
$resultsxx= mysql_query($sqlxx) or die ("Error $sqlxx.".mysql_error());
$rowsxx=mysql_fetch_object($resultsxx);

echo number_format($v_price=$rowsxx->vendor_prc,2);
$curr_rate=$rowsxx->curr_rate;
	//echo $curr_bp=$rows->curr_bp;?></strong></td>-->
	<td align="center"><strong><?php
	
echo $reorder_level=$rows->reorder_level;
	
	
	?></strong></td>
  
	<!--<td align="center">
	
	<?php 
	
	
	if ($reorder_level>=$avail_prod)
	
	{
	
	echo "<blink><font color='#ff0000'>Reorder</font></blink>";
	
	}
	
	
	?>
	
	
	</td>-->
	
  
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
    <td width="300"><div align="center"><strong></strong></td>
	<td width="400"><div align="center"><strong></strong></td>
	<td width="400"><div align="center"><strong></strong></td>
	<td width="300"><div align="center"></td>
	<td width="300"><div align="right"><strong></strong></td>
	<td width="300"><div align="center"></td>
	<td width="300"><div align="center"><strong><?php echo number_format($grnt_amnt_ttl_cost,2);?></strong></td>
	
	<td width="300"><div align="center"></td>
	<!--<td width="300"><div align="center"></td>

	<td width="200"><div align="center"><strong><font size="+1"><?php echo number_format($grnt_amnt,2); ?></font></strong></td>
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
   
    <td colspan="11" height="30" align="center"> 
	<font color="#ff0000">No Results found!!</font>
	
	</td>
	
    </tr>
	
	<?
  
  }
  ?>

</table>








</body>
</html>
