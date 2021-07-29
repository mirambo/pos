<?php
#include connection
require_once('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$rfq_code=mysql_real_escape_string($_POST['rfq_code']);
$supp_id=mysql_real_escape_string($_POST['supplier_id']);
$prod=mysql_real_escape_string($_POST['prod']);
$prod_code=mysql_real_escape_string($_POST['prod_code']);
$qnty=mysql_real_escape_string($_POST['qnty']);

$queryprod="select * from products where product_id='$prod'";
$resultsprod=mysql_query($queryprod) or die ("Error: $queryprod.".mysql_error());
$rowsprod=mysql_fetch_object($resultsprod);

$prod_code=$rowsprod->prod_code;




$queryprof="select * from temp_rfq where product_id='$prod' and quantity='$qnty'";
$resultsprof=mysql_query($queryprof) or die ("Error: $queryprof.".mysql_error());
								  
$rowsprof=mysql_fetch_object($resultsprof);

$numrowscomp=mysql_num_rows($resultsprof);
 

if ($numrowscomp>0)

{

 header ("Location:generate_rfq.php? recordexist=1&supplier_id=$supp_id&rfq_code=$rfq_code");

}

else 

{

$sql= "insert into temp_rfq values('','$supp_id','$user_id','$prod','$prod_code','$rfq_code','$qnty',NOW(),'1')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$query3="select * from temp_rfq order by temp_rfq_id desc limit 1";
$results3=mysql_query($query3) or die ("Error: $query3.".mysql_error());
$rows3=mysql_fetch_object($results3);

$lat_temp_rfq_id=$rows3->temp_rfq_id;

$sql= "insert into rfq values('','$lat_temp_rfq_id','$supp_id','$user_id','$prod','$prod_code','$rfq_code','$qnty',NOW(),'1')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());



$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'Requested for a quotation')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());


header ("Location:generate_rfq.php?supplier_id=$supp_id&rfq_code=$rfq_code");

}

mysql_close($cnn);


?>


