<?php 
include('includes/session.php');
include('Connections/fundmaster.php');
$order_code=$_GET['order_code'];
$year=date('Y');

$sqlrec="select * FROM mop,currency,suppliers,purchase_returns WHERE purchase_returns.mop_id=mop.mop_id AND 
purchase_returns.currency=currency.curr_id AND purchase_returns.supplier_id=suppliers.supplier_id AND 
purchase_returns.purchase_returns_id='$order_code'";
$resultsrec= mysql_query($sqlrec) or die ("Error $sqlrec.".mysql_error());	
$rowsrec=mysql_fetch_object($resultsrec);
$supplier_id=$rowsrec->supplier_id;
$lpo_no=$rowsrec->debit_note_no;
$currency=$rowsrec->currency;
$curr_rate=$rowsrec->curr_rate;
$curr_name=$rowsrec->curr_name;
$freight_charge=$rowsrec->freight_charge;
$shipper_name=$rowsrec->shipper_name;
$pay_terms=$rowsrec->mop_name;
$order_date=$rowsrec->date_generated;

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Purchase Order - <?php echo $lpo_no; ?></title>
<link rel="stylesheet" type="text/css" href="<?php echo $base_url;?>style.css" />

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
  
$querysup="select * from suppliers where supplier_id ='$supplier_id'";
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
	<tr><td width="30%"><strong>Supplier Name:</strong></td><td><?php echo $rowssupp->supplier_name; ?></td></tr>
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
    <td colspan="6"><div align="right">Website : <?php echo $rowscont->fax; ?></div></td>
  </tr>
 
  <tr height="30">
    <td colspan="11" bgcolor="#000033" align="center"><span style="font-size:17px; font-weight:bold; color: #FFFFFF;">DEBIT NOTE</span></td>
  </tr>
  
  
   <tr height="30">
    <td colspan="6"  align="left"><strong>DEBIT NOTE NO :  <?php 
	echo $lpo_no;
	
	
	?>
	
	</strong>
	<td align="right"><strong>DATE : </strong><?php echo $order_date;?></td>
	
	</td>
  </tr>
  </table>
  <table width="700" border="0" bgcolor="#C0D7E5" style="border-top:1px solid #073B6A; border-bottom:1px solid #073B6A; margin:auto;">
  
  <tr>
    <td colspan="2" width="40%"><strong>CONTACT </strong></td>
    <td colspan="2"><strong>DELIVERY ADDRESS </strong></td>
    <td width="56%"><strong>SHIP VIA </strong></td>
    <td width="30%"><strong><!--PAYMENT TERMS --></strong></td>
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
    <td><?php //echo $pay_terms;   ?></td>
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

<table width="700" border="0" align="center" class="table" style="margin:auto">
  <tr>
        <td width="10%"><div align="center"><strong>Product Code</strong></div></td>
    <td colspan="2"><div align="center"><strong>Item  Name </strong></div></td>
    <td colspan="2" width="20%"><div align="center"><strong>Description</strong></div></td>
    <td width="10%"><div align="center"><strong>Quantity</strong></div></td>
    <td width="12%"><div align="center"><strong>Unit Price (<?php echo $curr_name; ?>)</strong></div></td>
    <td><div align="center"><strong>Amount(<?php echo $curr_name; ?>)</strong></div></td>
  </tr>
  
  <?php 
  
$grndttl=0;

$sqllpdet="select * FROM purchase_returns_items,products 
WHERE purchase_returns_items.product_id=products.product_id AND purchase_returns_items.purchase_returns_id='$order_code'";
$resultslpdet= mysql_query($sqllpdet) or die ("Error $sqllpdet.".mysql_error());


if (mysql_num_rows($resultslpdet) > 0)
						  {
							  $RowCounter=0;
							  while ($rowslpdet=mysql_fetch_object($resultslpdet))
							  { 
							  
							  $RowCounter++;
							  if($RowCounter % 2==0)
{
echo '<tr bgcolor="#C0D7E5" >';
}
else 
{
echo '<tr bgcolor="#FFFFCC" >';
}
 
 
 ?>
  
 
    <td><?php echo $rowslpdet->prod_code;?></td>
   
   
    <td colspan="2"><?php echo $rowslpdet->product_name.' ('.$rowslpdet->pack_size.')'; ?></td>
    <td colspan="2"><?php echo $rowslpdet->description; ?></td>
    <td><?php echo $rowslpdet->quantity; $qnty=$rowslpdet->quantity;
	
	?></td>
    <td align="right"><?php 
	$vendor_prc=$rowslpdet->vendor_prc;
		if ($vendor_prc=='F.O.C')
		{
		echo $vendor_prc;
		}
		else
		{
		
	
	echo number_format($rowslpdet->vendor_prc,2); $unit_val= $rowslpdet->vendor_prc;
	
	}
	
	$unit_val= $rowslpdet->vendor_prc;
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
	
	
	$grndttl_lpo=$grndttl_lpo+$ttl;
	
	

	
	

	?>	</strong></td>
  </tr>
  
   <?php
	
	
	}
	
	?>
	 <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
   <td colspan="2" align="right"><font><strong>Sub Totals (<?php echo $curr_name; ?>)</strong></font></td>
    
    <td align="right"><font size="+1"><?php 

		echo number_format ($grndttl_lpo,2);   

	?></font></td>
  </tr>
   
	
	
  <tr>   
  <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
   <td colspan="2" align="right"><font size="+1"><strong>Totals (<?php echo $curr_name; ?>)</strong></font></td>
    
    <td align="right"><font size="+1" color="#FF0000"><?php 

	echo number_format ($grndttl=$grndttl_lpo+$freight_charge,2);  

/*$transaction_desc='LPO No:'.$lpo_no;

$sqllpoamnt="UPDATE lpo set lpo_amount='$grndttl',freight_charges='$freight_charge' where lpo_id='$get_latest_lpo_id'";
$resultslpoamnt= mysql_query($sqllpoamnt) or die ("Error $sqllpoamnt.".mysql_error());	


//Prevent redudancy of lpo postings
$queryred1="select * from  supplier_transactions where transaction='$transaction_desc'";
$resultsred1=mysql_query($queryred1) or die ("Error: $queryred1.".mysql_error());

$numrowsred1=mysql_num_rows($resultsred1);

if ($numrowsred1>0)

{


}
else
{

$sqltrans= "insert into supplier_transactions values('','$get_latest_sup_id','$get_latest_order_id','$transaction_desc','$currency','$curr_rate','$grndttl',NOW())";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());

$sqlgenled= "insert into general_ledger values('','Purchases Account (PO No:$lpo_no)','$grndttl','$grndttl','','$currency','$curr_rate',NOW(),'$get_latest_order_id')";
$resultsgenled=mysql_query($sqlgenled) or die ("Error $sqlgenled.".mysql_error());

$sqlgenled= "insert into general_ledger values('','Accounts Payables (PO No:$lpo_no)','-$grndttl','','$grndttl','$currency','$curr_rate',NOW(),'$get_latest_order_id')";
$resultsgenled=mysql_query($sqlgenled) or die ("Error $sqlgenled.".mysql_error());

$sqlaccpay= "insert into accounts_payables_ledger values('','$transaction_desc','$grndttl','','$grndttl','$currency','$curr_rate',NOW(),'$get_latest_order_id')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());

$sqlaccpay= "insert into purchases_ledger values('','$transaction_desc','$grndttl','$grndttl','','$currency','$curr_rate',NOW(),'$get_latest_order_id')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());

}*/

	?></font></td>
  </tr>
  
   <?php 
	
	
	}
	?>
	<tr>
    <td colspan="8" ><strong><em>Remarks :</strong><br/>
          <?php 


echo $rowsrec->comments;
	
	
	
	?>
    </em></td>
  </tr>
  
  <tr>
    <td colspan="8" align="right"><strong><em>Generated by :
          <?php 
$sqluser="select * FROM users WHERE user_id='$user_id'";
$resultsuser= mysql_query($sqluser) or die ("Error $sqluser.".mysql_error());
	
$rowsuser=mysql_fetch_object($resultsuser);	

echo $rowsuser->f_name;
	
	
	
	?>
    </em></strong></td>
  </tr>
 
  
  
  </table>
  
  <br/>
  

<table width="700" border="0" align="center"  style="margin:auto">  
  <tr>
    <td colspan="8" ><strong><em>Authorized by :
  ________________________________________________________
Date :  ____________________
    </em></strong></td>
  </tr>

</table>

<table width="700" border="0" align="center"  style="margin:auto">  
  <tr>
    <td colspan="8" ><em>
<?php //echo $rowscont->lpo_terms; ?>
    </em></td>
  </tr>

</table>

<br/>









</body>
</html>
