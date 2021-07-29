<?php
include('Connections/fundmaster.php'); 
$shareholderid=mysql_real_escape_string($_POST['shareholderid']);
$exit_mode=mysql_real_escape_string($_POST['exit_mode']);
$exit_date=mysql_real_escape_string($_POST['exit_date']);

$task_totals=0;
$shares_amnt=0;
$sqlts="select * from shareholder_transactions where shareholder_id='$shareholderid'";
$resultsts= mysql_query($sqlts) or die ("Error $sqlts.".mysql_error());
if (mysql_num_rows($resultsts) > 0)
						  {
						  while ($rowsts=mysql_fetch_object($resultsts))
						  {
						  
						  $shares_amnt=$rowsts->amount;
						  $curr_rate=$rowsts->curr_rate;
						  $task_ttl_kshs=$shares_amnt*$curr_rate;
						  $shares=$shares+$task_ttl_kshs;
						  }
						  //echo $task_totals;
			
						  }
						  
  echo  number_format($shares,2);

 //$shares=$rowsnet->amount;


?>
<html xmlns="http://www.w3.org/1999/xhtml">

<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>
<script type="text/javascript"> 

function confirmDelete()
{
    return confirm("Are you sure you want to proceed?");
}


</script>

<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>

<body>

	<div id="page-wrap">

		<?php include ('header.php') ?>
		
		<div id="zone-bar" class="br-5">
          <?php include ('topmenu.php') ?>
		</div>

		<?php require_once('includes/sharessubmenu.php');  ?>
		
		<h3>:: Exit Shareholder's From The Company</h3>
         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
			<div id="cont-left" class="br-5">
<form name="start_invoice" action="process_exit_shareholder.php" method="post">			
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
	
	
	
	
	
<strong>Exiting Shareholder : </strong><?php

$sqlclient="select * from shares where shares_id='$shareholderid'";
$resultsclient= mysql_query($sqlclient) or die ("Error: $sqlclient.".mysql_error());
$rowsclient=mysql_fetch_object($resultsclient);
		
echo $rowsclient->share_holder_name;

 ?>
 <strong> Current Net Shares: </strong>SSP <?php echo number_format($shares,2) ?>
<strong> Mode Of Exit: </strong>
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

 ?>
<strong> Date Of Exit : 	</strong>
	
	<?php
echo $exit_date;
?>

<a href="exit_shareholder.php"><span style="float:right; margin-right:10px;">Go Back</span></a>

<input type="hidden" name="shareholderid" value="<?php echo $shareholderid; ?>">	
<input type="hidden" name="exit_mode" value="<?php echo $exit_mode; ?>">	
<input type="hidden" name="exit_date" value="<?php echo $exit_date; ?>">
<input type="hidden" name="net_shares" value="<?php echo $shares; ?>">
</td>
    </tr>
<?php
if ($exit_mode=='1')//transfer shares only
{
 ?>	

  <tr height="20">
    <td bgcolor="">
	&nbsp;</td>
    <td width="19%">Select Beneficiary Share Holder<font color="#FF0000">*</font></td>
    <td width="23%"><select name="ben_shareholderid"><option value="0">-------------------Select-----------------</option>
								  <?php
								  
								  $query1="select * from shares where shares_id!='$shareholderid'";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->shares_id; ?>"><?php echo $rows1->share_holder_name; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
								  
								  
								  
								  
								  
								  ?>
								  
								  </select></td>
    <td width="40%" rowspan="6" valign="top"><div id='start_invoice_errorloc' class='error_strings'></div></td>
  </tr>
  
  <?php
}

elseif ($exit_mode=='2')//partial transfer shares only
{
?>
<tr height="20">
    <td bgcolor="">
	&nbsp;</td>
    <td width="19%">Select Beneficiary Share Holder<font color="#FF0000">*</font></td>
    <td width="23%"><select name="ben_shareholderid"><option>-------------------Select-----------------</option>
								  <?php
								  
								  $query1="select * from shares where shares_id!='$shareholderid'";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->shares_id; ?>"><?php echo $rows1->share_holder_name; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
								  
								  
								  
								  
								  
								  ?>
								  
								  </select></td>
    <td width="40%" rowspan="6" valign="top"><div id='start_invoice_errorloc' class='error_strings'></div></td>
  </tr>
  
  <tr height="20">
    <td bgcolor="">
	&nbsp;</td>
    <td width="19%">Enter Amount Transfered<font color="#FF0000">*</font></td>
    <td width="23%"><input type="text" size="41" name="amount_transfered"></td>
   
  </tr>
  
  

<?php


}

elseif ($exit_mode=='3')//withdraw all shares
{

 
}

  ?>
  
  
  <tr height="20">
    <td>&nbsp;</td>
    <td width="20%">Comments<font color="#FF0000"></font></td>
    <td>
	<textarea name="comments" cols="30" rows="4"></textarea></td>
							    
    </tr>
  
	
	
  <tr height="30">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="submit" name="submit" onClick="return confirmDelete();" value="Save">&nbsp;&nbsp;</td>
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