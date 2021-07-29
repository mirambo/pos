<?php
include('includes/session.php');
include('Connections/fundmaster.php');

$to=date( 'Y-m-d H:i:s', time());
$sale_date=mysql_real_escape_string($_POST['date_from']);
$client_id=mysql_real_escape_string($_POST['client_id']);
$discount=mysql_real_escape_string($_POST['discount']);
$vat=mysql_real_escape_string($_POST['vat']);
$currency=6;
$curr_rate=1;

$mop=mysql_real_escape_string($_POST['mop']);

$cheque_no=mysql_real_escape_string($_POST['cheque_no']);
$cheq_drawer=mysql_real_escape_string($_POST['cheq_drawer']);
$date_drawn=mysql_real_escape_string($_POST['date_drawn']);
$ref_no=mysql_real_escape_string($_POST['ref_no']);
$date_paid=mysql_real_escape_string($_POST['date_paid']);
$transaction_code=mysql_real_escape_string($_POST['transaction_code']);
$client_bank=mysql_real_escape_string($_POST['client_bank']);
$our_bank=mysql_real_escape_string($_POST['our_bank']);
$date_trans=mysql_real_escape_string($_POST['date_trans']);


//$curr_rate=mysql_real_escape_string($_POST['curr_rate']);

//echo $sales_rep;
$to=date( 'Y-m-d H:i:s', time());

$sql= "insert into sales_code SET
receipt_no='$invoice_no',
sale_date='$sale_date',
user_id='$user_id',
date_generated='$to',
discount='$discount',
vat='$vat'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$received_order_code_id=mysql_insert_id();


$sql1= "insert into invoice_payments values ('','ch$received_order_code_id','$client_id','','$invoice_no','$amount','$desc','$currency','$curr_rate','$mop','$ref_no',
'$date_paid','','',NOW(),'')";
$results1= mysql_query($sql1) or die ("Error $sql1.".mysql_error());


//$received_order_code_id=$rowsprof->sales_code_id;

$year=date('Y');
$tempnum=$received_order_code_id;



if($tempnum < 10)
            {
              $invoice_no = "SNPC000".$tempnum."/".$year; 
		 
			  
			  
            } else if($tempnum < 100) 
			{
             $invoice_no = "SNPC00".$tempnum."/".$year;
		  
			 
	
            } else 
			{ 
			$invoice_no="SNPC".$tempnum."/".$year; 
			

			}



			
$sqllpono="UPDATE sales_code set receipt_no='$invoice_no' where sales_code_id='$received_order_code_id'";
$resultslpono= mysql_query($sqllpono) or die ("Error $sqllpono.".mysql_error());

$sqllpono="UPDATE invoice_payments set receipt_no='$invoice_no' where sales_code_id='ch$received_order_code_id'";
$resultslpono= mysql_query($sqllpono) or die ("Error $sqllpono.".mysql_error());


foreach($_POST['countryname'] as $row=>$CountryName)
{
	
$item_name=mysql_real_escape_string($_POST['countryname'][$row]);
$prod2=mysql_real_escape_string($_POST['country_no'][$row]);

$qnty=mysql_real_escape_string($_POST['country_code'][$row]);
$vend_price=mysql_real_escape_string($_POST['phone_code'][$row]);


$sql= "insert into cash_sales SET
item_id='$prod2',
user_id='$user_id',
selling_price='$vend_price',
date_generated='$to',
sales_code='$received_order_code_id',
quantity='$qnty'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

/* $sql3="INSERT INTO released_item VALUES('','$booking_id','$job_card_id','$requisition_id','$prod2','$qnty','$delivery_date',
'$rec_person','0','1',NOW())";
$results3=mysql_query($sql3) or die ("Error $sql3.".mysql_error()); */

}

?>
<script type="text/javascript">
alert('Record Saved Successfuly');
window.location ="view_cash_sales_details.php?sales_code=<?php echo $received_order_code_id; ?>";
</script> ;

<?php
//header ("Location:begin_order.php?order_code=$order_code");






?>