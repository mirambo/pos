<?php
#include connection
include('Connections/fundmaster.php');



$sqlsp="select * FROM received_supplier_invoice_orig";
$resultssp= mysql_query($sqlsp) or die ("Error $sqlsp.".mysql_error());

while ($rowsp=mysql_fetch_object($resultssp))
{
	

echo $order_code_id=mysql_real_escape_string($rowsp->order_code_id);	
echo '-';
echo $supplier_id=mysql_real_escape_string($rowsp->supplier_id);	
echo '-';
echo $recorded_by=mysql_real_escape_string($rowsp->recorded_by);	
echo '-';
echo $supplier_invoice_no=mysql_real_escape_string($rowsp->supplier_invoice_no);	
echo '-';
echo $ttl_cost=mysql_real_escape_string($rowsp->ttl_cost);	
echo '-';
echo $ttl_vat=mysql_real_escape_string($rowsp->ttl_vat);	
echo '-';
echo $ttl_order_amount=mysql_real_escape_string($rowsp->ttl_order_amount);	
echo '-';
echo $comments=mysql_real_escape_string($rowsp->comments);	
echo '-';
echo $currency=mysql_real_escape_string($rowsp->currency);	

echo '-';
echo $curr_rate=mysql_real_escape_string($rowsp->curr_rate);	

echo '-';
echo $date_paid=mysql_real_escape_string($rowsp->date_paid);	

echo '-';
echo $date_received=mysql_real_escape_string($rowsp->date_received);

echo '-';
echo $vat_account_id=mysql_real_escape_string($rowsp->vat_account_id);

echo '-';
echo $account_to_credit=mysql_real_escape_string($rowsp->account_to_credit);

echo '-';

echo $account_to_debit=mysql_real_escape_string($rowsp->account_to_debit);

echo '</br>';


$sql="INSERT INTO received_supplier_invoice_code SET
supplier_id='$supplier_id',
order_code_id='$order_code_id',
recorded_by='$recorded_by',
supplier_invoice_no='$supplier_invoice_no',
ttl_cost='$ttl_cost',
ttl_vat='$ttl_vat',
ttl_order_amount='$ttl_order_amount',
comments='$comments',
currency='$currency',
curr_rate='$curr_rate',
vat_account_id='$vat_account_id',
account_to_credit='$account_to_credit',
date_paid='$date_paid',
date_received='$date_received'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
$latest_id2=mysql_insert_id();


$sql34="INSERT INTO received_supplier_invoice SET 
        received_supplier_invoice_code_id='$latest_id2',
    	account_to_debit='$account_to_debit',
	    debit_amount='$ttl_cost'" or die(mysql_error());
    $results34= mysql_query($sql34) or die ("Error $sql34.".mysql_error());




	
}







mysql_close($cnn);


?>


