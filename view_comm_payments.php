<?php include('Connections/fundmaster.php'); ?>

<html xmlns="http://www.w3.org/1999/xhtml">

<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>
<script type="text/javascript" src="calender/calendar.js"></script>
<script type="text/javascript" src="calender/lang/calendar-en.js"></script>
<script type="text/javascript" src="calender/calendar-setup.js"></script>
<style type="text/css">

@import url(calender/calendar-win2k-1.css);

</style>

<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>

<script type="text/javascript"> 

function confirmDelete()
{
    return confirm("Are you sure you want to delete?");
}


</script>

<body>

	<div id="page-wrap">

		<?php include ('header.php') ?>
		
		<div id="zone-bar" class="br-5">
          <?php include ('topmenu.php') ?>
		</div>
		
		
		
		<?php require_once('includes/commision_submenu.php');  ?>
		
		<h3>::List of All Commision Payments</h3>
         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
			<div id="cont-left-full" class="br-5">
			
			
			
			
			
<form name="filter" method="post" action=""> 			
<table width="100%" border="0">
  <tr bgcolor="#FFFFCC">
   
    <td colspan="9" height="30" align="center"> 
	<?php

if ($_GET['updateuserconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:550px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >User Updated Successfully!!</font></strong></p></div>';
?> 

<?php 

if ($_GET['deletemachcatconfirm']==1)
echo "<p align='center'><strong><font color='#FF0000'>Record Deleted!!</font></strong></p>";
?>
	
	</td>
	
    </tr>
	
	<tr  height="30" bgcolor="#FFFFCC">
   
   <td colspan="9" align="center"><strong>Select Sales Representative&nbsp;&nbsp;</strong>
    <select name="sales_rep"><option value="0">-------------------Select-----------------------</option>
								  <?php
								  
								  $query1="select employees.emp_firstname,employees.emp_lastname,employees.emp_middle_name,user_group.user_group_name,users.user_id
								  from users,user_group,employees where users.user_group_id=user_group.user_group_id and users.user_id and  
								  users.emp_id=employees.emp_id";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->user_id; ?>"><?php echo $rows1->emp_firstname.' '.$rows1->emp_middle_name.''.$rows1->emp_lastname; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
								  
								  
								  
								  
								  
								  ?>
								  
								  </select>
   <strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;OR&nbsp;&nbsp;&nbsp;
   Filter By Date</strong></div>
   <strong>From</strong>
    
   <input type="text" name="from" size="30" id="from" readonly="readonly" /><input name="DateFormats" id="DateFormats" disabled value="dd/mm/yyyy" type="hidden">
    <strong>To</strong></div>
    <input type="text" name="to" size="30" id="to" readonly="readonly" /><input name="DateFormats" id="DateFormats" disabled value="dd/mm/yyyy" type="hidden">
    
    <input type="submit" name="generate" value="Generate">
    </td>
    
    

   
  </tr>
  
    <tr style="background:url(images/description.gif);" height="30" >
    <td width="400"><div align="center"><strong>Sales Representative</strong></td>
    <td width="300"><div align="center"><strong>Commision Expected (Other Currency)</strong></td>
	<td width="150"><div align="center"><strong>Exchange Rate</strong></td>
	<td width="200"><div align="center"><strong>Commision Expected (Kshs)</strong></td>
	<td width="300"><div align="center"><strong>Commision Due (Kshs)</strong></td>
	<!--<td width="200"><div align="center"><strong>Commision Balance (Kshs)</strong></td>
	<td width="250"><div align="center"><strong>Commission Paid (Kshs)</strong></td>-->
	<td width="250"><div align="center"><strong>Invoice No./ Receipt No</strong></td>
	<td width="200"><div align="center"><strong>Payment Status</strong></td>

    </tr>
  


<?php
if (!isset($_POST['generate']))
{  
if ($user_group_id!='15')
{ 
$sql="select users.user_id,employees.emp_firstname,employees.emp_lastname,employees.emp_middle_name,commisions_expected.tll_commision,commisions_expected.invoice_no,commisions_expected.date_generated,
commisions_expected.sales_code,commisions_expected.curr_rate,commisions_expected.user_id,currency.curr_name from currency,users,commisions_expected,employees where users.emp_id=employees.emp_id and commisions_expected.user_id=users.user_id 
and commisions_expected.currency_code=currency.curr_id AND commisions_expected.status='1' AND commisions_expected.tll_commision!='0' AND commisions_expected.user_id='$user_id' order by commisions_expected.date_generated desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
else
{
$sql="select users.user_id,employees.emp_firstname,employees.emp_lastname,employees.emp_middle_name,commisions_expected.tll_commision,commisions_expected.invoice_no,commisions_expected.date_generated,
commisions_expected.sales_code,commisions_expected.curr_rate,commisions_expected.user_id,currency.curr_name from currency,users,commisions_expected,employees where users.emp_id=employees.emp_id and commisions_expected.user_id=users.user_id 
and commisions_expected.currency_code=currency.curr_id AND commisions_expected.status='1' AND commisions_expected.tll_commision!='0' order by commisions_expected.date_generated desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}

}
else
{
$date_from=$_POST['from'];
$date_to=$_POST['to'];
$sales_rep=$_POST['sales_rep'];
if ($sales_rep!='0' && $date_from=='' && $date_to=='')
{
$sql="select users.user_id,employees.emp_firstname,employees.emp_lastname,employees.emp_middle_name,commisions_expected.tll_commision,commisions_expected.invoice_no,commisions_expected.date_generated,
commisions_expected.sales_code,commisions_expected.curr_rate,commisions_expected.user_id,currency.curr_name from currency,users,commisions_expected,employees where users.emp_id=employees.emp_id and commisions_expected.user_id=users.user_id 
and commisions_expected.currency_code=currency.curr_id AND commisions_expected.status='1' AND commisions_expected.tll_commision!='0' and commisions_expected.user_id='$sales_rep' order by commisions_expected.date_generated desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
elseif($sales_rep=='0' && $date_from!='' && $date_to!='')
{

$sql="select users.user_id,employees.emp_firstname,employees.emp_lastname,employees.emp_middle_name,commisions_expected.tll_commision,commisions_expected.invoice_no,commisions_expected.date_generated,
commisions_expected.sales_code,commisions_expected.curr_rate,commisions_expected.user_id,currency.curr_name from currency,users,commisions_expected,employees where users.emp_id=employees.emp_id and commisions_expected.user_id=users.user_id 
and commisions_expected.currency_code=currency.curr_id AND commisions_expected.status='1' AND commisions_expected.tll_commision!='0' and commisions_expected.date_generated BETWEEN '$date_from' AND '$date_to' order by commisions_expected.date_generated desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}
elseif($sales_rep!='0' && $date_from!='' && $date_to!='')
{

$sql="select users.user_id,employees.emp_firstname,employees.emp_lastname,employees.emp_middle_name,commisions_expected.tll_commision,commisions_expected.invoice_no,commisions_expected.date_generated,
commisions_expected.sales_code,commisions_expected.curr_rate,commisions_expected.user_id,currency.curr_name from currency,users,commisions_expected,employees where users.emp_id=employees.emp_id and commisions_expected.user_id=users.user_id 
and commisions_expected.currency_code=currency.curr_id AND commisions_expected.status='1' AND commisions_expected.tll_commision!='0' and commisions_expected.date_generated BETWEEN '$date_from' AND '$date_to' and commisions_expected.user_id='$sales_rep' order by commisions_expected.date_generated desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}
else
{
$sql="select users.user_id,employees.emp_firstname,employees.emp_lastname,employees.emp_middle_name,commisions_expected.tll_commision,commisions_expected.invoice_no,commisions_expected.date_generated,
commisions_expected.sales_code,commisions_expected.curr_rate,commisions_expected.user_id,currency.curr_name from currency,users,commisions_expected,employees where users.emp_id=employees.emp_id and commisions_expected.user_id=users.user_id 
and commisions_expected.currency_code=currency.curr_id AND commisions_expected.status='1' AND commisions_expected.tll_commision!='0' order by commisions_expected.date_generated desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}

}

if (mysql_num_rows($results) > 0)
						  {
							  $RowCounter=0;
							  while ($rows=mysql_fetch_object($results))
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
  
    <td><?php echo $rows->emp_firstname.' '.$rows->emp_middle_name.''.$rows->emp_lastname;?></td>
    <td ><?php echo $rows->curr_name.' '.number_format($ttl_com=$rows->tll_commision,2);?></td>
	 <td align="right"><?php echo number_format($curr_rate=$rows->curr_rate,2);?></td>
	  <td align="right"><strong><?php 
	  $ttl_com_kshs=$ttl_com*$curr_rate;
	  echo number_format($ttl_com_kshs,2);
	  
	  ?></strong></td>
	<td align="right">
	
	<strong><font color="#00155F"><?php 
	
	$sales_code_id=$rows->sales_code;
	$user=$rows->user_id;
	  
	$sqlrec="select SUM(commision_payments.amount_paid) as ttl_amnt_paid from commision_payments 
	where commision_payments.paid_status='0' and commision_payments.sales_rep='$user' group by commision_payments.sales_rep";
    $resultsrec= mysql_query($sqlrec) or die ("Error $sqlrec.".mysql_error());
	  
	$rowsrec=mysql_fetch_object($resultsrec);
	  
	$ttlrec=$rowsrec->ttl_amnt_paid;
	
	//$ttl_rec_kshs=$curr_rate*$ttlrec;
	  
	//echo number_format($ttl_rec_kshs,2);
	
?></font></strong>
</td>
	<!--<td align="right"><strong><font color="#ff0000"><?php 
	
	$ttl_comm=$rows->tll_commision;
	
	$comm_bal=$ttl_comm-$ttlrec;
	
	//$ttl_combal_kshs=$curr_rate*$comm_bal;
	
	//echo number_format($ttl_combal_kshs,2);
	
?></font></strong></td>
<td align="right"><strong><font color="#009900"><?php 
	
	//$sales_code_id=$rows->sales_code;
	  
	$sqlrecpd="select SUM(commision_paid.amount_paid) as ttl_paid from commision_paid where commision_paid.sales_rep='$user'";
    $resultsrecpd= mysql_query($sqlrecpd) or die ("Error $sqlrecpd.".mysql_error());
	  
	$rowsrecpd=mysql_fetch_object($resultsrecpd);
	  
	$ttlrecpd=$rowsrecpd->ttl_paid;
	
	//$ttl_recpd_kshs=$curr_rate*$ttlrecpd;
	  
	//echo number_format($ttl_recpd_kshs,2);
	
?></font></strong></td>-->
	<td align="center"><?php 
	
	echo $rows->invoice_no;
?></td>
	
	<td align="center"> <?php
	
if ($ttlrec==$ttl_comm)
{

echo "<font color='#009900'>Cleared</font>";


}

elseif ($ttlrec < $ttl_comm && $ttlrec=='' || $ttlrec=='0' )
{


echo "<font color='#ff0000'>Not Yet Paid</font>";



}

elseif ($ttlrec < $ttl_comm && $ttlrec!='')	
{

echo "<font color='#0000FF'>Partialy Paid</font>";


}



else

{

}
	
	
	$grnd_ttl_com_kshs=$grnd_ttl_com_kshs+$ttl_com_kshs;
	$grnd_ttl_rec_kshs=$grnd_ttl_rec_kshs+$ttl_rec_kshs;
	$grnd_ttl_combal_kshs=$grnd_ttl_combal_kshs+$ttl_combal_kshs;
	$grnd_ttl_compd_kshs=$grnd_ttl_compd_kshs+$ttl_recpd_kshs;
	
	
	?></td>
	
  
    </tr>
  <?php 
  
  }
  ?>
  <tr  height="30" bgcolor="#FFFFCC">
    <td width="400"><div align="center"><strong>Grand Totals</strong></td>
    <td width="300"><div align="center"><strong></strong></td>
	<td width="150"><div align="center"><strong></strong></td>
	<td width="200"><div align="right"><strong><?php echo number_format($grnd_ttl_com_kshs,2); ?></strong></td>
	<td width="300"><div align="right"><strong><?php echo number_format($grnd_ttl_rec_kshs,2); ?></strong></td>
	<!--<td width="200"><div align="right"><strong><?php echo number_format($grnd_ttl_combal_kshs,2); ?></strong></td>
	<td width="250"><div align="right"><strong><?php echo number_format($grnd_ttl_compd_kshs,2); ?></strong></td>-->
	<td width="250"><div align="center"><strong></strong></td>
	<td width="200"><div align="center"><strong></strong></td>

    </tr>
  
  <?php
  
  
  }
  
  else
  {
  
  ?>
  
  
  <tr bgcolor="#FFFFCC">
   
    <td colspan="9" height="30" align="center"> 
	<font color="#ff0000">No Results found!!</font>
	
	</td>
	
    </tr>
	
	<?
  
  }
  ?>
</table>
</form>
<script type="text/javascript">
  Calendar.setup(
    {
      inputField  : "from",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "from"       // ID of the button
    }
  );
  
  Calendar.setup(
    {
      inputField  : "to",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "to"       // ID of the button
    }
  );
  
  
  
  </script>
		
			

			
			
			
					
			  </div>
				
				
			
			
			</div>
			
			
				
				
				
				
					<div class="clear"></div>
				</div>
				<div class="clear"></div>
			</div>
			<div id="footer">
			
			
			<?php include ('footer.php'); ?>
		</div>
		</div>
		
		
		
	</div>
	
	

	
</body>

</html>