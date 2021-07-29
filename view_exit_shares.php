<script type="text/javascript"> 

function confirmDelete()
{
    return confirm("Are you sure you want to exit shareholder?");
}

</script>


<table width="100%" border="0">
  <tr bgcolor="#FFFFCC">
   
    <td colspan="10" height="30" align="center"> 
	<?php

if ($_GET['exitconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:550px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Shareholder Deleted Successfully!!</font></strong></p></div>';
?> 

<?php 

if ($_GET['deletesupconfirm']==1)
echo "<p align='center'><strong><font color='#FF0000'>Record Deleted!!</font></strong></p>";
?>
	
	</td>
	
    </tr>
  
  <tr  style="background:url(images/description.gif);" height="30" >
 
    <td align="center" width="400"><strong>Share Holder Name</strong></td>
	<td align="center" width="200"><strong>Contact Person</strong></td>
	<td align="center" width="200"><strong>Date Joined</strong></td>
    <td align="center" width="260"><strong>Share Percentage (%)</strong></td>
	<td align="center" width="260"><strong>Capital Share Amount (USD)</strong></td>

	<td align="center" width="200"><strong>Reason</strong></td>
   
    </tr>
  
  <?php 
 
$sql="SELECT * FROM shares where status='1'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


if (mysql_num_rows($results) > 0)
						  {
							  $RowCounter=0;
							  while ($rows=mysql_fetch_object($results))
							  { 
							  
							  $RowCounter++;
							  if($RowCounter % 2==0)
{
echo '<tr bgcolor="#C0D7E5" height="25">';
}
else 
{
echo '<tr bgcolor="#FFFFCC" height="25" >';
}
 
 
 ?>
   
    <td><?php echo $rows->share_holder_name;?></td>
    <td><?php echo $rows->contact_person;?></td>
	<td align="center"><?php echo $rows->date_joined;?></td>
    <td align="right"><?php echo number_format($perc_shares=$rows->perc_shares,2);?></td>
	<td align="right"><?php echo number_format($rows->shares_amount,2);
	
	$shares=$rows->shares_amount;
	
	
	?></td>
	
	<td align="center"><?php 
	$shares_id=$rows->shares_id;
$queryrsn="select * from  exited_shareholder where shares_id='$shares_id'";
$resultsrsn=mysql_query($queryrsn) or die ("Error: $queryrsn.".mysql_error());
$rowsrsn=mysql_fetch_object($resultsrsn);
	
	
	echo $rowsrsn->reason; ?></td>
    
    </tr>
  <?php 
  $grndttlcap=$grndttlcap+$shares;
  $grnd_perc_shares=$grnd_perc_shares+$perc_shares;
  }
  ?>
  <tr height="30" bgcolor="#FFFFCC">
 
    <td align="center" width="400"><strong>Totals</strong></td>
    <td align="center" width="260"><strong></strong></td>
	<td align="center" width="260"><strong></strong></td>
	<td align="right" width="260"><strong><?php echo number_format($grnd_perc_shares,2); ?></strong></td>
	<td width="260" align="right"><strong><?php echo number_format($grndttlcap,2); ?></strong></td>
    <!--<td align="center" width="200"><strong>Mode of payment</strong></td>
	<td align="center" width="200"><strong>Date recorded</strong></td>-->
	<td align="center" width="100"><strong></strong></td>
   
    </tr>
  <?php 
  
  }
  
  
  ?>
</table>