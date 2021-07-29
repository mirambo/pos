<?php
$id=$_GET['cat'];
if ($sess_allow_add==0)
{
include ('includes/restricted.php');
}
else
{
 ?><?php 

if (isset($_POST['add_area']))
{
replicate_template($cat_id,$item_id,$item_name,$quant_rec,$date_received,$comments,$user_id);
}

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

<SCRIPT language="javascript">
function reload(form)
{
var val=form.cat_id.options[form.cat_id.options.selectedIndex].value;
self.location='home.php?viewsubprojectcountry=viewsubprojectcountry&cat=' + val ;

}

</script>



<form name="new_supplier" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">			
			<table width="100%" border="0">
  <tr >
    <td width="18%">&nbsp;</td>
	<td colspan="3" height="30"><?php

if ($_GET['addconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:400px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ff0000" >Recorded Successfully!!</font></strong></p></div>';
?>

<?php

if ($_GET['passwordmissmatchconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry Password do not match!!</font></strong></p></div>';
?>

<?php

if ($_GET['recordexist']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! Record Exist</font></strong></p></div>';
?></td>
    </tr>
  
  
	
	
	<tr height="20">
    <td>&nbsp;</td>
    <td width="15%">Select Item Category<font color="#FF0000">*</font></td>
    <td><select name="cat_id" onChange="reload(this.form)">
	<?php 
	$querycat="select * from items_category where cat_id='$id'";
	$resultscat=mysql_query($querycat) or die ("Error: $querycat.".mysql_error());
	$rowscat=mysql_fetch_object($resultscat);
	
	if ($id=='')
	{


	?>
	<option>-------------------Select-----------------------</option>
<?php
								  
     }
	 else
	 {
	 ?>
	
	<option><?php echo $rowscat->cat_name; ?></option>
	
	<?php
}
	?>
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
									  
									  
								  
								  
								  
								  
								  
								  ?></select></td>
	<td width="45%" rowspan="6" valign="top"><div id='new_supplier_errorloc' class='error_strings'></div></td>
    </tr>
	<tr height="20">
    <td>&nbsp;</td>
    <td width="15%">Select Item<font color="#FF0000">*</font></td>
    <td><select name="item_id"><option>Select..........................................................</option>
								  <?php
								  
								  $query1="select * from items where cat_id='$id' order by item_name asc";
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
    <td><input type="text" size="41" name="quant_rec" ></td>
	
    </tr>
	
<tr height="20">
    <td>&nbsp;</td>
    <td width="15%">Enter Date Received<font color="#FF0000">*</font></td>
    <td><input type="text" size="41" name="date_received" id="date_received"></td>
	
    </tr>
	
	<tr height="20">
    <td>&nbsp;</td>
    <td width="15%">Comments<font color="#FF0000"></font></td>
    <td><textarea cols="44" rows="5" name="comments"></textarea></td>
	
    </tr>
	
	
	
	
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>
	<input type="submit" name="submit" value="Save">
	<input type="hidden" name="add_area" id="add_area" value="Save">
	
	&nbsp;&nbsp;<input type="reset" value="Cancel"></td>
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



<SCRIPT language="JavaScript">
 var frmvalidator  = new Validator("new_supplier");
 frmvalidator.EnableOnPageErrorDisplaySingleBox();
 frmvalidator.EnableMsgsTogether();

 frmvalidator.addValidation("item_id","dontselect=0",">>Please select item");
 frmvalidator.addValidation("quant_rec","req",">>Please enter quantity received");
 frmvalidator.addValidation("date_received","req",">>Please enter date received");


  </SCRIPT>
  
  <script type="text/javascript">
  Calendar.setup(
    {
      inputField  : "date_received",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "date_received"       // ID of the button
    }
  );
  

  </script>
  
  
    <?php }?>