
<?php $emp_id=$_GET['emp_id']; ?>
<script language="javaScript" src="gen_validatorv4.js"  type="text/javascript" xml:space="preserve"></script>
<script type="text/javascript" src="calender/calendar.js"></script>
<script type="text/javascript" src="calender/lang/calendar-en.js"></script>
<script type="text/javascript" src="calender/calendar-setup.js"></script>
<style type="text/css">

@import url(calender/calendar-win2k-1.css);



.table td, tr
{
border:1px solid black;
padding:3px;
}

.table td, tr a
{
color:#ff0000;
text-decoration:none;

}

.table td, tr a:hover
{
color:#ffffff;
text-decoration:none;

}

.table td, tr a:current
{
background:#ff0000;
text-decoration:none;

}

</style>

<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>
<form name="emp" id="emp" action="processeditempcontract.php?emp_id=<?php echo $emp_id; ?>" method="post">			
<table width="100%" border="0">
  <tr align="center" >
  
	<td colspan="6" height="30">
<?php

if ($_GET['editconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:400px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ff0000" >Recorded Updated Successfully!!</font></strong></p></div>';


if ($_GET['passwordmissmatchconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry Password do not match!!</font></strong></p></div>';


if ($_GET['recordexist']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! the user is existing</font></strong></p></div>';
?></td>
    </tr>
  <tr height="20">
	<td rowspan="18" width="25%" valign="top">
	<?php include ('includes/emp_submenu_view.php');
$sql="SELECT * FROM staff_contract WHERE emp_id='$emp_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
$rows=mysql_fetch_object($results);	
	?>
	
	
	
	</td>
	<td colspan="4" ><h3>Employment Contract - Contract Details for (<?php 
$querylatelpo="select * from employees where emp_id='$emp_id'";
$resultslatelpo=mysql_query($querylatelpo) or die ("Error: $querylatelpo.".mysql_error());
$rowslatelpo=mysql_fetch_object($resultslatelpo);
echo $rowslatelpo->emp_fname.' '.$rowslatelpo->emp_mname.' '.$rowslatelpo->emp_lname;

	?>
	
	)</h3></td>
    
    <td>&nbsp;</td>
    </tr>
  <tr height="20">
    
    <td width="10%">Contract Type<font color="#FF0000">*</font></td>
    <td bgcolor="" width="20%"><input type="text" size="41" name="contract_type" value="<?php echo $rows->contract_type;?>"></td>
    <td width="15%">Term Type<font color="#FF0000">*</font></td>
    <td width="5%">
	<?php 
	$term_type=$rows->term_type; 
	if ($term_type=='Open')
	{
	?>
	<input type="radio" name="term_type" value="Open" checked>Open &nbsp;&nbsp;<input type="radio" name="term_type" value="Full">Full
	<?php
	}
	elseif ($term_type=='Full')
	{
	?>
	<input type="radio" name="term_type" value="Open">Open &nbsp;&nbsp;<input type="radio" name="term_type" value="Full" checked>Full
	<?php
   }
   else
   {?>
	<input type="radio" name="term_type" value="Open">Open &nbsp;&nbsp;<input type="radio" name="term_type" value="Full">Full
	
	<?php 
   }
	?>
	</td>
    <td width="100%" rowspan="10" valign="top"></td>
  </tr>
  <tr height="20">
 
    <td>Begining Date<font color="#FF0000">*</font></td>
    <td><input type="text" name="begin_date" size="41" id="begin_date" readonly="readonly" value="<?php echo $rows->begin_date;?>"/></td>
    <td>Termination Date<font color="#FF0000">*</font></td>
     <td><input type="text" name="termination_date" size="41" id="termination_date" readonly="readonly" value="<?php echo $rows->termination_date;?>" /></td>
    </tr>
	<tr height="20">
	 <td valign="top">Probation time (M)</td>
    <td valign="top"><input type="text" size="41" name="probation_time" value="<?php echo $rows->probation_time;?>">
	
	
	</td>

    
    <td valign="top">Remarks</td>
    <td><textarea name="cont_remarks" rows="5" cols="35"><?php echo $rows->contract_remarks;?></textarea>
	
	
	
	
	
	
	
	
	
	</td>
   
    </tr>

  <tr>
    <td>&nbsp;</td>
    <td rowspan="3" valign="top"><div id='emp_errorloc' class='error_strings'></div></td>
    <td><input type="submit" name="submit" value="Update">&nbsp;&nbsp;<input type="reset" value="Cancel"></td>
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
      inputField  : "begin_date",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "begin_date"       // ID of the button
    }
  );
  
  Calendar.setup(
    {
      inputField  : "termination_date",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "termination_date"       // ID of the button
    }
  );
  
  
  
  </script> 
<SCRIPT language="JavaScript">
 var frmvalidator  = new Validator("emp");
 frmvalidator.EnableOnPageErrorDisplaySingleBox();
 frmvalidator.EnableMsgsTogether(); 
 frmvalidator.addValidation("contract_type","req",">>Please enter contract type");
 frmvalidator.addValidation("term_type","selone_radio",">>Please select term type");
 frmvalidator.addValidation("begin_date","req",">>Please enter begining date");
 
  </SCRIPT>

