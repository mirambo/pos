<table width="100%" border="0" align="center" style="margin-auto;">
<tr bgcolor="#FFFFCC" height="30" align="center">
<td><strong>Current Balance(0-30 days)</strong></td>
<td><strong>Due Balance (31-60 days)</strong></td>
<td><strong>Overdue Balance (61-90 days)</strong></td>
<td><strong>Past Overdue Balance (Over 90 days)</strong></td>
  </tr>
  <tr bgcolor="#C0D7E5" height="30" align="center">
<td>
<?php 

include('Connections/fundmaster.php');
//all balances
$sqlall="select * from client_transactions where client_id='24' and date_recorded BETWEEN '$date_back1' AND '$current_date2'";
$resultsall= mysql_query($sqlall) or die ("Error $sqlall.".mysql_error());
if (mysql_num_rows($resultsall) > 0)
						  {
							
							  while ($rowsall=mysql_fetch_object($resultsall))
							  { 
							  
							  $amount=$rowsall->amount;
	
	
							  
							  $balall=$balall+$rowsall->amount;
							  }
							  
							  //echo $balall;
							  }






$current_date2=date("Y-m-d", strtotime("+ 1 day")).' ';
$date_back1=date("Y-m-d", strtotime("- 30 day")).' ';

$sql30="select * from client_transactions where client_id='3' and date_recorded BETWEEN '$date_back1' AND '$current_date2'";
$results30= mysql_query($sql30) or die ("Error $sql30.".mysql_error());
if (mysql_num_rows($results30) > 0)
						  {
							
							  while ($rows30=mysql_fetch_object($results30))
							  { 
							  
							 echo  $amount=$rows30->amount;
	
	
							  
							// $bal30=$bal30+$rows30->amount;
							  }
							  
							 // echo $bal30;
							  }



?>
</td>
<td><?php 

$current_date2x=date("Y-m-d", strtotime(" -31 day"));
$date_back1x=date("Y-m-d", strtotime("- 60 day"));

$sql60="select * from client_transactions where client_id='3' and date_recorded BETWEEN '$date_back1x' AND '$current_date2x'";
$results60= mysql_query($sql60) or die ("Error $sql60.".mysql_error());
if (mysql_num_rows($results60) > 0)
						  {
							
							  while ($rows60=mysql_fetch_object($results60))
							  { 
							  
							  $amount=$rows60->amount;
	
	
							  
							  $bal60=$bal60+$rows60->amount;
							  }
							  
							  echo $bal60;
							  }


?>
</td>
<td><?php 

 $current_date3x=date("Y-m-d", strtotime(" -61 day"));
 $date_back2x=date("Y-m-d", strtotime("- 90 day"));

$sql90="select * from client_transactions where client_id='3' and date_recorded BETWEEN '$date_back2x' AND '$current_date3x'";
$results90= mysql_query($sql90) or die ("Error $sql90.".mysql_error());
if (mysql_num_rows($results90) > 0)
						  {
							
							  while ($rows90=mysql_fetch_object($results90))
							  { 
							  
							  $amount=$rows90->amount;
	
	
							  
							  $bal90=$bal90+$rows90->amount;
							  }
							  
							  echo $bal90;
							  }





?></td>
<td><?php 

$current_date4x=date("Y-m-d", strtotime(" -91 day"));
$date_back3x=date("Y-m-d", strtotime("- 760 day"));

$sqlov="select * from client_transactions where client_id='3' and date_recorded BETWEEN '$date_back3x' AND '$current_date4x'";
$resultsov= mysql_query($sqlov) or die ("Error $sqlov.".mysql_error());
if (mysql_num_rows($resultsov) > 0)
						  {
							
							  while ($rowsov=mysql_fetch_object($resultsov))
							  { 
							  
							  $amount=$rowsov->amount;
	
	
							  
							  $balov=$balov+$rowsov->amount;
							  }
							  
							  echo $balov;
							  }




?></td>
  </tr>
  
</table>