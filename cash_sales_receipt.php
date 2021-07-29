<?php 
include('includes/session.php');
include('Connections/fundmaster.php');

$sales_id=$_GET['sales_id'];

$sqlrec="SELECT * FROM sales WHERE sales_id='$sales_id'";
$resultsrec= mysql_query($sqlrec) or die ("Error $sqlrec.".mysql_error());	
$rowsrec=mysql_fetch_object($resultsrec);
$customer_id=$rowsrec->customer_id;
$curr_rate=$rowsrec->curr_rate;
$general_remarks=$rowsrec->general_remarks;
$sales_rep=$rowsrec->sales_rep; 
$delivery_address=$rowsrec->delivery_address;
$delivered_by=$rowsrec->delivered_by;
$invoice_no=$rowsrec->invoice_no;
$gen_by=$rowsrec->user_id;

$shop_id=$rowsrec->shop_id;
$orig_shop_id=$_GET['orig_shop_id'];

$queryshp="select * from account where account_id='$shop_id'";
$resultshp=mysql_query($queryshp) or die ("Error: $queryshp.".mysql_error());								  
$rowshp=mysql_fetch_object($resultshp);
$shop_name=$rowshp->account_name;


$querytcsp="select * from customer where customer_id='$customer_id'";
$resultstcsp=mysql_query($querytcsp) or die ("Error: $querytc.".mysql_error());								  
$rowstcsp=mysql_fetch_object($resultstcsp);
$customer_name=$rowstcsp->customer_name;



$shipper_id=$rowsrec->shipper_id;
$lpo_no=$rowsrec->invoice_no;
$currency=$rowsrec->currency;
$discount=$rowsrec->discount;
$vat=$rowsrec->vat;
$sales_date=$rowsrec->sale_date;
$order_no=$rowsrec->order_no;

$querytcs="select * from currency where curr_id='$currency'";
$resultstcs=mysql_query($querytcs) or die ("Error: $querytc.".mysql_error());								  
$rowstcs=mysql_fetch_object($resultstcs);
$curr_name=$rowstcs->curr_name;
/* $curr_rate=$rowsrec->curr_rate;
$status=$rowsrec->status; */


$sqlrec="SELECT * FROM invoice_payments WHERE sales_id='$sales_id' and receipt_no=''";
$resultsrec= mysql_query($sqlrec) or die ("Error $sqlrec.".mysql_error());	
$rowsrec=mysql_fetch_object($resultsrec);
 $mop=$rowsrec->mop;

/* $querymop="select * from mop where mop_id='$mop'";
$resultsmop=mysql_query($querymop) or die ("Error: $querymop.".mysql_error());								  
$rowsmop=mysql_fetch_object($resultsmop);
$mop_name=$rowsmop->mop_name; */


$invoice_id=$sales_id;





$queryshp="select * from users where user_id='$sales_rep'";
$resultshp=mysql_query($queryshp) or die ("Error: $queryshp.".mysql_error());								  
$rowshp=mysql_fetch_object($resultshp);
$sales_rep_name=$rowshp->f_name;

$queryprof1="select * from client_discount where client_id='$sales_rep'";
$resultsprof1=mysql_query($queryprof1) or die ("Error: $queryprof1.".mysql_error());
$rowsprof1=mysql_fetch_object($resultsprof1);
$com_perc=$rowsprof1->comm_perc;




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

 <tr>
    <td colspan="5" align="center" valign="top"><img src="<?php echo $base_url;?>images/logolpo.png" />
	<hr/>
	
	</td>
  </tr>
	 <?php 
  
/* $querysup="select * from customer where customer_id ='$client_id'";
$resultssup=mysql_query($querysup) or die ("Error: $querysup.".mysql_error());
$rowssupp=mysql_fetch_object($resultssup); */


$querycont="select * from company_contacts order by contacts_id desc limit 1";
$resultscont=mysql_query($querycont) or die ("Error: $querycont.".mysql_error());
$rowscont=mysql_fetch_object($resultscont); 
  
  
  ?>
  <tr>
     <td  align="right" colspan="4" rowspan="" valign="top">
	 <?php
if ($cash==1)
{

}
else
{


	 ?>

	<?php 
}	
	?>
	
	</td>
 </tr>
 


 <tr>
   <td width="60%">
<?php echo $rowscont->cont_person; ?></br>
 <strong> </strong><?php echo $rowscont->building.' '.$rowscont->street; ?></br>
  <strong> </strong><?php echo $rowscont->phone; ?></br>
   <strong> </strong><?php echo $rowscont->telephone; ?></br>
   <strong></strong><?php echo $rowscont->email; ?></br>
   
<strong></strong><?php echo $rowscont->fax; ?></br>
   
   
   </td> <td colspan="4" align="left" valign="top"><strong>Customer Details </strong></br>
  <strong></strong> <?php echo $customer_name=$rowstcsp->customer_name; ?></br>
  <strong></strong> <?php echo $customer_address=$rowstcsp->address; ?></br>
  <strong></strong> <?php echo $customer_address=$rowstcsp->town; ?></br>
  <strong> </strong><?php echo $customer_phone=$rowstcsp->phone; ?></br>
   <strong></strong><?php echo $customer_email=$rowstcsp->email; ?></br>
   

   
   
   </td>
  </tr>


  
  <tr height="30">
    <td colspan="10" bgcolor="#000033" align="center"><span style="font-size:17px; font-weight:bold; color: #FFFFFF;">

CASH SALES RECEIPT 

	
	
	
	
	</span></td>
  </tr>
  <tr height="30">
    <td colspan="10"  align="right">DATE : <?php echo $sales_date; 

	?><hr/></td>
  </tr>
  
   <tr height="20">
    <td colspan="10"  align="right"><strong>
	
RECEIPT NO :
	<?php 
	echo $invoice_no;
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
    <td width="30%"><div align="center"><strong>Description</strong></div></td>
    <td width="10%"><div align="center"><strong>Qty</strong></div></td>
    <td width="15%"><div align="center"><strong>Price (<?php echo $curr_name; ?>)</strong></div></td>
    <td width="20%"><div align="center"><strong>Amount (<?php echo $curr_name; ?>)</strong></div></td>
	
  </tr>
  
    <?php 
$task_totals=0;
$sqllpdet="select * FROM sales_item,items WHERE sales_item.item_id=items.item_id AND 
sales_item.sales_id='$sales_id' order by sales_item_id asc";
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
 
 <td ><?php echo $item_code=$rowslpdet->item_code; ?></td>
<td ><?php 

$batch_no=$rowslpdet->batch_no;
$man_date=$rowslpdet->man_date;
$expiry_date=$rowslpdet->expiry_date;


echo $product_name=$rowslpdet->item_name;


if ($batch_no=='')
{
	
}
else
{
//echo ' <i>(Batch No :'.$batch_no.') ';
}

if ($man_date=='0000-00-00')
{
	
}
else
{
echo 'Mfg.Date : '.$rowslpdet->man_date;
}

if ($expiry_date=='0000-00-00')
{
	
}
else
{

echo 'Exp. Date : '.$rowslpdet->expiry_date.'</i>';
}
$prod=$rowslpdet->item_id;


?></td>
<td ><?php echo $rowslpdet->item_quantity; $qnty=$rowslpdet->item_quantity;?></td>
<td align="right"><?php 
	
		
	
	echo number_format($item_cost=$rowslpdet->item_cost,2);
	

	?></td>
	
	<td align="right">
	<?php 
	

	echo number_format($amnt=$item_cost*$qnty,2);
	
	
	$task_totals=$task_totals+$amnt;
	
	
	$item_disc=$rowslpdet->shop_id;


$item_disc_value=$item_disc*$amnt/100;


$disc_value=$disc_value+$item_disc_value;
	
	
	
	
	
	
	?>
	
	
	</td>
	
	</tr>
 
  
  <?php 
							  }
							  
						  }
  ?>
  
  <tr><td ></td>
<td></td>
<td></td>
<td align="right"><strong>Sub Total</strong></td>
<td align="right"><strong><?php echo number_format($task_totals,2); ?></strong></td>


</tr>

<tr><td ></td>
<td></td>
<td></td>
<td align="right"><strong>Discount</strong></td>
<td align="right"><strong><?php 



echo number_format($disc_value,2); ?></strong></td>


</tr>

<tr>
<td ></td>
<td></td>
<td></td>
<td align="right"><strong>Sub Total 1</strong></td>
<td align="right"><strong><?php  number_format($sub_ttl1=$task_totals-$disc_value,2); 

if ($vat==1)
{
//$sub_ttl_vat=$sub_ttl1*0.862;

$vat_value=0.16*$sub_ttl1;

}

if ($vat==0)
{


$vat_value=0*$sub_ttl1;

} 


echo number_format($sub_ttl1,2)

?></strong></td>


</tr>

<tr>
<td ></td>
<td></td>
<td></td>
<td align="right"><strong>VAT (16%)</strong></td>
<td align="right"><strong><?php echo number_format($vat_value,2); ?></strong></td>


</tr>

<tr>
<td ></td>
<td></td>
<td></td>
<td align="right"><strong>Grand Total</strong></td>
<td align="right"><strong><?php echo number_format($grnd_ttl=$sub_ttl1+$vat_value,2); ?></strong></td>


</tr>

 
  
  <tr>
    <td colspan="8" align="right"><strong><em>Generated by :
         <?php 
$sqluser="select * FROM users WHERE user_id='$gen_by'";
$resultsuser= mysql_query($sqluser) or die ("Error $sqluser.".mysql_error());
	
$rowsuser=mysql_fetch_object($resultsuser);	

echo $rowsuser->f_name;
	
	
	
	?>
    </em></strong></td>
  </tr></table>
  
  <br/>
  
<table width="700" border="0" align="center">
  
  

  

    <tr height="10">
    <td colspan="6" align="center"><strong>
	Thank You For Your Business!!
	
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
