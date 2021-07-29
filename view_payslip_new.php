<?php 
include('includes/session.php');
include('Connections/fundmaster.php');
$current_month=$_GET['month_pay'];
$payroll_id_get=$_GET['payroll_id'];

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Brisk Diagnostics - Payslip <?php echo $slip_no; ?></title>
<link rel="stylesheet" type="text/css" href="<?php echo $base_url;?>style.css" />
<style>

body {
        width: 100%;
        height: 100%;
        margin: 0;
        padding: 0;
        background-color: #FAFAFA;
        font: 12pt "Tahoma";
    }
    * {
        box-sizing: border-box;
        -moz-box-sizing: border-box;
    }
    .page {
        width: 216mm;
        min-height: 279mm;
        padding: 20mm;
        margin: 10mm auto;
        border: 1px #D3D3D3 solid;
        border-radius: 5px;
        background: white;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    }
    .subpage {
        padding: 1cm;
        border: 5px red solid;
        height: 239mm; /* .page height -40mm (20 off top/bottom) */
        outline: 2cm #FFEAEA solid;
    }
    
    @page {
        size: Letter;
        margin: 0;
    }
    @media print {
        html, body {
            width: 216mm;
            height: 279mm;        
        }
        .page {
            margin: 0;
            border: initial;
            border-radius: initial;
            width: initial;
            min-height: initial;
            box-shadow: initial;
            background: initial;
            page-break-after: always;
        }
    }


</style>

<style>

</style>



</head>



 
        <!--<div class="subpage">Page 1/2</div>    
    </div>-->


<body onload="window.print();">
<div class="book">


<?php
$ttl_install=0;
$ttl_deduction=0;
$p_month=$_GET['month_pay'];
$single=$_GET['single'];

$queryopr="SELECT *,hs_hr_employee.employee_id as emp_num FROM payroll_code,hs_hr_employee where 
payroll_code.employee_id=hs_hr_employee.emp_number order by payroll_code_id asc";
$resultsr= mysql_query($queryopr) or die ("Error $queryopr.".mysql_error());	


        $count = 0;
        while($rowsr=mysql_fetch_object($resultsr))
        {
            if($count==6) //three images per row
            {
               print "</div>";
               $count = 0;
            }
            if($count==0)
               print "<div class='page'>";
            print '
			
			<div style="margin:5px; position: relative; border:1px solid #ccc; width:200px; height:300px">';
      //echo "yee";
include ('single_payslip.php');
 
            $count++;
            print "</div>";
        }
        if($count>0)
           print "</div>";
        ?>


</div>
</div>
</body>

















