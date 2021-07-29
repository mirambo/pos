<?php
#include connection
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$product_id=$_GET['product_id'];
$prod_cat=mysql_real_escape_string($_POST['prod_cat']);
$prod_name=mysql_real_escape_string($_POST['prod_name']);
$prod_code=mysql_real_escape_string($_POST['prod_code']);
$pack_size=mysql_real_escape_string($_POST['pack_size']);
$weight=mysql_real_escape_string($_POST['weight']);
$reorder_level=mysql_real_escape_string($_POST['reorder_level']);
$curr_sp=mysql_real_escape_string($_POST['curr_sp']);
$curr_bp=mysql_real_escape_string($_POST['curr_bp']);
$currency_code=mysql_real_escape_string($_POST['currency']);

$querycr="select curr_rate from currency where curr_id='$currency_code'";
$resultscr=mysql_query($querycr) or die ("Error: $querycr.".mysql_error());							  
$rowscr=mysql_fetch_object($resultscr);
$curr_rate=$rowscr->curr_rate;





$sql= "update products set cat_id='$prod_cat',product_name='$prod_name',prod_code='$prod_code',pack_size='$pack_size',weight='$weight',
reorder_level='$reorder_level',curr_sp='$curr_sp',curr_bp='$curr_bp',exchange_rate='$curr_rate',currency_code='$currency_code' where product_id='$product_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());



$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'edited product $prod_name')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());



header ("Location:edit_prod.php?updateconfirm=1&product_id=$product_id&curr_id=2");

								  


mysql_close($cnn);


?>


