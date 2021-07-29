<?php 
 
 $grnd_ttl_orig_amnt=0; 

	
//$query2 = mysql_query("select * FROM ledger_transactions WHERE account_id ='$account_id'");
   
   
   
   
 if (!isset($_POST['generate']))
{

$year = date('Y'); $month = date('m');

$starts = '01';
$ends = date('t', strtotime($month.'/'.$year)); //Returns days in month 6/2011

$start_day=$year.'-'.$month.'-'.$starts;
$end_day=$year.'-'.$month.'-'.$ends;
 
$sql="select * FROM ledger_transactions WHERE account_id ='$account_id' AND transaction_date >='$start_day' AND transaction_date<='$end_day'";
$resultsdc= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
else
{


$querydc= "SELECT * FROM ledger_transactions";
    $conditions = array();
    if($report_date_id==1) //all
	
	{
	
    $conditions[] = "transaction_date!=''";
	
    }
	
	
	if($report_date_id==2) //today
	
	{
	
	$todate=date('Y-m-d');
	
    $conditions[] = "transaction_date='$todate'";
	
    }
	
	
	
	if($report_date_id==3) // this week
	
	{
	
$day = date('w');
$week_start =date('Y-m-d', strtotime('-'.$day.' days'));
$week_end = date('Y-m-d', strtotime('+'.(6-$day).' days'));
	
    $conditions[] = "transaction_date >='$week_start' AND transaction_date<='$week_end'";
	
    }
	
	if($report_date_id==4) //this week to date
	
	{
	
	$day = date('w');
$week_start =date('Y-m-d', strtotime('-'.$day.' days'));
$todate=date('Y-m-d');
//$week_end = date('Y-m-d', strtotime('+'.(6-$day).' days'));
	
    //$conditions[] = "order_code_get.supplier_id='$supplier'";
	
	$conditions[] = "transaction_date >='$week_start' AND transaction_date<='$todate'";
	
    }
	
	if($report_date_id==5) // this month
	
	{
$year = date('Y'); $month = date('m');

$starts = '01';
$ends = date('t', strtotime($month.'/'.$year)); //Returns days in month 6/2011

$start_day=$year.'-'.$month.'-'.$starts;
$end_day=$year.'-'.$month.'-'.$ends;


    //$conditions[] = "order_code_get.supplier_id='$supplier'";
	$conditions[] = "transaction_date >='$start_day' AND transaction_date<='$end_day'";
	
    }
	
	if($report_date_id==6) //this month to date
	
	{
	
	$year = date('Y'); $month = date('m');

$starts = '01';
$ends = date('t', strtotime($month.'/'.$year)); //Returns days in month 6/2011

$start_day=$year.'-'.$month.'-'.$starts;
$todate=date('Y-m-d');
	
   // $conditions[] = "order_code_get.supplier_id='$supplier'";
   
   $conditions[] = "transaction_date >='$start_day' AND transaction_date<='$todate'";
	
    }
	
	if($report_date_id==7) // year
	
	{
	$year = date('Y');
	$month = '01';
	$day = '01';
	$start_day =$year.'-01-01';
	$end_day =$year.'-12-31';
	
    //$conditions[] = "order_code_get.supplier_id='$supplier'";
	
	   $conditions[] = "transaction_date >='$start_day' AND transaction_date<='$end_day'";

	
    }
	
	if($report_date_id==8) //this year to date
	
	{
	$year = date('Y');
	$start_day =$year.'-01-01';
	$todate=date('Y-m-d');
	
    $conditions[] = "transaction_date >='$start_day' AND transaction_date<='$todate'";
	
    }
	
	if($report_date_id==9) // yesterday
	
	{
	$yesterday=date("Y-m-d", strtotime( '-1 days' ) );
	
	
$conditions[] = "transaction_date='$yesterday'";
	
    }


	if($date_from!='' && $date_to!='' ) {
	
      $conditions[] = " transaction_date >='$date_from' AND transaction_date<='$date_to' ";
    }
	
	if($shop_id!=0) 
	{
	
	$conditions[] = "shop_id='$shop_id'";
	
	/* $sqlsp="SELECT * FROM account where account_id='$shop_id'";
$resultsp= mysql_query($sqlsp) or die ("Error $sqlsp.".mysql_error());
$rowsp=mysql_fetch_object($resultsp);
echo $rowsp->account_name; */
	
	//echo $date_from.' To '.$date_to;
	
      //$conditions[] = " transaction_date >='$date_from' AND transaction_date<='$date_to' ";
    }
	
    //$sql = $query;
    if (count($conditions) > 0) {
	
	
	$year = date('Y'); $month = date('m');

$starts = '01';
$ends = date('t', strtotime($month.'/'.$year)); //Returns days in month 6/2011

$start_day=$year.'-'.$month.'-'.$starts;
$end_day=$year.'-'.$month.'-'.$ends;
	
	
	
      $querydc .= " WHERE " . implode(' AND ', $conditions)." AND account_id='$account_id'";
    }
	else
	{	
	
	/* $year = date('Y'); $month = date('m');

$starts = '01';
$ends = date('t', strtotime($month.'/'.$year)); //Returns days in month 6/2011

$start_day=$year.'-'.$month.'-'.$starts;
$end_day=$year.'-'.$month.'-'.$ends;
	
$querydc="select * FROM ledger_transactions WHERE account_id ='$account_id' AND transaction_date >='$start_day' AND transaction_date<='$end_day'";
$resultsdc=mysql_query($querydc) or die ("Error: $querydc.".mysql_error());  */

	}

    $resultsdc = mysql_query($querydc) or die ("Error $querydc.".mysql_error());


}   
   
   
   
   
   
	
   

?>