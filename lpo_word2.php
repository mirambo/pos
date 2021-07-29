<?php 
include('includes/session.php');
include('Connections/fundmaster.php');
$date_generated=$_GET['date_generated'];
$get_latest_lpo_id=$_GET['lpo_id'];
$lpo_no=$_GET['lpo_no'];
$get_latest_sup_id=$_GET['supp_id'];
$get_latest_order_id=$_GET['order_code'];
$currency=$_GET['currency'];
$shipp_id=$_GET['shipp_id'];
$pay_terms=$_GET['pay_terms'];
$year=date('Y');
$comments=$_GET['comments'];
$ttl_lpo_amount=$_GET['ttl_lpo_amount'];
$freight_charges=$_GET['freight_charges'];

$sqlcurr="select * from currency where curr_id='$currency'";
$resultscurr= mysql_query($sqlcurr) or die ("Error $sqlcurr.".mysql_error());
$rowcurr=mysql_fetch_object($resultscurr);
$curr_name=$rowcurr->curr_name;
$curr_rate=$rowcurr->curr_rate;
header("Content-Type: application/vnd.ms-word");
header("Content-Disposition: attachment;Filename=Purchase_Order.doc");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Purchase Order - <?php echo $lpo_no; ?></title>
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
    <td colspan="6"><div align="right">Website : www.briskdiagnostics.com</div></td>
  </tr>
 
  <tr >
    <td colspan="11" bgcolor="#000033" align="center"><span style="font-size:17px; font-weight:bold; color: #FFFFFF;">PURCHASE ORDER</span></td>
  </tr>
  <tr height="30">
    <td colspan="11"  align="right">DATE : <?php echo $date_generated; 
	
	?><hr/></td>
  </tr>
  
   <tr >
    <td colspan="11"  align="left"><strong>PURCHASE ORDER NO :  <?php 
	echo $lpo_no;
	
	
	?>
	<hr/>
	</strong></td>
  </tr>
  </table>
  <table width="700" border="0" align="center" bgcolor="#C0D7E5" style="border-top:1px solid #073B6A; border-bottom:1px solid #073B6A;">
  <tr >
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
	<?php 
	
$queryship="select * from shippers where shipper_id ='$shipp_id'";
$resultsship=mysql_query($queryship) or die ("Error: $queryship.".mysql_error());
$rowsship=mysql_fetch_object($resultsship);
	
	
	
	
	?>
	
	
    <td><?php echo $rowsship->shipper_name;   ?></td>
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
 
</table><br/>

<table width="700" border="0" align="center" class="table">
  <tr bgcolor="#C0D7E5" >
    <td width="50"><div align="center"><strong> Code </strong></div></td>
    <td width="281"><div align="center"><strong>Item Name </strong></div></td>
    <td width="124"><div align="center"><strong>Pack Size </strong></div></td>
    <td width="71"><div align="center"><strong>Qty</strong></div></td>
    <td width="97"><div align="center"><strong>Unit Price (<?php echo $curr_name; ?>)</strong></div></td>
    <td width="97"><div align="center"><strong>Totals Amount (<?php echo $curr_name; ?>)</strong></div></td>
  </tr>
  
  <?php 
  
$grndttl=0;

$sqllpdet="select purchase_order.purchase_order_id,purchase_order.quantity,purchase_order.payment_term_id,purchase_order.vendor_prc,purchase_order.shipping_agent_id,purchase_order.product_code,
purchase_order.ttl,products.product_name,products.pack_size from purchase_order, products where 
purchase_order.product_id=products.product_id AND purchase_order.order_code='$get_latest_order_id' order by purchase_order.purchase_order_id asc";
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
	
	; $unit_val= $rowslpdet->vendor_prc;?></td>
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
   <td colspan="2" align="right"><font ><strong>Sub-Totals (<?php echo $curr_name; ?>)</strong></font></td>
    
    <td align="right"><font size="+1" color="#FF0000"><?php 

	echo number_format ($grndttl_lpo,2);  

?></font></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
   <td colspan="2" align="right"><font ><strong>Freight Charges (<?php echo $curr_name; ?>)</strong></font></td>
    
    <td align="right"><font size="+1" color="#FF0000"><?php 
	
//$freight_charges=$ttl_lpo_amount-$grndttl_lpo;

	echo number_format ($freight_charges,2);  

?></font></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
   <td colspan="2" align="right"><font ><strong>Totals (<?php echo $curr_name; ?>)</strong></font></td>
    
    <td align="right"><font size="+1" color="#FF0000"><?php 

	echo number_format ($grndttl=$freight_charges+$grndttl_lpo,2);  

?></font></td>
  </tr>
  
   <?php 
	
	
	}
	?>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="6" align="right"><strong><em>Generated by :
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
  


<br/>
  
<table width="700" border="0" align="center">
  <tr>
    <td colspan="6" width="30%" ><?php echo $comments; ?><td>
  </tr>
  
</table>

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
	If you Have any question about this purchase, contact us using the above contacts.
	
	<td>
  </tr>

</table>








</body>
</html>
