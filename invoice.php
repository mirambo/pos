<?php 
include('includes/session.php');
include('Connections/fundmaster.php');
//$get_latest_invoice_id=$_GET['invoice_id'];
//$get_latest_client_id=$_GET['client_id'];
//$get_latest_sales_id=$_GET['sales_code'];
$sales_code_id=$_GET['sales_code_id'];
$sales_type=$_GET['sales_type'];

$sqlrec="select sales_code.invoice_no,sales_code.sale_date,sales_code.terms,sales_code.currency,sales_code.date_generated,sales_code.curr_rate,
sales_code.user_id,sales_code.sales_code_id,sales_code.client_id,clients.c_name,currency.curr_name FROM currency,clients,sales_code WHERE 
currency.curr_id=sales_code.currency and sales_code.client_id=clients.client_id AND sales_code.sales_code_id='$sales_code_id'";
$resultsrec= mysql_query($sqlrec) or die ("Error $sqlrec.".mysql_error());	
$rowsrec=mysql_fetch_object($resultsrec);

$curr_name=$rowsrec->curr_name;
$curr_rate=$rowsrec->curr_rate;
$invoice_no=$rowsrec->invoice_no;
$client_id=$rowsrec->client_id;
$date_generated=$rowsrec->date_generated;
$terms=$rowsrec->terms;
$jb_user_id=$rowsrec->user_id;

/* $sqlx="select employees.emp_firstname,employees.emp_middle_name,employees.emp_lastname,employees.emp_phone from employees,users where 
employees.emp_id=users.emp_id and users.user_id='$sales_rep'";
$resultsx= mysql_query($sqlx) or die ("Error $sqlx.".mysql_error());
$rowsx=mysql_fetch_object($resultsx); */	


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

<body >
<table width="700" border="0" align="center">
   
	
	 <?php 
  
$querysup="select * from clients where client_id ='$client_id'";
$resultssup=mysql_query($querysup) or die ("Error: $querysup.".mysql_error());
$rowssupp=mysql_fetch_object($resultssup);


$querycont="select * from company_contacts order by contacts_id desc limit 1";
$resultscont=mysql_query($querycont) or die ("Error: $querycont.".mysql_error());
$rowscont=mysql_fetch_object($resultscont);
  
  
  ?>
  <tr>
     <td  align="right" colspan="4" rowspan="6" valign="top">
	<table width="100%" border="0">
	<tr><td colspan="2"><font size="+1"><strong>To:</strong></font></td></tr>
	<tr><td><strong>Client Name</strong></td><td><?php echo $rowssupp->c_name; ?></td></tr>
	<tr><td><strong>Address</strong></td><td>P.O. BOX <?php echo $rowssupp->c_address; ?></td></tr>
	<tr><td>Town</td><td><?php echo $rowssupp->c_town; ?></td></tr>
	<tr><td>Telephone</td><td><?php echo $rowssupp->c_phone; ?></td></tr>
	<tr><td>Email Address</td><td><?php echo $rowssupp->c_email; ?></td></tr>
	
	</table>
	
	
	</td>
 
    <td colspan="5" align="right" valign="top"><img src="<?php echo $base_url;?>images/logolpo.png" /></td>
  </tr>
  <tr>
    <td colspan="6"><div align="right"><?php echo $rowscont->building.' '.$rowscont->street; ?><!--Kigali Road, Jamia Plaza, 2nd Floor --></div></td>
  </tr>
   <tr>
    <td colspan="6"><div align="right">
    Mobile: <?php echo $rowscont->phone; ?></div></td>
  </tr>
  <tr>
    <td colspan="6"><div align="right">
    Telephone: <?php echo $rowscont->telephone; ?></div></td>
  </tr>
  <tr>
    <td colspan="6"><div align="right">Email : <?php echo $rowscont->email; ?></div></td>
  </tr>
  <tr>
    <td colspan="6"><div align="right">Website : www.briskdiagnostics.com</div></td>
  </tr>
 <!-- <tr>
    <td colspan="7"><div align="right"><strong>Sale Representative : </strong><?php echo $rowsx->emp_firstname.' '.$rowsx->emp_middle_name.' '.$rowsx->emp_lastname; ?> <strong>Phone : </strong><?php echo $rowsx->emp_phone; ?></div></td>
  </tr>
  
  <tr>
    <td width="20%"  colspan="2"><font size="+1"><strong>To:</strong></font></td>
    <td colspan="3"><font size="+1"><strong><?php //echo $rowssupp->supplier_name; ?></strong></font></td>
  </tr>
  <tr>
    <td width="30%"><strong>Client Name</strong></td>
	<td><?php echo $rowssupp->c_name; ?></td>
    <td ></td>
    <td colspan="2">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    
    <td><strong>Address</strong></td>
    <td width="31%">P.O. BOX <?php echo $rowssupp->c_address; ?></td>
	<td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    
    <td><strong>Town&nbsp;</strong></td>
    <td><?php echo $rowssupp->c_town; ?></td>
	<td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>

    <td><strong>Telephone</strong></td>
    <td><?php echo $rowssupp->c_phone; ?></td>
	<td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    
    <td><strong>Email Address</strong></td>
    <td><?php echo $rowssupp->c_email; ?></td>
	<td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>-->
  
  <tr height="30">
    <td colspan="10" bgcolor="#000033" align="center"><span style="font-size:17px; font-weight:bold; color: #FFFFFF;">
<?php 
if ($sales_type=='c')
{
?>
CASH SALES RECEIPT 
<?php
}
else
{
?>
INVOICE
<?php
}
 ?>	
	
	
	
	
	</span></td>
  </tr>
  <tr height="30">
    <td colspan="10"  align="right">DATE : <?php echo $date_generated; 

	?><hr/></td>
  </tr>
  
   <tr height="20">
    <td colspan="10"  align="right"><strong>
	<?php 
if ($sales_type=='c')
{
?>
CASH SALES RECEIPT NO:
<?php
}
else
{
?>
INVOICE NO : 
<?php
}
 ?>
	
	
	
	
	<?php 
	echo $invoice_no;
	?>
	<hr/>
	</strong></td>
  </tr>
  <!--<tr>
    <td width="30%"><strong>CLIENT'S CONTACT</strong></td>
    <td colspan="2" width="30%"><strong>CLIENT'S DELIVERY ADDRESS </strong></td>
    <td width="46%"><strong>PAYMENT TERMS</strong></td>
    <td width="40%" colspan="3"><strong>PAYMENT TERMS </strong></td>
  </tr>-->
  <tr bgcolor="#C0D7E5">
    <td width="30%"><strong>CLIENT'S CONTACT</strong></td>
    <td colspan="4"><strong>CLIENT'S DELIVERY ADDRESS </strong></td>
    <td colspan="5" align="center"><strong>PAYMENT TERMS</strong></td>
	
	
	
  
  </tr>
   <tr >
    <td width="30%"><?php echo $rowssupp->contact_person;  ?></td>
    <td colspan="4"><?php echo $rowssupp->c_paddress;  ?></td>
  <td colspan="5" align="center"><?php echo $terms; ?></td>
	
	
   
   
  </tr>
  <tr >
    <td width="30%"><?php echo $rowssupp->c_phone; ?></td>
    <td colspan="4"><?php echo $rowssupp->c_street;?></td>
    <td colspan="2"><?php echo $rowsship->town;   ?></td>

  </tr>
  <tr >
    <td width="30%"><?php echo $rowssupp->c_telephone;?></td>
    <td colspan="4">B.O.Pox: <?php echo $rowssupp->c_address;?> </td>
    <td colspan="2"><?php echo $rowsship->phone;   ?></td>

  </tr>
  <tr >
    <td width="30%"><?php echo $rowssupp->c_email;?></td>
    <td colspan="4"><?php echo $rowssupp->c_town;?></td>
    <td colspan="2"><?php echo $rowsship->email;   ?></td>

  </tr>
  <tr height="10">
    <td colspan="10"><hr/></td>
   
  </tr>
 
  
  
  
    
  
  

  
  
</table>

<table width="700" border="0" align="center" class="table">
  <tr>
    <td width="10%"><div align="center"><strong>Code </strong></div></td>
    <td colspan="3" width="30%"><div align="center"><strong>Item Name / Description</strong></div></td>
    <td width="20%"><div align="center"><strong>Pack Size</strong></div></td>
    <td width="10%"><div align="center"><strong>Qty</strong></div></td>
    <td width="15%"><div align="center"><strong>Price (<?php echo $curr_name; ?>)</strong></div></td>
    <td width="20%"><div align="center"><strong>Totals (<?php echo $curr_name; ?>)</strong></div></td>
	
  </tr>
 <?php 
$subttl=0;  
$grndvat=0;
$grnddisc=0;
$grndttl=0;
$sqllpdet="select sales.sales_id,sales.prod_desc,sales.quantity,sales.quantity,sales.selling_price,sales.discount_value,sales.product_id,sales.vat_value,sales.vat,
sales.lease,sales.foc,sales.vat_value,products.product_name,products.prod_code,products.pack_size from sales_code,sales, 
products where sales.product_id=products.product_id AND sales.sales_code_id=sales_code.sales_code_id AND sales.sales_code_id='$sales_code_id' order by sales.sales_id asc";
$resultslpdet= mysql_query($sqllpdet) or die ("Error $sqllpdet.".mysql_error());


if (mysql_num_rows($resultslpdet) > 0)
						  {
							  $RowCounter=0;
							  while ($rowslpdet=mysql_fetch_object($resultslpdet))
							  { 
							  
							  $RowCounter++;
							  if($RowCounter % 2==0)
{
echo '<tr bgcolor="#C0D7E5" height="10">';
}
else 
{
echo '<tr bgcolor="#FFFFCC" height="10" >';
}
 
 
 ?>
    <td><?php echo $rowslpdet->prod_code; $sales_code=$rowslpdet->sales_code;?></td>
    <td colspan="3" width="30%"><?php echo $rowslpdet->product_name.'  '.$rowslpdet->prod_desc; ?></td>
    <td><?php echo $rowslpdet->pack_size; ?></td>
    <td align="center"><?php echo $rowslpdet->quantity; $qnty=$rowslpdet->quantity;?></td>
    <td align="right"><?php 
	$selling_price=$rowslpdet->selling_price;
	if ($selling_price=='F.O.C')
		{
		echo $selling_price;
		}
		elseif ($selling_price=='Lease')
		{
		echo $selling_price;
		
		}
		elseif ($selling_price=='F.O.C&Lease')
		{
		echo $selling_price;
		}
		
		else		
		{
	echo number_format($rowslpdet->selling_price ,2); $unit_val= $rowslpdet->selling_price;
	}
	
	
	
	$ttl_vat=$rowslpdet->vat_value;
	$ttl_disc=$rowslpdet->discount_value;
	
	?></td>
    <td align="right"><strong><?php 
	
	
	$ttl=$selling_price*$qnty;
	
	echo number_format ($ttl,2);
	//$id=$rowslpdet->purchase_order_id;
	
	
	/*$sqlttl="UPDATE purchase_order set ttl='$ttl' where purchase_order_id='$id'";
	$resultsttl= mysql_query($sqlttl) or die ("Error $sqlttl.".mysql_error());
	
	$sqlttl="UPDATE temp_purchase_order set ttl='$ttl' where purchase_order_id='$id'";
	$resultsttl= mysql_query($sqlttl) or die ("Error $sqlttl.".mysql_error());*/
	
	
	$subttl=$subttl+$ttl;
	
	

	
	

	?>	</strong></td>
	
	
    
    
  </tr>
  
   <?php
	$grndvat=$grndvat+$ttl_vat;
	$grnddisc=$grnddisc+$ttl_disc;
	
	}
	
	?>
  
  
  
  
  <tr height="10">
    <td>&nbsp;</td>
  
    
 <td width="6%" colspan="5" align="right"><strong>Sub Totals</strong></td>
    <td align="right" colspan="2"><?php 

	echo number_format ($subttl,2);    

	?></td>

    

  </tr>
  <tr height="10">
    <td>&nbsp;</td>
  
    
 <td width="6%" colspan="5" align="right"><strong>Total VAT</strong></td>
    <td align="right" colspan="2"><?php 

	echo number_format ($grndvat,2);  

	?></td>

    

  </tr>
  
  <tr height="10">
    <td>&nbsp;</td>
  
    
 <td width="6%" colspan="5" align="right"><strong>Total Discount</strong></td>
    <td align="right" colspan="2"><?php 

echo number_format ($grnddisc,2); 

	?></td>

    

  </tr>
  
  <tr height="10">
    <td>&nbsp;</td>
  
    
 <td width="6%" colspan="5" align="right"><strong>Total Amount</strong></td>
    <td align="right" colspan="2"><?php 

	$grndttl=$subttl+$grndvat-$grnddisc;

	echo number_format ($grndttl,2);     

	?></td>

    

  </tr>
  
 
  
  <tr height="10">
    <td>&nbsp;</td>
 
    <td width="19%" colspan="5" align="right"><strong>Amount Paid</strong></td>
    
    <td align="right" colspan="2"><?php 
	
	$queryred1="select  * from  partial_invoice_payments where sales_code_id='$sales_code_id'";
$resultsred1=mysql_query($queryred1) or die ("Error: $queryred1.".mysql_error());
$numrowsred1=mysql_fetch_object($resultsred1);	
$amnt_paid=$numrowsred1->amount_received;

if ($sales_type=='c')
{

$amnt_paid=$grndttl;

}
else
{
$amnt_paid=$numrowsred1->amount_received;
}



echo number_format($amnt_paid,2);

	//echo number_format ($grnddisc,2);    

	?></td>



  </tr>
  
  
  
  <tr height="10">
    <td>&nbsp;</td>
 
    
	
	
	
	
    <td width="6%" colspan="5" align="right"><strong>Balance</strong></td>
    
   
    <td align="right" colspan="2"><strong><font color="#ff0000"><?php 
	
 echo number_format($grndbal=$grndttl-$amnt_paid,2);


	

	?></font></strong></td>

   

  </tr>
  
  
  
  
  
  
  
  <?php 
	
	
	}
	
	?>
  
  <tr>
    <td colspan="8" align="right"><strong><em>Generated by :
         <?php 
$sqluser="select * FROM users WHERE user_id='$jb_user_id'";
$resultsuser= mysql_query($sqluser) or die ("Error $sqluser.".mysql_error());
	
$rowsuser=mysql_fetch_object($resultsuser);	

echo $rowsuser->f_name;
	
	
	
	?>
    </em></strong></td>
  </tr></table>
  
  <br/>
  
<table width="700" border="0" align="center">
  <tr height="10">
    <td colspan="6" >Goods Checked By-----------------------------------------------------------------------Sign----------------------------------------------------------</td>
  </tr>
  
  <tr height="10">
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
