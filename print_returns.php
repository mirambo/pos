

<table width="700">
<tr  style="background: url(images/menu1.png) repeat-x;" height="30">
<td align="center"><font size=3 color=white>Dispatch Number</font></td>
<td align="center"><font size=3 color=white>Agent Name</font></td>
<td align="center"><font size=3 color=white>Date Dispatched</font></td>
<td align="center"><font size=3 color=white>Quantity Dispatched</font></td>
<td align="center"><font size=3 color=white>Unit Cost (Kshs)</font></td>
<td align="center"><font size=3 color=white>Total Amount Dispatched (Kshs)</font></td>
<td align="center"><font size=3 color=white>Total Amount Returned (Kshs)</font></td>
<td align="center"><font size=3 color=white>Balance (Kshs)</font></td>
<td align="center"><font size=3 color=white>Record Receipts</font></td>
<!--<td align="center"><font size=3 color=white>Modify</font></td>
<td align="center"><font size=3 color=white>Delete</font></td>-->

</tr>
<?php 

if (!isset($_POST['generate']))
{

$infodata="SELECT agents.agent_name,product_units.unit_name,agent_dispatch.dispatch_id,agent_dispatch.quantity_dispatched 
,agent_dispatch.unit_price,agent_dispatch.date_dispatched  FROM agents,product_units,agent_dispatch WHERE agents.agent_id=agent_dispatch.agent_id
AND agent_dispatch.product_unit_id=product_units.product_unit_id";
$infores=mysql_query($infodata) or die("Error : $infodata". mysql_error());
}

else
{
$date_from=$_POST['date_from'];
$date_to=$_POST['date_to'];
$agents=$_POST['agents'];

if ($agents!='0' && $date_from=='' && $date_to=='')
{
//echo "agenty";
$infodata="SELECT agents.agent_name,product_units.unit_name,agent_dispatch.dispatch_id,agent_dispatch.quantity_dispatched 
,agent_dispatch.unit_price,agent_dispatch.date_dispatched  FROM agents,product_units,agent_dispatch WHERE agents.agent_id=agent_dispatch.agent_id
AND agent_dispatch.product_unit_id=product_units.product_unit_id AND agent_dispatch.agent_id='$agents'";
$infores=mysql_query($infodata) or die("Error : $infodata". mysql_error());
}
elseif ($agents=='0' && $date_from!='' && $date_to!='')
{
//echo "date";
$infodata="SELECT agents.agent_name,product_units.unit_name,agent_dispatch.dispatch_id,agent_dispatch.quantity_dispatched 
,agent_dispatch.unit_price,agent_dispatch.date_dispatched  FROM agents,product_units,agent_dispatch WHERE agents.agent_id=agent_dispatch.agent_id
AND agent_dispatch.product_unit_id=product_units.product_unit_id AND agent_dispatch.date_dispatched BETWEEN '$date_from'AND '$date_to' ";
$infores=mysql_query($infodata) or die("Error : $infodata". mysql_error());



}

elseif ($agents!='0' && $date_from!='' && $date_to!='')
{
//echo "all";
$infodata="SELECT agents.agent_name,product_units.unit_name,agent_dispatch.dispatch_id,agent_dispatch.quantity_dispatched 
,agent_dispatch.unit_price,agent_dispatch.date_dispatched  FROM agents,product_units,agent_dispatch WHERE agents.agent_id=agent_dispatch.agent_id
AND agent_dispatch.product_unit_id=product_units.product_unit_id AND agent_dispatch.date_dispatched BETWEEN '$date_from'AND '$date_to' AND agent_dispatch.agent_id='$agents'";
$infores=mysql_query($infodata) or die("Error : $infodata". mysql_error());
}

else
{

//echo "back";
$infodata="SELECT agents.agent_name,product_units.unit_name,agent_dispatch.dispatch_id,agent_dispatch.quantity_dispatched 
,agent_dispatch.unit_price,agent_dispatch.date_dispatched  FROM agents,product_units,agent_dispatch WHERE agents.agent_id=agent_dispatch.agent_id
AND agent_dispatch.product_unit_id=product_units.product_unit_id";
$infores=mysql_query($infodata) or die("Error : $infodata". mysql_error());

}

}




if (mysql_num_rows($infores) >0)
{
$RowCounter=0;
while ($rows=mysql_fetch_object($infores))
{ 
  $RowCounter++;
							  if($RowCounter % 2==0)

{
echo '<tr bgcolor="#C0D7E5" height="25" onmouseover="ChangeColor(this, true);" 
              onmouseout="ChangeColor(this, false);">';
}
else 
{
echo '<tr bgcolor="#FFFFCC" height="25" onmouseover="ChangeColor(this, true);" 
              onmouseout="ChangeColor(this, false);">';
}
 
 
 ?>

<td><?php echo $dispatch_id=$rows->dispatch_id; ?></td>
<td><?php  echo $rows->agent_name; ?></td>
<td align="center"><?php echo $rows->date_dispatched; ?></td>
<td align="center"><?php echo $quant=$rows->quantity_dispatched.' '.$rows->unit_name;?></td>
<td align="right"><?php  echo number_format($unit_price=$rows->unit_price,2); ?></td>
<td align="right"><?php //echo $rows->email_address;
echo number_format($amount=$quant*$unit_price,2);
?></td>

<td align="right"><?php //echo $rows->email_address;
//echo number_format($amount=$quant*$unit_price,2);

$queryprod="select sum(amount_returned) as ttl_rec from agent_receipt where product_dispatch_id='$dispatch_id'";
$resultsprod=mysql_query($queryprod) or die ("Error: $queryprod.".mysql_error());
$rowsprod=mysql_fetch_object($resultsprod);
echo number_format($ttl_rec=$rowsprod->ttl_rec,2);


?></td>

<td align="right"><?php //echo $rows->email_address;
echo number_format($bal=$amount-$ttl_rec,2);
?></td>


<td align="center">
<?php
if ($bal==0)
{

echo "<font size='-1' color='#00CC33'><i>Cleared..</i></font>";
  
}
elseif ($bal==$amount)
{
?>
<a href="return.php?dispatch_id=<?php echo $rows->dispatch_id;?>&amount_dispatched=<?php echo $amount; ?>" style="color:#0033FF">Record Return</a>
<?php
 
}
elseif ($bal < $amount)
{
?>
<a href="return.php?dispatch_id=<?php echo $rows->dispatch_id;?>&amount_dispatched=<?php echo $amount; ?>" style="color:#ff0000">Receive Balance</a>
<?php
 
}




?>




</td>
<!--<td align="center"><a rel="facebox" href="edit_account_chart.php?chart_id=<?php echo $rows->chart_id; ?>"><img src=images/b_edit.png border="0"></a></td>
<td align="center"><a href="delete.php?chart_id=<?php echo $rows->chart_id; ?>"><img src=images/b_drop.png border="0"></a></td>-->


</tr>
<?php
$ttl_amount_dispatched=$ttl_amount_dispatched+$amount;
$ttl_amount_rec=$ttl_amount_rec+$ttl_rec;
$ttl_bal=$ttl_bal+$bal;

}
?>
<tr height="30" bgcolor="#FFFFCC">
<td></td>
<td></td>
<td></td>
<td></td>
<td><strong>Grand Total<strong></td>
<td align="right"><strong><?php echo number_format($ttl_amount_dispatched,2); ?></strong></td>
<td align="right"><strong><font color="#00CC33"><?php echo number_format($ttl_amount_rec,2); ?></font></strong></td>
<td align="right"><strong><font color="#ff0000"><?php echo number_format($ttl_bal,2); ?></strong></td>
<td></td>


</tr>
<?php 



}



?>
<?php 
if ($date_from!='')
{
?>
<tr height="30" bgcolor="#FFFFCC">
<td></td>
<td></td>
<td></td>
<td></td>
<td>Balance b/f</td>
<td align="right"><strong><?php 

$infodatabf="SELECT agents.agent_name,product_units.unit_name,agent_dispatch.dispatch_id,agent_dispatch.quantity_dispatched 
,agent_dispatch.unit_price,agent_dispatch.date_dispatched  FROM agents,product_units,agent_dispatch WHERE agents.agent_id=agent_dispatch.agent_id
AND agent_dispatch.product_unit_id=product_units.product_unit_id AND agent_dispatch.date_dispatched <'$date_from'";
$inforesbf=mysql_query($infodatabf) or die("Error : $infodatabf". mysql_error());

if (mysql_num_rows($infores) >0)
{
while ($rowsbf=mysql_fetch_object($inforesbf))
{
$quantbf=$rowsbf->quantity_dispatched;
$unit_pricebf=$rowsbf->unit_price;
$amountbf=$quantbf*$unit_pricebf;
      $dispatch_idbf=$rowsbf->dispatch_id;
$queryprodbf="select sum(amount_returned) as ttl_recbf from agent_receipt,agent_dispatch WHERE agent_dispatch.dispatch_id=product_dispatch_id and agent_receipt.product_dispatch_id='$dispatch_idbf' and agent_dispatch.date_dispatched <'$date_from'";
$resultsprodbf=mysql_query($queryprodbf) or die ("Error: $queryprodbf.".mysql_error());
$rowsprodbf=mysql_fetch_object($resultsprodbf);

 number_format($ttl_recbf=$rowsprodbf->ttl_recbf,2);	  
	  





$ttl_amount_recbf=$ttl_amount_recbf+$ttl_recbf;
$grnd_amountbf=$grnd_amountbf+$amountbf;
$ttl_balbf=$grnd_amountbf-$ttl_amount_recbf;


}
echo number_format($grnd_amountbf,2);

}

 ?></strong></td>
<td align="right"><strong><font color="#00CC33"><?php echo number_format($ttl_amount_recbf,2); ?></font></strong></td>
<td align="right"><strong><font color="#ff0000"><?php echo number_format($ttl_balbf,2); ?></strong></td>
<td></td>
</tr>

<tr height="30" bgcolor="#FFFFCC">
<td></td>
<td></td>
<td></td>
<td></td>
<td>Current Balance</td>
<td align="right"><strong><?php 
echo number_format($curr_bal=$grnd_amountbf+$ttl_amount_dispatched,2);


 ?></strong></td>
<td align="right"><strong><font color="#00CC33">

<?php 
echo number_format($curr_amnt_rec=$ttl_recbf+$ttl_amount_rec,2);
//echo number_format($ttl_amount_rec,2); ?></font></strong>

</td>
<td align="right"><strong><font color="#ff0000">

<?php 
$ttl_balbf=$ttl_balbf+$ttl_bal;
echo number_format($ttl_balbf,2); 


?></strong></td>
<td></td>
</tr>

<?php
}
else
{

}

 ?>




</table>