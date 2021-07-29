<?php include('Connections/fundmaster.php'); 


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

<script type="text/javascript">
    function ChangeColor(tableRow, highLight)
    {
    if (highLight)
    {
      tableRow.style.backgroundColor = '#99CC33';
    }
    else
    {
      tableRow.style.backgroundColor = '';
    }
  }
</script>



<body>

	<div id="page-wrap">

		<?php include ('header.php') ?>
		
		<div id="zone-bar" class="br-5">
          <?php include ('topmenu.php') ?>
		</div>
		
		
		
		<?php require_once('includes/banks_submenu.php');  ?>
		
		<h3>:: List of All Our Banks</h3>
         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
			<div id="cont-left" class="br-5">
			
			
			
			
			
			
<table width="100%" border="0">
  <tr bgcolor="#FFFFCC">
   
    <td colspan="10" height="30" align="center"> 
	<?php

if ($_GET['updateconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:550px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Income Updated Successfully!!</font></strong></p></div>';
?> 

<?php 

if ($_GET['deleteconfirm']==1)
echo "<p align='center'><strong><font color='#FF0000'>Record Deleted!!</font></strong></p>";
?>
	
	</td>
	
    </tr>
	</table>
<DIV class=fakeContainer>
<table width="100%" border="0" class=demoTable id=demoTable align="center">
  
  <tr  style="background:url(images/description.gif);" height="30" >
 
    <td align="center" width="300"><strong>Cheque Number</strong></td>
 
   <td align="center" width="160"><strong>Amount <br/>(Mixed Currency)</strong></td>
	<td align="center" width="160"><strong>Exchange Rate </strong></td>
	<td align="center" width="160"><strong>Amount (Kshs.)</strong></td>    
    <td align="center" width="200"><strong>Bank Deposited</strong></td>
	<td align="center" width="200"><strong>Cheque Drawer</strong></td>
    <td align="center" width="200"><strong>Date Drawn</strong></td>
    <td align="center" width="200"><strong>Date Deposited</strong></td>
	<td align="center" width="200"><strong>Date Recorded</strong></td>
	<td align="center" width="200"><strong>Comments</strong></td>
	<!--<td align="center" width="200"><strong>Bank Account Deposited</strong></td>
	<td align="center" width="200"><strong>Date Deposited</strong></td>-->
	
	<td align="center"><strong>Edit</strong></td>
    <td align="center"><strong>Delete</strong></td>
    </tr>
  
  <?php 
$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'Viewed all recorded cheque deposits')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());  
  
 
$sql="SELECT cheque_deposits.comments,cheque_deposits.cheque_deposit_id,cheque_deposits.date_drawn,cheque_deposits.curr_id,cheque_deposits.amount,cheque_deposits.date_deposited,
cheque_deposits.date_recorded,banks.bank_name,banks.account_name,cheque_deposits.curr_rate,cheque_deposits.cheque_drawer,cheque_deposits.cheque_no,cheque_deposits.bank_deposited,currency.curr_initials
FROM banks,cheque_deposits,currency where cheque_deposits.bank_deposited=banks.bank_id AND currency.curr_id=cheque_deposits.curr_id order by cheque_deposits.cheque_deposit_id asc";
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
   
    <td><?php echo $rows->cheque_no;?></td>




    <td align="right"><?php echo $rows->curr_initials.' '.number_format($amount=$rows->amount,2);?></td>
	<td align="right"><?php echo number_format($curr_rate=$rows->curr_rate,2);?></td>
	<td align="right"><strong><?php 
	$currency_code=$rows->curr_id;
	
	
$inc_kshs=$amount*$curr_rate;
	//}
	echo number_format($inc_kshs,2);	
	
	
	
	?></strong></td>
	<td><?php echo $rows->bank_name.' ('.$rows->account_name.') ';?></td>
		<td ><?php echo $rows->cheque_drawer;?></td>
	<td><?php echo $rows->date_drawn?></td>
	<td><?php echo $rows->date_deposited;?></td>
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
	
	$sess_allow_edit;
if ($sess_allow_edit==1)
{
	?>	
	<a href="home.php?edit_cheque_deposit=editchequedeposit&cheque_deposit_id=<?php echo $rows->cheque_deposit_id; ?>"><img src="images/edit.png"></a>
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
$sess_allow_delete;
if ($sess_allow_delete==1)
{
	?>
	
	 <a href="delete_cheque_deposit.php?cheque_deposit_id=<?php echo $rows->cheque_deposit_id;?>"  onClick="return confirmDelete();"><img src="images/delete.png"></a>
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
    <td align="center"><strong></strong></td>
    <td align="center"><strong></strong></td>
    </tr>
  
  <?php
  
  }
  
  
  ?>
</table>

</div>
<SCRIPT src="js/superTables.js" 
type=text/javascript></SCRIPT>

<SCRIPT type=text/javascript>
//<![CDATA[

(function() {
	var mySt = new superTable("demoTable", {
		cssSkin : "sSky",
		fixedCols : 1,
		headerRows : 1,
		onStart : function () {
			this.start = new Date();
		},
		onFinish : function () {
			document.getElementById("testDiv").innerHTML += "Finished...<br>" + ((new Date()) - this.start) + "ms.<br>";
		}
	});
})();

//]]>
</SCRIPT>
		
			

			
			
			
					
			  </div>
				
				<div id="cont-right" class="br-5">
					
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