<?php
#include connection
include('Connections/fundmaster.php');
include('includes/session.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$date_from=mysql_real_escape_string($_POST['date_from']);
$remarks=mysql_real_escape_string($_POST['remarks']);
$curr_date=date('Y-m-d');

 $curdate=strtotime($curr_date);
 $mydate=strtotime($date_from);
 
 
 


if ($mydate > $curdate)
{ 
?>
<font color="#ff0000">
<script type="text/javascript">
alert('Sorry!!!!!!!Sorry!!!!!. Impossible to close accounts on this date <?php echo $date_from ?>');
window.location = "view_tpla.php";
</script>
</font>
<?php
}

$querylcc="select * from closed_accounts where date_closed < '$date_from'";
$resultslcc=mysql_query($querylcc) or die ("Error: $querylcc.".mysql_error());								  
$rowslcc=mysql_fetch_object($resultslcc);
$numrowscc=mysql_num_rows($resultslcc);
if($numrowscc>0)
{ 
?>
<font color="#ff0000">
<script type="text/javascript">
alert('Sorry!!!!!!!Sorry!!!!!. Accounts for the period ending<?php echo $date_from ?> have already been closed');
window.location = "view_tpla.php";
</script>
</font>
<?php
}



//$lat_closed_accounts_id=$rowslcc->closed_accounts_id;



else
{


$sql= "insert into closed_accounts values ('','','$user_id','7','1','$remarks',NOW(),
'$date_from','','')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


$queryl="select * from closed_accounts order by closed_accounts_id desc limit 1";
$resultsl=mysql_query($queryl) or die ("Error: $queryl.".mysql_error());								  
$rowsl=mysql_fetch_object($resultsl);
$lat_closed_accounts_id=$rowsl->closed_accounts_id;
$transaction_desclg='Balance b/f for the period ending'.$date_from;

//account balance for sales
$sql="select * from sales_ledger where closing_status='0' order by transaction_id desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

if (mysql_num_rows($results) > 0)
						  {
							  $RowCounter=0;
							  while ($rows=mysql_fetch_object($results))
							  { 
	$ledger_no=2;
	$transactions=$rows->transactions;					  
	$amount=$rows->amount;
	$debit=$rows->debit;
	$credit=$rows->credit;
	$currency_code=$rows->currency_code;	
	$curr_rate=$rows->curr_rate;
	$date_recorded=$rows->date_recorded;
	$sales_code=$rows->sales_code;
	$amount_in_kshs=$curr_rate*$amount;
	$grnd_ttl_sales_ksh=$grnd_ttl_sales_ksh+$amount_in_kshs;

/* $sql3="INSERT INTO closed_accounts_transactions VALUES('','$lat_closed_accounts_id','$ledger_no','$transactions',
'$amount','$debit','$credit','$currency_code','$curr_rate','$date_recorded','$date_from','$sales_code',NOW(),'','','','')";
$results3=mysql_query($sql3) or die ("Error $sql3.".mysql_error());	 */
  }
 //delete * from ledgers

  
  

  }
  
  number_format($grnd_ttl_sales_ksh,2);
 


//sales_returns

$sql="select  * from sales_returns_ledger where closing_status='0' order by transaction_id desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

if (mysql_num_rows($results) > 0)
						  {
							  $RowCounter=0;
							  while ($rows=mysql_fetch_object($results))
							 { 
	$ledger_no=4;						 
	$transactions=$rows->transactions;					  
	$amount=$rows->amount;
	$debit=$rows->debit;
	$credit=$rows->credit;
	$currency_code=$rows->currency_code;	
	$curr_rate=$rows->curr_rate;
	$date_recorded=$rows->date_recorded;
	$sales_code=$rows->sales_code;
	$amount_in_kshs=$curr_rate*$amount;
	$ttl_salesret=$ttl_salesret+$amount_in_kshs;
	
/* 	$sql3="INSERT INTO closed_accounts_transactions VALUES('','$lat_closed_accounts_id','$ledger_no','$transactions',
'$amount','$debit','$credit','$currency_code','$curr_rate','$date_recorded','$date_from','$sales_code',NOW(),'','','','')";
$results3=mysql_query($sql3) or die ("Error $sql3.".mysql_error());	 */
	}
	

	
	}
	
	
//cost of production ledger
$sql="select  * from cost_of_production_ledger where closing_status='0' order by transaction_id desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

if (mysql_num_rows($results) > 0)
						  {
							  $RowCounter=0;
							  while ($rows=mysql_fetch_object($results))
							 {
    $ledger_no=19;							 
	$transactions=$rows->transactions;					  
	$amount=$rows->amount;
	$debit=$rows->debit;
	$credit=$rows->credit;
	$currency_code=$rows->currency_code;	
	$curr_rate=$rows->curr_rate;
	$date_recorded=$rows->date_recorded;
	$sales_code=$rows->order_code;
	$amount_in_kshs=$curr_rate*$amount;
	$grss_cop=$grss_cop+$amount_in_kshs;
	
/* 	$sql3="INSERT INTO closed_accounts_transactions VALUES('','$lat_closed_accounts_id','$ledger_no','$transactions',
'$amount','$debit','$credit','$currency_code','$curr_rate','$date_recorded','$date_from','$sales_code',NOW(),'','','','')";
$results3=mysql_query($sql3) or die ("Error $sql3.".mysql_error());	 */
	}
	
/* 	$sqldel= "delete from cost_of_production_ledger";
$resultsdel= mysql_query($sqldel) or die ("Error $sql.".mysql_error()); */
	
	}	
	
	
//income ledger
$sql="select  * from income_ledger where closing_status='0' order by transaction_id desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

if (mysql_num_rows($results) > 0)
						  {
							  $RowCounter=0;
							  while ($rows=mysql_fetch_object($results))
							 { 
	$ledger_no=10;
	$transactions=$rows->transactions;					  
	$amount=$rows->amount;
	$debit=$rows->debit;
	$credit=$rows->credit;
	$currency_code=$rows->currency_code;	
	$curr_rate=$rows->curr_rate;
	$date_recorded=$rows->date_recorded;
	$sales_code=$rows->order_code;
	$amount_in_kshs=$curr_rate*$amount;
	$grnd_ttl_inc=$grnd_ttl_inc+$amount_in_kshs;
	
/* $sql3="INSERT INTO closed_accounts_transactions VALUES('','$lat_closed_accounts_id','$ledger_no','$transactions',
'$amount','$debit','$credit','$currency_code','$curr_rate','$date_recorded','$date_from','$sales_code',NOW(),'','','','')";
$results3=mysql_query($sql3) or die ("Error $sql3.".mysql_error());	 */
	}
	
/* $sqldel= "delete from income_ledger";
$resultsdel= mysql_query($sqldel) or die ("Error $sql.".mysql_error()); */
	
	}		
	
	

//expenses ledger
$sql="select  * from salary_expenses_ledger where closing_status='0'  order by transaction_id desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

if (mysql_num_rows($results) > 0)
						  {
							  $RowCounter=0;
							  while ($rows=mysql_fetch_object($results))
							 { 
							 $ledger_no=8;
	$transactions=$rows->transactions;					  
	$amount=$rows->amount;
	$debit=$rows->debit;
	$credit=$rows->credit;
	$currency_code=$rows->currency_code;	
	$curr_rate=$rows->curr_rate;
	$date_recorded=$rows->date_recorded;
	$sales_code=$rows->order_code;
	$amount_in_kshs=$curr_rate*$amount;
	$ledger_bal_exp=$ledger_bal_exp+$amount_in_kshs;
	
/* $sql3="INSERT INTO closed_accounts_transactions VALUES('','$lat_closed_accounts_id','$ledger_no','$transactions',
'$amount','$debit','$credit','$currency_code','$curr_rate','$date_recorded','$date_from','$sales_code',NOW(),'','','','')";
$results3=mysql_query($sql3) or die ("Error $sql3.".mysql_error());	 */
	}
	
/* $sqldel= "delete from salary_expenses_ledger";
$resultsdel= mysql_query($sqldel) or die ("Error $sql.".mysql_error()); */
	
	}	
	

//miscel expenses ledger
$sql="select * from misc_expenses_ledger where closing_status='0'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

if (mysql_num_rows($results) > 0)
						  {
							  $RowCounter=0;
							  while ($rows=mysql_fetch_object($results))
							 { 
	$ledger_no=21;
	$transactions=$rows->transactions;					  
	$amount=$rows->amount;
	$debit=$rows->debit;
	$credit=$rows->credit;
	$currency_code=$rows->currency_code;	
	$curr_rate=$rows->curr_rate;
	$date_recorded=$rows->date_recorded;
	$sales_code=$rows->order_code;
	$amount_in_kshs=$curr_rate*$amount;
	$gnd_amnt_me=$gnd_amnt_me+$amount_in_kshs;
	
/* $sql3="INSERT INTO closed_accounts_transactions VALUES('','$lat_closed_accounts_id','$ledger_no','$transactions',
'$amount','$debit','$credit','$currency_code','$curr_rate','$date_recorded','$date_from','$sales_code',NOW(),'','','','')";
$results3=mysql_query($sql3) or die ("Error $sql3.".mysql_error());	 */	
	}
/* $sqldel= "delete from misc_expenses_ledger";
$resultsdel= mysql_query($sqldel) or die ("Error $sql.".mysql_error());	 */
	
	
	}	
	
	
//depreciation
$grnd_depr=0;
$sqlinc="select * from fixed_assets,currency where 
fixed_assets.currency=currency.curr_id and fixed_assets.status='0'";
$resultsinc= mysql_query($sqlinc) or die ("Error $sqlinc.".mysql_error());

if (mysql_num_rows($resultsinc) > 0)
						  {
							  $RowCounter=0;
							  while ($rowsinc=mysql_fetch_object($resultsinc))
							 { 
$value=$rowsinc->value;
$curr_rate=$rowsinc->curr_rate;
$value_kshs=$value*$curr_rate;
$dep_value=$rowsinc->dep_value;
$quantity=$rowsinc->quantity;
$dep_value_kshs=$dep_value*$curr_rate*$quantity;
	$curr_date=date('Y-m-d');
$date_purchased=$rowsinc->depreciation_date;

 $curr_date_string= strtotime ($curr_date);	
 $purchase_date_string= strtotime ($date_purchased);

 $period_sec=$curr_date_string-$purchase_date_string;

 $period_days= $period_sec/86400;
 
 $period_years= $period_days/365;
 
 $period_years_final=number_format( $period_years,3);
 
 $ttl_dep=$dep_value_kshs*$period_years_final;
 $grnd_depr=$grnd_depr+$ttl_dep;
	
	
	}
 $grnd_depr;
	}		
	
 echo $net_profit=$grnd_ttl_sales_ksh-$ttl_salesret-$grss_cop+$grnd_ttl_inc-$ledger_bal_exp-$gnd_amnt_me-$grnd_depr;


///balance sheet ledgers

//Cash Balance

//calculation of shares %
$sqlxx="SELECT * FROM shares where status='0' OR status='2'";
$resultsxx= mysql_query($sqlxx) or die ("Error $sqlxx.".mysql_error());

if (mysql_num_rows($resultsxx) > 0)
						  {
							 
							  while ($rowsxx=mysql_fetch_object($resultsxx))
							  { 



$shares_id=$rowsxx->shares_id;
$shareholder=$rowsxx->share_holder_name;



$task_totals=0;
$shares_amnt=0;
$sqlts="select * from shareholder_transactions where shareholder_id='$shares_id'";
$resultsts= mysql_query($sqlts) or die ("Error $sqlts.".mysql_error());
if (mysql_num_rows($resultsts) > 0)
						  {
						  while ($rowsts=mysql_fetch_object($resultsts))
						  {
						  
						  $shares_amnt=$rowsts->amount;
						  $curr_rate=$rowsts->curr_rate;
						  $task_ttl_kshs=$shares_amnt*$curr_rate;
						  $task_totals=$task_totals+$task_ttl_kshs;
						  }
						  //echo $task_totals;
			
						  }
						  
   number_format($task_totals,2); 
  
 

//$grnd_shares_kshs=$grnd_shares_kshs+$task_totals;

$task_totals2=0;
$shares_amnt2=0;
$task_ttl_kshs2=0;
 $sqlts2="select * from shareholder_transactions";
$resultsts2= mysql_query($sqlts2) or die ("Error $sqlts2.".mysql_error());
if (mysql_num_rows($resultsts2) > 0)
						  {
						  while ($rowsts2=mysql_fetch_object($resultsts2))
						  {
						  
						  $shares_amnt2=$rowsts2->amount;
						  $curr_rate2=$rowsts2->curr_rate;
						  $task_ttl_kshs2=$shares_amnt2*$curr_rate2;
						  $task_totals2=$task_totals2+$task_ttl_kshs2;
						  }
						  //echo $task_totals;
			
						  }
						  
   number_format($task_totals2,2); 



$perc=number_format($task_totals/$task_totals2*100,2);	

$shares_take=$perc/100*$net_profit;
'</br>';
$transaction_desc='Retained Earnings for the period ending.'.$date_from;

$sql4="INSERT INTO shareholder_transactions VALUES('','$shares_id','prsh$shares_id','$transaction_desc','7',
'1','$shares_take','$date_from')" or die(mysql_error());
$results4= mysql_query($sql4) or die ("Error $sql4.".mysql_error());

}

}


$sqltranslg= "insert into shares_ledger values('','$transaction_desc','$net_profit','','$net_profit','7','1','$date_from','closed$shares_id','','','')";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());


$sqlpd= "update fixed_assets set depreciation_date='$date_from'";
$resultspd= mysql_query($sqlpd) or die ("Error $sqlpd.".mysql_error());


//tpl ledgers
$sqldel= "update sales_ledger set closing_status='1', closing_date='$date_from' where closing_status='0'";
$resultsdel= mysql_query($sqldel) or die ("Error $sql.".mysql_error());

$sqldel= "update sales_returns_ledger set closing_status='1', closing_date='$date_from' where closing_status='0'";
$resultsdel= mysql_query($sqldel) or die ("Error $sql.".mysql_error());

$sqldel= "update cost_of_production_ledger set closing_status='1', closing_date='$date_from' where closing_status='0'";
$resultsdel= mysql_query($sqldel) or die ("Error $sql.".mysql_error());


$sqldel= "update income_ledger set closing_status='1', closing_date='$date_from' where closing_status='0'";
$resultsdel= mysql_query($sqldel) or die ("Error $sql.".mysql_error());

$sqldel= "update salary_expenses_ledger set closing_status='1', closing_date='$date_from' where closing_status='0'";
$resultsdel= mysql_query($sqldel) or die ("Error $sql.".mysql_error());

$sqldel= "update misc_expenses_ledger set closing_status='1', closing_date='$date_from' where closing_status='0'";
$resultsdel= mysql_query($sqldel) or die ("Error $sql.".mysql_error());




//bal sheet ledgers
$sqldel= "update cash_ledger set closing_status='1', closing_date='$date_from' where closing_status='0'";
$resultsdel= mysql_query($sqldel) or die ("Error $sql.".mysql_error());


$sqldel= "update bank_ledger set closing_status='1', closing_date='$date_from' where closing_status='0'";
$resultsdel= mysql_query($sqldel) or die ("Error $sql.".mysql_error());


$sqldel= "update inventory_ledger set closing_status='1', closing_date='$date_from' where closing_status='0'";
$resultsdel= mysql_query($sqldel) or die ("Error $sql.".mysql_error());


$sqldel= "update accounts_receivables_ledger set closing_status='1', closing_date='$date_from' where closing_status='0'";
$resultsdel= mysql_query($sqldel) or die ("Error $sql.".mysql_error());


$sqldel= "update prepaid_expenses_ledger set closing_status='1', closing_date='$date_from' where closing_status='0'";
$resultsdel= mysql_query($sqldel) or die ("Error $sql.".mysql_error());

$sqldel= "update pending_purchases_ledger set closing_status='1', closing_date='$date_from' where closing_status='0'";
$resultsdel= mysql_query($sqldel) or die ("Error $sql.".mysql_error());

$sqldel= "update accounts_payables_ledger set closing_status='1', closing_date='$date_from' where closing_status='0'";
$resultsdel= mysql_query($sqldel) or die ("Error $sql.".mysql_error());

$sqldel= "update notes_payables_ledger set closing_status='1', closing_date='$date_from' where closing_status='0'";
$resultsdel= mysql_query($sqldel) or die ("Error $sql.".mysql_error());

$sqldel= "update shares_ledger set closing_status='1', closing_date='$date_from' where closing_status='0'";
$resultsdel= mysql_query($sqldel) or die ("Error $sql.".mysql_error());

//$total_liab=$ledger_bal_ap+$ledger_bal_notesp+$ledger_bal_shares;

//$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'Updated a cash widthdrawal of worth $curr_name $amount into the system')";
//$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());

//header ("Location:edit_cashwithdrawal.php?cash_withdrawal_id=$id&editconfirm=1");

?>
<script type="text/javascript">
alert('Financial accounts have been closed successfuly');
window.location = "view_tpla.php";

</script>
<?php
}


mysql_close($cnn);


?>


