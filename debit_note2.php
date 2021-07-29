<?php 
include('includes/session.php');
include('Connections/fundmaster.php');
//$get_latest_invoice_id=$_GET['invoice_id'];
//$get_latest_client_id=$_GET['client_id'];
//$get_latest_sales_id=$_GET['sales_code'];
$cash_rec=$_GET['cash_rec'];
$mop=$_GET['mop'];
$supplier_id=$_GET['supplier_id'];
$stockreturn_code=$_GET['stockreturn_code'];
$debit_no=$_GET['debit_note'];
$currency=$_GET['currency'];
$curr_rate=$_GET['curr_rate'];
$order_code=$_GET['order_code'];
$amount_paid=$_GET['amount_paid'];
$amount_paid_kshs=$curr_rate*$amount_paid;
$date_generated=$_GET['date_generated'];

$sqlcurr="select * from currency where curr_id='$currency'";
$resultscurr= mysql_query($sqlcurr) or die ("Error $sqlcurr.".mysql_error());
$rowcurr=mysql_fetch_object($resultscurr);
$curr_name=$rowcurr->curr_name;
//$curr_rate=$rowcurr->curr_rate;

$year=date('Y');
header("Content-Type: application/vnd.ms-word");
header("Content-Disposition: attachment;Filename=Debit_Note_$debit_no.doc");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Debit Note</title>
<link rel="stylesheet" type="text/css" href="http://localhost/brisk_sys/style.css" />

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

<body">
<table width="700" border="0" align="center" >
   <tr>
    <td colspan="4" rowspan="5" valign="center">
	<table width="100%" border="0">
	<?php 
	
$querysup="select * from suppliers where supplier_id ='$supplier_id'";
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
    <td colspan="3" align="right"><img src="http://localhost/brisk_sys/images/logolpo.png" /></td>
  </tr>
  <tr>
  <td colspan="3"><div align="right"><?php echo $rowscont->building.' '.$rowscont->street; ?></td>
  </tr>
  <tr>
    <td colspan="3"><div align="right">
        <!--Tel : +254 (0) 538004579 -->
   Mobile: <?php echo $rowscont->phone.'&nbsp;Telephone '.$rowscont->telephone; ?></div></td>
  </tr>
  <tr>
    <td colspan="3"><div align="right">Email : <?php echo $rowscont->email; ?> </div></td>
  </tr>
  
  <tr>
    <td><font size="+1"><strong>To:</strong></font></td>
    <td colspan="6"><font size="+1"><strong><?php //echo $rowssupp->supplier_name; ?></strong></font></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
	<td><strong>Supplier Name</strong></td>
    <td colspan="2"><?php echo $rowssupp->supplier_name; ?></td>
    <td >&nbsp;</td>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><strong>Address</strong></td>
    <td width="31%" colspan="2">P.O. BOX <?php echo $rowssupp->postal; ?></td>
    <td >&nbsp;</td>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><strong>Country</strong></td>
    <td width="31%" colspan="2"><?php echo $rowssupp->country; ?></td>
    <td >&nbsp;</td>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><strong>Town&nbsp;</strong></td>
    <td colspan="2"><?php echo $rowssupp->town; ?></td>
    <td >&nbsp;</td>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><strong>Telephone</strong></td>
    <td colspan="2"><?php echo $rowssupp->phone; ?></td>
    <td >&nbsp;</td>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><strong>Email Address</strong></td>
    <td colspan="2"><?php echo $rowssupp->email; ?></td>
    <td >&nbsp;</td>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr height="30">
    <td colspan="7" bgcolor="#000033" align="center"><span style="font-size:17px; font-weight:bold; color: #FFFFFF;">DEBIT NOTE</span></td>
  </tr>
  
  
  <tr height="20">
    <td colspan="7"  align="right">Date Generated : <?php echo $date_generated; ?></td>
  </tr>
  
   <tr height="20">
    <td colspan="7"  align="right"><strong>DEBIT NOTE NO :  <?php 
	echo $debit_no;
	
	?>
	
	</strong></td>
  </tr>
  
  
  
 
  
  
  <?php 
  
$querysup="select * from suppliers where supplier_id ='$supplier_id'";
$resultssup=mysql_query($querysup) or die ("Error: $querysup.".mysql_error());
$rowssupp=mysql_fetch_object($resultssup);
  
  
  ?>

  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
    <td >&nbsp;</td>
    <td colspan="2">&nbsp;</td>
  </tr>
  
  
</table>

<table width="700" border="0" align="center" class="table">
  <tr>
    <td width="10%"><div align="center"><strong> Code </strong></div></td>
    <td width="20%"><div align="center"><strong>Product Name </strong></div></td>
    <td width="10%"><div align="center"><strong>Pack Size </strong></div></td>
    <td width="1%"><div align="center"><strong>Qty Returned</strong></div></td>
	<td width="2%"><div align="center"><strong>Reason</strong></div></td>
    <td width="1%" ><div align="center"><strong>Unit Price (<?php echo $curr_name; ?>)</strong></div></td>
    <td width="15%"><div align="center"><strong>Totals (<?php echo $curr_name; ?>)</strong></div></td>
	
	
  </tr>
  

  
 <?php 
$subttl=0;  
$grndvat=0;
$grnddisc=0;
$grndttl=0;



$sqllpdet="SELECT stock_returns.product_code,stock_returns.stock_return_quantity,stock_returns.vendor_price,
stock_returns.reason,products.product_name,products.pack_size from products,stock_returns where 
stock_returns.product_id=products.product_id and stock_returns.order_code='$order_code'";
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
    <td width="40%"><?php echo $rowslpdet->product_name; ?></td>
    <td width="10%"><?php echo $rowslpdet->pack_size; ?></td>
    <td align="center" width="5%"><?php echo $ttlqty=$rowslpdet->stock_return_quantity;?></td>
	<td align="center"><?php echo $rowslpdet->reason;?></td>
	<td width="6%" align="right"><?php echo number_format($rowslpdet->vendor_price,2);?>&nbsp;</td>
	<td width="6%" align="right"><?php 
     $subttl=$rowslpdet->vendor_price*$rowslpdet->stock_return_quantity;
	 echo number_format($subttl,2);
	 ?>
	
	</td>

  </tr>
  
   <?php
	$grnreturns=$grnreturns+$subttl;
	$grndqty=$grndqty+$ttlqty;
	
	}
	
	?>
  
  
  
  
  
  
  <tr height="30">
    <td>&nbsp;</td>
    <td width="12%">&nbsp;</td>
    <td width="6%"><strong>Totals</strong></td>
    <td width="19%" align="center"></td>
	<td width="19%">&nbsp;</td>

	<td width="19%" align="right" colspan="2"><strong><?php echo number_format($grnreturns,2); ?></strong></td>
   
    
  </tr>
  
 

    
   
    
  
 
  
  
  
  <?php 
	
	
	}
	
	?>
  
  <tr>
    <td colspan="7" align="right"><strong><em>Generated by :
          <?php 
$sqluser="select employees.emp_firstname,employees.emp_middle_name,employees.emp_lastname from employees,users where 
employees.emp_id=users.emp_id and users.user_id='$user_id'";
$resultsuser= mysql_query($sqluser) or die ("Error $sqluser.".mysql_error());
	
$rowsuser=mysql_fetch_object($resultsuser);	

echo $rowsuser->emp_firstname.' '.$rowsuser->emp_middle_name.' '.$rowsuser->emp_lastname;



//$sqltrunc = "TRUNCATE TABLE temp_stock_returns";
//$resultstrunc=mysql_query($sqltrunc) or die ("Error: $sqltrunc.".mysql_error());
	
	
	
	?>
    </em></strong></td>
  </tr></table>
  
  <br/>
  
<table width="800" border="0" align="center">
 <!-- <tr height="30">
    <td colspan="7" >Goods Checked By-----------------------------------------------------------------------Sign----------------------------------------------------------</td>
  </tr>
  
  <tr height="30">
    <td colspan="7" >Goods Received By---------------------------------------------------------------------- Sign--------------------------- Stamp------------------------</td>
  </tr>-->
  
  <tr>
    <td colspan="7" align="center" ><strong>GOODS MUST BE CHECKED AND VERIFIED AT THE TIME OF DELIVERY. NO COMPLAINT WILL BE<br/>
	ENTERTAINED ONCE YOU HAVE ACCEPTED THE GOODS, NO CASH PAYMENTS TO BE MADE <br/>
	TO ANY OF OUR SALES PERSON UNLESS AUTHORITY IN WRITING IS OBTAINED.<br/>
	GOODS REMAIN THE PROPERTY OF BRISK DIAGNOSTICS LTD UNTIL PAID FOR IN FULL.<br/>



	</strong></td>
  </tr>
  <tr>
    <td colspan="7" >&nbsp;</td>
  </tr>
 
  <tr>
    <td colspan="7" >&nbsp;</td>
  </tr>
</table>








</body>
</html>
