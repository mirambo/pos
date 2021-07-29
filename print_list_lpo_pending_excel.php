<?php 
include ('includes/session.php');
include('Connections/fundmaster.php');
$date_month=$_GET['payment_month'];
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment;Filename=Direct_Bills-$lpo_no.xls");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");

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
<table width="700" border="1" class="table" align="center">

<tr height="40"> <td colspan="7" align="center"><H5>MOBILE SALES AND ACCOUNTING SYSTEMS</H5></td></tr>
<tr bgcolor="#FFFFCC">
   
    <td colspan="7" height="30" align="center">
<H6>List Of All Pending LPO</H6>
	
	</td>
	
    </tr>

  
     <tr  style="background:url(images/description.gif);" height="30" >
  
    <td ><div align="center"><strong>LPO Number</strong></td>
    <td ><div align="center"><strong>Date Generated</strong></td>
	<td ><div align="center"><strong>Shop</strong></td>
	<td ><div align="center"><strong>Supplier Name</strong></td>
	<td ><div align="center"><strong>Amount Ordered (Other Currencies)</strong></td>
	<td ><div align="center"><strong>Exchange Rate</strong></td>
	<td ><div align="center"><strong>Amount Ordered (SSP)</strong></td>


   

    </tr>


  <?php
  //$grnd_ttl=0;
 // $lpo_amnt=0; 
 $lpo_amnt=0; 

$supplier=$_GET['supplier'];
$shop_id=$_GET['shop_id'];
$date_from=$_GET['from'];
$date_to=$_GET['to'];

$querydc= "SELECT * FROM currency,suppliers,order_code_get";
    $conditions = array();
    if($supplier!=0) 
	
	{
	
    $conditions[] = "order_code_get.supplier_id='$supplier'";
	
    }
	

	if($shop_id!=0) 
	{
	
    $conditions[] = " order_code_get.shop_id='$shop_id'";
	  
    }
	

	if($date_from!='' && $date_to!='' ) {
	
      $conditions[] = " order_code_get.date_generated >='$date_from' AND order_code_get.date_generated<='$date_to' ";
    }
	
	
    //$sql = $query;
    if (count($conditions) > 0) {
      $querydc .= " WHERE " . implode(' AND ', $conditions)." AND order_code_get.currency=currency.curr_id 
AND order_code_get.supplier_id=suppliers.supplier_id and order_code_get.status='0' and mop_id!='dr' 
order by order_code_get.order_code_id desc";
    }
	else
	{	
	
$querydc="select * FROM currency,suppliers,order_code_get WHERE order_code_get.currency=currency.curr_id 
AND order_code_get.supplier_id=suppliers.supplier_id and order_code_get.status='0' and mop_id!='dr' 
order by order_code_get.order_code_id desc";
$resultsdc=mysql_query($querydc) or die ("Error: $querydc.".mysql_error()); 

	}

    $resultsdc = mysql_query($querydc) or die ("Error $querydc.".mysql_error());





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
 
$order_code=$rows->order_code_id;

 ?>
  
    <td><?php echo $rows->lpo_no;?></td>
    <td align="center"><?php echo $rows->date_generated;?></td>
    <td align="center"><?php $shop_id=$rows->shop_id;
	
	
	
$sqlsp="select * from shop where shop_id='$shop_id'";
$resultsp= mysql_query($sqlsp) or die ("Error $sqlsp.".mysql_error());
$rowssp=mysql_fetch_object($resultsp);

echo $rowssp->shop_name;?></td>
	<td><?php echo $rows->supplier_name;?></td>
	<td align="right">
	<?php
	echo $rows->curr_name.' ';
	include ('lpo_value.php');

	?>
	
	</td>

	<td align="right"><?php echo number_format($curr_rate=$rows->curr_rate,2);?></td>
	<td align="right"><strong><?php 
	echo number_format($lpo_ttl_kshs=$curr_rate*$lpo_ttl,2);
	//echo number_format($rows->curr_rate,2);
	
	?></strong></td>

	
	<?php
	
	$idd=$rows->lpo_id;
	
	$invoice_ttl=$rows->invoice_ttl;
	
	//echo $invoice_ttl;
	
	$bal=$invoice_ttl-$ttlrec;
	
	$bal_kshs=$curr_rate*$bal;
	
	number_format($bal_kshs,2);
	

	
	
	
	
?>
	
	
	
  
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
    <td ><div align="center"><strong></strong></td>
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
	echo number_format($lpo_grnd_ttl_kshs,2);
	
	
	?></font></strong></td>

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


