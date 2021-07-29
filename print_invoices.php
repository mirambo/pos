<?php 
include('includes/session.php');
include('Connections/fundmaster.php');

/*header("Content-Type: application/vnd.ms-word");
header("Content-Disposition: attachment;Filename=Invoices.doc");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");*/


$supplierds=$_GET['client']; 
if ($supplierds=='')
{
$client==0;
}
else
{
$client=$supplierds;
}
$date_from=$_GET['date_from'];
$date_to=$_GET['date_to'];

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<!--<link rel="stylesheet" type="text/css" href="<?php echo $base_url;?>style.css" />-->

<!-- CSS goes in the document HEAD or added to your external stylesheet -->
<style type="text/css">
.body
{
	font-family:aerial;
	font-size:14px;
	
	}







.table
{
border-collapse:collapse;
}
.table td, tr
{
border:1px solid black;
padding:3px;
}

@font-face {font-family:"1979 Dot Matrix Regular";src:url("1979_dot_matrix.eot?") format("eot"),url("1979_dot_matrix.woff") format("woff"),

url("font/1979_dot_matrix.ttf") format("truetype")
,url("1979_dot_matrix.svg#1979-Dot-Matrix") format("svg");font-weight:normal;font-style:normal;}



</style>

<!-- Table goes in the document BODY -->


</head>

<body>
<table width="100%" border="0" align="center" >
  
	
	 <?php 
  
$querysup="select * from clients where client_id ='$sess_client_id'";
$resultssup=mysql_query($querysup) or die ("Error: $querysup.".mysql_error());
$rowssupp=mysql_fetch_object($resultssup);

$querycont="select * from company_contacts order by contacts_id desc limit 1";
$resultscont=mysql_query($querycont) or die ("Error: $querycont.".mysql_error());
$rowscont=mysql_fetch_object($resultscont);
  
  
  ?>
  <tr>
    <td colspan="7" align="right"><img src="<?php echo $base_url;?>images/logolpo.png" /></td>
  </tr>
  <tr>
    <td colspan="7"><div align="right"><?php echo $rowscont->building.' '.$rowscont->street; ?><!--Kigali Road, Jamia Plaza, 2nd Floor --></div></td>
  </tr>
   <tr>
    <td colspan="7"><div align="right">
        <!--Tel : +254 (0) 538004579 -->
    Mobile: <?php echo $rowscont->phone; ?></div></td>
  </tr>
  <tr>
    <td colspan="7"><div align="right">
        <!--Tel : +254 (0) 538004579 -->
    Telephone: <?php echo $rowscont->telephone; ?></div></td>
  </tr>
  <tr>
    <td colspan="7"><div align="right">Email : <?php echo $rowscont->email; ?></div></td>
  </tr>
   <tr>
    <td colspan="7"><div align="right">Website : www.briskdiagnostics.com</div></td>
  </tr>
  
  
  <tr height="30" >
    <td colspan="7" bgcolor="#000033" align="center"><span style="font-size:17px; font-weight:bold; color: #FFFFFF;">LIST OF INVOICE(S) GENERATED <?php// echo date('Y')?></span></td>
  </tr>
  
  
 <!-- <tr height="20">
    <td colspan="6"  align="right">DATE : <?php //echo (Date("l F d, Y")); ?></td>
  </tr>
  
   <tr height="20">
    <td colspan="6"  align="right"><strong>INVOICE NO :  <?php 
	//echo $get_invoice_no;
	
	?>
	
	</strong></td>
  </tr>-->
 
  
  
</table>
<table width="100%" border="0" align="center">
 <tr style="background:url(images/description.gif);" height="30" >
    <td width="200"><div align="center"><strong>Invoice No</strong></td>
    <td width="300"><div align="center"><strong>Sales Date</strong></td>
	<td width="15%"><div align="center"><strong>Client Name</strong></td>
	<td width="300"><div align="center"><strong>Amount Invoiced (Other Currency)</strong></td>
	<td width="300"><div align="center"><strong>Exchange Rate</strong></td>
	<td width="300"><div align="center"><strong>Amount Invoiced (Kshs)</strong></td>


    </tr>

 
<?php
if ($shop_id==0)
{
if (!isset($_POST['generate']))
{
 
$sql="select sales_code.invoice_no,sales_code.sales_code_id,sales_code.invoice_no,
sales_code.date_generated,sales_code.user_id,clients.c_name FROM clients,sales_code WHERE sales_code.client_id=clients.client_id 
AND sales_code.status='0' AND sales_code.display='0' AND sales_code.sale_type='i'  order by sales_code.sales_code_id desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}
else
{
$date_from=$_POST['from'];
$date_to=$_POST['to'];
$client=$_POST['client'];
if ($client!='0' && $date_from=='' && $date_to=='')
{
//echo "client only";
$sql="select sales_code.invoice_no,sales_code.sales_code_id,sales_code.invoice_no,
sales_code.date_generated,sales_code.user_id,clients.c_name FROM clients,sales_code WHERE sales_code.client_id=clients.client_id 
AND sales_code.status='0' AND sales_code.display='0' AND sales_code.sale_type='i' AND sales_code.client_id='$client' order by sales_code.sales_code_id desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
elseif($client=='0' && $date_from!='' && $date_to!='')
{
//echo "Dea only";
$sql="select sales_code.invoice_no,sales_code.sales_code_id,sales_code.invoice_no,
sales_code.date_generated,sales_code.user_id,clients.c_name FROM clients,sales_code WHERE sales_code.client_id=clients.client_id 
AND sales_code.status='0' AND sales_code.display='0' AND sales_code.sale_type='i' AND sales_code.date_generated BETWEEN '$date_from' AND '$date_to' order by sales_code.sales_code_id desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
elseif($client!='0' && $date_from!='' && $date_to!='')
{
//echo "Date  and cilonly";
$sql="select sales_code.invoice_no,sales_code.sales_code_id,sales_code.invoice_no,
sales_code.date_generated,sales_code.user_id,clients.c_name FROM clients,sales_code WHERE sales_code.client_id=clients.client_id 
AND sales_code.status='0' AND sales_code.display='0' AND sales_code.sale_type='i' AND sales_code.client_id='$client' AND sales_code.date_generated BETWEEN '$date_from' AND '$date_to' order by sales_code.sales_code_id desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}
else
{
//echo "kba";
$sql="select sales_code.invoice_no,sales_code.sales_code_id,sales_code.invoice_no,
sales_code.date_generated,sales_code.user_id,clients.c_name FROM clients,sales_code WHERE sales_code.client_id=clients.client_id 
AND sales_code.status='0' AND sales_code.display='0' AND sales_code.sale_type='i' order by sales_code.sales_code_id desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}

}

}
//end of if user not related to any shop
else
{

if (!isset($_POST['generate']))
{
 
$sql="select sales_code.invoice_no,sales_code.user_id,sales_code.sales_code_id,sales_code.invoice_no,
sales_code.date_generated,clients.c_name FROM clients,sales_code,users WHERE sales_code.client_id=clients.client_id 
AND sales_code.status='0' AND sales_code.display='0' AND sales_code.sale_type='i' and sales_code.user_id=users.user_id AND users.shop_id='$shop_id' order by sales_code.sales_code_id desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}
else
{
$date_from=$_POST['from'];
$date_to=$_POST['to'];
$client=$_POST['client'];
if ($client!='0' && $date_from=='' && $date_to=='')
{
//echo "client only";
$sql="select sales_code.invoice_no,sales_code.user_id,sales_code.sales_code_id,sales_code.invoice_no,
sales_code.date_generated,clients.c_name FROM clients,sales_code,users WHERE sales_code.client_id=clients.client_id 
AND sales_code.status='0' AND sales_code.display='0' AND sales_code.sale_type='i' and sales_code.user_id=users.user_id AND users.shop_id='$shop_id' AND sales_code.client_id='$client' order by sales_code.sales_code_id desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
elseif($client=='0' && $date_from!='' && $date_to!='')
{
//echo "Dea only";
$sql="select sales_code.invoice_no,sales_code.user_id,sales_code.sales_code_id,sales_code.invoice_no,
sales_code.date_generated,clients.c_name FROM clients,sales_code,users WHERE sales_code.client_id=clients.client_id 
AND sales_code.status='0' AND sales_code.display='0' AND sales_code.sale_type='i' and sales_code.user_id=users.user_id AND users.shop_id='$shop_id' AND sales_code.date_generated BETWEEN '$date_from' AND '$date_to' order by sales_code.sales_code_id desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
elseif($client!='0' && $date_from!='' && $date_to!='')
{
//echo "Date  and cilonly";
$sql="select sales_code.invoice_no,sales_code.user_id,sales_code.sales_code_id,sales_code.invoice_no,
sales_code.date_generated,clients.c_name FROM clients,sales_code,users WHERE sales_code.client_id=clients.client_id 
AND sales_code.status='0' AND sales_code.display='0' AND sales_code.sale_type='i' and sales_code.user_id=users.user_id AND users.shop_id='$shop_id' AND sales_code.client_id='$client' AND sales_code.date_generated BETWEEN '$date_from' AND '$date_to' order by sales_code.sales_code_id desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}
else
{
//echo "kba";
$sql="select sales_code.invoice_no,sales_code.user_id,sales_code.sales_code_id,sales_code.invoice_no,
sales_code.date_generated,clients.c_name FROM clients,sales_code,users WHERE sales_code.client_id=clients.client_id 
AND sales_code.status='0' AND sales_code.display='0' AND sales_code.sale_type='i' and sales_code.user_id=users.user_id AND users.shop_id='$shop_id' order by sales_code.sales_code_id desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}

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
  
    <td><a href="view_sales_trans.php?sales_code_id=<?php echo $rows->sales_code_id;?>"><?php echo $invoice_no=$rows->invoice_no;?></a>
	
	</td>
	 <!--<td><?php 
$shop_keeper=$rows->user_id;
$sqlshp="SELECT clients.c_name FROM sales_code,clients,users WHERE users.user_id=sales_code.user_id and 
sales_code.user_id='$shop_keeper'";
$resultsshp= mysql_query($sqlshp) or die ("Error $sqlshp.".mysql_error());
$rowsshp=mysql_fetch_object($resultsshp);

$c_name=$rowsshp->c_name;

if ($c_name=='')
{
echo "<i>Super Administrator</i>";
}
else
{
echo $c_name;
}

	 
	 
	 ?></td>-->
    <td align="center"><?php echo $rows->date_generated;?></td>
   
	<td><?php echo $rows->c_name;?></td>
	
	
	<td align="right"><?php 
$sales_code_id=$rows->sales_code_id;

$sqllpdet="select accounts_receivables_ledger.currency_code,accounts_receivables_ledger.curr_rate, 
accounts_receivables_ledger.amount,currency.curr_name FROM currency,accounts_receivables_ledger WHERE 
accounts_receivables_ledger.currency_code=currency.curr_id AND accounts_receivables_ledger.sales_code='crs$sales_code_id'";
$resultslpdet= mysql_query($sqllpdet) or die ("Error $sqllpdet.".mysql_error());


$rowslpdet=mysql_fetch_object($resultslpdet);


echo $rowslpdet->curr_name.' '.number_format($amount=$rowslpdet->amount,2);



?></strong></td>
	
	
	<td align="center"><?php echo number_format($curr_rate=$rowslpdet->curr_rate,2);?></td>
	<td align="right">
	<?php 
	echo number_format($inv_amnt_kshs=$amount*$curr_rate,2);
	
	
	?>
	
	</td>
	
	
  
    </tr>
  <?php 

 $inv_grnd_ttl_kshs=$inv_grnd_ttl_kshs+$inv_amnt_kshs;
 
  }
  ?>
  
  <tr height="30" bgcolor="#FFFFCC">

<td></td>
  <td colspan="4" align="center"><strong><font size="+1">Totals</font></td>
  <td align="right"><strong><font size="+1"><?php echo  number_format($inv_grnd_ttl_kshs,2); ?></font></strong></td>
  <td></td>
  <td></td>
  
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



</body>
</html>
