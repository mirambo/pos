<?php include('Connections/fundmaster.php'); ?>

<html xmlns="http://www.w3.org/1999/xhtml">

<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>
<script language="javaScript" src="gen_validatorv4.js"  type="text/javascript" xml:space="preserve"></script>
<script type="text/javascript" src="calender/calendar.js"></script>
<script type="text/javascript" src="calender/lang/calendar-en.js"></script>
<script type="text/javascript" src="calender/calendar-setup.js"></script>

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
		
		
		
<?php require_once('includes/quotesubmenu.php');  ?>
		
		<h3>::List of All Quotations  Generated to Clients</h3>
         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
			<div id="cont-left-full" class="br-5">
			
			
			
			
			
<form name="filter" method="post" action=""> 			
<table width="100%" border="0">
  <tr bgcolor="#FFFFCC">
   
    <td colspan="10" height="30" align="center"> 
	<?php
	
	$invoice_no=$_GET['invoice_no'];

if ($_GET['cancelconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:550px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Quotation Cancelled Successfuly</font></strong></p></div>';
?> 

<?php 

if ($_GET['deletemachcatconfirm']==1)
echo "<p align='center'><strong><font color='#FF0000'>Record Deleted!!</font></strong></p>";
?>
	
	</td>
	
    </tr>
	<tr bgcolor="#FFFFCC">
	<td colspan="10" align="center"><strong>Search Invoice : By Client Name:</strong>
	<select name="client">
	<option value="0">-------------------Select-----------------</option>
								  <?php
								  
								  $query1="select * from clients";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->client_id; ?>"><?php echo $rows1->c_name; ?> </option>
                                    
                                
										  
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
    <td width="200"><div align="center"><strong>Quotation No:</strong></td>
    <td width="300"><div align="center"><strong>Date Generated</strong></td>
	<td width="300"><div align="center"><strong>Client Name</strong></td>

<td width="300"><div align="center"><strong>View Transactions</strong></td>
<td width="200"><div align="center"><strong>Cancel Quotation</strong></td>
	
    </tr>
  
  <?php
 if (!isset($_POST['generate']))
{

if ($user_group_id!='15')
{ 
  
$sql="select quotations.currency_code,quotations.quotation_id,quotations.quotation_no,quotations.user_id,clients.client_id ,clients.c_name,quotations.date_generated,quotations.quote_code from quotations,clients where 
quotations.client_id=clients.client_id AND quotations.status='1' AND quotations.user_id='$user_id'  order by quotations.quotation_id desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
else
{
$sql="select quotations.currency_code,quotations.quotation_id,quotations.quotation_no,quotations.user_id,clients.client_id ,clients.c_name,quotations.date_generated,quotations.quote_code from quotations,clients where 
quotations.client_id=clients.client_id AND quotations.status='1'  order by quotations.quotation_id desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}
}
else
{
$date_from=$_POST['from'];
$date_to=$_POST['to'];
$client=$_POST['client'];
if ($client!='0' && $date_from=='' && $date_to=='')
{
$sql="select quotations.currency_code,quotations.quotation_id,quotations.quotation_no,quotations.user_id,clients.client_id ,clients.c_name,quotations.date_generated,quotations.quote_code from quotations,clients where 
quotations.client_id=clients.client_id AND quotations.status='1' and quotations.client_id='$client'  order by quotations.quotation_id desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}
elseif($client=='0' && $date_from!='' && $date_to!='')
{
$sql="select quotations.currency_code,quotations.quotation_id,quotations.quotation_no,quotations.user_id,clients.client_id ,clients.c_name,quotations.date_generated,quotations.quote_code from quotations,clients where 
quotations.client_id=clients.client_id AND quotations.status='1' and quotations.date_generated BETWEEN '$date_from' AND '$date_to'  order by quotations.quotation_id desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
elseif($client!='0' && $date_from!='' && $date_to!='')
{
$sql="select quotations.currency_code,quotations.quotation_id,quotations.quotation_no,quotations.user_id,clients.client_id ,clients.c_name,quotations.date_generated,quotations.quote_code from quotations,clients where 
quotations.client_id=clients.client_id AND quotations.status='1' and quotations.date_generated BETWEEN '$date_from' AND '$date_to' and quotations.client_id='$client' order by quotations.quotation_id desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
else
{
$sql="select quotations.currency_code,quotations.quotation_id,quotations.quotation_no,quotations.user_id,clients.client_id ,clients.c_name,quotations.date_generated,quotations.quote_code from quotations,clients where 
quotations.client_id=clients.client_id AND quotations.status='1'  order by quotations.quotation_id desc";
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
  
    <td><?php echo $rows->quotation_no;?></td>
    <td align="center"><?php echo $rows->date_generated;?></td>
	<td><?php echo $rows->c_name;?></td>

	<td align="center"><a href="quotation_details.php?quotation_id=<?php echo $rows->quotation_id;?>&quote_code=<?php echo $rows->quote_code;?>&quotation_no=<?php echo $rows->quotation_no;?>
	&client_id=<?php echo $rows->client_id; ?>&date_generated=<?php echo $rows->date_generated;?>&user=<?php echo $rows->user_id;?>&currency=<?php echo $rows->currency_code; ?>">View Transactions</a></td>
	<td align="center">
	<?php
if ($user_group_id!='15')
{
	 
}
else
{
?>
	<a href="cancel_quote_reason.php?quotation_id=<?php echo $rows->quotation_id;?>&quote_code=<?php echo $rows->quote_code;?>&quotation_no=<?php echo $rows->quotation_no;?>">Cancel</a>
	<?php


}	
	?>
	</td>
	
  
    </tr>
  <?php 
  $invoice_ttl=$rows->invoice_ttl;
 $inv_grnd_ttl_kshs=$inv_grnd_ttl_kshs+$inv_ttl_kshs;
  $grand_ttl_bal=$grand_ttl_bal+$bal;
  $grand_ttl_rec=$grand_ttl_rec+$ttlrec;
  }
  ?>
  
  <?php
  
  
  
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