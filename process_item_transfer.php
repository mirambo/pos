<?php
#include connection
include ('includes/session.php');
include('Connections/fundmaster.php');

$date_from=mysql_real_escape_string($_POST['date_from']); 
$transfer_from=mysql_real_escape_string($_POST['transfer_from']); 
$transfer_to=mysql_real_escape_string($_POST['transfer_to']); 
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

$sql= "insert into transfer_items_code values('','$transfer_from','$transfer_to','$user_id','','$comments','$date_from','2','')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());



$queryprof="select * from transfer_items_code order by transfer_item_code_id desc limit 1";
$resultsprof=mysql_query($queryprof) or die ("Error: $queryprof.".mysql_error());
								  
$rowsprof=mysql_fetch_object($resultsprof);


$order_code=$rowsprof->transfer_item_code_id;
$tempnum=$order_code;
$year=date('Y');

if($tempnum < 10)
            {
              $lpo_no = "TR000".$tempnum."/".$year;
			   //echo $newnum;
			  
			  
            } else if($tempnum < 100) 
			{
             $lpo_no = "TR00".$tempnum."/".$year;
			 
			 //echo $newnum;
            } else 
			{ 
			$lpo_no= "TR".$tempnum."/".$year; 
			
			//echo $newnum;
			}


$sqllpono="UPDATE transfer_items_code set transfer_no='$lpo_no' where transfer_item_code_id='$order_code'";
$resultslpono= mysql_query($sqllpono) or die ("Error $sqllpono.".mysql_error());


//account from
$sqlrec1="SELECT * FROM account WHERE account_id='$transfer_from'";
$resultsrec1= mysql_query($sqlrec1) or die ("Error $sqlrec1.".mysql_error());	
$rowsrec1=mysql_fetch_object($resultsrec1);
$acc_name_from=$rowsrec1->account_name;

//account to
$sqlrec2="SELECT * FROM account WHERE account_id='$transfer_to'";
$resultsrec2= mysql_query($sqlrec2) or die ("Error $sqlrec2.".mysql_error());	
$rowsrec2=mysql_fetch_object($resultsrec2);
$acc_name_to=$rowsrec2->account_name;


/* $query1="select * from suppliers where supplier_id='$sup'";
$results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
$rows1=mysql_fetch_object($results1);
$supp_name=$rows1->supplier_name; */

//Items Details

$prod=mysql_real_escape_string($_POST['prod']);
$qnty=mysql_real_escape_string($_POST['qnty']);
//$vend_price=mysql_real_escape_string($_POST['vend_price']);

foreach($_POST['prod'] as $row=>$Prod)
{

$prod=mysql_real_escape_string($_POST['prod'][$row]);


$sqlit="SELECT * FROM items WHERE item_id='$prod'";
$resultsit= mysql_query($sqlit) or die ("Error $sqlit.".mysql_error());	
$rowsit=mysql_fetch_object($resultsit);
$item_name=$rowsit->item_name;
$vend_price=$rowsit->curr_bp;


$qnty=mysql_real_escape_string($_POST['qnty'][$row]);
//$vend_price=mysql_real_escape_string($_POST['vend_price'][$row]);



$sql= "insert into transfer_items values('','$order_code','$prod','$description','$qnty','$vend_price',NOW(),'0')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}


header ("Location:transfer_items.php?order_code=$order_code");




mysql_close($cnn);


?>


