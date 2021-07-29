<?php 

 include ('top_grid_includes.php'); 
?>

<script type="text/javascript" src="calender/calendar.js"></script>
<script type="text/javascript" src="calender/lang/calendar-en.js"></script>
<script type="text/javascript" src="calender/calendar-setup.js"></script>
<style type="text/css">

@import url(calender/calendar-win2k-1.css);

</style>

 <form name="search" method="post" action="">  			
				
			
<table width="70%" border="0" style="margin:auto;">
  <tr bgcolor="#FFFFCC">
   
    <td colspan="10" height="30" align="center"> 

	
	</td>
	
    </tr>
<tr bgcolor="#FFFFCC">
   
    <td  height="30"  colspan="10" align="center">
	<strong>Search Creditor - Enter Name: 
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
  <td align="" width="100"><strong>Creditor Code.</strong></td>    
    <td align="" width="160"><strong>Creditor Name</strong></td>
	<td align="" width="200"><strong>Balance Amount (TZS) </strong></td>


    </tr>
	
	</thead>
  
  <?php 
   if (!isset($_POST['generate']))
{
 
$querydc="SELECT SUM(amount*supplier_transactions.curr_rate) as ttl_bal,suppliers.sup_code,suppliers.supplier_name,suppliers.supplier_id FROM suppliers,supplier_transactions where 
supplier_transactions.supplier_id=suppliers.supplier_id GROUP BY supplier_transactions.supplier_id order by ttl_bal desc";
$resultsdc= mysql_query($querydc) or die ("Error $querydc.".mysql_error());

}
else
{
$supp_name=$_POST['supp_name'];

$date_from=$_POST['date_from'];
$date_to=$_POST['date_to'];

$querydc= "SELECT SUM(amount*supplier_transactions.curr_rate) as ttl_bal,suppliers.sup_code,suppliers.supplier_name,suppliers.supplier_id FROM suppliers,supplier_transactions";
    $conditions = array();
	
	
    if($supp_name!='') 
	
	{
	
    $conditions[] = "suppliers.supplier_name LIKE '%$supp_name%'";
	
    }
	

	

	if($date_from!='' && $date_to!='' ) {
	
       $conditions[] = "supplier_transactions.transaction_date>='$date_from' AND supplier_transactions.transaction_date<='$date_to'";
    }
	
	
	

    //$sql = $query;
    if (count($conditions) > 0) {
      $querydc .= " WHERE " . implode(' AND ', $conditions)." AND supplier_transactions.supplier_id=suppliers.supplier_id 
	  GROUP BY supplier_transactions.supplier_id order by ttl_bal desc";
    }
	else
	{	
	
$querydc="SELECT SUM(amount*supplier_transactions.curr_rate) as ttl_bal,suppliers.sup_code,suppliers.supplier_name,suppliers.supplier_id FROM suppliers,supplier_transactions where 
supplier_transactions.supplier_id=suppliers.supplier_id GROUP BY supplier_transactions.supplier_id order by ttl_bal desc";
$resultsdc= mysql_query($querydc) or die ("Error $querydc.".mysql_error());

	}

    $resultsdc = mysql_query($querydc) or die ("Error $querydc.".mysql_error());





}





if (mysql_num_rows($resultsdc) > 0)
						  {
							  $RowCounter=0;
							  while ($rows=mysql_fetch_object($resultsdc))
							  { 
						  
					$ttl_bal_lop=$rows->ttl_bal;
					
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
 $supplier_id=$rows->supplier_id;
 
 ?>
    <td><?php echo $supplier_code=$rows->sup_code;?></td>
    <td><a href="supplier_statement.php?supplier_id=<?php echo $supplier_id; ?>"><?php echo $rows->supplier_name;?></a></td>
    <td align=""><?php 
	
	//include ('customer_balance.php');
	
	echo number_format($ttl_bal=$rows->ttl_bal,2);
	
	$job_card_ttl=$job_card_ttl+$ttl_bal;
	
	
	?></td>
	
</tr>
  <?php 
  
							  } }
  
  ?>
  <tr height="30" bgcolor="#FFFFCC" style="display:none;">
  <td  align="" width="20%"><strong>Total Payables</strong></td>
  <td  align="center" width="40%"><strong></strong></td>

  <td align="" width="38%"><strong><?php echo number_format($job_card_ttl,2);?></strong></td>
  
  </tr>
    </table>
<table width="60%" border="0" align="center" class="display nowrap" style="border-radius:5px;" id="example">
  <tr height="30" bgcolor="#FFFFCC">
  <td  align="" width="20%"><strong>Total Payables</strong></td>
  <td  align="center" width="40%"><strong></strong></td>

  <td align="" width="38%"><strong><?php echo number_format($job_card_ttl,2);?></strong></td>
  
  </tr>
  <?php 
  
  
  
						  }
  ?>


</table>

</form>

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

			
	