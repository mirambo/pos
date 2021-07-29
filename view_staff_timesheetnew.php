<?php
$period=mysql_real_escape_string($_POST['date_month']);
//$period='2013-04'; 
$day1=$period.'-1';
$day2=$period.'-2';
$day3=$period.'-3';
$day4=$period.'-4';
$day5=$period.'-5';
$day6=$period.'-6';
$day7=$period.'-7';
$day8=$period.'-8';
$day9=$period.'-9';
$day10=$period.'-10';
$day11=$period.'-11';
$day12=$period.'-12';
$day13=$period.'-13';
$day14=$period.'-14';
$day15=$period.'-15';
$day16=$period.'-16';
$day17=$period.'-17';
$day18=$period.'-18';
$day19=$period.'-19';
$day20=$period.'-20';
$day21=$period.'-21';
$day22=$period.'-22';
$day23=$period.'-23';
$day24=$period.'-24';
$day25=$period.'-25';
$day26=$period.'-26';
$day27=$period.'-27';
$day28=$period.'-28';
$day29=$period.'-29';
$day30=$period.'-30';
$day31=$period.'-31';
?>
<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>
<script type="text/javascript" src="calender/calendar.js"></script>
<script type="text/javascript" src="calender/lang/calendar-en.js"></script>
<script type="text/javascript" src="calender/calendar-setup.js"></script>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/superTables.css" rel="stylesheet" type="text/css" />

<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>

<style type="text/css">

p
{
margin-right:10px;
margin-left:10px;
font-size:11px;


}

@import url(calender/calendar-win2k-1.css);

</style>
<script type="text/javascript"> 

function confirmDelete()
{
    return confirm("Are you sure want to delete?");
}

</script>

<table width="100%">
<tr bgcolor="#FFFFCC"><td colspan="17" align="right"><a href="printsubspeciality.php" target="_blank"><img src="images/print_icon.gif" title="Print"></a> &nbsp; <a href="printsubspecialitycsv.php"><img src="images/excel.png" title="Export to Excell"></a> &nbsp; <a href="printsubspecialityword.php"><img src="images/word.png" title="Export to Word"></a></td></tr>
<tr bgcolor="#FFFFCC" height="30">
   
    <td colspan="17" height="20" align="center"> 
	<font color="#ff0000" size="+1"><strong>:::Staff Time Sheet Report For Month Of <?php echo $period; ?></strong></font>
	
	</td></tr>
</table>
<DIV class=fakeContainer>
<table width="100%" border="0" class=demoTable id=demoTable>
  <tr  style="background:url(images/description.gif);" height="30">
    <td align="center" width="30%"><strong><p>Staff Name</p></strong></td>
 
    <td align="center" width="30%"><strong><p>Staff No</p></strong></td>
    <td align="center" width="180"><strong><p>Job Title</p></strong></td>
    <td align="center" width="80"><strong><p>Project</p></strong></td>
	<td align="center" width="1%"><strong><p>1</p></strong></td>
	<td align="center" width="1%"><strong><p>2</p></strong></td>
	<td align="center" width="1%"><strong><p>3</p></strong></td>
	<td align="center" width="1%"><strong><p>4</p></strong></td>
	<td align="center" width="1%"><strong><p>5</p></strong></td>
	<td align="center" width="1%"><strong><p>6</p></strong></td>
	<td align="center" width="1%"><strong><p>7</p></strong></td>
	<td align="center" width="1%"><strong><p>8</p></strong></td>
	<td align="center" width="1%"><strong><p>9</p></strong></td>
	<td align="center" width="1%"><strong><p>10</p></strong></td>
	<td align="center" width="1%"><strong><p>11</p></strong></td>
	<td align="center" width="1%"><strong><p>12</p></strong></td>
	<td align="center" width="1%"><strong><p>13</p></strong></td>
	<td align="center" width="1%"><strong><p>14</p></strong></td>
	<td align="center" width="1%"><strong><p>15</p></strong></td>
	<td align="center" width="1%"><strong><p>16</p></strong></td>
	<td align="center" width="1%"><strong><p>17</p></strong></td>
	<td align="center" width="1%"><strong><p>18</p></strong></td>
	<td align="center" width="1%"><strong><p>19</p></strong></td>
	<td align="center" width="1%"><strong><p>20</p></strong></td>
	<td align="center" width="1%"><strong><p>21</p></strong></td>
	<td align="center" width="1%"><strong><p>22</p></strong></td>
	<td align="center" width="1%"><strong><p>23</p></strong></td>
	<td align="center" width="1%"><strong><p>24</p></strong></td>
	<td align="center" width="1%"><strong><p>25</p></strong></td>
	<td align="center" width="1%"><strong><p>26</p></strong></td>
	<td align="center" width="1%"><strong><p>27</p></strong></td>
	<td align="center" width="1%"><strong><p>28</p></strong></td>
	<td align="center" width="1%"><strong><p>29</p></strong></td>
	<td align="center" width="1%"><strong><p>30</p></strong></td>
	<td align="center" width="1%"><strong><p>31</p></strong></td>
	<td align="center" width="15%"><strong><p>Days Worked</p></strong></td>
	
	
	
    
    </tr>
	
	
<?php

$sqlpayrol="SELECT employees.emp_id,employees.employee_no,employees.emp_fname,employees.emp_mname,employees.emp_lname,omjob_titles.omjob_title_name FROM employees,
omjob_titles WHERE omjob_titles.omjob_title_id=employees.title AND employees.work_place='7'"; 
$resultspayrol= mysql_query($sqlpayrol) or die ("Error $sqlpayrol.".mysql_error());

if (mysql_num_rows($resultspayrol) > 0)
						  {
							  $RowCounter=0;
							  while ($rows=mysql_fetch_object($resultspayrol))
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
	 
 <td><?php echo $rows->emp_fname.' '.$rows->emp_mname.' '.$rows->emp_lname;?></td> 
  <td><?php echo $rows->employee_no;?></td>


 <td align="left"><?php echo $rows->omjob_title_name;?></td>
 <td>
 <?php 
$emp_id=$rows->emp_id;
$queryinst1="SELECT operations.operation_id,operations.operation_name,clients.c_name,projects.period_from,projects.period_to,projects.contract_no,projects.project_id
  FROM operations,clients,projects,assigned_staffold where projects.operation_id=operations.operation_id AND projects.client_id=clients.client_id and assigned_staffold.project_id=projects.project_id and assigned_staffold.staff='$emp_id'";
$resultsinst1=mysql_query($queryinst1) or die ("Error: $queryinst1.".mysql_error());
$rowsinst1=mysql_fetch_object($resultsinst1);

echo $rowsinst1->c_name.' - '. $rowsinst1->operation_name;

 
 ?>
 
 
 </td>
 <td align="center"><?php 
 
$sqlts="SELECT * FROM staff_timesheet where staff='$emp_id' and timesheet_date='$day1'";
$resultsts= mysql_query($sqlts) or die ("Error $sqlts.".mysql_error());
$rowsts=mysql_fetch_object($resultsts);

$timesheet_mark=$rowsts->timesheet_mark;

if ($timesheet_mark=='X')
{
echo "<font color='#009933'><strong>P</strong></font>";

}
elseif ($timesheet_mark=='Y')
{
echo "<font color='#ff0000'>A</font>";

}
else
{
echo "<font color='#0000FF'>V</font>";
}




?></td>
 <td align="center"><?php 
 
$sqlts="SELECT * FROM staff_timesheet where staff='$emp_id' and timesheet_date='$day2'";
$resultsts= mysql_query($sqlts) or die ("Error $sqlts.".mysql_error());
$rowsts=mysql_fetch_object($resultsts);

$timesheet_mark=$rowsts->timesheet_mark;

if ($timesheet_mark=='X')
{
echo "<font color='#009933'>P</font>";
$p2=1;
}
elseif ($timesheet_mark=='Y')
{
echo "<font color='#ff0000'>A</font>";

}
else
{
echo "<font color='#0000FF'>V</font>";
}




?></td>
<td align="center"><?php 
 
$sqlts="SELECT * FROM staff_timesheet where staff='$emp_id' and timesheet_date='$day3'";
$resultsts= mysql_query($sqlts) or die ("Error $sqlts.".mysql_error());
$rowsts=mysql_fetch_object($resultsts);

$timesheet_mark=$rowsts->timesheet_mark;

if ($timesheet_mark=='X')
{
echo "<font color='#009933'>P</font>";
$p3=1;
}
elseif ($timesheet_mark=='Y')
{
echo "<font color='#ff0000'>A</font>";

}
else
{
echo "<font color='#0000FF'>V</font>";
}




?></td>
 <td align="center"><?php 
 
$sqlts="SELECT * FROM staff_timesheet where staff='$emp_id' and timesheet_date='$day4'";
$resultsts= mysql_query($sqlts) or die ("Error $sqlts.".mysql_error());
$rowsts=mysql_fetch_object($resultsts);

$timesheet_mark=$rowsts->timesheet_mark;

if ($timesheet_mark=='X')
{
echo "<font color='#009933'>P</font>";
}
elseif ($timesheet_mark=='Y')
{
echo "<font color='#ff0000'>A</font>";

}
else
{
echo "<font color='#0000FF'>V</font>";
}




?></td>
<td align="center"><?php 
 
$sqlts="SELECT * FROM staff_timesheet where staff='$emp_id' and timesheet_date='$day5'";
$resultsts= mysql_query($sqlts) or die ("Error $sqlts.".mysql_error());
$rowsts=mysql_fetch_object($resultsts);

$timesheet_mark=$rowsts->timesheet_mark;

if ($timesheet_mark=='X')
{
echo "<font color='#009933'><strong>P</strong></font>";
}
elseif ($timesheet_mark=='Y')
{
echo "<font color='#ff0000'>A</font>";

}
else
{
echo "<font color='#0000FF'>V</font>";
}




?></td>
<td align="center"><?php 
 
$sqlts="SELECT * FROM staff_timesheet where staff='$emp_id' and timesheet_date='$day6'";
$resultsts= mysql_query($sqlts) or die ("Error $sqlts.".mysql_error());
$rowsts=mysql_fetch_object($resultsts);

$timesheet_mark=$rowsts->timesheet_mark;

if ($timesheet_mark=='X')
{
echo "<font color='#009933'><strong>P</strong></font>";
}
elseif ($timesheet_mark=='Y')
{
echo "<font color='#ff0000'>A</font>";

}
else
{
echo "<font color='#0000FF'>V</font>";
}




?></td>
 <td align="center"><?php 
 
$sqlts="SELECT * FROM staff_timesheet where staff='$emp_id' and timesheet_date='$day7'";
$resultsts= mysql_query($sqlts) or die ("Error $sqlts.".mysql_error());
$rowsts=mysql_fetch_object($resultsts);

$timesheet_mark=$rowsts->timesheet_mark;

if ($timesheet_mark=='X')
{
echo "<font color='#009933'><strong>P</strong></font>";
}
elseif ($timesheet_mark=='Y')
{
echo "<font color='#ff0000'>A</font>";

}
else
{
echo "<font color='#0000FF'>V</font>";
}




?></td>
 <td align="center"><?php 
 
$sqlts="SELECT * FROM staff_timesheet where staff='$emp_id' and timesheet_date='$day8'";
$resultsts= mysql_query($sqlts) or die ("Error $sqlts.".mysql_error());
$rowsts=mysql_fetch_object($resultsts);

$timesheet_mark=$rowsts->timesheet_mark;

if ($timesheet_mark=='X')
{
echo "<font color='#009933'><strong>P</strong></font>";
}
elseif ($timesheet_mark=='Y')
{
echo "<font color='#ff0000'>A</font>";

}
else
{
echo "<font color='#0000FF'>V</font>";
}




?></td>
<td align="center"><?php 
 
$sqlts="SELECT * FROM staff_timesheet where staff='$emp_id' and timesheet_date='$day9'";
$resultsts= mysql_query($sqlts) or die ("Error $sqlts.".mysql_error());
$rowsts=mysql_fetch_object($resultsts);

$timesheet_mark=$rowsts->timesheet_mark;

if ($timesheet_mark=='X')
{
echo "<font color='#009933'><strong>P</strong></font>";
}
elseif ($timesheet_mark=='Y')
{
echo "<font color='#ff0000'>A</font>";

}
else
{
echo "<font color='#0000FF'>V</font>";
}




?></td>
<td align="center"><?php 
 
$sqlts="SELECT * FROM staff_timesheet where staff='$emp_id' and timesheet_date='$day10'";
$resultsts= mysql_query($sqlts) or die ("Error $sqlts.".mysql_error());
$rowsts=mysql_fetch_object($resultsts);

$timesheet_mark=$rowsts->timesheet_mark;

if ($timesheet_mark=='X')
{
echo "<font color='#009933'><strong>P</strong></font>";
}
elseif ($timesheet_mark=='Y')
{
echo "<font color='#ff0000'>A</font>";

}
else
{
echo "<font color='#0000FF'>V</font>";
}




?></td>
<td align="center"><?php 
 
$sqlts="SELECT * FROM staff_timesheet where staff='$emp_id' and timesheet_date='$day11'";
$resultsts= mysql_query($sqlts) or die ("Error $sqlts.".mysql_error());
$rowsts=mysql_fetch_object($resultsts);

$timesheet_mark=$rowsts->timesheet_mark;

if ($timesheet_mark=='X')
{
echo "<font color='#009933'><strong>P</strong></font>";
}
elseif ($timesheet_mark=='Y')
{
echo "<font color='#ff0000'><strong>A</strong></font>";

}
else
{
echo "<font color='#0000FF'>V</font>";
}




?></td>
<td align="center"><?php 
 
$sqlts="SELECT * FROM staff_timesheet where staff='$emp_id' and timesheet_date='$day12'";
$resultsts= mysql_query($sqlts) or die ("Error $sqlts.".mysql_error());
$rowsts=mysql_fetch_object($resultsts);

$timesheet_mark=$rowsts->timesheet_mark;

if ($timesheet_mark=='X')
{
echo "<font color='#009933'><strong>P</strong></font>";
}
elseif ($timesheet_mark=='Y')
{
echo "<font color='#ff0000'>A</font>";

}
else
{
echo "<font color='#0000FF'>V</font>";
}




?></td>
 <td align="center"><?php 
 
$sqlts="SELECT * FROM staff_timesheet where staff='$emp_id' and timesheet_date='$day13'";
$resultsts= mysql_query($sqlts) or die ("Error $sqlts.".mysql_error());
$rowsts=mysql_fetch_object($resultsts);

$timesheet_mark=$rowsts->timesheet_mark;

if ($timesheet_mark=='X')
{
echo "<font color='#009933'><strong>P</strong></font>";

}
elseif ($timesheet_mark=='Y')
{
echo "<font color='#ff0000'>A</font>";

}
else
{
echo "<font color='#0000FF'>V</font>";
}




?></td>
<td align="center"><?php 
 
$sqlts="SELECT * FROM staff_timesheet where staff='$emp_id' and timesheet_date='$day14'";
$resultsts= mysql_query($sqlts) or die ("Error $sqlts.".mysql_error());
$rowsts=mysql_fetch_object($resultsts);

$timesheet_mark=$rowsts->timesheet_mark;

if ($timesheet_mark=='X')
{
echo "<font color='#009933'><strong>P</strong></font>";
}
elseif ($timesheet_mark=='Y')
{
echo "<font color='#ff0000'>A</font>";

}
else
{
echo "<font color='#0000FF'>V</font>";
}




?></td>
 <td align="center"><?php 
 
$sqlts="SELECT * FROM staff_timesheet where staff='$emp_id' and timesheet_date='$day15'";
$resultsts= mysql_query($sqlts) or die ("Error $sqlts.".mysql_error());
$rowsts=mysql_fetch_object($resultsts);

$timesheet_mark=$rowsts->timesheet_mark;

if ($timesheet_mark=='X')
{
echo "<font color='#009933'><strong>P</strong></font>";
}
elseif ($timesheet_mark=='Y')
{
echo "<font color='#ff0000'>A</font>";

}
else
{
echo "<font color='#0000FF'>V</font>";
}




?></td>
 <td align="center"><?php 
 
$sqlts="SELECT * FROM staff_timesheet where staff='$emp_id' and timesheet_date='$day16'";
$resultsts= mysql_query($sqlts) or die ("Error $sqlts.".mysql_error());
$rowsts=mysql_fetch_object($resultsts);

$timesheet_mark=$rowsts->timesheet_mark;

if ($timesheet_mark=='X')
{
echo "<font color='#009933'><strong>P</strong></font>";
}
elseif ($timesheet_mark=='Y')
{
echo "<font color='#ff0000'>A</font>";

}
else
{
echo "<font color='#0000FF'>V</font>";
}




?></td>
 <td align="center"><?php 
 
$sqlts="SELECT * FROM staff_timesheet where staff='$emp_id' and timesheet_date='$day17'";
$resultsts= mysql_query($sqlts) or die ("Error $sqlts.".mysql_error());
$rowsts=mysql_fetch_object($resultsts);

$timesheet_mark=$rowsts->timesheet_mark;

if ($timesheet_mark=='X')
{
echo "<font color='#009933'><strong>P</strong></font>";
}
elseif ($timesheet_mark=='Y')
{
echo "<font color='#ff0000'>A</font>";

}
else
{
echo "<font color='#0000FF'>V</font>";
}




?></td>
 <td align="center"><?php 
 
$sqlts="SELECT * FROM staff_timesheet where staff='$emp_id' and timesheet_date='$day18'";
$resultsts= mysql_query($sqlts) or die ("Error $sqlts.".mysql_error());
$rowsts=mysql_fetch_object($resultsts);

$timesheet_mark=$rowsts->timesheet_mark;

if ($timesheet_mark=='X')
{
echo "<font color='#009933'><strong>P</strong></font>";
}
elseif ($timesheet_mark=='Y')
{
echo "<font color='#ff0000'>A</font>";

}
else
{
echo "<font color='#0000FF'>V</font>";
}




?></td>
 <td align="center"><?php 
 
$sqlts="SELECT * FROM staff_timesheet where staff='$emp_id' and timesheet_date='$day19'";
$resultsts= mysql_query($sqlts) or die ("Error $sqlts.".mysql_error());
$rowsts=mysql_fetch_object($resultsts);

$timesheet_mark=$rowsts->timesheet_mark;

if ($timesheet_mark=='X')
{
echo "<font color='#009933'><strong>P</strong></font>";
}
elseif ($timesheet_mark=='Y')
{
echo "<font color='#ff0000'>A</font>";

}
else
{
echo "<font color='#0000FF'>V</font>";
}




?></td>
<td align="center"><?php 
 
$sqlts="SELECT * FROM staff_timesheet where staff='$emp_id' and timesheet_date='$day20'";
$resultsts= mysql_query($sqlts) or die ("Error $sqlts.".mysql_error());
$rowsts=mysql_fetch_object($resultsts);

$timesheet_mark=$rowsts->timesheet_mark;

if ($timesheet_mark=='X')
{
echo "<font color='#009933'><strong>P</strong></font>";
}
elseif ($timesheet_mark=='Y')
{
echo "<font color='#ff0000'>A</font>";

}
else
{
echo "<font color='#0000FF'>V</font>";
}




?></td>
 <td align="center"><?php 
 
$sqlts="SELECT * FROM staff_timesheet where staff='$emp_id' and timesheet_date='$day21'";
$resultsts= mysql_query($sqlts) or die ("Error $sqlts.".mysql_error());
$rowsts=mysql_fetch_object($resultsts);

$timesheet_mark=$rowsts->timesheet_mark;

if ($timesheet_mark=='X')
{
echo "<font color='#009933'><strong>P</strong></font>";
}
elseif ($timesheet_mark=='Y')
{
echo "<font color='#ff0000'>A</font>";

}
else
{
echo "<font color='#0000FF'>V</font>";
}




?></td>
 <td align="center"><?php 
 
$sqlts="SELECT * FROM staff_timesheet where staff='$emp_id' and timesheet_date='$day22'";
$resultsts= mysql_query($sqlts) or die ("Error $sqlts.".mysql_error());
$rowsts=mysql_fetch_object($resultsts);

$timesheet_mark=$rowsts->timesheet_mark;

if ($timesheet_mark=='X')
{
echo "<font color='#009933'><strong>P</strong></font>";
}
elseif ($timesheet_mark=='Y')
{
echo "<font color='#ff0000'>A</font>";

}
else
{
echo "<font color='#0000FF'>V</font>";
}




?></td>
<td align="center"><?php 
 
$sqlts="SELECT * FROM staff_timesheet where staff='$emp_id' and timesheet_date='$day23'";
$resultsts= mysql_query($sqlts) or die ("Error $sqlts.".mysql_error());
$rowsts=mysql_fetch_object($resultsts);

$timesheet_mark=$rowsts->timesheet_mark;

if ($timesheet_mark=='X')
{
echo "<font color='#009933'><strong>P</strong></font>";
}
elseif ($timesheet_mark=='Y')
{
echo "<font color='#ff0000'>A</font>";

}
else
{
echo "<font color='#0000FF'>V</font>";
}




?></td>
 <td align="center"><?php 
 
$sqlts="SELECT * FROM staff_timesheet where staff='$emp_id' and timesheet_date='$day24'";
$resultsts= mysql_query($sqlts) or die ("Error $sqlts.".mysql_error());
$rowsts=mysql_fetch_object($resultsts);

$timesheet_mark=$rowsts->timesheet_mark;

if ($timesheet_mark=='X')
{
echo "<font color='#009933'><strong>P</strong></font>";
}
elseif ($timesheet_mark=='Y')
{
echo "<font color='#ff0000'>A</font>";

}
else
{
echo "<font color='#0000FF'>V</font>";
}




?></td>
 <td align="center"><?php 
 
$sqlts="SELECT * FROM staff_timesheet where staff='$emp_id' and timesheet_date='$day25'";
$resultsts= mysql_query($sqlts) or die ("Error $sqlts.".mysql_error());
$rowsts=mysql_fetch_object($resultsts);

$timesheet_mark=$rowsts->timesheet_mark;

if ($timesheet_mark=='X')
{
echo "<font color='#009933'><strong>P</strong></font>";
}
elseif ($timesheet_mark=='Y')
{
echo "<font color='#ff0000'>A</font>";

}
else
{
echo "<font color='#0000FF'>V</font>";
}




?></td>
 <td align="center"><?php 
 
$sqlts="SELECT * FROM staff_timesheet where staff='$emp_id' and timesheet_date='$day26'";
$resultsts= mysql_query($sqlts) or die ("Error $sqlts.".mysql_error());
$rowsts=mysql_fetch_object($resultsts);

$timesheet_mark=$rowsts->timesheet_mark;

if ($timesheet_mark=='X')
{
echo "<font color='#009933'><strong>P</strong></font>";
}
elseif ($timesheet_mark=='Y')
{
echo "<font color='#ff0000'>A</font>";

}
else
{
echo "<font color='#0000FF'>V</font>";
}




?></td>
 <td align="center"><?php 
 
$sqlts="SELECT * FROM staff_timesheet where staff='$emp_id' and timesheet_date='$day27'";
$resultsts= mysql_query($sqlts) or die ("Error $sqlts.".mysql_error());
$rowsts=mysql_fetch_object($resultsts);

$timesheet_mark=$rowsts->timesheet_mark;

if ($timesheet_mark=='X')
{
echo "<font color='#009933'><strong>P</strong></font>";
}
elseif ($timesheet_mark=='Y')
{
echo "<font color='#ff0000'>A</font>";

}
else
{
echo "<font color='#0000FF'>V</font>";
}




?></td>
<td align="center"><?php 
 
$sqlts="SELECT * FROM staff_timesheet where staff='$emp_id' and timesheet_date='$day28'";
$resultsts= mysql_query($sqlts) or die ("Error $sqlts.".mysql_error());
$rowsts=mysql_fetch_object($resultsts);

$timesheet_mark=$rowsts->timesheet_mark;

if ($timesheet_mark=='X')
{
echo "<font color='#009933'><strong>P</strong></font>";
}
elseif ($timesheet_mark=='Y')
{
echo "<font color='#ff0000'>A</font>";

}
else
{
echo "<font color='#0000FF'>V</font>";
}




?></td>
<td align="center"><?php 
 
$sqlts="SELECT * FROM staff_timesheet where staff='$emp_id' and timesheet_date='$day29'";
$resultsts= mysql_query($sqlts) or die ("Error $sqlts.".mysql_error());
$rowsts=mysql_fetch_object($resultsts);

$timesheet_mark=$rowsts->timesheet_mark;

if ($timesheet_mark=='X')
{
echo "<font color='#009933'><strong>P</strong></font>";
}
elseif ($timesheet_mark=='Y')
{
echo "<font color='#ff0000'>A</font>";

}
else
{
echo "<font color='#0000FF'>V</font>";
}




?></td>
<td align="center"><?php 
 
$sqlts="SELECT * FROM staff_timesheet where staff='$emp_id' and timesheet_date='$day30'";
$resultsts= mysql_query($sqlts) or die ("Error $sqlts.".mysql_error());
$rowsts=mysql_fetch_object($resultsts);

$timesheet_mark=$rowsts->timesheet_mark;

if ($timesheet_mark=='X')
{
echo "<font color='#009933'><strong>P</strong></font>";
}
elseif ($timesheet_mark=='Y')
{
echo "<font color='#ff0000'>A</font>";

}
else
{
echo "<font color='#0000FF'>V</font>";
}




?></td>
<td align="center"><?php 
 
$sqlts="SELECT * FROM staff_timesheet where staff='$emp_id' and timesheet_date='$day31'";
$resultsts= mysql_query($sqlts) or die ("Error $sqlts.".mysql_error());
$rowsts=mysql_fetch_object($resultsts);

$timesheet_mark=$rowsts->timesheet_mark;

if ($timesheet_mark=='X')
{
echo "<font color='#009933'><strong>P</strong></font>";
}
elseif ($timesheet_mark=='Y')
{
echo "<font color='#ff0000'>A</font>";

}
else
{
echo "<font color='#0000FF'>V</font>";
}




?></td>

 <td align="center"><strong>
 <?php 
$sqltd="SELECT * FROM staff_timesheet where staff='$emp_id' and timesheet_date BETWEEN '$day1' and '$day31' and timesheet_mark='X'";
$resultstd= mysql_query($sqltd) or die ("Error $sqltd.".mysql_error());
echo $rowstd=mysql_num_rows($resultstd);

 $grnd_ttl_days=$grnd_ttl_days+$rowstd;
 
 
 ?></strong></td>
 
 
 
 
 </tr>
 
 <?php
 $grnd_basic_pay= $grnd_basic_pay+$basic_pay;
 $grnd_working_days=$grnd_working_days+$working_days;
 $grnd_overtime1=$grnd_overtime1+$overtime1;
 $grnd_overtime_amnt1=$grnd_overtime_amnt1+$overtime_amnt1;
 $grnd_overtime2=$grnd_overtime2+$overtime2;
 $grnd_overtime_amnt2=$grnd_overtime_amnt2+$overtime_amnt2;
 $grnd_gross_pay=$grnd_gross_pay+$gross_pay;
 $grnd_ttl_over_time=$grnd_ttl_over_time+$ttl_over_time;
 $grnd_cola=$grnd_cola+$cola;
 $grnd_hse=$grnd_hse+$hse;
 $grnd_cloth=$grnd_cloth+$cloth;
 $grnd_otherpayment=$grnd_otherpayment+$otherpayment;
 $grnd_ttl_gross_pay=$grnd_ttl_gross_pay+$ttl_gross_pay;
 $grnd_deduction_amount=$grnd_deduction_amount+$deduction_amount;
 $grnd_taxable_income=$grnd_taxable_income+$taxable_income;
 $grnd_tax=$grnd_tax+$tax;
 $grnd_ttl_ded=$grnd_ttl_ded+$ttl_ded;
 $grnd_comp_sic=$grnd_comp_sic+$comp_sic;
 $grnd_net_pay=$grnd_net_pay+$net_pay;
 
 
 
 }

 ?>
 <tr height="40">
 <td align="center"><strong>Grand Total Days</strong></td>
 <td></td>
 <td></td>
 <td></td>
 <td align="center"><strong><?php 
 
$sqltd1="SELECT * FROM staff_timesheet where timesheet_date='$day1' and timesheet_mark='X'";
$resultstd1= mysql_query($sqltd1) or die ("Error $sqltd1.".mysql_error());
echo $rowstd1=mysql_num_rows($resultstd1);

 
 
 
 ?></strong></td>
 <td align="center"><strong><?php 
 
$sqltd1="SELECT * FROM staff_timesheet where timesheet_date='$day2' and timesheet_mark='X'";
$resultstd1= mysql_query($sqltd1) or die ("Error $sqltd1.".mysql_error());
echo $rowstd1=mysql_num_rows($resultstd1);

 
 
 
 ?></strong></td>
<td align="center"><strong><?php 
 
$sqltd1="SELECT * FROM staff_timesheet where timesheet_date='$day3' and timesheet_mark='X'";
$resultstd1= mysql_query($sqltd1) or die ("Error $sqltd1.".mysql_error());
echo $rowstd1=mysql_num_rows($resultstd1);

 
 
 
 ?></strong></td>
<td align="center"><strong><?php 
 
$sqltd1="SELECT * FROM staff_timesheet where timesheet_date='$day4' and timesheet_mark='X'";
$resultstd1= mysql_query($sqltd1) or die ("Error $sqltd1.".mysql_error());
echo $rowstd1=mysql_num_rows($resultstd1);

 
 
 
 ?></strong></td>
<td align="center"><strong><?php 
 
$sqltd1="SELECT * FROM staff_timesheet where timesheet_date='$day5' and timesheet_mark='X'";
$resultstd1= mysql_query($sqltd1) or die ("Error $sqltd1.".mysql_error());
echo $rowstd1=mysql_num_rows($resultstd1);

 
 
 
 ?></strong></td>
 <td align="center"><strong><?php 
 
$sqltd1="SELECT * FROM staff_timesheet where timesheet_date='$day6' and timesheet_mark='X'";
$resultstd1= mysql_query($sqltd1) or die ("Error $sqltd1.".mysql_error());
echo $rowstd1=mysql_num_rows($resultstd1);

 
 
 
 ?></strong></td>
 <td align="center"><strong><?php 
 
$sqltd1="SELECT * FROM staff_timesheet where timesheet_date='$day7' and timesheet_mark='X'";
$resultstd1= mysql_query($sqltd1) or die ("Error $sqltd1.".mysql_error());
echo $rowstd1=mysql_num_rows($resultstd1);

 
 
 
 ?></strong></td>
<td align="center"><strong><?php 
 
$sqltd1="SELECT * FROM staff_timesheet where timesheet_date='$day8' and timesheet_mark='X'";
$resultstd1= mysql_query($sqltd1) or die ("Error $sqltd1.".mysql_error());
echo $rowstd1=mysql_num_rows($resultstd1);

 
 
 
 ?></strong></td>
<td align="center"><strong><?php 
 
$sqltd1="SELECT * FROM staff_timesheet where timesheet_date='$day9' and timesheet_mark='X'";
$resultstd1= mysql_query($sqltd1) or die ("Error $sqltd1.".mysql_error());
echo $rowstd1=mysql_num_rows($resultstd1);

 
 
 
 ?></strong></td>
<td align="center"><strong><?php 
 
$sqltd1="SELECT * FROM staff_timesheet where timesheet_date='$day10' and timesheet_mark='X'";
$resultstd1= mysql_query($sqltd1) or die ("Error $sqltd1.".mysql_error());
echo $rowstd1=mysql_num_rows($resultstd1);

 
 
 
 ?></strong></td>
 <td align="center"><strong><?php 
 
$sqltd1="SELECT * FROM staff_timesheet where timesheet_date='$day11' and timesheet_mark='X'";
$resultstd1= mysql_query($sqltd1) or die ("Error $sqltd1.".mysql_error());
echo $rowstd1=mysql_num_rows($resultstd1);

 
 
 
 ?></strong></td>
 <td align="center"><strong><?php 
 
$sqltd1="SELECT * FROM staff_timesheet where timesheet_date='$day12' and timesheet_mark='X'";
$resultstd1= mysql_query($sqltd1) or die ("Error $sqltd1.".mysql_error());
echo $rowstd1=mysql_num_rows($resultstd1);

 
 
 
 ?></strong></td>
  <td align="center"><strong><?php 
 
$sqltd1="SELECT * FROM staff_timesheet where timesheet_date='$day13' and timesheet_mark='X'";
$resultstd1= mysql_query($sqltd1) or die ("Error $sqltd1.".mysql_error());
echo $rowstd1=mysql_num_rows($resultstd1);

 
 
 
 ?></strong></td>
 <td align="center"><strong><?php 
 
$sqltd1="SELECT * FROM staff_timesheet where timesheet_date='$day14' and timesheet_mark='X'";
$resultstd1= mysql_query($sqltd1) or die ("Error $sqltd1.".mysql_error());
echo $rowstd1=mysql_num_rows($resultstd1);

 
 
 
 ?></strong></td>
<td align="center"><strong><?php 
 
$sqltd1="SELECT * FROM staff_timesheet where timesheet_date='$day15' and timesheet_mark='X'";
$resultstd1= mysql_query($sqltd1) or die ("Error $sqltd1.".mysql_error());
echo $rowstd1=mysql_num_rows($resultstd1);

 
 
 
 ?></strong></td>
<td align="center"><strong><?php 
 
$sqltd1="SELECT * FROM staff_timesheet where timesheet_date='$day16' and timesheet_mark='X'";
$resultstd1= mysql_query($sqltd1) or die ("Error $sqltd1.".mysql_error());
echo $rowstd1=mysql_num_rows($resultstd1);

 
 
 
 ?></strong></td>
<td align="center"><strong><?php 
 
$sqltd1="SELECT * FROM staff_timesheet where timesheet_date='$day17' and timesheet_mark='X'";
$resultstd1= mysql_query($sqltd1) or die ("Error $sqltd1.".mysql_error());
echo $rowstd1=mysql_num_rows($resultstd1);

 
 
 
 ?></strong></td>
<td align="center"><strong><?php 
 
$sqltd1="SELECT * FROM staff_timesheet where timesheet_date='$day18' and timesheet_mark='X'";
$resultstd1= mysql_query($sqltd1) or die ("Error $sqltd1.".mysql_error());
echo $rowstd1=mysql_num_rows($resultstd1);

 
 
 
 ?></strong></td>
<td align="center"><strong><?php 
 
$sqltd1="SELECT * FROM staff_timesheet where timesheet_date='$day19' and timesheet_mark='X'";
$resultstd1= mysql_query($sqltd1) or die ("Error $sqltd1.".mysql_error());
echo $rowstd1=mysql_num_rows($resultstd1);

 
 
 
 ?></strong></td>
<td align="center"><strong><?php 
 
$sqltd1="SELECT * FROM staff_timesheet where timesheet_date='$day20' and timesheet_mark='X'";
$resultstd1= mysql_query($sqltd1) or die ("Error $sqltd1.".mysql_error());
echo $rowstd1=mysql_num_rows($resultstd1);

 
 
 
 ?></strong></td>
 <td align="center"><strong><?php 
 
$sqltd1="SELECT * FROM staff_timesheet where timesheet_date='$day21' and timesheet_mark='X'";
$resultstd1= mysql_query($sqltd1) or die ("Error $sqltd1.".mysql_error());
echo $rowstd1=mysql_num_rows($resultstd1);

 
 
 
 ?></strong></td>
<td align="center"><strong><?php 
 
$sqltd1="SELECT * FROM staff_timesheet where timesheet_date='$day22' and timesheet_mark='X'";
$resultstd1= mysql_query($sqltd1) or die ("Error $sqltd1.".mysql_error());
echo $rowstd1=mysql_num_rows($resultstd1);

 
 
 
 ?></strong></td>
<td align="center"><strong><?php 
 
$sqltd1="SELECT * FROM staff_timesheet where timesheet_date='$day23' and timesheet_mark='X'";
$resultstd1= mysql_query($sqltd1) or die ("Error $sqltd1.".mysql_error());
echo $rowstd1=mysql_num_rows($resultstd1);

 
 
 
 ?></strong></td>
<td align="center"><strong><?php 
 
$sqltd1="SELECT * FROM staff_timesheet where timesheet_date='$day24' and timesheet_mark='X'";
$resultstd1= mysql_query($sqltd1) or die ("Error $sqltd1.".mysql_error());
echo $rowstd1=mysql_num_rows($resultstd1);

 
 
 
 ?></strong></td>
<td align="center"><strong><?php 
 
$sqltd1="SELECT * FROM staff_timesheet where timesheet_date='$day25' and timesheet_mark='X'";
$resultstd1= mysql_query($sqltd1) or die ("Error $sqltd1.".mysql_error());
echo $rowstd1=mysql_num_rows($resultstd1);

 
 
 
 ?></strong></td>
 <td align="center"><strong><?php 
 
$sqltd1="SELECT * FROM staff_timesheet where timesheet_date='$day26' and timesheet_mark='X'";
$resultstd1= mysql_query($sqltd1) or die ("Error $sqltd1.".mysql_error());
echo $rowstd1=mysql_num_rows($resultstd1);

 
 
 
 ?></strong></td>
<td align="center"><strong><?php 
 
$sqltd1="SELECT * FROM staff_timesheet where timesheet_date='$day27' and timesheet_mark='X'";
$resultstd1= mysql_query($sqltd1) or die ("Error $sqltd1.".mysql_error());
echo $rowstd1=mysql_num_rows($resultstd1);

 
 
 
 ?></strong></td>
<td align="center"><strong><?php 
 
$sqltd1="SELECT * FROM staff_timesheet where timesheet_date='$day28' and timesheet_mark='X'";
$resultstd1= mysql_query($sqltd1) or die ("Error $sqltd1.".mysql_error());
echo $rowstd1=mysql_num_rows($resultstd1);

 
 
 
 ?></strong></td>
<td align="center"><strong><?php 
 
$sqltd1="SELECT * FROM staff_timesheet where timesheet_date='$day29' and timesheet_mark='X'";
$resultstd1= mysql_query($sqltd1) or die ("Error $sqltd1.".mysql_error());
echo $rowstd1=mysql_num_rows($resultstd1);

 
 
 
 ?></strong></td>
<td align="center"><strong><?php 
 
$sqltd1="SELECT * FROM staff_timesheet where timesheet_date='$day30' and timesheet_mark='X'";
$resultstd1= mysql_query($sqltd1) or die ("Error $sqltd1.".mysql_error());
echo $rowstd1=mysql_num_rows($resultstd1);

 
 
 
 ?></strong></td>
<td align="center"><strong><?php 
 
$sqltd1="SELECT * FROM staff_timesheet where timesheet_date='$day31' and timesheet_mark='X'";
$resultstd1= mysql_query($sqltd1) or die ("Error $sqltd1.".mysql_error());
echo $rowstd1=mysql_num_rows($resultstd1);

 
 
 
 ?></strong></td>
 <td align="center"><strong><font size="+1" color="#ff0000"><?php echo $grnd_ttl_days; ?></font></strong></td>
 
 
 </tr>
 
 
 <?php 

 }


 ?>

</table>
</div>
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




