<?php 
include('includes/session.php');
include('Connections/fundmaster.php');
include ('functions.php'); 
include ('edit_form.php'); 
$order_code_id=$_GET['order_code'];
$invoice_id=$_GET['invoice_id'];
$job_card_id=$_GET['job_card_id'];
$invoice_item_id=$_GET['invoice_item_id'];
//$convert=$_GET['convert'];

$sqlfr="select * from freight_charges where order_code_id='$order_code_id'";
$resultsfr= mysql_query($sqlfr) or die ("Error $sqlfr.".mysql_error());
$rowsfr=mysql_fetch_object($resultsfr);



?>
<form name="new_machine_category" action="process_edit_freight_cost.php" method="post">			
<table width="100%" border="0" class="table1" id="tbl1">

  
	<input type="hidden" size="41" name="order_code" value="<?php echo $order_code_id;?>">
	<input type="hidden" size="41" name="job_card_id" value="<?php echo $job_card_id;?>">
	<input type="hidden" size="41" name="booking_id" value="<?php echo $booking_id;?>">
	<input type="hidden" size="41" name="invoice_item_id" value="<?php echo $invoice_item_id;?>">
	<input type="hidden" size="41" name="convert" value="<?php echo $convert;?>">

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
	

	<td colspan="2"><strong>Freight Cost Details </strong></td>  
  </tr>
 <!-- <tr style="background:url(images/description.gif);" height="20" >
	<td width="100" align="right"><strong>Items/ Part : </strong></td>
	<td width="100"><select name="part_id"><option value="<?php echo  $rows->item_id;?>"><?php echo $rows->item_name.' ('.$rows->item_code.')';?></option><?php $query1="select * from items order by item_name asc"; $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error()); if (mysql_num_rows($results1)>0) {while ($rows1=mysql_fetch_object($results1)) { ?>	<option value="<?php echo $rows1->item_id;?>"><?php echo $rows1->item_name.' ('.$rows1->item_code.')'; ?> </option><?php  }}?></select></td>

  </tr>-->
  <tr style="background:url(images/description.gif);" height="20" >
	<td width="100" align="right"><strong>Freight Charges : </strong></td>
	<td width="100"><strong><input type="text" name="freight_cost" value="<?php echo $rowsfr->freight_charge_amount;?>" size="50"></strong></td>

  </tr>
  
  <!--<tr style="background:url(images/description.gif);" height="20" >
	<td width="100" align="right"><strong>Price : </strong></td>
	<td width="100"><strong><input type="text" name="price" value="<?php echo $rows->curr_sp;?>" size="50"></strong></td>

  </tr>-->
	
	
	
  
  
  
  <tr height="40">
    <td align="center" colspan="2"><input type="submit" name="submit" value="Update">
	<input type="hidden" name="edit_set_template" id="edit_set_template" value="1">&nbsp;&nbsp;<input type="reset" value="Cancel"></td>    
  </tr>
 
</table>


</form>



			
			
			
			