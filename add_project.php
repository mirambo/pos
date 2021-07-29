<?php
if ($sess_allow_add==0)
{
include ('includes/restricted.php');
}
else
{
 ?>
 <?php
if (isset($_POST['add_customer']))
{

//echo $customer_name=$_POST['customer_name'];
add_projectt($customer_name,$value_at_hand,$contact_person,$address,$town,$email,$phone,$pin,$user_id);
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

<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
     
    $("#parent_cat12").change(function() {
    //$(this).after('<div id="loader"><img src="loader.gif" alt="loading subcategory" /></div>');
    $.get('load_curr.php?parent_cat12=' + $(this).val(), function(data) {
    $("#sub_cat12").html(data);
       $('#loader').slideUp(200, function() {
    $(this).remove();
    });
    });
    });
	
	
    
    });
	
    </script>


<form name="new_supplier" action="process_add_customer.php" method="post">			
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
    <td width="10%">Company/Customer Name<font color="#FF0000">*</font></td>
    <td width="30%"><input type="text" size="41" name="customer_name"></td>
    <td width="40%" rowspan="6" valign="top"><div id='new_supplier_errorloc' class='error_strings'></div></td>
  </tr>
  
     <tr height="20">
    <td bgcolor="">&nbsp;</td>
    <td width="19%">Enter Customer Code<font color="#FF0000"></font></td>
    <td width="23%"><input type="text" size="41" name="customer_code"></td>
   
  </tr> 
  
  <tr height="20">
    <td bgcolor="">&nbsp;</td>
    <td width="19%">Select Region<font color="#FF0000"></font></td>
    <td width="23%"><select name="region"><option>-------------------select-----------------</option>
								  <?php
								  
								  $query1="select * from customer_region order by region_name asc";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->region_id; ?>"><?php echo $rows1->region_name; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
								  
								  
								  
								  
								  
								  ?>
								  </select></td>
  
  </tr>
<tr height="20">
    <td bgcolor="">&nbsp;</td>
    <td width="19%">Opening Balance<font color="#FF0000"></font></td>
	<?php $curr_date=date('Y-m-d');?>
    <td width="43%">
	

	
	<input type="text" size="21" value="<?php echo $rows->opening_balance;?>" name="value_at_hand">

Currency : <select name="currency" style="width:100px;" id="parent_cat12">
	                  <option value="<?php echo $rows->currency; ?>"><?php echo $rowsrecv->curr_name; ?></option>
								  
										  
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
									
                               </select>
							   
							   <span id="sub_cat12">
							   Rate: <input type="text" name="curr_rate" value="<?php echo $rows->curr_rate; ?>" size="5">
							   </span>








	As At <input type="text" name="date_dep" size="10" id="date_dep" value="<?php echo $rows->opening_balance_date; ?>" readonly="readonly" /></td>
  
  </tr>
   <tr height="20">
    <td bgcolor="">&nbsp;</td>
    <td width="19%">Enter Contact Person<font color="#FF0000"></font></td>
    <td width="23%"><input type="text" size="41" name="contact_person"></td>
   
  </tr> 
  <tr height="20">
    <td bgcolor="">&nbsp;</td>
    <td width="19%">Postal Address<font color="#FF0000"></font></td>
    <td width="23%"><input type="text" size="41" name="address"></td>
  
  </tr> 
  <tr height="20">
    <td bgcolor="">&nbsp;</td>
    <td width="19%">City /Town<font color="#FF0000"></font></td>
    <td width="23%"><input type="text" size="41" name="town"></td>
   
  </tr> 
  
   <tr height="20">
    <td bgcolor="">&nbsp;</td>
    <td width="19%">Enter Email Address<font color="#FF0000"></font></td>
    <td width="23%"><input type="text" size="41" name="email"></td>
    
  </tr> 
  
<tr height="20">
    <td bgcolor="">&nbsp;</td>
    <td width="19%">Enter Phone Number<font color="#FF0000"></font></td>
    <td width="23%"><input type="text" size="41" name="phone"></td>
    
  </tr> 
  
  <tr height="20">
    <td bgcolor="">&nbsp;</td>
    <td width="19%">Enter TIN<font color="#FF0000"></font></td>
    <td width="23%"><input type="text" size="41" name="pin"></td>
    
  </tr>
  
    <!--<tr height="20">
    <td bgcolor="">&nbsp;</td>
    <td width="19%">Maximum Credit Limit (Kshs)<font color="#FF0000"></font></td>
    <td width="23%"><input type="text" size="41" name="credit_limit"></td>
    
  </tr>
  
      <tr height="20">
    <td bgcolor="">&nbsp;</td>
    <td width="19%">Maximum Credit Days<font color="#FF0000"></font></td>
    <td width="23%"><input type="text" size="41" name="credit_days"></td>
    
  </tr>-->
 

  
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="submit" name="submit" value="Save">
	<input type="hidden" name="add_customer" id="add_customer" value="1">&nbsp;&nbsp;<input type="reset" value="Cancel"></td>
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
      inputField  : "date_dep",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "date_dep"       // ID of the button
    }
  );
 
  </script>
<SCRIPT language="JavaScript">
 var frmvalidator  = new Validator("new_supplier");
 frmvalidator.EnableOnPageErrorDisplaySingleBox();
 frmvalidator.EnableMsgsTogether();
 frmvalidator.addValidation("customer_name","req",">>Please enter customer name");

  </SCRIPT>
  <?php 
}
?>
  