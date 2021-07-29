<?php
#include connection
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$prod_id=mysql_real_escape_string($_POST['prod_id']);
$supp_id=mysql_real_escape_string($_POST['supp_id']);
$return_quant=mysql_real_escape_string($_POST['return_quant']);
$purchase_order_id=mysql_real_escape_string($_POST['purchase_order_id']);
$order_code=mysql_real_escape_string($_POST['order_code']);
$ordered_qnty=mysql_real_escape_string($_POST['ordered_qnty']);
$rec_already_qnty=mysql_real_escape_string($_POST['ttl_rec']);
$ttl_rec=mysql_real_escape_string($_POST['ttl_rec']);

//$qnty_bal=$ordered_qnty-$rec_already_qnty;

//echo $qnty_bal;


$queryprof="select * from  returned_stock where quantity_returned='$return_quant' and purchase_order_id='$purchase_order_id' and product_id='$prod_id' and 	
supplier_id='$supp_id' and order_id='$order_code'";
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

elseif ($ordered_qnty<$return_quant)
{

header ("Location:return_product.php?return_quant=$return_quant&purchase_order_id=$purchase_order_id&ttlrec=$ttl_rec&product_id=$prod_id&order_id=$order_code&abnormal=1");

}

else 

{

$sql= "insert into returned_stock values ('','$purchase_order_id','$prod_id','$supp_id','$order_code','$return_quant',NOW(),'')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

//$sqlupdatelpo= "UPDATE lpo SET status='0' where order_code='$order_code'";
//$resultslpo= mysql_query($sqlupdatelpo) or die ("Error $sqllpo.".mysql_error());


//$sqlupdatrecprod= "UPDATE purchase_order SET status='0' where order_code='$order_code' and product_id='$prod_id'";
//$resultsrecprod= mysql_query($sqlupdatrecprod) or die ("Error $sqlupdatrecprod.".mysql_error());


header ("Location:return_product.php? returnprodconfirm=1");

}




mysql_close($cnn);


?>


