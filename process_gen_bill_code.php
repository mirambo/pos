<?php
#include connection
include ('includes/session.php');
include('Connections/fundmaster.php');

$date_from=mysql_real_escape_string($_POST['date_from']); 
$sup=mysql_real_escape_string($_POST['sup']); 
$ship_agency=1;
$mop='dr';
$currency=mysql_real_escape_string($_POST['currency']);
$curr_rate=mysql_real_escape_string($_POST['curr_rate']);

/* $sqlcurr="select * from currency where curr_id='$currency'";
$resultscurr= mysql_query($sqlcurr) or die ("Error $sqlcurr.".mysql_error());
$rowcurr=mysql_fetch_object($resultscurr);
$curr_rate=$rowcurr->curr_rate; */

$comments=mysql_real_escape_string($_POST['comments']);
$freight_charge=mysql_real_escape_string($_POST['freight_charge']);

$sql= "insert into order_code_get values('','$ship_agency','$sup','$user_id','','$mop','$currency','$curr_rate','$freight_charge','$comments','$date_from','','','$incharge')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


$queryprof="select * from order_code_get order by order_code_id desc limit 1";
$resultsprof=mysql_query($queryprof) or die ("Error: $queryprof.".mysql_error());
								  
$rowsprof=mysql_fetch_object($resultsprof);


$order_code=$rowsprof->order_code_id;
$tempnum=$order_code;
$year=date('Y');

if($tempnum < 10)
            {
              $lpo_no = "BD000".$tempnum."/".$year;
			   //echo $newnum;
			  
			  
            } else if($tempnum < 100) 
			{
             $lpo_no = "BD00".$tempnum."/".$year;
			 
			 //echo $newnum;
            } else 
			{ 
			$lpo_no= "BD".$tempnum."/".$year; 
			
			//echo $newnum;
			}


$sqllpono="UPDATE order_code_get set lpo_no='$lpo_no',received_status='1',status='2' where order_code_id='$order_code'";
$resultslpono= mysql_query($sqllpono) or die ("Error $sqllpono.".mysql_error());

$sql= "insert into approved_lpo values('','$order_code','$user_id',NOW(),'0')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$query1="select * from suppliers where supplier_id='$sup'";
$results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
$rows1=mysql_fetch_object($results1);
$supp_name=$rows1->supplier_name;

//Items Details

foreach($_POST['prod'] as $row=>$Prod)
{

$prod=mysql_real_escape_string($_POST['prod'][$row]);

//calculate item_avalability
//1. Quanity received
$sql="select SUM(received_stock.quantity_rec) as ttl_quant from received_stock 
where product_id='$prod'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
$rows=mysql_fetch_object($results);
$qunt_rec=$rows->ttl_quant;
//adjusted quantity
	 $sqladj="select SUM(quantity_adjusted) as ttl_adj_prod from adjusted_items
	where item_id='$prod'";
	$resultsadj= mysql_query($sqladj) or die ("Error $sqladj.".mysql_error());
	$rowsadj=mysql_fetch_object($resultsadj);
	
	 $adj_quant=$rowsadj->ttl_adj_prod;
//all received items
$rec_prod=$qunt_rec+$adj_quant;


//sold items returns
$sqlsold="select SUM(requisition_item.item_quantity) as ttl_sold_prod from requisition_item
	where requisition_item.item_id='$prod'";
	$resultssold= mysql_query($sqlsold) or die ("Error $sqlsold.".mysql_error());
	$rowsold=mysql_fetch_object($resultssold);
$sold_prod=$rowsold->ttl_sold_prod;

//sales return
$sq="select SUM(sales_returns_items.quantity) as ttl_sales_ret from sales_returns_items where sales_returns_items.product_id='$prod'";
$res= mysql_query($sq) or die ("Error $sq.".mysql_error());
$ro=mysql_fetch_object($res);

$sales_ret=$ro->ttl_sales_ret;

//stock return
$sqlstockret="select SUM(purchase_returns_items.quantity) as ttl_stock_ret from purchase_returns_items 
where purchase_returns_items.product_id='$prod'";
$resultsstockret= mysql_query($sqlstockret) or die ("Error $sqlstockret.".mysql_error());
$rowsstockret=mysql_fetch_object($resultsstockret);

$stock_ret=$rowsstockret->ttl_stock_ret;

$avail_prod=$rec_prod-$sold_prod+$sales_ret-$stock_ret;


$query11="select * from products where product_id='$prod'";
$results11=mysql_query($query11) or die ("Error: $query11.".mysql_error());
$rows11=mysql_fetch_object($results11);

$product_name=$rows11->product_name;
$pack_size=$rows11->pack_size;
$curr_bp=$rows11->curr_bp;

$qnty=mysql_real_escape_string($_POST['qnty'][$row]);
$vend_price=mysql_real_escape_string($_POST['vend_price'][$row]);


$ttl1=$avail_prod*$curr_bp;
$ttl2=$qnty*$vend_price;
$ttl3=$ttl1+$ttl2;
$quant_sum=$avail_prod+$qnty;

$average_cost=$ttl3/$quant_sum;


$sqllpono="UPDATE items set curr_bp='$average_cost' where item_id='$prod'";
$resultslpono= mysql_query($sqllpono) or die ("Error $sqllpono.".mysql_error());

$sqllpono="UPDATE products set curr_bp='$average_cost' where product_id='$prod'";
$resultslpono= mysql_query($sqllpono) or die ("Error $sqllpono.".mysql_error());


$purchase_cost=$vend_price*$qnty;

$sql= "insert into purchase_order values('','$order_code','$prod','$description','$qnty','$vend_price',NOW(),'0')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


$sql3="INSERT INTO received_stock VALUES('','$order_code', '$prod','$qnty','$currency','$curr_rate','$date_from',
'$expiry_date','1',NOW(),'$incharge','$user_id','')";
$results3=mysql_query($sql3) or die ("Error $sql3.".mysql_error());


$querylatelpo="select * from purchase_order order by purchase_order_id desc limit 1";
$resultslatelpo=mysql_query($querylatelpo) or die ("Error: $querylatelpo.".mysql_error());
$rowslatelpo=mysql_fetch_object($resultslatelpo);

$latest_pr_id=$rowslatelpo->purchase_order_id;


$sqlaccpay="insert into inventory_ledger values('','Direct order $qnty $product_name ($pack_size)','$purchase_cost','$purchase_cost','','$currency','$curr_rate','$date_from','dro$latest_pr_id','','','$incharge')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());

$sqltrans= "insert into item_transactions values('','$prod','Direct Order $qnty $product_name from $supp_name','$qnty','$date_from','dro$latest_pr_id','$incharge')";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());

$sqlaccpay= "insert into purchases_ledger values('','Direct order $qnty $product_name ($pack_size)','$purchase_cost','$purchase_cost','','$currency','$curr_rate','$date_from','dro$latest_pr_id','','','$incharge')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());



}


header ("Location:begin_invoice.php?order_code=$order_code");




mysql_close($cnn);


?>


