<?php 

include('Connections/fundmaster.php'); 

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
		
		<div id="zone-bar" class="br-5">
          <?php include ('topmenu.php') ?>
		</div>

		<?php require_once('includes/loangivensubmenu.php');  ?>
		
		<h3>:: List of Loan Given Out</h3>
		
         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
			<div id="cont-left-full" class="br-5">
		
<table width="100%" border="0">
  <tr bgcolor="#FFFFCC">
   
    <td colspan="10" height="30" align="center"> 
	<?php

if ($_GET['addconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:550px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Loan Repaid Successfully!!</font></strong></p></div>';
?> 

<?php 

if ($_GET['deletesupconfirm']==1)
echo "<p align='center'><strong><font color='#FF0000'>Record Deleted!!</font></strong></p>";
?>
	
	</td>
	
    </tr>
<tr bgcolor="#FFFFCC"><td colspan="9" align="right"><a target="_blank" href="print_loan_rec.php" target="_blank"><img src="images/print_icon.gif" title="Print"></a> &nbsp;  &nbsp; <a href="print_loan_rec_word.php"><img src="images/word.png" title="Export to Word"></a></td></tr>  
  <tr  style="background:url(images/description.gif);" height="30" >
  <td align="center" width="200"><strong>Lender's Name</strong></td>
    <td align="center" width="100"><strong>Other Details</strong></td>
    <td align="center" width="160"><strong>Loan Amount (Other Currency)</strong></td>
    <td align="center" width="150"><strong>Exchange Rate</strong></td>
	<td align="center" width="150"><strong>Loan Amount(Kshs)</strong></td>
	<td align="center" width="150"><strong>Repaid Amount(Kshs)</strong></td>
    <td width="180" align="center"><strong>Balance</strong></td>
	<td width="180" align="center"><strong>Repay</strong></td>
    <td align="center" width="50"><strong>Edit</strong></td>
    <!--<td align="center" width="50"><strong>Delete</strong></td>-->
    </tr>
  
  <?php 
 
$sql="SELECT * FROM loan_given order by loan_given_id asc";
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
    <td><?php echo $rows->lenders_name;?></td>
    <td align="center">
<a href="view_loan_given_details.php?loan_given_id=<?php echo $rows->loan_given_id;?>" onclick="javascript:void window.open('view_loan_given_details.php?loan_given_id=<?php echo $rows->loan_given_id;?>','1368794944167',
'width=1000,height=200,toolbar=0,menubar=0,location=0,status=0,scrollbars=0,resizable=1,left=200,top=300');return false;">More details..</a>	
	
	
	<!--<a href="loan_details.php?loan_id=<?php echo $rows->loan_received_id;?>">More details..</a>-->
	
	
	</td>
    <td align="right"><?php 
$currency_code=$rows->currency_code;
$sqlcurr="select * from currency where curr_id='$currency_code'";
$resultscurr= mysql_query($sqlcurr) or die ("Error $sqlcurr.".mysql_error());
$rowcurr=mysql_fetch_object($resultscurr);
echo $curr_name=$rowcurr->curr_name.' '.number_format($loan_amount=$rows->loan_amount,2);

?></td>
	<td align="right"><?php echo $curr_rate=$rows->curr_rate;?></td>
	<td align="right"><?php echo number_format($loan_amnt_kshs=$curr_rate*$loan_amount,2);?></td>
	
	<td align="right"><?php 
$loan_given_id=$rows->loan_given_id;
$sqllp="select SUM(amount_received) as ttl_loan_rep from loan_given_repayments where loan_given_id='$loan_given_id'";
$resultslp= mysql_query($sqllp) or die ("Error $sqllp.".mysql_error());
$rowslp=mysql_fetch_object($resultslp);
	
echo number_format($loan_rep=$rowslp->ttl_loan_rep,2);

	?></td>
	
	<td align="right"><?php
echo number_format($loan_bal=$loan_amnt_kshs-$loan_rep,2);
	?>
	
	
	
	</td>
	<td align="center">
	
	<?php 
	if ($loan_rep=='')
	{
	?>
	<a href="repay_loan_given.php?loan_given_id=<?php echo $rows->loan_given_id; ?>&loan_paid=<?php echo $loan_rep;?>&loan_bal=<?php echo $loan_bal; ?>">Repay</a>
	<?php 
	}
	if($loan_rep!='' && $loan_rep!=$loan_amnt_kshs)
	{
	?>
	<a href="repay_loan_given.php?loan_given_id=<?php echo $rows->loan_given_id; ?>&loan_paid=<?php echo $loan_rep;?>&loan_bal=<?php echo $loan_bal; ?>">Repay Balance</a>
	<?php
	}
	if($loan_rep==$loan_amnt_kshs)
	{
	?>
	<font color="#009900">Cleared...</font>
	<?php
	}
	
	
	?>
	
	</td>
	
    <td align="center"><a href="edit_loan_given.php?loan_given_id=<?php echo $rows->loan_given_id; ?>"><img src="images/edit.png"></a></td>
    <!--<td align="center"><a href="delete_customer.php?client_id=<?php echo $rows->client_id; ?>"  onClick="return confirmDelete();"><img src="images/delete.png"></a></td>-->
    </tr>
  <?php 
  $grnd_loan_amnt_kshs=$grnd_loan_amnt_kshs+$loan_amnt_kshs;
  $grnd_loan_rep=$grnd_loan_rep+$loan_rep;
  $grnd_loan_bal=$grnd_loan_bal+$loan_bal;
  }
  ?>
  <tr height="30" bgcolor="#FFFFCC">
  <td align="center" width="200"><strong>Totals</strong></td>
    <td align="center" width="100"><strong></strong></td>
    <td align="center" width="160"><strong></strong></td>
    <td align="center" width="150"><strong></strong></td>
	<td align="right" width="150"><strong><?php echo number_format($grnd_loan_amnt_kshs,2); ?></strong></td>
	<td align="right" width="150"><strong><?php echo number_format($grnd_loan_rep,2); ?></strong></td>
    <td width="180" align="right"><strong><?php echo number_format($grnd_loan_bal,2); ?></strong></td>
	<td width="180" align="center"><strong></strong></td>
    <td align="center" width="50"><strong></strong></td>
    <!--<td align="center" width="50"><strong></strong></td>-->
    </tr>
  
  <?php 
  
  }
  
  
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