<?php include('Connections/fundmaster.php'); 

$requisition_id=$_GET['requisition_id'];

$sqlrec="SELECT * FROM requisition where requisition_id='$requisition_id'";
$resultsrec= mysql_query($sqlrec) or die ("Error $sqlrec.".mysql_error());	
$rowsj=mysql_fetch_object($resultsrec);
$date_generated=$rowsj->date_generated;
$jb_user_id=$rowsj->user_id;
$remarks=$rowsj->remarks;
$job_card_id=$rowsj->job_card_id;
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
    return confirm("Are you sure you want to print credit note?");
}


</script>




<body>

	<div id="page-wrap">

		<?php include ('header.php') ?>
		
		<div id="zone-bar" class="br-5">
          <?php include ('topmenu.php') ?>
		</div>
		
		
		
		<?php //require_once('includes/stocksubmenu.php');  ?>
		<?php require_once('includes/release_submenu.php'); ?>
		<h3>::Release Items From The Store</h3>
         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
			<div id="cont-left-half" class="br-5">
			
		
			
			
			
			
<table width="100%" border="0">
  <tr bgcolor="#FFFFCC">
   
    <td colspan="8" height="30" align="right"> 
	<font size="+1"><a href="print_received_stock.php?order_code_id=<?php echo $order_code_id;?>&lpo_no=<?php echo $lpo_no;?>
	&supplier_id=<?php echo $supplier_id; ?>&qnty_ordered=<?php echo $qnty_ordered; ?>&purchase_order_id=<?php echo $purchase_order_id ?>" title="Export To Word"><img src="images/word.png" style="margin-right:30px;"/> </a>
	
	</td>
	
	
    </tr>
	<?php 
$sql="select * from suppliers where supplier_id='$supplier_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$rows=mysql_fetch_object($results);
	
	?>
 
    <tr bgcolor="#FFFFCC" height="30" >
    <td width="400" colspan="8" align="center"><strong>Requisition Number :
    <font color="#ff0000"><?php echo $requisition_id;?></font></strong><strong> Job Card No:<font color="#ff0000"><?php echo $job_card_id;?>
	</font></strong></td>
    </tr>
	
	<tr style="background:url(images/description.gif);" height="30" >
	
    <td width="200"><div align="center"><strong>Product Code</strong></td>
    <td width="800"><div align="center"><strong>Product Name</strong></td>
	<td width="200"><div align="center"><strong>Qnty Requested</strong></td>
    <td width="200"><div align="center"><strong>Qnty Released</strong></td>	
	<td width="200"><div align="center"><strong>Balance Qnty</strong></td>	
   <!-- <td width="200"><div align="center"><strong>Delivery Date</strong></td>	
    <td width="200"><div align="center"><strong>Expiry Date</strong></td>
   	
	<td width="50"><div align="center"><strong>Edit</strong></td>-->

	<!--<td width="600"><div align="center"><strong>Enter Delivery date</strong></td>
	<td width="600"><div align="center"><strong>Enter Expiry date</strong></td>-->

    </tr>
  
  <?php 
  
$sql="SELECT * from requisition_item,items  where requisition_item.item_id=items.item_id AND 
requisition_item.requisition_id='$requisition_id'";
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
    
    <td><?php echo $rows->item_code;?><input type="hidden" name="product_code[]" size="20" value="<?php echo $rows->product_code;?>"></td>
    <td><?php echo $rows->item_name.' ('.$rows->pack_size.')';?><input type="hidden" name="product_id[]" size="20" value="<?php echo $rows->product_id;?>">										
										<input type="hidden" name="order_code[]" size="20" value="<?php echo $order_code; ?>">
										<input type="hidden" name="supplier_id[]" size="20" value="<?php echo $supplier_id;?>">
										<input type="hidden" name="purchase_order_id[]" size="20" value="<?php echo $rows->purchase_order_id;?>">
										
	</td>
	<td align="center"><?php echo $qnty_ordered=$rows->item_quantity;?></td>
	
	<td align="center">
	<?php 
	$p_id=$rows->item_id;
	?>
	<a href="view_released_item.php?product_id=<?php echo $p_id; ?>&requisition_id=<?php echo $requisition_id; ?>" style="font-size:12px; color:#000000;">
	<?php 
	

$sqlord1="select SUM(released_quantity) as ttl_quant_rec from released_item where item_id='$p_id' and requisition_id='$requisition_id'";
$resultsord1= mysql_query($sqlord1) or die ("Error $sqlord1.".mysql_error());
$rowsord1=mysql_fetch_object($resultsord1);
echo $qnty_rec=$rowsord1->ttl_quant_rec;
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
				
				<div id="cont-right-half" class="br-5">
<form name="rec_prod" action="process_release_items_from_store.php" method="post">					
				<table width="100%" border="0">
				 <tr bgcolor="#FFFFCC">
    
	<td colspan="4" height="30" align="center"><strong><font color="#ff0000">Panel for Releasing Items from the store</strong></td>
    </tr>
  <tr bgcolor="#FFFFCC">
    
	<td colspan="4" height="30" align="center"><?php
if ($_GET['success']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:450px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Items Released successfully from the store</font></strong></p></div>';
?> 

<?php 

if ($_GET['deletemachcatconfirm']==1)
echo "<p align='center'><strong><font color='#FF0000'>Record Deleted!!</font></strong></p>";

if ($_GET['exist']==1)
echo "<p align='center'><font color='#FF0000'>Sorry!! The Record Exists!!</font></p>";

if ($_GET['abnormal']==1)
echo "<p align='center'><font color='#FF0000'>Sorry!! Qantity Released cannot be more than requested!!</font></p>";


$get_prod=$_GET['get_prod'];
$get_avl_quant=$_GET['avail_quant'];
$sqlprodname="select product_name,pack_size,weight from products where product_id='$get_prod'";
$resultsprodname= mysql_query($sqlprodname) or die ("Error $sqlprodname.".mysql_error());
$rowprodnamw=mysql_fetch_object($resultsprodname);

if ($_GET['missing']==1)
echo '<div align="center" style="background: #FFCC33; height:25px; width:400px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! Quantity available for '.$rowprodnamw->product_name.'('.$rowprodnamw->pack_size.') are <span style="font-size:14px; font-weight:bold;">'.$get_avl_quant.'</span></font></strong></p></div>';
?>
</td>
    </tr>
 
	<tr height="30">
    <td>&nbsp;</td>
    <td  width="30%">Select Item<font color="#FF0000">*</font></td>
    <td>
	<select name="prod"><option>-------------------Select-----------------</option>
								  <?php
								  
$sql1="SELECT * from requisition_item,items  where requisition_item.item_id=items.item_id AND 
requisition_item.requisition_id='$requisition_id'";
$results1= mysql_query($sql1) or die ("Error $sql1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->item_id; ?>"><?php echo $rows1->item_name.' ('.$rows1->item_code.')'; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
								  
								  
								  
								  
								  
								  ?>
								  
								  </select>	</td>
    </tr>
	<!--<tr height="20">
    <td>&nbsp;</td>
    <td>Email Address</td>
    <td><input type="text" size="41" name="email" value="<?php echo $email;?>"></td>
    </tr>-->
	<tr height="30" >
    <td width="10%">
	<input type="hidden" name="requisition_id" size="20" value="<?php echo $requisition_id;?>">
<input type="hidden" name="supplier_id" size="20" value="<?php echo $supplier_id;?>">
<input type="hidden" name="purchase_order_id" size="20" value="<?php echo $rows1->purchase_order_id;?>"></td>
    <td>Quantity Released<font color="#FF0000">*</font></td>
    <td><input type="text" size="41" name="qnty_rec"></td>
    </tr>
	<!--<tr height="30">
    <td>&nbsp;</td>
    <td>Current Exchange Rate</td>
    <td><input type="text" name="delivery_date" size="41" id="delivery_date" readonly="readonly" /></td>
    </tr>-->
	<tr height="30">
    <td>&nbsp;</td>
    <td>Enter Release Date</td>
    <td><input type="text" name="delivery_date" size="41" id="delivery_date" readonly="readonly" /></td>
    </tr>
	<tr height="30">
    <td>&nbsp;</td>
    <td>Receiving Person<font color="#FF0000">*</font></td>
    <td><input type="text" name="rec_person" size="41" /></td>
    </tr>
<!--<tr height="20">
    <td>&nbsp;</td>
    <td>Over-Payment / Under-Payment? <font color="#FF0000">*</font></td>
    <td>
	Over-Payment&nbsp;<input type="radio" size="41" name="bal_type"  value="1">&nbsp;&nbsp;
	Under-Payment<input type="radio" size="41" name="bal_type" checked="checked" value="0">&nbsp;&nbsp;
	Zero Balance<input type="radio" size="41" name="bal_type" checked="checked" value="x">
	
	
	</td>
    </tr>-->
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="submit" name="submit" value="Save">&nbsp;&nbsp;<input type="reset" value="Cancel"></td>

  </tr>
  <tr height="30">
    <td>&nbsp;</td>
    <td colspan="2"><div id='rec_prod_errorloc' class='error_strings'></div></td>
   
    </tr>
 
</table>

	</form>	

<script type="text/javascript">
  Calendar.setup(
    {
      inputField  : "delivery_date",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
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
  
  <SCRIPT language="JavaScript">
 var frmvalidator  = new Validator("rec_prod");
 frmvalidator.EnableOnPageErrorDisplaySingleBox();
 frmvalidator.EnableMsgsTogether();
 frmvalidator.addValidation("prod","dontselect=0",">>Please select the product");
  frmvalidator.addValidation("qnty_rec","req",">>Please enter quantity received");
 frmvalidator.addValidation("delivery_date","req",">>Please enter release date");
 frmvalidator.addValidation("rec_person","req",">>Please enter receiving person");

 
 
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