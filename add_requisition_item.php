<?php
include('Connections/fundmaster.php');
$order_code=$_GET['order_code'];


////////////////////////prevent issuee requsition from adjustments
$sqlrec3="select COUNT(*) as ttl_req FROM requisition_item WHERE requisition_id='$order_code'";
$resultsrec3= mysql_query($sqlrec3) or die ("Error $sqlrec3.".mysql_error());	
$rowsrec3=mysql_fetch_object($resultsrec3);

$ttl_req=$rowsrec3->ttl_req;



$sqlrec4="select COUNT(*) as ttl_issue FROM issued_items WHERE requisition_id='$order_code'";
$resultsrec4= mysql_query($sqlrec4) or die ("Error $sqlrec4.".mysql_error());	
$rowsrec4=mysql_fetch_object($resultsrec4);

$ttl_issue=$rowsrec4->ttl_issue;


if ($ttl_reqyyyyyyyyy!=$ttl_issueyyyyyyyyyyy)
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

?>
 <script language="Javascript">

        function redirectToFB(){
            window.opener.location.href="create_requisition.php?order_code=<?php echo $order_code; ?>";
            self.close();
        }

    </script>
<?php
//echo "cliecked";


	
foreach($_POST['countryname'] as $row=>$CountryName)
{
	
$prod=mysql_real_escape_string($_POST['country_no'][$row]);
$qnty=mysql_real_escape_string($_POST['country_code'][$row]);
$vend_price=mysql_real_escape_string($_POST['phone_code'][$row]);

$sql= "INSERT INTO requisition_item SET
requisition_id='$order_code',
item_id='$prod',
item_quantity='$qnty',
item_value='$vend_price',
requisition_item_status='0'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}


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

    <link rel="stylesheet" type="text/css" href="css/jquery-ui.min.css" />    
    <link rel="stylesheet" type="text/css" href="style.css" />    
	<script type="text/javascript" src="jquery-2.1.1.min.js"></script>
	<script type="text/javascript" src="js/jquery-ui.min.js"></script>
<!--<form name="new_machine_category" action="process_add_lpo_item.php" onsubmit="return closeSelf(this);" method="post">-->	
<form name="new_machine_category" action="<?php echo $_SERVER['PHP_SELF']; ?>" onsubmit="return closeSelf(this);" method="post">	


  
	<input type="hidden" size="41" name="order_code" value="<?php echo $order_code;?>">
	<input type="hidden" size="41" name="purchase_order_id2" value="<?php echo $purchase_order_id;?>">
	<input type="hidden" size="41" name="booking_id" value="<?php echo $booking_id;?>">

<table width="80%" border="1" class="table" style="margin:auto;">
<tr bgcolor="#2E3192"><td colspan="5"  align="center"><img src="images/customer_icon.png" align="left" width="20" height="20"><strong><font color="#ffffff">Items Details</strong></td></tr>

							<tr bgcolor="#2E3192">
							    <th><input class='check_all' type='checkbox' onclick="select_all()"/></th>
							    
							    <th><font color="#fff">Item Name</font></th>
							
							    <th><font color="#fff">Price</font></th>
							    <th><font color="#fff">Quantity</font></th>
							</tr>
							<tr>
						    	<td><input type='checkbox' class='case'/></td>
						    	<!--<td><span id='snum'>1.</span></td>-->
						   	 	<td align="center"><input class="form-control" type='text' id='countryname_1' size="60" style="height:30px; border-radius:5px;" name='countryname[]'/></td>
						    	
						    	<td align="center">
								<input class="form-control" type='hidden' id='country_no_1' name='country_no[]'/>
								
								<input class="form-control" type='text' style="height:30px; border-radius:5px;" id='phone_code_1' name='phone_code[]'/>
								
								</td>
						    	<td align="center"><input class="form-control" type='text'  style="height:30px; border-radius:5px;" name='country_code[]'/> </td>
						  	</tr>
						
				</table>
<div style="margin; width:100%; background:;">

<button style="margin-left:270px;" type="button" class='btn btn-danger delete'>- Delete</button>
						<button type="button"  class='btn btn-success addmore'>+ Add More</button></div>
					


<p align="center"><input type="submit" name="submit" value="Update Items"  style="background:#2E3192; font-size:14px; color:#ffffff; font-weight:bold; width:300px; height:30px; border-radius:5px;"></p>

	


</form>

 <script src="js/auto_requisition.js"></script>
	<?php 
	}
}
	?>