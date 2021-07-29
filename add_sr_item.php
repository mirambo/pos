<?php 
include('includes/session.php');
include('Connections/fundmaster.php');
include ('functions.php'); 
include ('edit_form.php'); 
$booking_id=$_GET['booking_id'];
$order_code=$_GET['order_code'];

?>
<script type="text/javascript"> 
function confirmEdit()
{
    return confirm("Are you sure want to save changes");
}
</script>
<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>
<form name="new_machine_category" action="process_add_sr_item.php" method="post">			
<table width="100%" border="1" class="table1" id="tbl1">

  
	<input type="hidden" size="41" name="order_code" value="<?php echo $order_code;?>">
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
	<td rowspan="8"><div id='new_machine_category_errorloc' class='error_strings'></div></td>

  </tr>
  <tr style="background:url(images/description.gif);" height="20" >
	<td width="100" align="right"><strong>Items : </strong></td>
	<td width="100"><select name="part_id" style="width:200px;"><option value="0">Select Item..........................</option><?php $query1="select * from items order by item_name asc"; $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error()); if (mysql_num_rows($results1)>0) {while ($rows1=mysql_fetch_object($results1)) { ?>	<option value="<?php echo $rows1->item_id;?>"><?php echo $rows1->item_name.' ('.$rows1->item_code.')'; ?> </option><?php  }}?></select>
	
	
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
    <td align="center" colspan="2"><input type="submit" onClick="return confirmEdit();" name="submit" value="Update">
	<input type="hidden" name="edit_set_template" id="edit_set_template" value="1">&nbsp;&nbsp;<input type="reset" value="Cancel"></td>    
  </tr>
 
</table>


</form>

<SCRIPT language="JavaScript">
 var frmvalidator  = new Validator("new_machine_category");
 frmvalidator.EnableOnPageErrorDisplaySingleBox();
 frmvalidator.EnableMsgsTogether();
 //frmvalidator.addValidation("prod_cat","dontselect=0","Please select product category");
 frmvalidator.addValidation("part_id","dontselect=0",">>Please select product");
 //frmvalidator.addValidation("prod_code","req","Please enter product code");
 frmvalidator.addValidation("item_quantity","req",">>Please enter quantity");
 frmvalidator.addValidation("price","req",">>Please enter item value price");
 

</SCRIPT>



			
			
			
			