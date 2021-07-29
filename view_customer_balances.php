<?php 
include('Connections/fundmaster.php'); 
$supp_name=$_POST['supp_name'];
$date_from=$_POST['date_from'];
$date_to=$_POST['date_to'];

 include ('top_grid_includes.php'); 
?>
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
		
		
		
		<?php require_once('includes/customersubmenu.php');  ?>
		
		<h3>:: List of All Customer Balances Summary</h3>
		
         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
			<div id="cont-left-full" class="br-5">

<?php

?>
 <form name="search" method="post" action="">  			
				
			
<table width="70%" border="0" style="margin:auto;">
  <tr bgcolor="#FFFFCC">
   
    <td colspan="10" height="30" align="center"> 

	
	</td>
	
    </tr>
<tr bgcolor="#FFFFCC">
   
    <td  height="30"  colspan="10" align="center">
	<strong>Search Customer - Enter Name: 
    </strong>
    
    
    <input type="text" name="supp_name" size="20" />
	<strong>Date From:</strong>
    <input type="text" name="date_from" id="date_from" size="20" />
	
		<strong>Date To:</strong>
    <input type="text" name="date_to" id="date_to" size="20" />
	
	<input type="submit" name="generate" value="Search">
	
	
	</td>
	
    </tr>	
	</table>
		<table width="60%" border="0" align="center" bgcolor="#9AD7AF" class="display nowrap" style="border-radius:5px;" id="example">	

    <thead>
	
  
  <tr  style="background:url(images/description.gif);" height="30" >
  <td align="" width="20%"><strong>Customer Code.</strong></td>    
    <td align="" width="40%"><strong>Customer Name</strong></td>
	<td align="" width="40%"><strong>Balance Amount </strong></td>


    </tr>
	
	 </thead>
  
  <?php 
 


  if ($user_group_id==15 || $user_group_id==34)

 { 
    
if (!isset($_POST['generate']))
{

$sql="SELECT SUM(amount*customer_transactions.curr_rate) as ttl_bal,customer.customer_code,customer.customer_name,customer.customer_id FROM 
customer,customer_transactions where customer_transactions.customer_id=customer.customer_id  GROUP BY 
customer_transactions.customer_id 
order by ttl_bal desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}
else
{



if ($supp_name!='' && $date_from=='' && $date_to=='')
{
$sql="SELECT SUM(amount*customer_transactions.curr_rate) as ttl_bal,customer.customer_code,customer.customer_name,customer.customer_id FROM 
customer,customer_transactions where customer_transactions.customer_id=customer.customer_id  and customer.customer_name LIKE '%$supp_name%' GROUP BY 
customer_transactions.customer_id 
order by ttl_bal desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
elseif ($supp_name=='' && $date_from!='' && $date_to!='')
{
$sql="SELECT SUM(amount*customer_transactions.curr_rate) as ttl_bal,customer.customer_code,customer.customer_name,customer.customer_id FROM 
customer,customer_transactions where customer_transactions.customer_id=customer.customer_id  
and customer_transactions.transaction_date>='$date_from' AND customer_transactions.transaction_date<='$date_to' GROUP BY 
customer_transactions.customer_id order by ttl_bal desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
elseif ($supp_name!='' && $date_from!='' && $date_to!='')
{
$sql="SELECT SUM(amount*customer_transactions.curr_rate) as ttl_bal,customer.customer_code,customer.customer_name,customer.customer_id FROM 
customer,customer_transactions where customer_transactions.customer_id=customer.customer_id  
and customer_transactions.transaction_date>='$date_from' AND customer_transactions.transaction_date<='$date_to' and customer.customer_name LIKE '%$supp_name%' 
GROUP BY customer_transactions.customer_id order by ttl_bal desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
else
{
$sql="SELECT SUM(amount*customer_transactions.curr_rate) as ttl_bal,customer.customer_code,customer.customer_name,customer.customer_id FROM 
customer,customer_transactions where customer_transactions.customer_id=customer.customer_id  GROUP BY 
customer_transactions.customer_id 
order by ttl_bal desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}


}
 }
 else
 {
	 
	 
if (!isset($_POST['generate']))
{

 
$sql="SELECT SUM(amount) as ttl_bal,customer.customer_code,customer.customer_name,customer.customer_id FROM 
customer,customer_transactions where customer_transactions.customer_id=customer.customer_id and 
customer_transactions.shop_id='$user_id' GROUP BY customer_transactions.customer_id order by ttl_bal desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}
else
{
$supp_name=$_POST['supp_name'];
$date_from=$_POST['date_from'];
$date_to=$_POST['date_to'];

if ($supp_name!='' && $date_from=='' && $date_to=='')
{
$sql="SELECT SUM(amount) as ttl_bal,customer.customer_code,customer.customer_name,customer.customer_id FROM 
customer,customer_transactions,sales where  
customer_transactions.customer_id=customer.customer_id and sales.customer_id=customer.customer_id and sales.sales_rep='$user_id'
 AND customer.customer_name LIKE '%$supp_name%' GROUP BY customer_transactions.customer_id order by customer.customer_name asc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
elseif ($supp_name=='' && $date_from!='' && $date_to!='')
{
$sql="SELECT SUM(amount) as ttl_bal,customer.customer_code,customer.customer_name,customer.customer_id FROM 
customer,customer_transactions,sales where  
customer_transactions.customer_id=customer.customer_id and sales.customer_id=customer.customer_id and sales.sales_rep='$user_id'
and customer_transactions.transaction_date>='$date_from' AND customer_transactions.transaction_date<='$date_to' GROUP BY customer_transactions.customer_id order by customer.customer_name asc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
elseif ($supp_name!='' && $date_from!='' && $date_to!='')
{
$sql="SELECT SUM(amount) as ttl_bal,customer.customer_code,customer.customer_name,customer.customer_id FROM 
customer,customer_transactions,sales where  
customer_transactions.customer_id=customer.customer_id and sales.customer_id=customer.customer_id and sales.sales_rep='$user_id'
AND customer.customer_name LIKE '%$supp_name%' and customer_transactions.transaction_date>='$date_from' AND customer_transactions.transaction_date<='$date_to' GROUP BY customer_transactions.customer_id order by customer.customer_name asc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
else
{


$sql="SELECT SUM(amount) as ttl_bal,customer.customer_code,customer.customer_name,customer.customer_id FROM 
customer,customer_transactions,sales where customer_transactions.customer_id=customer.customer_id 
and sales.customer_id=customer.customer_id and sales.sales_rep='$user_id' 
GROUP BY customer_transactions.customer_id order by ttl_bal desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}


}	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
 }




if (mysql_num_rows($results) > 0)
						  {
							  $RowCounter=0;
							  while ($rows=mysql_fetch_object($results))
							  {




$str=$rows->transaction_code;
$int = filter_var($str, FILTER_SANITIZE_NUMBER_INT);











						  
						  
					$ttl_bal_lop=number_format($rows->ttl_bal,2);
					
					if ($ttl_bal_lop==0)
					{
						
						
					}
					else
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
    <td><?php 
	
	echo $rows->customer_code;
	echo '-';
	echo $int;
	$supplier_id=$rows->customer_id;?></td>
    <td><a href="home.php?submission_period=submission_period&customer_id=<?php echo $supplier_id; ?>"><?php echo $rows->customer_name;?></a></td>
    <td align=""><?php 
	
	//include ('customer_balance.php');
	
	echo number_format($ttl_bal=$rows->ttl_bal,2);
	
	$job_card_ttl=$job_card_ttl+$ttl_bal;
	
	
	?></td>
	
</tr>
  <?php 
  
							  } }
  
  ?>
  <tr height="30" bgcolor="#FFFFCC">
  <td colspan="" align=""><strong>Total Receivables</strong></td>
  <td colspan="" align="center"><strong></strong></td>

  <td align=""><strong><?php echo number_format($job_card_ttl,2);?></strong></td>
  
  </tr>
  <?php 
  
  
  
						  }
  ?>


</table>

			
<script type="text/javascript">
  Calendar.setup(
    {
      inputField  : "date_from",         // ID of the input field
      ifFormat    : "%Y-%m-%d",    // the date format
      button      : "date_from"       // ID of the button
    }
  );
  
  
   Calendar.setup(
    {
      inputField  : "date_to",         // ID of the input field
      ifFormat    : "%Y-%m-%d",    // the date format
      button      : "date_to"       // ID of the button
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