<?php 
include('includes/session.php');
include('Connections/fundmaster.php');
include ('functions.php'); 
include ('edit_form.php'); 
$estimates_id=$_GET['estimates_id'];
$booking_id=$_GET['booking_id'];

$activ=$_GET['activ'];

$sql="SELECT estimates.curr_sp,estimates.item_id,estimates.quantity,estimates.discout,estimates.vat,estimates.estimates_id,
items.item_name,items.item_code FROM estimates,items where estimates.item_id=items.item_id AND estimates.estimates_id='$estimates_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
$rows=mysql_fetch_object($results);



?>
<form name="new_machine_category" action="process_edit_estimates.php" method="post">			
<table width="100%" border="0" class="table1" id="tbl1">
  <tr>
    <td width="18%">
	<input type="hidden" size="41" name="estimates_id" value="<?php echo $estimates_id?>">
	<input type="hidden" size="41" name="booking_id" value="<?php echo $booking_id?>">
	<input type="hidden" size="41" name="cc_id" value="<?php echo $cc_id?>">
	<input type="hidden" size="41" name="sub_project_id" value="<?php echo $sub_project_id?>"></td>
	<input type="hidden" size="41" name="activ" value="<?php echo $activ?>"></td>
	<td colspan="3" height="30"><?php

if ($_GET['addbenefitsconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#339900 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#339900" >Benefit Type Added Successfully!!</font></strong></p></div>';
?>

<?php

if ($_GET['recordexist']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! the record exist</font></strong></p></div>';
?></td>
    </tr>

	
	<tr  align="center" bgcolor="#ff0000" height="30">	
	

	<td colspan="10"><strong>Update Estimates Details </strong></td>  
  </tr>
 <tr height="50" bgcolor="#FFFFCC">
<td><strong>Select Part</strong></td>
<td>


<select name="item_id"><option value="<?php echo $rows->item_id;?>"><?php echo $rows->item_name;?></option>
								  <?php
								  
								  $query1="select * from items order by item_name asc";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->item_id; ?>"><?php echo $rows1->item_name; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
									  
									  
								  
								  
								  
								  
								  
								  ?></select></td>
<td><strong>Enter Quantity</strong></td>
<td>

<input type="text" size="11" name="quantity" value="<?php echo $rows->quantity;?>"></td>
<td>
<strong>Unit Price(Kshs)</strong>
<input type="text" size="11" name="curr_sp" value="<?php echo $rows->curr_sp;?>"></td>
<td><strong>Apply VAT?</strong></td>
<td><?php  $vat_val=$rows->vat; 
	if ($vat_val!=0)
        {
	?>
      <input type="radio" name="vat" value="1" checked>Yes
	  <input type="radio" name="vat" value="0">No
	  <?php 
	  }
	  else
	  {?>
	  
	  <input type="radio" name="vat" value="1">Yes
	  <input type="radio" name="vat" value="0" checked>No
	  
	  <?php 
	  }
	  
	  ?></td>
<td><strong>Discount(%)</strong></td>
<td><input type="text" name="discount" size="11" value="<?php echo $rows->discout;?>"></td>
</tr>

  <tr height="40" align="center">
    <td colspan="10"><input type="submit" name="submit" value="Update"><input type="reset" value="Cancel"></td>
    
  </tr>
 
</table>


</form>



			
			
			
			