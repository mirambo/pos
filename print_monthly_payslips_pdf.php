<?php 
include('includes/session.php');
include('Connections/fundmaster.php');
$payroll_month=$_GET['month'];
$payroll_year=$_GET['year'];
include("mpdf/mpdf.php");
$mpdf=new mPDF('win-1252','A4','','',15,10,16,10,10,10);//A4 page in portrait for landscape add -L.
$mpdf->SetHeader('|Your Header here|');
$mpdf->setFooter('{PAGENO}');// Giving page number to your footer.
$mpdf->useOnlyCoreFonts = true;    // false is default
$mpdf->SetDisplayMode('fullpage');
// Buffer the following html with PHP so we can store it to a variable later
ob_start();
?>
<?php 



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<style>


    .page {
        width: 216mm;
        min-height: 279mm;
        padding: 2mm;
        margin: 10mm auto;
        border: 1px #D3D3D3 solid;
        border-radius: 5px;
        background: white;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
		
    }
    .subpage {
        padding: 5cm;
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



</head>


<div class="book">
<table class="table" style="margin:auto;" align="center" width="1000" align="center">
<?php
$ttl_install=0;
$ttl_deduction=0;
$p_month=$_GET['month_pay'];
$single=$_GET['single'];
$gross_pay=0; 

$basic_pay=0;


	
$queryopr="SELECT *,hs_hr_employee.employee_id as emp_num FROM payroll_code,hs_hr_employee where 
payroll_code.employee_id=hs_hr_employee.emp_number AND payroll_code.payroll_month='$payroll_month' 
and payroll_code.payroll_year='$payroll_year' order by hs_hr_employee.employee_id asc";
$resultsr= mysql_query($queryopr) or die ("Error $queryopr.".mysql_error());


        $count = 0;
				if (mysql_num_rows($resultsr)>0)
		{
			
        while($rowsr=mysql_fetch_object($resultsr))
        {
            include ('single_payslip.php');
 
            
        }
        }
        ?>

</table>

</body>



<?php 
$html = ob_get_contents();
ob_end_clean();
// send the captured HTML from the output buffer to the mPDF class for processing
$mpdf->WriteHTML($html);
//$mpdf->SetProtection(array(), 'user', 'password'); uncomment to protect your pdf page with password.
$mpdf->Output();
exit;
?>












