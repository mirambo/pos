<?php 
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


echo number_format($perc=$task_totals/$task_totals2*100,2);

$gnrt_perc_shares=$gnrt_perc_shares+$perc;

$grnd_shares_kshs=$grnd_shares_kshs+$task_ttl_kshs2;



?>