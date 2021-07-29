<tr height="30" bgcolor="#C0D7E5">
    <td width="10%" colspan="3">Less Withdrawals</td>
    
	<td width="2%"><div align="right">
	
	<?php 
	$ttlwith=0;
$sqlwith="SELECT dividend FROM withdrawn_dividends";
$resultswith= mysql_query($sqlwith) or die ("Error $sqlwith.".mysql_error());

if (mysql_num_rows($resultswith) > 0)
{

 while ($rowswith=mysql_fetch_object($resultswith))
							  {
							  
							  $with=$rowswith->dividend;
							  $ttlwith=$ttlwith+ $with; 
							  }
							  
						echo number_format($ttlwith,2);
						


}
	?>
	
	
	</td>
    <td width="2%" colspan="2"></td>
    
</tr>