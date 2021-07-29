<?php
#include connection
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$prod_id=mysql_real_escape_string($_POST['prod_id']);
$supp_id=mysql_real_escape_string($_POST['supp_id']);
$rec_quant=mysql_real_escape_string($_POST['rec_quant']);
$del_date=mysql_real_escape_string($_POST['del_date']);
$exp_date=mysql_real_escape_string($_POST['exp_date']);
$purchase_order_id=mysql_real_escape_string($_POST['purchase_order_id']);
$order_code=mysql_real_escape_string($_POST['order_code']);
$ordered_qnty=mysql_real_escape_string($_POST['ordered_qnty']);
$rec_already_qnty=mysql_real_escape_string($_POST['ttl_rec']);
$ttl_rec=mysql_real_escape_string($_POST['ttl_rec']);

$qnty_bal=$ordered_qnty-$rec_already_qnty;

//echo $qnty_bal;


$queryprof="select * from  received_stock where quantity_rec='$rec_quant' and delivery_date='$del_date' and expiry_date='$exp_date'";
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

header ("Location:receive_product.php? recordexist=1");

}

elseif ($rec_quant>$qnty_bal)
{

header ("Location:receive_product.php?&rec_quant=$rec_quant&purchase_order_id=$purchase_order_id&ttlrec=$ttl_rec&product_id=$prod_id&order_id=$purchase_order_id&abnormal=1");

}

else 

{

$sqlvp= "select * from  purchase_order where purchase_order_id='$purchase_order_id'";
$resultsvp= mysql_query($sqlvp) or die ("Error $sqlvp.".mysql_error());
$rowsvp=mysql_fetch_object($resultsvp);
$vend_prc=$rowsvp->vendor_prc;
$currency=$rowsvp->currency;
$curr_rate=$rowsvp->curr_rate;



$sql= "insert into received_stock values ('','$purchase_order_id','$prod_id','$supp_id','$rec_quant','$vend_prc','$currency','$curr_rate','$del_date','$exp_date','')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sqlupdatelpo= "UPDATE lpo SET status='0' where order_code='$order_code'";
$resultslpo= mysql_query($sqlupdatelpo) or die ("Error $sqllpo.".mysql_error());


$sqlupdatrecprod= "UPDATE purchase_order SET status='0' where order_code='$order_code' and product_id='$prod_id'";
$resultsrecprod= mysql_query($sqlupdatrecprod) or die ("Error $sqlupdatrecprod.".mysql_error());






header ("Location:receive_stock.php? addrecprodconfirm=1");

}




mysql_close($cnn);


?>


