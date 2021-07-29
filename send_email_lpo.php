<?php 
include('includes/session.php');
include('Connections/fundmaster.php');

 $order_code=$_GET['order_code'];
$year=date('Y');

$sqlrec="select * FROM mop,currency,suppliers,order_code_get WHERE order_code_get.mop_id=mop.mop_id AND 
order_code_get.currency=currency.curr_id AND order_code_get.supplier_id=suppliers.supplier_id AND 
order_code_get.order_code_id='$order_code'";
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


$querysup="select * from suppliers where supplier_id ='$supplier_id'";
$resultssup=mysql_query($querysup) or die ("Error: $querysup.".mysql_error());
$rowssupp=mysql_fetch_object($resultssup);

$sup_email=$rowssupp->email;

$sup_name=$rowssupp->supplier_name;


$querycont="select * from company_contacts order by contacts_id desc limit 1";
$resultscont=mysql_query($querycont) or die ("Error: $querycont.".mysql_error());
$rowscont=mysql_fetch_object($resultscont);



$message .= '<link rel="stylesheet" type="text/css" href="'.$base_url.'stylepr.css" />';

$message .= '<style type="text/css">';
$message .= '.table';
$message .= '{';
$message .= ' border-collapse:collapse';
$message .= '}';
$message .= '.table td, tr';
$message .= '{';
$message .= 'border:1px solid black';
$message .= 'padding:3px';
$message .= '}';
$message .= '</style>';

$message .= '</head>';

$message .= '<body>';





$message .='<table width="700" border="0" align="center" style="margin:auto">';


$message .='<tr>';
    $message .='<td  align="right" colspan="4" rowspan="6" valign="top">';
	$message .='<table width="100%" border="0">';
	$message .='<tr><td colspan="2"><font size="+1"><strong>To:</strong></font></td></tr>';
	$message .='<tr><td>'.$rowssupp->supplier_name.'</td></tr>';
	$message .='<tr><td>'.$rowssupp->postal.'</td></tr>';
	$message .='<tr><td>'.$rowssupp->country.'</td></tr>';
	$message .='<tr><td>'.$rowssupp->phone.'</td></tr>';
	$message .='<tr><td>'.$sup_email.'</td></tr>';
	
	$message .='</table>';
	
	
	$message .='</td>';
 
    $message .='<td colspan="4" align="right" valign="top"><img src="'.$base_url.'images/logolpo.png" /></td>';
  $message .='</tr>';
  $message .='<tr>';

   $message .='<td colspan="6"><div align="right">'.$rowscont->building.' '.$rowscont->street.'</div></td>';
  $message .='</tr>';
  $message .=' <tr>';
    $message .='<td colspan="6"><div align="right">';
   $message .='Mobile: '.$rowscont->phone.'</div></td>';
 $message .=' </tr>';
 $message .=' <tr>';
  $message .='  <td colspan="6"><div align="right">';
  $message .='Telephone:'.$rowscont->telephone.'</div></td>';
 $message .=' </tr>';
  $message .='<tr>';
   $message .=' <td colspan="6"><div align="right">Email : '.$rowscont->email.'</div></td>';
  $message .='</tr><tr><td colspan="6"><div align="right">Website : '.$rowscont->fax.'</div></td></tr>';
 
  $message .='<tr height="30">';
   $message .='<td colspan="11" bgcolor="#000033" align="center"><span style="font-size:17px; font-weight:bold; color: #FFFFFF;">PURCHASE ORDER</span></td>';
  $message .='</tr>';
  $message .='</table>';
  
$message .='<table width="700" border="0" align="center" style="margin:auto">';
 $message .=' <tr height="20">';
  $message .='<td colspan="7"  width="80%" align="right"></td>';
	$message .='<TD>';
	$message .='LPO No : '.$lpo_no;


	
$message .='</TD></tr><tr height="20"><td colspan="7"  align="right"></td><TD>Date : '.$lpo_date.'</TD></tr>';
  
   $message .='<tr height="20">';
   $message .=' <td colspan="7"  align="right"></td>';
	$message .='<TD>';
	$message .='Ref NO : '.$ref_no; 


	
$message .='</TD>';
  $message .='</tr>';
   
  
  
 $message .=' </table>';
 $message .=' <table width="700" border="0" bgcolor="#C0D7E5" style="border-top:1px solid #073B6A; border-bottom:1px solid #073B6A; margin:auto;">';
  
 $message .=' <tr>';
  $message .='<td colspan="2" width="40%" height="30"><strong>Terms Of Payments : </strong>'.$comments.'</td>';
  $message .='<td colspan="2"><strong></strong></td>';

   $message .=' <td width="30%" colspan="2"><strong></strong></td></tr>';
  
 $message .=' <tr>';
  $message .='<td colspan="2"><strong>Delivery Conditions : </strong>'.$del_cond.'</td><td colspan="2"></td><td colspan="2"></td></tr>';
 
  
  
  
    
 $message .=' <tr>';
 $message .=' <td>&nbsp;</td>';
  $message .=' <td></td>';
   $message .=' <td width="31%">&nbsp;</td>';
  $message .=' <td colspan="2">&nbsp;</td>';
  $message .='  <td>&nbsp;</td>';
$message .='  </tr>';
  
  
$message .='</table>';
$message .='<br/>';

$message .='<table width="700" border="1" align="center" class="table" style="margin:auto">';
 $message .=' <tr>';
  $message .='<td width="10%"><div align="center"><strong>No</strong></div></td>';
  $message .='  <td colspan="2"><div align="center"><strong>Item  Name </strong></div></td>';
 $message .='  <td width="10%"><div align="center"><strong>Quantity</strong></div></td>';
  $message .=' <td width="15%"><div align="center"><strong>Unit Price </br>('.$curr_name.')</strong></div></td>';
   $message .=' <td><div align="center"><strong>Amount </br>('.$curr_name.')</strong></div></td>';
  $message .='</tr>';
  

  
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
$message .='<tr bgcolor="#C0D7E5" >';
}
else 
{
$message .='<tr bgcolor="#FFFFCC" >';
}
 
 
$serial=$serial+1;
  
 
   $message .=' <td align="center">'.$serial.'</td>';
   
   
   $message .='<td colspan="2">'.$rowslpdet->item_name.'</td>';

    $message .='<td align="center">'.$rowslpdet->quantity.'</td>';
	
	$qnty=$rowslpdet->quantity;
    $message .='<td align="right">'; 
	$vendor_prc=$rowslpdet->vendor_prc;
		if ($vendor_prc=='F.O.C')
		{
	$message .=$vendor_prc;
		}
		else
		{
		
	
$message .=number_format($rowslpdet->vendor_prc,2); 
$unit_val= $rowslpdet->vendor_prc;
	
	}
	
	$unit_val= $rowslpdet->vendor_prc;
	$message .='</td>';
   $message .='<td align="right"><strong>';
	
	
	$ttl=$unit_val*$qnty;
	
	$message .=number_format ($ttl,2);

	
	
	$grndttl_lpo=$grndttl_lpo+$ttl;
	
	

	
	

	$message .='</strong></td></tr>';
  

	
	
	}
	

	$message .='<tr>';

   $message .=' <td>&nbsp;</td>';
   $message .=' <td>&nbsp;</td>';


   $message .=' <td>&nbsp;</td>';
  $message .=' <td colspan="2" align="right"><font><strong>Sub-Total</strong></font></td>';
    
   $message .=' <td align="right" width="17%"><font size="+1">';

		$message .=number_format ($grndttl_lpo,2);   

$message .='</font></td> </tr><tr><td>&nbsp;</td><td align="right"><strong> </strong></td> <td></td>';
 $message .='<td colspan="2" align="right"><font size="+1"><strong>Total </strong></font></td>';
    
    $message .='<td align="right"><font size="+1" color="#FF0000">'.number_format ($grndttl=$grndttl_lpo+$freight_charge,2).'</font></td></tr>';
  

	
	
	}

  
  
 
  
  
  $message .='</table><br/>';
  

$message .='<table width="700" border="0" align="center"  style="margin:auto"> <tr><td colspan="8" align=""><strong><em>Authorizing Signature: _______________________________________________<span style="float:right;">LPO Expiry Date : '.$expiry_date.'</span>';
  $message .='  </em></strong></td></tr></table>';

$message .='<table width="700" border="0" align="center"  style="margin:auto"> <tr>';
$message .='<td colspan="8" align="left"><em>';
$message .='1. Please quote this LPO number in your invoice.</br>';
$message .='2. No partial/over supply will be accepted.</br>';
$message .='3. Treat all pending orders as cancelled.</br>';
$message .='4. Supply after expiry date will not be accepted.</br>';
$message .='5. Goods or services will be delivered on weekdays from 8am to 5pm.	</br>';
	
	
	
	
 $message .='</em></td>';
 $message .=' </tr>';

$message .='</table>';



$message .='<br/>';


$message;


$to2 = $sup_email;
			
	
			$subject = 'Agreval East Africa Ltd Order No : '.$lpo_no;
			$cleanedFrom = 'updateosero@gmail.com';	
			$headers = "From: " . $cleanedFrom . "\r\n";
			$headers .= "Reply-To: ". strip_tags($_POST['req-email']) . "\r\n";
			$headers .= "MIME-Version: 1.0\r\n";
			$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";			
			$sendm=mail($to2, $subject, $message, $headers);


if ($sendm)
{
?>
<script type="text/javascript">
alert('LPO Sent Successfuly to <?php echo $sup_name;  ?>');
//window.location = "home.php?initiateproject=initiateproject&sub_module_id=<?php echo $sub_module_id; ?>";
window.location = "begin_order.php?order_code=<?php echo $order_code; ?>";
</script> 

<?php
}
else
{
?>
<script type="text/javascript">
alert('Sending Failed. Try again');
//window.location = "home.php?initiateproject=initiateproject&sub_module_id=<?php echo $sub_module_id; ?>";
window.location = "begin_order.php?order_code=<?php echo $order_code; ?>";
</script> 

<?php	
	
	
}









