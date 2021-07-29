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
<tr height="40"> <td colspan="16" align="center"><H2>JUBA STATIONERY AND PRINTING COMPANY LIMITED</H2></td></tr>
<tr bgcolor="#FFFFCC">
   
    <td colspan="9" height="30" align="center">
<H2>List Of All Direct Order With Bill</H2>
	
	</td>
	
    </tr>

  
    <tr style="background:url(images/description.gif);" height="30" >
    <td width="200"><div align="center"><strong>LPO Number</strong></td>
    <td width="300"><div align="center"><strong>Date Generated</strong></td>
    <td width="300"><div align="center"><strong>Date Approved</strong></td>
	<td width="20%"><div align="center"><strong>Supplier Name</strong></td>
	<td width="350"><div align="center"><strong>Amount Ordered (Other Currencies)</strong></td>
	<td width="200"><div align="center"><strong>Exchange Rate</strong></td>
	<td width="300"><div align="center"><strong>Amount Ordered (SSP)</strong></td>

	 	<td width="300"><div align="center"><strong>Approved By</strong></td>

    </tr>


  <?php
  $lpo_amnt=0; 
if (!isset($_POST['generate']))
{
 
$sql="select * FROM currency,suppliers,order_code_get WHERE order_code_get.currency=currency.curr_id 
AND order_code_get.supplier_id=suppliers.supplier_id and order_code_get.status='2' and mop_id='dr' 
order by order_code_get.order_code_id desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
else
{
$date_from=$_POST['from'];
$date_to=$_POST['to'];
$supplier=$_POST['supplier'];
if ($supplier!='0' && $date_from=='' && $date_to=='')
{
$sql="select * FROM currency,suppliers,order_code_get WHERE order_code_get.currency=currency.curr_id 
AND order_code_get.supplier_id=suppliers.supplier_id and order_code_get.status='2' and mop_id='dr' and order_code_get.supplier_id='$supplier' 
order by order_code_get.order_code_id desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
elseif($supplier=='0' && $date_from!='' && $date_to!='')
{
$sql="select * FROM currency,suppliers,order_code_get WHERE order_code_get.currency=currency.curr_id 
AND order_code_get.supplier_id=suppliers.supplier_id and order_code_get.status='2' and mop_id='dr' AND order_code_get.date_generated BETWEEN '$date_from' AND '$date_to' order by order_code_get.order_code_id desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}

elseif($supplier!='0' && $date_from!='' && $date_to!='')
{
$sql="select * FROM currency,suppliers,order_code_get WHERE order_code_get.currency=currency.curr_id 
AND order_code_get.supplier_id=suppliers.supplier_id and order_code_get.status='2' and mop_id='dr' AND order_code_get.date_generated BETWEEN '$date_from' AND '$date_to' AND order_code_get.supplier_id='$supplier' order by order_code_get.order_code_id desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}

else
{
$sql="select * FROM currency,suppliers,order_code_get WHERE order_code_get.currency=currency.curr_id 
AND order_code_get.supplier_id=suppliers.supplier_id and order_code_get.status='2' and mop_id='dr' order by order_code_get.order_code_id desc";
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
 
$order_code=$rows->order_code_id;
 ?>
  
    <td><?php echo $rows->lpo_no;?></td>
    <td align="center"><?php echo $rows->date_generated;?></td>
    <td align="center"><?php 
$sqlspm="select * from approved_lpo,users where approved_lpo.approving_user_id=users.user_id and approved_lpo.order_code='$order_code'";
$resultsspm= mysql_query($sqlspm) or die ("Error $sqlspm.".mysql_error());
$rowsspm=mysql_fetch_object($resultsspm);
	
echo $rowsspm->date_approved;
	
	
	
	?></td>
	<td><?php echo $rows->supplier_name;?></td>
	<td align="right">
	<?php
	include ('lpo_value.php');

/* $sqlspm="select * from supplier_transactions where order_code='po$order_id'";
$resultsspm= mysql_query($sqlspm) or die ("Error $sqlspm.".mysql_error());
$rowsspm=mysql_fetch_object($resultsspm);	
	

$curr_id=$rowsspm->currency;
$querycr="select * from currency where curr_id='$curr_id'";
$resultscr=mysql_query($querycr) or die ("Error: $querycr.".mysql_error());							  
$rowscr=mysql_fetch_object($resultscr);
$curr_rate=$rowscr->curr_rate;
echo $curr_name=$rowscr->curr_name.' ';

echo number_format($lpo_ttl=$rowsspm->amount,2); */
	
	?>
	
	</td>

	<td align="right"><?php echo number_format($curr_rate=$rows->curr_rate,2);?></td>
	<td align="right"><strong><?php 
	echo number_format($lpo_ttl_kshs=$curr_rate*$lpo_ttl,2);
	//echo number_format($rows->curr_rate,2);
	
	?></strong></td>

	 <td align="center"><?php

echo $rowsspm->f_name;



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
	
	
	
  
    </tr>
  <?php 
  $lpo_ttl=$rows->lpo_amount;
 $lpo_grnd_ttl_kshs=$lpo_grnd_ttl_kshs+$lpo_ttl_kshs;
 $grnd_ttl_amnt_paid_kshs=$grnd_ttl_amnt_paid_kshs+$lpo_amount_paid_kshs;
  //$grand_ttl_bal=$grand_ttl_bal+$bal;
  //$grand_ttl_rec=$grand_ttl_rec+$ttlrec;
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
	echo number_format($lpo_grnd_ttl_kshs,2);
	
	
	?></font></strong></td>
	
     <td width="200" ><div align="center"><strong></strong></td>
  <!-- <td width="100"><div align="center"><strong>Delete</strong></td>-->
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


