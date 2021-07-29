<?php 
include ('includes/session.php');
include('Connections/fundmaster.php');
$date_month=$_GET['payment_month'];

header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment;Filename=Inventory.xls");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");

?>
<title>Safaricom - Outlet Visit Dashboard Report</title>
<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>
<script type="text/javascript" src="calender/calendar.js"></script>
<script type="text/javascript" src="calender/lang/calendar-en.js"></script>
<script type="text/javascript" src="calender/calendar-setup.js"></script>
<link rel="stylesheet" href="csspr.css" type="text/css" />

<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>

<style type="text/css">

@import url(calender/calendar-win2k-1.css);

</style>

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
<body onLoad="window.print();">
<table width="1000" border="1"  align="center">


<tr height="40"> <td colspan="12" align="center"><H5>JUBA STATIONERY AND PRINTING COMPANY LIMITED</H5></td></tr>
<tr bgcolor="#FFFFCC">
   
    <td colspan="12" height="30" align="center">
<H6>List Of Items In The Store (Inventory)</H6>
	
	</td>
	
    </tr>
 <tr style="background:url(images/description.gif);" height="30" >
	<td width="7%"><strong>Product Code</strong></td>
    <td width="18%"><strong>Product Name</strong></td>

    <td width="6%"><strong>Qty Recv</strong></td>
	<td width="6%"><strong>Qty Sold</strong></td>
	<td width="6%"><strong>Sales Ret</strong></td>
	<td width="6%"><strong>Purch Ret</strong></td>
	<td width="6%"><strong>Qty Avlb</strong></td>
	<td width="9%"><strong>Product Value </strong></td>
	<td width="8%"><strong>Ex. Rate</strong></td>
    <td width="10%" ><strong>Product Value(SSP)</strong></td>
    <td width="7%"><strong>Reorder level </strong></td>
    <td width="16%"><strong>Alert Now</strong></td>
    </tr>


  </tr>
	<?php 

//$grnd_ttl_cost_of_sales=0;  
$tt_received_prod=0;
if (!isset($_POST['generate']))
{
		 
$sql="select products.pack_size,products.curr_bp,products.curr_sp,products.product_id,products.product_name,products.prod_code,products.exchange_rate,products.reorder_level,SUM(received_stock.quantity_rec) as ttl_quant,
products.weight,received_stock.delivery_date,received_stock.expiry_date,received_stock.order_code_id from product_categories,products,received_stock 
where products.cat_id=product_categories.cat_id AND products.product_id=received_stock.product_id group by received_stock.product_id ORDER BY products.product_name asc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
else
{

$code=$_POST['code'];
$prod_name=$_POST['prod_name'];
if ($prod_name!=''&& $code=='')
{
$sql="select products.pack_size,products.curr_bp,products.curr_sp,products.product_id,products.product_name,products.prod_code,products.exchange_rate,products.reorder_level,SUM(received_stock.quantity_rec) as ttl_quant,
products.weight,received_stock.delivery_date,received_stock.expiry_date,received_stock.order_code_id from product_categories,products,received_stock 
where products.cat_id=product_categories.cat_id AND products.product_id=received_stock.product_id AND products.product_name LIKE '%$prod_name%' group by received_stock.product_id ORDER BY products.product_name asc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}

elseif ($prod_name==''&& $code!='')
{
$sql="select products.pack_size,products.curr_bp,products.curr_sp,products.product_id,products.product_name,products.prod_code,products.exchange_rate,products.reorder_level,SUM(received_stock.quantity_rec) as ttl_quant,
products.weight,received_stock.delivery_date,received_stock.expiry_date,received_stock.order_code_id from product_categories,products,received_stock 
where products.cat_id=product_categories.cat_id AND products.product_id=received_stock.product_id AND products.prod_code LIKE '%$code%' group by received_stock.product_id ORDER BY products.product_name asc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}

else
{
$sql="select products.pack_size,products.curr_bp,products.curr_sp,products.product_id,products.product_name,products.prod_code,products.exchange_rate,products.reorder_level,SUM(received_stock.quantity_rec) as ttl_quant,
products.weight,received_stock.delivery_date,received_stock.expiry_date,received_stock.order_code_id from product_categories,products,received_stock 
where products.cat_id=product_categories.cat_id AND products.product_id=received_stock.product_id group by received_stock.product_id ORDER BY products.product_name asc";
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
 $prod_id=$rows->product_id;
 
 ?>
  <td><?php echo $rows->prod_code;?></td>
    <td><?php echo $rows->product_name; $curr_sp=$rows->curr_sp; $curr_rate=$rows->exchange_rate;?></td>


    <td align="center">
	
	<?php
$sqladj="select SUM(quantity_adjusted) as ttl_adj_prod from adjusted_items
	where item_id='$prod_id'";
	$resultsadj= mysql_query($sqladj) or die ("Error $sqladj.".mysql_error());
	$rowsadj=mysql_fetch_object($resultsadj);
	
	 $adj_quant=$rowsadj->ttl_adj_prod;
	
	echo number_format($rec_prod=$rows->ttl_quant+$adj_quant,0);


	
	//echo number_format($rec_prod=$rows->ttl_quant,0);
	$curr_bp=$rows->curr_bp;
	$curr_sp=$rows->curr_sp;
	
    
	$purchase_order_id=$rows->purchase_order_id;
	
	$tt_received_prod=$tt_received_prod+$rec_prod;
	
	?></td>
		
		
		<?php 
//released items	

 $sqlsoldr="select SUM(released_item.released_quantity) as ttl_rel_prod from released_item
	where released_item.item_id='$prod_id' AND status='0'";
	$resultssoldr= mysql_query($sqlsoldr) or die ("Error $sqlsoldr.".mysql_error());
	$rowsoldr=mysql_fetch_object($resultssoldr);
	
 //echo number_format($releases_prod=$rowsoldr->ttl_rel_prod,0);

 //sold items 
$sqlsold="select SUM(requisition_item.item_quantity) as ttl_sold_prod from requisition_item
	where requisition_item.item_id='$prod_id'";
	$resultssold= mysql_query($sqlsold) or die ("Error $sqlsold.".mysql_error());
	$rowsold=mysql_fetch_object($resultssold);
	
  
 






		?>
		<td align="center">
	
	
	<?php 
	 echo number_format($sold_prod=$rowsold->ttl_sold_prod,0);
	
	
	?></td>

	<td align="center"><?php 
	
$prod_id=$rows->product_id;	
$sq="select SUM(sales_returns_items.quantity) as ttl_sales_ret from sales_returns_items where sales_returns_items.product_id='$prod_id'";
$res= mysql_query($sq) or die ("Error $sq.".mysql_error());
$ro=mysql_fetch_object($res);

$sales_ret=$ro->ttl_sales_ret;	
echo number_format($sales_ret,0);

$ttl_sr=$ttl_sr+$sales_ret;	
	
	
	
	//echo number_format($prod_ret,0);
	
	
	
	
	?></td>
	<td align="center"><?php 
$prod_id=$rows->product_id;	
$sqlstockret="select SUM(purchase_returns_items.quantity) as ttl_stock_ret from purchase_returns_items where purchase_returns_items.product_id='$prod_id'";
$resultsstockret= mysql_query($sqlstockret) or die ("Error $sqlstockret.".mysql_error());
$rowsstockret=mysql_fetch_object($resultsstockret);

$stock_ret=$rowsstockret->ttl_stock_ret;	
echo number_format($stock_ret,0);

$ttl_pr=$ttl_pr+$stock_ret;
	
	
	
	
	?></td>
	<td align="center"><?php echo $avail_prod=$rec_prod-$sold_prod+$sales_ret-$stock_ret;//echo $rows->curr_bp;?></td>
	<td align="right"><?php echo number_format($bp=$rows->curr_bp,2);?></td>
	<td align="right"><?php echo number_format($curr_rate=$rows->exchange_rate,2);?></td>

	<td align="right"><?php 
	
	
	echo number_format($ttl_cost=$avail_prod*$bp*$curr_rate,2);
	
	
	
	
	?>
	
	
	
	
	
	</td>
	
	<td align="center"><strong><?php
	
echo $reorder_level=$rows->reorder_level;
	
	
	?></strong></td>
  
	<td align="center">
	
	<?php 
	
	
	if ($reorder_level>=$avail_prod)
	
	{
	
	echo "<blink><font color='#ff0000'>Reorder</font></blink>";
	
	}
	
	
	?>
	
	
	</td>
	
  
    </tr>
  <?php 
  $grnt_amnt_ttl_cost=$grnt_amnt_ttl_cost+$ttl_cost;
  $ttl_stock=$ttl_stock+$avail_prod;
  $ttl_qnty_sold=$ttl_qnty_sold+$sold_prod;
  $grnd_ttl_cost_of_sales=$grnd_ttl_cost_of_sales+$ttl_cost_of_sales;
  }
  ?>
  <tr bgcolor="#FFFFCC" height="30">
    <td ><div align="center"><strong></strong></td>
	<td ><div align="center"><strong></strong></td>
	<td ><div align="center"><strong><?php echo number_format($tt_received_prod,0);?></strong></td>
	
    <td ><div align="center"><strong><?php echo $ttl_qnty_sold; ?></strong></td>
		<td ><div align="center"><strong><?php echo $ttl_sr; ?></strong></td>
	<td ><div align="center"><strong><?php echo $ttl_pr; ?></strong></td>

	<td ><div align="center"><strong><?php echo $ttl_stock; ?></strong></td>
	<td ><div align="center"></td>
	<td ><div align="right"><strong></strong></td>

	<td ><div align="right"><strong><?php echo number_format($grnt_amnt_ttl_cost,2);?></strong></td>

	<td ><div align="center"></td>
	<td ><div align="center"></td>
  
  
  <?php 
  
  
  }
  
  else
  {
  
  ?>
  
  
  <tr bgcolor="#FFFFCC">
   
    <td colspan="13" height="30" align="center"> 
	<font color="#ff0000">No Results found!!</font>
	
	</td>
	
    </tr>
	
	<?
  
  }
  ?>
</table>
</body>


