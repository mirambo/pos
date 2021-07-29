<?PHP
//include('title.php');
error_reporting(1);
$base_url="http://localhost:/POS/SEBA";
$timezone=date_default_timezone_set('Africa/Nairobi');
$hostname_conneastan = 'ls-1b444dae19a62feb4d1d989a73f88a1520d300de.cnzpnjlolslk.ap-south-1.rds.amazonaws.com';
//set datbase user
$username_conneastan = 'dbmasteruser';
//set database pass
$password_conneastan = 'prevision2020';
//set database name
$database_conneastan = 'pos';
//connect to db
date_default_timezone_set('Africa/Nairobi');
$conneastan = mysql_connect($hostname_conneastan, $username_conneastan, $password_conneastan) 
    or die("connection error");
mysql_select_db($database_conneastan) 
   or die("cannot select database");
    
   $querycont="select * from company_contacts order by contacts_id desc limit 1";
$resultscont=mysql_query($querycont) or die ("Error: $querycont.".mysql_error());
$rowscont=mysql_fetch_object($resultscont);

$todate=date('Y-m-d H:i:s', time());

$to=date('Y-m-d');
?>
