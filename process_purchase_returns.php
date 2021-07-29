<?php
#include connection
include ('includes/session.php');
include('Connections/fundmaster.php');

$date_from=mysql_real_escape_string($_POST['date_from']); 
$sup=mysql_real_escape_string($_POST['sup']); 
$ship_agency=mysql_real_escape_string($_POST['ship_agency']);
$mop=1;
$currency=mysql_real_escape_string($_POST['currency']);
$curr_rate=mysql_real_escape_string($_POST['curr_rate']);

/* $sqlcurr="select * from currency where curr_id='$currency'";
$resultscurr= mysql_query($sqlcurr) or die ("Error $sqlcurr.".mysql_error());
$rowcurr=mysql_fetch_object($resultscurr);
$curr_rate=$rowcurr->curr_rate; */

$comments=mysql_real_escape_string($_POST['comments']);
$freight_charge=mysql_real_escape_string($_POST['freight_charge']);

$sql= "insert into purchase_returns values('','$ship_agency','$sup','$user_id','','$mop','$currency','$curr_rate','$freight_charge','$comments','$date_from','','')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());





$queryprof="select * from purchase_returns order by purchase_returns_id desc limit 1";
$resultsprof=mysql_query($queryprof) or die ("Error: $queryprof.".mysql_error());
								  
$rowsprof=mysql_fetch_object($resultsprof);


$order_code=$rowsprof->purchase_returns_id;
$tempnum=$order_code;
$year=date('Y');

if($tempnum < 10)
            {
              $lpo_no = "JST000".$tempnum."/".$year;
			   //echo $newnum;
			  
			  
            } else if($tempnum < 100) 
			{
             $lpo_no = "JST00".$tempnum."/".$year;
			 
			 //echo $newnum;
            } else 
			{ 
			$lpo_no= "JST".$tempnum."/".$year; 
			
			//echo $newnum;
			}


$sqllpono="UPDATE purchase_returns set debit_note_no='$lpo_no' where purchase_returns_id='$order_code'";
$resultslpono= mysql_query($sqllpono) or die ("Error $sqllpono.".mysql_error());


$query1="select * from suppliers where supplier_id='$sup'";
$results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
$rows1=mysql_fetch_object($results1);
$supp_name=$rows1->supplier_name;

$transaction_descinv="Freight Charges for Goods Supplied By:".$supp_name;


$prod=mysql_real_escape_string($_POST['prod']);
$qnty=mysql_real_escape_string($_POST['qnty']);
$vend_price=mysql_real_escape_string($_POST['vend_price']);

foreach($_POST['prod'] as $row=>$Prod)
{

$prod=mysql_real_escape_string($_POST['prod'][$row]);

$sqlvp="select * FROM purchase_returns_items where purchase_returns_id='$order_code_id' AND product_id='$prod'";
$resultsvp= mysql_query($sqlvp) or die ("Error $sqlvp.".mysql_error());
$rowsvp=mysql_fetch_object($resultsvp);
//$vendor_prc=$rowsvp->vendor_prc;

$query11="select * from products where product_id='$prod'";
$results11=mysql_query($query11) or die ("Error: $query11.".mysql_error());
$rows11=mysql_fetch_object($results11);

$product_name=$rows11->product_name;
$pack_size=$rows11->pack_size;

$qnty=mysql_real_escape_string($_POST['qnty'][$row]);
$vend_price=mysql_real_escape_string($_POST['vend_price'][$row]);

$purchase_cost=$vend_price*$qnty;

$sql= "insert into purchase_returns_items values('','$order_code','$prod','$description','$qnty','$vend_price',NOW(),'0')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


$querylatelpo="select * from purchase_returns_items order by purchase_returns_items_id desc limit 1";
$resultslatelpo=mysql_query($querylatelpo) or die ("Error: $querylatelpo.".mysql_error());
$rowslatelpo=mysql_fetch_object($resultslatelpo);

$latest_pr_id=$rowslatelpo->purchase_returns_items_id;


$sqlaccpay="insert into inventory_ledger values('','Purchase returns $qnty_rec $product_name ($pack_size)','-$purchase_cost','','$purchase_cost','$currency','$curr_rate','$date_from','prt$latest_pr_id','','','')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());

$sqltrans= "insert into item_transactions values('','$prod','Purchase returns $qnty_rec $product_name ($pack_size)','-$qnty','$date_from','prt$latest_pr_id','')";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());


/* $sqlaccpay="insert into accounts_payable_ledger values('','Purchase returns $qnty_rec $product_name ($pack_size)','-$purchase_cost','$purchase_cost','','$currency','$curr_rate',NOW(),'prt$latest_pr_id')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());


$sqlaccpay="insert into purchases_returns_ledger values('','Purchase returns $qnty_rec $product_name ($pack_size)','-$purchase_cost','$purchase_cost','','$currency','$curr_rate',NOW(),'prt$latest_pr_id')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error()); */







}


header ("Location:record_purchase_returns.php?order_code=$order_code");




mysql_close($cnn);


?>


