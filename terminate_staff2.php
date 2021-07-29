<?php
include('Connections/fundmaster.php'); 
$emp_id=mysql_real_escape_string($_POST['emp_id']);
//$exit_mode=mysql_real_escape_string($_POST['exit_mode']);
$exit_date=mysql_real_escape_string($_POST['exit_date']);

$sqlnet="select SUM(amount) as amount,curr_rate from staff_transactions where emp_id='$emp_id'";
$resultsnet= mysql_query($sqlnet) or die ("Error $sqlnet.".mysql_error());
$rowsnet=mysql_fetch_object($resultsnet);

 $staff_balance=$rowsnet->amount;


?>
<html xmlns="http://www.w3.org/1999/xhtml">

<script language="javascript" src="gen_validatorv31.js" type="hidden/javascript"></script>

<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>

<body>

	<div id="page-wrap">

		<?php include ('header.php') ?>
		
		<div id="zone-bar" class="br-5">
          <?php include ('topmenu.php') ?>
		</div>

		<?php require_once('includes/employeessubmenu.php');  ?>
		
		<h3>:: Terminate Staff From The Company</h3>
         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
			<div id="cont-left" class="br-5">
<form name="start_invoice" action="process_terminate_staff.php" method="post">			
			<table width="100%" border="0">
  <tr >
    <td width="18%">&nbsp;</td>
	<td colspan="3" height="30"><?php

if ($_GET['addconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#339900 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#339900" >Shareholder Created Successfully!!</font></strong></p></div>';
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
	
	<tr >
  
	<td colspan="4" height="30" bgcolor="#FFFFCC" align="center">
	
	
	
	
	
<strong>Terminating Staff : </strong><?php

$sqlclient="select * from employees where emp_id='$emp_id'";
$resultsclient= mysql_query($sqlclient) or die ("Error: $sqlclient.".mysql_error());
$rowsclient=mysql_fetch_object($resultsclient);
		
echo $rowsclient->emp_firstname.' '.$rowsclient->emp_middle_name.' '.$rowsclient->emp_lastname;

 ?>
 <strong> Current Balance: </strong>Kshs <?php echo number_format($staff_balance,2) ?>
<!--<strong> Mode Of Exit: </strong>
<?php
if ($exit_mode==1)
{
echo "Full Transfer Of Shares Only";
}
if ($exit_mode==2)
{
echo "Partial Transfer and Withdrawal";
}

if ($exit_mode==3)
{
echo "Full Withdrawal of Shares";

}

 ?>-->
<strong> Termination Date : 	</strong>
	
	<?php
echo $exit_date;
?>

<a href="terminate_staff.php"><span style="float:right; margin-right:10px;">Go Back</span></a>

<input type="hidden" name="emp_id" value="<?php echo $emp_id; ?>">	
<!--<input type="hidden" name="exit_mode" value="<?php echo $exit_mode; ?>">	-->
<input type="hidden" name="exit_date" value="<?php echo $exit_date; ?>">
<input type="hidden" name="staff_balance" value="<?php echo $staff_balance; ?>">
</td>
    
  
  
  <tr height="20">
    <td>&nbsp;</td>
    <td width="20%">Enter Reason for termination<font color="#FF0000"></font></td>
    <td>
	<textarea name="comments" cols="30" rows="4"></textarea></td>
							    
    </tr>
  
	
	
  <tr height="30">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="submit" name="submit" value="Terminate Staff">&nbsp;&nbsp;</td>
    <td></td>
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
 var frmvalidator  = new Validator("start_invoice");
 frmvalidator.EnableOnPageErrorDisplaySingleBox();
 frmvalidator.EnableMsgsTogether();

 frmvalidator.addValidation("ben_shareholderid","dontselect=0",">>Please select beneficiary share holder");

 
 
 
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