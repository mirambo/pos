<?php 
include('includes/session.php');
include('Connections/fundmaster.php');
//$get_latest_invoice_id=$_GET['invoice_id'];
$get_latest_client_id=$_GET['client_id'];
//$get_latest_sales_id=$_GET['sales_code'];
//$cash_rec=$_GET['cash_received'];
$receipt_no=$_GET['receipt_no'];
$client_id=$_GET['client_id'];
$curr_id=$_GET['curr_id'];

$year=date('Y');

header("Content-Type: application/vnd.ms-word");
header("Content-Disposition: attachment;Filename=Cash_Sales_Receipt-$receipt_no.doc");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");


$querycurr="select * from currency where curr_id ='$curr_id'";
$resultscurr=mysql_query($querycurr) or die ("Error: $querycurr.".mysql_error());
$rowscurr=mysql_fetch_object($resultscurr);
$curr_name=$rowscurr->curr_name;
$curr_rate=$rowscurr->curr_rate;





?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Cash Receipts <?php echo $receipt_no ?></title>
<link rel="stylesheet" type="text/css" href="http://localhost/brisk_sys/style.css"  />

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
<table width="700" border="0" align="center" >
<?php 
  
$querysup="select * from clients where client_id ='$client_id'";
$resultssup=mysql_query($querysup) or die ("Error: $querysup.".mysql_error());
$rowssupp=mysql_fetch_object($resultssup);


$querycont="select * from company_contacts order by contacts_id desc limit 1";
$resultscont=mysql_query($querycont) or die ("Error: $querycont.".mysql_error());
$rowscont=mysql_fetch_object($resultscont);
  
  
  ?>


  <tr>
    <td colspan="7" align="right"><img src="http://localhost/brisk_sys/images/logolpo.png" /></td>
  </tr>
  <tr>
    <td colspan="7"><div align="right"><?php echo $rowscont->building.' '.$rowscont->street; ?><!--Kigali Road, Jamia Plaza, 2nd Floor --></div></td>
  </tr>
   <tr>
    <td colspan="7"><div align="right">
        <!--Tel : +254 (0) 538004579 -->
    Mobile: <?php echo $rowscont->phone.'&nbsp;Telephone '.$rowscont->telephone; ?></div></td>
  </tr>
  <tr>
    <td colspan="7"><div align="right">Email : <?php echo $rowscont->email; ?></div></td>
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
    <td colspan="6" bgcolor="#000033" align="center"><span style="font-size:17px; font-weight:bold; color: #FFFFFF;">CASH RECEIPT</span></td>
  </tr>
  
  
  <tr height="30">
    <td colspan="7"  align="right">DATE : <?php echo (Date("l F d, Y")); 

	?><hr/></td>
  </tr>
  
   <tr height="20">
    <td colspan="7"  align="right"><strong>RECEIPT NO :  <?php 
	echo $receipt_no;
	
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
$sqllpdet="select temp_cash_sales.temp_cash_sales_id,temp_cash_sales.quantity, temp_cash_sales.selling_price,temp_cash_sales.product_code,
temp_cash_sales.vat_value,temp_cash_sales.discount_perc,temp_cash_sales.discount_value,products.product_name, 
products.pack_size from temp_cash_sales, products where temp_cash_sales.product_id=products.product_id order by temp_cash_sales.temp_cash_sales_id asc";
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
	
	
	$ttl=$unit_val*$qnty;
	
	echo number_format ($ttl,2);
	
	
	
	$subttl=$subttl+$ttl;
	
	

	
	

	?>	</strong></td>
	
	<td align="right">(<?php echo $rowslpdet->discount_perc; ?>%) <?php echo number_format ($rowslpdet->discount_value,2); $ttl_disc=$rowslpdet->discount_value; ?> </td>
	<td align="right"><?php echo number_format($rowslpdet->vat_value,2); $ttl_vat=$rowslpdet->vat_value; ?></td>
    <td>&nbsp;</td>
    
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
    <td width="6%">&nbsp;</td>
    <td width="19%">&nbsp;</td>
   
    <td align="right" colspan="2"><font size="+1"><strong>Total Amount</strong></font></td>

    <td colspan="3"align="right"><font size="+1" color="#ff0000"><?php 
	
	
	$grndttl=$subttl+$grndvat-$grnddisc;

	echo number_format ($grndttl,2);    

	?></font></td>

  </tr>
  
  <tr height="30">
    <td>&nbsp;</td>
    <td width="12%">&nbsp;</td>
    <td width="6%">&nbsp;</td>
    <td width="19%">&nbsp;</td>
   
    <td align="right" colspan="2"><font size="+1"><strong>Cash Received</strong></font></td>

    <td colspan="3"align="right"><font size="+1" color="#ff0000"><?php 
	
	$cash_rec=$grndttl;

	echo number_format ($cash_rec,2); 
	
	$client_amnt_kshs=$cash_rec*$curr_rate;
	
	$bal=$grndttl-$cash_rec;	

$transaction_desc='Cash Receipt No:'.$receipt_no;
$queryred1="select * from  client_transactions where transaction ='$transaction_desc'";
$resultsred1=mysql_query($queryred1) or die ("Error: $queryred1.".mysql_error());

$numrowsred1=mysql_num_rows($resultsred1);

if ($numrowsred1>0)

{


}
else
{
	
//sales transactions
//$sqltrans= "insert into client_transactions values('','$client_id','$sales_code','$transaction_desc','$client_amnt_kshs',NOW())";
//$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());

$sqlgenled= "insert into general_ledger values('','Cash Sales(Receipt No:$receipt_no)','-$cash_rec','','$cash_rec','$curr_id','$curr_rate',NOW(),'')";
$resultsgenled=mysql_query($sqlgenled) or die ("Error $sqlgenled.".mysql_error());

$sqlgenled= "insert into general_ledger values('','Account Receivables Cash Sales (Receipt No:$receipt_no)','$cash_rec','$cash_rec','','$curr_id','$curr_rate',NOW(),'')";
$resultsgenled=mysql_query($sqlgenled) or die ("Error $sqlgenled.".mysql_error());

$sqlaccpay= "insert into sales_ledger values('','Cash Sales Receipt (Receipt No:$receipt_no)','$cash_rec','','$cash_rec','$curr_id','$curr_rate',NOW())";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());

$sqlaccpay= "insert into accounts_receivables_ledger values('','Cash Sales (Receipt No:$receipt_no)','$cash_rec','$cash_rec','','$curr_id','$curr_rate',NOW(),'')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());



// cash sales

$sqltrans= "insert into client_transactions values('','$client_id','$sales_code','Cash Sales Receipt No:$receipt_no','$client_amnt_kshs',NOW())";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());

$sqlgenled= "insert into general_ledger values('','Acount Receivable Cash Sales(Receipt No:$receipt_no)','-$cash_rec','','$cash_rec','$curr_id','$curr_rate',NOW(),'')";
$resultsgenled=mysql_query($sqlgenled) or die ("Error $sqlgenled.".mysql_error());

$sqlgenled= "insert into general_ledger values('','Cash Sales Receipt (Receipt No:$receipt_no)','$cash_rec','$cash_rec','','$curr_id','$curr_rate',NOW(),'')";
$resultsgenled=mysql_query($sqlgenled) or die ("Error $sqlgenled.".mysql_error());

$sqlaccpay= "insert into accounts_receivables_ledger values('','Cash Sales Receipt (Receipt No:$receipt_no)','-$cash_rec','','$cash_rec','$curr_id','$curr_rate',NOW(),'')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());

$sqlaccpay= "insert into cash_ledger values('','Cash Sales Receipt (Receipt No:$receipt_no)','$cash_rec','$cash_rec','','$curr_id','$curr_rate',NOW())";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());


	}?></font></td>

  </tr>
  
  <tr height="30">
    <td>&nbsp;</td>
    <td width="12%">&nbsp;</td>
    <td width="6%">&nbsp;</td>
    <td width="19%">&nbsp;</td>
   
    <td align="right" colspan="2"><font size="+1"><strong>Balance</strong></font></td>

    <td colspan="3"align="right"><font size="+1" color="#ff0000"><?php 
	
	
	$cash_bal=$cash_rec-$grndttl;

	echo number_format ($cash_bal,2);   







	

	?></font></td>

  </tr>
  
  <?php 
	
	
	}
	
	?>
  
  <tr>
    <td colspan="8" align="right"><strong><em>Receipt generated by :
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
