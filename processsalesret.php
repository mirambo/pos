<?php
#include connection
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form

//Check redudancy
$qnty_ret=mysql_real_escape_string($_POST['qnty_ret']);
$sales_return_code_id=mysql_real_escape_string($_POST['sales_return_code_id']);
$product_id=mysql_real_escape_string($_POST['prod']);
//$invoice_id=mysql_real_escape_string($_POST['invoice_id']);
//$client_id=mysql_real_escape_string($_POST['client_id']);
$sales_code_id=mysql_real_escape_string($_POST['sales_code_id']);
//$sales_rep=mysql_real_escape_string($_POST['sales_rep']);
$reason=mysql_real_escape_string($_POST['reason']);
//$amount_paid=$_GET['amount_paid'];
//$orig_quant=$_GET['orig_quant'];

//prevent redudancy




$sqlprod="SELECT * FROM products where product_id='$product_id'";
$resultsprod= mysql_query($sqlprod) or die ("Error $sqlprod.".mysql_error());
$rowsprod=mysql_fetch_object($resultsprod);

$selling_price=$rowsprod->curr_sp;
$prod_code=$rowsprod->prod_code;
$product_name=$rowsprod->product_name;
$buy_price=$rowsprod->curr_bp;
$currency=$rowsprod->currency_code;
$curr_rate=$rowsprod->exchange_rate;

//select client
$sqlcl="select sales_code.invoice_no,sales_code.sale_date,sales_code.sales_rep_id,sales_code.terms,sales_code.currency,sales_code.curr_rate,
sales_code.user_id,sales_code.sales_code_id,employees.emp_firstname,employees.emp_lastname,employees.emp_middle_name,
sales_code.client_id,clients.c_name,currency.curr_name FROM currency,clients,sales_code,employees WHERE 
currency.curr_id=sales_code.currency and sales_code.sales_rep_id=employees.emp_id and sales_code.client_id=clients.client_id AND 
sales_code.sales_code_id='$sales_code_id'";
$resultscl= mysql_query($sqlcl) or die ("Error $sqlcl.".mysql_error());
$rowscl=mysql_fetch_object($resultscl);
$client_name=$rowscl->c_name;


//check grater then
$sql1="select sales.sales_id,sales.prod_desc,sales.quantity,sales.quantity,sales.selling_price,sales.discount,sales.discount_value,sales.product_id,sales.vat_value,sales.vat,
sales.lease,sales.foc,sales.vat_value,products.product_name,products.prod_code,products.pack_size from sales_code,sales, 
products where sales.product_id=products.product_id AND sales.sales_code_id=sales_code.sales_code_id AND sales.sales_code_id='$sales_code_id' AND sales.product_id='$product_id'";
$results1= mysql_query($sql1) or die ("Error $sql1.".mysql_error());
$rows1=mysql_fetch_object($results1);

$quant_invoiced=$rows1->quantity;
//$purchase_order_id=$rows1->purchase_order_id;


// check redudnancy in returns
$sqlred="SELECT * from sales_returns where product_id='$product_id' AND sales_return_code_id='$sales_return_code_id'";
$resultsred= mysql_query($sqlred) or die ("Error $sqlred.".mysql_error());

$rowsred=mysql_num_rows($resultsred);
if ($rowsred>0)
{
header ("Location:sales_return.php?exist=1&sales_code_id=$sales_code_id&sales_return_code_id=$sales_return_code_id&print=1");
}

elseif ($qnty_ret>$quant_invoiced)
{

header ("Location:sales_return.php?abnormal=1&sales_code_id=$sales_code_id&sales_return_code_id=$sales_return_code_id");

}

else
{
$sql3="INSERT INTO sales_returns VALUES('','$product_id','$selling_price', '$sales_return_code_id','$sales_code_id','$qnty_ret','$reason',NOW())";
$results3= mysql_query($sql3) or die ("Error $sql3.".mysql_error());


$amount=$qnty_ret*$buy_price;

$sqlaccpay="insert into inventory_ledger values('','$client_name Returned $qnty_ret $product_name','$amount','$amount','','$currency','$curr_rate',NOW(),'$sales_code')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());




header ("Location:sales_return.php?success=1&sales_code_id=$sales_code_id&sales_return_code_id=$sales_return_code_id&print=1");

//header ("Location:pre_credit_note.php?sales_return_code=$lat_code");

}

mysql_close($cnn);


?>


