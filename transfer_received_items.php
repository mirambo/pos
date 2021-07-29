<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<?php
 include('Connections/fundmaster.php'); 
$sql="select *  FROM received_stock where order_code_id!='0' ORDER BY received_stock.date_received desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


if (mysql_num_rows($results) > 0)
						  {
							  
							  while ($rows=mysql_fetch_object($results))
							  { 
							  
							  echo $prod=$rows->product_id;
							  
							  echo '</br>';
							  
							 $order_code_id=$rows->order_code_id;
							 $latest_received_stock_id=$rows->received_stock_id;
							 $received_date=$rows->delivery_date;
							  
$sqlprof="SELECT * from items where item_id='$prod'";
$resultsprof= mysql_query($sqlprof) or die ("Error $sqlpo.".mysql_error());
$rowsprof=mysql_fetch_object($resultsprof);
 $product_name=$rowsprof->item_name;
$pack_size=$rowsprof->pack_size;


$sqlprof2= "SELECT * from order_code_get where order_code_id='$order_code_id'";
$resultsprof2= mysql_query($sqlprof2) or die ("Error $sqlpo2.".mysql_error());
$rowsprof2=mysql_fetch_object($resultsprof2);
echo $lpo_no=$rowsprof2->lpo_no;
echo $ref_no=$rowsprof2->ref_no;


$value_at_hand=$rows->quantity_rec;

$memo='Received <a href="begin_order.php?order_code='.$order_code_id.'">'.$value_at_hand.' '.$product_name.' of LPO No: '.$lpo_no.' Ref No : '.$ref_no.'</a> into the store';
$latest_id=$prod;

$date_dep=$received_date;

$orderdate = explode('-', $date_dep);
$year  = $orderdate[0];
$month = $orderdate[1];
$day   = $orderdate[2];
$transaction_code="recitem".$latest_received_stock_id;

/* $sqltrans= "insert into item_transactions values('','$prod','Received $qnty_rec $product_name ($pack_size) of LPO No: $lpo_no into the warehouse','$qnty_rec','$received_date','recp$latest_received_stock_id','')";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());
							  
	 */			


$sqlaccpay= "insert into item_transactions values('','$latest_id','$memo','$value_at_hand','$date_dep','$day','$month','$year','$transaction_code',
'$user_id','$shop_id','','')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());
	 
							  
							  
							   //echo $quant_rec=$rows->quantity_rec.'</br>';
							  
							  
							  
							  }
							  
							  
							  }






 ?>







</body>
</html>
