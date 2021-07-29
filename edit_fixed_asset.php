<?php include('Connections/fundmaster.php'); 
$id=$_GET['fixed_asset_id'];

$sql="select fixed_assets.fixed_asset_id,fixed_assets.fixed_asset_name,fixed_assets.dep_perc,fixed_assets.description,fixed_assets.date_purchased,fixed_assets.currency,fixed_assets.curr_rate,
fixed_assets.value,fixed_assets.dep_value,fixed_assets.amount_paid,fixed_assets.date_recorded,currency.curr_name from fixed_assets,currency 
where fixed_assets.currency=currency.curr_id AND fixed_assets.fixed_asset_id='$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
$rows=mysql_fetch_object($results);
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

<body>

	<div id="page-wrap">

		<?php include ('header.php') ?>
		
		<div id="zone-bar" class="br-5">
          <?php include ('topmenu.php') ?>
		</div>
		
		<?php require_once('includes/fixedassetsubmenu.php');  ?>
		
		<h3>:: Adding New Fixed Asset the System</h3>
         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
			<div id="cont-left" class="br-5">
<form name="new_user_group" action="processeditfixedasset.php?fixed_asset_id=<?php echo $id;?>" method="post">			
			<table width="100%" border="0">
  <tr>
    <td width="18%">&nbsp;</td>
	<td colspan="3" height="30"><?php

if ($_GET['updateconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#339900 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#339900" >Asset Updated Successfully!!</font></strong></p></div>';

if ($_GET['recordexist']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! the record exist</font></strong></p></div>';
?></td>
    </tr>
  <tr >
    <td bgcolor="">&nbsp;</td>
    <td width="19%">Asset Name <font color="#FF0000">*</font></td>
    <td width="23%"><input type="text" size="41" name="asset_name" value="<?php echo $rows->fixed_asset_name;?>"></td>
    <td width="40%" rowspan="2" valign="top"><div id='new_user_group_errorloc' class='error_strings'></div></td>
  </tr>
   <tr >
    <td bgcolor="">&nbsp;</td>
    <td width="19%" valign="top">Description<font color="#FF0000">*</font></td>
    <td width="23%"><textarea name="desc" rows="3" cols="36"><?php echo $rows->description;?></textarea></td>
    <td width="40%" rowspan="4" valign="top"><div id='new_user_group_errorloc' class='error_strings'></div></td>
  </tr>
   <tr height="40">
    <td>&nbsp;</td>
    <td>Purchase Date<font color="#FF0000">*</font></td>
    <td><input type="text" name="purchase_date" size="41" id="purchase_date" readonly="readonly" value="<?php echo $rows->date_purchased;?>" /></td>
    </tr>
   <tr height="40">
    <td>&nbsp;</td>
    <td>Depreciation Percentage (%)<font color="#FF0000">*</font></td>
    <td><input type="text" size="41" name="dep_perc" value="<?php echo $rows->dep_perc;?>"></td>
    </tr>
  <tr height="40">
    <td>&nbsp;</td>
    <td>Value (<?php echo $rows->curr_name; ?>)<font color="#FF0000">*</font></td>
    <td><input type="text" size="41" name="amount" value="<?php echo $rows->value;?>"></td>
   </tr>
   <tr height="40">
    <td>&nbsp;</td>
    <td>Currency<font color="#FF0000">*</font></td>
    <td><select name="currency">
	
<option value="<?php echo $rows->currency;?>"><?php echo $rows->curr_name; ?></option>
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
  
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="submit" name="submit" value="Update">&nbsp;&nbsp;<input type="reset" value="Cancel"></td>
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
 var frmvalidator  = new Validator("new_user_group");
 frmvalidator.EnableOnPageErrorDisplaySingleBox();
 frmvalidator.EnableMsgsTogether();
 frmvalidator.addValidation("curr_name","req",">>Please enter currency name");
 frmvalidator.addValidation("exrate","req",">>Please enter current exchange rate");
 
 
 
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