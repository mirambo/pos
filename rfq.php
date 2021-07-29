<?php 
include('includes/session.php');
include('Connections/fundmaster.php');
$get_latest_rfq_id=$_GET['all_rfq_id'];
$rfq_no=$_GET['rfq_no'];
$get_latest_sup_id=$_GET['supp_id'];
$get_latest_rfq_id=$_GET['rfq_code'];

$year=date('Y');



$sqlrec="select order_code_get.lpo_no,order_code_get.supplier_id,order_code_get.order_code_id,order_code_get.freight_charge,order_code_get.comments,
order_code_get.currency,order_code_get.curr_rate,currency.curr_name,mop.mop_name,shippers.shipper_name,order_code_get.supplier_id,suppliers.supplier_name
FROM mop,shippers,currency,suppliers,order_code_get WHERE order_code_get.mop_id=mop.mop_id AND shippers.shipper_id=order_code_get.shipper_id AND 
order_code_get.currency=currency.curr_id AND order_code_get.supplier_id=suppliers.supplier_id AND order_code_get.order_code_id='$order_code'";
$resultsrec= mysql_query($sqlrec) or die ("Error $sqlrec.".mysql_error());	
$rowsrec=mysql_fetch_object($resultsrec);
$supplier_id=$rowsrec->supplier_id;
$lpo_no=$rowsrec->lpo_no;
$currency=$rowsrec->currency;
$curr_rate=$rowsrec->curr_rate;
$curr_name=$rowsrec->curr_name;
$freight_charge=$rowsrec->freight_charge;
$shipper_name=$rowsrec->shipper_name;
$pay_terms=$rowsrec->mop_name;

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Request for Quotation - <?php echo $rfq_no; ?></title>
<link rel="stylesheet" type="text/css" href="<?php echo $base_url;?>styledd.css" />

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
<table width="700" border="0" align="center" style="margin:auto">
   <?php 
  
$querysup="select * from suppliers where supplier_id ='$get_latest_sup_id'";
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
	<tr><td width="25%"><strong>Supplier Name:</strong></td><td><?php echo $rowssupp->supplier_name; ?></td></tr>
	<tr><td><strong>Address:</strong></td><td><?php echo $rowssupp->postal; ?></td></tr>
	<tr><td><strong>Country:</strong></td><td><?php echo $rowssupp->country; ?></td></tr>
	<tr><td><strong>Telephone:</strong></td><td><?php echo $rowssupp->phone; ?></td></tr>
	<tr><td><strong>Email Address:</strong></td><td><?php echo $rowssupp->email; ?></td></tr>
	
	</table>
	
	
	</td>
 
    <td colspan="3" align="right" valign="top"><img src="<?php echo $base_url;?>images/logolpo.png" /></td>
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
    <td colspan="6"><div align="right">Website : <?php echo $rowscont->fax;?></div></td>
  </tr>
 
  <tr height="30">
    <td colspan="11" bgcolor="#000033" align="center"><span style="font-size:17px; font-weight:bold; color: #FFFFFF;">REQUEST FOR QUOTATION</span></td>
  </tr>
  <tr height="30">
    <td colspan="11"  align="right">DATE : <?php echo (Date("l F d, Y")); 
	$date_generated=date('Y-m-d');
	?><hr/></td>
  </tr>
  
   <tr height="30">
    <td colspan="11"  align="left"><strong>REF NO :  <?php 
	echo $rfq_no;
	
	
	?>
	<hr/>
	</strong></td>
  </tr>
  </table>
  <table width="700" border="0" bgcolor="#C0D7E5" style="border-top:1px solid #073B6A; border-bottom:1px solid #073B6A; margin:auto;">
  
  <tr>
    <td colspan="2" width="40%"><strong>CONTACT </strong></td>
    <td colspan="2"><strong>DELIVERY ADDRESS </strong></td>
    <td width="56%"><strong>SHIP VIA </strong></td>
    <td width="30%"><strong>PAYMENT TERMS </strong></td>
  </tr>
  
  <?php 
	
$querycont="select * from company_contacts order by contacts_id desc limit 1";
$resultscont=mysql_query($querycont) or die ("Error: $querycont.".mysql_error());
$rowscont=mysql_fetch_object($resultscont);
	
	
	
	
	?>
  
  
  
  <tr>
    <td colspan="2"><?php echo $rowscont->cont_person; ?></td>
    <td colspan="2"><?php echo $rowscont->street; ?></td>
	
	
	
    <td><?php echo $shipper_name;   ?></td>
    <td><?php echo $pay_terms;   ?></td>
  </tr>
  <tr>
    <td colspan="2"><?php echo  $rowscont->phone; ?></td>
    <td colspan="2"><?php echo  $rowscont->building; ?></td>
    <td><?php echo $rowsship->town;   ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2"><?php echo  $rowscont->telephone; ?></td>
    <td colspan="2">P.O.BOX<?php echo  $rowscont->address; ?> </td>
    <td><?php echo $rowsship->phone;   ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2"><?php echo  $rowscont->email; ?></td>
    <td colspan="2"><?php echo  $rowscont->town; ?> - Kenya</td>
    <td><?php echo $rowsship->email;   ?></td>
    <td>&nbsp;</td>
  </tr>
  
  
  
    
  <tr>
    <td>&nbsp;</td>
    <td></td>
    <td width="31%">&nbsp;</td>
    <td colspan="2">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  
  
</table>
<br/>

<table width="700" border="0" align="center" class="table">
  <tr>
    <td width="50"><div align="center"><strong>Code</strong></div></td>
    <td width="181"><div align="center"><strong>Item Name</strong></div></td>
    <td width="164"><div align="center"><strong>Pack Size</strong></div></td>
    <td width="71"><div align="center"><strong>Qty</strong></div></td>
 
  </tr>
  
  <?php 
  
$grndttl=0;

$sqllpdet="select temp_rfq.temp_rfq_id,temp_rfq.quantity,temp_rfq.product_code,products.product_name, products.pack_size from temp_rfq, products where 
temp_rfq.product_id=products.product_id order by temp_rfq.temp_rfq_id asc";
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
    <td align="center"><?php echo $rowslpdet->quantity; $qnty=$rowslpdet->quantity;
	
	?></td>
    

  </tr>
  
   <?php
	
	
	}
	
	?>
 
  
   <?php 
	
	
	}
	?>
  
  <tr>
    <td colspan="4" align="right"><strong><em>Generated by :
          <?php 
$sqluser="select * FROM users WHERE user_id='$user_id'";
$resultsuser= mysql_query($sqluser) or die ("Error $sqluser.".mysql_error());
	
$rowsuser=mysql_fetch_object($resultsuser);	

echo $rowsuser->f_name;
	
	
	
	?>
    </em></strong></td>
  </tr></table>
  
  <br/>

<br/>
<table width="700" border="0" style="margin-left:300px;">  
  <tr>
    <td colspan="11" align="right"><strong><em>Authorized by :
  ________________________________________________________
Date :  ____________________
    </em></strong></td>
  </tr>

</table>

<br/>
<table width="700" border="0" style="margin-left:300px;">  
  <tr>
    <td colspan="11" align="center">
	If you Have any question about this order request, Kindly contact us using the above contacts.
	
	<td>
  </tr>

</table>








</body>
</html>
