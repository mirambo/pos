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

		<?php require_once('includes/sharessubmenu.php'); ?>
		
		<h3>:: Adjust Share Holders Balance Into the system </h3>
         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
			<div id="cont-left" class="br-5">
<form name="new_user" action="processadjustshares.php" method="post">			
<table width="100%" border="0">
  <tr >
    <td width="10%">&nbsp;</td>
	<td colspan="3" height="30"><?php

if ($_GET['addconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#339900 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#339900" >Opening Balance Created Successfully!!</font></strong></p></div>';
?>

<?php

if ($_GET['passwordmissmatchconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry Password do not match!!</font></strong></p></div>';
?>

<?php

if ($_GET['recordexist']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! the opening balance already exist!!</font></strong></p></div>';
?></td>
    </tr>
  
 
	<tr height="30">
    <td>&nbsp;</td>
    <td  width="25%">Select Share Holder<font color="#FF0000">*</font></td>
    <td>
	<select name="client"><option>-------------------Select-----------------</option>
								  <?php
								  
								  $query1="select * from shares order by share_holder_name asc";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->shares_id; ?>"><?php echo $rows1->share_holder_name; ?></option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
								  
								  
								  
								  
								  
								  ?>
								  
								  </select>	</td>
								  <td rowspan="5" width="30%" valign="top"><div id='new_user_errorloc' class='error_strings'></div></td>
    </tr>
	<!--<tr height="20">
    <td>&nbsp;</td>
    <td>Email Address</td>
    <td><input type="text" size="41" name="email" value="<?php echo $email;?>"></td>
    </tr>-->
	<tr height="20">
    <td>&nbsp;</td>
    <td width="30%">Enter Amount<font color="#FF0000">*</font></td>
    <td><input type="text" size="41" name="amount"></td>
    </tr>
	<tr height="20">
    <td>&nbsp;</td>
    <td>Select Currency<font color="#FF0000">*</font></td>
    <td><select name="currency">
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
									
                               </select></td>
    </tr>
	<!--<tr height="30">
    <td bgcolor="">&nbsp;</td>
    <td width="19%">Current Exchange Rate(To Kshs)<font color="#FF0000">*</font>
	
	</td>
    <td width="23%"><input type="text" size="41" name="curr_rate" value="<?php
$querycr="select curr_rate from currency where curr_id='2'";
$resultscr=mysql_query($querycr) or die ("Error: $querycr.".mysql_error());							  
$rowscr=mysql_fetch_object($resultscr);
echo $curr_rate=$rowscr->curr_rate;



	?>"></td>
    <td width="40%" rowspan="2" valign="top"></td>
  </tr>-->
<tr height="20">
    <td>&nbsp;</td>
    <td>Choose to Increase / Reduce The Balance? <font color="#FF0000">*</font></td>
    <td>
	<!--Over-Payment&nbsp;<input type="radio" size="41" name="bal_type"  value="1">&nbsp;&nbsp;-->
	Increase<input type="radio" size="41" name="bal_type" value="1">&nbsp;&nbsp;
	Reduce<input type="radio" size="41" name="bal_type"  value="0"></td>
    </tr>
	
	<tr height="20">
    <td>&nbsp;</td>
    <td>Reason for adjustment<font color="#FF0000">*</font></td>
    <td><textarea name="desc" rows="3" cols="36"></textarea></td>
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
 var frmvalidator  = new Validator("new_user");
 frmvalidator.EnableOnPageErrorDisplaySingleBox();
 frmvalidator.EnableMsgsTogether();

 frmvalidator.addValidation("client","dontselect=0",">>lease select shareholder");
 frmvalidator.addValidation("amount","req",">>Please enter the amount");
  frmvalidator.addValidation("currency","dontselect=0",">>Please select the currency");
  frmvalidator.addValidation("bal_type","selone_radio",">>Please choose to increase or reduce the balance");
  frmvalidator.addValidation("desc","req",">>Please enter reason for adjustments");

 
 
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