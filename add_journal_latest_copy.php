<?php
include('db/connection.php');


/* $id=$_GET['document_code_id'];
$qr_confirm23a="SELECT * from user_group_submodule WHERE sub_module_id='$sub_module_id' and `add`='A' and user_group_id='$user_group_id'";
$qr_res23a=mysql_query($qr_confirm23a) or die ('Error : $qr_confirm23a.' .mysql_error());
$num_rows23a=mysql_num_rows($qr_res23a); 
if ($num_rows23a==567780) 
{ 
include ('includes/restricted.php');
}
else
{ */
	
$id=$_GET['id'];
	
$queryop2 = "SELECT * FROM journal_transaction where journal_transaction_id='$id'";
$results2= mysql_query($queryop2) or die ("Error $queryop2.".mysql_error());	
$rows2=mysql_fetch_object($results2);

$debit_account_id=$rows2->debit_account_id;
   
 $sqlemp_det="select * from account_type where account_type_id='$debit_account_id'";
$resultsemp_det= mysql_query($sqlemp_det) or die ("Error $sqlemp_det.".mysql_error());
$rowsemp_det=mysql_fetch_object($resultsemp_det);

$debit_account_name=$rowsemp_det->account_code.' '.$rowsemp_det->account_type_name;


$credit_account_id=$rows2->credit_account_id;
   
      $sqlemp_det="select * from account_type where account_type_id='$credit_account_id'";
$resultsemp_det= mysql_query($sqlemp_det) or die ("Error $sqlemp_det.".mysql_error());
$rowsemp_det=mysql_fetch_object($resultsemp_det);

$credit_account_name=$rowsemp_det->account_code.' '.$rowsemp_det->account_type_name;



	
	
 ?>
<script type="text/javascript"> 

function confirmDel()
{
    return confirm("Are you sure you want to delete");
}

function confirmReactivate()
{
    return confirm("Are you sure you want to reactivate the user?");
}


</script>
<script type="text/javascript" src="js/jquery2.js"></script>
<script type="text/javascript">
 
$(document).ready(function(){ 
    var counter = 2; 
    $("#addBelong").click(function () { 
	if(counter>100){
            alert("Only 100 textboxes allow");
            return false;
	}   
 	var newTextBoxDiv2 = $(document.createElement('div'))
	     .attr("id", 'TextBoxDiv2' + counter);
 	newTextBoxDiv2.after().html('<tr><td width="30%"><input type="text" name="warrant_no[]" style="width:150px;" /></td><td width="26%"><input type="text" name="warrant_desc[]" style="width:150px;" /></td><td width="30%"><input type="text" name="warrant_head[]" style="width:150px;" /></td><td width="30%"><input type="text" name="amount[]" style="width:150px;"/></td></tr>');
 	newTextBoxDiv2.appendTo("#TextBoxesGroup2");
 	counter++;
     });
     $("#removeBelong").click(function () {
	if(counter==2){
          alert("No more textbox to remove");
          return false;
       }   
	counter--;
 
        $("#TextBoxDiv2" + counter).remove();
 
     });
 
     
  });
  
  

  
</script>
 
<span id="alert_action"></span>
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
                <div class="panel-heading">
                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-6">
                        <div class="row">
                            
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6">
                        
                    </div>
                    <div style="clear:both"></div>
                </div>
                <div class="box">

            <!-- /.box-header -->
            <div class="box-body">

<?php  
			  if (isset($_GET['success']))
				  
			  
              echo '<div class="alert alert-success alert-dismissible" style="width:100%; margin:auto;">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <p align="center"><i class="icon fa fa-check"></i> 
                Record Saved Successful
              </div></p>';

			  ?>		
  
  
</br>			

<script>
$(document).ready(function () {
    var counter = 0;

    $("#addrow").on("click", function () {
        var newRow = $("<tr height='30'>");
        var cols = "";

        //cols += '<td><input type="text" class="form-control" name="account[]' + counter + '"/></td>';
        cols += '<td><select required name="debit_account_id[]' + counter + '"  style="width:300px;">	 <option value="">Select..............................</option><?php $query1="select * from account_type where account_cat_id!=6  order by account_type_name asc";  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());  if ($num_rows1=mysql_num_rows($results1)>0) { while ($rows1=mysql_fetch_object($results1)) {  ?><option value="<?php echo $rows1->account_type_id; ?>"><?php echo $rows1->account_code." - ".mysql_real_escape_string($rows1->account_type_name); ?></option><?php      } } ?></td>';
        cols += '<td><input required type="number" class="form-control" name="amount[]' + counter + '"/> <input type="button"  class="ibtnDel btn btn-md btn-danger" value="-Remove"></td>';
      
        newRow.append(cols);
        $("table.order-list").append(newRow);
        counter++;
    });



    $("table.order-list").on("click", ".ibtnDel", function (event) {
        $(this).closest("tr").remove();       
        counter -= 1
    });


});





function calculateRow(row) {
    var price = +row.find('input[name^="price"]').val();

}

function calculateGrandTotal() {
    var grandTotal = 0;
    $("table.order-list").find('input[name^="price"]').each(function () {
        grandTotal += +$(this).val();
    });
    $("#grandtotal").text(grandTotal.toFixed(2));
}
 







</script>


<script>
$(document).ready(function () {
    var counter2 = 0;

    $("#addrow2").on("click", function () {
        var newRow2 = $("<tr height='30'>");
        var cols2 = "";

        cols2 += '<td><select required name="credit_account_id[]' + counter2 + '"  style="width:300px;">	 <option value="">Select..............................</option><?php $query1="select * from account_type where account_cat_id!=6  order by account_type_name asc";  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());  if ($num_rows1=mysql_num_rows($results1)>0) { while ($rows1=mysql_fetch_object($results1)) {  ?><option value="<?php echo $rows1->account_type_id; ?>"><?php echo $rows1->account_code." - ".mysql_real_escape_string($rows1->account_type_name); ?></option><?php      } } ?></td>';
        cols2 += '<td><input type="number" class="form-control" name="amount2[]' + counter2 + '"/> <input type="button"  class="ibtnDel btn btn-md btn-danger" value="-Remove"></td>';
        newRow2.append(cols2);
        $("table.order-list2").append(newRow2);
        counter2++;
    });



    $("table.order-list2").on("click", ".ibtnDel", function (event) {
        $(this).closest("tr").remove();       
        counter2 -= 1
    });


});





function calculateRow(row) {
    var price = +row.find('input[name^="price"]').val();

}

function calculateGrandTotal() {
    var grandTotal = 0;
    $("table.order-list2").find('input[name^="price"]').each(function () {
        grandTotal += +$(this).val();
    });
    $("#grandtotal").text(grandTotal.toFixed(2));
}
 







</script>

<div class="container">

<form name="emp" action="process_add_journal.php?sub_module_id=<?php echo $sub_module_id; ?>&id=<?php echo $id; ?>" enctype="multipart/form-data" method="post">		

<table width="57%" border="0" align="center">
<tr height="20">

    <td width="20%" align=""><?php $english_text9="Date";

if ($lang=='en' || $lang=='')
{
echo $english_text9;
}
else
{

$sqltr="SELECT somali_text FROM php_translate where english_text='$english_text9'";
$resultstr= mysql_query($sqltr) or die ("Error $sqltr.".mysql_error());
$rowstr=mysql_fetch_object($resultstr);
$num_rowstr=mysql_num_rows($resultstr);	
if ($num_rowstr>0)
{
echo $rowstr->somali_text;	
}
else
{
	
echo $english_text9;
}
}
?> <font color="#FF0000">*</font></br>
<input type="date" class="form-control" style="width:80%; padding:5px;" id="file_title" name="warrant_date"  required size="18" value="<?php echo $rows2->journal_date; ?>" /></td>
    <td width="23%"  height="50" >
	
	<?php $english_text9="Transaction Description";

if ($lang=='en' || $lang=='')
{
echo $english_text9;
}
else
{

$sqltr="SELECT somali_text FROM php_translate where english_text='$english_text9'";
$resultstr= mysql_query($sqltr) or die ("Error $sqltr.".mysql_error());
$rowstr=mysql_fetch_object($resultstr);
$num_rowstr=mysql_num_rows($resultstr);	
if ($num_rowstr>0)
{
echo $rowstr->somali_text;	
}
else
{
	
echo $english_text9;
}
}
?> <font color="#FF0000">*</font><input type="text" class="form-control" style="width:80%; padding:5px;" name="title"  required size="18" value="<?php echo $rows2->journal_description; ?>" />
	
	</td>
   
  </tr>
  
  <tr height="20">

    <td width="20%" align=""><?php $english_text9="Amount";

if ($lang=='en' || $lang=='')
{
echo $english_text9;
}
else
{

$sqltr="SELECT somali_text FROM php_translate where english_text='$english_text9'";
$resultstr= mysql_query($sqltr) or die ("Error $sqltr.".mysql_error());
$rowstr=mysql_fetch_object($resultstr);
$num_rowstr=mysql_num_rows($resultstr);	
if ($num_rowstr>0)
{
echo $rowstr->somali_text;	
}
else
{
	
echo $english_text9;
}
}
?> <font color="#FF0000">*</font></br><input type="number" class="form-control" style="width:80%; padding:5px;" id="file_title" name="amount"  required size="18" value="<?php echo $rows2->journal_amount; ?>" /></td>
    <td width="23%"  height="50" ></td>
   
  </tr>
  
  
  
</table>

</br>









    <table  border="1" width="90%" align="center">
	
	<tr bgcolor="#ccc" height="30">
<th width="30%" align="center">Select Accounts</th>

        </tr>
		</table>
		</br>

		 <table  border="1" align="center" class="table order-list">
    <thead>
        <!--<tr bgcolor="#1F8EE7">
<td width="30%" align=""><strong>Debit Account</strong></th>
<td width="20%"><strong>Debit Amount</strong></th>
        </tr>-->
    </thead>
    <tbody>
        <tr height="30">
            <td width="40%"><strong>Debit Account</strong></br>
                <select name="debit_account_id"  required style="width:300px;">
	
<option value="<?php echo $debit_account_id;?>"><?php echo $debit_account_name; ?></option>

								  <?php
								  
								  $query1="select * from account_type where account_cat_id!='6' order by account_type_name asc";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->account_type_id; ?>"><?php echo $rows1->account_code.' '.$rows1->account_type_name; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
								  
								  
								  
								  
								  
								  ?>
								  
								  </select> 
            </td>
			       

            <td width="40%"><!--<strong>Debit Amount</strong></br>
                <input type="number" size="60" name="amount[]" required class="form-control" /> <input type="button" id="addrow" class="btn btn-success" value="+Add" />-->
            <strong>Credit Account</strong></br>
                <select required name="credit_account_id"  style="width:300px;">
	
<option value="<?php echo $credit_account_id;?>"><?php echo $credit_account_name; ?></option>

								  <?php
								  
								  $query1="select * from account_type where account_cat_id!='6' order by account_type_name asc";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->account_type_id; ?>"><?php echo $rows1->account_code.' '.$rows1->account_type_name; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
								  
								  
								  
								  
								  
								  ?>
								  
								  </select> 
								  
								  <input type="button" id="addrow" class="btn btn-success" value="+Add Row" />
			
			</td>

        </tr>
    </tbody>
    <tfoot>

        <tr>
        </tr>
    </tfoot>
</table>





<table width="100%">
<tr height="50">

    <td width="12%" align="center"><button type="submit" style="width:60%" class="btn btn-primary">
			<?php $english_text9="Submit";

if ($lang=='en' || $lang=='')
{
echo $english_text9;
}
else
{

$sqltr="SELECT somali_text FROM php_translate where english_text='$english_text9'";
$resultstr= mysql_query($sqltr) or die ("Error $sqltr.".mysql_error());
$rowstr=mysql_fetch_object($resultstr);
$num_rowstr=mysql_num_rows($resultstr);	
if ($num_rowstr>0)
{
echo $rowstr->somali_text;	
}
else
{
	
echo $english_text9;
}
}
?>	
				</button></td>

   
  </tr>
</table>


</form>
</div>




   
<?php 
//}
?>