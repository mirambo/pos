<?php include('Connections/fundmaster.php'); ?>

<html xmlns="http://www.w3.org/1999/xhtml">

<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>
<script type="text/javascript" src="jquery.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
     
    $("#parent_cat").change(function() {
    //$(this).after('<div id="loader"><img src="loader.gif" alt="loading subcategory" /></div>');
    $.get('loadsubcat.php?parent_cat=' + $(this).val(), function(data) {
    $("#sub_cat").html(data);
    $('#loader').slideUp(200, function() {
    $(this).remove();
    });
    });
    });
	
	 $("#sub_cat").change(function() {
  // $(this).after('<div id="loader"><img src="loader.gif" alt="loading subcategory" /></div>');
    $.get('loadsubcat2.php?sub_cat=' + $(this).val(), function(data2) {
    $("#sub_cat2").html(data2);
    $('#loader').slideUp(200, function() {
    $(this).remove();
    });
    });
    });
		
	$("#sub_cat2").change(function() {
  // $(this).after('<div id="loader"><img src="loader.gif" alt="loading subcategory" /></div>');
    $.get('loadsubcat3.php?sub_cat2=' + $(this).val(), function(data2) {
    $("#sub_cat3").html(data2);
    $('#loader').slideUp(200, function() {
    $(this).remove();
    });
    });
    });
	
	
	$("#sub_cat3").change(function() {
  // $(this).after('<div id="loader"><img src="loader.gif" alt="loading subcategory" /></div>');
    $.get('loadsubcat4.php?sub_cat3=' + $(this).val(), function(data2) {
    $("#sub_cat4").html(data2);
    $('#loader').slideUp(200, function() {
    $(this).remove();
    });
    });
    });
    
    });
		
	////////////////////////////////// To select access status roles
	
	$(document).ready(function() {
     
    $("#parent_cat2").change(function() {
    //$(this).after('<div id="loader"><img src="loader.gif" alt="loading subcategory" /></div>');
    $.get('loadrole.php?parent_cat2=' + $(this).val(), function(data) {
    $("#role").html(data);
    $('#loader').slideUp(200, function() {
    $(this).remove();
    });
    });
    });
	
	 
    
    });


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
		
		
		
		<?php require_once('includes/station_submenu.php');  ?>
		
		<h3>:: Adding New Working Station</h3>
         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
			<div id="cont-left" class="br-5">
<form name="new_machine_category" action="processaddstation.php" method="post">			
			<table width="100%" border="0">
  <tr>
    <td width="18%">&nbsp;</td>
	<td colspan="3" height="30"><?php

if ($_GET['addnhifconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#339900 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#339900" >Record Created Successfully!!</font></strong></p></div>';

if ($_GET['abnormal']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! Income from cant be greater than income to</font></strong></p></div>';

if ($_GET['recordexist']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! the record exist</font></strong></p></div>';
?></td>
    </tr>
  <tr height="30">
    <td bgcolor="">&nbsp;</td>
    <td width="19%">Select Account Category<font color="#FF0000">*</font></td>
    <td width="23%"><select name="parent_cat" id="parent_cat">
	<option value="0">Select Account Category.............</option>
    <?php 
	$query_parent = mysql_query("SELECT * FROM account_category") or die("Query failed: ".mysql_error());
	while($row = mysql_fetch_array($query_parent)): ?>
    <option value="<?php echo $row['account_cat_id']; ?>"><?php echo $row['account_cat_name']; ?></option>
    <?php endwhile; ?>
    </select></td>
    <td width="40%" rowspan="2" valign="top"><div id='new_machine_category_errorloc' class='error_strings'></div></td>
  </tr>
  <tr height="30">
    <td>&nbsp;</td>
    <td>Select Account Type<font color="#FF0000">*</font></td>
    <td width="23%">
	<select name="sub_cat" id="sub_cat">
	<option value="0">Select Account Type.............</option>
	</select></td>
  
  <tr>
  
  <tr height="30">
    <td>&nbsp;</td>
    <td>Account Name<font color="#FF0000">*</font></td>
    <td width="23%"><input type="text" size="41" name="account_name"></td>
  
  <tr>
  
  <tr height="30">
    <td>&nbsp;</td>
    <td>Sort Order<font color="#FF0000">*</font></td>
    <td width="23%"><input type="text" size="41" name="sort_order"></td>
  
  <tr>
  
  
  <tr height="30">
    <td>&nbsp;</td>
    <td>Description<font color="#FF0000">*</font></td>
    <td width="23%"><textarea name="account_desc" rows="3" cols="35"></textarea></td>
  
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
 var frmvalidator  = new Validator("new_machine_category");
 frmvalidator.EnableOnPageErrorDisplaySingleBox();
 frmvalidator.EnableMsgsTogether();
 frmvalidator.addValidation("station_name","req",">>Please enter station name");
frmvalidator.addValidation("income_to","req",">>Please enter income to");
 frmvalidator.addValidation("contribution_amount","req",">>Please enter contribution amount");
  /*frmvalidator.addValidation("email_addr","req","Please enter  email address");
  frmvalidator.addValidation("email_addr","email","Please enter Valid email address");*/
 
 
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