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
		
		
		
<?php require_once('includes/rfqsubmenu.php');  ?>
		
		<h3>::List of All Cancelled Quotes Generated To Suppliers</h3>
         
				
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
echo '<div align="center" style="background: #FFCC33; height:20px; width:550px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >RFQ Cancelled Successfuly</font></strong></p></div>';
?> 

<?php 

if ($_GET['deletemachcatconfirm']==1)
echo "<p align='center'><strong><font color='#FF0000'>Record Deleted!!</font></strong></p>";
?>
	
	</td>
	
    </tr>
	

   <tr style="background:url(images/description.gif);" height="30" >
    <td width="200"><div align="center"><strong>Quote REF No:</strong></td>
    <td width="300"><div align="center"><strong>Date Generated</strong></td>
	<td width="300"><div align="center"><strong>Supplier's Name</strong></td>

<td width="300"><div align="center"><strong>View Transactions</strong></td>
<td width="200"><div align="center"><strong>Reason</strong></td>
	
    </tr>
  
  <?php 
  
$sql="select all_rfq.all_rfq_id,all_rfq.rfq_no,all_rfq.user_id,suppliers.supplier_id,suppliers.supplier_name,all_rfq.date_generated,cancelled_all_rfqs.reasons,all_rfq.rfq_code from all_rfq,cancelled_all_rfqs,suppliers where 
all_rfq.supplier_id=suppliers.supplier_id AND cancelled_all_rfqs.rfq_no=all_rfq.rfq_no AND all_rfq.status='2' order by all_rfq.all_rfq_id desc";
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
  
    <td><?php echo $rows->rfq_no;?></td>
    <td align="center"><?php echo $rows->date_generated;?></td>
	<td><?php echo $rows->supplier_name;?></td>


	
	
	

	
	
	
	


	
	<td align="center"><a href="rfq_details.php?all_rfq_id=<?php echo $rows->all_rfq_id;?>&rfq_code=<?php echo $rows->rfq_code;?>&rfq_no=<?php echo $rows->rfq_no;?>
	&supplier_id=<?php echo $rows->supplier_id; ?>&date_generated=<?php echo $rows->date_generated;?>&user=<?php echo $rows->user_id;?>">View Transactions</a></td>
	<td align="center"><?php echo $rows->reasons; ?></td>
	
  
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
<!--<script type="text/javascript">
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
  
  
  
  </script> -->
		
			

			
			
			
					
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