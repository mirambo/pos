<?php include('Connections/fundmaster.php'); 
$id=$_GET['currency'];
?>

<html xmlns="http://www.w3.org/1999/xhtml">

<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>

<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>
<SCRIPT language="javascript">
function reload(form)
{
var val=form.currency.options[form.currency.options.selectedIndex].value;
self.location='add_cash_opening_balance.php?currency=' + val ;

}

</script>

<body>

	<div id="page-wrap">

		<?php include ('header.php') ?>
		
		<div id="zone-bar" class="br-5">
          <?php include ('topmenu.php') ?>
		</div>

		<?php require_once('includes/opening_balance_submenu.php');  ?>
		
		<h3>:: Adding Cash Opening Balance Into the system </h3>
         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
			<div id="cont-left" class="br-5">
<form name="new_user" action="processaddcashopeningbal.php" method="post">			
<table width="100%" border="0">
  <tr >
    <td width="18%">&nbsp;</td>
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
 <!-- <tr height="30">
    <td bgcolor="">&nbsp;</td>
    <td width="19%">Select The Account<font color="#FF0000">*</font></td>
    <td width="23%"><select name="account">
	                  <option>------------------Select--------------------</option>
								  <?php								  
								  $query1="select * from accounting_terminologies";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->terminology_id;?>"><?php echo $rows1->terminology_name;?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
								  
								  
								  
								  
								  
								  ?>
								  </select>	</td>
    <td width="40%" rowspan="6" valign="top"><div id='new_user_errorloc' class='error_strings'></div></td>
  </tr>
 
	<tr height="30">
    <td>&nbsp;</td>
    <td>Select Client / Customer<font color="#FF0000">*</font></td>
    <td>
	<select name="client"><option>-------------------Select-----------------</option>
								  <?php
								  
								  $query1="select * from clients";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->client_id; ?>"><?php echo $rows1->c_name; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
								  
								  
								  
								  
								  
								  ?>
								  
								  </select>	</td>
    </tr>
	<!--<tr height="20">
    <td>&nbsp;</td>
    <td>Email Address</td>
    <td><input type="text" size="41" name="email" value="<?php echo $email;?>"></td>
    </tr>-->
	<tr height="20">
    <td>&nbsp;</td>
    <td width="20%">Select Currency<font color="#FF0000">*</font></td>
    <td><select name="currency" id="currency" onChange="reload(this.form)">
	
								  
										  
                                    <?php 
$sqlcurr1="SELECT * FROM currency WHERE curr_id='$id' order by curr_name asc";
$resultscurr1= mysql_query($sqlcurr1) or die ("Error $sqlcurr1.".mysql_error()); 
$rowscurr1=mysql_fetch_object($resultscurr1);

if ($id=='')
	{


	?>
	<option value="0">-------------------Select-----------------------</option>
								  <?php
								  
     }
	 else
	 { ?>
	 <option value="<?php echo $rowscurr1->curr_id;?>"><?php echo $rowscurr1->curr_name; ?></option>
	 <?php 
	 
	 }

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
							    <td width="40%" rowspan="6" valign="top"><div id='new_user_errorloc' class='error_strings'></div></td>
    </tr>
	<tr height="30">
    <td bgcolor="">&nbsp;</td>
    <td width="19%">Current Exchange Rate(To Kshs)<font color="#FF0000">*</font>
	
	</td>
    <td width="23%"><input type="text" size="41" name="curr_rate" value="<?php
$querycr="select curr_rate from currency where curr_id='$id'";
$resultscr=mysql_query($querycr) or die ("Error: $querycr.".mysql_error());							  
$rowscr=mysql_fetch_object($resultscr);
echo $curr_rate=$rowscr->curr_rate;



	?>"></td>
    <td width="40%" rowspan="2" valign="top"></td>
  </tr>
    </tr>  
	<tr height="20" >
    <td>&nbsp;</td>
    <td width="15%">Enter Amount <font color="#FF0000">*</font></td>
    <td><input type="text" size="41" name="amount"></td>
	
  </tr>
  
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="submit" name="submit" value="Save">&nbsp;&nbsp;<input type="reset" value="Cancel"></td>
   
  </tr>
  
</table>

</form>

<SCRIPT language="JavaScript">
 var frmvalidator  = new Validator("new_user");
 frmvalidator.EnableOnPageErrorDisplaySingleBox();
 frmvalidator.EnableMsgsTogether();

 frmvalidator.addValidation("amount","req",">>Please enter the amount");

 
 
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