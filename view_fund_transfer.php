<?php 
include('Connections/fundmaster.php'); 
?>
<html xmlns="http://www.w3.org/1999/xhtml">

<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>
<link href="css/superTables.css" rel="stylesheet" type="text/css" />

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
		
		
		
<?php require_once('includes/fund_transfer_submenu.php');  ?>
		
		<h3>:: List of All Fund Transfer</h3>
		
         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
			<div id="cont-left-full" class="br-5">


<table width="100%" border="0">
  <tr bgcolor="#FFFFCC">
   
    <td colspan="12" height="30" align="center"> 
	<?php

if ($_GET['updateconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:550px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Income Updated Successfully!!</font></strong></p></div>';
?> 

<?php 

if ($_GET['delete']==1)
echo "<p align='center'><strong><font color='#FF0000'>Record Deleted!!</font></strong></p>";
?>
	
	
		<a target="_blank" style="float:right; margin-right:100px; font-weight:bold; font-size:13px; color:#000000" href="print_list_cash_deposit.php">Print</a>						  
<a  style="float:right; margin-right:50px; font-weight:bold; font-size:13px; color:#000000" href="print_list_cash_deposit_excel.php">Export To Excel</a>						  
	
	</td>
	
	
    </tr>
	
	
  
  <tr  style="background:url(images/description.gif);" height="30" >
 
    <td align="center" width="300"><strong>Date Transfer</strong></td> 
	   <td align="center" width="200"><strong>Transfered From</strong></td>
	   <td align="center" width="200"><strong>Transfered To</strong></td>
   <td align="center" width="160"><strong>Amount <br/>(Mixed Currency)</strong></td>
	<td align="center" width="60"><strong>Exchange Rate </strong></td>
	<td align="center" width="160"><strong>Amount </strong></td>    
	<td align="center" width="260"><strong>Person Transfered </strong></td>    
	<td align="center" width="200"><strong>Memo</strong></td>
	<!--<td align="center" width="200"><strong>Bank Account Deposited</strong></td>
	<td align="center" width="200"><strong>Date Deposited</strong></td>-->
	
	<td align="center"><strong>Edit</strong></td>
    <td align="center"><strong>Delete</strong></td>
    </tr>
  
  <?php 
/* $sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'Viewed all recorded cheque deposits')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());  */ 
  
 
$sql="SELECT * FROM fund_transfer order by date_transfered desc";
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
   
    <td><?php echo $rows->date_transfered;?></td>
    <td><?php 
	
	$transfer_from=$rows->transfer_from;
	
	//account from
$sqlrec1="SELECT * FROM account WHERE account_id='$transfer_from'";
$resultsrec1= mysql_query($sqlrec1) or die ("Error $sqlrec1.".mysql_error());	
$rowsrec1=mysql_fetch_object($resultsrec1);
echo $acc_name_from=$rowsrec1->account_name;


	
	
	
	?></td>
	
	<td><?php 
	
	$transfer_to=$rows->transfer_to;
	
	
//account to
$sqlrec2="SELECT * FROM account WHERE account_id='$transfer_to'";
$resultsrec2= mysql_query($sqlrec2) or die ("Error $sqlrec2.".mysql_error());	
$rowsrec2=mysql_fetch_object($resultsrec2);
echo $acc_name_to=$rowsrec2->account_name;
	
	
	
	?></td>




    <td align="right"><?php 
	$currency=$rows->currency;
	$querycrr="select * from currency where curr_id='$currency'";
$resultscrr=mysql_query($querycrr) or die ("Error: $querycrr.".mysql_error());							  
$rowscrr=mysql_fetch_object($resultscrr);
$curr_name=$rowscrr->curr_name; 
	
	echo $curr_name=$rowscrr->curr_name.' '.number_format($amount=$rows->amount,2);?></td>
	<td align="right"><?php echo number_format($curr_rate=$rows->curr_rate,2);?></td>
	<td align="right"><strong><?php 
	$currency_code=$rows->curr_id;
	
	
$inc_kshs=$amount*$curr_rate;
	//}
	echo number_format($inc_kshs,2);	
	
	
	
	?></strong></td>
	<td><?php $tr_user_id=$rows->user_id;
$queru="select * from users where user_id='$tr_user_id'";
$resultsu=mysql_query($queru) or die ("Error: $queru.".mysql_error());							  
$rowsu=mysql_fetch_object($resultsu);
echo $tr_guy=$rowsu->f_name; 
	
	?></td>
		<td ><?php echo $rows->memo;?></td>
	
	

	<td align="center">
	<?php 
	
	$sess_allow_edit=1;
if ($sess_allow_edit==1)
{
	?>
	
	<a href="edit_fund_transfer.php?fund_transfer_id=<?php echo $rows->fund_transfer_id; ?>"><img src="images/edit.png"></a>
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
	
	 <a href="delete_fund_transfer.php?fund_transfer_id=<?php echo $rows->fund_transfer_id; ?>" onClick="return confirmDelete();"><img src="images/delete.png"></a>
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