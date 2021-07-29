<?php 
/* $qr_confirm23v="SELECT * from user_group_submodule WHERE sub_module_id='$sub_module_id' and `add`='A' and user_group_id='$user_group_id'";
$qr_res23v=mysql_query($qr_confirm23v) or die ('Error : $qr_confirm23v.' .mysql_error());
$num_rows23v=mysql_num_rows($qr_res23v); 
if ($num_rows23v==0) 
{ 
include ('includes/restricted.php');

}
else
{ */

?>

<script type="text/javascript" src="calender/calendar.js"></script>
<script type="text/javascript" src="calender/lang/calendar-en.js"></script>
<script type="text/javascript" src="calender/calendar-setup.js"></script>
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


p {


}
</style>

<script type="text/javascript">
    function ChangeColor(tableRow, highLight)
    {
    if (highLight)
    {
      tableRow.style.backgroundColor = '#FF9900';
    }
    else
    {
      tableRow.style.backgroundColor = '';
    }
  }
  
  $(document).ready(function() {

    $('#example tr').click(function() {
        var href = $(this).find("a").attr("href");
        if(href) {
            window.location = href;
        }
    });

});


 
  </script>

<form name="search" method="post" action="">  
  


<table width="60%" border="0" align="center" style="margin:auto;" class="table">

<tr bgcolor="#FFFFCC">
   
    <td  height="30"  colspan="9" align="center">
	<strong>Filter By Date
    From</strong>
    
    <input type="text" name="date_from" size="20" id="date_from" readonly="readonly" /><input name="DateFormats" id="DateFormats" disabled value="dd/mm/yyyy" type="hidden">
    <strong>To</strong>
    <input type="text" name="date_to" size="20" id="date_to" readonly="readonly" /><input name="DateFormats" id="DateFormats" disabled value="dd/mm/yyyy" type="hidden">
	
	<input type="submit" name="generate" value="Generate"></td>
	
    </tr>
	
	<tr bgcolor="#FFFFCC">
   
    <td colspan="9" height="30" align="right"><font size="+1">

	
<a target="_blank" style="float:right; margin-right:100px; font-weight:bold; font-size:13px; color:#000000" href="print_balancesheet.php?date_from=<?php echo $date_from;?>&date_to=<?php echo $date_to ?>">Print</a>						  
<a  style="float:right; margin-right:50px; font-weight:bold; font-size:13px; color:#000000" href="print_balancesheet_word.php?date_from=<?php echo $date_from;?>&date_to=<?php echo $date_to?>">Export To Excel</a>						  
	
	
	</td>
	</tr>
	
	
	</table>
	
	
<table width="60%" border="0" align="center" style="margin:auto;" bgcolor="#fff">	
	<tr>
 <td colspan="9"> 
 <table border="0" width="100%">

  <tr  style="background:url(images/description.gif);" height="30" >
 <td width="20%"><strong>Account Code</strong></td>
 <td width="40%"><strong>Account Name</strong></td>
 <td width="20%" align="center"><strong>Debit</strong></td>
 <td width="20%" align="center"><strong>Credit</strong></td>
 
 
 
 </tr>
 <?php 
 
 //cost of sales income
$queryop="select * FROM account_type";
$results= mysql_query($queryop) or die ("Error $queryop.".mysql_error());

while ($rows=mysql_fetch_object($results))
{
	
	
	
	
	
	$account_type_id=$rows->account_type_id;
	
$queryop2="select SUM(amount*curr_rate) AS ttl_amount FROM chart_transactions where account_type_id='$account_type_id' ";
$results2= mysql_query($queryop2) or die ("Error $queryop.".mysql_error());
$rows2=mysql_fetch_object($results2);
$amountx=$rows2->ttl_amount;

if ($amountx==0)
{
	
	
}

else
{
	
	$RowCounter++;
							  if($RowCounter % 2==0)
{
	?>
	

<tr onmouseover="ChangeColor(this, true);" 
              onmouseout="ChangeColor(this, false);" bgcolor="#FFFFCC" height="25" onClick="document.location.href='home.php?chart_details=chart_details&account_type_id=<?php echo $rows->account_type_id; ?>&sub_module_id=<?php echo $sub_module_id ?>'">	
	
	<?php

}
else 
{

	?>
	

<tr onmouseover="ChangeColor(this, true);" 
              onmouseout="ChangeColor(this, false);" bgcolor="#C0D7E5" height="25" onClick="document.location.href='home.php?chart_details=chart_details&account_type_id=<?php echo $rows->account_type_id; ?>&sub_module_id=<?php echo $sub_module_id ?>'">	
	
	<?php

}
 
 ?>
 
 
 

 
 <td width="20%"><?php echo $rows->account_code; ?></td>
  <td><?php echo $rows->account_type_name; 
    
 echo $bal_type=$rows->balance_type;
  
  
  ?></td>
  
  
  
  
  
  
 <td width="20%" align="right"><?php 

if ($bal_type=='D')
{

echo number_format($dr_amount=$rows2->ttl_amount,2);
 $ttl_dr=$ttl_dr+$dr_amount;
 
}
else
{
	
	
}
 
 ?></td>

 <td width="20%" align="right"><?php 

if ($bal_type=='C')
{

echo number_format($cr_amount=$rows2->ttl_amount,2);
 $ttl_cr=$ttl_cr+$cr_amount;
 
}
else
{
	
	
}
 ?></td>
 
 
 </tr>
 
 <?php 
}

}
 
 ?>
 <tr><td><strong>Totals</strong></td>
 <td align="right"></td>
 <td align="right"><strong><font size="+1"><span style="text-decoration-line: underline;
  text-decoration-style: double; font-size:16px;"><?php echo number_format( $ttl_dr,2); ?></span></font></strong></td>
 <td align="right"><strong><font size="+1"><span style="text-decoration-line: underline;
  text-decoration-style: double; font-size:16px;"><?php echo number_format( $ttl_cr,2); ?></span></font></strong></td>
 </tr>
 
 

 </table>
 </td></tr>
 </table>
 </table>
  
  <br/>
  
</br></br>



<script type="text/javascript">
  Calendar.setup(
    {
      inputField  : "date_from",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "date_from"       // ID of the button
    }
  );
  
  
   Calendar.setup(
    {
      inputField  : "date_to",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "date_to"       // ID of the button
    }
  );
  
  
  </script>


<?php 
//}

?>