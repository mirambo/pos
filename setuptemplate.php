 <?php
if (isset($_POST['edit_item']))
{
edit_set_template($item_name,$reorder_level,$item_value,$item_sp,$item_desc,$user_id);
}

$item_id=$_GET['item_id'];
$sql="SELECT * FROM items,items_category WHERE items.cat_id=items_category.cat_id AND items.item_id='$item_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
$rows=mysql_fetch_object($results);

$sub_cat_id=$rows->sub_cat_id;
 $query_valc = mysql_query("SELECT sub_cat_name FROM items_sub_category WHERE sub_cat_id ='$sub_cat_id'");
$row_valc = mysql_fetch_array($query_valc);
 $sub_cat_name=$row_valc['sub_cat_name']; 
 
 
$account_type_id=$rows->account_type_id;
 $query_valc2 = mysql_query("SELECT * FROM account_type WHERE account_type_id ='$account_type_id'");
$row_valc2 = mysql_fetch_array($query_valc2);
 $account_type_name=$row_valc2['account_type_name'];  
 $account_code=$row_valc2['account_code'];  
 
 

 ?>
<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>
<script type="text/javascript" src="calender/calendar.js"></script>
<script type="text/javascript" src="calender/lang/calendar-en.js"></script>
<script type="text/javascript" src="calender/calendar-setup.js"></script>

<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>

<style type="text/css">

@import url(calender/calendar-win2k-1.css);

</style>
<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
table1
{
border-collapse:collapse;
}
.table1 td, tr
{
border:1px solid black;
padding:3px;
}

.table
{
border-collapse:collapse;
}

.table td, tr
{
border:1px solid black;
font-size:12px;
</Style>

<script type="text/javascript" src="jquery-1.3.2.min.js"></script>
<!--<script type="text/javascript" src="jquery-1.8.3.js"></script>-->

<script src="js/jquery-1.10.2.min.js"></script>	
		<script src="js/jquery-ui-1.10.3.custom.min.js"></script>
		<script src="js/bootstrap.min.js"></script>	
		<link rel="stylesheet" href="css/jquery-ui-1.10.3.custom.min.css" />
<script type="text/javascript">
    $(document).ready(function() {
     
    $("#customer_id").change(function() {
    //$(this).after('<div id="loader"><img src="loader.gif" alt="loading subcategory" /></div>');
    $.get('load_sub_cat.php?customer_id=' + $(this).val(), function(data) {
    $("#invoice_area").html(data);
       $('#loader').slideUp(200, function() {
    $(this).remove();
    });
    });
    });
	
	
	
	
	$("#invoice_area").change(function() {
    //$(this).after('<div id="loader"><img src="loader.gif" alt="loading subcategory" /></div>');
    $.get('client_inv_bal.php?invoice_id=' + $(this).val(), function(data) {
    $("#sub_cat2").html(data);
       $('#loader').slideUp(200, function() {
    $(this).remove();
    });
    });
    });
	
    });
	
    </script>


<form name="new_supplier" action="process_edit_item.php?item_id=<?php echo $item_id?>" method="post">			
			<table width="100%" border="0">
  <tr >
    <td width="18%">&nbsp;</td>
	<td colspan="3" height="30"><?php

if ($_GET['addconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:400px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ff0000" >Record Created Successfully!!</font></strong></p></div>';
?>
<?php

if ($_GET['editsuccess']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Record Updated Successfully!!</font></strong></p></div>';
?>
<?php
if ($_GET['recordexist']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! Item name exist</font></strong></p></div>';

if ($_GET['recordexist2']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! Item code exist</font></strong></p></div>';


?></td>
    </tr>
	<tr height="20">
    <td bgcolor="">&nbsp;</td>
    <td width="19%">Select Item Category<font color="#FF0000">*</font></td>
    <td width="23%"><select name="cat_id" id="customer_id" style="width:260px;"><option value="<?php echo $rows->cat_id; ?>"><?php echo $rows->cat_name;?></option>
								  <?php
								  
								  $query1="select * from items_category order by cat_name asc";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->cat_id; ?>"><?php echo $rows1->cat_name; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
								  
								  
								  
								  
								  
								  ?>
								  </select>	</td>
    <td width="40%" rowspan="6" valign="top"><!--Account : <input class="form-control" required type='text' placeholder="start to type..if list doesn't appeaer, your item doesn't exist" id='countryname_1' value="<?php echo $account_code.' - '.$account_type_name; ?>" size="40" name='countryname'/>
								  
								  <input class="form-control" type='hidden' required id='country_no_1' value="<?php echo $account_type_id; ?>" name='account_type_id'/>--></td>
  </tr>
  
  <tr height="20">
    <td bgcolor="">&nbsp;</td>
    <td width="13%">Select Sub-Category<font color="#FF0000">*</font></td>
    <td width="20%"><select style="width:260px;" name="sub_cat_id" id="invoice_area">
	<option value="<?php echo $sub_cat_id; ?>"><?php echo $sub_cat_name; ?></option>
	</select></td>

  </tr> 
 
 <tr height="20">
    <td bgcolor="">&nbsp;</td>
    <td width="13%">Enter Item Name<font color="#FF0000">*</font></td>
    <td width="30%"><input type="text" size="41" name="item_name" value="<?php echo $rows->item_name;?>"></td>
	 <td width="40%" rowspan="6" valign="top"><div id='new_supplier_errorloc' class='error_strings'></div></td>
   
  </tr> 
  
       <tr height="20">
    <td bgcolor="">&nbsp;</td>
    <td width="13%">Enter Item Code<font color="#FF0000">*</font></td>
    <td width="30%"><input type="text" size="41" name="item_code" value="<?php echo $rows->item_code;?>"></td>
	 <td width="40%" rowspan="6" valign="top"></td>
   
  </tr> 
  
         <tr height="20">
    <td bgcolor="">&nbsp;</td>
    <td width="13%">Item Section<font color="#FF0000">*</font></td>
    <td width="20%">

		<?php
$item_sect=$rows->item_section;
if ($item_sect=='S')
{
?>
<input type="radio" name="item_section" required value="S" checked>Store Item<input type="radio" required name="item_section" value="I">Invoice Item
<?php 
}
else 
{
?>
<input type="radio" name="item_section" required value="S" >Store Item<input type="radio" required name="item_section" value="I" checked>
Invoice Item
<?php 
}

?>
	
	</td>

   
  </tr> 
  
  <tr height="20">
    <td bgcolor="">&nbsp;</td>
    <td width="19%">Value at Hand<font color="#FF0000"></font></td>
	<?php $curr_date=date('Y-m-d');?>
    <td width="23%"><input type="text" size="11" required name="value_at_hand" value="<?php echo $rows->opening_balance;?>"> 
	As At <input type="text" name="date_dep" size="20" id="date_dep" value="<?php echo $rows->opening_bal_date; ?>" readonly="readonly" /></td>
  
  </tr>
  
  <tr height="20">
    <td bgcolor="">&nbsp;</td>
    <td width="13%">VAT Applicable<font color="#FF0000">*</font></td>
    <td width="20%">

		<?php
$va=$rows->vat_status;
if ($va==1)
{
?>
<input type="radio" name="vat_status" required value="1" checked>Yes<input type="radio" required name="vat_status" value="0">No
<?php 
}
else 
{
?>
<input type="radio" name="vat_status" required value="1">Yes<input required type="radio" name="vat_status" value="0" checked>No
<?php 
}?>
	
	</td>

   
  </tr> 

  <tr height="20">
    <td bgcolor="">&nbsp;</td>
    <td width="19%">Reorder Point<font color="#FF0000"></font></td>
    <td width="23%"><input type="text" size="41" name="reorder_level" value="<?php echo $rows->reorder_level;?>"></td>
   
  </tr> 
  
     <tr height="20">
    <td bgcolor="">&nbsp;</td>
    <td width="19%">Item Cost<font color="#FF0000">*</font></td>
    <td width="23%"><input type="text" size="41" name="item_value" value="<?php echo $rows->curr_bp;?>"></td>
    
  </tr> 
  
<tr height="20">
    <td bgcolor="">&nbsp;</td>
    <td width="19%">Item Selling Price<font color="#FF0000">*</font></td>
    <td width="23%"><input type="text" size="41" name="item_sp" required value="<?php echo $rows->curr_sp;?>"></td>
    
  </tr> 
  
  
  
  <tr height="20">
    <td bgcolor="">&nbsp;</td>
    <td width="19%">Item Description<font color="#FF0000"></font></td>
    <td width="23%"><textarea name="item_desc" cols="40" rows="3"><?php echo $rows->description;?></textarea></td>
    
  </tr>  

  
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="submit" style="background:#2E3192; font-size:14px; color:#ffffff; font-weight:bold; width:300px; height:30px; border-radius:5px;" name="submit" value="Save">
	<input type="hidden" name="edit_item" id="edit_item" value="1">&nbsp;&nbsp;<input type="reset" value="Cancel"></td>
    <td>&nbsp;</td>
  </tr>

</table>

</form>
 <script src="js/auto_expenses.js"></script>
<script type="text/javascript">

  
   Calendar.setup(
    {
      inputField  : "date_dep",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "date_dep"       // ID of the button
    }
  );
  
  
  
  
  
  </script>



  