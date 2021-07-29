<?php
if ($sess_allow_add==0)
{
include ('includes/restricted.php');
}
else
{

$id=$_GET['id'];
	
$sql="SELECT * FROM account_opening_balances,account_type WHERE 
account_type.account_type_id=account_opening_balances.account_id
 AND account_opening_balances.opening_balance_id='$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$rows=mysql_fetch_object($results);
	
	
include('select_search.php');
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

<form name="new_supplier" action="process_add_opening_balance.php?sub_module_id=<?php echo $sub_module_id; ?>&id=<?php echo $id; ?>" method="post">			
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
<tr height="20">
    <td bgcolor="">&nbsp;</td>
    <td width="19%">Date :<font color="#FF0000">*</font></td>
    <td width="23%"><input type="text" autocomplete="off" name="date_from" required id="date_from" value="<?php echo $rows->date_recorded; ?>" size="29"></td>
    <td width="40%" rowspan="6" valign="top"><div id='new_supplier_errorloc' class='error_strings'></div></td>
 </tr>
  <tr height="20">
    <td bgcolor="">&nbsp;</td>
    <td width="19%">Select Account :<font color="#FF0000">*</font></td>
    <td width="23%"><select name="credit_account_id" id="account_from" required style="width:350px;"><option value="<?php echo $rows->account_type_id; ?>"><?php echo $rows->account_type_name; ?></option>

<?php
								  
								  $query1r="select * from account_type order by account_type_name asc";
								  $results1r=mysql_query($query1r) or die ("Error: $query1r.".mysql_error());
								  
								  if (mysql_num_rows($results1r)>0)
								  
								  {
									  while ($rows1r=mysql_fetch_object($results1r))
									  
									  { ?>
										  
<option value="<?php echo $rows1r->account_type_id; ?>"><?php echo $rows1r->account_code.' '.$rows1r->account_type_name; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
								  
								  
								  
								  
								  
								  ?>











</select></td>
    <td width="40%" rowspan="6" valign="top"><div id='new_supplier_errorloc' class='error_strings'></div></td>
  </tr>
   
  <tr height="20">
    <td>&nbsp;</td>
    <td valign="top">Amount <font color="#FF0000">*</font></td>
    <td><input type="text" required name="amount" value="<?php echo $rows->amount; ?>" size="29"></td>
    </tr>
	
	  <tr height="20">
    <td>&nbsp;</td>
    <td valign="top">Comments</td>
    <td><textarea name="comments" cols="30" rows="5"><?php echo $rows->comments; ?></textarea></td>
    </tr>

  
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>
	<input type="submit" name="submit" class="submit_button2" value="Post To Accounts"></td>
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
      inputField  : "date_from",         // ID of the input field
      ifFormat    : "%Y-%m-%d",    // the date format
      button      : "date_to"       // ID of the button
    }
  );
  
  /* Calendar.setup(
    {
      inputField  : "expiry_date",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "expiry_date"       // ID of the button
    }
  ); */
  
 
  
  
  
  </script>
  
    <script>


$("#account_from").select2( {
	placeholder: "Select Account",
	allowClear: true
	} );
	

	
	
</script>



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