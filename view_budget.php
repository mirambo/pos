<?php 
/* $qr_confirm23v="SELECT * from user_group_submodule WHERE sub_module_id='$sub_module_id' and `add`='A' and user_group_id='$user_group_id'";
$qr_res23v=mysql_query($qr_confirm23v) or die ('Error : $qr_confirm23v.' .mysql_error());
$num_rows23v=mysql_num_rows($qr_res23v); 
if ($num_rows23v==0) 
{ 
include ('includes/restricted.php');

}
else
{ */

$budget_year=$_POST['budget_year'];

?>

<script type="text/javascript" src="calender/calendar.js"></script>
<script type="text/javascript" src="calender/lang/calendar-en.js"></script>
<script type="text/javascript" src="calender/calendar-setup.js"></script>
<style type="text/css">

@import url(calender/calendar-win2k-1.css);

</style>

<style type="text/css">
.table
{
border-collapse:collapse;
}
.table td, tr
{
border:1px solid black;
padding:3px;
}


th {
  background: white;
  position: sticky;
  top: 0;
  box-shadow: 0 2px 2px -1px rgba(0, 0, 0, 0.4);
}

p {


}
</style>

<link href="css/superTables.css" rel="stylesheet" type="text/css" />

<form name="search" method="post" action="">  
  


<table width="100%" border="0" align="center" style="margin:auto;" class="table">

<tr bgcolor="#FFFFCC">
   
    <td  height="30"  colspan="9" align="center">
	

    
    Budget Year
<select name="budget_year" required style="width:150px;">
	
<option value="">Select..............................</option>
<?php 
$ending_year='2021';
$starting_year=date('Y')+1;


for($starting_year; $starting_year >= $ending_year; $starting_year--) {
    if($starting_year == date('Y')) {
        echo '<option value="'.$starting_year.'" selected="selected">'.$starting_year.'</option>';
    } else {
        echo '<option value="'.$starting_year.'">'.$starting_year.'</option>';
    }
} 
	?>							 
								  
								  </select> 
	<input type="submit" name="generate" value="Generate"></td>
	
    </tr>
	
	<tr bgcolor="#FFFFCC">
   
    <td colspan="9" height="30" align="right"><font size="+1">
	<!--<a target="_blank" style="float:right; margin-right:200px; font-weight:bold; font-size:13px; color:#000000" href="print_list_tpla.php?date_from=<?php echo $date_from;?>&date_to=<?php echo $date_to;?>">Print</a>-->						  

<a style="float:right; margin-right:50px; font-weight:bold; font-size:13px; color:#000000" href="print_budget_excel.php?date_from=<?php echo $budget_year;?>">Export To Excel</a>						  
	
	
	</td>
	</tr>
  	</table>
<DIV class=fakeContainer>

<table width="100%" border="0" class=demoTable id=demoTable align="center">


						
						
						
						
						
						
						<tr><td><strong></strong></td> <?php 
						
						
						
						
			
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						

for ($m=1; $m<=12; $m++)

	{
     $month_val = date('m', mktime(0,0,0,$m, 1, date('Y')));
     $month2 = date('M', mktime(0,0,0,$m, 1, date('Y')));
						
						?>	 
						<td align="center" bgcolor="#ccc"><strong>Actual </br><?php 
						
						echo $month2;
						
						echo '</br>';
						
						if (!isset($_POST['generate']))
						{
						
						$curr_year=date('Y', time());
						
						}
						else
						{
						
                       $curr_year=$_POST['budget_year'];						
							
						}
						
						$curr_year;
						
						echo $prev_year=$curr_year-1;
						
						?></strong></td>
                        <td align="center" bgcolor="#33FF99"><strong>Predictable </br><?php 
						
						echo $month2;
						
						echo '</br>';
						
						//echo '2018';
						echo $curr_year;
						
						
						?></strong></td>
						
						                        <td align="center" bgcolor="#FF9999"><strong>Actual </br><?php 
						
						echo $month2;
						
						
						echo '</br>';
						
						//echo '2018';
						echo $curr_year;
						
						
						?></strong></td>
						
						
						
						<?php } 
						
						
						?>
						<td align="center"><strong><strong>Total Actual
						</br>
						<?php 
						if (!isset($_POST['generate']))
						{
						
						$curr_year=date('Y', time());
						
						}
						else
						{
						
                       $curr_year=$_POST['budget_year'];						
							
						}
						
						$curr_year;
						
						echo $prev_year=$curr_year-1;
						
						
						?>
						
						</strong><strong></td>
						<td align="center"><strong><strong>Total Predictable
						<?php 
												echo '</br>';
						
						//echo '2018';
						echo $curr_year;
						
						?>
						
						</strong></strong></td>
						<td align="center"><strong><strong>Total Actual
						
						<?php 
						
						
						echo '</br>';
						

						echo $curr_year;
						
						
						?>
						
						</strong></strong></td>
						
					<td align="center"><strong><strong>Upated Budget
						
						<?php 
						
						
						echo '</br>';
						

						echo $curr_year;
				
						
						
						?>
						
						</strong></strong></td>
						
						
						</tr>
						
<tr bgcolor="#ccc">
<td colspan="41"><strong>SERVICES REVENUE</strong></td>
						
						
						</tr>
						
						
						
						<?php 
 
 //sales income
$queryop="select * FROM account_type where account_cat_id='7' group by main_account_code";
$results= mysql_query($queryop) or die ("Error $queryop.".mysql_error());
while ($rows=mysql_fetch_object($results))
	
{
	
	
 
 ?>
 
 
 
 <tr><td width="70%"><?php echo $rows->main_account_code.' '. $rows->account_type_name; ?></td>
 <?php 

for ($m=1; $m<=12; $m++)

	{
     $month_val = date('m', mktime(0,0,0,$m, 1, date('Y')));
     $month2 = date('M', mktime(0,0,0,$m, 1, date('Y')));
						
						?>	 
						<td align="right" bgcolor="#ccc"><?php 
						
						$month_val;
						
						if (!isset($_POST['generate']))
						{
						
						$curr_year=date('Y', time());
						
						}
						else
						{
						
                       $curr_year=$_POST['budget_year'];						
							
						}
						
						$curr_year;
											
	       					
						$prev_year=$curr_year-1;
						
						
						$account_type_id=$rows->account_type_id;
						$main_account_code=$rows->main_account_code;
						
						
/////////////////////////////////actual previous year	
			
$query_curr="select SUM(amount*curr_rate) AS ttl_amount FROM chart_transactions,account_type where 
chart_transactions.account_type_id=account_type.account_type_id and account_type.main_account_code='$main_account_code' 
and l_month='$month_val' and l_year='$prev_year'";
$results_curr= mysql_query($query_curr) or die ("Error $query_curr.".mysql_error());
$rows_curr=mysql_fetch_object($results_curr);

$ttl_amount=$rows_curr->ttl_amount;

if ($ttl_amount=='' || $ttl_amount==0)
{
echo ' - ';	
}
else
{

//echo number_format($ttl_amount,2);

//echo '</br>';
echo number_format(round($ttl_amount, -4),2);


}	

		
						
						
						
						
						?></td>
<td align="right" bgcolor="#33FF99"><?php 

/////////////////////////////////predicted / budgeted current year

$account_type_id=$rows->account_type_id;
						
																	
$queryop_pred="select budget_amount,curr_rate FROM budget,budget_code,account_type where 
budget_code.budget_account=account_type.account_type_id and budget_code.budget_code_id=budget.budget_code_id 
and budget.budget_month='$month_val' AND budget_code.budget_year='$curr_year' AND budget_code.budget_account='$account_type_id'";
$results_pred= mysql_query($queryop_pred) or die ("Error $queryop_pred.".mysql_error());
$rows_pred=mysql_fetch_object($results_pred);
$ttl_amount_pred=$rows_pred->budget_amount;
$pred_curr_rate=$rows_pred->curr_rate;

$ttl_amount_pred_tshs=$ttl_amount_pred*$pred_curr_rate;


if ($ttl_amount_pred=='' || $ttl_amount_pred==0)
{
echo ' - ';	
}
else
{
	
//echo number_format($ttl_amount_pred_tshs,2);

echo number_format(round($ttl_amount_pred_tshs, -4),2);
						
}	

				
						
						
						?></td>
						
						
						<td align="right" bgcolor="#FF9999"><?php 
						
							






$account_type_id=$rows->account_type_id;
$main_account_code=$rows->main_account_code;
						
						
						
						
$queryop_curr="select SUM(amount*curr_rate) AS ttl_amount_curr_act FROM chart_transactions,account_type where 
chart_transactions.account_type_id=account_type.account_type_id and account_type.main_account_code='$main_account_code' 
and l_month='$month_val' and l_year='$curr_year'";
$results_curr= mysql_query($queryop_curr) or die ("Error $queryop_curr.".mysql_error());
$rows_curr=mysql_fetch_object($results_curr);
$ttl_amount_curr_act=$rows_curr->ttl_amount_curr_act;

if ($ttl_amount_curr_act=='' || $ttl_amount_curr_act==0)
{
echo ' - ';	
}
else
{
	
//echo number_format($ttl_amount_curr_act,2);

echo number_format(round($ttl_amount_curr_act, -4),2);


						
}					
						
						
						?></td>
						
						
						
						<?php } 
						
						
						?>
						
						
						<td align="right"><strong>
<?php 						
$query_curr="select SUM(amount*curr_rate) AS ttl_prev_amount FROM chart_transactions,account_type where 
chart_transactions.account_type_id=account_type.account_type_id and account_type.main_account_code='$main_account_code' and l_year='$prev_year'";
$results_curr= mysql_query($query_curr) or die ("Error $query_curr.".mysql_error());
$rows_curr=mysql_fetch_object($results_curr);

$ttl_prev_amount=$rows_curr->ttl_prev_amount;

if ($ttl_prev_amount=='' || $ttl_prev_amount==0)
{
echo ' - ';	
}
else
{

//echo number_format($ttl_prev_amount,2);

echo number_format(round($ttl_prev_amount, -4),2);


}						
						
	$all_prev_sales=$all_prev_sales+$ttl_prev_amount;					
						
?>						
						
						
						
						
						</strong></td>
						
						<td align="right"><strong>
	<?php 

$curr_year;	
$queryop_pred="select SUM(budget_amount*curr_rate) AS all_ttl_amount_pred FROM budget,budget_code,account_type where 
budget_code.budget_account=account_type.account_type_id and budget_code.budget_code_id=budget.budget_code_id 
and budget_code.budget_year='$curr_year' AND budget_code.budget_account='$account_type_id'";
$results_pred= mysql_query($queryop_pred) or die ("Error $queryop_pred.".mysql_error());
$rows_pred=mysql_fetch_object($results_pred);
$all_ttl_amount_pred=$rows_pred->all_ttl_amount_pred;
$all_pred_curr_rate=$rows_pred->curr_rate;

//$all_ttl_amount_pred_tshs=$all_ttl_amount_pred*$all_pred_curr_rate;

if ($all_ttl_amount_pred=='' || $all_ttl_amount_pred==0)
{
echo ' - ';	
}
else
{
	
//echo number_format($all_ttl_amount_pred,2);

echo number_format(round($all_ttl_amount_pred, -4),2);
						
}					
						
$all_pred_sales=$all_pred_sales+$all_ttl_amount_pred;						
						?>						
						
						
						
						
						
						
						
						
						</strong>
						
						</td>
						
						<td align="right"><strong>
<?php

$queryop_curr="select SUM(amount*curr_rate) AS ttl_amount_curr_act_all FROM chart_transactions,account_type where 
chart_transactions.account_type_id=account_type.account_type_id and account_type.main_account_code='$main_account_code' and l_year='$curr_year'";
$results_curr= mysql_query($queryop_curr) or die ("Error $queryop_curr.".mysql_error());
$rows_curr=mysql_fetch_object($results_curr);
$ttl_amount_curr_act_all=$rows_curr->ttl_amount_curr_act_all;

if ($ttl_amount_curr_act_all=='' || $ttl_amount_curr_act_all==0)
{
echo ' - ';	
}
else
{
	
//echo number_format($ttl_amount_curr_act_all,2);

echo number_format(round($ttl_amount_curr_act_all, -4),2);
						
}	






$all_actual_sales=$all_actual_sales+$ttl_amount_curr_act_all;

 ?>						
						
						
			
	</strong>					
						
						</td>
						
						
						<td align="right"><strong>
						

<?php
$curr_year; 

$curr_month=date('m', time());

////////////updated predictable for this year.

$queryop_pred="select SUM(budget_amount*curr_rate) AS updated_predict FROM budget,budget_code,account_type where 
budget_code.budget_account=account_type.account_type_id and budget_code.budget_code_id=budget.budget_code_id 
and budget_code.budget_year='$curr_year' AND budget.budget_month>='$curr_month' AND budget_code.budget_account='$account_type_id'";
$results_pred= mysql_query($queryop_pred) or die ("Error $queryop_pred.".mysql_error());
$rows_pred=mysql_fetch_object($results_pred);

$updated_predict=$rows_pred->updated_predict;


////////////updated actual for this year.


$queryop_curr="select SUM(amount*curr_rate) AS updated_actual FROM chart_transactions,account_type where 
chart_transactions.account_type_id=account_type.account_type_id and account_type.main_account_code='$main_account_code' and l_year='$curr_year' 
and l_month<'$curr_month'";
$results_curr= mysql_query($queryop_curr) or die ("Error $queryop_curr.".mysql_error());
$rows_curr=mysql_fetch_object($results_curr);

$updated_actual=$rows_curr->updated_actual;


//echo number_format($updated_budget=$updated_actual+$updated_predict,2);

echo number_format(round($updated_budget=$updated_actual+$updated_predict, -4),2);


$all_updated_sales=$all_updated_sales+$updated_budget;

 ?>						
						
						
						
						
					</strong>	
					
						</td>
 
 </tr>
 
 <?php 
}


 
 ?>
 
						<tr bgcolor="#ccc">
						<td><strong>Total Revenue</strong></td>
						
					<?php 

for ($m=1; $m<=12; $m++)

	{
     $month_val = date('m', mktime(0,0,0,$m, 1, date('Y')));
     $month2 = date('M', mktime(0,0,0,$m, 1, date('Y')));
						
						?>	 
						<td align="right" bgcolor="#ccc"><strong><?php 
						
						

if (!isset($_POST['generate']))
						{
						
						$curr_year_ttl=date('Y', time());
						
						}
						else
						{
						
                       $curr_year_ttl=$_POST['budget_year'];						
							
						}
						
					$curr_year_ttl;						
						
					$prev_year_ttl=$curr_year_ttl-1;	
												
			
$query_ttl_act="select sum(amount*curr_rate) as ttl_act FROM chart_transactions,account_type WHERE 
account_type.account_type_id=chart_transactions.account_type_id AND chart_transactions.l_year='$prev_year_ttl' 
and chart_transactions.l_month='$month_val' and account_type.account_cat_id='7'";
$results_ttl_act= mysql_query($query_ttl_act) or die ("Error $queryop_ttl_act.".mysql_error());
$rows_ttl_act=mysql_fetch_object($results_ttl_act);

//echo number_format($ttl_act_inc=$rows_ttl_act->ttl_act,2);	


echo number_format(round($ttl_act_inc=$rows_ttl_act->ttl_act, -4),2);
						
						
						
						
						?></strong></td>
						<td align="right" bgcolor="#33FF99"><strong><?php 
						
				
$query_ttl_pred="select sum(budget_amount*curr_rate) as ttl_pred FROM budget,budget_code,account_type
WHERE account_type.account_type_id=budget_code.budget_account and budget_code.budget_code_id=budget.budget_code_id 
AND budget_code.budget_year='$curr_year_ttl' and budget.budget_month='$month_val' and account_type.account_cat_id='7'";
$results_ttl_pred= mysql_query($query_ttl_pred) or die ("Error $queryop_ttl_pred.".mysql_error());
$rows_ttl_pred=mysql_fetch_object($results_ttl_pred);




//echo number_format($ttl_pred_inc=$rows_ttl_pred->ttl_pred,2);	


echo number_format(round($ttl_pred_inc=$rows_ttl_pred->ttl_pred, -4),2);
						
											
						
						
						?></strong></td>
						
						<td align="right" bgcolor="#FF9999">
						
<?php 


$query_ttl_act_curr="select sum(amount*curr_rate) as ttl_act FROM chart_transactions,account_type WHERE 
account_type.account_type_id=chart_transactions.account_type_id AND chart_transactions.l_year='$curr_year_ttl' 
and chart_transactions.l_month='$month_val' 
and account_type.account_cat_id='7'";
$results_ttl_act_curr= mysql_query($query_ttl_act_curr) or die ("Error $queryop_ttl_act_curr.".mysql_error());
$rows_ttl_act_curr=mysql_fetch_object($results_ttl_act_curr);

//echo number_format($ttl_act_inc_curr=$rows_ttl_act_curr->ttl_act,2);	


echo number_format(round($ttl_act_inc_curr=$rows_ttl_act_curr->ttl_act, -4),2);



?>						
						
						
						
						
						
						
						</td>
						
						
						
						<?php } 
						
						
						?>	
						<td align="right"><strong><?php 
						
						
						//echo number_format($all_prev_sales,2); 
						
						
						
						echo number_format(round($all_prev_sales, -4),2);
						
						
						
						?></strong></td>
						<td align="right"><strong><?php 
						
						//echo number_format($all_pred_sales,2); 
						
						
						
						
						echo number_format(round($all_pred_sales, -4),2);
						
						
						
						
						
						?></strong></td>
						<td align="right"><strong><?php 
						
						//echo number_format($all_actual_sales,2); 
						
						echo number_format(round($all_actual_sales, -4),2);
						
						?></strong></td>
						<td align="right"><strong><?php 
						
						//echo number_format($all_updated_sales,2); 
						
						
						
						echo number_format(round($all_updated_sales, -4),2);
						
						
						
						
						?></strong></td>
 </tr>
						
						
				
						
						
	<tr bgcolor="#ccc">
						<td colspan="41"><strong>COST OF OPERATION</strong></td>
						
						
						</tr>
						
						
						
						<?php 
 
 //cost of sales
$queryop="select * FROM account_type where account_cat_id='5' group by main_account_code ORDER BY main_account_code asc";
$results= mysql_query($queryop) or die ("Error $queryop.".mysql_error());
while ($rows=mysql_fetch_object($results))
{
	
	
 
 ?>
 
 
 
 <tr><td width="70%"><?php echo $rows->main_account_code.' '. $rows->account_type_name; ?></td>
 <?php 

for ($m=1; $m<=12; $m++)

	{
     $month_val = date('m', mktime(0,0,0,$m, 1, date('Y')));
     $month2 = date('M', mktime(0,0,0,$m, 1, date('Y')));
						
						?>	 
						<td align="right" bgcolor="#ccc"><?php 
						
						$month_val;
						
						if (!isset($_POST['generate']))
						{
						
						$curr_year=date('Y', time());
						
						}
						else
						{
						
                       $curr_year=$_POST['budget_year'];						
							
						}
						
						$curr_year;
						
						$account_type_id=$rows->account_type_id;
						$main_account_code=$rows->main_account_code;
						
     $prev_year=$curr_year-1;
						
						
						
						
$query_curr="select SUM(amount*curr_rate) AS ttl_amount FROM chart_transactions,account_type where 
chart_transactions.account_type_id=account_type.account_type_id and account_type.main_account_code='$main_account_code' 
and l_month='$month_val' and l_year='$prev_year'";
$results_curr= mysql_query($query_curr) or die ("Error $query_curr.".mysql_error());
$rows_curr=mysql_fetch_object($results_curr);

$ttl_amount=$rows_curr->ttl_amount;

if ($ttl_amount=='' || $ttl_amount==0)
{
echo ' - ';	
}
else
{

//echo number_format($ttl_amount,2);

echo number_format(round($ttl_amount, -4),2);
}
						
						
						
						
						
						
						
						
						
						
					
						
						
						
						
						
						?></td>
						<td align="right" bgcolor="#33FF99"><?php 
						
						$month_val;
						
	
						
						
$account_type_id=$rows->account_type_id;

$main_account_code=$rows->main_account_code;
						
						
						
$queryop_curr="select budget_amount,curr_rate FROM budget,budget_code,account_type where 
budget_code.budget_account=account_type.account_type_id and budget_code.budget_code_id=budget.budget_code_id 
and budget.budget_month='$month_val' and budget_code.budget_year='$curr_year' AND budget_code.budget_account='$account_type_id'";
$results_curr= mysql_query($queryop_curr) or die ("Error $queryop_curr.".mysql_error());
$rows_curr=mysql_fetch_object($results_curr);
$budget_amount=$rows_curr->budget_amount;

if ($budget_amount=='' || $budget_amount==0)
{
echo ' - ';	
}
else
{
//echo number_format($budget_amount*$rows_curr->curr_rate,2);		

echo number_format(round($budget_amount*$rows_curr->curr_rate, -4),2);				
}
						
						
						?></td>
						
						<td align="right" bgcolor="#FF9999">
						
<?php 						
$query_curr="select SUM(amount*curr_rate) AS ttl_amount FROM chart_transactions,account_type where 
chart_transactions.account_type_id=account_type.account_type_id and account_type.main_account_code='$main_account_code' 
and l_month='$month_val' and l_year='$curr_year'";
$results_curr= mysql_query($query_curr) or die ("Error $query_curr.".mysql_error());
$rows_curr=mysql_fetch_object($results_curr);

$ttl_amount_curr_act=$rows_curr->ttl_amount;

if ($ttl_amount_curr_act=='' || $ttl_amount_curr_act==0)
{
echo ' - ';	
}
else
{

//echo number_format($ttl_amount_curr_act,2);


echo number_format(round($ttl_amount_curr_act, -4),2);	
}						
						
						
		?>				
						
						
						
						</td>
						
						
						
						<?php } 
						
						
						?>
						
						<td align="right"><strong>
<?php 						
$query_curr="select SUM(amount*curr_rate) AS ttl_prev_amount FROM chart_transactions,account_type where 
chart_transactions.account_type_id=account_type.account_type_id and account_type.main_account_code='$main_account_code' and l_year='$prev_year'";
$results_curr= mysql_query($query_curr) or die ("Error $query_curr.".mysql_error());
$rows_curr=mysql_fetch_object($results_curr);

$ttl_prev_amount=$rows_curr->ttl_prev_amount;

if ($ttl_prev_amount=='' || $ttl_prev_amount==0)
{
echo ' - ';	
}
else
{

//echo number_format($ttl_prev_amount,2);

echo number_format(round($ttl_prev_amount, -4),2);


}						
						
	$all_prev_cos=$all_prev_cos+$ttl_prev_amount;					
						
?>						
						
						
						
						
						</strong></td>
						
						<td align="right"><strong>
	<?php 

$curr_year;	
$queryop_pred="select SUM(budget_amount*curr_rate) AS all_ttl_amount_pred FROM budget,budget_code,account_type where 
budget_code.budget_account=account_type.account_type_id and budget_code.budget_code_id=budget.budget_code_id 
and budget_code.budget_year='$curr_year' AND budget_code.budget_account='$account_type_id'";
$results_pred= mysql_query($queryop_pred) or die ("Error $queryop_pred.".mysql_error());
$rows_pred=mysql_fetch_object($results_pred);
$all_ttl_amount_pred=$rows_pred->all_ttl_amount_pred;
$all_pred_curr_rate=$rows_pred->curr_rate;

//$all_ttl_amount_pred_tshs=$all_ttl_amount_pred*$all_pred_curr_rate;

if ($all_ttl_amount_pred=='' || $all_ttl_amount_pred==0)
{
echo ' - ';	
}
else
{
	
//echo number_format($all_ttl_amount_pred,2);

echo number_format(round($all_ttl_amount_pred, -4),2);
						
}					
						
$all_pred_cos=$all_pred_cos+$all_ttl_amount_pred;						
						?>						
						
						
						
						
						
						
						
						
						</strong>
						
						</td>
						
						<td align="right"><strong>
<?php

$queryop_curr="select SUM(amount*curr_rate) AS ttl_amount_curr_act_all FROM chart_transactions,account_type where 
chart_transactions.account_type_id=account_type.account_type_id and account_type.main_account_code='$main_account_code' and l_year='$curr_year'";
$results_curr= mysql_query($queryop_curr) or die ("Error $queryop_curr.".mysql_error());
$rows_curr=mysql_fetch_object($results_curr);
$ttl_amount_curr_act_all=$rows_curr->ttl_amount_curr_act_all;

if ($ttl_amount_curr_act_all=='' || $ttl_amount_curr_act_all==0)
{
echo ' - ';	
}
else
{
	
//echo number_format($ttl_amount_curr_act_all,2);

echo number_format(round($ttl_amount_curr_act_all, -4),2);
						
}	






$all_actual_cos=$all_actual_cos+$ttl_amount_curr_act_all;

 ?>						
						
						
			
	</strong>					
						
						</td>
						
						
						<td align="right"><strong>
						

<?php
$curr_year; 

$curr_month=date('m', time());

////////////updated predictable for this year.

$queryop_pred="select SUM(budget_amount*curr_rate) AS updated_predict FROM budget,budget_code,account_type where 
budget_code.budget_account=account_type.account_type_id and budget_code.budget_code_id=budget.budget_code_id 
and budget_code.budget_year='$curr_year' AND budget.budget_month>='$curr_month' AND budget_code.budget_account='$account_type_id'";
$results_pred= mysql_query($queryop_pred) or die ("Error $queryop_pred.".mysql_error());
$rows_pred=mysql_fetch_object($results_pred);

$updated_predict=$rows_pred->updated_predict;


////////////updated actual for this year.


$queryop_curr="select SUM(amount*curr_rate) AS updated_actual FROM chart_transactions,account_type where 
chart_transactions.account_type_id=account_type.account_type_id and account_type.main_account_code='$main_account_code' and l_year='$curr_year' 
and l_month<'$curr_month'";
$results_curr= mysql_query($queryop_curr) or die ("Error $queryop_curr.".mysql_error());
$rows_curr=mysql_fetch_object($results_curr);

$updated_actual=$rows_curr->updated_actual;


//echo number_format($updated_budget=$updated_actual+$updated_predict,2);


echo number_format(round($updated_budget=$updated_actual+$updated_predict, -4),2);


$all_updated_cos=$all_updated_cos+$updated_budget;

 ?>						
						
						
						
						
					</strong>	
					
						</td>
 
 </tr>
 
 <?php 
}


 
 ?>
 
						<tr bgcolor="#ccc">
						<td><strong>Total Cost Operation</strong></td>
						
					<?php 

for ($m=1; $m<=12; $m++)

	{
     $month_val = date('m', mktime(0,0,0,$m, 1, date('Y')));
     $month2 = date('M', mktime(0,0,0,$m, 1, date('Y')));
						
						?>	 
						<td align="right" bgcolor="#ccc"><strong><?php 
						
						

if (!isset($_POST['generate']))
						{
						
						$curr_year_ttl=date('Y', time());
						
						}
						else
						{
						
                       $curr_year_ttl=$_POST['budget_year'];						
							
						}
						
					$curr_year_ttl;	

$prev_year_ttl=$curr_year_ttl-1;					
$query_ttl_act="select sum(amount*curr_rate) as ttl_act FROM chart_transactions,account_type WHERE 
account_type.account_type_id=chart_transactions.account_type_id AND chart_transactions.l_year='$prev_year_ttl' 
and chart_transactions.l_month='$month_val' 
and account_type.account_cat_id='5'";
$results_ttl_act= mysql_query($query_ttl_act) or die ("Error $queryop_ttl_act.".mysql_error());
$rows_ttl_act=mysql_fetch_object($results_ttl_act);

number_format($ttl_act_cos=$rows_ttl_act->ttl_act,2);	

echo number_format(round($ttl_act_cos=$rows_ttl_act->ttl_act, -4),2);				
						
						
				
						
						
						
						
						
						?></strong></td>
						<td align="right" bgcolor="#33FF99"><strong><?php 
						
												
$query_ttl_pred="select sum(budget_amount*curr_rate) as ttl_pred FROM budget,budget_code,account_type
 WHERE account_type.account_type_id=budget_code.budget_account and budget_code.budget_code_id=budget.budget_code_id 
AND budget_code.budget_year='$curr_year_ttl' and budget.budget_month='$month_val' and account_type.account_cat_id='5'";
$results_ttl_pred= mysql_query($query_ttl_pred) or die ("Error $queryop_ttl_pred.".mysql_error());
$rows_ttl_pred=mysql_fetch_object($results_ttl_pred);

//echo number_format($ttl_pred_cos=$rows_ttl_pred->ttl_pred,2);


echo number_format(round($ttl_pred_cos=$rows_ttl_pred->ttl_pred, -4),2);
						
											
						
						
						?></strong></td>
<td align="right" bgcolor="#FF9999">


<strong><?php 
						
												



$query_ttl_act="select sum(amount*curr_rate) as ttl_act FROM chart_transactions,account_type WHERE 
account_type.account_type_id=chart_transactions.account_type_id AND chart_transactions.l_year='$curr_year_ttl' 
and chart_transactions.l_month='$month_val' 
and account_type.account_cat_id='5'";
$results_ttl_act= mysql_query($query_ttl_act) or die ("Error $queryop_ttl_act.".mysql_error());
$rows_ttl_act=mysql_fetch_object($results_ttl_act);

//echo number_format($ttl_curr_act_cos=$rows_ttl_act->ttl_act,2);


echo number_format(round($ttl_curr_act_cos=$rows_ttl_act->ttl_act, -4),2);
						
											
						
						
						?></strong>






</td>						
						
						
						<?php } 
						
						
						?>	
						
						<td align="right"><strong><?php //echo number_format($all_prev_cos,2); 
						
						
						
						
						echo number_format(round($all_prev_cos, -4),2);
						
						
						
						?></strong></td>
						<td align="right"><strong><?php //echo number_format($all_pred_cos,2); 
						
						
						
						echo number_format(round($all_pred_cos, -4),2);
						
						
						
						
						
						?></strong></td>
						<td align="right"><strong><?php //echo number_format($all_actual_cos,2); 
						
						
						
						echo number_format(round($all_actual_cos, -4),2);
						
						
						
						?></strong></td>
						<td align="right"><strong><?php //echo number_format($all_updated_cos,2); 
						
						
						
						echo number_format(round($all_updated_cos, -4),2);
						
						
						
						
						?></strong></td>						
						
						
						
						
						</tr>					
						
						
						
						
<tr>
						<tr bgcolor="#ccc" height="50">
						<td><strong>Gross Margin</strong></td>
						
<?php 

for ($m=1; $m<=12; $m++)

	{
     $month_val = date('m', mktime(0,0,0,$m, 1, date('Y')));
     $month2 = date('M', mktime(0,0,0,$m, 1, date('Y')));
						
						?>
						
						<td align="right" bgcolor="#ccc"><?php //echo $ttl_pred_cos;
						
						

						
						

if (!isset($_POST['generate']))
						{
						
						$curr_year_ttl=date('Y', time());
						
						}
						else
						{
						
                       $curr_year_ttl=$_POST['budget_year'];						
							
						}
						
					$curr_year_ttl;	
					
					
$prev_year_ttl=$curr_year_ttl-1;					
$query_ttl_act="select sum(amount*curr_rate) as ttl_act FROM chart_transactions,account_type WHERE 
account_type.account_type_id=chart_transactions.account_type_id AND chart_transactions.l_year='$prev_year_ttl' 
and chart_transactions.l_month='$month_val' 
and account_type.account_cat_id='7'";
$results_ttl_act= mysql_query($query_ttl_act) or die ("Error $queryop_ttl_act.".mysql_error());
$rows_ttl_act=mysql_fetch_object($results_ttl_act);

number_format($ttl_act_inc=$rows_ttl_act->ttl_act,2);



$prev_year_ttl=$curr_year_ttl-1;					
$query_ttl_act="select sum(amount*curr_rate) as ttl_act FROM chart_transactions,account_type WHERE 
account_type.account_type_id=chart_transactions.account_type_id AND chart_transactions.l_year='$prev_year_ttl' 
and chart_transactions.l_month='$month_val' 
and account_type.account_cat_id='5'";
$results_ttl_act= mysql_query($query_ttl_act) or die ("Error $queryop_ttl_act.".mysql_error());
$rows_ttl_act=mysql_fetch_object($results_ttl_act);

number_format($ttl_act_cos=$rows_ttl_act->ttl_act,2);
						


//echo number_format($actual_gross=$ttl_act_inc-$ttl_act_cos,2);					
					
					
echo number_format(round($actual_gross=$ttl_act_inc-$ttl_act_cos, -4),2);					
					


			
						
						
						
						
						
						?>
</td>

<td align="right" bgcolor="#33FF99">

<?php 

//////////////////total predict sales												
$query_ttl_pred="select sum(budget_amount*curr_rate) as ttl_pred FROM budget,budget_code,account_type
 WHERE account_type.account_type_id=budget_code.budget_account and budget_code.budget_code_id=budget.budget_code_id 
AND budget_code.budget_year='$curr_year_ttl' and budget.budget_month='$month_val' and account_type.account_cat_id='7'";
$results_ttl_pred= mysql_query($query_ttl_pred) or die ("Error $queryop_ttl_pred.".mysql_error());
$rows_ttl_pred=mysql_fetch_object($results_ttl_pred);

number_format($ttl_pred_sales=$rows_ttl_pred->ttl_pred,2);					
						
						
//////////////////total predict cost of sales												
$query_ttl_pred="select sum(budget_amount*curr_rate) as ttl_pred FROM budget,budget_code,account_type
 WHERE account_type.account_type_id=budget_code.budget_account and budget_code.budget_code_id=budget.budget_code_id 
AND budget_code.budget_year='$curr_year_ttl' and budget.budget_month='$month_val' and account_type.account_cat_id='5'";
$results_ttl_pred= mysql_query($query_ttl_pred) or die ("Error $queryop_ttl_pred.".mysql_error());
$rows_ttl_pred=mysql_fetch_object($results_ttl_pred);

number_format($ttl_pred_cos=$rows_ttl_pred->ttl_pred,2);	


//echo number_format($predict_gross=$ttl_pred_sales-$ttl_pred_cos,2);


echo number_format(round($predict_gross=$ttl_pred_sales-$ttl_pred_cos, -4),2);	






						
												
						
						
						?>




</td>

<td align="right" bgcolor="#FF9999">

<?php

				
$query_ttl_act="select sum(amount*curr_rate) as ttl_act FROM chart_transactions,account_type WHERE 
account_type.account_type_id=chart_transactions.account_type_id AND chart_transactions.l_year='$curr_year_ttl' 
and chart_transactions.l_month='$month_val' 
and account_type.account_cat_id='7'";
$results_ttl_act= mysql_query($query_ttl_act) or die ("Error $queryop_ttl_act.".mysql_error());
$rows_ttl_act=mysql_fetch_object($results_ttl_act);

number_format($ttl_act_curr_inc=$rows_ttl_act->ttl_act,2);



					
$query_ttl_act="select sum(amount) as ttl_act FROM chart_transactions,account_type WHERE 
account_type.account_type_id=chart_transactions.account_type_id AND chart_transactions.l_year='$curr_year_ttl' 
and chart_transactions.l_month='$month_val' 
and account_type.account_cat_id='5'";
$results_ttl_act= mysql_query($query_ttl_act) or die ("Error $queryop_ttl_act.".mysql_error());
$rows_ttl_act=mysql_fetch_object($results_ttl_act);

number_format($ttl_act_curr_cos=$rows_ttl_act->ttl_act,2);
						


//echo number_format($actual_gross_curr=$ttl_act_curr_inc-$ttl_act_curr_cos,2);	


echo number_format(round($actual_gross_curr=$ttl_act_curr_inc-$ttl_act_curr_cos, -4),2);				
					
					
					
					


			
						
						
						
						
						
						?>





</td>


<?php 

	}
?>						
<td><strong><?php //echo number_format($prev_gross=$all_prev_sales-$all_prev_cos,2); 



echo number_format(round($prev_gross=$all_prev_sales-$all_prev_cos, -4),2);



?></strong></td>						
<td><strong><?php //echo number_format($pred_gross=$all_pred_sales-$all_pred_cos,2); 


echo number_format(round($pred_gross=$all_pred_sales-$all_pred_cos, -4),2);

?></strong></td>						
<td><strong><?php //echo number_format($pred_actual=$all_actual_sales-$all_actual_cos,2); 



echo number_format(round($actual_gross=$all_actual_sales-$all_actual_cos, -4),2);



?></strong></td>						
<td><strong><?php //echo number_format($updated_gross=$all_updated_sales-$all_updated_cos,2); 


echo number_format(round($updated_gross=$all_updated_sales-$all_updated_cos, -4),2);





?></strong></td>						
						


</tr>	


<tr bgcolor="#ccc">
						<td colspan="41"><strong>OPERATING EXPENSES</strong></td>
						
						
						</tr>



					
						
						
<?php 
 
 //EXPENSES
$queryop="select * FROM account_type where account_cat_id='6' group by main_account_code ORDER BY main_account_code asc";
$results= mysql_query($queryop) or die ("Error $queryop.".mysql_error());
while ($rows=mysql_fetch_object($results))
{
	
	
 
 ?>
 
 
 
 <tr><td width="70%"><?php echo $rows->main_account_code.' '. $rows->account_type_name; ?></td>
 <?php 

for ($m=1; $m<=12; $m++)

	{
     $month_val = date('m', mktime(0,0,0,$m, 1, date('Y')));
     $month2 = date('M', mktime(0,0,0,$m, 1, date('Y')));
						
						?>	 
						<td align="right" bgcolor="#ccc"><?php 
						
						$month_val;
						
						if (!isset($_POST['generate']))
						{
						
						$curr_year=date('Y', time());
						
						}
						else
						{
						
                       $curr_year=$_POST['budget_year'];						
							
						}
						
						$curr_year;

						
						
						$prev_year=$curr_year-1;
						
						
						$account_type_id=$rows->account_type_id;
						$main_account_code=$rows->main_account_code;
						
						
						
$query_curr="select SUM(amount*curr_rate) AS ttl_amount FROM chart_transactions,account_type where 
chart_transactions.account_type_id=account_type.account_type_id and account_type.main_account_code='$main_account_code' 
and l_month='$month_val' and l_year='$prev_year'";
$results_curr= mysql_query($query_curr) or die ("Error $query_curr.".mysql_error());
$rows_curr=mysql_fetch_object($results_curr);

$ttl_amount=$rows_curr->ttl_amount;

if ($ttl_amount=='' || $ttl_amount==0)
{
echo ' - ';	
}
else
{

echo number_format($ttl_amount,2);
}	
						
					
						
						
						
						
						
						?></td>
						<td align="right" bgcolor="#33FF99"><?php 
						
						$month_val;
						
$queryop_curr="select budget_amount,curr_rate FROM budget,budget_code,account_type where 
budget_code.budget_account=account_type.account_type_id AND budget_code.budget_code_id=budget.budget_code_id 
and budget.budget_month='$month_val' and budget_code.budget_year='$curr_year' AND budget_code.budget_account='$account_type_id'";
$results_curr= mysql_query($queryop_curr) or die ("Error $queryop_curr.".mysql_error());
$rows_curr=mysql_fetch_object($results_curr);
$budget_amount=$rows_curr->budget_amount;

if ($budget_amount=='' || $budget_amount==0)
{
echo ' - ';	
}
else
{
//echo number_format($budget_amount*$rows_curr->curr_rate,2);		

echo number_format(round($budget_amount*$rows_curr->curr_rate, -4),2);				
}
						
											
						
						
						?></td>
						
						<td align="right" bgcolor="#FF9999"><?php 
						
						
$query_curr="select SUM(amount*curr_rate) AS ttl_amount FROM chart_transactions,account_type where 
chart_transactions.account_type_id=account_type.account_type_id and account_type.main_account_code='$main_account_code' 
and l_month='$month_val' and l_year='$curr_year'";
$results_curr= mysql_query($query_curr) or die ("Error $query_curr.".mysql_error());
$rows_curr=mysql_fetch_object($results_curr);

$ttl_amount_curr_act=$rows_curr->ttl_amount;

if ($ttl_amount_curr_act=='' || $ttl_amount_curr_act==0)
{
echo ' - ';	
}
else
{

//echo number_format($ttl_amount_curr_act,2);

echo number_format(round($ttl_amount_curr_act, -4),2);	
}						
						
						
						
						
						
						
						?></td>
						
						
						
						<?php } 
						
						
						?>
						
						
<td align="right"><strong>
<?php 						
$query_curr="select SUM(amount*curr_rate) AS ttl_prev_amount FROM chart_transactions,account_type where 
chart_transactions.account_type_id=account_type.account_type_id and account_type.main_account_code='$main_account_code' and l_year='$prev_year'";
$results_curr= mysql_query($query_curr) or die ("Error $query_curr.".mysql_error());
$rows_curr=mysql_fetch_object($results_curr);

$ttl_prev_amount=$rows_curr->ttl_prev_amount;

if ($ttl_prev_amount=='' || $ttl_prev_amount==0)
{
echo ' - ';	
}
else
{

//echo number_format($ttl_prev_amount,2);

echo number_format(round($ttl_prev_amount, -4),2);	


}						
						
	$all_prev_op=$all_prev_op+$ttl_prev_amount;		
	
						
?>						
						
						
						
						
						</strong></td>
						
						<td align="right"><strong>
	<?php 

$curr_year;	
$queryop_pred="select SUM(budget_amount*curr_rate) AS all_ttl_amount_pred FROM budget,budget_code,account_type where 
budget_code.budget_account=account_type.account_type_id and budget_code.budget_code_id=budget.budget_code_id 
and budget_code.budget_year='$curr_year' AND budget_code.budget_account='$account_type_id'";
$results_pred= mysql_query($queryop_pred) or die ("Error $queryop_pred.".mysql_error());
$rows_pred=mysql_fetch_object($results_pred);
$all_ttl_amount_pred=$rows_pred->all_ttl_amount_pred;
$all_pred_curr_rate=$rows_pred->curr_rate;

//$all_ttl_amount_pred_tshs=$all_ttl_amount_pred*$all_pred_curr_rate;

if ($all_ttl_amount_pred=='' || $all_ttl_amount_pred==0)
{
echo ' - ';	
}
else
{
	
//echo number_format($all_ttl_amount_pred,2);

echo number_format(round($all_ttl_amount_pred, -4),2);	
						
}					
						
$all_pred_op=$all_pred_op+$all_ttl_amount_pred;						
						?>						
						
						
						
						
						
						
						
						
						</strong>
						
						</td>
						
						<td align="right"><strong>
<?php

$queryop_curr="select SUM(amount*curr_rate) AS ttl_amount_curr_act_all FROM chart_transactions,account_type where 
chart_transactions.account_type_id=account_type.account_type_id and account_type.main_account_code='$main_account_code' and l_year='$curr_year'";
$results_curr= mysql_query($queryop_curr) or die ("Error $queryop_curr.".mysql_error());
$rows_curr=mysql_fetch_object($results_curr);
$ttl_amount_curr_act_all=$rows_curr->ttl_amount_curr_act_all;

if ($ttl_amount_curr_act_all=='' || $ttl_amount_curr_act_all==0)
{
echo ' - ';	
}
else
{
	
//echo number_format($ttl_amount_curr_act_all,2);

echo number_format(round($ttl_amount_curr_act_all, -4),2);	
						
}	






$all_actual_op=$all_actual_op+$ttl_amount_curr_act_all;

 ?>						
						
						
			
	</strong>					
						
						</td>
						
						
						<td align="right"><strong>
						

<?php
$curr_year; 

$curr_month=date('m', time());

////////////updated predictable for this year.

$queryop_pred="select SUM(budget_amount*curr_rate) AS updated_predict FROM budget,budget_code,account_type where 
budget_code.budget_account=account_type.account_type_id and budget_code.budget_code_id=budget.budget_code_id 
and budget_code.budget_year='$curr_year' AND budget.budget_month>='$curr_month' AND budget_code.budget_account='$account_type_id'";
$results_pred= mysql_query($queryop_pred) or die ("Error $queryop_pred.".mysql_error());
$rows_pred=mysql_fetch_object($results_pred);

$updated_predict=$rows_pred->updated_predict;


////////////updated actual for this year.


$queryop_curr="select SUM(amount*curr_rate) AS updated_actual FROM chart_transactions,account_type where 
chart_transactions.account_type_id=account_type.account_type_id and account_type.main_account_code='$main_account_code' and l_year='$curr_year' 
and l_month<'$curr_month'";
$results_curr= mysql_query($queryop_curr) or die ("Error $queryop_curr.".mysql_error());
$rows_curr=mysql_fetch_object($results_curr);

$updated_actual=$rows_curr->updated_actual;


//echo number_format($updated_budget=$updated_actual+$updated_predict,2);

echo number_format(round($updated_budget=$updated_actual+$updated_predict, -4),2);




$all_updated_op=$all_updated_op+$updated_budget;

 ?>						
						
						
						
						
					</strong>	
					
						</td>						
						
						
						
						
						
 
 </tr>
 
 <?php 
}


 
 ?>		




<tr bgcolor="#ccc" height="50">
						<td><strong>Total Operating Expenses</strong></td>
						
					<?php 

for ($m=1; $m<=12; $m++)

	{
     $month_val = date('m', mktime(0,0,0,$m, 1, date('Y')));
     $month2 = date('M', mktime(0,0,0,$m, 1, date('Y')));
						
						?>	 
						<td align="right" bgcolor="#ccc"><strong><?php 
						
						

if (!isset($_POST['generate']))
						{
						
						$curr_year_ttl=date('Y', time());
						
						}
						else
						{
						
                       $curr_year_ttl=$_POST['budget_year'];						
							
						}
						
					$curr_year_ttl;						
						
						
$prev_year_ttl=$curr_year_ttl-1;					
$query_ttl_act="select sum(amount*curr_rate) as ttl_act FROM chart_transactions,account_type WHERE 
account_type.account_type_id=chart_transactions.account_type_id AND chart_transactions.l_year='$prev_year_ttl' 
and chart_transactions.l_month='$month_val' 
and account_type.account_cat_id='6'";
$results_ttl_act= mysql_query($query_ttl_act) or die ("Error $queryop_ttl_act.".mysql_error());
$rows_ttl_act=mysql_fetch_object($results_ttl_act);

//echo number_format($ttl_act_exp=$rows_ttl_act->ttl_act,2);		


echo number_format(round($ttl_act_exp=$rows_ttl_act->ttl_act, -4),2);					
				
						
						
						
						
						
						?></strong></td>
						<td align="right"  bgcolor="#33FF99"><strong><?php 
						



$query_ttl_pred="select sum(budget_amount*curr_rate) as ttl_pred FROM budget,budget_code,account_type
 WHERE account_type.account_type_id=budget_code.budget_account and budget_code.budget_code_id=budget.budget_code_id 
AND budget_code.budget_year='$curr_year_ttl' and budget.budget_month='$month_val' and account_type.account_cat_id='6'";
$results_ttl_pred= mysql_query($query_ttl_pred) or die ("Error $queryop_ttl_pred.".mysql_error());
$rows_ttl_pred=mysql_fetch_object($results_ttl_pred);

//echo number_format($ttl_pred_exp=$rows_ttl_pred->ttl_pred,2);


echo number_format(round($ttl_pred_exp=$rows_ttl_pred->ttl_pred, -4),2);
						
											
						
						
						?></strong></td>
						
						<td align="right" bgcolor="#FF9999"><?php
$query_ttl_act="select sum(amount*curr_rate) as ttl_act FROM chart_transactions,account_type WHERE 
account_type.account_type_id=chart_transactions.account_type_id AND chart_transactions.l_year='$curr_year_ttl' 
and chart_transactions.l_month='$month_val' 
and account_type.account_cat_id='6'";
$results_ttl_act= mysql_query($query_ttl_act) or die ("Error $queryop_ttl_act.".mysql_error());
$rows_ttl_act=mysql_fetch_object($results_ttl_act);

//echo number_format($ttl_act_curr_exp=$rows_ttl_act->ttl_act,2);	


echo number_format(round($ttl_act_curr_exp=$rows_ttl_act->ttl_act, -4),2);						
				
						
						
						
						
						
						?>
						
						
						
						</td>
						
						
						
						<?php } 
						
						
						?>	
						
						<td align="right"><strong><?php //echo number_format($all_prev_op,2); 
						
						
						echo number_format(round($all_prev_op, -4),2);	
						
						
						
						?></strong></td>
						<td align="right"><strong><?php //echo number_format($all_pred_op,2);


echo number_format(round($all_pred_op, -4),2);	




						?></strong></td>
						<td align="right"><strong><?php //echo number_format($all_actual_op,2); 
						
						echo number_format(round($all_actual_op, -4),2);	
						
						
						
						
						
						
						?></strong></td>
						<td align="right"><strong><?php //echo number_format($all_updated_op,2); 
						
						
						echo number_format(round($all_updated_op, -4),2);	
						
						
						
						
						
						
						?></strong></td>							
						
						
						
						
						</tr>	




<tr bgcolor="#ccc" height="50">
						<td><strong>Net Profit</strong></td>
						
<?php 

for ($m=1; $m<=12; $m++)

	{
     $month_val = date('m', mktime(0,0,0,$m, 1, date('Y')));
     $month2 = date('M', mktime(0,0,0,$m, 1, date('Y')));
						
						?>
						
						<td align="right"><strong><?php //echo $ttl_pred_cos;
						
						

						
						

if (!isset($_POST['generate']))
						{
						
						$curr_year_ttl=date('Y', time());
						
						}
						else
						{
						
                       $curr_year_ttl=$_POST['budget_year'];						
							
						}
						
					$curr_year_ttl;	
					
					
					$prev_year_ttl=$curr_year_ttl-1;
					
$query_ttl_act="select sum(amount*curr_rate) as ttl_act FROM chart_transactions,account_type WHERE 
account_type.account_type_id=chart_transactions.account_type_id AND chart_transactions.l_year='$prev_year_ttl' 
and chart_transactions.l_month='$month_val' 
and account_type.account_cat_id='7'";
$results_ttl_act= mysql_query($query_ttl_act) or die ("Error $queryop_ttl_act.".mysql_error());
$rows_ttl_act=mysql_fetch_object($results_ttl_act);

number_format($ttl_act_inc=$rows_ttl_act->ttl_act,2);



$prev_year_ttl=$curr_year_ttl-1;					
$query_ttl_act="select sum(amount*curr_rate) as ttl_act FROM chart_transactions,account_type WHERE 
account_type.account_type_id=chart_transactions.account_type_id AND chart_transactions.l_year='$prev_year_ttl' 
and chart_transactions.l_month='$month_val' 
and account_type.account_cat_id='5'";
$results_ttl_act= mysql_query($query_ttl_act) or die ("Error $queryop_ttl_act.".mysql_error());
$rows_ttl_act=mysql_fetch_object($results_ttl_act);

number_format($ttl_act_cos=$rows_ttl_act->ttl_act,2);
						

number_format($actual_gross1=$ttl_act_inc-$ttl_act_cos,2);	



$prev_year_ttl=$curr_year_ttl-1;					
$query_ttl_act="select sum(amount*curr_rate) as ttl_act FROM chart_transactions,account_type WHERE 
account_type.account_type_id=chart_transactions.account_type_id AND chart_transactions.l_year='$prev_year_ttl' 
and chart_transactions.l_month='$month_val' 
and account_type.account_cat_id='6'";
$results_ttl_act= mysql_query($query_ttl_act) or die ("Error $queryop_ttl_act.".mysql_error());
$rows_ttl_act=mysql_fetch_object($results_ttl_act);

number_format($ttl_act_exp=$rows_ttl_act->ttl_act,2);






//echo number_format($ttl_act_np=$actual_gross-$ttl_act_exp,2);


	echo number_format(round($ttl_act_np=$actual_gross1-$ttl_act_exp, -4),2);							
						
						
						
						
						?></strong>
</td>

<td align="right" bgcolor="#33FF99"><strong>

<?php 

						




//////////////////total predict sales												
$query_ttl_pred="select sum(budget_amount*curr_rate) as ttl_pred FROM budget,budget_code,account_type
 WHERE account_type.account_type_id=budget_code.budget_account and budget_code.budget_code_id=budget.budget_code_id 
AND budget_code.budget_year='$curr_year_ttl' and budget.budget_month='$month_val' and account_type.account_cat_id='7'";
$results_ttl_pred= mysql_query($query_ttl_pred) or die ("Error $queryop_ttl_pred.".mysql_error());
$rows_ttl_pred=mysql_fetch_object($results_ttl_pred);

number_format($ttl_pred_sales=$rows_ttl_pred->ttl_pred,2);					
						
						
//////////////////total predict cost of sales												
$query_ttl_pred="select sum(budget_amount*curr_rate) as ttl_pred FROM budget,budget_code,account_type
 WHERE account_type.account_type_id=budget_code.budget_account and budget_code.budget_code_id=budget.budget_code_id 
AND budget_code.budget_year='$curr_year_ttl' and budget.budget_month='$month_val' and account_type.account_cat_id='5'";
$results_ttl_pred= mysql_query($query_ttl_pred) or die ("Error $queryop_ttl_pred.".mysql_error());
$rows_ttl_pred=mysql_fetch_object($results_ttl_pred);

number_format($ttl_pred_cos=$rows_ttl_pred->ttl_pred,2);	


number_format($predict_gross=$ttl_pred_sales-$ttl_pred_cos,2);		



$query_ttl_pred="select sum(budget_amount*curr_rate) as ttl_pred FROM budget,budget_code,account_type
 WHERE account_type.account_type_id=budget_code.budget_account and budget_code.budget_code_id=budget.budget_code_id 
AND budget_code.budget_year='$curr_year_ttl' and budget.budget_month='$month_val' and account_type.account_cat_id='6'";
$results_ttl_pred= mysql_query($query_ttl_pred) or die ("Error $queryop_ttl_pred.".mysql_error());
$rows_ttl_pred=mysql_fetch_object($results_ttl_pred);

number_format($ttl_pred_exp=$rows_ttl_pred->ttl_pred,2);	


//echo number_format($ttl_pred_np=$predict_gross-$ttl_pred_exp,2);



echo number_format(round($ttl_pred_np=$predict_gross-$ttl_pred_exp, -4),2);											
						
						
						?>



</strong>
</td>

<td align="right" bgcolor="#FF9999">
<?php
$query_ttl_act="select sum(amount*curr_rate) as ttl_act FROM chart_transactions,account_type WHERE 
account_type.account_type_id=chart_transactions.account_type_id AND chart_transactions.l_year='$curr_year_ttl' 
and chart_transactions.l_month='$month_val' 
and account_type.account_cat_id='7'";
$results_ttl_act= mysql_query($query_ttl_act) or die ("Error $queryop_ttl_act.".mysql_error());
$rows_ttl_act=mysql_fetch_object($results_ttl_act);

number_format($ttl_act_inc=$rows_ttl_act->ttl_act,2);



$prev_year_ttl=$curr_year_ttl-1;					
$query_ttl_act="select sum(amount*curr_rate) as ttl_act FROM chart_transactions,account_type WHERE 
account_type.account_type_id=chart_transactions.account_type_id AND chart_transactions.l_year='$curr_year_ttl' 
and chart_transactions.l_month='$month_val' 
and account_type.account_cat_id='5'";
$results_ttl_act= mysql_query($query_ttl_act) or die ("Error $queryop_ttl_act.".mysql_error());
$rows_ttl_act=mysql_fetch_object($results_ttl_act);

number_format($ttl_act_cos=$rows_ttl_act->ttl_act,2);
						

number_format($actual_gross1=$ttl_act_inc-$ttl_act_cos,2);	



$prev_year_ttl=$curr_year_ttl-1;					
$query_ttl_act="select sum(amount*curr_rate) as ttl_act FROM chart_transactions,account_type WHERE 
account_type.account_type_id=chart_transactions.account_type_id AND chart_transactions.l_year='$curr_year_ttl' 
and chart_transactions.l_month='$month_val' 
and account_type.account_cat_id='6'";
$results_ttl_act= mysql_query($query_ttl_act) or die ("Error $queryop_ttl_act.".mysql_error());
$rows_ttl_act=mysql_fetch_object($results_ttl_act);

number_format($ttl_act_exp=$rows_ttl_act->ttl_act,2);






//echo number_format($ttl_act_np=$actual_gross-$ttl_act_exp,2);


echo number_format(round($ttl_act_np=$actual_gross1-$ttl_act_exp, -4),2);		
						
						
						
						
						
						?>





</td>
<?php 

	}
?>						
	

<td><strong><?php //echo number_format($prev_net=$prev_gross-$all_prev_op,2); 


echo number_format(round($prev_net=$prev_gross-$all_prev_op, -4),2);




?></strong></td>						
<td><strong><?php //echo number_format($pred_net=$pred_gross-$all_pred_op,2); 



echo number_format(round($pred_net=$pred_gross-$all_pred_op, -4),2);



?></strong></td>						
<td><strong><?php //echo number_format($actual_net=$pred_actual-$all_actual_op,2); 


echo number_format(round($actual_net=$actual_gross-$all_actual_op, -4),2);



?></strong></td>						
<td><strong><?php //echo number_format($updated_net=$updated_gross-$all_updated_op,2); 



echo number_format(round($updated_net=$updated_gross-$all_updated_op, -4),2);



?></strong></td>		


</tr>						
						
						
						
						
						
						

 </table>


</div>
</form>
</br></br>
<script type="text/javascript">
/*   Calendar.setup(
    {
      inputField  : "date_from",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "date_from"       // ID of the button
    }
  );
  
  
   Calendar.setup(
    {
      inputField  : "date_to",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "date_to"       // ID of the button
    }
  ); */
  
  
  </script>
  
     <SCRIPT src="js/superTables.js" type=text/javascript></SCRIPT>

<SCRIPT type=text/javascript>
//<![CDATA[

(function() {
	var mySt = new superTable("demoTable", {
		cssSkin : "sSky",
		fixedCols : 1,
		headerRows : 1,
		onStart : function () {
			this.start = new Date();
		},
		onFinish : function () {
			document.getElementById("testDiv").innerHTML += "Finished...<br>" + ((new Date()) - this.start) + "ms.<br>";
		}
	});
})();

//]]>
</SCRIPT>


<?php 
//}

?>