<?php

$received_stock_id=$_GET['received_stock_id'];

if (isset($_POST['add_period']))
{
edit_period($item_id,$item_name,$quant_rec,$comments,$user_id);
}



$sqlh="SELECT * from received_stock,items,items_category WHERE received_stock.item_id=items.item_id 
AND items_category.cat_id=items.cat_id AND received_stock_id='$received_stock_id'";
$resultsh= mysql_query($sqlh) or die ("Error $sqlh.".mysql_error());
$rowsh=mysql_fetch_object($resultsh);

?>
<!--<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>-->
<script type="text/javascript" src="calender/calendar.js"></script>
<script type="text/javascript" src="calender/lang/calendar-en.js"></script>
<script type="text/javascript" src="calender/calendar-setup.js"></script>
<style type="text/css">

@import url(calender/calendar-win2k-1.css);

</style>

<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>
<form name="new_supplier" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">			
<table width="100%" border="0">
  <tr >
    <td width="18%">&nbsp;</td>
	<td colspan="3" height="30"><?php

if ($_GET['editsuccess']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:400px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ff0000" >Record Updated Successfully!!</font></strong></p></div>';
?>

<?php

if ($_GET['abnormal']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! Income from cant be greater than income to!!</font></strong></p></div>';
?>

<?php

if ($_GET['recordexist']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! the record</font></strong></p></div>';
?></td>
    </tr>
 
	<tr height="20">
    <td>&nbsp;</td>
    <td width="15%">Select Item<font color="#FF0000">*</font></td>
    <td><select name="item_id"><option value="<?php echo $rowsh->item_id; ?>"><?php echo $rowsh->item_name; ?></option>
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
	
    </tr>
	
	<tr height="20">
    <td>&nbsp;</td>
    <td width="15%">Enter Quantity Received<font color="#FF0000">*</font></td>
    <td><input type="text" size="41" name="quant_rec" value="<?php echo $rowsh->quant_rec;?>"></td>
	
    </tr>
	
	<tr height="20">
    <td>&nbsp;</td>
    <td width="15%">Enter Date Received<font color="#FF0000">*</font></td>
    <td><input type="text" size="41" name="date_received" id="date_received" value="<?php echo $rowsh->date_received;?>"></td>
	
    </tr>
	
	<tr height="20">
    <td>&nbsp;</td>
    <td width="15%">Comments<font color="#FF0000"></font></td>
    <td><textarea cols="44" rows="5" name="comments"><?php echo $rowsh->comments;?></textarea></td>
	
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="submit" name="submit" value="Update">&nbsp;&nbsp;
	<input type="hidden" name="add_period" id="add_period" value="1">&nbsp;&nbsp;<input type="reset" value="Cancel">
	</td>
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

  <script type="text/javascript">
  Calendar.setup(
    {
      inputField  : "date_received",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "date_received"       // ID of the button
    }
  );
  

  </script>
