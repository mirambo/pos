<?php
require_once('includes/session.php'); 
include('Connections/fundmaster.php');

#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$id=$_GET['temp_sales_id'];
$sales_code=$_GET['sales_code'];
$client_id=$_GET['client_id'];
$currency=$_GET['currency'];
$vat=mysql_real_escape_string($_POST['vat']);
$prod_code=mysql_real_escape_string($_POST['prod_code']);
$prod=$_GET['product_id'];
$prod_idx=mysql_real_escape_string($_POST['prod_id']);
$qnty=mysql_real_escape_string($_POST['qnty']);
$discount=mysql_real_escape_string($_POST['discount']);
$selling_price=mysql_real_escape_string($_POST['selling_price']);


$sqlprodrec="select SUM(received_stock.quantity_rec) as ttl_quant_rec, received_stock.purchase_order_id from received_stock where received_stock.product_id='$prod' group by received_stock.product_id";
$resultsprodrec= mysql_query($sqlprodrec) or die ("Error: $sqlprodrec.".mysql_error());
$rowsprodrec=mysql_fetch_object($resultsprodrec);

echo $prod_rec=$rowsprodrec->ttl_quant_rec;
$purchase_order_id=$rowsprodrec->purchase_order_id;


$sqlprodsold="select SUM(sales.quantity) as ttl_sold_prod from sales where sales.product_id='$prod' AND sales.status='1' group by sales.product_id";
$resultsprodsold= mysql_query($sqlprodsold) or die ("Error $sqlprodsold.".mysql_error());
$rowprodsold=mysql_fetch_object($resultsprodsold);
$prod_sold=$rowprodsold->ttl_sold_prod;

$sqlprodsoldtemp="select SUM(temp_sales.quantity) as ttl_sold_prodtemp from temp_sales where temp_sales.product_id='$prod' AND temp_sales.status='1' group by temp_sales.product_id";
$resultsprodsoldtemp= mysql_query($sqlprodsoldtemp) or die ("Error $sqlprodsoldtemp.".mysql_error());
$rowprodsoldtemp=mysql_fetch_object($resultsprodsoldtemp);

$prod_soldtemp=$rowprodsoldtemp->ttl_sold_prodtemp;

$sqlprodcashsold="select SUM(cash_sales.quantity) as ttl_cash_sold_prod from cash_sales where cash_sales.product_id='$prod' AND cash_sales.status='1' group by cash_sales.product_id";
$resultsprodcashsold= mysql_query($sqlprodcashsold) or die ("Error $sqlprodcashsold.".mysql_error());
$rowprodcashsold=mysql_fetch_object($resultsprodcashsold);
$numrowscash=mysql_num_rows($resultsprodcashsold);

if ($numrowscash=='')
{

 $ttl_sold_prod=$prod_sold-$prod_soldtemp;

//echo $prod_cash_sold=$rowprodcashsold->ttl_cash_sold_prod;
}
else
{
$prod_cash_sold=$rowprodcashsold->ttl_cash_sold_prod;
$ttl_sold_prod=$prod_cash_sold+$prod_sold-$prod_soldtemp;
}


$avl_prod=$prod_rec-$ttl_sold_prod;

if ($qnty>$avl_prod)
{

header ("Location:generate_invoice.php? overproduct=1&client_id=$client_id&sales_code=$sales_code&currency=$currency&product_id=$prod&avl_quant=$avl_prod");

}

else
{

$queryprod="select * from products where product_id='$prod'";
$resultsprod=mysql_query($queryprod) or die ("Error: $queryprod.".mysql_error());
$rowsprod=mysql_fetch_object($resultsprod);

$selling_pricex=$rowsprod->curr_sp;
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



//$vat_value=0.16*$prod_ttl;

$disc_value=$discount/100*$prod_ttl;

$sql= "update temp_sales set quantity='$qnty',vat_value='$vat_value',discount_perc='$discount',discount_value='$disc_value',selling_price='$selling_price' where temp_sales_id='$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sql1= "update sales set quantity='$qnty',vat_value='$vat_value',discount_perc='$discount',discount_value='$disc_value',selling_price='$selling_price' where temp_sales_id='$id'";
$results1= mysql_query($sql1) or die ("Error $sql1.".mysql_error());

//$sqlpd="UPDATE products set curr_sp='$selling_price' where product_id='$prod_id'";
//$resultspd= mysql_query($sqlpd) or die ("Error $sqlpd.".mysql_error());



$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'Updates Sales Transactions')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());



header ("Location:generate_invoice.php?client_id=$client_id&sales_code=$sales_code&currency=$currency");

mysql_close($cnn);
}


?>


