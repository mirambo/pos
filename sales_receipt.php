<?php 
include('includes/session.php');
include('Connections/fundmaster.php');
//$get_latest_invoice_id=$_GET['invoice_id'];
//$get_latest_customer_id=$_GET['customer_id'];
//$get_latest_sales_id=$_GET['sales_code'];
$invoice_payment_id=$_GET['invoice_payment_id'];

$sqlcl="select * FROM customer,mop,invoice_payments,
currency where invoice_payments.mop=mop.mop_id and invoice_payments.customer_id=customer.customer_id AND 
invoice_payments.currency_code=currency.curr_id AND invoice_payments.invoice_payment_id='$invoice_payment_id'";
$resultscl= mysql_query($sqlcl) or die ("Error $sqlcl.".mysql_error());
$rowscl=mysql_fetch_object($resultscl);
$customer_id=$rowscl->customer_id;
$sales_rep=$rowscl->sales_rep;
$sales_id=$rowscl->sales_id;


$currency=$rowscl->currency_code;

$querytcs="select * from currency where curr_id='$currency'";
$resultstcs=mysql_query($querytcs) or die ("Error: $querytc.".mysql_error());								  
$rowstcs=mysql_fetch_object($resultstcs);
$curr_name=$rowstcs->curr_name;




/*header("Content-Type: application/vnd.ms-word");
header("Content-Disposition: attachment;Filename=Sales_Receipt.doc");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");*/



include ('number_words.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>
<?php 
if ($sales_type=='c')
{
?>
Cash Sales Receipt - 
<?php
}
else
{
?>
Invoice - 
<?php
}
 ?>

<?php echo $invoice_no; ?></title>
<link rel="stylesheet" type="text/css" href="<?php echo $base_url; ?>style.css"  />

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
<table width="700" border="0" align="center">	

 <tr>
    <td colspan="5" align="center" valign="top"><img src="<?php echo $base_url;?>images/logolpo.png" />
	<hr/>
	
	</td>
  </tr>
	 <?php 
  
/* $querysup="select * from customer where customer_id ='$client_id'";
$resultssup=mysql_query($querysup) or die ("Error: $querysup.".mysql_error());
$rowssupp=mysql_fetch_object($resultssup); */


$querycont="select * from company_contacts order by contacts_id desc limit 1";
$resultscont=mysql_query($querycont) or die ("Error: $querycont.".mysql_error());
$rowscont=mysql_fetch_object($resultscont); 
  
  
  ?>
  <tr>
     <td  align="right" colspan="4" rowspan="" valign="top">
	 <?php
if ($cash==1)
{

}
else
{


	 ?>

	<?php 
}	
	?>
	
	</td>
 </tr>
 


 <tr>
   <td width="60%">
<?php echo $rowscont->cont_person; ?></br>
 <strong> Building: </strong><?php echo $rowscont->building.' '.$rowscont->street; ?></br>
  <strong> Mobile: </strong><?php echo $rowscont->phone; ?></br>
   <strong> Telephone: </strong><?php echo $rowscont->telephone; ?></br>
   <strong>Email : </strong><?php echo $rowscont->email; ?></br>
   
<strong>Website : </strong><?php echo $rowscont->fax; ?></br>
   
   
   </td> <td colspan="4" align="left" valign="top"><strong>Customer Details </strong></br>
  <strong></strong> <?php echo $customer_name=$rowscl->customer_name; ?></br>
  <strong></strong> <?php echo $customer_address=$rowscl->address; ?></br>
  <strong></strong> <?php echo $customer_address=$rowscl->town; ?></br>
  <strong> </strong><?php echo $customer_phone=$rowscl->phone; ?></br>
   <strong></strong><?php echo $customer_email=$rowscl->email; ?></br>
   

   
   
   </td>
  </tr>


  
  
  
  
  

  
  <tr height="30">
    <td colspan="10" bgcolor="#000033" align="center"><span style="font-size:17px; font-weight:bold; color: #FFFFFF;">

SALES RECEIPT 

	
	
	
	
	</span></td>
  </tr>
  <tr height="30">
    <td colspan="10"  align="right">DATE : <?php echo $date_generated=$rowscl->date_paid; 

	?><hr/></td>
  </tr>
  
   <tr height="20">
    <td colspan="10"  align="right"><strong>
	
RECEIPT NO :
	<?php 
	echo $invoice_no=$rowscl->receipt_no;
	?>
	<hr/>
	</strong></td>
  </tr>
  
</table>

<table width="700" border="0" align="center" class="table">
    <tr>
    <td width="10%"><div align="center"><strong>Code </strong></div></td>
    <td width="30%"><div align="center"><strong>Description</strong></div></td>
    <td width="10%"><div align="center"><strong>Qty</strong></div></td>
    <td width="15%"><div align="center"><strong>Price (<?php echo $curr_name; ?>)</strong></div></td>
    <td width="20%"><div align="center"><strong>Amount (<?php echo $curr_name; ?>)</strong></div></td>
	
  </tr>
  
     <?php 
$task_totals=0;
$sqllpdet="select * FROM sales_item,items WHERE sales_item.item_id=items.item_id AND 
sales_item.sales_id='$sales_id' order by sales_item_id asc";
$resultslpdet= mysql_query($sqllpdet) or die ("Error $sqllpdet.".mysql_error());
if (mysql_num_rows($resultslpdet) > 0)
						  {
							  $RowCounter=0;
							  while ($rowslpdet=mysql_fetch_object($resultslpdet))
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
 
 <td ><?php echo $item_code=$rowslpdet->item_code; ?></td>
<td ><?php 

$batch_no=$rowslpdet->batch_no;
$man_date=$rowslpdet->man_date;
$expiry_date=$rowslpdet->expiry_date;


echo $product_name=$rowslpdet->item_name;


if ($batch_no=='')
{
	
}
else
{
//echo ' <i>(Batch No :'.$batch_no.') ';
}

if ($man_date=='0000-00-00')
{
	
}
else
{
echo 'Mfg.Date : '.$rowslpdet->man_date;
}

if ($expiry_date=='0000-00-00')
{
	
}
else
{

echo 'Exp. Date : '.$rowslpdet->expiry_date.'</i>';
}
$prod=$rowslpdet->item_id;


?></td>
<td ><?php echo $rowslpdet->item_quantity; $qnty=$rowslpdet->item_quantity;?></td>
<td align="right"><?php 
	
		
	
	echo number_format($item_cost=$rowslpdet->item_cost,2);
	

	?></td>
	
	<td align="right">
	<?php 
	

	echo number_format($amnt=$item_cost*$qnty,2);
	
	
	$task_totals=$task_totals+$amnt;
	
	
	$item_disc=$rowslpdet->shop_id;


$item_disc_value=$item_disc*$amnt/100;


$disc_value=$disc_value+$item_disc_value;
	
	
	
	
	
	
	?>
	
	
	</td>
	
	</tr>
 
  
  <?php 
							  }
							  
						  }
  ?>
 
  
  
  
  <tr><td ></td>
<td></td>
<td></td>
<td align="right"><strong>Sub Total</strong></td>
<td align="right"><strong><?php echo number_format($task_totals,2); ?></strong></td>


</tr>

<tr><td ></td>
<td></td>
<td></td>
<td align="right"><strong>Discount</strong></td>
<td align="right"><strong><?php 



echo number_format($disc_value,2); ?></strong></td>


</tr>

<?php 
$sub_ttl1=$task_totals-$disc_value; 

if ($vat==1)
{
//$sub_ttl_vat=$sub_ttl1*0.862;

$vat_value=0.18*$sub_ttl1;

}

if ($vat==0)
{


$vat_value=0*$sub_ttl1;

} 


number_format($sub_ttl1,2)

?>

<tr>
<td ></td>
<td></td>
<td></td>
<td align="right"><strong>VAT (16%)</strong></td>
<td align="right"><strong><?php echo number_format($vat_value,2); ?></strong></td>


</tr>

<tr>
<td ></td>
<td></td>
<td></td>
<td align="right"><strong>Grand Total</strong></td>
<td align="right"><strong><?php echo number_format($grnd_ttl=$sub_ttl1+$vat_value,2); ?></strong></td>


</tr>

<tr>
<td ></td>
<td></td>
<td></td>
<td align="right"><strong>Paid Amount</strong></td>
<td align="right"><strong><?php 



$query35 = mysql_query("SELECT SUM(amount_received) as ttl_paid from invoice_payments where sales_id='$sales_id'");
$rows35=mysql_fetch_object($query35);
	
	 number_format($amnt_paid=$rows35->ttl_paid,2);
 


 
 
echo number_format($amnt_paid,2); 

$paid_amount=$rowscl->amount_received;
?>

</strong></td>


</tr>

<tr>
<td ></td>
<td></td>
<td></td>
<td align="right"><strong>Balance</strong></td>
<td align="right"><strong><?php echo number_format($grnd_ttl-$amnt_paid,2); ?></strong></td>


</tr>
  
  <tr height="10">
    <td colspan="8">&nbsp;
	Amount Received : <?php

echo '<u><i>'.$curr_name.' '.convert_number_to_words ($paid_amount).'  only</i></u>' ;
	?>
	
	</td>
  </tr>
  <tr height="10">
    <td colspan="8">&nbsp;
	Paid Through: <?php
	
$mop=$rowscl->mop;

echo '<i>'. $mop_name=$rowscl->mop_name. '</i></u>' ;


if ($mop==2)
{
echo " : Cheque Number - ".$ref_no=$rowscl->ref_no;
}

if ($mop==3)
{
echo " :Transaction Number - ".$ref_no=$rowscl->ref_no;
}

	?>
	
	</td>
  </tr>
  
  
  <tr>
    <td colspan="8" align="right"><strong><em>Generated by :
         <?php 
$sqluser="select * FROM users WHERE user_id='$sales_rep'";
$resultsuser= mysql_query($sqluser) or die ("Error $sqluser.".mysql_error());
	
$rowsuser=mysql_fetch_object($resultsuser);	

echo $rowsuser->f_name;
	
	
	
	?>
    </em></strong></td>
  </tr></table>
  
  <br/>
  
<table width="700" border="0" align="center">
  
  
 <!-- <tr height="30">
    <td colspan="6" >Signature----------------------------------------------------------------------------------------------------- Stamp------------------------------------------------</td>
  </tr>-->
  
  <tr>
    <td colspan="6" align="center" ><strong>Thank You For Your Business!!<br/>
	



	</strong></td>
  </tr>
  <tr>
    <td colspan="6" >&nbsp;</td>
  </tr>
 
  <tr>
    <td colspan="6" >&nbsp;</td>
  </tr>
</table>








</body>
</html>
