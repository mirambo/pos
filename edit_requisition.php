<?php 
include('includes/session.php');
include('Connections/fundmaster.php');
include ('functions.php'); 
include ('edit_form.php'); 
$booking_id=$_GET['booking_id'];
$requisition_id=$_GET['requisition_id'];
$requisition_item_id=$_GET['requisition_item_id'];

$sql="SELECT * from requisition WHERE requisition_id='$requisition_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
$rows=mysql_fetch_object($results);



?>
<script type="text/javascript"> 

function confirmDelete()
{
    return confirm("Are you sure want to save changes?");
}
</script>
<form name="new_machine_category" action="process_edit_requisition.php" method="post">			
<table width="100%" border="1" class="table1" id="tbl1">

  
	<input type="hidden" size="41" name="requisition_id" value="<?php echo $requisition_id;?>">
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
	

	<td colspan="2"><strong>Cost Of Production Detail </strong></td>  
  </tr>
  <tr style="background:url(images/description.gif);" height="20" >
	<td width="100" align="right"><strong>Cost Of Production Date : </strong></td>
	<td width="100"><input type="text" name="start_date" value="<?php echo $rows->requisition_date;?>" size="50"></strong></td>

  </tr>
    

  </tr>
  <tr style="background:url(images/description.gif) repeat x;" height="20" >
	<td width="100" align="right"><strong>Remarks : </strong></td>
	<td width="100"><textarea name="remarks" rows="5" cols="100"><?php echo $rows->remarks;?></textarea></td>

  </tr>
  
	
	
	
  
  
  
  <tr height="40">
    <td align="center" colspan="2"><input onClick="return confirmDelete();" type="submit" name="submit" value="Update">
	<input type="hidden" name="edit_set_template" id="edit_set_template" value="1">&nbsp;&nbsp;<input type="reset" value="Cancel"></td>    
  </tr>
 
</table>


</form>



			
			
			
			