<?php include('Connections/fundmaster.php'); 
$product_id=$_GET['product_id'];
$currency_code=$_GET['curr_id'];

$querycr="select * from currency where curr_id='$currency_code'";
$resultscr=mysql_query($querycr) or die ("Error: $querycr.".mysql_error());							  
$rowscr=mysql_fetch_object($resultscr);
$curr_rate=$rowscr->curr_rate;
$curr_name=$rowscr->curr_name;

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
		
		<h3>:: Update the product details</h3>
         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
			<div id="cont-left" class="br-5">
<form name="new_prod_category" action="processeditprod.php?product_id=<?php echo $product_id; ?>&currency_code=<?php echo $currency_code;?>" method="post">			
			<table width="100%" border="0">
  <tr>
    <td width="18%">&nbsp;</td>
	<td colspan="3" height="30"><?php

if ($_GET['updateconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#339900 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#339900" >Product Updated Successfully!!</font></strong></p></div>';


if ($_GET['bplargernote']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! buying price must be less than selling price</font></strong></p></div>';

?>

<?php

if ($_GET['recordexist']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! the record exist</font></strong></p></div>';


$queryprod="select products.product_name,products.product_id,prod_code,products.pack_size,products.weight,products.reorder_level,products.curr_sp,
products.curr_bp,products.exchange_rate,products.currency_code,product_categories.cat_name,currency.curr_name from currency,products,product_categories
where products.cat_id=product_categories.cat_id and products.currency_code=currency.curr_id and products.product_id='$product_id'";
$resultsprod=mysql_query($queryprod) or die ("Error: $queryprod.".mysql_error());
								  
$rowsprod=mysql_fetch_object($resultsprod);
$cat_id=$rowsprod->cat_id;


?></td>
    </tr>
	<tr height="30">
    <td bgcolor="">&nbsp;</td>
    <td width="19%">Select Product Category<font color="#FF0000">*</font></td>
    <td width="23%">
	<select name="prod_cat">
	<?php 
	$product_id=$rows->product_id;
	
	if ($product_id)
	{
	 $query11="select * from product_categories where cat_id='$cat_id'";
	 $results11=mysql_query($query11) or die ("Error: $query11.".mysql_error());
	 $rows11=mysql_fetch_object($results11);
	
	?>
	<option value="<?php echo $rows11->cat_id;?>"><?php echo $rows11->cat_name;?></option>
	<?php 
	}
	else
	{
	?>

	<?php }?>
	
	
	
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
    <td width="23%"><input type="text" size="41" name="prod_name" value="<?php echo $rowsprod->product_name;?>"></td>
    <td width="40%" rowspan="2" valign="top"><div id='new_machine_category_errorloc' class='error_strings'></div></td>
  </tr>
  <tr height="30">
    <td bgcolor="">&nbsp;</td>
    <td width="19%">Enter Product Code <font color="#FF0000">*</font></td>
    <td width="23%"><input type="text" size="41" name="prod_code" value="<?php echo $rowsprod->prod_code;?>"></td>
    <td width="40%" rowspan="2" valign="top"><div id='new_prod_category_prod_code_errorloc' class='error_strings'></div></td>
  </tr>
  
  <tr height="30">
    <td bgcolor="">&nbsp;</td>
    <td width="19%">Select Pack Size <font color="#FF0000">*</font></td>
    <td width="23%"><select name="pack_size">
	<?php 
	
	if ($product_id)
	{
	?>
	<option value="<?php echo $rowsprod->pack_size;?>"><?php echo $rowsprod->pack_size;?></option>
	<?php 
	}
	else
	{
	?>
	
	
	
	<?php }?>
	<option value="30mlx4">30mlx4</option>
	<option value="30mlx5">30mlx5</option>
	<option value="30mlx6">30mlx6</option>
	<option value="30mlx7">30mlx7</option>
	<option value="30mlx8">30mlx8</option>
	<option value="30mlx9">30mlx9</option>
	<option value="30mlx10">30mlx10</option>
	<option value="30mlx11">30mlx11</option>
	<option value="30mlx12">30mlx12</option>
	<option value="N/A">N/A</option>
	
	
	
	</select><br/><font color="#FF0000" size="1">Select N/A if not applicable</font></td>
    </tr>
  
  <tr height="30">
    <td bgcolor="">&nbsp;</td>
    <td width="19%">Weight (Kgs)<font color="#FF0000">*</font>
	
	</td>
    <td width="23%"><input type="text" size="41" name="weight" value="<?php echo $rowsprod->weight;?>">
	<br/><font color="#FF0000" size="1">Enter N/A if not applicable</font>
	
	</td>
    <td width="40%" rowspan="2" valign="top"></td>
  </tr>
  
  <tr height="30">
    <td bgcolor="">&nbsp;</td>
    <td width="19%">Reorder level<font color="#FF0000">*</font></td>
    <td width="23%"><input type="text" size="41" name="reorder_level" value="<?php echo $rowsprod->reorder_level;?>"></td>
    </tr>
	  <tr height="30">
    <td bgcolor="">&nbsp;</td>
    <td width="19%">Current Selling Price (Kshs.)<font color="#FF0000">*</font></td>
    <td width="23%"><input type="text" size="41" name="curr_sp" value="<?php echo $rowsprod->curr_sp;?>"></td>
    </tr>
  
  <tr height="30">
    <td bgcolor="">&nbsp;</td>
    <td width="19%">Current Buying Price(<?php echo $curr_name; ?>)<font color="#FF0000">*</font><br/>
	<?php
 //$currency=$rowsprod->currency_code;
 if ($currency_code!='2')
 {
 echo "<blink ><font color='#ff0000'> Change currency to USD</font></blink>";
 }
 
 
	

	?>
	
	
	</td>
    <td width="23%"><input type="text" size="41" name="curr_bp" value="<?php echo $rowsprod->curr_bp;?>"></td>
    <td width="40%" rowspan="2" valign="top"></td>
  </tr>
  

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
 frmvalidator.addValidation("prod_name","req","Please enter product name");
 frmvalidator.addValidation("prod_code","req","Please enter product code");
 frmvalidator.addValidation("weight","req","Please enter weight");
 frmvalidator.addValidation("reorder_level","req","Please enter reorder value");
 frmvalidator.addValidation("curr_bp","req","Please enter current buying price");
 frmvalidator.addValidation("curr_sp","req","Please enter current selling price");

 
 
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