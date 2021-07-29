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


//$invoice_no=$sales_id;


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
.body 
{
	
	font-size:16px;
	font-color:#ff0000;

}



.table
{
border-collapse:collapse;
border-radius: 0px;
    border: 2px solid #73AD21;
	font-size:16px;
}
.table td, tr
{
border:2px solid white;
padding:3px;
font-size:16px;
}


span {
line-height:20px;
font-size:14px;	
font-family:garamond;

letter-spacing: 5px;
	
	
}


	
}
</style>

<!-- Table goes in the document BODY -->


</head>

<body onload="window.print();" style="background:none;">
<table width="950" border="0" style="margin-left:60px;">	
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
 <fieldset style="height:50px; width:80%; border-radius:5px; border:2px solid #fff; ">
  <legend><span style="color:#ffffff; ">INVOICE NO: </span></legend>
  </br>
  </br>
  <span style="color:#ffffff; display:"><font color="#ffffff">ORDER NO: </font></span><span style="margin-left:-170px;"><?php echo $invoice_no; ?></span>
  
</fieldset>
 
 
 
 
 </td>
 <td align="right" width="50%" height="100"><img src="images/logo_print.jpg" style="display:none;" width="300" height="100"></td>
 
 
 
 </tr> 
 
  <tr>
 <td width="50%">
 <fieldset style="height:90px; width:80%; border-radius:5px; border:2px solid #fff;">
  <legend><span style="color:#ffffff; ">INVOICE TO: <span></legend>
  </br>

 <?php 
 
 echo '<span style="margin-left:-40px;">'.$rowssupp->customer_name.'</span>'; 
 
 echo "</br>";
 
 echo '<span style="margin-left:-40px;">'.$rowssupp->address.' </span>'; 

$address=$rowssupp->address;
if ($address=='')
{

}
else
{
  echo "</br>";
}


 echo '<span style="margin-left:-1px;">'.$rowssupp->town.'</span>';
 
  echo "</br>";
  
  echo '<span style="margin-left:-40px;">'. $rowssupp->phone.' </span>'; 
  
    echo "</br>";
  
  echo '<span style="margin-left:-40px;">'. $rowssupp->email.' </span>'; 
 
 ?> 
  

</fieldset>
 
 
 
 
 </td>
 <td align="right" width="50%" valign="top"><span style="display:none;">
P.O. BOX <?php
echo $rowscont->address.' '.$rowscont->town;
 ?>

 </br>
<?php
echo $rowscont->building.' '.$rowscont->street;
 ?>
  </span>
  </br>
 <span style="display:none;"> TEL :
<?php
echo $rowscont->telephone.' '.$rowscont->phone;
 ?> </span>
  </br>
 <span style="display:none;"> EMAIL :
<?php
echo $rowscont->email;
 ?>
 </span> 
   </br>
 <span style="display:none;"> WEBSITE :
<?php
echo $rowscont->fax;
 ?>
 
 </span>
 </td>
 
 
 
 </tr> 
  
 <tr>
 <td width="50%">
 <fieldset style="height:80px; width:80%; border-radius:5px; border:2px solid #fff; margin-top:-30px;">
 
     </br>
  </br>
    </br>
 <span style="color:#fff; ">ORDER NO: </span> 
 
<span style="margin-left:-70px;"><?php echo $order_no; ?></span>
    </br>
  </br>
  <span style="color:#fff; margin-left:-125px; ">INVOICE DATE : </span>
  <span><?php echo $date_generated;?></span>
   </br>
  </br>

<span style="color:#fff; ">TERMS : </span>

<span style="margin-left:-37px;"><? echo $terms;?></span>
</fieldset>
 
 
 
 
 </td>
 <td align="right" width="50%" valign="top">
  <fieldset style="height:100px; width:80%; border-radius:5px; border:2px solid #fff; margin-top:-14px;">
  <legend><span style="color:#fff; ">DELIVERED TO: <span></legend>
     </br>
 
  <?php 

 echo '<span style="float:right; margin-left:20px;">'.$rowsj->delivery_address.'</span>'; 
 
 echo "</br>";
 
 /*echo '<span style="float:right; margin-left:20px;">P.O BOX'. $rowssupp->address.''.$rowssupp->town.' </span>'; 
 
 
  echo "</br>";
  
  echo '<span style="float:right; margin-left:20px;">'. $rowssupp->phone.' </span>'; 
  
    echo "</br>";
  
  echo '<span style="float:right; margin-left:20px;">'. $rowssupp->email.' </span>'; */
 
 ?> 

</fieldset>
<strong><font size="+1" color="#fff"><span style="">PIN : 
<?php
echo $rowscont->pin;
 ?>
 </span></font></strong>
 </td>
 
 
 
 </tr>  
  
  
  
</table>



<table width="900" class="table" border="1" style="margin-left:60px;" height="50" >
<tr height="8%" style="border:1px solid #ff0000;" align="center">
<td width="10%"><strong><span style="color:#fff; ">CODE</span></strong></td>
<td width="70%"><strong><span style="color:#fff; ">PRODUCT DESCRIPTION</span></strong></td>
<td width="5%"><strong><span style="color:#fff; ">QTY</span></strong></td>
<td width="8%"><strong><span style="color:#fff; ">UNIT </br>PRICE</span></strong></td>
<td width="10%"><strong><span style="color:#fff; ">TOTAL</span></strong></td>

</tr>
</table>
<div style="width:940px; height:400px; background:#fff; border-top:none;  border-right:2px solid #fff; border-left:2px solid #fff;">
   </br>
  </br>
<table width="940"  style="margin-left:60px;" border="0">
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
<td width="10%" ><span style="margin-left:-68px;"><?php echo $rowsts->item_code;?></span></td>
<td width="60%"><span>
<?php 

$batch_no=$rowsts->batch_no;
$man_date=$rowsts->man_date;
$expiry_date=$rowsts->expiry_date;


echo $product_name=$rowsts->item_name;


if ($batch_no=='')
{
	
}
else
{
echo '(Batch No :'.$batch_no.')';
}

if ($man_date=='0000-00-00')
{
	
}
else
{
echo ' Mfg.Date : '.$rowsts->man_date;
}

if ($expiry_date=='0000-00-00')
{
	
}
else
{

echo ', Exp. Date : '.$rowsts->expiry_date;
}
$prod=$rowsts->item_id;


?>


</span></td>
<td width="5%" align="right" style="padding-left:40px; border-right:15px solid #fff;"><span style="margin-left:10px;"><?php echo $quant=$rowsts->item_quantity;?></span></td>
<td  width="8%" align="right" style="padding-left:30px; border-right:35px solid #fff;"><span><?php echo number_format($price=$rowsts->item_cost,2);



?><span></td>
<td  width="10%" align="right"><span><?php echo number_format($amnt=$price*$quant,2);

$ttl_amnt=$ttl_amnt+$amnt;

$item_disc=$rowsts->shop_id;


$item_disc_value=$item_disc*$amnt/100;


$disc_value=$disc_value+$item_disc_value;

?></span></td>
</tr>
<?php 
						  }}
?>

</table>
</div>
</br></br>
<table  width="1000" class="table" border="1">
<tr height="30">
<td width="10%"></td>
<td width="60%"></td>
<td width="5%" colspan="2" width="13%"><strong><font size="+1" color="#fff"><span style="top:150px;">SUB-TOTAL< /span></font></strong></td>
<td width="10%" align="right"></br></br><span><?php echo number_format($ttl_amnt,2);?></span></td>

</tr>

<tr height="10">
<td width="10%"></td>
<td width="60%"></td>
<td width="5%" colspan="2" width="13%"><strong><font size="+1" color="#fff"><span style="">DISCOUNT</span></font></strong></td>

<td width="10%" align="right"><span><?php 

//$disc_value=$discount*$ttl_amnt/100;

echo number_format($disc_value,2); ?></span></td>

</tr>
<tr height="10">
<td width="10%"></td>
<td width="60%"></td>
<td width="5%" colspan="2" width="13%"><strong><font size="+1" color="#fff"><span style="">VAT</span></font></strong></td>
<td width="10%" align="right"><span><?php 
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

?></span></td>

</tr>

<tr height="10">
<td width="10%"></td>
<td width="60%"></td>
<td width="5%" colspan="2" width="13%"><strong><font size="+1" color="#fff"> <span style="">TOTAL</span></font></strong></td>
<td width="10%" align="right"><strong><span style="padding-top:100px;">
<?php 
echo number_format($grnd_ttl=$sub_ttl_vat+$vat_value,2);

?><span>
</strong>
</td>

</tr>


</table>









</body>
</html>
