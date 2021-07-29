<?php 
include('Connections/fundmaster.php'); 
$supplier=$_POST['location_id'];
$date_from=$_POST['from'];
$date_to=$_POST['to'];
?>
<html xmlns="http://www.w3.org/1999/xhtml">

<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>
<link href="css/superTables.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="calender/calendar.js"></script>
<script type="text/javascript" src="calender/lang/calendar-en.js"></script>
<script type="text/javascript" src="calender/calendar-setup.js"></script>
<style type="text/css">

@import url(calender/calendar-win2k-1.css);

</style>

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
		
		
		
		<?php require_once('includes/banking_submenu.php');  ?>
		
		<h3>:: List of All Cash Withdrawals</h3>
		
         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
			<div id="cont-left-full" class="br-5">
<form name="search" method="post" action=""> 
<table width="100%" border="0">
  <tr bgcolor="#FFFFCC">
   
    <td colspan="12" height="30" align="center"> 
	<?php

if ($_GET['updateconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:550px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Income Updated Successfully!!</font></strong></p></div>';
?> 

<?php 

if ($_GET['deletesupconfirm']==1)
echo "<p align='center'><strong><font color='#FF0000'>Record Deleted!!</font></strong></p>";
?>

	
	
	</td>
	
    </tr>
	
	<tr bgcolor="#FFFFCC" height="40">

   

    <td  colspan="12" align="center">   <strong>Filter By Customer<font color="#FF0000">* </font></strong>
	<select name="location_id"><option value="0">Select..........................................................</option>
								  <?php
								  
								  $query1="select * from banks order by bank_name asc";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->bank_id;?>"><?php echo $rows1->bank_name; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
									  
									  
								  
								  
								  
								  
								  
								  ?></select>
								  
								  <?php
if ($incharge==1)
{

	?>
	
<strong>Or By Shop </strong>
	
	
	
	<select name="shop_id">
	<option value="0">-------------------Select-----------------</option>
								  <?php
								  
								  $query1="select * from account where account_type_id='10' order by account_name asc";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->account_id; ?>"><?php echo $rows1->account_name; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
								  
								  
								  
								  
								  
								  ?>
								  
								  </select>
								  
								  <?php 
								  
								 } 
								  ?>
								  
	<strong>Or By Date</strong>
						<strong>From : </strong><input type="text" name="from" size="30" id="from" readonly="readonly" /><strong>To:</strong>
		<input type="text" name="to" size="25" id="to" readonly="readonly" />							  
								  		  
								  
<input type="submit" name="generate" value="Generate">	

<a target="_blank" style="float:right; margin-right:200px; font-weight:bold; font-size:13px; color:#000000" href="print_list_cash_withdrawal.php?location_id=<?php echo $supplier; ?>&from=<?php echo $date_from ?>&to=<?php echo $date_to; ?>">Print</a>						  
							  
								  
								  </td>
    
  </tr>
	
  
  <tr  style="background:url(images/description.gif);" height="30" >
 
    <td align="center" width="300"><strong>Withdrawal Slip Number</strong></td>
 
   <td align="center" width="160"><strong>Amount <br/>(Mixed Currency)</strong></td>
	<td align="center" width="160"><strong>Exchange Rate </strong></td>
	<td align="center" width="160"><strong>Amount (Kshs)</strong></td>    
    <td align="center" width="200"><strong>Bank Withdrawn from</strong></td>
	<td align="center" width="200"><strong>Person Withdrew</strong></td>
    <td align="center" width="200"><strong>Phone Number</strong></td>
    <td align="center" width="200"><strong>Date Withdrawn</strong></td>
	<td align="center" width="200"><strong>Date Recorded</strong></td>
	<td align="center" width="200"><strong>Comments</strong></td>
	<!--<td align="center" width="200"><strong>Bank Account Deposited</strong></td>
	<td align="center" width="200"><strong>Date Deposited</strong></td>-->
	
	<td align="center"><strong>Edit</strong></td>
    <td align="center"><strong>Delete</strong></td>
    </tr>
  
  <?php 


if (!isset($_POST['generate']))
{ 
 
$querydc="SELECT * FROM banks,cash_withdrawal,currency where cash_withdrawal.bank_withdrawn=banks.bank_id AND
currency.curr_id=cash_withdrawal.curr_id order by cash_withdrawal.cash_withdrawal_id desc";
$resultsdc= mysql_query($querydc) or die ("Error $querydc.".mysql_error());
}

else
{
	

	
	
	$querydc= "SELECT * FROM banks,cash_withdrawal,currency";
    $conditions = array();
    if($supplier!=0) 
	
	{
	
    $conditions[] = "cash_withdrawal.bank_withdrawn='$supplier'";
	
    }
	

	

	if($date_from!='' && $date_to!='' ) {
	
       $conditions[] = "cash_withdrawal.date_withdrawn>='$date_from' AND cash_withdrawal.date_withdrawn<='$date_to'";
    }
	
	
	

    //$sql = $query;
    if (count($conditions) > 0) {
      $querydc .= " WHERE " . implode(' AND ', $conditions)." and cash_withdrawal.bank_withdrawn=banks.bank_id AND
currency.curr_id=cash_withdrawal.curr_id order by cash_withdrawal.cash_withdrawal_id desc";
    }
	else
	{	
	
$querydc="SELECT * FROM banks,cash_withdrawal,currency where cash_withdrawal.bank_withdrawn=banks.bank_id AND
currency.curr_id=cash_withdrawal.curr_id order by cash_withdrawal.cash_withdrawal_id desc";
$resultsdc= mysql_query($querydc) or die ("Error $querydc.".mysql_error());

	}

    $resultsdc = mysql_query($querydc) or die ("Error $querydc.".mysql_error());


}


if (mysql_num_rows($resultsdc) > 0)
						  {
							  $RowCounter=0;
							  while ($rows=mysql_fetch_object($resultsdc))
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
   
    <td><?php echo $rows->withdrawal_slip_no;?></td>
	<td align="right">
	<?php 
	$currency=$rows->curr_id;
	$querycrr="select * from currency where curr_id='$currency'";
$resultscrr=mysql_query($querycrr) or die ("Error: $querycrr.".mysql_error());							  
$rowscrr=mysql_fetch_object($resultscrr);
$curr_name=$rowscrr->curr_name; 
	
	echo $curr_name=$rowscrr->curr_name.' '.number_format($amount=$rows->amount,2);?>
	
	
	</td>
	<td align="right"><?php echo number_format($curr_rate=$rows->curr_rate,2);?></td>
	<td align="right"><strong><?php 
	$currency_code=$rows->curr_id;
	
	
$inc_kshs=$amount*$curr_rate;
	//}
	echo number_format($inc_kshs,2);	
	
	
	
	?></strong></td>
	<td><?php echo $rows->bank_name.' ('.$rows->account_name.') ';?></td>
		<td ><?php echo $rows->person_withdrawn;?></td>
	<td><?php echo $rows->phone_no?></td>
	<td align="center"><?php echo $rows->date_withdrawn;?></td>
	<td><?php echo $rows->date_recorded;?></td>
	<td><?php echo $rows->comments;?></td>
	<!--<td><?php 
	
		/*$bank_id=$rows->receiving_bank_id;
$sqlemp_det="select * from banks where bank_id='$bank_id'";
$resultsemp_det= mysql_query($sqlemp_det) or die ("Error $sqlemp_det.".mysql_error());
$rowsemp_det=mysql_fetch_object($resultsemp_det);
		
	if ($bank_id==0)
{
echo "Petty  Cash Account";
}
else
{
		
	echo $rowsemp_det->bank_name.' ('.$rowsemp_det->account_name.')';
	}
	*/
	?></td>
	<td><?php echo $rows->date_deposited;?></td>-->

	<td align="center">
	<?php 
	
	$sess_allow_edit=1;
if ($sess_allow_edit==1)
{
	?>
	
	<a href="edit_cashwithdrawal.php?cash_withdrawal_id=<?php echo $rows->cash_withdrawal_id; ?>"><img src="images/edit.png"></a>
	<?php
}
else
{
echo "<i><font color='#ff0000' size='-2'>Not allowed...</font></i>";
}

	?>
	
	</td>
    <td align="center">
	<?php
$sess_allow_delete=1;
if ($sess_allow_delete==1)
{
	?>
	
	 <a href="delete_cash_withdrawal.php?cash_withdrawal_id=<?php echo $rows->cash_withdrawal_id;?>&slip_no=<?php echo $rows->withdrawal_slip_no;?>"  onClick="return confirmDelete();"><img src="images/delete.png"></a>
	<?php 
	}
	else
	{
	echo "<i><font color='#ff0000' size='-2'>Not allowed...</font></i>";
	
	}
	
	
	?>
	</td>
    </tr>
  <?php 
  
  $gnd_amnt=$gnd_amnt+$inc_kshs;
  }
  
  
  ?>
   <tr  height="30" bgcolor="#FFFFCC" >
 
    <td align="center" width="300"><strong>Grand Totals</strong></td>
    <td align="center" width="160"><strong></strong></td>

	<td align="right" width="160" colspan="2" ><strong><?php echo number_format($gnd_amnt,2); ?></strong></td>
    <td align="center" width="200"><strong></strong></td>
	<td align="center" width="200"><strong></strong></td>
	<td align="center"><strong></strong></td>
    <td align="center"><strong></strong></td>
    <td align="center"><strong></strong></td>
    <td align="center"><strong></strong></td>
    <td align="center"><strong></strong></td>
    <td align="center"><strong></strong></td>

    </tr>
  
  <?php
  
  }
  
  
  ?>
</table>

</div>
</form>
<script type="text/javascript">
  Calendar.setup(
    {
      inputField  : "from",         // ID of the input field
      ifFormat    : "%Y-%m-%d",    // the date format
      button      : "from"       // ID of the button
    }
  );
  
  Calendar.setup(
    {
      inputField  : "to",         // ID of the input field
      ifFormat    : "%Y-%m-%d",    // the date format
      button      : "to"       // ID of the button
    }
  );
  
  
  
  </script> 
			
			
					
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