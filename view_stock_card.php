<?php include('Connections/fundmaster.php'); 
$id=$_GET['item_id'];


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
		
		<h3>:: Stock Card Details for Item : <?php 
		$sqlclient="select * from items where item_id='$id'";
		$resultsclient= mysql_query($sqlclient) or die ("Error: $sqlclient.".mysql_error());
        $rowsclient=mysql_fetch_object($resultsclient);
		
		echo $rowsclient->item_name .' ('. $rowsclient->item_code.')';
		
		
		
		?></h3>
         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
			<div id="cont-left" class="br-5">
			
			
	<form name="new_supplier" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">			
<table width="90%" border="0" align="center">
<tr bgcolor="#ffffcc" height="30">
<td colspan="5" align="center">
<strong><font size="+0">Item Name: <font color="#ff0000">
<?php 
$sqlclient="select * from items where item_id='$id'";
		$resultsclient= mysql_query($sqlclient) or die ("Error: $sqlclient.".mysql_error());
        $rowsclient=mysql_fetch_object($resultsclient);
		
		echo $rowsclient->item_name .' ('. $rowsclient->item_code.')';
?>

</font></strong></td></tr>


  <tr bgcolor="#ffffcc" align="center">
    
	<td colspan="5" height="20">
<strong>Filter By Date
    From</strong>
    
    <input type="text" name="date_from" size="40" id="date_from" readonly="readonly" /><input name="DateFormats" id="DateFormats" disabled value="dd/mm/yyyy" type="hidden">
    <strong>To</strong>
    <input type="text" name="date_to" size="40" id="date_to" readonly="readonly" /><input name="DateFormats" id="DateFormats" disabled value="dd/mm/yyyy" type="hidden">
	
	<input type="submit" name="generate" value="Generate">	
	</td>
    </tr>
	<tr bgcolor="#ffffcc" height="20"><td colspan="5" align="center">
	<?php

if ($date_from!='' && $date_to!='')
{
?>
<strong>Statement of account for the period between <font color="#ff0000"><?php echo $date_from ?></font> and <font color="#ff0000"><?php echo $date_to ?> </font></strong>

<?php
}
else
{
?>
<strong>Full Statment Of Account</strong>
<?php
}

?>
	
<span style="float:right; margin-right:10px;"><a target="_blank" href="print_item_statement.php?item_id=<?php echo $id;?>&date_from=<?php echo $date_from ?>&date_to=<?php echo $date_to;?>"><img src="images/print_icon.gif"></a></span>
	
	</td></tr>

 <tr  style="background:url(images/description.gif);" height="30" align="center">
<td width="20%"><strong>Transaction Date</strong></td>
<td width="30%"><strong>Transaction Details</strong></td>
<td width="20%"><strong>Quantity Received</strong></td>
<td width="20%"><strong>Quantity Issued</strong></td>
<td width="20%"><strong>Balance (Quantity)</strong></td>

</tr>	
<?php 
if (!isset($_POST['generate']))
{ 
$sql="SELECT  * FROM item_transactions WHERE item_id='$id' order by transaction_date asc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
else
{
$date_from=$_POST['date_from'];
$date_to=$_POST['date_to'];

if ($date_from!='' && $date_to!='')
{

$sql="SELECT  * FROM item_transactions WHERE item_id='$id' and transaction_date>='$date_from' AND transaction_date<='$date_to' order by transaction_date asc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}
else
{
$sql="SELECT  * FROM item_transactions WHERE item_id='$id' order by transaction_date asc";
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
 
 
 ?>

<td align="center"><?php echo $rows->transaction_date;  ?></td>
<td><?php echo $rows->memo;  ?></td>
<td align="right"><?php 
 number_format($amount=$rows->quantity,0);  
 if ($amount>0)
 {
 echo  number_format($amount,0);  
 }
 else
 {
  echo  '';
 }
 
 ?>


</td>

<td align="center">
<?php 
 number_format($amount=$rows->quantity,0);  
 if ($amount>0)
 {
 
   echo  '';
 }
 else
 {
 echo  number_format($amount,0); 
 }
 
 ?>

</td>

<td align="center"><?php
$bal=$bal+$rows->quantity;

 echo number_format($bal,0);  ?></td>
</tr>
	
<?php 
}}
else
{?>
  <tr height="30" bgcolor="#ffffcc"><td colspan="3" align="center"><font color="#ff0000"><strong>Sorrr!! No Transaction Found</strong></font></td></tr>
<?php

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