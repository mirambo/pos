<?php 
$id=$_GET['id'];
$sql="SELECT * FROM account_type,account_category WHERE account_type.account_cat_id=account_category.account_cat_id  AND account_type.account_type_id='$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
$rows=mysql_fetch_object($results);


?>



<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>

<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>


<form name="new_supplier" action="process_add_chart.php?sub_module_id=<?php echo $sub_module_id; ?>&id=<?php echo $id; ?>" method="post">			
			<table width="100%" border="1">
  <tr >
    <td width="18%">&nbsp;</td>
	<td colspan="3" height="30"><?php

if ($_GET['addsubconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:400px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ff0000" >Record Created Successfully!!</font></strong></p></div>';
?>

<?php

if ($_GET['passwordmissmatchconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry Password do not match!!</font></strong></p></div>';
?>

<?php

if ($_GET['recordexist']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! the record exists</font></strong></p></div>';
?></td>
    </tr>
	<tr height="20">
    <td bgcolor="" width="30%">&nbsp;</td>
    <td width="12%">Select Group<font color="#FF0000">*</font></td>
    <td width="30%"><select required style="width:200px;" name="account_group">
	
	<?php 
	if ($id=='')
	{
	?>

	<option value="">Select Group..................................</option>
<?php	
		
		
	}
	else
	{
		?>
		<option value="<?php echo $rows->account_cat_id; ?>"><?php echo $rows->account_cat_name; ?></option>	
		<?php
		
	}
	
	?>
	
	
	
	
	

								  <?php
								  
								  $query1="select * from account_category order by account_cat_name asc";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->account_cat_id;?>"><?php echo $rows1->account_cat_name; ?></option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
								  
								  
								  
								  
								  
								  ?>
								  
</select></td>
    <td width="10%" rowspan="6" valign="top"><div id='new_supplier_errorloc' class='error_strings'></div></td>
  </tr>
    <tr height="20">
    <td bgcolor="" width="30%">&nbsp;</td>
    <td width="12%">Enter Account Description<font color="#FF0000">*</font></td>
    <td width="23%"><input type="text" size="35" required placeholder="Chart Account" name="account_name" value="<?php echo $rows->account_type_name; ?>"></td>
   
  </tr>
  <tr height="20">
    <td bgcolor="" width="30%">&nbsp;</td>
    <td width="12%">Enter Account Number<font color="#FF0000">*</font></td>
    <td width="23%">
	
	Account Code<input type="text" required size="5" placeholder="1000" name="main_account_code" value="<?php echo $rows->main_account_code; ?>"> 
-  <input type="text" required size="5" placeholder="100" name="sub_account_code" value="<?php echo $rows->sub_account_code; ?>">
	
	
	
	
	</td>

  </tr>

  
  <tr height="20">
    <td bgcolor="">&nbsp;</td>
    <td width="13%">Balance Type<font color="#FF0000">*</font></td>
    <td width="20%">
	
	<?php 
	
	$bal_type=$rows->balance_type;
	if ($bal_type=='D')
		
		{ ?>
		
<input type="radio" name="bal_type" required checked value="D">Debit Balance<input type="radio" required name="bal_type" value="C">Credit Balance
			
		<?php
			
			
		}
		
		elseif ($bal_type=='C')
		{
			
			?>
		
<input type="radio" name="bal_type" required value="D">Debit Balance<input type="radio" required checked name="bal_type" value="C">Credit Balance
			
		<?php
			
			
		}
		else
		{
			
		?>
		
<input type="radio" name="bal_type" required value="D">Debit Balance<input type="radio" required name="bal_type" value="C">Credit Balance
			
		<?php	
			
		}
	
	
	?>
	
	
	
	</td>

   
  </tr> 
  

  <!--<tr height="20">
    <td bgcolor="" width="30%">&nbsp;</td>
    <td width="12%" valign="top">Enter Description<font color="#FF0000"></font></td>
    <td width="23%"><textarea cols="36" rows="4" name="desc"></textarea></td>
   
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
