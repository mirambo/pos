<?PHP

error_reporting(0);
$base_url="http://localhost/mfs_system/";
$timezone=date_default_timezone_set('Africa/Nairobi');
$hostname_conneastan = 'localhost';
//set datbase user
$username_conneastan = 'root';
//set database pass
$password_conneastan = '';
//set database name
$database_conneastan = 'mfs_system';
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

$leo=date('Y-m-d');
?>
