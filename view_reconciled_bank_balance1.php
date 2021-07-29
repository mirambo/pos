<?php include('Connections/fundmaster.php'); 
$id=$_GET['bank'];

?>
<html xmlns="http://www.w3.org/1999/xhtml">

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

<SCRIPT language="javascript">
function reload(form)
{
var val=form.bank.options[form.bank.options.selectedIndex].value;
self.location='view_reconciled_bank_balance1.php?bank=' + val ;

}

</script>

<body>

	<div id="page-wrap">

		<?php include ('header.php') ?>
		
		<div id="zone-bar" class="br-5">
          <?php include ('topmenu.php') ?>
		</div>

		<?php require_once('includes/expensessubmenu.php');  ?>
		
		<h3>:: View Reconciled Bank Statement Balance </h3>
         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
			<div id="cont-left" class="br-5">
<form name="emp" id="emp" action="process_bank_statement.php" method="post">			
			<table width="100%" border="0">
 <tr height="20">
    <td width="15%">&nbsp;</td>
	<td colspan="6" height="30" align="center"><?php

if ($_GET['delconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:500px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ff0000" >Payroll For '.$date_month. ' Cancelled Successfuly</div>';
?>

<?

if ($_GET['staffonsite']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! Current staff are on site. New Staff should report from'.$period_to.'</font></strong></p></div>';
?>

<?php

if ($_GET['recordexist']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! the user is existing</font></strong></p></div>';
?></td>
    </tr>
	
	<tr height="20">
    <td bgcolor="" width="20%">&nbsp;</td>
    <td width="20%" align="right"><strong>Select Bank Account</strong><font color="#FF0000">*</font></td>
    <td width="15%"><select name="bank" id="bank" onChange="reload(this.form)">
<?php 
	
	$query1="select * from banks where bank_id='$id'";
	$results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
	$rowsinst1=mysql_fetch_object($results1);
	if ($id=='')
	{

	?>
	<option value="0">Select..................................................................</option>
	<?php
	}							  
    else 
	 
	 { ?>
	 <option value="<?php echo $rowsinst1->bank_id;?>"><?php echo $rowsinst1->bank_name.' ('.$rowsinst1->account_name.')'; ?></option>
	 <?php 
	 
	 }	
	 
	 ?>	
	
	              
								  
										  
                                    <?php 
$sqlcurr="SELECT * FROM banks order by bank_name asc";
$resultscurr= mysql_query($sqlcurr) or die ("Error $sqlcurr.".mysql_error()); 
if (mysql_num_rows($resultscurr) > 0)
{
						while ($rowscurr=mysql_fetch_object($resultscurr))
							{						
								?>  
										  
                                    <option value="<?php echo $rowscurr->bank_id;?>"><?php echo $rowscurr->bank_name.' ('.$rowscurr->account_name.')';?></option>
									<?php
									}
									}
									

									?>
									
                               </select></td>
    <td width="20%" rowspan="3" align="left" valign="top"><div id='emp_errorloc' class='error_strings'></div></td>
	<td></td>
  </tr>
<tr>
    
    <td colspan="4" valign="top" align="center">

	<table align="center" width="60%" border="0" class="table1" >
	
	<tr style="background:url(images/description.gif);" height="20" align="center">

	<td colspan="2"><strong>Select which statement to view</strong></td>  
  </tr>
	<?php
								  
$queryst="select * from reconciled_bank_balance where bank_id='$id' group by date_from ";
$resultsst=mysql_query($queryst) or die ("Error: $queryst.".mysql_error());

								  
								  if (mysql_num_rows($resultsst)>0)
								  
								  {
									  while ($rowsst=mysql_fetch_object($resultsst))
									  {
							  $RowCounter++;
							  if($RowCounter % 2==0)
{
echo '<tr bgcolor="#C0D7E5" height="25">';
}
else 
{
echo '<tr bgcolor="#FFFFCC" height="25">';
}
									  
									   ?>
									  
									  
									  
								
	    
						
	   <td align="center">Period from : <font color="#ff0000;"><?php echo $rowsst->date_from; ?></font> Period To : <font color="#ff0000;"><?php echo $rowsst->date_to; ?></font></td>
	
	   
   <td align="center" width="200"><a href="view_reconciled_bank_balance.php?date_from=<?php echo $rowsst->date_from ?>
   &date_to=<?php echo $rowsst->date_to;?>&bank_id=<?php echo $id; ?>&out_bal=<?php echo $rowsst->system_balance;?>">View Statements</td>
    

  </tr>
									  
									  
									  <?php 
									  }
									  
									  }
									  else
									  {
									  ?>
								<tr bgcolor="#FFFFCC"><td colspan='5' align="center" height="40"><font color="#ff0000"><strong>Sorry!! No Record found</strong></td></tr> 	  
									  
								<?php 	  
								}
									  
									  
									  ?>
									  
	
									  
									  
									  
									  
								
	
	
	

	
	
	
	</table>

	
 
	<td></td>
  </tr>  
  

  
  
	
	
</table>

</form>

<SCRIPT language="JavaScript">
 var frmvalidator  = new Validator("emp");
 frmvalidator.EnableOnPageErrorDisplaySingleBox();
 frmvalidator.EnableMsgsTogether();
 frmvalidator.addValidation("bank","dontselect=0",">>Please select bank account");

</script>

			
			
			
					
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