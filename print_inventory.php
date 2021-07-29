<?php 
include ('includes/session.php');
include('Connections/fundmaster.php');
$date_month=$_GET['payment_month'];
$code=$_GET['code'];
$prod_name=$_GET['product_name'];	
$location_id=$_GET['location_id'];	

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
<table width="700" border="0" class="table" align="center">

<tr height="40"> <td colspan="16" align="center"><img src="images/logolpo.png" width="300" height="80"></td></tr>
<tr height="40"> <td colspan="16" align="center"><H2><?php echo $rowscont->cont_person;?></H2></td></tr>
<tr bgcolor="#FFFFCC">
   
    <td colspan="11" height="31" align="center">
<H2>List Of All Stock Inventory</H2>
	
	</td>
	
    </tr>

  
   
   <tr style="background:url(images/description.gif);" height="30" >
    <td width="7%"><div align="center"><strong>Item Code</strong></td>
    <td width="18%"><div align="center"><strong>Item Name</strong></td>
    <td width="13%"><div align="center"><strong>Category</strong></td>
    <td align="center" width="50"><strong>Item Sub Category</strong></td>
	<td width="6%"><div align="center"><strong>Qty Recv</strong></td>
	<td width="6%"><div align="center"><strong>Qty Retrn</strong></td>
	<td width="6%"><div align="center"><strong>Qty Sold</strong></td>
    <td width="6%"><div align="center"><strong>Qty Avlb</strong></td>
	<td width="6%"><div align="center"><strong>BP</strong></td>
	<td width="6%"><div align="center"><strong>Value(Kshs)</strong></td>

	
    <td width="7%"><div align="center"><strong>Reorder level  </strong></td>
    </tr>


 <?php  

$queryop= "SELECT * FROM items,items_category";
    $conditions = array();
	
if($code!='' ) 
 {
	
      $conditions[] = "items.item_code LIKE '%$code%' ";
} 

 if($prod_name!=0) 
 {
	
      $conditions[] = "items.item_id='$prod_name'";
}

 if($location_id!=0) 
 {
	
      $conditions[] = "items.cat_id='$location_id'";
}


 	
if (count($conditions) > 0) 
	
    
 {


$queryop .= " WHERE " . implode(' AND ', $conditions)." and items.cat_id=items_category.cat_id order by item_name asc";
//$queryop .= " order by task_name asc";
 
 
 }
 
 else
 {

$queryop="SELECT * FROM items,items_category where items.cat_id=items_category.cat_id order by item_name asc";
$results= mysql_query($queryop) or die ("Error $queryop.".mysql_error());
 
 
 }
	
	

    $results = mysql_query($queryop) or die ("Error $queryop.".mysql_error());
	


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
 
$prod_id=$rows->item_id;
 ?>
  <td><?php echo $rows->item_code;?></td>
   <td><?php echo $rows->item_name; $curr_sp=$rows->curr_sp; $curr_rate=$rows->exchange_rate;?></td>

<td><?php echo $rows->cat_name;?></td>

 <td><?php $sub_cat_id=$rows->sub_cat_id;
 $query_valc = mysql_query("SELECT sub_cat_name FROM items_sub_category WHERE sub_cat_id ='$sub_cat_id'");
$row_valc = mysql_fetch_array($query_valc);
   echo $row_valc['sub_cat_name']; 
   ?></td>
    <td align="center">
	
	<?php 
	
$sqlrec="select SUM(quantity_rec) as ttl_rec from received_stock
	where product_id='$prod_id' AND status='1'";
	$resultsrec= mysql_query($sqlrec) or die ("Error $sqlrec.".mysql_error());
	$rowsrec=mysql_fetch_object($resultsrec);
	
 	
	echo number_format($rec_prod=$rowsrec->ttl_rec,0);
	$curr_bp=$rows->curr_bp;
	$curr_sp=$rows->curr_sp;
	
	$ttl_rec=$ttl_rec+$rec_prod;
	
   
	$purchase_order_id=$rows->purchase_order_id; 
	
	
	
	?></td>
	
	<td align="center">
	
	<?php 
	
$sqlrec22="select SUM(quantity) as ttl_ret from sales_returns_items
where item_id='$prod_id'";
$resultsrec22= mysql_query($sqlrec22) or die ("Error $sqlrec22.".mysql_error());
$rowsrec22=mysql_fetch_object($resultsrec22);
	
 	
	echo number_format($ret_prod=$rowsrec22->ttl_ret,0);
	$curr_bp=$rows->curr_bp;
	$curr_sp=$rows->curr_sp;
	
	$ttl_ret=$ttl_ret+$ret_prod;
	
   
	$purchase_order_id=$rows->purchase_order_id; 
	
	
	
	?></td>
		

	<td align="center">
	
	
	<?php 
	
	$sqlsold2="select SUM(item_quantity) as ttl_sold from sales_item
	where item_id='$prod_id' and status='0'";
	$resultssold2= mysql_query($sqlsold2) or die ("Error $sqlsold2.".mysql_error());
	$rowsold2=mysql_fetch_object($resultssold2);
	
  number_format($prod_sold=$rowsold2->ttl_sold-$ret_prod,0);
 
	echo number_format($prod_sold,0);

$ttl_cash_sold=$ttl_cash_sold+$prod_sold;
		
	?></td>
	

	<td align="center"><strong><font size="">
	
	
	<?php echo number_format($avail_prod=$rec_prod+$ret_prod-$prod_sold,2);
	
	$ttl_avl=$ttl_avl+$avail_prod;
	
	
	
	//echo $rows->curr_bp;?></strong></td>
	<td align="right"><?php echo number_format($curr_bp=$rows->curr_bp,2); ?></td>
	<td align="right"><strong><?php echo number_format($stock_value=$curr_bp*$avail_prod,2); 
	
	$ttl_stock_value=$ttl_stock_value+$stock_value;
	?><strong></td>


<!--<td align="center">

	<?php
if ($user_group_id==15)
{
?>

<a rel="facebox" href="adjust_stock.php?item_id=<?php echo $rows->item_id;?>&avail_stock=<?php echo $avail_prod; ?>">Adjust Stock Item</a>
<?php 

}
else
{
	
	
}
?>

</td>-->
	
	<td align="center"><strong><?php
	
echo $reorder_level=$rows->reorder_level;
	
	
	?></strong></td>
  
	
	
  
    </tr>
  <?php 
  /* $grnt_amnt_ttl_cost=$grnt_amnt_ttl_cost+$ttl_cost;
  $ttl_stock=$ttl_stock+$avail_prod;
  $ttl_qnty_sold=$ttl_qnty_sold+$all_sold_prod;
  $grnd_ttl_cost_of_sales=$grnd_ttl_cost_of_sales+$ttl_cost_of_sales; */
  }
  ?>
  <tr bgcolor="#FFFFCC" height="30">
    <td width="400"><div align="center"><strong></strong></td>
    <td width="400"><div align="center"><strong></strong></td>
	<td width="300"><div align="center"><strong></strong></td>
	<td width="300"><div align="center"><strong>Totals</strong></td>
	<td width="300"><div align="center"><strong><?php echo number_format($ttl_rec,0); ?></strong></td>
	<td width="300"><div align="center"><strong><?php echo number_format($ttl_ret,0); ?></strong></td>
    <td width="300"><div align="center"><strong><?php echo number_format($ttl_cash_sold,0); ?></strong></td>
	<td width="400"><div align="center"><strong><?php echo number_format($ttl_avl,0); ?></strong></td>
	<td width="400"><div align="center"><strong></strong></td>
	<td width="400" colspan="2" align="left"><strong><font size="+1" color="#ff0000"><?php echo number_format($ttl_stock_value,0); ?></font></strong></td>

	<!--<td width="300"><div align="right"><strong></strong></td>-->




    </tr>
  
  
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


