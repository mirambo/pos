<?php 
include('Connections/fundmaster.php');
$bank=$_GET['bank_id'];	
$date_from=$_GET['date_from'];	
$date_to=$_GET['date_to'];	
$date_done=$_GET['date_done'];	
$out_bal=$_GET['out_balance'];	
$currency=$_GET['currency'];	
$curr_rate=$_GET['curr_rate'];	
$out_bal=$_GET['out_balance'];	
$sqlemp_det="select * from banks where bank_id='$bank'";
$resultsemp_det= mysql_query($sqlemp_det) or die ("Error $sqlemp_det.".mysql_error());
$rowsemp_det=mysql_fetch_object($resultsemp_det);
?>


<html xmlns="http://www.w3.org/1999/xhtml">

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

<body>

	<div id="page-wrap">

		<?php include ('header.php') ?>
		
		<div id="zone-bar" class="br-5">
          <?php include ('topmenu.php') ?>
		</div>

	<?php require_once('includes/bank_reconcilliation_submenu.php');  ?>
		
		<h3>:: Reconcile Bank Balance For Account : <?php echo $rowsemp_det->bank_name.' ('.$rowsemp_det->account_name.')'; ?></h3>
         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
			<div id="cont-left" class="br-5">
<form name="new_supplier" action="processreconbank.php" method="post">			
			<table width="100%" border="0">
  <tr >
    <td width="18%">&nbsp;</td>
	<td colspan="3" height="30"><?php

if ($_GET['addconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#339900 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#339900" >Record added successfully!!</font></strong></p></div>';
?>

<?php

if ($_GET['recordexist']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! the recorded is existing</font></strong></p></div>';
?></td>
    </tr>
	
	
	
	
<tr height="30">

    <td width="19%" colspan='4' align="center"><strong><font >Balance For the Period Between : </font>
  <font color="#ff0000" ><?php echo $date_from; ?></font><font>And<font color="#ff0000" ><?php echo $date_to; ?></font>:<?php echo number_format($out_bal,2); ?></strong></td> 
   
    </tr>		
<tr height="20">
    <td bgcolor="">
													  <input type="hidden" size="41" name="bank" value="<?php   echo $bank; ?>">
													  <input type="hidden" size="41" name="date_from" value="<?php   echo $date_from; ?>">
													  <input type="hidden" size="41" name="date_to" value="<?php   echo $date_to; ?>">
													  <input type="hidden" size="41" name="date_done" value="<?php   echo $date_done; ?>">
													  <input type="hidden" size="41" name="out_bal" value="<?php   echo $out_bal; ?>">
													  
	
	</td>
    <td width="19%" valign="top">Enter Transaction Description<font color="#FF0000">*</font></td>
    <td width="23%"><textarea name="desc" rows="3" cols="36"></textarea></td>
    <td width="40%" rowspan="6" valign="top"><div id='new_supplier_errorloc' class='error_strings'></div></td>
  </tr>	
<tr height="30">
    <td bgcolor="">&nbsp;</td>
    <td width="19%">Effect to balance<font color="#FF0000">*</font></td>
    <td width="23%"><input type="radio" name="effect" value="1">Increase<input type="radio" name="effect" value="0">Reduce</td>
    </tr>	
  <tr height="20">
    <td bgcolor="">&nbsp;</td>
    <td width="19%" valign="top">Select Date Recorded<font color="#FF0000">*</font></td>
    <td width="23%"><input type="text" name="date_rec" size="40" id="date_rec" readonly="readonly" /><input name="DateFormats" id="DateFormats" disabled value="dd/mm/yyyy" type="hidden"></td>
    <td width="40%" rowspan="6" valign="top"><div id='new_supplier_errorloc' class='error_strings'></div></td>
  </tr>
  <tr height="20">
    <td>&nbsp;</td>
    <td>Enter Amount<font color="#FF0000">*</font></td>
    <td><input type="text" size="41" name="amount"></td>
    </tr>
	<tr height="20">
    <td>&nbsp;</td>
    <td>Select Currency<font color="#FF0000">*</font></td>
    <td>
	<select name="currency">
	                  <option>------------------Select--------------------</option>
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
									
                               </select>	
							   </td>
    </tr>
	
	
	
	
  
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="submit" name="submit" value="Save">&nbsp;&nbsp;<input type="reset" value="Cancel"></td>
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
      inputField  : "date_rec",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "date_rec"       // ID of the button
    }
  );
  
 
  
  </script>

<SCRIPT language="JavaScript">
 var frmvalidator  = new Validator("new_supplier");
 frmvalidator.EnableOnPageErrorDisplaySingleBox();
 frmvalidator.EnableMsgsTogether();
 frmvalidator.addValidation("desc","req",">>Please enter description");
  frmvalidator.addValidation("effect","selone_radio",">>Please select effect to balance");
 frmvalidator.addValidation("amount","req",">>Please enter amount");
 frmvalidator.addValidation("currency","dontselect=0",">>Please select currency");
 frmvalidator.addValidation("mop","dontselect=0",">>Please select mode of payment");
 
 
 
 
  </SCRIPT>

			
			
			
					
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