<?php
#include connection
include ('includes/session.php');
include('Connections/fundmaster.php');
//$to=date('Y-m-d' time());

$lpo_type=mysql_real_escape_string($_POST['lpo_type']); 
$sup=mysql_real_escape_string($_POST['sup']); 
$farmer_id=mysql_real_escape_string($_POST['farmer_id']); 
$ship_agency=0;
$mop=mysql_real_escape_string($_POST['mop']);
$currency=mysql_real_escape_string($_POST['currency']);
$curr_rate=mysql_real_escape_string($_POST['curr_rate']);
$to=date( 'Y-m-d H:i:s', time());
$date_from=mysql_real_escape_string($_POST['date_from']);


$comments=mysql_real_escape_string($_POST['comments']);
$ref_no=mysql_real_escape_string($_POST['ref_no']);
$expiry_date=mysql_real_escape_string($_POST['date_to']);
$freight_charge=mysql_real_escape_string($_POST['transport']);
$payment_schedule=mysql_real_escape_string($_POST['payment_schedule']);


$query1="select * from suppliers where supplier_id='$sup'";
$results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
$rows1=mysql_fetch_object($results1);
$supp_name=$rows1->supplier_name;
$supp_type=$rows1->sup_type;



$currency=7;
$curr_rate=1;

$sql= "insert into order_code_get SET
supplier_id='$sup',
farmer_id='$farmer_id',
shipper_id='$ship_agency',
user_id='$user_id',
mop_id='$mop',
currency='$currency',
curr_rate='$curr_rate',
comments='$comments',
ref_no='$ref_no',
lpo_expiry_date='$expiry_date',
payment_schedule='$payment_schedule',
date_generated='$date_from'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
$order_code=mysql_insert_id();


$sqlpr= "insert into approved_lpo values('','$order_code','$user_id',NOW(),'0')";
$resultspr= mysql_query($sqlpr) or die ("Error $sqlpr.".mysql_error());

$sql3pr= "UPDATE order_code_get SET status='2' WHERE order_code_id='$order_code'";
$results3pr= mysql_query($sql3pr) or die ("Error $sql3pr.".mysql_error());




/* $queryprof="select * from order_code_get order by order_code_id desc limit 1";
$resultsprof=mysql_query($queryprof) or die ("Error: $queryprof.".mysql_error());
								  
$rowsprof=mysql_fetch_object($resultsprof); */



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


$sqllpono="UPDATE order_code_get set lpo_no='$lpo_no' where order_code_id='$order_code'";
$resultslpono= mysql_query($sqllpono) or die ("Error $sqllpono.".mysql_error());




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

/* $prod=mysql_real_escape_string($_POST['prod']);
$qnty=mysql_real_escape_string($_POST['qnty']);
$vend_price=mysql_real_escape_string($_POST['vend_price']); */

foreach($_POST['countryname'] as $row=>$CountryName)
{
	
$qnty=mysql_real_escape_string($_POST['country_code'][$row]);
$vend_price=mysql_real_escape_string($_POST['phone_code'][$row]);
$vat=mysql_real_escape_string($_POST['vat'][$row]);


$item_sp=1.8*$vend_price;

if ($vat==1)
{
$vat_value=$vend_price*$qnty*0.18;
}
else
{
	
$vat_value=0;	
}

$item_name=mysql_real_escape_string($_POST['countryname'][$row]);
$prod2=mysql_real_escape_string($_POST['country_no'][$row]);

if ($prod2=='')
{
/* $sql3="INSERT INTO items VALUES('','0','$item_name','$item_code','$pack_size','$reorder_level','$vend_price','$item_sp','$item_desc','')" or die(mysql_error());
$results3= mysql_query($sql3) or die ("Error $sql3.".mysql_error());

$prod=mysql_insert_id();


$sql= "insert into products values ('','0','$item_name','$item_code','$pack_size','$weight','$reorder_level','$item_sp','$vend_price','6','1','')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());	 */


	
	
}

else
{
	
$prod=$prod2;
	
}



$sqlp= "INSERT into purchase_order SET
order_code='$order_code',
product_id='$prod',
description='$description',
quantity='$qnty',
order_vat='$vat',
vendor_prc='$vend_price',
order_vat_value='$vat_value'";
$resultsp= mysql_query($sqlp) or die ("Error $sqlp.".mysql_error());

}


//header ("Location:begin_order.php?order_code=$order_code");
?>
<script type="text/javascript">
alert('Record Saved Successfuly');
window.location = "begin_order.php?order_code=<?php echo $order_code; ?>";
//window.location = "<?php echo $_SERVER['HTTP_REFERER']; ?>";
</script>
<?php

mysql_close($cnn);


?>


