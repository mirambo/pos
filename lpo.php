<?php 
include('includes/session.php');
include('Connections/fundmaster.php');
$order_code=$_GET['order_code'];
$year=date('Y');

$sqlrec="select * FROM mop,currency,suppliers,order_code_get WHERE 
order_code_get.mop_id=mop.mop_id AND 
order_code_get.currency=currency.curr_id AND order_code_get.supplier_id=suppliers.supplier_id AND order_code_get.order_code_id='$order_code'";
$resultsrec= mysql_query($sqlrec) or die ("Error $sqlrec.".mysql_error());	
$rowsrec=mysql_fetch_object($resultsrec);
$supplier_id=$rowsrec->supplier_id;
$lpo_no=$rowsrec->lpo_no;
$ref_no=$rowsrec->ref_no;
$expiry_date=$rowsrec->lpo_expiry_date;
$currency=$rowsrec->currency;
$curr_rate=$rowsrec->curr_rate;
$curr_name=$rowsrec->curr_name;
$freight_charge=$rowsrec->freight_charge;
$shipper_name=$rowsrec->shipper_name;
$pay_terms=$rowsrec->mop_name;
$gen_by=$rowsrec->user_id;
$lpo_date=$rowsrec->date_generated;
$comments=$rowsrec->payment_schedule;
$del_cond=$rowsrec->comments;

$querycont="select * from company_contacts order by contacts_id desc limit 1";
$resultscont=mysql_query($querycont) or die ("Error: $querycont.".mysql_error());
$rowscont=mysql_fetch_object($resultscont);

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
	<tr><td><?php echo $rowssupp->supplier_name; ?></td></tr>
	<tr><td><?php echo $rowssupp->postal; ?></td></tr>
	<tr><td><?php echo $rowssupp->country; ?></td></tr>
	<tr><td><?php echo $rowssupp->phone; ?></td></tr>
	<tr><td><?php echo $rowssupp->email; ?></td></tr>
	
	</table>
	
	
	</td>
 
    <td colspan="4" align="right" valign="top"><img src="<?php echo $base_url;?>images/logolpo.png" /></td>
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
    <td colspan="11" bgcolor="#000033" align="center"><span style="font-size:17px; font-weight:bold; color: #FFFFFF;">PURCHASE ORDER</span></td>
  </tr>
  </table>
  
<table width="700" border="0" align="center" style="margin:auto">
  <tr height="20">
    <td colspan="7"  width="80%" align="right"></td>
	<TD>
	LPO No : <?php echo $lpo_no;; 
	//$date_generated=date('Y-m-d');
	?>
	
	</TD>
  </tr>
  
  <tr height="20">
    <td colspan="7"  align="right"></td>
	<TD>
	Date : <?php  echo $lpo_date; 
	
	
	
	
	//echo date('d-m-Y',strotime($lpo_date))
	//$date_generated=date('Y-m-d');
	?>
	
	</TD>
  </tr>
  
    <tr height="20">
    <td colspan="7"  align="right"></td>
	<TD>
	Ref NO : <?php echo $ref_no; 
	//$date_generated=date('Y-m-d');
	?>
	
	</TD>
  </tr>
   
  
  
  </table>
  <table width="700" border="0" bgcolor="#C0D7E5" style="border-top:1px solid #073B6A; border-bottom:1px solid #073B6A; margin:auto;">
  
  <tr>
    <td colspan="2" width="40%" height="30"><strong>Terms Of Payments : </strong><?php echo $comments;?></td>
    <td colspan="2"><strong><!--DELIVERY ADDRESS --></strong></td>

    <td width="30%" colspan="2"><strong></strong></td>
  </tr>
  
  <tr>
    <td colspan="2"><strong>Delivery Conditions : </strong><?php echo $del_cond;?></td>
    <td colspan="2"><?php //echo $rowscont->street; ?></td>
	
	
	

    <td colspan="2"><?php //echo $pay_terms;   ?></td>
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
        <td width="10%"><div align="center"><strong>No</strong></div></td>
    <td colspan="2"><div align="center"><strong>Item  Name </strong></div></td>
    <td width="10%"><div align="center"><strong>Quantity</strong></div></td>
    <td width="15%"><div align="center"><strong>Unit Price </br>(<?php echo $curr_name; ?>)</strong></div></td>
    <td><div align="center"><strong>Amount </br>(<?php echo $curr_name; ?>)</strong></div></td>
  </tr>
  
  <?php 
  
$grndttl=0;

$sqllpdet="select * FROM purchase_order,items 
WHERE purchase_order.product_id=items.item_id AND purchase_order.order_code='$order_code'";
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
  
 
    <td align="center"><?php echo $serial=$serial+1;;?></td>
   
   
    <td colspan="2"><?php echo $rowslpdet->item_name; ?></td>

    <td align="center"><?php echo $rowslpdet->quantity; $qnty=$rowslpdet->quantity;
	
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
	
	
	
	$vat_value=$rowslpdet->order_vat_value;
	
	$ttl_vat=$ttl_vat+$vat_value;
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
   <td colspan="2" align="right"><font><strong>Sub-Total</strong></font></td>
    
    <td align="right" width="17%"><font size="+1"><?php 

		echo number_format ($grndttl_lpo,2);   

	?></font></td>
  </tr>
   <tr>

    <td>&nbsp;</td>
    <td>&nbsp;</td>


    <td>&nbsp;</td>
   <td colspan="2" align="right"><font ><strong>VAT (<?php echo $curr_name; ?>)</strong></font></td>
    
    <td align="right"><font size="+1"><?php 

		echo number_format ($ttl_vat,2);   

	?></font></td>
  </tr>
	
	
  <tr>   

    <td>&nbsp;</td>
    <td align="right"><strong> </strong></td>

    <td></td>
   <td colspan="2" align="right"><font size="+1"><strong>Total </strong></font></td>
    
    <td align="right"><font size="+1" color="#FF0000"><?php 

	echo number_format ($grndttl=$grndttl_lpo+$ttl_vat,2);  

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
  
  <!--<tr>
    <td colspan="8" align="right"><strong><em>Generated by :
          <?php 
$sqluser="select * FROM users WHERE user_id='$gen_by'";
$resultsuser= mysql_query($sqluser) or die ("Error $sqluser.".mysql_error());	
$rowsuser=mysql_fetch_object($resultsuser);	

echo $rowsuser->f_name;
	
	
	
	?>
    </em></strong></td>
  </tr>-->
 
  
  
  </table>
  
  <br/>
  

<table width="700" border="0" align="center"  style="margin:auto">  
  <tr>
    <td colspan="8" align=""><strong><em>Authorizing Signature:
  _______________________________________________
<span style="float:right;">LPO Expiry Date :  <?php echo $expiry_date; ?></span>
    </em></strong></td>
  </tr>

</table>

<table width="700" border="0" align="center"  style="margin:auto">  
  <tr>
    <td colspan="8" align="left"><em>
1. Please quote this LPO number in your invoice.	</br>
2. No partial/over supply will be accepted.</br>
3. Treat all pending orders as cancelled.</br>
4. Supply after expiry date will not be accepted.</br>
5. Goods or services will be delivered on weekdays from 8am to 5pm.	</br>
	
	
	
	<!--LPOS are valid for 30 days from date of issue. Orders not excuted within the specified period are liable for cancelation.
	LPOS Must be quoted on all invoices, delivery notes and correspondence concerning goods and services. Each order must have a separate invoice
	Any goods which are considered unsuitable will be returned for full credit note. Supply of goods and services should be stated in 
	Agreval East Africa Limited Supplier guidelines-->
    </em></td>
  </tr>

</table>

<br/>









</body>
</html>
