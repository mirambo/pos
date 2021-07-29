<?php 
include('Connections/fundmaster.php');
//sales


if ($date_from!='' && $date_to!='')
{
$queryop2="select SUM(amount*curr_rate) AS ttl_sales FROM chart_transactions,account_type,account_category 
where account_category.account_cat_id=account_type.account_cat_id and account_type.account_type_id=chart_transactions.account_type_id 
AND account_category.account_cat_id='7' and chart_transactions.transaction_date>='$date_from' AND 
chart_transactions.transaction_date<='$date_to'";
$results2= mysql_query($queryop2) or die ("Error $queryop.".mysql_error());
$rows2=mysql_fetch_object($results2);
}
elseif ($date_from=='' && $date_to!='')
{
	
$queryop2="select SUM(amount*curr_rate) AS ttl_sales FROM chart_transactions,account_type,account_category 
where account_category.account_cat_id=account_type.account_cat_id and account_type.account_type_id=chart_transactions.account_type_id 
AND account_category.account_cat_id='7' AND chart_transactions.transaction_date<='$date_to'";
$results2= mysql_query($queryop2) or die ("Error $queryop.".mysql_error());
$rows2=mysql_fetch_object($results2);
	
	
	
}
elseif ($date_from!='' && $date_to=='')
{
	
$queryop2="select SUM(amount*curr_rate) AS ttl_sales FROM chart_transactions,account_type,account_category 
where account_category.account_cat_id=account_type.account_cat_id and account_type.account_type_id=chart_transactions.account_type_id 
AND account_category.account_cat_id='7' AND chart_transactions.transaction_date<='$date_from'";
$results2= mysql_query($queryop2) or die ("Error $queryop.".mysql_error());
$rows2=mysql_fetch_object($results2);
	
	
	
}
else
{

$queryop2="select SUM(amount*curr_rate) AS ttl_sales FROM chart_transactions,account_type,account_category where 
account_category.account_cat_id=account_type.account_cat_id and account_type.account_type_id=chart_transactions.account_type_id 
AND account_category.account_cat_id='7' ";
$results2= mysql_query($queryop2) or die ("Error $queryop.".mysql_error());
$rows2=mysql_fetch_object($results2);	
	
	
}




$ttl_sales=$rows2->ttl_sales;

//cost of sales

if ($date_from!='' && $date_to!='')
{
$queryop3="select SUM(amount*curr_rate) AS ttl_cost_sales FROM chart_transactions,account_type,account_category where 
account_category.account_cat_id=account_type.account_cat_id and account_type.account_type_id=chart_transactions.account_type_id 
AND account_category.account_cat_id='5' and chart_transactions.transaction_date>='$date_from' AND chart_transactions.transaction_date<='$date_to'";
$results3= mysql_query($queryop3) or die ("Error $queryop3.".mysql_error());
$rows3=mysql_fetch_object($results3);

}

elseif ($date_from=='' && $date_to!='')
{

$queryop3="select SUM(amount*curr_rate) AS ttl_cost_sales FROM chart_transactions,account_type,account_category where 
account_category.account_cat_id=account_type.account_cat_id and account_type.account_type_id=chart_transactions.account_type_id 
AND account_category.account_cat_id='5' AND chart_transactions.transaction_date<='$date_to'";
$results3= mysql_query($queryop3) or die ("Error $queryop3.".mysql_error());
$rows3=mysql_fetch_object($results3);	
	
}

elseif ($date_from!='' && $date_to=='')
{
	
$queryop3="select SUM(amount*curr_rate) AS ttl_cost_sales FROM chart_transactions,account_type,account_category where 
account_category.account_cat_id=account_type.account_cat_id and account_type.account_type_id=chart_transactions.account_type_id 
AND account_category.account_cat_id='5' AND chart_transactions.transaction_date<='$date_from'";
$results3= mysql_query($queryop3) or die ("Error $queryop3.".mysql_error());
$rows3=mysql_fetch_object($results3);	
	
	
}
else
{
$queryop3="select SUM(amount*curr_rate) AS ttl_cost_sales FROM chart_transactions,account_type,account_category 
where account_category.account_cat_id=account_type.account_cat_id and account_type.account_type_id=chart_transactions.account_type_id 
AND account_category.account_cat_id='5'";
$results3= mysql_query($queryop3) or die ("Error $queryop3.".mysql_error());
$rows3=mysql_fetch_object($results3);
	
}


$ttl_cost_sales=$rows3->ttl_cost_sales;


$gross_margin=$ttl_sales-$ttl_cost_sales;


//expense


if ($date_from!='' && $date_to!='')
{
$queryop34="select SUM(amount*curr_rate) AS ttl_expenses FROM chart_transactions,account_type,account_category 
where account_category.account_cat_id=account_type.account_cat_id and account_type.account_type_id=chart_transactions.account_type_id 
AND account_category.account_cat_id='6' and chart_transactions.transaction_date>='$date_from' AND chart_transactions.transaction_date<='$date_to'";
$results34= mysql_query($queryop34) or die ("Error $queryop34.".mysql_error());
$rows34=mysql_fetch_object($results34);

}


elseif ($date_from=='' && $date_to!='')
{
	
$queryop34="select SUM(amount*curr_rate) AS ttl_expenses FROM chart_transactions,account_type,account_category 
where account_category.account_cat_id=account_type.account_cat_id and account_type.account_type_id=chart_transactions.account_type_id 
AND account_category.account_cat_id='6' and chart_transactions.transaction_date<='$date_to'";
$results34= mysql_query($queryop34) or die ("Error $queryop34.".mysql_error());
$rows34=mysql_fetch_object($results34);
	
	
}

elseif ($date_from!='' && $date_to=='')
{
	
$queryop34="select SUM(amount*curr_rate) AS ttl_expenses FROM chart_transactions,account_type,account_category 
where account_category.account_cat_id=account_type.account_cat_id and account_type.account_type_id=chart_transactions.account_type_id 
AND account_category.account_cat_id='6' and chart_transactions.transaction_date<='$date_from'";
$results34= mysql_query($queryop34) or die ("Error $queryop34.".mysql_error());
$rows34=mysql_fetch_object($results34);
		
}

else 
{
	
	$queryop34="select SUM(amount*curr_rate) AS ttl_expenses FROM chart_transactions,account_type,account_category 
where account_category.account_cat_id=account_type.account_cat_id and account_type.account_type_id=chart_transactions.account_type_id 
AND account_category.account_cat_id='6'";
$results34= mysql_query($queryop34) or die ("Error $queryop34.".mysql_error());
$rows34=mysql_fetch_object($results34);
	
	
}

$ttl_expenses=$rows34->ttl_expenses;


echo number_format($ttl_profit=$gross_margin-$ttl_expenses,2);



?>