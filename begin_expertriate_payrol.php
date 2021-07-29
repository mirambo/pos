<?php 	
/*$sqlcurr="SELECT employees.emp_id,salary_details.gross_pay FROM employees,salary_details where salary_details.emp_id=employees.emp_id AND emp_id='1'";
$resultscurr= mysql_query($sqlcurr) or die ("Error $sqlcurr.".mysql_error());
$rowscurr=mysql_fetch_object($resultscurr); */


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



<form name="new_supplier" action="processinvoice1.php" method="post">			
			<table width="100%" border="0">
			<tr height="20" bgcolor="#FFFFCC">
    
	<td colspan="7" height="30" align="center"><strong><font size="+1">Current Rate!! Is 
<?php
$sqlcurr="SELECT * FROM currency where  curr_initials LIKE '%SSP%'";
$resultscurr= mysql_query($sqlcurr) or die ("Error $sqlcurr.".mysql_error());
$rowscurr=mysql_fetch_object($resultscurr); 
echo $curr_rate=$rowscurr->curr_rate;
?></font><font color="#ff0000"><blink><a href="home.php?editsponsor=editsponsor&curr_id=4&x=1" style="color:#ff0000; font-size:14px; margin-left:5px; text-decoration:none; ">Update it!!</a></blink></strong></font>
</td> 
    </tr>
  <tr >
    <td width="18%">&nbsp;</td>
	<td colspan="3" height="30">

<!--<div align="center" style="background: #FFCC33; height:55px; width:600px; border:#FF0000 solid 1px; 
font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000">Client<strong><?php 

$querycl="SELECT * FROM clients where client_id='$client_id'";
	$resultscl=mysql_query($querycl) or die ("Error: $querycl.".mysql_error());
	$rowscl=mysql_fetch_object($resultscl);
	
	echo $rowscl->c_name;


?></strong>



 was invoiced last on <strong><?php echo $date_generated; ?></strong><br/><br/> Do you want to process <strong>another invoice for him?</strong></font></strong></p>

</div>-->
</td>
    </tr>
  <tr height="20">
    <td bgcolor="">&nbsp;</td>
    <td width="19%"></td>
    <td width="23%">

	</td>
    <td width="40%" rowspan="8" valign="top"><div id='new_supplier_errorloc' class='error_strings'></div></td>
  </tr>
 
	
	
  <tr>
    
    <td>&nbsp;</td> 
	<?php
$sqlcurr="SELECT * FROM employees where staff_type='2' order by emp_id asc limit 1";
$resultscurr= mysql_query($sqlcurr) or die ("Error $sqlcurr.".mysql_error());
$rowscurr=mysql_fetch_object($resultscurr); 
$emp_id=$rowscurr->emp_id;

	?>
	
	
	
	 <td rowspan="4" align="center"><!--<a href="home.php?generateinvoice=generateinvoice"><img src="images/no.jpg">--></a></td>
    <td rowspan="4" align="center"><a href="home.php?processexppayroll2=processexppayroll2&emp_id=<?php echo $emp_id; ?>&curr_rate=<?php echo $curr_rate; ?>"><img src="images/yes.jpg"></a></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
   
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  
  </tr>
  <tr>
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
 frmvalidator.addValidation("client_id","dontselect=0",">>Please select client");


 
  
 
 
  </SCRIPT>