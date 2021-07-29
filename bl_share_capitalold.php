<tr height="10" bgcolor="#C0D7E5">
    <td width="10%" colspan="3">Share Capital</td>
    
	<td width="2%"><div align="right">
	<?php
if ($date_from=='' && $date_to=='')
  
  {		
	
	
	
$ttlcapt=0;
$sqlcapt="SELECT * FROM shares where status='0'";
$resultscapt= mysql_query($sqlcapt) or die ("Error $sqlcapt.".mysql_error());

if (mysql_num_rows($resultscapt) > 0)
{

 while ($rowscapt=mysql_fetch_object($resultscapt))
							  {
							  
							  $captx=$rowscapt->shares_amount;
							  $curr_rate=$rowscapt->curr_rate;
							  $capt=$captx*$curr_rate;
							  $ttlcapt=$ttlcapt+ $capt; 
							  }
							  
						echo number_format($ttlcapt,2);
						


}


//end of filter
}

else
{

$ttlcapt=0;
$sqlcapt="SELECT * FROM shares where status='0' AND date_recorded BETWEEN '$date_from' AND '$date_to'";
$resultscapt= mysql_query($sqlcapt) or die ("Error $sqlcapt.".mysql_error());

if (mysql_num_rows($resultscapt) > 0)
{

 while ($rowscapt=mysql_fetch_object($resultscapt))
							  {
							  
							  $captx=$rowscapt->shares_amount;
							  $curr_rate=$rowscapt->curr_rate;
							  $capt=$captx*$curr_rate;
							  $ttlcapt=$ttlcapt+ $capt;  
							  }
							  
						echo number_format($ttlcapt,2);
						


}



}


	?>
	
	
	
	</td>
    <td width="2%" colspan="2"></td>
    
</tr>