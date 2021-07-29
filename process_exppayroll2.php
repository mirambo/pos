<?php 
$emp_id=$_GET['emp_id']; 
$curr_rate=$_GET['curr_rate'];

$gen_month=(Date("F Y"));

?>
<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>

<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>


<form name="emp" id="emp" action="processaddpaydetexp.php?emp_id=<?php echo $emp_id;?>" method="post">
<table width="90%" border="0">
			
 <tr height="10">
    <td width="10%">&nbsp;</td>
	<td colspan="2" height="10" align="center"><?php

if ($_GET['empeditconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:500px; border:#339900 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#339900" >Employee Details Updated Successfully!!</font></strong></p></div>';
?>

<?php

if ($_GET['passwordmissmatchconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry Password do not match!!</font></strong></p></div>';
?>

<?php

if ($_GET['recordexist']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! Salary already processed</font></strong></p></div>';
?></td>
    </tr>
	
	<tr height="20">
	<td>&nbsp;</td>
	<td colspan="2" ><h3>Add Employee Payroll Information </h3></td>
    
    <td>&nbsp;</td>
    </tr>
	<tr height="20">
	<td>&nbsp;</td>
	<td colspan="2" ><h4>Payment Details </h4></td>
    
    <td>&nbsp;</td>
    </tr>
  <tr height="10">
    <td width="5%"><input type="hidden" size="41" name="curr_rate" value="<?php echo $curr_rate=$_GET['curr_rate']; ?>">
	<input type="hidden"  name="comp_sic_rate" value="<?php 
	
echo $comp_sic=0.17;
?>">
	
	
	
	</td>
    <td width="20%">Net Pay Standard<font color="#FF0000">*</font></td>
    <td bgcolor=""><input type="text" size="41" name="net_pay" value="
	<?php 
$sqlbs="SELECT * FROM salary_details WHERE emp_id='$emp_id'";
$resultsbs= mysql_query($sqlbs) or die ("Error $sqlbs.".mysql_error());
$rowsbs=mysql_fetch_object($resultsbs);
	echo $basic_pay=$rowsbs->gross_pay;?>"></td>
	
	<td width="20%" rowspan="4" align="center">
	
	
	
	<?php
$sqlbsz="SELECT * FROM employees WHERE staff_type='2'";
$resultsbsz= mysql_query($sqlbsz) or die ("Error $sqlbsz.".mysql_error());
//$rowsbsz=mysql_fetch_object($resultsbsz);
 $rowsbsz=mysql_num_rows($resultsbsz);


$sqlb="SELECT * FROM payrol_expbasic_log WHERE payment_month='$gen_month'";
$resultsb= mysql_query($sqlb) or die ("Error $sqlb.".mysql_error());
$rowsb=mysql_num_rows($resultsb);

$emp_remaining=$rowsbsz-$rowsb;

if ($emp_remaining<1)
{
echo "<blink><font size='+3' color='#ff0000' weight='bold'>Completed !!</font></blink>";
}

else
{
echo "<font size='+7' color='#ff0000' weight='bold'>".$emp_remaining=$rowsbsz-$rowsb."</font>";

echo "<br/><font size='+1' color='#ff0000' weight='bold'>Staff Remaining...</font>";
}




	?>
	
	
	</td><td>&nbsp;</td>
	
   
  </tr>
  
  <tr height="10">
    <td width="5%">&nbsp;</td>
    <td width="20%">Working Days<font color="#FF0000">*</font></td>
    <td bgcolor=""><input type="text" size="41" name="working_days" value="30"></td>  
  </tr>
  <tr height="10">
    <td width="5%">&nbsp;</td>
    <td width="20%">Vacation Days<font color="#FF0000"></font></td>
    <td bgcolor=""><input type="text" size="41" name="vacation_days" value="0"></td>
   
  </tr>
  
  <!-- <tr height="10">
    <td width="5%">&nbsp;</td>
    <td width="20%">Basic Salary<font color="#FF0000"></font></td>
    <td bgcolor=""><input type="text" size="41" name="basic_salary" value="	
	<?php 
$basic_pay=$rowsbs->gross_pay;
echo $gross_pay=0.5*$basic_pay;
?>"></td>
   
  </tr>-->
  
  <tr height="10">
    <td width="5%">&nbsp;</td>
    <td width="20%">Overtime(Hrs)<font color="#FF0000"></font></td>
    <td bgcolor=""><input type="text" size="41" name="overtime1" value="<?php echo "0"; ?>"></td>
   
  </tr>
  
  <!--<tr height="10">
    <td width="5%">&nbsp;</td>
    <td width="20%">Overtime e-2(Hrs)<font color="#FF0000">*</font></td>
    <td bgcolor=""><input type="text" size="41" name="overtime2" value="<?php echo "0"; ?>"></td>
   
  </tr>-->
  
	
	
	<tr height="20">
	<td>&nbsp;</td>
	<td colspan="2" ><h4>Allowances<!--<i>(Tick if applicable)</i>--></h4></td>
    
    <td>&nbsp;</td>
    </tr>
	
	
	
	<!--<?php 
	
$sql="select * from exp_benefits order by benefit_name asc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

if (mysql_num_rows($results) > 0)
						  {
         while ($rows=mysql_fetch_object($results))
							  { ?>
	<tr height="20"><td width="5%"></td><td>
	<input type="text" size="40" name="benefit_name[]" value="<?php echo $rows->benefit_name;?>" readonly="readonly" style="border:0px; background:none; font-family:verdana; font-size:12px;"></td>
	<td><input type="text" size="41" name="benefit_amount[]" value="
	<?php 
$rate=$rows->benefit_amount;	
echo $payment=$rate/100*$basic_pay;
	

	
	
	?>">&nbsp;&nbsp;&nbsp;</td></tr>						  
							  
							  
							  
		
							  
							  
<?php 
}	

}						  
	
	
	?>-->

	</td>
   
    </tr>
	
<!--<tr height="10">
    <td width="5%">&nbsp;</td>
    <td width="20%">Safety Allowances<font color="#FF0000"></font></td>
    <td bgcolor=""><input type="text" size="41" name="safety_allowance" value="<?php echo "0"; ?>"></td>
   
  </tr>
  
  <tr height="10">
    <td width="5%">&nbsp;</td>
    <td width="20%">Regional Allowances<font color="#FF0000"></font></td>
    <td bgcolor=""><input type="text" size="41" name="regional_allowance" value="<?php echo "0"; ?>"></td>
   
  </tr>-->
  <tr height="10">
    <td width="5%">&nbsp;</td>
    <td width="20%">Other Payment<font color="#FF0000"></font></td>
    <td bgcolor=""><input type="text" size="41" name="other_payment" value="<?php echo "0";?>"></td>
   
  </tr>
	
	<!--<tr height="20">
	
	<td>&nbsp;</td>
	<td colspan="2" ><h4>Personal Income Tax (P.I.T)<i>(Tick if applicable)</i></h4></td>
    
    <td>&nbsp;</td>
    </tr>
	<tr height="20">
	
	<td>&nbsp;</td>
	<td >Apply P.I.T Tax?</td>
    
    <td><input type="radio" name="paye" value="1" checked>Yes &nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="paye" value="0" >No</td>
	<td></td>
	<td></td>
    </tr>	-->
	
	<tr height="20">
	<td>&nbsp;</td>
	<td colspan="2" bgcolor="#000033"><h4>Deductions</h4></td>
    
    <td>&nbsp;</td>
    </tr>

<tr height="10">
    <td width="5%">&nbsp;</td>
    <td width="20%">Other Deduction<font color="#FF0000"></font></td>
    <td bgcolor=""><input type="text"  size="41" name="other_deductions" value="<?php echo "0"; ?>"></td>
   
  </tr>	
	
	
	
  


	
	<tr height="40" 
	<?php if ($emp_remaining<1)
	{ ?> 
	style="display:none;" 
	<?php
	} 
	?>
	>
	<td>&nbsp;</td>
	<td colspan="2" align="left"><input type="submit" name="submit" value="Save And Go To The Next Employee >>"

	>&nbsp;&nbsp;<input type="reset" value="Cancel"></td>
    
    <td>&nbsp;</td>
    </tr>
  
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
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
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>

</form>
<script type="text/javascript">
/*
  Calendar.setup(
    {
      inputField  : "date_joined",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "date_joined"       // ID of the button
    }
  );
  
  Calendar.setup(
    {
      inputField  : "dob",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "dob"       // ID of the button
    }
  );
  
*/  
  
  </script> 



<SCRIPT language="JavaScript">
var frmvalidator  = new Validator("emp");
 frmvalidator.EnableOnPageErrorDisplaySingleBox();
 frmvalidator.EnableMsgsTogether();
 frmvalidator.addValidation("working_days","req",">>Please enter working days");
 frmvalidator.addValidation("l_name","req",">>Please enter Lastname");
 
 
 
 
  </SCRIPT>