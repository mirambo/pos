<tr height="10" bgcolor="#C0D7E5">
    <td width="10%" colspan="3">Less Dividends</td>
    
	<td width="2%"><div align="right">
	
	<?php 
$ttldiv=0;
$sqldiv="SELECT dividend_amount FROM dividends";
$resultsdiv= mysql_query($sqldiv) or die ("Error $sqldiv.".mysql_error());

if (mysql_num_rows($resultsdiv) > 0)
{

 while ($rowsdiv=mysql_fetch_object($resultsdiv))
							  {
							  
							  $div=$rowsdiv->dividend_amount;
							  $ttldiv=$ttldiv+ $div; 
							  }
							  
						echo number_format($ttldiv,2);
						


}?>
	
	
	</td>
    <td width="2%" colspan="2"></td>
    
</tr>