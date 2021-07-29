<?php include('Connections/fundmaster.php'); 
 $value = $_request["prod_code"];
?>

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
		
		
		
		<?php require_once('includes/prodsubmenu.php');  ?>
		
		<h3>:: Adding New Stock (Product Stock)</h3>
         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
			<div id="cont-left" class="br-5">
<form name="new_prod_category" action="processaddprod.php" method="post">			
			<table width="100%" border="0">
  <tr>
    <td width="18%">&nbsp;</td>
	<td colspan="3" height="30"><?php

if ($_GET['addprodconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#339900 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#339900" >Product Added Successfully!!</font></strong></p></div>';


if ($_GET['bplargernote']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! buying price must be less than selling price</font></strong></p></div>';

?>

<?php

if ($_GET['recordexist']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! the record exist</font></strong></p></div>';
?></td>
    </tr>
	<tr height="30">
    <td bgcolor="">&nbsp;</td>
    <td width="19%">Select Product Category<font color="#FF0000">*</font></td>
    <td width="23%">
	<select name="prod_cat"><option>-------------------select-----------------</option>
								  <?php
								  
								  $query1="select * from product_categories";
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
    <td width="40%" rowspan="8" valign="top"><div id='new_prod_category_errorloc' class='error_strings'></div></td>
  </tr>
	
  <tr height="30">
    <td bgcolor="">&nbsp;</td>
    <td width="19%">Enter Product Name <font color="#FF0000">*</font></td>
    <td width="23%"><input type="text" size="41" name="prod_name"></td>
    <td width="40%" rowspan="2" valign="top"><div id='new_machine_category_errorloc' class='error_strings'></div></td>
  </tr>

  <tr height="30">
    <td bgcolor="">&nbsp;</td>
    <td width="19%">Enter Product Code <font color="#FF0000">*</font></td>
    <td width="23%"><input type="text" size="41" name="prod_code" value="<?php $value;?>"></td>
    <td width="40%" rowspan="2" valign="top"><div id='new_prod_category_prod_code_errorloc' class='error_strings'></div></td>
  </tr>
  
  <tr height="30">
    <td bgcolor="">&nbsp;</td>
    <td width="19%">Select Pack Size <font color="#FF0000">*</font></td>
    <td width="23%"><select name="pack_size"><option>-------------------select-----------------</option>
								  <?php
								  
								  $query1="select * from pack_size";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->pack_size_id; ?>"><?php echo $rows1->pack_size; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
								  
								  
								  
								  
								  
								  ?>
								  </select>	<a href="add_packsize.php?start=start">Add<br/><font color="#FF0000" size="1">Select N/A if not applicable</font></td>
    </tr>
  
  <tr height="30">
    <td bgcolor="">&nbsp;</td>
    <td width="19%">Weight (Kgs)<font color="#FF0000">*</font>
	
	</td>
    <td width="23%"><input type="text" size="41" name="weight">
	<br/><font color="#FF0000" size="1">Enter N/A if not applicable</font>
	
	</td>
    <td width="40%" rowspan="2" valign="top"></td>
  </tr>
  
  <tr height="30">
    <td bgcolor="">&nbsp;</td>
    <td width="19%">Reorder level<font color="#FF0000">*</font></td>
    <td width="23%"><input type="text" size="41" name="reorder_level"></td>
    </tr>
	  <tr height="30">
    <td bgcolor="">&nbsp;</td>
    <td width="19%">Current Selling Price (Kshs.)<font color="#FF0000">*</font></td>
    <td width="23%"><input type="text" size="41" name="curr_sp"></td>
    </tr>
  
  <tr height="30">
    <td bgcolor="">&nbsp;</td>
    <td width="19%">Current Buying Price<font color="#FF0000">*</font>
	<!--<blink><font color="#ff0000">(Always enter BP in USD)</font></blink>-->
	</td>
    <td width="23%"><input type="text" size="41" name="curr_bp"></td>
    <td width="40%" rowspan="2" valign="top"></td>
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
				
  <td>
  </tr>
  <!--<tr height="30">
    <td bgcolor="">&nbsp;</td>
    <td width="19%">Current Exchange Rate<font color="#FF0000">*</font>
	
	</td>
    <td width="23%"><input type="text" size="41" name="exchange_rate" value="<?php
$querycr="select curr_rate from currency where curr_id='2'";
$resultscr=mysql_query($querycr) or die ("Error: $querycr.".mysql_error());							  
$rowscr=mysql_fetch_object($resultscr);
echo $curr_rate=$rowscr->curr_rate;



	?>"></td>
    <td width="40%" rowspan="2" valign="top"></td>
  </tr>-->
  

 <!--<tr height="30">
    <td>&nbsp;</td>
    <td>Enter Description</td>
    <td><textarea rows="5" cols="30" name="mach_cat_desc"></textarea></td>
    </tr>-->
  
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
 var frmvalidator  = new Validator("new_prod_category");
 frmvalidator.EnableOnPageErrorDisplaySingleBox();
 frmvalidator.EnableMsgsTogether();
 frmvalidator.addValidation("prod_cat","dontselect=0","Please select product category");
 frmvalidator.addValidation("prod_name","req","Please enter product name");
 frmvalidator.addValidation("prod_code","req","Please enter product code");
 frmvalidator.addValidation("pack_size","dontselect=0","Please select pack size");
 frmvalidator.addValidation("weight","req","Please enter weight");
 frmvalidator.addValidation("reorder_level","req","Please enter reorder value");
 frmvalidator.addValidation("curr_bp","req","Please enter current buying price");
 frmvalidator.addValidation("curr_sp","req","Please enter current selling price");
 /*frmvalidator.addValidation("email_addr","req","Please enter  email address");
 frmvalidator.addValidation("email_addr","email","Please enter Valid email address");*/
 
 
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