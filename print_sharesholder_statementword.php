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
<title>Shareholder Statement </title>
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
    <td colspan="7" bgcolor="#000033" align="center"><span style="font-size:17px; font-weight:bold; color: #FFFFFF;">SHAREHOLDER STATEMENT</span>
	
	</td>
  </tr>


  <tr height="20">
 <td colspan="7"  align="center" ><hr/>

<!--<strong>Period From : <font color="#ff0000"><?php echo $date_from; ?></font> To :  <font color="#ff0000"><?php echo $date_to; ?></font> </strong>-->
<div style="float:left; height:30px; "><strong><font size="+1"> Shareholder : <?php echo $shareholder; ?></font></strong></div>
<div style="float:right;"><strong> Date Printed : <?php echo date('d F, Y')?></strong></div>
  </tr>
	
	
	<hr/>
	
	</td>
  </tr>

</table>
<table width="700" border="0" align="center" class="table">
  <tr  style="background:url(images/description.gif);" height="30" >
 
    <!--<td align="center" width="400"><strong></strong></td>-->
	<td align="center" width="200"><strong>Description</strong></td>
	<td align="center" width="200"><strong>Amount(USD)</strong></td>
    <td align="center" width="260"><strong>Exchange Rate</strong></td>
	<td align="center" width="260"><strong>Share Amount(Kshs)</strong></td>
	
    </tr>
	
	
	
	<?php 
	//$shareholderid=mysql_real_escape_string($_POST['shareholderid']);

	

?>
  <tr height="20" bgcolor="#C0D7E5">
    <!--<td bgcolor="">&nbsp;</td>-->
    <td width="24%"><?php //echo $shareholder; ?> Capital Contributed<font color="#FF0000"></font></td>
    <td width="23%" align="right"><?php 


echo number_format($ttshares=$rowscap->shares_amount,2);


	?>
	</td>
    <td width="10%" align="center"><?php echo $curr_rate=$rowscap->curr_rate; ?></td>
    <td width="19%" align="right"><?php 
	
	echo number_format($shares_kshs=$ttshares*$curr_rate,2);
	?></td>
  </tr>
   <tr height="20" bgcolor="#FFFFCC">
 <!--<td bgcolor="">&nbsp;</td>-->
    <td width="19%"><?php //echo $shareholder; ?>  Dividends<font color="#FF0000"></font></td>
    <td width="23%" align="right"><?php 
	$ttldiv=0;
$sqldiv="SELECT dividend_amount FROM dividends where shares_id='$shareholderid'";
$resultsdiv= mysql_query($sqldiv) or die ("Error $sqldiv.".mysql_error());

if (mysql_num_rows($resultsdiv) > 0)
{

 while ($rowsdiv=mysql_fetch_object($resultsdiv))
							  {
							  
							  $div=$rowsdiv->dividend_amount;
							  $ttldiv=$ttldiv+ $div; 
							  }
							  
						echo number_format($ttldiv,2);
						


}
//$rowsdiv=mysql_fetch_object($resultsdiv);
//echo $dividendcap=$rowsdiv->dividend_amount;
	
	
	?>
	</td>
    <td width="10%" align="center"><?php echo $curr_rate=$rowscap->curr_rate; ?></td>
    <td width="19%" align="right"><?php 
	
	echo number_format($div_kshs=$ttldiv*$curr_rate,2);
	?></td>
  </tr>
   <tr height="20" bgcolor="#C0D7E5">
    <!--<td bgcolor="">&nbsp;</td>-->
    <td width="19%">Net Capital<font color="#FF0000"></font></td>
    <td width="23%" align="right"><strong>
	<?php 
	echo number_format($netcap=$ttshares+$ttldiv,2);
	
	?>
	</strong>
	</td>
    <td width="10%" align="center"><?php echo $curr_rate=$rowscap->curr_rate; ?></td>
    <td width="19%" align="right"><?php 
	
	echo number_format($netcap_kshs=$netcap*$curr_rate,2);
	?></td>
  </tr>
   <tr height="20" bgcolor="#FFFFCC">
   <!--<td bgcolor="">&nbsp;</td>-->
    <td width="19%">Less <?php //echo $shareholder; ?> Withdrawals<font color="#FF0000"></font></td>
    <td width="23%" align="right"><?php 
	$ttlwith=0;
$sqlwith="SELECT dividend FROM withdrawn_dividends where shares_id='$shareholderid'";
$resultswith= mysql_query($sqlwith) or die ("Error $sqlwith.".mysql_error());

if (mysql_num_rows($resultswith) > 0)
{

 while ($rowswith=mysql_fetch_object($resultswith))
							  {
							  
							  $with=$rowswith->dividend;
							  $ttlwith=$ttlwith+ $with; 
							  }
							  
						echo number_format($ttlwith,2);
						


}
	?>
	
	
</td>
    <td width="10%" align="center"><?php echo $curr_rate=$rowscap->curr_rate; ?></td>
    <td width="19%" align="right"><?php 
	
	echo number_format($ttlwith_kshs=$ttlwith*$curr_rate,2);
	?></td>
  </tr>
  
  
   <tr height="20" bgcolor="#C0D7E5">
    <!--<td bgcolor="">&nbsp;</td>-->
    <td width="19%">Balance<font color="#FF0000"></font></td>
    <td width="23%" align="right"><strong><font size="+1">
	<?php 
	echo number_format($capbal=$netcap-$ttlwith,2);
	
	?>
	</strong>
	</td>
   <td width="10%" align="center"><?php echo $curr_rate=$rowscap->curr_rate; ?></td>
    <td width="19%" align="right"><strong><font size="+1"><?php 
	
	echo number_format($capbal_kshs=$capbal*$curr_rate,2);
	?></font></strong></td>
  </tr>
  
	
	
  
  
</table>








</body>
</html>
