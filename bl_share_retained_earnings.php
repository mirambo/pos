<tr height="30" bgcolor="#C0D7E5">
    <td width="10%" colspan="3">Add Shares Retained Earnings</td>
    
	<td width="2%"><div align="right">
	
	<?php 
$ttlretearn=0;
$sqlretearn="SELECT dividend FROM ploughed_back_dividend";
$resultsretearn= mysql_query($sqlretearn) or die ("Error $sqlretearn.".mysql_error());

if (mysql_num_rows($resultsretearn) > 0)
{

 while ($rowsretearn=mysql_fetch_object($resultsretearn))
							  {
							  
							  $retearn=$rowsretearn->dividend;
							  $ttlretearn=$ttlretearn+ $retearn; 
							  }
							  
						echo number_format($ttlretearn,2);
						


}
	
	?>
	
	
	</td>
    <td width="2%" colspan="2"></td>
    
</tr>