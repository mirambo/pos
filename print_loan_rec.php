<?php 
include('includes/session.php');
include('Connections/fundmaster.php');
//$get_latest_invoice_id=$_GET['invoice_id'];
//$get_latest_client_id=$_GET['client_id'];
//$get_latest_sales_id=$_GET['sales_code'];
$cash_rec=$_GET['cash_rec'];
$mop=$_GET['mop'];
$invoice_no_top=$_GET['invoice_no'];

session_start(); 
$get_invoice_no=$_SESSION['invoice_no'];
$sess_client_id=$_SESSION['get_client_id'];
$get_sales_code=$_SESSION['sales_id'];
//$ship_agency=$_SESSION['ship_agency'];
//$pay_term=$_SESSION['pay_term'];
$currency=$_SESSION['currency'];
//$shipp_id=$_GET['shipp_id'];
//$pay_terms=$_GET['pay_terms'];
$year=date('Y');
$sqlcurr="select * from currency where curr_id='$currency'";
$resultscurr= mysql_query($sqlcurr) or die ("Error $sqlcurr.".mysql_error());
$rowcurr=mysql_fetch_object($resultscurr);
$curr_name=$rowcurr->curr_name;
$curr_rate=$rowcurr->curr_rate;

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Brisk Diagnostics Limited - Loan Received</title>
<link rel="stylesheet" type="text/css" href="http://localhost/brisk_sys/style.css"  />

<!-- CSS goes in the document HEAD or added to your external stylesheet -->
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

<!-- Table goes in the document BODY -->


</head>

<body >
<table width="700" border="0" align="center" style="margin:auto;" >
   
	
	 <?php 
  
$querysup="select * from clients where client_id ='$sess_client_id'";
$resultssup=mysql_query($querysup) or die ("Error: $querysup.".mysql_error());
$rowssupp=mysql_fetch_object($resultssup);


$querycont="select * from company_contacts order by contacts_id desc limit 1";
$resultscont=mysql_query($querycont) or die ("Error: $querycont.".mysql_error());
$rowscont=mysql_fetch_object($resultscont);
  
  
  ?>
  <tr>
    <td colspan="7" align="right"><!--<a href="begin_invoice.php"><div style="background-image:url(images/generate_another.jpg); width:201px; height:32px; float:left;"></div></a>--><img src="http://localhost/brisk_sys/images/logolpo.png" /></td>
  </tr>
  <tr>
    <td colspan="7"><div align="right"><?php echo $rowscont->building.' '.$rowscont->street; ?><!--Kigali Road, Jamia Plaza, 2nd Floor --></div></td>
  </tr>
   <tr>
    <td colspan="7"><div align="right">
        <!--Tel : +254 (0) 538004579 -->
    Mobile: <?php echo $rowscont->phone.'&nbsp;Telephone '.$rowscont->telephone; ?></div></td>
  </tr>
  <tr>
    <td colspan="7"><div align="right">Email : <?php echo $rowscont->email; ?></div></td>
  </tr>
 
</table>

<table width="700" border="0" align="center" class="table" style="margin:auto;">
  <tr  style="background:url(images/description.gif);" height="30" >
  <td align="center" width="200"><strong>Lender's Name</strong></td>
  <td align="center" width="200"><strong>Date Borrowed</strong></td>
    <td align="center" width="160"><strong>Loan Amount (Other Currency)</strong></td>
    <td align="center" width="150"><strong>Exchange Rate</strong></td>
	<td align="center" width="150"><strong>Loan Amount(Kshs)</strong></td>
	<td align="center" width="150"><strong>Repaid Amount(Kshs)</strong></td>
    <td width="180" align="center"><strong>Balance</strong></td>
	<!--<td width="180" align="center"><strong>Repay</strong></td>
    <td align="center" width="50"><strong>Edit</strong></td>
    <td align="center" width="50"><strong>Delete</strong></td>-->
    </tr>
  <?php 
 
$sql="SELECT * FROM loan_received order by loan_received_id asc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


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
    <td><?php echo $rows->lenders_name;?></td>
    <td><?php echo $rows->date_drawn;?></td>
    
    <td align="right"><?php 
$currency_code=$rows->currency_code;
$sqlcurr="select * from currency where curr_id='$currency_code'";
$resultscurr= mysql_query($sqlcurr) or die ("Error $sqlcurr.".mysql_error());
$rowcurr=mysql_fetch_object($resultscurr);
echo $curr_name=$rowcurr->curr_name.' '.number_format($loan_amount=$rows->loan_amount,2);

?></td>
	<td align="right"><?php echo $curr_rate=$rows->curr_rate;?></td>
	<td align="right"><?php echo number_format($loan_amnt_kshs=$curr_rate*$loan_amount,2);?></td>
	
	<td align="right"><?php 
$loan_received_id=$rows->loan_received_id;
$sqllp="select SUM(amount_received) as ttl_loan_rep from loan_repayments where 	loan_received_id='$loan_received_id'";
$resultslp= mysql_query($sqllp) or die ("Error $sqllp.".mysql_error());
$rowslp=mysql_fetch_object($resultslp);
	
echo number_format($loan_rep=$rowslp->ttl_loan_rep,2);

	?></td>
	
	<td align="right"><?php
echo number_format($loan_bal=$loan_amnt_kshs-$loan_rep,2);
	?>
	
	
	
	</td>
	
	
     <!--<td align="center"><a href="edit_loan_rec.php?loan_received_id=<?php echo $rows->loan_received_id; ?>"><img src="images/edit.png"></a></td>
   <td align="center"><a href="delete_customer.php?client_id=<?php echo $rows->client_id; ?>"  onClick="return confirmDelete();"><img src="images/delete.png"></a></td>-->
    </tr>
  <?php 
  $grnd_loan_amnt_kshs=$grnd_loan_amnt_kshs+$loan_amnt_kshs;
  $grnd_loan_rep=$grnd_loan_rep+$loan_rep;
  $grnd_loan_bal=$grnd_loan_bal+$loan_bal;
  }
  ?>
  <tr height="30" bgcolor="#FFFFCC">
  <td align="center" width="200"><strong>Totals</strong></td>
 
    <td align="center" width="160"><strong></strong></td>
    <td align="center" width="160"><strong></strong></td>
    <td align="center" width="150"><strong></strong></td>
	
		<td align="right" width="150"><strong><?php echo number_format($grnd_loan_amnt_kshs,2); ?></strong></td>
	<td align="right" width="150"><strong><?php echo number_format($grnd_loan_rep,2); ?></strong></td>
    <td width="180" align="right"><strong><?php echo number_format($grnd_loan_bal,2); ?></strong></td>
	 <!--<td width="180" align="center"><strong></strong></td>
    <td align="center" width="50"><strong></strong></td>
   <td align="center" width="50"><strong></strong></td>-->
    </tr>
  
  <?php 
  
  }
  
  
  ?>
  <tr>
    <td colspan="7" align="right"><strong><em>Generated by :
         <?php 
$sqluser="select employees.emp_firstname,employees.emp_middle_name,employees.emp_lastname from employees,users where 
employees.emp_id=users.emp_id and users.user_id='$user_id'";
$resultsuser= mysql_query($sqluser) or die ("Error $sqluser.".mysql_error());
	
$rowsuser=mysql_fetch_object($resultsuser);	

echo $rowsuser->emp_firstname.' '.$rowsuser->emp_middle_name.' '.$rowsuser->emp_lastname;
	
	
	
	?>
    </em></strong></td>
  </tr></table>
  
  <br/>
  









</body>
</html>
