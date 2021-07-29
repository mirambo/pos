<?php 
include('includes/session.php');
include('Connections/fundmaster.php');
include ('functions.php'); 
include ('edit_form.php'); 
$requisition_item_id=$_GET['requisition_item_id'];
$requisition_id=$_GET['requisition_id'];

$sql="SELECT * from requisition_item,items where requisition_item.item_id=items.item_id 
AND requisition_item.requisition_item_id='$requisition_item_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
$rows=mysql_fetch_object($results);



?>
<script type="text/javascript"> 

function confirmDelete()
{
    return confirm("Are you sure want to save changes?");
}
</script>
<form name="new_machine_category" action="process_edit_requisition_item.php" method="post">			
<table width="100%" border="1" class="table1" id="tbl1">

  
	<input type="hidden" size="41" name="requisition_id" value="<?php echo $requisition_id;?>">
	<input type="hidden" size="41" name="requisition_item_id" value="<?php echo $requisition_item_id;?>">

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
	

	<td colspan="2"><strong>Parts Detail </strong></td>  
  </tr>
  <tr style="background:url(images/description.gif);" height="20" >
	<td width="100" align="right"><strong>Items: </strong></td>
	<td width="100"><select name="part_id"><option value="<?php echo  $rows->item_id;?>"><?php echo $rows->item_name.' ('.$rows->item_code.')';?></option><?php $query1="select * from items order by item_name asc"; $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error()); if (mysql_num_rows($results1)>0) {while ($rows1=mysql_fetch_object($results1)) { ?>	<option value="<?php echo $rows1->item_id;?>"><?php echo $rows1->item_name.' ('.$rows1->item_code.')'; ?> </option><?php  }}?></select></td>

  </tr>
  <tr style="background:url(images/description.gif);" height="20" >
	<td width="100" align="right"><strong>Quantity : </strong></td>
	<td width="100"><strong><input type="text" name="item_quantity" value="<?php echo $rows->item_quantity;?>" size="50"></strong></td>

  </tr>
  
    <tr style="background:url(images/description.gif);" height="20" >
	<td width="100" align="right"><strong>Value : </strong></td>
	<td width="100"><strong><input type="text" name="item_value" value="<?php echo $rows->item_value;?>" size="50"></strong></td>

  </tr>
  
	
	
	
  
  
  
  <tr height="40">
    <td align="center" colspan="2"><input onClick="return confirmDelete();" type="submit" name="submit" value="Update">
	<input type="hidden" name="edit_set_template" id="edit_set_template" value="1">&nbsp;&nbsp;<input type="reset" value="Cancel"></td>    
  </tr>
 
</table>


</form>



			
			
			
			