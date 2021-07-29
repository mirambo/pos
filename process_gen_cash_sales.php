<?php
#include connection
require_once('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$sales_code=mysql_real_escape_string($_POST['sales_code']);
$client_id=mysql_real_escape_string($_POST['client_id']);
$sales_rep=mysql_real_escape_string($_POST['sales_rep']);
//$ship_agency=mysql_real_escape_string($_POST['ship_agency']);
 
//$currency=mysql_real_escape_string($_POST['currency']);
$prod=mysql_real_escape_string($_POST['prod']);
//$prod_code=mysql_real_escape_string($_POST['prod_code']);
$qnty=mysql_real_escape_string($_POST['qnty']);
$currency=mysql_real_escape_string($_POST['currency1']);
$curr_rate=mysql_real_escape_string($_POST['curr_rate']);
$vat=mysql_real_escape_string($_POST['vat']);
$discount=mysql_real_escape_string($_POST['discount']); 

//check availlability of the product
//Selection from received products list
$sqlprodrec="select SUM(received_stock.quantity_rec) as ttl_quant_rec,received_stock.purchase_order_id from received_stock where received_stock.product_id='$prod' group by received_stock.product_id";
$resultsprodrec= mysql_query($sqlprodrec) or die ("Error: $sqlprodrec.".mysql_error());
$rowsprodrec=mysql_fetch_object($resultsprodrec);

$prod_rec=$rowsprodrec->ttl_quant_rec;
$purchase_order_id=$rowsprodrec->purchase_order_id;

//Selection from the sold product list
$sqlprodsold="select SUM(sales.quantity) as ttl_sold_prod from sales where sales.product_id='$prod' group by sales.product_id";
$resultsprodsold= mysql_query($sqlprodsold) or die ("Error $sqlprodsold.".mysql_error());
$rowprodsold=mysql_fetch_object($resultsprodsold);

$prod_sold=$rowprodsold->ttl_sold_prod;

//Products sold through cash sales
$sqlprodcashsold="select SUM(cash_sales.quantity) as ttl_cash_sold_prod from cash_sales where cash_sales.product_id='$prod' group by cash_sales.product_id";
$resultsprodcashsold= mysql_query($sqlprodcashsold) or die ("Error $sqlprodcashsold.".mysql_error());
$rowprodcashsold=mysql_fetch_object($resultsprodcashsold);

$prod_cash_sold=$rowprodcashsold->ttl_cash_sold_prod;



$ttl_sold_prod=$prod_cash_sold+$prod_sold;





$avl_prod=$prod_rec-$ttl_sold_prod;





if ($qnty>$avl_prod)
{

header ("Location:generate_cash_sales.php? overproduct=1&client_id=$client_id&sales_code=$sales_code&currency=$currency&product_id=$prod&avl_quant=$avl_prod");

}
else

{
$queryprod="select * from products where product_id='$prod'";
$resultsprod=mysql_query($queryprod) or die ("Error: $queryprod.".mysql_error());
$rowsprod=mysql_fetch_object($resultsprod);

$selling_price=$rowsprod->curr_sp;
$prod_code=$rowsprod->prod_code;
$product_name=$rowsprod->product_name;
$buy_price=$rowsprod->curr_bp;
$currency=$rowsprod->currency_code;
$curr_rate=$rowsprod->exchange_rate;


$prod_ttl=$qnty*$selling_price;

if ($vat=='1')
{

$vat_value=0.16*$prod_ttl;

}

else 
{
$vat_value='0';
}


$disc_value=$discount/100*$prod_ttl;




// checking for redudancy
$queryprof="select * from temp_cash_sales where product_id='$prod' and quantity='$qnty'";
$resultsprof=mysql_query($queryprof) or die ("Error: $queryprof.".mysql_error());
								  
$rowsprof=mysql_fetch_object($resultsprof);

$numrowscomp=mysql_num_rows($resultsprof);
 
 //$f_namecomp=$rowsprof->f_name;
 //$l_namecomp=$rowsprof->l_name;
 
 //$usernamecomp=$rowsprof->username;



if ($numrowscomp>0)

{

 header ("Location:generate_cash_sales.php? recordexist=1&client_id=$client_id&sales_code=$sales_code&currency=$currency");

}

else 

{

$sql= "insert into temp_cash_sales values('','$client_id','$user_id','$sales_rep','$currency','$curr_rate','$prod','$prod_code','$sales_code','$qnty','$selling_price','$vat_value','$discount','$disc_value', NOW(),'1')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


$query3="select * from temp_cash_sales order by temp_cash_sales_id desc limit 1";
$results3=mysql_query($query3) or die ("Error: $query3.".mysql_error());
$rows3=mysql_fetch_object($results3);

$lat_temp_sales_id=$rows3->temp_cash_sales_id;


$sql= "insert into cash_sales values('','$lat_temp_sales_id','$client_id','$user_id','$sales_rep','$currency','$curr_rate','$purchase_order_id','$prod','$prod_code','$sales_code','$qnty','$selling_price','$vat_value','$discount','$disc_value', NOW(),'1')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$amount=$qnty*$buy_price;

$sqlaccpay= "insert into inventory_ledger values('','Sold $qnty $product_name on cash','-$amount','','$amount','$currency','$curr_rate',NOW(),'$sales_code')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());



$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'Cash Sales')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());


header ("Location:generate_cash_sales.php?client_id=$client_id&sales_code=$sales_code&currency=$currency");

}

}

mysql_close($cnn);


?>


