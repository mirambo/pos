<?php 
include('includes/session.php');
include('Connections/fundmaster.php');
include ('functions.php'); 
include ('edit_form.php'); 
$sales_id=$_GET['sales_id'];
$job_card_id=$_GET['job_card_id'];




?>

<form name="new_machine_category" action="process_add_more_item.php" method="post">			
<table width="100%" border="1" class="table1" id="tbl1">

  
	<input type="hidden" size="41" name="sales_id" value="<?php echo $sales_id;?>">
	<input type="hidden" size="41" name="booking_id" value="<?php echo $booking_id;?>">


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
	

	<td colspan="2"><strong>Items Detail </strong></td>  
  </tr>
  <tr style="background:url(images/description.gif);" height="20" >
	<td width="100" align="right"><strong>Items: </strong></td>
	<td width="100"><select name="part_id" style="width:200px;"><option value="0">Select Item..........................</option><?php $query1="select * from items order by item_name asc"; $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error()); if (mysql_num_rows($results1)>0) {while ($rows1=mysql_fetch_object($results1)) { ?>	<option value="<?php echo $rows1->item_id;?>"><?php echo $rows1->item_name.' ('.$rows1->item_code.')'; ?> </option><?php  }}?></select>
<!--	<a rel="facebox" href="create_new_itemj.php?booking_id=<?php echo $booking_id ?>&job_card_id=<?php echo $job_card_id; ?>">Create New Items</a>
-->	
	</td>

  </tr>
  <tr style="background:url(images/description.gif);" height="20" >
	<td width="100" align="right"><strong>Quantity : </strong></td>
	<td width="100"><strong><input type="text" name="item_quantity" size="50"></strong></td>

  </tr>
  
  <tr style="background:url(images/description.gif);" height="20" >
	<td width="100" align="right"><strong>Price : </strong></td>
	<td width="100"><strong><input type="text" name="price" size="50"></strong></td>

  </tr>
  
	
	
	
  
  
  
  <tr height="40">
    <td align="center" colspan="2"><input type="submit" name="submit" value="Update">
	<input type="hidden" name="edit_set_template" id="edit_set_template" value="1">&nbsp;&nbsp;<input type="reset" value="Cancel"></td>    
  </tr>
 
</table>


</form>



			
			
			
			