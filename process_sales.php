<?php
#include connection
include ('includes/session.php');
include('Connections/fundmaster.php');
$cash=$_GET['cash'];
$date_from=mysql_real_escape_string($_POST['date_from']); 
$customer_id=mysql_real_escape_string($_POST['customer_id']); 
$shop_id=mysql_real_escape_string($_POST['shop_id']); 
$order_no=mysql_real_escape_string($_POST['order_no']); 
$ref_no=mysql_real_escape_string($_POST['ref_no']); 

$delivery_address=mysql_real_escape_string($_POST['delivery_address']);
$delivered_by=mysql_real_escape_string($_POST['delivered_by']);

$day=date( 'Y-m-d H:i:s', time());
$todate=date( 'Y-m-d', time());



$mop=mysql_real_escape_string($_POST['mop']);
$currency=mysql_real_escape_string($_POST['currency']);
$curr_rate=mysql_real_escape_string($_POST['curr_rate']);
$discount=mysql_real_escape_string($_POST['discount']);
$vat=mysql_real_escape_string($_POST['vat']);

$amount=mysql_real_escape_string($_POST['amount']);
$desc=mysql_real_escape_string($_POST['desc']);


$cheque_no=mysql_real_escape_string($_POST['cheque_no']);
$cheq_drawer=mysql_real_escape_string($_POST['cheq_drawer']);
$date_drawn=mysql_real_escape_string($_POST['date_drawn']);
$ref_no=mysql_real_escape_string($_POST['ref_no']);
$date_paid=mysql_real_escape_string($_POST['date_paid']);
$transaction_code=mysql_real_escape_string($_POST['transaction_code']);
$client_bank=mysql_real_escape_string($_POST['client_bank']);
$our_bank=mysql_real_escape_string($_POST['our_bank']);
$date_trans=mysql_real_escape_string($_POST['date_trans']);
$comments=mysql_real_escape_string($_POST['terms']);



/* $sql= "insert into sales values('','$customer_id','','$sales_rep','$com_perc','$currency','$curr_rate','$vat','$discount','$user_id',
'$shop_id','$date_from','cr','0','1','$comments',NOW(),'$order_no','$delivery_address','$delivered_by','0','')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error()); */


$sqltrans2="INSERT INTO sales SET 
customer_id='$customer_id',
currency='$currency',
curr_rate='$curr_rate',
user_id='$user_id',
approved_status='1',
sale_date='$date_from',
sale_type='cr',
delivery_address='$sales_item_id',
order_no='$order_no',
general_remarks='$comments',
datetime_generated='$todate'";
$resultstrans2=mysql_query($sqltrans2) or die ("Error $sqltrans2.".mysql_error());	

$sales_id=mysql_insert_id();

///invoice_no
$client_abrev = substr($cust_name, 0, 3);



$tempnum=$sales_id;
//$month=date('M');
$month = date("M",strtotime($date_from));

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
			$lpo_no =$tempnum;
			
			//echo $newnum;
			}

/* $sqllpono="UPDATE sales set invoice_no='$lpo_no' where sales_id='$sales_id'";
$resultslpono= mysql_query($sqllpono) or die ("Error $sqllpono.".mysql_error()); */




$query_no="select invoice_no,sales_id from sales where sale_type='cr' order by sales_id desc limit 1,2";
$results_no=mysql_query($query_no) or die ("Error: $query_no.".mysql_error());
$rows_no=mysql_fetch_object($results_no);

 echo $prev_inv_no=$rows_no->invoice_no;
echo $curr_inv_no1=$prev_inv_no+1;


if($curr_inv_no1 < 10)
            {
              $lpo_no1 = "0000".$curr_inv_no1;
              //$lpo_no = $client_abrev.'/'.$month."/0000".$tempnum;
			   //echo $newnum;
			  
			  
            } 
			
			else if($curr_inv_no1 < 100) 
			{
             $lpo_no1 = "000".$curr_inv_no1;
			 
			 //echo $newnum;
            } 
			
			else if($curr_inv_no1 < 1000) 
			{
             $lpo_no1 = "00".$curr_inv_no1;
			 
			 //echo $newnum;
            }
			
						else if($curr_inv_no1 < 10000) 
			{
             $lpo_no1 = "0".$curr_inv_no1;
			 
			 //echo $newnum;
            }
			
			
			else 
			{ 
			$lpo_no1 =$curr_inv_no1;
			
			//echo $newnum;
			}


$sqllpono="UPDATE sales set invoice_no='$lpo_no1' where sales_id='$sales_id'";
$resultslpono= mysql_query($sqllpono) or die ("Error $sqllpono.".mysql_error());



//Items Details



foreach($_POST['country_no'] as $row=>$Prod)
{

$prod=mysql_real_escape_string($_POST['country_no'][$row]);

$queryprofc="select * from items where item_id='$prod'";
$resultsprofc=mysql_query($queryprofc) or die ("Error: $queryprofc.".mysql_error());
$rowsprofc=mysql_fetch_object($resultsprofc);

$curr_bp=$rowsprofc->curr_bp;
$product_name=$rowsprofc->item_name;
$vat_status=$rowsprofc->vat_status;

$memo2='Invoice Sales <a href="generate_invoice.php?sales_id='.$sales_id.'">Invoice No:'.$lpo_no1.'</a> whose cost is '.$curr_bp.' each';
$qnty=mysql_real_escape_string($_POST['country_code'][$row]);
$qnty1=number_format($qnty,0);
$discount2=mysql_real_escape_string($_POST['discount'][$row]);




$vend_price=mysql_real_escape_string($_POST['phone_code'][$row]);


$price_cost=$vend_price*$qnty;
$purchase_cost=$curr_bp*$qnty;


$discount=$discount2/$price_cost*100;


//vat calculations
$queryprofcv="select * from vat_settings";
$resultsprofcv=mysql_query($queryprofcv) or die ("Error: $queryprofcv.".mysql_error());
$rowsprofcv=mysql_fetch_object($resultsprofcv);
$vat_set_perc=$rowsprofcv->vat_setting_perc;
$vat_perc=$vat_set_perc/100;

if ($vat_status==0)
{
	
$vat_value=0;	
}
else
{

$vat_value=$qnty*$vend_price*$vat_perc;	
	
}



/* $sql= "insert into sales_item values('','$sales_id','$discount','$prod','$qnty','$man_date','$exp_date','$batch_no','$vend_price','$user_id',NOW(),'','$curr_bp','$vat_value','')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error()); */


$sqltrans2t="INSERT INTO sales_item SET 
sales_id='$sales_id',
shop_id='$discount',
item_id='$prod',
item_quantity='$qnty',
item_cost='$vend_price',
vat_value='$vat_value'";
$resultstrans2t=mysql_query($sqltrans2t) or die ("Error $sqltrans2t.".mysql_error());	






}

?>
<script type="text/javascript">
alert('Invoice Generated Successfuly');
//window.location = "home.php?initiateproject=initiateproject&sub_module_id=<?php echo $sub_module_id; ?>";
window.location = "generate_invoice.php?sales_id=<?php echo $sales_id ?>";
</script>

<?php

mysql_close($cnn);



?>


