<?php
#include connection
include ('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form

$job_card_clock_id=$_GET['job_card_clock_id'];
$job_card_task_id=$_GET['job_card_task_id'];

$queryprod="select * from job_card_task where job_card_task_id='$job_card_task_id'";
$resultsprod=mysql_query($queryprod) or die ("Error: $queryprod.".mysql_error());
$rowsprod=mysql_fetch_object($resultsprod);
$booking_id=$rowsprod->booking_id;
$job_card_id=$rowsprod->job_card_id;
$task_id=$rowsprod->task_id;
//$job_card_task_id=$rowsprod->job_card_task_id;
//$assigned_job_card_id=$rowsprod->assigned_job_card_id;


//time_clocked_in
$querycl="select * from job_card_clock where job_card_task_id='$job_card_task_id' and clock_type='out' 
order by job_card_clock_id desc limit 0,1";
$resultscl=mysql_query($querycl) or die ("Error: $querycl.".mysql_error());
$rowscl=mysql_fetch_object($resultscl);
$time_clocked_id=$rowscl->date_clocked;
$curr_time=date ('Y-m-d H:i:s');

//compare and confirm it today
$begin_date=$rows->begin_date;
$end_date=$time_clocked_id;
// " - ";
 $today=$curr_time;
//echo " - ";
$now = strtotime("$end_date"); // or your date as well
     $your_date = strtotime("$today");
     $datediff = $now - $your_date;
	 
	  $datediff2 = $your_date-$now;
     //echo $due_days=floor($datediff/(60*60*24));
	  echo $over_due_days=floor($datediff2/(60*60*24));

 echo "-";
//difference in time taken to finish
 echo $fulldate_hour_start= $time_clocked_id;
 echo "-";
echo $fulldate_hour_end= $curr_time;
  echo "-";
 $difference = strtotime( $fulldate_hour_end .' UTC' ) - strtotime( $fulldate_hour_start .' UTC');
 
 $period_taken2 = floor( $difference / 3600 ) .'.' .gmdate( 'i', $difference );
 
 if ($period_taken2>8)
{
$period_taken='0.00';
}
else
{
 //$period_taken = floor( $difference / 3600 ) .'.' .gmdate( 'i', $difference );
 $period_taken = $period_taken2 ;
}
$sqllpo= "insert into job_card_clock VALUES('','$booking_id','$job_card_id','$job_card_task_id','$task_id','res','$user_id',NOW(),'$cat_desc','','$period_taken')";
$resultslpo= mysql_query($sqllpo) or die ("Error $sqllpo.".mysql_error());

$sqlupdt= "UPDATE job_card_task SET clocked_out_status='0' WHERE job_card_task_id='$job_card_task_id'";
$resultsupdt= mysql_query($sqlupdt) or die ("Error $sqlupdt.".mysql_error()); 



$sqlauditsav= "insert into audit_trails values('','$user_id',NOW(),'Resumed a task in a job card no $job_card_id into the system ')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());

header ("Location:home.php?assingomstaff=assingomstaff&resumeconfirm=1");




mysql_close($cnn);

?>


