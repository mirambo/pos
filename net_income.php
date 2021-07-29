<?php
//total income
$income_bal=0;
$sql="select * from account where account_type_id='5'";
$results=mysql_query($sql) or die ("Error $sql.".mysql_error());
  
  if (mysql_num_rows($results) > 0)
						  {
							 while ($rows=mysql_fetch_object($results))
							  { 
$account_id=$rows->account_id;
include ('ni_income_balance.php');

							
  }
  
  number_format($income_bal,2); 
  

  }
  
  
  
 //Cost of sales 
 
$cos_bal=0;
$sql="select * from account where account_type_id='7'";
$results=mysql_query($sql) or die ("Error $sql.".mysql_error());
  
  if (mysql_num_rows($results) > 0)
						  {
							 while ($rows=mysql_fetch_object($results))
							  { 
$account_id=$rows->account_id;
include ('ni_cost_of_sales_balance.php');

							
  }
  
  number_format($cos_bal,2);

//$cos_bal=$cos_bal+$grnd_ttl_orig_amnt;
  

  }  
  
  
  //gross profit
  
  $gross_profit=$income_bal-$cos_bal;
  
  
 //expenses

 $exp_bal=0;
$sql="select * from account where account_type_id='8'";
$results=mysql_query($sql) or die ("Error $sql.".mysql_error());
  
  if (mysql_num_rows($results) > 0)
						  {
							 while ($rows=mysql_fetch_object($results))
							  { 
$account_id=$rows->account_id;
include ('ni_expenses_balance.php');

							
  }
  
   number_format($exp_bal,2);

//$cos_bal=$cos_bal+$grnd_ttl_orig_amnt;
  

  }
  
  //net income
  
  echo number_format($net_income=$gross_profit-$exp_bal,2);
  
  