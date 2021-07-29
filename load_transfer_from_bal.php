<?php 
    include('Connections/fundmaster.php');
//basic invoice details
//$invoice_id=90;
//$invoice_ttl=0;

 $job_card_id= $_GET['account_id'];

// Task value
$task_totals=0;
$consumable=0;
$task_totals2=0;
$disc=0;
$sqlts="SELECT * from ledger_transactions where account_id='$job_card_id'";
$resultsts= mysql_query($sqlts) or die ("Error $sqlts.".mysql_error());
if (mysql_num_rows($resultsts) > 0)
						  {
						  while ($rowsts=mysql_fetch_object($resultsts))
						  {
						$amount=$rowsts->amount;
						$curr_rate=$rowsts->curr_rate;
						 
						 $task_ttl_kshs=$amount*$curr_rate;
						  
						  //cho "</i></br>";
						  $task_totals2=$task_totals2+$task_ttl_kshs;
						  }
						  //echo $task_totals;
			
						  }
						  

//$disc=$discount_perc/100*$task_totals2;

//$sub_ttl1=$task_totals2-$discount_perc; 





echo "Account Balance :<span style='float:right; font-weight:bold; color:#ff0000;'>"; 
 
echo number_format($task_totals2,2); 

echo "</span></br>";


//$job_card_ttl=$job_card_ttl+$task_totals;				  
//othre invoice values
//subtotal 1
//$consumable=$task_totals*0.15;

?>