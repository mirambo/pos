 <?php 
 include('Connections/fundmaster.php'); 
 include ('top_grid_includes.php'); 
 
 ?>

<html xmlns="http://www.w3.org/1999/xhtml">

<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>
<script language="javaScript" src="gen_validatorv4.js"  type="text/javascript" xml:space="preserve"></script>
<script type="text/javascript" src="calender/calendar.js"></script>
<script type="text/javascript" src="calender/lang/calendar-en.js"></script>
<script type="text/javascript" src="calender/calendar-setup.js"></script>

<style type="text/css">

@import url(calender/calendar-win2k-1.css);


#myBtn {
    display: none; /* Hidden by default */
    position: fixed; /* Fixed/sticky position */
    bottom: 20px; /* Place the button at the bottom of the page */
    right: 30px; /* Place the button 30px from the right */
    z-index: 99; /* Make sure it does not overlap */
    border: none; /* Remove borders */
    outline: none; /* Remove outline */
    background-color: red; /* Set a background color */
    color: white; /* Text color */
    cursor: pointer; /* Add a mouse pointer on hover */
    padding: 15px; /* Some padding */
    border-radius: 10px; /* Rounded corners */
}

#myBtn:hover {
    background-color: #555; /* Add a dark-grey background on hover */
}

</style>
<link href="css/superTables.css" rel="stylesheet" type="text/css" />

<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>

<script type="text/javascript"> 

function confirmDelete()
{
    return confirm("Are you sure you want to delete?");
}

</script>
<script type="text/javascript"> 

function confirmBounce()
{
    return confirm("Are you sure you want to declare this cheque as bounced?");
}



window.onscroll = function() {scrollFunction()};

function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        document.getElementById("myBtn").style.display = "block";
    } else {
        document.getElementById("myBtn").style.display = "none";
    }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
    document.body.scrollTop = 0; // For Chrome, Safari and Opera
    document.documentElement.scrollTop = 0; // For IE and Firefox
} 

</script>



		
			
			
<form name="filter" method="post" action=""> 			
<table width="100%" border="0">
  <tr bgcolor="#FFFFCC">
   
    <td colspan="11" height="30" align="center"> 
	<?php
	
	//$invoice_no=$_GET['invoice_no'];

if ($_GET['invoice_payment_confirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:550px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Payment Received successfully for the Invoice number' ;?> <?php echo $invoice_no;?> <?php echo '</font></strong></p></div>';
?> 

<?php 

if ($_GET['deleteconfirm']==1)
echo "<p align='center'><strong><font color='#FF0000'>Payment Cancelled Successfuly!!</font></strong></p>";
?>
	
	</td>
	
    </tr>
	<tr bgcolor="#FFFFCC" height="30">
	<td colspan="11" align="center"><strong>Search : By Customer Name:</strong>
	<input type="text" name="client" size="30" />
	
	
	
	
<strong>Or By Date</strong>
						<strong>From : </strong><input type="text" name="from" size="30" id="from" readonly="readonly" /><strong>To:</strong>
		<input type="text" name="to" size="25" id="to" readonly="readonly" />
			<input type="submit" name="generate" value="Filter">
											

					
	
    </tr>
	
		</table>
	<table width="100%" border="0" align="center" bgcolor="#9AD7AF" class="display nowrap" style="border-radius:5px;" id="example">	

    <thead>

	
	
	
   <tr style="background:url(images/description.gif);" height="30" >
    <td width="5%"><div align="center"><strong>Posting No</strong></td>
    <td width="10%"><div align="center"><strong>Date Paid</strong></td>
		 <td width="10%" ><div align="center"><strong>Ref No</strong></td>
	<td width="10%"><div align="center"><strong>Supplier Name</strong></td>	
	<td width="10%"><div align="center"><strong>Currency</strong></td>
	<td width="10%"><div align="center"><strong>Rate</strong></td>	

	 <td width="10%" ><div align="center"><strong>Account Debited</strong></td>
	 <td width="10%" ><div align="center"><strong>Account Credited</strong></td>
	 	<td width="10%"><div align="center"><strong>Total Amount</strong></td>
	<!--<td width="10%"><div align="center"><strong>VAT</strong></td>-->
	 		


 <td width="1%"><div align="center"><strong>Edit</strong></td>
   
 <!--<td width="1%"><div align="center"><strong>Cancel</strong></td>-->

   
   
    </tr>
	    </thead>
  
<?php

 $start=date('Y-m-d');

 //$yesterday = new DateTime('yesterday');
 $tomorrow = new DateTime('tomorrow');

// e.g. echo 2010-10-13
 //$start=$yesterday->format('Y-m-d');
 $kesho=$tomorrow->format('Y-m-d');



if (!isset($_POST['generate']))
{
 
$queryop="select * FROM suppliers,purchases_debit_journal_code,currency where 
purchases_debit_journal_code.supplier_id=suppliers.supplier_id
and purchases_debit_journal_code.currency=currency.curr_id AND purchases_debit_journal_code.journal_type='CRT'
ORDER BY purchases_debit_journal_code.journal_code_id desc";
$results= mysql_query($queryop) or die ("Error $queryop.".mysql_error());
} 


else
{
$date_from=$_POST['from'];
$date_to=$_POST['to'];
$client=$_POST['client'];
$mop=$_POST['mop'];


$queryop= "select * FROM customer,purchases_debit_journal,currency";
    $conditions = array();
	
if($client!='') 
 {
	
      $conditions[] = "customer.customer_name LIKE '%$client%' ";
} 

 if($date_from!='' && $date_to!='' ) 
 {
	
      $conditions[] = "purchases_debit_journal.date_paid >='$date_from' AND purchases_debit_journal.date_paid <='$date_to'";
}

 if($mop!=0) 
 {
	
      $conditions[] = "purchases_debit_journal.mop='$mop'";
}


 	
if (count($conditions) > 0) 
	
    
 {


$queryop .= " WHERE " . implode(' AND ', $conditions)." AND purchases_debit_journal.supplier_id=suppliers.supplier_id 
and purchases_debit_journal.journal_type='DRT' and purchases_debit_journal.currency_code=currency.curr_id ORDER BY purchases_debit_journal.date_received desc";
//$queryop .= " order by task_name asc";
 
 
 }
 
 else
 {

$queryop="select * FROM customer,mop,purchases_debit_journal,currency where purchases_debit_journal.mop=mop.mop_id 
and purchases_debit_journal.journal_type='DRT' and purchases_debit_journal.supplier_id=suppliers.supplier_id and purchases_debit_journal.currency_code=currency.curr_id
ORDER BY purchases_debit_journal.date_received desc ";
$results= mysql_query($queryop) or die ("Error $queryop.".mysql_error());
 
 
 }
	
	

    $results = mysql_query($queryop) or die ("Error $queryop.".mysql_error());


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


$invoice_id=$rows->customer_payment_code_id;
$sql34="select * FROM order_code_get where order_code_id='$invoice_id'";
$results34= mysql_query($sql34) or die ("Error $sql34.".mysql_error());
$rows34=mysql_fetch_object($results34);
$invoice_no=$rows34->lpo_no;


 
 ?>
 
 <td align="center"><?php 


echo $journal_code_id=$rows->journal_code_id;
	
	?></td>
  
    <td>
<?php 
echo $date_received=$rows->journal_date; 

$journal_code_id=$rows->journal_code_id;
	
	?>
	</td>
	<td><?php echo $rows->ref_no;?></td>
	<td><?php $sup_name2=$rows->sup_code.' '.$rows->supplier_name;
	
	
	
	   echo wordwrap($sup_name2, 15, "<br />\n");
	
	
	
	?></td>

	<td>

	
	<?php 
	
		 echo  $rows->curr_name;?>
	
	

	
</td>




	<td align="">
	
	
<?php
	
	  echo number_format($curr_rate=$rows->curr_rate,2);?>
	

	
	</td>

	 


	

	
	<td align="center">
	<table align="right" border="0" width="100%" class="table" bgcolor="#000">
		<tr>
	<td><strong>Account</strong></td>
	<td><strong>Amount</strong></td>
	<!--<td><strong>VAT</strong></td>-->
	</tr>
	<?php 
	
$ttl_debit_amount=0;
$ttl_debit_vat=0;
$sql34c="select * FROM account_type,purchases_debit_journal_transaction where 
purchases_debit_journal_transaction.debit_account_id=account_type.account_type_id AND 
purchases_debit_journal_transaction.journal_code_id='$journal_code_id'";
$results34c= mysql_query($sql34c) or die ("Error $sql34c.".mysql_error());


while ($rows34c=mysql_fetch_object($results34c))
{
	
	?>
	
	<tr>
   <td width="70%">
   <?php 
$acc_name_dr=$rows34c->account_code.' - '.$rows34c->account_type_name;

 echo wordwrap($acc_name_dr, 20, "<br />\n");

?>

</td>
<td align="right">   <?php 
echo number_format($journal_debit_amount=$rows34c->journal_debit_amount,2);

$ttl_debit_amount=$ttl_debit_amount+$journal_debit_amount;

?></td>

<!--<td align="right"><?php echo number_format($journal_debit_vat_value=$rows34c->journal_debit_vat_value,2); 


$ttl_debit_vat=$ttl_debit_vat+$journal_debit_vat_value;
?></td>-->


<?php
	
	
}
	?>
	
	<tr>
<td><strong>Totals</strong></td>
<td align="right"><strong><?php echo number_format($ttl_debit_amount,2); ?></strong></td>
<!--<td align="right"><strong><?php echo number_format($ttl_debit_vat,2); ?></strong></td>-->
</tr>	
	
	</table>
	
	</td>
	
	<td align="center">
	
	<table align="right" border="0" width="100%" class="table" bgcolor="#000">
	<tr>
	<td><strong>Account</strong></td>
	<td><strong>Amount</strong></td>
	<!--<td><strong>VAT</strong></td>-->
	</tr>
	<?php 
	
	$ttl_credit_amount=0;
	$ttl_cred_vat=0;
$sql34c="select * FROM account_type,purchases_debit_journal_transaction where 
purchases_debit_journal_transaction.credit_account_id=account_type.account_type_id AND 
purchases_debit_journal_transaction.journal_code_id='$journal_code_id'";
$results34c= mysql_query($sql34c) or die ("Error $sql34c.".mysql_error());


while ($rows34c=mysql_fetch_object($results34c))
{
	
	?>
	
	<tr>
   <td width="70%">
   <?php 
$acc_name_cr=$rows34c->account_code.' - '.$rows34c->account_type_name;


 echo wordwrap($acc_name_cr, 20, "<br />\n");

?>

</td>
<td align="right">   <?php 
echo number_format($journal_credit_amount=$rows34c->journal_credit_amount,2);


$ttl_credit_amount=$ttl_credit_amount+$journal_credit_amount;



?></td>

<!--<td align="right"><?php echo number_format($journal_credit_vat_value=$rows34c->journal_credit_vat_value,2);  



$ttl_cred_vat=$ttl_cred_vat+$journal_credit_vat_value;

?></td>-->

<?php
	
	
}
	?>
	
		<tr>
<td><strong>Totals</strong></td>
<td align="right"><strong><?php echo number_format($ttl_credit_amount,2); ?></strong></td>
<!--<td align="right"><strong><?php echo number_format($ttl_cred_vat,2); ?></strong></td>-->
</tr>	
	
	</table>
	
	</td>
	
	<td><?php echo number_format($ttl_credit_amount,2); 
	
	
	
	$grnd_ttl_cred=$grnd_ttl_cred+$ttl_credit_amount;
	
	
	
	
	?></td>
	<!--<td><?php echo number_format($ttl_cred_vat,2); 
	
	
	$grnd_ttl_vat=$grnd_ttl_vat+$ttl_cred_vat;
	
	?></td>-->
	

	



	
	
	<td align="center"><a href="home.php?purchases_credit_journal&id=<?php echo $journal_code_id; ?>"><img src="images/edit.png"></a></td>

	
	<!--
	
	<td align="center"><a href="delete_supplier_payment.php?invoice_payment_id=<?php echo $rows->supplier_payment_id; ?>"  onClick="return confirmDelete();"><img src="images/delete.png"></a></td>
    -->

  
    </tr>
  <?php 


  }
  ?>
   <tr height="30" bgcolor="#FFFFCC">
<td width="200"><strong>Grand Total</strong></td>
	 <td width="20">  </td>
	 <td width="20">  </td>
	 <td width="20">  </td>
	 <td width="20">  </td>

	 <td width="20">  </td>
	 <td width="20">  </td>
	 <td width="20">  </td>


	 	<td width="200" ><div align="left"><strong><font size="+1" color="#ff0000;"><?php 
	echo number_format($grnd_ttl_cred,2);
	
	
	?></font></strong></td>
	
		 	<!--<td width="200" ><div align="left"><strong><font size="+1" color="#ff0000;"><?php 
	echo number_format($grnd_ttl_vat,2);
	
	
	?></font></strong></td>-->

	
	<td></td>



	



	







   
    </tr>
  <?php
  
  
  
  }
  
  else
  {
  
  ?>
  
  
  <tr bgcolor="#FFFFCC">
   
    <td colspan="11" height="30" align="center"> 
	<font color="#ff0000">No Results found!!</font>
	
	</td>
	
    </tr>
	
	<?
  
  }
  ?>
</table>

</form>

<button onclick="topFunction()" id="myBtn" title="Go to top">Back To Top</button>
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
  
  <SCRIPT src="js/superTables.js" 
type=text/javascript></SCRIPT>

<SCRIPT type=text/javascript>
//<![CDATA[

(function() {
	var mySt = new superTable("demoTable", {
		cssSkin : "sSky",
		fixedCols : 1,
		headerRows : 1,
		onStart : function () {
			this.start = new Date();
		},
		onFinish : function () {
			document.getElementById("testDiv").innerHTML += "Finished...<br>" + ((new Date()) - this.start) + "ms.<br>";
		}
	});
})();

//]]>
</SCRIPT>	
		
