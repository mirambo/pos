<?php
$date_from=$_POST['date_from'];
$date_to=$_POST['date_to'];
$id=$_GET['customer_id'];
if (isset($_POST['add_period']))
{
add_period($period_from,$period_to,$description,$status);
}
?>
<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>
<script type="text/javascript" src="calender/calendar.js"></script>
<script type="text/javascript" src="calender/lang/calendar-en.js"></script>
<script type="text/javascript" src="calender/calendar-setup.js"></script>
<style type="text/css">

@import url(calender/calendar-win2k-1.css);

</style>

<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>
<form name="new_supplier" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">			
<table width="70%" border="0" align="center">
<tr bgcolor="#ffffcc" height="30">
<td colspan="3" align="center">
<strong><font size="+0">Customer Name: <font color="#ff0000">
<?php 
$sqlc="SELECT * FROM customer where customer_id='$id'";
$resultsc= mysql_query($sqlc) or die ("Error $sqlc.".mysql_error());
$rowsc=mysql_fetch_object($resultsc);
echo $rowsc->customer_name;
?>

</font></strong></td></tr>


  <tr bgcolor="#ffffcc" align="center">
    
	<td colspan="3" height="20">
<strong>Filter By Date
    From</strong>
    
    <input type="text" name="date_from" size="40" id="date_from" readonly="readonly" /><input name="DateFormats" id="DateFormats" disabled value="dd/mm/yyyy" type="hidden">
    <strong>To</strong>
    <input type="text" name="date_to" size="40" id="date_to" readonly="readonly" /><input name="DateFormats" id="DateFormats" disabled value="dd/mm/yyyy" type="hidden">
	
	<input type="submit" name="generate" value="Generate">	
	</td>
    </tr>
	<tr bgcolor="#ffffcc" height="20"><td colspan="3" align="center">
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
	
<span style="float:right; margin-right:10px;"><a target="_blank" href="print_customer_statement.php?customer_id=<?php echo $id;?>&date_from=<?php echo $date_from ?>&date_to=<?php echo $date_to;?>"><img src="images/print_icon.gif"></a></span>
	
	</td></tr>

 <tr  style="background:url(images/description.gif);" height="30" align="center">
<td width="20%"><strong>Transaction Date</strong></td>
<td><strong>Transaction Details</strong></td>
<td width="20%"><strong>Amount (Kshs)</strong></td>

</tr>	
<?php 
if (!isset($_POST['generate']))
{ 
$sql="SELECT  * FROM customer_transactions WHERE customer_id='$id' order by transaction_date asc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
else
{
$date_from=$_POST['date_from'];
$date_to=$_POST['date_to'];

if ($date_from!='' && $date_to!='')
{

$sql="SELECT  * FROM customer_transactions WHERE customer_id='$id' and transaction_date>='$date_from' AND transaction_date<='$date_to' order by transaction_date asc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}
else
{
$sql="SELECT  * FROM customer_transactions WHERE customer_id='$id' order by transaction_date asc";
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
<td><?php echo $rows->transaction;  ?></td>
<td align="right"><?php echo number_format($rows->amount,2);  ?></td>
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

<SCRIPT language="JavaScript">
 var frmvalidator  = new Validator("new_supplier");
 frmvalidator.EnableOnPageErrorDisplaySingleBox();
 frmvalidator.EnableMsgsTogether();
 frmvalidator.addValidation("period_from","req",">>Please enter start period");
 frmvalidator.addValidation("period_to","req",">>Please enter end period");
 frmvalidator.addValidation("description","req",">>Please enter end period");
 frmvalidator.addValidation("status","dontselect=0",">>Please select status");
 
 
  </SCRIPT>