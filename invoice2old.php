<?php 
include('includes/session.php');
include('Connections/fundmaster.php');
//$get_latest_invoice_id=$_GET['invoice_id'];
//$get_latest_client_id=$_GET['client_id'];
//$get_latest_sales_id=$_GET['sales_code'];
$inv_bal=$_GET['inv_bal'];
$mop=$_GET['mop'];

$get_invoice_no=$_GET['invoice_no'];
$sess_client_id=$_GET['client_id'];
$get_sales_code=$_GET['sales_code'];
$date_generated=$_GET['date_generated'];
$user=$_GET['user'];
//$ship_agency=$_SESSION['ship_agency'];
//$pay_term=$_SESSION['pay_term'];
$currency=$_GET['currency'];
//$shipp_id=$_GET['shipp_id'];
//$pay_terms=$_GET['pay_terms'];
$year=date('Y');
$sqlcurr="select * from currency where curr_id='$currency'";
$resultscurr= mysql_query($sqlcurr) or die ("Error $sqlcurr.".mysql_error());
$rowcurr=mysql_fetch_object($resultscurr);
$curr_name=$rowcurr->curr_name;

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Invoice - <?php echo $get_invoice_no; ?></title>
<link rel="stylesheet" type="text/css" href="style.css" />

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
  <tr>
    <td colspan="3" rowspan="7"><img src="images/logolpo.png" /></td>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3"><div align="right"><font color="#000033" size="+2"><strong>
     <!--<a href="begin_invoice.php"><div style="background-image:url(images/newtrans.jpg); width:201px; height:32px;"></div></a>-->
    </strong></font></div></td>
  </tr>
  <tr>
    <td colspan="3"><div align="right"></div></td>
  </tr>
  <tr>
    <td colspan="3"><div align="right">
        <!--Tel : +254 (0) 538004579 -->
    </div></td>
  </tr>
  <tr>
    <td colspan="3"><div align="right"></div></td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3"><!--Website: www.briskdiagnostics.com--> </td>
  </tr>
  <tr height="30">
    <td colspan="6"  align="center"><strong><br/><hr/><br/>Kigali Road, Jamia Plaza, 2nd Floor, P.O. BOX 71O89- 00622 Nairobi. <br/>Tel : +254 (0) 538004579 Cell : +254 702 358 399 / + 254 721 662 103. <br/>Email : info@briskdiagnostics.com. Website: www.briskdiagnostics.com <br/></strong></td>
  </tr>
  <tr height="30">
    <td colspan="6" bgcolor="#000033" align="center"><span style="font-size:17px; font-weight:bold; color: #FFFFFF;">INVOICE</span></td>
  </tr>
  
  
  <tr height="20">
    <td colspan="6"  align="right">DATE : <?php echo $date_generated; ?></td>
  </tr>
  
   <tr height="20">
    <td colspan="6"  align="right"><strong>INVOICE NO :  <?php 
	echo $get_invoice_no;
	
	?>
	
	</strong></td>
  </tr>
  
  
  
 
  
  
  <?php 
  
$querysup="select * from clients where client_id ='$sess_client_id'";
$resultssup=mysql_query($querysup) or die ("Error: $querysup.".mysql_error());
$rowssupp=mysql_fetch_object($resultssup);
  
  
  ?>
<tr>
    <td><font size="+1"><strong>To:</strong></font></td>
    <td colspan="5"><font size="+1"><strong><?php //echo $rowssupp->supplier_name; ?></strong></font></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
	<td><strong>Client Name</strong></td>
    <td ><?php echo $rowssupp->c_name; ?></td>
    <td colspan="2">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><strong>Address</strong></td>
    <td width="31%">P.O. BOX <?php echo $rowssupp->c_address; ?></td>
    <td colspan="2">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><strong>Town&nbsp;</strong></td>
    <td><?php echo $rowssupp->c_town; ?></td>
    <td colspan="2">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><strong>Telephone</strong></td>
    <td><?php echo $rowssupp->c_phone; ?></td>
    <td colspan="2">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><strong>Email Address</strong></td>
    <td><?php echo $rowssupp->c_email; ?></td>
    <td colspan="2">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  
  
</table>

<table width="700" border="0" align="center" class="table">
  <tr>
    <td width="10%"><div align="center"><strong> Code </strong></div></td>
    <td ><div align="center"><strong>Item Name </strong></div></td>
    <td width="20%"><div align="center"><strong>Pack Size </strong></div></td>
    <td width="2%"><div align="center"><strong>Qty</strong></div></td>
    <td width="10%"><div align="center"><strong>Unit Price (<?php echo $curr_name; ?>)</strong></div></td>
    <td width="15%"><div align="center"><strong>Totals (<?php echo $curr_name; ?>)</strong></div></td>
	<td width="15%"><div align="center"><strong>Discount (%)</strong></div></td>
	<td width="97" colspan="2"><div align="center"><strong>VAT(16%)</strong></div></td>
  </tr>
 <?php 
$subttl=0;  
$grndvat=0;
$grnddisc=0;
$grndttl=0;
$sqllpdet="select sales.sales_id,sales.quantity,sales.selling_price,sales.product_code,sales.vat_value,sales.discount_perc,
sales.discount_value,products.product_name,products.pack_size from sales, products where sales.product_id=products.product_id and sales.sales_code='$get_sales_code' order by sales.sales_id asc";
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
    <td><?php echo $rowslpdet->product_code;?></td>
    <td><?php echo $rowslpdet->product_name; ?></td>
    <td><?php echo $rowslpdet->pack_size; ?></td>
    <td><?php echo $rowslpdet->quantity; $qnty=$rowslpdet->quantity;?></td>
    <td align="right"><?php echo number_format($rowslpdet->selling_price ,2); $unit_val= $rowslpdet->selling_price;?></td>
    <td align="right"><strong><?php 
	
	//echo number_format($rowslpdet->ttl,2);
	
	
	//echo $qnty;  echo $unit_val;
	$ttl=$unit_val*$qnty;
	
	echo number_format ($ttl,2);
	//$id=$rowslpdet->purchase_order_id;
	
	
	/*$sqlttl="UPDATE purchase_order set ttl='$ttl' where purchase_order_id='$id'";
	$resultsttl= mysql_query($sqlttl) or die ("Error $sqlttl.".mysql_error());
	
	$sqlttl="UPDATE temp_purchase_order set ttl='$ttl' where purchase_order_id='$id'";
	$resultsttl= mysql_query($sqlttl) or die ("Error $sqlttl.".mysql_error());*/
	
	
	$subttl=$subttl+$ttl;
	
	

	
	

	?>	</strong></td>
	
	<td align="right">(<?php echo $rowslpdet->discount_perc; ?>%) <?php echo number_format ($rowslpdet->discount_value,2); $ttl_disc=$rowslpdet->discount_value; ?> </td>
	<td align="right"><?php echo number_format($rowslpdet->vat_value,2); $ttl_vat=$rowslpdet->vat_value; ?></td>
    
    
  </tr>
  
   <?php
	$grndvat=$grndvat+$ttl_vat;
	$grnddisc=$grnddisc+$ttl_disc;
	
	}
	
	?>
  
  
  
  
  <tr height="30">
    <td>&nbsp;</td>
    <td width="12%">&nbsp;</td>
    <td width="6%">&nbsp;</td>
 <td width="6%">&nbsp;</td>
    <td align="right" colspan="2"><strong>Sub Totals</strong></td>

    <td colspan="3" align="right"><strong><?php 

	echo number_format ($subttl,2);    

	?></strong></td>

  </tr>
  
  <tr height="30">
    <td>&nbsp;</td>
    <td width="12%">&nbsp;</td>
    <td width="6%">&nbsp;</td>
    <td width="19%">&nbsp;</td>
    
    <td align="right" colspan="2"><strong>Total VAT</strong></td>

    <td colspan="3"align="right"><?php 
	
	

	echo number_format ($grndvat,2);    

	?></td>

  </tr>
  
  <tr height="30">
    <td>&nbsp;</td>
    <td width="12%">&nbsp;</td>
    <td width="6%">&nbsp;</td>
    <td width="19%">&nbsp;</td>
   
    <td align="right" colspan="2"><strong>Total Discount</strong></td>

    <td colspan="3"align="right"><?php 

	echo number_format ($grnddisc,2);    

	?></td>
  </tr>
  
  <tr height="30">
    <td>&nbsp;</td>
    <td width="12%">&nbsp;</td>
    <td width="6%" colspan="2"><strong>
	
	
	
	 <?php 
	 
	 if ($mop)
	 {
	 
	 
	 echo 'Paid through: '.$mop; 
	 
	 }
	 
	 else 
	 
	 {
	 
	 }
	 
	 ?>
	
	
	
	</strong></td>
    
   
    <td align="right" colspan="2"><font size="+1"><strong>Total Amount</strong></font></td>

    <td colspan="3"align="right"><font size="+1"><?php 
	
	
	$grndttl=$subttl+$grndvat-$grnddisc;

	echo number_format ($grndttl,2);    

	?></font></td>

  </tr>
  
  <tr height="30">
    <td>&nbsp;</td>
    <td width="12%">&nbsp;</td>
    <td width="6%">&nbsp;</td>
    <td width="19%">&nbsp;</td>
   
    <td align="right" colspan="2"><font size="+1">Amount Paid</font></td>

    <td colspan="3"align="right"><font size="+1">
	
	<?php 
	$cash_rec=$grndttl-$inv_bal;
	
	

	echo number_format ($cash_rec,2);  


	?></font></td>

  </tr>
  
  <tr height="30">
    <td>&nbsp;</td>
    <td width="12%">&nbsp;</td>
    <td width="6%">&nbsp;</td>
    <td width="19%">&nbsp;</td>
   
    <td align="right" colspan="2"><font size="+1">Balance</font></td>

    <td colspan="3"align="right"><font size="+1" color="#ff0000"><?php 
	
	
	//$bal=$grndttl-$cash_rec;

	echo number_format ($inv_bal,2);    

	?></font></td>

  </tr>
  
  <?php 
	
	
	}
	
	?>
  
  <tr>
    <td colspan="8" align="right"><strong><em>Generated by :
         <?php 
$sqluser="select employees.emp_firstname,employees.emp_middle_name,employees.emp_lastname from employees,users where 
employees.emp_id=users.emp_id and users.user_id='$user'";
$resultsuser= mysql_query($sqluser) or die ("Error $sqluser.".mysql_error());
	
$rowsuser=mysql_fetch_object($resultsuser);	

echo $rowsuser->emp_firstname.' '.$rowsuser->emp_middle_name.' '.$rowsuser->emp_lastname;
	
	
	
	?>
    </em></strong></td>
  </tr></table>
  
  <br/>
  
<table width="700" border="0" align="center">
  <tr height="30">
    <td colspan="6" >Goods Checked By-----------------------------------------------------------------------Sign----------------------------------------------------------</td>
  </tr>
  
  <tr height="30">
    <td colspan="6" >Goods Received By---------------------------------------------------------------------- Sign--------------------------- Stamp------------------------</td>
  </tr>
  
  <tr>
    <td colspan="6" align="center" ><strong>GOODS MUST BE CHECKED AND VERIFIED AT THE TIME OF DELIVERY. NO COMPLAINT WILL BE<br/>
	ENTERTAINED ONCE YOU HAVE ACCEPTED THE GOODS, NO CASH PAYMENTS TO BE MADE <br/>
	TO ANY OF OUR SALES PERSON UNLESS AUTHORITY IN WRITING IS OBTAINED.<br/>
	GOODS REMAIN THE PROPERTY OF BRISK DIAGNOSTICS LTD UNTIL PAID FOR IN FULL.<br/>



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
