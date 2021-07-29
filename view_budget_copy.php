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

<form name="search" method="post" action="">  
  


<table width="100%" border="0" align="center" style="margin:auto;" class="table">

<tr bgcolor="#FFFFCC">
   
    <td  height="30"  colspan="9" align="center">
	

    
    Budget Year
<select name="budget_year" required style="width:150px;">
	
<option value="">Select..............................</option>
<?php 
$ending_year='2017';
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
<div style="height:500px; width:100%; overflow-y:scroll;">
	
<table width="100%" border="0" align="center" style="margin:auto;" bgcolor="#fff" class="table">	
	<tr>
 <td colspan="9"> 
<table border="1" width="100%">

<tr><th width="30%"><strong></strong></th> <?php 

for ($m=1; $m<=12; $m++)

	{
     $month_val = date('m', mktime(0,0,0,$m, 1, date('Y')));
     $month2 = date('M', mktime(0,0,0,$m, 1, date('Y')));
						
						?>	 
						<th align="center"><?php 
						
						 $month2;
						echo 'Actual';
						?></th>
					<th align="center"><?php 
						echo 'Predictable';
						 $month2;
						
						?></th>
						
											<th align="center"><?php 
						echo 'Actual';
						 $month2;
						
						?></th>
						
						
						
						<?php } 
						
						
						?></tr>
						
						
						
						
						<tr><th><strong></strong></th> <?php 

for ($m=1; $m<=12; $m++)

	{
     $month_val = date('m', mktime(0,0,0,$m, 1, date('Y')));
     $month2 = date('M', mktime(0,0,0,$m, 1, date('Y')));
						
						?>	 
						<th align="center"><?php 
						
						echo $month2;
						
						?></th>
												<th align="center"><?php 
						
						echo $month2;
						
						?></th>
						
						<th align="center"><?php 
						
						echo $month2;
						
						?></th>
						
						
						
						<?php } 
						
						
						?></tr>
						
						<tr><th><strong></strong></th> <?php 

for ($m=1; $m<=12; $m++)

	{
     $month_val = date('m', mktime(0,0,0,$m, 1, date('Y')));
     $month2 = date('M', mktime(0,0,0,$m, 1, date('Y')));
						
						?>	 
						<th align="center"><?php 
						
						$month2;
						
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
						
						?></th>
                        <th align="center"><?php 
						
						$month2;
						
						//echo '2018';
						echo $curr_year;
						
						
						?></th>
						
						                        <th align="center"><?php 
						
						$month2;
						
						//echo '2018';
						echo $curr_year;
						
						
						?></th>
						
						
						
						<?php } 
						
						
						?></tr>
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						<tr bgcolor="#ccc">
						<td colspan="37"><strong>SALES INCOME</strong></td>
						
						
						</tr>
						
						
						
						<?php 
 
 //sales income
$queryop="select * FROM account_type where account_cat_id='7' ";
$results= mysql_query($queryop) or die ("Error $queryop.".mysql_error());
while ($rows=mysql_fetch_object($results))
{
	
	
 
 ?>
 
 
 
 <tr><td width="70%"><?php echo $rows->account_code.' '. $rows->account_type_name; ?></td>
 <?php 

for ($m=1; $m<=12; $m++)

	{
     $month_val = date('m', mktime(0,0,0,$m, 1, date('Y')));
     $month2 = date('M', mktime(0,0,0,$m, 1, date('Y')));
						
						?>	 
						<td align="center"><?php 
						
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
						
						
/////////////////////////////////actual previous year					
$query_curr="select SUM(amount*curr_rate) AS ttl_amount FROM chart_transactions where account_type_id='$account_type_id' 
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
						<td align="center"><?php 
						
							




/////////////////////////////////predicted /budgetted current year

$account_type_id=$rows->account_type_id;
						
						
						
						
$queryop_pred="select budget_amount,curr_rate FROM budget,budget_code where budget_code.budget_code_id=budget.budget_code_id 
and budget.budget_month='$month_val' and budget_code.budget_year='$curr_year' AND budget_code.budget_account='$account_type_id'";
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
	
echo number_format($ttl_amount_pred_tshs,2);
						
}					
						
						
						?></td>
						
						
						<td align="center"><?php 
						
							






$account_type_id=$rows->account_type_id;
						
						
						
						
$queryop_curr="select SUM(amount*curr_rate) AS ttl_amount_curr_act FROM chart_transactions where account_type_id='$account_type_id' 
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
	
echo number_format($ttl_amount_curr_act,2);
						
}					
						
						
						?></td>
						
						
						
						<?php } 
						
						
						?>
 
 </tr>
 
 <?php 
}


 
 ?>
 
						<tr bgcolor="#ccc">
						<td><strong>Total Sales</strong></td>
						
					<?php 

for ($m=1; $m<=12; $m++)

	{
     $month_val = date('m', mktime(0,0,0,$m, 1, date('Y')));
     $month2 = date('M', mktime(0,0,0,$m, 1, date('Y')));
						
						?>	 
						<td align="center"><strong><?php 
						
						

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

echo number_format($ttl_act_inc=$rows_ttl_act->ttl_act,2);	
						
						
						
						
						?></strong></td>
						<td align="center"><strong><?php 
						
					





$query_ttl_pred="select sum(budget_amount) as ttl_pred FROM budget,budget_code,account_type
 WHERE account_type.account_type_id=budget_code.budget_account and budget_code.budget_code_id=budget.budget_code_id 
AND budget_code.budget_year='$curr_year_ttl' and budget.budget_month='$month_val' and account_type.account_cat_id='7'";
$results_ttl_pred= mysql_query($query_ttl_pred) or die ("Error $queryop_ttl_pred.".mysql_error());
$rows_ttl_pred=mysql_fetch_object($results_ttl_pred);




echo number_format($ttl_pred_inc=$rows_ttl_pred->ttl_pred*$rows_ttl_pred->curr_rate,2);	
						
											
						
						
						?></strong></td>
						
						<td>
						
<?php 


$query_ttl_act_curr="select sum(amount*curr_rate) as ttl_act FROM chart_transactions,account_type WHERE 
account_type.account_type_id=chart_transactions.account_type_id AND chart_transactions.l_year='$curr_year_ttl' 
and chart_transactions.l_month='$month_val' 
and account_type.account_cat_id='7'";
$results_ttl_act_curr= mysql_query($query_ttl_act_curr) or die ("Error $queryop_ttl_act_curr.".mysql_error());
$rows_ttl_act_curr=mysql_fetch_object($results_ttl_act_curr);

echo number_format($ttl_act_inc_curr=$rows_ttl_act_curr->ttl_act,2);	



?>						
						
						
						
						
						
						
						</td>
						
						
						
						<?php } 
						
						
						?>	
						
						
						
						
						
						
						</tr>
						
						
		<tr bgcolor="#fff">
						<td colspan="25" height="30"><strong></strong></td>
						
						
						</tr>					
						
						
	<tr bgcolor="#ccc">
						<td colspan="37"><strong>COST OF SALES</strong></td>
						
						
						</tr>
						
						
						
						<?php 
 
 //cost of sales
$queryop="select * FROM account_type where account_cat_id='5' ";
$results= mysql_query($queryop) or die ("Error $queryop.".mysql_error());
while ($rows=mysql_fetch_object($results))
{
	
	
 
 ?>
 
 
 
 <tr><td width="70%"><?php echo $rows->account_code.' '. $rows->account_type_name; ?></td>
 <?php 

for ($m=1; $m<=12; $m++)

	{
     $month_val = date('m', mktime(0,0,0,$m, 1, date('Y')));
     $month2 = date('M', mktime(0,0,0,$m, 1, date('Y')));
						
						?>	 
						<td align="center"><?php 
						
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
						
     $prev_year=$curr_year-1;
						
						
						
						
$query_curr="select SUM(amount*curr_rate) AS ttl_amount FROM chart_transactions where account_type_id='$account_type_id' 
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
						<td align="center"><?php 
						
						$month_val;
						
	
						
						
						$account_type_id=$rows->account_type_id;
						
						
						
$queryop_curr="select budget_amount,curr_rate FROM budget,budget_code where budget_code.budget_code_id=budget.budget_code_id 
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
echo number_format($budget_amount*$rows_curr->curr_rate,2);						
}
						
						
						?></td>
						
						<td>
						
<?php 						
$query_curr="select SUM(amount*curr_rate) AS ttl_amount FROM chart_transactions where account_type_id='$account_type_id' 
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

echo number_format($ttl_amount_curr_act,2);
}						
						
						
		?>				
						
						
						
						</td>
						
						
						
						<?php } 
						
						
						?>
 
 </tr>
 
 <?php 
}


 
 ?>
 
						<tr bgcolor="#ccc">
						<td><strong>Total Cost Sales</strong></td>
						
					<?php 

for ($m=1; $m<=12; $m++)

	{
     $month_val = date('m', mktime(0,0,0,$m, 1, date('Y')));
     $month2 = date('M', mktime(0,0,0,$m, 1, date('Y')));
						
						?>	 
						<td align="center"><strong><?php 
						
						

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

echo number_format($ttl_act_cos=$rows_ttl_act->ttl_act,2);					
						
						
				
						
						
						
						
						
						?></strong></td>
						<td align="center"><strong><?php 
						
												
$query_ttl_pred="select sum(budget_amount*curr_rate) as ttl_pred FROM budget,budget_code,account_type
 WHERE account_type.account_type_id=budget_code.budget_account and budget_code.budget_code_id=budget.budget_code_id 
AND budget_code.budget_year='$curr_year_ttl' and budget.budget_month='$month_val' and account_type.account_cat_id='5'";
$results_ttl_pred= mysql_query($query_ttl_pred) or die ("Error $queryop_ttl_pred.".mysql_error());
$rows_ttl_pred=mysql_fetch_object($results_ttl_pred);

echo number_format($ttl_pred_cos=$rows_ttl_pred->ttl_pred,2);
						
											
						
						
						?></strong></td>
<td>


<strong><?php 
						
												



$query_ttl_act="select sum(amount*curr_rate) as ttl_act FROM chart_transactions,account_type WHERE 
account_type.account_type_id=chart_transactions.account_type_id AND chart_transactions.l_year='$curr_year_ttl' 
and chart_transactions.l_month='$month_val' 
and account_type.account_cat_id='5'";
$results_ttl_act= mysql_query($query_ttl_act) or die ("Error $queryop_ttl_act.".mysql_error());
$rows_ttl_act=mysql_fetch_object($results_ttl_act);

echo number_format($ttl_curr_act_cos=$rows_ttl_act->ttl_act,2);
						
											
						
						
						?></strong>






</td>						
						
						
						<?php } 
						
						
						?>	
						
						
						
						
						
						
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
						
						<td><?php //echo $ttl_pred_cos;
						
						

						
						

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
						


echo number_format($actual_gross=$ttl_act_inc-$ttl_act_cos,2);					
					
					
					
					


			
						
						
						
						
						
						?>
</td>

<td>

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


echo number_format($predict_gross=$ttl_pred_sales-$ttl_pred_cos,2);









						
												
						
						
						?>




</td>

<td>

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
						


echo number_format($actual_gross_curr=$ttl_act_curr_inc-$ttl_act_curr_cos,2);					
					
					
					
					


			
						
						
						
						
						
						?>





</td>


<?php 

	}
?>						
						


</tr>	







	<tr bgcolor="#ccc">
						<td colspan="37"><strong>OPERATING EXPENSES</strong></td>
						
						
						</tr>



					
						
						
<?php 
 
 //EXPENSES
$queryop="select * FROM account_type where account_cat_id='6' ";
$results= mysql_query($queryop) or die ("Error $queryop.".mysql_error());
while ($rows=mysql_fetch_object($results))
{
	
	
 
 ?>
 
 
 
 <tr><td width="70%"><?php echo $rows->account_code.' '. $rows->account_type_name; ?></td>
 <?php 

for ($m=1; $m<=12; $m++)

	{
     $month_val = date('m', mktime(0,0,0,$m, 1, date('Y')));
     $month2 = date('M', mktime(0,0,0,$m, 1, date('Y')));
						
						?>	 
						<td align="center"><?php 
						
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
						
						
						
$query_curr="select SUM(amount*curr_rate) AS ttl_amount FROM chart_transactions where account_type_id='$account_type_id' 
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
						<td align="center"><?php 
						
						$month_val;
						
$queryop_curr="select budget_amount,curr_rate FROM budget,budget_code where budget_code.budget_code_id=budget.budget_code_id 
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
echo number_format($budget_amount*$rows_curr->curr_rate,2);						
}
						
											
						
						
						?></td>
						
						<td><?php 
						
						
$query_curr="select SUM(amount*curr_rate) AS ttl_amount FROM chart_transactions where account_type_id='$account_type_id' 
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

echo number_format($ttl_amount_curr_act,2);
}						
						
						
						
						
						
						
						?></td>
						
						
						
						<?php } 
						
						
						?>
 
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
						<td align="center"><strong><?php 
						
						

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

echo number_format($ttl_act_exp=$rows_ttl_act->ttl_act,2);							
				
						
						
						
						
						
						?></strong></td>
						<td align="center"><strong><?php 
						



$query_ttl_pred="select sum(budget_amount*curr_rate) as ttl_pred FROM budget,budget_code,account_type
 WHERE account_type.account_type_id=budget_code.budget_account and budget_code.budget_code_id=budget.budget_code_id 
AND budget_code.budget_year='$curr_year_ttl' and budget.budget_month='$month_val' and account_type.account_cat_id='6'";
$results_ttl_pred= mysql_query($query_ttl_pred) or die ("Error $queryop_ttl_pred.".mysql_error());
$rows_ttl_pred=mysql_fetch_object($results_ttl_pred);

echo number_format($ttl_pred_exp=$rows_ttl_pred->ttl_pred,2);
						
											
						
						
						?></strong></td>
						
						<td><?php
$query_ttl_act="select sum(amount*curr_rate) as ttl_act FROM chart_transactions,account_type WHERE 
account_type.account_type_id=chart_transactions.account_type_id AND chart_transactions.l_year='$curr_year_ttl' 
and chart_transactions.l_month='$month_val' 
and account_type.account_cat_id='6'";
$results_ttl_act= mysql_query($query_ttl_act) or die ("Error $queryop_ttl_act.".mysql_error());
$rows_ttl_act=mysql_fetch_object($results_ttl_act);

echo number_format($ttl_act_curr_exp=$rows_ttl_act->ttl_act,2);							
				
						
						
						
						
						
						?>
						
						
						
						</td>
						
						
						
						<?php } 
						
						
						?>	
						
						
						
						
						
						
						</tr>	




<tr bgcolor="#ccc" height="50">
						<td><strong>Net Profit</strong></td>
						
<?php 

for ($m=1; $m<=12; $m++)

	{
     $month_val = date('m', mktime(0,0,0,$m, 1, date('Y')));
     $month2 = date('M', mktime(0,0,0,$m, 1, date('Y')));
						
						?>
						
						<td><strong><?php //echo $ttl_pred_cos;
						
						

						
						

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
						

number_format($actual_gross=$ttl_act_inc-$ttl_act_cos,2);	



$prev_year_ttl=$curr_year_ttl-1;					
$query_ttl_act="select sum(amount*curr_rate) as ttl_act FROM chart_transactions,account_type WHERE 
account_type.account_type_id=chart_transactions.account_type_id AND chart_transactions.l_year='$prev_year_ttl' 
and chart_transactions.l_month='$month_val' 
and account_type.account_cat_id='6'";
$results_ttl_act= mysql_query($query_ttl_act) or die ("Error $queryop_ttl_act.".mysql_error());
$rows_ttl_act=mysql_fetch_object($results_ttl_act);

number_format($ttl_act_exp=$rows_ttl_act->ttl_act,2);






echo number_format($ttl_act_np=$actual_gross-$ttl_act_exp,2);


	
						
						
						
						
						
						?></strong>
</td>

<td><strong>

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


echo number_format($ttl_pred_np=$predict_gross-$ttl_pred_exp,2);



											
						
						
						?>



</strong>
</td>

<td>
<?php
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
						

number_format($actual_gross=$ttl_act_inc-$ttl_act_cos,2);	



$prev_year_ttl=$curr_year_ttl-1;					
$query_ttl_act="select sum(amount*curr_rate) as ttl_act FROM chart_transactions,account_type WHERE 
account_type.account_type_id=chart_transactions.account_type_id AND chart_transactions.l_year='$prev_year_ttl' 
and chart_transactions.l_month='$month_val' 
and account_type.account_cat_id='6'";
$results_ttl_act= mysql_query($query_ttl_act) or die ("Error $queryop_ttl_act.".mysql_error());
$rows_ttl_act=mysql_fetch_object($results_ttl_act);

number_format($ttl_act_exp=$rows_ttl_act->ttl_act,2);






echo number_format($ttl_act_np=$actual_gross-$ttl_act_exp,2);


	
						
						
						
						
						
						?>





</td>
<?php 

	}
?>						
						


</tr>						
						
						
						
						
						
						

 </table>


</td>
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


<?php 
//}

?>