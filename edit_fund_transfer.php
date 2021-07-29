<?php include('Connections/fundmaster.php'); 

$fund_transfer_id=$_GET['fund_transfer_id'];
$sql="SELECT * FROM fund_transfer where fund_transfer_id='$fund_transfer_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
$rows=mysql_fetch_object($results);
$transfer_from=$rows->transfer_from;
$transfer_to=$rows->transfer_to;
$currency=$rows->currency;

//account from
$sqlrec1="SELECT * FROM account WHERE account_id='$transfer_from'";
$resultsrec1= mysql_query($sqlrec1) or die ("Error $sqlrec1.".mysql_error());	
$rowsrec1=mysql_fetch_object($resultsrec1);
$acc_name_from=$rowsrec1->account_name;

//account to
$sqlrec2="SELECT * FROM account WHERE account_id='$transfer_to'";
$resultsrec2= mysql_query($sqlrec2) or die ("Error $sqlrec2.".mysql_error());	
$rowsrec2=mysql_fetch_object($resultsrec2);
$acc_name_to=$rowsrec2->account_name;

$querytcs="select * from currency where curr_id='$currency'";
$resultstcs=mysql_query($querytcs) or die ("Error: $querytc.".mysql_error());								  
$rowstcs=mysql_fetch_object($resultstcs);
$curr_name=$rowstcs->curr_name;





?>

<html xmlns="http://www.w3.org/1999/xhtml">

<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>
<script type="text/javascript" src="calender/calendar.js"></script>
<script type="text/javascript" src="calender/lang/calendar-en.js"></script>
<script type="text/javascript" src="calender/calendar-setup.js"></script>
<style type="text/css">

@import url(calender/calendar-win2k-1.css);

</style>

<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>

<script type="text/javascript"> 

function confirmDelete()
{
    return confirm("Are you sure you want to save?");
}
</script>

<script type="text/javascript" src="jquery-1.3.2.min.js"></script>
<!--<script type="text/javascript" src="jquery-1.8.3.js"></script>-->

<script src="js/jquery-1.10.2.min.js"></script>	
		<script src="js/jquery-ui-1.10.3.custom.min.js"></script>
		<script src="js/bootstrap.min.js"></script>	
		<link rel="stylesheet" href="css/jquery-ui-1.10.3.custom.min.css" />
<script type="text/javascript">
    $(document).ready(function() {
     
    $("#transfer_from").change(function() {
    //$(this).after('<div id="loader"><img src="loader.gif" alt="loading subcategory" /></div>');
    $.get('load_transfer_from_bal.php?account_id=' + $(this).val(), function(data) {
    $("#transfer_from_area").html(data);
       $('#loader').slideUp(200, function() {
    $(this).remove();
    });
    });
    });
	
	
	
	
	$("#transfer_to").change(function() {
    //$(this).after('<div id="loader"><img src="loader.gif" alt="loading subcategory" /></div>');
    $.get('load_transfer_to_bal.php?account_id=' + $(this).val(), function(data) {
    $("#transfer_to_area").html(data);
       $('#loader').slideUp(200, function() {
    $(this).remove();
    });
    });
    });
	
    });
	
    </script>

<body>

	<div id="page-wrap">

		<?php include ('header.php') ?>
		
		<div id="zone-bar" class="br-5">
          <?php include ('topmenu.php') ?>
		</div>

		<?php require_once('includes/fund_transfer_submenu.php');  ?>
		
		<h3>:: Update Fund Transfer</h3>
         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
			<div id="cont-left" class="br-5">
<form name="new_user" action="process_edit_fund_transfer.php?fund_transfer_id=<?php echo $fund_transfer_id;?>" method="post">			
<table width="100%" border="1">
  <tr >
    <td width="2%">&nbsp;</td>
	<td colspan="3" height="30"><?php

if ($_GET['addconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#339900 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#339900" >Opening Balance Adjusted Successfully!!</font></strong></p></div>';
?>

<?php

if ($_GET['passwordmissmatchconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry Password do not match!!</font></strong></p></div>';
?>

<?php

if ($_GET['recordexist']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! the opening balance already exist!!</font></strong></p></div>';
?></td>
    </tr>
  <tr height="20">
    <td >&nbsp;</td>
    <td width="15%">Enter Date <font color="#FF0000">*</font></td>
    <td><input type="text" name="date_paid" size="40" id="date_paid" value="<?php echo $rows->date_transfered;?>" readonly="readonly" /></td>
	<td width="15%"></td>
	<td width="15%" rowspan="10" valign="center"><div id='new_user_errorloc' class='error_strings'></div></td>
    </tr>
 
	<tr height="30">
    <td >&nbsp;</td>
    <td  width="5%">Transfer Funds From<font color="#FF0000">*</font></td>
    <td>
	


<select name="transfer_from" id="transfer_from">
	<option value="<?php echo $transfer_from; ?>"><?php echo $acc_name_from;?></option>
    <?php 
	$query_parent = mysql_query("select * FROM account where account_type_id='10' order by account_name asc") or die("Query failed: ".mysql_error());
	while($row = mysql_fetch_array($query_parent)): ?>
    <option value="<?php echo $row['account_id']; ?>"><?php echo $row['account_name']; ?></option>
    <?php endwhile; ?>
    </select>






								  </td>
								  <td>
								<span id="transfer_from_area"></span>  
								  
								  </td>
								  
    </tr>
	
	<tr height="30">
    <td>&nbsp;</td>
    <td  width="10%">Transfer Funds To<font color="#FF0000">*</font></td>
    <td>
	<select name="transfer_to" id="transfer_to">
		<option value="<?php echo $transfer_to; ?>"><?php echo $acc_name_to;?></option>
    <?php 
	$query_parent2 = mysql_query("select * FROM account where account_type_id='10' order by account_name asc") or die("Query failed: ".mysql_error());
	while($row2 = mysql_fetch_array($query_parent2)): ?>
    <option value="<?php echo $row2['account_id']; ?>"><?php echo $row2['account_name']; ?></option>
    <?php endwhile; ?>
    </select>	</td>
								  <td> <span id="transfer_to_area"></span> </td>
								  
    </tr>
	
	<tr height="20">
    <td>&nbsp;</td>
    <td>Enter Amount<font color="#FF0000">*</font></td>
    <td><input type="text" size="41" name="amount" value="<?php echo $rows->amount;?>"></td>
	<td></td>
    </tr>
	<tr height="20">
    <td>&nbsp;</td>
    <td>Select Currency<font color="#FF0000">*</font></td>
    <td><select name="currency">
<option value="<?php echo $currency; ?>"><?php echo $curr_name;?></option>
								  
										  
                                    <?php 
$sqlcurr="SELECT * FROM currency order by curr_name asc";
$resultscurr= mysql_query($sqlcurr) or die ("Error $sqlcurr.".mysql_error()); 
if (mysql_num_rows($resultscurr) > 0)
{
						while ($rowscurr=mysql_fetch_object($resultscurr))
							{						
								?>  
										  
                                    <option value="<?php echo $rowscurr->curr_id;?>"><?php echo $rowscurr->curr_name;?></option>
									<?php
									}
									}
									

									?>
									
                               </select></td>
    </tr>
	<tr height="30">
    <td bgcolor="">&nbsp;</td>
    <td width="10%">Current Exchange Rate<font color="#FF0000">*</font>
	
	</td>
	
    <td width="10%"><input type="text" size="41" name="curr_rate" value="<?php echo $rows->curr_rate;?>"></td>
   
	<td></td>
  </tr>
  
  <tr height="30">
    <td bgcolor="">&nbsp;</td>
    <td width="10%">Memo<font color="#FF0000"></font>
	
	</td>
	
    <td width="10%"><textarea name="memo" rows="3" cols="30"><?php echo $rows->memo;?></textarea></td>
   
	<td></td>
  </tr>

	
	
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="submit" name="submit" onClick="return confirmDelete();" value="Update Details">&nbsp;&nbsp;<input type="reset" value="Cancel"></td>
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
      inputField  : "date_paid",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "date_paid"       // ID of the button
    }
  );
  
 
  
  
  </script>

<SCRIPT language="JavaScript">
 var frmvalidator  = new Validator("new_user");
 frmvalidator.EnableOnPageErrorDisplaySingleBox();
 frmvalidator.EnableMsgsTogether();
 frmvalidator.addValidation("date_paid","req","Please enter date");
 frmvalidator.addValidation("client","dontselect=0","Please select the client / customer");
 frmvalidator.addValidation("amount","req","Please enter the amount");
 frmvalidator.addValidation("currency","dontselect=0","Please select currency");
 frmvalidator.addValidation("curr_rate","req","Please enter the exchange rate");

 
 
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