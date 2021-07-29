<?php 
include('includes/session.php');
include('Connections/fundmaster.php');


header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment;Filename=Budget-$lpo_no.xls");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");

$date_from=$_GET['date_from'];



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Cash Ledger</title>

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
</style>

<!-- Table goes in the document BODY -->


</head>

<table width="100%" border="0" align="center" style="margin:auto;">	
	<tr>
 <td colspan="9"> 
<table border="0" width="100%">

<tr>
<td colspan="37">Budget For The Year : <?php echo $date_from; ?> </td>

</tr>





<tr><td width="30%"><strong></strong></td> <?php 

for ($m=1; $m<=12; $m++)

	{
     $month_val = date('m', mktime(0,0,0,$m, 1, date('Y')));
     $month2 = date('M', mktime(0,0,0,$m, 1, date('Y')));
						
						?>	 
						<td align="center"><?php 
						
						 $month2;
						echo 'Actual';
						?></td>
					<td align="center"><?php 
						echo 'Predictable';
						 $month2;
						
						?></td>
						
											<td align="center"><?php 
						echo 'Actual';
						 $month2;
						
						?></td>
						
						
						
						<?php } 
						
						
						?></tr>
						
						<tr><td><strong></strong></td> <?php 

for ($m=1; $m<=12; $m++)

	{
     $month_val = date('m', mktime(0,0,0,$m, 1, date('Y')));
     $month2 = date('M', mktime(0,0,0,$m, 1, date('Y')));
						
						?>	 
						<td align="center"><?php 
						
						echo $month2;
						
						?></td>
												<td align="center"><?php 
						
						echo $month2;
						
						?></td>
						
						<td align="center"><?php 
						
						echo $month2;
						
						?></td>
						
						
						
						<?php } 
						
						
						?></tr>
						
						<tr><td><strong></strong></td> <?php 

for ($m=1; $m<=12; $m++)

	{
     $month_val = date('m', mktime(0,0,0,$m, 1, date('Y')));
     $month2 = date('M', mktime(0,0,0,$m, 1, date('Y')));
						
						?>	 
						<td align="center"><?php 
						
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
						
						?></td>
                        <td align="center"><?php 
						
						$month2;
						
						//echo '2018';
						echo $curr_year;
						
						
						?></td>
						
						                        <td align="center"><?php 
						
						$month2;
						
						//echo '2018';
						echo $curr_year;
						
						
						?></td>
						
						
						
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
						
						
						
						
$queryop_curr="select SUM(amount) AS ttl_amount_curr_act FROM chart_transactions where account_type_id='$account_type_id' 
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
												
			
$query_ttl_act="select sum(amount) as ttl_act FROM chart_transactions,account_type WHERE 
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

echo number_format($ttl_pred_inc=$rows_ttl_pred->ttl_pred,2);	
						
											
						
						
						?></strong></td>
						
						<td>
						
<?php 


$query_ttl_act_curr="select sum(amount) as ttl_act FROM chart_transactions,account_type WHERE 
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
						
						
						
						
$query_curr="select SUM(amount) AS ttl_amount FROM chart_transactions where account_type_id='$account_type_id' 
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
						
						
						
$queryop_curr="select budget_amount FROM budget,budget_code where budget_code.budget_code_id=budget.budget_code_id 
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
echo number_format($budget_amount,2);						
}
						
						
						?></td>
						
						<td>
						
<?php 						
$query_curr="select SUM(amount) AS ttl_amount FROM chart_transactions where account_type_id='$account_type_id' 
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
$query_ttl_act="select sum(amount) as ttl_act FROM chart_transactions,account_type WHERE 
account_type.account_type_id=chart_transactions.account_type_id AND chart_transactions.l_year='$prev_year_ttl' 
and chart_transactions.l_month='$month_val' 
and account_type.account_cat_id='5'";
$results_ttl_act= mysql_query($query_ttl_act) or die ("Error $queryop_ttl_act.".mysql_error());
$rows_ttl_act=mysql_fetch_object($results_ttl_act);

echo number_format($ttl_act_cos=$rows_ttl_act->ttl_act,2);					
						
						
				
						
						
						
						
						
						?></strong></td>
						<td align="center"><strong><?php 
						
												
$query_ttl_pred="select sum(budget_amount) as ttl_pred FROM budget,budget_code,account_type
 WHERE account_type.account_type_id=budget_code.budget_account and budget_code.budget_code_id=budget.budget_code_id 
AND budget_code.budget_year='$curr_year_ttl' and budget.budget_month='$month_val' and account_type.account_cat_id='5'";
$results_ttl_pred= mysql_query($query_ttl_pred) or die ("Error $queryop_ttl_pred.".mysql_error());
$rows_ttl_pred=mysql_fetch_object($results_ttl_pred);

echo number_format($ttl_pred_cos=$rows_ttl_pred->ttl_pred,2);
						
											
						
						
						?></strong></td>
<td>


<strong><?php 
						
												



$query_ttl_act="select sum(amount) as ttl_act FROM chart_transactions,account_type WHERE 
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
$query_ttl_act="select sum(amount) as ttl_act FROM chart_transactions,account_type WHERE 
account_type.account_type_id=chart_transactions.account_type_id AND chart_transactions.l_year='$prev_year_ttl' 
and chart_transactions.l_month='$month_val' 
and account_type.account_cat_id='7'";
$results_ttl_act= mysql_query($query_ttl_act) or die ("Error $queryop_ttl_act.".mysql_error());
$rows_ttl_act=mysql_fetch_object($results_ttl_act);

number_format($ttl_act_inc=$rows_ttl_act->ttl_act,2);



$prev_year_ttl=$curr_year_ttl-1;					
$query_ttl_act="select sum(amount) as ttl_act FROM chart_transactions,account_type WHERE 
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
$query_ttl_pred="select sum(budget_amount) as ttl_pred FROM budget,budget_code,account_type
 WHERE account_type.account_type_id=budget_code.budget_account and budget_code.budget_code_id=budget.budget_code_id 
AND budget_code.budget_year='$curr_year_ttl' and budget.budget_month='$month_val' and account_type.account_cat_id='7'";
$results_ttl_pred= mysql_query($query_ttl_pred) or die ("Error $queryop_ttl_pred.".mysql_error());
$rows_ttl_pred=mysql_fetch_object($results_ttl_pred);

number_format($ttl_pred_sales=$rows_ttl_pred->ttl_pred,2);					
						
						
//////////////////total predict cost of sales												
$query_ttl_pred="select sum(budget_amount) as ttl_pred FROM budget,budget_code,account_type
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

				
$query_ttl_act="select sum(amount) as ttl_act FROM chart_transactions,account_type WHERE 
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
						
						
						
$query_curr="select SUM(amount) AS ttl_amount FROM chart_transactions where account_type_id='$account_type_id' 
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
						
$queryop_curr="select budget_amount FROM budget,budget_code where budget_code.budget_code_id=budget.budget_code_id 
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
echo number_format($budget_amount,2);						
}
						
											
						
						
						?></td>
						
						<td><?php 
						
						
$query_curr="select SUM(amount) AS ttl_amount FROM chart_transactions where account_type_id='$account_type_id' 
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
$query_ttl_act="select sum(amount) as ttl_act FROM chart_transactions,account_type WHERE 
account_type.account_type_id=chart_transactions.account_type_id AND chart_transactions.l_year='$prev_year_ttl' 
and chart_transactions.l_month='$month_val' 
and account_type.account_cat_id='6'";
$results_ttl_act= mysql_query($query_ttl_act) or die ("Error $queryop_ttl_act.".mysql_error());
$rows_ttl_act=mysql_fetch_object($results_ttl_act);

echo number_format($ttl_act_exp=$rows_ttl_act->ttl_act,2);							
				
						
						
						
						
						
						?></strong></td>
						<td align="center"><strong><?php 
						



$query_ttl_pred="select sum(budget_amount) as ttl_pred FROM budget,budget_code,account_type
 WHERE account_type.account_type_id=budget_code.budget_account and budget_code.budget_code_id=budget.budget_code_id 
AND budget_code.budget_year='$curr_year_ttl' and budget.budget_month='$month_val' and account_type.account_cat_id='6'";
$results_ttl_pred= mysql_query($query_ttl_pred) or die ("Error $queryop_ttl_pred.".mysql_error());
$rows_ttl_pred=mysql_fetch_object($results_ttl_pred);

echo number_format($ttl_pred_exp=$rows_ttl_pred->ttl_pred,2);
						
											
						
						
						?></strong></td>
						
						<td><?php
$query_ttl_act="select sum(amount) as ttl_act FROM chart_transactions,account_type WHERE 
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
					
$query_ttl_act="select sum(amount) as ttl_act FROM chart_transactions,account_type WHERE 
account_type.account_type_id=chart_transactions.account_type_id AND chart_transactions.l_year='$prev_year_ttl' 
and chart_transactions.l_month='$month_val' 
and account_type.account_cat_id='7'";
$results_ttl_act= mysql_query($query_ttl_act) or die ("Error $queryop_ttl_act.".mysql_error());
$rows_ttl_act=mysql_fetch_object($results_ttl_act);

number_format($ttl_act_inc=$rows_ttl_act->ttl_act,2);



$prev_year_ttl=$curr_year_ttl-1;					
$query_ttl_act="select sum(amount) as ttl_act FROM chart_transactions,account_type WHERE 
account_type.account_type_id=chart_transactions.account_type_id AND chart_transactions.l_year='$prev_year_ttl' 
and chart_transactions.l_month='$month_val' 
and account_type.account_cat_id='5'";
$results_ttl_act= mysql_query($query_ttl_act) or die ("Error $queryop_ttl_act.".mysql_error());
$rows_ttl_act=mysql_fetch_object($results_ttl_act);

number_format($ttl_act_cos=$rows_ttl_act->ttl_act,2);
						

number_format($actual_gross=$ttl_act_inc-$ttl_act_cos,2);	



$prev_year_ttl=$curr_year_ttl-1;					
$query_ttl_act="select sum(amount) as ttl_act FROM chart_transactions,account_type WHERE 
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
$query_ttl_pred="select sum(budget_amount) as ttl_pred FROM budget,budget_code,account_type
 WHERE account_type.account_type_id=budget_code.budget_account and budget_code.budget_code_id=budget.budget_code_id 
AND budget_code.budget_year='$curr_year_ttl' and budget.budget_month='$month_val' and account_type.account_cat_id='7'";
$results_ttl_pred= mysql_query($query_ttl_pred) or die ("Error $queryop_ttl_pred.".mysql_error());
$rows_ttl_pred=mysql_fetch_object($results_ttl_pred);

number_format($ttl_pred_sales=$rows_ttl_pred->ttl_pred,2);					
						
						
//////////////////total predict cost of sales												
$query_ttl_pred="select sum(budget_amount) as ttl_pred FROM budget,budget_code,account_type
 WHERE account_type.account_type_id=budget_code.budget_account and budget_code.budget_code_id=budget.budget_code_id 
AND budget_code.budget_year='$curr_year_ttl' and budget.budget_month='$month_val' and account_type.account_cat_id='5'";
$results_ttl_pred= mysql_query($query_ttl_pred) or die ("Error $queryop_ttl_pred.".mysql_error());
$rows_ttl_pred=mysql_fetch_object($results_ttl_pred);

number_format($ttl_pred_cos=$rows_ttl_pred->ttl_pred,2);	


number_format($predict_gross=$ttl_pred_sales-$ttl_pred_cos,2);		



$query_ttl_pred="select sum(budget_amount) as ttl_pred FROM budget,budget_code,account_type
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
$query_ttl_act="select sum(amount) as ttl_act FROM chart_transactions,account_type WHERE 
account_type.account_type_id=chart_transactions.account_type_id AND chart_transactions.l_year='$prev_year_ttl' 
and chart_transactions.l_month='$month_val' 
and account_type.account_cat_id='7'";
$results_ttl_act= mysql_query($query_ttl_act) or die ("Error $queryop_ttl_act.".mysql_error());
$rows_ttl_act=mysql_fetch_object($results_ttl_act);

number_format($ttl_act_inc=$rows_ttl_act->ttl_act,2);



$prev_year_ttl=$curr_year_ttl-1;					
$query_ttl_act="select sum(amount) as ttl_act FROM chart_transactions,account_type WHERE 
account_type.account_type_id=chart_transactions.account_type_id AND chart_transactions.l_year='$prev_year_ttl' 
and chart_transactions.l_month='$month_val' 
and account_type.account_cat_id='5'";
$results_ttl_act= mysql_query($query_ttl_act) or die ("Error $queryop_ttl_act.".mysql_error());
$rows_ttl_act=mysql_fetch_object($results_ttl_act);

number_format($ttl_act_cos=$rows_ttl_act->ttl_act,2);
						

number_format($actual_gross=$ttl_act_inc-$ttl_act_cos,2);	



$prev_year_ttl=$curr_year_ttl-1;					
$query_ttl_act="select sum(amount) as ttl_act FROM chart_transactions,account_type WHERE 
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
</html>
