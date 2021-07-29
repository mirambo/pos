<?php 
include('includes/session.php');
include('Connections/fundmaster.php');
$get_latest_rfq_id=$_GET['all_rfq_id'];
$quotation_no=$_GET['quotation_no'];
$get_latest_client_id=$_GET['client_id'];
$get_latest_quote_code=$_GET['quote_code'];
$get_currency=$_GET['currency'];

$sqlcurr="select * from currency where curr_id='$get_currency'";
$resultscurr= mysql_query($sqlcurr) or die ("Error $sqlcurr.".mysql_error());
$rowcurr=mysql_fetch_object($resultscurr);
$curr_name=$rowcurr->curr_name;

header("Content-Type: application/vnd.ms-word");
header("Content-Disposition: attachment;Filename=Quotation-$quotation_no.doc");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");

$year=date('Y');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Quotation - <?php echo $quotation_no; ?></title>
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
<table width="700" border="0" align="center" style="margin:auto;" >
  <tr>
    <td colspan="4" rowspan="5" valign="center">
	<table width="100%" border="0">
	<?php 
	
$querysup="select * from clients where client_id ='$get_latest_client_id'";
$resultssup=mysql_query($querysup) or die ("Error: $querysup.".mysql_error());
$rowssupp=mysql_fetch_object($resultssup);

$querycont="select * from company_contacts order by contacts_id desc limit 1";
$resultscont=mysql_query($querycont) or die ("Error: $querycont.".mysql_error());
$rowscont=mysql_fetch_object($resultscont);

	?>
	
	
	
	</table>
	
	
	</td>
    
  </tr>
  <tr>
    <td colspan="3" align="right" width="20%"><img src="<?php echo $base_url;?>images/logolpo.png" /></td>
  </tr>
  <tr>
    <td colspan="7"><div align="right"><?php echo $rowscont->building.' '.$rowscont->street; ?><!--Kigali Road, Jamia Plaza, 2nd Floor --></div></td>
  </tr>
   <tr>
    <td colspan="7"><div align="right">
       
    Mobile: <?php echo $rowscont->phone.'&nbsp;Telephone '.$rowscont->telephone; ?></div></td>
  </tr>
  <tr>
    <td colspan="7"><div align="right">Email : <?php echo $rowscont->email; ?></div></td>
  </tr>
  <tr><td colspan="7"><font size="+1"><strong>To:</strong></font></td></tr>
	<tr><td colspan="7"><font size="+1"><strong><?php echo $rowssupp->c_name; ; ?></strong></font></td></tr>
	<tr><td>P.O. BOX <?php echo $rowssupp->c_address; ?></td></tr>
	<tr><td colspan="7"><?php echo $rowssupp->c_town; ?></td></tr>
	<tr><td colspan="7"><?php echo $rowssupp->c_phone; ?></td></tr>
	<tr><td colspan="7"><?php echo $rowssupp->c_email; ?></td></tr>
 
 
  <tr height="30">
    <td colspan="7" bgcolor="#000033" align="center"><span style="font-size:17px; font-weight:bold; color: #FFFFFF;">QUOTATION</span></td>
  </tr>
  <tr height="20">
    <td colspan="7"  align="left">DATE : <?php echo (Date("l F d, Y")); 
	$date_generated=date('Y-m-d');
	?><hr/></td>
  </tr>
  
  
   <tr height="20">
    <td colspan="7"  align="left"><strong>QUOTATION NO :  <?php 
	echo $quotation_no;
	
	
	?>
	
	</strong><hr/></td>
  </tr>
  <tr>
    <td width="30%"><strong>CLIENT'S CONTACT </strong></td>
    <td colspan="3"><strong>CLIENT'S DELIVERY ADDRESS </strong></td>
  
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
<tr height="20">
    <td colspan="7"><hr/></td>
    
  </tr>
  
 
 
  
  
</table>

<table width="700" border="0" align="center" class="table" style="margin:auto;">
 <tr>
    <td width="10%"><div align="center"><strong> Code </strong></div></td>
    <td colspan="3"><div align="center"><strong>Item Name </strong></div></td>
    <td width="20%"><div align="center"><strong>Pack Size </strong></div></td>
    <td width="2%"><div align="center"><strong>Qty</strong></div></td>
    <td width="10%"><div align="center"><strong>Unit Price (<?php echo $curr_name; ?>)</strong></div></td>
    <td width="15%"><div align="center"><strong>Totals (<?php echo $curr_name; ?>)</strong></div></td>
	<!--<td width="15%"><div align="center"><strong>Discount (%)</strong></div></td>
	<td width="97" colspan="2"><div align="center"><strong>VAT(16%</strong></div></td>-->
  </tr>
  
  <?php 
  
$grndttl=0;

$sqllpdet="select quote.quote_id,quote.quantity, quote.selling_price,quote.product_code,quote.vat_value,quote.discount_perc,quote.discount_value,products.product_name, 
products.pack_size from quote, products where quote.product_id=products.product_id AND quote.quote_code='$get_latest_quote_code' order by quote.quote_id asc";
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
  
 
    <td><?php echo $rowslpdet->product_code; $quote_code=$rowslpdet->quote_code;?></td>
    <td colspan="3" width="30%"><?php echo $rowslpdet->product_name; ?></td>
    <td><?php echo $rowslpdet->pack_size; ?></td>
    <td align="center"><?php echo $rowslpdet->quantity; $qnty=$rowslpdet->quantity;?></td>
    <td align="right"><?php echo number_format($rowslpdet->selling_price ,2); $unit_val= $rowslpdet->selling_price;?></td>
    <td align="right"><strong><?php 
	
	
	$ttl=$unit_val*$qnty;
	
	echo number_format ($ttl,2);
	
	
	
	$subttl=$subttl+$ttl;
	
	

	
	

	?>	</strong></td>
	
	<!--<td align="right">(<?php echo $rowslpdet->discount_perc; ?>%) <?php echo number_format ($rowslpdet->discount_value,2); $ttl_disc=$rowslpdet->discount_value; ?> </td>
	<td align="right" colspan="2"><?php echo number_format($rowslpdet->vat_value,2); $ttl_vat=$rowslpdet->vat_value; ?></td>-->
    
    
  </tr>
  
   <?php
	
	$grndvat=$grndvat+$ttl_vat;
	$grnddisc=$grnddisc+$ttl_disc;
	}
	
	
	?>
	<tr height="30">
    <td>&nbsp;</td>
    <td width="12%" colspan="3">&nbsp;</td>

    <td align="right" colspan="2"><strong>Sub Totals</strong></td>

    <td colspan="3" align="right"><strong><?php 

	echo number_format ($subttl,2);    

	?></strong></td>

  </tr>
  
  <tr height="30">
    <td>&nbsp;</td>
    <td width="12%" colspan="3">&nbsp;</td>

    
    <td align="right" colspan="2"><strong>Total VAT</strong></td>

    <td colspan="3"align="right"><?php 
	
	

	echo number_format ($grndvat,2);    

	?></td>

  </tr>
  
  <tr height="30">
    <td>&nbsp;</td>
    <td width="12%" colspan="3">&nbsp;</td>

   
    <td align="right" colspan="2"><strong>Total Discount</strong></td>

    <td colspan="3"align="right"><?php 

	echo number_format ($grnddisc,2);    

	?></td>
  </tr>
  
  <tr height="30">
    <td>&nbsp;</td>
    <td width="12%" colspan="3">&nbsp;</td>

    
   
    <td align="right" colspan="2"><font size="+1"><strong>Total Amount</strong></font></td>

    <td colspan="3"align="right"><font size="+1"><?php 
	
	
	$grndttl=$subttl+$grndvat-$grnddisc;

	echo number_format ($grndttl,2);    

	?></font></td>

  </tr>
  
  
  
  
  
  <?php 
	
	
	}
	
	?>
  

  
   <tr>
    <td colspan="9" align="right"><strong><em>Generated by :
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
  









</body>
</html>
