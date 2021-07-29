<?php
include('Connections/fundmaster.php');
require_once('includes/session.php'); 
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$id=$_GET['temp_quote_id'];
$quote_code=$_GET['quote_code'];
$client_id=$_GET['client_id'];
$currency=$_GET['currency'];
$vat=mysql_real_escape_string($_POST['vat']);
$prod_code=mysql_real_escape_string($_POST['prod_code']);
$prod_id=mysql_real_escape_string($_POST['prod_id']);
$qnty=mysql_real_escape_string($_POST['qnty']);
$discount=mysql_real_escape_string($_POST['discount']);
$selling_price=mysql_real_escape_string($_POST['selling_price']);

//echo $prod_id;


/*$queryprod="select * from products where product_id='$prod_id'";
$resultsprod=mysql_query($queryprod) or die ("Error: $queryprod.".mysql_error());
$rowsprod=mysql_fetch_object($resultsprod);

$selling_price=$rowsprod->curr_sp;
//$prod_code=$rowsprod->prod_code;
*/

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

$sql= "update temp_quote set quantity='$qnty',vat_value='$vat_value',discount_perc='$discount',discount_value='$disc_value',selling_price='$selling_price' where temp_quote_id='$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sql1= "update quote set quantity='$qnty',vat_value='$vat_value',discount_perc='$discount',discount_value='$disc_value',selling_price='$selling_price' where temp_quote_id='$id'";
$results1= mysql_query($sql1) or die ("Error $sql1.".mysql_error());

/*$sqlpd="UPDATE products set curr_sp='$selling_price' where product_id='$prod_id'";
$resultspd= mysql_query($sqlpd) or die ("Error $sqlpd.".mysql_error());*/



$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'Updates Quotation Transactions')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());



header ("Location:generate_quote.php?client_id=$client_id&quote_code=$quote_code&currency=$currency");






//$results=mysql_query($sql) or die ("Error: $sql.".mysql_error());
//echo $results;
//$count=mysql_num_rows($results);
//echo $count;
/*if (==1)
{
session_start();
$_SESSION['admin']= $adminusern;
/*
session_register("myusername");
session_register("mypassword");*/
/*header("Location:membersarea.php");
}
else
{*/
//header ("Location:adduser.php? createuserconfirm=1");
//echo "<p align='center'><font color='#FF0000' size='-1'>Wrong Username and Password.</font></p>";


mysql_close($cnn);


?>


