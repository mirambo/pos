<?php 
include('includes/session.php');
include('Connections/fundmaster.php');
include ('functions.php'); 
include ('edit_form.php'); 
$booking_id=$_GET['booking_id'];
$job_card_id=$_GET['job_card_id'];
$customer_item_id=$_GET['customer_item_id'];

$sql="SELECT * from customer_item where customer_item_id='$customer_item_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
$rows=mysql_fetch_object($results);



?>
<form name="new_machine_category" action="process_edit_customer_item.php" method="post">			
<table width="100%" border="1" class="table1" id="tbl1">

  
	<input type="hidden" size="41" name="job_card_id" value="<?php echo $job_card_id;?>">
	<input type="hidden" size="41" name="booking_id" value="<?php echo $booking_id;?>">
	<input type="hidden" size="41" name="customer_item_id" value="<?php echo $customer_item_id;?>">

	<td colspan="2" height="30"><?php

if ($_GET['addbenefitsconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#339900 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#339900" >Benefit Type Added Successfully!!</font></strong></p></div>';
?>

<?php

if ($_GET['recordexist']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! the record exist</font></strong></p></div>';
?></td>
    </tr>

	
	<tr  align="center">	
	

	<td colspan="2"><strong>Customer Belongings Details </strong></td>  
  </tr>
  <tr style="background:url(images/description.gif);" height="20" >
	<td width="100" align="right"><strong>Item Name : </strong></td>
	<td width="100"><strong><input type="text" name="customer_item_name" value="<?php echo $rows->customer_item_name;?>" size="50"></strong></td>

  </tr>
  
	
	
	
  
  
  
  <tr height="40">
    <td align="center" colspan="2"><input type="submit" name="submit" value="Update">
&nbsp;&nbsp;<input type="reset" value="Cancel"></td>    
  </tr>
 
</table>


</form>



			
			
			
			