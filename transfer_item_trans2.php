<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<?php
 include('Connections/fundmaster.php'); 
$sql="select *  FROM released_item ORDER BY date_released desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


if (mysql_num_rows($results) > 0)
						  {
							  
							  while ($rows=mysql_fetch_object($results))
							  { 
							  
							  echo $prod=$rows->item_id.'</br>';
							 $requisition_id=$rows->requisition_id ;
							 $latest_received_stock_id=$rows->released_item_id;
							 $received_date=$rows->date_released;
							  
							  $sqlprof= "SELECT * from items where item_id='$prod'";
$resultsprof= mysql_query($sqlprof) or die ("Error $sqlpo.".mysql_error());
$rowsprof=mysql_fetch_object($resultsprof);
 echo $product_name=$rowsprof->item_name;
$pack_size=$rowsprof->pack_size;






$qnty_rec=$rows->released_quantity;



$sqltrans= "insert into item_transactions values('','$prod','Released $qnty_rec $product_name ($pack_size) of Requisition No: $requisition_id from the warehouse','-$qnty_rec','$received_date','rels$latest_received_stock_id','')";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());
							  
							  
							  
							  
							   //echo $quant_rec=$rows->quantity_rec.'</br>';
							  
							  
							  
							  }
							  
							  
							  }






 ?>







</body>
</html>
