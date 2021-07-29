<?php
include('Connections/fundmaster.php');
require_once "Mail.php";
//current date
$date1=date('Y-m-d');


//30 days after
$date2=date("Y-m-d", strtotime("+ 60 day"));


$sql="select * FROM staff_visas WHERE exp_date BETWEEN '$date1' AND '$date2' ";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
$rows=mysql_fetch_object($results);
$numrows=mysql_num_rows($results);

if ($numrows>0)
{

//$sql2=@mysql_query("SELECT staff_contacts.office_email1 FROM staff_contacts,employees,user_group WHERE staff_contacts.emp_id=employees.emp_id AND users.user_group_id=user_group.user_group_id AND user_group_id='15'");
$sql2="SELECT staff_contacts.office_email1 FROM staff_contacts,employees,user_group,users WHERE 
staff_contacts.emp_id=employees.emp_id AND users.emp_id=employees.emp_id AND users.user_group_id=user_group.user_group_id 
AND user_group.user_group_id='15'";	 
$results2=mysql_query($sql2) or die ("Error : $sql2".mysql_error());

if (mysql_num_rows($results2)>0)
{
while($row2=mysql_fetch_array($results2))

{
?>
            <? 
//$employee=$row2['dName'];
//$supplier_phone=$row2['phone'];
echo $area = $row2['office_email1'].", ";
 // read the list of emails from the file.
	$email_list = $area;
	// count how many emails there are.
	$total_emails = count($email_list);
	
	// go through the list and trim off the newline character.
	for ($counter=0; $counter<$total_emails; $counter++) {
   $email_list[$counter] = trim($email_list[$counter]);
   }
 
	echo $total = $email_list;


$sql1=@mysql_query("SELECT * from email_config");
	 
while($row1=mysql_fetch_array($sql1))

{

?>
<? 
	
	$strhost=($row1['smtpHost']);
	$struser=($row1['smtpUser']);
	$strpass=($row1['smtpPass']);
	$strport=($row1['smtpPort']);
	$strsecurity=($row1['security']);
	$strfrom=($row1['mailfrom']);
	$strto=$total;
	//$strto=($row1['mailto']);
	
	 
	
 
 $from =$strfrom;
 $to =$strto;
 
 $subject = "Visas Expiry Alerts";
 $body = "Hi Super Administrator,\n\n We are pleased to inform you that $numrows Visas are almost expiring.\n\n Kindly login into the system for further details then renew them if possible.";

 
 $host = $strhost;
 $port = $strport;
 $username = $struser;
 $password = $strpass;
 
 $headers = array ('From' => $from,
   'To' => $to,
   'Subject' => $subject);
 $smtp = Mail::factory('smtp',
   array ('host' => $host,
     'port' => $port,
     'auth' => true,
     'username' => $username,
     'password' => $password));
 
 $mail = $smtp->send($to, $headers, $body);
 
 if (PEAR::isError($mail)) {
   //echo("<p>".$mail->getMessage() . "</p>");
   echo "not send";
  } else {
   echo("<p>Alert email has been send Successfully!!</p>");
  }


}



}

}
}

?>


