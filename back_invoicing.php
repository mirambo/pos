<?php 	$date_generated=$_GET['date_generated']; 
        $client_id=$_GET['client_id']; 
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
  <tr >
    <td width="18%">&nbsp;</td>
	<td colspan="3" height="30">

<div align="center" style="background: #FFCC33; height:55px; width:600px; border:#FF0000 solid 1px; 
font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000">Client
<strong><?php 

$querycl="SELECT * FROM clients where client_id='$client_id'";
	$resultscl=mysql_query($querycl) or die ("Error: $querycl.".mysql_error());
	$rowscl=mysql_fetch_object($resultscl);
	
	echo $rowscl->c_name;


?></strong>



 was invoiced last on <strong><?php echo $date_generated; ?></strong><br/><br/> Do you want to process <strong>another invoice for him?</strong></font></strong></p>

</div>
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
	 <td rowspan="4" align="center"><a href="home.php?generateinvoice=generateinvoice"><img src="images/no.jpg"></a></td>
    <td rowspan="4" align="center"><a href="home.php?invoice2=invoice2&client_id=<?php echo $client_id; ?>&last_invoiced_date=<?php echo $date_generated; ?>"><img src="images/yes.jpg"></a></td>
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