<?php 
include ('includes/session.php');
include('Connections/fundmaster.php');
$date_month=$_GET['payment_month'];

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
<table width="70%" border="0" class="table" align="center">

<tr height="40"> <td colspan="16" align="center"><img src="images/logolpo.png"  height="80"></td></tr>
<tr height="40"> <td colspan="16" align="center"><H2>JUBA STATIONERY AND PRINTING COMPANY LIMITED</H2></td></tr>
<tr bgcolor="#FFFFCC">
   
    <td colspan="12" height="30" align="center">
<H2>Statement Of Owners Equity</H2>
	
	</td>
	
    </tr>
   <tr style="background:url(images/description.gif);" height="30" >
    <td width="10%"><div align="center"><strong>Date Received</strong></td>
	<td width="10%"><div align="center"><strong>Share Holder Name</strong></td>	
	<td width="10%"><div align="center"><strong>Receipt No</strong></td>	
	<td width="20%"><div align="center"><strong>Amount Paid <br/>(Other Currencies)</strong></td>
	<td ><div align="centern"><strong>Exchange Rate</strong></td>
	<td ><div align="center"><strong>Amount Paid (SSP)</strong></td>
	 <td  ><div align="center"><strong>Mop</strong></td>
	 <td  ><div align="center"><strong>Supplier Bank Account</strong></td>
	<td ><div align="center"><strong>Bank Transfered From</strong></td>
    </tr>


  </tr>
	<?php
if (!isset($_POST['generate']))
{

$sql="select mop.mop_name,shares.share_holder_name,additional_investments.amount_received,additional_investments.receipt_no,additional_investments.additional_investments_id ,additional_investments.mop,additional_investments.ref_no,additional_investments.client_bank,
additional_investments.our_bank,additional_investments.date_paid,additional_investments.receipt_no,additional_investments.date_received,additional_investments.status,currency.curr_name,
additional_investments.currency_code,additional_investments.curr_rate,additional_investments.amount_received FROM mop,shares,additional_investments,currency where 
additional_investments.mop=mop.mop_id and additional_investments.shareholder_id=shares.shares_id AND additional_investments.currency_code=currency.curr_id ORDER BY additional_investments.date_received desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());



}
else
{
$date_from=$_POST['from'];
$date_to=$_POST['to'];
$client=$_POST['client'];
if ($client!='0' && $date_from=='' && $date_to=='')
{
//echo "client only";
$sql="select mop.mop_name,shares.share_holder_name,additional_investments.amount_received,additional_investments.receipt_no,additional_investments.additional_investments_id ,additional_investments.mop,additional_investments.ref_no,additional_investments.client_bank,
additional_investments.our_bank,additional_investments.date_paid,additional_investments.receipt_no,additional_investments.date_received,additional_investments.status,currency.curr_name,
additional_investments.currency_code,additional_investments.curr_rate,additional_investments.amount_received FROM mop,shares,additional_investments,currency where 
additional_investments.mop=mop.mop_id and additional_investments.shareholder_id=shares.shares_id AND additional_investments.currency_code=currency.curr_id and additional_investments.shareholder_id='$client' order by additional_investments.date_paid  desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
elseif($client=='0' && $date_from!='' && $date_to!='')
{
//echo "Dea only";
$sql="select mop.mop_name,shares.share_holder_name,additional_investments.amount_received,additional_investments.receipt_no,additional_investments.additional_investments_id ,additional_investments.mop,additional_investments.ref_no,additional_investments.client_bank,
additional_investments.our_bank,additional_investments.date_paid,additional_investments.receipt_no,additional_investments.date_received,additional_investments.status,currency.curr_name,
additional_investments.currency_code,additional_investments.curr_rate,additional_investments.amount_received FROM mop,shares,additional_investments,currency where 
additional_investments.mop=mop.mop_id and additional_investments.shareholder_id=shares.shares_id AND additional_investments.currency_code=currency.curr_id and additional_investments.date_paid BETWEEN '$date_from' AND '$date_to' order by additional_investments.date_paid  desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
elseif($client!='0' && $date_from!='' && $date_to!='')
{
//echo "Date  and cilonly";
$sql="select mop.mop_name,shares.share_holder_name,additional_investments.amount_received,additional_investments.receipt_no,additional_investments.additional_investments_id ,additional_investments.mop,additional_investments.ref_no,additional_investments.client_bank,
additional_investments.our_bank,additional_investments.date_paid,additional_investments.receipt_no,additional_investments.date_received,additional_investments.status,currency.curr_name,
additional_investments.currency_code,additional_investments.curr_rate,additional_investments.amount_received FROM mop,shares,additional_investments,currency where 
additional_investments.mop=mop.mop_id and additional_investments.shareholder_id=shares.shares_id AND additional_investments.currency_code=currency.curr_id and 
additional_investments.date_paid BETWEEN '$date_from' AND '$date_to' and additional_investments.shareholder_id='$client' order by additional_investments.date_paid  desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}
else
{
//echo "kba";
$sql="select mop.mop_name,shares.share_holder_name,additional_investments.amount_received,additional_investments.receipt_no,additional_investments.additional_investments_id ,additional_investments.mop,additional_investments.ref_no,additional_investments.client_bank,
additional_investments.our_bank,additional_investments.date_paid,additional_investments.receipt_no,additional_investments.date_received,additional_investments.status,currency.curr_name,
additional_investments.currency_code,additional_investments.curr_rate,additional_investments.amount_received FROM mop,shares,additional_investments,currency where 
additional_investments.mop=mop.mop_id and additional_investments.shareholder_id=shares.shares_id AND additional_investments.currency_code=currency.curr_id ORDER BY additional_investments.date_received desc";
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
 
 
 ?>
  
    <td>
<?php 
echo $date_received=$rows->date_paid; 
	
	?>
	</td>
	<td><?php echo $rows->share_holder_name;?></td>
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
    <td ><div align="center"><strong></strong></td>
    <td ><div align="center"><strong></strong></td>
	<td ><div align="center"><strong>Grand Total</strong></td>
	<td ><div align="right"><strong><font size="+1"><?php 
	//echo number_format($grand_ttl_inv,2);
	
	
	?></font></strong></td>
	<td ><div align="right"><strong><font size="+1"><?php 
	//echo number_format($grand_ttl_rec,2);
	
	
	?></font></strong></td>
	<td ><div align="right"><strong><font size="+1" color="#ff0000;"><?php 
	echo number_format($inv_grnd_ttl_kshs,2);
	
	
	?></font></strong></td>
	<td ><div align="center"><strong></strong></td>
     <td  ><div align="center"><strong></strong></td>
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


