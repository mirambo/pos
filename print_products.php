<?php 
include('includes/session.php');
include('Connections/fundmaster.php');

header("Content-Type: application/vnd.ms-word");
header("Content-Disposition: attachment;Filename=Products_List.doc");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
$cat_id=$_GET['cat_id'];
$product_name=$_GET['product_name'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="<?php echo $base_url;?>style.css" />

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

<body>
<table width="100%" border="0" align="center" >
  
	
	 <?php 
  
$querysup="select * from clients where client_id ='$sess_client_id'";
$resultssup=mysql_query($querysup) or die ("Error: $querysup.".mysql_error());
$rowssupp=mysql_fetch_object($resultssup);

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
        <!--Tel : +254 (0) 538004579 -->
    Mobile: <?php echo $rowscont->phone; ?></div></td>
  </tr>
  <tr>
    <td colspan="7"><div align="right">
        <!--Tel : +254 (0) 538004579 -->
    Telephone: <?php echo $rowscont->telephone; ?></div></td>
  </tr>
  <tr>
    <td colspan="7"><div align="right">Email : <?php echo $rowscont->email; ?></div></td>
  </tr>
   <tr>
    <td colspan="7"><div align="right">Website : www.briskdiagnostics.com</div></td>
  </tr>
  
  
  <tr height="30" >
    <td colspan="7" bgcolor="#000033" align="center"><span style="font-size:17px; font-weight:bold; color: #FFFFFF;">PRODUCTS LIST <?php echo date('Y')?></span></td>
  </tr>
  
  
 <!-- <tr height="20">
    <td colspan="6"  align="right">DATE : <?php //echo (Date("l F d, Y")); ?></td>
  </tr>
  
   <tr height="20">
    <td colspan="6"  align="right"><strong>INVOICE NO :  <?php 
	//echo $get_invoice_no;
	
	?>
	
	</strong></td>
  </tr>-->
 
  
  
</table>

<table width="100%" border="0" align="center">
  
  
   <tr style="background:url(images/description.gif);" height="30" >
    <td width="550"><div align="center"><strong>Product Name</strong></td>
    <td width="550"><div align="center"><strong>Category</strong></td>
	<td width="400"><div align="center"><strong>Product Code</strong></td>
	<td width="400"><div align="center"><strong>Pack Size</strong></td>
	<td width="400"><div align="center"><strong>Weight(Kgs)</strong></td>
	<td width="400"><div align="center"><strong>Re-order Level</strong></td>
	<td width="400"><div align="center"><strong>Selling Price (Kshs)</strong></td>
	<td width="400"><div align="center"><strong>BP (For. Curr)</strong></td>
	<td width="400"><div align="center"><strong>Exch. Rate</strong></td>
	<td width="400"><div align="center"><strong>BP (Kshs)</strong></td>

    </tr>
  
  <?php 
if ($cat_id==0 && $product_name=='')  
{
$sql="select products.pack_size,products.product_name,products.product_id,prod_code,products.pack_size,products.weight,products.reorder_level,products.curr_sp,
products.curr_bp,products.exchange_rate,products.currency_code,product_categories.cat_name,currency.curr_name from currency,products,product_categories
where products.cat_id=product_categories.cat_id and products.currency_code=currency.curr_id order by product_categories.cat_name asc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
if ($cat_id!=0 && $product_name=='')  
{
$sql="select products.pack_size,products.product_name,products.product_id,prod_code,products.pack_size,products.weight,products.reorder_level,products.curr_sp,
products.curr_bp,products.exchange_rate,products.currency_code,product_categories.cat_name,currency.curr_name from currency,products,product_categories
where products.cat_id=product_categories.cat_id and products.currency_code=currency.curr_id AND product_categories.cat_id='$cat_id' order by product_categories.cat_name asc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


}
if ($cat_id==0 && $product_name!='')  
{
$sql="select products.pack_size,products.product_name,products.product_id,prod_code,products.pack_size,products.weight,products.reorder_level,products.curr_sp,
products.curr_bp,products.exchange_rate,products.currency_code,product_categories.cat_name,currency.curr_name from currency,products,product_categories
where products.cat_id=product_categories.cat_id and products.currency_code=currency.curr_id AND products.product_name LIKE '%$prod_name%' order by product_categories.cat_name asc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}
if ($cat_id!=0 && $product_name!='')  
{
$sql="select products.pack_size,products.product_name,products.product_id,prod_code,products.pack_size,products.weight,products.reorder_level,products.curr_sp,
products.curr_bp,products.exchange_rate,products.currency_code,product_categories.cat_name,currency.curr_name from currency,products,product_categories
where products.cat_id=product_categories.cat_id and products.currency_code=currency.curr_id AND product_categories.cat_id='$cat_id' AND products.product_name LIKE '%$prod_name%' order by product_categories.cat_name asc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

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



</body>
</html>
