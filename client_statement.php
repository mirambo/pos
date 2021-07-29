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
		
		
		
	<?php require_once('includes/customersubmenu.php');  ?>
		
		<h3>:: Statement Of Account for Client : <?php 
		$sqlclient="select * from clients where client_id='$id'";
		$resultsclient= mysql_query($sqlclient) or die ("Error: $sqlclient.".mysql_error());
        $rowsclient=mysql_fetch_object($resultsclient);
		
		echo $rowsclient->c_name;
		
		
		
		?></h3>
         
				
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
	Statement Of Account for Client: </font> <font size="+1" color="#FF6600"><?php 
		$sqlclient="select * from clients where client_id='$id'";
		$resultsclient= mysql_query($sqlclient) or die ("Error: $sqlclient.".mysql_error());
        $rowsclient=mysql_fetch_object($resultsclient);
		
		echo $rowsclient->c_name;
		
		
		
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
	<a href="print_client_statement.php?client_id=<?php echo $id; ?>" target="_blank">Print</a> | <a href="print_client_statementword.php?client_id=<?php echo $id; ?>">Export to word </a>
	
	</td>
	
    </tr>
  
  <tr  style="background:url(images/description.gif);" height="30" >
    <td  width="200"><div align="center"><strong>Transaction Date</strong></td>
    <td width="500"><div align="center"><strong>Transaction Details</strong></td>
    <td width="200" ><div align="center"><strong>Amount (Kshs)</strong></td>
    <td width="200"><div align="center"><strong>Balance (Kshs)</strong></td>
    </tr>
<!--<tr bgcolor="#FFFFCC" height="25">
<td>
<?php 

$sqlpb="select SUM(amount) AS pbbalance from client_transactions where client_id='$id' and amount!='0'and amount!='-0' and month(date_recorded)  < EXTRACT(month FROM (NOW())) order by date_recorded asc";
$resultspb= mysql_query($sqlpb) or die ("Error $sqlpb.".mysql_error());
$rowspb=mysql_fetch_object($resultspb);

echo $amount=$rowspb->pbbalance;

?>
</td> 
<td></td> 
<td></td> 
<td></td> 
<td></td> 
</tr> -->
  <?php 
  
  
/*$sql="select * from client_transactions where client_id='$id' and amount!='0'and amount!='-0' and month(date_recorded) = EXTRACT(month FROM (NOW())) order by date_recorded asc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());*/

$sql="select * from client_transactions where client_id='$id' and amount!='0'and amount!='-0'  order by date_recorded asc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


/*$sqlob="select opening_balance from clients where client_id='$id'";
$resultsob= mysql_query($sqlob) or die ("Error $sqlob.".mysql_error());
$rowsob=mysql_fetch_object($resultsob);*/



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
 
  
    <td><?php echo $date_recorded=$rows->date_recorded;
	
	//echo $month=substr($date_recorded,6);
	//$str2=substr($amount,1)
	?></td>
    <td><?php
$transaction=$rows->transaction;
if 	($transaction=='Opening Balance')
{

echo $transaction=$rows->transaction; 

}
else
{
echo $transaction=$rows->transaction; 
}
	//echo 
	
	?></td>
    <td align="right">
	
	<?php number_format($amount=$rows->amount,2);
	
	if ($amount>0)
	{
		echo number_format($amount=$rows->amount,2);
	//echo "bigger";
	}
	else
	{
//echo "smaller";
	echo number_format($amount,2);
	}
	?>
	
	
	</td>
    <td align="right"><?php
echo number_format($bal=$bal+$rows->amount,2);

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
<br/>

</form>

 <script type="text/javascript">
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
  
  
  </script> 

		
	<?php 
}
else
{
$date_from=$_POST['date_from'];
$date_to=$_POST['date_to'];

if ($date_from!='' && $date_to!='')
{
?>			
<form name="search" method="post" action=""> 
			
			
<table width="100%" border="0">
  <tr bgcolor="#FFFFCC">
   
    <td colspan="9" height="30" align="center"><font size="+1"><strong>
	Statement Of Account for Client: </font> <font size="+1" color="#FF6600"><?php 
		$sqlclient="select * from clients where client_id='$id'";
		$resultsclient= mysql_query($sqlclient) or die ("Error: $sqlclient.".mysql_error());
        $rowsclient=mysql_fetch_object($resultsclient);
		
		echo $rowsclient->c_name;
		
		
		
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
    <td colspan="9" height="20" align="right"><font size="+1">
	<a href="print_client_statement.php?client_id=<?php echo $id; ?>&date_from=<?php echo $date_from; ?>&date_to=<?php echo $date_to;?>" target="_blank">Print</a> | <a href="print_client_statementword.php?client_id=<?php echo $id; ?>&date_from=<?php echo $date_from; ?>&date_to=<?php echo $date_to;?>">Export to word </a>
	
	</td>
	
    </tr>
	
	<tr   height="30" bgcolor="#FFFFCC">
    <td colspan="9" align="center"><strong>Statement from <font color="#ff0000"><?php echo $date_from; ?></font> To <font color="#ff0000"> <?php echo $date_to; ?></font></strong></td>
    </tr>
  
  <tr  style="background:url(images/description.gif);" height="30" >
    <td  width="200"><div align="center"><strong>Transaction Date</strong></td>
    <td width="500"><div align="center"><strong>Transaction Details</strong></td>
    <td width="200" ><div align="center"><strong>Amount (Kshs)</strong></td>
    <td width="200"><div align="center"><strong>Balance (Kshs)</strong></td>
    </tr>
	
	
	<tr bgcolor="#C0D7E5" height="25">
	<td><?php echo $date_from; ?></td>
	<td><strong>Balance Brought forward (Bal b/f)</strong></td>
	<td></td>
	<td align="right"><strong>
	<?php 
  
$sqlbd="select * from client_transactions where client_id='$id' AND date_recorded <'$date_from'";
$resultsbd= mysql_query($sqlbd) or die ("Error $sqlbd.".mysql_error());




?>

<?php 

if (mysql_num_rows($resultsbd) > 0)
						  {
							  $RowCounter=0;
							  while ($rowsbd=mysql_fetch_object($resultsbd))
							  { 
							  
					

 
 
 ?>
 
  


	
	<?php number_format($amount=$rowsbd->amount,2);
	
	if ($amount>0)
	{
		number_format($amount=$rowsbd->amount,2);
	//echo "bigger";
	}
	else
	{
//echo "smaller";
	number_format($amount,2);
	}
	$bal=$bal+$rowsbd->amount;
	}
	
	
	?>
	
	
<?php
echo number_format($bal,2);
}
	?>
	
	</strong></td>

	</tr>
	
	
  
  <?php 
  
$sql="select * from client_transactions where client_id='$id' and amount!='0'and amount!='-0' AND date_recorded BETWEEN '$date_from' AND '$date_to'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());




?>

<?php 

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
    <td align="right">
	
	<?php number_format($amount=$rows->amount,2);
	
	if ($amount>0)
	{
		echo number_format($amount=$rows->amount,2);
	//echo "bigger";
	}
	else
	{
//echo "smaller";
	echo number_format($str2=substr($amount,1),2);
	}
	?>
	
	
	</td>
    <td align="right"><?php
echo number_format($bal=$bal+$rows->amount,2);

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

 <script type="text/javascript">
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
  
  
  </script> 

		
	<?php
}
else
{ 
?>			
<form name="search" method="post" action=""> 
			
			
<table width="100%" border="0">
  <tr bgcolor="#FFFFCC">
   
    <td colspan="9" height="30" align="center"><font size="+1"><strong>
	Statement Of Account for Client: </font> <font size="+1" color="#FF6600"><?php 
		$sqlclient="select * from clients where client_id='$id'";
		$resultsclient= mysql_query($sqlclient) or die ("Error: $sqlclient.".mysql_error());
        $rowsclient=mysql_fetch_object($resultsclient);
		
		echo $rowsclient->c_name;
		
		
		
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
	<a href="print_client_statement.php?client_id=<?php echo $id; ?>" target="_blank">Print</a> | <a href="print_client_statementword.php?client_id=<?php echo $id; ?>">Export to word </a>
	
	</td>
	
    </tr>
  
  <tr  style="background:url(images/description.gif);" height="30" >
    <td  width="200"><div align="center"><strong>Transaction Date</strong></td>
    <td width="500"><div align="center"><strong>Transaction Details</strong></td>
    <td width="200" ><div align="center"><strong>Amount (Kshs)</strong></td>
    <td width="200"><div align="center"><strong>Balance (Kshs)</strong></td>
    </tr>
  
<?php 
  
$sql="select * from client_transactions where client_id='$id' and amount!='0'and amount!='-0' order by date_recorded asc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

?>

<?php 

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
    <td align="right">
	
	<?php number_format($amount=$rows->amount,2);
	
	if ($amount>0)
	{
		echo number_format($amount=$rows->amount,2);
	//echo "bigger";
	}
	else
	{
//echo "smaller";
	echo number_format($str2=substr($amount,1),2);
	}
	?>
	
	
	</td>
    <td align="right"><?php
echo number_format($bal=$bal+$rows->amount,2);

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
  <tr>
</table>

</form>

 <script type="text/javascript">
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
  
  
  </script> 

		
	<?php

}}
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