<?php include('Connections/fundmaster.php'); 

$id=$_GET['sales_rep'];
$comm_due=$_GET['comm_due'];
$comm_paid=$_GET['comm_paid'];
$comm_balance=$_GET['comm_balance'];

$sqlemp_det="select employees.emp_firstname,employees.emp_lastname,employees.emp_middle_name,employees.emp_lastname from employees,users where users.emp_id=employees.emp_id and users.user_id='$id'";
$resultsemp_det= mysql_query($sqlemp_det) or die ("Error $sqlemp_det.".mysql_error());
$rowsemp_det=mysql_fetch_object($resultsemp_det);

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
		
		
		
	<?php require_once('includes/commision_submenu.php');  
		
		$sql="select fixed_assets.fixed_asset_id,fixed_assets.fixed_asset_name,fixed_assets.date_purchased,fixed_assets.currency,fixed_assets.curr_rate,
fixed_assets.value,fixed_assets.amount_paid,fixed_assets.date_recorded,currency.curr_name from fixed_assets,currency where fixed_assets.currency=currency.curr_id and fixed_assets.fixed_asset_id='$id'";
		$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
		$rows=mysql_fetch_object($results);
		
		
		
		?>
		
		<h3>:: Paying Commision for   : <?php echo $f_name=$rowsemp_det->emp_firstname.' '.$m_name=$rowsemp_det->emp_middle_name.' '.$m_name=$rowsemp_det->emp_lastname;?>
		
		
		</h3>
         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
			<div id="cont-left" class="br-5">
<form name="new_user_group" action="processpaycomm.php?sales_rep=<?php echo $id; ?>" method="post">			
			<table width="100%" border="0">
  <tr>
    <td width="18%">&nbsp;</td>
	<td colspan="4" height="30"><?php

if ($_GET['abnormal']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000  solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! Amount Paid Cant Be greater than the balance!!</font></strong></p></div>';

if ($_GET['recordexist']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! the record exist</font></strong></p></div>';
?></td>
    </tr>
  <!--<tr >
    <td bgcolor="">&nbsp;</td>
    <td width="19%">Enter Asset Name <font color="#FF0000">*</font></td>
    <td width="23%"><input type="text" size="41" name="asset_name"></td>
    <td width="40%" rowspan="4" valign="top"><div id='new_user_group_errorloc' class='error_strings'></div></td>
  </tr>
  <tr height="20">
    <td>&nbsp;</td>
    <td>Enter Purchase Date<font color="#FF0000">*</font></td>
    <td><input type="text" name="purchase_date" size="41" id="purchase_date" readonly="readonly" /></td>
    </tr>-->
	<tr height="20">
    <td>&nbsp;</td>
    <td width="200">Commission Due<font color="#FF0000">*</font></td>
    <td><strong><?php echo number_format($comm_due,2);?></strong>
	<input type="hidden" size="41" name="comm_due" value="<?php echo $comm_due;?>">
	<input type="hidden" size="41" name="xx" value="<?php echo $rows->value;?>">
	
	</td>
	<td width="400">&nbsp;</td>
    </tr>
	<tr height="20">
    <td>&nbsp;</td>
    <td>Amount Paid<font color="#FF0000">*</font></td>
    <td><strong><?php echo number_format($comm_paid,2);?></strong>
	<input type="hidden" size="41" name="comm_paid" value="<?php echo $comm_paid;?>">
	<input type="hidden" size="41" name="amount_already_paid" value="<?php echo $comm_paid?>">
	
	</td>
	<td width="400">&nbsp;</td>
    </tr>
	<tr height="20">
    <td>&nbsp;</td>
    <td>Balance To be Paid<font color="#FF0000">*</font></td>
    <td><strong><?php echo number_format($comm_balance,2);?></strong>
	<input type="hidden" size="41" name="balance" value="<?php echo $comm_balance;?>">
	
	</td>
	<td width="400">&nbsp;</td>
    </tr>
	<tr height="20">
    <td>&nbsp;</td>
    <td>Enter Amount Paid (Kshs)<font color="#FF0000">*</font></td>
    <td><input type="text" size="41" name="amount_paid"></td>
	<td width="400"><div id='new_user_group_errorloc' class='error_strings'></div></td>
    </tr>
  
  <!--<tr height="20">
    <td>&nbsp;</td>
    <td>Enter Value<font color="#FF0000">*</font></td>
    <td><input type="text" size="41" name="value"></td>
    </tr>
  
  <tr>-->
  
  
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="submit" name="submit" value="Save">&nbsp;&nbsp;<input type="reset" value="Cancel"></td>
	<td width="400">&nbsp;</td>

  </tr>
  
</table>

</form>

<SCRIPT language="JavaScript">
 var frmvalidator  = new Validator("new_user_group");
 frmvalidator.EnableOnPageErrorDisplaySingleBox();
 frmvalidator.EnableMsgsTogether();

 frmvalidator.addValidation("amount_paid","req",">>Please enter the amount paid");
 
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