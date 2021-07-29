<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<?php
 include('Connections/fundmaster.php'); 
$sql="select * FROM received_stock,purchase_order,items,order_code_get where 
order_code_get.order_code_id=purchase_order.order_code AND items.item_id=received_stock.product_id AND 
received_stock.purchase_order_id=purchase_order.purchase_order_id
ORDER BY purchase_order.purchase_order_id asc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


if (mysql_num_rows($results) > 0)
						  {
							  
							  while ($rows=mysql_fetch_object($results))
							  { 
							  
							        echo $po_id=$rows->purchase_order_id;
									
									  echo ' - ';
							  
							  echo $item_id=$rows->item_id;
							  
							  echo ' - ';
							  
							    echo $product_id=$rows->product_id;
						
							  							  							

							  
	  echo ' - ';							  
							  
							  
							  
							  
							  echo $item_name=$rows->item_name;
							  
							  echo ' - ';
							  
							  							  echo $vendor_price=$rows->vendor_prc;
														  
														  
														  
														  
														  
														  
														  
$query11p="UPDATE items SET curr_bp='$vendor_price' where item_id='$product_id'";
$results11p=mysql_query($query11p) or die ("Error: $query11p.".mysql_error());
$rows11p=mysql_fetch_object($results11p);
							  

							  
							  echo '</br>';
							  



/* $sqltrans= "insert into item_transactions values('','$prod','Received $qnty_rec $product_name ($pack_size) of LPO No: $lpo_no into the warehouse','$qnty_rec','$received_date','recp$latest_received_stock_id','')";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());
							  
	 */			


/* $sqlaccpay= "insert into item_transactions values('','$latest_id','$memo','$value_at_hand','$date_dep','$day','$month','$year','$transaction_code',
'$user_id','$shop_id','','')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error()); */
	 
							  
							  
							   //echo $quant_rec=$rows->quantity_rec.'</br>';
							  
							  
							  
							  }
							  
							  
							  }






 ?>







</body>
</html>
