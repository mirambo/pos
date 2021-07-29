<?php 
include('includes/session.php');
include('Connections/fundmaster.php');
//$get_latest_invoice_id=$_GET['invoice_id'];
//$get_latest_client_id=$_GET['client_id'];
//$get_latest_sales_id=$_GET['sales_code'];
$cash_rec=$_GET['cash_rec'];
$mop=$_GET['mop'];
$client_id=$_GET['client_id'];
$sales_return_code_id=$_GET['sales_return_code_id'];
$sales_code_id=$_GET['sales_code_id'];
$credit_no=$_GET['credit_no'];
$amount_paid=$_GET['amount_paid'];
$orig_quant=$_GET['orig_quant'];



/*$sqlrec="select sales_code.invoice_no,sales_code.date_generated,sales_code.sale_date,sales_code.sales_rep_id,sales_code.terms,sales_code.currency,sales_code.curr_rate,
sales_code.user_id,sales_code.sales_code_id,employees.emp_firstname,employees.emp_lastname,employees.emp_middle_name,
sales_code.client_id,clients.c_name,currency.curr_name FROM currency,clients,sales_code,employees WHERE 
currency.curr_id=sales_code.currency and sales_code.sales_rep_id=employees.emp_id and sales_code.client_id=clients.client_id AND 
sales_code.sales_code_id='$sales_code_id'";
$resultsrec= mysql_query($sqlrec) or die ("Error $sqlrec.".mysql_error());	
$rowsrec=mysql_fetch_object($resultsrec);*/

$sqlrec="select sales_code.client_id,clients.c_name,sales_returns_code.credit_note_no,sales_returns_code.date_recorded FROM clients,sales_code,sales_returns_code WHERE 
 sales_code.client_id=clients.client_id AND sales_returns_code.sales_code_id=sales_code.sales_code_id AND sales_code.sales_code_id='$sales_code_id'";
$resultsrec= mysql_query($sqlrec) or die ("Error $sqlrec.".mysql_error());	
$rowsrec=mysql_fetch_object($resultsrec);

$curr_name=$rowsrec->curr_name;
$curr_rate=$rowsrec->curr_rate;
$credit_note_no=$rowsrec->credit_note_no;
$client_id=$rowsrec->client_id;
$date_generated=$rowsrec->date_recorded;
$terms=$rowsrec->terms;

$year=date('Y');

header("Content-Type: application/vnd.ms-word");
header("Content-Disposition: attachment;Filename=Credit_Note-$credit_note_no.doc");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Credit Note</title>
<link rel="stylesheet" type="text/css" href="<?php echo $base_url ?>style.css"/>

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
	<tr><td><strong></strong></td><td><?php echo $rowssupp->c_name; ?></td></tr>
	<tr><td><strong></strong></td><td> <?php echo $rowssupp->c_address; ?></td></tr>
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

CREDIT NOTE

	
	
	
	
	</span></td>
  </tr>
  <tr height="30">
    <td colspan="10"  align="right">DATE : <?php echo $date_generated; 

	?><hr/></td>
  </tr>
  
   <tr height="20">
    <td colspan="10"  align="right"><strong>
	
CREDIT NOTE NO : 

	
	
	
	
	<?php 
	echo $credit_note_no;
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
    <td colspan="5" align="center"><strong><!--PAYMENT TERMS--></strong></td>
	
	
	
  
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
  <tr >
    <td width="10%"><div align="center"><strong> Code </strong></div></td>
    <td width="20%"><div align="center"><strong>Product Name </strong></div></td>
    <td width="20%"><div align="center"><strong>Pack Size </strong></div></td>
    <td ><div align="center"><strong>Qty Returned</strong></div></td>
	<td width="2%"><div align="center"><strong>Reason</strong></div></td>
    <td width="5%"><div align="center"><strong>Unit Price (<?php echo "KSHS"; ?>)</strong></div></td>
    <td width="20%"><div align="center"><strong>Totals (<?php echo "KSHS" ?>)</strong></div></td>
	
	
  </tr>
  

  
 <?php 
$subttl=0;  
$grndvat=0;
$grnddisc=0;
$grndttl=0;



$sqllpdet="SELECT sales_returns.product_id,sales_returns.sales_return_quantity,sales_returns.selling_price,
sales_returns.desc,products.product_name,products.pack_size,products.prod_code from products,sales_returns
where sales_returns.product_id=products.product_id and sales_returns.sales_return_code_id='$sales_return_code_id'";
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
    <td><?php echo $rowslpdet->prod_code;?></td>
    <td><?php echo $rowslpdet->product_name; ?></td>
    <td><?php echo $rowslpdet->pack_size; ?></td>
    <td align="center"><?php echo $ttlqty=$rowslpdet->sales_return_quantity;?></td>
	<td align="center"><?php echo $rowslpdet->desc;?></td>
	<td width="6%" align="right"><?php echo number_format($rowslpdet->selling_price,2);?>&nbsp;</td>
	<td width="6%" align="right"><?php 
     $subttl=$rowslpdet->selling_price*$rowslpdet->sales_return_quantity;
	 echo number_format($subttl,2);
	 ?>
	
	</td>

  </tr>
  
   <?php
	$grnreturns=$grnreturns+ $subttl;
	$grndqty=$grndqty+$ttlqty;
	
	}
	
	?>
  
  
  
  
  
  
  <tr height="30">
    <td>&nbsp;</td>
    <td width="12%">&nbsp;</td>
    <td width="6%"><strong>Totals</strong></td>
    <td width="19%" align="center"><strong><?php echo $grndqty; ?></strong></td>
	<td width="19%">&nbsp;</td>
	<td width="19%">&nbsp;</td>
	<td width="19%" align="right"><strong>
	<?php echo number_format($grnreturns,2); 
$transaction_desc='Credit Note No:'.$credit_no;

	
$queryred1="select * from  client_transactions where transaction ='$transaction_desc'";
$resultsred1=mysql_query($queryred1) or die ("Error: $queryred1.".mysql_error());

$numrowsred1=mysql_num_rows($resultsred1);

if ($numrowsred1>0)

{


}
else
{
if ($amount_paid!=0)
{
//$bal=$grnreturns-$amount_paid;
if ($amount_paid>=$grnreturns)
{
$sqltrans= "insert into client_transactions values('','$client_id','$sales_code','$transaction_desc','-$grnreturns',NOW())";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());

$sqlaccpay4= "insert into sales_return_ledger values('','$transaction_desc','$grnreturns','$grnreturns','','6','1',NOW())";
$resultsaccpay4=mysql_query($sqlaccpay4) or die ("Error $sqlaccpay4.".mysql_error());

$sqlaccpay3= "insert into accounts_payables_ledger values('','$transaction_desc','$grnreturns','','$grnreturns','6','1',NOW(),'')";
$resultsaccpay3=mysql_query($sqlaccpay3) or die ("Error $sqlaccpay3.".mysql_error());

$sqlgenled1= "insert into general_ledger values('','Sales Returns $transaction_desc','$grnreturns','$grnreturns','','6','1',NOW(),'')";
$resultsgenled1=mysql_query($sqlgenled1) or die ("Error $sqlgenled1.".mysql_error());

$sqlgenled2= "insert into general_ledger values('','A/C Payables Sale Returns($transaction_desc)','-$grnreturns','','$grnreturns','6','1',NOW(),'')";
$resultsgenled2=mysql_query($sqlgenled2) or die ("Error $sqlgenled2.".mysql_error());

//update invoice amount
$queryinv="select * from  invoices where sales_code='$sales_code'";
$resultsinv=mysql_query($queryinv) or die ("Error: $queryinv.".mysql_error());
$rowsinv=mysql_fetch_object($resultsinv);
$invc_ttl=$rowsinv->invoice_ttl;


$new_invoice_bal=$invc_ttl-$grnreturns;

$sqlttl="UPDATE invoices set invoice_ttl='$new_invoice_bal' where sales_code='$sales_code'";
$resultsttl= mysql_query($sqlttl) or die ("Error $sqlttl.".mysql_error());




}
if ($amount_paid<=$grnreturns)

{

$bal1=$grnreturns-$amount_paid;

$sqltrans= "insert into client_transactions values('','$client_id','$sales_code','$transaction_desc','-$grnreturns',NOW())";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());

$sqlaccpay4= "insert into sales_return_ledger values('','$transaction_desc','$grnreturns','$grnreturns','','6','1',NOW())";
$resultsaccpay4=mysql_query($sqlaccpay4) or die ("Error $sqlaccpay4.".mysql_error());

$sqlaccpay3= "insert into accounts_payables_ledger values('','$transaction_desc','$amount_paid','','$grnreturns','6','1',NOW(),'')";
$resultsaccpay3=mysql_query($sqlaccpay3) or die ("Error $sqlaccpay3.".mysql_error());

$sqlaccpay5= "insert into accounts_receivables_ledger values('','$transaction_desc','-$bal1','','$bal1','6','1',NOW(),'')";
$resultsaccpay5=mysql_query($sqlaccpay5) or die ("Error $sqlaccpay3.".mysql_error());

$sqlgenled1= "insert into general_ledger values('','Sales Returns $transaction_desc','$grnreturns','$grnreturns','','6','1',NOW(),'')";
$resultsgenled1=mysql_query($sqlgenled1) or die ("Error $sqlgenled1.".mysql_error());

$sqlgenled2= "insert into general_ledger values('','A/C Payables Sale Returns($transaction_desc)','-$amount_paid','','$amount_paid','6','1',NOW(),'')";
$resultsgenled2=mysql_query($sqlgenled2) or die ("Error $sqlgenled2.".mysql_error());

$sqlgenled2= "insert into general_ledger values('','A/C Receivables Sale Returns($transaction_desc)','-$bal1','','$bal1','6','1',NOW(),'')";
$resultsgenled2=mysql_query($sqlgenled2) or die ("Error $sqlgenled2.".mysql_error());



//update invoice amount
$queryinv="select * from  invoices where sales_code='$sales_code'";
$resultsinv=mysql_query($queryinv) or die ("Error: $queryinv.".mysql_error());
$rowsinv=mysql_fetch_object($resultsinv);
$invc_ttl=$rowsinv->invoice_ttl;


$new_invoice_bal=$invc_ttl-$bal1;

$sqlttl="UPDATE invoices set invoice_ttl='$new_invoice_bal' where sales_code='$sales_code'";
$resultsttl= mysql_query($sqlttl) or die ("Error $sqlttl.".mysql_error());

}
}

else
{

$sqltrans= "insert into client_transactions values('','$client_id','$sales_code','$transaction_desc','-$grnreturns',NOW())";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());

$sqlgenled1= "insert into general_ledger values('','Sales Returns $transaction_desc','$grnreturns','$grnreturns','','6','1',NOW(),'')";
$resultsgenled1=mysql_query($sqlgenled1) or die ("Error $sqlgenled1.".mysql_error());

$sqlgenled2= "insert into general_ledger values('','A/C Receivables $transaction_desc','-$grnreturns','','$grnreturns','6','1',NOW(),'')";
$resultsgenled2=mysql_query($sqlgenled2) or die ("Error $sqlgenled2.".mysql_error());

$sqlaccpay3= "insert into accounts_receivables_ledger values('','$transaction_desc','-$grnreturns','','$grnreturns','6','1',NOW(),'')";
$resultsaccpay3=mysql_query($sqlaccpay3) or die ("Error $sqlaccpay3.".mysql_error());

$sqlaccpay4= "insert into sales_return_ledger values('','$transaction_desc','$grnreturns','$grnreturns','','6','1',NOW())";
$resultsaccpay4=mysql_query($sqlaccpay4) or die ("Error $sqlaccpay4.".mysql_error());

//update invoice amount

/*$queryinv="select * from  invoices where sales_code='$sales_code'";
$resultsinv=mysql_query($queryinv) or die ("Error: $queryinv.".mysql_error());
$rowsinv=mysql_fetch_object($resultsinv);
$invc_ttl=$rowsinv->invoice_ttl;


$new_invoice_bal=$invc_ttl-$grnreturns;

$sqlttl="UPDATE invoices set invoice_ttl='$new_invoice_bal' where sales_code='$sales_code'";
$resultsttl= mysql_query($sqlttl) or die ("Error $sqlttl.".mysql_error());*/





}	}
	?></strong></td>
   
    
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
  
<table width="700" border="0" align="center">
  <tr height="30">
    <td colspan="6" >Goods Checked By-----------------------------------------------------------------------Sign----------------------------------------------------------</td>
  </tr>
  
  <tr height="30">
    <td colspan="6" >Goods Received By---------------------------------------------------------------------- Sign--------------------------- Stamp------------------------</td>
  </tr>
  
  <!--<tr>
    <td colspan="6" align="center" ><strong>GOODS MUST BE CHECKED AND VERIFIED AT THE TIME OF DELIVERY. NO COMPLAINT WILL BE<br/>
	ENTERTAINED ONCE YOU HAVE ACCEPTED THE GOODS, NO CASH PAYMENTS TO BE MADE <br/>
	TO ANY OF OUR SALES PERSON UNLESS AUTHORITY IN WRITING IS OBTAINED.<br/>
	GOODS REMAIN THE PROPERTY OF BRISK DIAGNOSTICS LTD UNTIL PAID FOR IN FULL.<br/>



	</strong></td>
  </tr>-->
  <tr>
    <td colspan="6" >&nbsp;</td>
  </tr>
 
  <tr>
    <td colspan="6" >&nbsp;</td>
  </tr>
</table>








</body>
</html>
