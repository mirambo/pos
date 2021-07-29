<?php
#include connection
include ('includes/session.php');
include('Connections/fundmaster.php');

$date_from=mysql_real_escape_string($_POST['date_from']); 
$orig_sales_id=mysql_real_escape_string($_POST['orig_sales_id']); 
$shop_id=mysql_real_escape_string($_POST['shop_id']); 
$sup=mysql_real_escape_string($_POST['customer_id']); 
$ship_agency=mysql_real_escape_string($_POST['ship_agency']);
$mop=1;
$currency=7;
$curr_rate=1;


$comments=mysql_real_escape_string($_POST['comments']);
//$freight_charge=mysql_real_escape_string($_POST['freight_charge']);
$orig_sales_id=mysql_real_escape_string($_POST['orig_sales_id']);

$sql= "insert into sales_returns values('','$shop_id','$sup','$user_id','','$mop','$currency','$curr_rate','$orig_sales_id','$comments','$date_from','','')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());





$queryprof="select * from sales_returns order by sales_returns_id desc limit 1";
$resultsprof=mysql_query($queryprof) or die ("Error: $queryprof.".mysql_error());
								  
$rowsprof=mysql_fetch_object($resultsprof);


$order_code=$rowsprof->sales_returns_id;
$tempnum=$order_code;
$year=date('Y');

if($tempnum < 10)
            {
              $lpo_no = "0000".$tempnum;
              //$lpo_no = $client_abrev.'/'.$month."/0000".$tempnum;
			   //echo $newnum;
			  
			  
            } 
			
			else if($tempnum < 100) 
			{
             $lpo_no = "000".$tempnum;
			 
			 //echo $newnum;
            } 
			
			else if($tempnum < 1000) 
			{
             $lpo_no = "00".$tempnum;
			 
			 //echo $newnum;
            }
			
						else if($tempnum < 10000) 
			{
             $lpo_no = "0".$tempnum;
			 
			 //echo $newnum;
            }
			
			
			else 
			{ 
			$lpo_no = $tempnum;
			
			//echo $newnum;
			}


$sqllpono="UPDATE sales_returns set credit_note_no='$lpo_no' where sales_returns_id='$order_code'";
$resultslpono= mysql_query($sqllpono) or die ("Error $sqllpono.".mysql_error());


$query1="select * from customer where customer_id='$sup'";
$results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
$rows1=mysql_fetch_object($results1);
$supp_name=$rows1->customer_name;


$transaction_descinv="Freight Charges for Goods Supplied By:".$supp_name;


$prod=mysql_real_escape_string($_POST['prod']);
$qnty=mysql_real_escape_string($_POST['qnty']);
$vend_price=mysql_real_escape_string($_POST['vend_price']);

foreach($_POST['prod'] as $row=>$Prod)
{

$prod=mysql_real_escape_string($_POST['prod'][$row]);


$query11="select * from items where item_id='$prod'";
$results11=mysql_query($query11) or die ("Error: $query11.".mysql_error());
$rows11=mysql_fetch_object($results11);

$product_name=$rows11->item_name;
$pack_size=$rows11->pack_size;

$qnty=mysql_real_escape_string($_POST['qnty'][$row]);
$vend_price=mysql_real_escape_string($_POST['vend_price'][$row]);
$curr_bp=mysql_real_escape_string($_POST['curr_bp'][$row]);

$purchase_cost=$vend_price*$qnty;

$sql= "insert into sales_returns_items values('','$order_code','$shop_id','$prod','$description','$qnty','$vend_price','$date_from','$curr_bp')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


}




?>
<script type="text/javascript">
alert('Sales Return Generated Successfuly');
//window.location = "home.php?initiateproject=initiateproject&sub_module_id=<?php echo $sub_module_id; ?>";
window.location = "generate_sales_returns.php?order_code=<?php echo $order_code; ?>";
</script>

<?php


mysql_close($cnn);


?>


