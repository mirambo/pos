<?php 
include('Connections/fundmaster.php');


$sqlts="SELECT * FROM received_stock order by received_stock_id asc";
$resultsts= mysql_query($sqlts) or die ("Error $sqlts.".mysql_error());
if (mysql_num_rows($resultsts) > 0)
						  {
						  while ($rowsts=mysql_fetch_object($resultsts))
						  {
						  echo $received_stock_id=$rowsts->received_stock_id;
						  echo $prod=$rowsts->item_id;
						  echo $qnty_rec=$rowsts->quant_rec;
						  echo $date_rec=$rowsts->date_received;
						  					  
						  echo $item_name=$rowsts->item_name;
						  
$sql= "INSERT INTO received_stock_real VALUES('$received_stock_id','$order_code_id', '$prod','$qnty_rec','6','1','$date_rec',
'$expiry_date','1','$date_rec')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


						  
						  
						  
						  
						  
						  
						  }
						  
						  }










?>