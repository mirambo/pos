<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<?php
 include('Connections/fundmaster.php'); 
$sql="select *  FROM issued_items,items,requisition_item where 
requisition_item.requisition_item_id=issued_items.requisition_item_id
AND issued_items.item_id=items.item_id";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


if (mysql_num_rows($results) > 0)
						  {
							  
							  while ($rows=mysql_fetch_object($results))
							  { 
							  
							  echo $prod=$rows->item_id;
							  
							  echo '-';
							  
							 echo $requisition_id=$rows->requisition_id;
							 echo '-';
							 echo $issued_item_id=$rows->issued_item_id;
							 $date_issued=$rows->date_issued;
							  
$sqlprof="SELECT * from items where item_id='$prod'";
$resultsprof= mysql_query($sqlprof) or die ("Error $sqlpo.".mysql_error());
$rowsprof=mysql_fetch_object($resultsprof);
 $product_name=$rowsprof->item_name;
$pack_size=$rowsprof->pack_size;


$sqlprof2= "SELECT * from requisition where requisition_id='$requisition_id'";
$resultsprof2= mysql_query($sqlprof2) or die ("Error $sqlpo2.".mysql_error());
$rowsprof2=mysql_fetch_object($resultsprof2);
echo $lpo_no=$rowsprof2->requisition_no;
echo $ref_no=$rowsprof2->ref_no;


$value_at_hand=$rows->quantity_issued;

$memo='Issued '.$value_at_hand.' '.$product_name.' through <a href="create_requisition.php?order_code='.$requisition_id.'"> requisition no : '.$lpo_no.' ref no '.$ref_no.' </a> from the store';
$latest_id=$prod;

$date_dep=$date_issued;

$orderdate = explode('-', $date_dep);
$year  = $orderdate[0];
$month = $orderdate[1];
$day   = $orderdate[2];
$transaction_code="issuitem".$issued_item_id;

/* $sqltrans= "insert into item_transactions values('','$prod','Received $qnty_rec $product_name ($pack_size) of LPO No: $lpo_no into the warehouse','$qnty_rec','$received_date','recp$latest_received_stock_id','')";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());
							  
	 */			


$sqlaccpay= "insert into item_transactions values('','$latest_id','$memo','-$value_at_hand','$date_dep','$day','$month','$year','$transaction_code',
'$user_id','$shop_id','','')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());
	 
							  
							  
							   //echo $quant_rec=$rows->quantity_rec.'</br>';
							  
							  
	echo '</br>';						  
							  }
							  
							  
							  }






 ?>







</body>
</html>
