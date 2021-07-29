<?php 
include('Connections/fundmaster.php');


$sqlts="SELECT * FROM items order by item_id asc";
$resultsts= mysql_query($sqlts) or die ("Error $sqlts.".mysql_error());
if (mysql_num_rows($resultsts) > 0)
						  {
						  while ($rowsts=mysql_fetch_object($resultsts))
						  {
						  echo $item_id=$rowsts->item_id;
						  echo $cat_id=$rowsts->cat_id;
						  echo $item_code=$rowsts->item_code;
						  echo $reorder_level=$rowsts->reorder_level;
						  echo $item_value=$rowsts->curr_bp;
						  echo $item_sp=$rowsts->curr_sp;						  
						  echo $item_name=$rowsts->item_name;
						  
$sql= "insert into products values ('$item_id','$cat_id','$item_name','$item_code','Pieces','$weight','$reorder_level','$item_sp','$item_value','6','1','')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
						  
						  
						  
						  
						  
						  
						  }
						  
						  }










?>