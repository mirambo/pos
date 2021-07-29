<?php 
include('includes/session.php');
include('Connections/fundmaster.php'); 
$bank=$_GET['bank_id'];
$date_from=$_GET['date_from'];
$date_to=$_GET['date_to'];
$out_bal=$_GET['out_bal'];
?>
<html xmlns="http://www.w3.org/1999/xhtml">

<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>

<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>
<script type="text/javascript"> 

function confirmDelete()
{
    return confirm("Are you sure you want to delete?");
}


</script>

<body>

	<div id="page-wrap">

		<?php include ('header.php') ?>
		
		
          <?php include ('topmenu.php') ?>
	
		
		
		
<?php require_once('includes/bank_reconcilliation_submenu.php'); ?>
		
		<h3>:: Reconciled System Bank Statement</h3>
		
         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
			<div id="cont-left-full" class="br-5">
			
<table width="100%" border="0">
  <tr bgcolor="#FFFFCC">
   
    <td colspan="11" height="30" align="center"> 

	
	</td>
	
    </tr>
	
	<tr bgcolor="#FFFFCC">
   
    <td colspan="11" height="30" align="center"> 
	<a target="_blank" style="float:right; margin-right:200px; font-weight:bold; font-size:13px; color:#000000" href="print_list_reconciliation.php">Print</a>						  

<a style="float:right; margin-right:50px; font-weight:bold; font-size:13px; color:#000000" href="print_list_reconciliation_excel.php">Export To Excel</a>						  

	</td>
	
    </tr>
  
  <tr  style="background:url(images/description.gif);" height="30" >
       <td align="center" width="200"><strong>Description</strong></td>
     <td align="center" ><strong>Date Recorded</strong></td>	
     <td align="center" ><strong>Bank Affected</strong></td>
     <td align="center" ><strong>Reconciliation Period</strong></td>
     <td align="center" ><strong>Effect</strong></td>	 
    <td align="center"><strong>Amount Reconciled </br>(Other Currency)</strong></td>
	<td align="center"><strong>Exchange Rate</strong></td>
	<td align="center"><strong>Amount (SSP)</strong></td>

    </tr>
<!--<tr height="25" bgcolor="#FFFFCC">
	<td><strong>System Bank Balance</strong></td>
    <td align="center">-</td>
    <td align="right">-</td>
	<td align="center">KSHS</td>
	<td align="center"><?php echo number_format(1,2);?></td>
	
	<td align="right"><strong><?php echo number_format($out_bal,2);?><strong></td>
	<td align="center">-</td>
	<td align="center">-</td>
  </tr>-->
  <?php 
  
  
$sql="select * FROM reconciled_system_balance,currency 
WHERE reconciled_system_balance.currency=currency.curr_id order by date_done desc";
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
  
    <td><?php echo $rows->description;?></td>
    <td align="center"><?php echo $rows->date_done;?></td>
    <td align="center"><?php
	$bank=$rows->bank_id;
if ($bank==0)	
{
echo "-";
}
else
{	
$queryprod="select * from banks where bank_id='$bank'";
$resultsprod=mysql_query($queryprod) or die ("Error: $queryprod.".mysql_error());
$rowsprod=mysql_fetch_object($resultsprod);
echo $bank_name=$rowsprod->bank_name;
}	
	
	?></td>
    <td align="center">
	
	<?php echo '<i>'.$rows->date_from.'</i> To <i>'.$rows->date_to.'</i>';
	
	
	?></td>
    <td >
	
	<?php //echo number_format($amount=$rows->amount,2);
$effect=$rows->effect;
	if ($effect==1)
	{
	echo "Increase Cash";
	}
	
		if ($effect==2)
	{
echo "Increase Bank";
	}
	
		if ($effect==3)
	{
echo "Reduce Cash";	
	}
	
		if ($effect==4)
	{
echo "Increase Bank";
	}
	
	?></td>
	<td align="center"><?php echo $rows->curr_name.' '.$amount=$rows->amount;?></td>
	<td align="center"><?php echo number_format($curr_rate=$rows->curr_rate,2);?></td>
	
	<td align="right"><strong><?php echo number_format($amnt_kshs=$amount*$curr_rate,2);?><strong></td>
	
	
    <!--<td align="center"><a href="edit_reconciled_system_balance.php?reconciled_system_balance=<?php echo $rows->reconciled_system_balance_id;?>"><img src="images/edit.png"></a></td>
    <td align="center"><a href="delete_reconciled_system_balance.php?reconciled_system_balance=
	<?php echo $rows->reconciled_system_balance_id;?>&date_from=<?php echo $date_from?>&date_to=<?php echo $date_from?>&bank_id=<?php echo $bank ?>&out_bal=<?php echo $out_bal; ?>" onClick="return confirmDelete();">
	<img src="images/delete.png"></a></td>-->
    </tr>
  <?php 
  $grnd_amnt_kshs=$grnd_amnt_kshs+$amnt_kshs;
  
  }
  
  
  }
  
  ?>
  <tr bgcolor="#FFFFCC" height="30">
    <td  colspan="7"><strong>Total Amount Reconciled</strong></td>
    <td  colspan="1" align="right"><strong><font color="#ff0000" size="+1"><?php echo number_format($grnd_amnt_kshs,2);?></font></strong></td>
    <!--<td align="center"></td>
    <td align="center"></td>-->
	
    
	
	
  </tr>
  <?php
  
  ?>
</table>
		
			

			
			
			
					
			  </div>
				
				
			
			
			</div>
			
			
				
				
				
				
					<div class="clear"></div>
				</div>
				<div class="clear"></div>
			</div>
			<div id="footer">
			<?php include ('footer.php'); ?>
		</div>
		</div>
		
		
		
	</div>
	
</body>

</html>