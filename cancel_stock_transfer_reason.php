<?php
$invoice_id=$_GET['order_code'];
$invoice_amnt=$_GET['invoice_amnt'];
include ('includes/session.php');
if ($sess_allow_add==0)
{
include ('includes/restricted.php');
}
else
{
 ?><?php
if (isset($_POST['add_subproject']))
{
clock_out($cat_desc,$user_id);
}
 ?>
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
<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
table1
{
border-collapse:collapse;
}
.table1 td, tr
{
border:1px solid black;
padding:3px;
}

.table
{
border-collapse:collapse;
}

.table td, tr
{
border:1px solid black;
font-size:12px;
</Style>

<form name="new_supplier" action="process_cancel_stock_transfer.php?invoice_id=<?php echo $invoice_id;?>&invoice_amnt=<?php echo $invoice_amnt?>" method="post">			
			<table width="100%" border="0">
  <tr >
    <td width="18%">&nbsp;</td>
	<td colspan="3" height="30"><?php

if ($_GET['addconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:400px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ff0000" >Record Created Successfully!!</font></strong></p></div>';
?>
<?php

if ($_GET['passwordmissmatchconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry Password do not match!!</font></strong></p></div>';
?>
<?php
if ($_GET['recordexist']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! the record exist</font></strong></p></div>';
?></td>
    </tr>
  <!--<tr height="20">
    <td bgcolor="">&nbsp;</td>
    <td width="19%">Enter Item Category Name :<font color="#FF0000">*</font></td>
    <td width="23%"><input type="text" size="29" name="cat_name"></td>
    <td width="40%" rowspan="6" valign="top"><div id='new_supplier_errorloc' class='error_strings'></div></td>
  </tr>-->
   
  <tr height="20">
    <td>&nbsp;</td>
    <td valign="top" width="20%" align="right">Give Reason For Cancelation</td>
    <td><textarea name="reason" cols="30" rows="5"></textarea></td>
    </tr>

  
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="submit" name="submit" value="Cancel Now">
	<input type="hidden" name="add_subproject" id="add_subproject" value="1">&nbsp;&nbsp;</td>
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
 frmvalidator.addValidation("project_id","dontselect=0",">>Please select Project name");
 frmvalidator.addValidation("sub_project_code","req",">>Please enter Sub-project Code");
 frmvalidator.addValidation("sub_project_name","req",">>Please enter Sub-Project name");
 
 
 
 
  </SCRIPT>
    <?php 
}
?>