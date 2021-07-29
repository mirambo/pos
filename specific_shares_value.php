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
  
   echo number_format($perc=$task_totals/$task_totals2*100,2);
?>