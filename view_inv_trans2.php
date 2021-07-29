<?php
include('includes/session.php');
include('Connections/fundmaster.php');
$get_client_id=$_GET['client_id'];
$get_sales_code=$_GET['sales_code'];
$get_sales_rep=$_GET['sales_rep'];
$currency=$_GET['currency'];
$invoice_id=$_GET['invoice_id'];
$invoice_no=$_GET['invoice_no'];
$inv_bal=$_GET['inv_bal'];
$date_generated=$_GET['date_generated'];
$user=$_GET['user'];
$sales_rep=$_GET['sales_rep'];



$id=$_GET['cat'];
$get_avl_quant=$_GET['avl_quant'];
$get_prod=$_GET['product_id'];

$sqlprodname="select product_name,pack_size,weight from products where product_id='$get_prod'";
$resultsprodname= mysql_query($sqlprodname) or die ("Error $sqlprodname.".mysql_error());
$rowprodnamw=mysql_fetch_object($resultsprodname);

$sqlcurr="select * from currency where curr_id='$currency'";
$resultscurr= mysql_query($sqlcurr) or die ("Error $sqlcurr.".mysql_error());
$rowcurr=mysql_fetch_object($resultscurr);
$curr_name=$rowcurr->curr_name;
$curr_rate=$rowcurr->curr_rate;

?>


<?php include('Connections/fundmaster.php'); ?>

<html xmlns="http://www.w3.org/1999/xhtml">

<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>

<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>

<SCRIPT language="javascript">
function reload(form)
{
var val=form.prod_cat.options[form.prod_cat.options.selectedIndex].value;
self.location='generate_invoice.php?cat=' + val ;

}

</script>
<script type="text/javascript"> 

function confirmDelete()
{
    return confirm("Are you sure you want to remove the item from the list?");
}

</script>

<script>
function toggle() {
 if( document.getElementById("hidethis").style.display=='none' || document.getElementById("hidethis1").style.display=='none'  )
 {
   document.getElementById("hidethis").style.display = '';
   document.getElementById("hidethis1").style.display = '';
   document.getElementById("hidethis2").style.display = '';
   document.getElementById("hidethis3").style.display = '';
 }else
 {
   document.getElementById("hidethis").style.display = 'none';
   document.getElementById("hidethis1").style.display = 'none';
   document.getElementById("hidethis2").style.display = 'none';
   document.getElementById("hidethis3").style.display = 'none';
 }
}
</script>




<body>

	<div id="page-wrap">

		<?php include ('header.php') ?>
		
		<div id="zone-bar" class="br-5">
          <?php include ('topmenu.php') ?>
		</div>

		<?php require_once('includes/invoicessubmenu.php');  ?>
		
		<h3>:: Generate Invoice to Client : <?php
		
$sqlsup="SELECT * FROM clients where client_id='$get_client_id'";
$resultssup= mysql_query($sqlsup) or die ("Error $sqlsup.".mysql_error());
$rows=mysql_fetch_object($resultssup);


?> <span style="color:#000066"><?php echo $rows->c_name;
		
		
		 ?>  </span>Invoice No : <span style="color:#000066"><?php echo $invoice_no;
		
		
		 ?>  </span></h3>
         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
			<div id="cont-left-full" class="br-5">
<form name="gen_order" action="processgensales.php" method="post">			
<table width="100%" border="0">
  <tr height="30">

    <td colspan="11" align="center">

<?php

if ($_GET['genorderconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Order added successfully!!</font></strong></p></div>';
?>

<?php

if ($_GET['overproduct']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! Quantity available for '.$rowprodnamw->product_name.'('.$rowprodnamw->pack_size.') are <span style="font-size:14px; font-weight:bold;">'.$get_avl_quant.'</span> Units Only</font></strong></p></div>';
?>

<?php

if ($_GET['recordexist']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! the record exist</font></strong></p></div>';
?></td>
    <td><input type="hidden" name="client_id" size="20" value="<?php echo $get_client_id; ?>">
	<input type="hidden" name="sales_code" size="20" value="<?php echo $get_sales_code; ?>">
	<input type="hidden" name="currency1" size="20" value="<?php echo $currency; ?>">
	<input type="hidden" name="curr_rate" size="20" value="<?php echo $curr_rate; ?>">
	<input type="hidden" name="sales_rep" size="20" value="<?php echo $get_sales_rep; ?>">
	
	</td>
    
  </tr>


  <tr bgcolor="#000033" height="30">
    <td colspan="13" align="center"><span style="font-size:17px; font-weight:bold; color: #FFFFFF;">:::Invoice Details</span>
	
	<span style="color:#FFFFFF; float:right;"><a target="_blank" href="invoice2.php?invoice_id=<?php echo $invoice_id; ?>&client_id=<?php echo $get_client_id; ?>
	&sales_code=<?php echo $get_sales_code; ?>&invoice_no=<?php echo $invoice_no; ?>&currency=<?php echo $currency;?>&curr_rate=<?php echo $curr_rate;?>&inv_bal=
	<?php echo $inv_bal ?>&date_generated=<?php echo $date_generated;?>&user=<?php echo $user; ?> "style="color:#FFFFFF;">Print Invoice</a> | 
	
	
	
	
	<span style="color:#FFFFFF; float:right;"><a href="invoiceword2.php?invoice_id=<?php echo $invoice_id; ?>&client_id=<?php echo $get_client_id; ?>
	&sales_code=<?php echo $get_sales_code; ?>&invoice_no=<?php echo $invoice_no; ?>&currency=<?php echo $currency;?>&curr_rate=<?php echo $curr_rate;?>&inv_bal=
	<?php echo $inv_bal ?>&date_generated=<?php echo $date_generated;?>&user=<?php echo $user; ?> "style="color:#FFFFFF;">Print Invoice in Word</a> | </td>
	
    </tr>
 <tr  style="background:url(images/description.gif);" height="30" >
    <td width="10%"><div align="center"><strong>Product Code</strong></div></td>
    <td colspan="2"><div align="center"><strong>Item  Name </strong></div></td>
    <td ><div align="center"><strong>Pack Size</strong></div></td>
    <td width="5%"><div align="center"><strong>Quantity</strong></div></td>
    <td width="10%"><div align="center"><strong>Unit Price (<?php echo $curr_name; ?>)</strong></div></td>
    <td colspan="2"><div align="center"><strong>Amount (<?php echo $curr_name; ?>)</strong></div></td>
	<td width="10%"><div align="center"><strong>Discount(%)</strong></div></td>
	<td width="10%"><div align="center"><strong>V.A.T (16%)</strong></div></td>
    <td width="6%"><div align="center"><strong>Edit</strong></div></td>
    <td width="5%"><div align="center"><strong>Delete</strong></div></td>
    
  </tr>
  
  <?php 
$subttl=0;  
$grndvat=0;
$grnddisc=0;
$grndttl=0;
$sqllpdet="select sales.sales_id,sales.temp_sales_id,sales.quantity,sales.selling_price,sales.product_code,sales.vat_value,sales.discount_perc,
sales.discount_value,products.product_name,products.pack_size from sales, products where sales.product_id=products.product_id and sales.sales_code='$get_sales_code' order by sales.sales_id asc";
$resultslpdet= mysql_query($sqllpdet) or die ("Error $sqllpdet.".mysql_error());


if (mysql_num_rows($resultslpdet) > 0)
						  {
							  $RowCounter=0;
							  while ($rowslpdet=mysql_fetch_object($resultslpdet))
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
    <td><?php echo $rowslpdet->product_code;?></td>
    <td colspan="2"><?php echo $rowslpdet->product_name; ?></td>
    <td><?php echo $rowslpdet->pack_size; ?></td>
    <td><?php echo $rowslpdet->quantity; $qnty=$rowslpdet->quantity;?></td>
    <td align="right"><?php 
	$selling_price=$rowslpdet->selling_price;
	if ($selling_price=='F.O.C')
		{
		echo $selling_price;
		}
		elseif ($selling_price=='Lease')
		{
		echo $selling_price;
		
		}
		elseif ($selling_price=='F.O.C&Lease')
		{
		echo $selling_price;
		}
		
		else		
		{
	echo number_format($rowslpdet->selling_price ,2); $unit_val= $rowslpdet->selling_price;
	}
	
		$ttl_vat=$rowslpdet->vat_value;
	$ttl_disc=$rowslpdet->discount_value;
	
	?>
	
	
	</td>
    <td align="right" colspan="2"><?php 
	
	//echo number_format($rowslpdet->ttl,2);
	
	
	//echo $qnty;  echo $unit_val;
	$ttl=$unit_val*$qnty;
	
	echo number_format ($ttl,2);
	//$id=$rowslpdet->purchase_order_id;
	
	
	/*$sqlttl="UPDATE purchase_order set ttl='$ttl' where purchase_order_id='$id'";
	$resultsttl= mysql_query($sqlttl) or die ("Error $sqlttl.".mysql_error());
	
	$sqlttl="UPDATE temp_purchase_order set ttl='$ttl' where purchase_order_id='$id'";
	$resultsttl= mysql_query($sqlttl) or die ("Error $sqlttl.".mysql_error());*/
	
	
	$subttl=$subttl+$ttl;
	
	

	
	

	?>	</td>
	
	<td align="right">(<?php echo $rowslpdet->discount_perc; ?>%) <?php echo number_format ($rowslpdet->discount_value,2); $ttl_disc=$rowslpdet->discount_value; ?> </td>
	<td align="right"><?php echo number_format($rowslpdet->vat_value,2); $ttl_vat=$rowslpdet->vat_value; ?></td>
	
	
	
    <td align="center">
	<?php
if ($inv_bal=='')
{
	?>
	<a href="edit_sales_trans2.php?temp_sales_id=<?php echo $rowslpdet->temp_sales_id; ?>&client_id=<?php echo $get_client_id; ?>&sales_code=<?php echo $get_sales_code; ?>&currency=<?php echo $currency;  ?>&invoice_no=<?php echo $invoice_no; ?>&inv_bal=<?php echo $inv_bal ?>&curr_rate=<?php echo $curr_rate;?>&date_generated=<?php echo $date_generated;?>&user=<?php echo $user; ?>&sales_rep=<?php echo $sales_rep; ?>">
	<img src="images/edit.png"></a>
	
	<?php
	}
	
	else
	{
	
	
	}
	?>
	
	</td>
    
	
	 
	
	<td align="center">
	
	<?php
if ($inv_bal=='')
{
	?>
	
	<a href="delete_sales_trans.php?temp_sales_id=<?php echo $rowslpdet->temp_sales_id; ?>" onClick="return confirmDelete();"><img src="images/delete.png"></a>
<?php
	}
	
	else
	{
	
	
	}
	?>	
	</td>
    
  </tr>
  
   <?php
	$grndvat=$grndvat+$ttl_vat;
	$grnddisc=$grnddisc+$ttl_disc;
	
	}
	
	?>
  
  
  
  
  <tr height="30">
    <td>&nbsp;</td>
    <td width="12%">&nbsp;</td>
    <td width="6%">&nbsp;</td>
    <td width="19%">&nbsp;</td>
    <td width="5%">&nbsp;</td>
    <td align="right"><strong>Sub Totals</strong></td>

    <td colspan="3"align="right"><strong><?php 

	echo number_format ($subttl,2);    

	?></strong></td>
    <td colspan="3" align="right">
	
	<?php 
	
	if ($get_sales_rep=='x')
	{
	   
	}
	
	else
	{
	
	echo "Expected Commision To Sales Rep";
	
	}
	
	?>
	
	</td>
    
  </tr>
  
  <tr height="30">
    <td>&nbsp;</td>
    <td width="12%" colspan="3"> 
	
	
	
	
	
	</td>
    
    <td width="5%">&nbsp;</td>
    <td align="right"><strong>Total VAT</strong></td>

    <td colspan="3"align="right"><?php 
	
	

	echo number_format ($grndvat,2);    

	?></td>
    <td colspan="3" align="right"><i><?php 
	
$sqlsales_rep="select employees.emp_firstname,employees.emp_lastname,employees.emp_middle_name,user_groups.group_name,users.user_id
								  from users,user_groups,employees where users.group_id=user_groups.group_id and users.user_id and  
								  users.emp_id=employees.emp_id and user_id='$get_sales_rep'";
$resultssales_rep= mysql_query($sqlsales_rep) or die ("Error $sqlsales_rep.".mysql_error());

$rowsales_rep=mysql_fetch_object($resultssales_rep);

echo $rowsales_rep->emp_firstname.' '.$rowsales_rep->emp_middle_name.' '.$rowsales_rep->emp_lastname;
	
	
	?></i></td>
  
  </tr>
  
  <tr height="30">
    <td>&nbsp;</td>
    <td width="12%">&nbsp;</td>
    <td width="6%">&nbsp;</td>
    <td width="19%">&nbsp;</td>
    <td width="5%">&nbsp;</td>
    <td align="right"><strong>Total Discount</strong></td>

    <td colspan="3"align="right"><?php 

	echo number_format ($grnddisc,2);    

	?></td>
    <td colspan="3" align="right">
	
	<?php 
$sqlcomm_perc="select * from commisions where user_id='$get_sales_rep'";
$resultscomm_perc= mysql_query($sqlcomm_perc) or die ("Error $sqlcomm_perc.".mysql_error());
$rowscomm_perc=mysql_fetch_object($resultscomm_perc);

$comm_perc=$rowscomm_perc->comm_perc;

if ($get_sales_rep=='x')
	{
	   echo "(<font color='#ff0000'>No Commission In this Sales</font>)";
	}
	
	
	else 
	
	{


?>
	Commision Expected (<?php echo $comm_perc;  ?>%)
	
	<?php 
	
	}
	
	?>
	
	
	</td>
    
  </tr>
  
  <tr height="30">
    <td>&nbsp;</td>
    <td width="12%">&nbsp;</td>
    <td width="6%">&nbsp;</td>
    <td width="19%">&nbsp;</td>
    <td width="5%">&nbsp;</td>
    <td align="right"><font size="+1"><strong>Grand Total</strong></font></td>

    <td colspan="3"align="right"><font size="+1" color="#ff0000"><?php 
	
	
	$grndttl=$subttl+$grndvat-$grnddisc;
	
	 session_start();
	 
	 $_SESSION['grndttl']=$grndttl;

	echo number_format ($grndttl,2);    

	?></font></td>
    <td colspan="3" align="right">
	
	<?php 
	
	if ($get_sales_rep=='x')
	{
	   
	}
	
	else
	{ ?>	
Commision Amount : <strong><font color="#ff0000"><i><?php 
$sqlcomm_perc="select * from commisions where user_id='$get_sales_rep'";
$resultscomm_perc= mysql_query($sqlcomm_perc) or die ("Error $sqlcomm_perc.".mysql_error());
$rowscomm_perc=mysql_fetch_object($resultscomm_perc);

$comm_perc=$rowscomm_perc->comm_perc;

$com=$comm_perc/100*$grndttl;

echo number_format($com,2); 



session_start();

$_SESSION['com']=$com;
$_SESSION['sales_rep']=$get_sales_rep;
	
	?></i></strong>
	
	
	
	<?php 
	
	}
	
	?>
	
	</td>
	
<!--<tr bgcolor="#000033" height="20"><td colspan="12" align="center"><span style="font-size:17px; font-weight:bold; color: #FFFFFF;" onClick="toggle();">:::Incase of Payment upon Cash On Invoicing <blink>Click Here!!</blink></span><br /><br />
</span></td></tr>
   
  </tr>
  

  <form name="paypoint" action="gen_invoice.php?prnt_client_id=<?php echo $get_client_id; ?>&prnt_sales_id=<?php echo $get_sales_code;  ?>&currency=<?php echo $currency;?>&curr_rate=<?php echo $curr_rate ?>" method="post">
  <table width="100%" border="0">
  
  
  <tr height="30" id="hidethis3" style="display:none;"><td>&nbsp;</td>
  <td>&nbsp;</td>
  <td colspan="3"><div id='paypoint_errorloc' class='error_strings'></td>
 
  
  </tr>
  <tr id="hidethis" style="display:none;"><td width="650">&nbsp;</td>
  <td width="400" align="right"><strong><font size="+1">Enter the Amount Received(<?php echo $curr_name ?>)</font></strong><br/>(Incase of full Payment enter amount reflected on the invoice)</td>
  <td ><input type="text" name="cash_rec" size="40"><input type="hidden" name="sales_rep" size="20" value="<?php echo $get_sales_rep; ?>">
  
  
  </td>
  <td width="550" colspan="3" rowspan="2"></td>
  </tr>
  
  <tr id="hidethis1" style="display:none;"><td width="650">&nbsp;</td>
  <td width="400" align="right"><strong>Select Mode of Payment</strong></td>
  <td ><select name="mop">
	
	<option>-------------------------Select--------------------</option>
	<option value="Cash">Cash</option>
	<option value="Cheque">Cheque</option>
	<option value="Electronic Transfer">Electronic Transfer</option>
	
	
	
	</select>
  
  
  </td>
  <td width="550" colspan="3"></td>
  </tr>-->
  
  
  <tr id="hidethis2" style="display:none;"><td>&nbsp;</td><td>&nbsp;</td><td height="30"><input type="submit" name="submit_cash" value="Save and Print Invoice"></td><td>&nbsp;</td><td>&nbsp;</td></tr>
  <tr id="hidethis"><td>&nbsp;</td><td>&nbsp;</td><td colspan="2"></div></td></tr>
  <tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
  </table>
  </form>
  


  
  <?php 
	
	
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