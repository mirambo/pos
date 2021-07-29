<?php
#include connection
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form

$f_name=mysql_real_escape_string($_POST['f_name']);
$m_name=mysql_real_escape_string($_POST['m_name']);
$l_name=mysql_real_escape_string($_POST['l_name']);
$staff_type=mysql_real_escape_string($_POST['staff_type']);






$file = $_FILES ['file'];
$name1 = $file ['name'];
$type = $file ['type'];
$size = $file ['size'];
$tmppath = $file ['tmp_name']; 


move_uploaded_file ($tmppath, 'photos/'.$name1);//image is a folder in which you will save image


$queryprof="select * from employees where emp_fname='$f_name'and emp_mname='$m_name' and emp_lname='$l_name'";
$resultsprof=mysql_query($queryprof) or die ("Error: $queryprof.".mysql_error());
								  
$rowsprof=mysql_fetch_object($resultsprof);


$numrowscomp=mysql_num_rows($resultsprof);
 
 //$f_namecomp=$rowsprof->f_name;
 //$l_namecomp=$rowsprof->l_name;
 $emailcomp=$rowsprof->email;
 //$usernamecomp=$rowsprof->username;

if ($numrowscomp>0)

{

 header ("Location:home.php?prepostgraduate=prepostgraduate&recordexist=1");

}

else 

{

$sql= "insert into employees values('','','$f_name','$m_name','$l_name','','','','','',
'','','','$staff_type','','','','','','','','$name1','0','')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


$querylatelpo="select * from employees order by emp_id desc limit 1";
$resultslatelpo=mysql_query($querylatelpo) or die ("Error: $querylatelpo.".mysql_error());
$rowslatelpo=mysql_fetch_object($resultslatelpo);

$latest_emp_id=$rowslatelpo->emp_id;

if ($staff_type==1)
{
$tempnum=$latest_emp_id;
	if($tempnum < 10)
            {
              echo $employee_no = "RS00".$tempnum;
			   //echo $newnum;
			  
			  
            } else if($tempnum < 100) 
			{
             echo $employee_no = "RS0".$tempnum;
			 
			 //echo $newnum;
            } else 
			{ 
			echo $employee_no= "RS".$tempnum; 
			
			//echo $newnum;
			}
}

else{

$tempnum=$latest_emp_id;
	if($tempnum < 10)
            {
              echo $employee_no = "RE00".$tempnum;
			   //echo $newnum;
			  
			  
            } else if($tempnum < 100) 
			{
             echo $employee_no = "RE0".$tempnum;
			 
			 //echo $newnum;
            } else 
			{ 
			echo $employee_no= "RE".$tempnum; 
			
			//echo $newnum;
			}
}



$sql= "update employees set employee_no='$employee_no' where emp_id='$latest_emp_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());






$sqlauditsav= "insert into audit_trails values('','2',NOW(),'Created a new employee by the name $f_name $m_name $l_name into the system')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());




header ("Location:home.php?postgraduate=postgraduate&emp_id=$latest_emp_id");

}


mysql_close($cnn);


?>


