<?php 
include('includes/session.php'); 
include('Connections/fundmaster.php'); 

$date_from=$_POST['from'];
$date_to=$_POST['to'];
?>
<html xmlns="http://www.w3.org/1999/xhtml">

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
		
		
		
		<?php require_once('includes/pettycashsubmenu.php');  ?>
		
		<h3>:: List of All Petty Cash Expenses</h3>
		
         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
			<div id="cont-left-full" class="br-5">
			
			
			
			
			
<form name="search" method="post" action=""> 			
<table width="100%" border="0">
  <tr bgcolor="#FFFFCC">
   
    <td colspan="10" height="30" align="center"> 
	<?php

if ($_GET['updateconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:550px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Income Updated Successfully!!</font></strong></p></div>';
?> 

<?php 

if ($_GET['deletesconfirm']==1)
echo "<p align='center'><strong><font color='#FF0000'>Record Deleted!!</font></strong></p>";
?>

					  

	
	</td>
	
    </tr>
	<tr height="30" bgcolor="#FFFFCC">
   

    <td width="23%" colspan="11" align="center">   

								  
	<strong>Filter By Date</strong>
						<strong>From : </strong><input type="text" name="from" size="30" id="from" readonly="readonly" /><strong>To:</strong>
		<input type="text" name="to" size="25" id="to" readonly="readonly" />							  
								  		  
								  
<input type="submit" name="generate" value="Generate">	

<a target="_blank" style="float:right; margin-right:100px; font-weight:bold; font-size:13px; color:#000000" href="print_list_petty_cash_expenses.php?date_from=<?php echo $date_from ?>&date_to=<?php echo $date_to ?>">Print</a>						  
<!--<a  style="float:right; margin-right:40px; font-weight:bold; font-size:13px; color:#000000" href="print_list_petty_cash_expenses_excel.php?date_from=<?php echo $date_from ?>&date_to=<?php echo $date_to ?>">Export To Excel</a>-->						  

								  
								  </td>
    
  </tr>
  
  <tr  style="background:url(images/description.gif);" height="30" >
 
    <td align="center" width="100"><strong>Date Paid</strong></td>
    <td align="center" width="200"><strong>Description</strong></td>
    <td align="center" width="200"><strong>Refference No.</strong></td>
    <td align="center" width="200"><strong>Amount (Mixed Currency)</strong></td>
    <td align="center" width="200"><strong>Exchange Rate</strong></td>
    <td align="center" width="200"><strong>Amount(Kshs)</strong></td>
	<!--<td align="center" width="200"><strong>Date recorded</strong></td>-->
	<td align="center" width="50"><strong>Edit</strong></td>
    <td align="center" width="50"><strong>Delete</strong></td>

    </tr>
  
  <?php 
 if (!isset($_POST['generate']))
{ 
$sql="SELECT * from petty_cash_expense order by date_paid desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
else
{
$date_from=$_POST['from'];
$date_to=$_POST['to'];
if ($date_from!='' && $date_to!='')
{
$sql="SELECT * from petty_cash_expense where date_paid >='$date_from' AND date_paid<='$date_to' order by date_paid desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}

else
{
$sql="SELECT * from petty_cash_expense order by date_paid desc";
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
   
    <td><?php echo $rows->date_paid;?></td>
    <td><?php echo $rows->description;?></td>
    <td><?php echo $rows->ref_no;?></td>
	<td align="right"><?php echo number_format($amount=$rows->amount,2);?></td>
	<td align="right"><?php echo number_format($curr_rate=$rows->curr_rate,2);?></td>
	<td align="right"><?php echo number_format($amount_ssp=$rows->amount*$curr_rate,2);?></td>
	<!--td align="center"><?php echo $rows->date_recorded;?></td>-->
	<td align="center"><a href="edit_petty_cash_expenses.php?petty_cash_expense_id=<?php echo $rows->petty_cash_expense_id;?>"><img src="images/edit.png"></a></td>
    <td align="center"><a href="delete_petty_cash_expense.php?petty_cash_expense_id=<?php echo $rows->petty_cash_expense_id;?>"  onClick="return confirmDelete();"><img src="images/delete.png"></a></td>
    </tr>
  <?php 
  
  $gnd_amnt=$gnd_amnt+$amount_ssp;
  }
  
  
  ?>
   <tr  height="30" bgcolor="#FFFFCC" >
 
    <td align="center" width="300"><strong>Grand Totals</strong></td>
    
	
	<td align="center"><strong></strong></td>
	
	<td align="center"><strong></strong></td>
	<td align="center"><strong></strong></td>
	
    <td align="center"><strong></strong></td>
<td align="right" width="200"><strong><?php echo  number_format($gnd_amnt,2); ?></strong></td>
	<td align="center"><strong></strong></td>
	<td align="center"><strong></strong></td>

    </tr>
  
  <?php
  
  }
  
  
  ?>
</table>
</form>
<script type="text/javascript">
  Calendar.setup(
    {
      inputField  : "from",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "from"       // ID of the button
    }
  );
  
  Calendar.setup(
    {
      inputField  : "to",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
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