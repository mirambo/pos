<?php
include('Connections/fundmaster.php');
$order_code=$_GET['order_code'];
$purchase_order_id=$_GET['purchase_order_id'];
$view=$_GET['view'];
$approved=$_GET['approved'];
$sqltemp="select * FROM requisition_item,items WHERE requisition_item.item_id=items.item_id AND 
requisition_item.requisition_item_id='$purchase_order_id'";
$resultstemp=mysql_query($sqltemp) or die ("Error : $sqltemp.".mysql_error());
$rowstemp=mysql_fetch_object($resultstemp);


////////////////////////prevent issuee requsition from adjustments
$sqlrec3="select COUNT(*) as ttl_req FROM requisition_item WHERE requisition_id='$order_code'";
$resultsrec3= mysql_query($sqlrec3) or die ("Error $sqlrec3.".mysql_error());	
$rowsrec3=mysql_fetch_object($resultsrec3);

$ttl_req=$rowsrec3->ttl_req;



$sqlrec4="select COUNT(*) as ttl_issue FROM issued_items WHERE requisition_id='$order_code'";
$resultsrec4= mysql_query($sqlrec4) or die ("Error $sqlrec4.".mysql_error());	
$rowsrec4=mysql_fetch_object($resultsrec4);

$ttl_issue=$rowsrec4->ttl_issue;

if ($ttl_reqtttttttttt!=$ttl_issuetttttttttt)
{
?>

 <script language="Javascript">

 function redirectToFB(){
            window.opener.location.href="create_requisition.php?order_code=<?php echo $order_code; ?>";
            setTimeout("self.close()", 100);
        }

    </script>


	</br></br>
<p align="center" style="height:50px;" ><input type="submit" name="submit" onClick="return redirectToFB();" value="SORRY!! THIS REQUISITION HAS BEEN ISSUED IT CANNOT BE ADJUSTED"  style="background:#ff0000; top:50px; font-size:14px; color:#ffffff; font-weight:bold; width:auto; height:30px; border-radius:5px;"></p>
</BR>
<p align="center" style="height:50px;" >
<input type="submit" name="submit" onClick="return redirectToFB();" value="OK"  style="background:#2E3192; top:50px; font-size:14px; color:#ffffff; font-weight:bold; width:150px; height:30px; border-radius:5px;">



<?php	
	
}

else
{






if (isset($_POST['submit']))
{
$order_code=mysql_real_escape_string($_POST['order_code']);
$purchase_order_id2=mysql_real_escape_string($_POST['purchase_order_id2']);

?>
 <script language="Javascript">

        function redirectToFB(){
            window.opener.location.href="create_requisition.php?order_code=<?php echo $order_code; ?>";
            self.close();
        }

    </script>
<?php
//echo "cliecked";
//$order_code=mysql_real_escape_string($_POST['order_code']);

	
$item_name=mysql_real_escape_string($_POST['countryname']);
$prod2=mysql_real_escape_string($_POST['country_no']);

$qnty=mysql_real_escape_string($_POST['phone_code']);
$vend_price=mysql_real_escape_string($_POST['country_code']);

$sql= "update requisition_item set item_id='$prod2',item_quantity='$qnty',item_value='$vend_price' 
where requisition_item_id='$purchase_order_id2'";
$results=mysql_query($sql) or die ("Error $sql.".mysql_error());

//header ("Location:begin_order.php?order_code=$order_code&addpartconfirm=1");

if ($results)
{ ?>
<script>
redirectToFB();
</script>
<?php
}
}
else
{

?>

<link rel="stylesheet" type="text/css" href="style.css" />    
<link rel="stylesheet" type="text/css" href="css/jquery-ui.min.css" />    
	<script type="text/javascript" src="jquery-2.1.1.min.js"></script>
	<script type="text/javascript" src="js/jquery-ui.min.js"></script>
<!--<form name="new_machine_category" action="process_add_lpo_item.php" onsubmit="return closeSelf(this);" method="post">-->	
<form name="new_machine_category" action="<?php echo $_SERVER['PHP_SELF']; ?>" onsubmit="return closeSelf(this);" method="post">	


  
	<input type="hidden" size="41" name="order_code" value="<?php echo $order_code;?>">
	<input type="hidden" size="41" name="purchase_order_id2" value="<?php echo $purchase_order_id;?>">
	<input type="hidden" size="41" name="booking_id" value="<?php echo $booking_id;?>">

<table width="80%" border="1" class="table" style="margin:auto;">
<tr bgcolor="#2E3192"><td colspan="5"  align="center"><img src="images/customer_icon.png" align="left" width="20" height="20"><strong><font color="#ffffff">Items Details</strong></td></tr>

							<tr>
							    <th><input class='check_all' type='checkbox' onclick="select_all()"/></th>
							    <!--<th>S. No</th>-->
							    <th>Item Name</th>
							 
							    <th>Enter Quantity</th>
							    <th>Price</th>
							</tr>
							<tr>
						    	<td><input type='checkbox' class='case'/></td>
						    	<!--<td><span id='snum'>1.</span></td>-->
						   	 	<td align="center"><input class="form-control" style='height:30px; border-radius:5px;' size="60" type='text' id='countryname_1' name='countryname' value="<?php echo $rowstemp->item_name; ?>"/></td>
						    	
						    	<td align="center">
								<input class="form-control" type='hidden' id='country_no_1' name='country_no' value="<?php echo $rowstemp->item_id; ?>"/>
								<input class="form-control" type='text'  style='height:30px; border-radius:5px;' name='phone_code' value="<?php echo $rowstemp->item_quantity; ?>"/>
								
								</td>
						    	<td align="center"><input class="form-control" type='text' style='height:30px; border-radius:5px;' name='country_code' value="<?php echo $rowstemp->item_value; ?>"/> </td>
						  	</tr>
						
				</table>
					
					  	<!--<div style="margin:auto; width:100%; background:;"><button style="margin-left:270px;" type="button" class='btn btn-danger delete'>- Delete</button>
						<button type="button"  class='btn btn-success addmore'>+ Add More</button></div>-->
					











<p align="center"><input type="submit" name="submit" value="Update Items"  style="background:#2E3192; font-size:14px; color:#ffffff; font-weight:bold; width:300px; height:30px; border-radius:5px;"></p>

	


</form>

 <script src="js/auto.js"></script>
	<?php 
} }
	
	?>