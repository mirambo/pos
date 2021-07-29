<?php
if ($sess_allow_add==0)
{
include ('includes/restricted.php');
}
else
{
	
$id=$_GET['id'];

$sql="SELECT *,budget_code.curr_rate as trans_curr_rate FROM budget_code,currency,account_type where budget_code.budget_account=account_type.account_type_id AND 
currency.curr_id=budget_code.currency AND budget_code.budget_code_id='$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
$rows=mysql_fetch_object($results);

$budget_date2=$rows->budget_date;

if ($id!='')
{
	$budget_date=$budget_date2;
	
}
else
{

$budget_date=date('Y-m-d');
	
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

<?php 
include('select_search.php');
?>

<form name="start_order" action="process_add_budget.php?id=<?php echo $id; ?>" method="post">	
<?php 
if ($order_code!=0)
{
include('view_lpo_details.php');
?>

<?php
}
else
{
?>

<h3 align="center">Budget Creation

<!--<span style="color:#ff0000; float:right; margin-left:-340px; margin-right:340px;">Normal LPO
<input type="radio" checked name="lpo_type" value="lpo">&nbsp; &nbsp; Supplier Invoice<input type="radio" name="lpo_type" value="inv"></span>
-->


</h3>
	
	
	
<div style="width:99%; min-height:70px; margin:auto;background:#FFFFCC;">
						   </br>
				
<p align="center">

<span id='emp_date_from_errorloc' class="error_strings"></span>
Date<input type="text" name="date_from" size="20" id="date_from" required value="<?php echo $budget_date; ?>" readonly="readonly" />
<span id='start_order_sup_errorloc' class="error_strings"></span>
Budget Year
<select name="budget_year" required style="width:150px;">
	
<option value="<?php echo $rows->budget_year; ?>"><?php echo $rows->budget_year; ?></option>
<?php 
$ending_year='2017';
$starting_year=date('Y')+1;



for($starting_year; $starting_year >= $ending_year; $starting_year--) 
{
    
        echo '<option value="'.$starting_year.'">'.$starting_year.'</option>';

} 
	?>							 
								  
								  </select> 
								  
	Account : 							  
								  

<select name="account_id"  id="account_from" style="width:350px;">
	
<option  value="<?php echo $rows->account_type_id; ?>"><?php echo $rows->main_account_code.' '.$rows->account_type_name;?></option>

								  <?php
								  
								  $query1="select * from account_type group by main_account_code order by main_account_code asc";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->account_type_id; ?>"><?php echo $rows1->main_account_code.' '.$rows1->account_type_name; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
								  
								  
								  
								  
								  
								  ?>
								  
								  </select> 


								 
							   
							  <span id='start_order_currency_errorloc' class="error_strings"></span>
Currency
<select name="currency" required id="parent_cat12" style="width:150px;">

	               <option value="<?php echo $rows->currency;?>"><?php echo $rows->curr_name;?></option>
								  
										  
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
							   Rate: <input type="text" required name="curr_rate" value="<?php echo $rows->trans_curr_rate;?>" size="10">
							   </span>   
							   </br>
							   </br>



</p>





</div>


<?php 
if ($view==1)
{

}
else
{
?>





<table width="60%" border="1" class="table1" style="margin:auto;">
<tr bgcolor=""><td colspan="5"  align=""><img src="images/customer_icon.png" align="left" width="20" height="20"><strong><font color="#ffffff"><h3>Budget Months</h3></strong></td></tr>

							<tr bgcolor="#2E3192">

							    
							    <td width="50%" align="right"><font color="#fff">Month</font></th>
							
							    <td width="50%"><font color="#fff">Amount</font></th>
				
							</tr>
							
							
						<?php 
	 for ($m=1; $m<=12; $m++)

	{
     $month_val = date('m', mktime(0,0,0,$m, 1, date('Y')));
     $month2 = date('F', mktime(0,0,0,$m, 1, date('Y')));
	 
	 
$sqld="SELECT * FROM budget WHERE budget_code_id='$id' and budget_month='$month_val'";
$resultsd= mysql_query($sqld) or die ("Error $sqld.".mysql_error());
$rowsd=mysql_fetch_object($resultsd);
	 
	 
	 
	 
	 
	 
						
						?>	
							
							<tr>
				
						    	<td align="right">
								
								<?php //echo $count=$count+1; ?>
									
								<input class="form-control" type='hidden' style="height:30px; border-radius:5px;" value="<?php echo $month_val;  ?>" name='month[<?php echo $count; ?>]'/>
								<?php echo $month2;?>
								</td>
						    	<td align=""><input  type='text' required style="height:30px; border-radius:5px; border:1px solid #000" value="<?php echo $rowsd->budget_amount; ?>" name='amount[<?php echo $count; ?>]'/> </td>
						  	</tr>
							
							<?php 
							
}
							
							?>
						
				</table>
					

						
						
					
		








<p align="center"><input type="submit" name="submit" value="Save Details" style="background:#2E3192; font-size:14px; color:#ffffff; font-weight:bold; width:300px; height:30px; border-radius:5px;"></p>
	
<?php 
}
?>	



</form>

 <script src="js/auto.js"></script>
<?php 
	}
	
	?>
<?php
if ($order_code!=0)
{

}

else
{
 ?>

<script type="text/javascript">
  Calendar.setup(
    {
      inputField  : "date_from",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "date_from"       // ID of the button
    }
  );
  
  
  /*Calendar.setup(
    {
      inputField  : "date_to",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "date_to"       // ID of the button
    }
  );
  */
  
  
  </script>
  
  <?php 
  
  }
  
  ?>
<script language="JavaScript" type="text/javascript"
    xml:space="preserve">//<![CDATA[
//You should create the validator only after the definition of the HTML form
  var frmvalidator  = new Validator("start_order");
    frmvalidator.EnableOnPageErrorDisplay();
    frmvalidator.EnableMsgsTogether();
	

 frmvalidator.addValidation("sup","dontselect=0",">>Please select supplier");
 frmvalidator.addValidation("currency","dontselect=0",">>Please select currency");
 frmvalidator.addValidation("mop","dontselect=0",">>Please terms of payment");
 

  
//]]></script>	

<script>


$("#account_from").select2( {
	placeholder: "Select Account",
	allowClear: true
	} );
	

	
	
</script>
  <?php 
}
?>
  