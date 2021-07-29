<?php
#include connection
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$prod_cat=mysql_real_escape_string($_POST['prod_cat']);
$prod_name=mysql_real_escape_string($_POST['prod_name']);
$prod_code=mysql_real_escape_string($_POST['prod_code']);
$pack_size_id=mysql_real_escape_string($_POST['pack_size']);
$weight=mysql_real_escape_string($_POST['weight']);
$reorder_level=mysql_real_escape_string($_POST['reorder_level']);
$curr_sp=mysql_real_escape_string($_POST['curr_sp']);
$curr_bp=mysql_real_escape_string($_POST['curr_bp']);
$currency=mysql_real_escape_string($_POST['currency']);

$querycr="select curr_rate from currency where curr_id='$currency'";
$resultscr=mysql_query($querycr) or die ("Error: $querycr.".mysql_error());							  
$rowscr=mysql_fetch_object($resultscr);
$exchange_rate=$rowscr->curr_rate;


//$exchange_rate=mysql_real_escape_string($_POST['exchange_rate']);

$queryprofx="select * from  pack_size where pack_size_id='$pack_size_id'";
$resultsprofx=mysql_query($queryprofx) or die ("Error: $queryprofx.".mysql_error());
$rowsprofx=mysql_fetch_object($resultsprofx);

$pack_size=$rowsprofx->pack_size;


$queryprof="select * from  products where product_name='$prod_name' and pack_size='$pack_size'";
$resultsprof=mysql_query($queryprof) or die ("Error: $queryprof.".mysql_error());
								  
//$rowsprof=mysql_fetch_object($resultsprof);

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

header ("Location:add_stock.php? recordexist=1");

}

/*elseif ($curr_bp>$curr_sp)

{

header ("Location:add_stock.php? bplargernote=1&prod_cat=$prod_cat&prod_name=$prod_name&pack_size=$pack_size&weight=$weight&reorder_level=$reorder_level&curr_bp=$curr_bp&curr_sp=$curr_sp");

}*/

else 

{



$sql= "insert into products values ('','$prod_cat','$prod_name','$prod_code','$pack_size','$weight','$reorder_level','$curr_sp','$curr_bp','$currency','$exchange_rate','')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());






header ("Location:add_stock.php? addprodconfirm=1");

}




mysql_close($cnn);


?>


