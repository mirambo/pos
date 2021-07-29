<?php
$customer_id=$_GET['customer_id'];
if (isset($_POST['update_project']))
{

edit_project($customer_name,$contact_person,$address,$town,$email,$phone,$pin,$user_id);
}
 ?>
<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>
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


<form name="new_supplier" action="process_edit_customer.php?customer_id=<?php echo $customer_id; ?>" method="post">	

<?php 

$sql="SELECT * FROM customer where customer_id='$customer_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
$rows=mysql_fetch_object($results);


$region_id=$rows->region_id;

$sql2="SELECT * FROM customer_region where region_id='$region_id'";
$results2= mysql_query($sql2) or die ("Error $sql2.".mysql_error());
$rows2=mysql_fetch_object($results2);

$region_name=$rows2->region_name;

$currency=$rows->customer_currency;

$sqlrecv="select * FROM currency WHERE curr_id='$currency'";
$resultsrecv= mysql_query($sqlrecv) or die ("Error $sqlrecv.".mysql_error());	
$rowsrecv=mysql_fetch_object($resultsrecv);

?>		
			<table width="100%" border="0">
  <tr >
    <td width="18%">&nbsp;</td>
	<td colspan="3" height="30"><?php

if ($_GET['editsuccess']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:400px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ff0000" >Record Updated Successfully!!</font></strong></p></div>';
?>

<?php

if ($_GET['passwordmissmatchconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry Password do not match!!</font></strong></p></div>';
?>

<?php

if ($_GET['recordexist']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! the user is existing</font></strong></p></div>';
?></td>
    </tr>
 <tr height="20">
    <td bgcolor="">&nbsp;</td>
    <td width="19%">Company/Customer Name<font color="#FF0000">*</font></td>
    <td width="23%"><input type="text" size="41" name="customer_name" value="<?php echo $rows->customer_name;?>"></td>
    <td width="40%" rowspan="6" valign="top"><div id='new_supplier_errorloc' class='error_strings'></div></td>
  </tr>
  <tr height="20">
    <td bgcolor="">&nbsp;</td>
    <td width="19%">Enter Customer Code<font color="#FF0000"></font></td>
    <td width="23%"><input type="text" size="41" name="customer_code" value="<?php echo $rows->customer_code;?>"></td>
   
  </tr> 
  
  <tr height="20">
    <td bgcolor="">&nbsp;</td>
    <td width="19%">Select Region<font color="#FF0000"></font></td>
    <td width="23%"><select name="region" style="width:270px;"><option value="<?php echo $region_id; ?>"><?php echo $region_name;?></option>
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
	                  <option value="<?php echo $rows->customer_currency; ?>"><?php echo $rowsrecv->curr_name; ?></option>
								  
										  
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
							   Rate: <input type="text" name="curr_rate" value="<?php echo $rows->customer_curr_rate; ?>" size="5">
							   </span>








	As At <input type="text" name="date_dep" size="10" id="date_dep" value="<?php echo $rows->opening_balance_date; ?>" readonly="readonly" /></td>
  
  </tr>
  
   <tr height="20">
    <td bgcolor="">&nbsp;</td>
    <td width="19%">Enter Contact Person<font color="#FF0000"></font></td>
    <td width="23%"><input type="text" size="41" name="contact_person" value="<?php echo $rows->contact_person;?>"></td>
   
  </tr> 
  <tr height="20">
    <td bgcolor="">&nbsp;</td>
    <td width="19%">Postal Address<font color="#FF0000"></font></td>
    <td width="23%"><input type="text" size="41" name="address" value="<?php echo $rows->address;?>"></td>
  
  </tr> 
  <tr height="20">
    <td bgcolor="">&nbsp;</td>
    <td width="19%">City /Town<font color="#FF0000"></font></td>
    <td width="23%"><input type="text" size="41" name="town" value="<?php echo $rows->town;?>"></td>
   
  </tr> 
  
   <tr height="20">
    <td bgcolor="">&nbsp;</td>
    <td width="19%">Enter Email Address<font color="#FF0000"></font></td>
    <td width="23%"><input type="text" size="41" name="email" value="<?php echo $rows->email;?>"></td>
    
  </tr> 
  
<tr height="20">
    <td bgcolor="">&nbsp;</td>
    <td width="19%">Enter Phone Number<font color="#FF0000"></font></td>
    <td width="23%"><input type="text" size="41" name="phone" value="<?php echo $rows->phone;?>"></td>
    
  </tr> 
  
  <tr height="20">
    <td bgcolor="">&nbsp;</td>
    <td width="19%">Enter PIN No<font color="#FF0000"></font></td>
    <td width="23%"><input type="text" size="41" name="pin" value="<?php echo $rows->pin;?>"></td>
    
  </tr> 
  
     <!-- <tr height="20">
    <td bgcolor="">&nbsp;</td>
    <td width="19%">Maximum Credit Limit (Kshs)<font color="#FF0000"></font></td>
    <td width="23%"><input type="text" size="41" name="credit_limit" value="<?php echo $rows->credit_limit;?>"></td>
    
  </tr>
  
      <tr height="20">
    <td bgcolor="">&nbsp;</td>
    <td width="19%">Maximum Credit Days<font color="#FF0000"></font></td>
    <td width="23%"><input type="text" size="41" name="credit_days" value="<?php echo $rows->credit_days;?>"></td>
    
  </tr>-->
  
  
  
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="submit" name="submit" value="Update"><input type="hidden" name="update_project" id="update_project" value="1">&nbsp;&nbsp;<input type="reset" value="Cancel"></td>
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
      ifFormat    : "%Y-%m-%d",    // the date format
      button      : "date_dep"       // ID of the button
    }
  );
 
  </script>
