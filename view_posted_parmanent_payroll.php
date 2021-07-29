<?php

if ($sess_allow_view==0)
{
include ('includes/restricted.php');
}
else
{
 ?><?php
if(isset($_GET['subDELETEsettlement']))
  { 
$settlement_id=$_GET['settlement_id'];
 delete_settlement($settlement_id);
  }
  
$supplier=$_POST['location_id'];
$shop_id=$_POST['shop_id'];
$date_from=$_POST['from'];
$date_to=$_POST['to'];

include ('top_grid_includes.php'); 

?>

<script type="text/javascript"> 

function confirmDelete()
{
    return confirm("Are you sure you want to cancel this invoice?");
}

</script>


<script src="js/application.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript" src="calender/calendar.js"></script>
<script type="text/javascript" src="calender/lang/calendar-en.js"></script>
<script type="text/javascript" src="calender/calendar-setup.js"></script>
<style type="text/css">

@import url(calender/calendar-win2k-1.css);

</style>


<form name="search" method="post" action=""> 
<table width="100%" border="0">
  <tr bgcolor="#FFFFCC">
   
    <td colspan="11" height="30" align="center"> 
	<?php

if ($_GET['cancelconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:550px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Invoice No. '.$_GET['invoice_no']. ' Cancelled Successfully!!</font></strong></p></div>';
?> 

<?php 

if ($_GET['deleteconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:550px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Record Deleted Successfully!!</font></strong></p></div>';
?>
	
	</td>
	
    </tr>
	<!--<tr height="30" bgcolor="#FFFFCC">
   

    <td  colspan="11" align="center">   <strong>Search By Employee<font color="#FF0000">* </font></strong>
	<select name="location_id"><option value="0">Select..........................................................</option>
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
								  

	
<strong>Or By Shop </strong>
	
	
	
	<select name="shop_id">
	<option value="0">-------------------Select-----------------</option>
								  <?php
								  
								  $query1="select * from account where account_type_id='10' order by account_name asc";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->account_id; ?>"><?php echo $rows1->account_name; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
								  
								  
								  
								  
								  
								  ?>
								  
								  </select>
								  
							
	<strong>Or By Date</strong>
						<strong>From : </strong><input type="text" name="from" size="30" id="from" readonly="readonly" /><strong>To:</strong>
		<input type="text" name="to" size="25" id="to" readonly="readonly" />							  
								  		  
								  
<input type="submit" name="generate" value="Generate">	

<a target="_blank" style="float:right; margin-right:200px; font-weight:bold; font-size:13px; color:#000000" href="print_list_invoice_sales_approved.php?location_id=<?php echo $supplier; ?>&from=<?php echo $date_from ?>&to=<?php echo $date_to; ?>">Print</a>						  
							  
								  
								  </td>
    
  </tr>-->
  
  </table>
  
  	<table width="99%" border="0" align="center" bgcolor="#9AD7AF" class="display nowrap" style="border-radius:5px;" id="example">	

    <thead>

  
  <tr  style="background:url(images/description.gif);" height="30" >
  
    <td align="center" width="150"><strong>No</strong></td>   
    <td align="center" width="150"><strong>Payslip No</strong></td>
    <td align="center" width="150"><strong>Emp No</strong></td>
<td align="center" width="300"><strong>Employee Name</strong></td>  
<td align="center" width="150"><strong>Payroll Month </strong></td> 
    <td align="center" width="150"><strong>Basic Pay</strong></td>
    <td align="center" width="150"><strong>Allowances/Allowances</strong></td>
    <td align="center" width="150"><strong>Deductions</strong></td>
    <td align="center" width="150"><strong>Net Pay</strong></td>
	<td align="center" width="150"><strong>Generated By</strong></td>    
    <td align="center" width="150"><strong>View Details</strong></td>
<td align="center" width="150"><strong>Edit</strong></td>      
<!--<td align="center" width="150"><strong>Delete</strong></td> -->     

    </tr>
    </thead>


 <?php 
 $job_card_ttl=0;
 $inv_ttl=0;
 $gnd_bal=0;

 if (!isset($_POST['generate']))
{

$querydc="SELECT *,hs_hr_employee.employee_id as staff_no FROM payroll_code, hs_hr_employee where 
payroll_code.employee_id=hs_hr_employee.emp_number 
AND payroll_code.payroll_type='P' order by emp_firstname asc";
$resultsdc= mysql_query($querydc) or die ("Error $sql.".mysql_error());
}
else
{
$supplier=$_POST['location_id'];
$shop_id=$_POST['shop_id'];
echo $date_from=$_POST['from'];
echo $date_to=$_POST['to'];

$querydc= "SELECT *,hs_hr_employee.employee_id as staff_no FROM payroll_code, hs_hr_employee";
    $conditions = array();
    if($supplier!=0) 
	
	{
	
    $conditions[] = "sales.customer_id='$supplier'";
	
    }
	

	

	if($date_from!='' && $date_to!='' ) {
	
       $conditions[] = " sales.sale_date>='$date_from' AND sales.sale_date<='$date_to'";
    }
	
	
	

    //$sql = $query;
    if (count($conditions) > 0) {
      $querydc .= " WHERE " . implode(' AND ', $conditions)." and payroll_code.employee_id=hs_hr_employee.emp_number 
AND payroll_code.payroll_type='P' order by emp_firstname asc";
    }
	else
	{	
	
$querydc="SELECT *,hs_hr_employee.employee_id as staff_no FROM payroll_code, hs_hr_employee where 
payroll_code.employee_id=hs_hr_employee.emp_number 
AND payroll_code.payroll_type='P' order by emp_firstname asc";
$resultsdc= mysql_query($querydc) or die ("Error $sql.".mysql_error());

	}

    $resultsdc = mysql_query($querydc) or die ("Error $querydc.".mysql_error());


}


 ////send of super dmin

 


if (mysql_num_rows($resultsdc) > 0)
						  {
							  $RowCounter=0;
							  while ($rows=mysql_fetch_object($resultsdc))
							  { 
							  
							  $RowCounter++;
							  if($RowCounter % 2==0)
{
echo '<tr bgcolor="#C0D7E5" height="25">';
}
else 
{
echo '<tr bgcolor="#FFFFCC" height="25" >';
}
 
 
 ?>

  
   

<?php $payroll_code_id=$rows->payroll_code_id;?>
    <td><?php echo $count=$count+1; ?></td>
	
	<td><?php echo $rows->payroll_no; ?></td>
	<td><?php echo $rows->staff_no; ?></td>
	<td><?php echo $rows->emp_firstname.' '.$rows->emp_father_name.' '.$rows->emp_lastname; ?></td>
	<td><?php echo $rows->payroll_month.'-'.$rows->payroll_year; ?></td>


  
    <td align="right"><?php echo number_format($basic_pay=$rows->basic_pay,2);
	
	$ttl_basic_pay=$ttl_basic_pay+$basic_pay;
	
	?></td>
    <td align="right">
<?php 

include('allowances_value.php');

$grnd_ttl_all=$grnd_ttl_all+$ttl_employee_allowance;
?>
	
	
	</td>
    <td align="right"><?php 

	
	
	
	include ('deductions_value.php');
	
	
$grnd_ttl_ded=$grnd_ttl_ded+$ttl_emp_deductions;	
	
	?></td>
    <td align="right"><strong>
	
	<?php 
	
	echo number_format($net_pay=$basic_pay+$ttl_employee_allowance-$ttl_emp_deductions,2);
	
	

	
	?>
	
	</strong>
	</td>
	
	<td>
	<i><font size="-2">
	<?php $gen_by=$rows->recorded_by;
$sqlst="SELECT * FROM  users where user_id='$gen_by'";
$resultst= mysql_query($sqlst) or die ("Error $sqlst.".mysql_error());	
$rowst=mysql_fetch_object($resultst);	
echo $rowst->f_name;
	?>
	
	</font></i>
	
	</td>
	
		<td align="center"><a href="home.php?view_payroll_perm_details&payroll_code_id=<?php echo $payroll_code_id;?>">View Details</a></td>
		<td align="center"><a href="home.php?post_payroll&payroll_code_id=<?php echo $payroll_code_id;?>"><img src="images/edit.png"></a></td>

   

	

	
	
	
	

	


 <!--<td align="right"><a href="delete_payroll.php?payroll_code_id=<?php echo $rows->payroll_code_id;?>" onClick="return confirmDelete();"><img src="images/delete.png"></a></td>-->

 <!--<td></td>-->
	
   
    </tr>

  <?php 
  
  }
  
  ?>
  <tr bgcolor="#FFFFCC">


  <td></td>
    <td>Total</td>
  <td></td>
    <td></td>
    <td></td>
 
  <td align="right"><strong><font size="" color="#ff0000"><?php echo number_format($ttl_basic_pay,2); ?></font></strong></td>
  <td align="right"><strong><font size="" color="#ff0000"><?php echo number_format($grnd_ttl_all,2); ?></font></strong></td>
  <td align="right"><strong><font size="" color="#ff0000"><?php echo number_format($grnd_ttl_ded,2); ?></font></strong></td>
  <td align="right"><strong><font size="" color="#ff0000"><?php echo number_format($grnd_net_pay=$ttl_basic_pay+$grnd_ttl_all-$grnd_ttl_ded,2); ?></font></strong></td>

 <td></td>


   
  <td></td>
  <td></td>



 
  
  </tr>
  <?php
  
  }
  
  else 
  
  {
  ?>
  
  <tr bgcolor="#FFFFCC" height="30"><td colspan="11" align="center"><font color="#ff0000"><strong>No Results found!!</strong></font></td></tr>
  
  <?php 
  
  
  }
  
  
  ?>
  
  </table>
   </td></tr>	 
  
  
  
  
  
  
</table>
</form>
<script type="text/javascript">
/*   Calendar.setup(
    {
      inputField  : "from",         // ID of the input field
      ifFormat    : "%Y-%m-%d",    // the date format
      button      : "from"       // ID of the button
    }
  );
  
  Calendar.setup(
    {
      inputField  : "to",         // ID of the input field
      ifFormat    : "%Y-%m-%d",    // the date format
      button      : "to"       // ID of the button
    }
  ); */
  
  
  
  </script> 
 <?php }?>