
<table>
<tr bgcolor="#FFFFCC">
<td colspan="8" align="center"><strong>Delivery Date : </strong><?php 
$sqldd="select * FROM received_stock_code where stock_code_id='$order_code'";
$resultsdd= mysql_query($sqldd) or die ("Error $sqldd.".mysql_error());
$rowsdd=mysql_fetch_object($resultsdd);
echo $delivery_date=$rowsdd->delivery_date;
$delivery_note_no=$rowsdd->delivery_note_no;
$shop_id=$rowsdd->shop_id;
//$shop_id=


?>

<strong>Goods Received Note : </strong>
<?php 
echo $rowsdd->delivery_note_no;
?>
</td>
</tr>





<tr style="background:url(images/description.gif);" height="30" >
	

    <td width="200"><div align="center"><strong>Product Name</strong></td>
    <td width="200"><div align="center"><strong>Qnty Received</strong></td>	
    <td width="200"><div align="center"><strong>Manuf Date</strong></td>	
    <td width="200"><div align="center"><strong>Expiry Date</strong></td>	
    <td width="200"><div align="center"><strong>Batch No</strong></td>	
	<!--<td width="200"><div align="center"><strong>Price (<?php echo $curr_name ?>)</strong></td>	
	<td width="200"><div align="center"><strong>Rate</strong></td>	
	<td width="200"><div align="center"><strong>Price (Kshs)</strong></td>	
	<td width="200"><div align="center"><strong>Amount (Kshs)</strong></td>	
	<td width="200"><div align="center"><strong>Edit </strong></td>	
	<td width="200"><div align="center"><strong>Delete</strong></td>	
	<td width="200"><div align="center"><strong>Freight Cost (Kshs)</strong></td>	
	<td width="200"><div align="center"><strong>Item Cost<strong></td>	
	<td width="200"><div align="center"><strong>Advance Profit/Loss<strong></td>	
	<td width="200"><div align="center"><strong>Adjusted Cost (Kshs)<strong></td>	-->


    </tr>
	
<?php 
 $all_cost=0; 
$sql="select * FROM received_stock,items
WHERE received_stock.product_id=items.item_id 
AND received_stock.stock_code_id='$order_code'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


if (mysql_num_rows($results) > 0)
						  {
							  $RowCounter=0;
							  while ($rows=mysql_fetch_object($results))
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
$received_stock_id=$rows->received_stock_id;
 
 ?>
    

    <td><?php echo $item_name=$rows->item_name.' ('.$rows->item_code.')';?><input type="hidden" name="product_id[]" size="20" value="<?php echo $item_id=$rows->item_id;?>">										
										<input type="hidden" name="order_code[]" size="20" value="<?php echo $order_code; ?>">
										<input type="hidden" name="supplier_id[]" size="20" value="<?php echo $supplier_id;?>">
										<input type="hidden" name="purchase_order_id[]" size="20" value="<?php echo $rows->purchase_order_id;?>">
										
	</td>
	
	
	<td align="center">
	<?php 
	$p_id=$rows->item_id;
	?>
	<a href="view_received_stock.php?product_id=<?php echo $p_id; ?>&order_code_id=<?php echo $order_code_id; ?>" style="font-size:12px; color:#000000;">
	<?php 
	

/* $sqlord1="select SUM(quantity_rec) as ttl_quant_rec,expiry_date,delivery_date,advance_margin,received_stock_id from received_stock where product_id='$p_id' 
and order_code_id='$order_code_id'";
$resultsord1= mysql_query($sqlord1) or die ("Error $sqlord1.".mysql_error());
$rowsord1=mysql_fetch_object($resultsord1); */
echo $qnty_rec=$rows->quantity_rec;
	?>
	
</a>	
	</td>
	<td align="center">
	
	<?php  
	

	
	
	
	
	
	echo $rows->man_date;
	
	
	
	?>
		
	</td>
	
	<td align="center">
	
	<?php  
	echo $rows->expiry_date;
	
	
	
	?>
		
	</td>
		<td align="center">
	
	<?php  
	echo $rows->batch_no;
	
	
	
	?>
		
	</td>
	
	<!--<td align="center">
	
	<?php  
	//echo $curr_rate=$rows->vendor_prc;
	echo number_format($price_kshs=$vendor_prc*$curr_rate,2);
	
	$ttls=$price_kshs*$qnty_rec;
	
	$ledger_amnt=$vendor_prc*$qnty_rec;
	
	$all_cost=$all_cost+$ttls;
	
	?>
		
	</td>
	<td align="right"><?php 
echo number_format($ttls,2);


$qnty=$qnty_rec;
$ttls;


// debit the inventory account
$account_id_dr2=7;
$sqldr= "SELECT * from account where account_id='$account_id_dr2'";
$resultsdr= mysql_query($sqldr) or die ("Error $sqldr.".mysql_error());
$rowsdr=mysql_fetch_object($resultsdr);
$acc_type_id_dr2=$rowsdr->account_type_id;
$acc_cat_id_dr2=$rowsdr->account_cat_id;

 // account payables
$account_id_cr2=3;
$sqlcr= "SELECT * from account where account_id='$account_id_cr2'";
$resultscr= mysql_query($sqlcr) or die ("Error $sqlcr.".mysql_error());
$rowscr=mysql_fetch_object($resultscr);
$acc_type_id_cr2=$rowscr->account_type_id;
$acc_cat_id_cr2=$rowscr->account_cat_id; 

	
	
//$memo='Received '.$item_name.' for received stock delivery note '.$batch_no;
$memo2='Received '.$qnty.' '.$item_name.' '.($item_code).' through delivery note <a href="receive_stock_to_warehouse.php?success=1&order_code_id='.$order_code_id.'&order_code='.$order_code.'">Delivery Note No:'.$delivery_note_no.'</a>';
//receive_stock_to_warehouse.php?success=1&order_code_id=$order_code_id&order_code=$order_code
$date_dep=$delivery_date;
$latest_id2=$received_stock_id;
$purchase_cost2=$ledger_amnt;

$orderdate = explode('-', $date_dep);
$year  = $orderdate[0];
$month = $orderdate[1];
$day   = $orderdate[2];
$transaction_code2="recst".$latest_id2;
	
/* $sqlproftm="select * from ledger_transactions where item_id='$prod' AND transaction_code='inv$latest_received_stock_id sale$invoice_id'";
$resultsproftm=mysql_query($sqlproftm) or die ("Error $sqlproftm.".mysql_error());
$numrowsproftm=mysql_num_rows($resultsproftm);	

if ($numrowsproftm>0)	
{



//update inventory ledger
$sqltrans="update ledger_transactions SET 
memo='$memo',
shop_id='$shop_id',
amount='-$purchase_cost',
credit='$purchase_cost',
transaction_date='$sales_date',
l_day='$day',
l_month='$month',
l_year='$year'

where transaction_code='$transaction_code' and account_id='$account_id_cr'";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());


//update cost of sales
$sqltrans="update ledger_transactions SET 
memo='$memo',
shop_id='$shop_id',
amount='$purchase_cost',
debit='$purchase_cost',
transaction_date='$sales_date',
l_day='$day',
l_month='$month',
l_year='$year'

where transaction_code='$transaction_code' and account_id='$account_id_dr'";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());


$sqltransg="update item_transactions SET 
item_id='$prod',
shop_id='$shop_id',
memo='$memo',
quantity='-$qnty',
transaction_date='$sales_date',
l_day='$day',
l_month='$month',
l_year='$year'

where transaction_code='inv$latest_received_stock_id sale$invoice_id'";
$resultstransg=mysql_query($sqltransg) or die ("Error $sqltransg.".mysql_error()); 




}
else
{ */


//debit expense
$sqlaccpay= "insert into ledger_transactions values('','$acc_cat_id_dr2','$acc_type_id_dr2','$account_id_dr2','$shop_id','$memo2','$purchase_cost2','$purchase_cost2','','$currency',
'$curr_rate','$date_dep','$day','$month','$year',NOW(),'$transaction_code2','','','','','','$user_id')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());

 //credit accounts payables
$sqlaccpay= "insert into ledger_transactions values('','$acc_cat_id_cr2','$acc_type_id_cr2','$account_id_cr2','$shop_id','$memo2','$purchase_cost2','','$purchase_cost2','$currency',
'$curr_rate','$date_dep','$day','$month','$year',NOW(),'$transaction_code2','','','','','','$user_id')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error()); 
	

/* $sqlaccpay="insert into inventory_ledger values('','$item_trans_desc','-$purchase_cost','','$purchase_cost','$currency','$curr_rate','$sales_date','inv$latest_received_stock_id','','','$incharge')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error()); */

/*  $sqltrans= "insert into item_transactions values('','$item_id','$memo2','$qnty','$date_dep','recst$latest_id2 del$order_code','$incharge')";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error()); */

$sqlaccpay= "insert into item_transactions values('','$item_id','$memo2','$qnty','$date_dep','$day','$month','$year','srt$latest_received_stock_id saleret$order_code',
'$user_id','$shop_id','','')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());


/* $sqlaccpay= "insert into item_transactions values('','$prod','$memo','-$qnty','$date_dep','$day','$month','$year','inv$latest_received_stock_id sale$invoice_id',
'$user_id','$shop_id','','')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error()); */



//}


	
	
	?></td>
	<td></td>
	<td></td>-->
    </tr>
	
  <?php 
  
  }
  
  ?>
  
  <?php
  
  
  }
  
  else
  {
  
  ?>
  
  
  <tr bgcolor="#FFFFCC">
   
    <td colspan="9" height="30" align="center"> 
	<font color="#ff0000">No Results found!!</font>
	
	</td>
	
    </tr>
	
	<?
  
  }
  ?>	
	
  


</table>