<?php 
include('includes/session.php');
include('Connections/fundmaster.php');
include ('functions.php'); 
include ('edit_form.php'); 
$order_code=$_GET['order_code'];
$quotation_id=$_GET['quotation_id'];
$convert=$_GET['convert'];



?>
<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>
<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>
<form name="new_supplier" action="process_create_lpo_item.php" method="post">			
<table width="100%" border="1" class="table1" id="tbl1">

  
	<input type="hidden" size="41" name="order_code" value="<?php echo $order_code;?>">
	<input type="hidden" size="41" name="booking_id" value="<?php echo $booking_id;?>">
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
	

	<td colspan="2"><strong>Items Detail </strong></td>  
  </tr>
  <tr style="background:url(images/description.gif);" height="20" >
	<td width="100" align="right"><strong>Select Item Category: </strong></td>
	<td width="100"><select name="cat_id" style="width:200px;"><option value="0">Select Item..........................</option><?php $query1="select * from items_category order by cat_name asc"; $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error()); if (mysql_num_rows($results1)>0) {while ($rows1=mysql_fetch_object($results1)) { ?>	<option value="<?php echo $rows1->cat_id;?>"><?php echo $rows1->cat_name; ?> </option><?php  }}?></select></td>
<td width="40%" rowspan="6" valign="top"><div id='new_supplier_errorloc' class='error_strings'></div></td>
  </tr>
   <tr height="20">

    <td width="19%" align="right"><strong>Enter Item Name<font color="#FF0000">*</font></td>
    <td width="23%"><input type="text" size="41" name="item_name"></td>
   
  </tr> 
  <tr height="20">

    <td width="19%" align="right"><strong>Enter Item Code<font color="#FF0000"></font></td>
    <td width="23%"><input type="text" size="41" name="item_code"></td>
  
  </tr> 
  <tr style="background:url(images/description.gif);" height="20" >
	<td width="100" align="right"><strong>Quantity : </strong></td>
	<td width="100"><strong><input type="text" name="item_quantity" size="50"></strong></td>

  </tr>
  
   <tr height="20">

    <td width="19%" align="right"><strong>Item Value (Buying Price)<font color="#FF0000">*</font></td>
    <td width="23%"><input type="text" size="41" name="item_value"></td>
    
  </tr> 
  
<tr height="20">
    <td width="19%" align="right"><strong>Item Selling Price<font color="#FF0000">*</font></td>
    <td width="23%"><input type="text" size="41" name="item_sp"></td>
    
  </tr> 
  
  
	
	
	
  
  
  
  <tr height="40">
    <td align="center" colspan="2"><input type="submit" name="submit" value="Create">
	<input type="hidden" name="edit_set_template" id="edit_set_template" value="1">&nbsp;&nbsp;<input type="reset" value="Cancel"></td>    
  </tr>
 
</table>


</form>

<SCRIPT language="JavaScript">
 var frmvalidator  = new Validator("new_supplier");
 frmvalidator.EnableOnPageErrorDisplaySingleBox();
 frmvalidator.EnableMsgsTogether();
 frmvalidator.addValidation("cat_id","dontselect=0",">>Please select item category");
 frmvalidator.addValidation("item_name","req",">>Please enter item name");
 frmvalidator.addValidation("item_code","req",">>Please enter item code");
 frmvalidator.addValidation("item_value","req",">>Please enter item buying price");
 frmvalidator.addValidation("item_sp","req",">>Please enter item selling price");

  </SCRIPT>

			
			
			
			