<?php 
include('includes/session.php');
include('Connections/fundmaster.php');
//$get_latest_invoice_id=$_GET['invoice_id'];
//$get_latest_client_id=$_GET['client_id'];
//$get_latest_sales_id=$_GET['sales_code'];
$cash_rec=$_GET['cash_rec'];
$mop=$_GET['mop'];
$invoice_no_top=$_GET['invoice_no'];
$date_generated=$_GET['date_generated'];
$client_id=$_GET['client_id'];
$sales_rep=$_GET['sales_rep'];

session_start(); 
$get_invoice_no=$_SESSION['invoice_no'];
$sess_client_id=$_SESSION['get_client_id'];
$get_sales_code=$_GET['sales_code'];

$currency=$_SESSION['currency'];

$year=date('Y');
$sqlcurr="select * from currency where curr_id='$currency'";
$resultscurr= mysql_query($sqlcurr) or die ("Error $sqlcurr.".mysql_error());
$rowcurr=mysql_fetch_object($resultscurr);
$curr_name=$rowcurr->curr_name;

$sqlx="select employees.emp_firstname,employees.emp_middle_name,employees.emp_lastname,employees.emp_phone from employees,users where 
employees.emp_id=users.emp_id and users.user_id='$sales_rep'";
$resultsx= mysql_query($sqlx) or die ("Error $sqlx.".mysql_error());
$rowsx=mysql_fetch_object($resultsx);	

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Invoice - <?php echo $invoice_no_top; ?></title>
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

<body >
<table width="700" border="0" align="center" style="margin:auto;">
   
	
	 <?php 
  
$querysup="select * from clients where client_id ='$client_id'";
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
    Mobile: <?php echo $rowscont->phone; ?></div></td>
  </tr>
  <tr>
    <td colspan="7"><div align="right">
    Telephone: <?php echo $rowscont->telephone; ?></div></td>
  </tr>
  <tr>
    <td colspan="7"><div align="right">Email : <?php echo $rowscont->email; ?></div></td>
  </tr>
  <tr>
    <td colspan="7"><div align="right">Website : www.briskdiagnostics.com</div></td>
  </tr>
   <tr>
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
  </tr>
  <tr height="30">
    <td colspan="7" bgcolor="#000033" align="center"><span style="font-size:17px; font-weight:bold; color: #FFFFFF;">INVOICE</span></td>
  </tr>
  <tr height="30">
    <td colspan="7"  align="right">DATE : <?php echo $date_generated; ?>

	<hr/></td>
  </tr>
  
   <tr height="20">
    <td colspan="7"  align="right"><strong>INVOICE NO :  <?php 
	echo $invoice_no_top;
	
	?>
	<hr/>
	</strong></td>
  </tr>
  <tr>
    <td width="30%"><strong>CLIENT'S CONTACT </strong></td>
    <td colspan="2"><strong>CLIENT'S DELIVERY ADDRESS </strong></td>
    <td width="46%"><strong><!--SHIP VIA --></strong></td>
    <td width="40%" colspan="3"><strong><!--PAYMENT TERMS --></strong></td>
  </tr>
  <tr>
    <td width="30%"><?php echo $rowssupp->contact_person;  ?></td>
    <td colspan="2"><?php echo $rowssupp->c_paddress;  ?></td>
	<?php 
	
$queryship="select * from shippers where shipper_id ='$shipp_id'";
$resultsship=mysql_query($queryship) or die ("Error: $queryship.".mysql_error());
$rowsship=mysql_fetch_object($resultsship);
	
	
	
	
	?>
	
	
    <td><?php echo $rowsship->shipper_name;   ?></td>
    <td colspan="3"><?php echo $pay_terms;   ?></td>
  </tr>
  <tr>
    <td width="30%"><?php echo $rowssupp->c_phone; ?></td>
    <td colspan="2"><?php echo $rowssupp->c_street;?></td>
    <td><?php echo $rowsship->town;   ?></td>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td width="30%"><?php echo $rowssupp->c_telephone;?></td>
    <td colspan="2">B.O.Pox: <?php echo $rowssupp->c_address;?> </td>
    <td><?php echo $rowsship->phone;   ?></td>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td width="30%"><?php echo $rowssupp->c_email;?></td>
    <td colspan="2"><?php echo $rowssupp->c_town;?></td>
    <td><?php echo $rowsship->email;   ?></td>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr height="10">
    <td colspan="7"><hr/></td>
   
  </tr>
 
  
  
  
    
  
  

  
  
</table>

<table width="700" border="0" align="center" class="table" style="margin:auto;">
  <tr>
    <td width="10%"><div align="center"><strong> Code </strong></div></td>
    <td colspan="3"><div align="center"><strong>Item Name </strong></div></td>
    <td width="10%"><div align="center"><strong>Pack Size </strong></div></td>
    <td width="10%"><div align="center"><strong>Qty</strong></div></td>
    <td width="15%"><div align="center"><strong>Price (<?php echo $curr_name; ?>)</strong></div></td>
    <td width="20%"><div align="center"><strong>Totals (<?php echo $curr_name; ?>)</strong></div></td>
	
  </tr>
 <?php 
$subttl=0;  
$grndvat=0;
$grnddisc=0;
$grndttl=0;
$sqllpdet="select sales.sales_id,sales.temp_sales_id,sales.quantity,sales.selling_price,sales.product_code,sales.vat_value,sales.discount_perc,
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
    <td><?php echo $rowslpdet->product_code; $sales_code=$rowslpdet->sales_code;?></td>
    <td colspan="3"><?php echo $rowslpdet->product_name; ?></td>
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
	
	
    
    
  </tr>
  
   <?php
	$grndvat=$grndvat+$ttl_vat;
	$grnddisc=$grnddisc+$ttl_disc;
	
	}
	
	?>
  
  
  
  
  <tr height="30">
    <td>&nbsp;</td>
  
    
 <td width="6%" colspan="5" align="right"><strong>Sub Totals</strong></td>
    <td align="right" colspan="2"><strong><?php 

	echo number_format ($subttl,2);    

	?></strong></td>

    

  </tr>
  
  <tr height="30">
    <td>&nbsp;</td>
 
    <td width="19%" colspan="5" align="right"><strong>Total VAT</strong></td>
    
    <td align="right" colspan="2"><?php 
	
	

	echo number_format ($grndvat,2);    

	?></td>



  </tr>
  
  <tr height="30">
    <td>&nbsp;</td>
 
    <td width="19%" colspan="5" align="right"><strong>Total Discount</strong></td>
   
    <td align="right" colspan="2"><?php 

	echo number_format ($grnddisc,2);    

	?></td>

   
  </tr>
  
  <tr height="30">
    <td>&nbsp;</td>
    <!--<td width="12%"><strong>
	
	
	
	 <?php 
	 
	 if ($mop)
	 {
	 
	 
	 echo 'Paid through: '.$mop; 
	 
	 }
	 
	 else 
	 
	 {
	 
	 }
	 
	 ?>
	
	
	
	</strong></td>-->
    <td width="6%" colspan="5" align="right"><font size="+1"><strong>Total Amount</strong></font></td>
    
   
    <td align="right" colspan="2"><font size="+1"><?php 
	
	
	$grndttl=$subttl+$grndvat-$grnddisc;

	echo number_format ($grndttl,2);    

	?></font></td>

   

  </tr>
  
  <tr height="30">
    <td>&nbsp;</td>
   
    <td width="19%" colspan="5" align="right" ><font size="+1">Amount Paid</font></td>
   
    <td align="right" colspan="2"><font size="+1">
	
	</font></td>



  </tr>
  
  <tr height="30">
    <td>&nbsp;</td>

    <td width="19%" colspan="5" align="right"><font size="+1">Balance</font></td>
   
    <td align="right" colspan="2"><font size="+1" color="#ff0000"><?php 
	
	
	$bal=$grndttl-$cash_rec;

	echo number_format ($bal,2);    

	?></font></td>

    

  </tr>
  
  <?php 
	
	
	}
	
	?>
  
  <tr>
    <td colspan="8" align="right"><strong><em>Generated by :
         <?php 
$sqluser="select employees.emp_firstname,employees.emp_middle_name,employees.emp_lastname from employees,users where 
employees.emp_id=users.emp_id and users.user_id='$user_id'";
$resultsuser= mysql_query($sqluser) or die ("Error $sqluser.".mysql_error());
	
$rowsuser=mysql_fetch_object($resultsuser);	

echo $rowsuser->emp_firstname.' '.$rowsuser->emp_middle_name.' '.$rowsuser->emp_lastname;
	
	
	
	?>
    </em></strong></td>
  </tr></table>
  
  <br/>
  
<table width="700" border="0" align="center" style="margin:auto;">
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
