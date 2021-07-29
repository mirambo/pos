<?php
#include connection
include ('includes/session.php');
include('Connections/fundmaster.php');
//$to=date('Y-m-d' time());

$lpo_type=mysql_real_escape_string($_POST['lpo_type']); 
$sup=mysql_real_escape_string($_POST['sup']); 
$to=date( 'Y-m-d H:i:s', time());
$date_from=mysql_real_escape_string($_POST['date_from']);
$comments=mysql_real_escape_string($_POST['comments']);
$ref_no=mysql_real_escape_string($_POST['ref_no']);


$sql= "insert into requisition SET
requested_by='$sup',
user_id='$user_id',
comments='$comments',
ref_no='$ref_no',
status='0',
date_generated='$date_from'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
$order_code=mysql_insert_id();

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


$sqllpono="UPDATE requisition set requisition_no='$lpo_no' where requisition_id='$order_code'";
$resultslpono= mysql_query($sqllpono) or die ("Error $sqllpono.".mysql_error());


/* $query1="select * from suppliers where supplier_id='$sup'";
$results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
$rows1=mysql_fetch_object($results1);
$supp_name=$rows1->supplier_name; */

//$transaction_descinv="Freight Charges for Goods Supplied By:".$supp_name;
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


$item_sp=1.6*$vend_price;

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

$sql= "INSERT INTO requisition_item SET
requisition_id='$order_code',
item_id='$prod2',
item_quantity='$qnty',
item_value='$vend_price',
requisition_item_status='0'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}


//header ("Location:begin_order.php?order_code=$order_code");
?>
<script type="text/javascript">
alert('Record Saved Successfuly');
window.location = "create_requisition.php?order_code=<?php echo $order_code; ?>";
//window.location = "<?php echo $_SERVER['HTTP_REFERER']; ?>";
</script>
<?php

mysql_close($cnn);


?>


