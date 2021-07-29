<?php
#include connection
include ('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
 $outreach_record_id=$_GET['outreach_record_id'];
 $disease_id=mysql_real_escape_string($_POST['disease']);
 $total_pat=mysql_real_escape_string($_POST['total_pat']);
 $male_pat=mysql_real_escape_string($_POST['male_pat']);
 $female_pat=mysql_real_escape_string($_POST['female_pat']);
 $child_pat=mysql_real_escape_string($_POST['child_pat']);
 $remarks=mysql_real_escape_string($_POST['remarks']);
 
 
 
 //echo $institution_name; 
 
 

$sql= "insert into diagnosis values ('','$outreach_record_id','$disease_id','$total_pat','$male_pat','$female_pat','$child_pat','$remarks')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sqlupdt= "UPDATE diseases SET status='1' where disease_id='$disease_id'";
$resultsupdt= mysql_query($sqlupdt) or die ("Error $sqlupdt.".mysql_error());


$sqlinst="SELECT * FROM insitution where institution_id='$institution_id'";
$resultsinst= mysql_query($sqlinst) or die ("Error $sqlinst.".mysql_error());
$rowsinst=mysql_fetch_object($resultsinst);
 $institution_name=$rowsinst->institution_name;
$to = 'updateosero@gmail.com';
$subject="New Outreach Record";
$from="EACO_Data_Collection_System";
$ip = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '';
		
$body = "Dear Administrator:\n
A new Outreach record has been enter into the system from $institution_name host institution";	
		
$headers = "From: $from \r\n";
//$headers2 .="CC: Mail1 <info@topsoftchoice.com>";

		
mail($to,$subject,$body,$headers);


header ("Location:home.php?outreach2=outreach2&addoutreachconfirm=1&outreach_record_id=$outreach_record_id");


mysql_close($cnn);

?>


