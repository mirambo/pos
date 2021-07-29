<?php 
include('includes/session.php');
include('Connections/fundmaster.php');
$id=$_GET['shareholder_id'];
$date_from=$_GET['date_from'];
$date_to=$_GET['date_to'];
$sqlcap="SELECT * FROM shares where shares_id='$id'";
$resultscap= mysql_query($sqlcap) or die ("Error $sqlcap.".mysql_error());
$rowscap=mysql_fetch_object($resultscap);
$shareholder=$rowscap->share_holder_name;



header("Content-Type: application/vnd.ms-word");
header("Content-Disposition: attachment;Filename=Sharehoder_Statement.doc");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Statement Of Owners Equity </title>
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
    <td colspan="7" align="right"><img src="<?php echo $base_url;?>images/logolpo.png" /></td>
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
    <td colspan="7"><div align="right">Website : www.briskdiagnostics.com</div></td>
  </tr>

  <tr height="30">
    <td colspan="7" bgcolor="#000033" align="center"><span style="font-size:17px; font-weight:bold; color: #FFFFFF;">STATEMENT OF OWNERS EQUITY</span>
	
	</td>
  </tr>


  <tr height="20">
 <td colspan="7"  align="center" ><hr/>

<!--<strong>Period From : <font color="#ff0000"><?php echo $date_from; ?></font> To :  <font color="#ff0000"><?php echo $date_to; ?></font> </strong>-->
<div style="float:left; height:30px; "><strong><font size="+1"> <?php echo $shareholder; ?></font></strong></div>
<div style="float:right;"><strong> Date Printed : <?php echo date('d F, Y')?></strong></div>
  </tr>
	
	
	<hr/>
	
	</td>
  </tr>

</table>
<table width="700" border="0" align="center" class="table">

<tr  style="background:url(images/description.gif);" height="30" >
 
    <td align="center" width="400"><strong>Share Holder Name</strong></td>
	<td align="center" width="200"><strong>Contact Person</strong></td>
	<td align="center" width="200"><strong>Next of Kin</strong></td>
    <td align="center" width="260"><strong>Share Percentage (%)</strong></td>
	<td align="center" width="260"><strong>Net Share Amount(USD)</strong></td>
	<td align="center" width="260"><strong>Exchange Rate<br/>(USD to Kshs)</strong></td>
	<td align="center" width="260"><strong>Share Amount(Kshs)</strong></td>

    </tr>
  
  <?php 
 
$sql="SELECT * FROM shares where status='0' OR status='2'";
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
   
    <td><?php echo $rows->share_holder_name;?></td>
    <td><?php echo $rows->contact_person;?></td>
	<td><?php echo $rows->next_of_kin;?></td>
    <td align="center">
	<?php 
	
$shares_id=$rows->shares_id;
	
$sqlnet="select SUM(amount) as amount,curr_rate from shareholder_transactions where shareholder_id='$shares_id'";
$resultsnet= mysql_query($sqlnet) or die ("Error $sqlnet.".mysql_error());
$rowsnet=mysql_fetch_object($resultsnet);

$shares=$rowsnet->amount;


$sqlnetal="select SUM(amount) as amountal from shareholder_transactions";
$resultsnetal= mysql_query($sqlnetal) or die ("Error $sqlnetal.".mysql_error());
$rowsnetal=mysql_fetch_object($resultsnetal);

$netall_shares=$rowsnetal->amountal;

echo number_format($perc_shares=$shares/$netall_shares*100,2);
	
	
	
	//echo number_format($rows->perc_shares,2);
	
	
	
	?></td>
	<td align="right">
	<?php 
	echo number_format($shares,2);

	
	?>
	
	
	</td>
	<td align="right"><?php echo number_format($curr_rate=$rowsnet->curr_rate,2);	//$curr_rate=$rows->curr_rate;?></td>
	<td align="right"><?php 
	
	echo number_format($shares_kshs=$shares*$curr_rate,2);
	?></td>
	
	
    </tr>
  <?php 
  $grndttlcap=$grndttlcap+$shares;
  $grnd_shares_kshs=$grnd_shares_kshs+$shares_kshs;
  $gnrt_perc_shares=$gnrt_perc_shares+$perc_shares;
  }
  ?>
  <tr height="30" bgcolor="#FFFFCC" >
 
    <td align="center" width="400"><strong>Totals</strong></td>
    <td align="center" width="260"><strong></strong></td>
	<td align="center" width="260"><strong></strong></td>
	<td align="center" width="260"><strong><?php echo $gnrt_perc_shares;?></strong></td>
	<td width="260" align="right"><strong><?php echo number_format($grndttlcap,2); ?></strong></td>
    <!--<td align="center" width="200"><strong>Mode of payment</strong></td>
	<td align="center" width="200"><strong>Date recorded</strong></td>-->
	<td align="center" width="100"><strong></strong></td>
   <td  width="200" align="right"><strong><?php echo number_format($grnd_shares_kshs,2); ?></strong></td>

    </tr>
  <?php 
  
  }
  
  
  ?>
</table>








</body>
</html>
