<?php
$paye_block_id=$_GET['paye_block_id'];

 ?>
<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>

<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>


<form name="new_supplier" action="processedittaxblock.php?paye_block_id=<?php echo $paye_block_id; ?>" method="post">			
			<table width="100%" border="0">
  <tr >
    <td width="18%">&nbsp;</td>
	<td colspan="3" height="30"><?php

if ($_GET['editsuccess']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:400px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ff0000" >Record Updated Successfully!!</font></strong></p></div>';
?>

<?php

if ($_GET['abnormal']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! Income from cant be greater than income to!!</font></strong></p></div>';
?>

<?php

if ($_GET['recordexist']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! the record</font></strong></p></div>';
?></td>
    </tr>
	<?php
$sql="SELECT * FROM paye_block where paye_block_id='$paye_block_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
$rows=mysql_fetch_object($results);


	?>
	
	
	
<tr height="20">
    <td bgcolor="">&nbsp;</td>
    <td width="19%">Income From<font color="#FF0000">*</font></td>
    <td width="23%"><input type="text" size="41" name="income_from" value="<?php echo $rows->paye_min ?>"></td>
    <td width="40%" rowspan="6" valign="top"><div id='new_supplier_errorloc' class='error_strings'></div></td>
  </tr>
  
  <tr height="20">
    <td bgcolor="">&nbsp;</td>
    <td width="19%">Income To<font color="#FF0000">*</font></td>
    <td width="23%"><input type="text" size="41" name="income_to" value="<?php echo $rows->paye_max ?>"></td>
    <td width="40%"  valign="top"></td>
  </tr>
  
  <tr height="20">
    <td bgcolor="">&nbsp;</td>
    <td width="19%">Rate (%)<font color="#FF0000">*</font></td>
    <td width="15%"><input type="text" size="41" name="rate" value="<?php echo $rows->paye_rate ?>"></td>
 <td width="22%" rowspan="3" valign="top" align="left"><div id='new_supplier_errorloc' class='error_strings'></div></td>
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
  frmvalidator.addValidation("income_from","req",">>Please enter minimum amount range");
  frmvalidator.addValidation("income_to","req",">>Please enter maximum amount range");
  frmvalidator.addValidation("rate","req",">>Please enter rate in %");
 
 
 
  </SCRIPT>