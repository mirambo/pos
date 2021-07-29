<?php include('Connections/fundmaster.php'); 
$fixed_asset_id=$_GET['fixed_asset_id'];
$sql="select fixed_assets.fixed_asset_id,fixed_assets.fixed_asset_name,fixed_asset_category.fixed_asset_category_name,fixed_assets.useful_life,fixed_assets.quantity,fixed_assets.description,fixed_assets.date_purchased,fixed_assets.currency,fixed_assets.curr_rate,fixed_assets.value,fixed_assets.fixed_asset_category_id,fixed_assets.dep_value,fixed_assets.date_recorded,currency.curr_name from fixed_assets,currency,fixed_asset_category where 
fixed_assets.currency=currency.curr_id and fixed_asset_category.fixed_asset_category_id=fixed_assets.fixed_asset_category_id AND fixed_assets.fixed_asset_id='$fixed_asset_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
$rows=mysql_fetch_object($results);

$fixed_asset_category_id=$rows->fixed_asset_category_id;
$sqldep="select * from fixed_asset_category where fixed_asset_category_id='$fixed_asset_category_id'";
$resultsdep= mysql_query($sqldep) or die ("Error $sqldep.".mysql_error());
$rowdep=mysql_fetch_object($resultsdep);
$rowdep->fixed_asset_category_name;



?>

<html xmlns="http://www.w3.org/1999/xhtml">

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
<script src="jquery.min.js"></script>
<script type="text/javascript">
function confirmEdit()
{
return confirm("Are sure you want to save changes?");

}




</script>
<script type="text/javascript"> 
$(document).ready(function () {
            $('#mop').change(function () {			
			
                if (this.value == "1") {
                    $('#Cash').show();
                } else {
                    $('#Cash').hide();
                }				
				
				if (this.value == "2") {
                    $('#Cheque').show();
                } else {
                    $('#Cheque').hide();
                }
				
				if (this.value == "3") {
                    $('#Transfer').show();
                } else {
                    $('#Transfer').hide();
                }
				
				if (this.value == "4") {
                    $('#mpesa').show();
                } else {
                    $('#mpesa').hide();
                }

            });
        });


</script>


<body>

	<div id="page-wrap">

		<?php include ('header.php') ?>
		
		<div id="zone-bar" class="br-5">
          <?php include ('topmenu.php') ?>
		</div>
		<?php require_once('includes/fixedassetsubmenu.php');  ?>
		
		<h3>:: Update Fixed Asset Details the System</h3>
         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
			<div id="cont-left" class="br-5">
<form name="new_user_group" action="processeditfixedasset.php?fixed_asset_id=<?php echo $fixed_asset_id; ?>" method="post">			
			<table width="100%" border="0">
  <tr>
    <td width="18%">&nbsp;</td>
	<td colspan="3" height="30"><?php

if ($_GET['updateconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#339900 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#339900" >Asset Updated Successfully!!</font></strong></p></div>';

if ($_GET['recordexist']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! the record exist</font></strong></p></div>';

if ($_GET['abnormal']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! amount paid cant be greater than the value!!</font></strong></p></div>';


?></td>
    </tr>
	<tr height="20">
    <td bgcolor="">&nbsp;</td>
    <td width="19%">Select Asset Catsegory<font color="#FF0000">*</font></td>
    <td width="23%"><select name="fixed_asset_category_id"><option value="<?php echo $rows->fixed_asset_category_id;?>"><?php echo $rows->fixed_asset_category_name;?></option>
								  <?php
								  
								  $query1="select * from fixed_asset_category order by fixed_asset_category_name asc";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->fixed_asset_category_id; ?>"><?php echo $rows1->fixed_asset_category_name; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
								  
								  
								  
								  
								  
								  ?>
								  </select>	</td>
      <td width="40%" rowspan="4" valign="top"><div id='new_user_group_errorloc' class='error_strings'></div></td>
  </tr>
  <tr >
    <td bgcolor="">&nbsp;</td>
    <td width="19%">Enter Asset Name<font color="#FF0000">*</font></td>
    <td width="23%"><input type="text" size="41" name="asset_name" value="<?php echo $rows->fixed_asset_name;?>"></td>
    <td width="40%" rowspan="4" valign="top"><div id='new_user_group_errorloc' class='error_strings'></div></td>
  </tr>
  <tr >
    <td bgcolor="">&nbsp;</td>
    <td width="19%">Enter Quantity<font color="#FF0000">*</font></td>
    <td width="23%"><input type="text" size="41" name="quantity" value="<?php echo $rows->quantity;?>"></td>
    <td width="40%" rowspan="4" valign="top"><div id='new_user_group_errorloc' class='error_strings'></div></td>
  </tr>
  <tr >
    <td bgcolor="">&nbsp;</td>
    <td width="19%" valign="top">Enter Description<font color="#FF0000">*</font></td>
    <td width="23%"><textarea name="desc" rows="3" cols="36"><?php echo $rows->description;?></textarea></td>
    <td width="40%" rowspan="4" valign="top"><div id='new_user_group_errorloc' class='error_strings'></div></td>
  </tr>
  <tr height="20">
    <td>&nbsp;</td>
    <td>Enter Purchase Date<font color="#FF0000">*</font></td>
    <td><input type="text" name="purchase_date" size="41" id="purchase_date" readonly="readonly" value="<?php echo $rows->date_purchased;?>"/></td>
    </tr>
	<tr height="20">
    <td>&nbsp;</td>
    <td>Enter Cost / Value<font color="#FF0000">*</font></td>
    <td><input type="text" size="41" name="value" value="<?php echo $rows->value;?>"></td>
    </tr>
  <tr height="20">
    <td>&nbsp;</td>
    <td>Select Currency<font color="#FF0000">*</font></td>
    <td><select name="currency">
	                  <option value="<?php echo $rows->currency;?>"><?php echo $rows->curr_name;?></option>
								  
										  
                                    <?php 
$sqlcurr="SELECT * FROM currency order by curr_name asc";
$resultscurr= mysql_query($sqlcurr) or die ("Error $sqlcurr.".mysql_error()); 
if (mysql_num_rows($resultscurr) > 0)
{
						while ($rowscurr=mysql_fetch_object($resultscurr))
							{						
								?>  
										  
                                    <option value="<?php echo $rowscurr->curr_id;?>"><?php echo $rowscurr->curr_name;?></option>
									<?php
									}
									}
									

									?>
									
                               </select></td>
    </tr>
  
	<tr height="20">
    <td>&nbsp;</td>
    <td>Enter Exchange Rate : <font color="#FF0000">*</font></td>
    <td><input type="text" size="41" name="curr_rate" value="<?php echo $rows->curr_rate;?>"></td>
    </tr>
  
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="submit" name="submit" onClick="return confirmEdit();" value="Save">&nbsp;&nbsp;<input type="reset" value="Cancel"></td>
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
 /* var frmvalidator  = new Validator("new_user_group");
 frmvalidator.EnableOnPageErrorDisplaySingleBox();
 frmvalidator.EnableMsgsTogether();
 frmvalidator.addValidation("asset_name","req",">>Please enter asset name");
 frmvalidator.addValidation("quantity","req",">>Please enter quantity");
 frmvalidator.addValidation("desc","req",">>Please enter description");
  frmvalidator.addValidation("currency","dontselect=0",">>Please select currency");
 frmvalidator.addValidation("value","req",">>Please enter value for the asset");
 frmvalidator.addValidation("useful_life","req",">>Please enter approx.useful life");
 frmvalidator.addValidation("salvage_value","req",">>Please enter salvage value");
 frmvalidator.addValidation("amount_paid","req",">>Please enter the amount paid");
  */
 
 
  </SCRIPT>
  <script type="text/javascript">
  Calendar.setup(
    {
      inputField  : "purchase_date",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "purchase_date"       // ID of the button
    }
  );
  
 
  
  
  
  </script> 
  
  <!--<script type="text/javascript">
  Calendar.setup(
    {
      inputField  : "date_drawn",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "date_drawn"       // ID of the button
    }
  );
  
  Calendar.setup(
    {
      inputField  : "date_trans",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "date_trans"       // ID of the button
    }
  );
  Calendar.setup(
    {
      inputField  : "date_paid",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "date_paid"       // ID of the button
    }
  );
  
  Calendar.setup(
    {
      inputField  : "m_date_paid",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "m_date_paid"       // ID of the button
    }
  );
  
  
  </script>-->

			
			
			
					
			  </div>
				
				<div id="cont-right" class="br-5">
					
				</div>
			
			
			</div>
			
			
				
				
				
				
					<div class="clear"></div>
				</div>
				<div class="clear"></div>
			</div>
			<div id="footer">
			<?php include ('footer.php'); ?>
		</div>
		</div>
		
		
		
	</div>
	
</body>

</html>