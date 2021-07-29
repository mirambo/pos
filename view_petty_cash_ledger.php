<?php include('Connections/fundmaster.php'); 
$id=$_GET['client_id'];
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
		
		
		
	<?php require_once('includes/ledgerssubmenu.php');  ?>
		
		<h3>:: Petty Cash Ledger </h3>
         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
			<div id="cont-left" class="br-5">
			
			
			
			
			
			
<table width="100%" border="0">
  <tr bgcolor="#FFFFCC">
   
    <td colspan="9" height="30" align="center"><font size="+1"><strong>
	Petty Cash Ledger</strong>
	
	<?php
$gnd_amnt=0;
$sql34="SELECT * from petty_cash_income";
$results34= mysql_query($sql34) or die ("Error $sql34.".mysql_error());
if (mysql_num_rows($results34) > 0)
						  {
							
							  while ($rows34=mysql_fetch_object($results34))
							  { 
    

	number_format($amount34=$rows34->amount,2);

  
  $gnd_amnt=$gnd_amnt+$amount34;
 
  }
 
   //echo $gnd_amnt.' ';
  }
  
 $gnd_amnt_exp=0; 
 $sql35="SELECT * from petty_cash_expense";
$results35= mysql_query($sql35) or die ("Error $sql35.".mysql_error());
if (mysql_num_rows($results35) > 0)
						  {
							
							  while ($rows35=mysql_fetch_object($results35))
							  { 
    

	$amount35=$rows35->amount;

  
  $gnd_amnt_exp=$gnd_amnt_exp+$amount35;
  }
 //echo $gnd_amnt_exp;
  
  }
  
 $bal=$gnd_amnt-$gnd_amnt_exp;

if ($bal<1000)
{ ?>
<span style="float:right;"><blink> <font color="#ff0000"><strong><a href="add_petty_cash_income.php" style="float:right; color:#ff0000; font-size:15px; text-decoration:blink;">Replenish Petty Cash Fund!!</a></strong></blink></span>
<?php
}
		?>
	
	
	</font>
	
	</td>
	
    </tr>
	
	<tr bgcolor="#FFFFCC">
   
    <td colspan="9" height="30" align="right"><font size="+1">
	<a href="print_statement.php?client_id=<?php echo $id; ?>">Print</a> | <a href="print_statementcsv.php?client_id=<?php echo $id; ?>">Export to Excel </a> | <a href="print_statementword.php?client_id=<?php echo $id; ?>">Export to word </a>
	
	</td>
	
    </tr>
  
  <tr  style="background:url(images/description.gif);" height="30" >
    <td  width="200"><div align="center"><strong>Transaction Date</strong></td>
    <td width="500"><div align="center"><strong>Transaction</strong></td>
    <td width="200" ><div align="center"><strong>Debit (Kshs)</strong></td>
	<td width="200" ><div align="center"><strong>Credit (Kshs)</strong></td>
    <td width="200"><div align="center"><strong>Balance (Kshs)</strong></td>
    </tr>
  
  <?php 
 $bal=0; 
$sql="select * from petty_cash_ledger";
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
 
  
    <td><?php echo $rows->date_recorded;?></td>
    <td><?php echo $rows->transactions;?></td>
	
    <td align="right"><?php
	$amount=$rows->money_out;
if ($amount>0)
	{
	echo number_format($amount,2);
	}
	?></td>
	<td align="right"><?php
	
	if ($amount<0)
	{
	echo number_format($str2=substr($amount,1),2);
	}

	//echo number_format($rows->money_in,2);?></td>
    <td align="right"><strong><?php
echo number_format($bal=$bal+$amount,2);

	?>
	
	</strong></td>
    </tr>
  <?php 
  
  }
  
  
  }
  
  else
  {
  
  ?>
  
  
  <tr bgcolor="#FFFFCC">
   
    <td colspan="9" height="30" align="center"> 
	<font color="#ff0000">No Results found!!</font>
	
	</td>
	
    </tr>
	
	<?
  
  }
  ?>
</table>
		
			

			
			
			
					
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