<?php include('Connections/fundmaster.php'); 

$order_code_id=$_GET['order_code_id'];
$order_code=$_GET['order_code'];

$sqlrec="select * FROM currency,suppliers,order_code_get WHERE order_code_get.currency=currency.curr_id 
AND order_code_get.supplier_id=suppliers.supplier_id AND order_code_get.order_code_id='$order_code_id'";
$resultsrec= mysql_query($sqlrec) or die ("Error $sqlrec.".mysql_error());	
$rowsrec=mysql_fetch_object($resultsrec);

$lpo_no=$rowsrec->lpo_no;
$curr_name=$rowsrec->curr_name;
$currency=$rowsrec->currency;
$curr_rate=$rowsrec->curr_rate;
$supplier_id=$rowsrec->supplier_id;
$qnty_ordered=$_GET['qnty_ordered'];
$purchase_order_id=$_GET['purchase_order_id'];
$sqltrunc = "DELETE FROM temp_sales_returns";
$resultstrunc=mysql_query($sqltrunc) or die ("Error: $sqltrunc.".mysql_error());
?>

<html xmlns="http://www.w3.org/1999/xhtml">

<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>
<script type="text/javascript" src="calender/calendar.js"></script>
<script type="text/javascript" src="calender/lang/calendar-en.js"></script>
<script type="text/javascript" src="calender/calendar-setup.js"></script>
<style type="text/css">

@import url(calender/calendar-win2k-1.css);

</style>

<style type="text/css">
.table
{
border-collapse:collapse;
}
.table td, tr
{
border:1px solid black;
padding:3px;
}
</style>

<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>
<script type='text/javascript'>
if (typeof window.onload == 'function') {motorCheckbox_OL = window.onload;}
window.onload = function()
{
  if (window.motorCheckbox_OL) motorCheckbox_OL();
  var i, ca;
  ca = document.getElementsByName('motorCheckbox');
  for (i = 0; i < ca.length; ++i) {
    ca[i].onclick = motorCheckbox_click;
  }
}
function motorCheckbox_click()
{
  // find parent TR
  var td = this.parentNode;
  while (td && td.nodeName.toLowerCase() != 'td') {
    td = td.parentNode;
  }
  if (td) {
    // get all inputs contained by td
    var i, ia = td.getElementsByTagName('input');
    for (i = 0; i < ia.length; ++i) {
      if (ia[i].type.toLowerCase() == 'text') { // filter out 'text' inputs
        ia[i].disabled = this.checked;
      }
    }
  }
}
</script>
<script type="text/javascript"> 

function confirmDelete()
{
    return confirm("Are you sure you want to receive items to the store?");
}


</script>
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

<script type="text/javascript" src="jquery-1.3.2.min.js"></script>

	<script src="js/jquery-1.8.2.js"></script>
	<script src="js/jquery-ui.js"></script>
	<link rel="stylesheet" href="css/jquery-ui.css" />


<script type="text/javascript">
 
 function confirmDelete()
{
    return confirm("Are you sure want save?");
}

 function confirmDel()
{
    return confirm("Are you sure want to delete?");
}
  
  
  /////for client properties
   
  
  
  $(function() {

    //fadeout selected item and remove
    $('.remove').live('click', function() {
        $(this).parent().fadeOut(300, function(){ 
            $(this).empty();
            return false;
        });
    });

    var options = '<p>Choose Rest Date : <input type="text" class="datepicker" name="due_date[]" value="" size="30" />   <a href="#" class="remove">Remove</a></p>';    

     $('#add').click(function() {
        $(options).fadeIn("slow").appendTo('#extender'); 
        counter++;    
        return false;
    }); 
	
	
    $('.datepicker').live('click', function() {
        $(this).datepicker('destroy').datepicker({changeMonth: true,changeYear: true,dateFormat: "yy-mm-dd",yearRange: "1900:+10",showOn:'focus'}).focus();
    });


});
 
</script>








<body>

	<div id="page-wrap">

		<?php include ('header.php') ?>
		
		<div id="zone-bar" class="br-5">
          <?php include ('topmenu.php') ?>
		</div>
		
		
		
		<?php require_once('includes/stocksubmenu.php');  ?>
		<?php //require_once('includes/lposubmenu.php'); ?>
		<h3>::Receive Stock to the Warehouse</h3>
         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
		<div id="cont-left-half"   style="" class="br-5">
			<!--<div style="width:100%;"   class="br-5">-->
			
		
			
			
			
			
<table width="100%" border="0">
  <tr bgcolor="#FFFFCC">
   
    <td colspan="8" height="30" align="right"> 
	<!--<font size="+1"><a href="print_received_stock.php?order_code_id=<?php echo $order_code_id;?>&lpo_no=<?php echo $lpo_no;?>
	&supplier_id=<?php echo $supplier_id; ?>&qnty_ordered=<?php echo $qnty_ordered; ?>&purchase_order_id=<?php echo $purchase_order_id ?>" title="Export To Word"><img src="images/word.png" style="margin-right:30px;"/> </a>
-->	
	</td>
	
	
    </tr>
	<?php 
$sql="select * from suppliers where supplier_id='$supplier_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$rows=mysql_fetch_object($results);
	
	?>
 
    <tr bgcolor="#FFFFCC" height="30" >
    <td width="400" colspan="8" align="center"><strong>LPO Number</strong> :
    <?php echo $lpo_no;?><strong> Supplier Name:</strong><?php echo $rows->supplier_name;?>
	</td>
    </tr>
	
	<tr style="background:url(images/description.gif);" height="30" >
	
    <td width="200"><div align="center"><strong>Product Code</strong></td>
    <td width="800"><div align="center"><strong>Product Name</strong></td>
	<td width="200"><div align="center"><strong>Qty Ordered</strong></td>
	<td width="200"><div align="center"><strong>Unit Cost</strong></td>
	<td width="200"><div align="center"><strong>Amount</strong></td>
    <td width="200"><div align="center"><strong>Qty Received</strong></td>	
	<td width="200"><div align="center"><strong>Balance Qty</strong></td>	
   <!-- <td width="200"><div align="center"><strong>Delivery Date</strong></td>	
    <td width="200"><div align="center"><strong>Expiry Date</strong></td>
   	
	<td width="50"><div align="center"><strong>Edit</strong></td>-->

	<!--<td width="600"><div align="center"><strong>Enter Delivery date</strong></td>
	<td width="600"><div align="center"><strong>Enter Expiry date</strong></td>-->

    </tr>
  
  <?php 
 $grndttl=0; 
 $quant_bal=0;
$sql="select * FROM purchase_order,items 
WHERE purchase_order.product_id=items.item_id AND purchase_order.order_code='$order_code_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


if (mysql_num_rows($results) > 0)
						  {
							  $RowCounter=0;
							  while ($rows=mysql_fetch_object($results))
							  { 
						  
									  $p_id=$rows->product_id;
									  $po_id=$rows->order_code;						  
						  
$sqlord1="select SUM(quantity_rec) as ttl_quant_rec,expiry_date,delivery_date from received_stock where product_id='$p_id' 
and order_code_id='$po_id'";
$resultsord1= mysql_query($sqlord1) or die ("Error $sqlord1.".mysql_error());
$rowsord1=mysql_fetch_object($resultsord1);
$qnty_rec=$rowsord1->ttl_quant_rec;				  
						  
						  
						  
						  
						  
							  
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
    
    <td><?php echo $rows->item_code;?><input type="hidden" name="product_code[]" size="20" value="<?php echo $rows->item_code;?>"></td>
    <td><?php echo $rows->item_name;?><input type="hidden" name="product_id[]" size="20" value="<?php echo $rows->item_id;?>">										
										<input type="hidden" name="order_code[]" size="20" value="<?php echo $order_code; ?>">
										<input type="hidden" name="supplier_id[]" size="20" value="<?php echo $supplier_id;?>">
										<input type="hidden" name="purchase_order_id[]" size="20" value="<?php echo $rows->purchase_order_id;?>">
										
	</td>
	<td align="center"><?php echo $qnty_ordered=$rows->quantity;?></td>
	<td align="right"><?php echo number_format($unit_cost=$rows->vendor_prc,2);?></td>
	<td align="center"><?php echo number_format($amnt=$unit_cost*$qnty_ordered,2);
	
	$grndttl=$grndttl+$amnt;
	
	?></td>
	
	<td align="center">
	<?php 
	$p_id=$rows->item_id;
	?>
	<a href="view_received_stock.php?product_id=<?php echo $p_id; ?>&order_code_id=<?php echo $order_code_id; ?>" style="font-size:12px; color:#000000;">
	<?php 
	
echo $qnty_rec;

	?>
	
</a>	
	</td>
	<td align="center">
	
	<?php echo $quant_bal=$qnty_ordered-$qnty_rec; ?>
		
	</td>

	
	
	</td>
	
	
		
	
	
	
	
	
  
    </tr>
	
  <?php 
  
  }
  
  ?>
<tr bgcolor="#FFFFCC" height="30">
<td>Totals</td>
<td></td>
<td></td>
<td colspan="2" align="right"><strong><?php echo number_format($grndttl,2); ?></strong></td>

<td></td>
<td></td>

</tr>  
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
  <!--<tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
	 <td>&nbsp;</td>
	 <td>&nbsp;</td>
    <td align="center"><input type="submit" name="submit" value="Save Stock to the Warehouse">&nbsp;&nbsp;</td>
   
  </tr>-->
</table>
		

	
	 



			
			
			
					
			  </div>
				
				<div id="cont-right-half" class="br-5">
				<!--<div style="width:100%" class="br-5">-->
<form name="rec_prod" action="process_rec_stock_to_warehouse_bulk.php?order_code_id=<?php echo $order_code_id; ?>" method="post">					
				<table width="100%" border="0">
				 <tr bgcolor="#FFFFCC">
    
	<td colspan="8" height="30" align="center"><strong><font color="#ff0000">Panel for Receiving Stock into the Warehouse</strong></td>
    </tr>
  <tr bgcolor="#FFFFCC">
    
	<td colspan="4" height="30" align="center"><?php
if ($_GET['success']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:450px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Stock Received successfully into the warehouse</font></strong></p></div>';
?> 

<?php 

if ($_GET['deletemachcatconfirm']==1)
echo "<p align='center'><strong><font color='#FF0000'>Record Deleted!!</font></strong></p>";

if ($_GET['exist']==1)
echo "<p align='center'><font color='#FF0000'>Sorry!! The Record Exists!!</font></p>";

if ($_GET['abnormal']==1)
echo "<p align='center'><font color='#FF0000'>Sorry!! Qantity Received cannot be more than ordered!!</font></p>";
?>
</td>
    </tr>




<?php 
if ($order_code!='')
{

include('receive_stock_details.php');


}
else
{
?>












	
	<tr height="30" bgcolor="#ffffcc">

    <td align="center">Delivery Date : <input type="text" required name="delivery_date" size="20" id="delivery_date"/>
	
	
	
	
	
	
	</td>

    </tr>
 
 
 <tr><td colspan="4">

       <table border="0" width="100%" align="center">	
<tr style="background:url(images/description.gif);" height="30" >

<td align="center" width="40%"><strong>Item Name</strong></td>
<td align="center"><strong>Quantity</strong></td>


</tr>
	
								  
<?php 
$quant_bal=0;
$sql1="select * FROM purchase_order,items
WHERE purchase_order.product_id=items.item_id AND purchase_order.order_code='$order_code_id'";
$results1= mysql_query($sql1) or die ("Error $sql1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { 
									  
									  $p_id=$rows1->product_id;
									  
$sqlord1="select SUM(quantity_rec) as ttl_quant_rec,expiry_date,delivery_date from received_stock where product_id='$p_id' 
and order_code_id='$order_code_id'";
$resultsord1= mysql_query($sqlord1) or die ("Error $sqlord1.".mysql_error());
$rowsord1=mysql_fetch_object($resultsord1);

 $qnty_rec=$rowsord1->ttl_quant_rec;	

$quantity=$rows1->quantity;		


$quant_bal=$quantity-$qnty_rec;		

$RowCounter++;
							  if($RowCounter % 2==0)
{
echo '<tr bgcolor="#C0D7E5" height="25">';
}
else 
{
echo '<tr bgcolor="#FFFFCC" height="25" >';
}



$po_id=$rows1->purchase_order_id;

			  
									  ?>
									  
									  


<td align="">


<input name="post_purchase_order_id[<?php echo $po_id; ?>]" type="hidden" value="<?php echo $po_id; ?>">
<input type="checkbox"  hidden


checked 


name="prod[<?php echo $po_id; ?>]" value="<?php echo $rows1->item_id; ?>">

<?php echo $rows1->item_name; ?>



</td>

<td align="center">
<input type="text" required name="qnty_rec[<?php echo $po_id; ?>]" 
<?php 
if ($quant_bal==0)
{  
?>
readonly 
<?php 

}
else
{
	
 }  ?>

value="<?php echo $quant_bal?>"  size="20">





<input type="hidden" name="vendor_prc[<?php echo $po_id; ?>]" value="<?php echo $rows1->vendor_prc; ?>">



</td>


</tr>

							  
	<?php 
$ttl_quant=$ttl_quant+$quantity;
	
	
	}
	
	 $ttl_quant;
	
	?>
	
<input type="hidden" name="qnty_recffff[<?php echo $po_id; ?>]" value="<?php echo $ttl_quant; ?>"> 	
	<?php
	
									  
									  
									  }
								  
								  
								  
								  
								  
								  ?>							  
								  
								  
</table>	

  </div>							  
</td>								  
</tr>								  
								  
<?php 

}
?>								  
								  
								  
								  
								  
								  
								  
								  
		<?php
if ($order_code!='')
{

?>

<?php
}

else
{
?>							  
								  
								  


	
	
	<!--<tr height="30">
    <td>&nbsp;</td>
    <td>Freight Charges (<?php echo $curr_name ?>)</td>
    <td><input type="text" name="freight_charges" size="41"/></td>
    </tr>-->
	
	<!--<tr height="30">
    <td>&nbsp;</td>
    <td>Current Exchange Rate </td>
    <td><input type="text" name="curr_rate" size="30"/></td>
    </tr>-->
	
  
  
 
</table>
</div></br>
<table align="right" bgcolor="#fff">
<tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>

<input type="submit" onClick="return confirmDelete();" style="background:#009900; font-size:13px; color:#ffffff; font-weight:bold; width:200px; height:30px; border-radius:5px;" name="submit" value="Save">&nbsp;&nbsp;</td>


	
	

  </tr>
  <tr height="30">
    <td>&nbsp;</td>
    <td colspan="2"><div id='rec_prod_errorloc' class='error_strings'></div></td>
   
    </tr>
	
	 <?php
}



?> 
 
</table>



	</form>	
	
	<script>

$('#start_time').datetimepicker({value:'',step:10});
$('#end_time').datetimepicker({value:'',step:10});

</script>
	
	
	
	
	
	
	
	
			<?php
if ($_GET['success']==1)
{

}

else
{
?>

<script type="text/javascript">
  Calendar.setup(
    {
      inputField  : "delivery_date",         // ID of the input field
      ifFormat    : "%Y-%m-%d",    // the date format
      button      : "delivery_date"       // ID of the button
    }
  );
  
  /* Calendar.setup(
    {
      inputField  : "expiry_date",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "expiry_date"       // ID of the button
    }
  ); */
  
 
  
  
  
  </script>
  
  <?php 
  }
  
  ?>
  
 <SCRIPT language="JavaScript">
 var frmvalidator  = new Validator("rec_prod");
 frmvalidator.EnableOnPageErrorDisplaySingleBox();
 frmvalidator.EnableMsgsTogether();
 frmvalidator.addValidation("delivery_date","req",">>Please enter delivery date");

 
 
  </SCRIPT>
  
  
					
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