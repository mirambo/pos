<?php
#include connection
include ('includes/session.php');
include('Connections/fundmaster.php');

$date_from=mysql_real_escape_string($_POST['date_from']); 
$shop_id=mysql_real_escape_string($_POST['shop_id']); 
$customer_id=1; 
$ship_agency=mysql_real_escape_string($_POST['ship_agency']);
$mop=1;
$currency=mysql_real_escape_string($_POST['currency']);
$curr_rate=mysql_real_escape_string($_POST['curr_rate']);
$discount=mysql_real_escape_string($_POST['discount']);
$vat=mysql_real_escape_string($_POST['vat']);

$amount=mysql_real_escape_string($_POST['amount']);
$desc=mysql_real_escape_string($_POST['desc']);
$currency=7;
$curr_rate=1;

$cheque_no=mysql_real_escape_string($_POST['cheque_no']);
$cheq_drawer=mysql_real_escape_string($_POST['cheq_drawer']);
$date_drawn=mysql_real_escape_string($_POST['date_drawn']);
$ref_no=mysql_real_escape_string($_POST['ref_no']);
$date_paid=mysql_real_escape_string($_POST['date_paid']);
$transaction_code=mysql_real_escape_string($_POST['transaction_code']);
$client_bank=mysql_real_escape_string($_POST['client_bank']);
$our_bank=mysql_real_escape_string($_POST['our_bank']);
$date_trans=mysql_real_escape_string($_POST['date_trans']);

/* $sqlcurr="select * from currency where curr_id='$currency'";
$resultscurr= mysql_query($sqlcurr) or die ("Error $sqlcurr.".mysql_error());
$rowcurr=mysql_fetch_object($resultscurr);
$curr_rate=$rowcurr->curr_rate; */

$comments=mysql_real_escape_string($_POST['comments']);


$sql= "insert into sales values('','$customer_id','$currency','$curr_rate','$vat','$discount','$user_id',
'$shop_id','$date_from','cs','0','1','$comments',NOW())";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());



$queryprof="select * from sales where user_id='$user_id' order by sales_id desc limit 1";
$resultsprof=mysql_query($queryprof) or die ("Error: $queryprof.".mysql_error());
$rowsprof=mysql_fetch_object($resultsprof);


$sales_id=$rowsprof->sales_id;
/* $tempnum=$order_code;
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


$sqllpono="UPDATE order_code_get set lpo_no='$lpo_no' where order_code_id='$order_code'";
$resultslpono= mysql_query($sqllpono) or die ("Error $sqllpono.".mysql_error()); */


$query1="select * from suppliers where supplier_id='$sup'";
$results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
$rows1=mysql_fetch_object($results1);
$supp_name=$rows1->supplier_name;

$transaction_descinv="Freight Charges for Goods Supplied By:".$supp_name;
//if shipping agencies is the supplier themseleves
if ($ship_agency==5)
{

}
else
{
//shipper transaction
/*$sqltrans= "insert into shippers_transactions values('','$sup','shp$order_code','$transaction_descinv','$freight_charge','$currency','$curr_rate',NOW())";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());

$sqlaccpay= "insert into accounts_payables_ledger values('','$transaction_descinv','$freight_charge','','$freight_charge','$currency','$curr_rate',NOW(),'shp$order_code')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());*/
}

//Items Details

$prod=mysql_real_escape_string($_POST['prod']);
$qnty=mysql_real_escape_string($_POST['qnty']);
$vend_price=mysql_real_escape_string($_POST['vend_price']);

foreach($_POST['prod'] as $row=>$Prod)
{

$prod=mysql_real_escape_string($_POST['prod'][$row]);
$qnty=mysql_real_escape_string($_POST['qnty'][$row]);
$vend_price=mysql_real_escape_string($_POST['vend_price'][$row]);
$sql= "insert into sales_item values('','$sales_id','$shop_id','$prod','$qnty','$vend_price','$user_id','$date_from','0')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}


//amount paid upon invoice payments

/* $sql= "insert into invoice_payments values ('','$sales_id','$customer_id','$user_id','$incharge','','$amount','$desc','$currency','$curr_rate','$mop','$ref_no',
'$date_from','','',NOW(),'')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error()); */

header ("Location:generate_cash_sales.php?sales_id=$sales_id");

?>
<script type="text/javascript">
alert('Record Saved successfuly');
//window.location = "view_received_stock.php";
window.location = "generate_cash_sales.php?sales_id=<?php echo $sales_id; ?>";
</script>
<?php

mysql_close($cnn);


?>


