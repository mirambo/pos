<?php 
$bank_id=$_GET['bank_id'];
$querybank=mysql_query("SELECT * FROM employee_bank_details,banks2 WHERE employee_bank_details.bank_id=banks2.Bank_ID AND 
employee_bank_details.bank_details_id='$bank_id'") or die("Query failed: ".mysql_error());
$rowsbank=mysql_fetch_array($querybank);

$br_id=$rowsbank['branch_id'];


$querybank2="select * from bank_branches2 WHERE branch_id='$br_id'";
$resultsbank2=mysql_query($querybank2) or die(mysql_error()); 
$rowprof2=mysql_fetch_array($resultsbank2);


	
//$qualification=$rowsedu['qualification'];	
?>	
<form name="emp" action="process_add_bank_details.php?sub_module_id=<?php echo $sub_module_id; ?>&employee_id=<?php echo $employee_id; ?>&bank_id=<?php echo $bank_id; ?>" enctype="multipart/form-data" method="post">		
  <input type="hidden" name="form_id" value="<?php echo $form_id;?>">      
  <input type="hidden" name="question_type_id" value="<?php echo $qt;?>">      
  <input type="hidden" name="question_no" value="<?php echo $next_question_no;?>">    	
<table class="table table-bordered table-striped hover" width="100%">
<tr><td colspan="5"><h1>Bank Details  </h1></td></tr>
<tr height="40">
    <td width="10%" align="right">Bank Name<font color="#FF0000">*</font></td>
    <td width="10%"><div id='employer' class="error_strings"></div><select id="bank_name" name="bank_name" required required="required" class="form-control" style="width:60%; padding:5px;">
	
	 <option value="<?php echo $rowsbank['Bank_ID']; ?>"><?php echo $rowsbank['Bank_Name'];?></option>
	 <?php 
	$query_qualif = mysql_query("SELECT * FROM banks2 order by Bank_Name asc") or die("Query failed: ".mysql_error());
	while($rows = mysql_fetch_array($query_qualif)): ?>
    <option value="<?php echo $rows['Bank_ID']; ?>"><?php echo $rows['Bank_Name']; ?></option>
    <?php endwhile;  ?>
	</select>
	 </td>
	</tr>
	<tr height="40">
    <td width="10%" align="right">Bank Branch<font color="#FF0000"></font></td>
    <td width="10%"><div id='branch' class="error_strings"></div>
	<select id="branches" name="branch" class="form-control" style="width:60%; padding:5px;">
	 <option value="<?php echo $rowsbank['Branch_ID'];?>"><?php echo $rowprof2['Branch_Name'];?></option>
	</select>
	 <td width="10%"></td>
	 </td>
	</tr>
	<tr height="40">
    <td width="10%" align="right">Account Number<font color="#FF0000">*</font></td>
    <td width="10%"><div id='accountno' class="error_strings"></div><input type="text"   name="accountno" required="required" value="<?php echo $rowsbank['account_no']; ?>" required="required" class="form-control" style="width:60%; padding:5px;">
	 </td>
	</tr>
	<tr height="40">
    <td width="1%" align="right">Attach ATM card copy<font color="#FF0000">*</font></td>
    <td width="10%"><div id='atm' class="error_strings"></div>
	<?php
	
	$atm=$rowsbank['atm_copy'];

	?>
	<span style="float:;">
	
	<?php 
	if ($atm=='')
	{
	//echo "<font size='-2' color='#ff0000'><i>Atm Copy not attached</i></font>";	
		
	}
	else
	{
	
	?>
	
	<a href="<?php echo $atm; ?>"><img src="images/download.png" title="download file"></a>
	
	<?php 
	
	}
	
	?>
	</br>
	<input type="file" style="border: none;" name="atm" />
	
	
	</td>
	</tr>
	
	
	
	
  			
<tr height="40" align="center">
<td  align="right">
</td>
<td align="left" ><input type="submit" name="submit" style="width:100px; height:30px; padding-right:5px; padding-left:5px; border-radius:5px; font-size:12px; font-weight:bold; color:#fff; background:#003399" value="Save Details">
</td>

</tr>			
</table>	
</form>	

<table id="example" class="table table-bordered table-striped hover" width="100%">
                <thead>
				
				<tr bgcolor="#1F8EE7" height="30">
  <td>ID</h1></td>
  <td>Bank Name</h1></td>
  <td>Branch</h1></td>
  <td>Account No</h1></td>
  <td>Atm Copy</h1></td>
   <td>Edit</h1></td>
  <td>Remove</h1></td>
</tr>

</thead>





<?php
/* $querybank="select * from employee_bank_details LEFT JOIN banks ON employee_bank_details.bank_id=banks.bank_id AND employee_bank_details.employee_id='$employee_id'";
$resultsbank=mysql_query($querybank) or die(mysql_error()); */

$querybank="SELECT * FROM employee_bank_details,banks2 WHERE employee_bank_details.bank_id=banks2.Bank_ID AND 
employee_bank_details.employee_id='$employee_id'";
$resultsbank=mysql_query($querybank) or die(mysql_error());
$nums=mysql_num_rows($resultsbank);

while($rowprof=mysql_fetch_array($resultsbank))
{
//var_dump($resultswork);
$id=$rowprof['bank_details_id'];
$cert_name=$rowprof['Bank_Name'];
$br_id=$rowprof['branch_id'];


$querybank2="select * from bank_branches2 WHERE branch_id='$br_id'";
$resultsbank2=mysql_query($querybank2) or die(mysql_error()); 
$rowprof2=mysql_fetch_array($resultsbank2);
$venue=$rowprof2['Branch_Name'];
$sdate=$rowprof['account_no'];

$attachment=$rowprof['atm_copy'];
  ?>
  <tr height="20">
  <td width="2%"><?php echo $count=$count+1; ?></td>
  <td width="15%"><?php echo $cert_name; ?></td>
  <td width="15%"><?php echo $venue; ?></td>
  <td width="10%"><?php echo $sdate; ?></td>

   <td width="15%" align="center">
  <?php

	?>
	<span style=";">
	
	<?php 
	if ($attachment=='')
	{
	echo "<font size='-2' color='#ff0000'><i>Certificate Copy not attached</i></font>";	
		
	}
	else
	{
	
	?>
	
	<a href="<?php echo $attachment; ?>"><img src="images/download.png" title="download file"></a>
	
	<?php 
	
	}
	
	?>
  
  </td>
     <td width="10%" align="center"><a  href="home.php?add_employee=add_employee&sub_module_id=<?php echo $sub_module_id; ?>&qt=10&form_id=&employee_id=<?php echo $employee_id; ?>&bank_id=<?php echo $id; ?>"><img src="images/edit.png"></a></td>
  <td width="10%" align="center"><a onclick="return confirmDel()"  href="delete_bank2.php?sub_module_id=<?php echo $sub_module_id; ?>&bank_id=<?php echo $id; ?>&employee_id=<?php echo $employee_id; ?>"><img src="images/delete.png"></a></td>
   

   </tr>
  <?php
  
  }


 

  ?>
 
    </table>	
	
<?php
