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
	
		
		
		
		<?php require_once('includes/usersubmenu.php');  ?>
		
		<h3>:: Reconciled Bank Statement (Balance)</h3>
		
         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
			<div id="cont-left-full" class="br-5">
			
			
			
			
			
			
<table width="100%" border="0">
  <tr bgcolor="#FFFFCC">
   
    <td colspan="8" height="30" align="center"> 
	<strong><font size="">Reconciled Bank Statement (Balance)for Account: </font><font  color="#ff0000"><?php 

$sqlemp_det="select * from banks where bank_id='$bank'";
$resultsemp_det= mysql_query($sqlemp_det) or die ("Error $sqlemp_det.".mysql_error());
$rowsemp_det=mysql_fetch_object($resultsemp_det);
echo $rowsemp_det->bank_name.' ('.$rowsemp_det->account_name.')';
 ?></font></strong>
 
 <strong><font >For the Period Between : </font>
  <font color="#ff0000" ><?php echo $date_from; ?></font><font >And <font color="#ff0000" ><?php echo $date_to; ?></font></strong>
 
 </div>
	
	</td>
	
    </tr>
	
	<tr bgcolor="#FFFFCC">
   
    <td colspan="8" height="30" align="center"> 
	<?php

if ($_GET['updateuserconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:550px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >User Updated Successfully!!</font></strong></p></div>';
?> 
	
	</td>
	
    </tr>
  
  <tr  style="background:url(images/description.gif);" height="30" >
    <td align="center" width="200"><strong>Description</strong></td>
    <td align="center" ><strong>Date Recorded</strong></td>
    <td align="center"><strong>Amount Adjusted</strong></td>
	<td align="center"><strong>Currency</strong></td>
	<td align="center"><strong>Exchange Rate</strong></td>
	<td align="center"><strong>Amount (Kshs)</strong></td>
    <!--<td width="150" align="center"><strong>Activate / Deactivate</strong></td>-->
    <td align="center"><strong>Edit</strong></td>
    <td align="center"><strong>Delete</strong></td>
    </tr>
<tr height="25" bgcolor="#FFFFCC">
	<td><strong>System Bank Balance</strong></td>
    <td align="center">-</td>
    <td align="right">-</td>
	<td align="center">KSHS</td>
	<td align="center"><?php echo number_format(1,2);?></td>
	
	<td align="right"><strong><?php echo number_format($out_bal,2);?><strong></td>
	<td align="center">-</td>
	<td align="center">-</td>
  </tr>
  <?php 
  
  
$sql="select reconciled_bank_balance.date_from,reconciled_bank_balance.reconciled_bank_balance_id,reconciled_bank_balance.date_to,reconciled_bank_balance.system_balance,
reconciled_bank_balance.description,reconciled_bank_balance.amount,reconciled_bank_balance.currency,currency.curr_name,
reconciled_bank_balance.curr_rate,reconciled_bank_balance.date_done FROM reconciled_bank_balance,currency 
WHERE reconciled_bank_balance.currency=currency.curr_id AND reconciled_bank_balance.bank_id='$bank' and reconciled_bank_balance.date_from='$date_from' 
AND reconciled_bank_balance.date_to='$date_to'";
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
    <td align="right"><?php echo number_format($amount=$rows->amount,2);?></td>
	<td align="center"><?php echo $rows->curr_name;?></td>
	<td align="center"><?php echo number_format($curr_rate=$rows->curr_rate,2);?></td>
	
	<td align="right"><strong><?php echo number_format($amnt_kshs=$amount*$curr_rate,2);?><strong></td>
	
	
    <td align="center"><a href="edit_reconciled_bank_balance.php?reconciled_bank_balance=<?php echo $rows->reconciled_bank_balance_id;?>"><img src="images/edit.png"></a></td>
    <td align="center"><a href="delete_reconciled_bank_balance.php?reconciled_bank_balance=
	<?php echo $rows->reconciled_bank_balance_id;?>&date_from=<?php echo $date_from?>&date_to=<?php echo $date_from?>&bank_id=<?php echo $bank ?>&out_bal=<?php echo $out_bal; ?>" onClick="return confirmDelete();">
	<img src="images/delete.png"></a></td>
    </tr>
  <?php 
  $grnd_amnt_kshs=$grnd_amnt_kshs+$amnt_kshs;
  
  }
  
  
  }
  
  ?>
  <tr bgcolor="#FFFFCC" height="30">
    <td  colspan="5"><strong>Reconciled Bank Statement Balance(Kshs)</strong></td>
    <td  colspan="1" align="right"><strong><font color="#ff0000" size="+1"><?php echo number_format($grnd_amnt_kshs+$out_bal,2);?></font></strong></td>
    <td align="center"></td>
    <td align="center"></td>
	
    
	
	
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