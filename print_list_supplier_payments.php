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
<table width="700" border="0" class="table" align="center">

<tr height="40"> <td colspan="16" align="center"><img src="images/logolpo.png" width="300" height="80"></td></tr>
<tr height="40"> <td colspan="16" align="center"><H2><?php echo $rowscont->cont_person;?></H2></td></tr>
<tr bgcolor="#FFFFCC">
   
    <td colspan="10" height="30" align="center">
<H2>List Of All Supplier Payments</H2>
	
	</td>
	
    </tr>

  
   
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

if (!isset($_POST['generate']))
{

$sql="select * FROM mop,suppliers,supplier_payments,currency where 
supplier_payments.mop=mop.mop_id and supplier_payments.supplier_id=suppliers.supplier_id AND 
supplier_payments.currency_code=currency.curr_id ORDER BY supplier_payments.date_received desc";
$resultsdc= mysql_query($sql) or die ("Error $sql.".mysql_error());

}
else
{
$date_from=$_POST['from'];
$date_to=$_POST['to'];
$supplier=$_POST['client'];
$shop_id=$_POST['shop_id'];



$querydc= "SELECT * FROM mop,suppliers,supplier_payments,currency";
    $conditions = array();
    if($supplier!=0) 
	
	{
	
    $conditions[] = "supplier_payments.supplier_id='$supplier'";
	
    }
	

	if($shop_id!=0) 
	{
	
    $conditions[] = " supplier_payments.shop_id='$shop_id'";
	  
    }
	

	if($date_from!='' && $date_to!='' ) {
	
      $conditions[] = " supplier_payments.date_generated >='$date_from' AND supplier_payments.date_generated<='$date_to' ";
    }
	
	
	

	
	
	
    //$sql = $query;
    if (count($conditions) > 0) 
	{
      $querydc .= " WHERE " . implode(' AND ', $conditions)." AND supplier_payments.mop=mop.mop_id and 
	  supplier_payments.supplier_id=suppliers.supplier_id AND 
supplier_payments.currency_code=currency.curr_id ORDER BY supplier_payments.date_received desc";
    }
	else
	{	
	
$querydc="select * FROM mop,suppliers,supplier_payments,currency where 
supplier_payments.mop=mop.mop_id and supplier_payments.supplier_id=suppliers.supplier_id AND 
supplier_payments.currency_code=currency.curr_id ORDER BY supplier_payments.date_received desc";
$resultsdc=mysql_query($querydc) or die ("Error: $querydc.".mysql_error()); 

	}
	
	
    $resultsdc = mysql_query($querydc) or die ("Error $querydc.".mysql_error());


}


if (mysql_num_rows($resultsdc) > 0)
						  {
							  $RowCounter=0;
							  while ($rows=mysql_fetch_object($resultsdc))
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
	<td align="center"><?php $shop_id=$rows->shop_id;
	
	
	
$sqlsp="select * from shop where shop_id='$shop_id'";
$resultsp= mysql_query($sqlsp) or die ("Error $sqlsp.".mysql_error());
$rowssp=mysql_fetch_object($resultsp);

echo $rowssp->shop_name;
		
	?></td>
	<td><?php echo $rows->receipt_no;?></td>
   
	
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
	echo $rows->mop_name.'</br>'.'<i>(Cheque No:'.$rows->ref_no.')</i>';
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


