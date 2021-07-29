<?php include('Connections/fundmaster.php'); 
$id=$_GET['customer_id'];

?>

<table width="99%" align="center" >

<tr style="background:url(images/description.gif);" height="20" align="center">

<td><strong>Staff Name</strong></td>
<td><strong>TSC No./Staff No</strong></td>
<td><strong>Book Name & Book Year</strong></td>
<td><strong>Lending Category</strong></td>
<td><strong>Quantity Borrowed</strong></td>
<td><strong>Date Borrowed</strong></td>
<td><strong>Quantity Returned</strong></td>
<td><strong>Expected Return Date</strong></td>
<td><strong>Due Days</strong></td>

</tr>
<?php 


if (!isset($_POST['generate']))
{

$sqlcn="SELECT * FROM staff,lending,books,lending_category WHERE lending.lender_id=staff.staff_id AND lending.book_id=books.book_id AND 
lending.lending_category_id=lending_category.lending_category_id AND lending.return_date<'$todate' AND return_status='0' AND lender_type='stf' ORDER BY books.book_name asc";
$resultscn= mysql_query($sqlcn) or die ("Error $sqlcn.".mysql_error());

}
else
{
$adm_no=$_POST['adm_no'];

$sqlprofd= "SELECT * from staff where staff_no='$adm_no'";
$resultsprofd= mysql_query($sqlprofd) or die ("Error $sqlpod.".mysql_error());
$rowsprofd=mysql_fetch_object($resultsprofd);
$staff_id=$rowsprofd->staff_id;

$date_to=$_POST['date_to'];
$date_from=$_POST['date_from'];
$book_id=$_POST['book_id'];

if ($adm_no!='' && $date_to=='' && $date_from=='' && $book_id==0)
{

$sqlcn="SELECT * FROM staff,lending,books,lending_category WHERE lending.lender_id=staff.staff_id 
AND lending.book_id=books.book_id AND lending.lending_category_id=lending_category.lending_category_id 
AND lending.lender_id='$staff_id' AND lending.return_date<'$todate' AND return_status='0' AND lender_type='stf' ORDER BY books.book_name asc";
$resultscn= mysql_query($sqlcn) or die ("Error $sqlcn.".mysql_error());

}
elseif ($adm_no==''&& $date_to!='' && $date_from!='' && $book_id==0)
{

$sqlcn="SELECT * FROM staff,lending,books,lending_category WHERE lending.lender_id=staff.staff_id AND 
lending.book_id=books.book_id AND lending.lending_category_id=lending_category.lending_category_id
 AND lending.lending_date>='$date_from' AND lending.lending_date<='$date_to' AND lending.return_date<'$todate' AND return_status='0' 
 AND lending.lender_type='stf' ORDER BY books.book_name asc";
$resultscn= mysql_query($sqlcn) or die ("Error $sqlcn.".mysql_error());

}
elseif ($adm_no==''&& $date_to=='' && $date_from=='' && $book_id!=0)
{
$sqlcn="SELECT * FROM staff,lending,books,lending_category WHERE lending.lender_id=staff.staff_id 
AND lending.book_id=books.book_id AND lending.lending_category_id=lending_category.lending_category_id 
AND lending.book_id='$book_id' AND lending.return_date<'$todate' AND return_status='0' AND lender_type='stf' ORDER BY books.book_name asc";
$resultscn= mysql_query($sqlcn) or die ("Error $sqlcn.".mysql_error());

}
elseif ($adm_no!=''&& $date_to!='' && $date_from!='' && $book_id==0)
{
$sqlcn="SELECT * FROM staff,lending,books,lending_category WHERE lending.lender_id=staff.staff_id AND 
lending.book_id=books.book_id AND lending.lending_category_id=lending_category.lending_category_id
 AND lending.lending_date>='$date_from' AND lending.lending_date<='$date_to' AND lending.return_date<'$todate' AND return_status='0' 
 AND lending.lender_id='$staff_id' AND lending.lender_type='stf' ORDER BY books.book_name asc";
$resultscn= mysql_query($sqlcn) or die ("Error $sqlcn.".mysql_error());

}

elseif ($adm_no!=''&& $date_to=='' && $date_from=='' && $book_id!=0)
{
$sqlcn="SELECT * FROM staff,lending,books,lending_category WHERE lending.lender_id=staff.staff_id 
AND lending.book_id=books.book_id AND lending.lending_category_id=lending_category.lending_category_id 
AND lending.lender_id='$staff_id' AND lending.book_id='$book_id' AND lending.return_date<'$todate' AND return_status='0' AND lender_type='stf' ORDER BY books.book_name asc";
$resultscn= mysql_query($sqlcn) or die ("Error $sqlcn.".mysql_error());

}

elseif ($adm_no==''&& $date_to!='' && $date_from!='' && $book_id!=0)
{
$sqlcn="SELECT * FROM staff,lending,books,lending_category WHERE lending.lender_id=staff.staff_id AND 
lending.book_id=books.book_id AND lending.lending_category_id=lending_category.lending_category_id
 AND lending.lending_date>='$date_from' AND lending.lending_date<='$date_to' AND lending.return_date<'$todate' AND return_status='0' 
 AND lending.book_id='$book_id' AND lending.lender_type='stf' ORDER BY books.book_name asc";
$resultscn= mysql_query($sqlcn) or die ("Error $sqlcn.".mysql_error());

}

elseif ($adm_no!=''&& $date_to!='' && $date_from!='' && $book_id!=0)
{

$sqlcn="SELECT * FROM staff,lending,books,lending_category WHERE lending.lender_id=staff.staff_id AND 
lending.book_id=books.book_id AND lending.lending_category_id=lending_category.lending_category_id
 AND lending.lending_date>='$date_from' AND lending.lending_date<='$date_to' AND lending.return_date<'$todate' AND return_status='0' 
 AND lending.book_id='$book_id'  AND lending.lender_id='$staff_id' AND lending.lender_type='stf' ORDER BY books.book_name asc";
$resultscn= mysql_query($sqlcn) or die ("Error $sqlcn.".mysql_error());

}

else
{
$sqlcn="SELECT * FROM staff,lending,books,lending_category WHERE lending.lender_id=staff.staff_id AND lending.book_id=books.book_id AND 
lending.lending_category_id=lending_category.lending_category_id  AND lending.return_date<'$todate' AND return_status='0' AND lender_type='stf' ORDER BY books.book_name asc";
$resultscn= mysql_query($sqlcn) or die ("Error $sqlcn.".mysql_error());
}
}
 if (mysql_num_rows($resultscn)>0)
								  
								  {
									  while ($rowscn=mysql_fetch_object($resultscn))
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

<td><?php echo $rowscn->title.' '.$rowscn->staff_name;?></td>
<td align="center"><?php echo $rowscn->staff_no;?></td>
<td><?php echo $rowscn->book_name.' ('.$rowscn->book_year.')';?></td>


<td><?php echo $rowscn->lending_category_name;?></td>
<td><?php echo $quantity_lend=$rowscn->quantity_lend;?></td>
<td align="center"><?php echo $rowscn->lending_date;?></td>
<td><?php 

$lending_id=$rowscn->lending_id;
$sqlbr1="SELECT SUM(quantity_returned) as ttl_quant_ret1 FROM books_returned WHERE lending_id='$lending_id'";
$resultsbr1= mysql_query($sqlbr1) or die ("Error $sqlbr1.".mysql_error());
$rowsbr1=mysql_fetch_object($resultsbr1);
echo number_format($ttl_ret1=$rowsbr1->ttl_quant_ret1,0);

?></td>
<td align="center"><?php echo $return_date=$rowscn->return_date;?></td>
<td>
<?php 
$return_status=$rowscn->return_status;

if ($return_status==1)
{
echo "<font color='#000066'><strong>Returned All..</font>";
}
else
{
 $today=date('Y-m-d');
$now = strtotime("$return_date"); // or your date as well
     $your_date = strtotime("$today");
     $datediff = $now - $your_date;
	 
	 $datediff2 = $your_date-$now;
     $due_days=floor($datediff/(60*60*24));
	 $over_due_days=floor($datediff2/(60*60*24));
 
	 
	 if ($due_days <0)
	 {
	  echo "<font color='#ff0000'><strong>Over Due By ".$over_due_days. " Days</font></strong>";
	 }
	 else
	 {
	 echo "<font color='#109100'><strong>".$due_days." Days</font>"; 
	 }
}
?>

</td>

</tr>
<?php
}}


else
{
?>
<tr height="30" bgcolor="#ffffcc">
<td colspan="11" align="center"><strong><font color="#ff0000">Sorry!! No record found</font></strong></td>
</tr>
<?php

}
 ?>
</form>
<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>
<script type="text/javascript" src="calender/calendar.js"></script>
<script type="text/javascript" src="calender/lang/calendar-en.js"></script>
<script type="text/javascript" src="calender/calendar-setup.js"></script>
<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<script src="lib/jquery.js" type="text/javascript"></script>
<script src="src/facebox.js" type="text/javascript"></script>
  <script type="text/javascript">
	jQuery(document).ready(function($) {
	  $('a[rel*=facebox]').facebox({
		loadingImage : 'src/loading.gif',
		closeImage   : 'src/closelabel.png'
	  })
	})
  </script>
<script src="js/application.js" type="text/javascript" charset="utf-8"></script>
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