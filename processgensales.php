<?php
#include connection
require_once('includes/session.php');
include('Connections/fundmaster.php');
$sales_code_id=$_SESSION['sales_code_id'];
$prod=mysql_real_escape_string($_POST['prod']);
$prod_desc=mysql_real_escape_string($_POST['prod_desc']);
$qnty=mysql_real_escape_string($_POST['qnty']);
//$unit_price=mysql_real_escape_string($_POST['unit_price']);
$discount=mysql_real_escape_string($_POST['discount']);
$vat=mysql_real_escape_string($_POST['vat']);
$foc=mysql_real_escape_string($_POST['foc']);
$lease=mysql_real_escape_string($_POST['lease']);


$sqllpdet="select sales_code.invoice_no,sales_code.sale_date,sales_code.sale_type,sales_code.terms,sales_code.currency,sales_code.curr_rate,
sales_code.user_id,sales_code.sales_code_id,sales_code.client_id,clients.c_name,currency.curr_name FROM currency,clients,sales_code WHERE 
currency.curr_id=sales_code.currency and sales_code.client_id=clients.client_id AND sales_code.sales_code_id='$sales_code_id'";
$resultslpdet= mysql_query($sqllpdet) or die ("Error $sqllpdet.".mysql_error());
$rowsrec=mysql_fetch_object($resultslpdet);

$c_name=$rowsrec->c_name;
 $sales_type=$rowsrec->sale_type;


//check availlability of the product
//Selection from received products list
$sqlprodrec="select SUM(received_stock.quantity_rec) as ttl_quant_rec from received_stock where received_stock.product_id='$prod' group by received_stock.product_id";
$resultsprodrec= mysql_query($sqlprodrec) or die ("Error: $sqlprodrec.".mysql_error());
$rowsprodrec=mysql_fetch_object($resultsprodrec);

$prod_rec=$rowsprodrec->ttl_quant_rec;


//Selection from the sold product list
$sqlprodsold="select SUM(sales.quantity) as ttl_sold_prod from sales where sales.product_id='$prod' AND sales.status='0' group by sales.product_id";
$resultsprodsold= mysql_query($sqlprodsold) or die ("Error $sqlprodsold.".mysql_error());
$rowprodsold=mysql_fetch_object($resultsprodsold);

$prod_sold=$rowprodsold->ttl_sold_prod;


$ttl_sold_prod=$prod_sold;





$avl_prod=$prod_rec-$ttl_sold_prod;


if ($qnty>$avl_prod && $sales_type=='i')
{

header ("Location:generate_invoice.php? overproduct=1&product_id=$prod&avl_quant=$avl_prod");

}
elseif ($qnty>$avl_prod && $sales_type=='c')
{

header ("Location:generate_cash_sales.php? overproduct=1&product_id=$prod&avl_quant=$avl_prod");

}
else //do computing and posting
{
//check redudancy
$queryttt="select * from sales where product_id='$prod' and sales_code_id='$sales_code_id'";
$resultsttt=mysql_query($queryttt) or die ("Error: $queryttt.".mysql_error());
$num_rowstt=mysql_num_rows($resultsttt);
if ($num_rowstt>0 && $sales_type=='i')
{
header ("Location:generate_invoice.php? recordexist=1");
}
elseif ($num_rowstt>0 && $sales_type=='c')
{
header ("Location:generate_cash_sales.php? recordexist=1");
}
else
{

//get product value to post in the inventory
$queryprod="select * from products where product_id='$prod'";
$resultsprod=mysql_query($queryprod) or die ("Error: $queryprod.".mysql_error());
$rowsprod=mysql_fetch_object($resultsprod);

//$selling_price=$rowsprod->curr_sp;
$prod_code=$rowsprod->prod_code;
$product_name=$rowsprod->product_name;
$pack_size=$rowsprod->pack_size;
$buy_price=$rowsprod->curr_bp;
$unit_price=$rowsprod->curr_sp;
$currency=$rowsprod->currency_code;
$curr_rate=$rowsprod->exchange_rate;
$buy_price_ksh=$buy_price*$curr_rate;

//for calculation of vat
$prod_ttl=$qnty*$unit_price;

if ($vat=='1')
{

$vat_value=0.16*$prod_ttl;

}

else 
{
$vat_value='0';
}

if ($discount=='')
{

$disc_value=0;
}
else
{

$disc_value=$discount*$prod_ttl/100;

}



//if foc and lease selected
if ($foc=='1' && $lease=='1')
{
$sql= "insert into sales values('','$prod','$prod_desc','$sales_code_id','$qnty','$lease','$foc','$vat',
'F.O.C & Lease','$vat_value','$discount','$disc_value',NOW(),'0')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}

//if foc only
elseif ($foc=='1' && $lease=='0')
{
$sql= "insert into sales values('','$prod','$prod_desc','$sales_code_id','$qnty','$lease','$foc','$vat',
'F.O.C','$vat_value','$discount','$disc_value',NOW(),'0')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}
//if lease only
elseif ($foc=='0' && $lease=='1')
{
$sql= "insert into sales values('','$prod','$prod_desc','$sales_code_id','$qnty','$lease','$foc','$vat',
'Lease','$vat_value','$discount','$disc_value',NOW(),'0')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
//none selected
else
{

$sql= "insert into sales values('','$prod','$prod_desc','$sales_code_id','$qnty','$lease','$foc','$vat',
'$unit_price','$vat_value','$discount','$disc_value',NOW(),'0')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


$queryt="select * from sales order by sales_id desc limit 1";
$resultst=mysql_query($queryt) or die ("Error: $queryt.".mysql_error());
$rowst=mysql_fetch_object($resultst);

$lat_sales_id=$rowst->sales_id;

$amount=$qnty*$buy_price_ksh;

$sqlaccpay= "insert into inventory_ledger values('','Sold $qnty $product_name on credit','-$amount',' ','$amount','6','1',NOW(),'sales$lat_sales_id')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());

$sqlaccpay= "insert into vat_ledger values('','Vat value for product $product_name ($pack_size) sold to $c_name','$vat_value','$vat_value','','6','1',NOW(),'vats$lat_sales_id')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());

$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'Created and invoice entry')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());

}

if ($sales_type=='c')
{
header ("Location:generate_cash_sales.php");
}
else
{
header ("Location:generate_invoice.php");

}

}
}

mysql_close($cnn);


?>


