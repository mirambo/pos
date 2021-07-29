<?php


$sqlj="SELECT * from quotation where quotation_id='$get_quotation_id'";
$resultsj= mysql_query($sqlj) or die ("Error $sqlj.".mysql_error());
$rowsj=mysql_fetch_object($resultsj);



if (isset($_POST['update_job_card']))
{

assign_sub_project_location2($job_card_id,$customer_id,$start_date,$end_date,
$start_from,$technician_id,$service_item_id,$service_item_name,$service_desc,
$unit_cost,$currency,$quantity,$amount_paid,$user_id);
}
 ?>
 
 <link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<script src="lib/jquery.js" type="text/javascript"></script>
<script src="src/facebox.js" type="text/javascript"></script>
  <script type="text/javascript">
	jQuery(document).ready(function($) {
	  $('a[rel*=facebox]').facebox({
		loadingImage : 'src/loading.gif',
		closeImage   : 'src/closelabel.png'
	  })
	})
  </script>
<script src="js/application.js" type="text/javascript" charset="utf-8"></script>

<h3 align="center">View Quotation Details<a style="float:right; margin-right:200px;" href="home.php?submit_biweekly=submit_biweekly">New Quotation</a></h3>
	
<form name="search" method="post" action="">
 
<table width="95%" border="1" align="center">
<tr bgcolor="#FFFFCC" height="20" style="display:none;"><td colspan="10" align="center" ><?php

if ($_GET['addconfirm']==1)
echo '<div align="center" style="background: #009900; height:20px; width:400px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ffffff" >Job Card Created Successfully!!</font></strong></p></div>';

if ($_GET['addtaskconfirm']==1)
echo '<div align="center" style="background: #009900; height:20px; width:400px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ffffff" >More task added successfully!!</font></strong></p></div>';


if ($_GET['editaskconfirm']==1)
echo '<div align="center" style="background: #009900; height:25px; width:400px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ffffff" >Job Card Task Updated Successfully!!</font></strong></p></div>';

if ($_GET['deletetaskconfirm']==1)
echo '<div align="center" style="background: #ff0000; height:25px; width:400px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ffffff" >Job Card Task Deleted Successfully!!</font></strong></p></div>';


if ($_GET['editpartconfirm']==1)
echo '<div align="center" style="background: #009900; height:20px; width:400px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ffffff" >Job Card Items Updated Successfully!!</font></strong></p></div>';

if ($_GET['addpartconfirm']==1)
echo '<div align="center" style="background: #009900; height:20px; width:400px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ffffff" >More Job Card Items Added Successfully!!</font></strong></p></div>';


if ($_GET['addbelongconfirm']==1)
echo '<div align="center" style="background: #009900; height:20px; width:400px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ffffff" >More Customer Belonging Added Successfully!!</font></strong></p></div>';



if ($_GET['deletepartconfirm']==1)
echo '<div align="center" style="background: #ff0000; height:25px; width:400px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ffffff" >Part Deleted Successfully from the job card!!</font></strong></p></div>';

if ($_GET['deletebelongconfirm']==1)
echo '<div align="center" style="background: #ff0000; height:25px; width:400px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ffffff" >Customer belonging deleted successfully from the job card!!</font></strong></p></div>';


if ($_GET['editjobcardconfirm']==1)
echo '<div align="center" style="background: #009900; height:20px; width:400px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ffffff" >Job Card Details Updated Successfully!!</font></strong></p></div>';

if ($_GET['editbelongconfirm']==1)
echo '<div align="center" style="background: #009900; height:20px; width:400px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ffffff" >Customer Belongings Details Updated Successfully!!</font></strong></p></div>';


if ($_GET['editsuccess']==1)
echo '<div align="center" style="background: #009900; height:25px; width:400px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ffffff" >Job Card Updated Successfully!!</font></strong></p></div>';


?>
<?php

if ($_GET['delete']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Record Deleted Successfully!!</font></strong></p></div>';
?>

 
<tr bgcolor="#cccccc">
<td width="10%">&nbsp;</td>
<td width="10%"><?php 

$customer_id=$rowsj->customer_id;
$queryc="select * from customer where customer_id='$customer_id'";
$resultsc=mysql_query($queryc) or die ("Error: $queryc.".mysql_error());								  
$rowsc=mysql_fetch_object($resultsc);






?>
Select Customer : </br><select name="customer_id">
	<option value="<?php echo $rowsc->customer_id;?>"><?php echo $rowsc->customer_name; ?></option>
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
									  
									  
								  
								  
								  
								  
								  
								  ?></select>

</td>
<td>

<?php 

	
?>
Quotation Date : <input type="text" name="date_from" size="20" id="date_from" value="<?php echo $rowsj->quotation_date;?>" readonly="readonly" />
Quotation No : <input type="textbox" readonly size="20" value="<?php echo $get_quotation_id;?>" name="job_card_id"></br>
<?php 
 
 $curr_id=$rowsj->currency;
$querytc="select * from currency where curr_id='$curr_id'";
$resultstc=mysql_query($querytc) or die ("Error: $querytc.".mysql_error());								  
$rowstc=mysql_fetch_object($resultstc);

?>

</br>
Select Currency

 
 <select name="currency" id="parent_cat">
	<option value="<?php echo $curr_id;?>"><?php echo $rowstc->curr_name; ?></option>
    <?php 
	$query_parent = mysql_query("SELECT * FROM currency order by curr_name asc") or die("Query failed: ".mysql_error());
	while($row = mysql_fetch_array($query_parent)): ?>
    <option value="<?php echo $row['curr_id']; ?>"><?php echo $row['curr_name']; ?></option>
    <?php endwhile; ?>
    </select>

</td>
<td width="10%">&nbsp;</td>

</tr>


<tr>
<td>&nbsp;</td>
<td colspan="3">
 <table class="table">
<tr style="background:url(images/description.gif);" height="20" align="center">
<td width="20%"><strong>Service Item</strong></td>
<td width="10%"><strong>Description<strong></td>
<td width="10%"><strong>Quantity<strong></td>
<td width="15%"><strong>Unit Cost (<span id="sub_cat2"><?php echo $rowstc->curr_name; ?></span>)<strong></td>
<td width="15%"><strong>Total Cost (<span id="sub_cat3"><?php echo $rowstc->curr_name; ?></span>)<strong></td>


</td>



</tr>
<?php
$task_totals=0;
$sqlts="SELECT * from quotation_task where quotation_id='$get_quotation_id' order by quotation_task_id asc";
$resultsts= mysql_query($sqlts) or die ("Error $sqlts.".mysql_error());
if (mysql_num_rows($resultsts) > 0)
						  {
						  while ($rowsts=mysql_fetch_object($resultsts))
						  {
?>





        <tr class="txtMult" height="20" align="center" bgcolor="#FFFF66">
		<td width="20%">
		<?php  $rowsts->quotation_task_id;?>
		<input type="checkbox" checked name="quotation_task_id[]" value="<?php echo $rowsts->quotation_task_id;?>" style="display:none;">
		
		
		
		
		<?php 
 
 $service_id=$rowsts->service_item_id;
$querytcs="select * from service_item where service_item_id='$service_id'";
$resultstcs=mysql_query($querytcs) or die ("Error: $querytc.".mysql_error());								  
$rowstcs=mysql_fetch_object($resultstcs);

?>
		
		
		<select name="service_item_id[]" style="width:150px;">
		<option value="<?php echo $service_id?>"><?php echo $rowstcs->service_item_name; ?></option>
		<option value="0">Remove.....................</option>
		
		
		<?php $query1="select * from service_item order by service_item_name asc"; 
		$results1=mysql_query($query1) or die ("Error: $query1.".mysql_error()); 
		if (mysql_num_rows($results1)>0)
		{ while ($rows1=mysql_fetch_object($results1))
		{ ?> <option value="<?php echo $rows1->service_item_id; ?>">
		
		<?php echo $rows1->service_item_name; ?> </option>
		<?php 
		} 
		} 
		
		?></select></td>
        <td width="10%"><input type="textbox" size="30" name="remarks[]" value="<?php echo $rowsts->description;?>"></td>   
		   <td>
                <input name="quantity[]" class="val1" size="10" value="<?php echo $quantity=$rowsts->quantity;?>"/>
            </td>
            <td>
                <input name="unit_cost[]" class="val2" size="20" value="<?php echo $unit_cost=$rowsts->unit_cost;?>"/>
            </td>
            <td>
                   <strong> <span class="multTotal"><?php echo $amount=$quantity*$unit_cost; 
				   $task_totals=$task_totals+$amount;
				   
				   
				   ?></span><strong>
            </td>
        </tr>
<?php 
}}

?>		
		
		
		
		
		
		
		
		
		
		
       <tr class="txtMult" height="20" align="center" bgcolor="#FFFF66">
		<td width="20%"><select name="service_item_id[]" style="width:150px;"><option value="0">Select...........................</option><?php $query1="select * from service_item order by service_item_name asc"; $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error()); if (mysql_num_rows($results1)>0) { while ($rows1=mysql_fetch_object($results1)) { ?> <option value="<?php echo $rows1->service_item_id; ?>"><?php echo $rows1->service_item_name; ?> </option> <?php  } } ?></select></td>
        <td width="10%"><input type="textbox" size="30" name="remarks[]"></td>   
		    <td>
                <input name="quantity[]" class="val1" size="10" />
            </td>
            <td>
                <input name="unit_cost[]" class="val2" size="20" />
            </td>
            <td>
                   <strong> <span class="multTotal">0.00</span><strong>
            </td>
        </tr>
         <tr class="txtMult" height="20" align="center" bgcolor="#FFFF66">
		<td width="20%"><select name="service_item_id[]" style="width:150px;"><option value="0">Select...........................</option><?php $query1="select * from service_item order by service_item_name asc"; $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error()); if (mysql_num_rows($results1)>0) { while ($rows1=mysql_fetch_object($results1)) { ?> <option value="<?php echo $rows1->service_item_id; ?>"><?php echo $rows1->service_item_name; ?> </option> <?php  } } ?></select></td>
        <td width="10%"><input type="textbox" size="30" name="remarks[]"></td>   
		    <td>
                <input name="quantity[]" class="val1" size="10" />
            </td>
            <td>
                <input name="unit_cost[]" class="val2" size="20" />
            </td>
            <td>
                  <strong>  <span class="multTotal">0.00</span><strong>
            </td>
        </tr>
        <tr class="txtMult" height="20" align="center" bgcolor="#FFFF66">
		<td width="20%"><select name="service_item_id[]" style="width:150px;"><option value="0">Select...........................</option><?php $query1="select * from service_item order by service_item_name asc"; $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error()); if (mysql_num_rows($results1)>0) { while ($rows1=mysql_fetch_object($results1)) { ?> <option value="<?php echo $rows1->service_item_id; ?>"><?php echo $rows1->service_item_name; ?> </option> <?php  } } ?></select></td>
        <td width="10%"><input type="textbox" size="30" name="remarks[]"></td>   
		   <td>
                <input name="quantity[]" class="val1" size="10" />
            </td>
            <td>
                <input name="unit_cost[]" class="val2" size="20" />
            </td>
            <td>
                  <strong>  <span class="multTotal">0.00</span><strong>
            </td>
        </tr>
      <tr class="txtMult" height="20" align="center" bgcolor="#FFFF66">
		<td width="20%"><select name="service_item_id[]" style="width:150px;"><option value="0">Select...........................</option><?php $query1="select * from service_item order by service_item_name asc"; $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error()); if (mysql_num_rows($results1)>0) { while ($rows1=mysql_fetch_object($results1)) { ?> <option value="<?php echo $rows1->service_item_id; ?>"><?php echo $rows1->service_item_name; ?> </option> <?php  } } ?></select></td>
        <td width="10%"><input type="textbox" size="30" name="remarks[]"></td>   
		   <td>
                <input name="quantity[]" class="val1" size="10" />
            </td>
            <td>
                <input name="unit_cost[]" class="val2" size="20" />
            </td>
            <td>
                  <strong>  <span class="multTotal">0.00</span><strong>
            </td>
        </tr>
		<tr class="txtMult" height="20" align="center" bgcolor="#FFFF66">
		<td width="20%"><select name="service_item_id[]" style="width:150px;"><option value="0">Select...........................</option><?php $query1="select * from service_item order by service_item_name asc"; $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error()); if (mysql_num_rows($results1)>0) { while ($rows1=mysql_fetch_object($results1)) { ?> <option value="<?php echo $rows1->service_item_id; ?>"><?php echo $rows1->service_item_name; ?> </option> <?php  } } ?></select></td>
        <td width="10%"><input type="textbox" size="30" name="remarks[]"></td>   
		   <td>
                <input name="quantity[]" class="val1" size="10" />
            </td>
            <td>
                <input name="unit_cost[]" class="val2" size="20" />
            </td>
            <td>
                  <strong>  <span class="multTotal">0.00</span><strong>
            </td>
        </tr>
		<tr class="txtMult" height="20" align="center" bgcolor="#FFFF66">
		<td width="20%"><select name="service_item_id[]" style="width:150px;"><option value="0">Select...........................</option><?php $query1="select * from service_item order by service_item_name asc"; $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error()); if (mysql_num_rows($results1)>0) { while ($rows1=mysql_fetch_object($results1)) { ?> <option value="<?php echo $rows1->service_item_id; ?>"><?php echo $rows1->service_item_name; ?> </option> <?php  } } ?></select></td>
        <td width="10%"><input type="textbox" size="30" name="remarks[]"></td>   
		   <td>
                <input name="quantity[]" class="val1" size="10" />
            </td>
            <td>
                <input name="unit_cost[]" class="val2" size="20" />
            </td>
            <td>
                  <strong>  <span class="multTotal">0.00</span><strong>
            </td>
        </tr>
	  
	  
	  
	  
	  
	  
	  
            <tr>
 <td><strong>Payments Terms And Condition:</strong><br/>
 <textarea rows="2" cols="50" name="gen_remarks"><?php echo $rowsj->terms; ?></textarea></td>
    <td  align="right" colspan="4">
       <strong><font size="+1" color="#000000"> Grand Total (<span id="sub_cat23"><?php echo $rowstc->curr_name; ?></span>): </strong><span id="grandTotal"><?php echo $task_totals; ?></span></font>
	   
	   
    </td>

</tr>	




 
</table>       
        
 




<td valign="top" width="200" align="center">

<br></br>
	
	
	
	<a target="_blank" style="background:#2E3192; padding-left:25px; padding-right:15px; padding-top:5px; padding-bottom:5px; font-size:12px; color:#ffffff; font-weight:bold; width:200px; height:30px; border-radius:5px;" href="print_quotation.php?quotation_id=<?php echo $get_quotation_id;?>">Print Quotation</a>	</br></br>

</td>


<tr bgcolor="#cccccc"><td colspan="6" align="center"><input type="submit" name="submit" value="Save / Update" style="background:#009900; font-size:13px; color:#ffffff; font-weight:bold; width:200px; height:30px; border-radius:5px;">
	<input type="hidden" name="update_job_card" id="update_job_card" value="1">&nbsp;&nbsp;</td></tr>


</tr>

 
	
	
	
</table>
</form>



</td></tr>





