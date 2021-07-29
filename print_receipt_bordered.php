<?php 
include('includes/session.php');
include('Connections/fundmaster.php');
//$get_latest_invoice_id=$_GET['invoice_id'];
//$get_latest_client_id=$_GET['client_id'];
//$get_latest_sales_id=$_GET['sales_code'];
$cash=$_GET['cash'];

/* if ($direct==1)
{
$invoice_payment_id=$_GET['invoice_payment_id'];
}
else
{
$invoice_payment_id=$_POST['invoice_payment'];
} */

$sales_id=$_GET['sales_id'];
$sqlrec="SELECT * FROM invoice_payments WHERE sales_id='$sales_id' and receipt_no=''";
$resultsrec= mysql_query($sqlrec) or die ("Error $sqlrec.".mysql_error());	
$rowsrec=mysql_fetch_object($resultsrec);
$rec_date=$rowsrec->date_paid;

//$amount_received=$rowsrec->amount_received;





$terms=$rowsrec->terms;
$vehicle_make=$rowsrec->vehicle_make;
$vehicle_model=$rowsrec->vehicle_model;
$engine=$rowsrec->engine;
$odometer=$rowsrec->odometer;
$chasis_no=$rowsrec->chasis_no;
$trim_code=$rowsrec->trim_code;
$reg_no=$rowsrec->reg_no;
$bk_user_id=$rowsrec->user_id;

$sqlj= "SELECT * FROM sales WHERE sales_id='$sales_id'";
$resultsj= mysql_query($sqlj) or die ("Error $sqlj.".mysql_error());
$rowsj=mysql_fetch_object($resultsj);
$date_generated=$rowsj->sale_date;
$jb_user_id=$rowsj->user_id;
$client_id=$rowsj->customer_id;
$vehicle_description=$rowsj->vehicle_description;
$vat=$rowsj->vat;
$discount=$rowsj->discount;
$sale_type=$rowsj->sale_type;
$terms=$rowsj->general_remarks;
$order_no=$rowsj->order_no;
$invoice_no=$rowsj->invoice_no;
$delivery_address=$rowsj->delivery_address;



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>
Workshop Job Card <?php echo $invoice_no; ?></title>
<link rel="stylesheet" type="text/css" href="<?php echo $base_url; ?>style.css"  />

<!-- CSS goes in the document HEAD or added to your external stylesheet -->
<style type="text/css">
.table
{
border-collapse:collapse;
border-radius: 0px;
    border: 2px solid #73AD21;
}
.table td, tr
{
border:2px solid black;
padding:3px;
}


span {
line-height:20px;	

	
}

legend
{
font-weight:bold;	
	
}
</style>

<!-- Table goes in the document BODY -->


</head>

<body onload="window.print();" style="background:none;">




<table width="700" border="0" align="center">	
	 <?php 
  
$querysup="select * from customer where customer_id ='$client_id'";
$resultssup=mysql_query($querysup) or die ("Error: $querysup.".mysql_error());
$rowssupp=mysql_fetch_object($resultssup);


$querycont="select * from company_contacts order by contacts_id desc limit 1";
$resultscont=mysql_query($querycont) or die ("Error: $querycont.".mysql_error());
$rowscont=mysql_fetch_object($resultscont); 
  
  
  ?>
  
  
 <tr>
 <td width="50%">
 <span style="margin-top:-60px;"><strong><font size="+1" color="#ff0000">INVOICE</font></strong><span>
 <span style="margin:auto; float:right;"><a   href="print_receipt_bordered.php?sales_id=<?php echo $sales_id; ?>"><img src="images/print_icon.gif"></a></span>
 <fieldset style="height:50px; width:80%; border-radius:5px; border:2px solid #000;">
  <legend>RECEIPT NO: </legend>

  <strong><?php echo $invoice_no?></strong>
  
  
</fieldset>
 
 
 
 
 </td>
 <td align="right" width="50%"><img src="images/logo_print.jpg" width="300" height="100"></td>
 
 
 
 </tr> 
 
  <tr>
 <td width="50%">
 <fieldset style="height:90px; width:80%; border-radius:5px; border:2px solid #000;">
  <legend>CASH SALES TO: </legend>
  
 <?php 
 
 echo '<span>'.$rowssupp->customer_name.'</span>'; 
 
 echo "</br>";
 
 echo '<span>P.O BOX'. $rowssupp->address.' </span>'; 
 
 echo '<span>'.$rowssupp->town.'</span>';
 
  echo "</br>";
  
  echo '<span>'. $rowssupp->phone.' </span>'; 
  
    echo "</br>";
  
  echo '<span>'. $rowssupp->email.' </span>'; 
 
 ?> 
  

</fieldset>
 
 
 
 
 </td>
 <td align="right" width="50%" valign="top"><span>
P.O. BOX <?php
echo $rowscont->address.' '.$rowscont->town;
 ?>

 </br>
<?php
echo $rowscont->building.' '.$rowscont->street;
 ?>
  </span>
  </br>
 <span> TEL :
<?php
echo $rowscont->telephone.' '.$rowscont->phone;
 ?> </span>
  </br>
 <span> EMAIL :
<?php
echo $rowscont->email;
 ?>
 </span> 
   </br>
 <span> WEBSITE :
<?php
echo $rowscont->fax;
 ?>
 
 </span>
 </td>
 
 
 
 </tr> 
  
 <tr>
 <td width="50%">
 <fieldset style="height:80px; width:80%; border-radius:5px; border:2px solid #000;">
  ORDER NO : <?php echo $order_no;?>
  </br>
  </br>

  
  SALE DATE : <?php echo $date_generated;?>
   </br>
  </br>

TERMS :

<?php echo $terms;?>
</fieldset>
 
 
 
 
 </td>
 <td align="right" width="50%" valign="top">
  <fieldset style="height:100px; width:80%; border-radius:5px; border:2px solid #000; margin-top:-14px;">
  <legend>DELIVERED TO: </legend>
  
  <?php 
 
/*  echo '<span style="float:left;">'.$rowssupp->customer_name.'</span>'; 
 
 echo "</br>";
 
 echo '<span style="float:left;">P.O BOX'. $rowssupp->address.''.$rowssupp->town.' </span>'; 
 
 
  echo "</br>";
  
  echo '<span style="float:left;">'. $rowssupp->phone.' </span>'; 
  
    echo "</br>";
  
  echo '<span style="float:left;">'. $rowssupp->email.' </span>';  */
  
  echo '<span style="float:right;">'.$delivery_address.'</span>';
 
 ?> 

</fieldset>
<strong><font size="+1">PIN : 
<?php
echo $rowscont->pin;
 ?>
 </font></strong>
 </td>
 
 
 
 </tr>  
  
  
  
</table>



<table width="700" class="table" border="1" height="50" align="center">
<tr height="8%" style="border:1px solid #ff0000;" align="center">
<td width="10%"><strong>CODE</strong></td>
<td width="60%"><strong>PRODUCT DESCRIPTION</strong></td>
<td width="5%"><strong>QTY</strong></td>
<td width="8%"><strong>UNIT </br>PRICE</strong></td>
<td width="10%"><strong>TOTAL</strong></td>

</tr>
</table>
<div style="width:696px; height:450px; background:#fff; border-top:none; margin:auto; border-right:2px solid #000; border-left:2px solid #000;">
<table width="700"  border="0" align="center" style="margin:auto;">
<?php
$task_totals=0;
$sqlts="SELECT * from sales_item,items where sales_item.item_id=items.item_id and sales_item.sales_id='$sales_id' 
order by sales_id asc";
$resultsts= mysql_query($sqlts) or die ("Error $sqlts.".mysql_error());
if (mysql_num_rows($resultsts) > 0)
						  {
						  while ($rowsts=mysql_fetch_object($resultsts))
						  {
 ?>
<tr  valign="top">
<td width="10%"><?php echo $rowsts->item_code;?></td>
<td ><?php 

$batch_no=$rowsts->batch_no;
$man_date=$rowsts->man_date;
$expiry_date=$rowsts->expiry_date;

echo $product_name=$rowsts->item_name;


echo ' <i>(Batch No :'.$rowsts->batch_no.') ';

if ($man_date='0000-00-00')
{
	
}
else
{
echo 'Mfg.Date : '.$rowsts->man_date;
}

if ($expiry_date='0000-00-00')
{
	
}
else
{

echo 'Exp. Date : '.$rowsts->expiry_date.'</i>';
}
$prod=$rowsts->item_id;


?></td>
<td width="5%"><?php echo $quant=$rowsts->item_quantity;?></td>
<td align="right" width="8%"><?php echo number_format($price=$rowsts->item_cost,2);?></td>
<td align="right" width="10%"><?php echo number_format($amnt=$price*$quant,2);

$ttl_amnt=$ttl_amnt+$amnt;

?></td>
</tr>
<?php 
						  }}
?>

</table>
</div>
<table align="center" width="700" class="table">
<tr height="30">
<td width="10%"></td>
<td width="60%"></td>
<td width="5%" colspan="2" width="13%"><strong><font size="+1">SUB-TOTAL</font></strong></td>
<td width="10%" align="right"><?php echo number_format($ttl_amnt,2);?></td>

</tr>

<tr height="30">
<td width="10%"></td>
<td width="60%"></td>
<td width="5%" colspan="2" width="13%"><strong><font size="+1">DISCOUNT</font></strong></td>

<td width="10%" align="right">
<?php 

$disc_value=$discount*$ttl_amnt/100;

echo number_format($disc_value,2); ?>
</td>

</tr>
<tr height="30">
<td width="10%"></td>
<td width="60%"></td>
<td width="5%" colspan="2" width="13%"><strong><font size="+1">VAT</font></strong></td>
<td width="10%" align="right"><?php 
$sub_ttl_vat=$ttl_amnt-$disc_value;


if ($vat==1)
{


$vat_value=0.16*$sub_ttl_vat;
}

if ($vat==0)
{


$vat_value=0*$sub_ttl_vat;

} 

echo number_format($vat_value,2);

?></td>

</tr>

<tr height="30">
<td width="10%"></td>
<td width="60%"></td>
<td width="5%" colspan="2" width="13%"><strong><font size="+1">TOTAL</font></strong></td>
<td width="10%" align="right"><strong>
<?php 
echo number_format($grnd_ttl=$sub_ttl_vat+$vat_value,2);

?>
</strong>
</td>

</tr>


</table>









</body>
</html>
