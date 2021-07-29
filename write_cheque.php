<?php include('Connections/fundmaster.php'); 
$order_code=$_GET['order_code'];

?>

<html xmlns="http://www.w3.org/1999/xhtml">

<script language="javaScript" src="gen_validatorv4.js"  type="text/javascript" xml:space="preserve"></script>
<script type="text/javascript" src="calender/calendar.js"></script>
<script type="text/javascript" src="calender/lang/calendar-en.js"></script>
<script type="text/javascript" src="calender/calendar-setup.js"></script>
<script language="JavaScript" type="text/javascript" src="suggest.js"></script>

<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>
<link href="tab_style.css" rel="stylesheet" type="text/css"><!-- For tabs-->
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

<script type="text/javascript"> 
function confirmSave()
{
    return confirm("Are you sure want to save?");
}

function confirmDelete()
{
    return confirm("Are you sure want to delete this item from the lpo?");
}

function confirmDeleteItem()
{
    return confirm("Are you sure want to delete a part from the job card?");
}

function confirmDeleteBelong()
{
    return confirm("Are you sure want to delete a customer belonging from this job card?");
}

</script>


<script type="text/javascript" src="jquery-1.3.2.min.js"></script>
<!--<script type="text/javascript" src="jquery-1.8.3.js"></script>-->

<script src="js/jquery-1.10.2.min.js"></script>	
		<script src="js/jquery-ui-1.10.3.custom.min.js"></script>
		<script src="js/bootstrap.min.js"></script>	
		<link rel="stylesheet" href="css/jquery-ui-1.10.3.custom.min.css" />

 
<style type="text/css">
	
</style>
<script type="text/javascript">
 
$(document).ready(function(){ 
    var counter = 2; 
    $("#addButton").click(function () { 
	if(counter>100){
            alert("Only 100 textboxes allow");
            return false;
	}   
 	var newTextBoxDiv = $(document.createElement('div'))
	     .attr("id", 'TextBoxDiv' + counter);
 	newTextBoxDiv.after().html('Task '+ counter + ' : ' +
	      '<select name="task_name[]" style="width:200px;"><option value="0">Select...........................</option><?php $query1="select * from task order by task_name asc"; $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error()); if (mysql_num_rows($results1)>0) { while ($rows1=mysql_fetch_object($results1)) { ?> <option value="<?php echo $rows1->task_id; ?>"><?php echo $rows1->task_name; ?> </option> <?php  } } ?></select> Assign Technician <select name="technician_id[]"><option value="0">Select...........................</option><?php $query1="select * from users where user_group_id='30' order by f_name asc"; $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error()); if (mysql_num_rows($results1)>0) { while ($rows1=mysql_fetch_object($results1)) { ?> <option value="<?php echo $rows1->user_id; ?>"><?php echo $rows1->f_name; ?> </option> <?php  } } ?></select>');
 	newTextBoxDiv.appendTo("#TextBoxesGroup");
 	counter++;
     });
     $("#removeButton").click(function () {
	if(counter==2){
          alert("No more textbox to remove");
          return false;
       }   
	counter--;
 
        $("#TextBoxDiv" + counter).remove();
 
     });
 
     
  });
  
  
  /////for client properties
  
$(document).ready(function(){ 
    var counter = 2; 
    $("#addBelong").click(function () { 
	if(counter>100){
            alert("Only 100 textboxes allow");
            return false;
	}   
 	var newTextBoxDiv2 = $(document.createElement('div'))
	     .attr("id", 'TextBoxDiv2' + counter);
 	newTextBoxDiv2.after().html('<tr class="txtMult"><td colspan="3">Item '+ counter + ' : ' +
	      '<select name="prod[]" style="width:150px;"><option value="0">Select...........................</option><?php $query1="select * from items order by item_name asc"; $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error()); if (mysql_num_rows($results1)>0) { while ($rows1=mysql_fetch_object($results1)) { ?> <option value="<?php echo $rows1->item_id; ?>"><?php echo $rows1->item_name.'  ('.$rows1->item_code.')'; ?> </option> <?php  } } ?></select> Quantity <input type="text" name="qnty[]" size="10" class="val1"> <!--Unit Price <input type="text" name="vend_price[]" size="10" class="val2"><strong><span class="multTotal">0.00</span>--></strong></td></tr>');
 	newTextBoxDiv2.appendTo("#TextBoxesGroup2");
 	counter++;
     });
     $("#removeBelong").click(function () {
	if(counter==2){
          alert("No more textbox to remove");
          return false;
       }   
	counter--;
 
        $("#TextBoxDiv2" + counter).remove();
 
     });
 
     
  });
  
  
  
  /////for parts section
  
$(document).ready(function(){ 
    var counter = 2; 
    $("#addPart").click(function () { 
	if(counter>100){
            alert("Only 100 textboxes allow");
            return false;
	}   
 	var newTextBoxDiv3 = $(document.createElement('div'))
	     .attr("id", 'TextBoxDiv3' + counter); 	
 	newTextBoxDiv3.after().html('Part '+ counter + ' : ' +'<select name="part_id[]"><option value="0">Select........................</option><?php $query1="select * from items order by item_name asc"; $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error()); if (mysql_num_rows($results1)>0) {while ($rows1=mysql_fetch_object($results1)) { ?>	<option value="<?php echo $rows1->item_id;?>"><?php echo $rows1->item_name.' ('.$rows1->item_code.')'; ?> </option><?php  }}?></select> Quantity : <input type="textbox" name="quantity[]" id="quantity[]" size="10">');
 	newTextBoxDiv3.appendTo("#TextBoxesGroup3");
 	counter++;
     });
     $("#removePart").click(function () {
	if(counter==2){
          alert("No more textbox to remove");
          return false;
       }   
	counter--;
 
        $("#TextBoxDiv3" + counter).remove();
 
     });
 
     
  });
  
  
  
</script>
<script type="text/javascript"> 
  $(document).ready(function () {
       $(".txtMult input").keyup(multInputs);

       function multInputs() {
           var mult = 0;
           // for each row:
           $("tr.txtMult").each(function () {
               // get the values from this row:
               var $val1 = $('.val1', this).val();
               var $val2 = $('.val2', this).val();
               var $val4 = $('.val4', this).val();
               var $total = ($val1 * 1) * ($val2 * 1)
               $('.multTotal',this).text($total);
               mult += $total;
               //multdiff += $total - ($val4 * 1);
           }); 
           $("#grandTotal").text(mult);
          // $("#grandDiff").text(multdiff);
       }
  });

  
  
  
 


</script>


<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>

<body>

	<div id="page-wrap">

		<?php include ('header.php') ?>
		
		<div id="zone-bar" class="br-5">
          <?php include ('topmenu.php') ?>
		</div>

		<?php require_once('includes/write_cheque_submenu.php');  ?>
		
		<h3>:: Write Cheques</h3>
         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
			<div id="cont-left-full" class="br-5">			
	
<form name="start_order" action="process_item_transfer.php" method="post">	
<?php 
if ($order_code!=0)
{
include('view_items_transfer_details.php');
?>

<?php
}
else
{
?>

	<!--<h3 align="center">Enter LPO Details</h3>-->
	
	
	
<table width="90%" border="0" align="center">
<tr bgcolor="#FFFFCC" height="20"><td colspan="10" align="center">
<div id='start_order_shop_id_errorloc' class="error_strings"></div>
Choose Account : <select name="shop_id" style="width:150px;">
<option value="0">Select..............................</option>
<?php include ('choose_shop.php') ?>




	

								  
								  
								  
								  
								  
								  
								  </select>

<?php



if ($_GET['addconfirm']==1)
echo '<div align="center" style="background: #009900; height:20px; width:400px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ffffff" >Job Card Created Successfully!!</font></strong></p></div>';

if ($_GET['editsuccess']==1)
echo '<div align="center" style="background: #009900; height:25px; width:400px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ffffff" >Job Card Updated Successfully!!</font></strong></p></div>';


?>
<?php

if ($_GET['delete']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Record Deleted Successfully!!</font></strong></p></div>';
?>
<?php
if ($_GET['recordexist']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! the record exist</font></strong></p></div>';
?></td></tr>



<!--<tr bgcolor="#FFFFCC" height="20"><td colspan="10" align="center"><a style="font-weight:bold; color:#ff0000;" href="home.php?areareport=areareport&booking_id=<?php echo $booking_id; ?>">!!!!!Click Here To Add More Parts!!!!</a></td></tr>-->


<?php 
if ($view==1)
{

}
else
{
?>

<tr height="50" bgcolor="#FFFFCC">
<td valign="top" height="200" width="40%">
<table width="100%" border="0" class="table">
<tr bgcolor="#2E3192"><td colspan="2"  align="center"><img src="images/task_icon.png" align="left" width="20" height="20"><strong><font color="#ffffff">Cheque Details</font></strong></td></tr>
<tr height="30">
<td align="center">
<div id='start_order_date_from_errorloc' class="error_strings"></div><div id='emp_date_to_errorloc' class="error_strings"></div>
 Date<input type="text" name="date_from" size="20" value="<?php echo date('Y-m-d');?>" id="date_from" readonly="readonly" />
</br>
</br>
<div id='start_order_sup_errorloc' class="error_strings"></div>
Select Vendor
<select name="supplier_id" id="supplier_id">
	<option value="0">Select Vendors.............</option>
    <?php 
	$query_parent = mysql_query("select * FROM suppliers order by supplier_name asc") or die("Query failed: ".mysql_error());
	while($row = mysql_fetch_array($query_parent)): ?>
    <option value="<?php echo $row['supplier_id']; ?>"><?php echo $row['supplier_name']; ?></option>
    <?php endwhile; ?>
    </select>

								  </br>
</br>
								  
</td>
<tr>
<td align="center">
<div id='start_order_currency_errorloc' class="error_strings"></div>
Select Customer
<select name="customer_id" id="customer_id">
	<option value="0">Select Customer.............</option>
    <?php 
	$query_parent2 = mysql_query("select * FROM customer order by customer_name asc") or die("Query failed: ".mysql_error());
	while($row2 = mysql_fetch_array($query_parent2)): ?>
    <option value="<?php echo $row2['customer_id']; ?>"><?php echo $row2['customer_name']; ?></option>
    <?php endwhile; ?>
    </select>
							   </br>
</br>
<!--<div id='start_order_curr_rate_errorloc' class="error_strings"></div>
Exchange Rate : <input type="textbox" size="10" name="curr_rate">
<div id='start_order_ship_agency_errorloc' class="error_strings"></div>
Shipping Agent
<select name="ship_agency" style="150px;"><option value="0">Select..............................</option>
								  <?php
								  
								  $query1="select * from shippers";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->shipper_id; ?>"><?php echo $rows1->shipper_name; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
								  
								  
								  
								  
								  
								  ?>
								  
								  </select>
								  <a href="add_ship.php?newsup=newsup">New Shipping Agent</a>-->


</td>


</tr>	



<tr>
<td align="center" valign="top">
Comments
<textarea name="comments" cols="30" rows="5"></textarea>
</td>


</tr>							  
								  
								  
								  
								  
								  
								  
								  
								  
								  
								  
								  
								  
</td></tr>





</table>



</td>




<td valign="top"><td valign="top" height="200" width="60%">
<table width="100%" border="0" class="table">
<tr bgcolor="#2E3192"><td colspan="2"  align="center"><img src="images/customer_icon.png" align="left" width="20" height="20"><strong><font color="#ffffff">Items Details</strong></td></tr>
<!--<tr><td>Task Name/Description</td><td>Add More..</td></tr>-->
<tr class="txtMult"><td align="center">

 
  <div id="tabContainer">
    <div id="tabs">
      <ul>
        <li id="tabHeader_1">Items</li>
        <li id="tabHeader_2">Expenses</li>
       <!-- <li id="tabHeader_3">Page 3</li>-->
      </ul>
    </div>
    <div id="tabscontent">
      <div class="tabpage" id="tabpage_1">
        <h2>Items</h2>
       <table border="0" width="100%" align="center">	
<tr bgcolor="#ccc" height="30" >
<td></td>
<td align="center"><strong>Item Name</strong></td>
<td align="center"><strong>Quantity Order</strong></td>

</tr>
	
								  
<?php 
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





			  
									  ?>
									  
									  

<td><input type="checkbox"  hidden


checked 


name="prod[]" value="<?php echo $rows1->item_id; ?>"></td>
<td align=""><?php echo $rows1->item_name; ?></td>

<td align=""><input type="text" name="qnty_rec[]" 
<?php 
if ($quant_bal==0)
{?>
readonly 
<?php }
else
{
 }?>

value="<?php echo $quant_bal?>"></td>

</tr>

							  
	<?php 
$ttl_quant=$ttl_quant+$quantity;
	
	
	}
	
	 $ttl_quant;
	
	?>
	
<input type="hidden" name="qnty_rec[]" value="<?php echo $ttl_quant; ?>"> 	
	<?php
	
									  
									  
									  }
								  
								  
								  
								  
								  
								  ?>							  
								  
								  
</table>	
      </div>
	  
	 
      <div  id="tabpage_2">
        <h2>Expenses</h2>
   <table border="0" width="100%" align="center">	
<tr bgcolor="#ccc" height="30" >
<td></td>
<td align="center"><strong>Account</strong></td>
<td align="center"><strong>Amount</strong></td>

</tr>
<tr bgcolor="#FFFFCC" height="30" >
<td></td>
<td align="center">

<select name="account_id[]" style="width:150px;">
<option value="0">Select..............................</option>
<?php
$query1="select * from account order by account_name asc";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								 
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->account_id; ?>"><?php echo $rows1->account_name; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }



?>
</td>
<td align="center"><strong><input type="text" size="20" name="amount[]"></strong></td>

</tr>
</table>			
      </div>
     
    </div>
  </div>


</td></tr>


</table>

<!--<table width="100%" border="0" class="table">
<tr bgcolor="#2E3192"><td colspan="2"  align="center"><img src="images/vehicle.png" align="left" width="30" height="20"><strong><font color="#ffffff">Vehicle Description</strong></td></tr>
<tr><td>Task Name/Description</td><td>Add More..</td></tr>
<tr><td align="center" colspan="2">
Vehicle Description / More Information On the Vehicle</br>
<textarea name="remarks" rows="5" cols="50"></textarea>



</td></tr>


</table>-->

</td></td>


</tr>

<tr height="30" bgcolor="#FFFFCC"><td colspan="10" align="center">
<input type="submitttt" name="submittttt" onClick="return confirmSave();" value="Save LPO Details" style="background:#2E3192; font-size:14px; color:#ffffff; font-weight:bold; width:300px; height:30px; border-radius:5px;">
	</td></tr>
<?php 
}
?>	

</table>

</form>
<?php 
	}
	
	?>
<?php
if ($order_code!=0)
{

}

else
{
 ?>

<script type="text/javascript">
  Calendar.setup(
    {
      inputField  : "date_from",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "date_from"       // ID of the button
    }
  );
  
  
  
  
  </script>
  
  <?php 
  
  }
  
  ?>
<script language="JavaScript" type="text/javascript"
    xml:space="preserve">//<![CDATA[
//You should create the validator only after the definition of the HTML form
  var frmvalidator  = new Validator("start_order");
    frmvalidator.EnableOnPageErrorDisplay();
    frmvalidator.EnableMsgsTogether();
	

 frmvalidator.addValidation("shop_id","dontselect=0",">>Please select account");
 frmvalidator.addValidation("date_from","req",">>Please enter date");
 frmvalidator.addValidation("sup","dontselect=0",">>Please select supplier");
 frmvalidator.addValidation("currency","dontselect=0",">>Please select currency");
 frmvalidator.addValidation("curr_rate","req",">>Please enter exchange rate");
 frmvalidator.addValidation("ship_agency","dontselect=0",">>Please select shipping Agent");
 frmvalidator.addValidation("mop","dontselect=0",">>Please terms of payment");
 frmvalidator.addValidation("prod[]","dontselect=0",">>Please select atleast on item");
 frmvalidator.addValidation("qnty[]","req",">>Please enter quantity");
 frmvalidator.addValidation("vend_price[]","req",">>Please enter price");
 

  
//]]></script>		
			
			
			
	 <script src="js/tabs_old.js"></script>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-1332079-8']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>		
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
		
			
			
			
					
			  </div>
				
				<!--<div id="cont-right" class="br-5">
					
				</div>-->
			
			
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