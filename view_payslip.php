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


<div class="book">
<table class="tablezz" style="margin:auto;" align="center" width="1000" align="center">
<?php
$ttl_install=0;
$ttl_deduction=0;
$p_month=$_GET['month_pay'];
$single=$_GET['single'];
$gross_pay=0; 

$basic_pay=0;


if (!isset($_POST['submit']))
{

$queryopr="SELECT *,hs_hr_employee.employee_id as emp_num FROM payroll_code,hs_hr_employee where 
payroll_code.employee_id=hs_hr_employee.emp_number order by hs_hr_employee.employee_id asc";
$resultsr= mysql_query($queryopr) or die ("Error $queryopr.".mysql_error());	
}
else
	
{

$payroll_month;
	
$queryopr="SELECT *,hs_hr_employee.employee_id as emp_num FROM payroll_code,hs_hr_employee where 
payroll_code.employee_id=hs_hr_employee.emp_number AND payroll_code.payroll_month='$payroll_month' 
and payroll_code.payroll_year='$payroll_year' order by hs_hr_employee.employee_id asc";
$resultsr= mysql_query($queryopr) or die ("Error $queryopr.".mysql_error());
	
	
}


        $count = 0;
		
		
		if (mysql_num_rows($resultsr)>0)
		{
		
        while($rowsr=mysql_fetch_object($resultsr))
        {
            if($count==3) //three images per row
            {
               print "</div></div>";
               $count = 0;
            }
            if($count==0)
               print "<div class='page'><div style='width:100%; margin:auto; background:#ccc;'>";
            print '<div style="width:100%; background:#ffff00; "><div style="width:230px; border:1px solid #000; margin:5px; float:left; position:relative; height:auto; padding:5px; background:#fff;">';
      //echo "yee";
include ('single_payslip.php');
 
            $count++;
            print "</div></div>";
        }
        if($count>0)
           print "</div></div>";
	   
		}
		else
		{
			?>
			
	<tr height="30" bgcolor="#ccc"><td align="center"><strong><font color="#ff0000" >No Payslips found</font></strong></td></tr>		
			<?php 
			
			
		}
        ?>

</table>

</div>
