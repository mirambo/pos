<?php 
include('includes/session.php');
include('Connections/fundmaster.php');



$order_code=$_GET['order_code_id'];

$sqlrec="select order_code_get.lpo_no,order_code_get.shipper_id,order_code_get.supplier_id,order_code_get.order_code_id,order_code_get.freight_charge,order_code_get.comments,
order_code_get.currency,order_code_get.curr_rate,currency.curr_name,mop.mop_name,shippers.shipper_name,order_code_get.supplier_id,suppliers.supplier_name
FROM mop,shippers,currency,suppliers,order_code_get WHERE order_code_get.mop_id=mop.mop_id AND shippers.shipper_id=order_code_get.shipper_id AND 
order_code_get.currency=currency.curr_id AND order_code_get.supplier_id=suppliers.supplier_id AND order_code_get.order_code_id='$order_code'";
$resultsrec= mysql_query($sqlrec) or die ("Error $sqlrec.".mysql_error());	
$rowsrec=mysql_fetch_object($resultsrec);


$lpo_no=$rowsrec->lpo_no;
$supplier_id=$rowsrec->supplier_id;
$qnty_ordered=$_GET['qnty_ordered'];
$purchase_order_id=$_GET['purchase_order_id'];



header("Content-Type: application/vnd.ms-word");
header("Content-Disposition: attachment;Filename=Stock_Received_Note.doc");
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
<table width="700" border="0" align="center" >
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
    <td colspan="7" bgcolor="#000033" align="center"><span style="font-size:17px; font-weight:bold; color: #FFFFFF;">STOCK RECEIVED NOTE</span>
	
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
 

<table width="700" border="0" align="center">
 
	<?php 
$sql="select * from suppliers where supplier_id='$supplier_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$rows=mysql_fetch_object($results);
	
	?>
  
    <tr bgcolor="#FFFFCC" height="30" >
    <td width="400" colspan="7" align="center"><strong>LPO Number</strong> :
    <?php echo $lpo_no;?><strong>Supplier Name:</strong><?php echo $rows->supplier_name;?><strong>Total Stock Ordered: </strong><?php echo $qnty_ordered.' Items'; ?>
	</td>
    </tr>
	
	<tr style="background:url(images/description.gif);" height="30" >
	
    <td width="200"><div align="center"><strong>Product Code</strong></td>
    <td width="800"><div align="center"><strong>Product Name</strong></td>
	<td width="200"><div align="center"><strong>Quantity Ordered</strong></td>
    <td width="200"><div align="center"><strong>Qnty Received</strong></td>	
	 <td width="200"><div align="center"><strong>Balance Qnty</strong></td>	
    <td width="200"><div align="center"><strong>Delivery Date</strong></td>	
    <td width="200"><div align="center"><strong>Expiry Date</strong></td>	
   	
	

    </tr>
  
  <?php 
  
$sql="select products.product_name,products.pack_size,products.prod_code,purchase_order.quantity,
purchase_order.product_id,purchase_order.purchase_order_id,purchase_order.status,purchase_order.order_code from products
,purchase_order where purchase_order.product_id=products.product_id and purchase_order.order_code='$order_code'";
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
    <td><?php echo $rows->product_name.' ('.$rows->pack_size.')';?></td>
	<td align="center"><?php echo $qnty_ordered=$rows->quantity;?></td>
	
	<td align="center">
	<?php 
	
$p_id=$rows->product_id;
$sqlord1="select SUM(quantity_rec) as ttl_quant_rec,expiry_date,delivery_date from received_stock where product_id='$p_id' and order_code_id='$order_code'";
$resultsord1= mysql_query($sqlord1) or die ("Error $sqlord1.".mysql_error());
$rowsord1=mysql_fetch_object($resultsord1);
echo $qnty_rec=$rowsord1->ttl_quant_rec;
	?>
	
	
	</td>
	<td align="center">
	
	<?php echo $quant_bal=$qnty_ordered-$qnty_rec; ?>
	
	
	</td>
	<td align="center"><?php echo $rowsord1->delivery_date; ?></td>
	<td align="center"><?php echo $rowsord1->expiry_date; ?></td>
	
	
	
	
	
	
	
  
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
  <!--<tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
	 <td>&nbsp;</td>
	 <td>&nbsp;</td>
    <td align="center"><input type="submit" name="submit" value="Save Stock to the Warehouse">&nbsp;&nbsp;</td>
   
  </tr>-->
</table>







</body>
</html>
