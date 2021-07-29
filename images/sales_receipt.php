<?php 
include('includes/session.php');
include('Connections/fundmaster.php');
//$get_latest_invoice_id=$_GET['invoice_id'];
//$get_latest_customer_id=$_GET['customer_id'];
//$get_latest_sales_id=$_GET['sales_code'];
$invoice_payment_id=$_GET['invoice_payment_id'];

$sqlcl="select mop.mop_name,customer.customer_name,invoice_payments.amount_received,invoice_payments.decription,invoice_payments.receipt_no,invoice_payments.invoice_payment_id,
invoice_payments.mop,invoice_payments.ref_no,invoice_payments.customer_id,invoice_payments.sales_rep,invoice_payments.ref_no,invoice_payments.client_bank,invoice_payments.our_bank,invoice_payments.date_paid,
invoice_payments.sales_id,invoice_payments.receipt_no,invoice_payments.date_received,invoice_payments.status,currency.curr_name,
invoice_payments.currency_code,invoice_payments.curr_rate,invoice_payments.amount_received FROM customer,mop,invoice_payments,
currency where invoice_payments.mop=mop.mop_id and invoice_payments.customer_id=customer.customer_id AND 
invoice_payments.currency_code=currency.curr_id AND invoice_payments.invoice_payment_id='$invoice_payment_id'";
$resultscl= mysql_query($sqlcl) or die ("Error $sqlcl.".mysql_error());
$rowscl=mysql_fetch_object($resultscl);
$customer_id=$rowscl->customer_id;
$sales_rep=$rowscl->sales_rep;




/*header("Content-Type: application/vnd.ms-word");
header("Content-Disposition: attachment;Filename=Sales_Receipt.doc");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");*/



include ('number_words.php');
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

<body onload="window.print();">
<table width="700" border="0" align="center">
   
	
	 <?php 
  
$querysup="select * from customer where customer_id ='$customer_id'";
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
	<tr><td><strong></strong></td><td><?php echo $rowssupp->customer_name; ?></td></tr>
	<tr><td><strong></strong></td><td>P.O. BOX <?php echo $rowssupp->c_address; ?></td></tr>
	<tr><td></td><td><?php echo $rowssupp->c_town; ?></td></tr>
	<tr><td></td><td><?php echo $rowssupp->c_phone; ?></td></tr>
	<tr><td></td><td><?php echo $rowssupp->c_email; ?></td></tr>
	
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
    <td colspan="6"><div align="right">Website : <?php echo $rowscont->fax; ?></div></td>
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
	<td><?php echo $rowssupp->customer_name; ?></td>
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

CASH SALES RECEIPT 

	
	
	
	
	</span></td>
  </tr>
  <tr height="30">
    <td colspan="10"  align="right">DATE : <?php echo $date_generated=$rowscl->date_paid; 

	?><hr/></td>
  </tr>
  
   <tr height="20">
    <td colspan="10"  align="right"><strong>
	
RECEIPT NO :
	<?php 
	echo $invoice_no=$rowscl->receipt_no;
	?>
	<hr/>
	</strong></td>
  </tr>
  <!--<tr>
    <td width="30%"><strong>CLIENT'S CONTACT</strong></td>
    <td colspan="2" width="30%"><strong>CLIENT'S DELIVERY ADDRESS </strong></td>
    <td width="46%"><strong>PAYMENT TERMS</strong></td>
    <td width="40%" colspan="3"><strong>PAYMENT TERMS </strong></td>
  </tr>
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
 
  -->
  
  
    
  
  

  
  
</table>

<table width="700" border="0" align="center" class="table">
  <tr>
    <td width="10%"><div align="center"><strong>Code </strong></div></td>
    <td colspan="4" width="30%"><div align="center"><strong>Description</strong></div></td>
    <td width="10%"><div align="center"><strong>Qty</strong></div></td>
    <td width="15%"><div align="center"><strong>Price (<?php echo $curr_name=$rowscl->curr_name; ?>)</strong></div></td>
    <td width="20%"><div align="center"><strong>Amount (<?php echo $curr_name; ?>)</strong></div></td>
	
  </tr>
  
    <tr height="40">
    <td width="10%"></td>
    <td colspan="4" width="30%">Payment received ( <?php echo $rowscl->decription; ?>) </td>
    <td width="10%" align="center">1</td>
    <td width="15%" align="right"><?php echo number_format($price=$rowscl->amount_received,2); ?></td>
    <td width="20%" align="right"><strong><?php echo number_format($price=$rowscl->amount_received,2); ?></strong></td>
	
  </tr>
 
  
  
  
  <tr height="10">
    <td>&nbsp;</td>
  
    
 <td width="6%" colspan="5" align="right"><strong>Totals</strong></td>
    <td align="right" colspan="2"><font size="+1"><strong><?php 

	echo number_format ($price,2);    

	?></strong></font></td>

    

  </tr>
 <tr height="10">
    <td>&nbsp;</td>
  
    
 

    

  </tr>
  
  <tr height="10">
    <td colspan="8">&nbsp;
	Amount Received : <?php

echo '<u><i>'.$curr_name.' '.convert_number_to_words ($price).'  only</i></u>' ;
	?>
	
	</td>
  </tr>
  <tr height="10">
    <td colspan="8">&nbsp;
	Paid Through: <?php
	
$mop=$rowscl->mop;

echo '<i>'. $mop_name=$rowscl->mop_name. '</i></u>' ;


if ($mop==2)
{
echo " : Cheque Number - ".$ref_no=$rowscl->ref_no;
}

if ($mop==3)
{
echo " :Transaction Number - ".$ref_no=$rowscl->ref_no;
}

	?>
	
	</td>
  </tr>
  <tr height="10">
    <td colspan="8" align="center"><strong>
	Thank You For Your Business!!
	
	</strong></td>
  </tr>
 
  
  <tr>
    <td colspan="8" align="right"><strong><em>Generated by :
         <?php 
$sqluser="select * FROM users WHERE user_id='$sales_rep'";
$resultsuser= mysql_query($sqluser) or die ("Error $sqluser.".mysql_error());
	
$rowsuser=mysql_fetch_object($resultsuser);	

echo $rowsuser->f_name;
	
	
	
	?>
    </em></strong></td>
  </tr></table>
  
  <br/>
  
<table width="700" border="0" align="center">
  
  
  <tr height="30">
    <td colspan="6" >Signature----------------------------------------------------------------------------------------------------- Stamp------------------------------------------------</td>
  </tr>
  
  <tr>
    <td colspan="6" align="center" ><strong>SHOULD YOU HAVE ANY QUERY CONCERNING THIS RECEIPT, PLEASE CONTACT US THOUHG HE ABOVE CONTACTS <br/>
	



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
