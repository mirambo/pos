<?php 
include('includes/session.php');
include('Connections/fundmaster.php');


header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment;Filename=Accounts_Ledger-$lpo_no.xls");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");

$date_from=$_GET['date_from'];



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Cash Ledger</title>
<link rel="stylesheet" type="text/css" href="<?php echo $base_url;?>style.css"/>

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

<body onload="window.print();">
<table width="700" border="0" align="center" >
<?php 
  



$querycont="select * from company_contacts order by contacts_id desc limit 1";
$resultscont=mysql_query($querycont) or die ("Error: $querycont.".mysql_error());
$rowscont=mysql_fetch_object($resultscont);
  
  
  ?>
  <tr>
    <td colspan="7" align="right"><h4><?php echo $rowscont->cont_person;?></h4></td>
  </tr>
  <tr>
    <td colspan="7"><div align="right"><?php echo $rowscont->building.' '.$rowscont->street; ?><!--Kigali Road, Jamia Plaza, 2nd Floor --></div></td>
  </tr>
   <tr>
    <td colspan="7"><div align="right">
    Mobile: <?php echo $rowscont->phone; ?></div></td>
  </tr>
  <tr>
    <td colspan="7"><div align="right">
    Telephone: <?php echo $rowscont->telephone; ?></div></td>
  </tr>
  <tr>
    <td colspan="7"><div align="right">Email : <?php echo $rowscont->email; ?></div></td>
  </tr><!-- <tr>
    <td colspan="7"><div align="right">Website : <?php echo $rowscont->website; ?></div></td>
  </tr> -->
<tr>
    <td colspan="7"><div align="right"><?php echo $rowscont->fax;?></div></td>
  </tr>

  <tr height="30">
    <td colspan="7" bgcolor="#000033" align="center"><span style="font-size:17px; font-weight:bold; color: #FFFFFF;"><?php echo $title ?></span>
	
	</td>
  </tr>
<?php
 if ($date_from!='' && $date_to!='')
{ 
  
?>
 <tr height="20">
 <td colspan="7"  align="center" ><hr/>

<strong>Period From : <font color="#ff0000"><?php echo $date_from; ?></font> To :  <font color="#ff0000"><?php echo $date_to; ?></font> </strong>


  </tr>
  <?php 
  }
  else
  {?>
 <tr height="20">
 <td colspan="7"  align="center" >

<!--<strong>Period From : <font color="#ff0000"><?php echo $date_from; ?></font> To :  <font color="#ff0000"><?php echo $date_to; ?></font> </strong>-->
<div ><strong><font size="+1">All Transactions</font></strong></div>

  </tr> 
  
  <?php
  
  }
  
  
  
  ?>
  
 <tr height="20"> 
<td colspan="7"  align="right" >

<strong> Date Printed : <?php echo date('d F, Y')?></strong></td>
  </tr>	
	
	<hr/>
	
	</td>
  </tr>


</table>
<table width="700" border="0" align="center" class="table">

	
 <tr  style="background:url(images/description.gif);" height="30" >
    <td  width="200"><div align="center"><strong>Transaction Date</strong></td>
    <td width="500"><div align="center"><strong>Transaction Details</strong></td>
	<td width="200" ><div align="center"><strong>Amount(Foreign Currency)</strong></td>
	<td width="200"><div align="center"><strong>Exchange Rate</strong></td>
	 <td width="200" ><div align="center"><strong>Debit</strong></td>	
	<td width="200" ><div align="center"><strong>Credit</strong></td>
	<td width="200" ><div align="center"><strong>Balance</strong></td>
  
    </tr>
  
  <?php
$amount_in_kshs=0;  
$amount_out_kshs=0;
 $grnd_amount_in_kshs=0;
$grnd_amount_out_kshs=0; 
		

if ($date_from!='' && $date_to!='')
{

$sql="select * from ".$db_table.",currency where ".$db_table.".currency_code=currency.curr_id AND ".$db_table.".amount!='' 
and ".$db_table.".amount!='0' AND ".$db_table.".date_recorded>='$date_from' and date_recorded<='$date_to' 
order by ".$db_table.".date_recorded asc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}
else
{

$sql="select * from ".$db_table.",currency where ".$db_table.".currency_code=currency.curr_id AND 
".$db_table.".amount!='' and ".$db_table.".amount!='0'  order by ".$db_table.".date_recorded asc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}


if (mysql_num_rows($results) > 0)
						  {
							  $RowCounter=0;
							  while ($rows=mysql_fetch_object($results))
							  { 
							  
							  $RowCounter++;
							  if($RowCounter % 2==0)
{
echo '<tr bgcolor="#C0D7E5" >';
}
else 
{
echo '<tr bgcolor="#FFFFCC"  >';
}
 
 
 ?>
 
  
    <td><?php echo $rows->date_recorded;?></td>
    <td><?php echo $rows->transactions;?></td>
	<td align="right"><?php
	$amount=$rows->amount;
	
	if ($amount>0)
	{
	echo $curr_name=$rows->curr_name.' '.number_format($amount,2);
	}
	else	
	{
	echo $curr_name=$rows->curr_name.' '.number_format($str2=substr($amount,1),2);
	
	//echo $curr_name=$rows->curr_name.' '.number_format($rows->amount,2);
	}
	?></td>
	<td align="right"><?php echo number_format($curr_rate=$rows->curr_rate,2);?></td>
	
   
	<td align="right"><?php
	$amount_in=$rows->debit;
	if ($amount_in=='')
         {
		 
		 } 
else
{
	echo number_format($amount_in_kshs=$curr_rate*$amount_in,2);
	}
	?></td>
	
	<td align="right"><?php
	$amount_out=$rows->credit;
	if ($amount_out=='')
         {
		 
		 } 
else
{
	echo number_format($amount_out_kshs=$curr_rate*$amount_out,2);
	}
	//$grnd_amount_out_kshs=$grnd_amount_out_kshs+$amount_out_kshs;
	?></td>
	
	<td align="right"><?php 
	
	$amount_kshs=$curr_rate*$amount;
	$ledger_bal=$ledger_bal+$amount_kshs; 
	echo number_format($ledger_bal,2);
	
	?></td>
   
    </tr>
  <?php 
  //$grnd_amount_in_kshs=$grnd_amount_in_kshs+$amount_in_kshs;
  
  }
  ?>
  
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
   <tr>
    <td colspan="7" align="right"><strong><em>Printed by :
          <?php 
$sqluser="select * FROM users WHERE user_id='$user_id'";
$resultsuser= mysql_query($sqluser) or die ("Error $sqluser.".mysql_error());
	
$rowsuser=mysql_fetch_object($resultsuser);	

echo $rowsuser->f_name;
	
	
	
	?>
    </em></strong></td>
  </tr>
</table>
</form>


</body>
</html>
