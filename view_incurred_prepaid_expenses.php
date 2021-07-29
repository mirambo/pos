<?php include('Connections/fundmaster.php'); 
$prepaid_expenses_id=$_GET['prepaid_expenses_id'];

?>

<html xmlns="http://www.w3.org/1999/xhtml">

<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>
<script language="javaScript" src="gen_validatorv4.js"  type="text/javascript" xml:space="preserve"></script>
<script type="text/javascript" src="calender/calendar.js"></script>
<script type="text/javascript" src="calender/lang/calendar-en.js"></script>
<script type="text/javascript" src="calender/calendar-setup.js"></script>
<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<script src="lib/jquery.js" type="text/javascript"></script>
<script src="src/facebox.js" type="text/javascript"></script>
  <script type="text/javascript">
	jQuery(document).ready(function($) {
	  $('a[rel*=facebox]').facebox({
		loadingImage : 'src/loading.gif',
		closeImage   : 'src/closelabel.png'
	  })
	})
  </script>
<script src="js/application.js" type="text/javascript" charset="utf-8"></script>

<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>

<script type="text/javascript"> 

function confirmDelete()
{
    return confirm("Are you sure you want to delete?");
}

</script>
<style type="text/css">

@import url(calender/calendar-win2k-1.css);

</style>


<body>

	<div id="page-wrap">

		<?php include ('header.php') ?>
		
		<div id="zone-bar" class="br-5">
          <?php include ('topmenu.php') ?>
		</div>
		
		
		
<?php require_once('includes/prepaidexpensessubmenu.php');  ?>
		
		<h3>::View Incurred Prepaid Expenses Recorded</h3>
         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
			<div id="cont-left-full" class="br-5">
			
			
			
			
			
<form name="filter" method="post" action=""> 			
<table width="100%" border="0">
  <tr bgcolor="#FFFFCC">
   
    <td colspan="11" height="30" align="center"> 
	<?php
	
	$invoice_no=$_GET['invoice_no'];

if ($_GET['invoice_payment_confirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:550px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Payment Received successfully for the Invoice number' ;?> <?php echo $invoice_no;?> <?php echo '</font></strong></p></div>';
?> 

<?php 

if ($_GET['deleteconfirm']==1)
echo "<p align='center'><strong><font color='#FF0000'>Recorde Deleted Successfuly!!</font></strong></p>";
?>
	
	</td>
	
    </tr>
	<tr bgcolor="#FFFFCC">
	<td colspan="11" align="center"><strong>Search : By Mode Of Payment:</strong>
	<select name="client">
	<option value="0">-------------------Select-----------------</option>
								  <?php
								  
								  $query1="select * from mop order by mop_name asc";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->mop_id; ?>"><?php echo $rows1->mop_name; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
								  
								  
								  
								  
								  
								  ?>
								  
								  </select>
<strong>Or By Date</strong>
						<strong>From : </strong><input type="text" name="from" size="30" id="from" readonly="readonly" /><strong>To:</strong>
		<input type="text" name="to" size="25" id="to" readonly="readonly" />
			<input type="submit" name="generate" value="Generate">
											

					
	
    </tr>
   <tr style="background:url(images/description.gif);" height="30" >
    <td width="20%"><div align="center"><strong>Date Incurred</strong></td>
	<td width="300"><div align="center"><strong>Amount Incurred(Kshs)</strong></td>
<td width="100"><div align="center"><strong>Edit</strong></td>
   <td width="100"><div align="center"><strong>Delete</strong></td>
    </tr>
  
<?php
if (!isset($_POST['generate']))
{

$sql="select * FROM incurred_prepaid_expenses WHERE prepaid_expenses_id='$prepaid_expenses_id' order by incurred_prepaid_expenses_id desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());



}
else
{
$date_from=$_POST['from'];
$date_to=$_POST['to'];
$client=$_POST['client'];
if ($client!='0' && $date_from=='' && $date_to=='')
{
//echo "client only";
$sql="select mop.mop_name,prepaid_expenses.amount_received,prepaid_expenses.receipt_no,prepaid_expenses.decription,prepaid_expenses.prepaid_expenses_id ,prepaid_expenses.mop,prepaid_expenses.ref_no,prepaid_expenses.client_bank,
prepaid_expenses.our_bank,prepaid_expenses.date_paid,prepaid_expenses.receipt_no,prepaid_expenses.date_received,prepaid_expenses.status,currency.curr_name,
prepaid_expenses.currency_code,prepaid_expenses.curr_rate,prepaid_expenses.amount_received FROM mop,prepaid_expenses,currency where 
prepaid_expenses.mop=mop.mop_id AND prepaid_expenses.currency_code=currency.curr_id and prepaid_expenses.mop='$client' order by prepaid_expenses.date_paid  desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
elseif($client=='0' && $date_from!='' && $date_to!='')
{
//echo "Dea only";
$sql="select mop.mop_name,prepaid_expenses.amount_received,prepaid_expenses.receipt_no,prepaid_expenses.decription,prepaid_expenses.prepaid_expenses_id ,prepaid_expenses.mop,prepaid_expenses.ref_no,prepaid_expenses.client_bank,
prepaid_expenses.our_bank,prepaid_expenses.date_paid,prepaid_expenses.receipt_no,prepaid_expenses.date_received,prepaid_expenses.status,currency.curr_name,
prepaid_expenses.currency_code,prepaid_expenses.curr_rate,prepaid_expenses.amount_received FROM mop,prepaid_expenses,currency where 
prepaid_expenses.mop=mop.mop_id AND prepaid_expenses.currency_code=currency.curr_id and prepaid_expenses.date_paid BETWEEN '$date_from' AND '$date_to' order by prepaid_expenses.date_paid  desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
elseif($client!='0' && $date_from!='' && $date_to!='')
{
//echo "Date  and cilonly";
$sql="select mop.mop_name,prepaid_expenses.amount_received,prepaid_expenses.receipt_no,prepaid_expenses.decription,prepaid_expenses.prepaid_expenses_id ,prepaid_expenses.mop,prepaid_expenses.ref_no,prepaid_expenses.client_bank,
prepaid_expenses.our_bank,prepaid_expenses.date_paid,prepaid_expenses.receipt_no,prepaid_expenses.date_received,prepaid_expenses.status,currency.curr_name,
prepaid_expenses.currency_code,prepaid_expenses.curr_rate,prepaid_expenses.amount_received FROM mop,prepaid_expenses,currency where 
prepaid_expenses.mop=mop.mop_id AND prepaid_expenses.currency_code=currency.curr_id and 
prepaid_expenses.date_paid BETWEEN '$date_from' AND '$date_to' and prepaid_expenses.mop='$client' order by prepaid_expenses.date_paid  desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}
else
{
//echo "kba";
$sql="select mop.mop_name,prepaid_expenses.amount_received,prepaid_expenses.receipt_no,prepaid_expenses.decription,prepaid_expenses.prepaid_expenses_id ,prepaid_expenses.mop,prepaid_expenses.ref_no,prepaid_expenses.client_bank,
prepaid_expenses.our_bank,prepaid_expenses.date_paid,prepaid_expenses.receipt_no,prepaid_expenses.date_received,prepaid_expenses.status,currency.curr_name,
prepaid_expenses.currency_code,prepaid_expenses.curr_rate,prepaid_expenses.amount_received FROM mop,prepaid_expenses,currency where 
prepaid_expenses.mop=mop.mop_id AND prepaid_expenses.currency_code=currency.curr_id ORDER BY prepaid_expenses.date_received desc";
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
  
    <td align="center">
<?php 
echo $date_received=$rows->date_incurred; 
	
	?>
	</td>
	<td align="right"><?php echo number_format($rows->amount_incurred,2);?></td>

   
	


	
	
	
	
	
	
	<td align="center"><a rel="facebox" href="edit_incurred_prepaid.php?incurred_prepaid_expenses_id=<?php echo $rows->incurred_prepaid_expenses_id;?>"><img src="images/edit.png"></a></td>
    <td align="center"><a href="delete_incurred_prepaid.php?incurred_prepaid_expenses_id=<?php echo $rows->incurred_prepaid_expenses_id;?>&prepaid_expenses_id=<?php echo $rows->prepaid_expenses_id; ?>"  onClick="return confirmDelete();"><img src="images/delete.png"></a></td>
  
	
  
    </tr>
  <?php 
  $invoice_ttl=$rows->invoice_ttl;
 $inv_grnd_ttl_kshs=$inv_grnd_ttl_kshs+$inv_ttl_kshs;
  $grand_ttl_bal=$grand_ttl_bal+$bal;
  $grand_ttl_rec=$grand_ttl_rec+$ttlrec;
  }
  ?>
   <tr height="30" bgcolor="#FFFFCC">

    <td width="200"><div align="center"><strong></strong></td>
    <td width="300"><div align="center"><strong></strong></td>
	<td width="300"><div align="center"><strong>Grand Total</strong></td>
	<td width="200"><div align="right"><strong><font size="+1"><?php 
	//echo number_format($grand_ttl_inv,2);
	
	
	?></font></strong></td>
	
	
   
   
    </tr>
  <?php
  
  
  
  }
  
  else
  {
  
  ?>
  
  
  <tr bgcolor="#FFFFCC">
   
    <td colspan="10" height="30" align="center"> 
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