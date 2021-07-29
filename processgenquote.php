<?php
#include connection
require_once('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$quote_code=mysql_real_escape_string($_POST['quote_code']);
$client_id=mysql_real_escape_string($_POST['client_id']);
$prod=mysql_real_escape_string($_POST['prod']);
$qnty=mysql_real_escape_string($_POST['qnty']);
$currency=mysql_real_escape_string($_POST['currency1']);
$curr_rate=mysql_real_escape_string($_POST['curr_rate']);
$vat=mysql_real_escape_string($_POST['vat']);
$discount=mysql_real_escape_string($_POST['discount']); 
$payment_terms=mysql_real_escape_string($_POST['payment_terms']); 
$delivery_terms=mysql_real_escape_string($_POST['delivery_terms']); 

//product code

$queryprod="select * from products where product_id='$prod'";
$resultsprod=mysql_query($queryprod) or die ("Error: $queryprod.".mysql_error());
$rowsprod=mysql_fetch_object($resultsprod);

$selling_price=$rowsprod->curr_sp;
$prod_code=$rowsprod->prod_code;


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





$queryprof="select * from temp_quote where product_id='$prod' and quantity='$qnty'";
$resultsprof=mysql_query($queryprof) or die ("Error: $queryprof.".mysql_error());
								  
$rowsprof=mysql_fetch_object($resultsprof);

$numrowscomp=mysql_num_rows($resultsprof);
 
 //$f_namecomp=$rowsprof->f_name;
 //$l_namecomp=$rowsprof->l_name;
 
 //$usernamecomp=$rowsprof->username;



if ($numrowscomp>0)

{
header ("Location:generate_quote.php? recordexist=1&client_id=$client_id&quote_code=$quote_code&currency=$currency");
}
else 
{
$sql= "insert into temp_quote values('','$client_id','$user_id','$sales_rep','$currency','$curr_rate','$payment_terms','$delivery_terms',
'$prod','$prod_code','$quote_code','$qnty','$selling_price','$vat_value','$discount','$disc_value',NOW(),'1')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

//get latest temp sales id
$query3="select * from temp_quote order by temp_quote_id desc limit 1";
$results3=mysql_query($query3) or die ("Error: $query3.".mysql_error());
$rows3=mysql_fetch_object($results3);

$lat_temp_quote_id=$rows3->temp_quote_id;



$sql= "insert into quote values('','$lat_temp_quote_id','$client_id','$user_id','$sales_rep','$currency','$curr_rate','$payment_terms',
'$delivery_terms','$prod','$prod_code','$quote_code','$qnty','$selling_price','$vat_value','$discount','$disc_value', NOW(),'1')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());



$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'Generated Quotation')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());


header ("Location:generate_quote.php?client_id=$client_id&quote_code=$quote_code&currency=$currency");

}


mysql_close($cnn);


?>


