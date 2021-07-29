
<?php 
$sqlrec="SELECT * FROM expenses_code WHERE expense_code_id='$sales_id'";
$resultsrec= mysql_query($sqlrec) or die ("Error $sqlrec.".mysql_error());	
$rowsrec=mysql_fetch_object($resultsrec);
$department_id=$rowsrec->department_id;
$account_to_credit=$rowsrec->account_to_credit;
$currency=$rowsrec->currency;
$curr_rate=$rowsrec->curr_rate;
$general_remarks=mysql_real_escape_string($rowsrec->expense_description);
$receipt_no=$rowsrec->expense_receipt_no; 
$sales_date=$rowsrec->expense_date;


$queryshp="select * from customer_region where region_id='$department_id'";
$resultshp=mysql_query($queryshp) or die ("Error: $queryshp.".mysql_error());								  
$rowshp=mysql_fetch_object($resultshp);
$shop_name=$rowshp->region_name;


$querytcsp="select * from account_type where account_type_id='$account_to_credit'";
$resultstcsp=mysql_query($querytcsp) or die ("Error: $querytc.".mysql_error());								  
$rowstcsp=mysql_fetch_object($resultstcsp);
$account_to_credit_name=$rowstcsp->account_code.' '.$rowstcsp->account_type_name;


$querytcs="select * from currency where curr_id='$currency'";
$resultstcs=mysql_query($querytcs) or die ("Error: $querytc.".mysql_error());								  
$rowstcs=mysql_fetch_object($resultstcs);
$curr_name=$rowstcs->curr_name;


$queryshp="select * from users where user_id='$sales_rep'";
$resultshp=mysql_query($queryshp) or die ("Error: $queryshp.".mysql_error());								  
$rowshp=mysql_fetch_object($resultshp);
$sales_rep_name=$rowshp->f_name;



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


	<h3 align="center">View Expenses Details
	
	
	
	
	</h3>
	
<Script Language="JavaScript">

function load() {
var load = window.open('add_expense_item.php?sales_id=<?php echo $sales_id; ?>','','scrollbars=no,menubar=no,height=300,width=800,resizable=yes,toolbar=no,location=no,status=no');
}

</Script>	
	
<table width="90%" border="0" align="center">

<tr><td colspan="7" bgcolor="#FFFFCC" align="center">



<!--<strong>

Department : </strong><i><?php echo $shop_name;  ?></i>-->
<strong>Account To Credit : </strong><i><?php echo $account_to_credit_name;  ?></i>
	
	
	
	<strong>Date :</strong><i><?php echo $sales_date; ?></i>
	
	<strong>Currency: </strong><i><?php echo $curr_name;  ?></i>
	<strong>Rate: </strong><i><?php  echo $curr_rate;  



	
	
	?></i>
	</br>

	

	<strong>Description: </strong><i><?php echo $general_remarks;  ?></i> 
	<strong>Receipt No: </strong><i><?php echo $receipt_no;  ?></i> 
	
	
	

	
	
	<a rel="facebox" href="edit_expense_code.php?sales_id=<?php echo $sales_id;?>&q=1"><img src="images/edit.png"></a>
	
		
		
	
	

</td></tr>
<tr bgcolor="#FFFFCC" height="20"><td colspan="10" align="center"><?php

if ($_GET['addconfirm']==1)
echo '<div align="center" style="background: #009900; height:15px; width:400px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ffffff" >Record Created Successfully!!</font></strong></p></div>';

if ($_GET['addtaskconfirm']==1)
echo '<div align="center" style="background: #009900; height:20px; width:400px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ffffff" >More task added successfully!!</font></strong></p></div>';


if ($_GET['editaskconfirm']==1)
echo '<div align="center" style="background: #009900; height:25px; width:400px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ffffff" >Job Card Task Updated Successfully!!</font></strong></p></div>';

if ($_GET['deletetaskconfirm']==1)
echo '<div align="center" style="background: #ff0000; height:25px; width:400px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ffffff" >Job Card Task Deleted Successfully!!</font></strong></p></div>';


if ($_GET['editpartconfirm']==1)
echo '<div align="center" style="background: #009900; height:20px; width:400px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ffffff" >Job Card Items Updated Successfully!!</font></strong></p></div>';

if ($_GET['addpartconfirm']==1)
echo '<div align="center" style="background: #009900; height:20px; width:400px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ffffff" >More Items Added Successfully!!</font></strong></p></div>';


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
<?php
if ($_GET['recordexist']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! the record exist</font></strong></p></div>';
?></td></tr>



<!--<tr bgcolor="#FFFFCC" height="20"><td colspan="10" align="center"><a style="font-weight:bold; color:#ff0000;" href="home.php?areareport=areareport&booking_id=<?php echo $booking_id; ?>">!!!!!Click Here To Add More Parts!!!!</a></td></tr>-->



<tr height="50" bgcolor="#FFFFCC">
<td valign="top" height="200" width="50%">
<table width="100%" border="1" class="table">
<tr bgcolor="#2E3192"><td colspan="2"  align="center"><img src="images/task_icon.png" align="left" width="20" height="20"><strong><font color="#ffffff">View Expenses Details</font></strong><a rel="facebox" style="color:#ffffff;font-weight:bold; float:right;" href="add_lpo_item.php?order_code=<?php echo $order_code; ?>">


<?php 
	
	?>
<!--Add More Item..-->
<?php 

?>

</a>
<a title="Creating New Items That doesnt exist" style="color:#fff;font-weight:bold; float:right;" href="javascript:load();"> [ Add More Expenses ]</a>
</td></tr>
<tr><td align="center">
<table width="80%">

<tr>
<td align="center"><strong>No</strong></td>
<td align="center"><strong>Expenses Account</strong></td>
<td align="center"><strong>Amount</strong></td>
<td align="center"><strong>VAT</strong></td>
<!--<td align="center"><strong>Department Code</strong></td>
<td align="center"><strong>Department Name</strong></td>-->
<td align="center"><strong>Edit</strong></td>
<td align="center"><strong>Delete</strong></td></tr>
<?php 
$task_totals=0;
$sqllpdet="select * FROM expenses,account_type WHERE expenses.account_to_debit=account_type.account_type_id AND 
expenses.expense_code_id='$sales_id' order by expenses_id asc";
$resultslpdet= mysql_query($sqllpdet) or die ("Error $sqllpdet.".mysql_error());

$nmr2=mysql_num_rows($resultslpdet);

if ($nmr=mysql_num_rows($resultslpdet) > 0)
						  {
							  $RowCounter=0;
							  while ($rowslpdet=mysql_fetch_object($resultslpdet))
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
 
$expenses_id=$rowslpdet->expenses_id; 
$account_to_debit=$rowslpdet->account_to_debit; 
 ?>
<td ><?php echo $item_code=$item_code+1; ?></td>
<td ><?php echo $product_name=mysql_real_escape_string($rowslpdet->account_code.' '.$rowslpdet->account_type_name); 


$prod=$rowslpdet->item_id;


?></td>

<td align="right"><?php 
	
		
	
	echo number_format($item_cost=$rowslpdet->amount_received,2);
	
	$ttl_item_cost=$ttl_item_cost+$item_cost;
	
	
	
	$vat_value=$rowslpdet->expenses_vat_value;
	
	$ttl_vat_value=$ttl_vat_value+$vat_value;
	
	$ttl_expenses_value=$ttl_vat_value+$ttl_item_cost;
	
	
	
	
	
///post to chart debit section.	

$orderdate = explode('-', $sales_date);
$year  = $orderdate[0];
$month = $orderdate[1];
$day   = $orderdate[2];
$dr_transaction_code="drexp".$expenses_id;
$dr_transaction_code_vat="drexpvt".$expenses_id;
$cr_transaction_code="crexp".$sales_id;
$memo2='Expenses '.$product_name.' recorded for <a href="add_expenses.php?sales_id='.$sales_id.'"> receipt no : '.$receipt_no.' </a><i>('.$general_remarks.')</i>';
$memo2vat='VAT on expenses '.$product_name.' recorded for <a href="add_expenses.php?sales_id='.$sales_id.'"> receipt no : '.$receipt_no.' </a><i>('.$general_remarks.')</i>';

$sqlprof="select * from chart_transactions where transaction_code='$dr_transaction_code'";
$resultsprof=mysql_query($sqlprof) or die ("Error $sqlprof.".mysql_error());
$numrowsprof=mysql_num_rows($resultsprof);

if ($numrowsprof>0)	
{
	
$sqltrans="UPDATE chart_transactions SET 
account_type_id='$account_to_debit',
memo='$memo2',
amount='$item_cost',
debit='$item_cost',
currency='$currency',
curr_rate='$curr_rate',
transaction_date='$sales_date',
l_day='$day',
l_month='$month',
l_year='$year' WHERE transaction_code='$dr_transaction_code'";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());	



////////////update posted vat if avaialble

	
}
else
{


$sqltrans="INSERT INTO chart_transactions SET 
account_type_id='$account_to_debit',
transaction_section='EXP',
memo='$memo2',
amount='$item_cost',
debit='$item_cost',
currency='$currency',
curr_rate='$curr_rate',
transaction_date='$sales_date',
transaction_datetime_recorded='$todate',
transaction_code='$dr_transaction_code',
transaction_user_id='$user_id',
l_day='$day',
l_month='$month',
l_year='$year'";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());	


	
	
	
}	


////////////post vat if avaialble
if ($vat_value==0 || $vat_value=='')
{
	
	
	
}
else
{
$sqlprof="select * from chart_transactions where transaction_code='$dr_transaction_code_vat'";
$resultsprof=mysql_query($sqlprof) or die ("Error $sqlprof.".mysql_error());
$numrowsprof=mysql_num_rows($resultsprof);

if ($numrowsprof>0)	
{
	//update vat
$sqltrans="UPDATE chart_transactions SET 
account_type_id='69',
transaction_section='EXPVT',
memo='$memo2vat',
amount='$vat_value',
debit='$vat_value',
currency='$currency',
curr_rate='$curr_rate',
transaction_date='$sales_date',
transaction_datetime_recorded='$todate',
transaction_user_id='$user_id',
l_day='$day',
l_month='$month',
l_year='$year' WHERE transaction_code='$dr_transaction_code_vat'";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());	

	
}
else
{
	
//insert vat
$sqltrans="INSERT INTO chart_transactions SET 
account_type_id='69',
transaction_section='EXPVT',
memo='$memo2vat',
amount='$vat_value',
debit='$vat_value',
currency='$currency',
curr_rate='$curr_rate',
transaction_date='$sales_date',
transaction_datetime_recorded='$todate',
transaction_code='$dr_transaction_code_vat',
transaction_user_id='$user_id',
l_day='$day',
l_month='$month',
l_year='$year'";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());
	
	
}
	
}


	?></td>
	<td align="right"><?php echo number_format($vat_value,2); 
	
	

	
	
	
	?></td>
	<!--<td><?php 
	$sqln="SELECT * FROM customer_region WHERE region_id='$dept_id'";
$resultsn= mysql_query($sqln) or die ("Error $sqln.".mysql_error());
$rowsn=mysql_fetch_object($resultsn);

echo $rowsn->region_name;
	
	
	?></td>-->
	
	
<td align="center"><?php 
	
	$sess_allow_edit;
if ($sess_allow_edit==1)
{


	?>

	<a rel="facebox" href="edit_expense_item.php?expense_item_id=<?php echo $rowslpdet->expenses_id; ?>&sales_id=<?php echo $sales_id; ?>&q=1"><img src="images/edit.png"></a>
	<?php
	
}
else
{
echo "<i><font color='#ff0000' size='-2'>Not allowed...</font></i>";
}

	?></td>
<td align="center">
<?php 
	
	$sess_allow_delete;
if ($sess_allow_delete==1)
{
	

	if ($nmr2<=1)
	{
		
	}
	else
	{

	?>
	

<a href="delete_expense_item.php?sales_id=<?php echo $sales_id; ?>&sales_item_id=<?php echo $rowslpdet->expenses_id;?>&q=1"><img src="images/delete.png" onClick="return confirmDelete();"></a>

<?php
	}

}
else
{
echo "<i><font color='#ff0000' size='-2'>Not allowed...</font></i>";
}

	?>
</td>
</tr>

<?php
$task_totals=$task_totals+$amnt;
}
?>

<tr>
<td colspan="2"><strong>Total</strong></td>
<td align="right"><strong><?php echo number_format($ttl_item_cost,2);


$sqltrans2="UPDATE expenses_code SET 
amount_credited='$ttl_item_cost'
WHERE expense_code_id='$sales_id'";
$resultstrans2=mysql_query($sqltrans2) or die ("Error $sqltrans2.".mysql_error());	



$sqlprof="select * from chart_transactions where transaction_code='$cr_transaction_code'";
$resultsprof=mysql_query($sqlprof) or die ("Error $sqlprof.".mysql_error());
$numrowsprof=mysql_num_rows($resultsprof);

if ($numrowsprof>0)	
{
	
$sqltrans="UPDATE chart_transactions SET 
account_type_id='$account_to_credit',
memo='$memo2',
amount='-$ttl_expenses_value',
credit='$ttl_expenses_value',
currency='$currency',
curr_rate='$curr_rate',
transaction_date='$sales_date',
l_day='$day',
l_month='$month',
l_year='$year' WHERE transaction_code='$cr_transaction_code'";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());	
	
}
else
{


$sqltrans="INSERT INTO chart_transactions SET 
account_type_id='$account_to_credit',
transaction_section='EXP',
memo='$memo2',
amount='-$ttl_expenses_value',
credit='$ttl_expenses_value',
currency='$currency',
curr_rate='$curr_rate',
transaction_date='$sales_date',
transaction_datetime_recorded='$todate',
transaction_code='$cr_transaction_code',
transaction_user_id='$user_id',
l_day='$day',
l_month='$month',
l_year='$year'";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());	
	
	
}	












?></strong></td>
<td align="right"><strong><?php echo number_format($ttl_vat_value,2); ?></strong></td>
<td align="right"><strong>

<?php 

echo number_format($ttl_expenses_value,2);

?>

</strong>

</td>



</tr>








<?php 


}
else
{
?>
<tr><td align="center" colspan="4"><font color="#ff0000">No task created!!</font></td></tr>
<?php
}

?>


</td></tr>

</table>
</table>


<?php 

?>	

</table>