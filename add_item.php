<?php
if ($sess_allow_add==0)
{
include ('includes/restricted.php');
}
else
{
 ?>

<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>
<script type="text/javascript" src="calender/calendar.js"></script>
<script type="text/javascript" src="calender/lang/calendar-en.js"></script>
<script type="text/javascript" src="calender/calendar-setup.js"></script>
<style type="text/css">

@import url(calender/calendar-win2k-1.css);

</style>

<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>


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


<!--<form name="new_supplier" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">	-->		
<form name="new_supplier" action="process_add_item.php" method="post">			
			<table width="100%" border="0">
  <tr >
    <td width="18%">&nbsp;</td>
	<td colspan="3" height="30"><?php

if ($_GET['addconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:400px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ff0000" >Record Created Successfully!!</font></strong></p></div>';
?>
<?php

if ($_GET['passwordmissmatchconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry Password do not match!!</font></strong></p></div>';
?>
<?php
if ($_GET['recordexist']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! the record exist</font></strong></p></div>';

if ($_GET['recordexist2']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! The product code exist</font></strong></p></div>';


?></td>
    </tr>
  <tr height="20">
    <td bgcolor="">&nbsp;</td>
    <td width="10%">Select Item Category<font color="#FF0000">*</font></td>
    <td width="15%"><select name="cat_id" id="customer_id" required style="width:260px;"><option value=''>Select.............</option>
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
								  	 <td width="30%" rowspan="6" valign="top"><!--Account : 
								  
								  
								  
								  
								  
								  
								  <input class="form-control" required type='text' placeholder="start to type..if list doesn't appeaer, your item doesn't exist" id='countryname_1' size="40" name='countryname'/>
								  
								  <input class="form-control" type='hidden' required id='country_no_1' name='account_type_id'/>-->
								  
								  
								  </td>
   
								  
   
  </tr>
  
     <tr height="20">
    <td bgcolor="">&nbsp;</td>
    <td width="13%">Select Sub-Category<font color="#FF0000">*</font></td>
    <td width="20%"><select style="width:260px;" required name="sub_cat_id" id="invoice_area">
	<option value="">Select.............</option>
	</select></td>

  </tr> 
   <tr height="20">
    <td bgcolor="">&nbsp;</td>
    <td width="13%">Enter Item Name<font color="#FF0000">*</font></td>
    <td width="20%"><input type="text" required size="41" name="item_name"></td>

   
  </tr> 
  
     <tr height="20">
    <td bgcolor="">&nbsp;</td>
    <td width="13%">Enter Item Code<font color="#FF0000">*</font></td>
    <td width="20%"><input type="text" size="41" name="item_code"></td>

   
  </tr> 
  
   <tr height="20">
    <td bgcolor="">&nbsp;</td>
    <td width="13%">Item Section<font color="#FF0000">*</font></td>
    <td width="20%"><input type="radio" name="item_section" required value="S">Store Items
	<input type="radio" required name="item_section" value="I">Invoice Item</td>

   
  </tr> 
  

  
  <tr height="20">
    <td bgcolor="">&nbsp;</td>
    <td width="10%">Value at Hand<font color="#FF0000"></font></td>
	<?php $curr_date=date('Y-m-d');?>
    <td width="20%"><input type="text" size="11" value="0" name="value_at_hand"> As At <input type="text" name="date_dep" size="20" id="date_dep" 
	value="<?php echo $curr_date; ?>" readonly="readonly" />
	
	</td>
  
  </tr> 
  
         <tr height="20">
    <td bgcolor="">&nbsp;</td>
    <td width="13%">VAT Applicable<font color="#FF0000">*</font></td>
    <td width="20%"><input type="radio" name="vat_status" required value="1">Yes<input type="radio" required name="vat_status" value="0">No</td>

   
  </tr> 
  
  
  <tr height="20">
    <td bgcolor="">&nbsp;</td>
    <td width="10%">Reorder Point<font color="#FF0000"></font></td>
    <td width="20%"><input type="text" size="41" name="reorder_level"></td>
   
  </tr> 
  
     <tr height="20">
    <td bgcolor="">&nbsp;</td>
    <td width="10%">Item Cost<font color="#FF0000">*</font></td>
    <td width="20%"><input type="text" required size="41" name="item_value"></td>
    
  </tr> 
  
<tr height="20">
    <td bgcolor="">&nbsp;</td>
    <td width="10%">Item Selling Price<font color="#FF0000">*</font></td>
    <td width="20%"><input type="text" required size="41" name="item_sp"></td>
    
  </tr> 
  
  
  
  <tr height="20">
    <td bgcolor="">&nbsp;</td>
    <td width="10%">Item Description<font color="#FF0000"></font></td>
    <td width="20%"><textarea name="item_desc" cols="40" rows="3"></textarea></td>
    
  </tr> 
 

  
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="submit" style="background:#2E3192; font-size:14px; color:#ffffff; font-weight:bold; width:300px; height:30px; border-radius:5px;" name="submit" value="Save">
	<input type="hidden" name="add_item" id="add_item" value="1">&nbsp;&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
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


  <?php 
}
?>
  