<?php 
include ('includes/session.php');
include('Connections/fundmaster.php');
$supplier=$_GET['location_id'];
$shop_id=$_GET['shop_id'];
$date_from=$_GET['from'];
$date_to=$_GET['to']; 

$querycont="select * from company_contacts order by contacts_id desc limit 1";
$resultscont=mysql_query($querycont) or die ("Error: $querycont.".mysql_error());
$rowscont=mysql_fetch_object($resultscont); 

?>
<title>Safaricom - Outlet Visit Dashboard Report</title>
<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>
<script type="text/javascript" src="calender/calendar.js"></script>
<script type="text/javascript" src="calender/lang/calendar-en.js"></script>
<script type="text/javascript" src="calender/calendar-setup.js"></script>
<link rel="stylesheet" href="csspr.css" type="text/css" />

<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>

<style type="text/css">

@import url(calender/calendar-win2k-1.css);

</style>

<style type="text/css">
.table
{
border-collapse:collapse;
}
.table td, tr
{
border:1px solid black;
padding:3px;
}
</style>
<body onLoad="window.print();">
<table width="700" border="0" class="table" align="center">

<tr height="40"> <td colspan="16" align="center"><img src="images/logolpo.png" width="300" height="80"></td></tr>
<tr height="40"> <td colspan="16" align="center"><H2><?php echo $rowscont->cont_person; ?></H2></td></tr>
<tr bgcolor="#FFFFCC">
   
    <td colspan="9" height="30" align="center">
<H2>Sales Commission Report</H2>
	
	</td>
	
    </tr>

  
    <tr  style="background:url(images/description.gif);" height="30" >
  
    <td align="center" width="150"><strong>Invoice No</strong></td>   
    <!--<td align="center" width="150"><strong>Shop</strong></td>   -->
    <td align="center" width="150"><strong>Sales Date</strong></td>
<td align="center" width="200"><strong>Customer Name</strong></td>  
<td align="center" width="150"><strong>Invoice Value </strong></td> 
    <td align="center" width="100"><strong>Amount</br> Paid</strong></td>
<td align="center" width="150"><strong>Balance</strong></td> 
	<!--<td align="center" width="150"><strong>Amount(Kshs)</strong></td>
	<td align="center" width="150"><strong>Balance Payment Date</strong></td>  
	 <td align="center" width="150"><strong>Balance Payment Alert</strong></td>-->  
	<td align="center" width="200"><strong>Sales Rep</strong></td>    
	<td align="center" width="150"><strong>Commission(Kshs)</strong></td>  
	<td align="center" width="150"><strong>Commission Earned(Kshs)</strong></td>    
   

    </tr>

 <?php 
 $job_card_ttl=0;
 $inv_ttl=0;
 $gnd_bal=0;
$task_totals=0;
 
 
 
 if ($user_group_id==15)

 {	 

$querydc= "SELECT * FROM sales";
    $conditions = array();
    if($supplier!=0) 
	
	{
	
    $conditions[] = "sales.sales_rep='$supplier'";
	
    }
	

	

	if($date_from!='' && $date_to!='' ) 
	{
	
       $conditions[] = " sales.sale_date>='$date_from' AND sales.sale_date<='$date_to'";
    }
	
	
	

    //$sql = $query;
    if (count($conditions) > 0) {
      $querydc .= " WHERE " . implode(' AND ', $conditions)." order by sales_id desc";
    }
	else
	{	
	
$querydc="SELECT * FROM sales where comm_perc!='' and canceled_status='0' order by sales_id desc";
$resultsdc= mysql_query($querydc) or die ("Error $querydc.".mysql_error());

	}

    $resultsdc = mysql_query($querydc) or die ("Error $querydc.".mysql_error());


}


 ////////////////////////////end of supper admin
 elseif ($user_group_id=='35')
{
	 
	 
	 
	 
	

$querydc= "SELECT * FROM sales";
    $conditions = array();
    if($supplier!=0) 
	
	{
	
    $conditions[] = "sales.sales_rep='$supplier'";
	
    }
	

	

	if($date_from!='' && $date_to!='' ) {
	
       $conditions[] = " sales.sale_date>='$date_from' AND sales.sale_date<='$date_to'";
    }
	
	
	

    //$sql = $query;
    if (count($conditions) > 0) {
      $querydc .= " WHERE " . implode(' AND ', $conditions)." and sales_rep='$user_id' order by sales_id desc limit 5";
    }
	else
	{	
	
$querydc="SELECT * FROM sales where comm_perc!='' and sales_rep='$user_id' and canceled_status='0' order by sales_id desc";
$resultsdc= mysql_query($querydc) or die ("Error $querydc.".mysql_error());

	}

    $resultsdc = mysql_query($querydc) or die ("Error $querydc.".mysql_error());


}

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

  
   

    <td><?php echo $rows->invoice_no;
	
$job_card_id=$rows->sales_id;	
	
	?></td>
    <!--<td><?php 

	$shop_id=$rows->shop_id;
	
	
	
$sqlsp="select * from account where account_id='$shop_id'";
$resultsp= mysql_query($sqlsp) or die ("Error $sqlsp.".mysql_error());
$row=mysql_fetch_object($resultsp);

echo $row->account_name;
	
	
	
	?></td>-->
  
    <td><?php echo $rows->sale_date;?></td>
    <td>
	<?php 
	 $customer_id=$rows->customer_id;
	
$sqllpdet="SELECT * from customer where customer_id='$customer_id'";
$resultslpdet= mysql_query($sqllpdet) or die ("Error $sqllpdet.".mysql_error());
$rowslpdet=mysql_fetch_object($resultslpdet);
	
	
	echo $rowslpdet->customer_name;?>
	
	
	</td>
    <td align="right"><?php include ('invoice_value.php');?></td>
    <td align="right">
	
	<?php 
	
	$sale_type=$rows->sale_type;
	
	if ($sale_type=='cr')
	
	{
	
	include ('invoice_payment_value.php');
	$grnd_inv_payment=$grnd_inv_payment+$all_amnt_totals;
	
	$bal=$task_totals-$all_amnt_totals;
	
	}
	else
	{
		
	echo number_format($task_totals,2);
	
	$grnd_cash_payment=$grnd_cash_payment+$task_totals;
	
	$bal=0;
		
	}
	
	

	
	?>
	
	
	</td>
   
	<td align="right">
	
	<?php
echo number_format($bal,2);


$gnd_bal=$gnd_bal+$bal;
	?>
	
	
	
	</td>
	

	
	
	
	
<td >
	<i><font size="-2">
	<?php $staff=$rows->sales_rep;
$sqlst="SELECT * FROM  users,client_discount where client_discount.client_id=users.user_id and users.user_id='$staff'";
$resultst= mysql_query($sqlst) or die ("Error $sqlst.".mysql_error());	
$rowst=mysql_fetch_object($resultst);	
echo $rowst->f_name.' ('.$comm_perc=$rowst->comm_perc.'%)';
	?>
	
	</font></i>
	
	</td>
	<td align="right">
<?php
echo number_format($comm_amount=$comm_perc*$task_totals/100,2);


$ttl_comm=$ttl_comm+$comm_amount;

 ?>	
	
	</td>
	
		<td align="right">
<?php
$sqlstc="SELECT SUM(amount_earned) as comm_earned FROM commision_earned where sales_id='$job_card_id'";
$resultstc= mysql_query($sqlstc) or die ("Error $sqlst.".mysql_error());	
$rowstc=mysql_fetch_object($resultstc);

echo number_format($comm_earned=$rowstc->comm_earned,2);

$ttl_comm_ern=$ttl_comm_ern+$comm_earned;

 ?>	
	
	</td>



	
   
    </tr>

  <?php 
  
  }
  
  ?>
  <tr bgcolor="#FFFFCC">

  <td></td>
  <td></td>
    <td></td>
  <td align="right"><strong><font size="+1" color="#ff0000"><?php echo number_format($job_card_ttl,2); ?></font></strong></td>
  <td align="right"><strong><font size="+1" color="#ff0000"><?php echo number_format($grnd_cash_payment+$grnd_inv_payment,2); ?></font></strong></td>
  <td align="right"><strong><font size="+1" color="#ff0000"><?php echo number_format($gnd_bal,2); ?></font></strong></td>
 <td></td>
<td align="right"><strong><font size="+1" color="#ff0000"><?php echo number_format($ttl_comm,2); ?></font></strong></td>
<td align="right"><strong><font size="+1" color="#ff0000"><?php echo number_format($ttl_comm_ern,2); ?></font></strong></td>



   





 
  
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
</body>


