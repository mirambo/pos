<?php
#include connection
include('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$prod=mysql_real_escape_string($_POST['prod']);
$quantity=mysql_real_escape_string($_POST['quantity']);
$expiry_date=mysql_real_escape_string($_POST['expiry_date']);

$sqlfa="SELECT * FROM products where product_id='$prod'";
$resultsfa=mysql_query($sqlfa) or die ("Error: $sqlfa.".mysql_error());
$rowsfa=mysql_fetch_object($resultsfa);
$curr_bp=$rowsfa->curr_bp;
$curr_rate=$rowsfa->exchange_rate;
$currency_code=$rowsfa->currency_code;
$product_name=$rowsfa->product_name;

$bp_kshs=$curr_bp*$curr_rate;

$queryprof="select * from  received_stock where product_id='$prod' AND quantity_rec='$quantity' and expiry_date='$expiry_date'";
$resultsprof=mysql_query($queryprof) or die ("Error: $queryprof.".mysql_error());
$rowsprof=mysql_fetch_object($resultsprof);

$numrowscomp=mysql_num_rows($resultsprof);
 
 //$f_namecomp=$rowsprof->f_name;
 //$l_namecomp=$rowsprof->l_name;
 //$emailcomp=$rowsprof->email;
 //$usernamecomp=$rowsprof->username;


//echo $u_pwrd;

//echo $u_cpwrd;

//echo $cus_fname;

//$realdob= dateconvert($dob, 1);
//$realdob = date('Y-m-d', strtotime($dob));
if ($numrowscomp>0)

{

header ("Location:add_inventory_opening_balance.php? recordexist=1");

}

else 

{



$sql= "INSERT INTO received_stock VALUES('','', '$prod','$quantity','$currency_code','$curr_rate','$delivery_date',
'$expiry_date','1',NOW())";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


$queryrec_no="select * from received_stock order by received_stock_id desc limit 1";
$resultsrec_no=mysql_query($queryrec_no) or die ("Error: $queryrec_no.".mysql_error());

$numrowsrec_no=mysql_fetch_object($resultsrec_no);

$latest_id=$numrowsrec_no->received_stock_id;


$amount=$quantity*$bp_kshs;

$sqlaccpay= "insert into inventory_ledger values('','Recorded $quantity $product_name as opening balance','$amount','$amount','','6','1',NOW(),'sopb$latest_id')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());

$sqlaccpay= "insert into opening_stock_ledger values('','Recorded $quantity $product_name as opening balance','$amount','$amount','','6','1',NOW(),'sopb$latest_id')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());




header ("Location:add_inventory_opening_balance.php? addconfirm=1");

}




mysql_close($cnn);


?>


