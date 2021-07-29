<?php 
include('includes/session.php');
include('Connections/fundmaster.php');

header("Content-Type: application/vnd.ms-word");
header("Content-Disposition: attachment;Filename=Supplier_Payments.doc");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");


$supplierds=$_GET['client']; 
if ($supplierds=='')
{
$client==0;
}
else
{
$client=$supplierds;
}
$date_from=$_GET['date_from'];
$date_to=$_GET['date_to'];

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
    <td colspan="7" bgcolor="#000033" align="center"><span style="font-size:17px; font-weight:bold; color: #FFFFFF;">PAYMENTS MADE TO SUPPLIER(S) <?php// echo date('Y')?></span></td>
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
    <td width="10%"><div align="center"><strong>Date Received</strong></td>
	<td width="10%"><div align="center"><strong>Supplier Name</strong></td>	
	<td width="10%"><div align="center"><strong>Receipt No</strong></td>	
	<td width="350"><div align="center"><strong>Amount Paid <br/>(Other Currencies)</strong></td>
	<td width="200"><div align="centern"><strong>Exchange Rate</strong></td>
	<td width="300"><div align="center"><strong>Amount Paid (Kshs)</strong></td>
	 <td width="300" ><div align="center"><strong>Mop</strong></td>
	 <td width="300" ><div align="center"><strong>Supplier Bank Account</strong></td>
	<td width="300"><div align="center"><strong>Bank Transfered From</strong></td>

    </tr>
  <?php

if ($client!=0 && $date_from=='' && $date_to=='')
{
//echo "client only";
$sql="select mop.mop_name,suppliers.supplier_name,supplier_payments.amount_received,supplier_payments.receipt_no,supplier_payments.supplier_payments_id ,supplier_payments.mop,supplier_payments.ref_no,supplier_payments.client_bank,
supplier_payments.our_bank,supplier_payments.date_paid,supplier_payments.receipt_no,supplier_payments.date_received,supplier_payments.status,currency.curr_name,
supplier_payments.currency_code,supplier_payments.curr_rate,supplier_payments.amount_received FROM mop,suppliers,supplier_payments,currency where 
supplier_payments.mop=mop.mop_id and supplier_payments.supplier_id=suppliers.supplier_id AND supplier_payments.currency_code=currency.curr_id and supplier_payments.supplier_id='$client' order by supplier_payments.date_paid  desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
elseif($client==0 && $date_from!='' && $date_to!='')
{
//echo "Dea only";
$sql="select mop.mop_name,suppliers.supplier_name,supplier_payments.amount_received,supplier_payments.receipt_no,supplier_payments.supplier_payments_id ,supplier_payments.mop,supplier_payments.ref_no,supplier_payments.client_bank,
supplier_payments.our_bank,supplier_payments.date_paid,supplier_payments.receipt_no,supplier_payments.date_received,supplier_payments.status,currency.curr_name,
supplier_payments.currency_code,supplier_payments.curr_rate,supplier_payments.amount_received FROM mop,suppliers,supplier_payments,currency where 
supplier_payments.mop=mop.mop_id and supplier_payments.supplier_id=suppliers.supplier_id AND supplier_payments.currency_code=currency.curr_id and supplier_payments.date_paid BETWEEN '$date_from' AND '$date_to' order by supplier_payments.date_paid  desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
elseif($client!=0 && $date_from!='' && $date_to!='')
{
//echo "Date  and cilonly";
$sql="select mop.mop_name,suppliers.supplier_name,supplier_payments.amount_received,supplier_payments.receipt_no,supplier_payments.supplier_payments_id ,supplier_payments.mop,supplier_payments.ref_no,supplier_payments.client_bank,
supplier_payments.our_bank,supplier_payments.date_paid,supplier_payments.receipt_no,supplier_payments.date_received,supplier_payments.status,currency.curr_name,
supplier_payments.currency_code,supplier_payments.curr_rate,supplier_payments.amount_received FROM mop,suppliers,supplier_payments,currency where 
supplier_payments.mop=mop.mop_id and supplier_payments.supplier_id=suppliers.supplier_id AND supplier_payments.currency_code=currency.curr_id and 
supplier_payments.date_paid BETWEEN '$date_from' AND '$date_to' and supplier_payments.supplier_id='$client' order by supplier_payments.date_paid  desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}
else
{
//echo "kba";
$sql="select mop.mop_name,suppliers.supplier_name,supplier_payments.amount_received,supplier_payments.receipt_no,supplier_payments.supplier_payments_id ,supplier_payments.mop,supplier_payments.ref_no,supplier_payments.client_bank,
supplier_payments.our_bank,supplier_payments.date_paid,supplier_payments.receipt_no,supplier_payments.date_received,supplier_payments.status,currency.curr_name,
supplier_payments.currency_code,supplier_payments.curr_rate,supplier_payments.amount_received FROM mop,suppliers,supplier_payments,currency where 
supplier_payments.mop=mop.mop_id and supplier_payments.supplier_id=suppliers.supplier_id AND supplier_payments.currency_code=currency.curr_id ORDER BY supplier_payments.date_received desc";
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
  
    <td>
<?php 
echo $date_received=$rows->date_paid; 
	
	?>
	</td>
	<td><?php echo $rows->supplier_name;?></td>
	<td><?php echo $rows->receipt_no;?></td>
   
	
	<td align="right"><?php echo $rows->curr_name.' '.number_format($invoice_ttl=$rows->amount_received,2);?></td>

	<td align="right"><?php echo number_format($curr_rate=$rows->curr_rate,2);?></td>
	<td align="right"><strong><?php 
	echo number_format($inv_ttl_kshs=$curr_rate*$invoice_ttl,2);
	//echo number_format($rows->curr_rate,2);
	
	?></strong></td>
	 <td><?php 
	 
	echo $mop=$rows->mop_name;
	
	if ($mop=='Cash')
	{
	
	}
	elseif ($mop=='Electronic ')
	 {
	echo '(Ref.No:'.$rows->ref_no.')';
	}
	
	elseif ($mop=='Cheque')
	 {
	echo '( Cheque No:'.$rows->cheque_no.')';
	}
	 
	 ?></td>
	 <!--<td align="right"><strong><font color="#009900"><?php 
      
	
	
	?></strong></td>
	<td align="right"><strong><font color="#ff0000">
	
	<?php
	
	$idd=$rows->invoice_id;
	
	$invoice_ttl=$rows->invoice_ttl;
	
	//echo $invoice_ttl;
	
	$bal=$invoice_ttl-$ttlrec;
	
	$bal_kshs=$curr_rate*$bal;
	
	echo number_format($bal_kshs,2);
	

	
	
	
	
//$poi=$rows->purchase_order_id;	

//echo $poi;

 
//$sqlrec="select SUM(received_stock.quantity_rec) as ttlrec from received_stock where received_stock.purchase_order_id='$poi'";
//$resultsrec= mysql_query($sqlrec) or die ("Error $sqlrec.".mysql_error());

//rowsrec=mysql_fetch_object($resultsrec);

//$ttlrec=$rowsrec->ttlrec;
//if ($ttlrec=='')
//{ ?>
<!--<p align="center">-</p>-->
<?php //}

//else
//{
 //echo $ttlrec;
//}



//$order_quant=$rows->quantity;

//$rec_quant=$rowsrec->ttlrec;

//if ($order_quant==$rec_quant)
//{
//$sqlupdt="UPDATE purchase_order set status='0' where purchase_order.purchase_order_id='$poi'";
//$resultsupdt= mysql_query($sqlupdt) or die ("Error $sqlupdt.".mysql_error());
//}

//else 
//{


//}





	?></font></strong></td>
	 <!--<td align="center"> <?php
	
	//$ttlrec $invoice_ttl 
	
	if ($ttlrec==$bal)
{

echo "Cleared";


}

elseif ($ttlrec < $invoice_ttl && $ttlrec=='')
{
?>

<a href="receive_invoice_payment.php?invoice_id=<?php echo $rows->invoice_id;?>&sales_rep=<?php echo $rows->sales_rep; ?>&balance=<?php echo $bal; ?>" style="color:#000099; font-weight:bold;">Receive Payment</a>

<?php

}

elseif ($ttlrec < $invoice_ttl && $ttlrec!='')	
{?>

<a href="receive_invoice_payment.php?invoice_id=<?php echo $rows->invoice_id;?>&sales_rep=<?php echo $rows->sales_rep; ?>&amnt_rec=<?php echo $ttlrec; ?>&balance=<?php echo $bal; ?>" style="color:#000099; font-weight:bold;">Clear Balance</a>

<?php
}

elseif ($ttlrec==$invoice_ttl)	
{?>

Fully Paid

<?php
}

else

{

}
	
	
	
	
	
	?></td>-->
	
	
	
	<td align="center">
	<?php 
	echo $rows->client_bank;

	?>
	
	</td>
	
	<td>
	
	
<?php 	
$bank_id=$rows->our_bank;
$sqlemp_det="select * from banks where bank_id='$bank_id'";
$resultsemp_det= mysql_query($sqlemp_det) or die ("Error $sqlemp_det.".mysql_error());
$rowsemp_det=mysql_fetch_object($resultsemp_det);
		
	if ($bank_id==0)
{
echo "-";
}
else
{
		
	echo $rowsemp_det->bank_name.' ('.$rowsemp_det->account_name.')';
	}
	
	
	?>
	
	</td>
	
	
	
  
    </tr>
  <?php 
  $invoice_ttl=$rows->invoice_ttl;
 $inv_grnd_ttl_kshs=$inv_grnd_ttl_kshs+$inv_ttl_kshs;
  $grand_ttl_bal=$grand_ttl_bal+$bal;
  $grand_ttl_rec=$grand_ttl_rec+$ttlrec;
  }
  ?>
   <tr height="30" bgcolor="#FFFFCC">
    <td width="200"><div align="center"><strong></strong></td>
    <td width="300"><div align="center"><strong></strong></td>
	<td width="300"><div align="center"><strong>Grand Total</strong></td>
	<td width="200"><div align="right"><strong><font size="+1"><?php 
	//echo number_format($grand_ttl_inv,2);
	
	
	?></font></strong></td>
	<td width="200"><div align="right"><strong><font size="+1"><?php 
	//echo number_format($grand_ttl_rec,2);
	
	
	?></font></strong></td>
	<td width="200"><div align="right"><strong><font size="+1" color="#ff0000;"><?php 
	echo number_format($inv_grnd_ttl_kshs,2);
	
	
	?></font></strong></td>
	<td width="200"><div align="center"><strong></strong></td>
     <td width="200" ><div align="center"><strong></strong></td>
   <td width="100"><div align="center"><strong></strong></td>

    </tr>
  <?php
  
  
  
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
