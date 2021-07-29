<?php
#include connection
include('includes/session.php');
include('Connections/fundmaster.php');

//////////////////////////////////////////////////////////////////////////////////////////////// Peter Section
//functioning for adding donors
function add_donor($donor_name,$donor_desc,$user_id)
{
$donor_name=mysql_real_escape_string($_POST['donor_name']);

$donor_desc=mysql_real_escape_string($_POST['donor_desc']);

$sqlprof= "SELECT * from shop where shop_name='$donor_name'";
$resultsprof= mysql_query($sqlprof) or die ("Error $sqlpo.".mysql_error());
$rowsprof=mysql_num_rows($resultsprof);

if ($rowsprof>0)
{
header ("Location:home.php?newunivesity=newunivesity&recordexist=1");
}
else
{
$sqllpo= "insert into shop VALUES('','$donor_desc','$donor_name')";
$resultslpo= mysql_query($sqllpo) or die ("Error $sqllpo.".mysql_error());


$sqlauditsav= "insert into audit_trails values('','$user_id',NOW(),'Created a shop name $donor_name into the system ')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());


header ("Location:home.php?newunivesity=newunivesity&addconfirm=1");
}
//mysql_close($cnn);

}


function assign_projectdonor($job_card_id,$customer_id,$start_date,$end_date,
$start_from,$technician_id,$service_item_id,$service_item_name,$service_desc,
$unit_cost,$currency,$quantity,$amount_paid,$user_id)

{

$sale_type=mysql_real_escape_string($_POST['sale_type']);
$customer_id=mysql_real_escape_string($_POST['customer_id']);
$start_date=mysql_real_escape_string($_POST['date_from']);
$end_date=mysql_real_escape_string($_POST['date_to']);
//$remarks=mysql_real_escape_string($_POST['remarks']);
$job_card_id=mysql_real_escape_string($_POST['job_card_id']);
$discount=mysql_real_escape_string($_POST['discount']);
$technician_id=mysql_real_escape_string($_POST['technician_id']);
$gen_remarks=mysql_real_escape_string($_POST['gen_remarks']);
$currency=mysql_real_escape_string($_POST['currency']);
$curr_rate=mysql_real_escape_string($_POST['curr_rate']);
$amount_paid=mysql_real_escape_string($_POST['amount_paid']);

$date_paid=mysql_real_escape_string($_POST['date_paid']);
$bal_date=mysql_real_escape_string($_POST['bal_date']);


$sqllpo="insert into job_cards VALUES('','$discount','$customer_id','$gen_remarks','$currency','$curr_rate',
'$start_date','$end_date','$user_id','$technician_id',NOW(),'$sale_type','$bal_date','0','0','0')";
$resultslpo=mysql_query($sqllpo) or die ("Error $sqllpo.".mysql_error());

$invoice_id=$job_card_id;



$sqlauditsav= "insert into audit_trails values('','$user_id',NOW(),'Created a job card no $invoice_id into the system')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());

//add to customer payments

if ($amount_paid=='')
{

}
else
{
$sqlpy= "insert into invoice_payments values ('','$job_card_id','$customer_id','$sales_rep','','$amount_paid',
'$desc','$currency','$curr_rate','1','$ref_no',
'$date_paid','','','$start_date','')";
$resultspy= mysql_query($sqlpy) or die ("Error $sqlpy.".mysql_error());

}

$queryind="SELECT * from job_cards where user_id='$user_id' ORDER BY job_card_id DESC LIMIT 1";
$resultsind=mysql_query($queryind) or die ("Error: $queryind.".mysql_error());
$rowsind=mysql_fetch_object($resultsind);
$lat_job_card_id=$rowsind->job_card_id;

foreach($_POST['service_item_id'] as $row=>$Service_Item_Id)
{
//$remarks=mysql_real_escape_string($_POST['remarks_id']);
$service_item_id=mysql_real_escape_string($_POST['service_item_id'][$row]);
$service_desc=mysql_real_escape_string($_POST['remarks'][$row]);
$start_from=mysql_real_escape_string($_POST['start_from'][$row]);
$quantity=mysql_real_escape_string($_POST['quantity'][$row]);
$unit_cost=mysql_real_escape_string($_POST['unit_cost'][$row]);
//$technician_id=mysql_real_escape_string($_POST['technician_id'][$row]);
//$task_cost=mysql_real_escape_string($_POST['task_cost'][$row]);
$customer_item=mysql_real_escape_string($_POST['customer_item'][$row]);
$part_id=mysql_real_escape_string($_POST['part_id'][$row]);
$quantity=mysql_real_escape_string($_POST['quantity'][$row]);


if ($service_item_id==0)
{

}
else
{

$sqllpo="insert into job_card_task VALUES('','$customer_id','$lat_job_card_id','$service_item_id',
'$service_desc','$start_from','$quantity','$unit_cost','$currency','$curr_rate',
'$user_id',NOW(),'0','0','0','0')";
$resultslpo=mysql_query($sqllpo) or die ("Error $sqllpo.".mysql_error());


}

}
?>
<script type="text/javascript">
alert('Job Card Created Succesfully');
window.location = "home.php?viewcountries=viewcountries";

</script>
<?php
//header ("Location:home.php?viewcountries=viewcountries&job_card_iddd=$lat_job_card_id&addconfirm=1");
//}

}



function assign_projectdonor2($job_card_id,$customer_id,$start_date,$end_date,
$start_from,$technician_id,$service_item_id,$service_item_name,$service_desc,
$unit_cost,$currency,$quantity,$amount_paid,$user_id)

{

$sale_type=mysql_real_escape_string($_POST['sale_type']);
$customer_id=mysql_real_escape_string($_POST['customer_id']);
$start_date=mysql_real_escape_string($_POST['date_from']);
$end_date=mysql_real_escape_string($_POST['date_to']);
$job_card_id=mysql_real_escape_string($_POST['job_card_id']);
$discount=mysql_real_escape_string($_POST['discount']);
$technician_id=mysql_real_escape_string($_POST['technician_id']);
$gen_remarks=mysql_real_escape_string($_POST['gen_remarks']);
$currency=mysql_real_escape_string($_POST['currency']);
$curr_rate=mysql_real_escape_string($_POST['curr_rate']);
$amount_paid=mysql_real_escape_string($_POST['amount_paid']);

$date_paid=mysql_real_escape_string($_POST['date_paid']);
$bal_date=mysql_real_escape_string($_POST['bal_date']);


/* $sqllpo="insert into job_cards VALUES('','$starting_from','$customer_id','','$currency','$curr_rate','$start_date',
'$end_date','$user_id','$technician_id',NOW(),'0','0','0','0','0')";
$resultslpo=mysql_query($sqllpo) or die ("Error $sqllpo.".mysql_error()); */

$sqlupdt= "UPDATE job_cards SET 
general_remarks='$gen_remarks',
discount='$discount',
customer_id='$customer_id',
start_date='$start_date',
end_date='$end_date',
sale_type='$sale_type',
bal_date='$bal_date',
technician_id='$technician_id',
currency='$currency',
curr_rate='$curr_rate' 
WHERE job_card_id='$job_card_id'";
$resultsupdt= mysql_query($sqlupdt) or die ("Error $sqlupdt.".mysql_error());


$sqlauditsav= "insert into audit_trails values('','$user_id',NOW(),'Updated details a job card no $job_card_id into the system')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());


$sqldel2="DELETE FROM invoice_payments where sales_code_id='$job_card_id'";
$resultsdel2=mysql_query($sqldel2) or die ("Error $sqldel2.".mysql_error());









foreach($_POST['invoice_payment_id'] as $row=>$Invoice_Payment_Id)
{
$invoice_payment_id=mysql_real_escape_string($_POST['invoice_payment_id'][$row]);
$date_paid2=mysql_real_escape_string($_POST['date_paid2'][$row]);
$amount_paid2=mysql_real_escape_string($_POST['amount_paid2'][$row]);


if ($amount_paid2=='')
{

}
else
{
$sqlpy= "insert into invoice_payments values ('','$job_card_id','$customer_id','$sales_rep','','$amount_paid2','$desc','$currency','$curr_rate','1','$ref_no',
'$date_paid2','','',NOW(),'')";
$resultspy= mysql_query($sqlpy) or die ("Error $sqlpy.".mysql_error());




/* $sqltrans= "insert into customer_transactions values('','$customer_id','$transaction_descinv','-$amount_paid',NOW(),'pym$invoice_id','')";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());

$sqlaccpay= "insert into accounts_receivables_ledger values('','$transaction_desc','-$amount_paid','','$amount_paid','$currency','$curr_rate',NOW(),'pym$invoice_id')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());

$sqlaccpay= "insert into cash_ledger values('','$transaction_desc','$amount_paid','$amount_paid','','$currency','$curr_rate',NOW(),'pym$invoice_id')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error()); */





}

}



if ($amount_paid=='')
{

}
else
{
$sqlpy= "insert into invoice_payments values ('','$job_card_id','$customer_id','$sales_rep','','$amount_paid','$desc','$currency','$curr_rate','1','$ref_no',
'$date_paid','','',NOW(),'')";
$resultspy= mysql_query($sqlpy) or die ("Error $sqlpy.".mysql_error());
}


/* $queryind="SELECT * from job_cards ORDER BY job_card_id DESC LIMIT 1";
$resultsind=mysql_query($queryind) or die ("Error: $queryind.".mysql_error());
$rowsind=mysql_fetch_object($resultsind);
$lat_job_card_id=$rowsind->job_card_id; */

foreach($_POST['service_item_id'] as $row=>$Service_Item_Id)
{
//$remarks=mysql_real_escape_string($_POST['remarks_id']);
$service_item_id=mysql_real_escape_string($_POST['service_item_id'][$row]);
$job_card_task_id=mysql_real_escape_string($_POST['job_card_task_id'][$row]);
$service_desc=mysql_real_escape_string($_POST['remarks'][$row]);
$start_from=mysql_real_escape_string($_POST['start_from'][$row]);
//$remarks=mysql_real_escape_string($_POST['remarks']);
$quantity=mysql_real_escape_string($_POST['quantity'][$row]);
$unit_cost=mysql_real_escape_string($_POST['unit_cost'][$row]);
//$technician_id=mysql_real_escape_string($_POST['technician_id'][$row]);
//$task_cost=mysql_real_escape_string($_POST['task_cost'][$row]);
$customer_item=mysql_real_escape_string($_POST['customer_item'][$row]);
$part_id=mysql_real_escape_string($_POST['part_id'][$row]);
$quantity=mysql_real_escape_string($_POST['quantity'][$row]);


$sqldel="DELETE FROM job_card_task where job_card_task_id='$job_card_task_id'";
$resultsdel=mysql_query($sqldel) or die ("Error $sqldel.".mysql_error());


if ($service_item_id==0)
{

}
else
{

$sqllpo="insert into job_card_task VALUES('','$customer_id','$job_card_id','$service_item_id',
'$service_desc','$start_from','$quantity','$unit_cost','$currency','$curr_rate',
'$user_id',NOW(),'0','0','0','0')";
$resultslpo=mysql_query($sqllpo) or die ("Error $sqllpo.".mysql_error());
}

}
?>
<!--<script type="text/javascript">
alert('Job Card Updated Succesfully');
window.location = "home.php?processnatflight=processnatflight";

</script>-->
<?php
header ("Location:home.php?viewcountries=viewcountries&job_card_id=$job_card_id&addconfirm=1");
//}

}




//approve sales
function approve_invoice ($job_card_id,$customer_id,$start_date,$end_date,
$start_from,$technician_id,$service_item_id,$service_item_name,$service_desc,
$unit_cost,$currency,$quantity,$amount_paid,$user_id)

{
echo $job_card_id=mysql_real_escape_string($_POST['job_card_id']);

$sql3= "UPDATE job_cards SET approved_status='1' WHERE job_card_id='$job_card_id'";
$results3= mysql_query($sql3) or die ("Error $sql3.".mysql_error());

$sqlauditsav= "insert into audit_trails values('','$user_id',NOW(),'Approved a job card no/invoice/cash sale $job_card_id into the system')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());


//header ("Location:pre_approve_invoice.php");

}



//}

//}

























function create_requisition($requisition_date,$job_card_id,$part_id,$quantity,$remarks,$user_id)
{

$remarks=mysql_real_escape_string($_POST['remarks']);
//$currency=mysql_real_escape_string($_POST['currency']);
$requisition_date=mysql_real_escape_string($_POST['date_from']);
//$job_card_id=mysql_real_escape_string($_POST['job_card_id']);


$sqllpo="insert into requisition VALUES('','$booking_id','$job_card_id','','$remarks','$user_id',NOW(),'$requisition_date','0','0')";
$resultslpo=mysql_query($sqllpo) or die ("Error $sqllpo.".mysql_error());


$queryind="SELECT * from requisition ORDER BY requisition_id DESC LIMIT 1";
$resultsind=mysql_query($queryind) or die ("Error: $queryind.".mysql_error());
$rowsind=mysql_fetch_object($resultsind);
$requisition_id=$rowsind->requisition_id;

foreach($_POST['part_id'] as $row=>$Part_Id)
{

$part_id=mysql_real_escape_string($_POST['part_id'][$row]);

$quantity=mysql_real_escape_string($_POST['quantity'][$row]);

$sqlproj= "SELECT * from items where item_id='$part_id'";
$resultsproj= mysql_query($sqlproj) or die ("Error $sqlproj.".mysql_error());
$rowsproj=mysql_fetch_object($resultsproj);
$item_name=$rowsproj->item_name; 
$item_code=$rowsproj->item_code; 
$item_value=$rowsproj->curr_bp;
$item_amount=$item_value*$quantity;

$sqllpo="insert into requisition_item VALUES('','$booking_id','$job_card_id','$requisition_id','$part_id','$quantity','$item_value','0')";
$resultslpo=mysql_query($sqllpo) or die ("Error $sqllpo.".mysql_error());


$sqlprojc= "SELECT * from requisition_item order by requisition_item_id desc limit 1";
$resultsprojc= mysql_query($sqlprojc) or die ("Error $sqlprojc.".mysql_error());
$rowsprojc=mysql_fetch_object($resultsprojc);

$lat_reg_id=$rowsprojc->requisition_item_id ;


$transaction_descinvent='Cost Of Production for item '.$item_name.' - '.$item_code.' of the Inv No:'.$invoice_id;
//$unit_price=$unit_price_org/$curr_rate;

$sqlaccpay= "insert into inventory_ledger values('','$transaction_descinvent','-$item_amount',' ','$item_amount','7','1','$requisition_date','cop$lat_reg_id','','','')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());

$sqltrans= "insert into item_transactions values('','$part_id','$transaction_descinvent','-$quantity',NOW(),'cop$lat_reg_id','')";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());

$sqlaccpay= "insert into cost_of_production_ledger values('','$transaction_descinvent','$item_amount','$item_amount','','7','1','$requisition_date','cop$lat_reg_id','','','')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());


$sqlauditsav= "insert into audit_trails values('','$user_id',NOW(),'Recorded Item $quantity $item_name as cost of production into the system')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());

}

    



header ("Location:home.php?viewhrforms=viewhrforms&requisition_id=$requisition_id&addconfirm=1");
//}

}

//functioning for adding projects
function add_projectt($customer_name,$value_at_hand,$contact_person,$address,$town,$email,$phone,$pin,$user_id)
{
$new=$_GET['new'];
$customer_name=mysql_real_escape_string($_POST['customer_name']);
$value_at_hand=mysql_real_escape_string($_POST['value_at_hand']);
$date_dep=mysql_real_escape_string($_POST['date_dep']);
$contact_person=mysql_real_escape_string($_POST['contact_person']);
$address=mysql_real_escape_string($_POST['address']);
$town=mysql_real_escape_string($_POST['town']);
$email=mysql_real_escape_string($_POST['email']);
$phone=mysql_real_escape_string($_POST['phone']);
$pin=mysql_real_escape_string($_POST['pin']);
$credit_limit=mysql_real_escape_string($_POST['credit_limit']);
$credit_days=mysql_real_escape_string($_POST['credit_days']);

$sqlprof= "SELECT * from customer where customer_name='$customer_name'";
$resultsprof= mysql_query($sqlprof) or die ("Error $sqlpo.".mysql_error());
$rowsprof=mysql_num_rows($resultsprof);

if ($rowsprof>0)
{
header ("Location:home.php?addproject=addproject&recordexist=1");
}
else
{

$sqllpo1= "insert into customer VALUES('','$customer_name','$contact_person','$address','$town','$email','$phone','$pin','$incharge','$credit_limit','$credit_days')";
$resultslpo1= mysql_query($sqllpo1) or die ("Error $sqllpo1.".mysql_error());

$sqlop= "SELECT * from customer order by customer_id desc limit 1";
$resultsop= mysql_query($sqlop) or die ("Error $sqlpod.".mysql_error());
$rowsop=mysql_fetch_object($resultsop);
echo $latest_id=$rowsop->customer_id;



$account_id_dr=8;
$sqldr= "SELECT * from account where account_id='$account_id_dr'";
$resultsdr= mysql_query($sqldr) or die ("Error $sqldr.".mysql_error());
$rowsdr=mysql_fetch_object($resultsdr);
$acc_type_id_dr=$rowsdr->account_type_id;
$acc_cat_id_dr=$rowsdr->account_cat_id;


$account_id_cr=9;
$sqlcr= "SELECT * from account where account_id='$account_id_cr'";
$resultscr= mysql_query($sqlcr) or die ("Error $sqlcr.".mysql_error());
$rowscr=mysql_fetch_object($resultscr);
$acc_type_id_cr=$rowscr->account_type_id;
$acc_cat_id_cr=$rowscr->account_cat_id;




$memo="Customer Opening Balance for customer ".$customer_name;
$amount=$value_at_hand;
$currency=6;
$curr_rate=1;

$orderdate = explode('-', $date_dep);
$year  = $orderdate[0];
$month = $orderdate[1];
$day   = $orderdate[2];
$transaction_code="custop".$latest_id;




//debit
$sqlaccpay= "insert into ledger_transactions values('','$acc_cat_id_dr','$acc_type_id_dr','$account_id_dr','$incharge','$memo','$amount','$amount','','$currency',
'$curr_rate','$date_dep','$day','$month','$year',NOW(),'$transaction_code','','','','','','$user_id')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());

//credit
$sqlaccpay= "insert into ledger_transactions values('','$acc_cat_id_cr','$acc_type_id_cr','$account_id_cr','$incharge','$memo','$amount','','$amount','$currency',
'$curr_rate','$date_dep','$day','$month','$year',NOW(),'$transaction_code','','','','','','$user_id')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());


$sqltrans= "insert into customer_transactions values('','$latest_id','$memo','$amount','$date_dep','$transaction_code','$incharge','','')";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());


$sqlauditsav= "insert into audit_trails values('','$user_id',NOW(),'Created a customer $customer_name into the system')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());

if ($new==1)
{
//header ("Location:begin_cash_sales.php");
}
else
{
//echo "$incharge";
header ("Location:home.php?addproject=addproject&addconfirm=1");
}
}
//mysql_close($cnn);

}







function addcompetency($booking_id,$inv_date,$terms,$comments,$user_id)
{
$booking_id=$_GET['booking_id'];
$inv_date=mysql_real_escape_string($_POST['inv_date']);
$terms=mysql_real_escape_string($_POST['terms']);
$comments=mysql_real_escape_string($_POST['comments']);


$sqlprof= "SELECT * from invoices where booking_id='$booking_id'";
$resultsprof= mysql_query($sqlprof) or die ("Error $sqlpo.".mysql_error());
$rowsprof=mysql_num_rows($resultsprof);

if ($rowsprof>0)
{
header ("Location:home.php?view_submission_period=view_submission_period&booking_id=$booking_id&recordexist=1");
}
else
{
$sqllpo= "insert into invoices VALUES('','$booking_id','$inv_date','$terms','$user_id','$comments',NOW(),'0')";
$resultslpo= mysql_query($sqllpo) or die ("Error $sqllpo.".mysql_error());

$sqlupdt= "UPDATE job_cards SET invoice_status='1' WHERE booking_id='$booking_id'";
$resultsupdt= mysql_query($sqlupdt) or die ("Error $sqlupdt.".mysql_error());

$sqlauditsav= "insert into audit_trails values('','$user_id',NOW(),'Created in Invoice into the system ')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());

header ("Location:home.php?view_submission_period=view_submission_period&booking_id=$booking_id&addconfirm=1");

}
mysql_close($cnn);

}
// code for adding sub-project
//functioning for adding projects
function add_sub_project($cat_name,$cat_desc,$user_id)
{
$cat_name=mysql_real_escape_string($_POST['cat_name']);
$cat_desc=mysql_real_escape_string($_POST['cat_desc']);


$sqlprof= "SELECT * from items_category where cat_name='$sub_project_name'";
$resultsprof= mysql_query($sqlprof) or die ("Error $sqlpo.".mysql_error());
$rowsprof=mysql_num_rows($resultsprof);

if ($rowsprof>0)
{
header ("Location:home.php?addsubproject=addsubproject&recordexist=1");
}
else
{
$sqllpo= "insert into items_category VALUES('','$cat_name','$cat_desc')";
$resultslpo= mysql_query($sqllpo) or die ("Error $sqllpo.".mysql_error());

$sqllpo= "insert into product_categories VALUES('','$cat_name','$cat_desc')";
$resultslpo= mysql_query($sqllpo) or die ("Error $sqllpo.".mysql_error());

$sqlauditsav= "insert into audit_trails values('','$user_id',NOW(),'Created an item category $cat_name into the system ')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());


header ("Location:home.php?addsubproject=addsubproject&addconfirm=1");






}
//mysql_close($cnn);

}

function add_labour_task($cat_name,$unit_id,$cat_desc,$user_id)
{
$cat_name=mysql_real_escape_string($_POST['cat_name']);
$unit_id=mysql_real_escape_string($_POST['unit_id']);
$cat_desc=mysql_real_escape_string($_POST['cat_desc']);


$sqlprof= "SELECT * from shop where shop_name='$cat_name'";
$resultsprof= mysql_query($sqlprof) or die ("Error $sqlpo.".mysql_error());
$rowsprof=mysql_num_rows($resultsprof);

if ($rowsprof>0)
{
header ("Location:home.php?locationreport=locationreport&recordexist=1");
}
else
{
$sqllpo= "insert into shop VALUES('','$cat_desc','$cat_name')";
$resultslpo= mysql_query($sqllpo) or die ("Error $sqllpo.".mysql_error());

$sqlauditsav= "insert into audit_trails values('','$user_id',NOW(),'Created a shop $cat_name into the system ')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());


header ("Location:home.php?locationreport=locationreport&addconfirm=1");
}
//mysql_close($cnn);

}




function add_engine_range($min_capacity,$max_capacity,$user_id)
{
$min_capacity=mysql_real_escape_string($_POST['min_capacity']);
$max_capacity=mysql_real_escape_string($_POST['max_capacity']);


$sqlprof= "SELECT * from engine_range where min_capacity='$min_capacity' and max_capacity='$max_capacity'";
$resultsprof= mysql_query($sqlprof) or die ("Error $sqlpo.".mysql_error());
$rowsprof=mysql_num_rows($resultsprof);

if ($rowsprof>0)
{
header ("Location:home.php?workpermitrenewals=workpermitrenewals&recordexist=1");
}
else
{
$sqllpo= "insert into engine_range VALUES('','$min_capacity','$max_capacity','')";
$resultslpo= mysql_query($sqllpo) or die ("Error $sqllpo.".mysql_error());

$sqlauditsav= "insert into audit_trails values('','$user_id',NOW(),'Created engine range $min_capacity to $max_capacity into the system ')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());


header ("Location:home.php?workpermitrenewals=workpermitrenewals&addconfirm=1");
}
//mysql_close($cnn);

}

function add_labour_matrix($task_id,$engine_range_id,$flat_rate_hrs,$flat_rate_cost,$user_id)
{
$task_id=mysql_real_escape_string($_POST['task_id']);
$engine_range_id=mysql_real_escape_string($_POST['engine_range_id']);
$flat_rate_hrs=mysql_real_escape_string($_POST['flat_rate_hrs']);
$flat_rate_cost=mysql_real_escape_string($_POST['flat_rate_cost']);


$sqlprof= "SELECT * from labour_cost_matrix where task_id='$task_id' and engine_range_id='$engine_range_id'";
$resultsprof= mysql_query($sqlprof) or die ("Error $sqlpo.".mysql_error());
$rowsprof=mysql_num_rows($resultsprof);

if ($rowsprof>0)
{
header ("Location:home.php?reneworkpermit2=reneworkpermit2&recordexist=1");
}
else
{
$sqllpo= "insert into labour_cost_matrix VALUES('','$task_id','$engine_range_id','$flat_rate_hrs','$flat_rate_cost','')";
$resultslpo= mysql_query($sqllpo) or die ("Error $sqllpo.".mysql_error());

$sqlauditsav= "insert into audit_trails values('','$user_id',NOW(),'Created labour cost matrix into the system ')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());


header ("Location:home.php?reneworkpermit2=reneworkpermit2&addconfirm=1");
}
//mysql_close($cnn);

}


function add_clock($cat_desc,$user_id)
{
//$cat_name=mysql_real_escape_string($_POST['cat_name']);
$cat_desc=mysql_real_escape_string($_POST['cat_desc']);
/* $clock_date=mysql_real_escape_string($_POST['clock_date']);
$clock_time=mysql_real_escape_string($_POST['clock_time']); */


$clock_period =$clock_date.' '.$clock_time;

$job_card_task_id=$_GET['job_card_task_id'];


$queryprod="select * from job_card_task where job_card_task_id='$job_card_task_id'";
$resultsprod=mysql_query($queryprod) or die ("Error: $queryprod.".mysql_error());
$rowsprod=mysql_fetch_object($resultsprod);
$booking_id=$rowsprod->booking_id;
$job_card_id=$rowsprod->job_card_id;
$job_card_task_id=$rowsprod->job_card_task_id;
$task_id=$rowsprod->task_id;
//$assigned_job_card_id=$rowsprod->assigned_job_card_id;




$sqllpo= "insert into job_card_clock VALUES('','$booking_id','$job_card_id','$job_card_task_id','$task_id','inn','$user_id',NOW(),'$cat_desc','','')";
$resultslpo= mysql_query($sqllpo) or die ("Error $sqllpo.".mysql_error());

$sqlupdt= "UPDATE job_card_task SET clocked_in_status='1' WHERE job_card_task_id='$job_card_task_id'";
$resultsupdt= mysql_query($sqlupdt) or die ("Error $sqlupdt.".mysql_error());


$sqlauditsav= "insert into audit_trails values('','$user_id',NOW(),'Clocked in a job card no $job_card_id into the system ')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());


header ("Location:home.php?assingomstaff=assingomstaff&addconfirm=1");

//mysql_close($cnn);

}

function clock_out($cat_desc,$user_id)
{
//$cat_name=mysql_real_escape_string($_POST['cat_name']);
$cat_desc=mysql_real_escape_string($_POST['cat_desc']);


//$cat_desc=mysql_real_escape_string($_POST['cat_desc']);


$job_card_task_id=$_GET['job_card_task_id'];


$queryprod="select * from job_card_task where job_card_task_id='$job_card_task_id'";
$resultsprod=mysql_query($queryprod) or die ("Error: $queryprod.".mysql_error());
$rowsprod=mysql_fetch_object($resultsprod);
$booking_id=$rowsprod->booking_id;
$job_card_id=$rowsprod->job_card_id;
$job_card_task_id=$rowsprod->job_card_task_id;
$task_id=$rowsprod->task_id;



$querycl="select * from job_card_clock where job_card_task_id='$job_card_task_id' and clock_type='inn'
order by job_card_clock_id desc limit 0,1";
$resultscl=mysql_query($querycl) or die ("Error: $querycl.".mysql_error());
$rowscl=mysql_fetch_object($resultscl);
$numcl=mysql_num_rows($resultscl);

if ($numcl>0)
{
$time_clocked_id=$rowscl->date_clocked;
}

else
{
$querycl2="select * from job_card_clock where job_card_task_id='$job_card_task_id' and clock_type='res'
order by job_card_clock_id desc limit 0,1";
$resultscl2=mysql_query($querycl2) or die ("Error: $querycl2.".mysql_error());
$rowscl2=mysql_fetch_object($resultscl2);
//$numcl2=mysql_num_rows($resultscl2);
$time_clocked_id=$rowscl2->date_clocked;

}

$curr_time=date ('Y-m-d H:i:s');

$fulldate_hour_start= $time_clocked_id;
$fulldate_hour_end= $curr_time;

$difference = strtotime( $fulldate_hour_end .' UTC' ) - strtotime( $fulldate_hour_start .' UTC');


$period_taken = floor( $difference / 3600 ) .'.' .gmdate( 'i', $difference);


$sqllpo= "insert into job_card_clock VALUES('','$booking_id','$job_card_id','$job_card_task_id','$task_id','fin','$user_id',NOW(),'$cat_desc','$period_taken','')";
$resultslpo= mysql_query($sqllpo) or die ("Error $sqllpo.".mysql_error());

$sqlupdt= "UPDATE job_card_task SET finished_status='1' WHERE job_card_task_id='$job_card_task_id'";
$resultsupdt= mysql_query($sqlupdt) or die ("Error $sqlupdt.".mysql_error()); 

//get the total tasks in this job card
$querytsk="select * from job_card_task where job_card_id='$job_card_id'";
$resultstsk=mysql_query($querytsk) or die ("Error: $querytsk.".mysql_error());
echo $ttl_task=$rowstsk=mysql_num_rows($resultstsk);

$querytskf="select * from job_card_task where job_card_id='$job_card_id' and finished_status='1'";
$resultstskf=mysql_query($querytskf) or die ("Error: $querytskf.".mysql_error());
echo $fin_task=$rowstskf=mysql_num_rows($resultstskf);

if ($fin_task==$ttl_task)
{
$sqlupdt= "UPDATE job_cards SET closed_status='1' WHERE job_card_id='$job_card_id'";
$resultsupdt= mysql_query($sqlupdt) or die ("Error $sqlupdt.".mysql_error()); 
}

$sqlauditsav= "insert into audit_trails values('','$user_id',NOW(),'Finished a task in job card no $job_card_id into the system ')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());


header ("Location:home.php?assingomstaff=assingomstaff&outconfirm=1");

//mysql_close($cnn);

}


function stop_clock($cat_desc,$user_id)
{
//$cat_name=mysql_real_escape_string($_POST['cat_name']);
$cat_desc=mysql_real_escape_string($_POST['cat_desc']);

$job_card_task_id=$_GET['job_card_task_id'];


$queryprod="select * from job_card_task where job_card_task_id='$job_card_task_id'";
$resultsprod=mysql_query($queryprod) or die ("Error: $queryprod.".mysql_error());
$rowsprod=mysql_fetch_object($resultsprod);
$booking_id=$rowsprod->booking_id;
$job_card_id=$rowsprod->job_card_id;
$job_card_task_id=$rowsprod->job_card_task_id;
$task_id=$rowsprod->task_id;

//time_clocked_in
///check if it is stopped from resume or from initial stop

$querycl2="select * from job_card_clock,job_card_task where job_card_task.job_card_task_id AND 
job_card_clock.job_card_task_id AND job_card_clock.job_card_task_id='$job_card_task_id' and 
job_card_clock.clock_type='res' AND job_card_task.finished_status='0' order by date_clocked desc limit 1";
$resultscl2=mysql_query($querycl2) or die ("Error: $querycl2.".mysql_error());
$rowscl2=mysql_fetch_object($resultscl2);
$numrowscl2=mysql_num_rows($resultscl2);

if ($numrowscl2>0)
{
$time_clocked_id=$rowscl2->date_clocked;
}
else
{

$querycl="select * from job_card_clock,job_card_task where job_card_task.job_card_task_id AND 
job_card_clock.job_card_task_id AND job_card_clock.job_card_task_id='$job_card_task_id' and 
job_card_clock.clock_type='inn' AND job_card_task.finished_status='0' order by date_clocked desc limit 1";
$resultscl=mysql_query($querycl) or die ("Error: $querycl.".mysql_error());
$rowscl=mysql_fetch_object($resultscl);
$time_clocked_id=$rowscl->date_clocked;
}





$curr_time=date ('Y-m-d H:i:s');
//difference in time taken to finish
 $fulldate_hour_start= $time_clocked_id;
 $fulldate_hour_end= $curr_time;

$difference = strtotime( $fulldate_hour_end .' UTC' ) - strtotime( $fulldate_hour_start .' UTC');




 $period_taken = floor( $difference / 3600 ) .'.' .gmdate( 'i', $difference);

//echo $Result;
//$period_taken=


$sqllpo= "insert into job_card_clock VALUES('','$booking_id','$job_card_id','$job_card_task_id','$task_id','out',
'$user_id',NOW(),'$cat_desc','$period_taken','')";
$resultslpo= mysql_query($sqllpo) or die ("Error $sqllpo.".mysql_error());

$sqlupdt= "UPDATE job_card_task SET clocked_out_status='1' WHERE job_card_task_id='$job_card_task_id'";
$resultsupdt= mysql_query($sqlupdt) or die ("Error $sqlupdt.".mysql_error()); 

$sqlauditsav= "insert into audit_trails values('','$user_id',NOW(),'Stopped a task in a job card no $job_card_id into the system ')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());


header ("Location:home.php?assingomstaff=assingomstaff&stopconfirm=1");

//mysql_close($cnn);

}

//////////////////////////////////////////////////////////////////////////////////////////////// End Of Peter Section


//////////////////////////////////////////////////////////////////////////////////////////////// Griffins Section

//function for adding country
function submit_invoice($booking_id,$task_name,$task_cost,$task_remarks,$invoice_date,$currency,$part_id,$quantity,$terms,$discount,$vat,$labour_cost,$user_id)
{
//$sub_project_id=$;
//$qtn_type=$_GET['quote'];
$booking_id=$_GET['booking_id'];
$job_card_id=$_GET['job_card_id'];
$terms=mysql_real_escape_string($_POST['terms']);
$currency=6;
$invoice_date=mysql_real_escape_string($_POST['date_from']);
$discount=mysql_real_escape_string($_POST['discount']);
$vat=mysql_real_escape_string($_POST['vat']);
$labour_cost=mysql_real_escape_string($_POST['labour_cost']);

$queryprod="select * from currency where curr_id='$currency'";
$resultsprod=mysql_query($queryprod) or die ("Error: $queryprod.".mysql_error());
$rowsprod=mysql_fetch_object($resultsprod);
$curr_rate=$rowsprod->curr_rate;


$query1="SELECT * from bookings where booking_id=$booking_id";
$results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
$rows1=mysql_fetch_object($results1);

$customer_id=$rows1->customer_id;
$engine_range_id=$rows1->engine_range_id;


$sqllpo="insert into invoice VALUES('','$booking_id','$job_card_id','$customer_id','','$currency','$curr_rate','$user_id','$terms',NOW(),'$discount','$discount_value','$vat','$vat_value','$labour_cost','$invoice_date','0')";
$resultslpo=mysql_query($sqllpo) or die ("Error $sqllpo.".mysql_error());

$sqlupdt= "UPDATE job_cards SET invoice_status='1',closed_status='1' WHERE job_card_id='$job_card_id'";
$resultsupdt= mysql_query($sqlupdt) or die ("Error $sqlupdt.".mysql_error());  



$queryind="SELECT * from invoice ORDER BY invoice_id DESC LIMIT 1";
$resultsind=mysql_query($queryind) or die ("Error: $queryind.".mysql_error());
$rowsind=mysql_fetch_object($resultsind);
$invoice_id=$rowsind->invoice_id;







foreach($_POST['task_id'] as $row=>$Task_id)
{
//$remarks=mysql_real_escape_string($_POST['remarks_id']);
$task_name=mysql_real_escape_string($_POST['task_name'][$row]);
$task_id=mysql_real_escape_string($_POST['task_id'][$row]);

$sqllpo= "update task set task_name='$task_name' where task_id='$task_id'";
$resultslpo= mysql_query($sqllpo) or die ("Error $sqllpo.".mysql_error());

$task_cost=mysql_real_escape_string($_POST['task_cost'][$row]);
//$customer_item=mysql_real_escape_string($_POST['customer_item'][$row]);
//$part_id=mysql_real_escape_string($_POST['part_id'][$row]);
//$quantity=mysql_real_escape_string($_POST['quantity'][$row]);

$sqllpo="insert into invoice_task VALUES('','$booking_id','$job_card_id','$invoice_id','$task_id','$task_cost','$task_remarks','$currency','$curr_rate','$user_id',NOW(),'0')";
$resultslpo=mysql_query($sqllpo) or die ("Error $sqllpo.".mysql_error());


}

foreach($_POST['part_id'] as $row=>$Part_Id)
{

$part_id=mysql_real_escape_string($_POST['part_id'][$row]);


/* $sqlproj= "SELECT * from items where item_id='$part_id'";
$resultsproj= mysql_query($sqlproj) or die ("Error $sqlproj.".mysql_error());
$rowsproj=mysql_fetch_object($resultsproj);
$unit_price_org=$rowsproj->curr_sp; */
$quantity=mysql_real_escape_string($_POST['quantity'][$row]);
$unit_price=mysql_real_escape_string($_POST['item_cost'][$row]);
//$unit_price=$unit_price_org/$curr_rate;

$sqllpo="insert into invoice_item VALUES('','$booking_id','$job_card_id','$invoice_id','$part_id','$quantity','$unit_price','$currency','$curr_rate','$user_id',NOW(),'0')";
$resultslpo=mysql_query($sqllpo) or die ("Error $sqllpo.".mysql_error());


}
header ("Location:home.php?viewsubprojectlocation=viewsubprojectlocation&booking_id=$booking_id&job_card_id=$job_card_id&quote=$qtn_type&invoice_id=$invoice_id&addconfirm=1");
}


function confirm_invoice($booking_id,$invoice_date,$user_id)
{
//$sub_project_id=$;
//$qtn_type=$_GET['quote'];
$booking_id=$_GET['booking_id'];
$job_card_id=$_GET['job_card_id'];
$invoice_id=$_GET['invoice_id'];
$terms=mysql_real_escape_string($_POST['terms']);
$currency=6;
$invoice_date=mysql_real_escape_string($_POST['date_from']);
$discount=mysql_real_escape_string($_POST['discount']);
$vat=mysql_real_escape_string($_POST['vat']);
$labour_cost=mysql_real_escape_string($_POST['labour_cost']);
$discount_val=mysql_real_escape_string($_POST['discount_val']);
$vat_value=mysql_real_escape_string($_POST['vat_value']);
$grand_ttl=mysql_real_escape_string($_POST['grand_ttl']);
$item_value=mysql_real_escape_string($_POST['item_value']);


$queryprod="select * from currency where curr_id='$currency'";
$resultsprod=mysql_query($queryprod) or die ("Error: $queryprod.".mysql_error());
$rowsprod=mysql_fetch_object($resultsprod);
$curr_rate=$rowsprod->curr_rate;


$query1="SELECT * from bookings where booking_id='$booking_id'";
$results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
$rows1=mysql_fetch_object($results1);

$customer_id=$rows1->customer_id;

$querycl="SELECT * from customer where customer_id='$customer_id'";
$resultscl=mysql_query($querycl) or die ("Error: $querycl.".mysql_error());
$rowscl=mysql_fetch_object($resultscl);

$c_name=$rowscl->customer_name;

$transaction_descinv='Labour Sales Inv No:'.$invoice_id;	
$transaction_desc='Labour Sales Inv No:'.$invoice_id.' To '.$c_name;	
	


$sqllpo="insert into confirmed_invoice VALUES('','$invoice_id','$booking_id','$job_card_id','$customer_id','$user_id',NOW(),'0')";
$resultslpo=mysql_query($sqllpo) or die ("Error $sqllpo.".mysql_error());


foreach($_POST['part_id'] as $row=>$Part_Id)
{

$part_id=mysql_real_escape_string($_POST['part_id'][$row]);
$released_item_id=mysql_real_escape_string($_POST['released_item_id'][$row]);

$sqlproj= "SELECT * from items where item_id='$part_id'";
$resultsproj= mysql_query($sqlproj) or die ("Error $sqlproj.".mysql_error());
$rowsproj=mysql_fetch_object($resultsproj);
$item_name=$rowsproj->item_name; 
$item_code=$rowsproj->item_code; 
$quantity=mysql_real_escape_string($_POST['quantity'][$row]);
$item_value=$rowsproj->curr_bp;
$item_amount=$quantity*$item_value;

$transaction_descinvent='Sales for Item '.$item_name.' - '.$item_code.' of the Inv No:'.$invoice_id;
//$unit_price=$unit_price_org/$curr_rate;

$sqlaccpay= "insert into inventory_ledger values('','$transaction_descinvent','-$item_amount','','$item_amount','$currency','$curr_rate',NOW(),'inv$released_item_id')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());

$sqlupdt= "UPDATE released_item SET approved_invoice_status='1' WHERE released_item_id='$released_item_id'";
$resultsupdt= mysql_query($sqlupdt) or die ("Error $sqlupdt.".mysql_error());  


}

$sqlupdt= "UPDATE  invoice SET confirm_status='1' WHERE invoice_id='$invoice_id'";
$resultsupdt= mysql_query($sqlupdt) or die ("Error $sqlupdt.".mysql_error());  

$sqltrans= "insert into customer_transactions values('','$customer_id','$transaction_descinv','$grand_ttl',NOW(),'inv$invoice_id','')";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());

$sqlaccpay= "insert into accounts_receivables_ledger values('','$transaction_desc','$grand_ttl','$grand_ttl','','$currency','$curr_rate',NOW(),'inv$invoice_id')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());

$sqlaccpay= "insert into sales_ledger values('','$transaction_desc','$grand_ttl','','$grand_ttl','$currency','$curr_rate',NOW(),'inv$invoice_id')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());

$sqlaccpay= "insert into vat_ledger values('','$transaction_desc','$vat_value','$vat_value','','$currency','$curr_rate',NOW(),'inv$invoice_id')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());

$sqlaccpay= "insert into discount_allowed_ledger values('','$transaction_desc','$discount_val','$discount_val','','$currency','$curr_rate',NOW(),'inv$invoice_id')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());



$queryind="SELECT * from confirmed_invoice ORDER BY confirmed_invoice_id DESC LIMIT 1";
$resultsind=mysql_query($queryind) or die ("Error: $queryind.".mysql_error());
$rowsind=mysql_fetch_object($resultsind);
$confirmed_invoice_id=$rowsind->confirmed_invoice_id;


header ("Location:home.php?chart=chart&booking_id=$booking_id&job_card_id=$job_card_id&quote=$qtn_type&confirmed_invoice_id=$confirmed_invoice_id&invoice_id=$invoice_id&addconfirm=1");
}


//function for adding area
function addarea ($cat_name,$unit_id,$cat_desc,$user_id)
{
$cat_name=mysql_real_escape_string($_POST['cat_name']);
$unit_id=mysql_real_escape_string($_POST['unit_id']);
$cat_desc=mysql_real_escape_string($_POST['cat_desc']);


$sqlprof= "SELECT * from costing_item where costing_item_name='$cat_name'";
$resultsprof= mysql_query($sqlprof) or die ("Error $sqlpo.".mysql_error());
$rowsprof=mysql_num_rows($resultsprof);

if ($rowsprof>0)
{
header ("Location:home.php?projectdonor=projectdonor&recordexist=1");
}
else
{
$sqllpo= "insert into costing_item VALUES('','$cat_name','$unit_id','$cat_desc')";
$resultslpo= mysql_query($sqllpo) or die ("Error $sqllpo.".mysql_error());

$sqlauditsav= "insert into audit_trails values('','$user_id',NOW(),'Created an costing item $cat_name into the system ')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());



header ("Location:home.php?projectdonor=projectdonor&addconfirm=1");
}

mysql_close($cnn);

}

//function for adding location
function add_location ($booking_date,$customer_name,$contact_person,$address,$town,$email,$phone,$reg_no,$make,$model,$chasis_no,$engine,$engine_range_id,$trim_code,$odometer,$fuel_tank,$user_id)

{
//$booking_no=mysql_real_escape_string($_POST['booking_no']);
$booking_date=mysql_real_escape_string($_POST['booking_date']);
$customer_name=mysql_real_escape_string($_POST['customer_name']);
$contact_person=mysql_real_escape_string($_POST['contact_person']);
$address=mysql_real_escape_string($_POST['address']);
$town=mysql_real_escape_string($_POST['town']);
$email=mysql_real_escape_string($_POST['email']);
$phone=mysql_real_escape_string($_POST['phone']);
$pin=mysql_real_escape_string($_POST['pin']);
$reg_no=mysql_real_escape_string($_POST['reg_no']);
$phone=mysql_real_escape_string($_POST['phone']);
$make=mysql_real_escape_string($_POST['make']);
$model=mysql_real_escape_string($_POST['model']);
$chasis_no=mysql_real_escape_string($_POST['chasis_no']);
$engine_range_id=mysql_real_escape_string($_POST['engine_range_id']);
$engine=mysql_real_escape_string($_POST['engine']);
$trim_code=mysql_real_escape_string($_POST['trim_code']);
$odometer=mysql_real_escape_string($_POST['odometer']);
$fuel_tank=mysql_real_escape_string($_POST['fuel_tank']);
//$phone=mysql_real_escape_string($_POST['loc_desc']);


$sqlprof= "SELECT * from customer where customer_name='$customer_name'";
$resultsprof= mysql_query($sqlprof) or die ("Error $sqlpo.".mysql_error());
$rowsp=mysql_fetch_object($resultsprof);
$rowsprof=mysql_num_rows($resultsprof);

if ($rowsprof>0)
{
$customer_id=$rowsp->customer_id;
//header ("Location:home.php?addproject=addproject&recordexist=1");
$sqllpo12= "insert into bookings VALUES('','$customer_id','$reg_no','$make','$model','$chasis_no','$engine_range_id','$engine',
'$trim_code','$odometer','$fuel_tank','$booking_date','$user_id','0')";
$resultslpo12= mysql_query($sqllpo12) or die ("Error $sqllpo12.".mysql_error());

$sqlx= "SELECT * from bookings order by booking_id desc limit 1";
$resultsx= mysql_query($sqlx) or die ("Error $sqlx.".mysql_error());
$rowsx=mysql_fetch_object($resultsx);
$booking_id=$rowsx->booking_id;


$sqlauditsav= "insert into audit_trails values('','$user_id',NOW(),'Added a booking for $customer_name of vehicle $reg_no into the system')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());

header ("Location:home.php?initiateproject=initiateproject&addconfirm=1&booking_id=$booking_id");
}
else
{
$sqllpo1= "insert into customer VALUES('','$customer_name','$contact_person','$address','$town','$email','$phone','$pin')";
$resultslpo1= mysql_query($sqllpo1) or die ("Error $sqllpo1.".mysql_error());

$sql= "insert into clients values('', '$customer_name', '$address', '$town', '$c_street','$address',
 '$phone','$c_telephone','$pin','$contact_person','$email','$allow_add','$date_sent',NOW())";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


$sqlprofd= "SELECT * from customer order by customer_id desc limit 1";
$resultsprofd= mysql_query($sqlprofd) or die ("Error $sqlpod.".mysql_error());
$rowsprofd=mysql_fetch_object($resultsprofd);
$customer_id=$rowsprofd->customer_id;

$sqllpo12= "insert into bookings VALUES('','$customer_id','$reg_no','$make','$model','$chasis_no','$engine_range_id','$engine',
'$trim_code','$odometer','$fuel_tank','$booking_date','$user_id','0')";
$resultslpo12= mysql_query($sqllpo12) or die ("Error $sqllpo12.".mysql_error());


$sqlx= "SELECT * from bookings order by booking_id desc limit 1";
$resultsx= mysql_query($sqlx) or die ("Error $sqlx.".mysql_error());
$rowsx=mysql_fetch_object($resultsx);
$booking_id=$rowsx->booking_id;

$sqlauditsav="insert into audit_trails values('','$user_id',NOW(),'Added a booking for $customer_name of vehicle $reg_no into the system')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());


header ("Location:home.php?initiateproject=initiateproject&addconfirm=1&booking_id=$booking_id");

}
mysql_close($cnn);

}


//function for adding settlement
function add_settlement ($area,$location,$set_code,$set_name,$set_desc)
{
$area=mysql_real_escape_string($_POST['area']);
$location=mysql_real_escape_string($_POST['location']);
$set_code=mysql_real_escape_string($_POST['set_code']);
$set_name=mysql_real_escape_string($_POST['set_name']);
$set_desc=mysql_real_escape_string($_POST['set_desc']);


$sqllpo="insert into nrc_settlement VALUES('','$area','$location','$set_code','$set_name','$set_desc')";
$resultslpo=mysql_query($sqllpo) or die ("Error $sqllpo.".mysql_error());

header ("Location:home.php?initiateproject=initiateproject&addconfirm=1");


mysql_close($cnn);

}

function add_period($booking_id,$item_id,$quantity,$vat,$discount,$user_id)
{
$booking_id=$_GET['booking_id'];
$item_id=mysql_real_escape_string($_POST['item_id']);

$sqlprofd= "SELECT * from items where item_id='$item_id'";
$resultsprofd= mysql_query($sqlprofd) or die ("Error $sqlpod.".mysql_error());
$rowsprofd=mysql_fetch_object($resultsprofd);
$curr_sp=$rowsprofd->curr_sp;




$quantity=mysql_real_escape_string($_POST['quantity']);
$vat=mysql_real_escape_string($_POST['vat']);
$discount=mysql_real_escape_string($_POST['discount']);

$discount_value=($discount/100)*$quantity*$curr_sp;

if ($vat==1)
{
$cal_amnt=$quantity*$curr_sp-$discount_value;
$vat_value=0.16*$cal_amnt;

}
else
{

$vat_value=0;
}


$sqlred= "SELECT * from estimates where item_id='$item_id' AND booking_id='$booking_id'";
$resultsred= mysql_query($sqlred) or die ("Error $sqlred.".mysql_error());
$rowsred=mysql_num_rows($resultsred);
//$curr_sp=$rowsprofd->curr_sp;

if ($rowsred>0)
{
header ("Location:home.php?areareport=areareport&booking_id=$booking_id&recordexist=1");
}
else
{


$sqllpo="insert into estimates VALUES('','$booking_id','$item_id','$quantity','$curr_sp','$discount',
'$discount_value','$vat','$vat_value','$user_id',NOW(),'','','')";
$resultslpo=mysql_query($sqllpo) or die ("Error $sqllpo.".mysql_error());


$sqlupdt= "UPDATE bookings SET status='1' WHERE booking_id='$booking_id'";
$resultsupdt= mysql_query($sqlupdt) or die ("Error $sqlupdt.".mysql_error());


$sqlauditsav= "insert into audit_trails values('','$user_id',NOW(),'Generated an estimates $booking_id into the system')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());


header ("Location:home.php?areareport=areareport&booking_id=$booking_id");
}

mysql_close($cnn);

}


////////////////test
function add_test($item_name,$value_at_hand,$reorder_level,$shop_id,$item_value,$item_sp,$item_desc,$date_dep,$user_id)
{

$cat_id=mysql_real_escape_string($_POST['cat_id']);
$item_name=mysql_real_escape_string($_POST['item_name']);
$value_at_hand=mysql_real_escape_string($_POST['value_at_hand']);
$date_dep=mysql_real_escape_string($_POST['date_dep']);
$shop_id=mysql_real_escape_string($_POST['shop_id']);
$reorder_level=mysql_real_escape_string($_POST['reorder_level']);
$item_value=mysql_real_escape_string($_POST['item_value']);
$item_sp=mysql_real_escape_string($_POST['item_sp']);
$item_desc=mysql_real_escape_string($_POST['item_desc']);
//$pack_size='Pieces';




$sql3="INSERT INTO items VALUES('','$item_name','$cat_id','$reorder_level','$item_value','$item_sp','$item_desc','$value_at_hand','$date_dep','','','','')" or die(mysql_error());
$results3= mysql_query($sql3) or die ("Error $sql3.".mysql_error());

$sqlop= "SELECT * from items order by item_id desc limit 1";
$resultsop= mysql_query($sqlop) or die ("Error $sqlpod.".mysql_error());
$rowsop=mysql_fetch_object($resultsop);
$latest_id=$rowsop->item_id;



$account_id_dr=7;
$sqldr= "SELECT * from account where account_id='$account_id_dr'";
$resultsdr= mysql_query($sqldr) or die ("Error $sqldr.".mysql_error());
$rowsdr=mysql_fetch_object($resultsdr);
$acc_type_id_dr=$rowsdr->account_type_id;
$acc_cat_id_dr=$rowsdr->account_cat_id;


$account_id_cr=6;
$sqlcr= "SELECT * from account where account_id='$account_id_cr'";
$resultscr= mysql_query($sqlcr) or die ("Error $sqlcr.".mysql_error());
$rowscr=mysql_fetch_object($resultscr);
$acc_type_id_cr=$rowscr->account_type_id;
$acc_cat_id_cr=$rowscr->account_cat_id;




$memo="Inventory Opening Balance for item ".$item_name;
$amount=$value_at_hand*$item_value;
$currency=6;
$curr_rate=1;

$orderdate = explode('-', $date_dep);
$year  = $orderdate[0];
$month = $orderdate[1];
$day   = $orderdate[2];
$transaction_code="itemop".$latest_id;




//debit
$sqlaccpay= "insert into ledger_transactions values('','$acc_cat_id_dr','$acc_type_id_dr','$account_id_dr','$shop_id','$memo','$amount','$amount','','$currency',
'$curr_rate','$date_dep','$day','$month','$year',NOW(),'$transaction_code','','','','','','$user_id')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());

//credit
$sqlaccpay= "insert into ledger_transactions values('','$acc_cat_id_cr','$acc_type_id_cr','$account_id_cr','$shop_id','$memo','$amount','','$amount','$currency',
'$curr_rate','$date_dep','$day','$month','$year',NOW(),'$transaction_code','','','','','','$user_id')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());


$sqlaccpay= "insert into item_transactions values('','$latest_id','$memo','$value_at_hand','$date_dep','$day','$month','$year','$transaction_code',
'$user_id','$shop_id','','')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());


$sqlauditsav= "insert into audit_trails values('','$user_id',NOW(),'Created an item $item_name into the system')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());


header ("Location:home.php?setuptemplate1=setuptemplate1&addconfirm=1");
}




//mysql_close($cnn);

//}

////////////////Replicate template
function replicate_template($cat_id,$item_id,$item_name,$quant_rec,$date_received,$comments,$user_id)
{
//$sub_proj_id=$_POST['sub_proj_id'];

$cat_id=mysql_real_escape_string($_POST['cat_id']);
$item_id=mysql_real_escape_string($_POST['item_id']);

$sqlprofd= "SELECT * from items where item_id='$item_id'";
$resultsprofd= mysql_query($sqlprofd) or die ("Error $sqlpod.".mysql_error());
$rowsprofd=mysql_fetch_object($resultsprofd);
$item_name=$rowsprofd->item_name;


$quant_rec=mysql_real_escape_string($_POST['quant_rec']);
$date_received=mysql_real_escape_string($_POST['date_received']);
$comments=mysql_real_escape_string($_POST['comments']);

   
//    $paxcur = $pax - $row;

$sql3="INSERT INTO received_stock VALUES('','$item_id','$quant_rec','$date_received','$comments','$user_id','')" or die(mysql_error());
$results3= mysql_query($sql3) or die ("Error $sql3.".mysql_error());


$sqlauditsav= "insert into audit_trails values('','$user_id',NOW(),'Received $quant_rec $item_name into the warehouse')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());


header ("Location:home.php?viewsubprojectcountry=viewsubprojectcountry&addconfirm=1");
}




function assign_project($PoNumber)
{

//$project_id=$;
$sqlaloc="INSERT INTO alloc VALUES('')" or die(mysql_error());
$resultsaloc=mysql_query($sqlaloc) or die ("Error $sqlaloc.".mysql_error());
$rowsalloc=mysql_fetch_object($resultsaloc);

$sqlprofd= "SELECT * from alloc order by alloc_id desc limit 1";
$resultsprofd= mysql_query($sqlprofd) or die ("Error $sqlpod.".mysql_error());
$rowsprofd=mysql_fetch_object($resultsprofd);
$latest_alloc_id=$rowsprofd->alloc_id;


foreach($_POST['country_id'] as $row=>$CountryID)
{

    $country_id=mysql_real_escape_string($CountryID);
	
	
	$PoNumber=mysql_real_escape_string($_POST['PoNumber']);
	
$sqlprojid= "SELECT * from nrc_project where project_name='$PoNumber'";
$resultsprojid= mysql_query($sqlprojid) or die ("Error $sqlprojid.".mysql_error());
$rowsprojid=mysql_fetch_object($resultsprojid);
	
	
	//$latest_project_id=mysql_real_escape_string($_POST['project_id']);
	$latest_project_id=$rowsprojid->project_id;

    
//    $paxcur = $pax - $row;


$sqlprof= "SELECT * from nrc_projectvscountry where country_id='$country_id' AND project_id='$latest_project_id'";
$resultsprof= mysql_query($sqlprof) or die ("Error $sqlpo.".mysql_error());
$rowsprof=mysql_num_rows($resultsprof);

if ($rowsprof>0)
{
header ("Location:home.php?assignproject=assignproject&recordexist=1");
}
else
{




$sql3="INSERT INTO nrc_projectvscountry VALUES('', '$latest_project_id','$latest_alloc_id', '$country_id')" or die(mysql_error());
$results3= mysql_query($sql3) or die ("Error $sql3.".mysql_error());

//header ("Location:home.php?assignprojectarea=assignprojectarea&latest_alloc_id=$latest_alloc_id&project_id=$latest_project_id");
header ("Location:home.php?assignprojectend=assignprojectend&addconfirm=1");
}

}
}


function assign_project_area($project_id)
{

//$project_id=$;


foreach($_POST['area_id'] as $row=>$AreaID)
{

    $area_id=mysql_real_escape_string($AreaID);
	$latest_project_id=mysql_real_escape_string($_POST['project_id']);
	$latest_alloc_id=mysql_real_escape_string($_POST['alloc_id']);

$sqlprof= "SELECT * from nrc_projectvsarea where area_id='$area_id' AND project_id='$latest_project_id'";
$resultsprof= mysql_query($sqlprof) or die ("Error $sqlpo.".mysql_error());
$rowsprof=mysql_num_rows($resultsprof);

if ($rowsprof>0)
{
header ("Location:home.php?assignprojectarea=assignprojectarea&latest_alloc_id=$latest_alloc_id&project_id=$latest_project_id&recordexist=1");
}
else
{
    
//    $paxcur = $pax - $row;

$sql3="INSERT INTO nrc_projectvsarea VALUES('', '$latest_project_id','$latest_alloc_id', '$area_id')" or die(mysql_error());
$results3= mysql_query($sql3) or die ("Error $sql3.".mysql_error());

header ("Location:home.php?assignprojectlocation=assignprojectlocation&latest_alloc_id=$latest_alloc_id&project_id=$latest_project_id");
}
}

}


function assign_project_location($project_id)
{

//$project_id=$;


foreach($_POST['location_id'] as $row=>$LocationID)
{

    $location_id=mysql_real_escape_string($LocationID);
	$latest_project_id=mysql_real_escape_string($_POST['project_id']);
	$latest_alloc_id=mysql_real_escape_string($_POST['alloc_id']);

$sqlprof= "SELECT * from nrc_projectvslocation where location_id='$location_id' AND project_id='$latest_project_id'";
$resultsprof= mysql_query($sqlprof) or die ("Error $sqlpo.".mysql_error());
$rowsprof=mysql_num_rows($resultsprof);

if ($rowsprof>0)
{
header ("Location:home.php?assignprojectlocation=assignprojectlocation&latest_alloc_id=$latest_alloc_id&project_id=$latest_project_id&recordexist=1");
}
else
{    
//    $paxcur = $pax - $row;

$sql3="INSERT INTO nrc_projectvslocation VALUES('', '$latest_project_id','$latest_alloc_id', '$location_id')" or die(mysql_error());
$results3= mysql_query($sql3) or die ("Error $sql3.".mysql_error());

//header ("Location:home.php?assignprojectsettlement=assignprojectsettlement&latest_alloc_id=$latest_alloc_id&project_id=$latest_project_id");

header ("Location:home.php?assignprojectend=assignprojectend&addconfirm=1");
}

}
}

function assign_project_settlement($project_id)
{

//$project_id=$;


foreach($_POST['settlement_id'] as $row=>$SettlementID)
{

    $settlement_id=mysql_real_escape_string($SettlementID);
	$latest_project_id=mysql_real_escape_string($_POST['project_id']);
	$latest_alloc_id=mysql_real_escape_string($_POST['alloc_id']);

$sqlprof= "SELECT * from nrc_projectvssettlement where settlement_id='$settlement_id' AND project_id='$latest_project_id'";
$resultsprof= mysql_query($sqlprof) or die ("Error $sqlpo.".mysql_error());
$rowsprof=mysql_num_rows($resultsprof);

if ($rowsprof>0)
{
header ("Location:home.php?assignprojectsettlement=assignprojectsettlement&latest_alloc_id=$latest_alloc_id&project_id=$latest_project_id&recordexist=1");
}
else
{  
    
$sql3="INSERT INTO nrc_projectvssettlement VALUES('','$latest_project_id','$latest_alloc_id','$settlement_id')" or die(mysql_error());
$results3= mysql_query($sql3) or die ("Error $sql3.".mysql_error());


header ("Location:home.php?assignprojectend=assignprojectend&addconfirm=1");
}
}

}

//assigning sub projects to countries
function assign_sub_project($PoNumber)
{

//$sub_project_id=$;
$sqlaloc="INSERT INTO alloc VALUES('')" or die(mysql_error());
$resultsaloc=mysql_query($sqlaloc) or die ("Error $sqlaloc.".mysql_error());
$rowsalloc=mysql_fetch_object($resultsaloc);

$sqlprofd= "SELECT * from alloc order by alloc_id desc limit 1";
$resultsprofd= mysql_query($sqlprofd) or die ("Error $sqlpod.".mysql_error());
$rowsprofd=mysql_fetch_object($resultsprofd);
$latest_alloc_id=$rowsprofd->alloc_id;


//$latest_sub_project_id=mysql_real_escape_string($_POST['sub_project_id']);


/*$sqlproj= "SELECT * from nrc_sub_project where sub_project_id='$latest_sub_project_id'";
$resultsproj= mysql_query($sqlproj) or die ("Error $sqlproj.".mysql_error());
$rowsproj=mysql_fetch_object($resultsproj);
$project_id=$rowsproj->project_id;*/




foreach($_POST['country_id'] as $row=>$CountryID)
{

$country_id=mysql_real_escape_string($CountryID);
	
$PoNumber=mysql_real_escape_string($_POST['PoNumber']);
	
$sqlsprojid= "SELECT * from nrc_sub_project where sub_project_name='$PoNumber'";
$resultssprojid= mysql_query($sqlsprojid) or die ("Error $sqlsprojid.".mysql_error());
$rowssprojid=mysql_fetch_object($resultssprojid);	
	
	
	
	
$latest_sub_project_id=$rowssprojid->sub_project_id;
$project_id=$rowssprojid->project_id;
	
	
	

    
//    $paxcur = $pax - $row;


$sqlprof= "SELECT * from nrc_subprojectvscountry where country_id='$country_id' AND sub_project_id='$latest_sub_project_id'";
$resultsprof= mysql_query($sqlprof) or die ("Error $sqlpo.".mysql_error());
$rowsprof=mysql_num_rows($resultsprof);

if ($rowsprof>0)
{
header ("Location:home.php?assignsubproject=assignsubproject&recordexist=1");
}
else
{




$sql3="INSERT INTO nrc_subprojectvscountry VALUES('', '$project_id','$latest_sub_project_id','$latest_alloc_id', '$country_id')" or die(mysql_error());
$results3= mysql_query($sql3) or die ("Error $sql3.".mysql_error());

header ("Location:home.php?assignsubprojectarea=assignsubprojectarea&latest_alloc_id=$latest_alloc_id&sub_project_id=$latest_sub_project_id");
}

}
}


function assign_sub_project_area($job_card_id,$booking_id,$job_card_task_id,$technician,$date_from,$date_to,$time_from,$time_to,$user_id)
{


foreach($_POST['job_card_task_id'] as $row=>$Job_card_task_id)
{
$booking_id=$_GET['booking_id'];
$job_card_id=$_GET['job_card_id'];
$job_card_task_id=mysql_real_escape_string($Job_card_task_id);
	
$technician=mysql_real_escape_string($_POST['technician'][$row]);
$date_from=mysql_real_escape_string($_POST['date_from'][$row]);
$date_to=mysql_real_escape_string($_POST['date_to'][$row]);
$time_from=mysql_real_escape_string($_POST['time_from'][$row]);
$time_to=mysql_real_escape_string($_POST['time_to'][$row]);


$sql3="INSERT INTO assigned_job_card VALUES('', '$booking_id','$job_card_id','$job_card_task_id','$date_from','$time_from',
'$date_to','$time_to','$technician','$user_id',NOW(),'0')" or die(mysql_error());
$results3= mysql_query($sql3) or die ("Error $sql3.".mysql_error());

$sqlupdt= "UPDATE job_cards SET assigned_status='1' WHERE job_card_id='$job_card_id'";
$resultsupdt= mysql_query($sqlupdt) or die ("Error $sqlupdt.".mysql_error());
/*	
$sqlsprojid= "SELECT * from nrc_sub_project where sub_project_name='$PoNumber'";
$resultssprojid=mysql_query($sqlsprojid) or die ("Error $sqlsprojid.".mysql_error());
$rowssprojid=mysql_fetch_object($resultssprojid);	
		
$latest_sub_project_id=$rowssprojid->sub_project_id;
$project_id=$rowssprojid->project_id;	


	//$latest_sub_project_id=mysql_real_escape_string($_POST['sub_project_id']);
$latest_alloc_id=mysql_real_escape_string($_POST['alloc_id']);
	
	
	

    
//    $paxcur = $pax - $row;


$sqlprof= "SELECT * from nrc_subprojectvsarea where area_id='$area_id' AND sub_project_id='$latest_sub_project_id'";
$resultsprof= mysql_query($sqlprof) or die ("Error $sqlpo.".mysql_error());
$rowsprof=mysql_num_rows($resultsprof);

if ($rowsprof>0)
{
header ("Location:home.php?assignsubprojectarea=assignsubprojectarea&latest_alloc_id=$latest_alloc_id&sub_project_id=$latest_sub_project_id&recordexist=1");
}
else
{
*/





header ("Location:home.php?assignsubprojectarea=assignsubprojectarea&booking_id=$booking_id&job_card_id=$job_card_id&add_success=1");
}

}
//}



function assign_sub_project_location($job_card_id,$customer_id,$start_date,$end_date,
$start_from,$technician_id,$service_item_id,$service_item_name,$service_desc,
$unit_cost,$currency,$quantity,$amount_paid,$user_id)
{


$customer_id=mysql_real_escape_string($_POST['customer_id']);
$quotation_date=mysql_real_escape_string($_POST['date_from']);
$end_date=mysql_real_escape_string($_POST['date_to']);
//$remarks=mysql_real_escape_string($_POST['remarks']);
$job_card_id=mysql_real_escape_string($_POST['job_card_id']);
$starting_from=mysql_real_escape_string($_POST['starting_from']);
$technician_id=mysql_real_escape_string($_POST['technician_id']);
$gen_remarks=mysql_real_escape_string($_POST['gen_remarks']);
$currency=mysql_real_escape_string($_POST['currency']);
$curr_rate=1;
$curr_rate=mysql_real_escape_string($_POST['curr_rate']);
$amount_paid=mysql_real_escape_string($_POST['amount_paid']);
$date_paid=mysql_real_escape_string($_POST['date_paid']);


$sqllpo="insert into quotation VALUES('','$booking_id',' ','$customer_id','','$currency','$curr_rate','$user_id',
'$gen_remarks',NOW(),'$discount','$discount_value','$vat','$vat_value','$quotation_date','0','$qtn_type')";
$resultslpo=mysql_query($sqllpo) or die ("Error $sqllpo.".mysql_error());

$queryind="SELECT * from quotation ORDER BY quotation_id DESC LIMIT 1";
$resultsind=mysql_query($queryind) or die ("Error: $queryind.".mysql_error());
$rowsind=mysql_fetch_object($resultsind);
$lat_quotation_id=$rowsind->quotation_id;

$sqlauditsav= "insert into audit_trails values('','$user_id',NOW(),'Created a quotation No: $lat_quotation_id into the system')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());

foreach($_POST['service_item_id'] as $row=>$Service_Item_Id)
{
//$remarks=mysql_real_escape_string($_POST['remarks_id']);
$service_item_id=mysql_real_escape_string($_POST['service_item_id'][$row]);
$service_desc=mysql_real_escape_string($_POST['remarks'][$row]);
$quantity=mysql_real_escape_string($_POST['quantity'][$row]);
$unit_cost=mysql_real_escape_string($_POST['unit_cost'][$row]);



if ($service_item_id==0)
{

}
else
{

$sqllpo="insert into quotation_task VALUES('','$booking_id','$lat_quotation_id','$service_item_id','$service_desc',
'$quantity','$unit_cost','$currency','$curr_rate','$user_id',NOW(),'0')";
$resultslpo=mysql_query($sqllpo) or die ("Error $sqllpo.".mysql_error());
}

}


header ("Location:home.php?submit_biweekly=submit_biweekly&quotation_id=$l_quotation_id&addconfirm=1");
//}







}

function create_credit_note($job_card_id,$customer_id,$start_date,$end_date,
$start_from,$technician_id,$service_item_id,$service_item_name,$service_desc,
$unit_cost,$currency,$quantity,$amount_paid,$user_id)
{


$customer_id=mysql_real_escape_string($_POST['customer_id']);
$credit_note_date=mysql_real_escape_string($_POST['date_from']);
$end_date=mysql_real_escape_string($_POST['date_to']);
//$remarks=mysql_real_escape_string($_POST['remarks']);
$job_card_id=mysql_real_escape_string($_POST['job_card_id']);
$starting_from=mysql_real_escape_string($_POST['starting_from']);
$technician_id=mysql_real_escape_string($_POST['technician_id']);
$gen_remarks=mysql_real_escape_string($_POST['gen_remarks']);
$currency=mysql_real_escape_string($_POST['currency']);
$curr_rate=1;
$curr_rate=mysql_real_escape_string($_POST['curr_rate']);
$amount_paid=mysql_real_escape_string($_POST['amount_paid']);
$date_paid=mysql_real_escape_string($_POST['date_paid']);


$sqllpo="insert into credit_note VALUES('','$booking_id',' ','$customer_id','','$currency','$curr_rate','$user_id',
'$gen_remarks',NOW(),'$discount','$discount_value','$vat','$vat_value','$credit_note_date','0','$qtn_type')";
$resultslpo=mysql_query($sqllpo) or die ("Error $sqllpo.".mysql_error());

if ($amount_paid=='')
{

}
else
{
$sqlpy= "insert into credit_note_payments values ('','$job_card_id','$customer_id','$sales_rep','','$amount_paid','$desc','$currency','$curr_rate','1','$ref_no',
'$date_paid','','',NOW(),'')";
$resultspy= mysql_query($sqlpy) or die ("Error $sqlpy.".mysql_error());
}

$queryind="SELECT * from credit_note ORDER BY credit_note_id DESC LIMIT 1";
$resultsind=mysql_query($queryind) or die ("Error: $queryind.".mysql_error());
$rowsind=mysql_fetch_object($resultsind);
$lat_credit_note_id=$rowsind->credit_note_id;

$sqlauditsav= "insert into audit_trails values('','$user_id',NOW(),'Created a Credit Note No: $lat_credit_note_id into the system')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());



foreach($_POST['service_item_id'] as $row=>$Service_Item_Id)
{
//$remarks=mysql_real_escape_string($_POST['remarks_id']);
$service_item_id=mysql_real_escape_string($_POST['service_item_id'][$row]);
$service_desc=mysql_real_escape_string($_POST['remarks'][$row]);
$quantity=mysql_real_escape_string($_POST['quantity'][$row]);
$unit_cost=mysql_real_escape_string($_POST['unit_cost'][$row]);



if ($service_item_id==0)
{

}
else
{

$sqllpo="insert into credit_note_task VALUES('','$booking_id','$lat_credit_note_id','$service_item_id','$service_desc',
'$quantity','$unit_cost','$currency','$curr_rate','$user_id',NOW(),'0')";
$resultslpo=mysql_query($sqllpo) or die ("Error $sqllpo.".mysql_error());
}

}


header ("Location:home.php?dropdowntitle=dropdowntitle&credit_note_id=$lat_credit_note_id&addconfirm=1");
//}







}

function create_credit_note2($job_card_id,$customer_id,$start_date,$end_date,
$start_from,$technician_id,$service_item_id,$service_item_name,$service_desc,
$unit_cost,$currency,$quantity,$amount_paid,$user_id)

{

$customer_id=mysql_real_escape_string($_POST['customer_id']);
$start_date=mysql_real_escape_string($_POST['date_from']);
$end_date=mysql_real_escape_string($_POST['date_to']);
$job_card_id=mysql_real_escape_string($_POST['job_card_id']);
$starting_from=mysql_real_escape_string($_POST['starting_from']);
$technician_id=mysql_real_escape_string($_POST['technician_id']);
$gen_remarks=mysql_real_escape_string($_POST['gen_remarks']);
$currency=mysql_real_escape_string($_POST['currency']);
$curr_rate=mysql_real_escape_string($_POST['curr_rate']);
$curr_rate=1;
$amount_paid=mysql_real_escape_string($_POST['amount_paid']);

$date_paid=mysql_real_escape_string($_POST['date_paid']);


/* $sqllpo="insert into job_cards VALUES('','$starting_from','$customer_id','','$currency','$curr_rate','$start_date',
'$end_date','$user_id','$technician_id',NOW(),'0','0','0','0','0')";
$resultslpo=mysql_query($sqllpo) or die ("Error $sqllpo.".mysql_error()); */

$sqlupdt= "UPDATE credit_note SET 

terms='$gen_remarks',
credit_note_date='$start_date',
currency='$currency',
curr_rate='$curr_rate' 
WHERE credit_note_id='$job_card_id'";
$resultsupdt= mysql_query($sqlupdt) or die ("Error $sqlupdt.".mysql_error());


$sqlauditsav= "insert into audit_trails values('','$user_id',NOW(),'Updated a Credit Note No: $lat_credit_note_id details into the system')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());



$sqldel2="DELETE FROM credit_note_payments where sales_code_id='$job_card_id'";
$resultsdel2=mysql_query($sqldel2) or die ("Error $sqldel2.".mysql_error());

foreach($_POST['credit_note_payment_id'] as $row=>$Credit_Note_Payment_Id)
{
$credit_note_payment_id=mysql_real_escape_string($_POST['credit_note_payment_id'][$row]);
$date_paid2=mysql_real_escape_string($_POST['date_paid2'][$row]);
$amount_paid2=mysql_real_escape_string($_POST['amount_paid2'][$row]);


if ($amount_paid2=='')
{

}
else
{

$sqlpy= "insert into credit_note_payments values ('','$job_card_id','$customer_id','$sales_rep','','$amount_paid','$desc','$currency','$curr_rate','1','$ref_no',
'$date_paid','','',NOW(),'')";
$resultspy= mysql_query($sqlpy) or die ("Error $sqlpy.".mysql_error());
}

}



if ($amount_paid=='')
{

}
else
{

$sqlpy= "insert into credit_note_payments values ('','$job_card_id','$customer_id','$sales_rep','','$amount_paid','$desc','$currency','$curr_rate','1','$ref_no',
'$date_paid','','',NOW(),'')";
$resultspy= mysql_query($sqlpy) or die ("Error $sqlpy.".mysql_error());
}


foreach($_POST['service_item_id'] as $row=>$Service_Item_Id)
{
//$remarks=mysql_real_escape_string($_POST['remarks_id']);
$service_item_id=mysql_real_escape_string($_POST['service_item_id'][$row]);
$job_card_task_id=mysql_real_escape_string($_POST['quotation_task_id'][$row]);
$service_desc=mysql_real_escape_string($_POST['remarks'][$row]);
//$remarks=mysql_real_escape_string($_POST['remarks']);
$quantity=mysql_real_escape_string($_POST['quantity'][$row]);
$unit_cost=mysql_real_escape_string($_POST['unit_cost'][$row]);
//$technician_id=mysql_real_escape_string($_POST['technician_id'][$row]);
//$task_cost=mysql_real_escape_string($_POST['task_cost'][$row]);
$customer_item=mysql_real_escape_string($_POST['customer_item'][$row]);
$part_id=mysql_real_escape_string($_POST['part_id'][$row]);
$quantity=mysql_real_escape_string($_POST['quantity'][$row]);


$sqldel="DELETE FROM quotation_task where quotation_task_id='$job_card_task_id'";
$resultsdel=mysql_query($sqldel) or die ("Error $sqldel.".mysql_error());


if ($service_item_id==0)
{

}
else
{

$sqllpo="insert into quotation_task VALUES('','$booking_id','$job_card_id','$service_item_id','$service_desc',
'$quantity','$unit_cost','$currency','$curr_rate','$user_id',NOW(),'0')";
$resultslpo=mysql_query($sqllpo) or die ("Error $sqllpo.".mysql_error());
}

}


header ("Location:home.php?dropdowntitle=dropdowntitle&credit_card_id=$job_card_id&addconfirm=1");
//}

}









function assign_sub_project_location2($job_card_id,$customer_id,$start_date,$end_date,
$start_from,$technician_id,$service_item_id,$service_item_name,$service_desc,
$unit_cost,$currency,$quantity,$amount_paid,$user_id)

{

$customer_id=mysql_real_escape_string($_POST['customer_id']);
$start_date=mysql_real_escape_string($_POST['date_from']);
$end_date=mysql_real_escape_string($_POST['date_to']);
$job_card_id=mysql_real_escape_string($_POST['job_card_id']);
$starting_from=mysql_real_escape_string($_POST['starting_from']);
$technician_id=mysql_real_escape_string($_POST['technician_id']);
$gen_remarks=mysql_real_escape_string($_POST['gen_remarks']);
$currency=mysql_real_escape_string($_POST['currency']);
$curr_rate=mysql_real_escape_string($_POST['curr_rate']);
$curr_rate=1;
$amount_paid=mysql_real_escape_string($_POST['amount_paid']);

$date_paid=mysql_real_escape_string($_POST['date_paid']);


/* $sqllpo="insert into job_cards VALUES('','$starting_from','$customer_id','','$currency','$curr_rate','$start_date',
'$end_date','$user_id','$technician_id',NOW(),'0','0','0','0','0')";
$resultslpo=mysql_query($sqllpo) or die ("Error $sqllpo.".mysql_error()); */

$sqlupdt= "UPDATE quotation SET 
customer_id='$customer_id',
terms='$gen_remarks',
quotation_date='$start_date',
currency='$currency',
curr_rate='$curr_rate' 
WHERE quotation_id='$job_card_id'";
$resultsupdt= mysql_query($sqlupdt) or die ("Error $sqlupdt.".mysql_error());


foreach($_POST['service_item_id'] as $row=>$Service_Item_Id)
{
//$remarks=mysql_real_escape_string($_POST['remarks_id']);
$service_item_id=mysql_real_escape_string($_POST['service_item_id'][$row]);
echo $job_card_task_id=mysql_real_escape_string($_POST['quotation_task_id'][$row]);
$service_desc=mysql_real_escape_string($_POST['remarks'][$row]);
//$remarks=mysql_real_escape_string($_POST['remarks']);
$quantity=mysql_real_escape_string($_POST['quantity'][$row]);
$unit_cost=mysql_real_escape_string($_POST['unit_cost'][$row]);
//$technician_id=mysql_real_escape_string($_POST['technician_id'][$row]);
//$task_cost=mysql_real_escape_string($_POST['task_cost'][$row]);
$customer_item=mysql_real_escape_string($_POST['customer_item'][$row]);
$part_id=mysql_real_escape_string($_POST['part_id'][$row]);
$quantity=mysql_real_escape_string($_POST['quantity'][$row]);


$sqldel="DELETE FROM quotation_task where quotation_task_id='$job_card_task_id'";
$resultsdel=mysql_query($sqldel) or die ("Error $sqldel.".mysql_error());


if ($service_item_id==0)
{

}
else
{

$sqllpo="insert into quotation_task VALUES('','$booking_id','$job_card_id','$service_item_id','$service_desc',
'$quantity','$unit_cost','$currency','$curr_rate','$user_id',NOW(),'0')";
$resultslpo=mysql_query($sqllpo) or die ("Error $sqllpo.".mysql_error());
}

}


header ("Location:home.php?submit_biweekly=submit_biweekly&quotation_id=$job_card_id&addconfirm=1");
//}

}















//assign sub projects to settlement
function assign_sub_project_settlement($PoNumber)
{

//$sub_project_id=$;

/*

$latest_sub_project_id=mysql_real_escape_string($_POST['sub_project_id']);


$sqlproj= "SELECT * from nrc_sub_project where sub_project_id='$latest_sub_project_id'";
$resultsproj= mysql_query($sqlproj) or die ("Error $sqlproj.".mysql_error());
$rowsproj=mysql_fetch_object($resultsproj);
$project_id=$rowsproj->project_id;

*/


foreach($_POST['settlement_id'] as $row=>$settlementID)
{

    $settlement_id=mysql_real_escape_string($settlementID);
		
	
	$PoNumber=mysql_real_escape_string($_POST['PoNumber']);
	
$sqlsprojid= "SELECT * from nrc_sub_project where sub_project_name='$PoNumber'";
$resultssprojid= mysql_query($sqlsprojid) or die ("Error $sqlsprojid.".mysql_error());
$rowssprojid=mysql_fetch_object($resultssprojid);	

$latest_sub_project_id=$rowssprojid->sub_project_id;
$project_id=$rowssprojid->project_id;
$latest_alloc_id=mysql_real_escape_string($_POST['alloc_id']);
	
//to allocate the 	subproject to location first
$sqlloc2= "SELECT * from nrc_settlement where settlement_id='$settlement_id'";
$resultsloc2= mysql_query($sqlloc2) or die ("Error $sqlloc2.".mysql_error());
$rowsloc2=mysql_fetch_object($resultsloc2);
$location_id=$rowsloc2->location_id;	



$sql3="INSERT INTO nrc_subprojectvslocation VALUES('', '$project_id','$latest_sub_project_id','$latest_alloc_id', '$location_id')" or die(mysql_error());
$results3= mysql_query($sql3) or die ("Error $sql3.".mysql_error());

    
//    $paxcur = $pax - $row;


$sqlprof= "SELECT * from nrc_subprojectvssettlement where settlement_id='$settlement_id' AND sub_project_id='$latest_sub_project_id'";
$resultsprof= mysql_query($sqlprof) or die ("Error $sqlpo.".mysql_error());
$rowsprof=mysql_num_rows($resultsprof);

if ($rowsprof>0)
{
header ("Location:home.php?assignsubprojectsettlement=assignsubprojectsettlement&latest_alloc_id=$latest_alloc_id&sub_project_id=$latest_sub_project_id&recordexist=1");
}
else
{




$sql3="INSERT INTO nrc_subprojectvssettlement VALUES('', '$project_id','$latest_sub_project_id','$latest_alloc_id', '$settlement_id')" or die(mysql_error());
$results3= mysql_query($sql3) or die ("Error $sql3.".mysql_error());

//header ("Location:home.php?assignsubprojectend=assignsubprojectend&addconfirm=1");
header ("Location:home.php?setuptemplate=setuptemplate&subproject_id=$latest_sub_project_id&set=1");
}

}
}


/*




foreach($_POST['area_id'] as $row=>$AreaID)
{

    $area_id=mysql_real_escape_string($AreaID);
	$latest_project_id=mysql_real_escape_string($_POST['project_id']);

    
//    $paxcur = $pax - $row;

$sql3="INSERT INTO nrc_projectvsarea VALUES('', '$latest_project_id', '$area_id')" or die(mysql_error());
$results3= mysql_query($sql3) or die ("Error $sql3.".mysql_error());

}
foreach($_POST['location_id'] as $row=>$LocationID)
{

    $location_id=mysql_real_escape_string($LocationID);
	$latest_project_id=mysql_real_escape_string($_POST['project_id']);

    
//    $paxcur = $pax - $row;

$sql4="INSERT INTO nrc_projectvslocation VALUES('', '$latest_project_id', '$location_id')" or die(mysql_error());
$results4= mysql_query($sql4) or die ("Error $sql4.".mysql_error());

}
foreach($_POST['settlement_id'] as $row=>$SettlementID)
{

    $settlement_id=mysql_real_escape_string($SettlementID);
	$latest_project_id=mysql_real_escape_string($_POST['project_id']);

    
//    $paxcur = $pax - $row;

$sql5="INSERT INTO nrc_projectvssettlement VALUES('', '$latest_project_id', '$settlement_id')" or die(mysql_error());
$results5= mysql_query($sql5) or die ("Error $sql5.".mysql_error());

}

header ("Location:home.php?assignproject=assignproject&addconfirm=1");

//mysql_close($cnn);

}
*/


function add_biweekly($project_id,$sub_project_id,$set_template_id,$location_id,$trans_date,$report_period_id,$bi_achieved,$bi_male,$bi_female,$narration,$user_id,$sess_location_id,$sess_area_id,$sess_country_id)

{


$project_id=mysql_real_escape_string($_POST['project_id']);
//$location_id=mysql_real_escape_string($_POST['location_id']);
$report_period_id=mysql_real_escape_string($_POST['report_period_id']);
$sub_project_id=mysql_real_escape_string($_POST['sub_project_id']);
$trans_date=date('Y-m-d');

foreach($_POST['bi_male'] as $row=>$Bi_male)
{
$bi_male=mysql_real_escape_string($Bi_male);
$bi_achieved=mysql_real_escape_string($_POST['bi_achieved'][$row]);
$bi_female=mysql_real_escape_string($_POST['bi_female'][$row]);
$narration=mysql_real_escape_string($_POST['narration'][$row]);
$set_template_id=mysql_real_escape_string($_POST['set_template_id'][$row]);
$location_id=mysql_real_escape_string($_POST['location_id'][$row]);



    
//    $paxcur = $pax - $row;

$sql3="INSERT INTO nrc_biweekly VALUES('','$set_template_id','$location_id','$project_id','$sub_project_id','$report_period_id','$trans_date','$bi_achieved',
'$bi_male','$bi_female','$narration','$user_id','$sess_location_id','$sess_area_id','$sess_country_id')" or die(mysql_error());
$results3= mysql_query($sql3) or die ("Error $sql3.".mysql_error());

}

header ("Location:home.php?submit_biweekly=submit_biweekly&addconfirm=1");
}







?>


