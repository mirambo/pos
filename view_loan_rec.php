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

		<?php require_once('includes/loanrecsubmenu.php');  ?>
		
		<h3>:: List of Loan Received</h3>
		
         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
			<div id="cont-left-full" class="br-5">
<form name="filter" method="post" action=""> 			
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
<tr bgcolor="#FFFFCC"><td colspan="10" align="center">
<strong>Search : By Lender Name:</strong>
	<select name="client">
	<option value="0">-------------------Select-----------------</option>
								  <?php
								  
								  $query1="select * from loan_received order by lenders_name asc";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->loan_received_id; ?>"><?php echo $rows1->lenders_name; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
								  
								  
								  
								  
								  
								  ?>
								  
								  </select>

			<input type="submit" name="generate" value="Generate">

<a target="_blank" style="float:right; margin-right:100px; font-weight:bold; font-size:13px; color:#000000" href="print_list_loan_rec.php?client=<?php echo $client?>&date_from=<?php echo $date_from ?>&date_to=<?php echo $date_to ?>">Print</a>						  

<a  style="float:right; margin-right:100px; font-weight:bold; font-size:13px; color:#000000" href="print_list_loan_rec_excel.php">Export To Excel</a>						  

</td></tr>  
  <tr  style="background:url(images/description.gif);" height="30" >
  <td align="center" width="200"><strong>Lender's Name</strong></td>
    <td align="center" width="100"><strong>Other Details</strong></td>
    <td align="center" width="100"><strong>Date Borrowed</strong></td>
    <td align="center" width="160"><strong>Loan Amount (Other Currency)</strong></td>
    <td align="center" width="150"><strong>Exchange Rate</strong></td>
	<td align="center" width="150"><strong>Loan Amount(SSP)</strong></td>
	<td align="center" width="150"><strong>Repaid Amount(SSP)</strong></td>
    <td width="180" align="center"><strong>Balance(SSP)</strong></td>
	<td width="180" align="center"><strong>Repay</strong></td>
    <td align="center" width="50"><strong>Edit</strong></td>
    <!--<td align="center" width="50"><strong>Delete</strong></td>-->
    </tr>
  
  <?php 
  $loan_bal=0;
if (!isset($_POST['generate']))
{
$sql="SELECT * FROM loan_received order by loan_received_id asc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
else
{
$client=$_POST['client'];
if ($client!=0)
{
$sql="SELECT * FROM loan_received where loan_received_id='$client' order by loan_received_id asc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}
else
{
$sql="SELECT * FROM loan_received order by loan_received_id asc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}

}


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
 
 $loan_received_id=$rows->loan_received_id;
 ?>
    <td><?php echo $rows->lenders_name;?></td>
    <td align="center">
<a href="view_loan_details.php?loan_id=<?php echo $rows->loan_received_id;?>" onclick="javascript:void window.open('view_loan_details.php?loan_id=<?php echo $rows->loan_received_id;?>','1368794944167',
'width=1000,height=200,toolbar=0,menubar=0,location=0,status=0,scrollbars=0,resizable=1,left=200,top=300');return false;">More details..</a>	
	
	
	</td>
	<td><?php echo $rows->date_drawn?></td>
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
 $loan_received_id=$rows->loan_received_id;

include ('loan_repayment_value.php');
	


	
//echo number_format($loan_rep=$rowslp->ttl_loan_rep,2);

	?></td>
	
	<td align="right"><?php
echo number_format($loan_bal=$loan_amnt_kshs-$ttl_loan_repaid,2);
	?>
	
	
	
	</td>
	<td align="center">
	
	<?php 
	if ($ttl_loan_repaid=='')
	{
	?>
	<a href="repay_loan.php?loan_received_id=<?php echo $rows->loan_received_id; ?>&loan_paid=<?php echo $loan_rep;?>&loan_bal=<?php echo $loan_bal; ?>">Repay</a>
	<?php 
	}
	if($ttl_loan_repaid!='' && $ttl_loan_repaid!=$loan_amnt_kshs)
	{
	?>
	<a href="repay_loan.php?loan_received_id=<?php echo $rows->loan_received_id; ?>&loan_paid=<?php echo $loan_rep;?>&loan_bal=<?php echo $loan_bal; ?>">Repay Balance</a>
	<?php
	}
	if($ttl_loan_repaid==$loan_amnt_kshs)
	{
	?>
	<font color="#009900">Cleared...</font>
	<?php
	}
	
	
	?>
	
	</td>
	
    <td align="center"><a href="edit_loan_rec.php?loan_received_id=<?php echo $rows->loan_received_id; ?>"><img src="images/edit.png"></a></td>
    <!--<td align="center"><a href="delete_customer.php?client_id=<?php echo $rows->client_id; ?>"  onClick="return confirmDelete();"><img src="images/delete.png"></a></td>-->
    </tr>
  <?php 
  $grnd_loan_amnt_kshs=$grnd_loan_amnt_kshs+$loan_amnt_kshs;
  $grnd_loan_rep=$grnd_loan_rep+$ttl_loan_repaid;
  $grnd_loan_bal=$grnd_loan_bal+$loan_bal;
  }
  ?>
  <tr height="30" bgcolor="#FFFFCC">
  <td align="center" width="200"><strong>Totals</strong></td>
    <td align="center" width="100"><strong></strong></td>
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
</form>		
			

			
			
			
					
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