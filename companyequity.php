<?php include('Connections/fundmaster.php'); 
$id=$_GET['supplier_id'];
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
<script type="text/javascript" src="calender/calendar.js"></script>
<script type="text/javascript" src="calender/lang/calendar-en.js"></script>
<script type="text/javascript" src="calender/calendar-setup.js"></script>
<style type="text/css">

@import url(calender/calendar-win2k-1.css);

</style>




<body>

	<div id="page-wrap">

		<?php include ('header.php') ?>
		
		<div id="zone-bar" class="br-5">
          <?php include ('topmenu.php') ?>
		</div>
		
		
		
	<?php require_once('includes/sharessubmenu.php');  ?>
		
		<h3><!--:: Statement of Account for  Supplier : <?php 
		$sqlclient="select * from suppliers where supplier_id='$id'";
		$resultsclient= mysql_query($sqlclient) or die ("Error: $sqlclient.".mysql_error());
        $rowsclient=mysql_fetch_object($resultsclient);
		
		echo $rowsclient->supplier_name;
		
		
		
		?>--></h3>
         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
			<div id="cont-left" class="br-5">
			
			<?php 		
if (!isset($_POST['generate']))
{
?>				
<form name="search" method="post" action=""> 			
<table width="100%" border="0">
  <tr bgcolor="#FFFFCC">
   
    <td colspan="9" height="30" align="center"><font size="+1"><strong>
	Company Statement Of  Owners Equity</font> <font size="+1" color="#FF6600"><?php 
		$sqlclient="select * from suppliers where supplier_id='$id'";
		$resultsclient= mysql_query($sqlclient) or die ("Error: $sqlclient.".mysql_error());
        $rowsclient=mysql_fetch_object($resultsclient);
		
		echo $rowsclient->supplier_name;
		
		
		
		?></strong></font>
	
	</td>
	
    </tr>
	<!-- <tr bgcolor="#FFFFCC">
   
    <td  height="30"  colspan="9" align="center">
	<strong>Filter By Date
    From</strong>
    
    <input type="text" name="date_from" size="40" id="date_from" readonly="readonly" /><input name="DateFormats" id="DateFormats" disabled value="dd/mm/yyyy" type="hidden">
    <strong>To</strong>
    <input type="text" name="date_to" size="40" id="date_to" readonly="readonly" /><input name="DateFormats" id="DateFormats" disabled value="dd/mm/yyyy" type="hidden">
	
	<input type="submit" name="generate" value="Generate"></td>
	
    </tr>-->
	<tr bgcolor="#FFFFCC">
   
    <td colspan="9" height="30" align="right"><font size="+1">
	<!--
	<a href="print_supplier_statement.php?supplier_id=<?php echo $id; ?>" target="_blank">Print</a> | <a href="print_supplier_statement_word.php?supplier_id=<?php echo $id; ?>">Export to word </a>
	-->
	</td>
	
    </tr>
  
  <tr  style="background:url(images/description.gif);" height="30" >
    <td  width="200"><div align="center"><strong>Transaction Date</strong></td>
    <td width="600"><div align="center"><strong>Transaction</strong></td>
    <td width="150" ><div align="center"><strong>Amount Other Currencies</strong></td>
	<td width="100"><div align="center"><strong>Exchange Rate</strong></td>
    <td width="100" ><div align="center"><strong>Amount (Kshs)</strong></td>
    <td width="200"><div align="center"><strong>Balance (Kshs)</strong></td>
    </tr>
  
  <?php 
  $bal=0;
$sql="select * from shareholder_transactions order by transaction_id asc";
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
    <td><?php echo $rows->transaction;?></td>
    <td align="right"><?php
	$currency_id=$rows->currency;
	$sqlcurr="select * from currency where curr_id='$currency_id'";
$resultscurr= mysql_query($sqlcurr) or die ("Error $sqlcurr.".mysql_error());
$rowcurr=mysql_fetch_object($resultscurr);
echo $curr_name=$rowcurr->curr_name.' ';

//number_format($str2=substr($amount,1),2);

 number_format($forecurr_amnt=$rows->amount,2);
	if ($forecurr_amnt<0)
	{
	echo number_format($str2=substr($forecurr_amnt,1),2);
	}
	else
	{
   echo number_format($forecurr_amnt=$rows->amount,2);
 }
	
	?></td>
	<td align="right"><?php echo number_format($rows->curr_rate,2);?></td>
	<td align="right"><?php 
	
number_format($amount=$forecurr_amnt*$rows->curr_rate,2);
	
	if ($amount<0)
	{
echo number_format($str2=substr($amount,1),2);
	}
	else
	{
   echo number_format($amount=$forecurr_amnt*$rows->curr_rate,2);
 }
	
	//echo number_format($str2=substr($forecurr_amnt,1),2);
	
	?></td>
    <td align="right">
<?php
	
echo number_format($bal=$bal+$amount,2);





	?>
	
	</td>
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
</form>
<!--<script type="text/javascript">
  Calendar.setup(
    {
      inputField  : "date_from",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "date_from"       // ID of the button
    }
  );
  
  
   Calendar.setup(
    {
      inputField  : "date_to",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "date_to"       // ID of the button
    }
  );
  
  
  </script> -->

<?php 
}
else
{
$date_from=$_POST['date_from'];
$date_to=$_POST['date_to'];

if ($date_from!='' && $date_to!='')
{
//echo "dates selected";
?>				
<form name="search" method="post" action=""> 			
<table width="100%" border="0">
  <tr bgcolor="#FFFFCC">
   
    <td colspan="9" height="30" align="center"><font size="+1"><strong>
	Statement of Account for  Supplier </font> <font size="+1" color="#FF6600"><?php 
		$sqlclient="select * from suppliers where supplier_id='$id'";
		$resultsclient= mysql_query($sqlclient) or die ("Error: $sqlclient.".mysql_error());
        $rowsclient=mysql_fetch_object($resultsclient);
		
		echo $rowsclient->supplier_name;
		
		
		
		?></strong></font>
	
	</td>
	
    </tr>
	 <tr bgcolor="#FFFFCC">
   
    <td  height="30"  colspan="9" align="center">
	<strong>Filter By Date
    From</strong>
    
    <input type="text" name="date_from" size="40" id="date_from" readonly="readonly" /><input name="DateFormats" id="DateFormats" disabled value="dd/mm/yyyy" type="hidden">
    <strong>To</strong>
    <input type="text" name="date_to" size="40" id="date_to" readonly="readonly" /><input name="DateFormats" id="DateFormats" disabled value="dd/mm/yyyy" type="hidden">
	
	<input type="submit" name="generate" value="Generate"></td>
	
    </tr>
	<tr bgcolor="#FFFFCC">
   
    <td colspan="9" height="30" align="right"><font size="+1">
	<a href="print_supplier_statement.php?supplier_id=<?php echo $id; ?>&date_from=<?php echo $date_from; ?>&date_to=<?php echo $date_to; ?>" target="_blank">Print</a> | <a href="print_supplier_statement_word.php?supplier_id=<?php echo $id; ?>&date_from=<?php echo $date_from; ?>&date_to=<?php echo $date_to; ?>">Export to word </a>
	
	</td>
	
    </tr>
	
	<tr bgcolor="#FFFFCC" height="30">
    <td width="5%" colspan="6"><div align="center"><strong>Period From : <font color="#ff0000"><?php echo $date_from; ?></font> To :  <font color="#ff0000"><?php echo $date_to; ?></font> </strong></div></td>
    
	
    
	
	
  </tr>
  
  <tr  style="background:url(images/description.gif);" height="30" >
    <td  width="200"><div align="center"><strong>Transaction Date</strong></td>
    <td width="600"><div align="center"><strong>Transaction</strong></td>
    <td width="150" ><div align="center"><strong>Amount Other Currencies</strong></td>
	<td width="100"><div align="center"><strong>Exchange Rate</strong></td>
    <td width="100" ><div align="center"><strong>Amount (Kshs)</strong></td>
    <td width="200"><div align="center"><strong>Balance (Kshs)</strong></td>
    </tr>
	<tr bgcolor="#C0D7E5" height="25">
			
			<td><?php echo $date_from; ?></td>
			<td><strong>Balance Brought forward (Bal b/f)</strong></td>
			
			<td align="right" colspan="4"><strong>
<?php 
$bal=0;
$sqlbd="select * from shareholder_transactions where supplier_id='$id' and date_recorded <'$date_from' order by transaction_id asc";
$resultsbd= mysql_query($sqlbd) or die ("Error $sqlbd.".mysql_error());


if (mysql_num_rows($resultsbd) > 0)
						  {
							  $RowCounter=0;
							  while ($rowsbd=mysql_fetch_object($resultsbd))
							  { 
							  
							  
  


$currency_id=$rowsbd->currency;
$sqlcurr="select * from currency where curr_id='$currency_id'";
$resultscurr= mysql_query($sqlcurr) or die ("Error $sqlcurr.".mysql_error());
$rowcurr=mysql_fetch_object($resultscurr);
$curr_name=$rowcurr->curr_name.' ';

//number_format($str2=substr($amount,1),2);

 number_format($forecurr_amnt=$rowsbd->amount,2);
	if ($forecurr_amnt<0)
	{
 number_format($str2=substr($forecurr_amnt,1),2);
	}
	else
	{
 number_format($forecurr_amnt=$rowsbd->amount,2);
 }
	
	?>
<?php number_format($rowsbd->curr_rate,2);?><?php 
	
number_format($amount=$forecurr_amnt*$rowsbd->curr_rate,2);
	
	if ($amount<0)
	{
 number_format($str2=substr($amount,1),2);
	}
	else
	{
 number_format($amount=$forecurr_amnt*$rowsbd->curr_rate,2);
	}
	
	//echo number_format($str2=substr($forecurr_amnt,1),2);
	
	?>
<?php

	
$bal=$bal+$amount;





	?>
	
	
  <?php 
  
  }
 echo number_format($bal,2);
  
  } ?></strong></td>
	
	
	</tr>
	
  
  <?php 
$bal=0;
$sql="select * from shareholder_transactions where supplier_id='$id' and date_recorded BETWEEN '$date_from' AND '$date_to' order by transaction_id asc";
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
    <td><?php echo $rows->transaction;?></td>
    <td align="right"><?php
	$currency_id=$rows->currency;
	$sqlcurr="select * from currency where curr_id='$currency_id'";
$resultscurr= mysql_query($sqlcurr) or die ("Error $sqlcurr.".mysql_error());
$rowcurr=mysql_fetch_object($resultscurr);
echo $curr_name=$rowcurr->curr_name.' ';

//number_format($str2=substr($amount,1),2);

 number_format($forecurr_amnt=$rows->amount,2);
	if ($forecurr_amnt<0)
	{
	echo number_format($str2=substr($forecurr_amnt,1),2);
	}
	else
	{
   echo number_format($forecurr_amnt=$rows->amount,2);
 }
	
	?></td>
	<td align="right"><?php echo number_format($rows->curr_rate,2);?></td>
	<td align="right"><?php 
	
number_format($amount=$forecurr_amnt*$rows->curr_rate,2);
	
	if ($amount<0)
	{
echo number_format($str2=substr($amount,1),2);
	}
	else
	{
   echo number_format($amount=$forecurr_amnt*$rows->curr_rate,2);
 }
	
	//echo number_format($str2=substr($forecurr_amnt,1),2);
	
	?></td>
    <td align="right">
<?php
	
echo number_format($bal=$bal+$amount,2);





	?>
	
	</td>
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
</form>
<!--<script type="text/javascript">
  Calendar.setup(
    {
      inputField  : "date_from",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "date_from"       // ID of the button
    }
  );
  
  
   Calendar.setup(
    {
      inputField  : "date_to",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "date_to"       // ID of the button
    }
  );
  
  
  </script> -->

<?php 



}
else
{
//echo "go back";
?>				
<form name="search" method="post" action=""> 			
<table width="100%" border="0">
  <tr bgcolor="#FFFFCC">
   
    <td colspan="9" height="30" align="center"><font size="+1"><strong>
	Statement of Account for  Supplier </font> <font size="+1" color="#FF6600"><?php 
		$sqlclient="select * from suppliers where supplier_id='$id'";
		$resultsclient= mysql_query($sqlclient) or die ("Error: $sqlclient.".mysql_error());
        $rowsclient=mysql_fetch_object($resultsclient);
		
		echo $rowsclient->supplier_name;
		
		
		
		?></strong></font>
	
	</td>
	
    </tr>
	 <tr bgcolor="#FFFFCC">
   
    <td  height="30"  colspan="9" align="center">
	<strong>Filter By Date
    From</strong>
    
    <input type="text" name="date_from" size="40" id="date_from" readonly="readonly" /><input name="DateFormats" id="DateFormats" disabled value="dd/mm/yyyy" type="hidden">
    <strong>To</strong>
    <input type="text" name="date_to" size="40" id="date_to" readonly="readonly" /><input name="DateFormats" id="DateFormats" disabled value="dd/mm/yyyy" type="hidden">
	
	<input type="submit" name="generate" value="Generate"></td>
	
    </tr>
	<tr bgcolor="#FFFFCC">
   
    <td colspan="9" height="30" align="right"><font size="+1">
	<a href="print_supplier_statement.php?supplier_id=<?php echo $id; ?>" target="_blank">Print</a> | <a href="print_supplier_statement_word.php?supplier_id=<?php echo $id; ?>">Export to word </a>
	
	</td>
	
    </tr>
  
  <tr  style="background:url(images/description.gif);" height="30" >
    <td  width="200"><div align="center"><strong>Transaction Date</strong></td>
    <td width="600"><div align="center"><strong>Transaction</strong></td>
    <td width="150" ><div align="center"><strong>Amount Other Currencies</strong></td>
	<td width="100"><div align="center"><strong>Exchange Rate</strong></td>
    <td width="100" ><div align="center"><strong>Amount (Kshs)</strong></td>
    <td width="200"><div align="center"><strong>Balance (Kshs)</strong></td>
    </tr>
  
  <?php 
  $bal=0;
$sql="select * from shareholder_transactions where supplier_id='$id' order by transaction_id asc";
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
    <td><?php echo $rows->transaction;?></td>
    <td align="right"><?php
	$currency_id=$rows->currency;
	$sqlcurr="select * from currency where curr_id='$currency_id'";
$resultscurr= mysql_query($sqlcurr) or die ("Error $sqlcurr.".mysql_error());
$rowcurr=mysql_fetch_object($resultscurr);
echo $curr_name=$rowcurr->curr_name.' ';

//number_format($str2=substr($amount,1),2);

 number_format($forecurr_amnt=$rows->amount,2);
	if ($forecurr_amnt<0)
	{
	echo number_format($str2=substr($forecurr_amnt,1),2);
	}
	else
	{
   echo number_format($forecurr_amnt=$rows->amount,2);
 }
	
	?></td>
	<td align="right"><?php echo number_format($rows->curr_rate,2);?></td>
	<td align="right"><?php 
	
number_format($amount=$forecurr_amnt*$rows->curr_rate,2);
	
	if ($amount<0)
	{
echo number_format($str2=substr($amount,1),2);
	}
	else
	{
   echo number_format($amount=$forecurr_amnt*$rows->curr_rate,2);
 }
	
	//echo number_format($str2=substr($forecurr_amnt,1),2);
	
	?></td>
    <td align="right">
<?php
	
echo number_format($bal=$bal+$amount,2);





	?>
	
	</td>
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
</form>
<!--<script type="text/javascript">
  Calendar.setup(
    {
      inputField  : "date_from",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "date_from"       // ID of the button
    }
  );
  
  
   Calendar.setup(
    {
      inputField  : "date_to",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "date_to"       // ID of the button
    }
  );
  
  
  </script> -->

<?php 

}

}


?>  
			

			
			
			
					
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