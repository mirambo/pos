<?php
if ($sess_allow_add==0)
{
include ('includes/restricted.php');
}
else
{
 ?>
<?php
if(isset($_GET['subDELETECountry']))
  { 
$country_id=$_GET['country_id'];
delete_country($country_id);
  }
$cat=$_GET['cat'];
?>
<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>
<script type="text/javascript" src="calender/calendar.js"></script>
<script type="text/javascript" src="calender/lang/calendar-en.js"></script>
<script type="text/javascript" src="calender/calendar-setup.js"></script>
<script type="text/javascript" src="jquery-1.3.2.min.js"></script>
<!--<script type="text/javascript" src="jquery-1.8.3.js"></script>-->

<script src="js/jquery-1.10.2.min.js"></script>	
		<script src="js/jquery-ui-1.10.3.custom.min.js"></script>
		<script src="js/bootstrap.min.js"></script>	
		<link rel="stylesheet" href="css/jquery-ui-1.10.3.custom.min.css" />
		
		
			
		

<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>

<style type="text/css">

@import url(calender/calendar-win2k-1.css);
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

</style>



<script type="text/javascript">
        

function confirmDelete()
{
    return confirm("Are you sure you want to delete?");
}

</script>

<script type="text/javascript"> 
  $(document).ready(function () {
       $(".txtMult input").keyup(multInputs);

       function multInputs() 
	   {
           var mult = 0;
           var mult1 = 0;
           var mult2 = 0;
           var mult3 = 0;
           // for each row:
           $("tr.txtMult").each(function () {
               // get the values from this row:
               var $val1 = $('.val1', this).val();
               var $val2 = $('.val2', this).val();
               var $val3 = $('.val3', this).val();
               var $total = ($val1 * 1) * ($val2 * 1);//total value ie (multiple quantity by unit cost)
               var $total1 = ($val1 * 1) * ($val2 * 1); //total value ie (multiple quantity by unit cost)
               var $total2 = ($val1 * 1) * ($val2 * 1) / ($val3 * 1); // converting total ssp to dolar
               var $total3 = ($val2 * 1) / ($val3 * 1); // converting unit cost from ssp to dolar
               $('.multTotal',this).text($total);
               $('.multTotal1',this).text($total1);
               $('.multTotal2',this).text($total2);
               $('.multTotal3',this).text($total3);
               mult += $total;
               mult1 += $total1;
               mult2 += $total2;
               mult3 += $total3;
               mult4 += $total3/4;
			   
			   
           });
           $("#grandTotal").text(mult);
           $("#grandTotal2").text(mult2);
       }
  }); 
  
  
  
 


</script>

 <form name="search" method="post" action="">
 
 
<table width="100%" border="1" >
  <tr bgcolor="#FFFFCC">
   
    <td colspan="9" height="30" align="center"> 
	<?php

if ($_GET['updateuserconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:550px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Updated Successfully!!</font></strong></p></div>';
?> 

<?php 

if ($_GET['delete']==1)
echo "<p align='center'><strong><font color='#FF0000'>Record Deleted!!</font></strong></p>";
?>
	
	</td>
	
    </tr>
<tr  >
<td width="10%"></td>
<td>Select Customer : <select name="cat_id">
	<option value="0">Select.........................</option>
								  <?php
								  
								  $query1="select * from customer order by customer_name asc";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->customer_id;?>"><?php echo $rows1->customer_name; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
									  
									  
								  
								  
								  
								  
								  
								  ?></select><a href="#">New</a><br/>
					Customer Name :</br>
					Phone Number :
								  
								  
								  
								  </td>
<td>
Start Date : <input type="textbox" size="20">
End Date : <input type="textbox" size="20"><br/><br/>
Job Card No : <input type="textbox" size="20">
Starting From : <input type="textbox" size="20">

</td>
<td>Assign Technician : <select name="technician_id"><option value="0">Select...........................</option><?php $query1="select * from users where user_group_id='30' order by f_name asc"; $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error()); if (mysql_num_rows($results1)>0) { while ($rows1=mysql_fetch_object($results1)) { ?> <option value="<?php echo $rows1->user_id; ?>"><?php echo $rows1->f_name; ?> </option> <?php  } } ?></select><a href="#">New</a><br/>
</br>Select Currency<select name="currency" style="width:150px;"><option value="0">Select...........................</option><?php $query1="select * from currency order by curr_name asc"; $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error()); if (mysql_num_rows($results1)>0) { while ($rows1=mysql_fetch_object($results1)) { ?> <option value="<?php echo $rows1->curr_id; ?>"><?php echo $rows1->curr_name; ?> </option> <?php  } } ?></select>

</br></br>Exchange Rate (To USD) : <input type="textbox" size="10" name="curr_rate" class="val3" value="10">
</td>
<td width="10%">&nbsp;</td>
</tr>

<tr>
<td>&nbsp;</td>
<td colspan="3">

<table width="100%" class="table" id="myTable">

<tr style="background:url(images/description.gif);" height="20" align="center">
<td width="20%"><strong>Service Item</strong></td>
<td width="10%"><strong>Remarks<strong></td>
<td width="10%"><strong>Quantity<strong></td>
<td width="15%"><strong>Unit Cost (SSP)<strong></td>
<td width="15%"><strong>Total Cost (SSP)<strong></td>


</td>



</tr>


<tr height="20" align="center" bgcolor="#FFFF66" class="txtMult">
<td width="20%"><select name="service_id[]" style="width:150px;"><option value="0">Select...........................</option><?php $query1="select * from service_item order by service_item_name asc"; $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error()); if (mysql_num_rows($results1)>0) { while ($rows1=mysql_fetch_object($results1)) { ?> <option value="<?php echo $rows1->service_item_id; ?>"><?php echo $rows1->service_item_name; ?> </option> <?php  } } ?></select><a href="#">New</a></td>
<td width="10%"><input type="textbox" size="10" name="remarks[]">
<td width="10%"><input  type="textbox" size="10" name="unit_cost[]"  class="val1"></td>
<td width="15%"><input  type="textbox" size="10" name="mix_unit_cost[]"  class="val2">

</td>

<td width="15%"><span class="multTotal1">0.00</span></td>









</tr>
<tr height="20" align="center" bgcolor="#FFFF66" class="txtMult">
<td width="20%"><select name="service_id[]" style="width:150px;"><option value="0">Select...........................</option><?php $query1="select * from service_item order by service_item_name asc"; $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error()); if (mysql_num_rows($results1)>0) { while ($rows1=mysql_fetch_object($results1)) { ?> <option value="<?php echo $rows1->service_item_id; ?>"><?php echo $rows1->service_item_name; ?> </option> <?php  } } ?></select><a href="#">New</a></td>
<td width="10%"><input type="textbox" size="10" name="remarks[]">
<td width="10%"><input  type="textbox" size="10" name="unit_cost[]"  class="val1"></td>
<td width="15%"><input  type="textbox" size="10" name="mix_unit_cost[]"  class="val2">

</td>

<td width="15%"><span class="multTotal1">0.00</span></td>








</tr>
<tr height="20" align="center" bgcolor="#FFFF66" class="txtMult">
<td width="20%"><select name="service_id[]" style="width:150px;"><option value="0">Select...........................</option><?php $query1="select * from service_item order by service_item_name asc"; $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error()); if (mysql_num_rows($results1)>0) { while ($rows1=mysql_fetch_object($results1)) { ?> <option value="<?php echo $rows1->service_item_id; ?>"><?php echo $rows1->service_item_name; ?> </option> <?php  } } ?></select><a href="#">New</a></td>
<td width="10%"><input type="textbox" size="10" name="remarks[]">
<td width="10%"><input  type="textbox" size="10" name="unit_cost[]"  class="val1"></td>
<td width="15%"><input  type="textbox" size="10" name="mix_unit_cost[]"  class="val2">

</td>

<td width="15%"><span class="multTotal1">0.00</span></td>








</tr>
<script type="text/javascript"> 

 /* function displayResult()
        {
            document.getElementById("myTable").insertRow(-1).innerHTML = '<tr><td align="center" bgcolor="#FFFF66" width="20%"><select name="service_id[]" style="width:150px;"><option value="0">Select...........................</option><?php $query1="select * from service_item order by service_item_name asc"; $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error()); if (mysql_num_rows($results1)>0) { while ($rows1=mysql_fetch_object($results1)) { ?> <option value="<?php echo $rows1->service_item_id; ?>"><?php echo $rows1->service_item_name; ?> </option> <?php  } } ?></select><a href="#">New</a></td><td align="center" bgcolor="#FFFF66"><input type="textbox" size="10" name="remarks[]"></td><td align="center" bgcolor="#FFFF66"><input type="textbox" size="10" name="quantity[]" class="val1"></td><td align="center" bgcolor="#FFFF66"><input type="textbox" size="10" name="mix_unit_cost[]" class="val2"></td><td width="15%"><span class="multTotal3">0.00</span></td><td width="15%"><span class="multTotal1">0.00</span></td><td width="15%"><span class="multTotal2">0.00</span></td></tr>';
        }
  */

 </script>


 
</table>       
        
 




<td valign="top"><button type="button" onclick="displayResult()">Add More Item</button> 


<!--<input type="text" id="total_amount" name="total_amount"  value="" placeholder="Total Amount">-->
</td>





</tr>

 <tr>
 <td>&nbsp;</td>
    <td  align="right" colspan="3">
       <strong><font size="+1" color="#000000"> Grand Total (SSP): </strong><span id="grandTotal">0.00</span></font><br/>
	   
	    <strong><font size="+1" color="#ff0000"> Grand Total (USD): </strong><span id="grandTotal2">0.00</span></font>
	   
	   
    </td>
	<td>&nbsp;</td>
</tr>	
	
	
	
</table>
</form>


<script src="js/auto.js"></script>


   <?php }?>

