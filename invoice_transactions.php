<?php include('Connections/fundmaster.php'); 

$get_inv_id=$_GET['invoice_id'];
$get_sales_code=$_GET['sales_code'];

?>

<html xmlns="http://www.w3.org/1999/xhtml">

<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>

<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>

<script type="text/javascript"> 

function confirmDelete()
{
    return confirm("Are you sure you want to print credit note?");
}


</script>




<body>

	<div id="page-wrap">

		<?php include ('header.php') ?>
		
		<div id="zone-bar" class="br-5">
          <?php include ('topmenu.php') ?>
		</div>
		
		
		
		<?php require_once('includes/prodsubmenu.php');  ?>
		
		<h3>::Details Transctions of a particular invoice</h3>
         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
			<div id="cont-left-full" class="br-5">
			
			
			
			
			
			
<table width="100%" border="0">
  <tr bgcolor="#FFFFCC">
   
    <td colspan="5" height="30" align="center"> 
	<?php
	
	$invoice_no=$_GET['invoice_no'];

if ($_GET['invoice_payment_confirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:550px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Payment Received successfully for the Invoice number' ;?> <?php echo $invoice_no;?> <?php echo '</font></strong></p></div>';
?> 

<?php 

if ($_GET['deletemachcatconfirm']==1)
echo "<p align='center'><strong><font color='#FF0000'>Record Deleted!!</font></strong></p>";
?>
	
	</td>
	<td><input name="delete" type="submit" id="delete" value="Save and Print Credit Note" onClick="return confirmDelete();">

<?php 
 if (!empty($_POST['delete'])) {
                    foreach ($_POST['need_delete'] as $id => $value) {
                        $sql = 'DELETE FROM `employees` WHERE `emp_id`='.(int)$id;
                        mysql_query($sql);
                    }
                    header('Location: view_employees.php?delconfirm=1');
                }

?> 
	
	</td>
	
    </tr>
	<?php 
$sqlorg="select invoices.invoice_id,invoices.invoice_no,invoices.date_generated,invoices.invoice_ttl,invoices.sales_code,invoices.sales_rep,clients.c_name from invoices,clients where invoices.client_id=clients.client_id and invoices.invoice_id='$get_inv_id'";
$resultsorg= mysql_query($sqlorg) or die ("Error $sqlorg.".mysql_error());
$rowsorg=mysql_fetch_object($resultsorg);
	
	?>
  
    <tr bgcolor="#FFFFCC" height="30" >
    <td width="400" colspan="9"><div align="center"><strong>Invoice Number</strong> :
    <?php echo $rowsorg->invoice_no; ?>
	<strong>Client Name:</strong> 
	<?php echo $rowsorg->c_name; invoice_ttl?>
	<strong>Amount Invoiced : </strong> 
	<?php echo number_format($rowsorg->invoice_ttl,2); ?>
	<!--<td width="250"><div align="center"><strong>Balance</strong></td>
	<td width="200"><div align="center"><strong>Clear Balance</strong></td>
    <td width="100" ><div align="center"><strong>Edit</strong></td>
    <td width="100"><div align="center"><strong>Delete</strong></td>-->
    </tr>
	
	<tr style="background:url(images/description.gif);" height="30" >
	 <td align="center" width="50"><strong>#</strong></td>
    <td width="400"><div align="center"><strong>Product Code</strong></td>
    <td width="300"><div align="center"><strong>Product Name</strong></td>
	<td width="600"><div align="center"><strong>Quantity Invoiced</strong></td>
	<td width="600"><div align="center"><strong>Unit Price</strong></td>
	<td width="250"><div align="center"><strong>Return Sales</strong></td>
	 <!--<td width="250"><div align="center"><strong>Balance</strong></td>
	<td width="200"><div align="center"><strong>Clear Balance</strong></td>
   <td width="100" ><div align="center"><strong>Edit</strong></td>
    <td width="100"><div align="center"><strong>Delete</strong></td>-->
    </tr>
  
  <?php 
  
$sql="SELECT sales.sales_id,sales.sales_code,sales.product_id,sales.product_code,sales.quantity,sales.selling_price,products.product_name FROM sales,products where sales.product_id=products.product_id and sales.sales_code='$get_sales_code'";
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
    <td align="center" bgcolor="#FFFFFF"><input name="need_delete[<? echo $rows->emp_id;?>]" type="checkbox" id="checkbox[<? echo $rows->emp_id; ?>]" value="<? echo $rows->emp_id;?>"></td>
    <td><?php echo $rows->product_code;?></td>
    <td><?php echo $rows->product_name;?></td>
	<td><?php echo $rows->quantity;?></td>
	<td><?php echo $rows->selling_price;?></td>
	<td>Returned</td>
	
  
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