<?php 
include('includes/session.php');
include('Connections/fundmaster.php');
//$get_latest_invoice_id=$_GET['invoice_id'];
//$get_latest_client_id=$_GET['client_id'];
//$get_latest_sales_id=$_GET['sales_code'];
$sales_rep=$_GET['sales_rep'];
$cash_rec=$_GET['cash_rec'];
$mop=$_GET['mop'];
$invoice_no_top=$_GET['invoice_no'];
session_start(); 
$get_invoice_no=$_SESSION['invoice_no'];
$sess_client_id=$_SESSION['get_client_id'];
$get_sales_code=$_SESSION['sales_id'];
//$ship_agency=$_SESSION['ship_agency'];
//$pay_term=$_SESSION['pay_term'];
$currency=$_SESSION['currency'];
//$shipp_id=$_GET['shipp_id'];
//$pay_terms=$_GET['pay_terms'];
$year=date('Y');
$sqlcurr="select * from currency where curr_id='$currency'";
$resultscurr= mysql_query($sqlcurr) or die ("Error $sqlcurr.".mysql_error());
$rowcurr=mysql_fetch_object($resultscurr);
$curr_name=$rowcurr->curr_name;
$curr_rate=$rowcurr->curr_rate;
$invoice_no_top=$_GET['invoice_no'];

/*header("Content-Type: application/vnd.ms-word");
header("Content-Disposition: attachment;Filename=Invoice-$invoice_no_top.doc");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");*/


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
  
$querysup="select * from clients where client_id ='$sess_client_id'";
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
    <td colspan="7" bgcolor="#000033" align="center"><span style="font-size:17px; font-weight:bold; color: #FFFFFF;">INVOICE</span></td>
  </tr>
  <tr height="30">
    <td colspan="7"  align="right">DATE : <?php echo (Date("l F d, Y")); 

	?><hr/></td>
  </tr>
  
   <tr height="20">
    <td colspan="7"  align="right"><strong>INVOICE NO : <?php 
	echo $invoice_no_top;
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
    <td colspan="2" align="center"><strong>PAYMENT TERMS</strong></td>
	
	
	
  
  </tr>
   <tr >
    <td width="30%"><?php echo $rowssupp->contact_person;  ?></td>
    <td colspan="4"><?php echo $rowssupp->c_paddress;  ?></td>
    <td colspan="2" align="center">30 Days</td>
	
	
   
   
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
    <td colspan="7"><hr/></td>
   
  </tr>
 
  
  
  
    
  
  

  
  
</table>

<table width="700" border="0" align="center" class="table">
  <tr>
    <td width="10%"><div align="center"><strong>Code </strong></div></td>
    <td colspan="3" width="30%"><div align="center"><strong>Item Name </strong></div></td>
    <td width="10%"><div align="center"><strong>Product Description</strong></div></td>
    <td width="10%"><div align="center"><strong>Qty</strong></div></td>
    <td width="15%"><div align="center"><strong>Price (<?php echo $curr_name; ?>)</strong></div></td>
    <td width="20%"><div align="center"><strong>Totals (<?php echo $curr_name; ?>)</strong></div></td>
	
  </tr>
 <?php 
$subttl=0;  
$grndvat=0;
$grnddisc=0;
$grndttl=0;
$sqllpdet="select temp_sales.temp_sales_id,temp_sales.quantity,temp_sales.selling_price,temp_sales.product_code,temp_sales.vat_value,
temp_sales.discount_perc,temp_sales.prod_desc,temp_sales.discount_value,temp_sales.sales_code,products.product_name,products.pack_size,currency.curr_name from temp_sales, products,currency where 
temp_sales.product_id=products.product_id and temp_sales.currency_code=currency.curr_id AND temp_sales.user_id='$user_id' order by temp_sales.temp_sales_id asc";
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
    <td><?php echo $rowslpdet->product_code; $sales_code=$rowslpdet->sales_code;?></td>
    <td colspan="3"><?php echo $rowslpdet->product_name.'('.$rowslpdet->pack_size.')'; ?></td>
    <td><?php echo $rowslpdet->prod_desc; ?></td>
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
    <td align="right" colspan="2"><strong><?php 

	echo number_format ($subttl,2);    

	?></strong></td>

    

  </tr>
  
  <tr height="10">
    <td>&nbsp;</td>
 
    <td width="19%" colspan="5" align="right"><strong>Total VAT</strong></td>
    
    <td align="right" colspan="2"><?php 
	
	

	echo number_format ($grndvat,2);    

	?></td>



  </tr>
  
  <tr height="10">
    <td>&nbsp;</td>
 
    <td width="19%" colspan="5" align="right"><strong>Total Discount</strong></td>
   
    <td align="right" colspan="2"><?php 

	echo number_format ($grnddisc,2);    

	?></td>

   
  </tr>
  
  <tr height="10">
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
    <td width="6%" colspan="5" align="right"><strong>Total Amount</strong></td>
    
   
    <td align="right" colspan="2"><strong><?php 
	
	
	$grndttl=$subttl+$grndvat-$grnddisc;

	echo number_format ($grndttl,2);    

	?></strong></td>

   

  </tr>
  
  <tr height="10">
    <td>&nbsp;</td>
   
    <td width="19%" colspan="5" align="right" ><strong>Amount Paid</strong></td>
   
    <td align="right" colspan="2"><strong>
	<?php 
$bal=$grndttl-$cash_rec;	

$transaction_descinv='Inv No:'.$get_invoice_no;
$transaction_descrec='Cash Receipt No:'.$get_invoice_no;

$queryred1="select * from  client_transactions where transaction ='$transaction_descinv'";
$resultsred1=mysql_query($queryred1) or die ("Error: $queryred1.".mysql_error());

$numrowsred1=mysql_num_rows($resultsred1);

if ($numrowsred1>0)

{


}
else
{
	
if($cash_rec)
	{

	echo number_format ($cash_rec,2);  

$sqltrans= "insert into client_transactions values('','$sess_client_id','$sales_code','$transaction_descinv','$grndttl',NOW())";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());

$sqltrans= "insert into client_transactions values('','$sess_client_id','$sales_code','$transaction_descrec','-$cash_rec',NOW())";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());

$sqlaccpay= "insert into sales_ledger values('','$transaction_descinv','$grndttl','','$grndttl','$currency','$curr_rate',NOW())";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());

$sqlaccpay= "insert into accounts_receivables_ledger values('','$transaction_descinv','$grndttl','$grndttl','','$currency','$curr_rate',NOW(),'')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());

$sqlgenled= "insert into general_ledger values('','Sales ( Against Inv No:$get_invoice_no)','-$grndttl','','$grndttl','$currency','$curr_rate',NOW(),'')";
$resultsgenled=mysql_query($sqlgenled) or die ("Error $sqlgenled.".mysql_error());

$sqlgenled= "insert into general_ledger values('','Accounts Receivables (Inv No:$get_invoice_no)','$grndttl','$grndttl','','$currency','$curr_rate',NOW(),'')";
$resultsgenled=mysql_query($sqlgenled) or die ("Error $sqlgenled.".mysql_error());

//Record Cash sales now
$sqlgenled= "insert into general_ledger values('','Cash ( Against Inv No:$get_invoice_no)','$cash_rec','$cash_rec','','$currency','$curr_rate',NOW(),'')";
$resultsgenled=mysql_query($sqlgenled) or die ("Error $sqlgenled.".mysql_error());

$sqlgenled= "insert into general_ledger values('','Accounts Receivables (Inv No:$get_invoice_no)','-$cash_rec','','$cash_rec','$currency','$curr_rate',NOW(),'')";
$resultsgenled=mysql_query($sqlgenled) or die ("Error $sqlgenled.".mysql_error());


$sqlgenled= "insert into cash_ledger values('','Sale Payment against (Inv No:$get_invoice_no)','$cash_rec','$cash_rec','','$currency','$curr_rate',NOW())";
$resultsgenled=mysql_query($sqlgenled) or die ("Error $sqlgenled.".mysql_error());

$sqlaccpay= "insert into accounts_receivables_ledger values('','$transaction_descrec','-$cash_rec','','$cash_rec','$currency','$curr_rate',NOW(),'')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());
	
}	
	

else 

{
echo "0.00";

$sqltrans= "insert into client_transactions values('','$sess_client_id','$sales_code','$transaction_descinv','$grndttl',NOW())";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());

$sqlgenled= "insert into general_ledger values('','Sales ( Against Inv No:$get_invoice_no)','-$grndttl','','$grndttl','$currency','$curr_rate',NOW(),'')";
$resultsgenled=mysql_query($sqlgenled) or die ("Error $sqlgenled.".mysql_error());

$sqlgenled= "insert into general_ledger values('','Accounts Receivables (Inv No:$get_invoice_no)','$grndttl','$grndttl','','$currency','$curr_rate',NOW(),'')";
$resultsgenled=mysql_query($sqlgenled) or die ("Error $sqlgenled.".mysql_error());

$sqlaccpay= "insert into accounts_receivables_ledger values('','$transaction_descinv','$grndttl','$grndttl','','$currency','$curr_rate',NOW(),'')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());

$sqlaccpay= "insert into sales_ledger values('','$transaction_descinv','$grndttl','','$grndttl','$currency','$curr_rate',NOW())";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());

}	
}
	?>
	
	</strong></td>



  </tr>
  
  <tr height="10">
    <td>&nbsp;</td>

    <td width="19%" colspan="5" align="right"><strong>Balance</strong></td>
   
    <td align="right" colspan="2"><font  color="#ff0000"><strong><?php 
	
	
	$bal=$grndttl-$cash_rec;

	echo number_format ($bal,2);    

	?></font></strong></td>

    

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
