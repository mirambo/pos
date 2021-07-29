<?php
#include connection
include('Connections/fundmaster.php');



$sqlsp="select * FROM farmers_grn";
$resultssp= mysql_query($sqlsp) or die ("Error $sqlsp.".mysql_error());
while ($rowsp=mysql_fetch_object($resultssp))
{
	

$farmer_name=mysql_real_escape_string($rowsp->farmer_name);	
$farmer_id=mysql_real_escape_string($rowsp->farmer_id);	
$grn_date=mysql_real_escape_string($rowsp->grn_date);	
$grn_no=mysql_real_escape_string($rowsp->grn_no);	
$item_name=mysql_real_escape_string($rowsp->item_name);	
$item_id=mysql_real_escape_string($rowsp->item_id);	
$price=mysql_real_escape_string($rowsp->price);	
$harvest=mysql_real_escape_string($rowsp->harvest);	
$price_total=mysql_real_escape_string($rowsp->price_total);	


$transaction='Received items '.$item_name.' for , GRN No: '.$grn_no.' from supplier Flowerseeds outgrowers (Farmer '.$farmer_name.')';

$sqltransc="INSERT INTO supplier_transactions SET 
supplier_id='39',
farmer_id='$farmer_id',
transaction='$transaction',
order_code='$order_code_id',
amount='$price_total',
currency='7',
curr_rate='1',
transaction_date='$grn_date'";
$resultstransc=mysql_query($sqltransc) or die ("Error $sqltransc.".mysql_error());




	
}







mysql_close($cnn);


?>


