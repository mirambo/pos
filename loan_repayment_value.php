<?php
$ttl_loan_repaid=0;
$sqlrec="select * from loan_repayments where loan_received_id='$loan_received_id'";
$resultsrec= mysql_query($sqlrec) or die ("Error $sqlrec.".mysql_error());

if (mysql_num_rows($resultsrec) > 0)
						  {
							  $RowCounter=0;
							  while ($rowsrec=mysql_fetch_object($resultsrec))
							  { 
							  $repaid_amount=$rowsrec->amount_received;
							  $curr_rate=$rowsrec->curr_rate;
							  
							  $repaid_loan_kshs=$repaid_amount*$curr_rate;
							   $ttl_loan_repaid=$ttl_loan_repaid+$repaid_loan_kshs;
							  
							  }
							    echo number_format($ttl_loan_repaid,2);
							  }
							  
							 
							  
							  ?>