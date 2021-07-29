<?php
include ('Connections/fundmaster.php');
	
$tender_id=$_GET['tender_id'];
$tender_activity_id=$_GET['tender_activity_id'];


 ?>
<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>
<script language="javaScript" src="gen_validatorv4.js"  type="text/javascript" xml:space="preserve"></script>

<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>

<script type="text/javascript" src="calender/calendar.js"></script>
<script type="text/javascript" src="calender/lang/calendar-en.js"></script>
<script type="text/javascript" src="calender/calendar-setup.js"></script>

<script type="text/javascript" src="jquery-1.3.2.min.js"></script>
 
<style type="text/css">
	divv{
		padding:5px;
	}
</style>

<script type="text/javascript">
$(document).ready(function(){ 
    var counter = 2; 
    $("#addBelong").click(function () { 
	if(counter>100){
            alert("Only 100 textboxes allow");
            return false;
	}   
 	var newTextBoxDiv2 = $(document.createElement('div'))
	     .attr("id", 'TextBoxDiv2' + counter);
 	newTextBoxDiv2.after().html('Firm '+ counter + ' : ' + '<select name="credit_account_id['+ counter +']"  id="account_from" required style="width:100px;"> 	 <option value="<?php echo $credit_account_id;?>"><?php echo $credit_account_name; ?></option> 								  <?php 								  								  $query1="select * from bidding_clients order by client_name asc"; 								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error()); 								  								  if (mysql_num_rows($results1)>0) 								  								  { 									  while ($rows1=mysql_fetch_object($results1)) 									  									  { ?> 										                                      <option value="<?php echo $rows1->client_id; ?>"><?php echo $rows1->client_name; ?> </option>                                                                     										  										<?php  } 									  									  } 								  								  ?> 								  								  </select> Amount Quoted :<input type="number" name="amount['+ counter +']" id="customer_comments[]" size="10" > Technical Score :<input type="text" name="score['+ counter +']" id="customer_comments[]" value="" size="5" > Remarks :<input type="text" name="comments['+ counter +']" id="customer_comments[]" value="" size="20" ></br></br>');
		  
		  
 	newTextBoxDiv2.appendTo("#TextBoxesGroup2");
 	counter++;
     });
     $("#removeBelong").click(function () {
	if(counter==2){
          alert("No more textbox to remove");
          return false;
       }   
	counter--;
 
        $("#TextBoxDiv2" + counter).remove();
 
     });
 
     
  });
</script>
<style type="text/css">
    .box{
        padding: 2px;
        display: none;
        margin-top: 0px;
        border: 0px solid #000;
    }
    
</style>
<style type="text/css">

.custom-date-style {
	background-color: red !important;
}

.input{	
}
.input-wide{
	width: 500px;
}



</style>


<style type="text/css">

@import url(calender/calendar-win2k-1.css);

</style>
<form name="emp" action="process_add_tender_activity.php?sub_module_id=<?php echo $sub_module_id; ?>&tender_id=<?php echo $tender_id; ?>" enctype="multipart/form-data" method="post">			
			<table width="80%"  border="1" align="center" bgcolor="#9AD7AF" style="border-radius:5px;">
  <tr bgcolor="#FFFFCC" >
   
	<td colspan="6" height="30" align="">
	<font size="+1">
	<?php
$query_parentt = mysql_query("SELECT * FROM tender where tender_id='$tender_id'") 
or die("Query failed: ".mysql_error());
$rowst=mysql_fetch_object($query_parentt);

echo "<strong>Client Name : </strong>".$rowst->client_name;
echo " </br> ";
echo "<strong>Tender Name: </strong>".$rowst->tender_name;

echo " </br> ";

echo "<strong>Refference No: </strong>".$rowst->ref_no;
	
echo " </br> ";	
	

?> 
</font>

<span style="float:right;"><a style="width:40%; border-radius:5px; color:#fff; text-decoration:none; padding-left:40px; padding-top:5px; padding-bottom:5px; padding-right:40px; background:#ff0000;" href="<?php echo $_SERVER['HTTP_REFERER']; ?>"><< Back</a></span>
</td>
    </tr>

  <tr height="20">
    <td width="10%">&nbsp;</td>
    <td width="15%">Enter Activity Name<font color="#FF0000">*</font></td>
    <td width="10%"><div id='emp_activity_name_errorloc' class="error_strings"></div><input type="text" size="30" value="<?php echo $rows->activity_name;?>" name="activity_name"></td>
    <td width="20%" colspan="2"  valign="top">	

	</td>
    
    <td width="10%"></td>
     <!--<td width="40%" rowspan="7" valign="top"><div id='new_supplier_errorloc' class='error_strings'></div></td>-->
  </tr>
  <tr height="20">
    <td bgcolor="">&nbsp;</td>
    <td width="1%">Date<font color="#FF0000">*</font></td>
    <td width="10%"><div id='emp_opening_date_errorloc' class="error_strings"></div><input  type="text" size="30" id="opening_date" value="<?php echo $rows->activity_date;?>" readonly name="opening_date"></td>
   <td width="40%" colspan="2"  valign="top">	
	
	
	</td>
    
    <td width="10%"></td>
  </tr>
  
   <tr height="20">
    <td bgcolor="">&nbsp;</td>
    <td width="1%">Comments<font color="#FF0000"></font></td>
    <td width="10%"><div id='emp_score_errorloc' class="error_strings"></div><textarea cols="30" name="activity_comments" rows="5"><?php echo $rows->activity_comments;?></textarea></td>
   
    
    <td width="10%"></td>
  </tr>
<tr height="20">
    <td bgcolor="">&nbsp;</td>
    <td width="1%">Uploaded Attachment<font color="#FF0000">*</font></td>
    <td width="10%">
	<?php
	$querycn = "SELECT * FROM tender_activity_uploads where tender_activity_id='$tender_activity_id'";
$resultscn= mysql_query($querycn) or die ("Error $querycn.".mysql_error());
$num_rows_cn=mysql_num_rows($resultscn);

if ($num_rows_cn=mysql_num_rows($resultscn)>0)
{
while ($rowsn=mysql_fetch_object($resultscn))	
{
	
	$file_name=$rowsn->file_name;
	
	if ($num_rows_cn==0)
	{
		echo "<font color='#ff0000' size='-2'>No Document attached</font>";
	}
else
{
	
	if ($file_name=='')
	{
	}
	else
	{
	
	echo $rowsn->file_name.'<a onclick="return confirmDel()" href="delete_tender_activity_uploads.php?tender_activity_upload_id='.$rowsn->tender_activity_upload_id.'&exit_id='.$disc_id.'&sub_module_id='.$sub_module_id.'"><img src="images/delete.png"></a><span style="float:right;"><a title="Download" target="_blank" href="tender_activity_uploads/'.$rowsn->file_name.'"><img src="images/download.png"></a></span></br>';
}	
}		
}
	
	
}
else
{
	
	echo "<i><font color='#ff0000'>No attachment</font></i>";
}
	?>
	</td>
   
    
    <td width="10%"></td>
  </tr>
  
     <tr height="80">
    <td bgcolor="">&nbsp;</td>
    <td width="1%">Attach Document<font color="#FF0000"></font></td>
    <td width="10%"><input type="file" style="width:200px;" name="file[]" multiple="multiple" size="18" /></td>
   
    
    <td width="10%"></td>
  </tr>
  
  
    <tr height="120">
    <td>&nbsp;</td>
    <td valign="top">Participating Firms</td>
    <td colspan="4" align="" valign="top"></br>
	<span style="float:left;"><a  href="#" style="font-weight:bold; background:#ff0000; padding:5px; border-radius:5px; color:#fff;" onClick="window.open('add_bidding_client.php?sub_module_id=<?php echo $sub_module_id; ?>&tender_id=<?php echo $tender_id; ?>','','scrollbars=no,menubar=no,height=300,width=800,top=150,left=200,resizable=yes,toolbar=no,location=no,status=no')">Create New Bidding Company</a></span><span style="float:right;"><input type='button' value='Add More Participating Firms' id='addBelong'>
<input type='button' value='Remove' id='removeBelong'></span>
</br>
</br>
<?php   
$queryy = mysql_query("SELECT * FROM tender_firms WHERE tender_activity_id ='$tender_activity_id' and tender_id='$tender_id'");	
	
	 while($rowss = mysql_fetch_object($queryy)) 
	
	{
	
	$tender_firm_id=$rowss->tender_firm_id;
	
    //echo "<input type='text' name='' value=".$rowss->firm_name.'<a onclick="return confirmDel()" href="delete_firm.php?sub_module_id='.$sub_module_id.'&tender_id='.$tender_id.'&tender_firm_id='.$tender_firm_id.'"><img src="images/delete.png"></a></br>';
	
	?>
	
	Firm 1 : <input type="text" name="customer_item[]" value="<?php echo $rowss->firm_name;?>">
	Remarks 1 : <input type="text" name="customer_comments[]" value="<?php echo $rowss->firm_remarks;?>">
	
	
	<br/><br/>
	
	<?php
	
	
    }   
  ?> 
<div id='TextBoxesGroup2'>
	<div id="TextBoxDiv2">
		Firm 1 : 
		<select name="credit_account_id[1]"  id="account_from" required style="width:100px;">
	
<option value=""><?php echo $credit_account_name; ?></option>

								  <?php
								  
								  $query1="select * from bidding_clients order by client_name asc";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->client_id; ?>"><?php echo $rows1->client_name; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
								  
								  
								  
								  
								  
								  ?>
								  
								  </select>
		Amount Quoted :<input type="number" name="amount[1]" id="customer_comments[]" size="10">
		Technical Score :<input type="textbox" name="score[1]" id="customer_comments[]" size="5">
		Remarks :<input type="textbox" name="comments[1]" id="customer_comments[]" size="20">
		
		</br></br>
	</div>

</div></td>

  </tr>
  
  
  
  <tr height="120">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2" align="center"><input type="submit" name="submit" value="Save Tender Details">&nbsp;&nbsp;<input type="reset" value="Cancel"></td>
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
      inputField  : "opening_date",         // ID of the input field
      ifFormat    : "%Y-%m-%d",    // the date format
      button      : "opening_date"       // ID of the button
    }
  );
  

  </script>
  
  <script language="JavaScript" type="text/javascript"
    xml:space="preserve">//<![CDATA[
//You should create the validator only after the definition of the HTML form
  var frmvalidator  = new Validator("emp");
    frmvalidator.EnableOnPageErrorDisplay();
    frmvalidator.EnableMsgsTogether();
	
 frmvalidator.addValidation("activity_name","req",">>Please enter activity name"); 
  frmvalidator.addValidation("opening_date","req",">>Please enter date");
 frmvalidator.addValidation("score","req",">>Please enter score");
 frmvalidator.addValidation("award","req",">>Please enter award");
 

  

  
//]]></script>

<script>

$('#start_time').datetimepicker({value:'',step:10});
$('#end_time').datetimepicker({value:'',step:10});

</script>


<?php 
//}
?>
