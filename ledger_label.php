<?php
if($shop_id!=0) 
	{
	
	$sqlsp="SELECT * FROM account where account_id='$shop_id'";
$resultsp= mysql_query($sqlsp) or die ("Error $sqlsp.".mysql_error());
$rowsp=mysql_fetch_object($resultsp);
echo 'Shop : '.$rowsp->account_name.'  ';
	
	//echo $date_from.' To '.$date_to;
	
      //$conditions[] = " transaction_date >='$date_from' AND transaction_date<='$date_to' ";
    }
if($report_date_id==1) //all
	
	{
	
    //$conditions[] = "transaction_date!=''";
	echo "All Transactions";
	
    }
	
	
	if($report_date_id==2) //today
	
	{
	
echo "Period : ". $report_date_name.' ('.$todate=date('Y-m-d').')';
	
    ///$conditions[] = "transaction_date='$todate'";
	
    }
	
	
	
	if($report_date_id==3) // this week
	
	{
	
$day = date('w');
$week_start =date('Y-m-d', strtotime('-'.$day.' days'));
$week_end = date('Y-m-d', strtotime('+'.(6-$day).' days'));
	
    //$conditions[] = "transaction_date >='$week_start' AND transaction_date<='$week_end'";
	
	echo "Period : ". $report_date_name.' ('.$week_start.' To '.$week_end.')';
	
    }
	
	if($report_date_id==4) //this week to date
	
	{
	
	$day = date('w');
$week_start =date('Y-m-d', strtotime('-'.$day.' days'));
$todate=date('Y-m-d');
//$week_end = date('Y-m-d', strtotime('+'.(6-$day).' days'));
	
    //$conditions[] = "order_code_get.supplier_id='$supplier'";
	
	//$conditions[] = "transaction_date >='$week_start' AND transaction_date<='$todate'";
	
	//echo $week_start.' To '.$todate;
	
	echo "Period : ". $report_date_name.' ('.$week_start.' To '.$todate.')';
	
    }
	
	if($report_date_id==5) // this month
	
	{
$year = date('Y'); $month = date('m');

$starts = '01';
$ends = date('t', strtotime($month.'/'.$year)); //Returns days in month 6/2011

$start_day=$year.'-'.$month.'-'.$starts;
$end_day=$year.'-'.$month.'-'.$ends;

//echo $start_day.' To '.$end_day;

echo "Period : ". $report_date_name.' ('.$start_day.' To '.$end_day.')';
    //$conditions[] = "order_code_get.supplier_id='$supplier'";
	//$conditions[] = "transaction_date >='$start_day' AND transaction_date<='$end_day'";
	
    }
	
	if($report_date_id==6) //this month to date
	
	{
	
	$year = date('Y'); $month = date('m');

$starts = '01';
$ends = date('t', strtotime($month.'/'.$year)); //Returns days in month 6/2011

$start_day=$year.'-'.$month.'-'.$starts;
$todate=date('Y-m-d');

echo "Period : ". $report_date_name.' ('.$start_day.' To '.$todate.')';

//echo $start_day.' To '.$todate;
	
   // $conditions[] = "order_code_get.supplier_id='$supplier'";
   
   //$conditions[] = "transaction_date >='$start_day' AND transaction_date<='$todate'";
	
    }
	
	if($report_date_id==7) // year
	
	{
	$year = date('Y');
	$month = '01';
	$day = '01';
	$start_day =$year.'-01-01';
	$end_day =$year.'-12-31';
	
	
	//echo $start_day.' To '.$end_day;
	
	echo $report_date_name.' ('.$start_day.' To '.$end_day.')';
	
    //$conditions[] = "order_code_get.supplier_id='$supplier'";
	
	  // $conditions[] = "transaction_date >='$start_day' AND transaction_date<='$end_day'";

	
    }
	
	if($report_date_id==8) //this year to date
	
	{
	$year = date('Y');
	$start_day =$year.'-01-01';
	$todate=date('Y-m-d');
	
    //$conditions[] = "transaction_date >='$start_day' AND transaction_date<='$todate'";
	
	///echo $start_day.' To '.$todate;
	
	echo "Period : ". $report_date_name.' ('.$start_day.' To '.$todate.')';
	
    }
	
	if($report_date_id==9) // yesterday
	
	{
	$yesterday=date("Y-m-d", strtotime( '-1 days' ) );
	
	//echo $yesterday;
	
	echo "Period : ". $report_date_name.'('.$yesterday.')';
	
//$conditions[] = "transaction_date='$yesterday'";
	
    }
	
	if($date_from!='' && $date_to!='' ) 
	{
	
	echo "Period : ". $date_from.' To '.$date_to;
	
      //$conditions[] = " transaction_date >='$date_from' AND transaction_date<='$date_to' ";
    }
	
	
	
	
	else
	{
	
	/* $year = date('Y'); $month = date('m');

$starts = '01';
$ends = date('t', strtotime($month.'/'.$year)); //Returns days in month 6/2011

$start_day=$year.'-'.$month.'-'.$starts;
$end_day=$year.'-'.$month.'-'.$ends;
	
	echo ' This Month ('.$start_day.' To '.$end_day.')'; */
	
	
	}





	?>