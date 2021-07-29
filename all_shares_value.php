<?php 
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




//$gnrt_perc_shares=$gnrt_perc_shares+$perc;

echo $grnd_shares_kshs=$grnd_shares_kshs+$task_ttl_kshs2;



?>