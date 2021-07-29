<?php 
include ('includes/session.php');
include('Connections/fundmaster.php');
$date_month=$_GET['payment_month'];
$date_from=$_GET['date_from'];
$date_to=$_GET['date_to'];
$client=$_GET['client'];

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
<tr height="40"> <td colspan="16" align="center"><H2>JUBA STATIONERY AND PRINTING COMPANY LIMITED</H2></td></tr>
<tr bgcolor="#FFFFCC">
   
    <td colspan="9" height="30" align="center">
<H2>List Of All Customer Payments (Approved)</H2>
	
	</td>
	
    </tr>

  
     <tr style="background:url(images/description.gif);" height="30" >
    <td width="12%"><div align="center"><strong>Date Received</strong></td>
	<td width="17%"><div align="center"><strong>Client Name</strong></td>	
	<!--<td width="17%"><div align="center"><strong>Receipt No</strong></td>	-->
	<td width="350"><div align="center"><strong>Amount Received <br/>(Other Currencies)</strong></td>
	<td width="200"><div align="centern"><strong>Exchange Rate</strong></td>
	<td width="300"><div align="center"><strong>Amount Received (SSP)</strong></td>
	 <td width="300" ><div align="center"><strong>Mop</strong></td>
	 <td width="300" ><div align="center"><strong>Client Bank Account</strong></td>
	  <td width="300"><div align="center"><strong>Bank Transfered To</strong></td>



 <?php

if ($client!='0' && $date_from=='' && $date_to=='')
{
//echo "client only";
$sql="select mop.mop_name,clients.c_name,invoice_payments.amount_received,invoice_payments.receipt_no,invoice_payments.invoice_payment_id,
invoice_payments.mop,invoice_payments.ref_no,invoice_payments.sales_rep,invoice_payments.client_bank,invoice_payments.our_bank,invoice_payments.date_paid,
invoice_payments.sales_code_id,invoice_payments.receipt_no,invoice_payments.date_received,invoice_payments.status,currency.curr_name,
invoice_payments.currency_code,invoice_payments.curr_rate,invoice_payments.amount_received FROM clients,mop,invoice_payments,
currency where invoice_payments.mop=mop.mop_id and invoice_payments.client_id=clients.client_id and invoice_payments.status='1' 
AND  invoice_payments.currency_code=currency.curr_id and invoice_payments.client_id='$client' order by invoice_payments.invoice_payment_id desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
elseif($client=='0' && $date_from!='' && $date_to!='')
{
//echo "Dea only";
$sql="select mop.mop_name,clients.c_name,invoice_payments.amount_received,invoice_payments.receipt_no,invoice_payments.invoice_payment_id,
invoice_payments.mop,invoice_payments.ref_no,invoice_payments.sales_rep,invoice_payments.client_bank,invoice_payments.our_bank,invoice_payments.date_paid,
invoice_payments.sales_code_id,invoice_payments.receipt_no,invoice_payments.date_received,invoice_payments.status,currency.curr_name,
invoice_payments.currency_code,invoice_payments.curr_rate,invoice_payments.amount_received FROM clients,mop,invoice_payments,
currency where invoice_payments.mop=mop.mop_id and invoice_payments.client_id=clients.client_id and invoice_payments.status='1' 
AND  invoice_payments.currency_code=currency.curr_id and invoice_payments.date_paid BETWEEN '$date_from' AND '$date_to' order by invoice_payments.invoice_payment_id  desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
elseif($client!='0' && $date_from!='' && $date_to!='')
{
//echo "Date  and cilonly";
$sql="select mop.mop_name,clients.c_name,invoice_payments.amount_received,invoice_payments.receipt_no,invoice_payments.invoice_payment_id,
invoice_payments.mop,invoice_payments.ref_no,invoice_payments.sales_rep,invoice_payments.client_bank,invoice_payments.our_bank,invoice_payments.date_paid,
invoice_payments.sales_code_id,invoice_payments.receipt_no,invoice_payments.date_received,invoice_payments.status,currency.curr_name,
invoice_payments.currency_code,invoice_payments.curr_rate,invoice_payments.amount_received FROM clients,mop,invoice_payments,
currency where invoice_payments.mop=mop.mop_id and invoice_payments.client_id=clients.client_id and invoice_payments.status='1' 
AND  invoice_payments.currency_code=currency.curr_id and invoice_payments.date_paid BETWEEN '$date_from' AND '$date_to' and invoice_payments.client_id='$client' order by invoice_payments.invoice_payment_id  desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}
else
{
//echo "kba";
$sql="select mop.mop_name,clients.c_name,invoice_payments.amount_received,invoice_payments.receipt_no,invoice_payments.invoice_payment_id,
invoice_payments.mop,invoice_payments.ref_no,invoice_payments.sales_rep,invoice_payments.client_bank,invoice_payments.our_bank,invoice_payments.date_paid,
invoice_payments.sales_code_id,invoice_payments.receipt_no,invoice_payments.date_received,invoice_payments.status,currency.curr_name,
invoice_payments.currency_code,invoice_payments.curr_rate,invoice_payments.amount_received FROM clients,mop,invoice_payments,
currency where invoice_payments.mop=mop.mop_id and invoice_payments.client_id=clients.client_id and invoice_payments.status='1' 
AND  invoice_payments.currency_code=currency.curr_id ORDER BY invoice_payments.date_received desc";
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
	<td><?php echo $rows->c_name;?></td>
	<!--<td><?php echo $rows->receipt_no;?></td>-->
	
   
	
	<td align="right"><?php echo $rows->curr_name.' '.number_format($invoice_ttl=$rows->amount_received,2);?></td>

	<td align="right"><?php echo number_format($curr_rate=$rows->curr_rate,2);?></td>
	<td align="right"><strong><?php 
	echo number_format($inv_ttl_kshs=$curr_rate*$invoice_ttl,2);
	//echo number_format($rows->curr_rate,2);
	
	?></strong></td>
	 <td><?php 
	 
$mop=$rows->mop;
	
	if ($mop==1 || $mop==4)
	{
	echo $rows->mop_name.'</br>'.'<i>(Ref.No:'.$rows->ref_no.')</i>';
	}
	elseif ($mop==3)
	 {
	echo $rows->mop_name.'</br>'.'<i>(Ref.No:'.$rows->ref_no.')</i>';
	}
	
	elseif ($mop==2)
	 {
	echo '<a onClick="return confirmBounce();" href="record_bounced_cheque.php?invoice_payments_id='.$rows->invoice_payment_id.'">'.$rows->mop_name.'</br>'.'<i>(Cheque No:'.$rows->ref_no.')</i></a>';
	}
	 
	 ?></td>
	

	
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
<td width="200" colspan="2"><strong>Grand Total</strong></td>
	
	<td width="200" colspan="4"><div align="right"><strong><font size="+1" color="#ff0000;"><?php 
	echo number_format($inv_grnd_ttl_kshs,2);
	
	
	?></font></strong></td>
	<td width="200"><div align="right"><strong><font size="+1"><?php 
	//echo number_format($grand_ttl_rec,2);
	
	
	?></font></strong></td>


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


