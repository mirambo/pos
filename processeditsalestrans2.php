<?php
include('Connections/fundmaster.php');
require_once('includes/session.php'); 
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$id=$_GET['temp_sales_id'];
$get_sales_code=$_GET['sales_code'];
$client_id=$_GET['client_id'];
$currency=$_GET['currency'];
$vat=mysql_real_escape_string($_POST['vat']);
$prod_code=mysql_real_escape_string($_POST['prod_code']);
$prod_id=mysql_real_escape_string($_POST['prod_id']);
$qnty=mysql_real_escape_string($_POST['qnty']);
$discount=mysql_real_escape_string($_POST['discount']);


$inv_bal=$_GET['inv_bal'];


$get_invoice_no=$_GET['invoice_no'];
$date_generated=$_GET['date_generated'];
$user=$_GET['user'];
$sales_rep=$_GET['sales_rep'];

$year=date('Y');
$sqlcurr="select * from currency where curr_id='$currency'";
$resultscurr= mysql_query($sqlcurr) or die ("Error $sqlcurr.".mysql_error());
$rowcurr=mysql_fetch_object($resultscurr);
$curr_name=$rowcurr->curr_name;





$queryprod="select * from products where product_id='$prod_id'";
$resultsprod=mysql_query($queryprod) or die ("Error: $queryprod.".mysql_error());
$rowsprod=mysql_fetch_object($resultsprod);

$selling_price=$rowsprod->curr_sp;
//$prod_code=$rowsprod->prod_code;


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


$grndttl=$prod_ttl-$vat_value-$disc_value;



$transaction_descinv='Inv No:'.$get_invoice_no;
$transaction_descrec='Cash Receipt No:'.$get_invoice_no;


$sql1= "update sales set quantity='$qnty',vat_value='$vat_value',discount_perc='$discount',discount_value='$disc_value' where temp_sales_id='$id'";
$results1= mysql_query($sql1) or die ("Error $sql1.".mysql_error());


$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'Updated his/her own profile')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());

/*$sqltrans= "insert into client_transactions values('','$sess_client_id','$sales_code','$transaction_descinv','$grndttl',NOW())";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());*/

$sqltrans= "UPDATE client_transactions SET amount='$grndttl' WHERE sales_code='$get_sales_code' and transaction='$transaction_descinv'";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());

/*$sqlgenled= "insert into general_ledger values('','Sales ( Against Inv No:$get_invoice_no)','$grndttl','','$grndttl','$currency','$curr_rate',NOW(),'')";
$resultsgenled=mysql_query($sqlgenled) or die ("Error $sqlgenled.".mysql_error());*/

$sqltrans= "UPDATE general_ledger SET amount='-$grndttl',credit='$grndttl' WHERE  transactions='Sales ( Against Inv No:$get_invoice_no)'";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());

/*$sqlgenled= "insert into general_ledger values('','Accounts Receivables (Inv No:$get_invoice_no)','$grndttl','$grndttl','','$currency','$curr_rate',NOW(),'')";
$resultsgenled=mysql_query($sqlgenled) or die ("Error $sqlgenled.".mysql_error());*/

$sqltrans= "UPDATE general_ledger SET amount='$grndttl',debit='$grndttl' WHERE  transactions='Accounts Receivables (Inv No:$get_invoice_no)'";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());

/*$sqlaccpay= "insert into accounts_receivables_ledger values('','$transaction_descinv','$grndttl','$grndttl','','$currency','$curr_rate',NOW(),'')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());*/

$sqltrans= "UPDATE accounts_receivables_ledger SET amount='$grndttl',debit='$grndttl' WHERE  transactions='$transaction_descinv'";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());

/*$sqlaccpay= "insert into sales_ledger values('','$transaction_descinv','$grndttl','','$grndttl','$currency','$curr_rate',NOW())";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());*/

$sqltrans= "UPDATE sales_ledger SET amount='$grndttl',credit='$grndttl' WHERE  transactions='$transaction_descinv'";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());

$sqltrans= "UPDATE invoices SET invoice_ttl='$grndttl' WHERE  sales_code='$get_sales_code'";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());



header ("Location:view_inv_trans.php?sales_code=$get_sales_code&invoice_no=$get_invoice_no&client_id=$client_id&sales_rep=$sales_rep&currency=$currency&inv_bal=$inv_bal&date_generated=$date_generated&user=$user");





mysql_close($cnn);


?>


