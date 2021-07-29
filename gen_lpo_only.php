<?php
#include connection
include('includes/session.php');
include('Connections/fundmaster.php');

$get_prnt_supid=$_GET['prnt_supp_id'];
$get_prnt_orderid=$_GET['prnt_order_id'];
$currency=$_GET['currency'];
$curr_rate=$_GET['curr_rate'];
$get_prnt_ship=$_GET['ship_id'];
$get_prnt_payterms=$_GET['pay_terms'];
$get_comments=$_GET['comments'];
$freight_charge=$_GET['freight_charge'];

//update currency rate





// get latest order code for the sake of lpo details
$queryprof="select * from temp_purchase_order order by temp_purchase_order_id desc limit 1";
$resultsprof=mysql_query($queryprof) or die ("Error: $queryprof.".mysql_error());
								  
$rowsprof=mysql_fetch_object($resultsprof);

$latest_order_code=$rowsprof->order_code;
$latest_comments=$rowsprof->comments;
//$currency=$rowsprof->currency_code;



//Prevent redudancy of lpo postings
$queryred="select * from lpo where order_code ='$latest_order_code'";
$resultsred=mysql_query($queryred) or die ("Error: $queryred.".mysql_error());

$numrowsred=mysql_num_rows($resultsred);

if ($numrowsred>0)

{


}

else 

{



$sqllpo= "insert into lpo values('','$latest_comments','','','','$freight_charge','$currency','$curr_rate','$get_prnt_supid','$latest_order_code','$user_id',NOW(),'1')";
$resultslpo= mysql_query($sqllpo) or die ("Error $sqllpo.".mysql_error());

}



// generate lpo number
$querylatelpo="select * from lpo order by lpo_id desc limit 1";
$resultslatelpo=mysql_query($querylatelpo) or die ("Error: $querylatelpo.".mysql_error());
$rowslatelpo=mysql_fetch_object($resultslatelpo);

$latest_lpo_id=$rowslatelpo->lpo_id;

$year=date('Y');


	$tempnum=$latest_lpo_id;
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
	
	








//$lpo_no="BD".$latest_lpo_id."/".$year;


// insert lpo number
$sqllpono="UPDATE lpo set lpo_no='$lpo_no' where lpo_id='$latest_lpo_id'";
$resultslpono= mysql_query($sqllpono) or die ("Error $sqllpono.".mysql_error());


$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'Generated a purchase order $lpo_no ')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());





  
$grndttl=0;

$sqllpdet="select  temp_purchase_order.quantity, temp_purchase_order.vendor_prc,temp_purchase_order.product_code,temp_purchase_order.ttl,products.product_name, products.pack_size from temp_purchase_order, products where temp_purchase_order.product_id=products.product_id order by temp_purchase_order.temp_purchase_order_id asc";
$resultslpdet= mysql_query($sqllpdet) or die ("Error $sqllpdet.".mysql_error());


if (mysql_num_rows($resultslpdet) > 0)
						  {
							  $RowCounter=0;
							  while ($rowslpdet=mysql_fetch_object($resultslpdet))
							  { 
							  
							  $RowCounter++;
							  if($RowCounter % 2==0)

  
 


 $rowslpdet->quantity; $qnty=$rowslpdet->quantity;
	
	$vendor_prc=$rowslpdet->vendor_prc;
		if ($vendor_prc=='F.O.C')
		{
		$vendor_prc;
		}
		else
		{
		
	
number_format($rowslpdet->vendor_prc,2); $unit_val= $rowslpdet->vendor_prc;
	
	}
	
	$unit_val= $rowslpdet->vendor_prc;
	?>
   <?php 
	
	//echo number_format($rowslpdet->ttl,2);
	
	
	//echo $qnty;  echo $unit_val;
	$ttl=$unit_val*$qnty;
	
	number_format ($ttl,2);
	//$id=$rowslpdet->purchase_order_id;
	
	
	/*$sqlttl="UPDATE purchase_order set ttl='$ttl' where purchase_order_id='$id'";
	$resultsttl= mysql_query($sqlttl) or die ("Error $sqlttl.".mysql_error());
	
	$sqlttl="UPDATE temp_purchase_order set ttl='$ttl' where purchase_order_id='$id'";
	$resultsttl= mysql_query($sqlttl) or die ("Error $sqlttl.".mysql_error());*/
	
	
	$grndttl_lpo1=$grndttl_lpo1+$ttl;
	
	

	
	

	
	
	}
	
$grndttl=$grndttl_lpo1+$freight_charge;

$transaction_desc='LPO No:'.$lpo_no;

$sqllpoamnt="UPDATE lpo set lpo_amount='$grndttl',freight_charges='$freight_charge' where lpo_id='$latest_lpo_id'";
$resultslpoamnt= mysql_query($sqllpoamnt) or die ("Error $sqllpoamnt.".mysql_error());	


//Prevent redudancy of lpo postings
$queryred1="select * from  supplier_transactions where transaction='$transaction_desc'";
$resultsred1=mysql_query($queryred1) or die ("Error: $queryred1.".mysql_error());

$numrowsred1=mysql_num_rows($resultsred1);

if ($numrowsred1>0)

{


}
else
{

$sqltrans= "insert into supplier_transactions values('','$get_prnt_supid','$latest_order_code','$transaction_desc','$currency','$curr_rate','$grndttl',NOW())";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());

$sqlgenled= "insert into general_ledger values('','Purchases Account (PO No:$lpo_no)','$grndttl','$grndttl','','$currency','$curr_rate',NOW(),'$latest_order_code')";
$resultsgenled=mysql_query($sqlgenled) or die ("Error $sqlgenled.".mysql_error());

$sqlgenled= "insert into general_ledger values('','Accounts Payables (PO No:$lpo_no)','-$grndttl','','$grndttl','$currency','$curr_rate',NOW(),'$latest_order_code')";
$resultsgenled=mysql_query($sqlgenled) or die ("Error $sqlgenled.".mysql_error());

$sqlaccpay= "insert into accounts_payables_ledger values('','$transaction_desc','$grndttl','','$grndttl','$currency','$curr_rate',NOW(),'$latest_order_code')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());

$sqlaccpay= "insert into purchases_ledger values('','$transaction_desc','$grndttl','$grndttl','','$currency','$curr_rate',NOW(),'$latest_order_code')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());

}



	}

//echo $grndttl_lpo=$grndttl_lpo1+$freight_charge;


header ("Location:begin_order.php?addconfirm=1");



mysql_close($cnn);


?>


