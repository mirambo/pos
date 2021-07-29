<?php 
include('Connections/fundmaster.php'); 
$shares_id=$_GET['shares_id'];
$dividend=$_GET['dividend'];
$financial_year_id=$_GET['financial_year_id'];	
$dividend_id=$_GET['dividend_id'];

$sqlsh="SELECT * FROM shares where shares_id='$shares_id'";
$resultssh= mysql_query($sqlsh) or die ("Error $sqlsh.".mysql_error());
$rowsshare=mysql_fetch_object($resultssh);
$share_holder_name=$rowsshare->share_holder_name;


?>
<?php include('Connections/fundmaster.php'); ?>

<html xmlns="http://www.w3.org/1999/xhtml">

<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>

<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>

<body>

	<div id="page-wrap">

		<?php include ('header.php') ?>
		
		<div id="zone-bar" class="br-5">
          <?php include ('topmenu.php') ?>
		</div>

	<?php require_once('includes/sharessubmenu.php');  ?>
		
		<h3>:: Plough back Dividends</h3>
         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
			<div id="cont-left" class="br-5">
<form name="new_supplier" action="process_ploughback_dividend.php?shares_id=<?php echo $shares_id ?>&financial_year_id=<?php echo $financial_year_id;  ?>&dividend_id=<?php echo $dividend_id;  ?>" method="post">			
			<table width="100%" border="0">
  <tr >
    <td width="18%">&nbsp;</td>
	<td colspan="3" height="30"><?php

if ($_GET['addexpconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#339900 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#339900" >Supplier Created Successfully!!</font></strong></p></div>';

if ($_GET['success']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#339900 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#339900" >Dividend Paid Successfully!!</font></strong></p></div>';

?>

<?php

if ($_GET['recordexist']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! the dividend has already been paid</font></strong></p></div>';
?></td>
    </tr>
  <tr height="20">
    <td bgcolor="">&nbsp;</td>
    <td width="19%" valign="top">Description<font color="#FF0000">*</font></td>
    <td width="23%"><textarea name="desc" rows="3" cols="36" readonly="readonly">Dividend plough back to increase the share capital for <?php echo $share_holder_name; ?></textarea></td>
    <td width="40%" rowspan="6" valign="top"><div id='new_supplier_errorloc' class='error_strings'></div></td>
  </tr>
  <tr height="20">
    <td>&nbsp;</td>
    <td>Dividend Amount<font color="#FF0000">*</font></td>
    <td><input type="text" size="41" name="div_amount" value="<?php echo $dividend?>" readonly="readonly"></td>
    </tr>
	<tr height="20">
    <td>&nbsp;</td>
    <td>Amount to be ploughed back<font color="#FF0000">*</font></td>
    <td><input type="text" size="41" name="amount"></td>
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

<SCRIPT language="JavaScript">
 var frmvalidator  = new Validator("new_supplier");
 frmvalidator.EnableOnPageErrorDisplaySingleBox();
 frmvalidator.EnableMsgsTogether();
 frmvalidator.addValidation("desc","req","Please enter description");
 frmvalidator.addValidation("amount","req","Please enter amount");
 frmvalidator.addValidation("currency","dontselect=0","Please select currency");
 frmvalidator.addValidation("mop","dontselect=0","Please select mode of payment");
 
 
 
 
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