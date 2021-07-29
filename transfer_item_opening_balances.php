<?php
#include connection
include('Connections/fundmaster.php');



$sqlsp="select * FROM chart_transactions where transaction_section='OPNSTC' and transaction_code LIKE '%itm_op_dr%'";
$resultssp= mysql_query($sqlsp) or die ("Error $sqlsp.".mysql_error());
while ($rowsp=mysql_fetch_object($resultssp))
{
	
$tc=$rowsp->transaction_code;	

$item_id = (int) filter_var($tc, FILTER_SANITIZE_NUMBER_INT);

$sqlspx="select * FROM items where item_id='$item_id'";
$resultsspx= mysql_query($sqlspx) or die ("Error $sqlspx.".mysql_error());
$rowspx=mysql_fetch_object($resultsspx);
$item_name=$rowspx->item_name;



    $op_date=$rowspx->opening_bal_date;
    $op_quant=$rowspx->opening_balance;
    $op_cost=$rowspx->curr_bp;
	
   echo $debit_account_id=$rowsp->account_type_id;
	
	$code='itm_op_cr'.$item_id;
	
$sqlsp2="select * FROM chart_transactions where transaction_code='$code'";
$resultssp2= mysql_query($sqlsp2) or die ("Error $sqlsp2.".mysql_error());
$rowsp2=mysql_fetch_object($resultssp2);

echo $credit_account_id=$rowsp2->account_type_id;	
	
	
	
	
	
    //$credit_account_id=mysql_real_escape_string($_POST['credit_account_id'][$row]);
    //$md_remarks=mysql_real_escape_string($_POST['md_remarks'][$row]);
	
$ttl_cost=$op_quant*$op_cost;


$sql34="INSERT INTO items_opening_balances SET 
	date_recorded='$op_date',
	item_id='$item_id',
	quantity='$op_quant',
	cost='$op_cost',
	amount='$ttl_cost',
	account_credited='$credit_account_id',
	account_debited='$debit_account_id'" or die(mysql_error());
    $results34= mysql_query($sql34) or die ("Error $sql34.".mysql_error()); 




	
}







mysql_close($cnn);


?>


